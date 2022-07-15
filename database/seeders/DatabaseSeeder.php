<?php

namespace Database\Seeders;

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

        Warehouse::factory(50)->create();
        User::factory(50)->create();

    }
}
