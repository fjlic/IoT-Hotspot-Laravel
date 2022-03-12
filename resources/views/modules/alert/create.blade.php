@extends('adminlte::page')
@section('title', 'Hotspot|Alerts')
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
            <div class="card card-success card-outline">
            <div class="card-header">
              <h3 class="card-title">Create Alert</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                  <!-- form start -->
              <form role="form" action="{{ route('alert.store')}}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="type">Assign alert type</label>
                        <select class="form-control" name="type" id="type"> 
                          @foreach($types as $type)
                          <option>{{ $type }}</option>
                          @endforeach
                        </select>
                </div>
                <div class="form-group">
                  <label for="email">Mail (more than one email separated by ":")</label>
                  <input type="text" class="form-control" name="email" id="email"  placeholder="Introduce e-mail" required>
                </div>
                <div class="form-group">
                  <label for="title">Title</label>
                  <input type="title" class="form-control" name="title" id="title" placeholder="Introduce un titulo" required>
                </div>
                <div class="form-group">
                  <label for="body">Message description</label>
                  <input type="text" class="form-control" name="body" id="body"  placeholder="Introduce descripcion de alerta" required>
                </div>
                <div class="form-group">
                  <label for="footer">End message</label>
                  <input type="text" class="form-control" name="footer" id="footer"  placeholder="Introduce termino del mensaje" required>
                </div>  
            </div>
            <!-- /.card-body -->
            <div class="card-footer">
                <a href="{{ route('alert.index') }}" class="btn btn-default">Cancel</a>
                <button type="submit" class="btn btn-success pull-right" >Send</button>
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
<div class="pull-right hidden-xs"><b>Version</b> 2.1.1 <strong>  Copyright &copy; 2022 <a href="http://hotspot.fjlic.com/home" target="_blank">Hotspot</a>.</strong>  All rights reserved.</div> 
@stop

@section('css')
@toastr_css 
{{-- <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/botman-web-widget@0/build/assets/css/chat.min.css"> --}}
@stop

@section('js')
@toastr_js
@toastr_render
<script>
        var botmanWidget = {
            aboutText: 'FJLIC Help Center',
            introMessage: "✋ Hello!! I am your IoT-Hotspot assistant"
        };
</script>
<script src='https://cdn.jsdelivr.net/npm/botman-web-widget@0/build/js/widget.js'></script>
@stop