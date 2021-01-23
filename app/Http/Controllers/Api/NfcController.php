<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
//use App\Http\Controllers\Controller;
use App\Http\Controllers\Api\BaseController as BaseController;
use App\Nfc;
use App\HistorialNfc;
use Validator;

class NfcController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $nfc = Nfc::all();
        $data = $nfc->toArray();
        $response = [
            'success' => true,
            'data' => $data,
            'message' => 'Nfc retrieved successfully'
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
        //
    }

    /**updthistialsnfc
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        // 'id',  'num_serie', 'key_1', 'key_2', 'key_3', 'key_4', 'key_5', 'ssid', 
       //'password', 'dns_server', 'ip_server', 'protocol', 'port', 'text',
       $validator = Validator::make($request->all(), [
        'num_serie'=>'required|string|max:100',
        'key_1'=>'required|string|max:100',
        'key_2'=>'required|string|max:100',
        'key_3'=>'required|string|max:100',
        'key_4'=>'required|string|max:100',
        'key_5'=>'required|string|max:100',
        'ssid'=>'required|string|max:100',
        'password'=>'required|string|max:100',
        'dns_server'=>'required|string|max:100',
        'ip_server'=>'required|string|max:100',
        'protocol'=>'required|string|max:100',
        'port'=>'required|string|max:100',
        'text'=>'required|string|max:100',
    ]);

    if ($validator->fails()) {
        $response = [
            'success' => false,
            'data' => 'Validation Error.',
            'message' => $validator->errors()
        ];
        return response()->json($response, 404);
    }
    $data = 'Please register correctly Nfc';

    if($request->get('password') == 'nfc123'){
    $ssid = (Nfc::all()->count() + 1);
    $nfc = new Nfc();
    $nfc->esp32_id = null;
    $nfc->raspberry_id = null;
    $nfc->num_serie = $request->get('num_serie');
    $nfc->key_1 = $request->get('key_1');
    $nfc->key_2 = $request->get('key_2');
    $nfc->key_3 = $request->get('key_3');
    $nfc->key_4 = $request->get('key_4');
    $nfc->key_5 = $request->get('key_5');
    $nfc->ssid = 'nfc_'.$ssid;
    $nfc->password = Crypt::encrypt($request->get('password'));
    $nfc->dns_server = $request->get('dns_server');
    $nfc->ip_server = $request->get('ip_server');
    $nfc->protocol = $request->get('protocol');
    $nfc->port = $request->get('port');
    $nfc->text = $request->get('text');
    $nfc->save();
    $data = $nfc->toArray();
    $response = [
        'success' => true,
        'data' => $data,
        'message' => 'Nfc register successfully.'
    ]; 
    return response()->json($response, 200);
    }
    else{
    $data = 'Register_Error';
    $response = [
        'success' => true,
        'data' => $data,
        'message' => 'Nfc not registered.'
    ]; 
    }
    return response()->json($response, 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function historialnfc(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'json' => 'required|string',
        ]);

        if ($validator->fails()) {
            $response = [
                'success' => true,
                'data' => 'Parameter Error.',
                'message' => $validator->errors()
            ];
            return response()->json($response, 200);
        }

        $parse_json = json_decode($request->get('json'), true);
        foreach ($parse_json as $key => $json) {
        $historial_upload = new HistorialNfc();
        $historial_upload->nfc_coin_id  = $json['nfc_coin_id'];
        $historial_upload->name_machine  = $json['name_machine'];
        $historial_upload->nick_name  = $json['nick_name'];
        $historial_upload->nfc_serie  = $json['nfc_serie'];
        $historial_upload->coins = $json['coins'];	
        $historial_upload->uploaded = 1;
        $historial_upload->created_at = $json['created_at'];
        $historial_upload->save();
        ////////////////////////////////////////////
        $nfc = NfcCoin::find($json['nfc_coin_id']);
        $nfc->coins = $json['coins'];
        $nfc->save();
        ////////////////////////////////////////////
        }
        $data = 'Upload Exitoso';
            $response = [
                'success' => true,
                'data' => $data,
                'message' => 'Todo OK'
            ];
            return response()->json($response, 200); 
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($num_serie)
    {
        //
        $nfc = Nfc::where('num_serie',$num_serie)->first();
        if(is_null($nfc)){
            $response = [
                'success' => false,
                'data' => 'Empty',
                'message' => 'Nfc not Exist'
            ];
            return response()->json($response, 404);
        }
        $data = $nfc->toArray();
        $response = [
            'success' => true,
            'data' => $data,
            'message' => 'Nfc retrieved successfully.'
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
    public function update(Request $request, Nfc $nfc)
    {
        // 'id',  'num_serie', 'key_1', 'key_2', 'key_3', 'key_4', 'key_5', 'ssid', 
        //'password', 'dns_server', 'ip_server', 'protocol', 'port', 'text',
        $input = $request->all();
        $validator = Validator::make($input, [
            'esp32_id'=>'required|string|max:100',
            'raspberry_id'=>'required|string|max:100',
            'num_serie'=>'required|string|max:100',
            'key_1'=>'required|string|max:100',
            'key_2'=>'required|string|max:100',
            'key_3'=>'required|string|max:100',
            'key_4'=>'required|string|max:100',
            'key_5'=>'required|string|max:100',
            'ssid'=>'required|string|max:100',
            'password'=>'required|string|max:100',
            'dns_server'=>'required|string|max:100',
            'ip_server'=>'required|string|max:100',
            'protocol'=>'required|string|max:100',
            'port'=>'required|string|max:100',
            'text'=>'required|string|max:100',
        ]);

        if ($validator->fails()) {
            $response = [
                'success' => false,
                'data' => 'Validation Error.',
                'message' => $validator->errors()
            ];
            return response()->json($response, 404);
        }

        $nfc->esp32_id = $input['esp32_id'];
        $nfc->raspberry_id = $input['raspberry_id'];
        $nfc->num_serie = $input['num_serie'];
        $nfc->key_1 = $input['key_1'];
        $nfc->key_2 = $input['key_2'];
        $nfc->key_3 = $input['key_3'];
        $nfc->key_4 = $input['key_4'];
        $nfc->key_5 = $input['key_5'];
        $nfc->ssid = $input['ssid'];
        $nfc->password = Crypt::encrypt($request->get('password'));
        $nfc->dns_server = $input['dns_server'];
        $nfc->protocol = $input['protocol'];
        $nfc->port = $input['port'];
        $nfc->text = $input['text'];
        $nfc->save();
        $data = $nfc->toArray();
        $response = [
            'success' => true,
            'data' => $data,
            'message' => 'Nfc updated successfully.'
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
    public function modify(Request $request)
    {
        // 'id', 'user_id', 'num_serie', 'nick_name', 'password', 'api_token',
        $input = $request->all();
        $validator = Validator::make($input, [
            'esp32_id'=>'required|string|max:100',
            'raspberry_id'=>'required|string|max:100',
            'num_serie'=>'required|string|max:100',
            'key_1'=>'required|string|max:100',
            'key_2'=>'required|string|max:100',
            'key_3'=>'required|string|max:100',
            'key_4'=>'required|string|max:100',
            'key_5'=>'required|string|max:100',
            'ssid'=>'required|string|max:100',
            'password'=>'required|string|max:100',
            'dns_server'=>'required|string|max:100',
            'ip_server'=>'required|string|max:100',
            'protocol'=>'required|string|max:100',
            'port'=>'required|string|max:100',
            'text'=>'required|string|max:100',
        ]);

        if ($validator->fails()) {
            $response = [
                'success' => false,
                'data' => 'Validation Error.',
                'message' => $validator->errors()
            ];
            return response()->json($response, 404);
        }
        $nfc = Nfc::where('num_serie',$input['num_serie'])->first(); 
        if (is_null($nfc)) {
            $response = [
                'success' => false,
                'data' => 'Empty',
                'message' => 'Nfc not Exist.'
            ];
            return response()->json($response, 404);
        }
        $nfc->esp32_id = $input['esp32_id'];
        $nfc->raspberry_id = $input['raspberry_id'];
        $nfc->num_serie = $input['num_serie'];
        $nfc->key_1 = $input['key_1'];
        $nfc->key_2 = $input['key_2'];
        $nfc->key_3 = $input['key_3'];
        $nfc->key_4 = $input['key_4'];
        $nfc->key_5 = $input['key_5'];
        $nfc->ssid = $input['ssid'];
        $nfc->password =  $input['password'];
        $nfc->dns_server = $input['dns_server'];
        $nfc->ip_server = $input['ip_server'];
        $nfc->protocol = $input['protocol'];
        $nfc->port = $input['port'];
        $nfc->text = $input['text'];
        $nfc->save();
        $data = $nfc->toArray();
        $response = [
            'success' => true,
            'data' => $data,
            'message' => 'Nfc updated successfully.'
        ];
        return response()->json($response, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Nfc $nfc)
    {
        //
        $nfc->delete();
        $data = $nfc->toArray();

        $response = [
            'success' => true,
            'data' => $data,
            'message' => 'Nfc deleted successfully.'
        ];
        return response()->json($response, 200);
    }
}
