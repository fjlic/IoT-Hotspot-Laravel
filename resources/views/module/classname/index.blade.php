@extends('adminlte::page')
@section('title', 'Hotspot-ClassName')
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

 <!-- Main content Part Name : VST -->
 <!-- Part Size : 23.3 -->
 <section class="content">
      <div class="row">
        <div class="col-12">
          <div class="card card-primary card-outline">
            <div class="card-header">
              <h3 class="card-title">Tabla ClassName</h3>
              <a class="btn btn-xs btn-success float-right" href="{{ route('classname.create') }}" role="button"><span class="fas fa-plus"></span></a>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <a class="float-left"><h1 class="card-title">Total InX = {{ $total_in }}</h1></a><br><br>
              <a class="float-left"><h1 class="card-title">Total (Inx-Avg)2 = {{ $total_in2 }}</h1></a><br><br>
              <table id="classnameTable" class="table table-bordered table-striped">
              <thead>
                 <!-- /.card-header (ClassName)'id', 'class_name', 'class_loc', 'num_method', -->
                <tr>
                  <th>Id</th>
                  <th>Nombre</th>
                  <th>Class LOC</th>
                  <th>Num Method</th>
                  <th>Loc Method</th>
                  <th>In(x)</th>
                  <th>(In(x)-avg)2</th>
                  {{-- <th>FechaCreacion</th>  --}}
                  <th>FechaMod</th>
                  <th>Acciones</th>
                </tr>
                </thead>
                <tbody>
                @foreach($classnames as $classname)
                <tr>
                    <td>{{ $classname->id }}</td>
                    <td>{{ $classname->class_name }}</td>
                    <td>{{ $classname->class_loc }}</td>
                    <td>{{ $classname->num_method }}</td>
                    <td>{{ $classname->loc_method }}</td>
                    <td>{{ $classname->in }}</td>
                    <td>{{ $classname->in2 }}</td>
                    {{-- <td>{{ $classname->created_at }}</td>  --}}
                    <td>{{ $classname->updated_at }}</td>
                    <td>
                      <form role="form" action="{{ route('classname.destroy',$classname->id) }}" method="POST">
                      <a class="btn btn-info btn-xs" href="{{ route('classname.show',$classname->id) }}" role="button"><span class="fas fa-eye"></span></a> 
                      <a class="btn btn-warning btn-xs"  href="{{ route('classname.edit',$classname->id) }}" role="button"><span class="fas fa-pen"></span></a>
                      @csrf
                      @method('DELETE')
                      <a href="" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#exampleModalCenter{{$classname->id}}"><span class="fas fa-trash"></span></a>
                      <!------ ESTE ES EL MODAL QUE SE MUESTRA AL DAR CLICK EN EL BOTON "ELIMINAR" ------>
                      <div class="modal fade" id="exampleModalCenter{{$classname->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
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
                          <p class="text-center">Eliminarás ( <b>{{$classname->class_name}}</b> ) seguro?</p>
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
                  <th>Nombre</th>
                  <th>Class LOC</th>
                  <th>Num Method</th>
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

<!--------------------------------------------------------------------------------------------------------------------------------------------------> 

<!-- Main content Part Name : VST -->
 <!-- Part Size : 23.3 -->
 <section class="content">
  <div class="row">
    <div class="col-12">
      <div class="card card-primary card-outline">
        <div class="card-header">
          <h3 class="card-title">Tabla Chapter</h3>
          
        </div>
        <!-- /.card-header -->
        <div class="card-body">
          <table id="chapterTable" class="table table-bordered table-striped">
          <thead>
             <!-- /.card-header (ClassName)'id', 'class_name', 'class_loc', 'num_method', -->
            <tr>
              <th>Id</th>
              <th>Capitulo</th>
              <th>Num Capitulo</th>
              <th>Paginas</th>
              <th>FechaCreacion</th>
              <th>FechaMoficiacion</th>
            </tr>
            </thead>
            <tbody>
            @foreach($chapters as $chapter)
            <tr>
                <td>{{ $chapter->id }}</td>
                <td>{{ $chapter->chapter_name }}</td>
                <td>{{ $chapter->chapter_num }}</td>
                <td>{{ $chapter->pages }}</td>
                <td>{{ $chapter->created_at }}</td>
                <td>{{ $chapter->updated_at }}</td>
            </tr>
            @endforeach
            </tbody>
           <!-- <tfoot>
             <tr>
              <th>Id</th>
              <th>Capitulo</th>
              <th>Paginas</th>
              <th>FechaCreacion</th>
              <th>FechaMoficiacion</th>
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

<!--------------------------------------------------------------------------------------------------------------------------------------------------> 


<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-12">
      <div class="card card-success card-outline">
        <div class="card-header">
          <h3 class="card-title">Resultados</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
          <table id="0" class="table table-striped table-bordered">
             <!-- /.card-header 'id', 'estimate_proxy_size', 'development_hours' -->
            <thead>
             <tr>
                <th></th>
                <th>VS</th>
                <th>S</th>
                <th>M</th>
                <th>L</th>
                <th>VL</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <th>LOC/Method</th>
                <td>{{ $loc_1 }}</td>
                <td>{{ $loc_2 }}</td>
                <td>{{ $loc_3 }}</td>
                <td>{{ $loc_4 }}</td>
                <td>{{ $loc_5 }}</td>
              </tr>
              <tr>
                <th>Pgs/Chapter</th>
                <td>{{ $pag_1 }}</td>
                <td>{{ $pag_2 }}</td>
                <td>{{ $pag_3 }}</td>
                <td>{{ $pag_4 }}</td>
                <td>{{ $pag_5 }}</td>
              </tr>
            </tbody>
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
{{-- <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/botman-web-widget@0/build/assets/css/chat.min.css"> --}}
@stop

@section('js')
@toastr_js
@toastr_render
<script>
  $(function () {
     $('#classnameTable').DataTable({  
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
  $(function () {
     $('#chapterTable').DataTable({  
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