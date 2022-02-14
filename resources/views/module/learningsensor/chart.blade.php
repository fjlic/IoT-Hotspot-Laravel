@extends('adminlte::page')
@section('title', 'Hotspot|Prediction')
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

 <!-- Main content Charts-->
 <section class="content">
      <!-- Chart Volt  -->
      <div class="row">
        <div class="col-12">
            <div class="card card-success card-outline">
            <div class="card-header">
              <h3 class="card-title">Sample Plot Applying Linear Regression for Sensors</h3>
              <div class="card-tools">
                <a class="btn btn-tool"  href="{{ route('learningsensor.index') }}" ><span class="fas fa-arrow-left"></span></a>
                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                  <i class="fas fa-minus"></i>
                </button>
                <button type="button" class="btn btn-tool" data-card-widget="remove">
                  <i class="fas fa-times"></i>
                </button>
              </div>
            </div>
            <div class="card-body">
            <div class="row">
              <div class="col-xs-4 col-md-8 text-center">
                <div id="sample_1"></div>
                  {!! $sample_1 !!}
              </div>
              <div class="col-xs-4 col-md-8 text-center">
                <div id="sample_2"></div>
                  {!! $sample_2 !!}
              </div> 
            </div>
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