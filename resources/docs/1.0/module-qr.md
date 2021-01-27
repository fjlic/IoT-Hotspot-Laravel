# Modulo Qr

---

- [Qr CRUD](#section-qr)
- [Migracion](#migrations)
- [Seeder](#seeds)
- [Modelo](#models)
- [Controlador](#controllers)
- [RutaWeb](#routes)
- [Vista](#views)
- [Comando](#mcr)

<a name="section-qr"></a>
## Migracion, Sedder, Modelo, Controlador y Vista

Estructura del modulo Qr.. 🦊
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

        $qrcoin = new Qr();
        $qrcoin->id = 2;
        $qrcoin->crd_id = null;
        $qrcoin->erb_id = null;
        $qrcoin->qr_serie = 'CDFHIKR359';
        $qrcoin->coins = 2000;
        $qrcoin->gone_down = 0;
        $qrcoin->save();
        
        $qrcoin = new Qr();
        $qrcoin->id = 3;
        $qrcoin->crd_id = null;
        $qrcoin->erb_id = null;
        $qrcoin->qr_serie = 'CDLQRWX145';
        $qrcoin->coins = 2000;
        $qrcoin->gone_down = 0;
        $qrcoin->save();

        $qrcoin = new Qr();
        $qrcoin->id = 4;
        $qrcoin->crd_id = null;
        $qrcoin->erb_id = null;
        $qrcoin->qr_serie = 'ACJOTWXY01';
        $qrcoin->coins = 2000;
        $qrcoin->gone_down = 0;
        $qrcoin->save();

        $qrcoin = new Qr();
        $qrcoin->id = 5;
        $qrcoin->crd_id = null;
        $qrcoin->qr_serie = 'HJKLOQXY06';
        $qrcoin->coins = 2000;
        $qrcoin->gone_down = 0;
        $qrcoin->save();

        $qrcoin = new Qr();
        $qrcoin->id = 6;
        $qrcoin->crd_id = null;
        $qrcoin->erb_id = null;
        $qrcoin->qr_serie = 'LPTUVXY134';
        $qrcoin->coins = 2000;
        $qrcoin->gone_down = 0;
        $qrcoin->save();

        $qrcoin = new Qr();
        $qrcoin->id = 7;
        $qrcoin->crd_id = null;
        $qrcoin->erb_id = null;
        $qrcoin->qr_serie = 'CGHKNOUYZ6';
        $qrcoin->coins = 2000;
        $qrcoin->gone_down = 0;
        $qrcoin->save();
        
        $qrcoin = new Qr();
        $qrcoin->id = 8;
        $qrcoin->crd_id = null;
        $qrcoin->erb_id = null;
        $qrcoin->qr_serie = 'CFJM012468';
        $qrcoin->coins = 2000;
        $qrcoin->gone_down = 0;
        $qrcoin->save();

        $qrcoin = new Qr();
        $qrcoin->id = 9;
        $qrcoin->crd_id = null;
        $qrcoin->erb_id = null;
        $qrcoin->qr_serie = 'BGHIJPVW07';
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

class QrController extends Controller
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
        //QrCode::size(500)->generate('A tutorial of QR code!');
        $qrs = Qr::all();
        //return view('module.qr.index')->with('qrcoins',$qrs);
        return view('module.qr.index',compact('qrs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $crds = Crd::all();
        $erbs = Erb::all();
        return view('module.qr.create',compact('crds','erbs'));
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
            'qr_serie'=>'required|string|max:100',
            'coins'=>'required|string|max:100',
            'gone_down'=>'required|string|max:100',
        ]);
        $qr = new Qr([
            'crd_id' => $request->get('crd_id'),
            'erb_id' => $request->get('erb_id'),
            'qr_serie' => $request->get('qr_serie'),
            'coins' => $request->get('coins'),
            'gone_down' => $request->get('gone_down')
            ]);
        $qr->save();
        //return redirect(/coin)->with('success','Qr Generado Satisfactoriamente');
        toastr()->success('Qr creado');
        return redirect()->route('qr.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Qr  $qr
     * @return \Illuminate\Http\Response
     */
    public function show(Qr $qr)
    {
        //
        return view('module.qr.show', compact('qr'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Qr  $qr
     * @return \Illuminate\Http\Response
     */
    public function edit(Qr $qr)
    {
        //
        $crds = Crd::all();
        $erbs = Erb::all();
        return view('module.qr.edit',compact('qr','crds','erbs'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Qr  $qr
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Qr $qr)
    {
        //
        $request->validate([
            'crd_id'=>'required|string|max:100',
            'erb_id'=>'required|string|max:100',
            'qr_serie'=>'required|string|max:100',
            'coins'=>'required|string|max:100',
            'gone_down'=>'required|string|max:100',
        ]);
        $qr_request = $request->all();
        $qr->update($qr_request);
        toastr()->warning('Qr actualizado');
        return redirect()->route('qr.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Qr  $qr
     * @return \Illuminate\Http\Response
     */
    public function destroy(Qr $qr)
    {
        //
        $qr->delete();
        //return reditec('/qr'->with('success','Qr Eliminado Satisfactoriamente'));
        toastr()->error('Qr eliminado');
        return redirect()->route('qr.index');
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
            <!-- /.card-header -->
            <div class="card-body">
              <table id="qrTable" class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>Id</th>
                  <th>Crd_Id</th>
                  <th>Erb_id</th>
                  <th>QrSerie</th>
                  <th>Coins</th>
                  <th>Actualizado</th>
                  <th>FechaCreacion</th>
                  <th>FechaMoficiacion</th>
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
                    <td>{{ $qr->created_at }}</td>
                    <td>{{ $qr->updated_at }}</td>
                    <td>
                      <form role="form" action="{{ route('qr.destroy',$qr->id) }}" method="POST">
                      <a class="btn btn-primary btn-xs" data-toggle="modal" data-target="#{{ $qr->qr_serie }}"><span class="fas fa-barcode"></span></a>
                      <a class="btn btn-info btn-xs" href="{{ route('qr.show',$qr->id) }}" role="button"><span class="fas fa-eye"></span></a> 
                      <a class="btn btn-warning btn-xs"  href="{{ route('qr.edit',$qr->id) }}" role="button"><span class="fas fa-pen"></span></a>
                      <!--------------------------------------------------------------------------------->
                      <!-- Modal -->
                      <div class="modal fade" id="{{ $qr->qr_serie }}" tabindex="-1" role="dialog" aria-labelledby="{{ $qr->qr_serie }}" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                          <div class="modal-content">
                            <div class="modal-header">
                             <h3 class="modal-title text-center" id="{{ $qr->qr_serie }}">Codigo Qr: {{ $qr->qr_serie }}</h3>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                               <span aria-hidden="true">&times;</span>
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
                      <!-- /.Modal -->
                      <!--------------------------------------------------------------------------------->
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
                  <th>QrSerie</th>
                  <th>Coins</th>
                  <th>Actualizado</th>
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

