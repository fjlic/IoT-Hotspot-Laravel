<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Counter extends Model
{
    //
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id', 'crd_id', 'erb_id', 'nfc_id', 'num_serie', 'cont_qr', 'cont_mon',
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
     * Get the hostpot for the blog crd.
     */
    public function historialcounter()
    {
        return $this->hasMany('App\HistorialCounter','counter_id');
    }
}
