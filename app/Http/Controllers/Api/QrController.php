<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
//use App\Http\Controllers\Controller;
use App\Http\Controllers\Api\BaseController as BaseController;
use App\Qr;
use App\HistorialQr;
use Validator;

class QrController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $qr = Qr::all();
        $data = $qr->toArray();
        $response = [
            'success' => true,
            'data' => $data,
            'message' => 'Qr retrieved successfully.'
        ]; 
        return response()->json($response, 200);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($qr_serie)
    {
        // 'qr_serie', 'key_status', 'gone_down',
        $qr = Qr::where('qr_serie',$qr_serie)->first();
        if(is_null($qr)){
            $response = [
                'success' => false,
                'data' => $qr_serie,
                'message' => 'Qr not Exist.'
            ];
            return response()->json($response, 404);
        }
        $data = $qr->toArray();
        $response = [
            'success' => true,
            'data' => $data,
            'message' => 'Qr retrieved successfully.'
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

    /**updthistialsqr
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        // 'qr_serie', 'key_status', 'gone_down',
       $validator = Validator::make($request->all(), [
        'qr_serie'=>'required|string|max:100',
        'key_status'=>'required|string|max:100',
        'gone_down'=>'required|string|max:100',
    ]);

    if ($validator->fails()) {
        $response = [
            'success' => false,
            'data' => 'Validation Error.',
            'message' => $validator->errors()
        ];
        return response()->json($response, 404);
    }
    $data = 'Please register correctly Qr';
    if($request->get('qr_serie')){
    $qr = (Qr::all()->count() + 1);
    $qr = new Qr();
    $qr->esp32_id = null;
    $qr->raspberry_id = null;
    $qr->qr_serie = $request->get('qr_serie');
    $qr->key_status = $request->get('key_status');
    $qr->gone_down = $request->get('gone_down');
    $qr->save();
    $data = $qr->toArray();
    $response = [
        'success' => true,
        'data' => $data,
        'message' => 'Qr register successfully.'
    ]; 
    return response()->json($response, 200);
    }
    else{
    $data = 'Register_Error';
    $response = [
        'success' => true,
        'data' => $data,
        'message' => 'Qr not registered.'
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
    public function historialqr(Request $request)
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
        $historial_upload = new HistorialQr();
        $historial_upload->qr_coin_id  = $json['qr_coin_id'];
        $historial_upload->name_machine  = $json['name_machine'];
        $historial_upload->nick_name  = $json['nick_name'];
        $historial_upload->qr_serie  = $json['qr_serie'];
        $historial_upload->coins = $json['coins'];	
        $historial_upload->uploaded = 1;
        $historial_upload->created_at = $json['created_at'];
        $historial_upload->save();
        ////////////////////////////////////////////
        $qr = QrCoin::find($json['qr_coin_id']);
        $qr->coins = $json['coins'];
        $qr->save();
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
    public function update(Request $request, Qr $qr)
    {
        //
        // 'qr_serie', 'key_status', 'gone_down',
        $input = $request->all();
        $validator = Validator::make($input, [
            'esp32_id'=>'required|string|max:100',
            'raspberry_id'=>'required|string|max:100',
            'qr_serie'=>'required|string|max:100',
            'key_status'=>'required|string|max:100',
            'gone_down'=>'required|string|max:100'
        ]);

        if ($validator->fails()) {
            $response = [
                'success' => false,
                'data' => 'Validation Error.',
                'message' => $validator->errors()
            ];
            return response()->json($response, 404);
        }

        $qr->esp32_id = $input['esp32_id'];
        $qr->raspberry_id = $input['raspberry_id'];
        $qr->qr_serie = $input['qr_serie'];
        $qr->key_status = $input['key_status'];
        $qr->gone_down = $input['gone_down'];
        $qr->save();
        $data = $qr->toArray();
        $response = [
            'success' => true,
            'data' => $data,
            'message' => 'Qr updated successfully.'
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
            'raspberry_id'=>'required|string|max:100',
            'qr_serie'=>'required|string|max:100',
            'key_status'=>'required|string|max:100',
            'gone_down'=>'required|string|max:100'
        ]);

        if ($validator->fails()) {
            $response = [
                'success' => false,
                'data' => 'Validation Error.',
                'message' => 'Query error'
            ];
            return response()->json($response, 403);
        }
        $qr = Qr::where('qr_serie',$input['qr_serie'])->first(); 
        if (is_null($qr)) {
            $response = [
                'success' => false,
                'data' => 'Search error',
                'message' => 'Qr not Exist.'
            ];
            return response()->json($response, 404);
        }
        $qr->raspberry_id = $input['raspberry_id'];
        $qr->qr_serie = $input['qr_serie'];
        $qr->key_status = $input['key_status'];
        $qr->gone_down = $input['gone_down'];
        $qr->save();
        $data = $qr->toArray();
        $response = [
            'success' => true,
            'data' => $data,
            'message' => 'qr updated successfully.'
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
    public function unblock(Request $request)
    {
        // 'id', 'user_id', 'num_serie', 'nick_name', 'password', 'api_token',
        $input = $request->all();
        $validator = Validator::make($input, [
            'qr_serie'=>'required|string|max:100',
            'key_status'=>'required|string|max:100',
            'gone_down'=>'required|string|max:100'
        ]);

        if ($validator->fails()) {
            $response = [
                'success' => false,
                'data' => 'Validation Error.',
                'message' => $validator->errors()
            ];
            return response()->json($response, 404);
        }
        $qr = Qr::where('qr_serie',$input['qr_serie'])->first();
        $historial_qr = new HistorialQr(); 
        if (is_null($qr)) {
            $response = [
                'success' => false,
                'data' => 'Empty',
                'message' => 'Qr not Exist.'
            ];
            return response()->json($response, 404);
        }

        $historial_qr->qr_id = $qr->id;
        $historial_qr->qr_serie = $input['qr_serie'];
        $historial_qr->key_status = $input['key_status'];
        $historial_qr->gone_down = $input['gone_down'];
        $historial_qr->save();
        //$qr->esp32_id = $input['esp32_id'];
        //$qr->raspberry_id = $input['raspberry_id'];
        //$qr->qr_serie = $input['qr_serie'];
        //$qr->key_status = $input['key_status'];
        //$qr->gone_down = $input['gone_down'];
        //$qr->save();
        $data = $historial_qr->toArray();
        $response = [
            'success' => true,
            'data' => $data,
            'message' => 'Historial updated successfully.'
        ];
        return response()->json($response, 200);
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Qr $qr)
    {
        //
        $qr->delete();
        $data = $qr->toArray();

        $response = [
            'success' => true,
            'data' => $data,
            'message' => 'Qr deleted successfully.'
        ];
        return response()->json($response, 200);
    }
}
