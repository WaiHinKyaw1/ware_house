<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RouteInfo extends Model
{
    protected $fillable = [
        "start",
        "end",
        "distance_km",
        "distance_miles",
        "duration_minutes",
        "charge",
        "supply_request_id"
    ];

    public function supplyRequest()
    {
        return $this->belongsTo(SupplyRequest::class);
    }

    public function truck()
    {
        return $this->belongsTo(Truck::class);
    }
}
