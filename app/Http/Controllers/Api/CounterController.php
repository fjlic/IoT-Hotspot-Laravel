<?php

namespace App\Http\Controllers\Api;

use App\Counter;
use App\HistorialCounter;
use Validator;
use Illuminate\Http\Request;
use App\Http\Controllers\Api\BaseController as BaseController;

class CounterController extends BaseController
{
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function test(Request $request)
    {
        // 'esp32_id', 'nfc_id', 'cont_qr', 'cont_mon'
        $input = $request->all();
        $validator = Validator::make($input, [
           'crd_id'=>'required|string|max:100',
           //'erb_id'=>'required|string|max:100',
           'nfc_id'=>'required|string|max:100',
           'num_serie'=>'required|string|max:100',
           'cont_qr'=>'required|string|max:100',
           'cont_mon'=>'required|string|max:100',
        ]);

        if ($validator->fails()) {
            $response = [
                'success' => false,
                'data' => 'Validation Error.',
                'message' => $validator->errors()
            ];
            return response()->json($response, 404);
        }
        $historialcont = new HistorialCounter(); 
        $contador = Counter::where('crd_id',$input['crd_id'])->first();
        //$contador = Counter::where('erb_id',$input['erb_id'])->first(); 
        if (is_null($contador)) {
            $response = [
                'success' => false,
                'data' => 'Empty',
                'message' => 'Contador not existe.'
            ];
            return response()->json($response, 404);
        }
        /* Historial Contador*/
        $historialcont->cont_id = $contador->id;
        $historialcont->nfc_id = $contador->nfc_id;
        $historialcont->num_serie = $contador->num_serie;
        $historialcont->cont_qr = $contador->cont_qr;
        $historialcont->cont_mon = $contador->cont_mon;
        $historialcont->save();
        /* Update Contadores*/
        $contador->crd_id = $input['crd_id']; 
        //$contador->erb_id = $input['erb_id'];
        $contador->nfc_id = $input['nfc_id'];
        $contador->num_serie = $input['num_serie'];
        $contador->cont_qr = $input['cont_qr'];
        $contador->cont_mon = $input['cont_mon'];
        $contador->save();
        $data = $contador->toArray();
        $response = [
            'success' => true,
            'data' => $data,
            'message' => 'Contador actualizado satisfactoriamente.'
        ];
        return response()->json($response, 200);
    }
}
