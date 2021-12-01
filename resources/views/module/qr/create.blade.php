@extends('adminlte::page')
@section('title', 'Hotspot|Qr')
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
              <h3 class="card-title">Crear Qr</h3>
            </div>
            <!-- /.card-header 'id', 'crd_id', 'qr_id', 'qr_serie', 'coins', 'gone_down' -->
            <div class="card-body">
            <!-- form start -->
            <form role="form" action="{{ route('qr.store')}}" method="POST">
              @csrf
              <div class="card-body">
              <div class="form-group">
                    <label for="crd_id">Crd Id</label>
                        <select class="form-control" name="crd_id" id="crd_id"> 
                          {{--<option selected="true">{{ $qr->user_asign }}</option>--}}
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
                  <label for="qr_serie">Qr Serie (sin espacios en blanco)</label>
                  <input type="text" class="form-control" name="qr_serie" id="qr_serie"  placeholder="Introduce qr serie" required>
                </div>
                <div class="form-group">
                  <label for="coins">Monedas</label>
                  <input type="text" class="form-control" name="coins" id="coins"  placeholder="Introduce coins" required>
                </div>
                <div class="form-group">
                  <label for="gone_down">Actualizado</label>
                  <input type="text" class="form-control" name="gone_down" id="gone_down"  placeholder="Introduce 0-sin actualizar 1-actualizado" required>
                </div>
              </div>
              <!-- /.card-body -->

              <div class="card-footer">
                <a href="{{ route('qr.index') }}" class="btn btn-default">Cancelar</a>
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
<div class="pull-right hidden-xs"><b>Version</b> 2.0.1<strong>  Copyright &copy; 2021 <a href="http://hotspot.fjlic.com/home" target="_blank">Hotspot</a>.</strong>  Todo los derechos Reservados.</div> 
@stop

@section('css')
@toastr_css    
@stop

@section('js')
@toastr_js
@toastr_render
@stop