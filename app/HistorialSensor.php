<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HistorialSensor extends Model
{
    //
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id', 'sensor_id', 'num_serie', 'passw', 'vol_1', 'vol_1', 'vol_2', 'vol_3', 'temp_1', 'temp_2', 'temp_3', 'temp_4',
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
    public function sensor()
    {
        return $this->belongsTo('App\Sensor', 'id');
    }
}
