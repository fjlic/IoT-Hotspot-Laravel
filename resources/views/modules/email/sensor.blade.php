@component('mail::message')
    {{ $alert->title }} 😱

@component('mail::subcopy')
    Alerts were detected on the platform please click on the button. 🔲
@endcomponent

@component('mail::button', ['url' => 'https://hotspot.fjlic.com/historialsensor/chart/'.$sensor->id])
    Visit Iot-Hotspot
@endcomponent

@component('mail::panel')
    {{ $alert->body }} 🚀
@endcomponent

## Table {{ $alert->type }} with Id: {{ $sensor->id }}

<center>
@component('mail::table')
| Sensor | Name | Status | Description |
| --   |   --   |   --   |   --   |
|      |        |        |        |
| Temperature | Tmp_1 | {{$sensor->temp_1}} | @if($sensor->temp_1 <= 35) ✔️ @else ❌ @endif |
| Temperature | Tmp_2 | {{$sensor->temp_2}} | @if($sensor->temp_2 <= 35) ✔️ @else ❌ @endif |
| Temperature | Tmp_3 | {{$sensor->temp_3}} | @if($sensor->temp_3 <= 35) ✔️ @else ❌ @endif |
| Temperature | Tmp_4 | {{$sensor->temp_4}} | @if($sensor->temp_4 <= 35) ✔️ @else ❌ @endif |
@endcomponent
</center>


@component('mail::subcopy')
    {{ $alert->footer }} 🔗<br/><br/>
    <https://hotspot.fjlic.com/historialsensor/chart/{{ $sensor->id }}> ✌️
@endcomponent


Thanks, Atte. {{ config('app.name') }} 👻
@endcomponent
