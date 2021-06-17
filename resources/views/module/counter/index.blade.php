@extends('adminlte::page')
@section('title', 'Hotspot-Counter')
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
              <h3 class="card-title">Tabla Contadores</h3>
              <a class="btn btn-xs btn-success float-right" href="{{ route('counter.create') }}" role="button"><span class="fas fa-plus"></span></a>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="counterTable" class="table table-bordered table-striped">
              <thead>
                <tr>
                  {{-- <th>Id</th> --}}
                  {{-- <th>Esp32 Id</th> --}}
                  {{-- <th>Nfc Id</th> --}}
                  <th>Num Serie</th>
                  <th>Cont Qr</th>
                  <th>Cont Mon</th>
                  <th>Cont Mon2</th>
                  <th>Cont Corte</th>
                  <th>Cont Prem</th>
                  <th>Cost Mon</th>
                  {{-- <th>FechaCreacion</th> --}}
                  <th>FechaMod</th>
                  <th>Tipo</th>
                  <th>Acciones</th>
                </tr>
                </thead>
                <tbody>
                @foreach($counters as $counter)
                <tr>
                    {{-- <td>{{ $counter->id }}</td> --}}
                    {{-- <td>{{ $counter->esp32_id }}</td> --}}
                    {{-- <td>{{ $counter->nfc_id }}</td> --}}
                    <td>{{ $counter->num_serie }}</td>
                    <td>{{ $counter->cont_qr }}</td>
                    <td>{{ $counter->cont_mon }}</td>
                    <td>{{ $counter->cont_mon_2 }}</td>
                    <td>{{ $counter->cont_corte }}</td>
                    <td>{{ $counter->cont_prem }}</td>
                    <td>{{ $counter->cost_mon }}</td>
                    <td>{{ $counter->updated_at }}</td>
                    <td>{{ $counter->type }}</td>
                    <td>
                      <form role="form" action="{{ route('counter.destroy',$counter->id) }}" method="POST">
                      <a class="btn btn-info btn-xs" href="{{ route('counter.show',$counter->id) }}" role="button"><span class="fas fa-eye"></span></a> 
                      <a class="btn btn-warning btn-xs"  href="{{ route('counter.edit',$counter->id) }}" role="button"><span class="fas fa-pen"></span></a>
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
                  <th>Crd_Id</th>
                  <th>Erb_id</th>
                  <th>Nfc_id</th>
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
     $('#counterTable').DataTable({  
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