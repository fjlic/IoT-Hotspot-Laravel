# Modulo Crd-API

---

- [Crd API](#section-crd-api)
- [Controlador-API](#controller-api)
- [Index](#index)
- [Show](#show)
- [Register](#register)
- [Update](#update)
- [Modify](#modify)
- [Destroy](#destroy)
- [Ruta](#route)

<a name="section-crd-api"></a>
## Controlador, Metodos index(), register(), update(), modify(), destroy():

Estructura del modulo API Crd.. 🚥
Si gustas es posible consultar los metodos get por web.

---

- [Controlador-API](#controller-api)
- [Index](#index)
- [Show](#show)
- [Register](#register)
- [Update](#update)
- [Modify](#modify)
- [Destroy](#destroy)
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

<a name="show"></a>
## Metodo Show

Consulta url `https://hotspot.fjlic.com/api/crd/{#id}` te regresara un objeto tipo JSON.

> {info} Directorio  `app/Http/Controller/Api/CrdController.php`.

```php

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

```

<a name="update"></a>
## Metodo Update

Consulta url `https://hotspot.fjlic.com/api/crd/update{#id}` te regresara un objeto tipo JSON.

> {info} Directorio  `app/Http/Controller/Api/CrdController.php`.

```php

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

```

<a name="modify"></a>
## Metodo Modify

Consulta url `https://hotspot.fjlic.com/api/crd/modify{#id}` te regresara un objeto tipo JSON.

> {info} Directorio  `app/Http/Controller/Api/CrdController.php`.

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

```

<a name="destroy"></a>
## Metodo Destroy

Consulta url `https://hotspot.fjlic.com/api/crd/destroy{#id}` te regresara un objeto tipo JSON.

> {info} Directorio  `app/Http/Controller/Api/CrdController.php`.

```php

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

Route::post('crd/modify', 'Api\CrdController@modify')->name('crd.modify');
Route::post('crd/register', 'Api\CrdController@register')->name('crd.register');
Route::resource('crd', 'Api\CrdController');
Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

```


<larecipe-newsletter></larecipe-newsletter>