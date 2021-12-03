# Modulo Qr 🔳

---

- [Qr CRUD](#section-qr)
- [Migración](#migrations)
- [Seeder](#seeds)
- [Modelo](#models)
- [Controlador](#controllers)
- [RutaWeb](#routes)
- [Vista](#views)
- [Comando](#mcr)

<a name="section-qr"></a>
## Migración, Sedder, Modelo, Controlador y Vista

Estructura del modulo Qr.. 
Si gustas es posible crear la estructura MVC de forma manual.

---

- [Migración](#migrations)
- [Seeder](#seeds)
- [Modelo](#models)
- [Controlador](#controllers)
- [RutaWeb](#routes)
- [Vista](#views)
- [Comando MCR](#mcr)

<a name="migrations"></a>
## Migración

Comando `php artisan make:migration Qr` ejecutar en consola dentro del proyecto.

> {info} Directorio  `database/migrations/2014_10_12_000000_create_qrs_table.php`.

```php

class CreateQrsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('qrs', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('crd_id')->nullable();
            $table->unsignedBigInteger('erb_id')->nullable();
            $table->string('qr_serie')->unique();
            $table->integer('coins');
            $table->integer('gone_down')->default('0');
            $table->timestamps();
            $table->foreign('crd_id')->references('id')->on('crds')->onUpdate('cascade')->onDelete('cascade')->nullable();
            $table->foreign('erb_id')->references('id')->on('erbs')->onUpdate('cascade')->onDelete('cascade')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('qrs');
    }
}

```

<a name="seeds"></a>
## Seeder

Comando `php artisan make:seeder AddQrTableSeeder` ejecutar en consola dentro del proyecto.

> {info} Directorio  `database/seeders/AddQrTableSeeder.php`.

```php

class AddQrTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $qrcoin = new Qr();
        $qrcoin->id = 1;
        $qrcoin->crd_id = null;
        $qrcoin->erb_id = null;
        $qrcoin->qr_serie = 'ABDORT3467';
        $qrcoin->coins = 2000;
        $qrcoin->gone_down = 0;
        $qrcoin->save();
    }
}

```

<a name="models"></a>
## Modelo

Comando `php artisan make:model Qr` ejecutar en consola dentro del proyecto.

> {info} Directorio  `app/Qr.php`.

```php

class Qr extends Model
{
    //
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id', 'crd_id', 'erb_id', 'qr_serie', 'coins', 'gone_down',
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
    public function crd()
    {
        return $this->belongsToMany('App\Crd', 'id');
    }

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
    public function historialqr()
    {
        return $this->hasMany('App\HistorialQr','qr_id');
    }
}

```

<a name="controllers"></a>
## Controlador

Comando `php artisan make:controller Qr` ejecutar en consola dentro del proyecto.

> {info} Directorio  `app/Http/Controllers/QrController.php`.

```php

class HistorialQrController extends Controller
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
        $historialqrs = HistorialQr::latest()->take(1000)->get();
        return view('module.historialqr.index',compact('historialqrs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $qrs = Qr::all();
        return view('module.historialqr.create',compact('qrs'));
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
            'qr_id'=>'required|string|max:100',
            'qr_serie'=>'required|string|max:100',
            'coins'=>'required|string|max:100',
            'uploaded'=>'required|string|max:100',
        ]);
        $historialqr = new HistorialQr([
            'qr_id' => $request->get('qr_id'),
            'qr_serie' => $request->get('qr_serie'),
            'coins' => $request->get('coins'),
            'uploaded' => $request->get('uploaded')
            ]);
        $historialqr->save();
        toastr()->success('Historial Qr Creado');
        return redirect()->route('historialqr.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\HistorialQr  $historialQr
     * @return \Illuminate\Http\Response
     */
    public function show(HistorialQr $historialqr)
    {
        //
        return view('module.historialqr.show',compact('historialqr'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\HistorialQr  $historialQr
     * @return \Illuminate\Http\Response
     */
    public function edit(HistorialQr $historialqr)
    {
        //
        $qrs = Qr::all();
        return view('module.historialqr.edit', compact('qrs','historialqr'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\HistorialQr  $historialQr
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, HistorialQr $historialqr) 
    {
        //
        $request->validate([
            'qr_id'=>'required|string|max:100',
            'qr_serie'=>'required|string|max:1000',
            'coins'=>'required|string|max:100',
            'uploaded'=>'required|string|max:100'
        ]);
        $historialqr_request = $request->all();
        $historialqr->update($historialqr_request);
        toastr()->warning('Historial Qr actuaizado');
        return redirect()->route('historialqr.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\HistorialQr  $historialQr
     * @return \Illuminate\Http\Response
     */
    public function destroy(HistorialQr $historialqr)
    {
        //
        $historialqr->delete();
        //return redirect('/historialqr')->with('success', 'Qr Eliminado!');
        toastr()->error('Qr Historial eliminado');
        return redirect()->route('historialqr.index');
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
Route::resource('qr', 'QrController')->middleware('auth');
Auth::routes();

```

<a name="views"></a>
## Vista

No se cuenta con comando pero crea un archivos index para modulo de usuario `index.blade.php` y pega este codigo.

> {info} Directorio  `resources/views/module/qr/index.blade.php`.

```php

<!-- Main content -->
 <section class="content">
      <div class="row">
        <div class="col-12">
          <div class="card card-primary card-outline">
            <div class="card-header">
              <h3 class="card-title">Tabla Qr</h3>
              <a class="btn btn-xs btn-success float-right" href="{{ route('qr.create') }}" role="button"><span class="fas fa-plus"></span></a>
            </div>
            <div class="card-body">
              <table id="qrTable" class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>Id</th>
                  <th>Crd_Id</th>
                  <th>Erb_id</th>
                  <th>QrSerie</th>
                  <th>Monedas</th>
                  <th>Actualizado</th>
                  <th>FechaMod</th>
                  <th>Acciones</th>
                </tr>
                </thead>
                <tbody>
                @foreach($qrs as $qr)
                <tr>
                    <td>{{ $qr->id }}</td>
                    <td>{{ $qr->crd_id }}</td>
                    <td>{{ $qr->erb_id }}</td>
                    <td>{{ $qr->qr_serie }}</td>
                    <td>{{ $qr->coins }}</td>      
                    <td>{{ $qr->gone_down }}</td>
                    <td>{{ $qr->updated_at }}</td>
                    <td>
                      <form role="form" action="{{ route('qr.destroy',$qr->id) }}" method="POST">
                      <a class="btn btn-primary btn-xs" data-toggle="modal" data-target="#{{ $qr->qr_serie }}"><span class="fas fa-barcode"></span></a>
                      <a class="btn btn-info btn-xs" href="{{ route('qr.show',$qr->id) }}" role="button"><span class="fas fa-eye"></span></a> 
                      <a class="btn btn-warning btn-xs"  href="{{ route('qr.edit',$qr->id) }}" role="button"><span class="fas fa-pen"></span></a>
                      <div class="modal fade" id="{{ $qr->qr_serie }}" tabindex="-1" role="dialog" aria-labelledby="{{ $qr->qr_serie }}" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                          <div class="modal-content">
                            <div class="modal-header">
                             <h3 class="modal-title text-center" id="{{ $qr->qr_serie }}">Codigo Qr: {{ $qr->qr_serie }}</h3>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                               </button>
                               </div>
                               <div class="modal-body" style="text-align: center">
                                <div> {!!QrCode::size(300)->generate("$qr->qr_serie")!!}</div>
                               </div>
                               <div class="modal-footer">
                              <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
                            </div>
                          </div>
                        </div>
                      </div>
                      @csrf
                      @method('DELETE')
                      <a href="" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#exampleModalCenter{{$qr->id}}"><span class="fas fa-trash"></span></a>
                      <div class="modal fade" id="exampleModalCenter{{$qr->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                      <div class="modal-dialog modal-dialog-centered" role="document">
                      <div class="modal-content">
                      <div class="modal-header d-flex justify-content-center">
                        <h5 class="modal-title" id="exampleModalCenterTitle">Ten cuidado con esta acción</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        </button>
                      </div>
                      <div class="modal-body">
                          <div class="modal-body" style="text-align: center">
                            <a><img src="{{ asset('storage/Images/Warning.JPG') }}" alt="" title=""  text-align="center" /></a>
                           </div>
                           <br>
                          <p class="text-center">Eliminarás ( <b>{{$qr->qr_serie}}</b> ) seguro</p>
                      </div>
                      <div class="modal-footer d-flex justify-content-center">
                            <button type="button" class="btn btn-info" data-dismiss="modal">Cancelar</button>
                            <input type="submit" class="btn btn-danger" value="Eliminar">
                      </div>
                      </div>
                      </div>
                      </div>
                      </form>
                    </td>
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
## Comando para crear Migración, Modelo, Controlador + Seeder

Tu puedes crear los archivos de forma automatica y sin tanta complejidad.

☝️ En un solo comando crearas migración, modelo, controlador con recursos.

```php
   php artisan make:model Qr -mcr

```

✌️ Comando para crear Seeder.

```php
   php artisan make:seeder AddQrTableSeeder

```


<larecipe-newsletter></larecipe-newsletter>