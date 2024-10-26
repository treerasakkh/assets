<?php

namespace Database\Seeders;

use App\Models\ItemName;
use Illuminate\Database\Seeder;

class ItemNameSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $names = ['โต๊ะ','เก้าอี้','คอมพิวเตอร์','กีตาร์','กล้อง'];

        foreach($names as $name){
            ItemName::create(['name' => $name]);
        }
    }
}
