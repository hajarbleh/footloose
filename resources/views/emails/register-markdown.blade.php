@component('mail::message')
# Hi {{$name}}, welcome to FootLoose!

To start, please click the following link to verify your account.

{{ URL::to('register/verify/' . $confirmation_code) }}

Thanks,<br>
{{ config('app.name') }}
@endcomponent