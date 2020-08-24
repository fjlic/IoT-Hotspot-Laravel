<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sensor extends Model
{
    //
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id', 'erb_id', 'num_serie', 'passw', 'vol_1', 'vol_1', 'vol_2', 'vol_3',
        'door_1', 'door_2', 'door_3', 'door_4', 'rlay_1', 'rlay_2', 'rlay_3', 'rlay_4', 'text',
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
    public function erb()
    {
        return $this->belongsToMany('App\Erb', 'id');
    }

    /**
     * Get the hostpot for the blog crd.
     */
    public function historialsensor()
    {
        return $this->hasMany('App\HistorialSensor','sensor_id');
    }
}
