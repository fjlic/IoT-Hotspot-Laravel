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
              <h3 class="box-title">Ver HIstorial Esp32</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                  <!-- form start -->
                  <!--'esp32_id', 'num_serie', 'nick_name', 'password', 'api_token', -->
            <form role="form">
              <div class="box-body">
                <div class="form-group">
                  <label for="esp32_id">Id Esp32</label>
                  <input type="text" class="form-control" value="{{ $historialesp32->esp32_id }}" readonly="readonly"/>
                </div>
                <div class="form-group">
                  <label for="num_serie">Serie</label>
                  <input type="text" class="form-control" value="{{ $historialesp32->num_serie }}" readonly="readonly"/>
                </div>
                <div class="form-group">
                  <label for="nick_name">Alias</label>
                  <input type="text" class="form-control" value="{{ $historialesp32->nick_name }}" readonly="readonly"/>
                </div>
                <div class="form-group">
                  <label for="password">Passw</label>
                  <input type="text" class="form-control" value="{{ $historialesp32->password }}" readonly="readonly"/>
                </div>
                <div class="form-group">
                  <label for="api_token">Api Token</label>
                  <input type="text" class="form-control" value="{{ $historialesp32->api_token }}" readonly="readonly"/>
                </div>
              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <a href="{{ route('historialesp32.index') }}" class="btn btn-info pull-right">Regresar</a>
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