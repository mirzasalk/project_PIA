@props(['course'])
<link rel="stylesheet" href="/css/course-card.css">
<x-card>
  <div class="cardMain">
    <img class="image" src="{{$course->image ? asset('storage/' . $course->image) : asset('/storage/images/no-image.jpg')}}" alt="" style="width: 10em;height:10em;">
    <div class="rightFieldDiv">
        <h2>
            <a class="kursTitle" href="/courses/{{$course->id}}">{{$course->title}}</a>
        </h2>
        <div class="descriptionDiv">
           <p>
              {{$course->description}}
           </p>
        </div>
       
        <x-course-tags :tagsProp="$course->tags" />
    </div> 
  </div>
</x-card>