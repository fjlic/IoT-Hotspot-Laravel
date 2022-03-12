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

 <!-- Main content -->
 <section class="content">
      <div class="row">
        <div class="col-12">
            <div class="card card-success card-outline">
            <div class="card-header">
              <h3 class="card-title">Create Counter</h3>
            </div>
            <!-- /.card-header 'id', 'crd_id', 'erb_id', 'nfc_id', 'num_serie', 'cont_qr', 'cont_mon', -->
            <div class="card-body">
            <!-- form start -->
            <form role="form" action="{{ route('counter.store')}}" method="POST">
              @csrf
              <div class="card-body">
              <div class="form-group">
                    <label for="crd_id">Crd Id</label>
                        <select class="form-control" name="crd_id" id="crd_id"> 
                          {{--<option selected="true">{{ $counter->user_asign }}</option>--}}
                          @foreach($crds as $crd)
                          <option>{{ $crd->id }}</option>
                          @endforeach
                        </select>
              </div>
              <div class="form-group">
                    <label for="erb_id">Erb Id</label>
                        <select class="form-control" name="erb_id" id="erb_id"> 
                          {{--<option selected="true">{{ $erb->user_asign }}</option>--}}
                          @foreach($erbs as $erb)
                          <option>{{ $erb->id }}</option>
                          @endforeach
                        </select>
              </div>
              <div class="form-group">
                <label for="nfc_id">Nfc Id</label>
                    <select class="form-control" name="nfc_id" id="nfc_id"> 
                      {{--<option selected="true">{{ $erb->user_asign }}</option>--}}
                      @foreach($nfcs as $nfc)
                      <option>{{ $nfc->id }}</option>
                      @endforeach
                    </select>
              </div>
                <div class="form-group">
                  <label for="num_serie">Serial Number</label>
                  <input type="text" class="form-control" name="num_serie" id="num_serie"  placeholder="Enter machine serial number" required>
                </div>
                <div class="form-group">
                  <label for="cont_qr">Qr Counter</label>
                  <input type="text" class="form-control" name="cont_qr" id="cont_qr"  placeholder="Enter qr counter" required>
                </div>
                <div class="form-group">
                  <label for="cont_mon">Coin Counter</label>
                  <input type="text" class="form-control" name="cont_mon" id="cont_mon"  placeholder="Enter Coin Counter" required>
                </div>
                
                <div class="form-group">
                  <label for="cont_mon_2">Coin Counter 2</label>
                  <input type="text" class="form-control" name="cont_mon_2" id="cont_mon_2"  placeholder="Enter Coin Counter 2" required>
                </div>
                
                <div class="form-group">
                  <label for="cont_corte">Cut Counter</label>
                  <input type="text" class="form-control" name="cont_corte" id="cont_corte"  placeholder="Enter Court Counter" required>
                </div>
                <div class="form-group">
                  <label for="cont_prem">Prize Counter</label>
                  <input type="text" class="form-control" name="cont_prem" id="cont_prem"  placeholder="Enter Prize Counter" required>
              </div>
              <div class="form-group">
                  <label for="cost_mon">Cost Currency</label>
                  <input type="text" class="form-control" name="cost_mon" id="cost_mon"  placeholder="Enter Cost Currency" required>
              </div>
              <div class="form-group">
                  <label for="ssid">Ssid</label>
                  <input type="text" class="form-control" name="ssid" id="ssid"  placeholder="Enter Ssid" required>
                </div>
              <div class="form-group">
                  <label for="passwd">Password</label>
                  <input type="text" class="form-control" name="passwd" id="passwd"  placeholder="Enter Password" required>
                </div>
              <div class="form-group">
                  <label for="ip_server">Ip Server</label>
                  <input type="text" class="form-control" name="ip_server" id="ip_server"  placeholder="Enter Ip Server" required>
                </div>
              <div class="form-group">
                  <label for="port">Port</label>
                  <input type="text" class="form-control" name="port" id="port"  placeholder="Enter Port" required>
                </div>
              <div class="form-group">
                  <label for="text">Text</label>
                  <input type="text" class="form-control" name="text" id="text"  placeholder="Enter Text" required>
                </div>
              </div>
              <!-- /.card-body -->

              <div class="card-footer">
                <a href="{{ route('counter.index') }}" class="btn btn-default">Cancel</a>
                <button type="submit" class="btn btn-success pull-right" >Send</button>
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