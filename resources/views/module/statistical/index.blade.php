@extends('adminlte::page')
@section('title', 'Hotspot-Estadistico')
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
              <h3 class="card-title">Tabla Estadistico</h3>
              <a class="btn btn-xs btn-success float-right" href="{{ route('statistical.create') }}" role="button"><span class="fas fa-plus"></span></a>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="statisticalTable" class="table table-bordered table-striped">
              <thead>
                 <!-- /.card-header 'id', 'estimate_proxy_size', 'development_hours' -->
                <tr>
                  <th>Id</th>
                  <th>Tamaño Estimado</th>
                  <th>Horas Desarollo</th>
                  {{-- <th>FechaCreacion</th> --}}
                  <th>FechaMod</th>
                  <th>Acciones</th>
                </tr>
                </thead>
                <tbody>
                @foreach($statisticals as $statistical)
                <tr>
                    <td>{{ $statistical->id }}</td>
                    <td>{{ $statistical->estimate_proxy_size }}</td>
                    <td>{{ $statistical->development_hours }}</td>
                   {{--  <td>{{ $statistical->created_at }}</td>  --}}
                    <td>{{ $statistical->updated_at }}</td>
                    <td>
                      <form role="form" action="{{ route('statistical.destroy',$statistical->id) }}" method="POST">
                      <a class="btn btn-info btn-xs" href="{{ route('statistical.show',$statistical->id) }}" role="button"><span class="fas fa-eye"></span></a> 
                      <a class="btn btn-warning btn-xs"  href="{{ route('statistical.edit',$statistical->id) }}" role="button"><span class="fas fa-pen"></span></a>
                      @csrf
                      @method('DELETE')
                      <a href="" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#exampleModalCenter{{$statistical->id}}"><span class="fas fa-trash"></span></a>
                      <!------ ESTE ES EL MODAL QUE SE MUESTRA AL DAR CLICK EN EL BOTON "ELIMINAR" ------>
                      <div class="modal fade" id="exampleModalCenter{{$statistical->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                      <div class="modal-dialog modal-dialog-centered" role="document">
                      <div class="modal-content">
                      <div class="modal-header d-flex justify-content-center">
                        <h5 class="modal-title" id="exampleModalCenterTitle">Ten cuidado con esta acción</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                          <div class="modal-body" style="text-align: center">
                            <a><img src="{{ asset('storage/Images/Warning.JPG') }}" alt="" title=""  text-align="center" /></a>
                           </div>
                           <br>
                          <p class="text-center">Eliminarás ( <b>{{$statistical->estimate_proxy_size}}</b> ) seguro?</p>
                      </div>
                      <div class="modal-footer d-flex justify-content-center">
                            <button type="button" class="btn btn-info" data-dismiss="modal">Cancelar</button>
                            <input type="submit" class="btn btn-danger" value="Eliminar">
                      </div>
                      </div>
                      </div>
                      </div>
                    <!--fin modal--> 
                      </form>
                    </td>
                </tr>
                @endforeach
                </tbody>
               <!-- <tfoot>
                 <tr>
                 <th>Id</th>
                  <th>Tamaño Estimado</th>
                  <th>Horas Desarollo</th>
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
                <th>Pruebas</th>
                <th COLSPAN=2>Valor Esperado</th>
                <th COLSPAN=2>Valor Actual</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td></td> 
                <td>Media</td> <td>Dev. Std</td>
                <td>Media</td> <td>Dev. Std</td>
              </tr>
              <tr>
                <td>Tabla 1: Columna 1</td> 
                <td>550.6</td> <td>572.03</td>
                <td>{{ $med1 }}</td> <td>{{ $dev1 }}</td>
              </tr>
              <tr>
                <td>Tabla 1: Columna 2</td> 
                <td>60.32</td> <td>62.26</td>
                <td>{{ $med2 }}</td> <td>{{ $dev2 }}</td>
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
<div class="pull-right hidden-xs"><b>Version</b> 2.0.1<strong>  Copyright &copy; 2021 <a href="http://hotspot.fjlic.com/home" target="_blank">Hotspot</a>.</strong>  Todo los derechos Reservados.</div> 
@stop

@section('css')
@toastr_css 
@stop

@section('js')
@toastr_js
@toastr_render
<script>
  $(function () {
     $('#statisticalTable').DataTable({  
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