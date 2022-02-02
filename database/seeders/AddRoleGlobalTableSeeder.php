<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Role;
use App\Models\User;
use App\Models\Crd;
use App\Models\Erb;


class AddRoleGlobalTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $users = User::all();
        $crds = Crd::all();
        $erbs = ERB::all();
        $role_root = Role::where('name','root')->first();
        $role_admin = Role::where('name','admin')->first();
        $role_super = Role::where('name','super')->first();
        $role_user = Role::where('name','user')->first();
        $role_crd = Role::where('name','crd')->first();
        $role_erb = Role::where('name','erb')->first();

        /* Asign roles with users and micros*/

        $root = $users->find(1);
        $root->attachRole($role_root);
        $root->save();

        $admin = $users->find(2);
        $admin->attachRole($role_admin);
        $admin->save();

        $super = $users->find(3);
        $super->attachRole($role_super);
        $super->save();

        $user = $users->find(4);
        $user->attachRole($role_user);
        $user->save();

        $disable = $users->find(5);
        $disable->attachRole($role_user);
        $disable->save();

        for ($i = 1; $i <= $crds->count(); $i++) {
            $crd = $crds->find($i);
            $crd->attachRole($role_crd);
            $crd->save();
        }

        for ($i = 1; $i <= $erbs->count(); $i++) {
            $erb = $erbs->find($i);
            $erb->attachRole($role_erb);
            $erb->save();
        }
    }
}
