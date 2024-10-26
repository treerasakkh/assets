<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Asset;
use App\Supports\Sample;
use Faker\Factory as Faker;

class AssetSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        $statuses = Sample::status();

        // สร้างข้อมูลสินทรัพย์ 5 รายการ
        foreach (range(1, 5) as $index) {
            Asset::create([
                'item_name_id' => $faker->numberBetween(1,5),
                'brand_model' => $faker->word . ' ' . $faker->word,  
                'amount'=>$faker->numberBetween(1,20),
                'location_id' => $faker->numberBetween(1,10),  
                'image' => $faker->imageUrl(),  
                'status' => $faker->randomElement($statuses),  
                'responsible_person_id' => $faker->numberBetween(1,10), 
                'user_id' => $faker->numberBetween(1,10), 
            ]);
        }
    }
}
