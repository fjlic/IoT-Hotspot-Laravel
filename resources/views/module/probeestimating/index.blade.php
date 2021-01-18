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

 <!-- Main content Part Name : VST -->
 <!-- Part Size : 23.3 -->
 <section class="content">
      <div class="row">
        <div class="col-12">
          <div class="card card-primary card-outline">
            <div class="card-header">
              <h3 class="card-title">Tabla Probe Estadistico</h3>
              <a class="btn btn-xs btn-success float-right" href="{{ route('probeestimating.create') }}" role="button"><span class="fas fa-plus"></span></a>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="probeestimatingTable" class="table table-bordered table-striped">
              <thead>
                 <!-- /.card-header 'id', 'prox_size', 'mod_size', 'stm_prox_size', 'act_dev_size', -->
                <tr>
                  <th>Id</th>
                  <th>Tamaño Proxi</th>
                  <th>Tamaño Mod</th>
                  <th>Estim Proxi</th>
                  <th>Act Dev</th>
                  <th>FechaCreacion</th>
                  <th>FechaMoficiacion</th>
                  <th>Acciones</th>
                </tr>
                </thead>
                <tbody>
                @foreach($probeestimatings as $probeestimating)
                <tr>
                    <td>{{ $probeestimating->id }}</td>
                    <td>{{ $probeestimating->prox_size }}</td>
                    <td>{{ $probeestimating->mod_size }}</td>
                    <td>{{ $probeestimating->stm_prox_size }}</td>
                    <td>{{ $probeestimating->act_dev_size }}</td>
                    <td>{{ $probeestimating->created_at }}</td>
                    <td>{{ $probeestimating->updated_at }}</td>
                    <td>
                      <form role="form" action="{{ route('probeestimating.destroy',$probeestimating->id) }}" method="POST">
                      <a class="btn btn-info btn-xs" href="{{ route('probeestimating.show',$probeestimating->id) }}" role="button"><span class="fas fa-eye"></span></a> 
                      <a class="btn btn-warning btn-xs"  href="{{ route('probeestimating.edit',$probeestimating->id) }}" role="button"><span class="fas fa-pen"></span></a>
                      @csrf
                      @method('DELETE')
                      <button class="btn btn-danger btn-xs" type="submit"><span class="fas fa-trash"></span></button>
                      </form>
                    </td>
                </tr>
                @endforeach
                </tbody>
               <!-- <tfoot>
                 <tr>
                 <th>Id</th>
                  <th>Id</th>
                  <th>Tamaño Proxi</th>
                  <th>Tamaño Mod</th>
                  <th>Estim Proxi</th>
                  <th>Act Dev</th>
                  <th>FechaCreacion</th>
                  <th>FechaMoficiacion</th>
                  <th>Acciones</th>
                </tr>
                </tfoot>-->
              </table>
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

<!--------------------------------------------------------------------------------------------------------------------------------------------------> 

<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-12">
      <div class="card card-success card-outline">
        <div class="card-header">
          <h3 class="card-title">Resultados</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
          <table id="0" class="table table-striped table-bordered">
             <!-- /.card-header 'id', 'estimate_proxy_size', 'development_hours' -->
            <thead>
             <tr>
                <th>Prueba</th>
                <th COLSPAN=5>Valor Esperado</th>
                <th COLSPAN=5>Valor Actual</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td></td> 
                <td>B0</td> <td>B1</td> <td>r x,y</td> <td>r2</td> <td>Y k</td>
                <td>B0</td> <td>B1</td> <td>r x,y</td> <td>r2</td> <td>Y k</td>
              </tr>
              <tr>
                <td>Prueba 1</td> 
                <td>-22.55</td> <td>1.7279</td> <td>0.9545</td> <td>0.9111</td> <td>644.249</td>
                <td>{{ $b10 }}</td> <td>{{ $b11 }}</td> <td>{{ $r11 }}</td> <td>{{ $r12 }}</td> <td>{{ $y1 }}</td>
              </tr>
              <tr>
                <td>Prueba 2</td> 
                <td>-4.039</td> <td>0.1681</td> <td>0.9333</td> <td>0.8711</td> <td>60.858</td>
                <td>{{ $b20 }}</td> <td>{{ $b21 }}</td> <td>{{ $r21 }}</td> <td>{{ $r22 }}</td> <td>{{ $y22 }}</td>
              </tr>
              <tr>
                <td>Prueba 3</td> 
                <td>-23.92</td> <td>1.43097</td> <td>0.9631</td> <td>0.9276</td> <td>528.4294</td>
                <td>{{ $b30 }}</td> <td>{{ $b31 }}</td> <td>{{ $r31 }}</td> <td>{{ $r32 }}</td> <td>{{ $y3 }}</td>
              </tr>
              <tr>
                <td>Prueba 4</td> 
                <td>-4.604</td> <td>0.140164</td> <td>0.9480</td> <td>0.8988</td> <td>49.4994</td>
                <td>{{ $b40 }}</td> <td>{{ $b41 }}</td> <td>{{ $r41 }}</td> <td>{{ $r42 }}</td> <td>{{ $y4 }}</td>
              </tr>
            </tbody>
          </table>
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
<div class="pull-right hidden-xs"><b>Version</b> 2.0.0<strong>  Copyright &copy; 2020 <a href="http://hotspot.local/home" target="_blank">Hotspot</a>.</strong>  Todo los derechos Reservados.</div> 
@stop

@section('css')
@toastr_css 
@stop

@section('js')
@toastr_js
@toastr_render
<script>
  $(function () {
     $('#probeestimatingTable').DataTable({  
      'paging'      : true,
      'lengthChange': true,
      'searching'   : true,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false,
      'scrollX'     : true,
      'scrollY'     : false,
      'scrollCollapse': false,
      'language': {'url': '//cdn.datatables.net/plug-ins/1.10.15/i18n/Spanish.json'}   
    })
  });
</script>
@stop