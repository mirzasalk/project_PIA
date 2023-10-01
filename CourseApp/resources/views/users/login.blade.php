
<link rel="stylesheet" href={{ asset('css/infoPage.css') }}>
<x-layout>
    <div id="mainLogin">
        <div class="formBackground">
    <h2>Prijavi se</h2>
   

    <form method="POST" action="/users/authenticate">
    @csrf
    <div class="inputDiv">
        <input type="email" name="email" placeholder="email adresa" value="{{old('email')}}">
        @error('email')
       
        @if($message == "Invalid credientals")
           <p class="error">Unesite ispravne podatke</p>
        @endif
        @if($message == "The email field is required.")
           <p class="error">Unesite email adresu</p>
        @endif
        @enderror
    </div>
    <div class="inputDiv">
        <input type="password" name="password" placeholder="šifra" value="">
        @error('password')
           @if($message =="The password field is required.")
           <p class="error">Unesite šifru</p>
           @endif
        @enderror
    </div>
    <button class="logBtn" type="submit">Sign In</button>
    <div class="registerLinkDiv">
        <p>Nemate nalog?</p>
        <a href="/register">Sign Up</a>
    </div>
    </form>
        </div>
    </div>
</x-layout>