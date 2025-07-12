<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SupplyRequest extends Model
{
    protected $fillable = [
        'ngo_id',
        'request_date',
        'status',
    ];
    public function ngo()
    {
        return $this->belongsTo(Ngo::class);
    }
    public function deliveries()
    {
        return $this->hasMany(Delivery::class);
    }
    public function routeInfos(){
        return $this->hasMany(RouteInfo::class);
    }
    public function supplyRequestItems(){
        return $this->hasMany(SupplyRequestItem::class);
    }

}
