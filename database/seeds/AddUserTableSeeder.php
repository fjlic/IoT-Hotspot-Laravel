<?php

use Illuminate\Database\Seeder;
use App\User;

class AddUserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $hostpot = new User();
        $hostpot->id = 4;
        $hostpot->region_id = 1;
        $hostpot->name = 'Hotspot_1';
        $hostpot->email = 'hotspot_1@local.com';
        $hostpot->password = Hash::make('hotspot1@54321');
        $hostpot->branch_office = 'Plaza Forum';
        $hostpot->serial_number = '000000000000001';
        $hostpot->save();
    }
}
