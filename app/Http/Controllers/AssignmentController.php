<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Session;
use App\Models\User;
use App\Models\Crd;
use App\Models\Erb;
use App\Models\Role;
use App\Models\Permission;
use DB;

class AssignmentController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the Role.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $models = array_keys(Config::get('laratrust.user_models'));
        $users = User::all();
        $array_roles = array();
        $array_permissions = array();
        foreach (Role::all() as $key_role => $role) {
        $array_roles[$key_role] = $role->name;
        }
        foreach (Permission::all() as $key_permission => $permission) {
        $array_permissions[$key_permission] = $permission->name;
        }
        foreach ($users as $key_user => $user) {
        $options = [
            'validate_all' => true,
            'return_type' => 'both'
        ];
        $user->ability = $user->ability(
            [$array_roles[0]],
            [$array_permissions[0]],
            $options
        );
        }

        foreach ($users as $key_user => $user) {
            $options = [
                'validate_all' => true,
                'return_type' => 'both'
            ];
            $assignment = array();
            foreach (Role::all() as $key_role => $role)
            {
                if($user->hasRole($role->name))
                {
                    $user->num_role += 1;
                    foreach (Permission::all() as $key_permission => $permission) {
                        if($user->hasPermission($permission->name))
                        {
                            $user->num_permission += 1;
                            $assignment[$key_permission] = $user->ability(
                                ['root', 'admin', 'super', 'user', 'disable'],
                                [$permission->name],
                                [
                                'validate_all' => true,
                                'return_type' => 'both'
                                ]
                            );
                        }
                    } 
                }
            }
            $user->assignment = $assignment;
        }
        return view('module.assignment.index',compact('models','users'));
    }

    /**
     * Show the form for creating a new resource for Role.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('module.role.create');
    }

    /**
     * Store a newly created resource in storage for Role.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $createRole = Role::create([
            'name' => $request->get('name'),
            'display_name' => $request->get('display_name'), // optional
            'description' => $request->get('description'), // optional
            ]);
        toastr()->success('Role creado');
        return redirect()->route('role.index');
    }

    /**
     * Display the specified resource for Role.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($user)
    {
        //
        dd($user);
        return view('module.role.show',compact('user'));
    }

    public function edit($id)
    {
        $role = Role::findOrFail($id);
        return view('module.role.edit',compact('role'));
    }

    /**
     * Update the specified resource in storage for Role.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $role = Role::findOrFail($id);

        $data = $request->validate([
            'display_name' => 'nullable|string',
            'description' => 'nullable|string',
        ]);

        $role->update($data);
        toastr()->warning('Role actualizado satisfactoriamente');
        return redirect()->route('role.index');
    }

    /**
     * Remove the specified resource from storage for Role.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Role $role)
    {
        $role->delete();
        //return redirect('/role')->with('success', 'Role Eliminado!');
        toastr()->error('Role eliminado');
        return redirect()->route('role.index');
    }
}
