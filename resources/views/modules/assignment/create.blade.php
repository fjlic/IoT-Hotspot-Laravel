@extends('adminlte::page')
@section('title', 'Hotspot|Assignments')
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
              <h3 class="card-title">Edit Assignment</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                  <!-- form start -->
            <form role="form" action="{{ route('role.store')}}" method="POST">
              @csrf
              <div class="card-body">
                <div class="form-group">
                  <label for="name">Name Code</label>
                  <input type="text" class="form-control" name="name" id="name"  placeholder="Enter a role name for code" required>
                </div>
                <div class="form-group">
                  <label for="display_name">Nombre de la Vista</label>
                  <input type="text" class="form-control" name="display_name" id="display_name"  placeholder="Enter display name" required>
                </div>
                <div class="form-group">
                  <label for="description">Description</label>
                  <input type="description" class="form-control" name="description" id="description" placeholder="Enter role description" required>
                </div>
              </div>
              <!-- /.card-body -->

              <div class="card-footer">
                <a href="{{ route('role.index') }}" class="btn btn-default">Cancel</a>
                <button type="submit" class="btn btn-success pull-right">Send</button>
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