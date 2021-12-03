# Modulo Nfc 📱

---

- [Nfc CRUD](#section-user)
- [Migración](#migrations)
- [Seeder](#seeds)
- [Modelo](#models)
- [Controlador](#controllers)
- [RutaWeb](#routes)
- [Vista](#views)
- [Comando](#mcr)

<a name="section-user"></a>
## Migración, Sedder, Modelo, Controlador y Vista

Estructura del modulo Nfc.. 
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

Comando `php artisan make:migration Nfc` ejecutar en consola dentro del proyecto.

> {info} Directorio  `database/migrations/2014_10_12_000000_create_nfcs_table.php`.

```php

class CreateNfcsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nfcs', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('crd_id')->nullable();
            $table->unsignedBigInteger('erb_id')->nullable();
            $table->string('num_serie')->unique()->nullable();
            $table->bigInteger('count_global')->nullable();
            $table->bigInteger('count_between_cuts')->nullable();
            $table->string('time_global_between_cuts')->nullable();
            $table->string('time_between_cuts')->nullable();
            $table->bigInteger('prizes_count')->nullable();
            $table->string('ssid')->nullable();
            $table->string('password')->default('nfc123');
            $table->string('ip_server')->nullable();
            $table->string('port')->nullable();
            $table->string('protocol')->nullable();
            $table->string('text')->nullable();
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
        Schema::dropIfExists('nfcs');
    }
}

```

<a name="seeds"></a>
## Seeder

Comando `php artisan make:seeder AddNfcTableSeeder` ejecutar en consola dentro del proyecto.

> {info} Directorio  `database/seeders/AddNfcTableSeeder.php`.

```php

class AddNfcTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $nfccoin = new Nfc();
        $nfccoin->id = 1;
        $nfccoin->crd_id = 1;
        $nfccoin->erb_id = 1;
        $nfccoin->num_serie = '777597840';
        $nfccoin->cont_qr = '0';
        $nfccoin->cont_mon = '0';
        $nfccoin->cont_mon_2 = '0';
        $nfccoin->cont_corte = '0';
        $nfccoin->cont_prem = '0';
        $nfccoin->cost_mon = '5';
        $nfccoin->ssid = 'IoT-Hotspot';
        $nfccoin->passwd = '10T#H0t5p0t';
        $nfccoin->ip_server = '74.208.92.167';
        $nfccoin->port = '443';
        $nfccoin->txt = 'Prueba Nfc 1 Ok';
        $nfccoin->save();
    }
}

```

<a name="models"></a>
## Modelo

Comando `php artisan make:model Nfc` ejecutar en consola dentro del proyecto.

> {info} Directorio  `app/Nfc.php`.

```php

class Nfc extends Model
{
    //
    //use HasApiTokens, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $fillable = [
        'id', 'crd_id', 'erb_id', 'num_serie', 'cont_qr', 'cont_mon', 
        'cont_mon_2', 'cont_corte', 'cont_prem', 'cost_mon', 'ssid', 'passwd', 'ip_server', 'port', 'txt',
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
    public function historialnfc()
    {
        return $this->hasMany('App\HistorialNfc','nfc_id');
    }

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
}

```

<a name="controllers"></a>
## Controlador

Comando `php artisan make:controller Nfc` ejecutar en consola dentro del proyecto.

> {info} Directorio  `app/Http/Controllers/NfcController.php`.

```php

class NfcController extends Controller
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
        $nfcs = Nfc::all();
        //return view('module.nfc.index')->with('nfs',$nfcs);
        return view('module.nfc.index',compact('nfcs'));
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
        return view('module.nfc.create',compact('crds','erbs'));
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
            'crd_id'=>'required|string|max:34',
            'erb_id'=>'required|string|max:34',
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
            'txt'=>'required|string|max:100',
            
        ]);
        $nfc = new Nfc([
            'crd_id' => $request->get('crd_id'),
            'erb_id' => $request->get('erb_id'),
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
            'txt' => $request->get('txt')
            ]);
        $nfc->save();
        //return redirect(/nfc)->with('success','Nfc Generado Satisfactoriamente');
        toastr()->success('Nfc creado');
        return redirect()->route('nfc.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Nfc  $nfc
     * @return \Illuminate\Http\Response
     */
    public function show(Nfc $nfc)
    {
        //
        return view('module.nfc.show', compact('nfc'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Nfc  $nfc
     * @return \Illuminate\Http\Response
     */
    public function edit(Nfc $nfc)
    {
        //
        $crds = Crd::all();
        $erbs = Erb::all();
        return view('module.nfc.edit',compact('nfc','crds','erbs'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Nfc  $nfc
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Nfc $nfc)
    {
        //
        $request->validate([
            'crd_id'=>'required|string|max:34',
            'erb_id'=>'required|string|max:34',
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
            'txt'=>'required|string|max:100',
        ]);
        $nfc_request = $request->all();
        $nfc->update($nfc_request);
        toastr()->warning('Nfc actualizado');
        return redirect()->route('nfc.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Nfc  $nfc
     * @return \Illuminate\Http\Response
     */
    public function destroy(Nfc $nfc)
    {
        //
        $nfc->delete();
        //return reditec('/nfc'->with('success','nfc Eliminado Satisfactoriamente'));
        toastr()->error('nfc eliminado');
        return redirect()->route('nfc.index');
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
Route::resource('nfc', 'NfcController')->middleware('auth');
Auth::routes();

```

<a name="views"></a>
## Vista

No se cuenta con comando pero crea un archivos index para modulo de usuario `index.blade.php` y pega este codigo.

> {info} Directorio  `resources/views/module/nfc/index.blade.php`.

```php

<!-- Main content -->
 <section class="content">
      <div class="row">
        <div class="col-12">
          <div class="card card-primary card-outline">
            <div class="card-header">
              <h3 class="card-title">Tabla Nfc</h3>
              <a class="btn btn-xs btn-success float-right" href="{{ route('nfc.create') }}" role="button"><span class="fas fa-plus"></span></a>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="nfcTable" class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>Id</th>
                  <th>Crd</th>
                  <th>Erb</th>
                  <th>Serie</th>
                  <th>Cont Qr</th>
                  <th>Cont Mon</th>
                  <th>Cont Mon 2</th>
                  <th>Cont Corte</th>
                  <th>Cont Prem</th>
                  <th>Cost Mon</th>
                  <th>Ssid</th>
                  <th>Ip Server</th>
                  <th>Puerto</th>
                  <th>Texto</th>
                  <th>FechaMod</th>
                  <th>Acciones</th>
                </tr>
                </thead>
                <tbody>
                @foreach($nfcs as $nfc)
                <tr>
                    <td>{{ $nfc->id }}</td>
                    <td>{{ $nfc->crd_id }}</td>
                    <td>{{ $nfc->erb_id }}</td>
                    <td>{{ $nfc->num_serie }}</td>
                    <td>{{ $nfc->cont_qr }}</td>
                    <td>{{ $nfc->cont_mon }}</td>
                    <td>{{ $nfc->cont_mon_2 }}</td>
                    <td>{{ $nfc->cont_corte }}</td>
                    <td>{{ $nfc->cont_prem }}</td>
                    <td>{{ $nfc->cost_mon }}</td>
                    <td>{{ $nfc->ssid }}</td>
                    <td>{{ $nfc->ip_server }}</td>
                    <td>{{ $nfc->port }}</td>
                    <td>{{ $nfc->txt }}</td>
                    <td>{{ $nfc->updated_at }}</td>
                    <td>
                      <form role="form" action="{{ route('nfc.destroy',$nfc->id) }}" method="POST">
                      <a class="btn btn-info btn-xs" href="{{ route('nfc.show',$nfc->id) }}" role="button"><span class="fas fa-eye"></span></a> 
                      <a class="btn btn-warning btn-xs"  href="{{ route('nfc.edit',$nfc->id) }}" role="button"><span class="fas fa-pen"></span></a>
                      @csrf
                      @method('DELETE')
                      <a href="" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#exampleModalCenter{{$nfc->id}}"><span class="fas fa-trash"></span></a>
                      <!------ Modal 1 ------>
                      <div class="modal fade" id="exampleModalCenter{{$nfc->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
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
                          <p class="text-center">Eliminarás ( <b>{{$nfc->num_serie}}</b> ) seguro</p>
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
   php artisan make:model Nfc -mcr

```

✌️ Comando para crear Seeder.

```php
   php artisan make:seeder AddNfcTableSeeder

```


<larecipe-newsletter></larecipe-newsletter>