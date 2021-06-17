@extends('adminlte::page')
@section('title', 'Hotspot-Historial-Crd')
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
              <h3 class="card-title">Tabla Historial Crd</h3>
              <a class="btn btn-xs btn-success float-right" href="{{ route('historialcrd.create') }}" role="button"><span class="fas fa-plus"></span></a>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="historialcrdTable" class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>Id</th>
                  <th>Crd_Id</th>
                  <th>Serie</th>
                  <th>Nombre</th>
                  <th>Alias</th>
                  {{-- <th>Password</th>  --}}
                  <th>ApiToken</th>
                  {{-- <th>FechaCreacion</th>  --}}
                  <th>FechaMod</th>
                  <th>Acciones</th>
                </tr>
                </thead>
                <tbody>
                @foreach($historialcrds as $historialcrd)
                <tr>
                    <td>{{ $historialcrd->id }}</td>
                    <td>{{ $historialcrd->crd_id }}</td>
                    <td>{{ $historialcrd->num_serie }}</td>
                    <td>{{ $historialcrd->name_machine }}</td>      
                    <td>{{ $historialcrd->nick_name }}</td>
                    {{-- <td>{{ $historialcrd->password }}</td>  --}}
                    <td>{{ $historialcrd->api_token }}</td>
                    {{-- <td>{{ $historialcrd->created_at }}</td>  --}}
                    <td>{{ $historialcrd->updated_at }}</td>
                    <td>
                      <form role="form" action="{{ route('historialcrd.destroy',$historialcrd->id) }}" method="POST">
                      <a class="btn btn-info btn-xs" href="{{ route('historialcrd.show',$historialcrd->id) }}" role="button"><span class="fas fa-eye"></span></a> 
                      <a class="btn btn-warning btn-xs"  href="{{ route('historialcrd.edit',$historialcrd->id) }}" role="button"><span class="fas fa-pen"></span></a>
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
                  <th>Crd Id</th>
                  <th>NumSerie</th>
                  <th>Alias</th>
                  <th>Password</th>
                  <th>ApiToken</th>
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
     $('#historialcrdTable').DataTable({  
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