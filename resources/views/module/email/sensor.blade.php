@component('mail::message')
# {{ $alert->title }}

@component('mail::subcopy')
    se detectaron alertas en la plataforma por favor da click en el boton.
@endcomponent

@component('mail::button', ['url' => 'https://hotspot.fjlic.com/'])
    Visita Hotspot
@endcomponent

@component('mail::panel')
    {{ $alert->body }}
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
    {{ $alert->footer }}
@endcomponent


Gracias, Atte. {{ config('app.name') }}
@endcomponent