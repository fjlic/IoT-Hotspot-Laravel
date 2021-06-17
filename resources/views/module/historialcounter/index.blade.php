@extends('adminlte::page')
@section('title', 'Hotspot-Historial-Counter')
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
              <h3 class="card-title">Historial Contadores</h3>
              <a class="btn btn-xs btn-success float-right" href="{{ route('historialcounter.create') }}" role="button"><span class="fas fa-plus"></span></a>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="historialcounterTable" class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>Id</th>
                  <th>Contador Id</th>
                  <th>Nfc Id</th>
                  <th>Cont Qr</th>
                  <th>Cont Mon</th>
                  <th>Cont Mon 2</th>
                  <th>Cont Corte</th>
                  <th>Cont Prem</th>
                  <th>Cost Mon</th>
                  {{--<th>FechaCreacion</th>--}}
                  <th>FechaMod</th>
                  <th>Tipo</th>
                  <th>Acciones</th>
                </tr>
                </thead>
                <tbody>
                @foreach($historialcounters as $historialcounter)
                <tr>
                    <td>{{ $historialcounter->id }}</td>
                    <td>{{ $historialcounter->cont_id }}</td>
                    <td>{{ $historialcounter->nfc_id }}</td>
                    <td>{{ $historialcounter->cont_qr }}</td>
                    <td>{{ $historialcounter->cont_mon }}</td>
                    <td>{{ $historialcounter->cont_mon_2 }}</td>
                    <td>{{ $historialcounter->cont_corte }}</td>
                    <td>{{ $historialcounter->cont_prem }}</td>
                    <td>{{ $historialcounter->cost_mon }}</td>
                    {{-- <td>{{ $historialcounter->created_at }}</td> --}}
                    <td>{{ $historialcounter->updated_at }}</td>
                     <td>{{ $historialcounter->type }}</td>
                    <td>
                      <form role="form" action="{{ route('historialcounter.destroy',$historialcounter->id) }}" method="POST">
                      <a class="btn btn-info btn-xs" href="{{ route('historialcounter.show',$historialcounter->id) }}" role="button"><span class="fas fa-eye"></span></a> 
                      <a class="btn btn-warning btn-xs"  href="{{ route('historialcounter.edit',$historialcounter->id) }}" role="button"><span class="fas fa-pen"></span></a>
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
                  <th>counter_id</th>
                  <th>NumSerie</th>
                  <th>Contqr</th>
                  <th>Contmon</th>
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
     $('#historialcounterTable').DataTable({  
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