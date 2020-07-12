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
              <h3 class="box-title">Editar Historial Esp32</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
            <!--'esp32_id', 'num_serie', 'nick_name', 'password', 'api_token', -->
            <form role="form" action="{{ route('historialesp32.update',$historialesp32->id) }}" method="POST">
            @csrf
            @method('PUT')
              <div class="box-body">
              <div class="form-group">
                  <label for="esp32_id">Seleccionar Esp32</label>
                  <select class="form-control" name="esp32_id" id="esp32_id"> 
                    <option selected="true">{{ $historialesp32->esp32_id }}</option>
                    @foreach($esp32s as $esp32)
                    <option>{{ $esp32->id }}</option>
                    @endforeach
                    </select>
                </div>
                <div class="form-group">
                  <label for="num_serie">Num Serie</label>
                  <input type="text" class="form-control" name="num_serie" id="num_serie"  placeholder="Introduce Serie" required value="{{ $historialesp32->num_serie }}" />
                </div>
                <div class="form-group">
                  <label for="nick_name">Alias</label>
                  <input type="text" class="form-control" name="nick_name" id="nick_name"  placeholder="Introduce alias" required value="{{ $historialesp32->nick_name }}" />
                </div>
                <div class="form-group">
                  <label for="password">Passw</label>
                  <input type="text" class="form-control" name="password" id="password"  placeholder="Introduce passw" required value="{{ $historialesp32->password }}" />
                </div>
                <div class="form-group">
                  <label for="api_token">Alias</label>
                  <input type="text" class="form-control" name="api_token" id="api_token"  placeholder="Introduce token" required value="{{ $historialesp32->api_token }}" />
                </div>
              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <a href="{{ route('historialesp32.index') }}" class="btn btn-default">Cancelar</a>
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