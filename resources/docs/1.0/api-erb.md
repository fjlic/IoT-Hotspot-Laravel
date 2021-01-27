# Modulo Erb-API

---

- [Erb API](#section-erb-api)
- [Controlador-API](#controller-api)
- [Index](#index)
- [Show](#show)
- [Register](#register)
- [Update](#update)
- [Modify](#modify)
- [Destroy](#destroy)
- [Ruta](#route)

<a name="section-erb-api"></a>
## Controlador, Metodos index(), register(), update(), modify(), destroy():

Estructura del modulo API Erb.. 🦊
Si gustas es posible consultar los metodos get por web.

---

- [Controlador-API](#controller-api)
- [Index](#index)
- [Index](#show)
- [Register](#register)
- [Update](#update)
- [Modify](#modify)
- [Destroy](#destroy)
- [Ruta](#route)

<a name="controller-api"></a>
## Controlador API

Comando `php artisan make:controller API/ErbController` ejecutar en consola dentro del proyecto.

> {info} Directorio  `app/Http/Controller/API/ErbController.php` respeta esta estructura en el controlador.

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

<a name="index"></a>
## Metodo Index

Consulta url `http://domain/api/erb` te regresara un objeto tipo JSON.

> {info} Directorio  `app/Http/Controller/API/ErbController.php`.

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

Consulta url `http://domain/api/erb/{#id}` te regresara un objeto tipo JSON.

> {info} Directorio  `app/Http/Controller/API/ErbController.php`.

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

Consulta url `http://domain/api/erb/register` te regresara un objeto tipo JSON.

> {info} Directorio  `app/Http/Controller/API/ErbController.php`.

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

Consulta url `http://domain/api/erb/update{#id}` te regresara un objeto tipo JSON.

> {info} Directorio  `app/Http/Controller/API/ErbController.php`.

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

Consulta url `http://domain/api/erb/modify{#id}` te regresara un objeto tipo JSON.

> {info} Directorio  `app/Http/Controller/API/ErbController.php`.

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

Consulta url `http://domain/api/erb/destroy{#id}` te regresara un objeto tipo JSON.

> {info} Directorio  `app/Http/Controller/API/ErbController.php`.

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

Route::post('erb/modify', 'API\ErbController@modify')->name('erb.modify');
Route::post('erb/register', 'API\ErbController@register')->name('erb.register');
Route::resource('erb', 'API\ErbController');

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

```