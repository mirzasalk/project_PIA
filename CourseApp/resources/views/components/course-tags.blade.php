@props(['tagsProp'])
<link rel="stylesheet" href="/css/course-tags.css">
@php
    $tags = explode(',', $tagsProp);     
@endphp

<div class="divForTags">
    @foreach ($tags as $tag)
       
            <a  href="/courses/?tag={{$tag}}"><div class="aTag">{{$tag}}</div></a>
        
    @endforeach
</div>