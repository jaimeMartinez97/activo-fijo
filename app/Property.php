<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    protected $fillable = [
        'brand',
        'model',
        'general_description',
        'color',
        'given',
        'vehicle_description',
        'full_description',
        'supplier',
        'price',
        'object_expenses_id',
        'property_types_id'
    ];

    public function property_type() {
        return $this->belongsTo('App\PropertyType', 'property_types_id');
    }

    public function object_expense() {
        return $this->belongsTo('App\ObjectExpense', 'object_expenses_id');
    }
}
