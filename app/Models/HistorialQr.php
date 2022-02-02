<?php

namespace App\Models;

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
        'id', 'qr_id', 'qr_serie', 'coins', 'uploaded',
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
        return $this->belongsTo('App\Models\Qr', 'id');
    }
}
