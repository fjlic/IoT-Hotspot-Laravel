<?php

namespace App\Http\Controllers;

use App\Crd;
use App\User;
use App\ApiToken;
use Crypt;
use Illuminate\Http\Request;

class CrdController extends Controller
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
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $crds = Crd::all();
        foreach ($crds as $key => $crd) {
        $crd->password = Crypt::decrypt($crd->password);
        }
        return view('module.crd.index',compact('crds'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function testertuck()
    {
        //
        $crds = Crd::all();
        foreach ($crds as $key => $crd) {
        $crd->password = Crypt::decrypt($crd->password);
        }
        return view('module.crd.index',compact('crds'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $users = User::all();
        return view('module.crd.create',compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'user_id'=>'required|string|max:100',
            'num_serie'=>'required|string|max:100',
            'name_machine'=>'required|string|max:100',
            'nick_name'=>'required|string|max:100',
            'password'=>'required|string|max:100',
        ]);

         $crd = new Crd();
         $crd->user_id = $request->get('user_id');
         $crd->num_serie = $request->get('num_serie');
         $crd->nick_name = $request->get('nick_name');
         $crd->name_machine = $request->get('name_machine');
         $crd->password = Crypt::encrypt($request->get('password'));
         $crd->api_token = ApiToken::GenerateToken32();
         $crd->status_video = '1';
         $crd->save();
        //return redirect('/crd')->with('success', 'Crd Generado Satisfactoriamente!');
        toastr()->success('Crd generado satisfactoriamente');
        return redirect()->route('crd.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Crd  $crd
     * @return \Illuminate\Http\Response
     */
    public function show(Crd $crd)
    {
        //
        $crd->password = Crypt::decrypt($crd->password);
        if($crd->status_video == '0')
          toastr()->warning('Crd espacio limitado');

        return view('module.crd.show',compact('crd'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Crd  $crd
     * @return \Illuminate\Http\Response
     */
    public function edit(Crd $crd)
    {
        //
        $users = User::all();
        $crd->password = Crypt::decrypt($crd->password);
        return view('module.crd.edit', compact('crd','users'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Crd  $crd
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Crd $crd)
    {
        //
        $request->validate([
            'user_id'=>'required|string|max:100',
            'num_serie'=>'required|string|max:100',
            'name_machine'=>'required|string|max:100',
            'nick_name'=>'required|string|max:100',
            'password'=>'required|string|max:100',
            'api_token'=>'required|string|max:100',
            'status_video'=>'required|string|max:10'
        ]);
        $crd_request = $request->all();
        $crd_request['user_id'] =  $request->get('user_id');
        $crd_request['num_serie'] =  $request->get('num_serie');
        $crd_request['name_machine'] =  $request->get('name_machine');
        $crd_request['nick_name'] =  $request->get('nick_name');
        $crd_request['password'] = Crypt::encrypt($request->get('password'));
        $crd_request['api_token'] =  $request->get('api_token');
        $crd_request['status_video'] =  $request->get('status_video');
        $crd->update($crd_request);
        toastr()->warning('Crd Actualizado Satisfactoriamente');
        return redirect()->route('crd.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Crd  $crd
     * @return \Illuminate\Http\Response
     */
    public function destroy(Crd $crd)
    {
        //
        $crd->delete();
        toastr()->error('Crd eliminado satisfactoriamente');
        return redirect()->route('crd.index');
    }
}
