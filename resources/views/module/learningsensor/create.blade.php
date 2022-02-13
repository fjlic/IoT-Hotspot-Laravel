@extends('adminlte::page')
@section('title', 'Hotspot|Prediccion')
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
            <div class="card card-success card-outline">
            <div class="card-header">
              <h3 class="card-title">Crear Muestra Predictiva de Sensores</h3>
            </div>
            <!-- 'statistical_sensor_id', 'elements', 'start_time', 'pass_time', 'finish_time', 'aver_temper_glob', 'difer_const', 'sample' -->
            <div class="card-body">
            <!-- form start -->
            <form role="form" action="{{ route('learningsensor.store')}}" method="POST">
              @csrf
              <div class="card-body">
                <div class="form-group">
                  <label for="statistical_sensor_id">Estadistico Id</label>
                  <input type="text" class="form-control" name="statistical_sensor_id" id="statistical_sensor_id"  placeholder="Introduce estadistico id" required>
                </div>
                <div class="form-group">
                  <label for="elements">Elementos</label>
                  <input type="text" class="form-control" name="elements" id="elements"  placeholder="Introduce elementos" required>
                </div>
                <div class="form-group">
                  <label for="aver_temper_glob">Temperatura Promedio</label>
                  <input type="text" class="form-control" name="aver_temper_glob" id="aver_temper_glob"  placeholder="Introduce elementos" required>
                </div>
                <div class="form-group">
                  <label for="difer_const">Diferencia de 20C°</label>
                  <input type="text" class="form-control" name="difer_const" id="difer_const"  placeholder="Introduce elementos" required>
                </div>
                <div class="form-group">
                  <label for="start_time">Hora Inicio</label>
                  <input type="text" class="form-control" name="start_time" id="start_time"  placeholder="Introduce hora de inicio" required>
                </div>
                <div class="form-group">
                  <label for="pass_time">Tiempo transucrrido en segundos</label>
                  <input type="text" class="form-control" name="pass_time" id="pass_time"  placeholder="Introduce hora de inicio" required>
                </div>
                <div class="form-group">
                  <label for="finish_time">Hora Fin</label>
                  <input type="text" class="form-control" name="finish_time" id="finish_time"  placeholder="Introduce hora de fin" required>
                </div>
                <div class="form-group">
                  <label for="sample">Muestra en JSON 144 peticiones</label>
                  <input type="text" class="form-control" name="sample" id="sample"  placeholder="Introduce las muestras en array de json" required>
                </div>
              </div>
              <!-- /.card-body -->

              <div class="card-footer">
                <a href="{{ route('learningsensor.index') }}" class="btn btn-default">Cancelar</a>
                <button type="submit" class="btn btn-success pull-right" >Enviar</button>
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