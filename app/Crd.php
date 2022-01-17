<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laratrust\Traits\LaratrustUserTrait;

class Crd extends Model
{
    use LaratrustUserTrait;
    use Notifiable;


    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
       'id','user_id', 'name_machine', 'nick_name', 'password', 'api_token', 'status_video',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    //protected $hidden = [
    //    'password', 
    //];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
    ];

    /**
     * Get the user record  type hostpot.
     */
    public function user()
    {
        return $this->belongsTo('App\User', 'id');
    }

    /**
     * Get the hostpot for the blog crd.
     */
    public function qr()
    {
        return $this->belongsToMany('App\Qr','crd_id');
    }

    /**
     * Get the hostpot for the blog crd.
     */
    public function nfc()
    {
        return $this->belongsToMany('App\Nfc','crd_id');
    }
}
