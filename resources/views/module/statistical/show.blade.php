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
          <div class="card card-info card-outline">
            <div class="card-header">
              <h3 class="card-title">Ver Id Estadistico</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
            <form role="form">
              <div class="card-body">
                <!-- 'id', 'sensor_id', 'elements', 'start_time', 'finish_time', 'total_time', 'difer_time', 'sample' -->
                <div class="form-group">
                  <label for="id">Id</label>
                  <input type="text" class="form-control" value="{{ $statistical->id }}" readonly="readonly"/>
                </div>
                <div class="form-group">
                  <label for="id">Sensor Id</label>
                  <input type="text" class="form-control" value="{{ $statistical->sensor_id }}" readonly="readonly"/>
                </div>
                <div class="form-group">
                  <label for="elements">Tamaño de la muestra</label>
                  <input type="text" class="form-control" value="{{ $statistical->elements }}" readonly="readonly"/>
                </div>
                <div class="form-group">
                  <label for="start_time">Tiempo inicio</label>
                  <input type="text" class="form-control" value="{{ $statistical->start_time }}" readonly="readonly"/>
                </div>
                <div class="form-group">
                  <label for="finish_time">Tiempo fin</label>
                  <input type="text" class="form-control" value="{{ $statistical->finish_time }}" readonly="readonly"/>
                </div>
                <div class="form-group">
                  <label for="total_time">Tiempo total</label>
                  <input type="text" class="form-control" value="{{ $statistical->total_time }}" readonly="readonly"/>
                </div>
                <div class="form-group">
                  <label for="difer_time">Tiempo desface (+/-)</label>
                  <input type="text" class="form-control" value="{{ $statistical->difer_time }}" readonly="readonly"/>
                </div>
              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <a href="{{ route('statistical.index') }}" class="btn btn-info pull-right">Regresar</a>
                <a href="" class="btn btn-primary" data-toggle="modal" data-target="#ModalSt{{$statistical->id}}"><span>Datos-Muestra</span></a>
                <!------ ESTE ES EL MODAL QUE SE MUESTRA AL DAR CLICK EN EL BOTON "ELIMINAR" ------>
                <div class="modal fade" id="ModalSt{{$statistical->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                  <div class="modal-dialog modal-dialog-centered" role="document">
                  <div class="modal-content">
                  <div class="modal-header d-flex justify-content-center">
                    <h5 class="modal-title" id="exampleModalCenterTitle">Datos de la Muestra ({{$statistical->id}})</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                      <div class="modal-body" style="text-align: center">
                        <a><p class="text-center">{{ $statistical->sample }}</p></a>
                      </div>
                  </div>
                  <div class="modal-footer d-flex justify-content-center">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                  </div>
                  </div>
                  </div>
                  </div>
                <!--fin modal-->
              </div>
            </form>
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
@stop