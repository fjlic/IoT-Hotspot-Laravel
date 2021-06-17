@extends('adminlte::page')
@section('title', 'Hotspot-Probe-Estadistico')
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

 <!-- Main content  Part Name : VST -->
 <!-- Part Size : 23.3 -->
 <section class="content">
      <div class="row">
        <div class="col-12">
          <div class="card card-warning card-outline">
            <div class="card-header">
              <h3 class="card-title">Editar Probe Estadistico</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
            <!-- form start -->
            <form role="form" action="{{ route('probeestimating.update',$probeestimating->id) }}" method="POST">
            @csrf
            @method('PUT')
              <div class="card-body">
                <div class="form-group">
                   <!-- /.card-header 'id', 'prox_size', 'mod_size', 'stm_prox_size', 'act_dev_size', -->
                  <label for="prox_size">Tamaño Proxi</label>
                  <input type="text" class="form-control" name="prox_size" id="prox_size"  placeholder="Introduce tam prox" required value="{{ $probeestimating->prox_size }}" />
                </div>
                <div class="form-group">
                  <label for="mod_size">Tamaño Mod</label>
                  <input type="text" class="form-control" name="mod_size" id="mod_size"  placeholder="Introduce tam mod" required value="{{ $probeestimating->mod_size }}" />
                </div>
                <div class="form-group">
                  <label for="stm_prox_size">Estim Proxi</label>
                  <input type="text" class="form-control" name="stm_prox_size" id="stm_prox_size"  placeholder="Introduce proxi estimado" required value="{{ $probeestimating->stm_prox_size }}" />
                </div>
                <div class="form-group">
                  <label for="act_dev_size">Act Dev</label>
                  <input type="text" class="form-control" name="act_dev_size" id="act_dev_size"  placeholder="Introduce proxi dev" required value="{{ $probeestimating->act_dev_size }}" />
                </div>
              </div>
              <!-- /.card-body -->

              <div class="card-footer">
                <a href="{{ route('probeestimating.index') }}" class="btn btn-default">Cancelar</a>
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