
<link rel="stylesheet" href={{ asset('css/register.css') }}>
<x-layout>
<div id="mainRegister">
    <div class="formBackground">
    <h2>Regstruj se</h2>
    
    <form method="get" action="/users">
    @csrf

    <div class="inputDiv">
    <input type="text" name="name" placeholder="ime" value="{{old('name')}}">
    @error('name')

        <p class="error">Unesete ime</p>
    @enderror
</div>
    



<div class="inputDiv">
    <input type="email" name="email" placeholder="email" value="{{old('email')}}">
    @error('email')
        <p class="error">Unesite email adresu</p>
    @enderror
</div>
<div class="inputDiv">
    <input type="password" name="password" placeholder="šifra" value="">
    @error('password')
   
       @if ($message =="The password field confirmation does not match.")
       <p class="error">Šifre se ne podudaraju</p>
       @endif
       @if($message =="The password field must be at least 6 characters.")
       <p class="error">Uneli ste manje od 6 karaktera</p>
       @endif
       @if($message =="The password confirmation field is required.")
       <p class="error">Unesite sifru</p>
       @endif
        <p class="error">Unesite šifru</p>
    @enderror
</div>
<div class="inputDiv">
    <input type="password" name="password_confirmation" placeholder="potvrdi šifru" value="">
    @error('password_confirmation')
     
        @if ($message =="The password confirmation field must match password.")
        <p class="error">Šifre se ne podudaraju</p>
        @endif
        @if($message =="The password confirmation field must be at least 6 characters.")
        <p class="error">Uneli ste manje od 6 karaktera</p>
        @endif
        @if($message =="The password confirmation field is required.")
        <p class="error">Unesite potvdu sifre</p>
        @endif
    @enderror
</div>
    

    <button type="submit" class="regBtn">Napravi  nalog</button>

  

    <div class="loginLinkDiv">
        <p>Već imate nalog?</p>
        <a href="/login">Prijavite se</a>
    </div>

    </form>
</div>
</div>
</x-layout>