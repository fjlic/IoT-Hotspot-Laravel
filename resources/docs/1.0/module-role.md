# Modulo Role

---

- [Role CRUD](#section-role)
- [Migracion](#migrations)
- [Seeder](#seeds)
- [Modelo](#models)
- [Controlador](#controllers)
- [RutaWeb](#routes)
- [Vista](#views)
- [Comando](#mcr)

<a name="section-role"></a>
## Migracion, Sedder, Modelo, Controlador y Vista

Estructura del modulo Role.. 🦊
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

Comando `php artisan make:migration Role` ejecutar en consola dentro del proyecto.

> {info} Directorio  `vendor/santigarcor/laratrust/resources/views/migrations.blade.php`.

```php

class LaratrustSetupTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Create table for storing roles
        Schema::create('{{ $laratrust['tables']['roles'] }}', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name')->unique();
            $table->string('display_name')->nullable();
            $table->string('description')->nullable();
            $table->timestamps();
        });

        // Create table for storing permissions
        Schema::create('{{ $laratrust['tables']['permissions'] }}', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name')->unique();
            $table->string('display_name')->nullable();
            $table->string('description')->nullable();
            $table->timestamps();
        });

@if ($laratrust['teams']['enabled'])
        // Create table for storing teams
        Schema::create('{{ $laratrust['tables']['teams'] }}', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name')->unique();
            $table->string('display_name')->nullable();
            $table->string('description')->nullable();
            $table->timestamps();
        });

@endif
        // Create table for associating roles to users and teams (Many To Many Polymorphic)
        Schema::create('{{ $laratrust['tables']['role_user'] }}', function (Blueprint $table) {
            $table->unsignedBigInteger('{{ $laratrust['foreign_keys']['role'] }}');
            $table->unsignedBigInteger('{{ $laratrust['foreign_keys']['user'] }}');
            $table->string('user_type');
@if ($laratrust['teams']['enabled'])
            $table->unsignedBigInteger('{{ $laratrust['foreign_keys']['team'] }}')->nullable();
@endif

            $table->foreign('{{ $laratrust['foreign_keys']['role'] }}')->references('id')->on('{{ $laratrust['tables']['roles'] }}')
                ->onUpdate('cascade')->onDelete('cascade');
@if ($laratrust['teams']['enabled'])
            $table->foreign('{{ $laratrust['foreign_keys']['team'] }}')->references('id')->on('{{ $laratrust['tables']['teams'] }}')
                ->onUpdate('cascade')->onDelete('cascade');

            $table->unique(['{{ $laratrust['foreign_keys']['user'] }}', '{{ $laratrust['foreign_keys']['role'] }}', 'user_type', '{{ $laratrust['foreign_keys']['team'] }}']);
@else

            $table->primary(['{{ $laratrust['foreign_keys']['user'] }}', '{{ $laratrust['foreign_keys']['role'] }}', 'user_type']);
@endif
        });

        // Create table for associating permissions to users (Many To Many Polymorphic)
        Schema::create('{{ $laratrust['tables']['permission_user'] }}', function (Blueprint $table) {
            $table->unsignedBigInteger('{{ $laratrust['foreign_keys']['permission'] }}');
            $table->unsignedBigInteger('{{ $laratrust['foreign_keys']['user'] }}');
            $table->string('user_type');
@if ($laratrust['teams']['enabled'])
            $table->unsignedBigInteger('{{ $laratrust['foreign_keys']['team'] }}')->nullable();
@endif

            $table->foreign('{{ $laratrust['foreign_keys']['permission'] }}')->references('id')->on('{{ $laratrust['tables']['permissions'] }}')
                ->onUpdate('cascade')->onDelete('cascade');
@if ($laratrust['teams']['enabled'])
            $table->foreign('{{ $laratrust['foreign_keys']['team'] }}')->references('id')->on('{{ $laratrust['tables']['teams'] }}')
                ->onUpdate('cascade')->onDelete('cascade');

            $table->unique(['{{ $laratrust['foreign_keys']['user'] }}', '{{ $laratrust['foreign_keys']['permission'] }}', 'user_type', '{{ $laratrust['foreign_keys']['team'] }}']);
@else

            $table->primary(['{{ $laratrust['foreign_keys']['user'] }}', '{{ $laratrust['foreign_keys']['permission'] }}', 'user_type']);
@endif
        });

        // Create table for associating permissions to roles (Many-to-Many)
        Schema::create('{{ $laratrust['tables']['permission_role'] }}', function (Blueprint $table) {
            $table->unsignedBigInteger('{{ $laratrust['foreign_keys']['permission'] }}');
            $table->unsignedBigInteger('{{ $laratrust['foreign_keys']['role'] }}');

            $table->foreign('{{ $laratrust['foreign_keys']['permission'] }}')->references('id')->on('{{ $laratrust['tables']['permissions'] }}')
                ->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('{{ $laratrust['foreign_keys']['role'] }}')->references('id')->on('{{ $laratrust['tables']['roles'] }}')
                ->onUpdate('cascade')->onDelete('cascade');

            $table->primary(['{{ $laratrust['foreign_keys']['permission'] }}', '{{ $laratrust['foreign_keys']['role'] }}']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('{{ $laratrust['tables']['permission_user'] }}');
        Schema::dropIfExists('{{ $laratrust['tables']['permission_role'] }}');
        Schema::dropIfExists('{{ $laratrust['tables']['permissions'] }}');
        Schema::dropIfExists('{{ $laratrust['tables']['role_user'] }}');
        Schema::dropIfExists('{{ $laratrust['tables']['roles'] }}');
@if ($laratrust['teams']['enabled'])
        Schema::dropIfExists('{{ $laratrust['tables']['teams'] }}');
@endif
    }
}

```

<a name="seeds"></a>
## Seeder

Comando `php artisan make:seeder AddRoleGlobalTableSeeder` ejecutar en consola dentro del proyecto.

> {info} Directorio  `database/seeders/AddRoleGlobalTableSeeder.php`.

```php

class AddRoleGlobalTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $users = User::all();
        $crds = Crd::all();
        $erbs = ERB::all();
        $role_root = Role::where('name','root')->first();
        $role_admin = Role::where('name','admin')->first();
        $role_super = Role::where('name','super')->first();
        $role_user = Role::where('name','user')->first();
        $role_crd = Role::where('name','crd')->first();
        $role_erb = Role::where('name','erb')->first();

        /* Asign roles with users and micros*/

        $root = $users->find(1);
        $root->attachRole($role_root);
        $root->save();

        $admin = $users->find(2);
        $admin->attachRole($role_admin);
        $admin->save();

        $super = $users->find(3);
        $super->attachRole($role_super);
        $super->save();

        $user = $users->find(4);
        $user->attachRole($role_user);
        $user->save();

        $disable = $users->find(5);
        $disable->attachRole($role_user);
        $disable->save();

        for ($i = 1; $i <= 9; $i++) {
            $crd = $crds->find($i);
            $crd->attachRole($role_crd);
            $crd->save();
        }

        for ($i = 1; $i <= 9; $i++) {
            $erb = $erbs->find($i);
            $erb->attachRole($role_erb);
            $erb->save();
        }
    }
}

```

<a name="models"></a>
## Modelo

Comando `php artisan make:model Role` ejecutar en consola dentro del proyecto.

> {info} Directorio  `app/Role.php`.

```php

class LaratrustRole extends Model implements LaratrustRoleInterface
{
    use LaratrustRoleTrait;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table;

    /**
     * Creates a new instance of the model.
     *
     * @param  array  $attributes
     * @return void
     */
    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
        $this->table = Config::get('laratrust.tables.roles');
    }
}

```

<a name="controllers"></a>
## Controlador

Comando `php artisan make:controller Role` ejecutar en consola dentro del proyecto.

> {info} Directorio  `app/Http/Controllers/RoleController.php`.

```php

class RoleController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the Role.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $roles = Role::all();
        return view('module.role.index',compact('roles'));
    }

    /**
     * Show the form for creating a new resource for Role.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('module.role.create');
    }

    /**
     * Store a newly created resource in storage for Role.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $createRole = Role::create([
            'name' => $request->get('name'),
            'display_name' => $request->get('display_name'), // optional
            'description' => $request->get('description'), // optional
            ]);
        toastr()->success('Role creado');
        return redirect()->route('role.index');
    }

    /**
     * Display the specified resource for Role.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Role $role)
    {
        //
        return view('module.role.show', compact('role'));
    }

    public function edit($id)
    {
        $role = Role::findOrFail($id);
        return view('module.role.edit',compact('role'));
    }

    /**
     * Update the specified resource in storage for Role.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $role = Role::findOrFail($id);

        $data = $request->validate([
            'display_name' => 'nullable|string',
            'description' => 'nullable|string',
        ]);

        $role->update($data);
        toastr()->warning('Role actualizado satisfactoriamente');
        return redirect()->route('role.index');
    }

    /**
     * Remove the specified resource from storage for Role.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Role $role)
    {
        $role->delete();
        //return redirect('/role')->with('success', 'Role Eliminado!');
        toastr()->error('Role eliminado');
        return redirect()->route('role.index');
    }
}

```

<a name="routes"></a>
## Ruta Web

No cuenta con comando artisan para esto dispones ya de un archivo de rutas web.

> {info} Directorio  `vendor/santigarcor/laratrust/routes/web.php` agregar dentro del archivo.

```php

use Illuminate\Support\Facades\Route;

Route::resource('/permissions', 'PermissionsController', ['as' => 'laratrust'])
    ->only(['index', 'edit', 'update']);

Route::resource('/roles', 'RolesController', ['as' => 'laratrust']);

Route::resource('/roles-assignment', 'RolesAssignmentController', ['as' => 'laratrust'])
    ->only(['index', 'edit', 'update']);

```

<a name="views"></a>
## Vista

No se cuenta con comando pero crea un archivos index para modulo de usuario `index.blade.php` y pega este codigo.

> {info} Directorio  `resources/views/module/role/index.blade.php`.

```php

<!-- Main content -->
 <section class="content">
      <div class="row">
        <div class="col-12">
            <div class="card card-primary card-outline">
            <div class="card-header">
              <h3 class="card-title">Tabla de Roles</h3>
              <a class="btn btn-xs btn-success float-right" href="{{ route('role.create') }}" role="button"><span class="fas fa-plus"></span></a>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="roleTable" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Id</th>
                  <th>Nom-Codigo</th>
                  <th>Nom-Vista</th>
                  <th>Descripcion</th>
                  <th>FechaCreacion</th>
                  <th>FechaMoficiacion</th>
                  <th>Acciones</th>
                </tr>
                </thead>
                <tbody>
                @foreach($roles as $role)
                <tr>
                    <td>{{ $role->id }}</td>
                    <td>{{ $role->name }}</td>
                    <td>{{ $role->display_name }}</td>
                    <td>{{ $role->description }}</td>
                    <td>{{ $role->created_at }}</td>
                    <td>{{ $role->updated_at }}</td>
                    <td>
                      <form role="form" action="{{ route('role.destroy',$role->id) }}" method="POST">
                      <a class="btn btn-info btn-xs" href="{{ route('role.show',$role->id) }}" role="button"><span class="fas fa-eye"></span></a> 
                      <a class="btn btn-warning btn-xs"  href="{{ route('role.edit',$role->id) }}" role="button"><span class="fas fa-pen"></span></a>
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
                  <th>Nom-Codigo</th>
                  <th>Nom-Vista</th>
                  <th>Descripcion</th>
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

