<?php

namespace App\Http\Controllers;

use App\Nfc;
use App\Crd;
use App\Erb;
use Illuminate\Http\Request;

class NfcController extends Controller
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
        $nfcs = Nfc::all();
        //return view('module.nfc.index')->with('nfs',$nfcs);
        return view('module.nfc.index',compact('nfcs'));
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
        $erbs = Erb::all();
        return view('module.nfc.create',compact('crds','erbs'));
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
            'crd_id'=>'required|string|max:34',
            'erb_id'=>'required|string|max:34',
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
        $nfc = new Nfc([
            'crd_id' => $request->get('crd_id'),
            'erb_id' => $request->get('erb_id'),
            'num_serie' => $request->get('num_serie'),
            'cont_qr' => $request->get('cont_qr'),
            'cont_mon' => $request->get('cont_mon'),
            'cont_mon_2' => $request->get('cont_mon_2'),
            'cont_corte' => $request->get('cont_corte'),
            'cont_prem' => $request->get('cont_prem'),
            'cost_mon' => $request->get('cost_mon'),
            'ssid' => $request->get('ssid'),
            'passwd' => $request->get('passwd'),
            'ip_server' => $request->get('ip_server'),
            'port' => $request->get('port'),
            'txt' => $request->get('txt')
            ]);
        $nfc->save();
        //return redirect(/nfc)->with('success','Nfc Generado Satisfactoriamente');
        toastr()->success('Nfc creado');
        return redirect()->route('nfc.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Nfc  $nfc
     * @return \Illuminate\Http\Response
     */
    public function show(Nfc $nfc)
    {
        //
        return view('module.nfc.show', compact('nfc'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Nfc  $nfc
     * @return \Illuminate\Http\Response
     */
    public function edit(Nfc $nfc)
    {
        //
        $crds = Crd::all();
        $erbs = Erb::all();
        return view('module.nfc.edit',compact('nfc','crds','erbs'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Nfc  $nfc
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Nfc $nfc)
    {
        //
        $request->validate([
            'crd_id'=>'required|string|max:34',
            'erb_id'=>'required|string|max:34',
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
        $nfc_request = $request->all();
        $nfc->update($nfc_request);
        toastr()->warning('Nfc actualizado');
        return redirect()->route('nfc.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Nfc  $nfc
     * @return \Illuminate\Http\Response
     */
    public function destroy(Nfc $nfc)
    {
        //
        $nfc->delete();
        //return reditec('/nfc'->with('success','nfc Eliminado Satisfactoriamente'));
        toastr()->error('nfc eliminado');
        return redirect()->route('nfc.index');
    }
}
