<?php

namespace App\Http\Controllers;

use App\Learning;
use Illuminate\Http\Request;

class LearningController extends Controller
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
        $learnings = Learning::all();
        return view('module.learning.index',compact('learnings'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('module.learning.create');
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
            'statistical_id'=>'required|string|max:100',
            'elements'=>'required|string|max:100',
            'start_time'=>'required|string|max:100',
            'finish_time'=>'required|string|max:100',
            'total_time'=>'required|string|max:100',
            'difer_time'=>'required|string|max:100',
            'sample'=>'required|string',
            
        ]);
        $learning = new Learning([
            'statistical_id' => $request->get('statistical_id'),
            'elements' => $request->get('elements'),
            'start_time' => $request->get('start_time'),
            'finish_time' => $request->get('finish_time'),
            'total_time' => $request->get('total_time'),
            'difer_time' => $request->get('difer_time'),
            'sample' => $request->get('sample')
            ]);
        $learning->save();
        //return redirect(/learning)->with('success','Muestra prediccion creada');
        toastr()->success('Muestra prediccion creada');
        return redirect()->route('learning.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Learning  $learning
     * @return \Illuminate\Http\Response
     */
    public function show(Learning $learning)
    {
        //
        return view('module.learning.show', compact('learning'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Learning  $learning
     * @return \Illuminate\Http\Response
     */
    public function edit(Learning $learning)
    {
        //
        return view('module.learning.edit',compact('learning'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Learning  $learning
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Learning $learning)
    {
        //
        $request->validate([
            'statistical_id'=>'required|string|max:100',
            'elements'=>'required|string|max:100',
            'start_time'=>'required|string|max:100',
            'finish_time'=>'required|string|max:100',
            'total_time'=>'required|string|max:100',
            'difer_time'=>'required|string|max:100',
            'sample'=>'required|string',
        ]);
        $learning_request = $request->all();
        $learning->update($learning_request);
        toastr()->warning('Muestra actualizada');
        return redirect()->route('learning.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Learning  $learning
     * @return \Illuminate\Http\Response
     */
    public function destroy(Learning $learning)
    {
        //
        $learning->delete();
        //return reditec('/learning'->with('success','Muestra eliminada'));
        toastr()->error('Muestra eliminada');
        return redirect()->route('learning.index');
    }
}