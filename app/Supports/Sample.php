<?php
namespace App\Supports;

class Sample{

    public static function asset():array{
        return ['โต๊ะ','เก้าอี้','คอมพิวเตอร์','กีตาร์','กล้อง'];
    }

    public static function location():array{
        return [
            'ห้องงบประมาณและแผนงาน',
            'ห้องผู้อำนวยการ',
            'ห้องงานบุคคล',
            'ห้องวิชาการ',
            'ห้องบริหารงานทั่วไป',
        ];
        
    }

    public static function status():array{
        return AssetStatus::all();
    }

    public static function person():array{
        return array_map(fn($user)=>$user['name'],UserData::all());
    }
}