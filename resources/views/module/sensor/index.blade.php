@extends('adminlte::page')
@section('title', 'Hotspot-Sensor')
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
              <h3 class="card-title">Tabla Sensor</h3>
              <a class="btn btn-xs btn-success float-right" href="{{ route('sensor.create') }}" role="button"><span class="fas fa-plus"></span></a>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="sensorTable" class="table table-bordered table-striped">
              <thead>
                <tr>
                <th>Id</th>
                  <th>Esp32 Id</th>
                  <th>NumSer</th>
                  <th>Passw</th>
                  <th>Vol1</th>
                  <th>Vol2</th>
                  <th>Vol3</th>
                  <th>Puerta1</th>
                  <th>Puerta2</th>
                  <th>Puerta3</th>
                  <th>Puerta4</th>
                  <th>Rlay1</th>
                  <th>Rlay2</th>
                  <th>Rlay3</th>
                  <th>Rlay4</th>
                  <th>Txt</th>
                  <th>FechaMod</th>
                  <th>FechaCre</th>
                  <th>Acciones</th>
                </tr>
                </thead>
                <tbody>
                @foreach($sensors as $sensor)
                <tr>
                <td>{{ $sensor->id }}</td>
                    <td>{{ $sensor->esp32_id }}</td>
                    <td>{{ $sensor->raspberry_id }}</td>
                    <td>{{ $sensor->num_serie }}</td>
                    <td>{{ $sensor->passw }}</td>
                    <td>{{ $sensor->vol_1 }}</td>
                    <td>{{ $sensor->vol_2 }}</td>
                    <td>{{ $sensor->vol_3 }}</td>
                    @if($sensor->door_1 == 'On')
                    <td><span class="label label-primary">Cerrado--<div class="glyphicon glyphicon-check"></div></span></td>
                    @elseif($sensor->door_1 == 'Off')
                    <td><span class="label label-warning">Abierto--<div class="glyphicon glyphicon-exclamation-sign"></div></span></td>
                    @endif
                    {{-- <td>{{ $sensor->door_2 }}</td> --}}
                    @if($sensor->door_2 == 'On')
                    <td><span class="label label-primary">Cerrado--<div class="glyphicon glyphicon-check"></div></span></td>
                    @elseif($sensor->door_2 == 'Off')
                    <td><span class="label label-warning">Abierto--<div class="glyphicon glyphicon-exclamation-sign"></div></span></td>
                    @endif
                    {{-- <td>{{ $sensor->door_3 }}</td> --}}
                    @if($sensor->door_3 == 'On')
                    <td><span class="label label-primary">Cerrado--<div class="glyphicon glyphicon-check"></div></span></td>
                    @elseif($sensor->door_3 == 'Off')
                    <td><span class="label label-warning">Abierto--<div class="glyphicon glyphicon-exclamation-sign"></div></span></td>
                    @endif
                    {{-- <td>{{ $sensor->door_4 }}</td> --}}
                    @if($sensor->door_4 == 'On')
                    <td><span class="label label-primary">Cerrado--<div class="glyphicon glyphicon-check"></div></span></td>
                    @elseif($sensor->door_4 == 'Off')
                    <td><span class="label label-warning">Abierto--<div class="glyphicon glyphicon-exclamation-sign"></div></span></td>
                    @endif
                    {{-- <td>{{ $sensor->door_4 }}</td> --}}
                    @if($sensor->rlay_1 == 'On')
                    <td><span class="label label-success">Activo-----<div class="glyphicon glyphicon-ok"></div></span></td>
                    @elseif($sensor->rlay_1 == 'Off')
                    <td><span class="label label-danger">Inactivo--<div class="glyphicon glyphicon-remove"></div></span></td>
                    @endif
                    {{--<td>{{ $sensor->rlay_1 }}</td>--}}
                    @if($sensor->rlay_2 == 'On')
                    <td><span class="label label-success">Activo-----<div class="glyphicon glyphicon-ok"></div></span></td>
                    @elseif($sensor->rlay_2 == 'Off')
                    <td><span class="label label-danger">Inactivo--<div class="glyphicon glyphicon-remove"></div></span></td>
                    @endif
                    {{-- <td>{{ $sensor->rlay_2 }}</td> --}}
                    @if($sensor->rlay_3 == 'On')
                    <td><span class="label label-success">Activo-----<div class="glyphicon glyphicon-ok"></div></span></td>
                    @elseif($sensor->rlay_3 == 'Off')
                    <td><span class="label label-danger">Inactivo--<div class="glyphicon glyphicon-remove"></div></span></td>
                    @endif
                    {{-- <td>{{ $sensor->rlay_3 }}</td> --}}
                    @if($sensor->rlay_4 == 'On')
                    <td><span class="label label-success">Activo-----<div class="glyphicon glyphicon-ok"></div></span></td>
                    @elseif($sensor->rlay_4 == 'Off')
                    <td><span class="label label-danger">Inactivo--<div class="glyphicon glyphicon-remove"></div></span></td>
                    @endif
                    {{-- <td>{{ $sensor->rlay_4 }}</td> --}}
                    <td>{{ $sensor->text }}</td>
                    <td>{{ $sensor->created_at }}</td>
                    <td>{{ $sensor->updated_at }}</td>
                    <td>
                      <form role="form" action="{{ route('sensor.destroy',$sensor->id) }}" method="POST">
                      <a class="btn btn-info btn-xs" href="{{ route('sensor.show',$sensor->id) }}" role="button"><span class="fas fa-eye"></span></a> 
                      <a class="btn btn-warning btn-xs"  href="{{ route('sensor.edit',$sensor->id) }}" role="button"><span class="fas fa-pen"></span></a>
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
                  <th>Crd_Id</th>
                  <th>Erb_id</th>
                  <th>sensorSerie</th>
                  <th>Coins</th>
                  <th>Actualizado</th>
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

@section('footer') 
<div class="pull-right hidden-xs"><b>Version</b> 2.0.0<strong>  Copyright &copy; 2020 <a href="http://hotspot.local/home" target="_blank">Hotspot</a>.</strong>  Todo los derechos Reservados.</div> 
@stop

@section('css')
@toastr_css 
@stop

@section('js')
@toastr_js
@toastr_render
<script>
  $(function () {
     $('#sensorTable').DataTable({  
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