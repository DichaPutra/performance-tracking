@component('mail::message')
Hello **{{$name}}**,  {{-- use double space for line break --}}
**{{$company_name}}** has invited you to use Crowe Performance Tracking.

Here is your temporary account login data :

Email : **{{$email}}**  
Password : **{{$password}}**

Click below to start working right now

@component('mail::button', ['url' => $link])
Login to App
@endcomponent

Don't forget to change the password after you log into the application.
Thank you for choosing Crowe Performance Tracking!


Sincerely,  

Crowe Perfromance Tracking.
@endcomponent