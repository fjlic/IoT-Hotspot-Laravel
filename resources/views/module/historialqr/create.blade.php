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
            <div class="box box-success">
            <div class="box-header">
              <h3 class="box-title">Crear Historial Qr</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
            <!--'qr_id', 'qr_serie', 'key_status', 'gone_down', -->
            <form role="form" action="{{ route('historialqr.store')}}" method="POST">
              @csrf
              <div class="box-body">
                <div class="form-group">
                    <label for="qr_id">Qr Id</label>
                        <select class="form-control" name="qr_id" id="qr_id"> 
                          @foreach($qrs as $qr)
                          <option>{{ $qr->id }}</option>
                          @endforeach
                        </select>
              </div>
              <div class="form-group">
                  <label for="qr_serie">Qr serie</label>
                  <input type="text" class="form-control" name="qr_serie" id="qr_serie"  placeholder="Introduce serie" required>
                </div>
                <div class="form-group">
                    <label for="key_status">Estatus</label>
                        <select class="form-control" name="key_status" id="key_status"> 
                          <option>True</option>
                          <option>False</option>
                        </select>
                </div>
                <div class="form-group">
                    <label for="gone_down">Estatus</label>
                        <select class="form-control" name="gone_down" id="gone_down"> 
                          <option>0</option>
                          <option>1</option>
                        </select>
                </div>
              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <a href="{{ route('historialqr.index') }}" class="btn btn-default">Cancelar</a>
                <button type="submit" class="btn btn-success pull-right" >Enviar</button>
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