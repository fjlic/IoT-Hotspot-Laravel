@extends('adminlte::page')
@section('title', 'Hotspot|Prediction')
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
              <h3 class="card-title">Sensor Predictions</h3>
              <a class="btn btn-xs btn-success float-right" href="{{ route('learningsensor.create') }}" role="button"><span class="fas fa-plus"></span></a>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="learningSensorTable" class="table table-bordered table-striped">
              <thead>
                <!-- 'statistical_sensor_id', 'elements', 'start_time', 'pass_time', 'finish_time', 'aver_temper_glob', 'difer_const', 'sample' -->
                <tr>
                  <th>Id</th>
                  <th>Statistical Id</th>
                  <th>Elements</th>
                  <th>Temperature</th>
                  <th>Dif 20-C°</th>
                  <th>Start Time</th>
                  <th>Elaps Time</th>
                  <th>End Time</th>
                  <th>Sample</th>
                  {{-- <th>FechaCreacion</th> --}}
                  {{-- <th>DateMod</th> --}}
                  <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                @foreach($learningsensors as $learningsensor)
                <tr>
                    <td>{{ $learningsensor->id }}</td>
                    <td>{{ $learningsensor->statistical_sensor_id }}</td>
                    <td>{{ $learningsensor->elements }}</td>
                    @if($learningsensor->aver_temper_glob >= 0 && $learningsensor->aver_temper_glob <= 30)
                    <td><span class="badge badge-success">{{ $learningsensor->aver_temper_glob }} = <div class="fa fa-check-circle"></div></span></td>
                    @elseif($learningsensor->aver_temper_glob >= 30.1 && $learningsensor->aver_temper_glob <= 60)
                    <td><span class="badge badge-warning">{{ $learningsensor->aver_temper_glob }} = <div class="fa fa-exclamation-circle"></div></span></td>
                    @elseif($learningsensor->aver_temper_glob >= 60.1 && $learningsensor->aver_temper_glob <= 100)
                    <td><span class="badge badge-danger">{{ $learningsensor->aver_temper_glob }} = <div class="fa fa-times-circle"></div></span></td>
                    @endif
                    <td>{{ $learningsensor->difer_const }}</td>
                    <td>{{ $learningsensor->start_time }}</td>
                    <td>{{ $learningsensor->pass_time }}</td>
                    <td>{{ $learningsensor->finish_time }}</td>
                    <td><a href="" class="btn btn-primary btn-xs" data-toggle="modal" data-target="#ModalSt{{$learningsensor->id}}"><span>Sample-Data</span></a>
                    <!------ ESTE ES EL MODAL QUE SE MUESTRA AL DAR CLICK EN EL BOTON PARA VER ------>
                    <div class="modal fade" id="ModalSt{{$learningsensor->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                      <div class="modal-dialog modal-dialog-centered" role="document">
                      <div class="modal-content">
                      <div class="modal-header d-flex justify-content-center">
                        <h5 class="modal-title" id="exampleModalCenterTitle">Sample Data ({{$learningsensor->id}})</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                          <div class="modal-body" style="text-align: center">
                            <a><p class="text-center">{{ $learningsensor->sample }}</p></a>
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
                   {{--  <td>{{ $learningsensor->created_at }}</td> --}}
                   {{-- <td>{{ $learningsensor->updated_at }}</td> --}}
                    <td>
                      <form role="form" action="{{ route('learningsensor.destroy',$learningsensor->id) }}" method="POST">
                      <a class="btn btn-primary btn-xs" href="{{ route('learningsensor.chart',$learningsensor->id) }}" role="button"><span class="fa fa-chart-pie"></span></a>
                      <a class="btn btn-info btn-xs" href="{{ route('learningsensor.show',$learningsensor->id) }}" role="button"><span class="fa fa-eye"></span></a> 
                      <a class="btn btn-warning btn-xs"  href="{{ route('learningsensor.edit',$learningsensor->id) }}" role="button"><span class="fa fa-pen"></span></a>
                      @csrf
                      @method('DELETE')
                      <a href="" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#exampleModalCenter{{$learningsensor->id}}"><span class="fas fa-trash"></span></a>
                      <!------ THIS IS THE MODAL THAT IS DISPLAYED WHEN YOU CLICK ON THE "DELETE" BUTTON" ------>
                      <div class="modal fade" id="exampleModalCenter{{$learningsensor->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
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
                          <p class="text-center">You will delete the record ( <b>{{$learningsensor->id}}</b> ) are you sure ?</p>
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
     $('#learningSensorTable').DataTable({  
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