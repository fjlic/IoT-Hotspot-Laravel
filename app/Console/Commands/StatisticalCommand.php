<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Statistical;
use App\HistorialSensor;
use App\Sensor;

class StatisticalCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'statistical:sensor';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command to consolidate the statistics of sensors';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $inc = 1;
        $process_chunk = 1;
        $value_sample = 144;
        $adjust_value = $value_sample+1;
        $time_schedule = 600;
        $time_lag = 86400;
        $sensors = Sensor::all();
        $id_continued = Statistical::all();
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
                    $statistical = new Statistical();
                    $statistical->id = $inc++;
                    $temp_start = $data_his->first();
                    $statistical->sensor_id = $temp_start->sensor_id;
                    $statistical->start_time = $temp_start->created_at;
                    $tmp_sample = [[]];
                    foreach ($data_his as $key2 => $data) 
                    {
                        if($key2<$value_sample)
                        {
                          $data->stat = 1;
                          $data->save();
                          $tmp_sample[$key2]["id_sen_hist"]=$data->id;
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
                    $statistical->elements = $value_sample;
                    $statistical->sample =  json_encode($tmp_sample);
                    $temp_finish = $data_his->last();
                    $statistical->finish_time = $temp_finish->created_at;
                    //convertimos la fecha 1 a objeto Carbon
                    $carbon1 = new \Carbon\Carbon($temp_start->created_at);
                    //convertimos la fecha 2 a objeto Carbon
                    $carbon2 = new \Carbon\Carbon($temp_finish->created_at);
                    //de esta manera sacamos la diferencia en minutos
                    $secondsDiff=$carbon1->diffInSeconds($carbon2);
                    $statistical->total_time = $secondsDiff;
                    $statistical->difer_time = ($secondsDiff-$time_lag);
                    $statistical->save();
                }   
            }
        }
    return True;
    }
}