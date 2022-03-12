<?php

namespace App\Http\Controllers;

use App\Models\StatisticalCounter;
use Illuminate\Http\Request;
use Phpml\Math\Statistic\StandardDeviation;
use Phpml\Math\Statistic\Mean;
use Phpml\Math\Statistic\Correlation;
use Phpml\Regression\LeastSquares;

class StatisticalCounterController extends Controller
{
    /**
     * Create a new controller instance.
     * Part Name : CNT
     * * Part Size : 15.1
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
        $statisticalcounters = StatisticalCounter::all();
        foreach ($statisticalcounters as $key1 => $statisticalcounter) {
            $x = [];
            $y = []; 
           foreach (json_decode($statisticalcounter->sample) as $key2 => $json) {
            $x[$key2] = $key2;
            $y[$key2] = $json->pass_time;
           }
           $statisticalcounter->pearsoncorrelation = Correlation::pearson($x, $y);
           $statisticalcounter->meanarithmetic = Mean::arithmetic([reset($y), end($y)]);
           $statisticalcounter->meanmedian = Mean::median($y);
           $statisticalcounter->meanmode = Mean::mode($y);
           sort($y);
           $statisticalcounter->standartdesviation = StandardDeviation::population($y);
        }
        return view('modules.statisticalcounter.index',compact('statisticalcounters'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('modules.statisticalcounter.create');
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
            'elements'=>'required|string|max:100',
            'start_time'=>'required|string|max:100',
            'finish_time'=>'required|string|max:100',
            'total_time'=>'required|string|max:100',
            'difer_time'=>'required|string|max:100',
            'sample'=>'required|string',
        ]);
        $statisticalcounter = new Statistical([
            'elements' => $request->get('elements'),
            'start_time' => $request->get('start_time'),
            'finish_time' => $request->get('finish_time'),
            'total_time' => $request->get('total_time'),
            'difer_time' => $request->get('difer_time'),
            'sample' => $request->get('sample')
            ]);
        $statisticalcounter->save();
        //return redirect(/statistical)->with('success','Prueba probabilistica creada');
        toastr()->success('Muestra probabilistica creada');
        return redirect()->route('statisticalcounter.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\StatisticalCounter  $statisticalcounter
     * @return \Illuminate\Http\Response
     */
    public function show(StatisticalCounter $statisticalcounter)
    {
        //
        return view('modules.statisticalcounter.show', compact('statisticalcounter'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\StatisticalCounter  $statisticalcounter
     * @return \Illuminate\Http\Response
     */
    public function edit(StatisticalCounter $statisticalcounter)
    {
        //
        return view('modules.statisticalcounter.edit',compact('statisticalcounter'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\StatisticalCounter  $statisticalcounter
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, StatisticalCounter $statisticalcounter)
    {
        //
        $request->validate([
            'elements'=>'required|string|max:100',
            'start_time'=>'required|string|max:100',
            'finish_time'=>'required|string|max:100',
            'total_time'=>'required|string|max:100',
            'difer_time'=>'required|string|max:100',
            'sample'=>'required|string',
        ]);
        $statistical_request = $request->all();
        $statisticalcounter->update($statistical_request);
        toastr()->warning('Prueba actualizada');
        return redirect()->route('statisticalcounter.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\StatisticalCounter  $statisticalcounter
     * @return \Illuminate\Http\Response
     */
    public function destroy(StatisticalCounter $statisticalcounter)
    {
        //
        $statisticalcounter->delete();
        //return reditec('/statisticalounter'->with('success','Estadistico eliminado'));
        toastr()->error('Estadistico eliminado');
        return redirect()->route('statisticalcounter.index');
    }
}
