@extends('adminlte::page')
@section('title', 'Hotspot|Historial|Contador')
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
            <div class="card card-success card-outline">
            <div class="card-header">
              <h3 class="card-title">Crear Historial Contador</h3>
            </div>
            <!-- /.card-header 'id', 'crd_id', 'erb_id', 'nfc_id', 'num_serie', 'cont_qr', 'cont_mon', -->
            <div class="card-body">
            <!-- form start -->
            <form role="form" action="{{ route('historialcounter.store')}}" method="POST">
              @csrf
              <div class="card-body">
                <div class="form-group">
                  <label for="counter_id">Contador Id</label>
                      <select class="form-control" name="counter_id" id="counter_id"> 
                        {{--<option selected="true">{{ $counter->user_asign }}</option>--}}
                        @foreach($counters as $counter)
                        <option>{{ $counter->id }}</option>
                        @endforeach
                      </select>
                </div>
                <div class="form-group">
                  <label for="nfc_id">Nfc Id</label>
                  <input type="text" class="form-control" name="nfc_id" id="nfc_id"  placeholder="Introduce nfc id" required>
                </div>
                <div class="form-group">
                  <label for="cont_qr">Contador Qr</label>
                  <input type="text" class="form-control" name="cont_qr" id="cont_qr"  placeholder="Introduce contador Qr" required>
                </div>
                <div class="form-group">
                  <label for="cont_mon">Contador Mon</label>
                  <input type="text" class="form-control" name="cont_mon" id="cont_mon"  placeholder="Introduce Contador Monedero" required>
                </div>
                <div class="form-group">
                  <label for="cont_mon_2">Contador Mon 2</label>
                  <input type="text" class="form-control" name="cont_mon_2" id="cont_mon_2"  placeholder="Introduce Contador Monedero 2" required>
                </div>
                <div class="form-group">
                  <label for="cont_corte">Contador Corte</label>
                  <input type="text" class="form-control" name="cont_corte" id="cont_corte"  placeholder="Introduce Contador Corte" required>
                </div>
                <div class="form-group">
                  <label for="cont_prem">Contador Premio</label>
                  <input type="text" class="form-control" name="cont_prem" id="cont_prem"  placeholder="Introduce Contador Premio" required>
                </div>
                <div class="form-group">
                  <label for="cost_mon">Contador Premio</label>
                  <input type="text" class="form-control" name="cost_mon" id="cost_mon"  placeholder="Introduce Costo Moneda" required>
                </div>
              </div>
              <!-- /.card-body -->

              <div class="card-footer">
                <a href="{{ route('historialcounter.index') }}" class="btn btn-default">Cancelar</a>
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