<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Role;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    
    public function index()
    { 
        $filter = Role::all();
        if(auth()->user()->hasRole('root')){
          $roles = $filter->filter(function ($role, $key) {
              return $role->name != 'root';
          });
        }
        else if(auth()->user()->hasRole('admin')){
            $roles = $filter->filter(function ($role, $key) {
                return $role->name != 'root' && $role->name != 'admin';
            });
        }
        else if(auth()->user()->hasRole('super')){
            $roles = $filter->filter(function ($role, $key) {
                return $role->name != 'root' && $role->name != 'admin' && $role->name != 'super';
            });
        }
        else if(auth()->user()->hasRole('user')){
            $roles = $filter->filter(function ($role, $key) {
                return $role->name != 'root' && $role->name != 'admin' && $role->name != 'super' && $role->name != 'user' && $role->name != 'disable';
            });
        }
        $users = collect();
            foreach ($roles as $key => $role) {
                foreach (User::whereRoleIs($role->name)->get() as $key => $value) {
                $value->name_role = $role->name;  
                $users->push($value); 
                $users->all();
                }
            }
        return view('module.user.index', compact('users'));
    }
}
