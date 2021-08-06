<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Phpml\Association\Apriori;
use Phpml\Classification\SVC;
use Phpml\Regression\SVR;
use Phpml\Math\Statistic\Mean;
use Phpml\Regression\LeastSquares;
use Phpml\SupportVectorMachine\Kernel;
use App\Statistical;
use App\Learning;

class LearningCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'sample:learning';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command consolidate the sample for linear regression';

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
                $tmp_pass = (int) $tmp_pass;
                $tmp_sample[$num_inc]["id_predict"]=$i-144;
                $sample_error = [];
                $error = 0;
                $error2 = 0;
                foreach ($targets as $key3 => $target) {
                    $sample_error[$key3] = abs($target-$tmp_pass);
                    $error += $sample_error[$key3];
                    $error2 += (($sample_error[$key3])*($sample_error[$key3]));
                }
                $tmp_sample[$num_inc]["start_time"] = $tmp_start->format('Y-m-d H:i:s');
                $tmp_finish = $tmp_start->addSeconds($tmp_pass);
                $tmp_sample[$num_inc]["end_time"] = $tmp_finish->format('Y-m-d H:i:s');
                $tmp_difer=($tmp_pass-$time_schedule);
                $tmp_sample[$num_inc]["sched_time"] = $time_schedule;
                $tmp_sample[$num_inc]["pass_time"] = $tmp_pass;
                $tmp_sample[$num_inc]["difer_time"] = $tmp_difer;
                $tmp_sample[$num_inc]["mean_absolute_error"] = round(($error / 144),4);
                $tmp_sample[$num_inc]["median_absolute_error"] = round(Mean::median($sample_error),4);
                $tmp_sample[$num_inc]["mean_squared_error"] = round(($error2 / 144),4);
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
        return True;
    }
}
