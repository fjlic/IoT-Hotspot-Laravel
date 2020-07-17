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
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Ver Nfc</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
            <form role="form">
              <div class="card-body">
              <div class="form-group">
                  <label for="crd_id">Crd Id</label>
                  <input type="text" class="form-control" value="{{ $nfc->crd_id }}" readonly="readonly"/>
                </div>
                <div class="form-group">
                  <label for="erb_id">Erb Id</label>
                  <input type="text" class="form-control" value="{{ $nfc->erb_id }}" readonly="readonly"/>
                </div>
                <div class="form-group">
                  <label for="num_serie">Numero Serie</label>
                  <input type="text" class="form-control" name="num_serie" id="num_serie"  readonly="readonly" required value="{{ $nfc->num_serie }}">
                </div>
                <div class="form-group">
                  <label for="count_global">Contador Global</label>
                  <input type="text" class="form-control" name="count_global" id="count_global"  readonly="readonly" required value="{{ $nfc->count_global }}">
                </div>
                <div class="form-group">
                  <label for="count_between_cuts">Contador entre Cortes</label>
                  <input type="text" class="form-control" name="count_between_cuts" id="count_between_cuts"  readonly="readonly" required value="{{ $nfc->count_between_cuts }}">
                </div>
                <div class="form-group">
                  <label for="time_global_between_cuts">Tiempo Global entre Cortes</label>
                  <input type="text" class="form-control" name="time_global_between_cuts" id="time_global_between_cuts"  readonly="readonly" required value="{{ $nfc->time_global_between_cuts }}">
                </div>
                <div class="form-group">
                  <label for="time_between_cuts">Tiempo entre Corte</label>
                  <input type="text" class="form-control" name="time_between_cuts" id="time_between_cuts"  readonly="readonly" required value="{{ $nfc->time_between_cuts }}">
                </div>
                <div class="form-group">
                  <label for="prizes_count">Pzs</label>
                  <input type="text" class="form-control" name="prizes_count" id="prizes_count"  readonly="readonly" required value="{{ $nfc->prizes_count }}">
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