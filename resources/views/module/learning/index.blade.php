@extends('adminlte::page')
@section('title', 'Hotspot-Aprendizaje')
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
              <h3 class="card-title">Predicciones</h3>
              <a class="btn btn-xs btn-success float-right" href="{{ route('learning.create') }}" role="button"><span class="fas fa-plus"></span></a>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="learningTable" class="table table-bordered table-striped">
              <thead>
                <!-- 'id', 'statistical_id', 'elements', 'start_time', 'finish_time', 'total_time', 'difer_time', 'sample' -->
                <tr>
                  <th>Id</th>
                  <th>Id Estadistico</th>
                  <th>Elementos</th>
                  <th>Hora Inicio</th>
                  <th>Hora Fin</th>
                  <th>Tiempo Total</th>
                  <th>Diferencia</th>
                  <th>Muestra</th>
                  {{-- <th>FechaCreacion</th> --}}
                  <th>FechaMod</th>
                  <th>Acciones</th>
                </tr>
                </thead>
                <tbody>
                @foreach($learnings as $learning)
                <tr>
                    <td>{{ $learning->id }}</td>
                    <td>{{ $learning->statistical_id }}</td>
                    <td>{{ $learning->elements }}</td>
                    <td>{{ $learning->start_time }}</td>
                    <td>{{ $learning->finish_time }}</td>
                    <td>{{ $learning->total_time }}</td>
                    <td>{{ $learning->difer_time }}</td>
                    <td><a href="" class="btn btn-primary btn-xs" data-toggle="modal" data-target="#ModalSt{{$learning->id}}"><span>Datos-Muestra</span></a>
                    <!------ ESTE ES EL MODAL QUE SE MUESTRA AL DAR CLICK EN EL BOTON PARA VER ------>
                    <div class="modal fade" id="ModalSt{{$learning->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                      <div class="modal-dialog modal-dialog-centered" role="document">
                      <div class="modal-content">
                      <div class="modal-header d-flex justify-content-center">
                        <h5 class="modal-title" id="exampleModalCenterTitle">Datos de la Muestra ({{$learning->id}})</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                          <div class="modal-body" style="text-align: center">
                            <a><p class="text-center">{{ $learning->sample }}</p></a>
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
                   {{--  <td>{{ $learning->created_at }}</td>  --}}
                    <td>{{ $learning->updated_at }}</td>
                    <td>
                      <form role="form" action="{{ route('learning.destroy',$learning->id) }}" method="POST">
                      <a class="btn btn-info btn-xs" href="{{ route('learning.show',$learning->id) }}" role="button"><span class="fas fa-eye"></span></a> 
                      <a class="btn btn-warning btn-xs"  href="{{ route('learning.edit',$learning->id) }}" role="button"><span class="fas fa-pen"></span></a>
                      @csrf
                      @method('DELETE')
                      <a href="" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#exampleModalCenter{{$learning->id}}"><span class="fas fa-trash"></span></a>
                      <!------ ESTE ES EL MODAL QUE SE MUESTRA AL DAR CLICK EN EL BOTON "ELIMINAR" ------>
                      <div class="modal fade" id="exampleModalCenter{{$learning->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
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
                          <p class="text-center">Eliminarás el registro ( <b>{{$learning->id}}</b> ) seguro?</p>
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
     $('#learningTable').DataTable({  
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