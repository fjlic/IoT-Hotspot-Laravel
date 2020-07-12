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
              <h3 class="box-title">Ver Qr</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                  <!-- form start -->
                  <!-- 'esp32_id', 'qr_serie', 'key_status', 'gone_down',
                  
                  
                   -->
            <form role="form">
              <div class="box-body">
              <div class="form-group">
                  <label for="esp32_id">Esp32 Id</label>
                  <input type="text" class="form-control" value="{{ $qr->esp32_id }}" readonly="readonly"/>
                </div>
                <div class="form-group">
                  <label for="qr_serie">Qr Serie</label>
                  <input type="text" class="form-control" value="{{ $qr->qr_serie }}" readonly="readonly"/>
                </div>
                <div class="form-group">
                  <label for="key_status">Estatus</label>
                  <input type="text" class="form-control" value="{{ $qr->key_status }}" readonly="readonly"/>
                </div>
                <div class="form-group">
                  <label for="gone_down">Actualizado</label>
                  <input type="text" class="form-control" value="{{ $qr->gone_down }}" readonly="readonly"/>
                </div>
              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <a href="{{ route('qr.index') }}" class="btn btn-info pull-right">Regresar</a>
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