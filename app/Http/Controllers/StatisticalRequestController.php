<?php

namespace App\Http\Controllers;

use App\Models\StatisticalRequest;
use Phpml\Math\Statistic\StandardDeviation;
use Phpml\Math\Statistic\Mean;
use Phpml\Math\Statistic\Correlation;
use Phpml\Regression\LeastSquares;
use Illuminate\Http\Request;

class StatisticalRequestController extends Controller
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
        $statisticalrequests = StatisticalRequest::all();
        foreach ($statisticalrequests as $key1 => $statisticalrequest) {
            $x = [];
            $y = []; 
           foreach (json_decode($statisticalrequest->sample) as $key2 => $json) {
            $x[$key2] = $key2;
            $y[$key2] = $json->pass_time;
           }
           $statisticalrequest->pearsoncorrelation = Correlation::pearson($x, $y);
           $statisticalrequest->meanarithmetic = Mean::arithmetic([reset($y), end($y)]);
           $statisticalrequest->meanmedian = Mean::median($y);
           $statisticalrequest->meanmode = Mean::mode($y);
           sort($y);
           $statisticalrequest->standartdesviation = StandardDeviation::population($y);
        }
        return view('modules.statisticalrequest.index',compact('statisticalrequests'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('modules.statisticalrequest.create');
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
        $statisticalrequest = new StatisticalRequest([
            'elements' => $request->get('elements'),
            'start_time' => $request->get('start_time'),
            'finish_time' => $request->get('finish_time'),
            'total_time' => $request->get('total_time'),
            'difer_time' => $request->get('difer_time'),
            'sample' => $request->get('sample')
            ]);
        $statisticalrequest->save();
        //return redirect(/statisticalrequest)->with('success','Prueba probabilistica creada');
        toastr()->success('Muestra probabilistica creada');
        return redirect()->route('statisticalrequest.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\StatisticalRequest  $statisticalrequest
     * @return \Illuminate\Http\Response
     */
    public function show(StatisticalRequest $statisticalrequest)
    {
        //
        return view('modules.statisticalrequest.show', compact('statisticalrequest'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\StatisticalRequest  $statisticalrequest
     * @return \Illuminate\Http\Response
     */
    public function edit(StatisticalRequest $statisticalrequest)
    {
        //
        return view('modules.statisticalrequest.edit',compact('statisticalrequest'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\StatisticalRequest  $statisticalrequest
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, StatisticalRequest $statisticalrequest)
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
        $statisticalrequest_request = $request->all();
        $statisticalrequest->update($statisticalrequest_request);
        toastr()->warning('Prueba actualizada');
        return redirect()->route('statisticalrequest.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\StatisticalRequest  $statisticalrequest
     * @return \Illuminate\Http\Response
     */
    public function destroy(StatisticalRequest $statisticalrequest)
    {
        //
        $statisticalrequest->delete();
        //return reditec('/statisticalrequest'->with('success','Estadistico eliminado'));
        toastr()->error('Estadistico eliminado');
        return redirect()->route('statisticalrequest.index');
    }
}
