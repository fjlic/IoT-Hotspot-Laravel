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
              <h3 class="box-title">Tabla Historial Nfc</h3>
              <a class="btn btn-success btn-xs pull-right"  href="{{ route('historialnfc.create') }}" ><span class="glyphicon glyphicon-plus"></span></a>
            </div>
            <!-- /.box-header -->
             <!-- 'id', 'nfc_id', 'num_serie', 'key_1', 'key_2', 'key_3', 'key_4', 'key_5', 'ssid', 'password', 'dns_server', 'ip_server', 'protocol', 'port', 'text',-->
            <div class="box-body">
              <table id="historiaNfcTable" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Id</th>
                  <th>Id Nfc</th>
                  <th>Serie</th>
                  <th>Clave 1</th>
                  <th>Clave 2</th>
                  <th>Clave 3</th>
                  <th>Clave 4</th>
                  <th>Clave 5</th>
                  <th>Ssid</th>
                  <th>Password</th>
                  <th>Dns Server</th>
                  <th>Ip Server</th>
                  <th>Protocol</th>
                  <th>Port</th>
                  <th>Texto</th>
                  <th>FechaCreacion</th>
                  <th>FechaMoficacion</th>
                  <th>Acciones</th>
                </tr>
                </thead>
                <tbody>
                @foreach($historialnfcs as $historialnfc)
                <tr>
                    <td>{{ $historialnfc->id }}</td>
                    <td>{{ $historialnfc->nfc_id }}</td>
                    <td>{{ $historialnfc->num_serie }}</td>
                    <td>{{ $historialnfc->key_1 }}</td>
                    <td>{{ $historialnfc->key_2 }}</td>
                    <td>{{ $historialnfc->key_3 }}</td>
                    <td>{{ $historialnfc->key_4 }}</td>
                    <td>{{ $historialnfc->key_5 }}</td>
                    <td>{{ $historialnfc->password }}</td>
                    <td>{{ $historialnfc->dns_server }}</td>
                    <td>{{ $historialnfc->ip_server }}</td>
                    <td>{{ $historialnfc->protocol }}</td>
                    <td>{{ $historialnfc->ip_server }}</td>
                    <td>{{ $historialnfc->port }}</td>
                    <td>{{ $historialnfc->text }}</td>
                    <td>{{ $historialnfc->created_at }}</td>
                    <td>{{ $historialnfc->updated_at }}</td>
                    <td>
                      <form role="form" action="{{ route('historialnfc.destroy',$historialnfc->id) }}" method="POST">
                      <a class="btn btn-info btn-xs" href="{{ route('historialnfc.show',$historialnfc->id) }}"><span class="glyphicon glyphicon-eye-open"></span></a> 
                      <a class="btn btn-warning btn-xs"  href="{{ route('historialnfc.edit',$historialnfc->id) }}" ><span class="glyphicon glyphicon-pencil"></span></a>
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
     $('#historiaNfcTable').DataTable({
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