<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    //
    /**
     * The attributes that are mass assignable.
     * Part Name : MDL
     * * Part Size : 15.
     * @var array
     */
    protected $fillable = [
        'id', 'name_file', 'set', 'route',
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
