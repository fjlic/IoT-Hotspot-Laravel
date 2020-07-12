<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class ApiToken extends Model
{
    //
    public static function GenerateToken16()
    {
       return Str::random(16); 
    }
    
    public static function GenerateToken32()
    {
       return Str::random(32); 
    }

    public static function GenerateToken64()
    {
       return Str::random(64); 
    }
}
