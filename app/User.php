<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laratrust\Traits\LaratrustUserTrait;

class User extends Authenticatable
{
    use LaratrustUserTrait;
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'region_id','name', 'email', 'password', 'branch_office', 'serial_number',
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

    /**
     * Get the user record  type hostpot.
     */
    public function region()
    {
        return $this->belongsTo('App\Region', 'id');
    }

    /**
     * Get the crd for the user.
     */
    public function crd()
    {
        return $this->hasMany('App\Crd','user_id');
    }

    /**
     * Get the crd for the user.
     */
    public function erb()
    {
        return $this->hasMany('App\Erb','user_id');
    }
}
