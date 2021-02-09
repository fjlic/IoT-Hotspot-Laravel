<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Statistical;

class AddStatisticalTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *  Part Name : SED
     * * Part Size : 5.1
     * @return void
     */
    public function run()
    {
        //
        $statistical = new Statistical();
        $statistical->id = 1;
        $statistical->estimate_proxy_size = 160;
        $statistical->development_hours = 15.0;
        $statistical->save();

        $statistical = new Statistical();
        $statistical->id = 2;
        $statistical->estimate_proxy_size = 591;
        $statistical->development_hours = 69.9;
        $statistical->save();
        
        $statistical = new Statistical();
        $statistical->id = 3;
        $statistical->estimate_proxy_size = 114;
        $statistical->development_hours = 6.5;
        $statistical->save();

        $statistical = new Statistical();
        $statistical->id = 4;
        $statistical->estimate_proxy_size = 229;
        $statistical->development_hours = 22.4;
        $statistical->save();

        $statistical = new Statistical();
        $statistical->id = 5;
        $statistical->estimate_proxy_size = 230;
        $statistical->development_hours = 28.4;
        $statistical->save();

        $statistical = new Statistical();
        $statistical->id = 6;
        $statistical->estimate_proxy_size = 270;
        $statistical->development_hours = 65.9;
        $statistical->save();

        $statistical = new Statistical();
        $statistical->id = 7;
        $statistical->estimate_proxy_size = 128;
        $statistical->development_hours = 19.4;
        $statistical->save();

        $statistical = new Statistical();
        $statistical->id = 8;
        $statistical->estimate_proxy_size = 1657;
        $statistical->development_hours = 198.7;
        $statistical->save();

        $statistical = new Statistical();
        $statistical->id = 9;
        $statistical->estimate_proxy_size = 624;
        $statistical->development_hours = 38.8;
        $statistical->save();

        $statistical = new Statistical();
        $statistical->id = 10;
        $statistical->estimate_proxy_size = 1503;
        $statistical->development_hours = 138.2;
        $statistical->save();

    }
}
