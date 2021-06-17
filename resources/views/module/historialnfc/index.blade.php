@extends('adminlte::page')
@section('title', 'Hotspot-Historial-Nfc')
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
            <div class="card card-primary card-outline">
            <div class="card-header">
              <h3 class="card-title">Tabla Historial Nfc</h3>
              <a class="btn btn-xs btn-success float-right" href="{{ route('historialnfc.create') }}" role="button"><span class="fas fa-plus"></span></a>
            </div>
            <!-- /.card-header -->
            <!--'id', 'nfc_id', 'num_serie', 'cont_qr', 'cont_mon', 'cont_corte', 'cont_prem', 'cost_mon', 'ssid', 'passwd', 'ip_server', 'port', 'txt', -->
            <div class="card-body">
              <table id="historiaNfcTable" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Id</th>
                  <th>Id Nfc</th>
                  <th>Serie</th>
                  <th>Cont Qr</th>
                  <th>Cont Mon</th>
                  <th>Cont Mon 2</th>
                  <th>Cont Corte</th>
                  <th>Cont Prem</th>
                  <th>Cost Mon</th>
                  <th>Ssid</th>
                  {{-- <th>Passwd</th>  --}}
                  <th>Ip Server</th>
                  <th>Port</th>
                  <th>Texto</th>
                  {{--<th>FechaCreacion</th>--}}
                  <th>FechaMod</th>
                  <th>Acciones</th>
                </tr>
                </thead>
                <tbody>
                @foreach($historialnfcs as $historialnfc)
                <tr>
                    <td>{{ $historialnfc->id }}</td>
                    <td>{{ $historialnfc->nfc_id }}</td>
                    <td>{{ $historialnfc->num_serie }}</td>
                    <td>{{ $historialnfc->cont_qr }}</td>
                    <td>{{ $historialnfc->cont_mon }}</td>
                    <td>{{ $historialnfc->cont_mon_2 }}</td>
                    <td>{{ $historialnfc->cont_corte }}</td>
                    <td>{{ $historialnfc->cont_prem }}</td>
                    <td>{{ $historialnfc->cost_mon }}</td>
                    <td>{{ $historialnfc->ssid }}</td>
                    {{-- <td>{{ $historialnfc->passwd }}</td>  --}}
                    <td>{{ $historialnfc->ip_server }}</td>
                    <td>{{ $historialnfc->port }}</td>
                    <td>{{ $historialnfc->txt }}</td>
                    {{--<td>{{ $historialnfc->created_at }}</td>--}}
                    <td>{{ $historialnfc->updated_at }}</td>
                    <td>
                      <form role="form" action="{{ route('historialnfc.destroy',$historialnfc->id) }}" method="POST">
                      <a class="btn btn-info btn-xs" href="{{ route('historialnfc.show',$historialnfc->id) }}"><span class="fas fa-eye"></span></a> 
                      <a class="btn btn-warning btn-xs"  href="{{ route('historialnfc.edit',$historialnfc->id) }}" ><span class="fas fa-pen"></span></a>
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

@section('css')
@toastr_css 
@stop

@section('js')
@toastr_js
@toastr_render
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