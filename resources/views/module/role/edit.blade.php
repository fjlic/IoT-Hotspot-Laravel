@extends('adminlte::page')
@section('title', 'API ESP32')
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
 <!-- Main content -->
 <section class="content">
      <div class="row">
        <div class="col-xs-12">
            <div class="box box-warning">
            <div class="box-header">
              <h3 class="box-title">Editar Rol</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                  <!-- form start -->
            <form role="form" action="{{ route('role.update',$role->id) }}" method="POST">
            @csrf
            @method('PUT')
              <div class="box-body">
                <div class="form-group">
                  <label for="name">Nombre</label>
                  <input type="text" class="form-control" name="name" id="name"  placeholder="Introduce un nombre" required value={{ $role->name }} />
                </div>
                <div class="form-group">
                  <label for="email">Alias</label>
                  <input type="text" class="form-control" name="display_name" id="display_name"  placeholder="Introduce alias" required value={{ $role->display_name }} />
                </div>
                <div class="form-group">
                  <label for="description">Descripcion</label>
                  <input type="text" class="form-control" name="description" id="description" placeholder="Nueva descripcion" required value={{ $role->description }} />
                </div>
              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <a href="{{ route('role.index') }}" class="btn btn-default">Cancelar</a>
                <button type="submit" class="btn btn-warning pull-right" >Enviar</button>
              </div>
            </form>
          </div>
          <!-- /.box -->
          <!-- form-->
 
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->   
@stop

@section('css')
    
@stop

@section('js')
@stop