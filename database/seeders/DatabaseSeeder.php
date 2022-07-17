<?php

namespace Database\Seeders;

use App\Models\Reason;
use App\Models\User;
use App\Models\user\Warehouse;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $user = User::updateOrCreate([
            'name' => "Shakeel Ahmad",
            'email' => "shakeel2717@gmail.com",
            'password' => Hash::make('asdfasdf'),
            'status' => true,
            'role' => 'user',
        ]);

        $user = User::updateOrCreate([
            'name' => "Test Account",
            'email' => "test@test.com",
            'password' => Hash::make('asdfasdf'),
            'status' => true,
            'role' => 'user',
        ]);

        $reasons = [
            [
                'user_id' => 1,
                'value' => 'Damaged',
                'status' => true,
            ],
            [
                'user_id' => 1,
                'value' => 'Missing',
                'status' => true,
            ],
            [
                'user_id' => 1,
                'value' => 'Wrong',
                'status' => true,
            ],
            [
                'user_id' => 1,
                'value' => 'Other',
                'status' => true,
            ],
        ];

        foreach ($reasons as $reason) {
            Reason::updateOrCreate($reason);
        }



        Warehouse::factory(510)->create();
        // User::factory(10)->create();

    }
}
