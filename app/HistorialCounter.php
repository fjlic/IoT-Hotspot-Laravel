<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HistorialCounter extends Model
{
    //
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id', 'counter_id', 'num_serie', 'cont_qr', 'cont_mon', 'cont_mon_2', 'cont_corte',  'cont_prem', 'cost_mon',
        'ssid',  'passwd',  'ip_server',  'port', 'token', 'type',  'text',
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
    public function counter()
    {
        return $this->belongsTo('App\Counter','id');
    }
}
