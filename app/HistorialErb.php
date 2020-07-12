<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HistorialErb extends Model
{
    //
     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id', 'user_id', 'name_machine', 'nick_name', 'password', 'api_token',
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
     * Get the user record associated with the hostpot.
     */
    public function erb()
    {
        return $this->belongsTo('App\Erb', 'id');
    }
}
