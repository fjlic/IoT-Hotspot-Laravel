<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Crd;
use App\Erb;
use App\Qr;
use App\HistorialQr;

class AddHistorialQrTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $crds = Crd::all();
        $erbs = Erb::all();
        $qrs = Qr::all();
        foreach ($crds as $key => $crd) {
            foreach ($qrs as $key => $qr) {
                if($qr->coins > 0){
                    $historialqr = new HistorialQr;
                    $historialqr->qr_id = $crd->id;
                    $historialqr->name_machine = $crd->name_machine;
                    $historialqr->nick_name = $crd->nick_name;
                    $historialqr->qr_serie = $qr->qr_serie;
                    $historialqr->coins = ($qr->coins - 1);
                    $historialqr->save();
                    $qr->coins = $historialqr->coins;
                    $qr->save();
                }
            }
        }

        /*foreach ($erbs as $key => $erb) {
            foreach ($qrs as $key => $qr) {
                if($qr->coins > 0){
                    $historialqr = new HistorialQr;
                    $historialqr->qr_id = $erb->id;
                    $historialqr->name_machine = $erb->name_machine;
                    $historialqr->nick_name = $erb->nick_name;
                    $historialqr->qr_serie = $qr->qr_serie;
                    $historialqr->coins = ($qr->coins - 1);
                    $historialqr->save();
                    $qr->coins = $historialqr->coins;
                    $qr->save();  
                }
            }
        }*/
    }
}
