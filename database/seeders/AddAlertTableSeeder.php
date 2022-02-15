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
        $emails[0] = 'support@fjlic.com';
        $emails[1] = 'franc.javier.flores@gmail.com';
        $alert = new Alert();
        $alert->id = 1;
        $alert->type = 'sensor';
        $alert->email = json_encode($emails);
        $alert->title = 'Hello, this message requires your attention !!';
        $alert->body = 'The IoT-Hotspot alert is described below';
        $alert->footer = 'For more details visit the link';
        $alert->save();
    }
}
