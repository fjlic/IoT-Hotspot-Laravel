# Modulo Crd-API

---

- [Crd API](#section-crd-api)
- [Controlador-API](#controller-api)
- [Test](#test)
- [List](#list)
- [Download](#download)
- [Index](#index)
- [Register](#register)
- [Ruta](#route)

<a name="section-crd-api"></a>
## Controlador Metodos test(), list(), download(), index(), register():

Estructura del modulo API Crd.. 🚥
Si gustas es posible consultar los metodos get por web.

---

- [Controlador-API](#controller-api)
- [Test](#test)
- [List](#list)
- [Download](#download)
- [Index](#index)
- [Register](#register)
- [Ruta](#route)

<a name="controller-api"></a>
## Controlador API

Comando `php artisan make:controller Api/Crd` ejecutar en consola dentro del proyecto.

> {info} Directorio  `app/Http/Controller/Api/CrdController.php` respeta esta estructura en el controlador.

```php

<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Api\BaseController as BaseController;
use App\Crd;
use App\HistorialCrd;
use App\ApiToken;
use Validator;
use Crypt;

class CrdController extends BaseController

{

}

```

<a name="test"></a>
## Metodo Test

Consulta url `https://hotspot.fjlic.com/api/cont/test{#id}` te regresara un objeto tipo JSON.

> {info} Directorio  `app/Http/Controller/Api/CounterController.php`.

```php

/**
    * Update the specified resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
    public function test(Request $request)
    {
        $input = $request->all();
          $validator = Validator::make($input, [
            'crd_id'=>'required|string|max:100',
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
        if ($validator->fails()) {
            $response = [
                'success' => false,
                'data' => 'Validation Error.',
                'message' => '0'
            ];
            return response()->json($response, 404);
        }
        $contador = Counter::where('crd_id',$input['crd_id'])->first();
        if (is_null($contador)) {
            $response = [
                'success' => false,
                'data' => 'Query Error',
                'message' => 'Contador not existe.'
            ];
            return response()->json($response, 403);
        }
          $nfc = Nfc::where('crd_id',$input['crd_id'])->first();
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
          $date = now();
          $timestamp = $date->getTimestamp();
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
         $historialcont = new HistorialCounter();
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
        $data = $historialcont->toArray();
        $response = [
            'success' => true,
            'data' => $data,
            'message' => '1'
        ];
    return response()->json($response, 200);
    }

```

<a name="list"></a>
## Metodo List

Consulta url `https://hotspot.fjlic.com/api/file/list` te regresara un objeto tipo JSON.

> {info} Directorio  `app/Http/Controller/Api/FileController.php`.

```php

/**
    * Update the specified resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
    public function list(Request $request)
    {
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
        return response()->json($response, 200);}

```

<a name="download"></a>
## Metodo Download

Consulta url `https://hotspot.fjlic.com/api/file/download{#id}` te regresara un objeto tipo JSON.

> {info} Directorio  `app/Http/Controller/Api/FileController.php`.

```php

/**
    * Update the specified resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
    public function download(Request $request)
    {
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
        if (is_null($file)) {
            $response = 
            'success' => false,
            'data' => 'Search error',
            'message' => 'Video not exist'
            ];
        return response()->json($response, 404);
        }
        $date = now();
        $timestamp = $date->getTimestamp();
        $file->updated_at = $timestamp;
        $file->save();
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

```

<a name="index"></a>
## Metodo Index

Consulta url `https://hotspot.fjlic.com/api/crd` te regresara un objeto tipo JSON.

> {info} Directorio  `app/Http/Controller/Api/CrdController.php`.

```php

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

```

<a name="register"></a>
## Metodo Register

Consulta url `https://hotspot.fjlic.com/api/crd/register` te regresara un objeto tipo JSON.

> {info} Directorio  `app/Http/Controller/Api/CrdController.php`.

```php

/**
    * Store a newly Crd created resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @return \Illuminate\Http\Response
    */
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
        'user_id'=>'required|string|max:100',
        'num_serie'=>'required|string|max:100',
        'nick_name'=>'required|string|max:100',
        'password'=>'required|string|max:100',]);
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

```

<a name="route"></a>
## Ruta API

Se deben agregar las ruta necesario dentro de api rutas.

> {info} Directorio  `routes/api.php`.

```php

 /*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post('cont/test', 'Api\CounterController@test')->name('cont.test');
Route::post('file/list', 'Api\FileController@list')->name('file.list');
Route::post('file/download', 'Api\FileController@download')->name('file.download');
Route::post('crd/register', 'Api\CrdController@register')->name('crd.register');
Route::resource('crd', 'Api\CrdController');
Route::middleware('auth:api')->get('/user', function (Request $request) {
return $request->user();});

```


<larecipe-newsletter></larecipe-newsletter>