<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Sensor;

//use function Ramsey\Uuid\v1;

class AddSensorTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Sensor Example #1
        $sensor = new Sensor();
        $sensor->id = 1;
        $sensor->erb_id = 1;
        $sensor->num_serie = 1000000001;
        $sensor->passw = 'sensor@321';
        $sensor->vol_1 = 'On';
        $sensor->vol_2 = 'Off';
        $sensor->vol_3 = 'Off';
        $sensor->temp_1 = '20.3';
        $sensor->temp_2 = '19.8';
        $sensor->temp_3 = '21.2';
        $sensor->temp_4 = '19.9';
        $sensor->door_1 = 'On';
        $sensor->door_2 = 'Off';
        $sensor->door_3 = 'On';
        $sensor->door_4 = 'On';
        $sensor->rlay_1 = 'On';
        $sensor->rlay_2 = 'Off';
        $sensor->rlay_3 = 'On';
        $sensor->rlay_4 = 'Off';
        $sensor->text = 'sensor demo';
        $sensor->save();

        /*
        // Sensor Example #2
        $sensor = new Sensor();
        $sensor->id = 2;
        $sensor->erb_id = 2;
        $sensor->num_serie = 1000000002;
        $sensor->passw = 'sensor@321';
        $sensor->vol_1 = 'On';
        $sensor->vol_2 = 'Off';
        $sensor->vol_3 = 'Off';
        $sensor->temp_1 = '20.3';
        $sensor->temp_2 = '19.8';
        $sensor->temp_3 = '21.2';
        $sensor->temp_4 = '19.9';
        $sensor->door_1 = 'On';
        $sensor->door_2 = 'Off';
        $sensor->door_3 = 'On';
        $sensor->door_4 = 'On';
        $sensor->rlay_1 = 'On';
        $sensor->rlay_2 = 'Off';
        $sensor->rlay_3 = 'On';
        $sensor->rlay_4 = 'Off';
        $sensor->text = 'sensor demo';
        $sensor->save();

        // Sensor Example #3
        $sensor = new Sensor();
        $sensor->id = 3;
        $sensor->erb_id = 3;
        $sensor->num_serie = 1000000003;
        $sensor->passw = 'sensor@321';
        $sensor->vol_1 = 'On';
        $sensor->vol_2 = 'Off';
        $sensor->vol_3 = 'Off';
        $sensor->temp_1 = '20.3';
        $sensor->temp_2 = '19.8';
        $sensor->temp_3 = '21.2';
        $sensor->temp_4 = '19.9';
        $sensor->door_1 = 'On';
        $sensor->door_2 = 'Off';
        $sensor->door_3 = 'On';
        $sensor->door_4 = 'On';
        $sensor->rlay_1 = 'On';
        $sensor->rlay_2 = 'Off';
        $sensor->rlay_3 = 'On';
        $sensor->rlay_4 = 'Off';
        $sensor->text = 'sensor demo';
        $sensor->save();

        // Sensor Example #4
        $sensor = new Sensor();
        $sensor->id = 4;
        $sensor->erb_id = 4;
        $sensor->num_serie = 1000000004;
        $sensor->passw = 'sensor@321';
        $sensor->vol_1 = 'On';
        $sensor->vol_2 = 'Off';
        $sensor->vol_3 = 'Off';
        $sensor->temp_1 = '20.3';
        $sensor->temp_2 = '19.8';
        $sensor->temp_3 = '21.2';
        $sensor->temp_4 = '19.9';
        $sensor->door_1 = 'On';
        $sensor->door_2 = 'Off';
        $sensor->door_3 = 'On';
        $sensor->door_4 = 'On';
        $sensor->rlay_1 = 'On';
        $sensor->rlay_2 = 'Off';
        $sensor->rlay_3 = 'On';
        $sensor->rlay_4 = 'Off';
        $sensor->text = 'sensor demo';
        $sensor->save();

        // Sensor Example #5
        $sensor = new Sensor();
        $sensor->id = 5;
        $sensor->erb_id = 5;
        $sensor->num_serie = 1000000005;
        $sensor->passw = 'sensor@321';
        $sensor->vol_1 = 'On';
        $sensor->vol_2 = 'Off';
        $sensor->vol_3 = 'Off';
        $sensor->temp_1 = '20.3';
        $sensor->temp_2 = '19.8';
        $sensor->temp_3 = '21.2';
        $sensor->temp_4 = '19.9';
        $sensor->door_1 = 'On';
        $sensor->door_2 = 'Off';
        $sensor->door_3 = 'On';
        $sensor->door_4 = 'On';
        $sensor->rlay_1 = 'On';
        $sensor->rlay_2 = 'Off';
        $sensor->rlay_3 = 'On';
        $sensor->rlay_4 = 'Off';
        $sensor->text = 'sensor demo';
        $sensor->save();

        // Sensor Example #6
        $sensor = new Sensor();
        $sensor->id = 6;
        $sensor->erb_id = 6;
        $sensor->num_serie = 1000000006;
        $sensor->passw = 'sensor@321';
        $sensor->vol_1 = 'On';
        $sensor->vol_2 = 'Off';
        $sensor->vol_3 = 'Off';
        $sensor->temp_1 = '20.3';
        $sensor->temp_2 = '19.8';
        $sensor->temp_3 = '21.2';
        $sensor->temp_4 = '19.9';
        $sensor->door_1 = 'On';
        $sensor->door_2 = 'Off';
        $sensor->door_3 = 'On';
        $sensor->door_4 = 'On';
        $sensor->rlay_1 = 'On';
        $sensor->rlay_2 = 'Off';
        $sensor->rlay_3 = 'On';
        $sensor->rlay_4 = 'Off';
        $sensor->text = 'sensor demo';
        $sensor->save();

        // Sensor Example #7
        $sensor = new Sensor();
        $sensor->id = 7;
        $sensor->erb_id = 7;
        $sensor->num_serie = 1000000007;
        $sensor->passw = 'sensor@321';
        $sensor->vol_1 = 'On';
        $sensor->vol_2 = 'Off';
        $sensor->vol_3 = 'Off';
        $sensor->temp_1 = '20.3';
        $sensor->temp_2 = '19.8';
        $sensor->temp_3 = '21.2';
        $sensor->temp_4 = '19.9';
        $sensor->door_1 = 'On';
        $sensor->door_2 = 'Off';
        $sensor->door_3 = 'On';
        $sensor->door_4 = 'On';
        $sensor->rlay_1 = 'On';
        $sensor->rlay_2 = 'Off';
        $sensor->rlay_3 = 'On';
        $sensor->rlay_4 = 'Off';
        $sensor->text = 'sensor demo';
        $sensor->save();

        // Sensor Example #8
        $sensor = new Sensor();
        $sensor->id = 8;
        $sensor->erb_id = 8;
        $sensor->num_serie = 1000000008;
        $sensor->passw = 'sensor@321';
        $sensor->vol_1 = 'On';
        $sensor->vol_2 = 'Off';
        $sensor->vol_3 = 'Off';
        $sensor->temp_1 = '20.3';
        $sensor->temp_2 = '19.8';
        $sensor->temp_3 = '21.2';
        $sensor->temp_4 = '19.9';
        $sensor->door_1 = 'On';
        $sensor->door_2 = 'Off';
        $sensor->door_3 = 'On';
        $sensor->door_4 = 'On';
        $sensor->rlay_1 = 'On';
        $sensor->rlay_2 = 'Off';
        $sensor->rlay_3 = 'On';
        $sensor->rlay_4 = 'Off';
        $sensor->text = 'sensor demo';
        $sensor->save();

        // Sensor Example #9
        $sensor = new Sensor();
        $sensor->id = 9;
        $sensor->erb_id = 9;
        $sensor->num_serie = 1000000009;
        $sensor->passw = 'sensor@321';
        $sensor->vol_1 = 'On';
        $sensor->vol_2 = 'Off';
        $sensor->vol_3 = 'Off';
        $sensor->temp_1 = '20.3';
        $sensor->temp_2 = '19.8';
        $sensor->temp_3 = '21.2';
        $sensor->temp_4 = '19.9';
        $sensor->door_1 = 'On';
        $sensor->door_2 = 'Off';
        $sensor->door_3 = 'On';
        $sensor->door_4 = 'On';
        $sensor->rlay_1 = 'On';
        $sensor->rlay_2 = 'Off';
        $sensor->rlay_3 = 'On';
        $sensor->rlay_4 = 'Off';
        $sensor->text = 'sensor demo';
        $sensor->save();

        // Sensor Example #10
        $sensor = new Sensor();
        $sensor->id = 10;
        $sensor->erb_id = 10;
        $sensor->num_serie = 1000000010;
        $sensor->passw = 'sensor@321';
        $sensor->vol_1 = 'On';
        $sensor->vol_2 = 'Off';
        $sensor->vol_3 = 'Off';
        $sensor->temp_1 = '20.3';
        $sensor->temp_2 = '19.8';
        $sensor->temp_3 = '21.2';
        $sensor->temp_4 = '19.9';
        $sensor->door_1 = 'On';
        $sensor->door_2 = 'Off';
        $sensor->door_3 = 'On';
        $sensor->door_4 = 'On';
        $sensor->rlay_1 = 'On';
        $sensor->rlay_2 = 'Off';
        $sensor->rlay_3 = 'On';
        $sensor->rlay_4 = 'Off';
        $sensor->text = 'sensor demo';
        $sensor->save();
        */

    }
}
