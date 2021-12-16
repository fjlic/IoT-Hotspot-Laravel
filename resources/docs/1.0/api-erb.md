# Modulo Erb-API

---

- [Erb API](#section-erb-api)
- [Controlador-API](#controller-api)
- [Status](#status)
- [Modify](#modify)
- [Index](#index)
- [Register](#register)
- [Ruta](#route)

<a name="section-erb-api"></a>
## Controlador Metodos status(), modify(), index(), register():

Estructura del modulo API Erb.. 🚥
Si gustas es posible consultar los metodos get por web.

---

- [Controlador-API](#controller-api)
- [Status](#status)
- [Modify](#modify)
- [Index](#index)
- [Register](#register)
- [Ruta](#route)

<a name="controller-api"></a>
## Controlador API

Comando `php artisan make:controller Api/ErbController` ejecutar en consola dentro del proyecto.

> {info} Directorio  `app/Http/Controller/Api/ErbController.php` respeta esta estructura en el controlador.

```php

<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Api\BaseController as BaseController;
use App\Erb;
use App\HistorialErb;
use App\ApiToken;
use Validator;
use Crypt;

class ErbController extends BaseController

{
  
}

```

<a name="status"></a>
## Metodo Status

Consulta url `https://hotspot.fjlic.com/api/sensor/status{#id}` te regresara un objeto tipo JSON.

> {info} Directorio  `app/Http/Controller/Api/SensorController.php`.

```php

/**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function status(Request $request)
    {
        $input_req = $request->all();
        $validator = Validator::make($input_req, [
           'num_serie'=>'required|string|max:100',
           'passw'=>'required|string|max:100',
           'text'=>'required|string|max:100',
        ]);

        if ($validator->fails()) {
            $response = [
                'success' => false,
                'data' => 'Validation Error',
                'message' => 'Query error'
            ];
            return response()->json($response, 403);
        }

        $sensor = Sensor::where('num_serie',$input_req['num_serie'])->where('passw',$input_req['passw'])->first(); 
        
        if (is_null($sensor)) {
            $response = [
                'success' => false,
                'data' => 'Search error',
                'message' => 'Sensor not exist'
            ];
            return response()->json($response, 404);
        }
        
        /* Update Sensors*/
        $date = now();
        $timestamp = $date->getTimestamp();
        $sensor->text = $input_req['text'];
        $sensor->updated_at = $timestamp;
        $sensor->save();

        $historialsensor = new HistorialSensor(); 
        /* Historial Sensor*/
        $historialsensor->sensor_id = $sensor->id;
        $historialsensor->num_serie = $sensor->num_serie;
        $historialsensor->passw = $sensor->passw;
        $historialsensor->vol_1 = $sensor->vol_1;
        $historialsensor->vol_2 = $sensor->vol_2;
        $historialsensor->vol_3 = $sensor->vol_3;
        $historialsensor->temp_1 = $sensor->temp_1;
        $historialsensor->temp_2 = $sensor->temp_2;
        $historialsensor->temp_3 = $sensor->temp_3;
        $historialsensor->temp_4 = $sensor->temp_4;
        $historialsensor->door_1 = $sensor->door_1;
        $historialsensor->door_2 = $sensor->door_2;
        $historialsensor->door_3 = $sensor->door_3;
        $historialsensor->door_4 = $sensor->door_1;
        $historialsensor->rlay_1 = $sensor->rlay_1;
        $historialsensor->rlay_2 = $sensor->rlay_2;
        $historialsensor->rlay_3 = $sensor->rlay_3;
        $historialsensor->rlay_4 = $sensor->rlay_4;
        $historialsensor->text = $input_req['text'];
        $historialsensor->save();
        /* Send Data Response*/
        $data = $historialsensor->toArray();
        $response = [
            'success' => true,
            'data' => $data,
            'message' => 'Sensor status successfully.'
        ];
        return response()->json($response, 200);
    }

```

<a name="modify"></a>
## Metodo Modify

Consulta url `https://hotspot.fjlic.com/api/sensor/modify{#id}` te regresara un objeto tipo JSON.

> {info} Directorio  `app/Http/Controller/Api/SensorController.php`.

```php

/**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function modify(Request $request)
    {
        $input_req = $request->all();
        $validator = Validator::make($input_req, [
           'num_serie'=>'required|string|max:100',
           'passw'=>'required|string|max:100',
           'vol_1'=>'required|string|max:100',
           'vol_2'=>'required|string|max:100',
           'vol_3'=>'required|string|max:100',
           'temp_1'=>'required|string|max:100',
           'temp_2'=>'required|string|max:100',
           'temp_3'=>'required|string|max:100',
           'temp_4'=>'required|string|max:100',
           'door_1'=>'required|string|max:100',
           'door_2'=>'required|string|max:100',
           'door_3'=>'required|string|max:100',
           'door_4'=>'required|string|max:100',
           'text'=>'required|string|max:100',
        ]);

        if ($validator->fails()) {
            $response = [
                'success' => false,
                'data' => 'Validation error',
                'message' => 'Query error'
            ];
            return response()->json($response, 403);
        }

        $sensor = Sensor::where('num_serie',$input_req['num_serie'])->where('passw',$input_req['passw'])->first(); 

        if (is_null($sensor)) {
            $response = [
                'success' => false,
                'data' => 'Search error',
                'message' => 'Sensor not exist'
            ];
            return response()->json($response, 404);
        }
        
        /* Update Sensors*/ 
        $date = now();
        $timestamp = $date->getTimestamp();
        $sensor->vol_1 = $input_req['vol_1'];
        $sensor->vol_2 = $input_req['vol_2'];
        $sensor->vol_3 = $input_req['vol_3'];
        $sensor->temp_1 = $input_req['temp_1'];
        $sensor->temp_2 = $input_req['temp_2'];
        $sensor->temp_3 = $input_req['temp_3'];
        $sensor->temp_4 = $input_req['temp_4'];
        $sensor->door_1 = $input_req['door_1'];
        $sensor->door_2 = $input_req['door_2'];
        $sensor->door_3 = $input_req['door_3'];
        $sensor->door_4 = $input_req['door_4'];
        $sensor->text = $input_req['text'];
        $sensor->updated_at = $timestamp;
        $sensor->save();

        $historialsensor = new HistorialSensor(); 
        /* Historial Sensor*/
        $historialsensor->sensor_id = $sensor->id;
        $historialsensor->num_serie =  $sensor->num_serie;
        $historialsensor->passw = $sensor->passw;
        $historialsensor->vol_1 = $input_req['vol_1'];
        $historialsensor->vol_2 = $input_req['vol_2'];
        $historialsensor->vol_3 = $input_req['vol_3'];
        $historialsensor->temp_1 = $input_req['temp_1'];
        $historialsensor->temp_2 = $input_req['temp_2'];
        $historialsensor->temp_3 = $input_req['temp_3'];
        $historialsensor->temp_4 = $input_req['temp_4'];
        $historialsensor->door_1 = $input_req['door_1'];
        $historialsensor->door_2 = $input_req['door_2'];
        $historialsensor->door_3 = $input_req['door_3'];
        $historialsensor->door_4 = $input_req['door_4'];
        $historialsensor->rlay_1 = $sensor->rlay_1;
        $historialsensor->rlay_2 = $sensor->rlay_2;
        $historialsensor->rlay_3 = $sensor->rlay_3;
        $historialsensor->rlay_4 = $sensor->rlay_4;
        $historialsensor->text = $input_req['text'];
        $historialsensor->save();
        /* Send Data Response*/
        $data = $historialsensor->toArray();
        $response = [
            'success' => true,
            'data' => $data,
            'message' => 'Sensor modify successfully.'
        ];
        return response()->json($response, 200);
    }

```

<a name="index"></a>
## Metodo Index

Consulta url `https://hotspot.fjlic.com/api/erb` te regresara un objeto tipo JSON.

> {info} Directorio  `app/Http/Controller/Api/ErbController.php`.

```php

/**
     * List all Erbs.
     *
     * @return \Illuminate\Http\Response
     */
    
     public function index()
    {
       $erbs = Erb::all();
       foreach ($erbs as $key => $erb) {
        $erb->password = Crypt::decrypt($erb->password);
        }
       $data = $erbs->toArray();
       $response = [
          'success' => true,
          'data' => $data,
          'message' => 'Erb retrieved successfully.'
        ];
        return response()->json($response, 200);
    }

```

<a name="show"></a>
## Metodo Show

Consulta url `https://hotspot.fjlic.com/api/erb/{#id}` te regresara un objeto tipo JSON.

> {info} Directorio  `app/Http/Controller/Api/ErbController.php`.

```php

/**
     * Display the Erb specified resource.
     *
     * @param  int  $id or name $name_machine
     * @return \Illuminate\Http\Response
     */

    public function show($id)
    {
        $erb = Erb::where('id',$id)->first(); 
        if (is_null($erb)) {
            $response = [
                'success' => false,
                'data' => 'Empty',
                'message' => 'Erb not Exist.'
            ];
            return response()->json($response, 404);
        }
        $data = $erb->toArray();
        $response = [
            'success' => true,
            'data' => $data,
            'message' => 'Erb retrieved successfully.'
        ];
        return response()->json($response, 200);

        
    }

```

<a name="register"></a>
## Metodo Register

Consulta url `https://hotspot.fjlic.com/api/erb/register` te regresara un objeto tipo JSON.

> {info} Directorio  `app/Http/Controller/Api/ErbController.php`.

```php

**
     * Store a newly Erb created resource in storage.
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
    $data = 'Please register correctly Erb';
    if($request->get('password') == 'erb123'){
    $nick_name = (Erb::all()->count() + 1);
    $erb = new Erb();
    $erb->user_id = null;
    $erb->num_serie =  $request->get('num_serie');
    $erb->nick_name = 'erb_'.$nick_name;
    $erb->password = Crypt::encrypt($request->get('password'));
    $erb->api_token = ApiToken::GenerateToken32();
    $erb->save();
    $erb->password = Crypt::decrypt($erb->password);
    $data = $erb->toArray();
    $response = [
        'success' => true,
        'data' => $data,
        'message' => 'Erb register successfully.'
    ]; 
    return response()->json($response, 200);
    }
    else{
    $data = 'Register_Error';
    $response = [
        'success' => true,
        'data' => $data,
        'message' => 'Erb not registered.'
    ]; 
    }
    return response()->json($response, 200);
    }

```

<a name="update"></a>
## Metodo Update

Consulta url `https://hotspot.fjlic.com/api/erb/update{#id}` te regresara un objeto tipo JSON.

> {info} Directorio  `app/Http/Controller/Api/ErbController.php`.

```php

/**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Erb $erb)
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

        $erb->user_id = $input['user_id'];
        $erb->num_serie = $input['num_serie'];
        $erb->nick_name = $input['nick_name'];
        $erb->api_token = ApiToken::GenerateToken32();
        $erb->save();
        $data = $erb->toArray();
        $response = [
            'success' => true,
            'data' => $data,
            'message' => 'Erb updated successfully.'
        ];
        return response()->json($response, 200);
    }

```

<a name="modify"></a>
## Metodo Modify

Consulta url `https://hotspot.fjlic.com/erb/modify{#id}` te regresara un objeto tipo JSON.

> {info} Directorio  `app/Http/Controller/Api/ErbController.php`.

```php

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
        $erb = Erb::where('num_serie',$input['num_serie'])->first(); 
        if (is_null($erb)) {
            $response = [
                'success' => false,
                'data' => 'Empty',
                'message' => 'Erb not Exist.'
            ];
            return response()->json($response, 404);
        }
        $erb->user_id = $input['user_id'];
        $erb->num_serie = $input['num_serie'];
        $erb->nick_name = $input['nick_name'];
        $erb->nick_name = $input['password'];
        $erb->api_token = $input['api_token'];
        $erb->save();
        $data = $erb->toArray();
        $response = [
            'success' => true,
            'data' => $data,
            'message' => 'Erb updated successfully.'
        ];
        return response()->json($response, 200);
    }

```

<a name="destroy"></a>
## Metodo Destroy

Consulta url `https://hotspot.fjlic.com/api/erb/destroy{#id}` te regresara un objeto tipo JSON.

> {info} Directorio  `app/Http/Controller/Api/ErbController.php`.

```php

/**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Erb $erb)
    {
        //
        $erb->delete();
        $data = $erb->toArray();

        $response = [
            'success' => true,
            'data' => $data,
            'message' => 'Erb deleted successfully.'
        ];
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

Route::post('sensor/modify', 'Api\SensorController@modify')->name('sensor.modify');
Route::post('sensor/status', 'Api\SensorController@status')->name('sensor.status');
Route::post('erb/register', 'Api\ErbController@register')->name('erb.register');
Route::resource('erb', 'Api\ErbController');
Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

```


<larecipe-newsletter></larecipe-newsletter>