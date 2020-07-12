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
              <h3 class="box-title">Ver HIstorial Nfc</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
            <!-- form start -->
            <!--'id', 'nfc_id', 'num_serie', 'key_1', 'key_2', 'key_3', 'key_4', 'key_5', 'ssid', 'password', 'dns_server', 'ip_server', 'protocol', 'port', 'text',,-->
            <form role="form">
              <div class="box-body">
                <div class="form-group">
                  <label for="nfc_id">Id Nfc</label>
                  <input type="text" class="form-control" value="{{ $historialnfc->nfc_id }}" readonly="readonly"/>
                </div>
                <div class="form-group">
                  <label for="num_serie">Serie</label>
                  <input type="text" class="form-control" value="{{ $historialnfc->num_serie }}" readonly="readonly"/>
                </div>
                <div class="form-group">
                  <label for="key_1">Clave 1</label>
                  <input type="text" class="form-control" value="{{ $historialnfc->key_1 }}" readonly="readonly"/>
                </div>
                <div class="form-group">
                  <label for="key_2">Clave 2</label>
                  <input type="text" class="form-control" value="{{ $historialnfc->key_2 }}" readonly="readonly"/>
                </div>
                <div class="form-group">
                  <label for="key_3">Clave 3</label>
                  <input type="text" class="form-control" value="{{ $historialnfc->key_3 }}" readonly="readonly"/>
                </div>
                <div class="form-group">
                  <label for="key_4">Clave 4</label>
                  <input type="text" class="form-control" value="{{ $historialnfc->key_4 }}" readonly="readonly"/>
                </div>
                <div class="form-group">
                  <label for="key_5">Clave 5</label>
                  <input type="text" class="form-control" value="{{ $historialnfc->key_5 }}" readonly="readonly"/>
                </div>
                <div class="form-group">
                  <label for="ssid">Ssid</label>
                  <input type="text" class="form-control" value="{{ $historialnfc->ssid }}" readonly="readonly"/>
                </div>
                <div class="form-group">
                  <label for="password">Pasw</label>
                  <input type="text" class="form-control" value="{{ $historialnfc->password }}" readonly="readonly"/>
                </div>
                <div class="form-group">
                  <label for="dns_server">Dns Server</label>
                  <input type="text" class="form-control" value="{{ $historialnfc->dns_server }}" readonly="readonly"/>
                </div>
                <div class="form-group">
                  <label for="ip_server">IP Server</label>
                  <input type="text" class="form-control" value="{{ $historialnfc->ip_server }}" readonly="readonly"/>
                </div>
                <div class="form-group">
                  <label for="protocol">Protocol</label>
                  <input type="text" class="form-control" value="{{ $historialnfc->protocol }}" readonly="readonly"/>
                </div>
                <div class="form-group">
                  <label for="port">Puerto</label>
                  <input type="text" class="form-control" value="{{ $historialnfc->port }}" readonly="readonly"/>
                </div>
                <div class="form-group">
                  <label for="text">Texto</label>
                  <input type="text" class="form-control" value="{{ $historialnfc->text }}" readonly="readonly"/>
                </div>
              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <a href="{{ route('historialnfc.index') }}" class="btn btn-info pull-right">Regresar</a>
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