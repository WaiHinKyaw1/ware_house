<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SupplyRequestItem extends Model
{
    protected $fillable =[
        "supply_request_id",
        "item_id",
        "quantity"
    ];
    public function item(){
        return $this->belongsTo(Item::class);
    }
    public function supplyRequest(){
        return $this->belongsTo(SupplyRequest::class);
    }
}
