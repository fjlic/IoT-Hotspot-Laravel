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
        $hostpot->name = 'Hostpot_1';
        $hostpot->email = 'hostpot_1@galex.com';
        $hostpot->password = Hash::make('hostpot1@54321');
        $hostpot->branch_office = 'Santa Anita';
        $hostpot->serial_number = '000000000000001';
        $hostpot->save();
    }
}
