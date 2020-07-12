@extends('adminlte::page')
@section('title', 'API ESP32')
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
 <!-- Main content -->
 <section class="content">
      <div class="row">
        <div class="col-xs-12">
            <div class="box box-warning">
            <div class="box-header">
              <h3 class="box-title">Editar Historial Qr</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
            <!--'qr_id', 'qr_serie', 'key_status', 'gone_down', -->
            <form role="form" action="{{ route('historialqr.update',$historialqr->id) }}" method="POST">
            @csrf
            @method('PUT')
              <div class="box-body">
                <div class="form-group">
                  <label for="qr_id">Id QrL</label>
                  <input type="text" class="form-control" name="qr_id" id="qr_id"  placeholder="Introduce id Qr" readonly="readonly" required value="{{ $historialqr->qr_id }}" />
                </div>
                <div class="form-group">
                  <label for="qr_serie">Qr serie</label>
                  <input type="text" class="form-control" name="qr_serie" id="qr_serie"  placeholder="Introduce Serie" required value="{{ $historialqr->qr_serie }}" />
                </div>
                <div class="form-group">
                    <label for="key_status">Estatus</label>
                        <select class="form-control" name="key_status" id="key_status"> 
                        <option selected="true">{{ $historialqr->key_status }}</option>
                          <option>True</option>
                          <option>False</option>
                        </select>
                </div>
                <div class="form-group">
                    <label for="gone_down">Estatus</label>
                        <select class="form-control" name="gone_down" id="gone_down"> 
                        <option selected="true">{{ $historialqr->gone_down }}</option>
                          <option>1</option>
                          <option>0</option>
                        </select>
                </div>
              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <a href="{{ route('historialqr.index') }}" class="btn btn-default">Cancelar</a>
                <button type="submit" class="btn btn-warning pull-right" >Enviar</button>
              </div>
            </form>
          </div>
          <!-- /.box -->
          <!-- form-->
 
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->   
@stop

@section('css')
    
@stop

@section('js')
@stop