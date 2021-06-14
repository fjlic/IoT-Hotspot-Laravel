<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\HistorialCounter;

class AddHistorialCounterTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $historialcounter = new HistorialCounter();
        $historialcounter->id = 1;
        $historialcounter->counter_id = 1;
        $historialcounter->num_serie = '70000000001';
        $historialcounter->cont_qr = '1';
        $historialcounter->cont_mon = '1';
        $historialcounter->save();

        $historialcounter = new HistorialCounter();
        $historialcounter->id = 2;
        $historialcounter->counter_id = 1;
        $historialcounter->num_serie = '70000000001';
        $historialcounter->cont_qr = '2';
        $historialcounter->cont_mon = '2';
        $historialcounter->save();

        $historialcounter = new HistorialCounter();
        $historialcounter->id = 3;
        $historialcounter->counter_id = 1;
        $historialcounter->num_serie = '70000000001';
        $historialcounter->cont_qr = '3';
        $historialcounter->cont_mon = '3';
        $historialcounter->save();

        $historialcounter = new HistorialCounter();
        $historialcounter->id = 4;
        $historialcounter->counter_id = 1;
        $historialcounter->num_serie = '70000000001';
        $historialcounter->cont_qr = '4';
        $historialcounter->cont_mon = '4';
        $historialcounter->save();

        $historialcounter = new HistorialCounter();
        $historialcounter->id = 5;
        $historialcounter->counter_id = 1;
        $historialcounter->num_serie = '70000000001';
        $historialcounter->cont_qr = '5';
        $historialcounter->cont_mon = '5';
        $historialcounter->save();
    }
}
