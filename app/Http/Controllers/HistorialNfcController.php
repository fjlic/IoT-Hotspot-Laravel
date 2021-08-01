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
        $historialnfcs = HistorialNfc::latest()->take(1000)->get();
        $nfcs = Nfc::all();
        return view('module.historialnfc.index',compact('historialnfcs','nfcs'));
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
            'cont_qr'=>'required|string|max:100',
            'cont_mon'=>'required|string|max:100',
            'cont_mon_2'=>'required|string|max:100',
            'cont_corte'=>'required|string|max:100',
            'cont_prem'=>'required|string|max:100',
            'cost_mon'=>'required|string|max:100',
            'ssid'=>'required|string|max:100',
            'passwd'=>'required|string|max:100',
            'ip_server'=>'required|string|max:100',
            'port'=>'required|string|max:100',
            'txt'=>'required|string|max:100',
        ]);
        $historialnfc = new HistorialNfc([
            'nfc_id' => $request->get('nfc_id'),
            'num_serie' => $request->get('num_serie'),
            'cont_qr' =>  $request->get('cont_qr'),
            'cont_mon' =>  $request->get('cont_mon'),
            'cont_mon_2' =>  $request->get('cont_mon_2'),
            'cont_corte' =>  $request->get('cont_corte'),
            'cont_prem' =>  $request->get('cont_prem'),
            'cost_mon' =>  $request->get('cost_mon'),
            'ssid' =>  $request->get('ssid'),
            'passwd' =>  $request->get('passwd'),
            'ip_server' =>  $request->get('ip_server'),
            'port' =>  $request->get('port'),
            'txt' =>  $request->get('txt')

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
            'cont_qr'=>'required|string|max:100',
            'cont_mon'=>'required|string|max:100',
            'cont_mon_2'=>'required|string|max:100',
            'cont_corte'=>'required|string|max:100',
            'cont_prem'=>'required|string|max:100',
            'cost_mon'=>'required|string|max:100',
            'ssid'=>'required|string|max:100',
            'passwd'=>'required|string|max:100',
            'ip_server'=>'required|string|max:100',
            'port'=>'required|string|max:100',
            'txt'=>'required|string|max:100',
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
