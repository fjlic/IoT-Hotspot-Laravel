<?php

namespace App\Models;

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

    function random_float($min=16, $max=25, $decimals=2){
      $div = pow(10, $decimals);
      // Syntax: mt_rand(min, max);
      return mt_rand($min * $div, $max * $div) / $div;
    }

    function average_temperature($temper_1=0, $temper_2=0, $temper_3=0, $temper_4=0)
    {
      $temp_value = 0;
      $temp_aver = 0;
      
      if($temper_1 != 0)
      {
         $temp_value += 1;
         $temp_aver += $temper_1;
      }
      if($temper_2 != 0)
      {
         $temp_value += 1;
         $temp_aver += $temper_2;
      } 
      if($temper_3 != 0)
      {
         $temp_value += 1;
         $temp_aver += $temper_3;
      }
      if($temper_4 != 0)
      {
         $temp_value += 1;
         $temp_aver += $temper_4;
      }
      return ($temp_aver / $temp_value);
    }
}
