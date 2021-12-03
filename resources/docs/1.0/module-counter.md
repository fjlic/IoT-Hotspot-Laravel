# Modulo Contador

---

- [Contador CRUD](#section-counter)
- [Migracion](#migrations)
- [Seeder](#seeds)
- [Modelo](#models)
- [Controlador](#controllers)
- [RutaWeb](#routes)
- [Vista](#views)
- [Comando](#mcr)

<a name="section-counter"></a>
## Migracion, Sedder, Modelo, Controlador y Vista

Estructura del modulo Counter.. 💰
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

Comando `php artisan make:migration counter` ejecutar en consola dentro del proyecto.

> {info} Directorio  `database/migrations/2014_10_12_000000_create_counters_table.php`.

```php

class CreateCountersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('counters', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('crd_id')->nullable();
            $table->unsignedBigInteger('erb_id')->nullable();
            $table->unsignedBigInteger('nfc_id')->nullable();
            $table->string('num_serie')->nullable();
            $table->string('cont_qr')->nullable();
            $table->string('cont_mon')->nullable();
            $table->string('cont_mon_2')->nullable();
            $table->string('cont_corte')->nullable();
            $table->string('cont_prem')->nullable();
            $table->string('cost_mon')->nullable();
            $table->string('ssid')->nullable();
            $table->string('passwd')->nullable();
            $table->string('ip_server')->nullable();
            $table->string('port')->nullable();
            $table->string('token')->nullable();
            $table->integer('type')->nullable();
            $table->string('text')->nullable();
            $table->timestamps();
            $table->foreign('crd_id')->references('id')->on('crds')->onUpdate('cascade')->onDelete('cascade')->nullable();
            $table->foreign('erb_id')->references('id')->on('erbs')->onUpdate('cascade')->onDelete('cascade')->nullable();
            $table->foreign('nfc_id')->references('id')->on('nfcs')->onUpdate('cascade')->onDelete('cascade')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('counters');
    }
}

```

<a name="seeds"></a>
## Seeder

Comando `php artisan make:seeder AddCounterTableSeeder` ejecutar en consola dentro del proyecto.

> {info} Directorio  `database/seeders/AddCounterTableSeeder.php`.

```php

class AddCounterTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $counter = new Counter();
        $counter->id = 1;
        $counter->crd_id = 1;
        $counter->erb_id = 1;
        $counter->nfc_id = 1;
        $counter->num_serie = '70000000001';
        $counter->cont_qr = '0';
        $counter->cont_mon = '0';
        $counter->cont_mon_2 = '0';
        $counter->cont_corte = '0';
        $counter->cont_prem = '0';
        $counter->cost_mon = '5';
        $counter->ssid = 'GalexIOT';
        $counter->passwd = 'G4l3x#1537';
        $counter->ip_server = '74.208.92.167';
        $counter->port = '443';
        $counter->token = ApiToken::GenerateToken16();
        $counter->type = 0;
        $counter->text = 'Prueba Contador 1 Ok';
        $counter->save();
    }
}

```

<a name="models"></a>
## Modelo

Comando `php artisan make:model Counter` ejecutar en consola dentro del proyecto.

> {info} Directorio  `app/Counter.php`.

```php

class Counter extends Model
{
    //
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id', 'crd_id', 'erb_id', 'nfc_id', 'num_serie', 'cont_qr', 'cont_mon',  'cont_corte',  'cont_prem',
        'ssid',  'passwd',  'ip_server',  'port',  'token', 'type', 'text', 
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
     * Get the hostpot for the blog crd.
     */
    public function historialcounter()
    {
        return $this->hasMany('App\HistorialCounter','counter_id');
    }

    /**
     * Get the user record associated with the hostpot.
     */
    public function erb()
    {
        return $this->belongsTo('App\Erb', 'id');
    }

    /**
     * Get the user record associated with the hostpot.
     */
    public function crd()
    {
        return $this->belongsTo('App\Crd', 'id');
    }

    /**
     * Get the user record associated with the hostpot.
     */
    public function nfc()
    {
        return $this->belongsTo('App\Nfc', 'id');
    }
}

```

<a name="controllers"></a>
## Controlador

Comando `php artisan make:controller Counter` ejecutar en consola dentro del proyecto.

> {info} Directorio  `app/Http/Controllers/CounterController.php`.

```php

class CounterController extends Controller
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
        $counters = Counter::all();
        return view('module.counter.index',compact('counters'));
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
        $crds = Crd::all();
        $nfcs = Nfc::all();
        return view('module.counter.create',compact('erbs', 'crds', 'nfcs'));
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
            'crd_id'=>'required|string|max:100',
            'erb_id'=>'required|string|max:100',
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
            'text'=>'required|string|max:100',
        ]);
        $counter = new Counter([
            'crd_id' => $request->get('crd_id'),
            'erb_id' => $request->get('erb_id'),
            'nfc_id' => $request->get('erb_id'),
            'num_serie' => $request->get('num_serie'),
            'cont_qr' => $request->get('cont_qr'),
            'cont_mon' => $request->get('cont_mon'),
            'cont_mon_2' => $request->get('cont_mon_2'),
            'cont_corte' => $request->get('cont_corte'),
            'cont_prem' => $request->get('cont_prem'),
            'cost_mon' => $request->get('cost_mon'),
            'ssid' => $request->get('ssid'),
            'passwd' => $request->get('passwd'),
            'ip_server' => $request->get('ip_server'),
            'port' => $request->get('port'),
            'text' => $request->get('text'),
            'token' => ApiToken::GenerateToken16()
            ]);
        $counter->save();
        //return redirect(/counter)->with('success','Contador generado satisfactoriamente');
        toastr()->success('Contador creado');
        return redirect()->route('counter.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Counter  $counter
     * @return \Illuminate\Http\Response
     */
    public function show(Counter $counter)
    {
        //
        return view('module.counter.show', compact('counter'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Counter  $counter
     * @return \Illuminate\Http\Response
     */
    public function edit(Counter $counter)
    {
        //
        $crds = Crd::all();
        $erbs = Erb::all();
        $nfcs = Nfc::all();
        return view('module.counter.edit',compact('counter','crds','erbs','nfcs'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Counter  $counter
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Counter $counter)
    {
        //
        $request->validate([
            'crd_id'=>'required|string|max:100',
            'erb_id'=>'required|string|max:100',
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
            'text'=>'required|string|max:100',
        ]);
        $counter_request = $request->all();
        $counter->update($counter_request);
        toastr()->warning('Contador actualizado');
        return redirect()->route('counter.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Counter  $counter
     * @return \Illuminate\Http\Response
     */
    public function destroy(Counter $counter)
    {
        //
        $counter->delete();
        toastr()->error('Contador eliminado');
        return redirect()->route('counter.index');
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
Route::resource('counter', 'CounterController')->middleware('auth');
Auth::routes();

```

<a name="views"></a>
## Vista

No se cuenta con comando pero crea un archivos index para modulo de counter `index.blade.php` y pega este codigo.

> {info} Directorio  `resources/views/module/counter/index.blade.php`.

```php

<!-- Main content -->
 <section class="content">
      <div class="row">
        <div class="col-12">
          <div class="card card-primary card-outline">
            <div class="card-header">
              <h3 class="card-title">Tabla Contadores</h3>
              <a class="btn btn-xs btn-success float-right" href="{{ route('counter.create') }}" role="button"><span class="fas fa-plus"></span></a>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="counterTable" class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>Num Serie</th>
                  <th>Cont Qr</th>
                  <th>Cont Mon</th>
                  <th>Cont Mon2</th>
                  <th>Cont Corte</th>
                  <th>Cont Prem</th>
                  <th>Cost Mon</th>
                  <th>FechaMod</th>
                  <th>Tipo</th>
                  <th>Acciones</th>
                </tr>
                </thead>
                <tbody>
                @foreach($counters as $counter)
                <tr>
                    <td>{{ $counter->num_serie }}</td>
                    <td>{{ $counter->cont_qr }}</td>
                    <td>{{ $counter->cont_mon }}</td>
                    <td>{{ $counter->cont_mon_2 }}</td>
                    <td>{{ $counter->cont_corte }}</td>
                    <td>{{ $counter->cont_prem }}</td>
                    <td>{{ $counter->cost_mon }}</td>
                    <td>{{ $counter->updated_at }}</td>
                    <td>{{ $counter->type }}</td>
                    <td>
                      <form role="form" action="{{ route('counter.destroy',$counter->id) }}" method="POST">
                      <a class="btn btn-info btn-xs" href="{{ route('counter.show',$counter->id) }}" role="button"><span class="fas fa-eye"></span></a> 
                      <a class="btn btn-warning btn-xs"  href="{{ route('counter.edit',$counter->id) }}" role="button"><span class="fas fa-pen"></span></a>
                      @csrf
                      @method('DELETE')
                      <a href="" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#exampleModalCenter{{$counter->id}}"><span class="fas fa-trash"></span></a>
                      <!------ Modal 1 ------>
                      <div class="modal fade" id="exampleModalCenter{{$counter->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                      <div class="modal-dialog modal-dialog-centered" role="document">
                      <div class="modal-content">
                      <div class="modal-header d-flex justify-content-center">
                        <h5 class="modal-title" id="exampleModalCenterTitle">Ten cuidado con esta acción</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                          <div class="modal-body" style="text-align: center">
                            <a><img src="{{ asset('storage/Images/Warning.JPG') }}" alt="" title=""  text-align="center" /></a>
                           </div>
                           <br>
                          <p class="text-center">Eliminarás ( <b>{{$counter->num_serie}}</b> ) seguro</p>
                      </div>
                      <div class="modal-footer d-flex justify-content-center">
                            <button type="button" class="btn btn-info" data-dismiss="modal">Cancelar</button>
                            <input type="submit" class="btn btn-danger" value="Eliminar">
                      </div>
                      </div>
                      </div>
                      </div>
                    <!--fin modal--> 
                      </form>
                    </td>
                </tr>
                @endforeach
                </tbody>
               <!-- <tfoot>
                 <tr>
                 <th>Id</th>
                  <th>Crd_Id</th>
                  <th>counter_id</th>
                  <th>Nfc_id</th>
                  <th>NumSerie</th>
                  <th>Contqr</th>
                  <th>Contmon</th>
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

```

<a name="mcr"></a>
## Comando para crear Migracion, Modelo, Controlador + Seeder

Tu puedes crear los archivos de forma automatica y sin tanta complejidad.

☝️ En un solo comando crearas migracion, modelo, controlador con recursos.

```php
   php artisan make:model Counter -mcr

```

✌️ Comando para crear Seeder.

```php
   php artisan make:seeder AddCounterTableSeeder

```
