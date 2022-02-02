<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Hash;
use App\Models\User;

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
        $root = new User();
        $root->id = 1;
        $root->region_id = 2;
        $root->name = 'Root';
        $root->email = 'root@fjlic.com';
        $root->password = Hash::make('root@54321');
        $root->branch_office = 'Sin Asignar';
        $root->serial_number = '0000000001';
        $root->save();

        $admin = new User();
        $admin->id = 2;
        $admin->region_id = 2;
        $admin->name = 'Admin';
        $admin->email = 'admin@fjlic.com';
        $admin->password = Hash::make('admin@54321');
        $admin->branch_office = 'Sin Asignar';
        $admin->serial_number = '0000000002';
        $admin->save();

        $super = new User();
        $super->id = 3;
        $super->region_id = 2;
        $super->name = 'Super';
        $super->email = 'super@fjlic.com';
        $super->password = Hash::make('super@54321');
        $super->branch_office = 'Sin Asignar';
        $super->serial_number = '0000000003';
        $super->save();

        $user = new User();
        $user->id = 4;
        $user->region_id = 2;
        $user->name = 'User';
        $user->email = 'user@fjlic.com';
        $user->password = Hash::make('user@54321');
        $user->branch_office = 'Sin Asignar';
        $user->serial_number = '0000000004';
        $user->save();

        $disable = new User();
        $disable->id = 5;
        $disable->region_id = 2;
        $disable->name = 'Demo';
        $disable->email = 'demo@fjlic.com';
        $disable->password = Hash::make('demo@54321');
        $disable->branch_office = 'Sin Asignar';
        $disable->serial_number = '0000000005';
        $disable->save();
    }
}

