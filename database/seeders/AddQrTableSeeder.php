<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Qr;

class AddQrTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $qrcoin = new Qr();
        $qrcoin->id = 1;
        $qrcoin->crd_id = null;
        $qrcoin->erb_id = null;
        $qrcoin->qr_serie = 'ABDORT3467';
        $qrcoin->coins = 2000;
        $qrcoin->gone_down = 0;
        $qrcoin->save();

        $qrcoin = new Qr();
        $qrcoin->id = 2;
        $qrcoin->crd_id = null;
        $qrcoin->erb_id = null;
        $qrcoin->qr_serie = 'CDFHIKR359';
        $qrcoin->coins = 2000;
        $qrcoin->gone_down = 0;
        $qrcoin->save();
        
        $qrcoin = new Qr();
        $qrcoin->id = 3;
        $qrcoin->crd_id = null;
        $qrcoin->erb_id = null;
        $qrcoin->qr_serie = 'CDLQRWX145';
        $qrcoin->coins = 2000;
        $qrcoin->gone_down = 0;
        $qrcoin->save();

        $qrcoin = new Qr();
        $qrcoin->id = 4;
        $qrcoin->crd_id = null;
        $qrcoin->erb_id = null;
        $qrcoin->qr_serie = 'ACJOTWXY01';
        $qrcoin->coins = 2000;
        $qrcoin->gone_down = 0;
        $qrcoin->save();

        $qrcoin = new Qr();
        $qrcoin->id = 5;
        $qrcoin->crd_id = null;
        $qrcoin->qr_serie = 'HJKLOQXY06';
        $qrcoin->coins = 2000;
        $qrcoin->gone_down = 0;
        $qrcoin->save();

        $qrcoin = new Qr();
        $qrcoin->id = 6;
        $qrcoin->crd_id = null;
        $qrcoin->erb_id = null;
        $qrcoin->qr_serie = 'LPTUVXY134';
        $qrcoin->coins = 2000;
        $qrcoin->gone_down = 0;
        $qrcoin->save();

        $qrcoin = new Qr();
        $qrcoin->id = 7;
        $qrcoin->crd_id = null;
        $qrcoin->erb_id = null;
        $qrcoin->qr_serie = 'CGHKNOUYZ6';
        $qrcoin->coins = 2000;
        $qrcoin->gone_down = 0;
        $qrcoin->save();
        
        $qrcoin = new Qr();
        $qrcoin->id = 8;
        $qrcoin->crd_id = null;
        $qrcoin->erb_id = null;
        $qrcoin->qr_serie = 'CFJM012468';
        $qrcoin->coins = 2000;
        $qrcoin->gone_down = 0;
        $qrcoin->save();

        $qrcoin = new Qr();
        $qrcoin->id = 9;
        $qrcoin->crd_id = null;
        $qrcoin->erb_id = null;
        $qrcoin->qr_serie = 'BGHIJPVW07';
        $qrcoin->coins = 2000;
        $qrcoin->gone_down = 0;
        $qrcoin->save();
    }
}
