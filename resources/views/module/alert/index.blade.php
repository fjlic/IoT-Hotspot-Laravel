@extends('adminlte::page')
@section('title', 'Hotspot|Alerts')
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
              <h3 class="card-title">Alert Table</h3>
              <a class="btn btn-xs btn-success float-right" href="{{ route('alert.create') }}" role="button"><span class="fas fa-plus"></span></a>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="alertTable" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Id</th>
                  <th>Type</th>
                  <th>Mail</th>
                  <th>Title</th>
                  <th>Message</th>
                  <th>End Msj</th>
                  {{-- <th>Password</th> --}}
                  {{-- <th>FechaCre</th> --}}
                  <th>ModDate</th>
                  <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                @foreach($alerts as $alert)
                <tr>
                    <td>{{ $alert->id }}</td>
                    <td>{{ $alert->type }}</td>
                    {{-- <td>{{ $alert->email }}</td> --}}
                    <td><a href="" class="btn btn-primary btn-xs" data-toggle="modal" data-target="#ModalSt{{$alert->id}}"><span>See-Mails</span></a>
                    <!------ ESTE ES EL MODAL QUE SE MUESTRA AL DAR CLICK EN EL BOTON "ELIMINAR" ------>
                    <div class="modal fade" id="ModalSt{{$alert->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                      <div class="modal-dialog modal-dialog-centered" role="document">
                      <div class="modal-content">
                      <div class="modal-header d-flex justify-content-center">
                        <h5 class="modal-title" id="exampleModalCenterTitle">Emails of the Alert with Id ({{$alert->id}})</h5>
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
<h5 class="modal-title" id="emailModalCenterTitle">Alert Email Body</h5>
<button type="button" class="close" data-dismiss="modal" aria-label="Close">
<span aria-hidden="true">&times;</span>
</button>
</div>
<div class="modal-body d-flex justify-content-center">
@component('mail::message')
    {{ $alert->title }} 😱

@component('mail::subcopy')
    Alerts were detected on the platform please click on the button. 🔲
@endcomponent

@component('mail::button', ['url' => 'https://hotspot.fjlic.com/historialsensor/chart/'.$sensor->id])
    Visit IoT-Hotspot
@endcomponent

@component('mail::panel')
    {{ $alert->body }} 🚀
@endcomponent

## Table {{ $alert->type }} with Id: {{ $sensor->id }}

<center>
@component('mail::table')
| Sensor | Name | Status | Description |
| --   |   --   |   --   |   --   |
|      |        |        |        |
| Temperature | Temp_1 | {{$sensor->temp_1}} | @if($sensor->temp_1 <= 35) ✔️ @else ❌ @endif |
| Temperature | Temp_2 | {{$sensor->temp_2}} | @if($sensor->temp_2 <= 35) ✔️ @else ❌ @endif |
| Temperature | Temp_3 | {{$sensor->temp_3}} | @if($sensor->temp_3 <= 35) ✔️ @else ❌ @endif |
| Temperature | Temp_4 | {{$sensor->temp_4}} | @if($sensor->temp_4 <= 35) ✔️ @else ❌ @endif |
@endcomponent
</center>


@component('mail::subcopy')
    {{ $alert->footer }} 🔗<br/><br/>
    <https://hotspot.fjlic.com/historialsensor/chart/{{ $sensor->id }}> ✌️
@endcomponent


Thanks, Atte. {{ config('app.name') }} 👻
@endcomponent
</div>
<div class="modal-footer d-flex justify-content-center">
<button type="button" class="btn btn-info" data-dismiss="modal">Close</button>
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
                        <h5 class="modal-title" id="exampleModalCenterTitle">Be careful with this action</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                          <div class="modal-body" style="text-align: center">
                            <a><img src="{{ asset('storage/Images/Warning.JPG') }}" alt="" title=""  text-align="center" /></a>
                           </div>
                           <br>
                          <p class="text-center">Do you will delete ( <b>{{$alert->type}}</b> ) are you sure?</p>
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
<div class="pull-right hidden-xs"><b>Version</b> 2.1.1 <strong>  Copyright &copy; 2022 <a href="http://hotspot.fjlic.com/home" target="_blank">Hotspot</a>.</strong>  All rights reserved.</div> 
@stop

@section('css')
@toastr_css 
{{-- <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/botman-web-widget@0/build/assets/css/chat.min.css"> --}} 
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
      //'language': {'url': '//cdn.datatables.net/plug-ins/1.10.15/i18n/Spanish.json'}   
    })
  });
</script>
<script>
        var botmanWidget = {
            aboutText: 'FJLIC Help Center',
            introMessage: "✋ Hello!! I am your IoT-Hotspot assistant"
        };
</script>
<script src='https://cdn.jsdelivr.net/npm/botman-web-widget@0/build/js/widget.js'></script>
@stop