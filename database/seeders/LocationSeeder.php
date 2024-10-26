<?php

namespace Database\Seeders;

use App\Models\Location;
use Illuminate\Database\Seeder;

class LocationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $beginRooms = [
            "ห้องแผนงานงบประมาณ", "ห้องบุคคล",
            "ห้องวิชาการ", "ห้องบริหารงานทั่วไป",
            "ห้องผู้อำนวยการ",
            'ห้อง ม.1/1', 'ห้อง ม.1/2',
            'ห้อง ม.2/1', 'ห้อง ม.2/2',
            'ห้อง ม.3/1', 'ห้อง ม.3/2',
            'ห้อง ม.4/1', 'ห้อง ม.4/2',
            'ห้อง ม.5/1', 'ห้อง ม.5/2',
            'ห้อง ม.6/1', 'ห้อง ม.6/2'
        ];

        foreach ($beginRooms as $room) {
            Location::create([
                'name' => $room,
                'number' => "-"
            ]);
        }
    }
}
