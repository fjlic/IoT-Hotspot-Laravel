<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProbeEstimating extends Model
{
     //
    /**
     * The attributes that are mass assignable.
     * Part Name : MDL
     * * Part Size : 15.
     * @var array
     */
    protected $fillable = [
        'id', 'prox_size', 'mod_size', 'stm_prox_size', 'act_dev_size',
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
