@extends('adminlte::page')
@section('title', 'API ESP32')
@section('content_header')
   <!-- <h1>Menu Admin</h1>-->
@stop

@section('content')
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
              <h3 class="box-title">Tabla Qr</h3>
              <a class="btn btn-success btn-xs pull-right"  href="{{ route('qr.create') }}" ><span class="glyphicon glyphicon-plus"></span></a>
            </div>
            <!-- /.box-header -->
            <!-- 'qr_serie', 'key_status', 'gone_down', -->
            <div class="box-body">
              <table id="qrTable" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Id</th>
                  <th>Esp32 Id</th>
                  <th>QrSerie</th>
                  <th>Status</th>
                  <th>Autenticado</th>
                  <th>FechaCreacion</th>
                  <th>FechaMoficiacion</th>
                  <th>Acciones</th>
                </tr>
                </thead>
                <tbody>
                @foreach($qrs as $qr)
                <tr>
                    <td>{{ $qr->id }}</td>
                    <td>{{ $qr->esp32_id }}</td>
                    <td>{{ $qr->qr_serie }}</td>
                    <td>{{ $qr->key_status }}</td>
                    <td>{{ $qr->gone_down }}</td>
                    <td>{{ $qr->created_at }}</td>
                    <td>{{ $qr->updated_at }}</td>
                    <td>
                      <form role="form" action="{{ route('qr.destroy',$qr->id) }}" method="POST">
                        <a class="btn btn-info btn-xs" href="{{ route('qr.show',$qr->id) }}"><span class="glyphicon glyphicon-eye-open"></span></a> 
                        <a class="btn btn-warning btn-xs"  href="{{ route('qr.edit',$qr->id) }}" ><span class="glyphicon glyphicon-pencil"></span></a>
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
                  <th>LinkQr</th>
                  <th>Monedas</th>
                  <th>FechaCreacion</th>
                  <th>FechaMoficiacion</th>
                  <th>Acciones</th>
                </tr>
                </tfoot> -->
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
     $('#qrTable').DataTable({
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