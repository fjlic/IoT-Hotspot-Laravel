<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\ProbeEstimating;

class AddTableProbeStimatingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         //

         $prob_stm = new ProbeEstimating();
         $prob_stm->id = 1;
         $prob_stm->prox_size = 130;
         $prob_stm->mod_size = 163;
         $prob_stm->stm_prox_size = 186;
         $prob_stm->act_dev_size = 15.0;
         $prob_stm->save();

         $prob_stm = new ProbeEstimating();
         $prob_stm->id = 2;
         $prob_stm->prox_size = 650;
         $prob_stm->mod_size = 765;
         $prob_stm->stm_prox_size = 699;
         $prob_stm->act_dev_size = 69.9;
         $prob_stm->save();

         $prob_stm = new ProbeEstimating();
         $prob_stm->id = 3;
         $prob_stm->prox_size = 99;
         $prob_stm->mod_size = 141;
         $prob_stm->stm_prox_size = 132;
         $prob_stm->act_dev_size = 6.5;
         $prob_stm->save();

         $prob_stm = new ProbeEstimating();
         $prob_stm->id = 4;
         $prob_stm->prox_size = 150;
         $prob_stm->mod_size = 166;
         $prob_stm->stm_prox_size = 272;
         $prob_stm->act_dev_size = 22.4;
         $prob_stm->save();

         $prob_stm = new ProbeEstimating();
         $prob_stm->id = 5;
         $prob_stm->prox_size = 128;
         $prob_stm->mod_size = 137;
         $prob_stm->stm_prox_size = 291;
         $prob_stm->act_dev_size = 28.4;
         $prob_stm->save();

         $prob_stm = new ProbeEstimating();
         $prob_stm->id = 6;
         $prob_stm->prox_size = 302;
         $prob_stm->mod_size = 355;
         $prob_stm->stm_prox_size = 331;
         $prob_stm->act_dev_size = 65.9;
         $prob_stm->save();

         $prob_stm = new ProbeEstimating();
         $prob_stm->id = 7;
         $prob_stm->prox_size = 95;
         $prob_stm->mod_size = 136;
         $prob_stm->stm_prox_size = 199;
         $prob_stm->act_dev_size = 19.4;
         $prob_stm->save();

         $prob_stm = new ProbeEstimating();
         $prob_stm->id = 8;
         $prob_stm->prox_size = 945;
         $prob_stm->mod_size = 1206;
         $prob_stm->stm_prox_size = 1890;
         $prob_stm->act_dev_size = 198.7;
         $prob_stm->save();

         $prob_stm = new ProbeEstimating();
         $prob_stm->id = 9;
         $prob_stm->prox_size = 368;
         $prob_stm->mod_size = 433;
         $prob_stm->stm_prox_size = 788;
         $prob_stm->act_dev_size = 38.8;
         $prob_stm->save();

         $prob_stm = new ProbeEstimating();
         $prob_stm->id = 10;
         $prob_stm->prox_size = 961;
         $prob_stm->mod_size = 1130;
         $prob_stm->stm_prox_size = 1601;
         $prob_stm->act_dev_size = 138.2;
         $prob_stm->save();
    }
}
