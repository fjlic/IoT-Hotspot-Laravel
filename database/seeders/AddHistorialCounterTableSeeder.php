<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;
use App\Models\ApiToken;
use App\Models\Counter;
use App\Models\HistorialCounter;
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
        $tmp_mon = 0;
        $counters = Counter::all();
        $modDate = Carbon::now()->subDays(90);
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
                $histocounter->ssid = "FJLIC_IoT";
                $histocounter->passwd = "FJL1C_I@T";
                $histocounter->ip_server = "74.208.92.167";
                $histocounter->port = "443";
                $histocounter->token = ApiToken::GenerateToken16();
                $histocounter->type = 1;
                $histocounter->text = "Moneda ".$tmp_mon;
                $histocounter->created_at = $modDate;
                $histocounter->updated_at = $modDate;
                $histocounter->save();
        } 
        
        $id_tmp = HistorialCounter::all()->count()+1;
        for ($i=1; $i <= 12960; $i++) {
                //$modDate = $modDate->addMinutes(15);
                $tmp_mon = $tmp_mon+10; 
                $modDate = $modDate->addSeconds(random_int(585, 615));
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
                    $histocounter->ssid = "FJLIC_IoT";
                    $histocounter->passwd = "FJL1C_I@T";
                    $histocounter->ip_server = "74.208.92.167";
                    $histocounter->port = "443";
                    $histocounter->token = ApiToken::GenerateToken16();
                    $histocounter->type = 1;
                    $histocounter->text = "Moneda ".$tmp_mon;
                    $histocounter->created_at = $modDate;
                    $histocounter->updated_at = $modDate;
                    $histocounter->save();
                }
        }
        //$counters->cont_mon = $tmp_mon;
        //$counters->save();
    }
}
