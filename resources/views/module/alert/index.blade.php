@extends('adminlte::page')
@section('title', 'Hotspot|Alertas')
@section('content_header')
   <!-- <h1>Menu Admin</h1>-->
@stop

@section('content')
@if ($errors->any())
      <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
        </ul>
      </div><br />
@endif

@if ($message = Session::get('success'))

<div class="alert alert-success">

    <p>{{ $message }}</p>

</div>
@endif

 <!-- Main content -->
 <section class="content">
      <div class="row">
        <div class="col-12">
            <div class="card card-primary card-outline">
            <div class="card-header">
              <h3 class="card-title">Tabla de Alertas</h3>
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
                  <th>Titulo</th>
                  <th>Mensaje</th>
                  <th>Fin Msj</th>
                  {{-- <th>Password</th> --}}
                  {{-- <th>FechaCre</th> --}}
                  <th>FechaMod</th>
                  <th>Acciones</th>
                </tr>
                </thead>
                <tbody>
                @foreach($alerts as $alert)
                <tr>
                    <td>{{ $alert->id }}</td>
                    <td>{{ $alert->type }}</td>
                    {{-- <td>{{ $alert->email }}</td> --}}
                    <td><a href="" class="btn btn-primary btn-xs" data-toggle="modal" data-target="#ModalSt{{$alert->id}}"><span>Ver-Correos</span></a>
                    <!------ ESTE ES EL MODAL QUE SE MUESTRA AL DAR CLICK EN EL BOTON "ELIMINAR" ------>
                    <div class="modal fade" id="ModalSt{{$alert->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                      <div class="modal-dialog modal-dialog-centered" role="document">
                      <div class="modal-content">
                      <div class="modal-header d-flex justify-content-center">
                        <h5 class="modal-title" id="exampleModalCenterTitle">Correos de la Alerta con Id ({{$alert->id}})</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Cerrar">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                          <div class="modal-body" style="text-align: center">
                            <a><p class="text-center">{{ $alert->email }}</p></a>
                          </div>
                      </div>
                      <div class="modal-footer d-flex justify-content-center">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                      </div>
                      </div>
                      </div>
                      </div>
                    <!--fin modal-->
                    </td>
                    <td>{{ $alert->title }}</td>
                    <td>{{ $alert->body }}</td>
                    <td>{{ $alert->footer }}</td>
                    {{-- <td>{{ $alert->password }}</td>  --}}
                    {{--  <td>{{ $alert->created_at }}</td>  --}}
                    <td>{{ $alert->updated_at }}</td>
                    <td>
                      <form role="form" action="{{ route('alert.destroy',$alert->id) }}" method="POST">
                      <a href="" class="btn btn-primary btn-xs" data-toggle="modal" data-target="#emailModalCenter{{$alert->id}}"><span class="fas fa-envelope"></span></a>
<!------------------------------------------- Modal 1 ---------------------------------------------------->
<div class="modal fade" id="emailModalCenter{{$alert->id}}" tabindex="-1" role="dialog" aria-labelledby="emailModalCenterTitle" aria-hidden="true">
<div class="modal-dialog modal-lg" role="document">
<div class="modal-content">
<div class="modal-header d-flex justify-content-center">
<h5 class="modal-title" id="emailModalCenterTitle">Cuerpo de E-mail de alerta</h5>
<button type="button" class="close" data-dismiss="modal" aria-label="Close">
<span aria-hidden="true">&times;</span>
</button>
</div>
<div class="modal-body d-flex justify-content-center">
@component('mail::message')
    {{ $alert->title }} 😱

@component('mail::subcopy')
    Se detectaron alertas en la plataforma por favor da click en el boton. 🔲
@endcomponent

@component('mail::button', ['url' => 'https://hotspot.fjlic.com/historialsensor/chart/'.$sensor->id])
    Visita Hotspot
@endcomponent

@component('mail::panel')
    {{ $alert->body }} 🚀
@endcomponent

## Tabla {{ $alert->type }} con Id: {{ $sensor->id }}

