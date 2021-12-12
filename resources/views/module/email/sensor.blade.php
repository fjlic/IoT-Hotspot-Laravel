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
| Sensor | Nombre | Estado/Valor | Descripción |
| --   |   --   |   --   |   --   |
|      |        |        |        |
| Temperatura | Fuente Prin | {{$sensor->temp_1}} | @if($sensor->temp_1 <= 35) ✔️ @else ❌ @endif |
| Temperatura | Ventilador | {{$sensor->temp_2}} | @if($sensor->temp_2 <= 35) ✔️ @else ❌ @endif |
| Temperatura | Ambiente | {{$sensor->temp_3}} | @if($sensor->temp_3 <= 35) ✔️ @else ❌ @endif |
| Temperatura | Sin Asignar | {{$sensor->temp_4}} | @if($sensor->temp_4 <= 35) ✔️ @else ❌ @endif |
| Voltage | Fuente Prin | {{$sensor->vol_1}} | @if($sensor->vol_1 === 'On') ✔️ @else ❌ @endif |
| Voltage | Ventilador | {{$sensor->vol_2}} | @if($sensor->vol_2 === 'On') ✔️ @else ❌ @endif |
| Voltage | Leds | {{$sensor->vol_3}} | @if($sensor->vol_3 === 'On') ✔️ @else ❌ @endif |
| Puertas | Tapa Fron | {{$sensor->door_1}} | @if($sensor->door_1 === 'On') ✔️ @else ❌ @endif |
| Puertas | Sin Asignar | {{$sensor->door_2}} | @if($sensor->door_2 === 'On') ✔️ @else ❌ @endif |
| Puertas | Sin Asignar | {{$sensor->door_3}} | @if($sensor->door_3 === 'On') ✔️ @else ❌ @endif |
| Puertas | Sin Asignar | {{$sensor->door_4}} | @if($sensor->door_4 === 'On') ✔️ @else ❌ @endif |
| Actuador | Cerradura Prin | {{$sensor->rlay_1}} | @if($sensor->rlay_1 === 'On') ✔️ @else ❌ @endif |
| Actuador | Sin Asignar | {{$sensor->rlay_2}} | @if($sensor->rlay_2 === 'On') ✔️ @else ❌ @endif |
| Actuador | Sin Asignar | {{$sensor->rlay_3}} | @if($sensor->rlay_3 === 'On') ✔️ @else ❌ @endif |
| Actuador | Sin Asignar | {{$sensor->rlay_4}} | @if($sensor->rlay_4 === 'On') ✔️ @else ❌ @endif |
@endcomponent
</center>


@component('mail::subcopy')
    {{ $alert->footer }} 🔗<br/><br/>
    https://hotspot.fjlic.com/historialsensor/chart/{{ $sensor->id }} ✌️
@endcomponent


Gracias, Atte. {{ config('app.name') }} 👻
@endcomponent