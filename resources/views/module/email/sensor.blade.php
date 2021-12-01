@component('mail::message')
# Este mensage requiere de tu atencion !!

 Hola estimado se detectaron alertas en la plataforma por favor.

@component('mail::button', ['url' => 'https://hotspot.fjlic.com/'])
    Visita Hotspot
@endcomponent

@component('mail::panel')
    Alertas de Sensores IoT-Hotspot
@endcomponent

## Tabla de Alertas:

@component('mail::table')
| Id Sensor | Id Historial | Nombre | Estatus |
|:---------:|:------------:|:------:|:------:-|
|     1     |      1       |  Tmp1  |    3.5  |
|     1     |      2       |  Tmp2  |    3.6  |
@endcomponent


@component('mail::subcopy')
    Para mas detalles visita el link: https://hotspot.fjlic.com/
@endcomponent


Gracias por atender el mensage,<br>
{{ config('app.name') }}
@endcomponent