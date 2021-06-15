@extends('adminlte::page')
@section('title', 'Hotspot-Historial-Sensor')
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
              <h3 class="card-title">Tabla de Historial Sensores</h3>
              <a class="btn btn-xs btn-success float-right" href="{{ route('historialsensor.create') }}" role="button"><span class="fa fa-plus"></span></a>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="historialsensorTable" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Id</th>
                  <th>Sensor</th>
                  <th>NumSer</th>
                  <th>Passw</th>
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
                  <th>FechaCre</th>
                  {{-- <th>FechaMoficiacion</th>  --}}
                  {{-- <th>Acciones</th>  --}}
                </tr>
                </thead>
                <tbody>
                @foreach($historialsensors as $historialsensor)
                <tr>
                    <td>{{ $historialsensor->id }}</td>
                    <td>{{ $historialsensor->sensor_id }}</td>
                    <td>{{ $historialsensor->num_serie }}</td>
                    <td>{{ $historialsensor->passw }}</td>
                    <td>{{ $historialsensor->vol_1 }}</td>
                    <td>{{ $historialsensor->vol_2 }}</td>
                    <td>{{ $historialsensor->vol_3 }}</td>
                    @if($historialsensor->door_1 == 'On')
                    <td><span class="badge badge-primary">Close-<div class="fa fa-check-circle"></div></span></td>
                    @elseif($historialsensor->door_1 == 'Off')
                    <td><span class="badge badge-warning">Open-<div class="fa fa-exclamation-circle"></div></span></td>
                    @endif
                    {{-- <td>{{ $historialsensor->door_2 }}</td> --}}
                    @if($historialsensor->door_2 == 'On')
                    <td><span class="badge badge-primary">Close-<div class="fa fa-check-circle"></div></span></td>
                    @elseif($historialsensor->door_2 == 'Off')
                    <td><span class="badge badge-warning">Open-<div class="fa fa-exclamation-circle"></div></span></td>
                    @endif
                    {{-- <td>{{ $historialsensor->door_3 }}</td> --}}
                    @if($historialsensor->door_3 == 'On')
                    <td><span class="badge badge-primary">Close-<div class="fa fa-check-circle"></div></span></td>
                    @elseif($historialsensor->door_3 == 'Off')
                    <td><span class="badge badge-warning">Open-<div class="fa fa-exclamation-circle"></div></span></td>
                    @endif
                    {{-- <td>{{ $historialsensor->door_4 }}</td> --}}
                    @if($historialsensor->door_4 == 'On')
                    <td><span class="badge badge-primary">Close-<div class="fa fa-check-circle"></div></span></td>
                    @elseif($historialsensor->door_4 == 'Off')
                    <td><span class="badge badge-warning">Open-<div class="fa fa-exclamation-circle"></div></span></td>
                    @endif
                    {{-- <td>{{ $historialsensor->door_4 }}</td> --}}
                    @if($historialsensor->rlay_1 == 'On')
                    <td><span class="badge badge-success">On-<div class="fa fa-toggle-on"></div></span></td>
                    @elseif($historialsensor->rlay_1 == 'Off')
                    <td><span class="badge badge-danger">Off-<div class="fa fa-toggle-off"></div></span></td>
                    @endif
                    {{--<td>{{ $historialsensor->rlay_1 }}</td>--}}
                    @if($historialsensor->rlay_2 == 'On')
                    <td><span class="badge badge-success">On-<div class="fa fa-toggle-on"></div></span></td>
                    @elseif($historialsensor->rlay_2 == 'Off')
                    <td><span class="badge badge-danger">Off-<div class="fa fa-toggle-off"></div></span></td>
                    @endif
                    {{-- <td>{{ $historialsensor->rlay_2 }}</td> --}}
                    @if($historialsensor->rlay_3 == 'On')
                    <td><span class="badge badge-success">On-<div class="fa fa-toggle-on"></div></span></td>
                    @elseif($historialsensor->rlay_3 == 'Off')
                    <td><span class="badge badge-danger">Off-<div class="fa fa-toggle-off"></div></span></td>
                    @endif
                    {{-- <td>{{ $historialsensor->rlay_3 }}</td> --}}
                    @if($historialsensor->rlay_4 == 'On')
                    <td><span class="badge badge-success">On-<div class="fa fa-toggle-on"></div></span></td>
                    @elseif($historialsensor->rlay_4 == 'Off')
                    <td><span class="badge badge-danger">Off-<div class="fa fa-toggle-off"></div></span></td>
                    @endif
                    <td>{{ $historialsensor->text }}</td>
                    <td>{{ $historialsensor->created_at }}</td>
                    {{-- <td>{{ $historialsensor->updated_at }}</td>  --}}
                    {{--  <td>
                      <form role="form" action="{{ route('historialsensor.destroy',$historialsensor->id) }}" method="POST">
                        <a class="btn btn-primary btn-xs" href="{{ route('historialsensor.chart',$historialsensor->id) }}" role="button"><span class="fa fa-chart-pie"></span></a>   
                      <a class="btn btn-info btn-xs" href="{{ route('historialsensor.show',$historialsensor->id) }}" role="button"><span class="fa fa-eye"></span></a> 
                      <a class="btn btn-warning btn-xs"  href="{{ route('historialsensor.edit',$historialsensor->id) }}" role="button"><span class="fa fa-pen"></span></a>
                      @csrf
                      @method('DELETE')
                      <button class="btn btn-danger btn-xs" type="submit"><span class="fa fa-trash"></span></button>
                      </form>
                    </td>  --}}
                </tr>
                @endforeach
                </tbody>
               <!-- <tfoot>
                <tr>
                 <th>Id</th>
                  <th>Id_sensor</th>
                  <th>NumSer</th>
                  <th>Passw</th>
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
                  <th>FechaCreacion</th>
                  {{-- <th>FechaMoficiacion</th>  --}}
                  {{-- <th>Acciones</th>  --}}
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
     $('#historialsensorTable').DataTable({  
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