@component('mail::message')
    <h1>{{ $data['body'] }}</h1>
    @component('mail::button', ['url' => $actionUrl, 'color' => 'success'])
        I'm there
    @endcomponent

    @component('mail::button', ['url' => $actionUrl, 'color' => 'success'])
        I'm not there
    @endcomponent
@endcomponent