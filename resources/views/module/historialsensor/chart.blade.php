@extends('adminlte::page')
@section('title', 'Hotspot-Historial-Sensor')
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

 <!-- Main content Charts-->
 <section class="content">
      <!-- Chart Volt  -->
      <div class="row">
        <div class="col-12">
            <div class="card card-success card-outline">
            <div class="card-header">
              <h3 class="card-title">Indicador de Temperatura</h3>
              <div class="card-tools">
                <a class="btn btn-tool"  href="{{ route('historialsensor.index') }}" ><span class="fas fa-arrow-left"></span></a>
                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                  <i class="fas fa-minus"></i>
                </button>
                <button type="button" class="btn btn-tool" data-card-widget="remove">
                  <i class="fas fa-times"></i>
                </button>
              </div>
            </div>
            <div class="card-body">
            <div class="row">
              <div class="col-xs-4 col-md-4 text-center">
                <div id="temp1"></div>
                  {!! $temp1 !!}
              </div>
              <div class="col-xs-4 col-md-4 text-center">
                <div id="temp2"></div>
                  {!! $temp2 !!}
              </div>   
              <div class="col-xs-4 col-md-4 text-center">
                <div id="temp3"></div>
                  {!! $temp3 !!}
                </div>
              <div class="col-xs-4 col-md-4 text-center">
                <div id="temp4"></div>
                  {!! $temp4 !!}
                </div>     
            </div>
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

<!-- Main content Sensors Voltaje-->
<section class="content">
  <div class="row">
    <div class="col-12">
        <div class="card card-primary card-outline">
        <div class="card-header">
          <h3 class="card-title">Deteccion de Voltaje</h3>
          <div class="card-tools">
            <a class="btn btn-tool"  href="{{ route('historialsensor.index') }}" ><span class="fas fa-arrow-left"></span></a>
            <button type="button" class="btn btn-tool" data-card-widget="collapse">
              <i class="fas fa-minus"></i>
            </button>
            <button type="button" class="btn btn-tool" data-card-widget="remove">
              <i class="fas fa-times"></i>
            </button>
          </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
          <div class="row">
            <div class="col">
              <h4 class="card-title">Voltaje 1</h4><br>
                @if($sensor->vol_1 == 'On')
                  <a><img src="{{ asset('storage/Images/On.JPG') }}" alt="" title=""/></a>
                @elseif($sensor->rlay_1 == 'Off')
                  <a><img src="{{ asset('storage/Images/Off.JPG') }}" alt="" title=""/></a>
                @endif  
            </div>
            <div class="col">
              <h4 class="card-title">Voltaje 2</h4><br>
                @if($sensor->vol_2 == 'On')
                  <a><img src="{{ asset('storage/Images/On.JPG') }}" alt="" title=""/></a>
                @elseif($sensor->rlay_2 == 'Off')
                  <a><img src="{{ asset('storage/Images/Off.JPG') }}" alt="" title=""/></a>
                @endif
              </div>
            <div class="col">
              <h4 class="card-title">Voltaje 3</h4><br>
                @if($sensor->vol_3 == 'On')
                  <a><img src="{{ asset('storage/Images/On.JPG') }}" alt="" title=""/></a>
                @elseif($sensor->vol_3 == 'Off')
                  <a><img src="{{ asset('storage/Images/Off.JPG') }}" alt="" title=""/></a>
                @endif 
              </div>
          </div>
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

