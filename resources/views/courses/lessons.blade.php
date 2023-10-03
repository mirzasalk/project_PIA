@php
 $count = 0;  
@endphp
<link rel="stylesheet" href="/css/coursLessons.css">
<x-layout>
    <div id="main">
        <div class="headerLekcije">
        <a href=""><button>Kviz</button></a>
        <div>
            <h1>Lekcije "<strong>{{$course->title}}</strong>" kursa</h1>
        </div>
        </div>
        <div class="listaLekcija">
        @foreach ($lessons as $item)

        @php
            $count= $count + 1;
        @endphp

        <div id="LekcijaCardDiv">
            <div class="naslovKartice">
                <h4>Lekcija {{$count+1}}</h4>
                <div><h1>{{$item->title}}</h1></div>
            </div>
            <div class="imgContentDiv">
                <img src="{{asset('storage/' . $item->image)}}" alt="slika" style="width: 20em;height:20em">
                <div class="contentDiv">
                     <p>{{$item->content}}</p>
                </div>
            </div>
        </div>
        @endforeach
        </div>
        
       
        
    </div>


</x-layout>