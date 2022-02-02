<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Alert;

class AddAlertTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $emails = array();
        $emails[0] = 'franc.javier.flores@gmail.com';
        $emails[1] = 'fjavier.flores@hotmail.com';
        $alert = new Alert();
        $alert->id = 1;
        $alert->type = 'sensor';
        $alert->email = json_encode($emails);
        $alert->title = 'Hola estimado(a) este mensage requiere de tu atención !!';
        $alert->body = 'A continuación se describe la alerta de IoT-Hotspot';
        $alert->footer = 'Para más detalles visita el link';
        $alert->save();
    }
}
