@extends('adminlte::page')
@section('title', 'Hotspot-Nfc')
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
            <div class="card card-warning card-outline">
            <div class="card-header">
              <h3 class="card-title">Editar Nfc</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                  <!-- form start -->
            <form role="form" action="{{ route('nfc.update',$nfc->id) }}" method="POST">
            @csrf
            @method('PUT')
              <div class="card-body">
              <!--'id', 'esp32_id', 'num_serie', 'key_1', 'key_2', 'key_3', 'key_4', 'key_5', 'ssid', 'password', 'dns_server', 'ip_server', 'protocol', 'port', 'text', -->
              <div class="form-group">
                <label for="erb_id">Erb Asignar</label>
                    <select class="form-control" name="erb_id" id="erb_id"> 
                      <option selected="true">{{ $nfc->erb_id }}</option> 
                      @foreach($erbs as $erb)
                      <option>{{ $erb->id }}</option>
                      @endforeach
                    </select>
           </div>
           <div class="form-group">
                <label for="crd_id">Crd Asignar</label>
                    <select class="form-control" name="crd_id" id="crd_id"> 
                      <option selected="true">{{ $nfc->crd_id }}</option> 
                      @foreach($crds as $crd)
                      <option>{{ $crd->id }}</option>
                      @endforeach
                    </select>
           </div>
            <div class="form-group">
              <label for="num_serie">Numero Serie</label>
              <input type="text" class="form-control" name="num_serie" id="num_serie"  placeholder="Introduce Numero de Serie" required value="{{ $nfc->num_serie }}">
            </div>
            <div class="form-group">
              <label for="cont_qr">Contador Qr</label>
              <input type="text" class="form-control" name="cont_qr" id="cont_qr"  placeholder="Introduce Contador Qr" required value="{{ $nfc->cont_qr }}">
            </div>
            <div class="form-group">
              <label for="cont_mon">Contador Monedero</label>
              <input type="text" class="form-control" name="cont_mon" id="cont_mon"  placeholder="Introduce Contador Monedero" required value="{{ $nfc->cont_mon }}">
            </div>
             <div class="form-group">
              <label for="cont_mon_2">Contador Monedero 2</label>
              <input type="text" class="form-control" name="cont_mon_2" id="cont_mon_2"  placeholder="Introduce Contador Monedero 2" required value="{{ $nfc->cont_mon_2 }}">
            </div>
            <div class="form-group">
              <label for="cont_corte">Contador Corte</label>
              <input type="text" class="form-control" name="cont_corte" id="cont_corte"  placeholder="Introduce Contador Corte" required value="{{ $nfc->cont_corte }}">
            </div>
            <div class="form-group">
              <label for="cont_prem">Contador Premio</label>
              <input type="text" class="form-control" name="cont_prem" id="cont_prem"  placeholder="Introduce Contador Premio" required value="{{ $nfc->cont_prem }}">
            </div>
            <div class="form-group">
              <label for="cost_mon">Contador Monedero</label>
              <input type="text" class="form-control" name="cost_mon" id="cost_mon"  placeholder="Introduce Costo Moneda" required value="{{ $nfc->cost_mon }}">
            </div>
            <div class="form-group">
              <label for="ssid">Ssid</label>
              <input type="text" class="form-control" name="ssid" id="ssid"  placeholder="Introduce ssid" required value="{{ $nfc->ssid }}">
            </div>
            <div class="form-group">
              <label for="passwd">Password</label>
              <input type="text" class="form-control" name="passwd" id="passwd"  placeholder="Introduce password" required value="{{ $nfc->passwd }}">
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
              <label for="txt">Text</label>
              <input type="text" class="form-control" name="txt" id="txt"  placeholder="Introduce Texto" required value="{{ $nfc->txt }}">
            </div>
              </div>
              <!-- /.card-body -->

              <div class="card-footer">
                <a href="{{ route('nfc.index') }}" class="btn btn-default">Cancelar</a>
                <button type="submit" class="btn btn-warning pull-right" >Enviar</button>
              </div>
            </form>
          </div>
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

@section('footer') 
<div class="pull-right hidden-xs"><b>Version</b> 2.0.1<strong>  Copyright &copy; 2021 <a href="http://hotspot.fjlic.com/home" target="_blank">Hotspot</a>.</strong>  Todo los derechos Reservados.</div> 
@stop

@section('css')
    
@stop

@section('js')
@stop