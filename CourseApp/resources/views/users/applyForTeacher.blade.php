@php
    $ime = auth()->user()->name;
    $email = auth()->user()->email;
    $id = auth()->user()->id;
  
@endphp
<x-layout>
    <div>
        <h1>Vase informacije</h1>
        <h5><strong>Ime:</strong>{{ $ime}}</h5>
        <h5><strong>email:</strong>{{ $email}}</h5>
        <h5><strong>id:</strong>{{ $id}}</h5>
        <form method="POST" action="/requestSend">
            @csrf
            <button>Pošalji zahtev</button>
        </form>
        

    </div>
</x-layout>