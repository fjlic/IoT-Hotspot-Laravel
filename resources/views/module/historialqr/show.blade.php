@extends('adminlte::page')
@section('title', 'Hotspot-Historial-Qr')
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
              <h3 class="card-title">Tabla Historial Qr</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
            <form role="form">
              <div class="card-body">
                <div class="form-group">
                  <label for="id">Id</label>
                  <input type="text" class="form-control" value="{{ $historialqr->id }}" readonly="readonly"/>
                </div>
                <div class="form-group">
                  <label for="qr_id">Qr Id</label>
                  <input type="text" class="form-control" value="{{ $historialqr->qr_id }}" readonly="readonly"/>
                </div>
                <div class="form-group">
                  <label for="qr_serie">Qr Serie</label>
                  <input type="text" class="form-control" value="{{ $historialqr->qr_serie }}" readonly="readonly"/>
                </div>
                <div class="form-group">
                  <label for="coins">Coins</label>
                  <input type="text" class="form-control" value="{{ $historialqr->coins }}" readonly="readonly"/>
                </div>
                <div class="form-group">
                  <label for="uploaded">Actualizado</label>
                  <input type="text" class="form-control" value="{{ $historialqr->uploaded }}" readonly="readonly"/>
                </div>
              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <a href="{{ route('historialqr.index') }}" class="btn btn-info pull-right">Regresar</a>
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