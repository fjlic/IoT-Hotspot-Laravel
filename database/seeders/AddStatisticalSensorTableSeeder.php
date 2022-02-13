<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\StatisticalSensor;
use App\Models\HistorialSensor;
use App\Models\Sensor;
use App\Models\ApiToken;

class AddStatisticalSensorTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *  Part Name : SED
     * * Part Size : 5.1
     * @return void
     */
    public function run()
    {
        $inc = 1;
        $process_chunk = 10;
        $value_sample = 144;
        $const_temper = 20;
        $adjust_value = $value_sample+1;
        $time_schedule = 600;
        $time_lag = 86400;
        $sensors = Sensor::all();
        $id_continued = StatisticalSensor::all();
        if($id_continued->isNotEmpty())
        {
            $id_tmp = $id_continued->last();
            $inc = $id_tmp->id + 1;
        }
        foreach ($sensors as $key1 => $sensor) {
            for ($i=1; $i <= $process_chunk; $i++) {//16 
                $data_his = HistorialSensor::where('sensor_id', $sensor->id)
                ->where('stat', 0)
                //->latest()
                ->take($adjust_value)->get();
                if ($data_his->count()==$adjust_value) 
                {
                    $statisticalsensor = new StatisticalSensor();
                    $statisticalsensor->id = $inc++;
                    $temp_start = $data_his->first();
                    $aver_temper_glob = 0;
                    $statisticalsensor->sensor_id = $temp_start->sensor_id;
                    $statisticalsensor->start_time = $temp_start->created_at;
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
                          $tmp_date1 = new \Carbon\Carbon($data->created_at);
                          $tmp_date2 = new \Carbon\Carbon($data_his[$key2+1]->created_at);
                          $tmp_pass=$tmp_date1->diffInSeconds($tmp_date2);
                          $tmp_aver = ApiToken::average_temperature($data->temp_1, $data->temp_2, $data->temp_3, $data->temp_4);
                          $tmp_sample[$key2]["temper_1"]=$data->temp_1;
                          $tmp_sample[$key2]["temper_2"]=$data->temp_2;
                          $tmp_sample[$key2]["temper_3"]=$data->temp_3;
                          $tmp_sample[$key2]["temper_4"]=$data->temp_4;
                          $tmp_sample[$key2]["aver_temper"]=$tmp_aver;
                          $tmp_sample[$key2]["start_time"]=$tmp_date1->format('Y-m-d H:i:s');
                          $tmp_sample[$key2]["pass_time"]=$tmp_pass;
                          $tmp_sample[$key2]["end_time"]=$tmp_date2->format('Y-m-d H:i:s');
                          $aver_temper_glob += $tmp_aver;
                        }
                        
                    }
                    $statisticalsensor->elements = $value_sample;
                    $statisticalsensor->sample =  json_encode($tmp_sample);
                    $temp_finish = $data_his->last();
                    $statisticalsensor->finish_time = $temp_finish->created_at;
                    //convertimos la fecha 1 a objeto Carbon
                    $carbon1 = new \Carbon\Carbon($temp_start->created_at);
                    //convertimos la fecha 2 a objeto Carbon
                    $carbon2 = new \Carbon\Carbon($temp_finish->created_at);
                    //de esta manera sacamos la diferencia en minutos
                    $secondsDiff=$carbon1->diffInSeconds($carbon2);
                    $statisticalsensor->pass_time = $secondsDiff;
                    $statisticalsensor->aver_temper_glob = ($aver_temper_glob / $value_sample);
                    $statisticalsensor->difer_const = (($aver_temper_glob / $value_sample) - $const_temper);
                    $statisticalsensor->save();
                }   
            }
        }
    }
}
