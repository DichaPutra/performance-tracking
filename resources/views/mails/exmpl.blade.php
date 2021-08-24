@component('mail::message')
Hello **{{$name}}**,  {{-- use double space for line break --}}
Thank you for choosing Mailtrap!

Click below to start working right now
@component('mail::button', ['url' => $link])
Login to App
@endcomponent

Sincerely,  

Crowe Perfromance Tracking.
@endcomponent