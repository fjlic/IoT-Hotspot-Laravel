<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ClassName extends Model
{
    /**
     * The attributes that are mass assignable.
     * Part Name : MDL
     * * Part Size : 15.
     * @var array
     */
    protected $fillable = [
        'id', 'class_name', 'class_loc', 'num_method',
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
