@extends('adminlte::page')
@section('title', 'Hotspot-ClassName')
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
              <h3 class="card-title">Editar ClassName</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
            <!-- form start -->
            <form role="form" action="{{ route('classname.update',$classname->id) }}" method="POST">
            @csrf
            @method('PUT')
              <div class="card-body">
                <div class="form-group">
                   <!-- /.card-header (ClassName)'id', 'class_name', 'class_loc', 'num_method', -->
                  <label for="class_name">Class Name</label>
                  <input type="text" class="form-control" name="class_name" id="class_name"  placeholder="Introduce classname" required value="{{ $classname->class_name }}" />
                </div>
                <div class="form-group">
                  <label for="class_loc">Class Loc</label>
                  <input type="text" class="form-control" name="class_loc" id="class_loc"  placeholder="Introduce class loc" required value="{{ $classname->class_loc }}" />
                </div>
                <div class="form-group">
                  <label for="num_method">Class Method</label>
                  <input type="text" class="form-control" name="num_method" id="num_method"  placeholder="Introduce class method" required value="{{ $classname->num_method }}" />
                </div>
              </div>
              <!-- /.card-body -->

              <div class="card-footer">
                <a href="{{ route('classname.index') }}" class="btn btn-default">Cancelar</a>
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
<div class="pull-right hidden-xs"><b>Version</b> 2.0.0<strong>  Copyright &copy; 2020 <a href="http://hotspot.local/home" target="_blank">Hotspot</a>.</strong>  Todo los derechos Reservados.</div> 
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