@extends('adminlte::page')
@section('title', 'Hotspot|Historial|Nfc')
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
        <div class="col-12">
            <div class="card card-success card-outline">
            <div class="card-header">
              <h3 class="card-title">Crear Historial Nfc</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
            <!-- form start -->
            <form role="form" action="{{ route('historialnfc.store')}}" method="POST">
              @csrf
              <div class="card-body">
              <div class="form-group">
                    <label for="nfc_id">Id Nfc</label>
                        <select class="form-control" name="nfc_id" id="nfc_id"> 
                          @foreach($nfcs as $nfc)
                          <option value="{{ $nfc->id }}">{{ $nfc->id }}</option>
                          @endforeach
                        </select>
              </div> 
              <div class="form-group">
              <!--'id', 'nfc_id', 'num_serie', 'cont_qr', 'cont_mon', 'cont_corte', 'cont_prem', 'cost_mon', 'ssid', 'passwd', 'ip_server', 'port', 'txt', -->
                 <label for="num_serie">Serie</label>
                 <input type="text" class="form-control" name="num_serie" id="num_serie" placeholder="Introduce numero de serie" required>
              </div>
              <div class="form-group">
                 <label for="cont_qr">Contador Qr</label>
                 <input type="text" class="form-control" name="cont_qr" id="cont_qr" placeholder="Introduce Contador Qr" required>
              </div>
              <div class="form-group">
                 <label for="cont_mon">Cont Mon</label>
                 <input type="text" class="form-control" name="cont_mon" id="cont_mon" placeholder="Introduce Cont Monedero" required>
              </div>
              <div class="form-group">
                 <label for="cont_mon_2">Cont Mon 2</label>
                 <input type="text" class="form-control" name="cont_mon_2" id="cont_mon_2" placeholder="Introduce Cont Monedero 2" required>
              </div>
              <div class="form-group">
                 <label for="cont_corte">Cont Corte</label>
                 <input type="text" class="form-control" name="cont_corte" id="cont_corte" placeholder="Introduce Corte" required>
              </div>
              <div class="form-group">
                 <label for="cont_prem">Cont Premio</label>
                 <input type="text" class="form-control" name="cont_prem" id="cont_prem" placeholder="Introduce Cont Premio" required>
              </div>
              <div class="form-group">
                 <label for="cost_mon">Costo Moneda</label>
                 <input type="text" class="form-control" name="cost_mon" id="cost_mon" placeholder="Introduce Costo Moneda" required>
              </div>
              <div class="form-group">
                 <label for="ssid">Ssid</label>
                 <input type="text" class="form-control" name="ssid" id="ssid" placeholder="Introduce ssid" required>
              </div>
              <div class="form-group">
                 <label for="passwd">Passw</label>
                 <input type="text" class="form-control" name="passwd" id="passwd" placeholder="Introduce password" required>
              </div>
              <div class="form-group">
                 <label for="ip_server">Ip Server</label>
                 <input type="text" class="form-control" name="ip_server" id="ip_server" placeholder="Introduce ip" required>
              </div>
              <div class="form-group">
                 <label for="ip_server">Ip Server</label>
                 <input type="text" class="form-control" name="ip_server" id="ip_server" placeholder="Introduce ip" required>
              </div>
              <div class="form-group">
                 <label for="port">Puerto</label>
                 <input type="text" class="form-control" name="port" id="port" placeholder="Introduce puerto" required>
              </div>
              <div class="form-group">
                 <label for="txt">Texto</label>
                 <input type="text" class="form-control" name="txt" id="txt" placeholder="Introduce texto" required>
              </div>
              </div>
              <!-- /.card-body -->

              <div class="card-footer">
                <a href="{{ route('historialnfc.index') }}" class="btn btn-default">Cancelar</a>
                <button type="submit" class="btn btn-success pull-right" >Enviar</button>
              </div>
            </form>
          </div>
          <!-- /.card -->
          <!-- form-->
 
            </div>
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
    
@stop

@section('js')
@stop