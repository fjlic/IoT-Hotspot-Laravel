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

@if ($message = Session::get('success'))

<div class="alert alert-success">

    <p>{{ $message }}</p>

</div>
@endif

 <!-- Main content -->
 <section class="content">
      <div class="row">
        <div class="col-xs-12">
            <div class="box box-primary">
            <div class="box-header">
              <h3 class="box-title">Tabla Histoprial Qr</h3>
              <a class="btn btn-success btn-xs pull-right"  href="{{ route('historialqr.create') }}" ><span class="glyphicon glyphicon-plus"></span></a>
            </div>
            <!-- /.box-header --> 
            <!--'qr_id', 'qr_serie', 'key_status', 'gone_down', -->
            <div class="box-body">
              <table id="historiaQrTable" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Id</th>
                  <th>Esp32 Id</th>
                  <th>Serie</th>
                  <th>Estatus</th>
                  <th>Actualizado</th>
                  <th>FechaCreacion</th>
                  <th>FechaMoficiacion</th>
                  <th>Acciones</th>
                </tr>
                </thead>
                <tbody>
                @foreach($historialqrs as $historialqr)
                <tr>
                    <td>{{ $historialqr->id }}</td>
                    <td>{{ $historialqr->qr_id }}</td>
                    <td>{{ $historialqr->qr_serie }}</td>
                    <td>{{ $historialqr->key_status }}</td>
                    <td>{{ $historialqr->gone_down }}</td>
                    <td>{{ $historialqr->created_at }}</td>
                    <td>{{ $historialqr->updated_at }}</td>
                    <td>
                      <form role="form" action="{{ route('historialqr.destroy',$historialqr->id) }}" method="POST">
                      <a class="btn btn-info btn-xs" href="{{ route('historialqr.show',$historialqr->id) }}"><span class="glyphicon glyphicon-eye-open"></span></a> 
                      <a class="btn btn-warning btn-xs"  href="{{ route('historialqr.edit',$historialqr->id) }}" ><span class="glyphicon glyphicon-pencil"></span></a>
                      @csrf
                      @method('DELETE')
                      <button class="btn btn-danger btn-xs" type="submit"><span class="glyphicon glyphicon-trash"></span></button>
                      </form>
                    </td>
                </tr>
                @endforeach
                </tbody>
               <!-- <tfoot>
                <tr>
                  <th>Id</th>
                  <th>Nombre</th>
                  <th>Email</th>
                  <th>Password</th>
                  <th>FechaCreacion</th>
                  <th>FechaMoficiacion</th>
                  <th>Acciones</th>
                </tr>
                </tfoot>-->
              </table>
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
<script>
  $(function () {
     $('#historiaQrTable').DataTable({
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
  })
</script>
@stop