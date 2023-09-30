<x-layout>
    @php
$tag = request('tag');
$tag2 = request('tag2'); 

@endphp

    @unless (count($lessons)>0)
        <h1>Kurs nema lekcija</h1>
        <a href="/addLesson/{{$course->id}}"><button>Dodaj lekcije</button></a>
       
    @else
    <a href="/addLesson/{{$course->id}}"><button>Dodaj lekcije</button></a>
    <div id="listaLekcija">
    @foreach($lessons as $item)
    <div class="lessonsCard">
          <img src="{{asset('storage/' . $item->image)}}" alt="" style="width: 10em;height:10em;">
          <div class="lessonsCardRightField">
          <h3>{{$item->title}}</h3>
          <p>{{$item->content}}</p>
          </div>
          <div class="buttonsDiv">
          
           <a href="/showHandleLessons/{{$item->id}}"><button>Promeni</button></a>
        

          <a href="/getLessons/{{$item->course_id}}/?tag={{$item->id}}&tag2={{$item->course_id}}"><button>Izbrisi</button></a>
          
        </div>
    </div>    
          @endforeach
          @endunless
        </div> 
   
        @if ($tag)
        <div id="mainDelete">
          <div class="deleteCenter">
            <h5>Jeste li sigurni da želite da izbrisete lekciju?</h5>
            <div class="deleteBtnDiv">
                <form method="post" action="/lessons/{{$tag}}">
                    @csrf
                    @method("DELETE")
                    <button>Izbrisi</button>
                    
                  </form>
            <a href="/getLessons/{{$tag2}}" class="aforcancelBtn">
               <button id="cancelButton">Cancel</button>
            </a>
        </div>
          </div>
        </div>
    @endif
</x-layout>