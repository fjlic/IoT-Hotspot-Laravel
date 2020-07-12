@extends('adminlte::page')
@section('title', 'Server-Crd')
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
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Editar Crd</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
            <form role="form" action="{{ route('crd.update',$crd->id) }}" method="POST">
            @csrf
            @method('PUT')
              <div class="card-body">
              <div class="form-group">
                    <label for="user_id">Usuario Asignado</label>
                        <select class="form-control" name="user_id" id="user_id">
                          @foreach($users as $user)
                          <option>{{ $user->id }}</option>
                          @endforeach
                        </select>
              </div>
                <div class="form-group">
                  <label for="num_serie">Num Serie</label>
                  <input type="text" class="form-control" name="num_serie" id="num_serie"  placeholder="Introduce Num serie" required value={{ $crd->num_serie }} />
                </div>
                <div class="form-group">
                  <label for="nick_name">Alias</label>
                  <input type="text" class="form-control" name="nick_name" id="nick_name"  placeholder="Introduce alias" required value={{ $crd->nick_name }} />
                </div>
                <div class="form-group">
                  <label for="password">Passw</label>
                  <input type="text" class="form-control" name="password" id="password" placeholder="Introduce contraseña" required value={{ $crd->password }} />
                </div>
                <div class="form-group">
                  <label for="api_token">Token</label>
                  <input type="text" class="form-control" name="api_token" id="api_token" placeholder="Sin Token" readonly="readonly" value={{ $crd->api_token }} />
                </div>
              </div>
              <!-- /.card-body -->

              <div class="card-footer">
                <a href="{{ route('crd.index') }}" class="btn btn-default">Cancelar</a>
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