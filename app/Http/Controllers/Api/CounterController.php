<?php

namespace App\Http\Controllers\Api;

use App\Counter;
use App\HistorialCounter;
use App\Nfc;
use App\HistorialNfc;
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
        if(isset($input['type'])) { 
          $validator = Validator::make($input, [
            'crd_id'=>'required|string|max:100',
            //'erb_id'=>'required|string|max:100',
            'nfc_id'=>'required|string|max:100',
            'num_serie'=>'required|string|max:100',
            'cont_qr'=>'required|string|max:100',
            'cont_mon'=>'required|string|max:100',
            'cont_mon_2'=>'required|string|max:100',
            'cont_corte'=>'required|string|max:100',
            'cont_prem'=>'required|string|max:100',
            'cost_mon'=>'required|string|max:100',
            'ssid'=>'required|string|max:100',
            'passwd'=>'required|string|max:100',
            'ip_server'=>'required|string|max:100',
            'port'=>'required|string|max:100',
            'type'=>'required|string|max:100',
            'token'=>'required|string|max:100',
            'text'=>'required|string|max:100',
          ]);
        }
        else{
            $validator = Validator::make($input, [
             'crd_id'=>'required|string|max:100',
             //'erb_id'=>'required|string|max:100',
             'nfc_id'=>'required|string|max:100',
             'num_serie'=>'required|string|max:100',
             'cont_qr'=>'required|string|max:100',
             'cont_mon'=>'required|string|max:100',
             'cont_mon_2'=>'required|string|max:100',
             'cont_corte'=>'required|string|max:100',
             'cont_prem'=>'required|string|max:100',
             'cost_mon'=>'required|string|max:100',
             'ssid'=>'required|string|max:100',
             'passwd'=>'required|string|max:100',
             'ip_server'=>'required|string|max:100',
             'port'=>'required|string|max:100',
             'token'=>'required|string|max:100',
             'text'=>'required|string|max:100',
           ]);
        }
        if ($validator->fails()) {
            $response = [
                'success' => false,
                'data' => 'Validation Error.',
                'message' => '0'
                //'message' => $validator->errors()
            ];
            return response()->json($response, 404);
        }
         
        $contador = Counter::where('crd_id',$input['crd_id'])->first();
        //$contador = Counter::where('erb_id',$input['erb_id'])->first(); 
        if (is_null($contador)) {
            $response = [
                'success' => false,
                'data' => 'Query Error',
                'message' => 'Contador not existe.'
            ];
            return response()->json($response, 403);
        }

         /* Update Nfc*/
         $nfc = Nfc::where('crd_id',$input['crd_id'])->first();
        
         //if (is_null($nfc)) {
          $nfc->num_serie = $input['num_serie'];
          $nfc->cont_qr = $input['cont_qr'];
          $nfc->cont_mon = $input['cont_mon'];
          $nfc->cont_mon_2 = $input['cont_mon_2'];
          $nfc->cont_corte = $input['cont_corte'];
          $nfc->cont_prem = $input['cont_prem'];
          $nfc->cost_mon = $input['cost_mon'];
          $nfc->ssid = $input['ssid'];
          $nfc->passwd = $input['passwd'];
          $nfc->ip_server = $input['ip_server'];
          $nfc->port = $input['port'];
          $nfc->txt = $input['text'];
          $nfc->save();
        
        /* Update HistorialNfc*/
          $historialnfc = new HistorialNfc();
          $historialnfc->nfc_id = $nfc->id;
          $historialnfc->num_serie = $input['num_serie'];
          $historialnfc->cont_qr = $input['cont_qr'];
          $historialnfc->cont_mon = $input['cont_mon'];
          $historialnfc->cont_mon_2 = $input['cont_mon_2'];
          $historialnfc->cont_corte = $input['cont_corte'];
          $historialnfc->cont_prem = $input['cont_prem'];
          $historialnfc->cost_mon = $input['cost_mon'];
          $historialnfc->ssid = $input['ssid'];
          $historialnfc->passwd = $input['passwd'];
          $historialnfc->ip_server = $input['ip_server'];
          $historialnfc->port = $input['port'];
          $historialnfc->txt = $input['text'];
          $historialnfc->save();
        //}

        /* Update Contadores*/ 
        $date = now();
        $timestamp = $date->getTimestamp();
        //$contador->esp32_id = $input['esp32_id'];
        //$contador->nfc_id = $input['nfc_id'];
        //$contador->num_serie = $input['num_serie'];
        if(isset($input['type'])) {
          $contador->num_serie = $input['num_serie'];
          $contador->cont_qr = $input['cont_qr'];
          $contador->cont_mon = $input['cont_mon'];
          $contador->cont_mon_2 = $input['cont_mon_2'];
          $contador->cont_corte = $input['cont_corte'];
          $contador->cont_prem = $input['cont_prem'];
          $contador->cost_mon = $input['cost_mon'];
          $contador->type = $input['type'];
          $contador->updated_at = $timestamp;
          $contador->save();
        }
        
        else {
          $contador->num_serie = $input['num_serie'];
          $contador->cont_qr = $input['cont_qr'];
          $contador->cont_mon = $input['cont_mon'];
          $contador->cont_mon_2 = $input['cont_mon_2'];
          $contador->cont_corte = $input['cont_corte'];
          $contador->cont_prem = $input['cont_prem'];
          $contador->cost_mon = $input['cost_mon'];
          $contador->updated_at = $timestamp;
          $contador->save();
        }
        //----------------------------------------------
        if(isset($input['type'])) {
         /* Update Historial Contadores*/
         $historialcont = new HistorialCounter();
         /* Historial Contador*/
         $historialcont->counter_id = $contador->id;
         $historialcont->nfc_id = $contador->nfc_id;
         $historialcont->num_serie = $input['num_serie'];
         $historialcont->cont_qr = $input['cont_qr'];
         $historialcont->cont_mon = $input['cont_mon'];
         $historialcont->cont_mon_2 = $input['cont_mon_2'];
         $historialcont->cont_corte = $input['cont_corte'];
         $historialcont->cont_prem = $input['cont_prem'];
         $historialcont->cost_mon = $input['cost_mon'];
         $historialcont->ssid = $input['ssid'];
         $historialcont->passwd = $input['passwd'];
         $historialcont->ip_server = $input['ip_server'];
         $historialcont->port = $input['port'];
         $historialcont->token = $input['token'];
         $historialcont->type = $input['type'];
         $historialcont->save();
        }
        
        else {
         $historialcont = new HistorialCounter();
         /* Historial Contador*/
         $historialcont->counter_id = $contador->id;
         $historialcont->nfc_id = $contador->nfc_id;
         $historialcont->num_serie = $input['num_serie'];
         $historialcont->cont_qr = $input['cont_qr'];
         $historialcont->cont_mon = $input['cont_mon'];
         $historialcont->cont_mon_2 = $input['cont_mon_2'];
         $historialcont->cont_corte = $input['cont_corte'];
         $historialcont->cont_prem = $input['cont_prem'];
         $historialcont->cost_mon = $input['cost_mon'];
         $historialcont->ssid = $input['ssid'];
         $historialcont->passwd = $input['passwd'];
         $historialcont->ip_server = $input['ip_server'];
         $historialcont->port = $input['port'];
         $historialcont->token = $input['token'];
         $historialcont->save();
        }
        $data = $historialcont->toArray();
        $response = [
            'success' => true,
            'data' => $data,
            'message' => '1'
        ];
        return response()->json($response, 200);
    }
}
