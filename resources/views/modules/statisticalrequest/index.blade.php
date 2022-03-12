@extends('adminlte::page')
@section('title', 'Hotspot|Estadistico')
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
              <h3 class="card-title">Muestras Estadistico de Peticiones</h3>
              {{--  <h3 class="card-title">Samples Statistical Sensor</h3>  --}}
              <a class="btn btn-xs btn-success float-right" href="{{ route('statisticalrequest.create') }}" role="button"><span class="fas fa-plus"></span></a>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="statisticalRequestTable" class="table table-bordered table-striped">
              <thead>
                 <!-- /.card-header 'id', 'estimate_proxy_size', 'development_hours' -->
                <tr>
                  <th>Id</th>
                  <th>Id Sensor</th>
                  <th>Element</th>
                  <th>Tmp Inicio</th>
                  <th>Tmp Fin</th>
                  <th>Total Sec</th>
                  <th>Difer</th>
                  <th>Muestra</th>
                  {{-- <th>FechaCre</th> --}}
                  {{-- <th>DateMod</th> --}}
                  <th>Acciones</th>
                </tr>
                </thead>
                <tbody>
                @foreach($statisticalrequests as $statisticalrequest)
                <tr>
                    <td>{{ $statisticalrequest->id }}</td>
                    <td>{{ $statisticalrequest->sensor_id }}</td>
                    <td>{{ $statisticalrequest->elements }}</td>
                    <td>{{ $statisticalrequest->start_time }}</td>
                    <td>{{ $statisticalrequest->finish_time }}</td>
                    <td>{{ $statisticalrequest->total_time }}</td>
                    <td>{{ $statisticalrequest->difer_time }}</td>
                    <td><a href="" class="btn btn-primary btn-xs" data-toggle="modal" data-target="#ModalSt{{$statisticalrequest->id}}"><span>Datos-Muestra</span></a>
                    <!------ ESTE ES EL MODAL QUE SE MUESTRA AL DAR CLICK EN EL BOTON "ELIMINAR" ------>
                    <div class="modal fade" id="ModalSt{{$statisticalrequest->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                      <div class="modal-dialog modal-dialog-centered" role="document">
                      <div class="modal-content">
                      <div class="modal-header d-flex justify-content-center">
                        <h5 class="modal-title" id="exampleModalCenterTitle">Datos de la Muestra ({{$statisticalrequest->id}})</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Cerrar">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                          <div class="modal-body" style="text-align: center">
                            <a><p class="text-center">{{ $statisticalrequest->sample }}</p></a>
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
                   {{-- <td>{{ $statisticalrequest->created_at }}</td> --}}
                   {{-- <td>{{ $statisticalrequest->updated_at }}</td> --}}
                    <td>
                      <form role="form" action="{{ route('statisticalrequest.destroy',$statisticalrequest->id) }}" method="POST">
                      <a class="btn btn-info btn-xs" href="{{ route('statisticalrequest.show',$statisticalrequest->id) }}" role="button"><span class="fas fa-eye"></span></a> 
                      <a class="btn btn-warning btn-xs"  href="{{ route('statisticalrequest.edit',$statisticalrequest->id) }}" role="button"><span class="fas fa-pen"></span></a>
                      @csrf
                      @method('DELETE')
                      <a href="" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#exampleModalCenter{{$statisticalrequest->id}}"><span class="fas fa-trash"></span></a>
                      <!------ ESTE ES EL MODAL QUE SE MUESTRA AL DAR CLICK EN EL BOTON "ELIMINAR" ------>
                      <div class="modal fade" id="exampleModalCenter{{$statisticalrequest->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
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
                          <p class="text-center">Eliminarás el registro ( <b>{{$statisticalrequest->id}}</b> ) seguro?</p>
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
          <h3 class="card-title">Resultados Estadisticos de Peticiones</h3>
          {{--  <h3 class="card-title">Statistical Results</h3>  --}}
        </div>
        <!-- /.card-header -->
        <div class="card-body">
          <table id="statisticalRequestTable2" class="table table-bordered table-striped">
          <thead>
             <!-- /.card-header 'id', 'estimate_proxy_size', 'development_hours' -->
            <tr>
              <th>Id Muestra</th>
             {{-- <th>Id Sensor</th>  --}}
              <th>Correlacion</th>
              <th>Media Aritmetica</th>
              <th>Mediana</th>
              <th>Moda</th>
              <th>Deviacion Estandar</th>
              {{-- <th>DateMod</th> --}}
            </tr>
            </thead>
            <tbody>
            @foreach($statisticalrequests as $statisticalrequest)
            <tr>
                <td>{{ $statisticalrequest->id }}</td>
                {{-- <td>{{ $statisticalrequest->sensor_id }}</td>  --}}
                <td>{{ $statisticalrequest->pearsoncorrelation }}</td>
                <td>{{ $statisticalrequest->meanarithmetic }}</td>
                <td>{{ $statisticalrequest->meanmedian }}</td>
                <td>{{ $statisticalrequest->meanmode }}</td>
                <td>{{ $statisticalrequest->standartdesviation }}</td>
                {{-- <td>{{ $statisticalrequest->updated_at }}</td> --}}
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
<div class="pull-right hidden-xs"><b>Version</b> 2.0.1<strong>  Copyright &copy; 2021 <a href="http://hotspot.fjlic.com/home" target="_blank">Hotspot</a>.</strong>  Todo los derechos Reservados.</div> 
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
     $('#statisticalRequestTable').DataTable({  
      'paging'      : true,
      'lengthChange': true,
      'searching'   : true,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false,
      'scrollX'     : true,
      'scrollY'     : false,
      'scrollCollapse': false
      //'language': {'url': '//cdn.datatables.net/plug-ins/1.10.15/i18n/Spanish.json'}   
    })
  });
</script>

<script>
  $(function () {
     $('#statisticalRequestTable2').DataTable({  
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
<script>
        var botmanWidget = {
            aboutText: 'Centro de Ayuda FJLIC',
            introMessage: "✋ Hola!! soy tu asistente IoT-Hotspot"
        };
</script>
<script src='https://cdn.jsdelivr.net/npm/botman-web-widget@0/build/js/widget.js'></script>
@stop