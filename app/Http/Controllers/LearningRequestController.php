<?php

namespace App\Http\Controllers;

use App\Models\LearningRequest;
use App\Models\StatisticalRequest;
use Illuminate\Http\Request;

class LearningRequestController extends Controller
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
        $learningrequests = LearningRequest::all();
        return view('modules.learningrequest.index',compact('learningrequests'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('modules.learningrequest.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // 'id', 'statistical_id', 'elements', 'start_time',
        //'finish_time', 'total_time', 'difer_time', 'sample',
        $request->validate([
            'statistical_request_id'=>'required|string|max:100',
            'elements'=>'required|string|max:100',
            'start_time'=>'required|string|max:100',
            'finish_time'=>'required|string|max:100',
            'total_time'=>'required|string|max:100',
            'difer_time'=>'required|string|max:100',
            'sample'=>'required|string',
            
        ]);
        $learningrequest = new LearningResquest([
            'statistical_request_id' => $request->get('statistical_request_id'),
            'elements' => $request->get('elements'),
            'start_time' => $request->get('start_time'),
            'finish_time' => $request->get('finish_time'),
            'total_time' => $request->get('total_time'),
            'difer_time' => $request->get('difer_time'),
            'sample' => $request->get('sample')
            ]);
        $learningrequest->save();
        //return redirect(/learningrequest)->with('success','Muestra prediccion creada');
        toastr()->success('Muestra prediccion creada');
        return redirect()->route('learningrequest.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Learning  $learningrequest
     * @return \Illuminate\Http\Response
     */
    public function show(LearningRequest $learningrequest)
    {
        //
        return view('modules.learningrequest.show', compact('learningrequest'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Learning  $learningrequest
     * @return \Illuminate\Http\Response
     */
    public function edit(LearningRequest $learningrequest)
    {
        //
        return view('modules.learningrequest.edit',compact('learningrequest'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Learning  $learningrequest
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, LearningRequest $learningrequest)
    {
        //
        $request->validate([
            'statistical_request_id'=>'required|string|max:100',
            'elements'=>'required|string|max:100',
            'start_time'=>'required|string|max:100',
            'finish_time'=>'required|string|max:100',
            'total_time'=>'required|string|max:100',
            'difer_time'=>'required|string|max:100',
            'sample'=>'required|string',
        ]);
        $learningrequest_request = $request->all();
        $learningrequest->update($learningrequest_request);
        toastr()->warning('Muestra actualizada');
        return redirect()->route('learningrequest.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\LearningRequest  $learningrequest
     * @return \Illuminate\Http\Response
     */
    public function destroy(LearningRequest $learningrequest)
    {
        //
        $learningrequest->delete();
        //return reditec('/learningrequest'->with('success','Muestra eliminada'));
        toastr()->error('Muestra eliminada');
        return redirect()->route('learningrequest.index');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function chart($id)
    {
        //
        $learningrequest = LearningRequest::find($id);
        $statisticalrequest = StatisticalRequest::find($learningrequest->statistical_request_id);
        $sample_1 = \Chart::title(['text' => 'Muestra '.$learningrequest->id,])
                          ->credits(['enabled' => false])
                          ->yaxis(['min' => 0])
                          ->xaxis(['min' => -0.5,'max' => 5.5])
                          ->series([['type'  => 'line',
                                     'name'  => 'Regression Line',
                                     'data'  => [[0, 1.11],[5, 4.51]],
                                     'marker' => ['enabled' => 'false'],
                                     'states' => ['hover' => ['lineWith' => 0]],
                                     'enableMouseTracking' => 'false'],
                                     ['type' => 'scatter',
                                      'name' => 'Observations',
                                      'data' => [1, 1.5, 2.8, 3.5, 3.9, 4.2],
                                      'marker' => ['radius' => 4]
                                     ]])->display();
        //dd($sample1);
        $sample_2 = \Chart::title(['text' => 'Muestra '.$statisticalrequest->id,])
                          ->credits(['enabled' => false])
                          ->yaxis(['min' => 0])
                          ->xaxis(['min' => -0.5,'max' => 5.5])
                          ->series([['type'  => 'line',
                                     'name'  => 'Regression Line',
                                     'data'  => [[0, 1.11],[1, 4.51]],
                                     'marker' => ['enabled' => 'false'],
                                     'states' => ['hover' => ['lineWith' => 0]],
                                     'enableMouseTracking' => 'false'],
                                     ['type' => 'scatter',
                                      'name' => 'Observations',
                                      'data' => [1, 1.5, 2.8, 3.5, 3.9, 4.2],
                                      'marker' => ['radius' => 4]
                                     ]])->display();
    //return view('modules.learningrequest.chart', ['vol1' => $vol1,]);
    return view('modules.learningrequest.chart')->with('sample_1',$sample_1)
                                        ->with('sample_2',$sample_2)
                                        ->with('learning',$learningrequest);
    }
}
