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
              <h3 class="box-title">Ver Esp32</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                  <!-- form start -->
                  <!-- 'id', 'user_id', 'num_serie', 'nick_name', 'password', 'api_token', -->
            <form role="form">
              <div class="box-body">
                <div class="form-group">
                  <label for="id">Id</label>
                  <input type="text" class="form-control" value="{{ $esp32->id }}" readonly="readonly"/>
                </div>
                <div class="form-group">
                  <label for="user_id">Id User</label>
                  <input type="text" class="form-control" value="{{ $esp32->user_id }}" readonly="readonly"/>
                </div>
                <div class="form-group">
                  <label for="num_serie">Serie</label>
                  <input type="text" class="form-control" value="{{ $esp32->num_serie }}" readonly="readonly"/>
                </div>
                <div class="form-group">
                  <label for="nick_name">Alias</label>
                  <input type="text" class="form-control" value="{{ $esp32->nick_name }}" readonly="readonly"/>
                </div>
                <div class="form-group">
                  <label for="password">Password</label>
                  <input type="text" class="form-control" value="{{ $esp32->password }}" readonly="readonly"/>
                </div>
                <div class="form-group">
                  <label for="api_token">Token</label>
                  <input type="text" class="form-control" value="{{ $esp32->api_token }}" readonly="readonly"/>
                </div>
              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <a href="{{ route('esp32.index') }}" class="btn btn-info pull-right">Regresar</a>
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