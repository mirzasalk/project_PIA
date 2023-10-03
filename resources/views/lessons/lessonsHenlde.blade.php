<link rel="stylesheet" href="/css/addLesson.css">
<x-layout>
    
    <div class="lekcijaKursa">
        <div>
        <a href="/courses"><button class="endBtn">Zavrseno dodavanje</button></a>
    </div>
        <form method="POST"  action="/createLesson/{{$course->id}}" enctype="multipart/form-data">
            @csrf
            <h3>Kreirajte novu lekciju</h3>
                <div class="inputDivAdd">
                <input name="title" type="text" placeholder="Unesi naslov lekcije">
                @error('title')
                    {{-- @if ($message =="The password confirmation field must match password.") --}}
                       <p class="error">{{$message}}</p>
                    {{-- @endif --}}
                @enderror
            </div>
            <div class="textareaDivAdd">
                <textarea name="content"  id="" cols="40" rows="5" placeholder="Unesi sadrzaj lekcije"></textarea>
                @error('content')
                {{-- @if ($message =="The password confirmation field must match password.") --}}
                   <p class="error">{{$message}}</p>
                {{-- @endif --}}
                @enderror
            </div>
            <div class="inputDivAdd">
                <input type="file" name="image">
                @error('image')
                {{-- @if ($message =="The password confirmation field must match password.") --}}
                   <p class="error">{{$message}}</p>
                {{-- @endif --}}
                @enderror
            </div>
            <button class="saveBtn" >Sacuvaj lekciju</button>
        </form>
        
       
    </div>
</x-layout>
