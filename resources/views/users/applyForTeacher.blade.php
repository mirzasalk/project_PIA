@php
    $ime = auth()->user()->name;
    $email = auth()->user()->email;
    $id = auth()->user()->id;
  
@endphp
<link rel="stylesheet" href={{ asset('css/applyForTeacher.css') }}>
<x-layout>
    <div id="applyMain">
        <div class="formDiv">
           <h1>Vase informacije</h1>
           <div class="infoDiv">
             <div><p><strong>Ime:</strong></p><p>{{ $ime}}</p></div>
             <div><p><strong>Email:</strong></p><p>{{ $email}}</p></div>
             
           </div>
           <form method="POST" action="/requestSend">
               @csrf
               <button class="applyBtn">Pošalji zahtev</button>
           </form>
        

        </div>
    </div>
</x-layout>