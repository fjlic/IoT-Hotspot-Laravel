# Modulo Nfc

---

- [Nfc CRUD](#section-user)
- [Migracion](#migrations)
- [Seeder](#seeds)
- [Modelo](#models)
- [Controlador](#controllers)
- [RutaWeb](#routes)
- [Vista](#views)
- [Comando](#mcr)

<a name="section-user"></a>
## Migracion, Sedder, Modelo, Controlador y Vista

Estructura del modulo Nfc.. 🦊
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
        $nfccoin->crd_id = null;
        $nfccoin->erb_id = null;
        $nfccoin->num_serie = '777597840';
        $nfccoin->count_global = '6500';
        $nfccoin->count_between_cuts = '260';
        $nfccoin->time_global_between_cuts = '1200';
        $nfccoin->time_between_cuts = '120';
        $nfccoin->prizes_count = '110';
        $nfccoin->ssid = 'nfc_1';
        $nfccoin->password = 'nfc123';
        $nfccoin->ip_server = '192.168.0.100';
        $nfccoin->port = '13003';
        $nfccoin->text = 'Prueba Nfc 1 Ok';
        $nfccoin->save();

        $nfccoin = new Nfc();
        $nfccoin->id = 2;
        $nfccoin->crd_id = null;
        $nfccoin->erb_id = null;
        $nfccoin->num_serie = '777597841';
        $nfccoin->count_global = '6600';
        $nfccoin->count_between_cuts = '230';
        $nfccoin->time_global_between_cuts = '1220';
        $nfccoin->time_between_cuts = '130';
        $nfccoin->prizes_count = '115';
        $nfccoin->ssid = 'nfc_2';
        $nfccoin->password = 'nfc123';
        $nfccoin->ip_server = '192.168.0.100';
        $nfccoin->port = '13003';
        $nfccoin->text = 'Prueba Nfc 2 Ok';
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
        'id', 'crd_id', 'erb_id', 'count_global', 'count_between_cuts',
        'time_global_between_cuts', 'time_between_cuts', 'prizes_count',
        'num_serie', 'ssid', 'password', 'dns_server', 'ip_server', 'protocol',
        'port', 'text',
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
    public function historialnfc()
    {
        return $this->hasMany('App\HistorialNfc','nfc_id');
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
            'count_global'=>'required|string|max:34',
            'count_between_cuts'=>'required|string|max:34',
            'time_global_between_cuts'=>'required|string|max:34',
            'time_between_cuts'=>'required|string|max:34',
            'prizes_count'=>'required|string|max:34',
            'num_serie'=>'required|string|max:34',
            'ssid'=>'required|string|max:34',
            'password'=>'required|string|max:34',
            'dns_server'=>'required|string|max:34',
            'ip_server'=>'required|string|max:34',
            'protocol'=>'required|string|max:34',
            'port'=>'required|string|max:34',
            'text'=>'required|string|max:34',
            
        ]);
        $nfc = new Nfc([
            'crd_id' => $request->get('crd_id'),
            'erb_id' => $request->get('erb_id'),
            'count_global' => $request->get('count_global'),
            'count_between_cuts' => $request->get('count_between_cuts'),
            'time_global_between_cuts' => $request->get('time_global_between_cuts'),
            'time_between_cuts' => $request->get('time_between_cuts'),
            'prizes_count' => $request->get('prizes_count'),
            'num_serie' => $request->get('num_serie'),
            'ssid' => $request->get('ssid'),
            'password' => $request->get('password'),
            'dns_server' => $request->get('dns_server'),
            'ip_server' => $request->get('ip_server'),
            'protocol' => $request->get('protocol'),
            'port' => $request->get('port'),
            'text' => $request->get('text')
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
            'count_global'=>'required|string|max:34',
            'count_between_cuts'=>'required|string|max:34',
            'time_global_between_cuts'=>'required|string|max:34',
            'time_between_cuts'=>'required|string|max:34',
            'prizes_count'=>'required|string|max:34',
            'num_serie'=>'required|string|max:34',
            'ssid'=>'required|string|max:34',
            'password'=>'required|string|max:34',
            'dns_server'=>'required|string|max:34',
            'ip_server'=>'required|string|max:34',
            'protocol'=>'required|string|max:34',
            'port'=>'required|string|max:34',
            'text'=>'required|string|max:34',
        ]);
        $nfc_request = $request->all();
        $nfc->update($nfc_request);
        toastr()->warning('nfc actualizado');
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
Route::get('/home', 'HomeController@index')->name('home')->middleware('auth');
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
                  <th>C_Global</th>
                  <th>C_Corte</th>
                  <th>T_Global</th>
                  <th>T_Corte</th>
                  <th>Pzs</th>
                  <th>Ssid</th>
                  <th>Passw</th>
                  <th>Dns Server</th>
                  <th>Ip Server</th>
                  <th>Puerto</th>
                  <th>Protocol</th>
                  <th>Texto</th>
                  <th>FechMod</th>
                  <th>FechMod</th>
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
                    <td>{{ $nfc->count_global }}</td>
                    <td>{{ $nfc->count_between_cuts }}</td>
                    <td>{{ $nfc->time_global_between_cuts }}</td>
                    <td>{{ $nfc->time_between_cuts }}</td>
                    <td>{{ $nfc->prizes_count }}</td>
                    <td>{{ $nfc->ssid }}</td>
                    <td>{{ $nfc->password }}</td>
                    <td>{{ $nfc->dns_server }}</td>
                    <td>{{ $nfc->ip_server }}</td>
                    <td>{{ $nfc->port }}</td>
                    <td>{{ $nfc->protocol }}</td>
                    <td>{{ $nfc->text }}</td>
                    <td>{{ $nfc->created_at }}</td>
                    <td>{{ $nfc->updated_at }}</td>
                    <td>
                      <form role="form" action="{{ route('nfc.destroy',$nfc->id) }}" method="POST">
                      <a class="btn btn-info btn-xs" href="{{ route('nfc.show',$nfc->id) }}" role="button"><span class="fas fa-eye"></span></a> 
                      <a class="btn btn-warning btn-xs"  href="{{ route('nfc.edit',$nfc->id) }}" role="button"><span class="fas fa-pen"></span></a>
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
                  <th>Crd</th>
                  <th>Erb</th>
                  <th>Serie</th>
                  <th>Clv1</th>
                  <th>Clv2</th>
                  <th>Clv3</th>
                  <th>Clv4</th>
                  <th>Clv5</th>
                  <th>Ssid</th>
                  <th>Passw</th>
                  <th>Ip Server</th>
                  <th>Dns Server</th>
                  <th>Puerto</th>
                  <th>Protocol</th>
                  <th>Texto</th>
                  <th>FechMod</th>
                  <th>FechMod</th>
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

