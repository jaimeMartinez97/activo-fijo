<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Assignment extends Model
{
    protected $fillable = [
        'unity', 'description', 'locality_id', 'municipality_id', 'state_id'
    ];

    public function locality() {
        return $this->belongsTo('App\Locality');
    }

    public function municipality() {
        return $this->belongsTo('App\Municipality');
    }

    public function state() {
        return $this->belongsTo('App\State');
    }
}
