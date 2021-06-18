<?php

namespace App\Http\Controllers;

use App\HistorialSensor;
use App\Sensor;
use Illuminate\Http\Request;

class HistorialSensorController extends Controller
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
    public function chart($id)
    {
        //
        $historialsensor = HistorialSensor::find($id);
        //dd($historialsensors);
        //dd($historialsensors->vol_1*1);
        $back1[0][0]= "0";
        $back1[0][1]= "#FFF"; 
        $back1[1][0]= "1";
        $back1[1][1]= "#333"; 
        $back2[0][0]= "0";
        $back2[0][1]= "#333";
        $back2[1][0]= "1";
        $back2[1][1]= "#FFF"; 
        $temp1 = \Chart::title(['text' => 'Temperatura 1',])
                        ->chart(['type'     => 'gauge','renderTo' => 'temp1',
                                 'plotBackgroundColor' => null,
                                 'plotBackgroundImage' => null,
                                 'plotBorderWidth' => 0,
                                 'plotShadow' => false,])
                        ->credits(['enabled' => false])
                        ->pane(['startAngle' => -150,
                                'endAngle' => 150,
                                'background' => [['backgroundColor'=> ['linearGradient' => ['x1' => 0,
                                                                                            'y1' => 0,
                                                                                            'x2' => 0,
                                                                                            'y2' => 1,],
                                                                       'stops'         => $back1
                                                                      ],
                                                  'borderWidth' => 0,
                                                  'outerRadius' => '109%',],
                                                 ['backgroundColor'=> ['linearGradient' => ['x1' => 0,
                                                                                            'y1' => 0,
                                                                                            'x2' => 0,
                                                                                            'y2' => 1,],
                                                                       'stops'         => $back2,
                                                                      ],
                                                  'borderWidth' => 1,
                                                  'outerRadius' => '107%',],
                                                  ['' => ''],
                                                  ['backgroundColor'=> '#DDD',
                                                  'borderWidth' => 0,
                                                  'outerRadius' => '105%',
                                                  'innerRadius' => '103%',]], 

                        ])
                        ->yaxis(['min' => 0,
                                 'max' => 100,
                                 'minorTickInterval' => 'auto' ,
                                 'minorTickWidth' => 1,
                                 'minorTickLength' => 5,
                                 'minorTickPosition' => 'inside',
                                 'minorTickColor' => '#666',
                                 'tickPixelInterval' => 30,
                                 'tickWidth' => 2,
                                 'tickPosition' => 'inside',
                                 'tickLength' => 5,
                                 'tickColor' => '#666',
                                 'labels' => ['step' => 2,
                                              'rotation' => 'auto',],
                                 'title' => ['text' => 'Grados/Centigrados',],
                                 'plotBands' => [['from' => 0,
                                                 'to' => 35,
                                                 'color' => '#55BF3B',],
                                                 ['from' => 35,
                                                 'to' => 65,
                                                 'color' => '#DDDF0D',],
                                                 ['from' => 65,
                                                 'to' => 100,
                                                 'color' => '#DF5353',]],
                                    ])
                         ->series([['name'  => 'Valor',
                                   'data'  => [$historialsensor->temp_1*1],
                                   'tooltip' => ['valueSuffix' => '-Volt/DC'],]])
                        ->display();

        $temp2 = \Chart::title(['text' => 'Temperatura 2',])
                        ->chart(['type'     => 'gauge','renderTo' => 'temp2',
                                 'plotBackgroundColor' => null,
                                 'plotBackgroundImage' => null,
                                 'plotBorderWidth' => 0,
                                 'plotShadow' => false,])
                        ->credits(['enabled' => false])
                        ->pane(['startAngle' => -150,
                                'endAngle' => 150,
                                'background' => [['backgroundColor'=> ['linearGradient' => ['x1' => 0,
                                                                                            'y1' => 0,
                                                                                            'x2' => 0,
                                                                                            'y2' => 1,],
                                                                       'stops'         => $back1
                                                                      ],
                                                  'borderWidth' => 0,
                                                  'outerRadius' => '109%',],
                                                 ['backgroundColor'=> ['linearGradient' => ['x1' => 0,
                                                                                            'y1' => 0,
                                                                                            'x2' => 0,
                                                                                            'y2' => 1,],
                                                                       'stops'         => $back2,
                                                                      ],
                                                  'borderWidth' => 1,
                                                  'outerRadius' => '107%',],
                                                  ['' => ''],
                                                  ['backgroundColor'=> '#DDD',
                                                  'borderWidth' => 0,
                                                  'outerRadius' => '105%',
                                                  'innerRadius' => '103%',]], 

                        ])
                        ->yaxis(['min' => 0,
                                 'max' => 100,
                                 'minorTickInterval' => 'auto' ,
                                 'minorTickWidth' => 1,
                                 'minorTickLength' => 5,
                                 'minorTickPosition' => 'inside',
                                 'minorTickColor' => '#666',
                                 'tickPixelInterval' => 30,
                                 'tickWidth' => 2,
                                 'tickPosition' => 'inside',
                                 'tickLength' => 5,
                                 'tickColor' => '#666',
                                 'labels' => ['step' => 2,
                                              'rotation' => 'auto',],
                                 'title' => ['text' => 'Grados/Centigrados',],
                                 'plotBands' => [['from' => 0,
                                                 'to' => 35,
                                                 'color' => '#55BF3B',],
                                                 ['from' => 35,
                                                 'to' => 65,
                                                 'color' => '#DDDF0D',],
                                                 ['from' => 65,
                                                 'to' => 100,
                                                 'color' => '#DF5353',]],
                                    ])
                         ->series([['name'  => 'Valor',
                                   'data'  => [$historialsensor->temp_2*1],
                                   'tooltip' => ['valueSuffix' => '-Volt/DC'],]])
                        ->display();
    
        $temp3 = \Chart::title(['text' => 'Temperatura 3',])
                        ->chart(['type'     => 'gauge','renderTo' => 'temp3',
                                 'plotBackgroundColor' => null,
                                 'plotBackgroundImage' => null,
                                 'plotBorderWidth' => 0,
                                 'plotShadow' => false,])
                        ->credits(['enabled' => false])
                        ->pane(['startAngle' => -150,
                                'endAngle' => 150,
                                'background' => [['backgroundColor'=> ['linearGradient' => ['x1' => 0,
                                                                                            'y1' => 0,
                                                                                            'x2' => 0,
                                                                                            'y2' => 1,],
                                                                       'stops'         => $back1
                                                                      ],
                                                  'borderWidth' => 0,
                                                  'outerRadius' => '109%',],
                                                 ['backgroundColor'=> ['linearGradient' => ['x1' => 0,
                                                                                            'y1' => 0,
                                                                                            'x2' => 0,
                                                                                            'y2' => 1,],
                                                                       'stops'         => $back2,
                                                                      ],
                                                  'borderWidth' => 1,
                                                  'outerRadius' => '107%',],
                                                  ['' => ''],
                                                  ['backgroundColor'=> '#DDD',
                                                  'borderWidth' => 0,
                                                  'outerRadius' => '105%',
                                                  'innerRadius' => '103%',]], 

                        ])
                        ->yaxis(['min' => 0,
                                 'max' => 100,
                                 'minorTickInterval' => 'auto' ,
                                 'minorTickWidth' => 1,
                                 'minorTickLength' => 5,
                                 'minorTickPosition' => 'inside',
                                 'minorTickColor' => '#666',
                                 'tickPixelInterval' => 30,
                                 'tickWidth' => 2,
                                 'tickPosition' => 'inside',
                                 'tickLength' => 5,
                                 'tickColor' => '#666',
                                 'labels' => ['step' => 2,
                                              'rotation' => 'auto',],
                                 'title' => ['text' => 'Grados/Centigrados',],
                                 'plotBands' => [['from' => 0,
                                                 'to' => 35,
                                                 'color' => '#55BF3B',],
                                                 ['from' => 35,
                                                 'to' => 65,
                                                 'color' => '#DDDF0D',],
                                                 ['from' => 65,
                                                 'to' => 100,
                                                 'color' => '#DF5353',]],
                                    ])
                         ->series([['name'  => 'Valor',
                                   'data'  => [$historialsensor->temp_3*1],
                                   'tooltip' => ['valueSuffix' => '-Volt/DC'],]])
                        ->display();
                        
        $temp4 = \Chart::title(['text' => 'Temperatura 4',])
                        ->chart(['type'     => 'gauge','renderTo' => 'temp4',
                                 'plotBackgroundColor' => null,
                                 'plotBackgroundImage' => null,
                                 'plotBorderWidth' => 0,
                                 'plotShadow' => false,])
                        ->credits(['enabled' => false])
                        ->pane(['startAngle' => -150,
                                'endAngle' => 150,
                                'background' => [['backgroundColor'=> ['linearGradient' => ['x1' => 0,
                                                                                            'y1' => 0,
                                                                                            'x2' => 0,
                                                                                            'y2' => 1,],
                                                                       'stops'         => $back1
                                                                      ],
                                                  'borderWidth' => 0,
                                                  'outerRadius' => '109%',],
                                                 ['backgroundColor'=> ['linearGradient' => ['x1' => 0,
                                                                                            'y1' => 0,
                                                                                            'x2' => 0,
                                                                                            'y2' => 1,],
                                                                       'stops'         => $back2,
                                                                      ],
                                                  'borderWidth' => 1,
                                                  'outerRadius' => '107%',],
                                                  ['' => ''],
                                                  ['backgroundColor'=> '#DDD',
                                                  'borderWidth' => 0,
                                                  'outerRadius' => '105%',
                                                  'innerRadius' => '103%',]], 

                        ])
                        ->yaxis(['min' => 0,
                                 'max' => 100,
                                 'minorTickInterval' => 'auto' ,
                                 'minorTickWidth' => 1,
                                 'minorTickLength' => 5,
                                 'minorTickPosition' => 'inside',
                                 'minorTickColor' => '#666',
                                 'tickPixelInterval' => 30,
                                 'tickWidth' => 2,
                                 'tickPosition' => 'inside',
                                 'tickLength' => 5,
                                 'tickColor' => '#666',
                                 'labels' => ['step' => 2,
                                              'rotation' => 'auto',],
                                 'title' => ['text' => 'Grados/Centigrados',],
                                 'plotBands' => [['from' => 0,
                                                 'to' => 35,
                                                 'color' => '#55BF3B',],
                                                 ['from' => 35,
                                                 'to' => 65,
                                                 'color' => '#DDDF0D',],
                                                 ['from' => 65,
                                                 'to' => 100,
                                                 'color' => '#DF5353',]],
                                    ])
                         ->series([['name'  => 'Valor',
                                   'data'  => [$historialsensor->temp_4*1],
                                   'tooltip' => ['valueSuffix' => '-Volt/DC'],]])
                        ->display();
                       
    //return view('module.historialsensor.chart', ['vol1' => $vol1,]);
    return view('module.historialsensor.chart')->with('temp1',$temp1)
                                          ->with('temp2',$temp2)
                                          ->with('temp3',$temp3)
                                          ->with('temp4',$temp4)
                                          ->with('historialsensor',$historialsensor);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $historialsensors = HistorialSensor::all();
        //return view('module.historialsensor.index')->with('historialsensors',$historialsensors);
        return view('module.historialsensor.index',compact('historialsensors'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $sensors = Sensor::all();
        return view('module.historialsensor.create',compact('sensors'));
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
            'sensor_id'=>'required|string|max:100',
            'num_serie'=>'required|string|max:100',
            'passw'=>'required|string|max:100',
            'vol_1'=>'required|string|max:100',
            'vol_2'=>'required|string|max:100',
            'vol_3'=>'required|string|max:100',
            'temp_1'=>'required|string|max:100',
            'temp_2'=>'required|string|max:100',
            'temp_3'=>'required|string|max:100',
            'temp_4'=>'required|string|max:100',
            'door_1'=>'required|string|max:100',
            'door_2'=>'required|string|max:100',
            'door_3'=>'required|string|max:100',
            'door_4'=>'required|string|max:100',
            'rlay_1'=>'required|string|max:100',
            'rlay_2'=>'required|string|max:100',
            'rlay_3'=>'required|string|max:100',
            'rlay_4'=>'required|string|max:100',
            'text'=>'required|string|max:100',
        ]);
        $historialsensor = new HistorialSensor([
            'sensor_id' => $request->get('sensor_id'),
            'num_serie' => $request->get('num_serie'),
            'passw' => $request->get('passw'),
            'vol_1' => $request->get('vol_1'),
            'vol_2' => $request->get('vol_2'),
            'vol_3' => $request->get('vol_3'),
            'temp_1' => $request->get('temp_1'),
            'temp_2' => $request->get('temp_2'),
            'temp_3' => $request->get('temp_3'),
            'temp_4' => $request->get('temp_4'),
            'door_1' => $request->get('door_1'),
            'door_2' => $request->get('door_2'),
            'door_3' => $request->get('door_3'),
            'door_4' => $request->get('door_4'),
            'rlay_1' => $request->get('rlay_1'),
            'rlay_2' => $request->get('rlay_2'),
            'rlay_3' => $request->get('rlay_3'),
            'rlay_4' => $request->get('rlay_4'),
            'text' => $request->get('text')
            ]);
        $historialsensor->save();
        //return redirect(/sensor)->with('success','Historial sensor generado Satisfactoriamente');
        toastr()->success('Historial sensor creado');
        return redirect()->route('historialsensor.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\HistorialSensor  $historialSensor
     * @return \Illuminate\Http\Response
     */
    public function show(HistorialSensor $historialsensor)
    {
        //
        return view('module.historialsensor.show', compact('historialsensor'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\HistorialSensor  $historialSensor
     * @return \Illuminate\Http\Response
     */
    public function edit(HistorialSensor $historialsensor)
    {
        //
        $sensors = Sensor::all();
        return view('module.historialsensor.edit',compact('historialsensor','sensors'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\HistorialSensor  $historialSensor
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, HistorialSensor $historialsensor)
    {
        //
        $request->validate([
            'sensor_id'=>'required|string|max:100',
            'num_serie'=>'required|string|max:100',
            'passw'=>'required|string|max:100',
            'vol_1'=>'required|string|max:100',
            'vol_2'=>'required|string|max:100',
            'vol_3'=>'required|string|max:100',
            'temp_1'=>'required|string|max:100',
            'temp_2'=>'required|string|max:100',
            'temp_3'=>'required|string|max:100',
            'temp_4'=>'required|string|max:100',
            'door_1'=>'required|string|max:100',
            'door_2'=>'required|string|max:100',
            'door_3'=>'required|string|max:100',
            'door_4'=>'required|string|max:100',
            'rlay_1'=>'required|string|max:100',
            'rlay_2'=>'required|string|max:100',
            'rlay_3'=>'required|string|max:100',
            'rlay_4'=>'required|string|max:100',
            'text'=>'required|string|max:100',
        ]);
        $historialsensor_request = $request->all();
        $historialsensor->update($historialsensor_request);
        toastr()->warning('Historial sensor actualizado');
        return redirect()->route('historialsensor.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\HistorialSensor  $historialSensor
     * @return \Illuminate\Http\Response
     */
    public function destroy(HistorialSensor $historialsensor)
    {
        //
        $historialsensor->delete();
        //return reditec('/historialsensor'->with('success','Historial sensor Eliminado Satisfactoriamente'));
        toastr()->error('Historial sensor eliminado');
        return redirect()->route('historialsensor.index');
    }
}
