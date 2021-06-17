<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Nfc extends Model
{
    //
    //use HasApiTokens, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $fillable = [
        'id', 'crd_id', 'erb_id', 'num_serie', 'cont_qr', 'cont_mon', 
        'cont_mon_2', 'cont_corte', 'cont_prem', 'cost_mon', 'ssid', 'passwd', 'ip_server', 'port', 'txt',
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
    public function historialnfc()
    {
        return $this->hasMany('App\HistorialNfc','nfc_id');
    }

    /**
     * Get the user record associated with the hostpot.
     */
    public function crd()
    {
        return $this->belongsToMany('App\Crd', 'id');
    }

    /**
     * Get the user record associated with the hostpot.
     */
    public function erb()
    {
        return $this->belongsToMany('App\Erb', 'id');
    }
}
