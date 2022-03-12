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
          <div class="card card-warning card-outline">
            <div class="card-header">
              <h3 class="card-title">Edit Counter</h3>
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
                  <label for="num_serie">Serial number</label>
                  <input type="text" class="form-control" name="num_serie" id="num_serie"  placeholder="Enter serial number" required value="{{ $counter->num_serie }}" />
                </div>
                <div class="form-group">
                  <label for="cont_qr">Qr counter</label>
                  <input type="text" class="form-control" name="cont_qr" id="cont_qr"  placeholder="Enter Qr counter" required value="{{ $counter->cont_qr }}" />
                </div>
                <div class="form-group">
                  <label for="cont_mon">Coin Counter</label>
                  <input type="text" class="form-control" name="cont_mon" id="cont_mon"  placeholder="Enter Coin Counter" required value="{{ $counter->cont_mon }}" />
                </div>
                <div class="form-group">
                  <label for="cont_mon_2">Coin Counter 2</label>
                  <input type="text" class="form-control" name="cont_mon_2" id="cont_mon_2"  placeholder="Enter Coin Counter 2" required value="{{ $counter->cont_mon_2 }}" />
                </div>
                <div class="form-group">
                  <label for="cont_corte">Court Counter</label>
                  <input type="text" class="form-control" name="cont_corte" id="cont_corte"  placeholder="Enter Court Counter" required value="{{ $counter->cont_corte }}" />
                </div>
                <div class="form-group">
                  <label for="cont_prem">Counter Prizes</label>
                  <input type="text" class="form-control" name="cont_prem" id="cont_prem"  placeholder="Enter Counter Prizes" required value="{{ $counter->cont_prem }}" />
                </div>
                 <div class="form-group">
                  <label for="cost_mon">Cost Currency</label>
                  <input type="text" class="form-control" name="cost_mon" id="cost_mon"  placeholder="Enter Cost Currency" required value="{{ $counter->cost_mon }}" />
                </div>
                <div class="form-group">
                  <label for="ssid">Ssid</label>
                  <input type="text" class="form-control" name="ssid" id="ssid"  placeholder="Enter Ssid" required value="{{ $counter->ssid }}" />
                </div>
                <div class="form-group">
                  <label for="passwd">Password</label>
                  <input type="text" class="form-control" name="passwd" id="passwd"  placeholder="Enter Password" required value="{{ $counter->passwd }}" />
                </div>
                 <div class="form-group">
                  <label for="ip_server">Ip Server</label>
                  <input type="text" class="form-control" name="ip_server" id="ip_server"  placeholder="Enter Ip Server" required value="{{ $counter->ip_server }}" />
                </div>
                <div class="form-group">
                  <label for="port">Port</label>
                  <input type="text" class="form-control" name="port" id="port"  placeholder="Enter Port" required value="{{ $counter->port }}" />
                </div>
                <div class="form-group">
                  <label for="token">Token</label>
                  <input type="text" class="form-control" name="token" id="token"  placeholder="Enter Token" required value="{{ $counter->token }}" />
                </div>
                <div class="form-group">
                  <label for="text">Text</label>
                  <input type="text" class="form-control" name="text" id="text"  placeholder="Enter Texto" required value="{{ $counter->text }}" />
                </div>
              </div>
              <!-- /.card-body -->

              <div class="card-footer">
                <a href="{{ route('counter.index') }}" class="btn btn-default">Cancel</a>
                <button type="submit" class="btn btn-warning pull-right">Send</button>
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
<div class="pull-right hidden-xs"><b>Version</b> 2.1.1 <strong>  Copyright &copy; 2022 <a href="http://hotspot.fjlic.com/home" target="_blank">Hotspot</a>.</strong>  All rights reserved.</div>
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