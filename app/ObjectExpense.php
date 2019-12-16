<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ObjectExpense extends Model
{
    protected $fillable = [
        'COG', 'description'
    ];
}
