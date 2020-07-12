<?php

namespace App\Http\Controllers;

use App\ApiToken;
use App\Crd;
use App\User;
use App\HistorialCrd;
use Crypt;
use Illuminate\Http\Request;

class HistorialCrdController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $historialcrds = HistorialCrd::all();
        foreach ($historialcrds as $key => $historialcrd) {
            $historialcrd->password = Crypt::decrypt($historialcrd->password);  
        }
        return view('module.historialcrd.index',compact('historialcrds'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $crds = Crd::all();
        return view('module.historialcrd.create',compact('crds'));
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
            'crd_id'=>'required|string|max:100',
            'num_serie'=>'required|string|max:100',
            'nick_name'=>'required|string|max:100',
            'password'=>'required|string|max:100',
            //'api_token'=>'required|string|max:100',
        ]);
        $historialcrd = new HistorialCrd([
            'crd_id' => $request->get('crd_id'),
            'num_serie' => $request->get('num_serie'),
            'nick_name' => $request->get('nick_name'),
            //'password' => $request->get('password'),
            //'api_token' => $request->get('api_token')
            ]);
        $historialcrd->password = Crypt::encrypt($request->get('password'));
        $historialcrd->api_token = ApiToken::GenerateToken32();
        $historialcrd->save();
        toastr()->success('Historial Crd Creado');
        return redirect()->route('historialcrd.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\HistorialCrd  $historialCrd
     * @return \Illuminate\Http\Response
     */
    public function show(HistorialCrd $historialcrd)
    {
        //
        $historialcrd->password = Crypt::decrypt($historialcrd->password);  
        return view('module.historialcrd.show',compact('historialcrd'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\HistorialCrd  $historialCrd
     * @return \Illuminate\Http\Response
     */
    public function edit(HistorialCrd $historialcrd)
    {
        //
        $crds = Crd::all();
        $historialcrd->password = Crypt::decrypt($historialcrd->password);  
        return view('module.historialcrd.edit', compact('historialcrd','crds'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\HistorialCrd  $historialCrd
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, HistorialCrd $historialcrd)
    {
        //
        $request->validate([
            'crd_id'=>'required|string|max:100',
            'num_serie'=>'required|string|max:100',
            'nick_name'=>'required|string|max:100',
            'password'=>'required|string|max:100',
            'api_token'=>'required|string|max:100',
        ]);
        $historialcrd_request = $request->all();
        $historialcrd_request['crd_id'] =  $request->get('crd_id');
        $historialcrd_request['num_serie'] =  $request->get('num_serie');
        $historialcrd_request['nick_name'] =  $request->get('nick_name');
        $historialcrd_request['password'] = Crypt::encrypt($request->get('password'));
        $historialcrd_request['api_token'] =  $request->get('api_token');
        $historialcrd->update($historialcrd_request);
        toastr()->warning('Historial crd actuaizado');
        return redirect()->route('historialcrd.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\HistorialCrd  $historialCrd
     * @return \Illuminate\Http\Response
     */
    public function destroy(HistorialCrd $historialcrd)
    {
        //
        $historialcrd->delete();
        //return redirect('/historialcrd')->with('success', 'Crd Eliminado!');
        toastr()->error('Crd Hitorial eliminado');
        return redirect()->route('historialcrd.index');
    }
}
