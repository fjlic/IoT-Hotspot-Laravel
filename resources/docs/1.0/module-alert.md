# Alert Moduel 🚨

---

- [CRUD Alert](#section-alert)
- [Migration](#migrations)
- [Seeder](#seeds)
- [Model](#models)
- [Controller](#controllers)
- [RouteWeb](#routes)
- [View](#views)
- [Alert](#alert)
- [Command](#mcr)

<a name="section-Alert"></a>
## Migration, Sedder, Model, Controller y View

Alert module structure.. 
If you like it is possible to create the MVC structure manually.

---

- [Migration](#migrations)
- [Seeder](#seeds)
- [Model](#models)
- [Controller](#controllers)
- [RouteWeb](#routes)
- [View](#views)
- [Alert](#alert)
- [Command MCR](#mcr)


> {success} Manejo de Alertas por correo electrónico [`Gmail`](https://gmail.com/)


![screenshot](https://hotspot.fjlic.com/storage/Images/Alerta_2.PNG)


<a name="migrations"></a>
## Migration

Command `php artisan make:migration Alert` run in console inside project.

> {info} Directorio  `database/migrations/2021_12_05_141229_create_alerts_table.php`.

```php

class CreateAlertsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('alerts', function (Blueprint $table) {
            $table->id();
            $table->string('type')->default('sensor');
            $table->json('email')->nullable();
            $table->string('title')->nullable();
            $table->string('body')->nullable();
            $table->string('footer')->nullable();
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
        Schema::dropIfExists('alerts');
    }
}

```

<a name="seeds"></a>
## Seeder

Command `php artisan make:seeder AddAlertTableSeeder` run in console inside project.

> {info} Directorio  `database/seeders/AddAlertTableSeeder.php`.

```php

class AddAlertTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $emails = array();
        $emails[0] = 'franc.javier.flores@gmail.com';
        $emails[1] = 'fjavier.flores@hotmail.com';
        $alert = new Alert();
        $alert->id = 1;
        $alert->type = 'sensor';
        $alert->email = json_encode($emails);
        $alert->title = 'Hola estimado(a) este mensage requiere de tu atencion !!';
        $alert->body = 'Acontinuacion se describen las alertas de Sensores IoT-Hotspot';
        $alert->footer = 'Para mas detalles visita el link: https://hotspot.fjlic.com/';
        $alert->save();
    }
}

```

<a name="models"></a>
## Model

Comand `php artisan make:model Alert` run in console inside project.

> {info} Directorio  `app/Alert.php`.

```php

class Alert extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'type','email', 'title', 'body', 'footer',
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
## Controller

Command `php artisan make:controller Alert` run in console inside project.

> {info} Directorio  `app/Http/Controllers/AlertController.php`.

```php

class AlertController extends Controller
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
        $alerts = Alert::all();
        return view('module.alert.index', compact('alerts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $types = array();
        $types[1] = 'sensor';
        $types[0] = 'otro';
        return view('module.alert.create',compact('types'));
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
            'type'=>'required|string|max:50',
            'email'=>'required|string|max:100',
            'title'=>'required|string|max:100',
            'body'=>'required|string|max:100',
            'footer'=>'required|string|max:100',
        ]);
        $part_mail = explode(":", $request->get('email'));
        $emails = array();
        foreach ($part_mail as $key => $mail) {
            $emails[$key] = $mail;
        }
        $alert = new Alert([
            'type' => $request->get('type'),
            'email' => json_encode($emails),
            'title' =>  $request->get('title'),
            'body' =>  $request->get('body'),
            'footer' =>  $request->get('footer')]);
        $alert->save();
        //return redirect('/alert')->with('success', 'Alerta generado satisfactoriamente');
        toastr()->success('Alerta creada');
        return redirect()->route('alert.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Alert  $alert
     * @return \Illuminate\Http\Response
     */
    public function show(Alert $alert)
    {
        //
        return view('module.alert.show',compact('alert'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Alert  $alert
     * @return \Illuminate\Http\Response
     */
    public function edit(Alert $alert)
    {
        //
        $types = array();
        $types[1] = 'sensor';
        $types[0] = 'otro';
        $tmp_str = '';
        $tmp_mail = json_decode($alert->email);
        if(sizeof($tmp_mail) > 1)
        {
            for ($i=0; $i < sizeof($tmp_mail)-1; $i++) 
            {
                $tmp_str = $tmp_str.$tmp_mail[$i].':';  
            }
            $tmp_str = $tmp_str.$tmp_mail[sizeof($tmp_mail)-1];  
        }
        else
        {
            $tmp_str = $tmp_mail[0];
        }
        $alert->email = $tmp_str;
        return view('module.alert.edit', compact('alert','types'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Alert  $alert
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Alert $alert)
    {
        //
        $request->validate([
            'type'=>'required|string|max:50',
            'email'=>'required|string|max:100',
            'title'=>'required|string|max:100',
            'body'=>'required|string|max:100',
            'footer'=>'required|string|max:100',
        ]);
        $alert_request = $request->all();
        $part_mail = explode(":", $request->get('email'));
        $emails = array();
        foreach ($part_mail as $key => $mail) {
            $emails[$key] = $mail;
        }
        $alert_request['type'] =  $request->get('type');
        $alert_request['email'] =  json_encode($emails);
        $alert_request['title'] =  $request->get('title');
        $alert_request['body'] =  $request->get('body');
        $alert_request['footer'] = $request->get('footer');
        $alert->update($alert_request);
        toastr()->warning('Alerta actualizada');
        return redirect()->route('alert.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Alert  $alert
     * @return \Illuminate\Http\Response
     */
    public function destroy(Alert $alert)
    {
        //
        $alert->delete();
        //return redirect('/alert')->with('success', 'Alerta eliminada!');
        toastr()->error('Alerta eliminada');
        return redirect()->route('alert.index');
    }
}

```

<a name="routes"></a>
## Route Web

It does not have an artisan command, for this you already have a file of web routes.

> {info} Directory  `routes/web.php` add inside file.

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
Route::resource('alert', 'AlertController')->middleware('auth');
Auth::routes();

```

<a name="views"></a>
## View

There is no command but it creates an index file for the user module `index.blade.php` and paste this code.
.

> {info} Directory  `resources/views/module/alert/index.blade.php`.

```php

<!-- Main content -->
 <section class="content">
      <div class="row">
        <div class="col-12">
            <div class="card card-primary card-outline">
            <div class="card-header">
              <h3 class="card-title"> Alert Table</h3>
              <a class="btn btn-xs btn-success float-right" href="{{ route('alert.create') }}" role="button"><span class="fas fa-plus"></span></a>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="alertTable" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Id</th>
                  <th>Tipo</th>
                  <th>Email</th>
                  <th>Title</th>
                  <th>Message</th>
                  <th>EndMsj</th>
                  <th>ModDate</th>
                  <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                @foreach($alerts as $alert)
                <tr>
                    <td>{{ $alert->id }}</td>
                    <td>{{ $alert->type }}</td>
                    <td><a href="" class="btn btn-primary btn-xs" data-toggle="modal" data-target="#ModalSt{{$alert->id}}"><span>Ver-Correos</span></a>
                    <!------ Modal 1 ------>
                    <div class="modal fade" id="ModalSt{{$alert->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                      <div class="modal-dialog modal-dialog-centered" role="document">
                      <div class="modal-content">
                      <div class="modal-header d-flex justify-content-center">
                        <h5 class="modal-title" id="exampleModalCenterTitle">Emails of the Alert with Id ({{$alert->id}})</h5>
                      </div>
                      <div class="modal-body">
                          <div class="modal-body" style="text-align: center">
                            <a><p class="text-center">{{ $alert->email }}</p></a>
                          </div>
                      </div>
                      <div class="modal-footer d-flex justify-content-center">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                      </div>
                      </div>
                      </div>
                      </div>
                    <!--fin modal-->
                    </td>
                    <td>{{ $alert->title }}</td>
                    <td>{{ $alert->body }}</td>
                    <td>{{ $alert->footer }}</td>
                    <td>{{ $alert->updated_at }}</td>
                    <td>
                      <form role="form" action="{{ route('alert.destroy',$alert->id) }}" method="POST">
                      <a class="btn btn-info btn-xs" href="{{ route('alert.show',$alert->id) }}" role="button"><span class="fas fa-eye"></span></a> 
                      <a class="btn btn-warning btn-xs"  href="{{ route('alert.edit',$alert->id) }}" role="button"><span class="fas fa-pen"></span></a>
                      @csrf
                      @method('DELETE')
                      <a href="" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#exampleModalCenter{{$alert->id}}"><span class="fas fa-trash"></span></a>
                      <!------ Modal 2 ------>
                      <div class="modal fade" id="exampleModalCenter{{$alert->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                      <div class="modal-dialog modal-dialog-centered" role="document">
                      <div class="modal-content">
                      <div class="modal-header d-flex justify-content-center">
                        <h5 class="modal-title" id="exampleModalCenterTitle">Be careful with this action</h5>
                      </div>
                      <div class="modal-body">
                          <div class="modal-body" style="text-align: center">
                            <a><img src="{{ asset('storage/Images/Warning.JPG') }}" alt="" title=""  text-align="center" /></a>
                           </div>
                           <br>
                          <p class="text-center">Eliminarás ( <b>{{$alert->type}}</b> ) are you sure?</p>
                      </div>
                      <div class="modal-footer d-flex justify-content-center">
                            <button type="button" class="btn btn-info" data-dismiss="modal">Cancel</button>
                            <input type="submit" class="btn btn-danger" value="Delete">
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

<a name="alert"></a>
## Alert

There is no command but it creates a sensor.blade.php file for the email directory `sensor.blade.php` and paste this code.

> {info} Directory  `resources/views/module/email/sensor.blade.php`.

```php

@component('mail::message')
    {{ $alert->title }} 😱

@component('mail::subcopy')
    Alerts were detected on the platform, please click on the button. 🔲
@endcomponent

@component('mail::button', ['url' => 'https://hotspot.fjlic.com/historialsensor/chart/'.$sensor->id])
    Visit Hotspot
@endcomponent

@component('mail::panel')
    {{ $alert->body }} 🚀
@endcomponent

## Tabla {{ $alert->type }} con Id: {{ $sensor->id }}

<center>
@component('mail::table')
| Sensor | Name | Status | Description |
| --   |   --   |   --   |   --   |
|      |        |        |        |
| Temperature | Tmp_1 | {{$sensor->temp_1}} | @if($sensor->temp_1 <= 35) ✔️ @else ❌ @endif |
| Temperature | Tmp_2 | {{$sensor->temp_2}} | @if($sensor->temp_2 <= 35) ✔️ @else ❌ @endif |
| Temperature | Tmp_3 | {{$sensor->temp_3}} | @if($sensor->temp_3 <= 35) ✔️ @else ❌ @endif |
| Temperature | Tmp_4 | {{$sensor->temp_4}} | @if($sensor->temp_4 <= 35) ✔️ @else ❌ @endif |
@endcomponent
</center>


@component('mail::subcopy')
    {{ $alert->footer }} 🔗<br/><br/>
    https://hotspot.fjlic.com/historialsensor/chart/{{ $sensor->id }} ✌️
@endcomponent


Thanks, Atte. {{ config('app.name') }} 👻
@endcomponent

```

<a name="mcr"></a>
## Command to create Migration, Model, Controller + Seeder

You can create the files automatically and without so much complexity.

☝️ In a single command you will create migration, model, controller with resources.

```php
   php artisan make:model Alert -mcr

```

✌️ Command to create Seederr.

```php
   php artisan make:seeder AddAlertTableSeeder

```



<larecipe-newsletter></larecipe-newsletter>