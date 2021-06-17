<?php

namespace Database\Seeders;

use App\Region;
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
        $region->country = 'Por Asignar';
        $region->state = 'Por Asignar';
        $region->municipality = 'Por Asignar';
        $region->suburb = 'Por Asignar';
        $region->save();

        $region = new Region();
        $region->id = 2;
        $region->country = 'Mexico';
        $region->state = 'Jalisco';
        $region->municipality = 'Tlaquepaque';
        $region->suburb = 'Tequepexpan';
        $region->save();
    }
}
