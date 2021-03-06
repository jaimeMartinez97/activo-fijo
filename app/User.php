<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'father_lastname',
        'mother_lastname',
        'position',
        'job',
        'unity',
        'reason',
        'character',
        'state',
        'assignment_id',
        'role_id',
        'zone_coordinators_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function assignment(){
        return $this->belongsTo('App\Assignment');
    }

    public function properties(){
        return $this->belongsToMany('App\Property')->with('property_type', 'object_expense', 'inventaries')->withTimestamps();
    }
}
