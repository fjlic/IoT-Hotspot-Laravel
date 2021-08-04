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

 <!-- Main content  Part Name : VST -->
 <!-- Part Size : 23.3 -->
 <section class="content">
      <div class="row">
        <div class="col-12">
          <div class="card card-warning card-outline">
            <div class="card-header">
              <h3 class="card-title">Editar Prediccion</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
            <!-- form start -->
            <form role="form" action="{{ route('learning.update',$learning->id) }}" method="POST">
            @csrf
            @method('PUT')
              <div class="card-body">
                <!-- 'id', 'statistical_id', 'elements', 'start_time', 'finish_time', 'total_time', 'difer_time', 'sample' -->
                <div class="form-group">
                  <label for="statistical_id">Sensor Id</label>
                  <input type="text" class="form-control" name="statistical_id" id="statistical_id"  placeholder="Introduce id estadistico" required value="{{ $learning->statistical_id }}" />
                </div>
                <div class="form-group">
                  <label for="elements">Elementos</label>
                  <input type="text" class="form-control" name="elements" id="elements"  placeholder="Introduce elementos" required value="{{ $learning->elements }}" />
                </div>
                <div class="form-group">
                  <label for="start_time">Hora Inicial</label>
                  <input type="text" class="form-control" name="start_time" id="start_time"  placeholder="Introduce hora de inicio" required value="{{ $learning->start_time }}" />
                </div>
                <div class="form-group">
                  <label for="finish_time">Hora Fianl</label>
                  <input type="text" class="form-control" name="finish_time" id="finish_time"  placeholder="Introduce hora de fin" required value="{{ $learning->finish_time }}" />
                </div>
                <div class="form-group">
                  <label for="total_time">Tiempo Total</label>
                  <input type="text" class="form-control" name="total_time" id="total_time"  placeholder="Introduce hora total" required value="{{ $learning->total_time }}" />
                </div>
                <div class="form-group">
                  <label for="difer_time">Tiempo desface (+/-)</label>
                  <input type="text" class="form-control" name="difer_time" id="difer_time"  placeholder="Introduce hora de desface" required value="{{ $learning->difer_time }}" />
                </div>
                <div class="form-group">
                  <label for="sample">Muestra</label>
                  <textarea class="form-control" name="sample" id="sample" required value="{{ $learning->sample }}">{{ $learning->sample }}</textarea>
                </div>
              </div>
              <!-- /.card-body -->

              <div class="card-footer">
                <a href="{{ route('learning.index') }}" class="btn btn-default">Cancelar</a>
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
@stop

@section('js')
@toastr_js
@toastr_render
@stop