# Modulo Erb

---

- [Erb CRUD](#section-erb)
- [Migración](#migrations)
- [Seeder](#seeds)
- [Modelo](#models)
- [Controlador](#controllers)
- [RutaWeb](#routes)
- [Vista](#views)
- [Comando](#mcr)

<a name="section-erb"></a>
## Migración, Sedder, Modelo, Controlador y Vista

Estructura del modulo Erb.. 🎮
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

Comando `php artisan make:migration Erb` ejecutar en consola dentro del proyecto.

> {info} Directorio  `database/migrations/2014_10_12_000000_create_erbs_table.php`.

```php

class CreateErbsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('erbs', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->string('num_serie')->unique()->nullable();
            $table->string('name_machine');
            $table->string('nick_name');
            $table->string('password')->default('erb123');
            $table->string('api_token')->unique();
            $table->timestamps();
            $table->foreign('user_id')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('erbs');
    }
}

```

<a name="seeds"></a>
## Seeder

Comando `php artisan make:seeder AddErbTableSeeder` ejecutar en consola dentro del proyecto.

> {info} Directorio  `database/seeders/AddErbTableSeeder.php`.

```php

class AddErbTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $erb = new Erb();
        $erb->id = 1;
        $erb->user_id = 1;
        $erb->num_serie = 222233331;
        $erb->name_machine = 'Angry birds';
        $erb->nick_name = 'Erb_1';
        $erb->password = Crypt::encrypt('erb123');
        $erb->api_token = ApiToken::GenerateToken16();
        $erb->save();
    }
}

```

<a name="models"></a>
## Modelo

Comando `php artisan make:model Erb` ejecutar en consola dentro del proyecto.

> {info} Directorio  `app/Erb.php`.

```php

class Erb extends Model
{
    use LaratrustUserTrait;
    use Notifiable;
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id', 'user_id', 'name_machine', 'nick_name', 'password', 'api_token',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    //protected $hidden = [
    //    'password', 
    //];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
    ];

    /**
     * Get the user record  type hostpot.
     */
    public function user()
    {
        return $this->belongsTo('App\User', 'id');
    }

    /**
     * Get the hostpot for the blog crd.
     */
    public function qr()
    {
        return $this->belongsToMany('App\Qr','erb_id');
    }

    /**
     * Get the hostpot for the blog crd.
     */
    public function nfc()
    {
        return $this->belongsToMany('App\Nfc','erb_id');
    }
}

```

<a name="controllers"></a>
## Controlador

Comando `php artisan make:controller Erb` ejecutar en consola dentro del proyecto.

> {info} Directorio  `app/Http/Controllers/ErbController.php`.

```php

class ErbController extends Controller
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
        $erbs = Erb::all();
        foreach ($erbs as $key => $erb) {
        $erb->password = Crypt::decrypt($erb->password);
        }
        return view('module.erb.index',compact('erbs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $users = User::all();
        return view('module.erb.create',compact('users'));
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
            'user_id'=>'required|string|max:100',
            'num_serie'=>'required|string|max:100',
            'name_machine'=>'required|string|max:100',
            'nick_name'=>'required|string|max:100',
            'password'=>'required|string|max:100'   
        ]);

         $erb = new Erb();
         $erb->user_id = $request->get('user_id');
         $erb->num_serie = $request->get('num_serie');
         $erb->nick_name = $request->get('nick_name');
         $erb->name_machine = $request->get('name_machine');
         $erb->password = Crypt::encrypt($request->get('password'));
         $erb->api_token = ApiToken::GenerateToken32();
         $erb->save();
        //return redirect('/erb')->with('success', 'Erb Generado Satisfactoriamente!');
        toastr()->success('Erb generado satisfactoriamente');
        return redirect()->route('erb.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Erb  $erb
     * @return \Illuminate\Http\Response
     */
    public function show(Erb $erb)
    {
        //
        $erb->password = Crypt::decrypt($erb->password);
        return view('module.erb.show',compact('erb'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Erb  $erb
     * @return \Illuminate\Http\Response
     */
    public function edit(Erb $erb)
    {
        //
        $users = User::all();
        $erb->password = Crypt::decrypt($erb->password);
        return view('module.erb.edit', compact('erb','users'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Erb  $erb
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Erb $erb)
    {
        //
        $request->validate([
            'user_id'=>'required|string|max:100',
            'num_serie'=>'required|string|max:100',
            'name_machine'=>'required|string|max:100',
            'nick_name'=>'required|string|max:100',
            'password'=>'required|string|max:100',
            'api_token'=>'required|string|max:100'
        ]);
        $erb_request = $request->all();
        $erb_request['user_id'] =  $request->get('user_id');
        $erb_request['num_serie'] =  $request->get('num_serie');
        $erb_request['name_machine'] =  $request->get('name_machine');
        $erb_request['nick_name'] =  $request->get('nick_name');
        $erb_request['password'] = Crypt::encrypt($request->get('password'));
        $erb_request['api_token'] =  $request->get('api_token');
        $erb->update($erb_request);
        toastr()->warning('Erb Actualizado Satisfactoriamente');
        return redirect()->route('erb.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Erb  $erb
     * @return \Illuminate\Http\Response
     */
    public function destroy(Erb $erb)
    {
        //
        $erb->delete();
        toastr()->error('Erb eliminado satisfactoriamente');
        return redirect()->route('erb.index');
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
Route::resource('erb', 'ErbController')->middleware('auth');
Auth::routes();

```

<a name="views"></a>
## Vista

No se cuenta con comando pero crea un archivos index para modulo de erb `index.blade.php` y pega este codigo.

> {info} Directorio  `resources/views/module/erb/index.blade.php`.

```php

<!-- Main content -->
 <section class="content">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Tabla Erb</h3>
              <a class="btn btn-xs btn-success float-right" href="{{ route('erb.create') }}" role="button"><span class="fas fa-plus"></span></a>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="erbTable" class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>Id</th>
                  <th>User Id</th>
                  <th>Serie</th>
                  <th>Nombre</th>
                  <th>Alias</th>
                  <th>ApiToken</th>
                  <th>FechaMod</th>
                  <th>Acciones</th>
                </tr>
                </thead>
                <tbody>
                @foreach($erbs as $erb)
                <tr>
                    <td>{{ $erb->id }}</td>
                    <td>{{ $erb->user_id }}</td>
                    <td>{{ $erb->num_serie }}</td>
                    <td>{{ $erb->name_machine }}</td>      
                    <td>{{ $erb->nick_name }}</td>
                    <td>{{ $erb->api_token }}</td>
                    <td>{{ $erb->updated_at }}</td>
                    <td>
                      <form role="form" action="{{ route('erb.destroy',$erb->id) }}" method="POST">
                      <a class="btn btn-info btn-xs" href="{{ route('erb.show',$erb->id) }}" role="button"><span class="fas fa-eye"></span></a> 
                      <a class="btn btn-warning btn-xs"  href="{{ route('erb.edit',$erb->id) }}" role="button"><span class="fas fa-pen"></span></a>
                      @csrf
                        @method('DELETE')
                      <a href="" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#exampleModalCenter{{$erb->id}}"><span class="fas fa-trash"></span></a>
                      <!------ Modal 1 ------>
                      <div class="modal fade" id="exampleModalCenter{{$erb->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
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
                          <p class="text-center">Eliminarás ( <b>{{$erb->nick_name}}</b> ) seguro</p>
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
                  <th>User Id</th>
                  <th>NumSerie</th>
                  <th>Alias</th>
                  <th>Password</th>
                  <th>ApiToken</th>
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
## Comando para crear Migración, Modelo, Controlador + Seeder

Tu puedes crear los archivos de forma automatica y sin tanta complejidad.

☝️ En un solo comando crearas migración, modelo, controlador con recursos.

```php
   php artisan make:model Erb -mcr

```

✌️ Comando para crear Seeder.

```php
   php artisan make:seeder AddErbTableSeeder

```



<larecipe-newsletter></larecipe-newsletter>