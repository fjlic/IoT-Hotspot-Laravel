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
              <h3 class="box-title">Editar Usuario</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                  <!-- form start -->
            <form role="form" action="{{ route('user.update',$user->id) }}" method="POST">
            @csrf
            @method('PUT')
              <div class="box-body">
                <div class="form-group">
                  <label for="name">Nombre</label>
                  <input type="text" class="form-control" name="name" id="name"  placeholder="Introduce un nombre" required value="{{ $user->name }}" />
                </div>
                <div class="form-group">
                  <label for="email">E-mail</label>
                  <input type="email" class="form-control" name="email" id="email"  placeholder="Introduce e-mail" required value="{{ $user->email }}" />
                </div>
                <div class="form-group">
                  <label for="password">Password</label>
                  <input type="password" class="form-control" name="password" id="password" placeholder="Nuevo contraseña"/>
                </div>
                <div class="form-group">
                  <label for="name_role">Asignar tipo de usuario</label>
                  <select class="form-control" name="name_role" id="name_role"> 
                    <option selected="true">{{ $user->name_role }}</option>
                    @foreach($roles as $role)
                    <option>{{ $role->name }}</option>
                    @endforeach
                    </select>
                </div>
              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <a href="{{ route('user.index') }}" class="btn btn-default">Cancelar</a>
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