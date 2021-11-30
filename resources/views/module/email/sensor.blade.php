@component('mail::message')
# Introduction

The body of your message.

@component('mail::button', ['url' => ''])
    Button Text
@endcomponent

@component('mail::panel')
    This is a panel
@endcomponent

## Table component:

@component('mail::table')
| Laravel       | Table         | Example  |
| ------------- |:-------------:| --------:|
| Col 2 is      | Centered      | $10      |
| Col 3 is      | Right-Aligned | $20      |
@endcomponent


@component('mail::subcopy')
    This is a subcopy component
@endcomponent


Thanks,<br>
{{ config('app.name') }}
@endcomponent