<link rel="stylesheet" href="/css/edit.css">

<x-layout>
  <div id="editMain">
    <form method="POST" action="/editLessons/{{$lesson->id}}" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <h2>Edit: {{$lesson->title}} </h2>
        <div class="inputDiv">
            <label for="title"><strong>Naslov:</strong></label>
            <div class="divHelperForErrorMassage">
               <input type="text" name="title" placeholder="title" value="{{$lesson->title}}">
               @error('title')
                   <p class="error">{{$message}}</p>
                @enderror
            </div>
        </div>
        
        <div class="inputImgDiv">
            <label for="image"><strong>Slika:</strong></label>
            <div class="imgAndInputDiv">
                <input type="file" name="image" placeholder="image">
                <img class="image"
                 src="{{asset('storage/'. $lesson->image)}}" style="width:10em;height:10em;">


                @error('image')
                    <p class="error">{{$message}}</p>
                @enderror
            </div>
        </div>
        <div class="inputDiv">
            <label for="content"><strong>Sadrzaj:</strong></label>
            <div class="divHelperForErrorMassage">
                <textarea name="content" id="" cols="45" rows="3"  placeholder="Sadrzaj" >{{$lesson->content}}</textarea>
            
            @error('content')
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