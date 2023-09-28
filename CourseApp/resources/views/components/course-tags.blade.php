@props(['tagsProp'])

@php
 $tags = explode(',', $tagsProp);     
@endphp

<ul>
    @foreach ($tags as $tag)
        <li>
            <a href="/courses/?tag={{$tag}}">{{$tag}}</a>
        </li>
    @endforeach
</ul>