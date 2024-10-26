<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Asset extends Model
{
    use HasFactory;

    protected $fillable = [
        'item_name_id',
        'brand_model',
        'location_id',
        'amount',
        'image',
        'status',
        'responsible_person_id',
        'user_id',
    ];


    public function itemName()
    {
        return $this->belongsTo(ItemName::class);
    }

    public function location()
    {
        return $this->belongsTo(Location::class);
    }

    public function responsiblePerson()
    {
        return $this->belongsTo(ResponsiblePerson::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }
}