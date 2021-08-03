<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Phpml\Association\Apriori;
use Phpml\Classification\SVC;
use Phpml\Regression\SVR;
use Phpml\Regression\LeastSquares;
use Phpml\SupportVectorMachine\Kernel;
use App\Statistical;
use App\Learning;

class AddLearningTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $inc = 1;
        $time_schedule = 600;
        $time_lag = 86400;
        $id_continued = Learning::all();
        if($id_continued->isNotEmpty())
        {
            $id_tmp = $id_continued->last();
            $inc = $id_tmp->id + 1;
        }
        $statisticals = Statistical::where('stat', 0)->get();
        foreach ($statisticals as $key => $statistical) {
            $learning = new Learning();
            $samples = [[]];
            $targets = [];
            $tmp_sample = [[]]; 
            foreach (json_decode($statistical->sample) as $key2 => $json) {
             $samples[$key2] = [$key2];
             $targets[$key2] = $json->pass_time;
            }
            $regression = new LeastSquares();
            $regression->train($samples, $targets);
            $tmp_start = new \Carbon\Carbon($statistical->finish_time);
            $num_inc = 0; 
            for ($i=145; $i < 289; $i++) {
                $tmp_pass=$regression->predict([$i]); 
                $tmp_sample[$num_inc]["id_predict"]=$i;
                $tmp_sample[$num_inc]["start_time"]=$tmp_start->format('Y-m-d H:i:s');
                $tmp_finish = $tmp_start->addSeconds((int) $tmp_pass);
                $tmp_sample[$num_inc]["end_time"]=$tmp_finish->format('Y-m-d H:i:s');
                $tmp_difer=($tmp_pass-$time_schedule);
                $tmp_sample[$num_inc]["sched_time"]=$time_schedule;
                $tmp_sample[$num_inc]["pass_time"]= (int) $tmp_pass;
                $tmp_sample[$num_inc]["difer_time"]=$tmp_difer;
                $tmp_start = $tmp_finish;
                $num_inc++;  
            }
            $tmp_finish = $tmp_start;
            $tmp_tr = new \Carbon\Carbon($statistical->finish_time);
            $secondsDiff = $tmp_tr->diffInSeconds($tmp_finish);
            $learning->id = $inc++;
            $learning->statistical_id = $statistical->id;
            $learning->elements = $statistical->elements;
            $learning->start_time = $statistical->finish_time;
            $learning->finish_time = $tmp_start;
            $learning->total_time = $secondsDiff;
            $learning->difer_time = ($secondsDiff-$time_lag);
            $learning->sample = json_encode($tmp_sample);
            $learning->save();
            $statistical->stat = 1;
            $statistical->save();
        }
    }
}
