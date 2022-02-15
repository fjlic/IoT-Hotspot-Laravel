@extends('adminlte::page')
@section('title', 'Hotspot|Statistical')
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

 <!-- Main content Part Name : VST -->
 <!-- Part Size : 23.3 -->
 <section class="content">
      <div class="row">
        <div class="col-12">
          <div class="card card-primary card-outline">
            <div class="card-header">
              <h3 class="card-title">Samples Statistical Sensor</h3>
              {{--  <h3 class="card-title">Samples Statistical Sensor</h3>  --}}
              <a class="btn btn-xs btn-success float-right" href="{{ route('statisticalsensor.create') }}" role="button"><span class="fas fa-plus"></span></a>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="statisticalSensorTable" class="table table-bordered table-striped">
              <thead>
                 <!-- 'sensor_id', 'elements', 'aver_temper_glob', 'difer_const', 'sample', 'stat', 'start_time', 'pass_time', 'finish_time',  -->
                <tr>
                  <th>Id</th>
                  <th>Id Sensor</th>
                  <th>Elements</th>
                  <th>Temperature</th>
                  <th>Dif 20-C°</th>
                  <th>Start Time</th>
                  <th>Elaps Time</th>
                  <th>Fin Time</th>
                  <th>Sample</th>
                  {{-- <th>FechaCre</th> --}}
                  {{-- <th>DateMod</th> --}}
                  <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                @foreach($statisticalsensors as $statisticalsensor)
                <tr>
                    <td>{{ $statisticalsensor->id }}</td>
                    <td>{{ $statisticalsensor->sensor_id }}</td>
                    <td>{{ $statisticalsensor->elements }}</td>
                    @if($statisticalsensor->aver_temper_glob >= 0 && $statisticalsensor->aver_temper_glob <= 30)
                    <td><span class="badge badge-success">{{ $statisticalsensor->aver_temper_glob }} = <div class="fa fa-check-circle"></div></span></td>
                    @elseif($statisticalsensor->aver_temper_glob >= 30.1 && $statisticalsensor->aver_temper_glob <= 60)
                    <td><span class="badge badge-warning">{{ $statisticalsensor->aver_temper_glob }} = <div class="fa fa-exclamation-circle"></div></span></td>
                    @elseif($statisticalsensor->aver_temper_glob >= 60.1 && $statisticalsensor->aver_temper_glob <= 100)
                    <td><span class="badge badge-danger">{{ $statisticalsensor->aver_temper_glob }} = <div class="fa fa-times-circle"></div></span></td>
                    @endif
                    <td>{{ $statisticalsensor->difer_const }}</td>
                    <td>{{ $statisticalsensor->start_time }}</td>
                    <td>{{ $statisticalsensor->pass_time }}</td>
                    <td>{{ $statisticalsensor->finish_time }}</td>
                    <td><a href="" class="btn btn-primary btn-xs" data-toggle="modal" data-target="#ModalSt{{$statisticalsensor->id}}"><span>Sample-Data</span></a>
                    <!------ ESTE ES EL MODAL QUE SE MUESTRA AL DAR CLICK EN EL BOTON "ELIMINAR" ------>
                    <div class="modal fade" id="ModalSt{{$statisticalsensor->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                      <div class="modal-dialog modal-dialog-centered" role="document">
                      <div class="modal-content">
                      <div class="modal-header d-flex justify-content-center">
                        <h5 class="modal-title" id="exampleModalCenterTitle">Sample Data ({{$statisticalsensor->id}})</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Cerrar">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                          <div class="modal-body" style="text-align: center">
                            <a><p class="text-center">{{ $statisticalsensor->sample }}</p></a>
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
                   {{-- <td>{{ $statisticalsensor->created_at }}</td> --}}
                   {{-- <td>{{ $statisticalsensor->updated_at }}</td> --}}
                    <td>
                      <form role="form" action="{{ route('statisticalsensor.destroy',$statisticalsensor->id) }}" method="POST">
                      <a class="btn btn-info btn-xs" href="{{ route('statisticalsensor.show',$statisticalsensor->id) }}" role="button"><span class="fas fa-eye"></span></a> 
                      <a class="btn btn-warning btn-xs"  href="{{ route('statisticalsensor.edit',$statisticalsensor->id) }}" role="button"><span class="fas fa-pen"></span></a>
                      @csrf
                      @method('DELETE')
                      <a href="" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#exampleModalCenter{{$statisticalsensor->id}}"><span class="fas fa-trash"></span></a>
                      <!------ ESTE ES EL MODAL QUE SE MUESTRA AL DAR CLICK EN EL BOTON "ELIMINAR" ------>
                      <div class="modal fade" id="exampleModalCenter{{$statisticalsensor->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
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
                          <p class="text-center">You will delete the record ( <b>{{$statisticalsensor->id}}</b> ) are you sure ?</p>
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
                  <th>Tamaño Estimado</th>
                  <th>Horas Desarollo</th>
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

<!--------------------------------------------------------------------------------------------------------------------------------------------------> 

<!-- Main content Part Name : VST -->
 <!-- Part Size : 23.3 -->
 <section class="content">
  <div class="row">
    <div class="col-12">
      <div class="card card-primary card-outline">
        <div class="card-header">
          <h3 class="card-title">Statistical Results of Sensors</h3>
          {{--  <h3 class="card-title">Statistical Results</h3>  --}}
        </div>
        <!-- /.card-header -->
        <div class="card-body">
          <table id="statisticalSensorTable2" class="table table-bordered table-striped">
          <thead>
             <!-- /.card-header 'id', 'estimate_proxy_size', 'development_hours' -->
            <tr>
              <th>Sample Id</th>
             {{-- <th>Id Sensor</th>  --}}
              <th>Correlation</th>
              <th>Arithmetic Average</th>
              <th>Median</th>
              <th>Mode</th>
              <th>Standard Deviation</th>
              {{-- <th>DateMod</th> --}}
            </tr>
            </thead>
            <tbody>
            @foreach($statisticalsensors as $statisticalsensor)
            <tr>
                <td>{{ $statisticalsensor->id }}</td>
                {{-- <td>{{ $statisticalsensor->sensor_id }}</td>  --}}
                <td>{{ $statisticalsensor->pearsoncorrelation }}</td>
                <td>{{ $statisticalsensor->meanarithmetic }}</td>
                <td>{{ $statisticalsensor->meanmedian }}</td>
                <td>{{ $statisticalsensor->meanmode }}</td>
                <td>{{ $statisticalsensor->standartdesviation }}</td>
                {{-- <td>{{ $statisticalsensor->updated_at }}</td> --}}
            </tr>
            @endforeach
            </tbody>
           <!-- <tfoot>
             <tr>
              <th>Id Muestra</th>
              <th>Correlacion</th>
              <th>Media Aritmetica</th>
              <th>Mediana</th>
              <th>Moda</th>
              <th>Desviacion Estandar</th>
              <th>FechaMod</th>
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
<div class="pull-right hidden-xs"><b>Version</b> 2.1.1<strong>  Copyright &copy; 2022 <a href="http://hotspot.fjlic.com/home" target="_blank">Hotspot</a>.</strong>  All rights reserved.</div> 
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
     $('#statisticalSensorTable').DataTable({  
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
  $(function () {
     $('#statisticalSensorTable2').DataTable({  
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