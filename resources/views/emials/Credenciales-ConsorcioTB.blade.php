@component('mail::message')
# Tus Credenciales de acceso a {{ config('app.name')}}

Utiliza estas credenciales para accceder al sistema

@component('mail::table')
    | Usuario | Cotrase���a |
    |:--------|:----------|
    | {{$user->email}} | {{$password}} |
@endcomponent

@component('mail::button', ['url' => url('login')])
Ingresar
@endcomponent

Gracias,<br>
{{ config('app.name') }}
@endcomponent
