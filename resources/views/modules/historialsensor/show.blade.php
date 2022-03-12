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
          <div class="card card-info card-outline">
            <div class="card-header">
              <h3 class="card-title">See Sensor History</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
            <form role="form">
              <div class="card-body">
                <div class="form-group">
                  <label for="id">Id</label>
                  <input type="text" class="form-control" value="{{ $historialsensor->id }}" readonly="readonly"/>
                </div>
                <div class="form-group">
                  <label for="sensor_id">Id Sensor</label>
                  <input type="text" class="form-control" value="{{ $historialsensor->sensor_id }}" readonly="readonly"/>
                </div>
                <div class="form-group">
                  <label for="num_serie">Serial Number</label>
                  <input type="text" class="form-control" value="{{ $historialsensor->num_serie }}" readonly="readonly"/>
                </div>
                <div class="form-group">
                  <label for="passw">Password</label>
                  <input type="text" class="form-control" value="{{ $historialsensor->passw }}" readonly="readonly"/>
                </div>
                <div class="form-group">
                  <label for="temp_1">Temperature 1</label>
                  <input type="text" class="form-control" value="{{ $historialsensor->temp_1 }}" readonly="readonly"/>
                </div>
                <div class="form-group">
                  <label for="temp_2">Temperature 2</label>
                  <input type="text" class="form-control" value="{{ $historialsensor->temp_2 }}" readonly="readonly"/>
                </div>
                <div class="form-group">
                  <label for="temp_3">Temperature 3</label>
                  <input type="text" class="form-control" value="{{ $historialsensor->temp_3 }}" readonly="readonly"/>
                </div>
                <div class="form-group">
                  <label for="temp_4">Temperature 4</label>
                  <input type="text" class="form-control" value="{{ $historialsensor->temp_4 }}" readonly="readonly"/>
                </div>
                <div class="form-group">
                  <label for="vol_1">Voltage 1</label>
                  <input type="text" class="form-control" value="{{ $historialsensor->vol_1 }}" readonly="readonly"/>
                </div>
                <div class="form-group">
                  <label for="vol_2">Voltage 2</label>
                  <input type="text" class="form-control" value="{{ $historialsensor->vol_2 }}" readonly="readonly"/>
                </div>
                <div class="form-group">
                  <label for="vol_3">Voltage 3</label>
                  <input type="text" class="form-control" value="{{ $historialsensor->vol_3 }}" readonly="readonly"/>
                </div>
                <div class="form-group">
                  <label for="door_1">Door 1</label>
                  <input type="text" class="form-control" value="{{ $historialsensor->door_1 }}" readonly="readonly"/>
                </div>
                <div class="form-group">
                  <label for="door_2">Door 2</label>
                  <input type="text" class="form-control" value="{{ $historialsensor->door_2 }}" readonly="readonly"/>
                </div>
                <div class="form-group">
                  <label for="door_3">Door 3</label>
                  <input type="text" class="form-control" value="{{ $historialsensor->door_3 }}" readonly="readonly"/>
                </div>
                <div class="form-group">
                  <label for="door_4">Door 4</label>
                  <input type="text" class="form-control" value="{{ $historialsensor->door_4 }}" readonly="readonly"/>
                </div>
                <div class="form-group">
                  <label for="rlay_1">Relay 1</label>
                  <input type="text" class="form-control" value="{{ $historialsensor->rlay_1 }}" readonly="readonly"/>
                </div>
                <div class="form-group">
                  <label for="rlay_2">Relay 2</label>
                  <input type="text" class="form-control" value="{{ $historialsensor->rlay_2 }}" readonly="readonly"/>
                </div>
                <div class="form-group">
                  <label for="rlay_3">Relay 3</label>
                  <input type="text" class="form-control" value="{{ $historialsensor->rlay_3 }}" readonly="readonly"/>
                </div>
                <div class="form-group">
                  <label for="rlay_4">Relay 4</label>
                  <input type="text" class="form-control" value="{{ $historialsensor->rlay_4 }}" readonly="readonly"/>
                </div>
                <div class="form-group">
                  <label for="text">Comment</label>
                  <textarea  type="text" class="form-control" readonly="readonly">{{ $historialsensor->text }}</textarea>
                </div>
              <!-- /.card-body -->
              <div class="card-footer">
                <a href="{{ route('historialsensor.index') }}" class="btn btn-info pull-right">Return</a>
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
<div class="pull-right hidden-xs"><b>Version</b> 2.1.1<strong>  Copyright &copy; 2022 <a href="http://hotspot.fjlic.com/home" target="_blank">Hotspot</a>.</strong>  All rights reserved.</div> 
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
            aboutText: 'FJLIC Help Center',
            introMessage: "✋ Hello!! I am your IoT-Hotspot assistant"
        };
</script>
<script src='https://cdn.jsdelivr.net/npm/botman-web-widget@0/build/js/widget.js'></script>
@stop