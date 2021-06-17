@extends('adminlte::page')
@section('title', 'Hotspot-Historial-Counter')
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

 <!-- Main content  'id', 'crd_id', 'erb_id', 'nfc_id', 'num_serie', 'cont_qr', 'cont_mon', -->
 <section class="content">
      <div class="row">
        <div class="col-12">
          <div class="card card-info card-outline">
            <div class="card-header">
              <h3 class="card-title">Ver Historial Contador</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
            <form role="form">
              <div class="card-body">
                <div class="form-group">
                  <label for="id">Id</label>
                  <input type="text" class="form-control" value="{{ $historialcounter->id }}" readonly="readonly"/>
                </div>
                <div class="form-group">
                  <label for="erb_id">Contador Id</label>
                  <input type="text" class="form-control" value="{{ $historialcounter->counter_id }}" readonly="readonly"/>
                </div>
                <div class="form-group">
                  <label for="num_serie">Serie</label>
                  <input type="text" class="form-control" value="{{ $historialcounter->num_serie }}" readonly="readonly"/>
                </div>
                <div class="form-group">
                  <label for="cont_qr">Contador Qr</label>
                  <input type="text" class="form-control" value="{{ $historialcounter->cont_qr }}" readonly="readonly"/>
                </div>
                <div class="form-group">
                  <label for="cont_mon">Contador Monedas</label>
                  <input type="text" class="form-control" value="{{ $historialcounter->cont_mon }}" readonly="readonly"/>
                </div>
                <div class="form-group">
                  <label for="cont_mon_2">Contador Monedas 2</label>
                  <input type="text" class="form-control" value="{{ $historialcounter->cont_mon_2 }}" readonly="readonly"/>
                </div>
                <div class="form-group">
                  <label for="cont_corte">Contador Corte</label>
                  <input type="text" class="form-control" value="{{ $historialcounter->cont_corte }}" readonly="readonly"/>
                </div>
                <div class="form-group">
                  <label for="cont_prem">Contador Premio</label>
                  <input type="text" class="form-control" value="{{ $historialcounter->cont_prem }}" readonly="readonly"/>
                </div>
                <div class="form-group">
                  <label for="cost_mon">Costo Moneda</label>
                  <input type="text" class="form-control" value="{{ $historialcounter->cost_mon }}" readonly="readonly"/>
                </div>
                <div class="form-group">
                  <label for="ssid">Ssid</label>
                  <input type="text" class="form-control" value="{{ $historialcounter->ssid }}" readonly="readonly"/>
                </div>
                <div class="form-group">
                  <label for="passwd">Password</label>
                  <input type="text" class="form-control" value="{{ $historialcounter->passwd }}" readonly="readonly"/>
                </div>
                <div class="form-group">
                  <label for="ip_server">Ip Server</label>
                  <input type="text" class="form-control" value="{{ $historialcounter->ip_server }}" readonly="readonly"/>
                </div>
                <div class="form-group">
                  <label for="port">Puerto</label>
                  <input type="text" class="form-control" value="{{ $historialcounter->port }}" readonly="readonly"/>
                </div>
                <div class="form-group">
                  <label for="token">Token</label>
                  <input type="text" class="form-control" value="{{ $historialcounter->token }}" readonly="readonly"/>
                </div>
                <div class="form-group">
                  <label for="text">Texto</label>
                  <input type="text" class="form-control" value="{{ $historialcounter->text }}" readonly="readonly"/>
                </div>
              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <a href="{{ route('historialcounter.index') }}" class="btn btn-info pull-right">Regresar</a>
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
<div class="pull-right hidden-xs"><b>Version</b> 2.0.1<strong>  Copyright &copy; 2021 <a href="http://hotspot.fjlic.com/home" target="_blank">Hotspot</a>.</strong>  Todo los derechos Reservados.</div> 
@stop

@section('css')
@toastr_css
@stop

@section('js')
@toastr_js
@toastr_render
@stop