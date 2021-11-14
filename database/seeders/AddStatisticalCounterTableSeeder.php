<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\StatisticalCounter;
use App\HistorialCounter;
use App\Counter;


class AddStatisticalCounterTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $inc = 1;
        $process_chunk = 10;
        $value_sample = 672;
        $adjust_value = $value_sample+1;
        $time_schedule = 180;
        $time_lag = 120960;
        $counters = Counter::all();
        $id_continued = StatisticalCounter::all();
        if($id_continued->isNotEmpty())
        {
            $id_tmp = $id_continued->last();
            $inc = $id_tmp->id + 1;
        }
        foreach ($counters as $key1 => $counter) 
        {
            for ($i=1; $i <= $process_chunk; $i++) {//16 
                $data_his = HistorialCounter::where('counter_id', $counter->id)
                ->where('stat', 0)
                //->latest()
                ->take($adjust_value)->get();
                if ($data_his->count()==$adjust_value) 
                {
                    $statisticalcounter = new StatisticalCounter();
                    $statisticalcounter->id = $inc++;
                    $temp_start = $data_his->first();
                    $statisticalcounter->counter_id = $temp_start->counter_id;
                    $statisticalcounter->start_time = $temp_start->created_at;
                    $tmp_sample = [[]];
                    foreach ($data_his as $key2 => $data) 
                    {
                        if($key2<$value_sample)
                        {
                          $id_key2 = $key2;
                          $id_key2++;
                          $data->stat = 1;
                          $data->save();
                          $tmp_sample[$key2]["id"]=$id_key2;
                          $tmp_temp1 = new \Carbon\Carbon($data->created_at);
                          $tmp_temp2 = new \Carbon\Carbon($data_his[$key2+1]->created_at);
                          $tmp_pass=$tmp_temp1->diffInSeconds($tmp_temp2);
                          $tmp_difer=($tmp_pass-$time_schedule);
                          $tmp_sample[$key2]["sched_time"]=$time_schedule;
                          $tmp_sample[$key2]["start_time"]=$tmp_temp1->format('Y-m-d H:i:s');
                          $tmp_sample[$key2]["end_time"]=$tmp_temp2->format('Y-m-d H:i:s');
                          $tmp_sample[$key2]["pass_time"]=$tmp_pass;
                          $tmp_sample[$key2]["difer_time"]=$tmp_difer;   
                        }
                        
                    }
                    $statisticalcounter->elements = $value_sample;
                    $statisticalcounter->sample =  json_encode($tmp_sample);
                    $temp_finish = $data_his->last();
                    $statisticalcounter->finish_time = $temp_finish->created_at;
                    //convertimos la fecha 1 a objeto Carbon
                    $carbon1 = new \Carbon\Carbon($temp_start->created_at);
                    //convertimos la fecha 2 a objeto Carbon
                    $carbon2 = new \Carbon\Carbon($temp_finish->created_at);
                    //de esta manera sacamos la diferencia en minutos
                    $secondsDiff=$carbon1->diffInSeconds($carbon2);
                    $statisticalcounter->total_time = $secondsDiff;
                    $statisticalcounter->difer_time = ($secondsDiff-$time_lag);
                    $statisticalcounter->save();
                }   
            }
        }
    }
}
