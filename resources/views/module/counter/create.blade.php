@extends('adminlte::page')
@section('title', 'Hotspot-Counter')
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
              <h3 class="card-title">Crear Contador</h3>
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
                  <label for="num_serie">Numero de serie</label>
                  <input type="text" class="form-control" name="num_serie" id="num_serie"  placeholder="Introduce numero de serie maquina" required>
                </div>
                <div class="form-group">
                  <label for="cont_qr">Contador Qr</label>
                  <input type="text" class="form-control" name="cont_qr" id="cont_qr"  placeholder="Introduce contador qr" required>
                </div>
                <div class="form-group">
                  <label for="cont_mon">Contador Monedero</label>
                  <input type="text" class="form-control" name="cont_mon" id="cont_mon"  placeholder="Introduce contador monedero" required>
                </div>
              </div>
              <!-- /.card-body -->

              <div class="card-footer">
                <a href="{{ route('counter.index') }}" class="btn btn-default">Cancelar</a>
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