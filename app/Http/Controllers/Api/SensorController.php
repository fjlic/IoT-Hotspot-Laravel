<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
//use App\Http\Controllers\Controller;
use App\Http\Controllers\Api\BaseController as BaseController;
use App\Sensor;
use App\HistorialSensor;
use Validator;

class SensorController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $sensor = Sensor::all();
        $data = $sensor->toArray();
        $response = [
            'success' => true,
            'data' => $data,
            'message' => 'Sensor retrieved successfully'
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
        'passw'=>'required|string|max:100',
        'vol_1'=>'required|string|max:100',
        'vol_2'=>'required|string|max:100',
        'vol_3'=>'required|string|max:100',
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

    if ($validator->fails()) {
        $response = [
            'success' => false,
            'data' => 'Validation Error.',
            'message' => $validator->errors()
        ];
        return response()->json($response, 404);
    }
    $data = 'Please register correctly Sensor';

    if($request->get('password') == 'rlay123'){
    $ssid = (Sensor::all()->count() + 1);
    $sensor = new Sensor();
    $sensor->esp32_id = null;
    $sensor->raspberry_id = null;
    $sensor->num_serie = $request->get('num_serie');
    $sensor->passw = $request->get('passw');
    $sensor->vol_1 = $request->get('vol_1');
    $sensor->vol_2 = $request->get('vol_2');
    $sensor->vol_3 = $request->get('vol_3');
    $sensor->door_1 = $request->get('door_1');
    $sensor->door_2 = $request->get('door_2');
    $sensor->door_3 = $request->get('door_3');
    $sensor->door_4 = $request->get('door_4');
    $sensor->rlay_1 = $request->get('rlay_1');
    $sensor->rlay_2 = $request->get('rlay_2');
    $sensor->rlay_3 = $request->get('rlay_3');
    $sensor->rlay_4 = $request->get('rlay_4');
    $sensor->text = $request->get('text');
    $sensor->save();
    $data = $sensor->toArray();
    $response = [
        'success' => true,
        'data' => $data,
        'message' => 'Sensor register successfully.'
    ]; 
    return response()->json($response, 200);
    }
    else{
    $data = 'Register_Error';
    $response = [
        'success' => true,
        'data' => $data,
        'message' => 'Sensor not registered.'
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
    public function historialsensor(Request $request)
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

        /*'esp32_id'=>'required|string|max:100',
        'raspberry_id'=>'required|string|max:100',
        'num_serie'=>'required|string|max:100',
        'passw'=>'required|string|max:100',
        'vol_1'=>'required|string|max:100',
        'vol_2'=>'required|string|max:100',
        'door_1'=>'required|string|max:100',
        'door_2'=>'required|string|max:100',
        'door_3'=>'required|string|max:100',
        'door_4'=>'required|string|max:100',
        'rlay_1'=>'required|string|max:100',
        'rlay_2'=>'required|string|max:100',
        'rlay_3'=>'required|string|max:100',
        'rlay_4'=>'required|string|max:100',
        'text'=>'required|string|max:100',*/

        $parse_json = json_decode($request->get('json'), true);
        foreach ($parse_json as $key => $json) {
        $historial_upload = new HistorialSensor();
        $historial_upload->sensor_id  = $json['sensor_id'];
        $historial_upload->name_machine  = $json['name_machine'];
        $historial_upload->nick_name  = $json['nick_name'];
        $historial_upload->nfc_serie  = $json['nfc_serie'];
        $historial_upload->coins = $json['coins'];	
        $historial_upload->uploaded = 1;
        $historial_upload->created_at = $json['created_at'];
        $historial_upload->save();
        ////////////////////////////////////////////
        $nfc = Nfc::find($json['nfc_coin_id']);
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
        $sensor = Sensor::where('num_serie',$num_serie)->first();
        if(is_null($sensor)){
            $response = [
                'success' => false,
                'data' => 'Empty',
                'message' => 'Sensor not Exist'
            ];
            return response()->json($response, 404);
        }
        $data = $sensor->toArray();
        $response = [
            'success' => true,
            'data' => $data,
            'message' => 'Sensor retrieved successfully.'
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
    public function update(Request $request, Sensor $sensor)
    {
        // 'id',  'num_serie', 'key_1', 'key_2', 'key_3', 'key_4', 'key_5', 'ssid', 
        //'password', 'dns_server', 'ip_server', 'protocol', 'port', 'text',
        $input = $request->all();
        $validator = Validator::make($input, [
           'esp32_id'=>'required|string|max:100',
           'raspberry_id'=>'required|string|max:100',
           'num_serie'=>'required|string|max:100',
           'passw'=>'required|string|max:100',
           'vol_1'=>'required|string|max:100',
           'vol_2'=>'required|string|max:100',
           'vol_3'=>'required|string|max:100',
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

        if ($validator->fails()) {
            $response = [
                'success' => false,
                'data' => 'Validation Error.',
                'message' => $validator->errors()
            ];
            return response()->json($response, 404);
        }

        $sensor->esp32_id = $input['esp32_id'];
        $sensor->sensor_id = $input['sensor_id'];
        $sensor->num_serie = $input['num_serie'];
        $sensor->passw = Crypt::encrypt($request->get('passw'));
        $sensor->vol_1 = $input['vol_1'];
        $sensor->vol_2 = $input['vol_2'];
        $sensor->vol_3 = $input['vol_3'];
        $sensor->door_1 = $input['door_1'];
        $sensor->door_2 = $input['door_2'];
        $sensor->door_3 = $input['door_3'];
        $sensor->door_4 = $input['door_4'];
        $sensor->rlay_1 = $input['rlay_1'];
        $sensor->rlay_2 = $input['rlay_2'];
        $sensor->rlay_3 = $input['rlay_3'];
        $sensor->rlay_4 = $input['rlay_4'];
        $sensor->text = $input['text'];
        $sensor->save();
        $data = $sensor->toArray();
        $response = [
            'success' => true,
            'data' => $data,
            'message' => 'Sensor updated successfully.'
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
           'num_serie'=>'required|string|max:100',
           'passw'=>'required|string|max:100',
           'vol_1'=>'required|string|max:100',
           'vol_2'=>'required|string|max:100',
           'vol_3'=>'required|string|max:100',
           'door_1'=>'required|string|max:100',
           'door_2'=>'required|string|max:100',
           'door_3'=>'required|string|max:100',
           'door_4'=>'required|string|max:100',
        ]);

        if ($validator->fails()) {
            $response = [
                'success' => false,
                'data' => 'Validation Error.',
                'message' => $validator->errors()
            ];
            return response()->json($response, 404);
        }
        $historialsensor = new HistorialSensor(); 
        $sensor = Sensor::where('num_serie',$input['num_serie'])->first(); 
        if (is_null($sensor)) {
            $response = [
                'success' => false,
                'data' => 'Empty',
                'message' => 'Sensor not Exist.'
            ];
            return response()->json($response, 404);
        }
        /* Historial Sensor*/
        $historialsensor->sensor_id = $sensor->id;
        $historialsensor->num_serie = $input['num_serie'];
        $historialsensor->passw = $input['passw'];
        $historialsensor->vol_1 = $input['vol_1'];
        $historialsensor->vol_2 = $input['vol_2'];
        $historialsensor->vol_3 = $input['vol_3'];
        $historialsensor->door_1 = $input['door_1'];
        $historialsensor->door_2 = $input['door_2'];
        $historialsensor->door_3 = $input['door_3'];
        $historialsensor->door_4 = $input['door_4'];
        $historialsensor->rlay_1 = $sensor->rlay_1;
        $historialsensor->rlay_2 = $sensor->rlay_2;
        $historialsensor->rlay_3 = $sensor->rlay_3;
        $historialsensor->rlay_4 = $sensor->rlay_4;
        $historialsensor->text = $sensor->text;
        $historialsensor->save();
        /* Update sensors*/ 
        $sensor->num_serie = $input['num_serie'];
        $sensor->passw = $input['passw'];
        $sensor->vol_1 = $input['vol_1'];
        $sensor->vol_2 = $input['vol_2'];
        $sensor->vol_3 = $input['vol_3'];
        $sensor->door_1 = $input['door_1'];
        $sensor->door_2 = $input['door_2'];
        $sensor->door_3 = $input['door_3'];
        $sensor->door_4 = $input['door_4'];
        $sensor->save();
        $data = $sensor->toArray();
        $response = [
            'success' => true,
            'data' => $data,
            'message' => 'Sensor updated successfully.'
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
    public function qrunblock(Request $request)
    {
        // 'id', 'user_id', 'num_serie', 'nick_name', 'password', 'api_token',
        $input = $request->all();
        $validator = Validator::make($input, [
           'num_serie'=>'required|string|max:100',
           'passw'=>'required|string|max:100',
           'rlay_1'=>'required|string|max:100',
           'rlay_2'=>'required|string|max:100',
           'rlay_3'=>'required|string|max:100',
           'rlay_4'=>'required|string|max:100',
        ]);

        if ($validator->fails()) {
            $response = [
                'success' => false,
                'data' => 'Validation Error.',
                'message' => $validator->errors()
            ];
            return response()->json($response, 404);
        }
        $historialsensor = new HistorialSensor(); 
        $sensor = Sensor::where('num_serie',$input['num_serie'])->first(); 
        if (is_null($sensor)) {
            $response = [
                'success' => false,
                'data' => 'Empty',
                'message' => 'Sensor not Exist.'
            ];
            return response()->json($response, 404);
        }
        /* Historial Sensor*/
        $historialsensor->sensor_id = $sensor->id;
        $historialsensor->num_serie = $sensor->num_serie;
        $historialsensor->passw = $sensor->passw;
        $historialsensor->vol_1 = $sensor->vol_1;
        $historialsensor->vol_2 = $sensor->vol_2;
        $historialsensor->vol_3 = $sensor->vol_3;
        $historialsensor->door_1 = $sensor->door_1;
        $historialsensor->door_2 = $sensor->door_2;
        $historialsensor->door_3 = $sensor->door_3;
        $historialsensor->door_4 = $sensor->door_4;
        $historialsensor->rlay_1 = $input['rlay_1'];
        $historialsensor->rlay_2 = $input['rlay_2'];
        $historialsensor->rlay_3 = $input['rlay_3'];
        $historialsensor->rlay_4 = $input['rlay_4'];
        $historialsensor->text = $sensor->text;
        $historialsensor->save();
        /* Update Sensor*/ 
        $sensor->rlay_1 = $input['rlay_1'];
        $sensor->rlay_2 = $input['rlay_2'];
        $sensor->rlay_3 = $input['rlay_3'];
        $sensor->rlay_4 = $input['rlay_4'];
        $sensor->save();
        $data = $sensor->toArray();
        $response = [
            'success' => true,
            'data' => $data,
            'message' => 'Sensor updated successfully.'
        ];
        return response()->json($response, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Sensor $sensor)
    {
        //
        $sensor->delete();
        $data = $sensor->toArray();

        $response = [
            'success' => true,
            'data' => $data,
            'message' => 'Sensor deleted successfully.'
        ];
        return response()->json($response, 200);
    }
}
