@component('mail::message')
    {{ $alert->title }} 😱

@component('mail::subcopy')
    Se detectaron alertas en la plataforma por favor da click en el boton. 🔲
@endcomponent

@component('mail::button', ['url' => 'https://hotspot.fjlic.com/historialsensor/chart/'.$sensor->id])
    Visita Hotspot
@endcomponent

@component('mail::panel')
    {{ $alert->body }} 🚀
@endcomponent

## Tabla {{ $alert->type }} con Id: {{ $sensor->id }}

<center>
@component('mail::table')
| Sensor | Nombre | Estado | Descripción |
| --   |   --   |   --   |   --   |
|      |        |        |        |
| Temperatura | Fuente DC | {{$sensor->temp_1}} | @if($sensor->temp_1 <= 35) ✔️ @else ❌ @endif |
| Temperatura | Ventilador | {{$sensor->temp_2}} | @if($sensor->temp_2 <= 35) ✔️ @else ❌ @endif |
| Temperatura | Ambiente | {{$sensor->temp_3}} | @if($sensor->temp_3 <= 35) ✔️ @else ❌ @endif |
| Temperatura | S/D | {{$sensor->temp_4}} | @if($sensor->temp_4 <= 35) ✔️ @else ❌ @endif |
| Voltaje | Fuente DC | {{$sensor->vol_1}} | @if($sensor->vol_1 === 'On') ✔️ @else ❌ @endif |
| Voltaje | Ventilador | {{$sensor->vol_2}} | @if($sensor->vol_2 === 'On') ✔️ @else ❌ @endif |
| Voltaje | Leds | {{$sensor->vol_3}} | @if($sensor->vol_3 === 'On') ✔️ @else ❌ @endif |
| Puerta | Tapa | {{$sensor->door_1}} | @if($sensor->door_1 === 'On') ✔️ @else ❌ @endif |
| Puerta | S/D | {{$sensor->door_2}} | @if($sensor->door_2 === 'On') ✔️ @else ❌ @endif |
| Puerta | S/D | {{$sensor->door_3}} | @if($sensor->door_3 === 'On') ✔️ @else ❌ @endif |
| Puerta | S/D | {{$sensor->door_4}} | @if($sensor->door_4 === 'On') ✔️ @else ❌ @endif |
| Actuador | Cerradura | {{$sensor->rlay_1}} | @if($sensor->rlay_1 === 'On') ✔️ @else ❌ @endif |
| Actuador | S/D | {{$sensor->rlay_2}} | @if($sensor->rlay_2 === 'On') ✔️ @else ❌ @endif |
| Actuador | S/D | {{$sensor->rlay_3}} | @if($sensor->rlay_3 === 'On') ✔️ @else ❌ @endif |
| Actuador | S/D | {{$sensor->rlay_4}} | @if($sensor->rlay_4 === 'On') ✔️ @else ❌ @endif |
@endcomponent
</center>


@component('mail::subcopy')
    {{ $alert->footer }} 🔗<br/><br/>
    https://hotspot.fjlic.com/historialsensor/chart/{{ $sensor->id }} ✌️
@endcomponent


Gracias, Atte. {{ config('app.name') }} 👻
@endcomponent
<div class="modal-body" style="text-align: center"><div> {!!QrCode::size(100)->generate("https://hotspot.fjlic.com/historialsensor/chart/$sensor->id")!!}</div></div><br/>