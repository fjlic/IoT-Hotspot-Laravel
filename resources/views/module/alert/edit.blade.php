@extends('adminlte::page')
@section('title', 'Hotspot|Alert')
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
            <div class="card card-warning card-outline">
            <div class="card-header">
              <h3 class="card-title">Editar Alerta</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                  <!-- form start -->
            <form role="form" action="{{ route('alert.update',$alert->id) }}" method="POST">
            @csrf
            @method('PUT')
                <div class="form-group">
                  <label for="type">Asignar tipo de alerta</label>
                  <select class="form-control" name="type" id="type"> 
                    <option selected="true">{{ $alert->type }}</option>
                    @foreach($types as $type)
                    <option>{{ $type }}</option>
                    @endforeach
                    </select>
                </div>
                <div class="form-group">
                  <label for="email">E-mail (mas de un correo separalo por ":"</label>
                  <input type="text" class="form-control" name="email" id="email"  placeholder="Introduce e-mail" required value="{{ $alert->email }}" />
                </div>
                <div class="form-group">
                  <label for="title">Titulo</label>
                  <input type="text" class="form-control" name="title" id="title" placeholder="Introduce un titulo de alerta" required value="{{ $alert->title }}"/>
                </div>
                <div class="form-group">
                  <label for="body">Descricpion de mensaje</label>
                  <input type="text" class="form-control" name="body" id="body" placeholder="Introduce un titulo de alerta" required value="{{ $alert->body }}"/>
                </div>
                <div class="form-group">
                  <label for="footer">Fin de mensaje</label>
                  <input type="text" class="form-control" name="footer" id="footer" placeholder="Introduce termino del mensaje" required value="{{ $alert->footer }}"/>
                </div>
              <!-- /.card-body -->
              <div class="card-footer">
                <a href="{{ route('alert.index') }}" class="btn btn-default">Cancelar</a>
                <button type="submit" class="btn btn-warning pull-right" >Enviar</button>
              </div>
            </form>
            </div>
          <!-- /.card -->
          <!-- form-->
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
<div class="pull-right hidden-xs"><b>Version</b> 2.0.1 <strong>  Copyright &copy; 2021 <a href="http://hotspot.fjlic.com/home" target="_blank">Hotspot</a>.</strong>  Todo los derechos Reservados.</div> 
@stop

@section('css')
@toastr_css 
@stop

@section('js')
@toastr_js
@toastr_render
@stop