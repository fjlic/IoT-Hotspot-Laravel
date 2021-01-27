# Modulo Erb

---

- [Erb CRUD](#section-erb)
- [Migracion](#migrations)
- [Seeder](#seeds)
- [Modelo](#models)
- [Controlador](#controllers)
- [RutaWeb](#routes)
- [Vista](#views)
- [Comando](#mcr)

<a name="section-erb"></a>
## Migracion, Sedder, Modelo, Controlador y Vista

Estructura del modulo Erb.. 🦊
Si gustas es posible crear la estructura MCV de forma manual.

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
        $erb->api_token = ApiToken::GenerateToken32();
        $erb->save();

        $erb = new Erb();
        $erb->id = 2;
        $erb->user_id = 1;
        $erb->num_serie = 222233332;
        $erb->name_machine = 'Bean bag toss';
        $erb->nick_name = 'Erb_2';
        $erb->password = Crypt::encrypt('erb123');
        $erb->api_token = ApiToken::GenerateToken32();
        $erb->save();
        
        $erb = new Erb();
        $erb->id = 3;
        $erb->user_id = 1;
        $erb->num_serie = 222233333;
        $erb->name_machine = 'Black hole';
        $erb->nick_name = 'Erb_3';
        $erb->password = Crypt::encrypt('erb123');
        $erb->api_token = ApiToken::GenerateToken32();
        $erb->save();

        $erb = new Erb();
        $erb->id = 4;
        $erb->user_id = 1;
        $erb->num_serie = 222233334;
        $erb->name_machine = 'Candy fall';
        $erb->nick_name = 'Erb_4';
        $erb->password = Crypt::encrypt('erb123');
        $erb->api_token = ApiToken::GenerateToken32();
        $erb->save();

        $erb = new Erb();
        $erb->id = 5;
        $erb->user_id = 1;
        $erb->num_serie = 222233335;
        $erb->name_machine = 'Cartooon coaster';
        $erb->nick_name = 'Erb_5';
        $erb->password = Crypt::encrypt('erb123');
        $erb->api_token = ApiToken::GenerateToken32();
        $erb->save();

        $erb = new Erb();
        $erb->id = 6;
        $erb->user_id = 1;
        $erb->num_serie = 222233336;
        $erb->name_machine = 'Crazy animals';
        $erb->nick_name = 'Erb_6';
        $erb->password = Crypt::encrypt('erb123');
        $erb->api_token = ApiToken::GenerateToken32();
        $erb->save();
        
        $erb = new Erb();
        $erb->id = 7;
        $erb->user_id = 1;
        $erb->num_serie = 222233337;
        $erb->name_machine = 'Crazy Canoe';
        $erb->nick_name = 'Erb_7';
        $erb->password = Crypt::encrypt('erb123');
        $erb->api_token = ApiToken::GenerateToken32();
        $erb->save();

        $erb = new Erb();
        $erb->id = 8;
        $erb->user_id = 1;
        $erb->num_serie = 222233338;
        $erb->name_machine = 'Cross y road';
        $erb->nick_name = 'Erb_8';
        $erb->password = Crypt::encrypt('erb123');
        $erb->api_token = ApiToken::GenerateToken32();
        $erb->save();
       
        $erb = new Erb();
        $erb->id = 9;
        $erb->user_id = 1;
        $erb->num_serie = 222233339;
        $erb->name_machine = 'Deal or no Deal';
        $erb->nick_name = 'Erb_9';
        $erb->password = Crypt::encrypt('erb123');
        $erb->api_token = ApiToken::GenerateToken32();
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
Route::get('/home', 'HomeController@index')->name('home')->middleware('auth');
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
                  <th>Password</th>
                  <th>ApiToken</th>
                  <th>FechaCreacion</th>
                  <th>FechaMoficiacion</th>
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
                    <td>{{ $erb->password }}</td>
                    <td>{{ $erb->api_token }}</td>
                    <td>{{ $erb->created_at }}</td>
                    <td>{{ $erb->updated_at }}</td>
                    <td>
                      <form role="form" action="{{ route('erb.destroy',$erb->id) }}" method="POST">
                      <a class="btn btn-info btn-xs" href="{{ route('erb.show',$erb->id) }}" role="button"><span class="fas fa-eye"></span></a> 
                      <a class="btn btn-warning btn-xs"  href="{{ route('erb.edit',$erb->id) }}" role="button"><span class="fas fa-pen"></span></a>
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
@stop

```

<a name="mcr"></a>
## Comando para crear Migracion, Modelo, Controlador + Seeder

Tu puedes crear los archivos de forma automatica y sin tanta complejidad.

☝️ En un solo comando crearas migracion, modelo, controlador con recursos.

```php
   php artisan make:model NameModel -mcr

```

✌️ Run the install command.

```php
   php artisan make:seeder NameTableSeeder

```

