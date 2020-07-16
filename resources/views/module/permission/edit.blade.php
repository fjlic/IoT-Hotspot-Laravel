@extends('adminlte::page')
@section('title', 'Hotspot-Permiso')
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
            <div class="card ">
            <div class="card-header">
              <h3 class="card-title">Editar Permiso</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                  <!-- form start -->
            <form role="form" action="{{ route('permission.update',$permission->id) }}" method="POST">
            @csrf
            @method('PUT')
              <div class="card-body">
                <div class="form-group">
                  <label for="name">Nom-Codigo</label>
                  <input type="text" class="form-control" name="name" id="name"  placeholder="Introduce un nombre de permiso para codigo" required value="{{ $permission->name }}" readonly />
                </div>
                <div class="form-group">
                  <label for="display_name">Nom-Vista</label>
                  <input type="display_name" class="form-control" name="display_name" id="display_name"  placeholder="Introduce el nombre visible" required value="{{ $permission->display_name }}" />
                </div>
                <div class="form-group">
                  <label for="description">Descripcion</label>
                  <input type="description" class="form-control" name="description" id="description" placeholder="Introduce descricpion del permiso" required value="{{ $permission->description }}" />
                </div>
              </div>
              <!-- /.card-body -->

              <div class="card-footer">
                <a href="{{ route('permission.index') }}" class="btn btn-default">Cancelar</a>
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
@stop

@section('js')
@toastr_js
@toastr_render
@stop