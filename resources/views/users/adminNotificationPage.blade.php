@php

$tag = request('tag') ; 
session(['notification' => $notifications]); 
@endphp
<link rel="stylesheet" href={{ asset('css/adminNotification.css') }}>
<x-layout>
   
    <div class="main">
    <div class="adminNotificationMain">
        <h1 class="h1Zahtevi">Zahtevi za predavaca</h1>
    @foreach ($notifications as $item)
        <div class="notificationCardDiv">
            <p><strong>{{$item->user_name}}</strong> je poslao zahtev za predavača</p>
            <p><strong>email: </strong>{{$item->user_name}}</p>
            <div class="btnDiv">
                
                <form method="POST" action="/changeRoleToPrdavac/{{$item->user_id}}/{{$item->id}}">
                    @csrf
                    @method('PUT')
                    <button class="OdobriDiv">Odobri</button>
                </form>
                <a href="/adminNotificationPage/?tag={{$item->id}}">
                <button class="OdbijDiv">Odbij</button> 
               <a>
                
               
            </div>
        </div>
    @endforeach
</div>
@if ($tag)
<div id="confirmDeleteWindow">
  <div class="deleteWindowCenterDiv">
    <h5>Jeste li sigurni da želite da odbijete ovaj zahtev?</h5>
    <div class="deleteWindowCenterDivBtn">
    <form method="POST" action="/notifications/{{$tag}}">
        @csrf
        @method('DELETE')
        <button type="submit" class="ConfirmBtn">
            Potvrdi
        </button>
    </form>
    <a href="/adminNotificationPage" class="aforcancelBtn">
       <button id="cancelButton">Cancel</button>
    </a>
</div>
  </div>
</div>
@endif


    
</div>
</x-layout>