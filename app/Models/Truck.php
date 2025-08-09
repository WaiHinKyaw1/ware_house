<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Truck extends Model
{
    protected $fillable =[
        'plate_no',
        'model',
        'driver_id',
        'capacity',
        'status',
        'ware_house_id'
    ];

    public function driver()
    {
        return $this->belongsTo(Driver::class);
    }
    public function rotueInfos(){
        return $this->hasMany(RouteInfo::class);
    }
    public function wareHouse()
    {
        return $this->belongsTo(wareHouse::class);
    }
}
