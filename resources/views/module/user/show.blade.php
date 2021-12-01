@extends('adminlte::page')
@section('title', 'Hotspot|Usuario')
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
              <h3 class="card-title">Ver Usuario</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
            <!-- Profile Image -->
              <div class="card-body box-profile">
                <div class="text-center">
                  <img class="profile-user-img img-fluid img-circle"
                       src="vendor/adminlte/dist/img/logo-iot.png"
                       alt="Picture User">
                </div>
                <h3 class="profile-username text-center">{{ $user->name }}</h3>
                <p class="text-muted text-center">{{ $user->name_role }}</p>
                <ul class="list-group list-group-unbordered mb-3">
                  <li class="list-group-item">
                    <b>Nombre</b> <a class="float-right">{{ $user->name }}</a>
                  </li>
                  <li class="list-group-item">
                    <b>E-mail</b> <a class="float-right">{{ $user->email }}</a>
                  </li>
                  <li class="list-group-item">
                    <b>Contraseña</b> <a class="float-right">{{ $user->password }}</a>
                  </li>
                  <li class="list-group-item">
                    <b>Tipo de usuario</b> <a class="float-right">{{ $user->name_role }}</a>
                  </li>
                </ul>
                <div class="card-footer">
                <a href="{{ route('user.index') }}" class="btn btn-info pull-right">Regresar</a>
              </div>
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
<div class="pull-right hidden-xs"><b>Version</b> 2.0.1 <strong>  Copyright &copy; 2021 <a href="http://hotspot.fjlic.com/home" target="_blank">Hotspot</a>.</strong>  Todo los derechos Reservados.</div> 
@stop

@section('css')
@toastr_css
@stop

@section('js')
@toastr_js
@toastr_render
@stop