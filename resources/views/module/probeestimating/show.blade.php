@extends('adminlte::page')
@section('title', 'Hotspot-Probe-Estadistico')
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
              <h3 class="card-title">Ver  Probe Estadistico</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
            <form role="form">
              <div class="card-body">
                <div class="form-group">
                    <!-- /.card-header 'id', 'prox_size', 'mod_size', 'stm_prox_size', 'act_dev_size', -->
                  <label for="id">Id</label>
                  <input type="text" class="form-control" value="{{ $probeestimating->id }}" readonly="readonly"/>
                </div>
                <div class="form-group">
                  <label for="prox_size">Tamaño Proxi</label>
                  <input type="text" class="form-control" value="{{ $probeestimating->prox_size }}" readonly="readonly"/>
                </div>
                <div class="form-group">
                  <label for="mod_size">Tamaño Mod</label>
                  <input type="text" class="form-control" value="{{ $probeestimating->mod_size }}" readonly="readonly"/>
                </div>
                <div class="form-group">
                  <label for="stm_prox_size">Estim Proxi</label>
                  <input type="text" class="form-control" value="{{ $probeestimating->stm_prox_size }}" readonly="readonly"/>
                </div>
                <div class="form-group">
                  <label for="act_dev_size">Act Dev</label>
                  <input type="text" class="form-control" value="{{ $probeestimating->act_dev_size }}" readonly="readonly"/>
                </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <a href="{{ route('probeestimating.index') }}" class="btn btn-info pull-right">Regresar</a>
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
<div class="pull-right hidden-xs"><b>Version</b> 2.0.0<strong>  Copyright &copy; 2020 <a href="http://hotspot.local/home" target="_blank">Hotspot</a>.</strong>  Todo los derechos Reservados.</div> 
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