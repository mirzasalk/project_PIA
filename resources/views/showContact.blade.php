
<link rel="stylesheet" href={{ asset('css/login.css') }}>
<x-layout>
   
    <div id="mainLogin">
        <div class="formBackground">
    <h2 style="border-bottom: 1px solid black;margin-bottom: 1em;">Kontakt informacije</h2>
   

    <form  action="">
    @csrf
    <div class="inputDiv">
       
        <h3><strong>Broj telefona: +38164/321-121</strong></h3>
    </div>
    <div class="inputDiv">
        <h3><strong>Email:</strong>savory.recipes@gmail.com</h3>
    </div>
    <div class="inputDiv">
        <h3><strong>Adresa:</strong>Save Kovaceviva bb</h3>
    </div>
   
    
    </form>
        </div>
    </div>
</x-layout>