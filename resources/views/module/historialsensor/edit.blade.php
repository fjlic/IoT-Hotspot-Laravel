@extends('adminlte::page')
@section('title', 'Hotspot|Historial|Sensor')
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
            <div class="card card-warning card-outline">
            <div class="card-header">
              <h3 class="card-title">Editar Historial Sensor</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                  <!-- form start -->
            <form role="form" action="{{ route('historialsensor.update',$historialsensor->id) }}" method="POST">
            @csrf
            @method('PUT')
              <div class="card-body">
                <div class="form-group">
                  <label for="num_serie">Numero serie</label>
                  <input type="text" class="form-control" name="num_serie" id="num_serie"  placeholder="Introduce Numero de Serie" required value="{{ $historialsensor->num_serie }}" />
                </div>
                <div class="form-group">
                  <label for="passw">Password</label>
                  <input type="text" class="form-control" name="passw" id="passw"  placeholder="Introduce Password" required value="{{ $historialsensor->passw }}"/>
                </div>
                <div class="form-group">
                  <label for="temp_1">Temperatura 1</label>
                  <input type="number" class="form-control" name="temp_1" id="temp_1"  placeholder="0.00" required value="{{ $historialsensor->temp_1 }}"/>
                </div>
                <div class="form-group">
                  <label for="temp_2">Temperatura 2</label>
                  <input type="number" class="form-control" name="temp_2" id="temp_2"  placeholder="0.00" required value="{{ $historialsensor->temp_2 }}"/>
                </div>
                <div class="form-group">
                  <label for="temp_3">Temperatura 3</label>
                  <input type="number" class="form-control" name="temp_3" id="temp_3"  placeholder="0.00" required value="{{ $historialsensor->temp_3 }}"/>
                </div>
                <div class="form-group">
                  <label for="temp_4">Temperatura 1</label>
                  <input type="number" class="form-control" name="temp_4" id="temp_4"  placeholder="0.00" required value="{{ $historialsensor->temp_4 }}"/>
                </div>
                <div class="form-group">
                  <label for="vol_1">Voltaje 1</label>
                      <select class="form-control" name="vol_1" id="vol_1" placeholder="On/Off" required value="{{ $historialsensor->vol_1 }}"> 
                        <option selected="selected">{{ $historialsensor->vol_1 }}</option>
                        @if($historialsensor->vol_1 =='On')         
                           <option>Off</option>
                        @else
                           <option>On</option>
                        @endif
                      </select>
                </div>
                <div class="form-group">
                  <label for="vol_2">Voltaje 2</label>
                      <select class="form-control" name="vol_2" id="vol_2" placeholder="On/Off" required value="{{ $historialsensor->vol_2 }}"> 
                        <option selected="selected">{{ $historialsensor->vol_2 }}</option>
                        @if($historialsensor->vol_2 =='On')         
                           <option>Off</option>
                        @else
                           <option>On</option>
                        @endif
                      </select>
                </div>
                <div class="form-group">
                  <label for="vol_3">Voltaje 3</label>
                      <select class="form-control" name="vol_3" id="vol_3" placeholder="On/Off" required value="{{ $historialsensor->vol_3 }}"> 
                        <option selected="selected">{{ $historialsensor->vol_3 }}</option>
                        @if($historialsensor->vol_3 =='On')         
                           <option>Off</option>
                        @else
                           <option>On</option>
                        @endif
                      </select>
                </div>
                <div class="form-group">
                    <label for="door_1">Puerta 1</label>
                        <select class="form-control" name="door_1" id="door_1" placeholder="On/Off" required value="{{ $historialsensor->door_1 }}"> 
                        <option selected="selected">{{ $historialsensor->door_1 }}</option>
                          @if($historialsensor->door_1 =='On')         
                             <option>Off</option>
                          @else
                             <option>On</option>
                          @endif
                        </select>
                </div>
                <div class="form-group">
                    <label for="door_2">Puerta 2</label>
                        <select class="form-control" name="door_2" id="door_2" placeholder="On/Off" required value="{{ $historialsensor->door_2 }}"> 
                          <option selected="selected">{{ $historialsensor->door_2 }}</option>
                          @if($historialsensor->door_2 =='On')         
                             <option>Off</option>
                          @else
                             <option>On</option>
                          @endif
                        </select>
                </div>
                <div class="form-group">
                    <label for="door_3">Puerta 3</label>
                        <select class="form-control" name="door_3" id="door_3" placeholder="On/Off" required value="{{ $historialsensor->door_3 }}"> 
                          <option selected="selected">{{ $historialsensor->door_3 }}</option>
                          @if($historialsensor->door_3 =='On')         
                             <option>Off</option>
                          @else
                             <option>On</option>
                          @endif
                        </select>
                </div>
                <div class="form-group">
                    <label for="door_4">Puerta 4</label>
                        <select class="form-control" name="door_4" id="door_4" placeholder="On/Off" required value="{{ $historialsensor->door_4 }}"> 
                          <option selected="selected">{{ $historialsensor->door_4 }}</option>
                          @if($historialsensor->door_4 =='On')         
                             <option>Off</option>
                          @else
                             <option>On</option>
                          @endif
                        </select>
                </div>
                <div class="form-group">
                    <label for="rlay_1">Relay 1</label>
                        <select class="form-control" name="rlay_1" id="rlay_1" placeholder="On/Off" required value="{{ $historialsensor->rlay_1 }}"> 
                          <option selected="selected">{{ $historialsensor->rlay_1 }}</option>
                          @if($historialsensor->rlay_1 =='On')         
                             <option>Off</option>
                          @else
                             <option>On</option>
                          @endif
                        </select>
                </div>
                <div class="form-group">
                    <label for="rlay_2">Relay 2</label>
                        <select class="form-control" name="rlay_2" id="rlay_2" placeholder="0.00" required value="{{ $historialsensor->rlay_2 }}"> 
                          <option selected="selected">{{ $historialsensor->rlay_2 }}</option>
                          @if($historialsensor->rlay_2 =='On')         
                             <option>Off</option>
                          @else
                             <option>On</option>
                          @endif
                        </select>
                </div>
                <div class="form-group">
                    <label for="rlay_3">Relay 3</label>
                        <select class="form-control" name="rlay_3" id="rlay_3" placeholder="0.00" required value="{{ $historialsensor->rlay_3 }}"> 
                          <option selected="selected">{{ $historialsensor->rlay_3 }}</option>
                          @if($historialsensor->rlay_3 =='On')         
                             <option>Off</option>
                          @else
                             <option>On</option>
                          @endif
                        </select>
                </div>
                <div class="form-group">
                    <label for="rlay_4">Relay 4</label>
                        <select class="form-control" name="rlay_4" id="rlay_4" placeholder="0.00" required value="{{ $historialsensor->rlay_4 }}"> 
                          <option selected="selected">{{ $historialsensor->rlay_4 }}</option>
                          @if($historialsensor->rlay_4 =='On')         
                             <option>Off</option>
                          @else
                             <option>On</option>
                          @endif
                        </select>
                </div>
                <div class="form-group">
                <label for="text">Comentario</label>
                <textarea  type="text" class="form-control" name="text" id="text"  placeholder="Introduce Comentario" required>{{ $historialsensor->text }}</textarea>
                </div>
                <!-- 
                <div class="form-group">
                  <label for="text">Comentario</label>
                  <input type="text" class="form-control" name="text" id="text"  placeholder="Introduce Comentario" required>
                </div>
                -->
                <div class="form-group">
                    <label for="sensor_id">Asignar Sensor</label>
                        <select class="form-control" name="sensor_id" id="sensor_id"> 
                          @foreach($sensors as $sensor)
                          <option>{{ $sensor->id }}</option>
                          @endforeach
                        </select>
              </div>
              </div>
              <!-- /.card-body -->

              <div class="card-footer">
                <a href="{{ route('historialsensor.index') }}" class="btn btn-default">Cancelar</a>
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