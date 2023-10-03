<link rel="stylesheet" href={{ asset('css/home.css') }}>
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0">

<x-layout>
     <div id='main'>
      
       <div class="imgDiv">
          <img src="{{asset('storage/images/homeing.png')}}" alt="" style="width: 100%;">
          <h1 class="naslov">Dobro došli</h1> 
        </div>
      <div class="onama">
        <h2>Ko smo mi?</h2>
        <h3>Dobili ste pozivnicu za putovanje koje će probuditi 
          sva vaša čula i odvesti vas na nezaboravan kulinarski 
          izlet. Mi smo strastveni ljubitelji hrane, 
          kuvari koji su posvećeni umetnosti pripreme 
          ukusnih jela i deljenju tih iskustava s vama.<br/><br/>
       
          <strong>Naša priča</strong> počinje sa ljubavlju prema hrani 
          i željom da tu ljubav podelimo sa svetom. 
          Ovaj sajt je rezultat godina istraživanja, 
          eksperimentisanja i učenja. Mi nismo samo kuvari, 
          već i istraživači, eksperimentatori i umetnici koji 
          stalno traže nove načine kako da obogatimo vaše
           kulinarsko iskustvo.
        </h3>
        <br/><br/>
        <div class="ocekivanjaNaslov">
          <h3 style="text-align: center;font-size:smalls">
            <strong>Šta možete očekivati od nas?</strong><br>
            Naš sajt je vaša destinacija za sve što se tiče kulinarstva. 
          </h3>
        </div>
        <div class="ocekivanja">
          
          <h3 style="text-align: center;font-size:smalls"><strong>Recepti za svačiji ukus:</strong><br><br> Bilo da ste početnik ili iskusni kuvar, naći ćete recepte koji će vas inspirisati i naučiti vas kako da pripremite ukusne obroke.</h3>
          <h3 style="text-align: center;font-size:smalls"><strong>Saveti i trikovi: </strong><br><br> <br>Delićemo sa vama naše tajne, savete i trikove koji će vam pomoći da postanete bolji kuvar.
          </h3>
          <h3 style="text-align: center;font-size:smalls">          <strong>Kulinarske vesti i trendovi: </strong><br><br> Ostanite u toku sa najnovijim dešavanjima u svetu kulinarstva i budite prvi koji će isprobati najnovije trendove.
          </h3>
          <h3 style="text-align: center;font-size:smalls">          <strong>Zajednica ljubitelja hrane: </strong><br> <br>Naša zajednica je mesto gde se svi ljubitelji hrane okupljaju, razmenjuju iskustva i inspirišu jedni druge.
          </h3>
        </div>
      </div> 
      
      <div class="srednjiDiv">
        <h2 style="font-weight: bold;border-bottom: 3px solid rgb(255, 255, 255); color:white;">Novi kursevi</h2>
        <div class="noviKursevi">
          @if ($courses)
        
             @foreach ($courses as $item)
             @php
                 $sedamDanaProslo = $item->created_at->diffInDays(now()) >= 7;
             @endphp

            @if (!$sedamDanaProslo)
           <div class="karticaKursa">
              <div class="imgDivKurs">
              <img class="image" src="{{asset('storage/' . $item->image)}}" alt="SlikaKursa" style="width: 10em">
            </div> 
             <div class="info">
                <h2>{{$item->title}}</h3>
                <h3>{{$item->description}}</h2>
                <div class="datum" >
                    <p><strong> vreme trajanja:</strong>{{$item->duration}}h</p>
                </div>
                <div class="datum" >
                    <p><strong> kreiran:</strong>{{$item->created_at->format('Y-m-d')}}</p>
                </div>
              </div>
            </div> {{-- Ovde stavite kod koji želite prikazati ako je prošlo sedam dana --}}
            @endif
            
             @endforeach
             
          @else
          <h3 class="nemaKurseva" >Nema novih kurseva</h3>
          @endif

        </div>
        </div>
        @auth
        @if(auth()->user()->role==="Admin")
         <div class="btnOglasDiv">
          <a href="/addNews" style="text-decoration: none;width: 100%">
          <button class="dodajOglasBtn">Dodaj vest</button>
        </a>
        </div>
        @endif
        @endauth
       
        <h2 style="font-weight: bold;border-bottom: 3px solid black;">Vesti</h2>
        <div class="noviKursevi" style="box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;">
          @if ($newses)
        
             @foreach ($newses as $item)
             @php
                 $sedamDanaProslo = $item->created_at->diffInDays(now()) >= 7;
             @endphp

            @if (!$sedamDanaProslo)
           <div class="karticaKursa">
              
             <div class="info">
                <h2>{{$item->title}}</h3>
                <h3>{{$item->description}}</h2>
                
                <div class="datum" >
                    <p><strong> kreiran:</strong>{{$item->created_at->format('Y-m-d')}}</p>
                </div>
              </div>
            </div> {{-- Ovde stavite kod koji želite prikazati ako je prošlo sedam dana --}}
            @endif
            
             @endforeach
             
          @else
          <h3 class="nemaKurseva" >Nema novih vesti</h3>
          @endif
        

        </div>
       
       
      
         
    </div>        
</x-layout> 