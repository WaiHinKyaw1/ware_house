<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SupplyRequestItem extends Model
{
    protected $fillable =[
        "supply_request_id",
        "ware_house_id",
        "item_id",
        "quantity"
    ];
    public function item(){
        return $this->belongsTo(Item::class);
    }
    public function wareHouse(){
        return $this->belongsTo(WareHouse::class);
    }
    public function supplyRequest(){
        return $this->belongsTo(SupplyRequest::class);
    }
}
