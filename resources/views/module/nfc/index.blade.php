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
              <h3 class="box-title">Tabla Nfc</h3>
              <a class="btn btn-success btn-xs pull-right"  href="{{ route('nfc.create') }}" ><span class="glyphicon glyphicon-plus"></span></a>
            </div>
            <!-- /.box-header -->
            <!--'id', 'esp32_id', 'num_serie', 'key_1', 'key_2', 'key_3', 'key_4', 'key_5', 'ssid', 'password', 'dns_server', 'ip_server', 'protocol', 'port', 'text',, -->
            <div class="box-body">
              <table id="nfcTable" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Id</th>
                  <th>Esp32 Id</th>
                  <th>Serie</th>
                  <th>Clave 1</th>
                  <th>Clave 2</th>
                  <th>Clave 3</th>
                  <th>Clave 4</th>
                  <th>Clave 5</th>
                  <th>Ssid</th>
                  <th>Passw</th>
                  <th>Ip Server</th>
                  <th>Dns Server</th>
                  <th>Puerto</th>
                  <th>Protocol</th>
                  <th>Texto</th>
                  <th>FechaModificacion</th>
                  <th>FechaMoficiacion</th>
                  <th>Acciones</th>
                </tr>
                </thead>
                <tbody>
                @foreach($nfcs as $nfc)
                <tr>
                    <td>{{ $nfc->id }}</td>
                    <td>{{ $nfc->esp32_id }}</td>
                    <td>{{ $nfc->num_serie }}</td>
                    <td>{{ $nfc->key_1 }}</td>
                    <td>{{ $nfc->key_2 }}</td>
                    <td>{{ $nfc->key_3 }}</td>
                    <td>{{ $nfc->key_4 }}</td>
                    <td>{{ $nfc->key_5 }}</td>
                    <td>{{ $nfc->ssid }}</td>
                    <td>{{ $nfc->password }}</td>
                    <td>{{ $nfc->dns_server }}</td>
                    <td>{{ $nfc->ip_server }}</td>
                    <td>{{ $nfc->port }}</td>
                    <td>{{ $nfc->protocol }}</td>
                    <td>{{ $nfc->text }}</td>
                    <td>{{ $nfc->created_at }}</td>
                    <td>{{ $nfc->updated_at }}</td>
                    <td>
                      <form role="form" action="{{ route('nfc.destroy',$nfc->id) }}" method="POST">
                        <a class="btn btn-info btn-xs" href="{{ route('nfc.show',$nfc->id) }}"><span class="glyphicon glyphicon-eye-open"></span></a> 
                        <a class="btn btn-warning btn-xs"  href="{{ route('nfc.edit',$nfc->id) }}" ><span class="glyphicon glyphicon-pencil"></span></a>
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
     $('#nfcTable').DataTable({
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