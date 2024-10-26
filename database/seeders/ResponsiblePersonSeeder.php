<?php

namespace Database\Seeders;

use App\Models\ResponsiblePerson;
use App\Supports\UserData;
use Illuminate\Database\Seeder;

class ResponsiblePersonSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = UserData::all();
        
        foreach ($users as $user) {
            ResponsiblePerson::create(['name'=>$user['name']]);
        }
    }
}
