<?php
namespace App\Supports;

class AssetStatus{
    public static function all():array{
        return ['ใช้งานอยู่','กำลังซ่อม','รอจำหน่าย'];
    }
}