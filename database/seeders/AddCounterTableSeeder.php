<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Counter;
use App\Models\ApiToken;

class AddCounterTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Counter Example #1
        $counter = new Counter();
        $counter->id = 1;
        $counter->crd_id = 1;
        $counter->erb_id = 1;
        $counter->nfc_id = 1;
        $counter->num_serie = 70000000001;
        $counter->cont_qr = '0';
        $counter->cont_mon = '0';
        $counter->cont_mon_2 = '0';
        $counter->cont_corte = '0';
        $counter->cont_prem = '0';
        $counter->cost_mon = '5';
        $counter->ssid = 'FJLIC_IoT';
        $counter->passwd = 'FJL1C_I@T';
        $counter->ip_server = '74.208.92.167';
        $counter->port = '443';
        $counter->token = ApiToken::GenerateToken16();
        $counter->type = 0;
        $counter->text = 'Prueba Contador 1 Ok';
        $counter->save();

        /*$counter = new Counter();
        $counter->id = 2;
        $counter->crd_id = 2;
        $counter->erb_id = 2;
        $counter->nfc_id = 2;
        $counter->num_serie = '70000000002';
        $counter->cont_qr = '0';
        $counter->cont_mon = '0';
        $counter->cont_mon_2 = '0';
        $counter->cont_corte = '0';
        $counter->cont_prem = '0';
        $counter->cost_mon = '5';
        $counter->ssid = 'FJLIC_IoT';
        $counter->passwd = 'FJL1C_I@T';
        $counter->ip_server = '74.208.92.167';
        $counter->port = '443';
        $counter->token = ApiToken::GenerateToken16();
        $counter->type = 0;
        $counter->text = 'Prueba Contador 2 Ok';
        $counter->save();

        $counter = new Counter();
        $counter->id = 3;
        $counter->crd_id = 3;
        $counter->erb_id = 3;
        $counter->nfc_id = 3;
        $counter->num_serie = '70000000003';
        $counter->cont_qr = '0';
        $counter->cont_mon = '0';
        $counter->cont_mon_2 = '0';
        $counter->cont_corte = '0';
        $counter->cont_prem = '0';
        $counter->cost_mon = '5';
        $counter->ssid = 'FJLIC_IoT';
        $counter->passwd = 'FJL1C_I@T';
        $counter->ip_server = '74.208.92.167';
        $counter->port = '443';
        $counter->token = ApiToken::GenerateToken16();
        $counter->type = 0;
        $counter->text = 'Prueba Contador 3 Ok';
        $counter->save();

        $counter = new Counter();
        $counter->id = 4;
        $counter->crd_id = 4;
        $counter->erb_id = 4;
        $counter->nfc_id = 4;
        $counter->num_serie = '70000000004';
        $counter->cont_qr = '0';
        $counter->cont_mon = '0';
        $counter->cont_mon_2 = '0';
        $counter->cont_corte = '0';
        $counter->cont_prem = '0';
        $counter->cost_mon = '5';
        $counter->ssid = 'FJLIC_IoT';
        $counter->passwd = 'FJL1C_I@T';
        $counter->ip_server = '74.208.92.167';
        $counter->port = '443';
        $counter->token = ApiToken::GenerateToken16();
        $counter->type = 0;
        $counter->text = 'Prueba Contador 4 Ok';
        $counter->save();

        $counter = new Counter();
        $counter->id = 5;
        $counter->crd_id = 5;
        $counter->erb_id = 5;
        $counter->nfc_id = 5;
        $counter->num_serie = '70000000005';
        $counter->cont_qr = '0';
        $counter->cont_mon = '0';
        $counter->cont_mon_2 = '0';
        $counter->cont_corte = '0';
        $counter->cont_prem = '0';
        $counter->cost_mon = '5';
        $counter->ssid = 'FJLIC_IoT';
        $counter->passwd = 'FJL1C_I@T';
        $counter->ip_server = '74.208.92.167';
        $counter->port = '443';
        $counter->token = ApiToken::GenerateToken16();
        $counter->type = 0;
        $counter->text = 'Prueba Contador 5 Ok';
        $counter->save();

        $counter = new Counter();
        $counter->id = 6;
        $counter->crd_id = 6;
        $counter->erb_id = 6;
        $counter->nfc_id = 6;
        $counter->num_serie = '70000000006';
        $counter->cont_qr = '0';
        $counter->cont_mon = '0';
        $counter->cont_mon_2 = '0';
        $counter->cont_corte = '0';
        $counter->cont_prem = '0';
        $counter->cost_mon = '5';
        $counter->ssid = 'FJLIC_IoT';
        $counter->passwd = 'FJL1C_I@T';
        $counter->ip_server = '74.208.92.167';
        $counter->port = '443';
        $counter->token = ApiToken::GenerateToken16();
        $counter->type = 0;
        $counter->text = 'Prueba Contador 6 Ok';
        $counter->save();

        $counter = new Counter();
        $counter->id = 7;
        $counter->crd_id = 7;
        $counter->erb_id = 7;
        $counter->nfc_id = 7;
        $counter->num_serie = '70000000007';
        $counter->cont_qr = '0';
        $counter->cont_mon = '0';
        $counter->cont_mon_2 = '0';
        $counter->cont_corte = '0';
        $counter->cont_prem = '0';
        $counter->cost_mon = '5';
        $counter->ssid = 'FJLIC_IoT';
        $counter->passwd = 'FJL1C_I@T';
        $counter->ip_server = '74.208.92.167';
        $counter->port = '443';
        $counter->token = ApiToken::GenerateToken16();
        $counter->type = 0;
        $counter->text = 'Prueba Contador 7 Ok';
        $counter->save();

        $counter = new Counter();
        $counter->id = 8;
        $counter->crd_id = 8;
        $counter->erb_id = 8;
        $counter->nfc_id = 8;
        $counter->num_serie = '70000000008';
        $counter->cont_qr = '0';
        $counter->cont_mon = '0';
        $counter->cont_mon_2 = '0';
        $counter->cont_corte = '0';
        $counter->cont_prem = '0';
        $counter->cost_mon = '5';
        $counter->ssid = 'FJLIC_IoT';
        $counter->passwd = 'FJL1C_I@T';
        $counter->ip_server = '74.208.92.167';
        $counter->port = '443';
        $counter->token = ApiToken::GenerateToken16();
        $counter->type = 0;
        $counter->text = 'Prueba Contador 8 Ok';
        $counter->save();

        $counter = new Counter();
        $counter->id = 9;
        $counter->crd_id = 9;
        $counter->erb_id = 9;
        $counter->nfc_id = 9;
        $counter->num_serie = '70000000009';
        $counter->cont_qr = '0';
        $counter->cont_mon = '0';
        $counter->cont_mon_2 = '0';
        $counter->cont_corte = '0';
        $counter->cont_prem = '0';
        $counter->cost_mon = '5';
        $counter->ssid = 'FJLIC_IoT';
        $counter->passwd = 'FJL1C_I@T';
        $counter->ip_server = '74.208.92.167';
        $counter->port = '443';
        $counter->token = ApiToken::GenerateToken16();
        $counter->type = 0;
        $counter->text = 'Prueba Contador 9 Ok';
        $counter->save();

        $counter = new Counter();
        $counter->id = 10;
        $counter->crd_id = 10;
        $counter->erb_id = 10;
        $counter->nfc_id = 10;
        $counter->num_serie = '70000000010';
        $counter->cont_qr = '0';
        $counter->cont_mon = '0';
        $counter->cont_mon_2 = '0';
        $counter->cont_corte = '0';
        $counter->cont_prem = '0';
        $counter->cost_mon = '5';
        $counter->ssid = 'FJLIC_IoT';
        $counter->passwd = 'FJL1C_I@T';
        $counter->ip_server = '74.208.92.167';
        $counter->port = '443';
        $counter->token = ApiToken::GenerateToken16();
        $counter->type = 0;
        $counter->text = 'Prueba Contador 9 Ok';
        $counter->save();*/
    }
}
