<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Delivery extends Model
{
    protected $fillable = [
        'supply_request_id',
        'ware_house_id',
        'delivery_date',
        'status',
        'delivery_cost',
        'truck_id'
    ];

    public function supplyRequest()
    {
        return $this->belongsTo(SupplyRequest::class);
    }

    public function wareHouse()
    {
        return $this->belongsTo(WareHouse::class);
    }
}
