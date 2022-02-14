@extends('adminlte::page')
@section('title', 'Hotspot|Statistical')
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
              <h3 class="card-title">Create Sensor Statistics</h3>
            </div>
            <!-- 'sensor_id', 'elements', 'aver_temper_glob', 'difer_const', 'sample', 'stat', 'start_time', 'pass_time', 'finish_time' -->
            <div class="card-body">
            <!-- form start -->
            <form role="form" action="{{ route('statisticalsensor.store')}}" method="POST">
              @csrf
              <div class="card-body">
                <div class="form-group">
                  <label for="sensor_id">Sensor Id</label>
                  <input type="text" class="form-control" name="sensor_id" id="sensor_id"  placeholder="Enter sensor id" required>
                </div>
                <div class="form-group">
                  <label for="elements">Elements</label>
                  <input type="text" class="form-control" name="elements" id="elements"  placeholder="Enter elements" required>
                </div>
                <div class="form-group">
                  <label for="aver_temper_glob">Average Temperature</label>
                  <input type="text" class="form-control" name="aver_temper_glob" id="aver_temper_glob"  placeholder="Enter average temperature" required>
                </div>
                <div class="form-group">
                  <label for="difer_const">Difference for 20-C°</label>
                  <input type="text" class="form-control" name="difer_const" id="difer_const"  placeholder="Enter difference for 20-C°" required>
                </div>
                <div class="form-group">
                  <label for="start_time">Start Time</label>
                  <input type="text" class="form-control" name="start_time" id="start_time"  placeholder="Enter start time" required>
                </div>
                <div class="form-group">
                  <label for="pass_time">Elapsed Time in Seconds</label>
                  <input type="text" class="form-control" name="pass_time" id="pass_time"  placeholder="Enter elapsed time in seconds" required>
                </div>
                <div class="form-group">
                  <label for="finish_time">End Time</label>
                  <input type="text" class="form-control" name="finish_time" id="finish_time"  placeholder="Enter end time" required>
                </div>
                <div class="form-group">
                  <label for="sample">Shows in JSON 144 temperature reading</label>
                  <input type="text" class="form-control" name="sample" id="sample"  placeholder="Enter in JSON 144 temperature elements" required>
                </div>
              </div>
              <!-- /.card-body -->

              <div class="card-footer">
                <a href="{{ route('statisticalsensor.index') }}" class="btn btn-default">Cancel</a>
                <button type="submit" class="btn btn-success pull-right" >Send</button>
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