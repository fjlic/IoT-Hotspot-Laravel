<?php

use Illuminate\Database\Seeder;
use App\Crd;
use App\Erb;
use App\Nfc;
use App\HistorialNfc;

class AddHistorialNfcTableSeeder extends Seeder
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
         $nfccoins = Nfc::all();
         foreach ($crds as $key => $crd) {
             foreach ($nfccoins as $key => $nfccoin) {
                     $historialnfc = new HistorialNfc;
                     $historialnfc->nfc_id = $nfccoin->id;
                     $historialnfc->name_machine = $crd->name_machine;
                     $historialnfc->nick_name = $crd->nick_name;
                     $historialnfc->num_serie = $nfccoin->num_serie;
                     $historialnfc->count_global = $nfccoin->count_global + 1;
                     $historialnfc->count_between_cuts = $nfccoin->count_between_cuts + 1;
                     $historialnfc->time_global_between_cuts = $nfccoin->time_global_between_cuts + 5;
                     $historialnfc->time_between_cuts = $nfccoin->time_between_cuts + 3;
                     $historialnfc->prizes_count = $nfccoin->prizes_count + 1;
                     $historialnfc->text = "test historial".$nfccoin->id;
                     $historialnfc->uploaded = 0;
                     $historialnfc->save();
             }
        }

        $erbs = Erb::all();
         $nfccoins = Nfc::all();
         foreach ($erbs as $key => $erb) {
             foreach ($nfccoins as $key => $nfccoin) {
                     $historialnfc = new HistorialNfc;
                     $historialnfc->nfc_id = $nfccoin->id;
                     $historialnfc->name_machine = $erb->name_machine;
                     $historialnfc->nick_name = $erb->nick_name;
                     $historialnfc->num_serie = $nfccoin->num_serie;
                     $historialnfc->count_global = $nfccoin->count_global + 1;
                     $historialnfc->count_between_cuts = $nfccoin->count_between_cuts + 1;
                     $historialnfc->time_global_between_cuts = $nfccoin->time_global_between_cuts + 5;
                     $historialnfc->time_between_cuts = $nfccoin->time_between_cuts + 3;
                     $historialnfc->prizes_count = $nfccoin->prizes_count + 1;
                     $historialnfc->text = "test historial".$nfccoin->id;
                     $historialnfc->uploaded = 0;
                     $historialnfc->save();
             }
         }
    }
}
