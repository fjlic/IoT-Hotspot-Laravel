@extends('adminlte::page')
@section('title', 'Hotspot|Permiso')
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
              <h3 class="card-title">Ver Permiso</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                  <!-- form start -->
            <form role="form">
              <div class="card-body">
                <div class="form-group">
                  <label for="name">Nom-Codigo</label>
                  <input type="text" class="form-control" value="{{ $permission->name }}" readonly="readonly"/>
                </div>
                <div class="form-group">
                  <label for="display_name">Nom-Vista</label>
                  <input type="text" class="form-control" value="{{ $permission->display_name }}" readonly="readonly"/>
                </div>
                <div class="form-group">
                  <label for="description">Descripcion</label>
                  <input type="text" class="form-control" value="{{ $permission->description }}" readonly="readonly"/>
                </div>
              <!-- /.card-body -->
              <div class="card-footer">
                <a href="{{ route('permission.index') }}" class="btn btn-info pull-right">Regresar</a>
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