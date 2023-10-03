<link rel="stylesheet" href={{ asset('css/flash-message.css') }}>
@if(session()->has('message'))
    <div x-data="{show: true}" x-init="setTimeout(() => show = false, 3000)" x-show="show">
        <div class="messageMain">
        <p>
            {{session('message')}}
        </p>
    </div>
    </div>
@endif