<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
//use App\Http\Controllers\Controller;
use App\Http\Controllers\Api\BaseController as BaseController;
use App\File;
use Validator;

class FileController extends BaseController
{
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function download(Request $request)
    {
        // id, name_file, set
        $input_req = $request->all();
        $validator = Validator::make($input_req, [
           'id'=>'required|string|max:100',
           'name_file'=>'required|string|max:100',
           'set'=>'required|string|max:100',
        ]);
        if ($validator->fails()) {
            $response = [
                'success' => false,
                'data' => 'Validation error',
                'message' => 'Query error'
            ];
            return response()->json($response, 403);
        }

        $file = File::where('id',$input_req['id'])->where('name_file',$input_req['name_file'])->where('set',$input_req['set'])->first(); 

        if ($file->isEmpty()) {
            $response = [
                'success' => false,
                'data' => 'Search error',
                'message' => 'Video not exist'
            ];
            return response()->json($response, 404);
        }
        
        /* Update Sensors*/ 
        $date = now();
        $timestamp = $date->getTimestamp();
        $file->updated_at = $timestamp;
        $file->save();

        /* Send Data Response*/
        $fileName = $file->name_file;
        $pathToFile = public_path("storage/public/files/").$file->name_file;
        $data = $file->toArray();
        $response = [
            'success' => true,
            'data' => $data,
            'message' => 'Video download successfully.'
        ];
        $headers = [
            'Content-Type' => 'application/octet-stream',
        ];
        //return response()->json($response, 200);
        return response()->download($pathToFile, $fileName, $headers);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function list(Request $request)
    {
        // num_serie', 'passw', 'set',
        $input_req = $request->all();
        $validator = Validator::make($input_req, [
           'set'=>'required|string|max:100',
        ]);

        if ($validator->fails()) {
            $response = [
                'success' => false,
                'data' => 'Validation error',
                'message' => 'Query error'
            ];
            return response()->json($response, 403);
        }

        $file = File::where('set',$input_req['set'])->get(); 
        //$sensor = DB::table('users')
        //        ->where('votes', '=', 100)
        //        ->where('age', '>', 35)
        //        ->get();
        
        if ($file->isEmpty()) {
            $response = [
                'success' => false,
                'data' => 'Search error',
                'message' => 'Set not exist'
            ];
            return response()->json($response, 404);
        }
        /* Send Data Response*/
        $data = $file->toArray();
        $response = [
            'success' => true,
            'data' => $data,
            'message' => 'List videos successfully.'
        ];
        return response()->json($response, 200);
    }
}