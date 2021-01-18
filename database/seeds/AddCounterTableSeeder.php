<?php

use Illuminate\Database\Seeder;
use App\Counter;

class AddCounterTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $counter = new Counter();
        $counter->id = 1;
        $counter->crd_id = 1;
        $counter->erb_id = 1;
        $counter->nfc_id = 1;
        $counter->num_serie = '70000000001';
        $counter->cont_qr = '0';
        $counter->cont_mon = '0';
        $counter->save();

        $counter = new Counter();
        $counter->id = 2;
        $counter->crd_id = 2;
        $counter->erb_id = 2;
        $counter->nfc_id = 2;
        $counter->num_serie = '70000000002';
        $counter->cont_qr = '0';
        $counter->cont_mon = '0';
        $counter->save();

        $counter = new Counter();
        $counter->id = 3;
        $counter->crd_id = 3;
        $counter->erb_id = 3;
        $counter->nfc_id = 3;
        $counter->num_serie = '70000000003';
        $counter->cont_qr = '0';
        $counter->cont_mon = '0';
        $counter->save();

        $counter = new Counter();
        $counter->id = 4;
        $counter->crd_id = 4;
        $counter->erb_id = 4;
        $counter->nfc_id = 4;
        $counter->num_serie = '70000000004';
        $counter->cont_qr = '0';
        $counter->cont_mon = '0';
        $counter->save();

        $counter = new Counter();
        $counter->id = 5;
        $counter->crd_id = 5;
        $counter->erb_id = 5;
        $counter->nfc_id = 5;
        $counter->num_serie = '70000000005';
        $counter->cont_qr = '0';
        $counter->cont_mon = '0';
        $counter->save();
    }
}
