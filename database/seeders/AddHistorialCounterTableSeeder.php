<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;
use App\ApiToken;
use App\Counter;
use App\HistorialCounter;
use Carbon\Carbon;

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
        $tmp_mon = 4360;
        $counters = Counter::all();
        $modDate = Carbon::now()->subDays(98);
        foreach ($counters as $key => $counter) {
                $histocounter = new HistorialCounter();
                $histocounter->id = $counter->id;
                $histocounter->counter_id = $counter->id;
                $histocounter->nfc_id = $counter->nfc_id;
                $histocounter->num_serie = $counter->num_serie;
                $histocounter->cont_qr = $counter->cont_qr;
                $histocounter->cont_mon = $tmp_mon;
                $histocounter->cont_mon_2 = 0;
                $histocounter->cont_corte = 0;
                $histocounter->cont_prem = 0;
                $histocounter->cost_mon = 10;
                $histocounter->ssid = "Galex_IoT";
                $histocounter->passwd = "G4l3x1537";
                $histocounter->ip_server = "74.208.92.167";
                $histocounter->port = "443";
                $histocounter->token = ApiToken::GenerateToken16();
                $histocounter->type = 1;
                $histocounter->text = "Moneda 10";
                $histocounter->created_at = $modDate;
                $histocounter->updated_at = $modDate;
                $histocounter->save();
        } 
        
        $id_tmp = HistorialCounter::all()->count()+1;
        for ($i=1; $i <= 9408; $i++) {
                //$modDate = $modDate->addMinutes(15);
                $tmp_mon += 10; 
                $modDate = $modDate->addSeconds(random_int(800, 950));
                foreach ($counters as $key => $counter) {
                    $histocounter = new HistorialCounter();
                    $histocounter->id = $id_tmp++;
                    $histocounter->counter_id = $counter->id;
                    $histocounter->nfc_id = $counter->nfc_id;
                    $histocounter->num_serie = $counter->num_serie;
                    $histocounter->cont_qr = $counter->cont_qr;
                    $histocounter->cont_mon = $tmp_mon;
                    $histocounter->cont_mon_2 = 0;
                    $histocounter->cont_corte = 0;
                    $histocounter->cont_prem = 0;
                    $histocounter->cost_mon = 10;
                    $histocounter->ssid = "Galex_IoT";
                    $histocounter->passwd = "G4l3x1537";
                    $histocounter->ip_server = "74.208.92.167";
                    $histocounter->port = "443";
                    $histocounter->token = ApiToken::GenerateToken16();
                    $histocounter->type = 1;
                    $histocounter->text = "Moneda 10";
                    $histocounter->created_at = $modDate;
                    $histocounter->updated_at = $modDate;
                    $histocounter->save();
                }
        }
    }
}
