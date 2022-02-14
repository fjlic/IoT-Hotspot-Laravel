<?php

namespace Database\Seeders;

use App\Models\Region;
use Illuminate\Database\Seeder;

class AddRegionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $region = new Region();
        $region->id = 1;
        $region->country = 'By assigning';
        $region->state = 'By assigning';
        $region->municipality = 'By assigning';
        $region->suburb = 'By assigning';
        $region->save();

        $region = new Region();
        $region->id = 2;
        $region->country = 'Mexico';
        $region->state = 'Jalisco';
        $region->municipality = 'Tlaquepaque';
        $region->suburb = 'San Pedro Tlquepaque';
        $region->save();
    }
}
