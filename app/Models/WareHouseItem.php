<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WareHouseItem extends Model
{
    protected $fillable = [
        'ware_house_id',
        'item_id',
        'quantity',
        'ngo_id',
    ];

    public function item()
    {
        return $this->belongsTo(Item::class);
    }

    public function ngo()
    {
        return $this->belongsTo(Ngo::class);
    }

    public function wareHouse()
    {
        return $this->belongsTo(WareHouse::class);
    }
}
