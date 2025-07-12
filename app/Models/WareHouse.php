<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WareHouse extends Model
{
    protected $fillable = [
        'name',
        'address',
        'capacity',
    ];

    public function deliveries(){
        return $this->hasMany(Delivery::class);
    }
    
    public function wareHouseItems(){
        return $this->hasMany(WareHouseItem::class);
    }
}
