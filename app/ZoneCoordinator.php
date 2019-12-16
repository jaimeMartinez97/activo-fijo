<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ZoneCoordinator extends Model
{
    protected $fillable = [
        'name', 'address', 'colony', 'zip_code', 'phone'
    ];
}
