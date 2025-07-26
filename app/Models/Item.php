<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
    
class Item extends Model
{
    protected $fillable = [
        "name",
        "description",
        "unit",
    ];
    public function supplyRequestItems(){
        return $this->hasMany(SupplyRequestItem::class);
    }

    public function wareHouseItems(){
        return $this->hasMany(WareHouseItem::class);
    }
}
