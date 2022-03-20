<?php

namespace Database\Seeders;

use App\Models\Card;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        $faker = Faker::create();

        foreach (range(1,10) as $index) {
            DB::table('users')->insert([
                'id'=> Str::uuid(),
                'first_name' => $faker->firstName,
                'last_name' => $faker->lastName,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);

            DB::table('objects')->insert([
                'id'=> Str::uuid(),
                'name' => $faker->name,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);

            DB::table('cards')->insert([
                'id'=> Str::uuid(),
                'card_number' => strtoupper(Str::random(8)),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
        }

        DB::table('users')->insert([
            'id'=> Str::uuid(),
            'first_name' => 'John',
            'last_name' => 'Doe',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('objects')->insert([
            'id'=> Str::uuid(),
            'name' => 'GeekFit',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        $cards = Card::all();
        $user = User::where('first_name', 'John')->where('last_name', 'Doe')->first();
        if(!empty($user)){
            foreach ($cards as $card){
                Card::where('id', $card->id)->update([
                    'user_id' => $user->id
                ]);
            }
        }

    }
}
