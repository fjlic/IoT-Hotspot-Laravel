@extends('adminlte::page')
@section('title', 'Hotspot|Advertisings')
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
              <h3 class="card-title">See Video</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
            <form role="form">
              <div class="card-body">
                <div class="form-group">
                   <!-- /.card-header 'id', 'set', 'name_file' -->
                  <label for="id">Id</label>
                  <input type="text" class="form-control" value="{{ $file->id }}" readonly="readonly"/>
                </div>
                <div class="form-group">
                  <label for="name_file">Name</label>
                  <input type="text" class="form-control" value="{{ $file->name_file }}" readonly="readonly"/>
                </div>
                <div class="form-group">
                  <label for="set">Set</label>
                  <input type="text" class="form-control" value="{{ $file->set }}" readonly="readonly"/>
                </div>
                <div class="form-group">
                  <label for="route">Route</label>
                  <input type="text" class="form-control" value="{{ $file->route }}" readonly="readonly"/>
                </div>
             <!-- /.card-body -->
             <div class="form-group">
              <video controls>
                <source src="{{ asset('storage/public/files/'. $file->name_file) }}" type="video/mp4">
              </video> 
             </div> 
            <div class="card-footer">
              <div class="btn-group" role="group">
                <a href="{{ route('file.index') }}" class="btn btn-info pull-right">Back</a>
                <a href="{{route('file.download',$file->id)}}" type="button" class="btn btn-primary download" data-report_id="{{$file->id}}">Download</a>
              </div>
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
<!-- Styles -->
<style>
  html,
  /* Este es el código del ejemplo con un máximo de 600px de ancho */
  video{width:100%;}
  /* Y así se adaptaría al 100% del ancho de página (para webs móviles sería útil) */
  video{width:100%;}
</style>
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