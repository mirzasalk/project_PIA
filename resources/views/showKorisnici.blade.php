<link rel="stylesheet" href={{ asset('css/showKorisnici.css') }}>
<x-layout>
    <div class="main">
        @include('partials._searchsecond')
        <div class="listaKorisnika">
            @foreach ($users as $item)
                <div class="userCard">
                    <div class="imeDiv">
                        <p>ime:</p>
                        <h3>{{$item->name}}</h3>
                    </div> 
                    <div class="ulogaDiv">
                        <p>uloga:</p>
                        <h3>{{$item->role}}</h3>
                    </div> 
                    <div class="emailDiv">
                       <p>email:</p> 
                        <h3>{{$item->email}}</h3>
                    </div> 
                    <form method="post" action="/userDelete/{{$item->id}}" class="formDiv">
                        @csrf
                        @method("DELETE")
                        <button>Izbrisi</button>
                    </form>
                </div>
                
            @endforeach
        </div>
    </div>
</x-layout>