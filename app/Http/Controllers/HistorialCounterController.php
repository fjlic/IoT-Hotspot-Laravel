<?php

namespace App\Http\Controllers;

use App\HistorialCounter;
use Illuminate\Http\Request;

class HistorialCounterController extends Controller
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
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\HistorialCounter  $historialCounter
     * @return \Illuminate\Http\Response
     */
    public function show(HistorialCounter $historialCounter)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\HistorialCounter  $historialCounter
     * @return \Illuminate\Http\Response
     */
    public function edit(HistorialCounter $historialCounter)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\HistorialCounter  $historialCounter
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, HistorialCounter $historialCounter)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\HistorialCounter  $historialCounter
     * @return \Illuminate\Http\Response
     */
    public function destroy(HistorialCounter $historialCounter)
    {
        //
    }
}
