@extends('adminlte::page')
@section('title', 'Hotspot|Contador')
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
          <div class="card card-warning card-outline">
            <div class="card-header">
              <h3 class="card-title">Editar Contador</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
            <!-- form start -->
            <form role="form" action="{{ route('counter.update',$counter->id) }}" method="POST">
            @csrf
            @method('PUT')
              <div class="card-body">
              <div class="form-group">
                    <label for="crd_id">Crd Id</label>
                        <select class="form-control" name="crd_id" id="crd_id" value="{{ $counter->crd_id }}">
                          @foreach($crds as $crd)
                          <option>{{ $crd->id }}</option>
                          @endforeach
                        </select>
              </div>
              <div class="form-group">
                    <label for="erb_id">Erb Id</label>
                        <select class="form-control" name="erb_id" id="erb_id" value="{{ $counter->erb_id }}">
                          @foreach($erbs as $erb)
                          <option>{{ $erb->id }}</option>
                          @endforeach
                        </select>
              </div>
              <div class="form-group">
                <label for="nfc_id">Nfc Id</label>
                    <select class="form-control" name="nfc_id" id="nfc_id" value="{{ $counter->nfc_id }}">
                      @foreach($nfcs as $nfc)
                      <option>{{ $nfc->id }}</option>
                      @endforeach
                    </select>
              </div>
                <div class="form-group">
                  <label for="num_serie">Numero de Serie</label>
                  <input type="text" class="form-control" name="num_serie" id="num_serie"  placeholder="Introduce Numero de serie" required value="{{ $counter->num_serie }}" />
                </div>
                <div class="form-group">
                  <label for="cont_qr">Contador Qr</label>
                  <input type="text" class="form-control" name="cont_qr" id="cont_qr"  placeholder="Introduce contador qr" required value="{{ $counter->cont_qr }}" />
                </div>
                <div class="form-group">
                  <label for="cont_mon">Contador Monedero</label>
                  <input type="text" class="form-control" name="cont_mon" id="cont_mon"  placeholder="Introduce Contador Monedero" required value="{{ $counter->cont_mon }}" />
                </div>
                <div class="form-group">
                  <label for="cont_mon_2">Contador Monedero 2</label>
                  <input type="text" class="form-control" name="cont_mon_2" id="cont_mon_2"  placeholder="Introduce Contador Monedero 2" required value="{{ $counter->cont_mon_2 }}" />
                </div>
                <div class="form-group">
                  <label for="cont_corte">Contador Corte</label>
                  <input type="text" class="form-control" name="cont_corte" id="cont_corte"  placeholder="Introduce Contador Corte" required value="{{ $counter->cont_corte }}" />
                </div>
                <div class="form-group">
                  <label for="cont_prem">Contador Premios</label>
                  <input type="text" class="form-control" name="cont_prem" id="cont_prem"  placeholder="Introduce Contador Premios" required value="{{ $counter->cont_prem }}" />
                </div>
                 <div class="form-group">
                  <label for="cost_mon">Costo Moneda</label>
                  <input type="text" class="form-control" name="cost_mon" id="cost_mon"  placeholder="Introduce Costo Moneda" required value="{{ $counter->cost_mon }}" />
                </div>
                <div class="form-group">
                  <label for="ssid">Ssid</label>
                  <input type="text" class="form-control" name="ssid" id="ssid"  placeholder="Introduce Ssid" required value="{{ $counter->ssid }}" />
                </div>
                <div class="form-group">
                  <label for="passwd">Password</label>
                  <input type="text" class="form-control" name="passwd" id="passwd"  placeholder="Introduce Password" required value="{{ $counter->passwd }}" />
                </div>
                 <div class="form-group">
                  <label for="ip_server">Ip Server</label>
                  <input type="text" class="form-control" name="ip_server" id="ip_server"  placeholder="Introduce Ip Server" required value="{{ $counter->ip_server }}" />
                </div>
                <div class="form-group">
                  <label for="port">Puerto</label>
                  <input type="text" class="form-control" name="port" id="port"  placeholder="Introduce Puerto" required value="{{ $counter->port }}" />
                </div>
                <div class="form-group">
                  <label for="token">Token</label>
                  <input type="text" class="form-control" name="token" id="token"  placeholder="Introduce Token" required value="{{ $counter->token }}" />
                </div>
                <div class="form-group">
                  <label for="text">Texto</label>
                  <input type="text" class="form-control" name="text" id="text"  placeholder="Introduce Texto" required value="{{ $counter->text }}" />
                </div>
              </div>
              <!-- /.card-body -->

              <div class="card-footer">
                <a href="{{ route('counter.index') }}" class="btn btn-default">Cancelar</a>
                <button type="submit" class="btn btn-warning pull-right" >Enviar</button>
              </div>
            </form>
          </div>
          <!-- /.card -->
          <!-- form-->
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