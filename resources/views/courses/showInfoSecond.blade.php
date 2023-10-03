{{-- @php

$questions = usort($questions, function($a, $b) {
    return $a->cena - $b->cena;
});
@endphp --}}
<link rel="stylesheet" href="/css/showInfo.css">
<x-layout>
    <div id="mainShow">
         <h1 class="naslov">Sva pitanja kursa: "<strong>{{$course->title}}</strong>"</h1>
         <div class="dodajBtn">
            <button><a href="/addQuestionsSecond/{{$course->id}}/">Dodaj pitanje</a></button>
            </div>
         <h1 class="naslovCategori">Katekorija: <strong>Laka</strong></h1>
         <div class="listaPitanjaDiv">
            @foreach ($questions as $item)
            @if ($item->numberOfAnswer>0)
              @php
                  $procenat =number_format($item->numberOfCorrectAnswer * 100/$item->numberOfAnswer,2) 
              @endphp
                @else
                @php
                    $procenat="nije radjeno"
                @endphp
            @endif
            
            @if ($item->category=="Lako")
            <div class="questionDiv">
                <div class="qId">
                    <h4 class="imeKolone">id</h4>
                    <h3>{{$item->id}}</h3>
                </div>
                <div class="qPitanje">
                    <h4 class="imeKolone">pitanje</h4>
                    <h5>{{$item->question}}</h5>
                </div>
                <div class="qKategorija">
                    <h4 class="imeKolone">kategorija</h4>
                    <h3>{{$item->category}}</h3>
                </div>
                <div class="qUspešnost">
                    <h4 class="imeKolone">Uspešnost</h4>
                    <h3>{{$procenat}}%</h3>
                </div>
                <div class="qBtns">
                    <a href="/showEdit/{{$item->id}}"><button class="qChangeBtn">izmeni</button></a>
                    <form method="post" action="/questionsDelete/{{$item->id}}/?courseId={{$course->id}}">
                        @csrf
                        @method("DELETE")
                        <button class="qDeleteBtn">izbrisi</button>
                    </form>
                </div>
                
                
               
                
            </div>
            @endif
            
            @endforeach
         </div>
         <h1 class="naslovCategori">Katekorija: <strong>Srednja</strong></h1>
         <div class="listaPitanjaDiv">
            @foreach ($questions as $item)
            @if ($item->numberOfAnswer>0)
            @php
                $procenat =number_format($item->numberOfCorrectAnswer * 100/$item->numberOfAnswer,2) 
            @endphp
              @else
              @php
                  $procenat="nije radjeno"
              @endphp
          @endif
             @if ($item->category=="Srednje")
             <div class="questionDiv">
                <div class="qId">
                    <h4 class="imeKolone">id</h4>
                    <h3>{{$item->id}}</h3>
                </div>
                <div class="qPitanje">
                    <h4 class="imeKolone">pitanje</h4>
                    <h5>{{$item->question}}</h5>
                </div>
                <div class="qKategorija">
                    <h4 class="imeKolone">kategorija</h4>
                    <h3>{{$item->category}}</h3>
                </div>
                <div class="qUspešnost">
                    <h4 class="imeKolone">Uspešnost</h4>
                    <h3>{{$procenat}}%</h3>
                </div>
                <div class="qBtns">
                    <a href="/showEdit/{{$item->id}}"><button class="qChangeBtn">izmeni</button></a>
                    <form method="post" action="/questionsDelete/{{$item->id}}/?courseId={{$course->id}}">
                        @csrf
                        @method("DELETE")
                        <button class="qDeleteBtn">izbrisi</button>
                    </form>
                </div>
            </div>
             @endif
             @endforeach
         </div>


         <h1 class="naslovCategori">Katekorija: <strong>Teška</strong></h1>
         <div class="listaPitanjaDiv">
            @foreach ($questions as $item)
            @if ($item->numberOfAnswer>0)
            @php
                $procenat =number_format($item->numberOfCorrectAnswer * 100/$item->numberOfAnswer,2) 
            @endphp
              @else
              @php
                  $procenat="nije radjeno"
              @endphp
          @endif
            @if ($item->category=="Tesko")
            <div class="questionDiv">
                <div class="qId">
                    <h4 class="imeKolone">id</h4>
                    <h3>{{$item->id}}</h3>
                </div>
                <div class="qPitanje">
                    <h4 class="imeKolone">pitanje</h4>
                    <h5>{{$item->question}}</h5>
                </div>
                <div class="qKategorija">
                    <h4 class="imeKolone">kategorija</h4>
                    <h3>{{$item->category}}</h3>
                </div>
                <div class="qUspešnost">
                    <h4 class="imeKolone">Uspešnost</h4>
                    <h3>{{$procenat}}%</h3>
                </div>
                
                <div class="qBtns">
                    <a href="/showEdit/{{$item->id}}"><button class="qChangeBtn">izmeni</button></a>
                    <form method="post" action="/questionsDelete/{{$item->id}}/?courseId={{$course->id}}">
                        @csrf
                        @method("DELETE")
                        <button class="qDeleteBtn">izbrisi</button>
                    </form>
                </div>
                
                
               
                
            </div>
            @endif
                
            @endforeach
         </div>
         <div class="helperDivKoriscnici">
            <h1>Lista prijavljenih korisnika</h1>
         </div>
         
         <div class="listaKorisnikaKursa">
           
            @if (!$registration->isEmpty())
            @foreach ($registration as $item)
                
            <div class="korisnikCard">
                <div class="qPitanje">
                    <h4 class="imeKolone">name</h4>
                    <h3>{{$item->user_name}}</h3>
                </div>
                
                <div class="qPitanje">
                    <h4 class="imeKolone">email:</h4>
                    <h3>{{$item->user_email}}</h3>
                </div>
              
                <form method="post" class="korisnikForm" action="/izbrisiReg/{{$course->id}}/?regId={{$item->id}}">
                    @csrf
                    @method('DELETE')
                    <button class="KDeleteBtn">izbrisi</button>
                </form>
                
            </div>
            @endforeach
            @else
                <h1>Nema prijavljenih korisnika na ovom kursu</h1>
            @endif
            
         </div>
    </div>
</x-layout>