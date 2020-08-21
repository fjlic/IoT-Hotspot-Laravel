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
          <div class="card card-warning card-outline">
            <div class="card-header">
              <h3 class="card-title">Editar Qr</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
            <!-- form start -->
            <form role="form" action="{{ route('qr.update',$qr->id) }}" method="POST">
            @csrf
            @method('PUT')
              <div class="card-body">
              <div class="form-group">
                    <label for="crd_id">Crd Id</label>
                        <select class="form-control" name="crd_id" id="crd_id" value="{{ $qr->crd_id }}">
                          @foreach($crds as $crd)
                          <option>{{ $crd->id }}</option>
                          @endforeach
                        </select>
              </div>
              <div class="form-group">
                    <label for="erb_id">Erb Id</label>
                        <select class="form-control" name="erb_id" id="erb_id" value="{{ $qr->erb_id }}">
                          @foreach($erbs as $erb)
                          <option>{{ $erb->id }}</option>
                          @endforeach
                        </select>
              </div>
                <div class="form-group">
                  <label for="qr_serie">Qr serie</label>
                  <input type="text" class="form-control" name="qr_serie" id="qr_serie"  placeholder="Introduce Num serie" required value="{{ $qr->qr_serie }}" />
                </div>
                <div class="form-group">
                  <label for="coins">Coins</label>
                  <input type="text" class="form-control" name="coins" id="coins"  placeholder="Introduce alias" required value="{{ $qr->coins }}" />
                </div>
                <div class="form-group">
                  <label for="gone_down">Actualizado</label>
                  <input type="text" class="form-control" name="gone_down" id="gone_down"  placeholder="Introduce alias" required value="{{ $qr->gone_down }}" />
                </div>
              </div>
              <!-- /.card-body -->

              <div class="card-footer">
                <a href="{{ route('qr.index') }}" class="btn btn-default">Cancelar</a>
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