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
              <h3 class="box-title">Crear Esp32</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                  <!-- form start -->
                  <!-- 'id', 'user_id', 'num_serie', 'nick_name', 'password', 'api_token', -->
            <form role="form" action="{{ route('esp32.store')}}" method="POST">
              @csrf
              <div class="box-body">
              <div class="form-group">
                    <label for="user_id">Usuario Asignado</label>
                        <select class="form-control" name="user_id" id="user_id"> 
                          {{--<option selected="true">{{ $esp32->user_asign }}</option>--}}
                          @foreach($users as $user)
                          <option>{{ $user->id }}</option>
                          @endforeach
                        </select>
              </div>
                <div class="form-group">
                  <label for="num_serie">Num Serie</label>
                  <input type="text" class="form-control" name="num_serie" id="num_serie"  placeholder="Introduce serie" required>
                </div>
                <div class="form-group">
                  <label for="nick_name">Alias</label>
                  <input type="text" class="form-control" name="nick_name" id="nick_name"  placeholder="Introduce alias" required>
                </div>
                <div class="form-group">
                  <label for="password">Password</label>
                  <input type="password" class="form-control" name="password" id="password" placeholder="Introduce contraseña" required>
                </div>
              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <a href="{{ route('esp32.index') }}" class="btn btn-default">Cancelar</a>
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