<?php

namespace App\Http\Controllers;

use App\Erb;
use App\User;
use App\ApiToken;
use Crypt;
use Illuminate\Http\Request;

class ErbController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $erbs = Erb::all();
        foreach ($erbs as $key => $erb) {
        $erb->password = Crypt::decrypt($erb->password);
        }
        return view('module.erb.index',compact('erbs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $users = User::all();
        return view('module.erb.create',compact('users'));
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
            'user_id'=>'required|string|max:100',
            'num_serie'=>'required|string|max:100',
            'name_machine'=>'required|string|max:100',
            'nick_name'=>'required|string|max:100',
            'password'=>'required|string|max:100'
            
        ]);

         $erb = new Erb();
         $erb->user_id = $request->get('user_id');
         $erb->num_serie = $request->get('num_serie');
         $erb->nick_name = $request->get('nick_name');
         $erb->name_machine = $request->get('name_machine');
         $erb->password = Crypt::encrypt($request->get('password'));
         $erb->api_token = ApiToken::GenerateToken32();
         $erb->save();
        //return redirect('/erb')->with('success', 'Erb Generado Satisfactoriamente!');
        toastr()->success('Erb generado satisfactoriamente');
        return redirect()->route('erb.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Erb  $erb
     * @return \Illuminate\Http\Response
     */
    public function show(Erb $erb)
    {
        //
        $erb->password = Crypt::decrypt($erb->password);
        return view('module.erb.show',compact('erb'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Erb  $erb
     * @return \Illuminate\Http\Response
     */
    public function edit(Erb $erb)
    {
        //
        $users = User::all();
        $erb->password = Crypt::decrypt($erb->password);
        return view('module.erb.edit', compact('erb','users'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Erb  $erb
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Erb $erb)
    {
        //
        $request->validate([
            'user_id'=>'required|string|max:100',
            'num_serie'=>'required|string|max:100',
            'name_machine'=>'required|string|max:100',
            'nick_name'=>'required|string|max:100',
            'password'=>'required|string|max:100',
            'api_token'=>'required|string|max:100'
        ]);
        $erb_request = $request->all();
        $erb_request['user_id'] =  $request->get('user_id');
        $erb_request['num_serie'] =  $request->get('num_serie');
        $erb_request['name_machine'] =  $request->get('name_machine');
        $erb_request['nick_name'] =  $request->get('nick_name');
        $erb_request['password'] = Crypt::encrypt($request->get('password'));
        $erb_request['api_token'] =  $request->get('api_token');
        $erb->update($erb_request);
        toastr()->warning('Erb Actualizado Satisfactoriamente');
        return redirect()->route('erb.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Erb  $erb
     * @return \Illuminate\Http\Response
     */
    public function destroy(Erb $erb)
    {
        //
        $erb->delete();
        toastr()->error('Erb eliminado satisfactoriamente');
        return redirect()->route('erb.index');
    }
}
