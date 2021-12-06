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
            <div class="card card-success card-outline">
            <div class="card-header">
              <h3 class="card-title">Crear Historial Qr</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
            <!-- form start -->
            <form role="form" action="{{ route('historialqr.store')}}" method="POST">
              @csrf
              <div class="card-body">
              <div class="form-group">
                    <label for="qr_id">Qr Id</label>
                        <select class="form-control" name="qr_id" id="qr_id"> 
                          {{--<option selected="true">{{ $qr->qr_asign }}</option>--}}
                          @foreach($qrs as $qr)
                          <option>{{ $qr->id }}</option>
                          @endforeach
                        </select>
              </div>
                <div class="form-group">
                  <label for="name_machine">Nombre</label>
                  <input type="text" class="form-control" name="name_machine" id="name_machine"  placeholder="Introduce maquina" required>
                </div>
                <div class="form-group">
                  <label for="nick_name">Alias</label>
                  <input type="text" class="form-control" name="nick_name" id="nick_name"  placeholder="Introduce alias" required>
                </div>
                <div class="form-group">
                  <label for="qr_serie">Qr Serie</label>
                  <input type="text" class="form-control" name="qr_serie" id="qr_serie"  placeholder="Introduce alias" required>
                </div>
                <div class="form-group">
                  <label for="coins">Coins</label>
                  <input type="text" class="form-control" name="coins" id="coins"  placeholder="Introduce coins" required>
                </div>
                <div class="form-group">
                  <label for="uploaded">Actualido</label>
                  <input type="text" class="form-control" name="uploaded" id="uploaded"  placeholder="Introduce 0-sin actualizar 1-actualizado" required>
                </div>
              </div>
              <!-- /.card-body -->

              <div class="card-footer">
                <a href="{{ route('historialqr.index') }}" class="btn btn-default">Cancelar</a>
                <button type="submit" class="btn btn-success pull-right" >Enviar</button>
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