<center>
@component('mail::table')
| Sensor | Nombre | Estado | Descripción |
| --   |   --   |   --   |   --   |
|      |        |        |        |
| Temperatura | Fuente DC | {{$sensor->temp_1}} | @if($sensor->temp_1 <= 35) ✔️ @else ❌ @endif |
| Temperatura | Ventilador | {{$sensor->temp_2}} | @if($sensor->temp_2 <= 35) ✔️ @else ❌ @endif |
| Temperatura | Ambiente | {{$sensor->temp_3}} | @if($sensor->temp_3 <= 35) ✔️ @else ❌ @endif |
| Temperatura | S/D | {{$sensor->temp_4}} | @if($sensor->temp_4 <= 35) ✔️ @else ❌ @endif |
| Voltage | Fuente DC | {{$sensor->vol_1}} | @if($sensor->vol_1 === 'On') ✔️ @else ❌ @endif |
| Voltage | Ventilador | {{$sensor->vol_2}} | @if($sensor->vol_2 === 'On') ✔️ @else ❌ @endif |
| Voltage | Leds | {{$sensor->vol_3}} | @if($sensor->vol_3 === 'On') ✔️ @else ❌ @endif |
| Puerta | Tapa | {{$sensor->door_1}} | @if($sensor->door_1 === 'On') ✔️ @else ❌ @endif |
| Puerta | S/D | {{$sensor->door_2}} | @if($sensor->door_2 === 'On') ✔️ @else ❌ @endif |
| Puerta | S/D | {{$sensor->door_3}} | @if($sensor->door_3 === 'On') ✔️ @else ❌ @endif |
| Puerta | S/D | {{$sensor->door_4}} | @if($sensor->door_4 === 'On') ✔️ @else ❌ @endif |
| Actuador | Cerradura | {{$sensor->rlay_1}} | @if($sensor->rlay_1 === 'On') ✔️ @else ❌ @endif |
| Actuador | S/D | {{$sensor->rlay_2}} | @if($sensor->rlay_2 === 'On') ✔️ @else ❌ @endif |
| Actuador | S/D | {{$sensor->rlay_3}} | @if($sensor->rlay_3 === 'On') ✔️ @else ❌ @endif |
| Actuador | S/D | {{$sensor->rlay_4}} | @if($sensor->rlay_4 === 'On') ✔️ @else ❌ @endif |
@endcomponent
</center>


@component('mail::subcopy')
    {{ $alert->footer }} 🔗<br/><br/>
    <https://hotspot.fjlic.com/historialsensor/chart/{{ $sensor->id }}> ✌️ <br/><br/>
    ![screenshot]()
@endcomponent


Gracias, Atte. {{ config('app.name') }} 👻
@endcomponent
</div>
<div>
<img src="data:image/png;base64, {!! base64_encode(QrCode::format('png')->size(100)->generate('Make me into an QrCode!')) !!} ">
</div>
<div class="modal-footer d-flex justify-content-center">
<button type="button" class="btn btn-info" data-dismiss="modal">Cerrar</button>
</div>
</div>
</div>
</div>
<!------------------------------------------- fin modal ---------------------------------------------------> 
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
                          <p class="text-center">Eliminarás ( <b>{{$alert->type}}</b> ) seguro?</p>
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
                  <th>Tipo</th>
                  <th>Email</th>
                  <th>Titulo</th>
                  <th>Mensaje</th>
                  <th>Fin Msg</th>
                  {{-- <th>Password</th> --}}
                  {{-- <th>FechaCre</th> --}}
                  <th>FechaMod</th>
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

@section('footer') 
<div class="pull-right hidden-xs"><b>Version</b> 2.0.1 <strong>  Copyright &copy; 2021 <a href="http://hotspot.fjlic.com/home" target="_blank">Hotspot</a>.</strong>  Todo los derechos Reservados.</div> 
@stop

@section('css')
@toastr_css 
@stop

@section('js')
@toastr_js
@toastr_render
<script>
  $(function () {
     $('#alertTable').DataTable({  
      'paging'      : true,
      'lengthChange': true,
      'searching'   : true,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false,
      'scrollX'     : true,
      'scrollY'     : false,
      'scrollCollapse': false,
      'language': {'url': '//cdn.datatables.net/plug-ins/1.10.15/i18n/Spanish.json'}   
    })
  });
</script>
@stop