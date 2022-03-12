<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Session;
use App\Models\Role;

class RoleController extends Controller
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
        $roles = Role::all();
        return view('modules.role.index',compact('roles'));
    }

    /**
     * Show the form for creating a new resource for Role.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('modules.role.create');
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
    public function show(Role $role)
    {
        //
        return view('modules.role.show', compact('role'));
    }

    public function edit($id)
    {
        $role = Role::findOrFail($id);
        return view('modules.role.edit',compact('role'));
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
