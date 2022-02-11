<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        //$this->call(UserSeeder::class);
        $this->call(LaratrustSeeder::class);
        $this->call(AddRegionTableSeeder::class);
        $this->call(AddUserTableSeeder::class);
        $this->call(AddCrdTableSeeder::class);
        $this->call(AddErbTableSeeder::class);
        $this->call(AddRoleGlobalTableSeeder::class);
        $this->call(AddQrTableSeeder::class);
        $this->call(AddNfcTableSeeder::class);
        $this->call(AddSensorTableSeeder::class);
        //$this->call(AddTableProbeStimatingSeeder::class);
        //$this->call(AddClassNameTableSeeder::class);
        //$this->call(AddChapterTableSeeder::class);
        $this->call(AddFileTableSeeder::class);
        $this->call(AddCounterTableSeeder::class);
        $this->call(AddHistorialQrTableSeeder::class);
        $this->call(AddHistorialNfcTableSeeder::class);
        $this->call(AddHistorialCounterTableSeeder::class);
        $this->call(AddHistorialSensorTableSeeder::class);
        $this->call(AddStatisticalCounterTableSeeder::class);
        $this->call(AddStatisticalRequestTableSeeder::class);    
        $this->call(AddStatisticalSensorTableSeeder::class);    
        $this->call(AddLearningRequestTableSeeder::class);
        $this->call(AddLearningSensorTableSeeder::class);
        $this->call(AddAlertTableSeeder::class);
        
    }
}
