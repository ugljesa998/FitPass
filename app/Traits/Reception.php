<?php
namespace App\Traits;

use App\Models\Card;
use App\Models\GymObject;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\Response;
use App\Models\Reception as ReceptionModel;

trait Reception
{
    /**
     * Its get a user reception in the gym.
     *
     * @param $params
     * @return array
     */
    public function getUserReception($params): array
    {
        $ret = [
            'message'     => '',
            'data'        => [],
            'status_code' => Response::HTTP_OK,
        ];

        $card = Card::select('user_id')->where('id', $params['card_uuid'])->first();
        $object = GymObject::where('id', $params['object_uuid'])->first();

        if(empty($card['user_id']) || empty($object)){
            $ret['status_code'] = Response::HTTP_UNAUTHORIZED;
            $ret['message'] = 'Nijem moguće prijaviti se, podaci za prijavu nisu validni!';
            return $ret;
        }

        // Check the user card entry.
        $userEntry = $this->checkUserEntry($params);
        if(isset($userEntry['card_id']) && !empty($userEntry['card_id'])){
            $ret['status_code'] = Response::HTTP_UNAUTHORIZED;
            $ret['message'] = 'Dostigli ste maksimalan broj prijava u jednom danu, novu prijavu možete izvršiti sledećeg dana!';
            return $ret;
        }

        // Insert reception in DB.
        $reception = ReceptionModel::create([
            'object_id' => $params['object_uuid'],
            'card_id' => $params['card_uuid'],
        ]);

        // Find a user.
        $user = Card::find($reception['card_id'])->user;
        // Find a gym.
        $object = GymObject::find($reception['object_id']);

        // Response.
        $ret['data'] = [
            'object_name' => $object['name'],
            'first_name' => $user['first_name'],
            'last_name' => $user['last_name'],

        ];
        $ret['message'] = 'Uspešno ste se prijavili.';
        $ret['status'] = 'OK';

        return $ret;
    }

    /**
     * Check if the user has entered the gym during the day.
     *
     * @param $params
     */
    public function checkUserEntry($params)
    {
        $reception = new ReceptionModel;

        $currentDate = date('Y-m-d');

        $query = DB::table($reception->table . ' as r')
            ->select([
                'r.card_id'
            ])
            ->where('r.card_id', $params['card_uuid'])
            ->whereRaw('DATE(r.entry_date) = ?', $currentDate)
        ;

        return json_decode(json_encode($query->first()), true);
    }
}
