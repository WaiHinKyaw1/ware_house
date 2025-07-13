<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ngo extends Model
{
    protected $table = 'ngos';
    protected $fillable = [
        "name",
        "contact_person",
        "phone",
        "email",
        "address",
    ];

    public function users(){
        return $this->hasMany(User::class);
    }
    public function wareHouseItems(){
        return $this->hasMany(WareHouseItem::class);
    }
}
