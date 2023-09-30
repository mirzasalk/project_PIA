<link rel="stylesheet" href="/css/edit.css">

<x-layout>
  <div id="editMain">
    <div class="izmeniLekcijeDugme">
    <form method="get" action="/getLessons/{{$course->id}}">
        <button type="submit" class="updateBtn">Izmeni lekcije</button>
    </form>
</div>
    
    <form method="POST" action="/courses/{{$course->id}}" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <h2>Edit: {{$course->title}} </h2>
        <div class="inputDiv">
            <label for="title"><strong>Naslov:</strong></label>
            <div class="divHelperForErrorMassage">
               <input type="text" name="title" placeholder="title" value="{{$course->title}}">
               @error('title')
                   <p class="error">{{$message}}</p>
                @enderror
            </div>
        </div>
        
            <div class="inputDiv">
            <label for="description"><strong>Opis:</strong></label>
            <div class="divHelperForErrorMassage">
            <input type="textarea" name="description" placeholder="description" value="{{$course->description}}">
            @error('description')
                <p class="error">{{$message}}</p>
            @enderror
            </div>
        </div>

        <div class="inputDiv">
            <label for="tags"><strong>Tagovi:</strong>(Odvojeni zarezima)</label>
            <div class="divHelperForErrorMassage">
            <input type="text" name="tags" placeholder="tags" value="{{$course->tags}}">
            @error('tags')
                <p class="error">{{$message}}</p>
            @enderror
            </div>
        </div>

        <div class="inputDiv">
            <label for="duration"><strong>Vreme trajanja:</strong></label>
            <div class="divHelperForErrorMassage">
            <input type="number" name="duration" placeholder="duration" value="{{$course->duration}}">
            @error('duration')
                <p class="error">{{$message}}</p>
            @enderror
            </div>
        </div>

        <div class="inputImgDiv">
            <label for="image"><strong>Slika:</strong></label>
            <div class="imgAndInputDiv">
                <input type="file" name="image" placeholder="image">
                <img class="image"
                 src="{{$course->image ? asset('storage/' . $course->image) : asset('/storage/images/no-image.jpg')}} " style="width:10em;height:10em;">


                @error('image')
                    <p class="error">{{$message}}</p>
                @enderror
            </div>
        </div>
        <div class="uptadeBtnDiv">
            <button type="submit" class="updateBtn">Izmeni</button>
            
        </div>
    </form>

  </div>
</x-layout>