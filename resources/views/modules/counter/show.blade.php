@extends('adminlte::page')
@section('title', 'Hotspot|Counters')
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
              <h3 class="card-title">See Counter</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
            <form role="form">
              <div class="card-body">
                <div class="form-group">
                  <label for="id">Id</label>
                  <input type="text" class="form-control" value="{{ $counter->id }}" readonly="readonly"/>
                </div>
                <div class="form-group">
                  <label for="crd_id">Id Crd</label>
                  <input type="text" class="form-control" value="{{ $counter->crd_id }}" readonly="readonly"/>
                </div>
                {{-- <div class="form-group">
                  <label for="erb_id">Id Counter</label>
                  <input type="text" class="form-control" value="{{ $counter->erb_id }}" readonly="readonly"/>
                </div> --}}
                <div class="form-group">
                  <label for="erb_id">Id Nfc</label>
                  <input type="text" class="form-control" value="{{ $counter->nfc_id }}" readonly="readonly"/>
                </div>
                <div class="form-group">
                  <label for="num_serie">Serie</label>
                  <input type="text" class="form-control" value="{{ $counter->num_serie }}" readonly="readonly"/>
                </div>
                <div class="form-group">
                  <label for="cont_qr">Counter Qr</label>
                  <input type="text" class="form-control" value="{{ $counter->cont_qr }}" readonly="readonly"/>
                </div>
                <div class="form-group">
                  <label for="cont_mon">Counter Moneys</label>
                  <input type="text" class="form-control" value="{{ $counter->cont_mon }}" readonly="readonly"/>
                </div>
                <div class="form-group">
                  <label for="cont_mon_2">Counter Moneys 2</label>
                  <input type="text" class="form-control" value="{{ $counter->cont_mon_2 }}" readonly="readonly"/>
                </div>
                <div class="form-group">
                  <label for="cont_corte">Counter Cuts</label>
                  <input type="text" class="form-control" value="{{ $counter->cont_corte }}" readonly="readonly"/>
                </div>
                <div class="form-group">
                  <label for="cont_prem">Prize Counter</label>
                  <input type="text" class="form-control" value="{{ $counter->cont_prem }}" readonly="readonly"/>
                </div>
                <div class="form-group">
                  <label for="cost_mon">Currency Cost</label>
                  <input type="text" class="form-control" value="{{ $counter->cost_mon }}" readonly="readonly"/>
                </div>
                <div class="form-group">
                  <label for="ssid">Contador Ssid</label>
                  <input type="text" class="form-control" value="{{ $counter->ssid }}" readonly="readonly"/>
                </div>
                <div class="form-group">
                  <label for="passwd">Password</label>
                  <input type="text" class="form-control" value="{{ $counter->passwd }}" readonly="readonly"/>
                </div>
                <div class="form-group">
                  <label for="ip_server">Ip Server</label>
                  <input type="text" class="form-control" value="{{ $counter->ip_server }}" readonly="readonly"/>
                </div>
                <div class="form-group">
                  <label for="port">Port</label>
                  <input type="text" class="form-control" value="{{ $counter->port }}" readonly="readonly"/>
                </div>
                <div class="form-group">
                  <label for="text">Text</label>
                  <input type="text" class="form-control" value="{{ $counter->text }}" readonly="readonly"/>
                </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <a href="{{ route('counter.index') }}" class="btn btn-info pull-right">Regresar</a>
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
<div class="pull-right hidden-xs"><b>Version</b> 2.1.1<strong>  Copyright &copy; 2022 <a href="http://hotspot.fjlic.com/home" target="_blank">Hotspot</a>.</strong>  All rights reserved.</div> 
@stop

@section('css')
@toastr_css 
{{-- <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/botman-web-widget@0/build/assets/css/chat.min.css"> --}}
@stop

@section('js')
@toastr_js
@toastr_render
<script>
        var botmanWidget = {
          aboutText: 'FJLIC Help Center',
          introMessage: "✋ Hello!! I am your IoT-Hotspot assistant"
        };
</script>
<script src='https://cdn.jsdelivr.net/npm/botman-web-widget@0/build/js/widget.js'></script>
@stop