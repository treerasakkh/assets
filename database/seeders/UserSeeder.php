<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Supports\UserData;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $userData = UserData::all();

        $users = array_map(function($user){
            return [
                'name' => $user['name'],
                'email' => $user['email'],
                'password' => Hash::make('12345678'),
                'is_admin' => false,
            ];
        },$userData);
        
        foreach ($users as $user) {
            User::create($user);
        }
    }
}
