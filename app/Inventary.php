<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Inventary extends Model
{
    protected $fillable = [
        'inventary_number', 'serial_number', 'property_id'
    ];

    public function property() {
        return $this->belongsTo('App\Property');
    }
}
