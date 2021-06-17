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
          <div class="card card-info card-outline">
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
                  <label for="cont_qr">Contador Qr</label>
                  <input type="text" class="form-control" name="cont_qr" id="cont_qr"  readonly="readonly" required value="{{ $nfc->cont_qr }}">
                </div>
                <div class="form-group">
                  <label for="cont_mon">Contador Monedero</label>
                  <input type="text" class="form-control" name="cont_mon" id="cont_mon"  readonly="readonly" required value="{{ $nfc->cont_mon }}">
                </div>
                 <div class="form-group">
                  <label for="cont_mon_2">Contador Monedero 2</label>
                  <input type="text" class="form-control" name="cont_mon_2" id="cont_mon_2"  readonly="readonly" required value="{{ $nfc->cont_mon_2 }}">
                </div>
                <div class="form-group">
                  <label for="cont_corte">Contador Corte</label>
                  <input type="text" class="form-control" name="cont_corte" id="cont_corte"  readonly="readonly" required value="{{ $nfc->cont_corte }}">
                </div>
                <div class="form-group">
                  <label for="cont_prem">Contador Premio</label>
                  <input type="text" class="form-control" name="cont_prem" id="cont_prem"  readonly="readonly" required value="{{ $nfc->cont_prem }}">
                </div>
                <div class="form-group">
                  <label for="cost_mon">Costo Moneda</label>
                  <input type="text" class="form-control" name="cost_mon" id="cost_mon"  readonly="readonly" required value="{{ $nfc->cost_mon }}">
                </div>
                <div class="form-group">
                  <label for="ssid">Ssid</label>
                  <input type="text" class="form-control" name="ssid" id="ssid"  readonly="readonly" required value="{{ $nfc->ssid }}">
                </div>
                <div class="form-group">
                  <label for="passwd">Password</label>
                  <input type="text" class="form-control" name="passwd" id="passwd"  readonly="readonly" required value="{{ $nfc->passwd }}">
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
                  <label for="txt">Text</label>
                  <input type="text" class="form-control" name="txt" id="txt"  readonly="readonly" required value="{{ $nfc->txt }}">
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