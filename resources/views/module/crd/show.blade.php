@extends('adminlte::page')
@section('title', 'Hotspot|Crd')
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
          <div class="card card-info card-outline">
            <div class="card-header">
              <h3 class="card-title">Tabla Crd</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
            <form role="form">
              <div class="card-body">
                <div class="form-group">
                  <label for="id">Id</label>
                  <input type="text" class="form-control" value="{{ $crd->id }}" readonly="readonly"/>
                </div>
                <div class="form-group">
                  <label for="user_id">Id User</label>
                  <input type="text" class="form-control" value="{{ $crd->user_id }}" readonly="readonly"/>
                </div>
                <div class="form-group">
                  <label for="num_serie">Serie</label>
                  <input type="text" class="form-control" value="{{ $crd->num_serie }}" readonly="readonly"/>
                </div>
                <div class="form-group">
                  <label for="name_machine">Nombre</label>
                  <input type="text" class="form-control" value="{{ $crd->name_machine }}" readonly="readonly"/>
                </div>
                <div class="form-group">
                  <label for="nick_name">Alias</label>
                  <input type="text" class="form-control" value="{{ $crd->nick_name }}" readonly="readonly"/>
                </div>
                <div class="form-group">
                  <label for="password">Password</label>
                  <input type="text" class="form-control" value="{{ $crd->password }}" readonly="readonly"/>
                </div>
                <div class="form-group">
                  <label for="api_token">Token</label>
                  <input type="text" class="form-control" value="{{ $crd->api_token }}" readonly="readonly"/>
                </div>
                <div class="form-group">
                  <label for="status_video">Estatus Video (Falla=0 y Ok=1)</label>
                  @if($crd->status_video == '1')
                    <input type="text" class="form-control" value="Ok" readonly="readonly"/>
                  @elseif($crd->status_video == '0')
                    <input type="text" class="form-control" value="Falla" readonly="readonly"/>
                  @endif
                </div>
                <div class="form-group">
                  <label for="status_crd">Estatus Crd (Off=0 y On=1)</label>
                  @if($crd->status_crd == '1')
                    <input type="text" class="form-control" value="On" readonly="readonly"/>
                  @elseif($crd->status_crd == '0')
                    <input type="text" class="form-control" value="Off" readonly="readonly"/>
                  @endif
                </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <a href="{{ route('crd.index') }}" class="btn btn-info pull-right">Regresar</a>
              </div>
            </form>
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
@toastr_css
@stop

@section('js')
@toastr_js
@toastr_render
@stop