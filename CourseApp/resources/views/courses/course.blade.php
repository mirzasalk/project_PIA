@php
$tag = request('tag') ;
$num = 1;
@endphp
<link rel="stylesheet" href="/css/course.css">
<x-layout>

<x-card>
<div id="main">
<div class="coursInfoField">
<img class="image" src="{{asset('storage/' . $course->image)}}" alt="SlikaKursa" style="width: 20em">
<div class="rightField">
<h1>{{$course->title}}</h1>

<h3>{{$course->description}}</h3>
<h5><strong>Vreme trajanja kursa:</strong> {{$course->duration}}h</h5>
</div>
</div>
@auth
<div class="BtnsDiv">
    <a href="/coursLessonsShow/{{$course->id}}"><button class="LiteraturaBtn">Literatura</button></a>
    <a href="/courses/{{$course->id}}/?tag=kviz"><button class="kvizBtn">Kviz</button></a>
</div>
@else
   <div class="InfoDiv">
    <p>Da bi mogli da dobijete <strong>lekcije</strong> ovog kursa i da bi mogli da radite <strong>kviz</strong> kursa potrebno je da izvrsite prijavu </p>
     <a href="/login">Prijavi se</a>
</div>

@endauth

</div>
</x-card>

@if($tag)
   <div class="selectKvizLevelDiv">
       <div class="centerDiv">
        <div class="Xdiv"><a href="/courses/{{$course->id}}"><h3>X</h3></a></div>
        <form method="post" action="/showKviz/{{$course->id}}/?questionNumber=0&userCorrectAnswe=0">
            @csrf
            <div class="formDiv">
                <h3>Izaberite kategoriju kviza</h3>
          <select class="select" name="category" id="category">
              <option value="Lako">Lako</option>
              <option value="Srednje">Srednje</option>
              <option value="Tesko">Teško</option>
          </select>
        </div>
          <button class="selectCategoryBtn">Izaberi</button>
        </form>
       </div>
   </div>
@endif
</x-layout>

