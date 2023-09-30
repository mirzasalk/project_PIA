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
<div class="BtnsDiv">
    <a href=""><button class="LiteraturaBtn">Literatura</button></a>
    <a href=""><button class="kvizBtn">Kviz</button></a>
</div>
</div>
</x-card>



</x-layout>

