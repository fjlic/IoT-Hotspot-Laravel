@extends('adminlte::page')
@section('title', 'Hotspot|Historial|Qr')
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
              <h3 class="card-title">Editar Historial Qr</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
            <!-- form start -->
            <form role="form" action="{{ route('historialqr.update',$historialqr->id) }}" method="POST">
            @csrf
            @method('PUT')
              <div class="card-body">
              <div class="form-group">
                    <label for="qr_id">Qr Id</label>
                        <select class="form-control" name="qr_id" id="qr_id" value="{{ $historialqr->qr_id }}">
                          @foreach($qrs as $qr)
                          <option>{{ $qr->id }}</option>
                          @endforeach
                        </select>
              </div>
                <div class="form-group">
                  <label for="name_machine">Maquina</label>
                  <input type="text" class="form-control" name="name_machine" id="name_machine"  placeholder="Introduce Num serie" required value="{{ $historialqr->name_machine }}" />
                </div>
                <div class="form-group">
                  <label for="nick_name">Nick</label>
                  <input type="text" class="form-control" name="nick_name" id="nick_name"  placeholder="Introduce Num serie" required value="{{ $historialqr->nick_name }}" />
                </div>
                <div class="form-group">
                  <label for="qr_serie">Qr Serie</label>
                  <input type="text" class="form-control" name="qr_serie" id="qr_serie"  placeholder="Introduce Num serie" required value="{{ $historialqr->qr_serie }}" />
                </div>
                <div class="form-group">
                  <label for="coins">Coins</label>
                  <input type="text" class="form-control" name="coins" id="coins"  placeholder="Introduce alias" required value="{{ $historialqr->coins }}" />
                </div>
                <div class="form-group">
                  <label for="uploaded">Actualizado</label>
                  <input type="text" class="form-control" name="uploaded" id="uploaded"  placeholder="Introduce alias" required value="{{ $historialqr->uploaded }}" />
                </div>
              </div>
              <!-- /.card-body -->

              <div class="card-footer">
                <a href="{{ route('historialqr.index') }}" class="btn btn-default">Cancelar</a>
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
<div class="pull-right hidden-xs"><b>Version</b> 2.0.0<strong>  Copyright &copy; 2020 <a href="http://hotspot.local/home" target="_blank">Hotspot</a>.</strong>  Todo los derechos Reservados.</div> 
@stop

@section('css')
@toastr_css 
@stop

@section('js')
@toastr_js
@toastr_render
@stop