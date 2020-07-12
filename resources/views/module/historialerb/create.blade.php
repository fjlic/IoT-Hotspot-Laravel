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
              <h3 class="box-title">Crear Historial Esp32</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
            <!--'esp32_id', 'num_serie', 'nick_name', 'password', 'api_token', -->
            <form role="form" action="{{ route('historialesp32.store')}}" method="POST">
              @csrf
              <div class="box-body">
              <div class="form-group">
                  <label for="esp32_id">Asignar Esp32</label>
                  <select class="form-control" name="esp32_id" id="esp32_id"> 
                    @foreach($esp32s as $esp32)
                    <option>{{ $esp32->id }}</option>
                    @endforeach
                    </select>
                </div>
              <div class="form-group">
                  <label for="num_serie">Esp32 serie</label>
                  <input type="text" class="form-control" name="num_serie" id="num_serie"  placeholder="Introduce serie" required>
              </div>
              <div class="form-group">
                  <label for="nick_name">Alias</label>
                  <input type="text" class="form-control" name="nick_name" id="nick_name"  placeholder="Introduce alias" required>
              </div>
              <div class="form-group">
                  <label for="password">Passw</label>
                  <input type="text" class="form-control" name="password" id="password"  placeholder="Introduce password" required>
              </div>
              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <a href="{{ route('historialesp32.index') }}" class="btn btn-default">Cancelar</a>
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