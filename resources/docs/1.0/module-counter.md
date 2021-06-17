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

Estructura del modulo Counter.. 🦊
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
        $counter->save();

        $counter = new Counter();
        $counter->id = 2;
        $counter->crd_id = 2;
        $counter->erb_id = 2;
        $counter->nfc_id = 2;
        $counter->num_serie = '70000000002';
        $counter->cont_qr = '0';
        $counter->cont_mon = '0';
        $counter->save();

        $counter = new Counter();
        $counter->id = 3;
        $counter->crd_id = 3;
        $counter->erb_id = 3;
        $counter->nfc_id = 3;
        $counter->num_serie = '70000000003';
        $counter->cont_qr = '0';
        $counter->cont_mon = '0';
        $counter->save();

        $counter = new Counter();
        $counter->id = 4;
        $counter->crd_id = 4;
        $counter->erb_id = 4;
        $counter->nfc_id = 4;
        $counter->num_serie = '70000000004';
        $counter->cont_qr = '0';
        $counter->cont_mon = '0';
        $counter->save();

        $counter = new Counter();
        $counter->id = 5;
        $counter->crd_id = 5;
        $counter->erb_id = 5;
        $counter->nfc_id = 5;
        $counter->num_serie = '70000000005';
        $counter->cont_qr = '0';
        $counter->cont_mon = '0';
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
        'id', 'crd_id', 'erb_id', 'nfc_id', 'num_serie', 'cont_qr', 'cont_mon',
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
        ]);
        $counter = new Counter([
            'crd_id' => $request->get('crd_id'),
            'erb_id' => $request->get('erb_id'),
            'nfc_id' => $request->get('erb_id'),
            'num_serie' => $request->get('num_serie'),
            'cont_qr' => $request->get('cont_qr'),
            'cont_mon' => $request->get('cont_mon')
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
Route::get('/home', 'HomeController@index')->name('home')->middleware('auth');
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
                  <th>Id</th>
                  <th>Crd Id</th>
                  <th>Erb id</th>
                  <th>Nfc id</th>
                  <th>Num Serie</th>
                  <th>Cont Qr</th>
                  <th>Cont Mon</th>
                  <th>FechaCreacion</th>
                  <th>FechaMoficiacion</th>
                  <th>Acciones</th>
                </tr>
                </thead>
                <tbody>
                @foreach($counters as $counter)
                <tr>
                    <td>{{ $counter->id }}</td>
                    <td>{{ $counter->crd_id }}</td>
                    <td>{{ $counter->erb_id }}</td>
                    <td>{{ $counter->nfc_id }}</td>
                    <td>{{ $counter->num_serie }}</td>      
                    <td>{{ $counter->cont_qr }}</td>
                    <td>{{ $counter->cont_mon }}</td>
                    <td>{{ $counter->created_at }}</td>
                    <td>{{ $counter->updated_at }}</td>
                    <td>
                      <form role="form" action="{{ route('counter.destroy',$counter->id) }}" method="POST">
                      <a class="btn btn-info btn-xs" href="{{ route('counter.show',$counter->id) }}" role="button"><span class="fas fa-eye"></span></a> 
                      <a class="btn btn-warning btn-xs"  href="{{ route('counter.edit',$counter->id) }}" role="button"><span class="fas fa-pen"></span></a>
                      @csrf
                      @method('DELETE')
                      <button class="btn btn-danger btn-xs" type="submit"><span class="fas fa-trash"></span></button>
                      </form>
                    </td>
                </tr>
                @endforeach
                </tbody>
               <!-- <tfoot>
                 <tr>
                 <th>Id</th>
                  <th>Crd_Id</th>
                  <th>Erb_id</th>
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
@stop

```

<a name="mcr"></a>
## Comando para crear Migracion, Modelo, Controlador + Seeder

Tu puedes crear los archivos de forma automatica y sin tanta complejidad.

☝️ En un solo comando crearas migracion, modelo, controlador con recursos.

```php
   php artisan make:model NameModel -mcr

```

✌️ Comando para crear Seeder.

```php
   php artisan make:seeder NameTableSeeder

```
