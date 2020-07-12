<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HistorialNfc extends Model
{
    //
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id', 'nfc_id', 'num_serie', 'key_1', 'key_2', 'key_3', 'key_4', 'key_5', 'ssid', 'password', 'dns_server', 'ip_server', 'protocol', 'port', 'text',
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
    public function nfc()
    {
        return $this->belongsTo('App\Nfc', 'id');
    }
}
