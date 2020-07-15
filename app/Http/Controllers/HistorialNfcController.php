<?php

namespace App\Http\Controllers;

use App\Nfc;
use App\HistorialNfc;
use Illuminate\Http\Request;

class HistorialNfcController extends Controller
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
        $historialnfcs = HistorialNfc::all();
        return view('module.historialnfc.index',compact('historialnfcs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $nfcs = Nfc::all();
        return view('module.historialnfc.create',compact('nfcs'));
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
            'nfc_id'=>'required|string|max:100',
            'num_serie'=>'required|string|max:100',
            'key_1'=>'required|string|max:100',
            'key_2'=>'required|string|max:100',
            'key_3'=>'required|string|max:100',
            'key_4'=>'required|string|max:100',
            'key_5'=>'required|string|max:100',
            'ssid'=>'required|string|max:100',
            'text'=>'required|string|max:100',
            'password'=>'required|string|max:100',
            'dns_server'=>'required|string|max:100',
            'ip_server'=>'required|string|max:100',
            'protocol'=>'required|string|max:100',
            'port'=>'required|string|max:100',
            'text'=>'required|string|max:100',
        ]);
        $historialnfc = new HistorialNfc([
            'nfc_id' => $request->get('nfc_id'),
            'num_serie' => $request->get('num_serie'),
            'key_1' =>  $request->get('key_1'),
            'key_2' =>  $request->get('key_2'),
            'key_3' =>  $request->get('key_3'),
            'key_4' =>  $request->get('key_4'),
            'key_5' =>  $request->get('key_5'),
            'ssid' =>  $request->get('ssid'),
            'text' =>  $request->get('text'),
            'password' =>  $request->get('password'),
            'dns_server' =>  $request->get('dns_server'),
            'ip_server' =>  $request->get('ip_server'),
            'protocol' =>  $request->get('protocol'),
            'port' =>  $request->get('port'),
            'text' =>  $request->get('text')

        ]);
        $historialnfc->save();
        toastr()->success('Historial Nfc creado');
        return redirect()->route('historialnfc.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\HistorialNfc  $historialNfc
     * @return \Illuminate\Http\Response
     */
    public function show(HistorialNfc $historialnfc)
    {
        //
        return view('module.historialnfc.show',compact('historialnfc'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\HistorialNfc  $historialNfc
     * @return \Illuminate\Http\Response
     */
    public function edit(HistorialNfc $historialnfc)
    {
        //
        $nfcs = Nfc::all();
        return view('module.historialnfc.edit', compact('historialnfc','nfcs'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\HistorialNfc  $historialNfc
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, HistorialNfc $historialnfc)
    {
        //
        $request->validate([
            'nfc_id'=>'required|string|max:100',
            'num_serie'=>'required|string|max:100',
            'key_1'=>'required|string|max:100',
            'key_2'=>'required|string|max:100',
            'key_3'=>'required|string|max:100',
            'key_4'=>'required|string|max:100',
            'key_5'=>'required|string|max:100',
            'ssid'=>'required|string|max:100',
            'password'=>'required|string|max:100',
            'dns_server'=>'required|string|max:100',
            'ip_server'=>'required|string|max:100',
            'protocol'=>'required|string|max:100',
            'port'=>'required|string|max:100',
            'text'=>'required|string|max:100',
        ]);
        $historialnfc_request = $request->all();
        $historialnfc->update($historialnfc_request);
        toastr()->warning('Historial Nfc actuaizado');
        return redirect()->route('historialnfc.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\HistorialNfc  $historialNfc
     * @return \Illuminate\Http\Response
     */
    public function destroy(HistorialNfc $historialnfc)
    {
        //
        $historialnfc->delete();
        //return redirect('/user')->with('success', 'Hostpot Eliminado!');
        toastr()->error('Historial Nfc eliminado');
        return redirect()->route('historialnfc.index');
    }
}
