<?php

namespace App\Http\Controllers;

use App\Models\StatisticalSensor;
use Phpml\Math\Statistic\StandardDeviation;
use Phpml\Math\Statistic\Mean;
use Phpml\Math\Statistic\Correlation;
use Phpml\Regression\LeastSquares;
use Illuminate\Http\Request;

class StatisticalSensorController extends Controller
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
        $statisticalsensors = StatisticalSensor::all();
        foreach ($statisticalsensors as $key1 => $statisticalsensor) {
            $x = [];
            $y = []; 
           foreach (json_decode($statisticalsensor->sample) as $key2 => $json) {
            $x[$key2] = $key2;
            $y[$key2] = intval($json->aver_temper);
           }
           $statisticalsensor->pearsoncorrelation = Correlation::pearson($x, $y);
           $statisticalsensor->meanarithmetic = Mean::arithmetic([reset($y), end($y)]);
           $statisticalsensor->meanmedian = Mean::median($y);
           $statisticalsensor->meanmode = Mean::mode($y);
           sort($y);
           $statisticalsensor->standartdesviation = StandardDeviation::population($y);
        }
        return view('modules.statisticalsensor.index',compact('statisticalsensors'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('modules.statisticalsensor.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // 'sensor_id', 'elements', 'aver_temper_glob', 'difer_const', 'sample', 'stat', 'start_time', 'pass_time', 'finish_time', 
        $request->validate([
            'elements'=>'required|string|max:100',
            'aver_temper_glob'=>'required|string|max:100',
            'difer_const'=>'required|string|max:100',
            'start_time'=>'required|string|max:100',
            'pass_time'=>'required|string|max:100',
            'finish_time'=>'required|string|max:100',
            'sample'=>'required|string',
        ]);
        $statisticalsensor = new StatisticalRequest([
            'elements' => $request->get('elements'),
            'aver_temper_glob' => $request->get('aver_temper_glob'),
            'difer_const' => $request->get('difer_const'),
            'start_time' => $request->get('start_time'),
            'pass_time' => $request->get('start_time'),
            'finish_time' => $request->get('finish_time'),
            'sample' => $request->get('sample')
            ]);
        $statisticalsensor->save();
        //return redirect(/statisticalsensor)->with('success','Prueba probabilistica creada');
        toastr()->success('Muestra probabilistica creada');
        return redirect()->route('statisticalsensor.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\StatisticalSensor  $statisticalsensor
     * @return \Illuminate\Http\Response
     */
    public function show(StatisticalSensor $statisticalsensor)
    {
        //
        return view('modules.statisticalsensor.show', compact('statisticalsensor'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\StatisticalSensor  $statisticalsensor
     * @return \Illuminate\Http\Response
     */
    public function edit(StatisticalSensor $statisticalsensor)
    {
        //
        return view('modules.statisticalsensor.edit',compact('statisticalsensor'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\StatisticalSensor  $statisticalsensor
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, StatisticalSensor $statisticalsensor)
    {
        //
        $request->validate([
            'elements'=>'required|string|max:100',
            'aver_temper_glob'=>'required|string|max:100',
            'difer_const'=>'required|string|max:100',
            'start_time'=>'required|string|max:100',
            'pass_time'=>'required|string|max:100',
            'finish_time'=>'required|string|max:100',
            'sample'=>'required|string',
        ]);
        $statisticalsensor_request = $request->all();
        $statisticalsensor->update($statisticalsensor_request);
        toastr()->warning('Prueba actualizada');
        return redirect()->route('statisticalsensor.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\StatisticalSensor  $statisticalsensor
     * @return \Illuminate\Http\Response
     */
    public function destroy(StatisticalSensor $statisticalsensor)
    {
        //
        $statisticalsensor->delete();
        //return reditec('/statisticalsensor'->with('success','Estadistico eliminado'));
        toastr()->error('Estadistico eliminado');
        return redirect()->route('statisticalsensor.index');
    }
}
