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
            <div class="box box-info">
            <div class="box-header">
              <h3 class="box-title">Ver Usuario</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                  <!-- form start -->
            <form role="form">
              <div class="box-body">
                <div class="form-group">
                  <label for="name">Nombre</label>
                  <input type="text" class="form-control" value="{{ $user->name }}" readonly="readonly"/>
                </div>
                <div class="form-group">
                  <label for="email">E-mail</label>
                  <input type="text" class="form-control" value="{{ $user->email }}" readonly="readonly"/>
                </div>
                <div class="form-group">
                  <label for="password">Contraseña</label>
                  <input type="text" class="form-control" value="{{ $user->password }}" readonly="readonly"/>
                </div>
                <div class="form-group">
                  <label for="role_name">Tipo de usuario</label>
                  <input type="text" class="form-control" value="{{ $user->name_role }}" readonly="readonly"/>
                </div>
              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <a href="{{ route('user.index') }}" class="btn btn-info pull-right">Regresar</a>
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