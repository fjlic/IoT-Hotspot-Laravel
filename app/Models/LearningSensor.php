<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LearningSensor extends Model
{
    /**
     * The attributes that are mass assignable.
     * Part Name : MDL
     * * Part Size : 15.1
     * @var array
     */
    protected $fillable = [
        'id', 'statistical_sensor_id', 'elements', 'start_time', 'finish_time', 'total_time', 'difer_time', 'sample',
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
}
