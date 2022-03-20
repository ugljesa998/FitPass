<?php

namespace App\Http\Controllers;

use App\Interface\ReceptionInterface;
use App\Http\Requests\ReceptionRequest;
use Illuminate\Support\Facades\Response;
use Illuminate\Http\JsonResponse;

class ReceptionController extends Controller
{
    /**
     * Reception user.
     *
     * @var ReceptionInterface
     */
    private ReceptionInterface $reception;

    public function __construct(ReceptionInterface $reception)
    {
        $this->reception = $reception;
    }

    /**
     * Get user reception status.
     *
     * @param ReceptionRequest $request
     * @return JsonResponse
     */
    public function getUserReception(ReceptionRequest $request): JsonResponse
    {
        $params = $request->only([
            'object_uuid',
            'card_uuid'
        ]);

        $data = $this->reception->getUserReception($params);

        return Response::json($data)->setStatusCode($data['status_code']);

    }
}
