@extends('adminlte::page')
@section('title', 'Hotspot-Historial-Counter')
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

 <!-- Main content  'id', 'crd_id', 'erb_id', 'nfc_id', 'num_serie', 'cont_qr', 'cont_mon', -->
 <section class="content">
      <div class="row">
        <div class="col-12">
          <div class="card card-warning card-outline">
            <div class="card-header">
              <h3 class="card-title">Editar Historial Contador</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
            <!-- form start -->
            <form role="form" action="{{ route('historialcounter.update',$historialcounter->id) }}" method="POST">
            @csrf
            @method('PUT')
              <div class="card-body">
              <div class="form-group">
                <label for="counter_id">Contador Asignado</label>
                    <select class="form-control" name="counter_id" id="counter_id" value="{{ $historialcounter->counter_id }}">
                      @foreach($counters as $counter)
                      <option>{{ $counter->id }}</option>
                      @endforeach
                    </select>
              </div>
              <div class="form-group">
                <label for="nfc_id">Nfc id</label>
                <input type="text" class="form-control" name="nfc_id" id="nfc_id"  placeholder="Introduce un id Nfc" required value="{{ $historialcont->nfc_id }}" />
              </div>
              <div class="form-group">
                <label for="cont_qr">Contador Qr</label>
                <input type="text" class="form-control" name="cont_qr" id="cont_qr"  placeholder="Introduce Contador Qr" required value="{{ $historialcont->cont_qr }}" />
              </div>
              <div class="form-group">
                <label for="cont_mon">Contador Monedero</label>
                <input type="text" class="form-control" name="cont_mon" id="cont_mon"  placeholder="Introduce Contador Monedero" required value="{{ $historialcont->cont_mon }}" />
              </div>
              <div class="form-group">
                <label for="cont_mon_2">Contador Monedero</label>
                <input type="text" class="form-control" name="cont_mon_2" id="cont_mon_2"  placeholder="Introduce Contador Monedero 1" required value="{{ $historialcont->cont_mon_2 }}" />
              </div>
              <div class="form-group">
                <label for="cont_corte">Contador Corte</label>
                <input type="text" class="form-control" name="cont_corte" id="cont_corte"  placeholder="Introduce Contador Corte" required value="{{ $historialcont->cont_corte }}" />
              </div>
              <div class="form-group">
                <label for="cont_prem">Contador Premio</label>
                <input type="text" class="form-control" name="cont_prem" id="cont_prem"  placeholder="Introduce Contador Premio" required value="{{ $historialcont->cont_prem }}" />
              </div>
              <div class="form-group">
                <label for="cost_mon">Costo Moneda</label>
                <input type="text" class="form-control" name="cost_mon" id="cost_mon"  placeholder="Introduce Costo Moneda" required value="{{ $historialcont->cost_mon }}" />
              </div>
              </div>
              <!-- /.card-body -->

              <div class="card-footer">
                <a href="{{ route('historialcounter.index') }}" class="btn btn-default">Cancelar</a>
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
<div class="pull-right hidden-xs"><b>Version</b> 2.0.1<strong>  Copyright &copy; 2021 <a href="http://hotspot.fjlic.com/home" target="_blank">Hotspot</a>.</strong>  Todo los derechos Reservados.</div> 
@stop

@section('css')
@toastr_css 
@stop

@section('js')
@toastr_js
@toastr_render
@stop