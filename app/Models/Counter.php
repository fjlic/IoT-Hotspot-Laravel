<?php

namespace App\Models;

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
        'id', 'crd_id', 'erb_id', 'nfc_id', 'num_serie', 'cont_qr', 'cont_mon',  'cont_corte',  'cont_prem',
        'ssid',  'passwd',  'ip_server',  'port',  'token', 'type', 'text', 
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
        return $this->hasMany('App\Models\HistorialCounter','counter_id');
    }

    /**
     * Get the user record associated with the hostpot.
     */
    public function erb()
    {
        return $this->belongsTo('App\Models\Erb', 'id');
    }

    /**
     * Get the user record associated with the hostpot.
     */
    public function crd()
    {
        return $this->belongsTo('App\Models\Crd', 'id');
    }

    /**
     * Get the user record associated with the hostpot.
     */
    public function nfc()
    {
        return $this->belongsTo('App\Models\Nfc', 'id');
    }
}
