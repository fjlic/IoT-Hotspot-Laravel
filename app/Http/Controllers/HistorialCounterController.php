<?php

namespace App\Http\Controllers;

use App\HistorialCounter;
use App\Counter;
use Illuminate\Http\Request;

class HistorialCounterController extends Controller
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
        $historialcounters = HistorialCounter::all();
        return view('module.historialcounter.index',compact('historialcounters'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $counters = Counter::all();
        return view('module.historialcounter.create',compact('counters'));
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
            'counter_id'=>'required|string|max:100',
            'nfc_id'=>'required|string|max:100',
            'num_serie'=>'required|string|max:100',
            'cont_qr'=>'required|string|max:100',
            'cont_mon'=>'required|string|max:100',
            'cont_mon_2'=>'required|string|max:100',
        ]);
        $historialcounter = new HistorialCounter([
            'counter_id' => $request->get('counter_id'),
            'nfc_id' => $request->get('nfc_id'),
            'num_serie' => $request->get('num_serie'),
            'cont_qr' => $request->get('cont_qr'),
            'cont_mon' => $request->get('cont_mon'),
            'cont_mon_2' => $request->get('cont_mon_2')
            ]);
        $historialcounter->save();
        //return redirect(/historialcounter)->with('success','Historial generado Satisfactoriamente');
        toastr()->success('Historial Contador creado');
        return redirect()->route('historialcounter.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\HistorialCounter  $historialCounter
     * @return \Illuminate\Http\Response
     */
    public function show(HistorialCounter $historialcounter)
    {
        //
        return view('module.historialcounter.show', compact('historialcounter'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\HistorialCounter  $historialCounter
     * @return \Illuminate\Http\Response
     */
    public function edit(HistorialCounter $historialcounter)
    {
        //
        $counters = Counter::all();
        return view('module.historialcounter.edit',compact('historialcounter','counters'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\HistorialCounter  $historialCounter
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, HistorialCounter $historialcounter)
    {
        //
        $request->validate([
            'counter_id'=>'required|string|max:100',
            'nfc_id'=>'required|string|max:100',
            'num_serie'=>'required|string|max:100',
            'cont_qr'=>'required|string|max:100',
            'cont_mon'=>'required|string|max:100',
            'cont_mon_2'=>'required|string|max:100',
        ]);
        $historialcounter_request = $request->all();
        $historialcounter->update($historialcounter_request);
        toastr()->warning('Historial contador actualizado');
        return redirect()->route('historialcounter.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\HistorialCounter  $historialCounter
     * @return \Illuminate\Http\Response
     */
    public function destroy(HistorialCounter $historialcounter)
    {
        //
        $historialcounter->delete();
        toastr()->error('Historial contador eliminado');
        return redirect()->route('historialcounter.index');
    }
}
