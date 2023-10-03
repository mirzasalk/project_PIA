<link rel="stylesheet" href={{ asset('css/infoPage.css') }}>
@php
    $show = request('show')
@endphp
<x-layout>
    <div id="userInfoMain">
        <div class="userInfoCenter">
            <div>
            <h1>{{auth()->user()->name}}</h1>
            <h3>{{auth()->user()->email}}</h3>
            <a href="/userProfile/?show=1"><button class="btnP">Promeni šifru</button></a>
        </div>
        </div>
    </div>
    @if ($show)
    <div class="potvrda">
        <a href="/userProfile" class="aX"><button class="obtN">X</button></a>
    <form action="/changePass">
        <div>
           
           <input name="oldPass" type="password" placeholder="unsei staru šifru">
        </div> 
        <div>
           
           <input name="newPass" type="password" placeholder="unesi novu šifru">
           @error('newPass')
           @if ($message == "The new pass field is required.")
           <p style="color: red">Niste uneli novu lozinku!</p>
           @endif
           @if ($message == "The new pass field must be at least 6 characters.")
           <p style="color: red">šifra mora da ima najmanje 6 karaktera!</p>
           @endif
              
           @enderror
        </div> 
        <button class="btnPot">potvrdi</button>
    </form>
   
</div>
    @endif
</x-layout>