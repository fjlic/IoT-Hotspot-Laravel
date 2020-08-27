<?php

namespace App\Http\Controllers\API;

use App\Crd;
use App\HistorialCrd;
use App\ApiToken;
use Validator;
use Crypt;
use Illuminate\Http\Request;
use App\Http\Controllers\Api\BaseController as BaseController;


class CrdController extends BaseController

{
    /**
     * List all Crds.
     *
     * @return \Illuminate\Http\Response
     */
    
     public function index()
    {
       $crds = Crd::all();
       foreach ($crds as $key => $crd) {
        $crd->password = Crypt::decrypt($crd->password);
        }
       $data = $crds->toArray();
       $response = [
          'success' => true,
          'data' => $data,
          'message' => 'Crd retrieved successfully.'
        ];
        return response()->json($response, 200);
    }

    /**
     * Display the Cdr specified resource.
     *
     * @param  int  $id or name $name_machine
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $crd = Crd::where('id',$id)->first(); 
        if (is_null($crd)) {
            $response = [
                'success' => false,
                'data' => 'Empty',
                'message' => 'Crd not Exist.'
            ];
            return response()->json($response, 404);
        }
        $data = $crd->toArray();
        $response = [
            'success' => true,
            'data' => $data,
            'message' => 'Crd retrieved successfully.'
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

    /**
     * Store a newly Crd created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function register(Request $request)
    {
        //
        // 'id', 'user_id', 'num_serie', 'nick_name', 'password', 'api_token',
       $validator = Validator::make($request->all(), [
        'user_id'=>'required|string|max:100',
        'num_serie'=>'required|string|max:100',
        'nick_name'=>'required|string|max:100',
        'password'=>'required|string|max:100',
    ]);

    if ($validator->fails()) {
        $response = [
            'success' => false,
            'data' => 'Validation Error.',
            'message' => $validator->errors()
        ];
        return response()->json($response, 404);
    }
    $data = 'Please register correctly crd';
    if($request->get('password') == 'pi123'){
    $nick_name = (Crd::all()->count() + 1);
    $crd = new Crd;
    $crd->user_id = null;
    $crd->num_serie =  $request->get('num_serie');
    $crd->nick_name = 'crd_'.$nick_name;
    $crd->password = Crypt::encrypt($request->get('password'));
    $crd->api_token = ApiToken::GenerateToken32();
    $crd->save();
    $crd->password = Crypt::decrypt($crd->password);
    $data = $crd->toArray();
    $response = [
        'success' => true,
        'data' => $data,
        'message' => 'Crd register successfully.'
    ]; 
    return response()->json($response, 200);
    }
    else{
    $data = 'Register_Error';
    $response = [
        'success' => true,
        'data' => $data,
        'message' => 'Crd not registered.'
    ]; 
    }
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
    public function update(Request $request, Crd $crd)
    {
        // 'id', 'user_id', 'num_serie', 'nick_name', 'password', 'api_token',
        $input = $request->all();
        $validator = Validator::make($input, [
            'user_id'=>'required|string|max:100',
            'num_serie'=>'required|string|max:100',
            'nick_name'=>'required|string|max:100',
            'password'=>'required|string|max:100'
        ]);

        if ($validator->fails()) {
            $response = [
                'success' => false,
                'data' => 'Validation Error.',
                'message' => $validator->errors()
            ];
            return response()->json($response, 404);
        }

        $crd->user_id = $input['user_id'];
        $crd->num_serie = $input['num_serie'];
        $crd->nick_name = $input['nick_name'];
        $crd->api_token = ApiToken::GenerateToken32();
        $crd->save();
        $data = $crd->toArray();
        $response = [
            'success' => true,
            'data' => $data,
            'message' => 'Crd updated successfully.'
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
            'id'=>'required|string|max:100',
            'user_id'=>'required|string|max:100',
            'num_serie'=>'required|string|max:100',
            'nick_name'=>'required|string|max:100',
            'password'=>'required|string|max:100',
            'api_token'=>'required|string|max:100'
        ]);

        if ($validator->fails()) {
            $response = [
                'success' => false,
                'data' => 'Validation Error.',
                'message' => $validator->errors()
            ];
            return response()->json($response, 404);
        }
        $crd = Crd::where('num_serie',$input['num_serie'])->first(); 
        if (is_null($crd)) {
            $response = [
                'success' => false,
                'data' => 'Empty',
                'message' => 'Crd not Exist.'
            ];
            return response()->json($response, 404);
        }
        $crd->user_id = $input['user_id'];
        $crd->num_serie = $input['num_serie'];
        $crd->nick_name = $input['nick_name'];
        $crd->nick_name = $input['password'];
        $crd->api_token = $input['api_token'];
        $crd->save();
        $data = $crd->toArray();
        $response = [
            'success' => true,
            'data' => $data,
            'message' => 'Crd updated successfully.'
        ];
        return response()->json($response, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Crd $crd)
    {
        //
        $crd->delete();
        $data = $crd->toArray();

        $response = [
            'success' => true,
            'data' => $data,
            'message' => 'Crd deleted successfully.'
        ];
        return response()->json($response, 200);
    }
}