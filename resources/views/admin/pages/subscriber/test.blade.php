@component('mail::message')
# Tomams Mail Services

{{$subject}}

@component('mail::button', ['url' => 'http://upureka.com/complete-projects/Tomams/'])
Visit Website
@endcomponent

Thanks,<br>
{{ config('app.name') }}.
@endcomponent
