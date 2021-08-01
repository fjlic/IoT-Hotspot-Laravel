<?php

namespace App\Http\Controllers;

use App\ApiToken;
use App\Erb;
use App\HistorialErb;
use Crypt;
use Illuminate\Http\Request;

class HistorialErbController extends Controller
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
        $historialerbs = HistorialErb::latest()->take(1000)->get();
        foreach ($historialerbs as $key => $historialerb) {
            $historialerb->password = Crypt::decrypt($historialerb->password);  
        }
        return view('module.historialerb.index',compact('historialerbs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $erbs = Erb::all();
        return view('module.historialerb.create',compact('erbs'));
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
            'erb_id'=>'required|string|max:100',
            'num_serie'=>'required|string|max:100',
            'name_machine'=>'required|string|max:100',
            'nick_name'=>'required|string|max:100',
            'password'=>'required|string|max:100',
        ]);
        $historialerb = new HistorialErb([
            'erb_id' => $request->get('erb_id'),
            'name_machine' => $request->get('name_machine'),
            'num_serie' => $request->get('num_serie'),
            'nick_name' => $request->get('nick_name'),
            'password' => $request->get('password'),
            ]);
        $historialerb->password = Crypt::encrypt($request->get('password'));
        $historialerb->api_token = ApiToken::GenerateToken32();
        $historialerb->save();
        toastr()->success('Historial erb Creado');
        return redirect()->route('historialerb.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\HistorialErb  $historialErb
     * @return \Illuminate\Http\Response
     */
    public function show(HistorialErb $historialerb)
    {
        //
        $historialerb->password = Crypt::decrypt($historialerb->password);  
        return view('module.historialerb.show',compact('historialerb'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\HistorialErb  $historialErb
     * @return \Illuminate\Http\Response
     */
    public function edit(HistorialErb $historialerb)
    {
        //
        $erbs = Erb::all();
        $historialerb->password = Crypt::decrypt($historialerb->password);  
        return view('module.historialerb.edit', compact('historialerb','erbs'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\HistorialErb  $historialErb
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, HistorialErb $historialerb)
    {
        //
        $request->validate([
            'erb_id'=>'required|string|max:100',
            'num_serie'=>'required|string|max:100',
            'name_machine'=>'required|string|max:100',
            'nick_name'=>'required|string|max:100',
            'password'=>'required|string|max:100',
            'api_token'=>'required|string|max:100',
        ]);
        $historialerb_request = $request->all();
        $historialerb_request['erb_id'] =  $request->get('erb_id');
        $historialerb_request['num_serie'] =  $request->get('num_serie');
        $historialerb_request['name_machine'] =  $request->get('name_machine');
        $historialerb_request['nick_name'] =  $request->get('nick_name');
        $historialerb_request['password'] = Crypt::encrypt($request->get('password'));
        $historialerb_request['api_token'] =  $request->get('api_token');
        $historialerb->update($historialerb_request);
        toastr()->warning('Historial erb actuaizado');
        return redirect()->route('historialerb.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\HistorialErb  $historialErb
     * @return \Illuminate\Http\Response
     */
    public function destroy(HistorialErb $historialerb)
    {
        //
        $historialerb->delete();
        //return redirect('/historialerb')->with('success', 'Erb Eliminado!');
        toastr()->error('Erb Hitorial eliminado');
        return redirect()->route('historialerb.index');
    }
}
