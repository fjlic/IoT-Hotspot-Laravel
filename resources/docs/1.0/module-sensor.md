# Modulo Sensor

---

- [Sensor CRUD](#section-sensor)
- [Migracion](#migrations)
- [Seeder](#seeds)
- [Modelo](#models)
- [Controlador](#controllers)
- [RutaWeb](#routes)
- [Vista](#views)
- [Comando](#mcr)

<a name="section-sensor"></a>
## Migracion, Sedder, Modelo, Controlador y Vista

Estructura del modulo Sensor.. 🦊
Si gustas es posible crear la estructura MCV de forma manual.

---

- [Migracion](#migrations)
- [Seeder](#seeds)
- [Modelo](#models)
- [Controlador](#controllers)
- [RutaWeb](#routes)
- [Vista](#views)
- [Comando MCR](#mcr)

<a name="migrations"></a>
## Migracion

Comando `php artisan make:migration Sensor` ejecutar en consola dentro del proyecto.

> {info} Directorio  `database/migrations/2014_10_12_000000_create_sensors_table.php`.

```php

class CreateSensorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sensors', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('erb_id')->default(0)->nullable();
            $table->string('num_serie')->unique()->nullable();
            $table->string('passw')->nullable();
            $table->string('vol_1')->nullable();
            $table->string('vol_2')->nullable();
            $table->string('vol_3')->nullable();
            $table->string('door_1')->nullable();
            $table->string('door_2')->nullable();
            $table->string('door_3')->nullable();
            $table->string('door_4')->nullable();
            $table->string('rlay_1')->nullable();
            $table->string('rlay_2')->nullable();
            $table->string('rlay_3')->nullable();
            $table->string('rlay_4')->nullable();
            $table->string('text')->nullable();
            $table->foreign('erb_id')->references('id')->on('erbs')->onUpdate('cascade')->onDelete('cascade')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sensors');
    }
}


```

<a name="seeds"></a>
## Seeder

Comando `php artisan make:seeder AddSensorTableSeeder` ejecutar en consola dentro del proyecto.

> {info} Directorio  `database/seeders/AddSensorTableSeeder.php`.

```php

class AddSensorTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Sensor Example #1
        $sensor = new Sensor();
        $sensor->id = 1;
        $sensor->erb_id = null;
        $sensor->num_serie = 1000000001;
        $sensor->passw = 'sensor@321';
        $sensor->vol_1 = '3.5';
        $sensor->vol_2 = '2.1';
        $sensor->vol_3 = '2.6';
        $sensor->door_1 = 'On';
        $sensor->door_2 = 'Off';
        $sensor->door_3 = 'On';
        $sensor->door_4 = 'On';
        $sensor->rlay_1 = 'On';
        $sensor->rlay_2 = 'Off';
        $sensor->rlay_3 = 'On';
        $sensor->rlay_4 = 'Off';
        $sensor->text = 'sensor demo';
        $sensor->save();

    }
}

```

<a name="models"></a>
## Modelo

Comando `php artisan make:model Sensor` ejecutar en consola dentro del proyecto.

> {info} Directorio  `app/Sensor.php`.

```php

class Sensor extends Model
{
    //
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id', 'erb_id', 'num_serie', 'passw', 'vol_1', 'vol_1', 'vol_2', 'vol_3',
        'door_1', 'door_2', 'door_3', 'door_4', 'rlay_1', 'rlay_2', 'rlay_3', 'rlay_4', 'text',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
    ];

    /**
     * Get the user record associated with the hostpot.
     */
    public function erb()
    {
        return $this->belongsToMany('App\Erb', 'id');
    }

    /**
     * Get the hostpot for the blog crd.
     */
    public function historialsensor()
    {
        return $this->hasMany('App\HistorialSensor','sensor_id');
    }
}

```

<a name="controllers"></a>
## Controlador

Comando `php artisan make:controller Sensor` ejecutar en consola dentro del proyecto.

> {info} Directorio  `app/Http/Controllers/SensorController.php`.

```php

class SensorController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function chart($id)
    {
        //
        $sensor = Sensor::find($id);
        //dd($sensors);
        //dd($sensors->vol_1*1);
        $back1[0][0]= "0";
        $back1[0][1]= "#FFF"; 
        $back1[1][0]= "1";
        $back1[1][1]= "#333"; 
        $back2[0][0]= "0";
        $back2[0][1]= "#333";
        $back2[1][0]= "1";
        $back2[1][1]= "#FFF"; 
        $vol1 = \Chart::title(['text' => 'Voltaje(1)',])->display();
                       
    //return view('module.sensor.chart', ['vol1' => $vol1,]);
    return view('module.sensor.chart')->with('vol1',$vol1)
                                          ->with('vol2',$vol2)
                                          ->with('vol3',$vol3)
                                          ->with('sensor',$sensor);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $sensors = Sensor::all();
        //return view('module.sensor.index')->with('sensors',$sensors);
        return view('module.sensor.index',compact('sensors'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $erbs = Erb::all();
        return view('module.sensor.create',compact('erbs'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $sensor->save();
        //return redirect(/sensor)->with('success','Sensor Generado Satisfactoriamente');
        toastr()->success('Sensor creado');
        return redirect()->route('sensor.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Sensor  $sensor
     * @return \Illuminate\Http\Response
     */
    public function show(Sensor $sensor)
    {
        //
        return view('module.sensor.show', compact('sensor'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Sensor  $sensor
     * @return \Illuminate\Http\Response
     */
    public function edit(Sensor $sensor)
    {
        //
        $erbs = Erb::all();
        return view('module.sensor.edit',compact('sensor','erbs'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Sensor  $sensor
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Sensor $sensor)
    {
        //
        $request->validate([
            'erb_id'=>'required|string|max:100',
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
        $sensor_request = $request->all();
        $sensor->update($sensor_request);
        toastr()->warning('Sensor actualizado');
        return redirect()->route('sensor.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Sensor  $sensor
     * @return \Illuminate\Http\Response
     */
    public function destroy(Sensor $sensor)
    {
        //
        $sensor->delete();
        //return reditec('/sensor'->with('success','Sensor Eliminado Satisfactoriamente'));
        toastr()->error('Sensor eliminado');
        return redirect()->route('sensor.index');
    }
}

```

<a name="routes"></a>
## Ruta Web

No cuenta con comando artisan para esto dispones ya de un archivo de rutas web.

> {info} Directorio  `routes/web.php` agregar dentro del archivo.

```php
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home')->middleware('auth');
Route::get('sensor/chart/{id}', 'SensorController@chart')->name('sensor.chart')->middleware('auth');
Route::resource('sensor', 'SensorController')->middleware('auth');
Auth::routes();
```

<a name="views"></a>
## Vista

No se cuenta con comando pero crea un archivos index para modulo de sensor `index.blade.php` y pega este codigo.

> {info} Directorio  `resources/views/module/sensor/index.blade.php`.

```php
<!-- Main content -->
 <section class="content">
      <div class="row">
        <div class="col-12">
            <div class="card card-primary card-outline">
            <div class="card-header">
              <h3 class="card-title">Tabla de Sensores</h3>
              <a class="btn btn-xs btn-success float-right" href="{{ route('sensor.create') }}" role="button"><span class="fa fa-plus"></span></a>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="sensorTable" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Id</th>
                  <th>Id_Erb</th>
                  <th>NumSer</th>
                  <th>Passw</th>
                  <th>Vol1</th>
                  <th>Vol2</th>
                  <th>Vol3</th>
                  <th>Prt1</th>
                  <th>Prt2</th>
                  <th>Prt3</th>
                  <th>Prt4</th>
                  <th>Rly1</th>
                  <th>Rly2</th>
                  <th>Rly3</th>
                  <th>Rly4</th>
                  <th>Text</th>
                  <th>FechaCreacion</th>
                  <th>FechaMoficiacion</th>
                  <th>Acciones</th>
                </tr>
                </thead>
                <tbody>
                @foreach($sensors as $sensor)
                <tr>
                    <td>{{ $sensor->id }}</td>
                    <td>{{ $sensor->erb_id }}</td>
                    <td>{{ $sensor->num_serie }}</td>
                    <td>{{ $sensor->passw }}</td>
                    <td>{{ $sensor->vol_1 }}</td>
                    <td>{{ $sensor->vol_2 }}</td>
                    <td>{{ $sensor->vol_3 }}</td>
                    <td>{{ $sensor->text }}</td>
                    <td>{{ $sensor->created_at }}</td>
                    <td>{{ $sensor->updated_at }}</td>
                    <td>
                      <form role="form" action="{{ route('sensor.destroy',$sensor->id) }}" method="POST">
                        <a class="btn btn-primary btn-xs" href="{{ route('sensor.chart',$sensor->id) }}" role="button"><span class="fa fa-chart-pie"></span></a>   
                      <a class="btn btn-info btn-xs" href="{{ route('sensor.show',$sensor->id) }}" role="button"><span class="fa fa-eye"></span></a> 
                      <a class="btn btn-warning btn-xs"  href="{{ route('sensor.edit',$sensor->id) }}" role="button"><span class="fa fa-pen"></span></a>
                      @csrf
                      @method('DELETE')
                      <button class="btn btn-danger btn-xs" type="submit"><span class="fa fa-trash"></span></button>
                      </form>
                    </td>
                </tr>
                @endforeach
                </tbody>
               <!-- <tfoot>
                <tr>
                  <th>Id</th>
                  <th>Id_Erb</th>
                  <th>NumSer</th>
                  <th>Passw</th>
                  <th>Vol1</th>
                  <th>Vol2</th>
                  <th>Vol3</th>
                  <th>Prt1</th>
                  <th>Prt2</th>
                  <th>Prt3</th>
                  <th>Prt4</th>
                  <th>Rly1</th>
                  <th>Rly2</th>
                  <th>Rly3</th>
                  <th>Rly4</th>
                  <th>Text</th>
                  <th>FechaCreacion</th>
                  <th>FechaMoficiacion</th>
                  <th>Acciones</th>
                </tr>
                </tfoot>-->
              </table>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->  
    
@stop

```

<a name="mcr"></a>
## Comando para crear Migracion, Modelo, Controlador + Seeder

Tu puedes crear los archivos de forma automatica y sin tanta complejidad.

☝️ En un solo comando crearas migracion, modelo, controlador con recursos.

```php
   php artisan make:model NameModel -mcr

```

✌️ Run the install command.

```php
   php artisan make:seeder NameTableSeeder

```

