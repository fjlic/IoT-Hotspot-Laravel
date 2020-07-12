<?php

use Illuminate\Database\Seeder;
use App\Nfc;

class AddNfcTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $nfccoin = new Nfc();
        $nfccoin->id = 1;
        $nfccoin->crd_id = null;
        $nfccoin->erb_id = null;
        $nfccoin->num_serie = '777597840';
        $nfccoin->count_global = '6500';
        $nfccoin->count_between_cuts = '260';
        $nfccoin->time_global_between_cuts = '1200';
        $nfccoin->time_between_cuts = '120';
        $nfccoin->prizes_count = '110';
        $nfccoin->ssid = 'nfc_1';
        $nfccoin->password = 'nfc123';
        $nfccoin->ip_server = '192.168.0.100';
        $nfccoin->port = '13003';
        $nfccoin->text = 'Prueba Nfc 1 Ok';
        $nfccoin->save();

        $nfccoin = new Nfc();
        $nfccoin->id = 2;
        $nfccoin->crd_id = null;
        $nfccoin->erb_id = null;
        $nfccoin->num_serie = '777597841';
        $nfccoin->count_global = '6600';
        $nfccoin->count_between_cuts = '230';
        $nfccoin->time_global_between_cuts = '1220';
        $nfccoin->time_between_cuts = '130';
        $nfccoin->prizes_count = '115';
        $nfccoin->ssid = 'nfc_2';
        $nfccoin->password = 'nfc123';
        $nfccoin->ip_server = '192.168.0.100';
        $nfccoin->port = '13003';
        $nfccoin->text = 'Prueba Nfc 2 Ok';
        $nfccoin->save();

        $nfccoin = new Nfc();
        $nfccoin->id = 3;
        $nfccoin->crd_id = null;
        $nfccoin->erb_id = null;
        $nfccoin->num_serie = '777597843';
        $nfccoin->count_global = '6400';
        $nfccoin->count_between_cuts = '245';
        $nfccoin->time_global_between_cuts = '1150';
        $nfccoin->time_between_cuts = '145';
        $nfccoin->prizes_count = '115';
        $nfccoin->ssid = 'nfc_3';
        $nfccoin->password = 'nfc123';
        $nfccoin->ip_server = '192.168.0.100';
        $nfccoin->port = '13003';
        $nfccoin->text = 'Prueba Nfc 3 Ok';
        $nfccoin->save();

        $nfccoin = new Nfc();
        $nfccoin->id = 4;
        $nfccoin->crd_id = null;
        $nfccoin->erb_id = null;
        $nfccoin->num_serie = '777597844';
        $nfccoin->count_global = '6400';
        $nfccoin->count_between_cuts = '245';
        $nfccoin->time_global_between_cuts = '1150';
        $nfccoin->time_between_cuts = '145';
        $nfccoin->prizes_count = '115';
        $nfccoin->ssid = 'nfc_4';
        $nfccoin->password = 'nfc123';
        $nfccoin->ip_server = '192.168.0.100';
        $nfccoin->port = '13003';
        $nfccoin->text = 'Prueba Nfc 4 Ok';
        $nfccoin->save();

        $nfccoin = new Nfc();
        $nfccoin->id = 5;
        $nfccoin->crd_id = null;
        $nfccoin->erb_id = null;
        $nfccoin->num_serie = '777597845';
        $nfccoin->count_global = '6200';
        $nfccoin->count_between_cuts = '244';
        $nfccoin->time_global_between_cuts = '1180';
        $nfccoin->time_between_cuts = '155';
        $nfccoin->prizes_count = '105';
        $nfccoin->ssid = 'nfc_5';
        $nfccoin->password = 'nfc123';
        $nfccoin->ip_server = '192.168.0.100';
        $nfccoin->port = '13003';
        $nfccoin->text = 'Prueba Nfc 5 Ok';
        $nfccoin->save();

        $nfccoin = new Nfc();
        $nfccoin->id = 6;
        $nfccoin->crd_id = null;
        $nfccoin->erb_id = null;
        $nfccoin->num_serie = '777597846';
        $nfccoin->count_global = '6900';
        $nfccoin->count_between_cuts = '212';
        $nfccoin->time_global_between_cuts = '4578';
        $nfccoin->time_between_cuts = '1234';
        $nfccoin->prizes_count = '115';
        $nfccoin->ssid = 'nfc_6';
        $nfccoin->password = 'nfc123';
        $nfccoin->ip_server = '192.168.0.100';
        $nfccoin->port = '13003';
        $nfccoin->text = 'Prueba Nfc 6 Ok';
        $nfccoin->save();

        $nfccoin = new Nfc();
        $nfccoin->id = 7;
        $nfccoin->crd_id = null;
        $nfccoin->erb_id = null;
        $nfccoin->num_serie = '777597847';
        $nfccoin->count_global = '6789';
        $nfccoin->count_between_cuts = '215';
        $nfccoin->time_global_between_cuts = '2465';
        $nfccoin->time_between_cuts = '112';
        $nfccoin->prizes_count = '116';
        $nfccoin->ssid = 'nfc_7';
        $nfccoin->password = 'nfc123';
        $nfccoin->ip_server = '192.168.0.100';
        $nfccoin->port = '13003';
        $nfccoin->text = 'Prueba Nfc 7 Ok';
        $nfccoin->save();

        $nfccoin = new Nfc();
        $nfccoin->id = 8;
        $nfccoin->crd_id = null;
        $nfccoin->erb_id = null;
        $nfccoin->num_serie = '777597848';
        $nfccoin->count_global = '6426';
        $nfccoin->count_between_cuts = '279';
        $nfccoin->time_global_between_cuts = '1451';
        $nfccoin->time_between_cuts = '162';
        $nfccoin->prizes_count = '184';
        $nfccoin->ssid = 'nfc_8';
        $nfccoin->password = 'nfc123';
        $nfccoin->ip_server = '192.168.0.100';
        $nfccoin->port = '13003';
        $nfccoin->text = 'Prueba Nfc 8 Ok';
        $nfccoin->save();

        $nfccoin = new Nfc();
        $nfccoin->id = 9;
        $nfccoin->crd_id = null;
        $nfccoin->erb_id = null;
        $nfccoin->num_serie = '777597849';
        $nfccoin->count_global = '6450';
        $nfccoin->count_between_cuts = '244';
        $nfccoin->time_global_between_cuts = '1980';
        $nfccoin->time_between_cuts = '455';
        $nfccoin->prizes_count = '155';
        $nfccoin->ssid = 'nfc_9';
        $nfccoin->password = 'nfc123';
        $nfccoin->ip_server = '192.168.0.100';
        $nfccoin->port = '13003';
        $nfccoin->text = 'Prueba Nfc 9 Ok';
        $nfccoin->save();

        $nfccoin = new Nfc();
        $nfccoin->id = 10;
        $nfccoin->crd_id = null;
        $nfccoin->erb_id = null;
        $nfccoin->num_serie = '777597850';
        $nfccoin->count_global = '6400';
        $nfccoin->count_between_cuts = '244';
        $nfccoin->time_global_between_cuts = '1548';
        $nfccoin->time_between_cuts = '153';
        $nfccoin->prizes_count = '124';
        $nfccoin->ssid = 'nfc_10';
        $nfccoin->password = 'nfc123';
        $nfccoin->ip_server = '192.168.0.100';
        $nfccoin->port = '13003';
        $nfccoin->text = 'Prueba Nfc 10 Ok';
        $nfccoin->save();
    }
}
