 @php
    session(['notification' => $notifications]); 
  
 @endphp
<x-layout >
<link rel="stylesheet" href="/css/courses.css">



@include('partials._search')

@unless (count($courses) == 0)

@foreach($courses as $course)
<x-course-card :course="$course"/>
@endforeach

@else
<p>No courses found</p>

@endunless

<div class="paginationLinks">
    {{$courses->links()}}
</div>

</x-layout>

