@component('mail::message')
# Hola estimado(a) este mensage requiere de tu atencion !!

@component('mail::subcopy')
    se detectaron alertas en la plataforma por favor.
@endcomponent

@component('mail::button', ['url' => 'https://hotspot.fjlic.com/'])
    Visita Hotspot
@endcomponent

@component('mail::panel')
    Acontinuacion se describen las alertas de Sensores IoT-Hotspot
@endcomponent

## Tabla de Alertas:

@component('mail::table')
| Primera columna | Segunda columna | Tercera columna |
| -- | -- | -- |
| Contenido 1-1 | Contenido 1-2 | Contenido 1-3 |
| Contenido 2-1 | Contenido 2-2 | Contenido 2-3 |
| Contenido 3-1 | Contenido 3-2 | Contenido 3-3 |
@endcomponent


@component('mail::subcopy')
    Para mas detalles visita el link: https://hotspot.fjlic.com/
@endcomponent


Gracias, Atte. {{ config('app.name') }}
@endcomponent