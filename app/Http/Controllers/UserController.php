<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Hash;
use Crypt;
use App\Models\User;
use App\Models\Role;
use Carbon;

class UserController extends Controller
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
     * Display a listing of the Users.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    { 
        $roles = Role::all();
        $users = collect();
        if(auth()->user()->hasRole('root')){
          $roles = $roles->filter(function ($role, $key) {
              return $role->name != 'root';
          });
        }
        else if(auth()->user()->hasRole('admin')){
            $roles = $roles->filter(function ($role, $key) {
                return $role->name != 'root' && $role->name != 'admin';
            });
        }
        else if(auth()->user()->hasRole('super')){
            $roles = $roles->filter(function ($role, $key) {
                return $role->name != 'root' && $role->name != 'admin' && $role->name != 'super';
            });
        }
        else if(auth()->user()->hasRole('user')){
            $roles = $roles->filter(function ($role, $key) {
                return $role->name != 'root' && $role->name != 'admin' && $role->name != 'super' && $role->name != 'user' && $role->name != 'disable';
            });
        }
        
        foreach ($roles as $key => $role) {
            foreach (User::whereRoleIs($role->name)->get() as $key => $value) {
                $value->name_role = $role->name;
                $users->push($value);
                $users->all();
            }
        }
        return view('modules.user.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource for Users.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $filter = Role::all();
        $roles = $filter->filter(function ($role, $key) {
            return $role->name != 'root';
        });
        $roles = Role::all();
        return view('modules.user.create',compact('roles'));
    }

    /**
     * Store a newly created resource in storage for Users.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'name'=>'required|string|max:50',
            'email'=>'required|string|email|max:30|unique:users',
            'password'=>'required|string|min:3',
            'name_role'=>'required|string|max:50',
        ]);
        $user = new User([
            'name' => $request->get('name'),
            'email' => $request->get('email'),
            'password' =>  Hash::make($request->get('password'))]);  
        $user->save();
        $user->attachRole($request->get('name_role'));
        toastr()->success('Usuario creado');
        return redirect()->route('user.index');
    }

    /**
     * Display the specified resource for Users.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
        foreach (Role::all() as $key => $role) {
            if($user->hasRole($role->name)){
             $user->name_role = $role->name;        
            }
        }
        return view('modules.user.show',compact('user'));
    }

    /**
     * Show the form for editing the specified resource for Users.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        //
        /*$filter = Role::all();
        $roles = $filter->filter(function ($role, $key) {
            return $role->name != 'hostpot';
        });
        foreach (Role::all() as $key => $role) {
            if($user->hasRole($role->name)){
             $user->name_role = $role->name; 
             $roles = $roles->except($role->id);       
            }
        }*/
        $roles = Role::all();
        return view('modules.user.edit', compact('user','roles'));
    }

    /**
     * Update the specified resource in storage for Users.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        //
        $request->validate([
            'name'=>'required|string|max:50',
            'email'=>'required|string|email|max:50',
            'name_role'=>'required|string|max:30',
            'password'=>'nullable'
        ]);
        if(!empty($request->get('password'))){
           $request['password'] = Hash::make($request->get('password'));  
        }
        else{
            $request['password'] = $user->password;  
        }
        $user_request = $request->all();
        foreach (Role::all() as $key => $role) {
            if($user->hasRole($role->name)){
               $user->detachRole($role->name);       
            }
        }
        $update_role = Role::where('name',$request->get('name_role'))->first();
        $user->attachRole($update_role);
        $user->update($user_request);
        toastr()->warning('Usuario actualizado');
        return redirect()->route('user.index');
    }

    /**
     * Remove the specified resource from storage for Users.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->delete();
        //return redirect('/user')->with('success', 'Usuario Eliminado!');
        toastr()->error('Usuario eliminado');
        return redirect()->route('user.index');
    }
}
