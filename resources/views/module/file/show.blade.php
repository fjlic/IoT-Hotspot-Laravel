@extends('adminlte::page')
@section('title', 'Hotspot-File')
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
              <h3 class="card-title">Ver Video</h3>
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
                  <label for="name_file">Nombre Video</label>
                  <input type="text" class="form-control" value="{{ $file->name_file }}" readonly="readonly"/>
                </div>
                <div class="form-group">
                  <label for="set">Conjunto</label>
                  <input type="text" class="form-control" value="{{ $file->set }}" readonly="readonly"/>
                </div>
                <div class="form-group">
                  <label for="route">Ruta Video</label>
                  <input type="text" class="form-control" value="{{ $file->route }}" readonly="readonly"/>
                </div>
                <video controls>
                  <source src="{{ asset('storage/public/files/'. $file->name_file) }}" type="video/mp4">
                </video>                
              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <a href="{{ route('file.index') }}" class="btn btn-info pull-right">Regresar</a>
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
<!-- Styles -->
<style>
  html,
  /* Este es el código del ejemplo con un máximo de 600px de ancho */
  video{width:100%;}
  /* Y así se adaptaría al 100% del ancho de página (para webs móviles sería útil) */
  video{width:100%;}
</style>

@stop

@section('js')
@toastr_js
@toastr_render
@stop