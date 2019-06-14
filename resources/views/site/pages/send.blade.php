@component('mail::message')
# Tomams Mail Services

Your Verification Code is : {{$code}}

@component('mail::button', ['url' => 'http://upureka.com/complete-projects/Tomams/phone'])
Visit Website
@endcomponent

Thanks,<br>
{{ config('app.name') }}.
@endcomponent
