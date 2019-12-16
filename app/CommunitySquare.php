<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CommunitySquare extends Model
{
    protected $fillable = [
        'UO', 'description', 'unity_type', 'icve_unity_type', 'job_type', 'zone_coordinators_id'
    ];
}
