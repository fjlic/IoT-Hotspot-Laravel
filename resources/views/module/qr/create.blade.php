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
              <h3 class="box-title">Crear Qr</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                  <!-- form start -->
                  <!-- 'qr_serie', 'key_status', 'gone_down', -->
            <form role="form" action="{{ route('qr.store')}}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="esp32_id">Esp32 Asignado</label>
                        <select class="form-control" name="esp32_id" id="esp32_id"> 
                          {{--<option selected="true">{{ $esp32->esp32_asign }}</option>--}}
                          @foreach($esp32s as $esp32)
                          <option>{{ $esp32->id }}</option>
                          @endforeach
                        </select>
              </div>
                <div class="form-group">
                  <label for="qr_serie">Serie Qr</label>
                  <input type="text" class="form-control" name="qr_serie" id="qr_serie"  placeholder="Introduce serie qr" required>
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
                <a href="{{ route('qr.index') }}" class="btn btn-default">Cancelar</a>
                <button type="submit" class="btn btn-success pull-right" >Enviar</button>
              </div>
            </form>
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