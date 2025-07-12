<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Driver extends Model
{
    protected $fillable = [
        'name',
        'license_no',
        'phone',
        'status',
    ];
    public function trucks()
    {
        return $this->hasMany(Truck::class);
    }
}
