@extends('adminlte::auth.passwords.reset')

@section('css')
{{-- <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/botman-web-widget@0/build/assets/css/chat.min.css"> --}}
@stop

@section('js')
<script>
        var botmanWidget = {
            aboutText: 'Write Something',
            introMessage: "✋ Hi! I'm form Real Programmer"
        };
</script>
<script src='https://cdn.jsdelivr.net/npm/botman-web-widget@0/build/js/widget.js'></script>
@stop