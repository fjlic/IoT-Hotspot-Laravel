<?php

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
        // $this->call(UserSeeder::class);
        $this->call(LaratrustSeeder::class);
        $this->call(AddRegionTableSeeder::class);
        $this->call(AddUserTableSeeder::class);
        $this->call(AddCrdTableSeeder::class);
        $this->call(AddErbTableSeeder::class);
        $this->call(AddRoleGlobalTableSeeder::class);
        $this->call(AddQrTableSeeder::class);
        $this->call(AddNfcTableSeeder::class);
        $this->call(AddHistorialQrTableSeeder::class);
        $this->call(AddHistorialNfcTableSeeder::class);
    }
}
