<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DeliveryItem extends Model
{
    protected $fillable = [
        'delivery_id',
        'item_id',
        'quantity'
    ];
    public function item()
{
    return $this->belongsTo(Item::class);
}
}
