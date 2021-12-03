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
Si gustas es posible crear la estructura MVC de forma manual.

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
        'id', 'erb_id', 'num_serie', 'passw', 'vol_1', 'vol_2', 'vol_3', 'temp_1', 'temp_2', 'temp_3', 'temp_4',
        'door_1', 'door_2', 'door_3', 'door_4', 'rlay_1', 'rlay_2', 'rlay_3', 'rlay_4', 'text',
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
        $request->validate([
            'erb_id'=>'required|string|max:100',
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
            'rlay_1'=>'required|string|max:100',
            'rlay_2'=>'required|string|max:100',
            'rlay_3'=>'required|string|max:100',
            'rlay_4'=>'required|string|max:100',
            'text'=>'required|string|max:100',
        ]);
        $sensor = new Sensor([
            'erb_id' => $request->get('erb_id'),
            'num_serie' => $request->get('num_serie'),
            'passw' => $request->get('passw'),
            'vol_1' => $request->get('vol_1'),
            'vol_2' => $request->get('vol_2'),
            'vol_3' => $request->get('vol_3'),
            'temp_1' => $request->get('temp_1'),
            'temp_2' => $request->get('temp_2'),
            'temp_3' => $request->get('temp_3'),
            'temp_4' => $request->get('temp_4'),
            'door_1' => $request->get('door_1'),
            'door_2' => $request->get('door_2'),
            'door_3' => $request->get('door_3'),
            'door_4' => $request->get('door_4'),
            'rlay_1' => $request->get('rlay_1'),
            'rlay_2' => $request->get('rlay_2'),
            'rlay_3' => $request->get('rlay_3'),
            'rlay_4' => $request->get('rlay_4'),
            'text' => $request->get('text')
            ]);   
        $sensor->save();
        //return redirect(/sensor)->with('success','Sensor Generado Satisfactoriamente');
        toastr()->success('Sensor creado');
        return redirect()->route('sensor.index');
    }
    
    public function show(Sensor $sensor)
    {
        //
        return view('module.sensor.show', compact('sensor'));
    }
    
    public function edit(Sensor $sensor)
    {
        //
        $erbs = Erb::all();
        return view('module.sensor.edit',compact('sensor','erbs'));
    }
    
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
            'temp_1'=>'required|string|max:100',
            'temp_2'=>'required|string|max:100',
            'temp_3'=>'required|string|max:100',
            'temp_4'=>'required|string|max:100',
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
    
    public function destroy(Sensor $sensor)
    {
        //
        $sensor->delete();
        //return reditec('/sensor'->with('success','Sensor Eliminado Satisfactoriamente'));
        toastr()->error('Sensor eliminado');
        return redirect()->route('sensor.index');
    }
    
    public function chart($id)
    {
        //
        $sensor = Sensor::find($id);
        $back1[0][0]= "0";
        $back1[0][1]= "#FFF"; 
        $back1[1][0]= "1";
        $back1[1][1]= "#333"; 
        $back2[0][0]= "0";
        $back2[0][1]= "#333";
        $back2[1][0]= "1";
        $back2[1][1]= "#FFF"; 
        $temp1 = \Chart::title(['text' => 'Temperature 1',])->display();                       
        //return view('module.sensor.chart', ['vol1' => $vol1,]);
        return view('module.sensor.chart')->with('temp1',$temp1)->with('sensor',$sensor);
    }
}

```

<a name="routes"></a>
## Ruta Web

No cuenta con comando artisan para esto dispones ya de un archivo de rutas web.

> {info} Directorio  `routes/web.php` agregar dentro del archivo.

```php

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();
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
                  <th>Id_Erb</th>
                  <th>SerNum</th>
                  <th>Temp1</th>
                  <th>Temp2</th>
                  <th>Volt1</th>
                  <th>Volt2</th>
                  <th>Door1</th>
                  <th>Door2</th>
                  <th>Act1</th>
                  <th>Act2</th>
                  <th>Text</th>
                  <th>DateMod</th> 
                  <th>Acciones</th>
                </tr>
                </thead>
                <tbody>
                @foreach($sensors as $sensor)
                <tr>
                    <td>{{ $sensor->erb_id }}</td>
                    <td>{{ $sensor->num_serie }}</td>
                    <td>{{ $sensor->temp_1 }}</td>
                    <td>{{ $sensor->temp_2 }}</td>
                    @if($sensor->vol_1 == 'On')
                    <td><span class="badge badge-success">On-<div class="fa fa-toggle-on"></div></span></td>
                    @elseif($sensor->vol_1 == 'Off')
                    <td><span class="badge badge-danger">Off-<div class="fa fa-toggle-off"></div></span></td>
                    @endif
                    @if($sensor->vol_2 == 'On')
                    <td><span class="badge badge-success">On-<div class="fa fa-toggle-on"></div></span></td>
                    @elseif($sensor->vol_2 == 'Off')
                    <td><span class="badge badge-danger">Off-<div class="fa fa-toggle-off"></div></span></td>
                    @endif
                    @if($sensor->door_1 == 'On')
                    <td><span class="badge badge-primary">Close-<div class="fa fa-check-circle"></div></span></td>
                    @elseif($sensor->door_1 == 'Off')
                    <td><span class="badge badge-warning">Open-<div class="fa fa-exclamation-circle"></div></span></td>
                    @endif
                    @if($sensor->door_2 == 'On')
                    <td><span class="badge badge-primary">Close-<div class="fa fa-check-circle"></div></span></td>
                    @elseif($sensor->door_2 == 'Off')
                    <td><span class="badge badge-warning">Open-<div class="fa fa-exclamation-circle"></div></span></td>
                    @endif
                    @if($sensor->rlay_1 == 'On')
                    <td><span class="badge badge-success">On-<div class="fa fa-toggle-on"></div></span></td>
                    @elseif($sensor->rlay_1 == 'Off')
                    <td><span class="badge badge-danger">Off-<div class="fa fa-toggle-off"></div></span></td>
                    @endif
                    @if($sensor->rlay_2 == 'On')
                    <td><span class="badge badge-success">On-<div class="fa fa-toggle-on"></div></span></td>
                    @elseif($sensor->rlay_2 == 'Off')
                    <td><span class="badge badge-danger">Off-<div class="fa fa-toggle-off"></div></span></td>
                    @endif
                    <td>{{ $sensor->text }}</td>
                   <td>{{ $sensor->updated_at }}</td>
                </tr>
                @endforeach
                </tbody>
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

```

<a name="mcr"></a>
## Comando para crear Migracion, Modelo, Controlador + Seeder

Tu puedes crear los archivos de forma automatica y sin tanta complejidad.

☝️ En un solo comando crearas migracion, modelo, controlador con recursos.

```php
   php artisan make:model Sensor -mcr

```

✌️ Comando para crear Seeder.

```php
   php artisan make:seeder AddSensorTableSeeder

```

