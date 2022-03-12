<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Phpml\CrossValidation\Split;
use Illuminate\Container\Container;
use Illuminate\Mail\Markdown;
use App\Models\Alert;
use App\Models\HistorialSensor;


class AlertController extends Controller
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

        $mkd = Container::getInstance()->make(Markdown::class);
        $alerts = Alert::all();
        $sensor = HistorialSensor::all();
        $sensor = $sensor->last();
        $mkd->render('modules.alert.index', compact('alerts','sensor'));
        return view('modules.alert.index', compact('alerts','sensor'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $types = array();
        $types[1] = 'sensor';
        $types[0] = 'otro';
        return view('modules.alert.create',compact('types'));
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
            'type'=>'required|string|max:50',
            'email'=>'required|string|max:100',
            'title'=>'required|string|max:100',
            'body'=>'required|string|max:100',
            'footer'=>'required|string|max:100',
        ]);
        $part_mail = explode(":", $request->get('email'));
        $emails = array();
        foreach ($part_mail as $key => $mail) {
            $emails[$key] = $mail;
        }
        $alert = new Alert([
            'type' => $request->get('type'),
            'email' => json_encode($emails),
            'title' =>  $request->get('title'),
            'body' =>  $request->get('body'),
            'footer' =>  $request->get('footer')]);
        $alert->save();
        //return redirect('/alert')->with('success', 'Alerta generado satisfactoriamente');
        toastr()->success('Alerta creada');
        return redirect()->route('alert.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Alert  $alert
     * @return \Illuminate\Http\Response
     */
    public function show(Alert $alert)
    {
        //
        return view('modules.alert.show',compact('alert'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Alert  $alert
     * @return \Illuminate\Http\Response
     */
    public function edit(Alert $alert)
    {
        //
        $types = array();
        $types[1] = 'sensor';
        $types[0] = 'otro';
        $tmp_str = '';
        $tmp_mail = json_decode($alert->email);
        if(sizeof($tmp_mail) > 1)
        {
            for ($i=0; $i < sizeof($tmp_mail)-1; $i++) 
            {
                $tmp_str = $tmp_str.$tmp_mail[$i].':';  
            }
            $tmp_str = $tmp_str.$tmp_mail[sizeof($tmp_mail)-1];  
        }
        else
        {
            $tmp_str = $tmp_mail[0];
        }
        $alert->email = $tmp_str;
        return view('modules.alert.edit', compact('alert','types'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Alert  $alert
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Alert $alert)
    {
        //
        $request->validate([
            'type'=>'required|string|max:50',
            'email'=>'required|string|max:100',
            'title'=>'required|string|max:100',
            'body'=>'required|string|max:100',
            'footer'=>'required|string|max:100',
        ]);
        $alert_request = $request->all();
        $part_mail = explode(":", $request->get('email'));
        $emails = array();
        foreach ($part_mail as $key => $mail) {
            $emails[$key] = $mail;
        }
        $alert_request['type'] =  $request->get('type');
        $alert_request['email'] =  json_encode($emails);
        $alert_request['title'] =  $request->get('title');
        $alert_request['body'] =  $request->get('body');
        $alert_request['footer'] = $request->get('footer');
        $alert->update($alert_request);
        toastr()->warning('Alerta actualizada');
        return redirect()->route('alert.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Alert  $alert
     * @return \Illuminate\Http\Response
     */
    public function destroy(Alert $alert)
    {
        //
        $alert->delete();
        //return redirect('/alert')->with('success', 'Alerta eliminada!');
        toastr()->error('Alerta eliminada');
        return redirect()->route('alert.index');
    }
}
