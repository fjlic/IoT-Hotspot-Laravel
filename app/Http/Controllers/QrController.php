<?php

namespace App\Http\Controllers;

use App\Qr;
use App\Erb;
use App\Crd;
use Illuminate\Http\Request;

class QrController extends Controller
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
        $qrs = Qr::all();
        //return view('module.qr.index')->with('qrcoins',$qrs);
        return view('module.qr.index',compact('qrs'));
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
        return view('module.qr.create',compact('crds','erbs'));
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
            'erb_id'=>'required|string|max:100',
            'qr_serie'=>'required|string|max:100',
            'coins'=>'required|string|max:100',
            'gone_down'=>'required|string|max:100',
        ]);
        $qr = new Qr([
            'crd_id' => $request->get('crd_id'),
            'erb_id' => $request->get('erb_id'),
            'qr_serie' => $request->get('qr_serie'),
            'coins' => $request->get('coins'),
            'gone_down' => $request->get('gone_down')
            ]);
        $qr->save();
        //return redirect(/coin)->with('success','Qr Generado Satisfactoriamente');
        toastr()->success('Qr creado');
        return redirect()->route('qr.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Qr  $qr
     * @return \Illuminate\Http\Response
     */
    public function show(Qr $qr)
    {
        //
        return view('module.qr.show', compact('qr'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Qr  $qr
     * @return \Illuminate\Http\Response
     */
    public function edit(Qr $qr)
    {
        //
        $crds = Crd::all();
        $erbs = Erb::all();
        return view('module.qr.edit',compact('qr','crds','erbs'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Qr  $qr
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Qr $qr)
    {
        //
        $request->validate([
            'crd_id'=>'required|string|max:100',
            'erb_id'=>'required|string|max:100',
            'qr_serie'=>'required|string|max:100',
            'coins'=>'required|string|max:100',
            'gone_down'=>'required|string|max:100',
        ]);
        $qr_request = $request->all();
        $qr->update($qr_request);
        toastr()->warning('Qr actualizado');
        return redirect()->route('qr.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Qr  $qr
     * @return \Illuminate\Http\Response
     */
    public function destroy(Qr $qr)
    {
        //
        $qr->delete();
        //return reditec('/qr'->with('success','Qr Eliminado Satisfactoriamente'));
        toastr()->error('Qr eliminado');
        return redirect()->route('qr.index');
    }
}
