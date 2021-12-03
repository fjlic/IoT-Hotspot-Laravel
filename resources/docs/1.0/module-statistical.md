# Modulo Estadistico

---

- [Estadistico CRUD](#section-statistical)
- [Migracion](#migrations)
- [Seeder](#seeds)
- [Modelo](#models)
- [Controlador](#controllers)
- [RutaWeb](#routes)
- [Vista](#views)
- [Comando](#mcr)

<a name="section-statistical"></a>
## Migracion, Sedder, Modelo, Controlador y Vista

Estructura del modulo Estadistico.. 🦊
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

Comando `php artisan make:migration Statistical` ejecutar en consola dentro del proyecto.

> {info} Directorio  `database/migrations/2014_10_12_000000_create_statisticals_table.php`.

```php

class CreateStatisticalsTable extends Migration
{
    /**
     * Run the migrations.
     * Part Name : MTN
     * * Part Size : 14.4
     * @return void
     */
    public function up()
    {
        Schema::create('statisticals', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('sensor_id')->nullable();
            $table->string('elements')->nullable();
            $table->string('start_time')->nullable();
            $table->string('finish_time')->nullable();
            $table->string('total_time')->nullable();
            $table->string('difer_time')->nullable();
            $table->json('sample')->nullable();
            $table->integer('stat')->default('0');
            $table->foreign('sensor_id')->references('id')->on('sensors')->onUpdate('cascade')->onDelete('cascade')->nullable();
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
        Schema::dropIfExists('statisticals');
    }
}

```

<a name="seeds"></a>
## Seeder

Comando `php artisan make:seeder AddStatisticalTableSeeder` ejecutar en consola dentro del proyecto.

> {info} Directorio  `database/seeders/AddStatisticalTableSeeder.php`.

```php

class AddStatisticalTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *  Part Name : SED
     * * Part Size : 5.1
     * @return void
     */
    public function run()
    {
        //
        $inc = 1;
        $process_chunk = 10;
        $value_sample = 144;
        $adjust_value = $value_sample+1;
        $time_schedule = 600;
        $time_lag = 86400;
        $sensors = Sensor::all();
        $id_continued = Statistical::all();
        if($id_continued->isNotEmpty())
        {
            $id_tmp = $id_continued->last();
            $inc = $id_tmp->id + 1;
        }
        foreach ($sensors as $key1 => $sensor) {
            for ($i=1; $i <= $process_chunk; $i++) {//16 
                $data_his = HistorialSensor::where('sensor_id', $sensor->id)
                ->where('stat', 0)
                //->latest()
                ->take($adjust_value)->get();
                if ($data_his->count()==$adjust_value) 
                {
                    $statistical = new Statistical();
                    $statistical->id = $inc++;
                    $temp_start = $data_his->first();
                    $statistical->sensor_id = $temp_start->sensor_id;
                    $statistical->start_time = $temp_start->created_at;
                    $tmp_sample = [[]];
                    foreach ($data_his as $key2 => $data) 
                    {
                        if($key2<$value_sample)
                        {
                          $id_key2 = $key2;
                          $id_key2++;
                          $data->stat = 1;
                          $data->save();
                          $tmp_sample[$key2]["id"]=$id_key2;
                          $tmp_temp1 = new \Carbon\Carbon($data->created_at);
                          $tmp_temp2 = new \Carbon\Carbon($data_his[$key2+1]->created_at);
                          $tmp_pass=$tmp_temp1->diffInSeconds($tmp_temp2);
                          $tmp_difer=($tmp_pass-$time_schedule);
                          $tmp_sample[$key2]["sched_time"]=$time_schedule;
                          $tmp_sample[$key2]["start_time"]=$tmp_temp1->format('Y-m-d H:i:s');
                          $tmp_sample[$key2]["end_time"]=$tmp_temp2->format('Y-m-d H:i:s');
                          $tmp_sample[$key2]["pass_time"]=$tmp_pass;
                          $tmp_sample[$key2]["difer_time"]=$tmp_difer;   
                        }
                        
                    }
                    $statistical->elements = $value_sample;
                    $statistical->sample =  json_encode($tmp_sample);
                    $temp_finish = $data_his->last();
                    $statistical->finish_time = $temp_finish->created_at;
                    //convertimos la fecha 1 a objeto Carbon
                    $carbon1 = new \Carbon\Carbon($temp_start->created_at);
                    //convertimos la fecha 2 a objeto Carbon
                    $carbon2 = new \Carbon\Carbon($temp_finish->created_at);
                    //de esta manera sacamos la diferencia en minutos
                    $secondsDiff=$carbon1->diffInSeconds($carbon2);
                    $statistical->total_time = $secondsDiff;
                    $statistical->difer_time = ($secondsDiff-$time_lag);
                    $statistical->save();
                }   
            }
        }
    }
}

```

<a name="models"></a>
## Modelo

Comando `php artisan make:model Statistical` ejecutar en consola dentro del proyecto.

> {info} Directorio  `app/Statistical.php`.

```php

class Statistical extends Model
{
    //
    /**
     * The attributes that are mass assignable.
     * Part Name : MDL
     * * Part Size : 15.1
     * @var array
     */
    protected $fillable = [
        'id', 'sensor_id', 'elements', 'start_time', 'finish_time', 'total_time', 'difer_time', 'sample',
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

}

```

<a name="controllers"></a>
## Controlador

Comando `php artisan make:controller Statistical` ejecutar en consola dentro del proyecto.

> {info} Directorio  `app/Http/Controllers/StatisticalController.php`.

```php

class StatisticalController extends Controller
{
    /**
     * Create a new controller instance.
     * Part Name : CNT
     * * Part Size : 15.1
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
        $statisticals = Statistical::all();
        foreach ($statisticals as $key1 => $statistical) {
            $x = [];
            $y = []; 
           foreach (json_decode($statistical->sample) as $key2 => $json) {
            $x[$key2] = $key2;
            $y[$key2] = $json->pass_time;
           }
           $statistical->pearsoncorrelation = Correlation::pearson($x, $y);
           $statistical->meanarithmetic = Mean::arithmetic([reset($y), end($y)]);
           $statistical->meanmedian = Mean::median($y);
           $statistical->meanmode = Mean::mode($y);
           sort($y);
           $statistical->standartdesviation = StandardDeviation::population($y);
        }
        return view('module.statistical.index',compact('statisticals'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('module.statistical.create');
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
            'elements'=>'required|string|max:100',
            'start_time'=>'required|string|max:100',
            'finish_time'=>'required|string|max:100',
            'total_time'=>'required|string|max:100',
            'difer_time'=>'required|string|max:100',
            'sample'=>'required|string',
        ]);
        $statistical = new Statistical([
            'elements' => $request->get('elements'),
            'start_time' => $request->get('start_time'),
            'finish_time' => $request->get('finish_time'),
            'total_time' => $request->get('total_time'),
            'difer_time' => $request->get('difer_time'),
            'sample' => $request->get('sample')
            ]);
        $statistical->save();
        //return redirect(/statistical)->with('success','Prueba probabilistica creada');
        toastr()->success('Muestra probabilistica creada');
        return redirect()->route('statistical.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Statistical  $statistical
     * @return \Illuminate\Http\Response
     */
    public function show(Statistical $statistical)
    {
        //
        return view('module.statistical.show', compact('statistical'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Statistical  $statistical
     * @return \Illuminate\Http\Response
     */
    public function edit(Statistical $statistical)
    {
        //
        return view('module.statistical.edit',compact('statistical'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Statistical  $statistical
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Statistical $statistical)
    {
        //
        $request->validate([
            'elements'=>'required|string|max:100',
            'start_time'=>'required|string|max:100',
            'finish_time'=>'required|string|max:100',
            'total_time'=>'required|string|max:100',
            'difer_time'=>'required|string|max:100',
            'sample'=>'required|string',
        ]);
        $statistical_request = $request->all();
        $statistical->update($statistical_request);
        toastr()->warning('Prueba actualizada');
        return redirect()->route('statistical.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Statistical  $statistical
     * @return \Illuminate\Http\Response
     */
    public function destroy(Statistical $statistical)
    {
        //
        $statistical->delete();
        //return reditec('/statistical'->with('success','Estadistico eliminado'));
        toastr()->error('Estadistico eliminado');
        return redirect()->route('statistical.index');
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
Route::resource('statistical', 'StatisticalController')->middleware('auth');
Auth::routes();

```

<a name="views"></a>
## Vista

No se cuenta con comando pero crea un archivos index para modulo de erb `index.blade.php` y pega este codigo.

> {info} Directorio  `resources/views/module/statistical/index.blade.php`.

```php

<!-- Main content Part Name : VST -->
 <!-- Part Size : 23.3 -->
 <section class="content">
  <div class="row">
    <div class="col-12">
      <div class="card card-primary card-outline">
        <div class="card-header">
          <h3 class="card-title">Resultados Estadisticos</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
          <table id="statisticalTable2" class="table table-bordered table-striped">
          <thead>
            <tr>
              <th>Id Muestra</th>
              <th>Correlacion</th>
              <th>Media Aritmetica</th>
              <th>Mediana</th>
              <th>Moda</th>
              <th>Deviacion Estandar</th>
            </tr>
            </thead>
            <tbody>
            @foreach($statisticals as $statistical)
            <tr>
                <td>{{ $statistical->id }}</td>
                <td>{{ $statistical->pearsoncorrelation }}</td>
                <td>{{ $statistical->meanarithmetic }}</td>
                <td>{{ $statistical->meanmedian }}</td>
                <td>{{ $statistical->meanmode }}</td>
                <td>{{ $statistical->standartdesviation }}</td>
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
   php artisan make:model Statistical -mcr

```

✌️ Comando para crear Seeder.

```php
   php artisan make:seeder AddStatisticalTableSeeder

```

