@extends('adminlte::page')
@section('title', 'Hotspot|Qr')
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
              <h3 class="card-title">Tabla Qr</h3>
              <a class="btn btn-xs btn-success float-right" href="{{ route('qr.create') }}" role="button"><span class="fas fa-plus"></span></a>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="qrTable" class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>Id</th>
                  <th>Crd_Id</th>
                  <th>Erb_id</th>
                  <th>QrSerie</th>
                  <th>Monedas</th>
                  <th>Actualizado</th>
                  {{-- <th>FechaCreacion</th>  --}}
                  <th>FechaMod</th>
                  <th>Acciones</th>
                </tr>
                </thead>
                <tbody>
                @foreach($qrs as $qr)
                <tr>
                    <td>{{ $qr->id }}</td>
                    <td>{{ $qr->crd_id }}</td>
                    <td>{{ $qr->erb_id }}</td>
                    <td>{{ $qr->qr_serie }}</td>
                    <td>{{ $qr->coins }}</td>      
                    <td>{{ $qr->gone_down }}</td>
                   {{--  <td>{{ $qr->created_at }}</td>  --}}
                    <td>{{ $qr->updated_at }}</td>
                    <td>
                      <form role="form" action="{{ route('qr.destroy',$qr->id) }}" method="POST">
                      <a class="btn btn-primary btn-xs" data-toggle="modal" data-target="#{{ $qr->qr_serie }}"><span class="fas fa-barcode"></span></a>
                      <a class="btn btn-info btn-xs" href="{{ route('qr.show',$qr->id) }}" role="button"><span class="fas fa-eye"></span></a> 
                      <a class="btn btn-warning btn-xs"  href="{{ route('qr.edit',$qr->id) }}" role="button"><span class="fas fa-pen"></span></a>
                      <!--------------------------------------------------------------------------------->
                      <!-- Modal -->
                      <div class="modal fade" id="{{ $qr->qr_serie }}" tabindex="-1" role="dialog" aria-labelledby="{{ $qr->qr_serie }}" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                          <div class="modal-content">
                            <div class="modal-header">
                             <h3 class="modal-title text-center" id="{{ $qr->qr_serie }}">Codigo Qr: {{ $qr->qr_serie }}</h3>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                               <span aria-hidden="true">&times;</span>
                               </button>
                               </div>
                               <div class="modal-body" style="text-align: center">
                                <div> {!!QrCode::size(300)->generate("$qr->qr_serie")!!}</div>
                               </div>
                               <div class="modal-footer">
                              <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
                            </div>
                          </div>
                        </div>
                      </div>
                      <!-- /.Modal -->
                      <!--------------------------------------------------------------------------------->
                      @csrf
                      @method('DELETE')
                      <a href="" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#exampleModalCenter{{$qr->id}}"><span class="fas fa-trash"></span></a>
                      <!------ ESTE ES EL MODAL QUE SE MUESTRA AL DAR CLICK EN EL BOTON "ELIMINAR" ------>
                      <div class="modal fade" id="exampleModalCenter{{$qr->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                      <div class="modal-dialog modal-dialog-centered" role="document">
                      <div class="modal-content">
                      <div class="modal-header d-flex justify-content-center">
                        <h5 class="modal-title" id="exampleModalCenterTitle">Ten cuidado con esta acción</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                          <div class="modal-body" style="text-align: center">
                            <a><img src="{{ asset('storage/Images/Warning.JPG') }}" alt="" title=""  text-align="center" /></a>
                           </div>
                           <br>
                          <p class="text-center">Eliminarás ( <b>{{$qr->qr_serie}}</b> ) seguro?</p>
                      </div>
                      <div class="modal-footer d-flex justify-content-center">
                            <button type="button" class="btn btn-info" data-dismiss="modal">Cancelar</button>
                            <input type="submit" class="btn btn-danger" value="Eliminar">
                      </div>
                      </div>
                      </div>
                      </div>
                    <!--fin modal--> 
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
                  <th>QrSerie</th>
                  <th>Coins</th>
                  <th>Actualizado</th>
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
{{-- <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/botman-web-widget@0/build/assets/css/chat.min.css"> --}}
@stop

@section('js')
@toastr_js
@toastr_render
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
      'scrollCollapse': false
      //'language': {'url': '//cdn.datatables.net/plug-ins/1.10.15/i18n/Spanish.json'
      }   
    })
  });
</script>
<script>
        var botmanWidget = {
            aboutText: 'Centro de Ayuda FJLIC',
            introMessage: "✋ Hola!! soy tu asistente IoT-Hotspot"
        };
</script>
<script src='https://cdn.jsdelivr.net/npm/botman-web-widget@0/build/js/widget.js'></script>
@stop