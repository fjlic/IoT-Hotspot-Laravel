<?php

namespace Database\Seeders;

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
        $nfc1 = Nfc::find(1);
        $nfc2 = Nfc::find(2);
        $nfc3 = Nfc::find(3);
        $nfc4 = Nfc::find(4);
        $nfc5 = Nfc::find(5);
        $nfc6 = Nfc::find(6);
        $nfc7 = Nfc::find(7);
        $nfc8 = Nfc::find(8);
        $nfc9 = Nfc::find(9);
        $nfc10 = Nfc::find(10);
        /*$nfc11 = Nfc::find(11);
        $nfc12 = Nfc::find(12);
        $nfc13 = Nfc::find(13);
        $nfc14 = Nfc::find(14);
        $nfc15 = Nfc::find(15);
        $nfc16 = Nfc::find(16);
        $nfc17 = Nfc::find(17);
        $nfc18 = Nfc::find(18);
        $nfc19 = Nfc::find(19);
        $nfc20 = Nfc::find(20);*/
        

        $historialnfc = new HistorialNfc();
        $historialnfc->nfc_id = $nfc1->id;
        $historialnfc->num_serie = $nfc1->num_serie;
        $historialnfc->cont_qr = $nfc1->cont_qr;
        $historialnfc->cont_mon = $nfc1->cont_mon;
        $historialnfc->cont_mon_2 = $nfc1->cont_mon_2;
        $historialnfc->cont_corte = $nfc1->cont_corte;
        $historialnfc->cont_prem = $nfc1->cont_prem;
        $historialnfc->cost_mon = $nfc1->cost_mon;
        $historialnfc->ssid = $nfc1->ssid;
        $historialnfc->passwd = $nfc1->passwd;
        $historialnfc->ip_server = $nfc1->ip_server;
        $historialnfc->port = $nfc1->port;
        $historialnfc->txt = $nfc1->txt;
        $historialnfc->save();
        
        $historialnfc = new HistorialNfc();
        $historialnfc->nfc_id = $nfc2->id;
        $historialnfc->num_serie = $nfc2->num_serie;
        $historialnfc->cont_qr = $nfc2->cont_qr;
        $historialnfc->cont_mon = $nfc2->cont_mon;
        $historialnfc->cont_mon_2 = $nfc2->cont_mon_2;
        $historialnfc->cont_corte = $nfc2->cont_corte;
        $historialnfc->cont_prem = $nfc2->cont_prem;
        $historialnfc->cost_mon = $nfc2->cost_mon;
        $historialnfc->ssid = $nfc2->ssid;
        $historialnfc->passwd = $nfc2->passwd;
        $historialnfc->ip_server = $nfc2->ip_server;
        $historialnfc->port = $nfc2->port;
        $historialnfc->txt = $nfc2->txt;
        $historialnfc->save();
        
        $historialnfc = new HistorialNfc();
        $historialnfc->nfc_id = $nfc3->id;
        $historialnfc->num_serie = $nfc3->num_serie;
        $historialnfc->cont_qr = $nfc3->cont_qr;
        $historialnfc->cont_mon = $nfc3->cont_mon;
        $historialnfc->cont_mon_2 = $nfc3->cont_mon_2;
        $historialnfc->cont_corte = $nfc3->cont_corte;
        $historialnfc->cont_prem = $nfc3->cont_prem;
        $historialnfc->cost_mon = $nfc3->cost_mon;
        $historialnfc->ssid = $nfc3->ssid;
        $historialnfc->passwd = $nfc3->passwd;
        $historialnfc->ip_server = $nfc3->ip_server;
        $historialnfc->port = $nfc3->port;
        $historialnfc->txt = $nfc3->txt;
        $historialnfc->save();
        
        $historialnfc = new HistorialNfc();
        $historialnfc->nfc_id = $nfc4->id;
        $historialnfc->num_serie = $nfc4->num_serie;
        $historialnfc->cont_qr = $nfc4->cont_qr;
        $historialnfc->cont_mon = $nfc4->cont_mon;
        $historialnfc->cont_mon_2 = $nfc4->cont_mon_2;
        $historialnfc->cont_corte = $nfc4->cont_corte;
        $historialnfc->cont_prem = $nfc4->cont_prem;
        $historialnfc->cost_mon = $nfc4->cost_mon;
        $historialnfc->ssid = $nfc4->ssid;
        $historialnfc->passwd = $nfc4->passwd;
        $historialnfc->ip_server = $nfc4->ip_server;
        $historialnfc->port = $nfc4->port;
        $historialnfc->txt = $nfc4->txt;
        $historialnfc->save();
        
        
        $historialnfc = new HistorialNfc();
        $historialnfc->nfc_id = $nfc5->id;
        $historialnfc->num_serie = $nfc5->num_serie;
        $historialnfc->cont_qr = $nfc5->cont_qr;
        $historialnfc->cont_mon = $nfc5->cont_mon;
        $historialnfc->cont_mon_2 = $nfc5->cont_mon_2;
        $historialnfc->cont_corte = $nfc5->cont_corte;
        $historialnfc->cont_prem = $nfc5->cont_prem;
        $historialnfc->cost_mon = $nfc5->cost_mon;
        $historialnfc->ssid = $nfc5->ssid;
        $historialnfc->passwd = $nfc5->passwd;
        $historialnfc->ip_server = $nfc5->ip_server;
        $historialnfc->port = $nfc5->port;
        $historialnfc->txt = $nfc5->txt;
        $historialnfc->save();
        
        
        $historialnfc = new HistorialNfc();
        $historialnfc->nfc_id = $nfc6->id;
        $historialnfc->num_serie = $nfc6->num_serie;
        $historialnfc->cont_qr = $nfc6->cont_qr;
        $historialnfc->cont_mon = $nfc6->cont_mon;
        $historialnfc->cont_mon_2 = $nfc6->cont_mon_2;
        $historialnfc->cont_corte = $nfc6->cont_corte;
        $historialnfc->cont_prem = $nfc6->cont_prem;
        $historialnfc->cost_mon = $nfc6->cost_mon;
        $historialnfc->ssid = $nfc6->ssid;
        $historialnfc->passwd = $nfc6->passwd;
        $historialnfc->ip_server = $nfc6->ip_server;
        $historialnfc->port = $nfc6->port;
        $historialnfc->txt = $nfc6->txt;
        $historialnfc->save();
        
        
        $historialnfc = new HistorialNfc();
        $historialnfc->nfc_id = $nfc7->id;
        $historialnfc->num_serie = $nfc7->num_serie;
        $historialnfc->cont_qr = $nfc7->cont_qr;
        $historialnfc->cont_mon = $nfc7->cont_mon;
        $historialnfc->cont_mon_2 = $nfc7->cont_mon_2;
        $historialnfc->cont_corte = $nfc7->cont_corte;
        $historialnfc->cont_prem = $nfc7->cont_prem;
        $historialnfc->cost_mon = $nfc7->cost_mon;
        $historialnfc->ssid = $nfc7->ssid;
        $historialnfc->passwd = $nfc7->passwd;
        $historialnfc->ip_server = $nfc7->ip_server;
        $historialnfc->port = $nfc7->port;
        $historialnfc->txt = $nfc7->txt;
        $historialnfc->save();
        
        
        $historialnfc = new HistorialNfc();
        $historialnfc->nfc_id = $nfc8->id;
        $historialnfc->num_serie = $nfc8->num_serie;
        $historialnfc->cont_qr = $nfc8->cont_qr;
        $historialnfc->cont_mon = $nfc8->cont_mon;
        $historialnfc->cont_mon_2 = $nfc8->cont_mon_2;
        $historialnfc->cont_corte = $nfc8->cont_corte;
        $historialnfc->cont_prem = $nfc8->cont_prem;
        $historialnfc->cost_mon = $nfc8->cost_mon;
        $historialnfc->ssid = $nfc8->ssid;
        $historialnfc->passwd = $nfc8->passwd;
        $historialnfc->ip_server = $nfc8->ip_server;
        $historialnfc->port = $nfc8->port;
        $historialnfc->txt = $nfc8->txt;
        $historialnfc->save();
        
        $historialnfc = new HistorialNfc();
        $historialnfc->nfc_id = $nfc9->id;
        $historialnfc->num_serie = $nfc9->num_serie;
        $historialnfc->cont_qr = $nfc9->cont_qr;
        $historialnfc->cont_mon = $nfc9->cont_mon;
        $historialnfc->cont_mon_2 = $nfc9->cont_mon_2;
        $historialnfc->cont_corte = $nfc9->cont_corte;
        $historialnfc->cont_prem = $nfc9->cont_prem;
        $historialnfc->cost_mon = $nfc9->cost_mon;
        $historialnfc->ssid = $nfc9->ssid;
        $historialnfc->passwd = $nfc9->passwd;
        $historialnfc->ip_server = $nfc9->ip_server;
        $historialnfc->port = $nfc9->port;
        $historialnfc->txt = $nfc9->txt;
        $historialnfc->save();
        
        
        $historialnfc = new HistorialNfc();
        $historialnfc->nfc_id = $nfc10->id;
        $historialnfc->num_serie = $nfc10->num_serie;
        $historialnfc->cont_qr = $nfc10->cont_qr;
        $historialnfc->cont_mon = $nfc10->cont_mon;
        $historialnfc->cont_mon_2 = $nfc10->cont_mon_2;
        $historialnfc->cont_corte = $nfc10->cont_corte;
        $historialnfc->cont_prem = $nfc10->cont_prem;
        $historialnfc->cost_mon = $nfc10->cost_mon;
        $historialnfc->ssid = $nfc10->ssid;
        $historialnfc->passwd = $nfc10->passwd;
        $historialnfc->ip_server = $nfc10->ip_server;
        $historialnfc->port = $nfc10->port;
        $historialnfc->txt = $nfc10->txt;
        $historialnfc->save();
        
        
        /*$historialnfc = new HistorialNfc();
        $historialnfc->nfc_id = $nfc11->id;
        $historialnfc->num_serie = $nfc11->num_serie;
        $historialnfc->cont_qr = $nfc11->cont_qr;
        $historialnfc->cont_mon = $nfc11->cont_mon;
        $historialnfc->cont_mon_2 = $nfc11->cont_mon_2;
        $historialnfc->cont_corte = $nfc11->cont_corte;
        $historialnfc->cont_prem = $nfc11->cont_prem;
        $historialnfc->cost_mon = $nfc11->cost_mon;
        $historialnfc->ssid = $nfc11->ssid;
        $historialnfc->passwd = $nfc11->passwd;
        $historialnfc->ip_server = $nfc11->ip_server;
        $historialnfc->port = $nfc11->port;
        $historialnfc->txt = $nfc11->txt;
        $historialnfc->save();
        
        $historialnfc = new HistorialNfc();
        $historialnfc->nfc_id = $nfc12->id;
        $historialnfc->num_serie = $nfc12->num_serie;
        $historialnfc->cont_qr = $nfc12->cont_qr;
        $historialnfc->cont_mon = $nfc12->cont_mon;
        $historialnfc->cont_mon_2 = $nfc12->cont_mon_2;
        $historialnfc->cont_corte = $nfc12->cont_corte;
        $historialnfc->cont_prem = $nfc12->cont_prem;
        $historialnfc->cost_mon = $nfc12->cost_mon;
        $historialnfc->ssid = $nfc12->ssid;
        $historialnfc->passwd = $nfc12->passwd;
        $historialnfc->ip_server = $nfc12->ip_server;
        $historialnfc->port = $nfc12->port;
        $historialnfc->txt = $nfc12->txt;
        $historialnfc->save();
        
        
        $historialnfc = new HistorialNfc();
        $historialnfc->nfc_id = $nfc13->id;
        $historialnfc->num_serie = $nfc13->num_serie;
        $historialnfc->cont_qr = $nfc13->cont_qr;
        $historialnfc->cont_mon = $nfc13->cont_mon;
        $historialnfc->cont_mon_2 = $nfc13->cont_mon_2;
        $historialnfc->cont_corte = $nfc13->cont_corte;
        $historialnfc->cont_prem = $nfc13->cont_prem;
        $historialnfc->cost_mon = $nfc13->cost_mon;
        $historialnfc->ssid = $nfc13->ssid;
        $historialnfc->passwd = $nfc13->passwd;
        $historialnfc->ip_server = $nfc13->ip_server;
        $historialnfc->port = $nfc13->port;
        $historialnfc->txt = $nfc13->txt;
        $historialnfc->save();
        
        
        $historialnfc = new HistorialNfc();
        $historialnfc->nfc_id = $nfc14->id;
        $historialnfc->num_serie = $nfc14->num_serie;
        $historialnfc->cont_qr = $nfc14->cont_qr;
        $historialnfc->cont_mon = $nfc14->cont_mon;
        $historialnfc->cont_mon_2 = $nfc14->cont_mon_2;
        $historialnfc->cont_corte = $nfc14->cont_corte;
        $historialnfc->cont_prem = $nfc14->cont_prem;
        $historialnfc->cost_mon = $nfc14->cost_mon;
        $historialnfc->ssid = $nfc14->ssid;
        $historialnfc->passwd = $nfc14->passwd;
        $historialnfc->ip_server = $nfc14->ip_server;
        $historialnfc->port = $nfc14->port;
        $historialnfc->txt = $nfc14->txt;
        $historialnfc->save();
        
        
        $historialnfc = new HistorialNfc();
        $historialnfc->nfc_id = $nfc15->id;
        $historialnfc->num_serie = $nfc15->num_serie;
        $historialnfc->cont_qr = $nfc15->cont_qr;
        $historialnfc->cont_mon = $nfc15->cont_mon;
        $historialnfc->cont_mon_2 = $nfc15->cont_mon_2;
        $historialnfc->cont_corte = $nfc15->cont_corte;
        $historialnfc->cont_prem = $nfc15->cont_prem;
        $historialnfc->cost_mon = $nfc15->cost_mon;
        $historialnfc->ssid = $nfc15->ssid;
        $historialnfc->passwd = $nfc15->passwd;
        $historialnfc->ip_server = $nfc15->ip_server;
        $historialnfc->port = $nfc15->port;
        $historialnfc->txt = $nfc15->txt;
        $historialnfc->save();
        
        
        $historialnfc = new HistorialNfc();
        $historialnfc->nfc_id = $nfc16->id;
        $historialnfc->num_serie = $nfc16->num_serie;
        $historialnfc->cont_qr = $nfc16->cont_qr;
        $historialnfc->cont_mon = $nfc16->cont_mon;
        $historialnfc->cont_mon_2 = $nfc16->cont_mon_2;
        $historialnfc->cont_corte = $nfc16->cont_corte;
        $historialnfc->cont_prem = $nfc16->cont_prem;
        $historialnfc->cost_mon = $nfc16->cost_mon;
        $historialnfc->ssid = $nfc16->ssid;
        $historialnfc->passwd = $nfc16->passwd;
        $historialnfc->ip_server = $nfc16->ip_server;
        $historialnfc->port = $nfc16->port;
        $historialnfc->txt = $nfc16->txt;
        $historialnfc->save();
        
        
        $historialnfc = new HistorialNfc();
        $historialnfc->nfc_id = $nfc17->id;
        $historialnfc->num_serie = $nfc17->num_serie;
        $historialnfc->cont_qr = $nfc17->cont_qr;
        $historialnfc->cont_mon = $nfc17->cont_mon;
        $historialnfc->cont_mon_2 = $nfc17->cont_mon_2;
        $historialnfc->cont_corte = $nfc17->cont_corte;
        $historialnfc->cont_prem = $nfc17->cont_prem;
        $historialnfc->cost_mon = $nfc17->cost_mon;
        $historialnfc->ssid = $nfc17->ssid;
        $historialnfc->passwd = $nfc17->passwd;
        $historialnfc->ip_server = $nfc17->ip_server;
        $historialnfc->port = $nfc17->port;
        $historialnfc->txt = $nfc17->txt;
        $historialnfc->save();
        
        
        $historialnfc = new HistorialNfc();
        $historialnfc->nfc_id = $nfc18->id;
        $historialnfc->num_serie = $nfc18->num_serie;
        $historialnfc->cont_qr = $nfc18->cont_qr;
        $historialnfc->cont_mon = $nfc18->cont_mon;
        $historialnfc->cont_mon_2 = $nfc18->cont_mon_2;
        $historialnfc->cont_corte = $nfc18->cont_corte;
        $historialnfc->cont_prem = $nfc18->cont_prem;
        $historialnfc->cost_mon = $nfc18->cost_mon;
        $historialnfc->ssid = $nfc18->ssid;
        $historialnfc->passwd = $nfc18->passwd;
        $historialnfc->ip_server = $nfc18->ip_server;
        $historialnfc->port = $nfc18->port;
        $historialnfc->txt = $nfc18->txt;
        $historialnfc->save();
        
        
        $historialnfc = new HistorialNfc();
        $historialnfc->nfc_id = $nfc19->id;
        $historialnfc->num_serie = $nfc19->num_serie;
        $historialnfc->cont_qr = $nfc19->cont_qr;
        $historialnfc->cont_mon = $nfc19->cont_mon;
        $historialnfc->cont_mon_2 = $nfc19->cont_mon_2;
        $historialnfc->cont_corte = $nfc19->cont_corte;
        $historialnfc->cont_prem = $nfc19->cont_prem;
        $historialnfc->cost_mon = $nfc19->cost_mon;
        $historialnfc->ssid = $nfc19->ssid;
        $historialnfc->passwd = $nfc19->passwd;
        $historialnfc->ip_server = $nfc19->ip_server;
        $historialnfc->port = $nfc19->port;
        $historialnfc->txt = $nfc19->txt;
        $historialnfc->save();
        
        
        $historialnfc = new HistorialNfc();
        $historialnfc->nfc_id = $nfc20->id;
        $historialnfc->num_serie = $nfc20->num_serie;
        $historialnfc->cont_qr = $nfc20->cont_qr;
        $historialnfc->cont_mon = $nfc20->cont_mon;
        $historialnfc->cont_mon_2 = $nfc20->cont_mon_2;
        $historialnfc->cont_corte = $nfc20->cont_corte;
        $historialnfc->cont_prem = $nfc20->cont_prem;
        $historialnfc->cost_mon = $nfc20->cost_mon;
        $historialnfc->ssid = $nfc20->ssid;
        $historialnfc->passwd = $nfc20->passwd;
        $historialnfc->ip_server = $nfc20->ip_server;
        $historialnfc->port = $nfc20->port;
        $historialnfc->txt = $nfc20->txt;
        $historialnfc->save();*/
    }
}
