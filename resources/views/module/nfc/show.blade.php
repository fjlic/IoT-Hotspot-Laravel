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
              <h3 class="box-title">Ver Nfc</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                  <!-- form start -->
            <form role="form">
              <!--'id', 'esp32_id', 'num_serie', 'key_1', 'key_2', 'key_3', 'key_4', 'key_5', 'ssid', 'password', 'dns_server', 'ip_server', 'protocol', 'port', 'text', -->
              <div class="box-body">
              <div class="form-group">
                  <label for="esp32_id">Esp32 Asignado</label>
                  <input type="text" class="form-control" name="esp32_id" id="esp32_id"  readonly="readonly" required value="{{ $nfc->esp32_id }}">
                </div>
                <div class="form-group">
                  <label for="num_serie">Numero Serie</label>
                  <input type="text" class="form-control" name="num_serie" id="num_serie"  readonly="readonly" required value="{{ $nfc->num_serie }}">
                </div>
                <div class="form-group">
                  <label for="key_1">Clave 1</label>
                  <input type="text" class="form-control" name="key_1" id="key_1"  readonly="readonly" required value="{{ $nfc->key_1 }}">
                </div>
                <div class="form-group">
                  <label for="key_2">Clave 2</label>
                  <input type="text" class="form-control" name="key_2" id="key_2"  readonly="readonly" required value="{{ $nfc->key_2 }}">
                </div>
                <div class="form-group">
                  <label for="key_3">Clave 3</label>
                  <input type="text" class="form-control" name="key_3" id="key_3"  readonly="readonly" required value="{{ $nfc->key_3 }}">
                </div>
                <div class="form-group">
                  <label for="key_4">Clave 4</label>
                  <input type="text" class="form-control" name="key_4" id="key_4"  readonly="readonly" required value="{{ $nfc->key_4 }}">
                </div>
                <div class="form-group">
                  <label for="key_5">Clave 5</label>
                  <input type="text" class="form-control" name="key_5" id="key_5"  readonly="readonly" required value="{{ $nfc->key_5 }}">
                </div>
                <div class="form-group">
                  <label for="ssid">Ssid</label>
                  <input type="text" class="form-control" name="ssid" id="ssid"  readonly="readonly" required value="{{ $nfc->ssid }}">
                </div>
                <div class="form-group">
                  <label for="password">Password</label>
                  <input type="text" class="form-control" name="password" id="password"  readonly="readonly" required value="{{ $nfc->password }}">
                </div>
                <div class="form-group">
                  <label for="dns_server">Dns Servidor</label>
                  <input type="text" class="form-control" name="dns_server" id="dns_server"  readonly="readonly" required value="{{ $nfc->dns_server }}">
                </div>
                <div class="form-group">
                  <label for="ip_server">Ip Servidor</label>
                  <input type="text" class="form-control" name="ip_server" id="ip_server"  readonly="readonly" required value="{{ $nfc->ip_server }}">
                </div>
                <div class="form-group">
                  <label for="port">Puerto</label>
                  <input type="text" class="form-control" name="port" id="port"  readonly="readonly" required value="{{ $nfc->port }}">
                </div>
                <div class="form-group">
                  <label for="protocol">Protocolo</label>
                  <input type="text" class="form-control" name="protocol" id="protocol"  readonly="readonly" required value="{{ $nfc->protocol }}">
                </div>
                <div class="form-group">
                  <label for="text">Text</label>
                  <input type="text" class="form-control" name="text" id="text"  readonly="readonly" required value="{{ $nfc->text }}">
                </div>
              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <a href="{{ route('nfc.index') }}" class="btn btn-info pull-right">Regresar</a>
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