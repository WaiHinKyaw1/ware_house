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
        'status'
    ];

    public function driver()
    {
        return $this->belongsTo(Driver::class);
    }
    public function rotueInfos(){
        return $this->hasMany(RouteInfo::class);
    }
}
