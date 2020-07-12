<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HistorialQr extends Model
{
    //
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name_machine', 'nick_name', 'qr_link', 'coins',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        
    ];

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
    public function qr()
    {
        return $this->belongsTo('App\Qr', 'id');
    }
}
