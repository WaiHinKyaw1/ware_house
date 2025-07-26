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

    public function items()
    {
        return $this->hasMany(DeliveryItem::class);
    }

    public function supplyRequest()
    {
        return $this->belongsTo(SupplyRequest::class)->with('supplyRequestItems','routeInfos');
    }

    public function wareHouse()
    {
        return $this->belongsTo(WareHouse::class);
    }
    public function truck()
    {
        return $this->belongsTo(Truck::class);
    }
}
