# Modulo Role

---

- [Usuario Role](#section-role)
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

Comando `php artisan make:migration Role` ejecutar en consola dentro del proyecto.

> {info} Directorio  `database/migrations/2014_10_12_000000_create_roles_table.php`.

```php
class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('region_id')->nullable();
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('branch_office')->nullable();
            $table->string('serial_number')->nullable();
            $table->rememberToken();
            $table->timestamps();
            $table->foreign('region_id')->references('id')->on('regions')->onUpdate('cascade')->onDelete('cascade')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
```

<a name="seeds"></a>
## Seeder

Comando `php artisan make:seeder AddUserTableSeeder` ejecutar en consola dentro del proyecto.

> {info} Directorio  `database/seeders/AddUserTableSeeder.php`.

```php
class AddUserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $root = new User();
        $root->id = 1;
        $root->region_id = 1;
        $root->name = 'Root';
        $root->email = 'root@local.com';
        $root->password = Hash::make('root@54321');
        $root->branch_office = 'Sin Asignar';
        $root->serial_number = '0000000001';
        $root->save();

        $admin = new User();
        $admin->id = 2;
        $admin->region_id = 1;
        $admin->name = 'Admin';
        $admin->email = 'admin@local.com';
        $admin->password = Hash::make('admin@54321');
        $admin->branch_office = 'Sin Asignar';
        $admin->serial_number = '0000000002';
        $admin->save();

        $super = new User();
        $super->id = 3;
        $super->region_id = 1;
        $super->name = 'Super';
        $super->email = 'super@local.com';
        $super->password = Hash::make('super@54321');
        $super->branch_office = 'Sin Asignar';
        $super->serial_number = '0000000003';
        $super->save();

        $user = new User();
        $user->id = 4;
        $user->region_id = 1;
        $user->name = 'User';
        $user->email = 'user@local.com';
        $user->password = Hash::make('user@54321');
        $user->branch_office = 'Sin Asignar';
        $user->serial_number = '0000000004';
        $user->save();

        $disable = new User();
        $disable->id = 5;
        $disable->region_id = 1;
        $disable->name = 'Disable';
        $disable->email = 'disable@local.com';
        $disable->password = Hash::make('disable@54321');
        $disable->branch_office = 'Sin Asignar';
        $disable->serial_number = '0000000005';
        $disable->save();
    }
}

```

<a name="models"></a>
## Modelo

Comando `php artisan make:model User` ejecutar en consola dentro del proyecto.

> {info} Directorio  `app/User.php`.

```php
class User extends Authenticatable
{
    use LaratrustUserTrait;
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'region_id','name', 'email', 'password', 'branch_office', 'serial_number',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * Get the user record  type hostpot.
     */
    public function region()
    {
        return $this->belongsTo('App\Region', 'id');
    }

    /**
     * Get the crd for the user.
     */
    public function crd()
    {
        return $this->hasMany('App\Crd','user_id');
    }

    /**
     * Get the crd for the user.
     */
    public function erb()
    {
        return $this->hasMany('App\Erb','user_id');
    }
}
```

<a name="controllers"></a>
## Controlador

Comando `php artisan make:controller User` ejecutar en consola dentro del proyecto.

> {info} Directorio  `app/Http/Controllers/UserController.php`.

```php

class RolesController
{
    protected $rolesModel;
    protected $permissionModel;

    public function __construct()
    {
        $this->rolesModel = Config::get('laratrust.models.role');
        $this->permissionModel = Config::get('laratrust.models.permission');
    }

    public function index()
    {
        return View::make('laratrust::panel.roles.index', [
            'roles' => $this->rolesModel::withCount('permissions')
                ->simplePaginate(10),
        ]);
    }

    public function create()
    {
        return View::make('laratrust::panel.edit', [
            'model' => null,
            'permissions' => $this->permissionModel::all(['id', 'name']),
            'type' => 'role',
        ]);
    }

    public function show(Request $request, $id)
    {
        $role = $this->rolesModel::query()
            ->with('permissions:id,name,display_name')
            ->findOrFail($id);

        return View::make('laratrust::panel.roles.show', ['role' => $role]);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|unique:roles,name',
            'display_name' => 'nullable|string',
            'description' => 'nullable|string',
        ]);

        $role = $this->rolesModel::create($data);
        $role->syncPermissions($request->get('permissions') ?? []);

        Session::flash('laratrust-success', 'Role created successfully');
        return redirect(route('laratrust.roles.index'));
    }

    public function edit($id)
    {
        $role = $this->rolesModel::query()
            ->with('permissions:id')
            ->findOrFail($id);

        if (!Helper::roleIsEditable($role)) {
            Session::flash('laratrust-error', 'The role is not editable');
            return redirect()->back();
        }

        $permissions = $this->permissionModel::all(['id', 'name', 'display_name'])
            ->map(function ($permission) use ($role) {
                $permission->assigned = $role->permissions
                    ->pluck('id')
                    ->contains($permission->id);

                return $permission;
            });

        return View::make('laratrust::panel.edit', [
            'model' => $role,
            'permissions' => $permissions,
            'type' => 'role',
        ]);
    }

    public function update(Request $request, $id)
    {
        $role = $this->rolesModel::findOrFail($id);

        if (!Helper::roleIsEditable($role)) {
            Session::flash('laratrust-error', 'The role is not editable');
            return redirect()->back();
        }

        $data = $request->validate([
            'display_name' => 'nullable|string',
            'description' => 'nullable|string',
        ]);

        $role->update($data);
        $role->syncPermissions($request->get('permissions') ?? []);

        Session::flash('laratrust-success', 'Role updated successfully');
        return redirect(route('laratrust.roles.index'));
    }

    public function destroy($id)
    {
        $usersAssignedToRole = DB::table(Config::get('laratrust.tables.role_user'))
            ->where(Config::get('laratrust.foreign_keys.role'), $id)
            ->count();
        $role = $this->rolesModel::findOrFail($id);

        if (!Helper::roleIsDeletable($role)) {
            Session::flash('laratrust-error', 'The role is not deletable');
            return redirect()->back();
        }

        if ($usersAssignedToRole > 0) {
            Session::flash('laratrust-warning', 'Role is attached to one or more users. It can not be deleted');
        } else {
            Session::flash('laratrust-success', 'Role deleted successfully');
            $this->rolesModel::destroy($id);
        }

        return redirect(route('laratrust.roles.index'));
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
Route::resource('user', 'UserController')->middleware('auth');
Auth::routes();
```

<a name="views"></a>
## Vista

No se cuenta con comando pero crea un archivos index para modulo de usuario `index.blade.php` y pega este codigo.

> {info} Directorio  `resources/module/user/index.blade.php`.

```php
<!-- Main content -->
 <section class="content">
      <div class="row">
        <div class="col-12">
            <div class="card card-primary card-outline">
            <div class="card-header">
              <h3 class="card-title">Tabla Usuarios</h3>
              <a class="btn btn-xs btn-success float-right" href="{{ route('user.create') }}" role="button"><span class="fas fa-plus"></span></a>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="userTable" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Id</th>
                  <th>Nombre</th>
                  <th>Email</th>
                  <th>Password</th>
                  <th>FechaCreacion</th>
                  <th>FechaMoficiacion</th>
                  <th>Acciones</th>
                </tr>
                </thead>
                <tbody>
                @foreach($users as $user)
                <tr>
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->password }}</td>
                    <td>{{ $user->created_at }}</td>
                    <td>{{ $user->updated_at }}</td>
                    <td>
                      <form role="form" action="{{ route('user.destroy',$user->id) }}" method="POST">
                      <a class="btn btn-info btn-xs" href="{{ route('user.show',$user->id) }}" role="button"><span class="fas fa-eye"></span></a> 
                      <a class="btn btn-warning btn-xs"  href="{{ route('user.edit',$user->id) }}" role="button"><span class="fas fa-pen"></span></a>
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
                  <th>Nombre</th>
                  <th>Email</th>
                  <th>Password</th>
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

