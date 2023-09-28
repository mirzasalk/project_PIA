@php
$tag = request('tag')  
@endphp
<x-layout>

    <div class="userCourses">
        
        <button><a href="/courses/create">Dodaj kurs</a></button>
    
        @unless ($courses->isEmpty())
            
        
        @foreach ($courses as $item)
        <div class="kursKartica">
            <h1>{{$item->title}}</h1>
        <a href="/courses/{{$item->id}}/edit">
            <button type="submit">Edit</button>
        </a>
        <a href="/courses/manage/?tag={{$item->id}}">
        <button >Delete</button>
        </a>
    
        
</div>
        @endforeach
        @else
        <div>Nema kurseva</div>
        @endunless

    </div>
    
    @if ($tag)
    <div id="confirmDeleteWindow">
        <form method="POST" action="/courses/{{$tag}}">
            @csrf
            @method('DELETE')
            <button type="submit">
                Confirm
            </button>
        </form>
        <a href="/courses/manage">
        <button id="cancelButton">Cancel</button>
    </a>
    </div>
@endif

</x-layout>
