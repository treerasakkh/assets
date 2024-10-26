<?php

namespace Database\Seeders;

use App\Models\ItemName;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            UserSeeder::class,
            LocationSeeder::class,
            ResponsiblePersonSeeder::class,
            ItemNameSeeder::class,
            AssetSeeder::class,
        ]);
    }
}
