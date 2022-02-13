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

 <!-- Main content  Part Name : VST -->
 <!-- Part Size : 23.3 -->
 <section class="content">
      <div class="row">
        <div class="col-12">
          <div class="card card-warning card-outline">
            <div class="card-header">
              <h3 class="card-title">Editar Estadistico de Sensor</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
            <!-- form start -->
            <form role="form" action="{{ route('statisticalsensor.update',$statisticalsensor->id) }}" method="POST">
            @csrf
            @method('PUT')
              <div class="card-body">
                <!-- 'sensor_id', 'elements', 'aver_temper_glob', 'difer_const', 'sample', 'stat', 'start_time', 'pass_time', 'finish_time' -->
                <div class="form-group">
                  <label for="sensor_id">Sensor Id</label>
                  <input type="text" class="form-control" name="sensor_id" id="sensor_id"  placeholder="Introduce numero sensor id" required value="{{ $statisticalsensor->sensor_id }}" />
                </div>
                <div class="form-group">
                  <label for="elements">Elementos</label>
                  <input type="text" class="form-control" name="elements" id="elements"  placeholder="Introduce elementos" required value="{{ $statisticalsensor->elements }}" />
                </div>
                <div class="form-group">
                  <label for="aver_temper_glob">Temperatura Promedio</label>
                  <input type="text" class="form-control" name="aver_temper_glob" id="aver_temper_glob"  placeholder="Introduce hora de inicio" required value="{{ $statisticalsensor->aver_temper_glob }}" />
                </div>
                <div class="form-group">
                  <label for="difer_const">Diferencia de 20C°</label>
                  <input type="text" class="form-control" name="difer_const" id="difer_const"  placeholder="Introduce tiempo de desface" required value="{{ $statisticalsensor->difer_const }}" />
                </div>
                <div class="form-group">
                  <label for="start_time">Hora Inicio</label>
                  <input type="text" class="form-control" name="start_time" id="start_time"  placeholder="Introduce hora de fin" required value="{{ $statisticalsensor->start_time }}" />
                </div>
                <div class="form-group">
                  <label for="pass_time">Tiempo transcurrido en segundos</label>
                  <input type="text" class="form-control" name="pass_time" id="pass_time"  placeholder="Introduce tiempo total" required value="{{ $statisticalsensor->pass_time }}" />
                </div>
                <div class="form-group">
                  <label for="finish_time">Tiempo Fin</label>
                  <input type="text" class="form-control" name="finish_time" id="finish_time"  placeholder="Introduce tiempo total" required value="{{ $statisticalsensor->finish_time }}" />
                </div>
                <div class="form-group">
                  <label for="sample">Muestra</label>
                  <textarea class="form-control" name="sample" id="sample" required value="{{ $statisticalsensor->sample }}">{{ $statisticalsensor->sample }}</textarea>
                </div>
              </div>
              <!-- /.card-body -->

              <div class="card-footer">
                <a href="{{ route('statisticalsensor.index') }}" class="btn btn-default">Cancelar</a>
                <button type="submit" class="btn btn-warning pull-right" >Enviar</button>
              </div>
            </form>
          </div>
          <!-- /.card -->
          <!-- form-->
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
        var botmanWidget = {
            aboutText: 'Centro de Ayuda FJLIC',
            introMessage: "✋ Hola!! soy tu asistente IoT-Hotspot"
        };
</script>
<script src='https://cdn.jsdelivr.net/npm/botman-web-widget@0/build/js/widget.js'></script>
@stop