<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
//use App\Http\Controllers\Controller;
use Crypt;
use Validator;
use App\Role;
use App\User;
use App\Hostpot;
use App\ApiToken;
use App\Http\Controllers\Api\BaseController as BaseController;

class HostpotController extends BaseController
{
    /**
     * Login api
     *
     * @return \Illuminate\Http\Response
     */
    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name_hostpot' => 'required',
            'nick_name' => 'required|string',
            'password' => 'required|same:password',
            'api_token' => 'required|max:64',
        ]);

        if ($validator->fails()) {
            $response = [
                'success' => false,
                'data' => 'Validation Error.',
                'message' => $validator->errors()
            ];
            return response()->json($response, 404);
        }
        $data = 'Please authenticate';
        $hostpots = Hostpot::all();
        foreach ($hostpots as $key => $hostpot) {
            if($request->get('api_token') == $hostpot->api_token && $request->get('password') == $hostpot->password && $request->get('nick_name') == $hostpot->nick_name && $request->get('name_hostpot') == $hostpot->name_hostpot){
            //$data = $hostpot->toArray();
            $data = 'Login_Succesfull';
            $response = [
                'success' => true,
                'data' => $data,
                'message' => 'Login exitoso'
            ]; 
            return response()->json($response, 200);
            }
            else{
            $data = 'Login_Error';
            $response = [
                'success' => true,
                'data' => $data,
                'message' => 'Error de autenticacion'
            ]; 
            }
        }
        return response()->json($response, 200);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $hostpots = User::whereRoleIs('hostpot')->get();
        $data = $hostpots->toArray();
        $response = [
            'success' => true,
            'data' => $data,
            'message' => 'Lista hostpots'
        ]; 
        return response()->json($response, 200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //sin Usar para Hospot Api
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $hostpot = User::find($id);
        $data = $hostpot->toArray();
        $response = [
            'success' => true,
            'data' => $data,
            'message' => 'Hostpot encontrado'
        ]; 
        return response()->json($response, 200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $data = 'Register_Error';
        $response = [
            'success' => true,
            'data' => $data,
            'message' => 'Hospot actualizado'
        ];
        return response()->json($response, 200);
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function editar(Request $request)
    {
        //
        $validator = Validator::make($request->all(), [
            'id' => 'required|string',
            'name' => 'required|string',
            'email' => 'required|string',
            'branch_office' => 'required|string',
            'password' => 'required|string',
            'serial_number' => 'required|string',
        ]);

        if ($validator->fails()) {
            $response = [
                'success' => false,
                'data' => 'Validation Error.',
                'message' => $validator->errors()
            ];
            return response()->json($response, 404);
        }

        $data = 'Please register correctly';
        if($request->get('id') && $request->get('name') && $request->get('email') && $request->get('branch_office')){
        $hostpot = User::find($request->get('id'));
        $hostpot->region_id = null;
        $hostpot->name = $request->get('name');
        $hostpot->email = $request->get('email');
        $hostpot->branch_office = $request->get('branch_office');
        $hostpot->password = $request->get('password');
        $hostpot->serial_number = $request->get('serial_number');
        $hostpot->detachRole('hostpot');       
        $hostpot->save();
        $data = $hostpot;
        $response = [
            'success' => true,
            'data' => $data,
            'message' => 'Hospot actualizado'
        ]; 
        return response()->json($response, 200);
        }
        else{
        $data = 'Register_Error';
        $response = [
            'success' => true,
            'data' => $data,
            'message' => 'Hospot no registrado'
        ]; 
        }
        return response()->json($response, 200);
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string',
            'email' => 'required|string',
            'branch_office' => 'required|string',
            'password' => 'required|string',
            'serial_number' => 'required|string',
        ]);

        if ($validator->fails()) {
            $response = [
                'success' => false,
                'data' => 'Validation Error.',
                'message' => $validator->errors()
            ];
            return response()->json($response, 404);
        }

        $data = 'Please register correctly';
        if($request->get('name') && $request->get('email') && $request->get('branch_office')){
        $hostpot = new User();
        $hostpot->region_id = null;
        $hostpot->name = $request->get('name');
        $hostpot->email = $request->get('email');
        $hostpot->branch_office = $request->get('branch_office');
        $hostpot->password = $request->get('password');
        $hostpot->serial_number = $request->get('serial_number');
        //$hostpot->attachRole('hostpot'); 
        $hostpot->save();
        $data = $hostpot;
        $response = [
            'success' => true,
            'data' => $data,
            'message' => 'Hospot registrado'
        ]; 
        return response()->json($response, 200);
        }
        else{
        $data = 'Register_Error';
        $response = [
            'success' => true,
            'data' => $data,
            'message' => 'Hospot no registrado'
        ]; 
        }
        return response()->json($response, 200);
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $hostpot)
    {
        //
        $hostpot->delete();
        $data = $hostpots->toArray();
        $response = [
            'success' => true,
            'data' => $data,
            'message' => 'Hostpot eliminado'
        ]; 
        return response()->json($response, 200);
    }
}
