@php
$tag = request('tag') ;
$posto = ($userCorrectAnswe * 100)/$questionNumber;
$niz = [0,0,0,0]

@endphp

<link rel="stylesheet" href="/css/quiz.css">

<x-layout> 
  <input type="hidden" name="val1" value="{{$questions[$questionNumber-1]->correctAnswer}}" id="hiddenValue">
 
   
    @if (!empty($questions) && count($questions) > 0)
       @if ($showNextDiv==0)
       <div id="main">
        
 
        <div class="questionsCard">
     
          <div class="question">
            <h1>{{$questions[$questionNumber-1]->question}}</h1>
          </div>
          <div class="pomoc" ><button name="50/50" id="dugme50/50">50/50</button></div>
          <form method="get" class="formApprove" action="/checkAnswer/{{$course->id}}/?questionId={{$questions[$questionNumber-1]->id}}&qNum={{$questionNumber}}&userCorrectAnswe={{$userCorrectAnswe}}&showNextDiv=1">
              
              @csrf
              <div class="answersDiv">
              <div class="answerDiv" id="odgovor1">
                 <input type="radio" name="answer" value="1" id="radio1">
                 <label for="radio1">{{$questions[$questionNumber-1]->answerOne}}</label>
              </div>
              <div class="answerDiv" id="odgovor2">
                  <input type="radio" name="answer" value="2" id="radio2">
                  <label for="radio2">{{$questions[$questionNumber-1]->answerTwo}}</label>
              </div>
              <div class="answerDiv" id="odgovor3">
                  <input type="radio" name="answer" value="3" id="radio3">
                  <label for="radio3">{{$questions[$questionNumber-1]->answerThree}}</label>
              </div>
              <div class="answerDiv" id="odgovor4">
                  <input type="radio" name="answer" value="4" id="radio4">
                  <label for="radio4">{{$questions[$questionNumber-1]->answerFour}}</label>
              </div>
              </div>
               <p id="porukaElement" class="error"></p>
              
              <button class="approveAnswerBtn" style="display: none" id="btnUFormi">Potvrdi odgovor</button>
            </form>
              <button class="approveAnswerBtn" id="btnVanFormi">Potvrdi odgovor</button>
         </div>
     
     </div>

       @else
       
       <div id="main">
       
        @if (count($questions)==$questionNumber)
        
        <div class="resultsDiv"><div></div><h2>Imali ste <strong>{{$userCorrectAnswe}}</strong> tačna odgovora, sto znaci da ste imali <strong>{{$posto}}% </strong>tacnih odgovora<h2> <a href="/courses" ><button class="approveAnswerBtn">Izadji</button></a> </div>
       
    
        @endif 
        <div class="questionsCard">
     
          <div class="question">
            <h1>{{$questions[$questionNumber-1]->question}}</h1>
          </div>
         
          <form  class="formSledecePitanje" method="get" action="/showKviz/{{$course->id}}/?questionNumber={{$questionNumber}}&userCorrectAnswe={{$userCorrectAnswe}}">
              @csrf
              <input type="hidden" name="category" value="{{$questions[$questionNumber-1]->category}}">
              <div class="answersDiv">
                @if ($questions[$questionNumber-1]->correctAnswer ===1)
                <div class="correctAnswerDiv">
                @else
                <div class="answerDiv">
                @endif
             
                 {{$questions[$questionNumber-1]->answerOne}}
              </div>
           
              @if ($questions[$questionNumber-1]->correctAnswer===2)
                <div class="correctAnswerDiv">
                @else
                <div class="answerDiv">
                @endif
                  {{$questions[$questionNumber-1]->answerTwo}}
              </div>
              @if ($questions[$questionNumber-1]->correctAnswer===3)
                <div class="correctAnswerDiv">
                @else
                <div class="answerDiv">
                @endif
                  {{$questions[$questionNumber-1]->answerThree}}
              </div>
              @if ($questions[$questionNumber-1]->correctAnswer===4)
                <div class="correctAnswerDiv">
                @else
                <div class="answerDiv">
                @endif
                  {{$questions[$questionNumber-1]->answerFour}}
              </div>
              </div>
              @unless (count($questions)==$questionNumber)
                <button class="approveAnswerBtn">Sledece pitanje</button>  
              @endunless 
              
          </form>
          
         </div>
     
     </div>
       @endif
       @else
       
    <h1>Kviz još uvek nije formiran</h1>
@endif
    

</x-layout>
<script>
  document.getElementById("dugme50/50").addEventListener("click", function() {
      var hiddenInputElement = document.getElementById("hiddenValue");
      var vrednost = hiddenInputElement.value;
  
      var random1 = Math.floor(Math.random() * 4) + 1;
      var random2 = Math.floor(Math.random() * 4) + 1;
  
      while (random1 === random2) {
          random2 = Math.floor(Math.random() * 4) + 1;
      }
  
    
      document.getElementById("odgovor" + random1).style.display = "none";
      document.getElementById("odgovor" + random2).style.display = "none";
      document.getElementById("dugme50/50").style.display = "none";
  });
  document.addEventListener("DOMContentLoaded", function() {
    var radioButtons = document.querySelectorAll('input[type="radio"]');
    var btnUFormi = document.getElementById("btnUFormi");
    var btnVanFormi = document.getElementById("btnVanFormi");
    var porukaElement = document.getElementById("porukaElement");

    // Funkcija za proveru da li je odabrano neko radio dugme
    function isRadioButtonChecked() {
        for (var i = 0; i < radioButtons.length; i++) {
            if (radioButtons[i].checked) {
                return true;
            }
        }
        return false;
    }

    // Osluškivanje promena u radio dugmetima
    for (var i = 0; i < radioButtons.length; i++) {
        radioButtons[i].addEventListener("change", function() {
            // Ako je odabrano neko radio dugme, prikaži dugme sa id btnUFormi
            if (isRadioButtonChecked()) {
                btnUFormi.style.display = "block";
                btnVanFormi.style.display = "none";
                porukaElement.textContent = ""; // Obriši poruku
            } else {
                // Inače, prikaži dugme sa id btnVanFormi
                btnUFormi.style.display = "none";
                btnVanFormi.style.display = "block";
            }
        });
    }

    // Osluškivanje klika na dugme sa id btnVanFormi
    btnVanFormi.addEventListener("click", function() {
        porukaElement.textContent = "Izaberite odgovor"; // Dodaj poruku
    });
});
  </script>
  
    
    
    
    
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
