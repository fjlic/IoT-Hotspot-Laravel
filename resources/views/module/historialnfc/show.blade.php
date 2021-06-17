@extends('adminlte::page')
@section('title', 'Hotspot-Historial-Nfc')
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
              <h3 class="card-title">Ver HIstorial Nfc</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
            <!-- form start -->
            <!--'id', 'nfc_id', 'num_serie', 'cont_qr', 'cont_mon', 'cont_corte', 'cont_prem', 'cost_mon', 'ssid', 'passwd', 'ip_server', 'port', 'txt', -->
            <form role="form">
              <div class="card-body">
                <div class="form-group">
                  <label for="nfc_id">Id Nfc</label>
                  <input type="text" class="form-control" value="{{ $historialnfc->nfc_id }}" readonly="readonly"/>
                </div>
                <div class="form-group">
                  <label for="num_serie">Serie</label>
                  <input type="text" class="form-control" value="{{ $historialnfc->num_serie }}" readonly="readonly"/>
                </div>
                <div class="form-group">
                  <label for="cont_qr">Nfc Qr</label>
                  <input type="text" class="form-control" value="{{ $historialnfc->cont_qr }}" readonly="readonly"/>
                </div>
                <div class="form-group">
                  <label for="cont_mon">Contador Monedero</label>
                  <input type="text" class="form-control" value="{{ $historialnfc->cont_mon }}" readonly="readonly"/>
                </div>
                <div class="form-group">
                  <label for="cont_mon_2">Contador Monedero 2</label>
                  <input type="text" class="form-control" value="{{ $historialnfc->cont_mon_2 }}" readonly="readonly"/>
                </div>
                <div class="form-group">
                  <label for="cont_corte">Contador Corte</label>
                  <input type="text" class="form-control" value="{{ $historialnfc->cont_corte }}" readonly="readonly"/>
                </div>
                <div class="form-group">
                  <label for="cont_prem">Contador Premio</label>
                  <input type="text" class="form-control" value="{{ $historialnfc->cont_prem }}" readonly="readonly"/>
                </div>
                <div class="form-group">
                  <label for="cost_mon">Costo Moneda</label>
                  <input type="text" class="form-control" value="{{ $historialnfc->cost_mon }}" readonly="readonly"/>
                </div>
                <div class="form-group">
                  <label for="ssid">Ssid</label>
                  <input type="text" class="form-control" value="{{ $historialnfc->ssid }}" readonly="readonly"/>
                </div>
                <div class="form-group">
                  <label for="passwd">Pasw</label>
                  <input type="text" class="form-control" value="{{ $historialnfc->passwd }}" readonly="readonly"/>
                </div>
                <div class="form-group">
                  <label for="ip_server">IP Server</label>
                  <input type="text" class="form-control" value="{{ $historialnfc->ip_server }}" readonly="readonly"/>
                </div>
                <div class="form-group">
                  <label for="port">Puerto</label>
                  <input type="text" class="form-control" value="{{ $historialnfc->port }}" readonly="readonly"/>
                </div>
                <div class="form-group">
                  <label for="txt">Texto</label>
                  <input type="text" class="form-control" value="{{ $historialnfc->txt }}" readonly="readonly"/>
                </div>
              </div>
              <!-- /.card-body -->

              <div class="card-footer">
                <a href="{{ route('historialnfc.index') }}" class="btn btn-info pull-right">Regresar</a>
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

@section('css')
@toastr_css
@stop

@section('js')
@toastr_js
@toastr_render
@stop