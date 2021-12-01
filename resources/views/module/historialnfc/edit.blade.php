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
            <div class="card card-warning card-outline">
            <div class="card-header">
              <h3 class="card-title">Editar Historial Nfc</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
            <!-- form start -->
            
            <form role="form" action="{{ route('historialnfc.update',$historialnfc->id) }}" method="POST">
            @csrf
            @method('PUT')
              <div class="card-body">
              <div class="form-group">
                    <label for="nfc_id">Id Nfc</label>
                        <select class="form-control" name="nfc_id" id="nfc_id"> 
                          <option selected="true">{{ $historialnfc->nfc_id }}</option>
                          @foreach($nfcs as $nfc)
                          <option value="{{ $nfc->id }}">{{ $nfc->id }}</option>
                          @endforeach
                        </select>
              </div> 
                <div class="form-group">
                <!--'id', 'nfc_id', 'num_serie', 'cont_qr', 'cont_mon', 'cont_corte', 'cont_prem', 'cost_mon', 'ssid', 'passwd', 'ip_server', 'port', 'txt', -->
                  <label for="num_serie">Serie</label>
                  <input type="text" class="form-control" name="num_serie" id="num_serie"  placeholder="Numero serie" required value="{{ $historialnfc->num_serie }}"  />
                </div>
                <div class="form-group">
                  <label for="cont_qr">Clave 1</label>
                  <input type="text" class="form-control" name="cont_qr" id="cont_qr" placeholder="Cont Qr" required value="{{ $historialnfc->cont_qr }}" />
                </div>
                <div class="form-group">
                  <label for="cont_mon">Clave 2</label>
                  <input type="text" class="form-control" name="cont_mon" id="cont_mon" placeholder="Cont Mon" required value="{{ $historialnfc->cont_mon }}" />
                </div>
                <div class="form-group">
                  <label for="cont_mon_2">Clave 2</label>
                  <input type="text" class="form-control" name="cont_mon_2" id="cont_mon_2" placeholder="Cont Mon 2" required value="{{ $historialnfc->cont_mon_2 }}" />
                </div>
                <div class="form-group">
                  <label for="cont_corte">Clave 3</label>
                  <input type="text" class="form-control" name="cont_corte" id="cont_corte" placeholder="Cont Corte" required value="{{ $historialnfc->cont_corte }}" />
                </div>
                <div class="form-group">
                  <label for="cont_prem">Clave 4</label>
                  <input type="text" class="form-control" name="cont_prem" id="cont_prem" placeholder="Cont Premio" required value="{{ $historialnfc->cont_prem }}" />
                </div>
                <div class="form-group">
                  <label for="cost_mon">Clave 5</label>
                  <input type="text" class="form-control" name="cost_mon" id="cost_mon" placeholder="Costo Moneda" required value="{{ $historialnfc->cost_mon }}" />
               </div>
                <div class="form-group">
                  <label for="ssid">Ssid</label>
                  <input type="text" class="form-control" name="ssid" id="ssid" placeholder="Ssid" required value="{{ $historialnfc->ssid }}" />
                </div>
                <div class="form-group">
                  <label for="passwd">Pasw</label>
                  <input type="text" class="form-control" name="passwd" id="passwd" placeholder="Passwd" required value="{{ $historialnfc->passwd }}" />
                </div>
                <div class="form-group">
                  <label for="ip_server">Ip Server</label>
                  <input type="text" class="form-control" name="ip_server" id="ip_server" placeholder="Ip server" required value="{{ $historialnfc->ip_server }}" />
                </div>
                <div class="form-group">
                  <label for="port">port</label>
                  <input type="text" class="form-control" name="port" id="port" placeholder="Puerto" required value="{{ $historialnfc->port }}" />
                </div>
                <div class="form-group">
                  <label for="txt">Texto</label>
                  <input type="text" class="form-control" name="txt" id="txt" placeholder="Texto" required value="{{ $historialnfc->txt }}" />
                </div>
              </div>
              <!-- /.card-body -->

              <div class="card-footer">
                <a href="{{ route('historialnfc.index') }}" class="btn btn-default">Cancelar</a>
                <button type="submit" class="btn btn-warning pull-right" >Enviar</button>
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