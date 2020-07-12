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
            <div class="box box-success">
            <div class="box-header">
              <h3 class="box-title">Crear Tipo de Uusario</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                  <!-- form start -->
            <form role="form" action="{{ route('role.store')}}" method="POST">
              @csrf
              <div class="box-body">
                <div class="form-group">
                  <label for="name">Nombre</label>
                  <input type="text" class="form-control" name="name" id="name"  placeholder="Introduce nombre" required>
                </div>
                <div class="form-group">
                  <label for="display_name">Alias</label>
                  <input type="text" class="form-control" name="display_name" id="display_name"  placeholder="Introduce alias" required>
                </div>
                <div class="form-group">
                  <label for="description">Descripcion</label>
                  <input type="text" class="form-control" name="description" id="description" placeholder="Introduce descripcion" required>
                </div>
              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <a href="{{ route('role.index') }}" class="btn btn-default">Cancelar</a>
                <button type="submit" class="btn btn-success pull-right" >Enviar</button>
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