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
              <h3 class="box-title">Tabla Histoprial Esp32</h3>
              <a class="btn btn-success btn-xs pull-right"  href="{{ route('historialesp32.create') }}" ><span class="glyphicon glyphicon-plus"></span></a>
            </div>
            <!-- /.box-header --> 
            <!--//'user_id', 'num_serie', 'nick_name', 'password', 'api_token', -->
            <div class="box-body">
              <table id="historiaEsp32Table" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Id</th>
                  <th>Esp32 Id</th>
                  <th>Serie</th>
                  <th>Alias</th>
                  <th>Passw</th>
                  <th>Api Token</th>
                  <th>FechaCreacion</th>
                  <th>FechaMoficiacion</th>
                  <th>Acciones</th>
                </tr>
                </thead>
                <tbody>
                @foreach($historialesp32s as $historialesp32)
                <tr>
                    <td>{{ $historialesp32->id }}</td>
                    <td>{{ $historialesp32->esp32_id }}</td>
                    <td>{{ $historialesp32->num_serie }}</td>
                    <td>{{ $historialesp32->nick_name }}</td>
                    <td>{{ $historialesp32->password }}</td>
                    <td>{{ $historialesp32->api_token }}</td>
                    <td>{{ $historialesp32->created_at }}</td>
                    <td>{{ $historialesp32->updated_at }}</td>
                    <td>
                      <form role="form" action="{{ route('historialesp32.destroy',$historialesp32->id) }}" method="POST">
                      <a class="btn btn-info btn-xs" href="{{ route('historialesp32.show',$historialesp32->id) }}"><span class="glyphicon glyphicon-eye-open"></span></a> 
                      <a class="btn btn-warning btn-xs"  href="{{ route('historialesp32.edit',$historialesp32->id) }}" ><span class="glyphicon glyphicon-pencil"></span></a>
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
     $('#historiaEsp32Table').DataTable({
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