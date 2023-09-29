
<x-layout>
    @foreach ($notifications as $item)
        <div>
            <p><strong>ime:</strong>{{$item->user_name}}</p>
            <p><strong>email:</strong>{{$item->user_name}}</p>
            <button>Odobri</button>
            <button>Odbij</button>
        </div>
    @endforeach
</x-layout>