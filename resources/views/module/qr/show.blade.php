@extends('adminlte::page')
@section('title', 'Hotspot-Qr')
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
              <h3 class="card-title">Tabla Qr</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
            <form role="form">
              <div class="card-body">
                <div class="form-group">
                  <label for="id">Id</label>
                  <input type="text" class="form-control" value="{{ $qr->id }}" readonly="readonly"/>
                </div>
                <div class="form-group">
                  <label for="crd_id">Crd Id</label>
                  <input type="text" class="form-control" value="{{ $qr->crd_id }}" readonly="readonly"/>
                </div>
                <div class="form-group">
                  <label for="erb_id">Erb Id</label>
                  <input type="text" class="form-control" value="{{ $qr->erb_id }}" readonly="readonly"/>
                </div>
                <div class="form-group">
                  <label for="qr_serie">QrSerie</label>
                  <input type="text" class="form-control" value="{{ $qr->qr_serie }}" readonly="readonly"/>
                </div>
                <div class="form-group">
                  <label for="coins">Coins</label>
                  <input type="text" class="form-control" value="{{ $qr->coins }}" readonly="readonly"/>
                </div>
                <div class="form-group">
                  <label for="gone_down">Actualizado</label>
                  <input type="text" class="form-control" value="{{ $qr->gone_down }}" readonly="readonly"/>
                </div>
              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <a href="{{ route('qr.index') }}" class="btn btn-info pull-right">Regresar</a>
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