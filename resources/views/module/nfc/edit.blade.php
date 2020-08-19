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
            <div class="box card-warning card-outline">
            <div class="box-header">
              <h3 class="box-title">Editar Nfc</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                  <!-- form start -->
            <form role="form" action="{{ route('nfc.update',$nfc->id) }}" method="POST">
            @csrf
            @method('PUT')
              <div class="box-body">
              <!--'id', 'esp32_id', 'num_serie', 'key_1', 'key_2', 'key_3', 'key_4', 'key_5', 'ssid', 'password', 'dns_server', 'ip_server', 'protocol', 'port', 'text', -->
               <div class="form-group">
                    <label for="esp32_id">Esp32 Asignar</label>
                        <select class="form-control" name="esp32_id" id="esp32_id"> 
                          @foreach($esp32s as $esp32)
                          <option>{{ $esp32->id }}</option>
                          @endforeach
                        </select>
               </div>
                <div class="form-group">
                  <label for="num_serie">Numero Serie</label>
                  <input type="text" class="form-control" name="num_serie" id="num_serie"  placeholder="Introduce Numero de Serie" required value="{{ $nfc->num_serie }}">
                </div>
                <div class="form-group">
                  <label for="key_1">Clave 1</label>
                  <input type="text" class="form-control" name="key_1" id="key_1"  placeholder="Introduce Clave 1" required value="{{ $nfc->key_1 }}">
                </div>
                <div class="form-group">
                  <label for="key_2">Clave 2</label>
                  <input type="text" class="form-control" name="key_2" id="key_2"  placeholder="Introduce Clave 2" required value="{{ $nfc->key_2 }}">
                </div>
                <div class="form-group">
                  <label for="key_3">Clave 3</label>
                  <input type="text" class="form-control" name="key_3" id="key_3"  placeholder="Introduce Clave 3" required value="{{ $nfc->key_3 }}">
                </div>
                <div class="form-group">
                  <label for="key_4">Clave 4</label>
                  <input type="text" class="form-control" name="key_4" id="key_4"  placeholder="Introduce Clave 4" required value="{{ $nfc->key_4 }}">
                </div>
                <div class="form-group">
                  <label for="key_5">Clave 5</label>
                  <input type="text" class="form-control" name="key_5" id="key_5"  placeholder="Introduce Clave 5" required value="{{ $nfc->key_5 }}">
                </div>
                <div class="form-group">
                  <label for="ssid">Ssid</label>
                  <input type="text" class="form-control" name="ssid" id="ssid"  placeholder="Introduce ssid" required value="{{ $nfc->ssid }}">
                </div>
                <div class="form-group">
                  <label for="password">Password</label>
                  <input type="text" class="form-control" name="password" id="password"  placeholder="Introduce password" required value="{{ $nfc->password }}">
                </div>
                <div class="form-group">
                  <label for="dns_server">Dns Servidor</label>
                  <input type="text" class="form-control" name="dns_server" id="dns_server"  placeholder="Introduce dns" required value="{{ $nfc->dns_server }}">
                </div>
                <div class="form-group">
                  <label for="ip_server">Ip Servidor</label>
                  <input type="text" class="form-control" name="ip_server" id="ip_server"  placeholder="Introduce ip" required value="{{ $nfc->ip_server }}">
                </div>
                <div class="form-group">
                  <label for="port">port</label>
                  <input type="text" class="form-control" name="port" id="port"  placeholder="Introduce puerto" required value="{{ $nfc->port }}">
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
                  <input type="text" class="form-control" name="text" id="text"  placeholder="Introduce text" required value="{{ $nfc->text }}">
                </div>
              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <a href="{{ route('nfc.index') }}" class="btn btn-default">Cancelar</a>
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