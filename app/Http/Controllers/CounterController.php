<?php

namespace App\Http\Controllers;

use App\Counter;
use App\Erb;
use App\Crd;
use App\Nfc;
use Illuminate\Http\Request;

class CounterController extends Controller
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
        $counters = Counter::all();
        return view('module.counter.index',compact('counters'));
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
        $crds = Crd::all();
        $nfcs = Nfc::all();
        return view('module.counter.create',compact('erbs', 'crds', 'nfcs'));
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
            'nfc_id'=>'required|string|max:100',
            'num_serie'=>'required|string|max:100',
            'cont_qr'=>'required|string|max:100',
            'cont_mon'=>'required|string|max:100',
        ]);
        $counter = new Counter([
            'crd_id' => $request->get('crd_id'),
            'erb_id' => $request->get('erb_id'),
            'nfc_id' => $request->get('erb_id'),
            'num_serie' => $request->get('num_serie'),
            'cont_qr' => $request->get('cont_qr'),
            'cont_mon' => $request->get('cont_mon')
            ]);
        $counter->save();
        //return redirect(/counter)->with('success','Contador generado satisfactoriamente');
        toastr()->success('Contador creado');
        return redirect()->route('counter.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Counter  $counter
     * @return \Illuminate\Http\Response
     */
    public function show(Counter $counter)
    {
        //
        return view('module.counter.show', compact('counter'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Counter  $counter
     * @return \Illuminate\Http\Response
     */
    public function edit(Counter $counter)
    {
        //
        $crds = Crd::all();
        $erbs = Erb::all();
        $nfcs = Nfc::all();
        return view('module.counter.edit',compact('counter','crds','erbs','nfcs'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Counter  $counter
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Counter $counter)
    {
        //
        $request->validate([
            'crd_id'=>'required|string|max:100',
            'erb_id'=>'required|string|max:100',
            'nfc_id'=>'required|string|max:100',
            'num_serie'=>'required|string|max:100',
            'cont_qr'=>'required|string|max:100',
            'cont_mon'=>'required|string|max:100',
        ]);
        $counter_request = $request->all();
        $counter->update($counter_request);
        toastr()->warning('Contador actualizado');
        return redirect()->route('counter.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Counter  $counter
     * @return \Illuminate\Http\Response
     */
    public function destroy(Counter $counter)
    {
        //
        $counter->delete();
        toastr()->error('Contador eliminado');
        return redirect()->route('counter.index');
    }
}
