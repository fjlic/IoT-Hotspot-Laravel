@extends('adminlte::page')
@section('title', 'Hotspot-Publicidad')
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
              <h3 class="card-title">Agergar Video</h3>
            </div>
            <!-- /.card-header 'id', 'name_file', 'counter_lines' -->
            <div class="card-body">
            <!-- form start -->
            <form role="form" action="{{ route('file.store')}}" method="POST" accept-charset="UTF-8" enctype="multipart/form-data">
              {{ csrf_field() }}
              {{-- @csrf --}}
              <div class="card-body">
                <div class="form-group">
                  <label for="name_file">Cargar Video</label>
                  <input type="file" class="form-control" name="name_file" id="name_file" placeholder="Introduce name file" required>
                </div>
                <div class="form-group">
                  <label for="set">Conjunto</label>
                  <input type="text" class="form-control" name="set" id="set"  placeholder="Introduce conjunto al que pertenece" required>
                </div>
              </div>
              {{--  
                <div class="form-group">
                  <label for="route">Ruta File</label>
                  <input type="text" class="form-control" name="route" id="route"  placeholder="Introduce contador de horas" required>
                </div>
              </div>
              --}}
              <!-- /.card-body -->

              <div class="card-footer">
                <a href="{{ route('file.index') }}" class="btn btn-default">Cancelar</a>
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
@stop

@section('js')
@toastr_js
@toastr_render
@stop