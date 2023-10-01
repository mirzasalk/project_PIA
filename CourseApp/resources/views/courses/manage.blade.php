@php
$tag = request('tag') ; 
$info = request('info')
@endphp
<link rel="stylesheet" href="/css/managecourse.css">

<x-layout>

    <div class="userCourses">
        <div class="dodajBtn">
        <button><a href="/courses/create">Dodaj kurs</a></button>
        </div>
        @unless ($courses->isEmpty())
            
        <div class="listaMojihKurseva">
        @foreach ($courses as $item)
        <div class="kursKartica">
            <img class="image" src="{{asset('storage/' . $item->image)}}" alt="SlikaKursa" style="width:10em;height:10em">
            <h1 class="titleTag">{{$item->title}}</h1>
        <div class="btnDiv">
           <a href="/courses/{{$item->id}}/edit">
               <button  class="editBtn">Edit</button>
           </a>
           <a href="/courses/manage/?tag={{$item->id}} " >
               <button class="deleteBtn">Delete</button>
           </a>
        </div>
        <div class="infoIcon">
            <a href="/showInfo/{{$item->id}}"><img class="image" src="{{asset('storage/images/info.png')}}" alt="SlikaKursa" style="width:1.5em;height:1.5em">
            </a>
        </div>
</div>
        @endforeach
    </div>
        @else
        <div>Nema kurseva</div>
        @endunless

    </div>
    
    @if ($tag)
    <div id="confirmDeleteWindow">
      <div class="deleteWindowCenterDiv">
        <h5>Jeste li sigurni da želite da izbrisete kurs?</h5>
        <div class="deleteWindowCenterDivBtn">
        <form class="formZaPotvrdu" method="POST" action="/courses/{{$tag}}">
            @csrf
            @method('DELETE')
            <button type="submit" class="ConfirmBtn">
                Potvrdi
            </button>
        </form>
        <a href="/courses/manage" class="aforcancelBtn">
           <button id="cancelButton">Cancel</button>
        </a>
    </div>
      </div>
    </div>
@endif

    

    
</x-layout>
