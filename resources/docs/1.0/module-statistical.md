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
            $table->string('estimate_proxy_size')->nullable();
            $table->string('development_hours')->nullable();
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
        $statistical = new Statistical();
        $statistical->id = 1;
        $statistical->estimate_proxy_size = 160;
        $statistical->development_hours = 15.0;
        $statistical->save();

        $statistical = new Statistical();
        $statistical->id = 2;
        $statistical->estimate_proxy_size = 591;
        $statistical->development_hours = 69.9;
        $statistical->save();
        
        $statistical = new Statistical();
        $statistical->id = 3;
        $statistical->estimate_proxy_size = 114;
        $statistical->development_hours = 6.5;
        $statistical->save();

        $statistical = new Statistical();
        $statistical->id = 4;
        $statistical->estimate_proxy_size = 229;
        $statistical->development_hours = 22.4;
        $statistical->save();

        $statistical = new Statistical();
        $statistical->id = 5;
        $statistical->estimate_proxy_size = 230;
        $statistical->development_hours = 28.4;
        $statistical->save();

        $statistical = new Statistical();
        $statistical->id = 6;
        $statistical->estimate_proxy_size = 270;
        $statistical->development_hours = 65.9;
        $statistical->save();

        $statistical = new Statistical();
        $statistical->id = 7;
        $statistical->estimate_proxy_size = 128;
        $statistical->development_hours = 19.4;
        $statistical->save();

        $statistical = new Statistical();
        $statistical->id = 8;
        $statistical->estimate_proxy_size = 1657;
        $statistical->development_hours = 198.7;
        $statistical->save();

        $statistical = new Statistical();
        $statistical->id = 9;
        $statistical->estimate_proxy_size = 624;
        $statistical->development_hours = 38.8;
        $statistical->save();

        $statistical = new Statistical();
        $statistical->id = 10;
        $statistical->estimate_proxy_size = 1503;
        $statistical->development_hours = 138.2;
        $statistical->save();

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
        'id', 'estimate_proxy_size', 'development_hours',
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

class TestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Test  $test
     * @return \Illuminate\Http\Response
     */
    public function show(Test $test)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Test  $test
     * @return \Illuminate\Http\Response
     */
    public function edit(Test $test)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Test  $test
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Test $test)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Test  $test
     * @return \Illuminate\Http\Response
     */
    public function destroy(Test $test)
    {
        //
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
              <h3 class="card-title">Tabla Estadistico</h3>
              <a class="btn btn-xs btn-success float-right" href="{{ route('statistical.create') }}" role="button"><span class="fas fa-plus"></span></a>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="statisticalTable" class="table table-bordered table-striped">
              <thead>
                 <!-- /.card-header 'id', 'estimate_proxy_size', 'development_hours' -->
                <tr>
                  <th>Id</th>
                  <th>Tamaño Estimado</th>
                  <th>Horas Desarollo</th>
                  <th>FechaCreacion</th>
                  <th>FechaMoficiacion</th>
                  <th>Acciones</th>
                </tr>
                </thead>
                <tbody>
                @foreach($statisticals as $statistical)
                <tr>
                    <td>{{ $statistical->id }}</td>
                    <td>{{ $statistical->estimate_proxy_size }}</td>
                    <td>{{ $statistical->development_hours }}</td>
                    <td>{{ $statistical->created_at }}</td>
                    <td>{{ $statistical->updated_at }}</td>
                    <td>
                      <form role="form" action="{{ route('statistical.destroy',$statistical->id) }}" method="POST">
                      <a class="btn btn-info btn-xs" href="{{ route('statistical.show',$statistical->id) }}" role="button"><span class="fas fa-eye"></span></a> 
                      <a class="btn btn-warning btn-xs"  href="{{ route('statistical.edit',$statistical->id) }}" role="button"><span class="fas fa-pen"></span></a>
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
                  <th>Tamaño Estimado</th>
                  <th>Horas Desarollo</th>
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

<!--------------------------------------------------------------------------------------------------------------------------------------------------> 

<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-12">
      <div class="card card-success card-outline">
        <div class="card-header">
          <h3 class="card-title">Resultados</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
          <table id="0" class="table table-striped table-bordered">
             <!-- /.card-header 'id', 'estimate_proxy_size', 'development_hours' -->
            <thead>
             <tr>
                <th>Pruebas</th>
                <th COLSPAN=2>Valor Esperado</th>
                <th COLSPAN=2>Valor Actual</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td></td> 
                <td>Media</td> <td>Dev. Std</td>
                <td>Media</td> <td>Dev. Std</td>
              </tr>
              <tr>
                <td>Tabla 1: Columna 1</td> 
                <td>550.6</td> <td>572.03</td>
                <td>{{ $med1 }}</td> <td>{{ $dev1 }}</td>
              </tr>
              <tr>
                <td>Tabla 1: Columna 2</td> 
                <td>60.32</td> <td>62.26</td>
                <td>{{ $med2 }}</td> <td>{{ $dev2 }}</td>
              </tr>
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

