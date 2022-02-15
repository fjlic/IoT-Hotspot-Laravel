<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Phpml\Association\Apriori;
use Phpml\Classification\SVC;
use Phpml\Regression\SVR;
use Phpml\Regression\LeastSquares;
use Phpml\Math\Statistic\Mean;
use Phpml\SupportVectorMachine\Kernel;
use App\Models\StatisticalSensor;
use App\Models\LearningSensor;

class AddLearningSensorTableSeeder extends Seeder
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
        $temper_const = 20;
        $aver_temper_glob = 0;
        $time_schedule = 600;
        $time_lag = 86400;
        $id_continued = LearningSensor::all();
        if($id_continued->isNotEmpty())
        {
            $id_tmp = $id_continued->last();
            $inc = $id_tmp->id + 1;
        }
        $statisticalsensors = StatisticalSensor::where('stat', 0)->get();
        foreach ($statisticalsensors as $key => $statisticalsensor) {
            $learning = new LearningSensor();
            $samples = [[]];
            $targets = [];
            $temperatures = [];
            $tmp_sample = [[]]; 
            foreach (json_decode($statisticalsensor->sample) as $key2 => $json) {
             $samples[$key2] = [$key2];
             $targets[$key2] = $json->pass_time;
             $temperatures[$key2] = $json->aver_temper;
            }
            $tmp_start = new \Carbon\Carbon($statisticalsensor->finish_time);
            $num_inc = 0;
            $regression_request = new LeastSquares();
            $regression_temper = new LeastSquares();
            $regression_request->train($samples, $targets); 
            $regression_temper->train($samples, $temperatures); 
            for ($i=144; $i < 288; $i++) {
                $tmp_pass=$regression_request->predict([$i]);
                $tmp_temper=$regression_temper->predict([$i]);
                $tmp_pass = (int) $tmp_pass;
                $tmp_temper = (int) $tmp_temper;
                $tmp_sample[$num_inc]["id"]=$i-143;
                $sample_error = [];
                $error = 0;
                $error2 = 0;
                foreach ($temperatures as $key3 => $temperature) {
                    $sample_error[$key3] = abs($temperature-$tmp_temper);
                    $error += $sample_error[$key3];
                    $error2 += (($sample_error[$key3])*($sample_error[$key3]));
                }
                $tmp_sample[$num_inc]["start_time"] = $tmp_start->format('Y-m-d H:i:s');
                $tmp_sample[$num_inc]["pass_time"] = $tmp_pass;
                $tmp_finish = $tmp_start->addSeconds($tmp_pass);
                $tmp_sample[$num_inc]["end_time"] = $tmp_finish->format('Y-m-d H:i:s');
                //$tmp_sample[$num_inc]["sched_time"] = $time_schedule;
                $tmp_sample[$num_inc]["aver_temper"] = $tmp_temper;
                $tmp_difer=($tmp_temper-$temper_const);
                $tmp_sample[$num_inc]["difer_const"] = $tmp_difer;
                $tmp_sample[$num_inc]["mean_absolute_error"] = round(($error / 144),4);
                $tmp_sample[$num_inc]["median_absolute_error"] = round(Mean::median($sample_error),4);
                $tmp_sample[$num_inc]["mean_squared_error"] = round(($error2 / 144),4);
                $tmp_start = $tmp_finish;
                $num_inc++;
                $aver_temper_glob += $tmp_temper;  
            }
            $tmp_finish = $tmp_start;
            $tmp_tr = new \Carbon\Carbon($statisticalsensor->finish_time);
            $secondsDiff = $tmp_tr->diffInSeconds($tmp_finish);
            $learning->id = $inc++;
            $learning->statistical_sensor_id = $statisticalsensor->id;
            $learning->elements = $statisticalsensor->elements;
            $learning->start_time = $statisticalsensor->finish_time;
            $learning->pass_time = $secondsDiff;
            $learning->finish_time = $tmp_start;
            $learning->aver_temper_glob = round(($aver_temper_glob / $statisticalsensor->elements), 2);
            $learning->difer_const = round((($aver_temper_glob / $statisticalsensor->elements) - $temper_const), 2);
            $learning->sample = json_encode($tmp_sample);
            $learning->save();
            $statisticalsensor->stat = 1;
            $statisticalsensor->save();
            $aver_temper_glob = 0;
        }
    }
}
