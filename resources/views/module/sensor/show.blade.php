@extends('adminlte::page')
@section('title', 'Hotspot|Sensor')
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
          <div class="card card-info card-outline">
            <div class="card-header">
              <h3 class="card-title">Ver Sensor</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
            <form role="form">
              <div class="card-body">
                <div class="form-group">
                  <label for="id">Id</label>
                  <input type="text" class="form-control" value="{{ $sensor->id }}" readonly="readonly"/>
                </div>
                <div class="form-group">
                  <label for="erb_id">Id Erb</label>
                  <input type="text" class="form-control" value="{{ $sensor->erb_id }}" readonly="readonly"/>
                </div>
                <div class="form-group">
                  <label for="num_serie">Numero Serie</label>
                  <input type="text" class="form-control" value="{{ $sensor->num_serie }}" readonly="readonly"/>
                </div>
                <div class="form-group">
                  <label for="passw">Password</label>
                  <input type="text" class="form-control" value="{{ $sensor->passw }}" readonly="readonly"/>
                </div>
                <div class="form-group">
                  <label for="temp_1">Temperatura 1</label>
                  <input type="text" class="form-control" value="{{ $sensor->temp_1 }}" readonly="readonly"/>
                </div>
                <div class="form-group">
                  <label for="temp_2">Temperatura 2</label>
                  <input type="text" class="form-control" value="{{ $sensor->temp_2 }}" readonly="readonly"/>
                </div>
                <div class="form-group">
                  <label for="temp_3">Temperatura 3</label>
                  <input type="text" class="form-control" value="{{ $sensor->temp_3 }}" readonly="readonly"/>
                </div>
                <div class="form-group">
                  <label for="temp_4">Temperatura 4</label>
                  <input type="text" class="form-control" value="{{ $sensor->temp_4 }}" readonly="readonly"/>
                </div>
                <div class="form-group">
                  <label for="vol_1">Voltaje 1</label>
                  <input type="text" class="form-control" value="{{ $sensor->vol_1 }}" readonly="readonly"/>
                </div>
                <div class="form-group">
                  <label for="vol_2">Voltaje 2</label>
                  <input type="text" class="form-control" value="{{ $sensor->vol_2 }}" readonly="readonly"/>
                </div>
                <div class="form-group">
                  <label for="vol_3">Voltaje 3</label>
                  <input type="text" class="form-control" value="{{ $sensor->vol_3 }}" readonly="readonly"/>
                </div>
                <div class="form-group">
                  <label for="door_1">Puerta 1</label>
                  <input type="text" class="form-control" value="{{ $sensor->door_1 }}" readonly="readonly"/>
                </div>
                <div class="form-group">
                  <label for="door_2">Puerta 2</label>
                  <input type="text" class="form-control" value="{{ $sensor->door_2 }}" readonly="readonly"/>
                </div>
                <div class="form-group">
                  <label for="door_3">Puerta 3</label>
                  <input type="text" class="form-control" value="{{ $sensor->door_3 }}" readonly="readonly"/>
                </div>
                <div class="form-group">
                  <label for="door_4">Puerta 4</label>
                  <input type="text" class="form-control" value="{{ $sensor->door_4 }}" readonly="readonly"/>
                </div>
                <div class="form-group">
                  <label for="rlay_1">Relay 1</label>
                  <input type="text" class="form-control" value="{{ $sensor->rlay_1 }}" readonly="readonly"/>
                </div>
                <div class="form-group">
                  <label for="rlay_2">Relay 2</label>
                  <input type="text" class="form-control" value="{{ $sensor->rlay_2 }}" readonly="readonly"/>
                </div>
                <div class="form-group">
                  <label for="rlay_3">Relay 3</label>
                  <input type="text" class="form-control" value="{{ $sensor->rlay_3 }}" readonly="readonly"/>
                </div>
                <div class="form-group">
                  <label for="rlay_4">Relay 4</label>
                  <input type="text" class="form-control" value="{{ $sensor->rlay_4 }}" readonly="readonly"/>
                </div>
                <div class="form-group">
                  <label for="text">Comentario</label>
                  <textarea  type="text" class="form-control" readonly="readonly">{{ $sensor->text }}</textarea>
                </div>
              <!-- /.card-body -->
              <div class="card-footer">
                <a href="{{ route('sensor.index') }}" class="btn btn-info pull-right">Regresar</a>
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