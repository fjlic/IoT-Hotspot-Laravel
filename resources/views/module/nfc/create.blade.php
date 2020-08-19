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

@if ($message = Session::get('success'))
<div class="alert alert-success">
    <p>{{ $message }}</p>
</div>
@endif
<!-- Main content -->
<section class="content">
      <div class="row">
        <div class="col-12">
            <div class="card card-success card-outline">
            <div class="card-header">
              <h3 class="card-title">Crear Nfc</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                  <!-- form start -->
            <form role="form" action="{{ route('user.store')}}" method="POST">
              @csrf
              <div class="card-body">
                <div class="form-group">
                  <label for="name">Nombre</label>
                  <input type="text" class="form-control" name="name" id="name"  placeholder="Introduce nombre" required>
                </div>
                <div class="form-group">
                  <label for="email">E-mail</label>
                  <input type="text" class="form-control" name="email" id="email"  placeholder="Introduce e-mail" required>
                </div>
                <div class="form-group">
                  <label for="password">Password</label>
                  <input type="password" class="form-control" name="password" id="password" placeholder="Introduce contraseña" required>
                </div>
                <div class="form-group">
                    <label for="name_role">Asignar tipo de usuario</label>
                        <select class="form-control" name="name_role" id="name_role"> 
                          @foreach($roles as $role)
                          <option>{{ $role->name }}</option>
                          @endforeach
                        </select>
              </div>
              </div>
              <!-- /.card-body -->

              <div class="card-footer">
                <a href="{{ route('user.index') }}" class="btn btn-default">Cancelar</a>
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


<!-- Main content -->
 <section class="content">
      <div class="row">
        <div class="col-xs-12">
            <div class="card card-success card-outline">
            <div class="card-header">
              <h3 class="card-title">Crear Nfc</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                  <!-- form start -->
            <form role="form" action="{{ route('nfc.store')}}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="crd_id">Crd Asignar</label>
                        <select class="form-control" name="crd_id" id="crd_id"> 
                          @foreach($crds as $crd)
                          <option>{{ $crd->id }}</option>
                          @endforeach
                        </select>
                </div>
                <div class="form-group">
                    <label for="erb_id">Erb Asignar</label>
                        <select class="form-control" name="erb_id" id="erb_id"> 
                          @foreach($erbs as $erb)
                          <option>{{ $erb->id }}</option>
                          @endforeach
                        </select>
                </div>
                <div class="form-group">
                  <label for="num_serie">Numero serie</label>
                  <input type="text" class="form-control" name="num_serie" id="num_serie"  placeholder="Introduce Numero de Serie" required>
                </div>
                <div class="form-group">
                  <label for="key_1">Clave 1</label>
                  <input type="text" class="form-control" name="key_1" id="key_1"  placeholder="Introduce clave 1" required>
                </div>
                <div class="form-group">
                  <label for="key_2">Clave 2</label>
                  <input type="text" class="form-control" name="key_2" id="key_2"  placeholder="Introduce clave 2" required>
                </div>
                <div class="form-group">
                  <label for="key_3">Clave 3</label>
                  <input type="text" class="form-control" name="key_3" id="key_3"  placeholder="Introduce clave 3" required>
                </div>
                <div class="form-group">
                  <label for="key_4">Clave 4</label>
                  <input type="text" class="form-control" name="key_4" id="key_4"  placeholder="Introduce clave 4" required>
                </div>
                <div class="form-group">
                  <label for="key_5">Clave 5</label>
                  <input type="text" class="form-control" name="key_5" id="key_5"  placeholder="Introduce clave 5" required>
                </div>
                <div class="form-group">
                  <label for="ssid">Ssid</label>
                  <input type="text" class="form-control" name="ssid" id="ssid"  placeholder="Introduce ssid" required>
                </div>
                <div class="form-group">
                  <label for="password">Password</label>
                  <input type="text" class="form-control" name="password" id="password"  placeholder="Introduce password" required>
                </div>
                <div class="form-group">
                  <label for="dns_server">Dns servidor</label>
                  <input type="text" class="form-control" name="dns_server" id="dns_server"  placeholder="Introduce dns" required>
                </div>
                <div class="form-group">
                  <label for="ip_server">Ip servidor</label>
                  <input type="text" class="form-control" name="ip_server" id="ip_server"  placeholder="Introduce ip" required>
                </div>
                <div class="form-group">
                  <label for="port">Puerto</label>
                  <input type="text" class="form-control" name="port" id="port"  placeholder="Introduce puerto" required>
                </div>
                <div class="form-group">
                    <label for="protocol">Protocolo</label>
                        <select class="form-control" name="protocol" id="protocol"> 
                          <option>JSON</option>
                          <option>Otro</option>
                        </select>
              </div>
                <div class="form-group">
                  <label for="text">Text</label>
                  <input type="text" min="0" class="form-control" name="text" id="text"  placeholder="Introduce text" required>
                </div>
                </div>
              <!-- /.card-body -->

              <div class="card-footer">
                <a href="{{ route('nfc.index') }}" class="btn btn-default">Cancelar</a>
                <button type="submit" class="btn btn-success pull-right" >Enviar</button>
              </div>
            </form>
          <!-- /.card -->
          <!-- form-->
 
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

@section('css')
    
@stop

@section('js')
@stop