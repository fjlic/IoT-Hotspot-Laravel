<?php

namespace App\Http\Controllers;

use App\Statistical;
use Phpml\Math\Statistic\StandardDeviation;
use Phpml\Math\Statistic\Mean;
use Phpml\Math\Statistic\Correlation;
use Phpml\Regression\LeastSquares;

use Illuminate\Http\Request;

class StatisticalController extends Controller
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
        $statisticals = Statistical::all();
        foreach ($statisticals as $key1 => $statistical) {
            $x = [];
            $y = []; 
           foreach (json_decode($statistical->sample) as $key2 => $json) {
            $x[$key2] = $key2;
            $y[$key2] = $json->pass_time;
           }
           $statistical->pearsoncorrelation = Correlation::pearson($x, $y);
           $statistical->meanarithmetic = Mean::arithmetic([reset($y), end($y)]);
           $statistical->meanmedian = Mean::median($y);
           $statistical->meanmode = Mean::mode($y);
           sort($y);
           $statistical->standartdesviation = StandardDeviation::population($y);
        }
        //return view('module.statistical.index')->with('statisticals',$statisticals);
        /*$med1 = 0;
        $med2 = 0;
        $dev1 = 0;
        $dev2 = 0;
        $tam = 0;
        foreach ($statisticals as $key => $statistical) {
            $med1 += $statistical->estimate_proxy_size;
            $med2 += $statistical->development_hours;
            $tam++;
        }
        $med1 = ($med1 / $tam);
        $med2 = ($med2 / $tam);
        
        foreach ($statisticals as $key => $statistical) {
            $dev1 += ($statistical->estimate_proxy_size - $med1) * ($statistical->estimate_proxy_size - $med1);
            $dev2 += ($statistical->development_hours - $med2) * ($statistical->development_hours - $med2);
        }

        $vari1 = ($dev1/($tam -1));
        $dev1 = sqrt($vari1);

        $vari2 = ($dev2/($tam -1));
        $dev2 = sqrt($vari2);*/

        return view('module.statistical.index',compact('statisticals'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('module.statistical.create');
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
        $statistical = new Statistical([
            'elements' => $request->get('elements'),
            'start_time' => $request->get('start_time'),
            'finish_time' => $request->get('finish_time'),
            'total_time' => $request->get('total_time'),
            'difer_time' => $request->get('difer_time'),
            'sample' => $request->get('sample')
            ]);
        $statistical->save();
        //return redirect(/statistical)->with('success','Prueba probabilistica creada');
        toastr()->success('Muestra probabilistica creada');
        return redirect()->route('statistical.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Statistical  $statistical
     * @return \Illuminate\Http\Response
     */
    public function show(Statistical $statistical)
    {
        //
        return view('module.statistical.show', compact('statistical'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Statistical  $statistical
     * @return \Illuminate\Http\Response
     */
    public function edit(Statistical $statistical)
    {
        //
        return view('module.statistical.edit',compact('statistical'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Statistical  $statistical
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Statistical $statistical)
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
        $statistical->update($statistical_request);
        toastr()->warning('Prueba actualizada');
        return redirect()->route('statistical.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Statistical  $statistical
     * @return \Illuminate\Http\Response
     */
    public function destroy(Statistical $statistical)
    {
        //
        $statistical->delete();
        //return reditec('/statistical'->with('success','Estadistico eliminado'));
        toastr()->error('Estadistico eliminado');
        return redirect()->route('statistical.index');
    }
}
