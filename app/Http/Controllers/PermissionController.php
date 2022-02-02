<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Session;
use App\Models\Permission;


class PermissionController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the Permision.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $permissions = Permission::all();
        return view('module.permission.index',compact('permissions'));
    }

    /**
     * Show the form for creating a new resource for Permision.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('module.permission.create');
    }

    /**
     * Store a newly created resource in storage for Permision.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $createPermission = Permission::create([
            'name' => $request->get('name'),
            'display_name' => $request->get('display_name'), // optional
            'description' => $request->get('description'), // optional
            ]);
        toastr()->success('Permiso creado');
        return redirect()->route('permission.index');
    }

    /**
     * Display the specified resource for Permission.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Permission $permission)
    {
        //
        return view('module.permission.show', compact('permission'));
    }

    public function edit($id)
    {
        $permission = Permission::findOrFail($id);
        return view('module.permission.edit',compact('permission'));
    }

    /**
     * Update the specified resource in storage for Perrmission.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $permission = Permission::findOrFail($id);

        $data = $request->validate([
            'display_name' => 'nullable|string',
            'description' => 'nullable|string',
        ]);

        $permission->update($data);
        toastr()->warning('Permiso actualizado satisfactoriamente');
        return redirect()->route('permission.index');
    }

    /**
     * Remove the specified resource from storage for Permission.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Permission $permission)
    {
        $permission->delete();
        //return redirect('/permission')->with('success', 'Permiso Eliminado!');
        toastr()->error('Permiso eliminado');
        return redirect()->route('permission.index');
    }
}
