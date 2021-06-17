@extends('adminlte::page')
@section('title', 'Hotspot-Historial-Qr')
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
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Tabla Historial Qr</h3>
              <a class="btn btn-xs btn-success float-right" href="{{ route('historialqr.create') }}" role="button"><span class="fas fa-plus"></span></a>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="historialqrTable" class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>Id</th>
                  <th>Qr Id</th>
                  <th>Maquina</th>
                  <th>Alias</th>
                  <th>QrSerie</th>
                  <th>Coins</th>
                  <th>Actualizado</th>
                  {{-- <th>FechaCreacion</th>  --}}
                  <th>FechaMoficiacion</th> 
                  <th>Acciones</th>
                </tr>
                </thead>
                <tbody>
                @foreach($historialqrs as $historialqr)
                <tr>
                    <td>{{ $historialqr->id }}</td>
                    <td>{{ $historialqr->qr_id }}</td>
                    <td>{{ $historialqr->name_machine }}</td>
                    <td>{{ $historialqr->nick_name }}</td>      
                    <td>{{ $historialqr->qr_serie }}</td>
                    <td>{{ $historialqr->coins }}</td>
                    <td>{{ $historialqr->uploaded }}</td>
                    {{-- <td>{{ $historialqr->created_at }}</td>  --}}
                    <td>{{ $historialqr->updated_at }}</td>
                    <td>
                      <form role="form" action="{{ route('historialqr.destroy',$historialqr->id) }}" method="POST">
                      <a class="btn btn-info btn-xs" href="{{ route('historialqr.show',$historialqr->id) }}" role="button"><span class="fas fa-eye"></span></a> 
                      <a class="btn btn-warning btn-xs"  href="{{ route('historialqr.edit',$historialqr->id) }}" role="button"><span class="fas fa-pen"></span></a>
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
                  <th>Qr Id</th>
                  <th>Maquina</th>
                  <th>Alias</th>
                  <th>QrSerie</th>
                  <th>Coins</th>
                  <th>Actualizado</th>
                  <th>FechaCreacion</th>
                  {{-- <th>FechaMoficiacion</th> --}}
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
     $('#historialqrTable').DataTable({  
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