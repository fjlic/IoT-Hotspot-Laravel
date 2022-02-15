<?php

namespace App\Http\Controllers;

use App\Models\Qr;
use App\Models\HistorialQr;
use Illuminate\Http\Request;

class HistorialQrController extends Controller
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
        $historialqrs = HistorialQr::latest()->take(432)->get(); // before 3 days
        return view('module.historialqr.index',compact('historialqrs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $qrs = Qr::all();
        return view('module.historialqr.create',compact('qrs'));
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
            'qr_id'=>'required|string|max:100',
            'qr_serie'=>'required|string|max:100',
            'coins'=>'required|string|max:100',
            'uploaded'=>'required|string|max:100',
        ]);
        $historialqr = new HistorialQr([
            'qr_id' => $request->get('qr_id'),
            'qr_serie' => $request->get('qr_serie'),
            'coins' => $request->get('coins'),
            'uploaded' => $request->get('uploaded')
            ]);
        $historialqr->save();
        toastr()->success('Historial Qr Creado');
        return redirect()->route('historialqr.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\HistorialQr  $historialQr
     * @return \Illuminate\Http\Response
     */
    public function show(HistorialQr $historialqr)
    {
        //
        return view('module.historialqr.show',compact('historialqr'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\HistorialQr  $historialQr
     * @return \Illuminate\Http\Response
     */
    public function edit(HistorialQr $historialqr)
    {
        //
        $qrs = Qr::all();
        return view('module.historialqr.edit', compact('qrs','historialqr'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\HistorialQr  $historialQr
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, HistorialQr $historialqr) 
    {
        //
        $request->validate([
            'qr_id'=>'required|string|max:100',
            'qr_serie'=>'required|string|max:1000',
            'coins'=>'required|string|max:100',
            'uploaded'=>'required|string|max:100'
        ]);
        $historialqr_request = $request->all();
        $historialqr->update($historialqr_request);
        toastr()->warning('Historial Qr actuaizado');
        return redirect()->route('historialqr.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\HistorialQr  $historialQr
     * @return \Illuminate\Http\Response
     */
    public function destroy(HistorialQr $historialqr)
    {
        //
        $historialqr->delete();
        //return redirect('/historialqr')->with('success', 'Qr Eliminado!');
        toastr()->error('Qr Historial eliminado');
        return redirect()->route('historialqr.index');
    }
}
