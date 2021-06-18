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
              <h3 class="card-title">Tabla de Sensores</h3>
              <a class="btn btn-xs btn-success float-right" href="{{ route('sensor.create') }}" role="button"><span class="fa fa-plus"></span></a>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="sensorTable" class="table table-bordered table-striped">
                <thead>
                <tr>
                  {{-- <th>Id</th>  --}}
                  <th>Id_Erb</th>
                  <th>NumSer</th>
                  {{-- <th>Passw</th>  --}}
                  <th>Temp1</th>
                  <th>Temp2</th>
                  <th>Temp3</th>
                  <th>Temp4</th>
                  <th>Volt1</th>
                  <th>Volt2</th>
                  <th>Volt3</th>
                  <th>Prt1</th>
                  <th>Prt2</th>
                  <th>Prt3</th>
                  <th>Prt4</th>
                  <th>Rly1</th>
                  <th>Rly2</th>
                  <th>Rly3</th>
                  <th>Rly4</th>
                  <th>Text</th>
                 {{--  <th>FechaCreacion</th>  --}}
                  <th>FechaMod</th> 
                  <th>Acciones</th>
                </tr>
                </thead>
                <tbody>
                @foreach($sensors as $sensor)
                <tr>
                    {{-- <td>{{ $sensor->id }}</td>  --}}
                    <td>{{ $sensor->erb_id }}</td>
                    <td>{{ $sensor->num_serie }}</td>
                   {{-- <td>{{ $sensor->passw }}</td>  --}}
                    <td>{{ $sensor->temp_1 }}</td>
                    <td>{{ $sensor->temp_2 }}</td>
                    <td>{{ $sensor->temp_3 }}</td>
                    <td>{{ $sensor->temp_4 }}</td>
                    @if($sensor->vol_1 == 'On')
                    <td><span class="badge badge-success">On-<div class="fa fa-toggle-on"></div></span></td>
                    @elseif($sensor->vol_1 == 'Off')
                    <td><span class="badge badge-danger">Off-<div class="fa fa-toggle-off"></div></span></td>
                    @endif
                    @if($sensor->vol_2 == 'On')
                    <td><span class="badge badge-success">On-<div class="fa fa-toggle-on"></div></span></td>
                    @elseif($sensor->vol_2 == 'Off')
                    <td><span class="badge badge-danger">Off-<div class="fa fa-toggle-off"></div></span></td>
                    @endif
                    @if($sensor->vol_3 == 'On')
                    <td><span class="badge badge-success">On-<div class="fa fa-toggle-on"></div></span></td>
                    @elseif($sensor->vol_3 == 'Off')
                    <td><span class="badge badge-danger">Off-<div class="fa fa-toggle-off"></div></span></td>
                    @endif
                    @if($sensor->door_1 == 'On')
                    <td><span class="badge badge-primary">Close-<div class="fa fa-check-circle"></div></span></td>
                    @elseif($sensor->door_1 == 'Off')
                    <td><span class="badge badge-warning">Open-<div class="fa fa-exclamation-circle"></div></span></td>
                    @endif
                    {{-- <td>{{ $sensor->door_2 }}</td> --}}
                    @if($sensor->door_2 == 'On')
                    <td><span class="badge badge-primary">Close-<div class="fa fa-check-circle"></div></span></td>
                    @elseif($sensor->door_2 == 'Off')
                    <td><span class="badge badge-warning">Open-<div class="fa fa-exclamation-circle"></div></span></td>
                    @endif
                    {{-- <td>{{ $sensor->door_3 }}</td> --}}
                    @if($sensor->door_3 == 'On')
                    <td><span class="badge badge-primary">Close-<div class="fa fa-check-circle"></div></span></td>
                    @elseif($sensor->door_3 == 'Off')
                    <td><span class="badge badge-warning">Open-<div class="fa fa-exclamation-circle"></div></span></td>
                    @endif
                    {{-- <td>{{ $sensor->door_4 }}</td> --}}
                    @if($sensor->door_4 == 'On')
                    <td><span class="badge badge-primary">Close-<div class="fa fa-check-circle"></div></span></td>
                    @elseif($sensor->door_4 == 'Off')
                    <td><span class="badge badge-warning">Open-<div class="fa fa-exclamation-circle"></div></span></td>
                    @endif
                    {{-- <td>{{ $sensor->door_4 }}</td> --}}
                    @if($sensor->rlay_1 == 'On')
                    <td><span class="badge badge-success">On-<div class="fa fa-toggle-on"></div></span></td>
                    @elseif($sensor->rlay_1 == 'Off')
                    <td><span class="badge badge-danger">Off-<div class="fa fa-toggle-off"></div></span></td>
                    @endif
                    {{--<td>{{ $sensor->rlay_1 }}</td>--}}
                    @if($sensor->rlay_2 == 'On')
                    <td><span class="badge badge-success">On-<div class="fa fa-toggle-on"></div></span></td>
                    @elseif($sensor->rlay_2 == 'Off')
                    <td><span class="badge badge-danger">Off-<div class="fa fa-toggle-off"></div></span></td>
                    @endif
                    {{-- <td>{{ $sensor->rlay_2 }}</td> --}}
                    @if($sensor->rlay_3 == 'On')
                    <td><span class="badge badge-success">On-<div class="fa fa-toggle-on"></div></span></td>
                    @elseif($sensor->rlay_3 == 'Off')
                    <td><span class="badge badge-danger">Off-<div class="fa fa-toggle-off"></div></span></td>
                    @endif
                    {{-- <td>{{ $sensor->rlay_3 }}</td> --}}
                    @if($sensor->rlay_4 == 'On')
                    <td><span class="badge badge-success">On-<div class="fa fa-toggle-on"></div></span></td>
                    @elseif($sensor->rlay_4 == 'Off')
                    <td><span class="badge badge-danger">Off-<div class="fa fa-toggle-off"></div></span></td>
                    @endif
                    <td>{{ $sensor->text }}</td>
                   {{-- <td>{{ $sensor->created_at }}</td>  --}}
                   <td>{{ $sensor->updated_at }}</td>
                    <td>
                      <form role="form" action="{{ route('sensor.destroy',$sensor->id) }}" method="POST">
                        <a class="btn btn-primary btn-xs" href="{{ route('sensor.chart',$sensor->id) }}" role="button"><span class="fa fa-chart-pie"></span></a>   
                      <a class="btn btn-info btn-xs" href="{{ route('sensor.show',$sensor->id) }}" role="button"><span class="fa fa-eye"></span></a> 
                      <a class="btn btn-warning btn-xs"  href="{{ route('sensor.edit',$sensor->id) }}" role="button"><span class="fa fa-pen"></span></a>
                      @csrf
                      @method('DELETE')
                      <a href="" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#exampleModalCenter{{$sensor->id}}"><span class="fas fa-trash"></span></a>
                      <!------ ESTE ES EL MODAL QUE SE MUESTRA AL DAR CLICK EN EL BOTON "ELIMINAR" ------>
                      <div class="modal fade" id="exampleModalCenter{{$sensor->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
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
                          <p class="text-center">Eliminarás ( <b>{{$sensor->num_serie}}</b> ) seguro?</p>
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
                  <th>Id_Erb</th>
                  <th>NumSer</th>
                  {{-- <th>Passw</th>  --}}
                  <th>Vol1</th>
                  <th>Vol2</th>
                  <th>Vol3</th>
                  <th>Prt1</th>
                  <th>Prt2</th>
                  <th>Prt3</th>
                  <th>Prt4</th>
                  <th>Rly1</th>
                  <th>Rly2</th>
                  <th>Rly3</th>
                  <th>Rly4</th>
                  <th>Text</th>
                 {{--  <th>FechaCreacion</th>  --}}
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
<div class="pull-right hidden-xs"><b>Version</b> 2.0.1<strong>  Copyright &copy; 2021 <a href="http://hotspot.fjlic.com/home" target="_blank">Hotspot</a>.</strong>  Todo los derechos Reservados.</div> 
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