<!-- Main content historialSensors Door-->
<section class="content">
  <div class="row">
    <div class="col-12">
        <div class="card card-danger card-outline">
        <div class="card-header">
          <h3 class="card-title">Estatus Puertas</h3>
          <div class="card-tools">
            <a class="btn btn-tool"  href="{{ route('historialsensor.index') }}" ><span class="fas fa-arrow-left"></span></a>
            <button type="button" class="btn btn-tool" data-card-widget="collapse">
              <i class="fas fa-minus"></i>
            </button>
            <button type="button" class="btn btn-tool" data-card-widget="remove">
              <i class="fas fa-times"></i>
            </button>
          </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
          <div class="row">
            <div class="col">
                <h4 class="card-title">Puerta(1)</h4><br>
                  @if($historialsensor->door_1 == 'On')
                    <a><img src="{{ asset('storage/Images/close-door.JPG') }}" alt="" title=""/></a>
                  @elseif($historialsensor->door_1 == 'Off')
                     <a><img src="{{ asset('storage/Images/open-door.JPG') }}" alt="" title=""/></a>
                  @endif
            </div>
            <div class="col">
                <h4 class="card-title">Puerta(2)</h4><br>
                @if($historialsensor->door_2 == 'On')
                  <a><img src="{{ asset('storage/Images/close-door.JPG') }}" alt="" title=""/></a>
                @elseif($historialsensor->door_2 == 'Off')
                  <a><img src="{{ asset('storage/Images/open-door.JPG') }}" alt="" title=""/></a>
                @endif
            </div>
            <div class="col">
                <h4 class="card-title">Puerta(3)</h4><br>
                @if($historialsensor->door_3 == 'On')
                    <a><img src="{{ asset('storage/Images/close-door.JPG') }}" alt="" title=""/></a>
                @elseif($historialsensor->door_3 == 'Off')
                    <a><img src="{{ asset('storage/Images/open-door.JPG') }}" alt="" title=""/></a>
                @endif
            </div>
            <div class="col">
                <h4 class="card-title">Puerta(4)</h4><br>
                @if($historialsensor->door_4 == 'On')
                    <a><img src="{{ asset('storage/Images/close-door.JPG') }}" alt="" title=""/></a>
                @elseif($historialsensor->door_4 == 'Off')
                    <a><img src="{{ asset('storage/Images/open-door.JPG') }}" alt="" title=""/></a>
                @endif
            </div>
          </div>  
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

<!-- Main content historialSensors Door-->
<section class="content">
  <div class="row">
    <div class="col-12">
        <div class="card card-warning card-outline">
        <div class="card-header">
          <h3 class="card-title">Estatus Relays</h3>
          <div class="card-tools">
            <a class="btn btn-tool"  href="{{ route('historialsensor.index') }}" ><span class="fas fa-arrow-left"></span></a>
            <button type="button" class="btn btn-tool" data-card-widget="collapse">
              <i class="fas fa-minus"></i>
            </button>
            <button type="button" class="btn btn-tool" data-card-widget="remove">
              <i class="fas fa-times"></i>
            </button>
          </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
          <div class="row">
            <div class="col">
              <h4 class="card-title">Relay(1)</h4><br>
                @if($historialsensor->rlay_1 == 'On')
                  <a><img src="{{ asset('storage/Images/block-on.JPG') }}" alt="" title=""/></a>
                @elseif($historialsensor->rlay_1 == 'Off')
                  <a><img src="{{ asset('storage/Images/block-of.JPG') }}" alt="" title=""/></a>
                @endif  
            </div>
            <div class="col">
              <h4 class="card-title">Relay(2)</h4><br>
                @if($historialsensor->rlay_2 == 'On')
                  <a><img src="{{ asset('storage/Images/block-on.JPG') }}" alt="" title=""/></a>
                @elseif($historialsensor->rlay_2 == 'Off')
                  <a><img src="{{ asset('storage/Images/block-of.JPG') }}" alt="" title=""/></a>
                @endif
              </div>
            <div class="col">
              <h4 class="card-title">Relay(3)</h4><br>
                @if($historialsensor->rlay_3 == 'On')
                  <a><img src="{{ asset('storage/Images/block-on.JPG') }}" alt="" title=""/></a>
                @elseif($historialsensor->rlay_3 == 'Off')
                  <a><img src="{{ asset('storage/Images/block-of.JPG') }}" alt="" title=""/></a>
                @endif 
              </div>
            <div class="col">
              <h4 class="card-title">Relay(4)</h4><br>
                @if($historialsensor->rlay_4 == 'On')
                  <a><img src="{{ asset('storage/Images/block-on.JPG') }}" alt="" title=""/></a>
                @elseif($historialsensor->rlay_4 == 'Off')
                  <a><img src="{{ asset('storage/Images/block-of.JPG') }}" alt="" title=""/></a>
                @endif
            </div>
          </div>
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
<div class="pull-right hidden-xs"><b>Version</b> 2.0.0<strong>  Copyright &copy; 2021 <a href="http://hotspot.fjlic.local/home" target="_blank">Hotspot</a>.</strong>  Todo los derechos Reservados.</div> 
@stop

@section('css')
@toastr_css   
@stop

@section('js')
@toastr_js
@toastr_render
@stop