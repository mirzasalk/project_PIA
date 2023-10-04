<link rel="stylesheet" href="/css/lessons.css">
<x-layout>
    @php
$tag = request('tag');
$tag2 = request('tag2'); 
@endphp
<div id="main">
    @unless (count($lessons)>0)
    <div class="NoLessonsDiv">
        <h1>Kurs nema lekcija</h1>
        <a  href="/addLesson/{{$course->id}}"><button class="dodajBtn">Dodaj lekcije</button></a>
      </div>
    @else
    <a  href="/addLesson/{{$course->id}}"><button class="dodajBtn">Dodaj lekcije</button></a>
    <div id="listaLekcija">
    @foreach($lessons as $item)
    <div class="lessonsCard">
          <img src="{{asset('storage/' . $item->image)}}" alt="" style="width: 10em;height:10em;">

          <h3 class="title">{{$item->title}}</h3>
          <div class="contentDiv">
          <p >{{$item->content}}</p>
        </div>
         
          <div class="buttonsDiv">
          
           <a href="/showHandleLessons/{{$item->id}}"><button class="changeCardBtn">Promeni</button></a>
        

          <a href="/getLessons/{{$item->course_id}}/?tag={{$item->id}}&tag2={{$item->course_id}}"><button class="deleteCardBtn" >Izbrisi</button></a>
          
        </div>
    </div>    
          @endforeach
        </div> 
          @endunless
        </div>
        @if ($tag)
        <div id="mainDelete">
          <div class="deleteCenter">
            <h3><strong>Jeste li sigurni da želite da izbrisete lekciju?</strong></h3>
            <div class="deleteBtnDiv">
             
                <form method="post" action="/lessonDelete/{{$tag}}">
                    @csrf
                    @method("DELETE")
                    <button class="deleteBtn">Izbrisi</button>
                    
                  </form>
            <a href="/getLessons/{{$tag2}}" class="aforcancelBtn">
               <button id="cancelButton">Cancel</button>
            </a>
        </div>
          </div>
        </div>
    @endif
</x-layout>