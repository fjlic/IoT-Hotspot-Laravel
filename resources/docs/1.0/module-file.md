# Modulo Publicidad

---

- [Publicidad CRUD](#section-file)
- [Migracion](#migrations)
- [Seeder](#seeds)
- [Modelo](#models)
- [Controlador](#controllers)
- [RutaWeb](#routes)
- [Vista](#views)
- [Comando](#mcr)

<a name="section-file"></a>
## Migracion, Sedder, Modelo, Controlador y Vista

Estructura del modulo Publicidad.. 🦊
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

Comando `php artisan make:migration file` ejecutar en consola dentro del proyecto.

> {info} Directorio  `database/migrations/2014_10_12_000000_create_files_table.php`.

```php

class CreateFilesTable extends Migration
{
    /**
     * Run the migrations.
     * Part Name : MTN
     * * Part Size : 14.4
     * @return void
     */
    public function up()
    {
        Schema::create('files', function (Blueprint $table) {
            $table->id();
            $table->string('name_file')->unique()->nullable();
            $table->string('set')->nullable();
            $table->string('route')->nullable();
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
        Schema::dropIfExists('files');
    }
}

```

<a name="seeds"></a>
## Seeder

Comando `php artisan make:seeder AddFileTableSeeder` ejecutar en consola dentro del proyecto.

> {info} Directorio  `database/seeders/AddFileTableSeeder.php`.

```php

class AddFileTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * Part Name : SED
     * * Part Size : 5.1
     * @return void
     */
    public function run()
    {
        //
        $file = new File();
        $file->id = 1;
        $file->name_file = "test";
        $file->counter_lines = 125;
        $file->counter_lines = 'storage/public';
        $file->save();
    }
}

```

<a name="models"></a>
## Modelo

Comando `php artisan make:model File` ejecutar en consola dentro del proyecto.

> {info} Directorio  `app/File.php`.

```php

class File extends Model
{
    //
    /**
     * The attributes that are mass assignable.
     * Part Name : MDL
     * * Part Size : 15.
     * @var array
     */
    protected $fillable = [
        'id', 'name_file', 'set', 'route',
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

Comando `php artisan make:controller File` ejecutar en consola dentro del proyecto.

> {info} Directorio  `app/Http/Controllers/FileController.php`.

```php

class FileController extends Controller
{
    /**
     * Create a new controller instance.
     * Part Name : CNT
     * Part Size : 15.1
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
        $files = File::all();
       
        return view('module.file.index',compact('files'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('module.file.create');
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
            'name_file'=>'required|file',
            //'set'=>'required|string|max:100',
            //'route'=>'required|string|max:100',
        ]);
        $req_file = $request->file('name_file');
        $set = $request->get('set');
        $archivo=fopen($req_file, "r") or die ("error al leer el archivo");
        $name_file = $req_file->getClientOriginalName();
        $path_file = public_path("storage/public/files") . "/" . $name_file;

        $file = new File([
            'name_file' => $name_file,
            'set' => $set,
            'route' => $path_file,
            ]);

        $file->save();
        $req_file->move(public_path("storage/public/files"),$name_file);
        //return redirect(/file)->with('success','File creado');
        toastr()->success('File creado');
        return redirect()->route('file.index');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\File  $file
     * @return \Illuminate\Http\Response
     */
    public function show(File $file)
    {
        //
        return view('module.file.show', compact('file'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\File  $file
     * @return \Illuminate\Http\Response
     */
    public function edit(File $file)
    {
        //
        return view('module.file.edit', compact('file'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\File  $file
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, File $file)
    {
        //
        $request->validate([
            'name_file'=>'required|string',
            'set'=>'required|string',
            'route'=>'required|string',
        ]);
        $file_request = $request->all();
        $file->update($file_request);
        toastr()->warning('File actualizada');
        return redirect()->route('file.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\File  $file
     * @return \Illuminate\Http\Response
     */
    public function destroy(File $file)
    {
        //
        unlink($file->route);
        $file->delete();
        //return reditec('/file'->with('success','File eliminado'));
        toastr()->error('File eliminado');
        return redirect()->route('file.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\File  $file
     * @return \Illuminate\Http\Response
     */
    public function download(Request $request,$id)
    {
        $file = File::where('id',$id)->first();
        if (is_null($file)) {
            return response()->json(['message' => 'Archivo no encontrado'], 404);
        }
        $fileName = $file->name_file;
        $filePath = $file->route;
        if (Storage::exists('public/files/'.$file->name_file)) {
            $pathToFile = public_path("storage/public/files/").$file->name_file;
            $headers = [
                'Content-Type' => 'application/octet-stream',
            ];
            // return Storage::download($pathToFile, $fileName, $headers);
            return response()->download($pathToFile, $fileName, $headers);
            // return response()->json(['message' => $filePath], 200);
        }
        /*else{
            return response()->json(['message' => 'Archivo no encontrado'], 404);
        }*/
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
Route::get('file/download/{id}', 'FileController@download')->name('file.download')->middleware('auth');
Route::resource('file', 'FileController')->middleware('auth');
Auth::routes();

```

<a name="views"></a>
## Vista

No se cuenta con comando pero crea un archivos index para modulo de erb `index.blade.php` y pega este codigo.

> {info} Directorio  `resources/views/module/erb/index.blade.php`.

```php

<!-- Main content  Part Name : VST -->
 <!-- Part Size : 23.3 -->
 <section class="content">
      <div class="row">
        <div class="col-12">
          <div class="card card-primary card-outline">
            <div class="card-header">
              <h3 class="card-title">Tabla de Videos</h3>
              <a class="btn btn-xs btn-success float-right" href="{{ route('file.create') }}" role="button"><span class="fas fa-plus"></span></a>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="fileTable" class="table table-bordered table-striped">
              <thead>
                 <!-- /.card-header 'id', 'name_file', 'set' -->
                <tr>
                  <th>Id</th>
                  <th>Nombre Video</th>
                  <th>Conjunto</th>
                  <th>Ruta Video</th>
                  <th>FechaMod</th>
                  <th>Acciones</th>
                </tr>
                </thead>
                <tbody>
                @foreach($files as $file)
                <tr>
                    <td>{{ $file->id }}</td>
                    <td>{{ $file->name_file }}</td>
                    <td>{{ $file->set }}</td>
                    <td>{{ $file->route }}</td>
                    <td>{{ $file->updated_at }}</td>
                    <td>
                      <form role="form" action="{{ route('file.destroy',$file->id) }}" method="POST">
                      <a class="btn btn-primary btn-xs" href="{{route('file.download',$file->id)}}" role="button" data-report_id="{{$file->id}}"><span class="fas fa-download"></span></a>
                      <a class="btn btn-info btn-xs" href="{{ route('file.show',$file->id) }}" role="button"><span class="fas fa-eye"></span></a> 
                      <a class="btn btn-warning btn-xs"  href="{{ route('file.edit',$file->id) }}" role="button"><span class="fas fa-pen"></span></a>
                      @csrf
                      @method('DELETE')
                      <a href="" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#exampleModalCenter{{$file->id}}"><span class="fas fa-trash"></span></a>
                      <!------ Modal 1 ------>
                      <div class="modal fade" id="exampleModalCenter{{$file->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
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
                          <p class="text-center">Eliminarás ( <b>{{$file->name_file}}</b> ) seguro</p>
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
                  <th>Tamaño Estimado</th>
                  <th>Horas Desarollo</th>
                  <th>Ruta</th>
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
   php artisan make:model File -mcr

```

✌️ Comando para crear Seeder.

```php
   php artisan make:seeder AddFileTableSeeder

```

