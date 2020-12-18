@component('mail::message')

# Contact Message
Name : {{ $details['name'] }} <br>
Email : {{ $details['email'] }} <br>
Phone : {{ $details['phone'] }} <br>
Message : {{ $details['msg'] }} <br>

@component('mail::button', ['url' => ''])
Button Text
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
