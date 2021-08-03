<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Phpml\Association\Apriori;
use Phpml\Classification\SVC;
use Phpml\Regression\SVR;
use Phpml\Regression\LeastSquares;
use Phpml\SupportVectorMachine\Kernel;
use App\Statistical;

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
        $statisticals = Statistical::where('stat', 0)->get();
        foreach ($statisticals as $key => $statistical) {
            $samples = [[]];
            $targets = []; 
            foreach (json_decode($statistical->sample) as $key2 => $json) {
             $samples[$key2] = [$key2];
             $targets[$key2] = $json->pass_time;
            }
            $regression = new LeastSquares();
            $regression->train($samples, $targets);
            $statistical->stat = 1;
            $statistical->save();
            //dd($regression->predict([145]));
        }
    }
}
