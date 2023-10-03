<link rel="stylesheet" href="/css/createCourse.css">

<x-layout>
    <div id="createMain">
<form method="POST" action="/courses" enctype="multipart/form-data">
    @csrf
    <h1>Ovde sam</h1>
    <h2>Kreiraj novi kurs</h2>
    <div class="inputDiv">
    
    <input type="text" name="title" placeholder="Naslov" value="{{old('title')}}">
    @error('title')
        <p class="error">Unesite naslov</p>
    @enderror
    </div>
   
    <div class="inputDiv">
    
    <input type="textarea" name="description" placeholder="Opis" value="{{old('description')}}">
    @error('description')
        <p class="error">Unesite opis</p>
    @enderror
    </div>

    <div class="inputDiv">
   
    <input type="text" name="tags" placeholder="tagovi (odvojeni zarezom)" value="{{old('tags')}}">
    @error('tags')
        <p class="error">Unesite tagove</p>
    @enderror
    </div>

  
    <div class="inputDiv">
   
    <input type="number" name="duration" placeholder="vreme trajanja" value="{{old('duration')}}">
    @error('duration')
        <p class="error">Unesite vreme trajanja </p>
    @enderror
    </div>
   
    <div class="inputDiv">
    
    <input type="file" name="image" placeholder="slika">
    @error('image')
        <p class="error">{{$message}}</p>
    @enderror
    </div>
    <button class="createBtn" type="submit">Napravi</button>

</form>
</div>
</x-layout>