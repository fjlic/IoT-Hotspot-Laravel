@extends('adminlte::page')
@section('title', 'Hotspot|Estadistico|Contador')
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
              <h3 class="card-title">Crear Estadistico Contador</h3>
            </div>
            <!-- 'id', 'counter_id', 'elements', 'start_time', 'finish_time', 'total_time', 'difer_time', 'sample' -->
            <div class="card-body">
            <!-- form start -->
            <form role="form" action="{{ route('statisticalcounter.store')}}" method="POST">
              @csrf
              <div class="card-body">
                <div class="form-group">
                  <label for="counter_id">Contador Id</label>
                  <input type="text" class="form-control" name="counter_id" id="counter_id"  placeholder="Introduce statistical id" required>
                </div>
                <div class="form-group">
                  <label for="elements">Elementos</label>
                  <input type="text" class="form-control" name="elements" id="elements"  placeholder="Introduce elementos" required>
                </div>
                <div class="form-group">
                  <label for="start_time">Hora Inicio</label>
                  <input type="text" class="form-control" name="start_time" id="start_time"  placeholder="Introduce hora de inicio" required>
                </div>
                <div class="form-group">
                  <label for="finish_time">Hora Fin</label>
                  <input type="text" class="form-control" name="finish_time" id="finish_time"  placeholder="Introduce hora de fin" required>
                </div>
                <div class="form-group">
                  <label for="total_time">Tiempo Total</label>
                  <input type="text" class="form-control" name="total_time" id="total_time"  placeholder="Introduce tiempo total" required>
                </div>
                <div class="form-group">
                  <label for="difer_time">Tiempo Desface (+/-)</label>
                  <input type="text" class="form-control" name="difer_time" id="difer_time"  placeholder="Introduce tiempo de desface" required>
                </div>
                <div class="form-group">
                  <label for="sample">Muestra en JSON 1293 Juegos</label>
                  <input type="text" class="form-control" name="sample" id="sample"  placeholder="Introduce las muestras en array de json" required>
                </div>
              </div>
              <!-- /.card-body -->

              <div class="card-footer">
                <a href="{{ route('statisticalcounter.index') }}" class="btn btn-default">Cancelar</a>
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