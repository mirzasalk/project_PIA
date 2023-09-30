@php
$tag = request('tag') ;
$posto = ($userCorrectAnswe * 100)/$questionNumber
@endphp
<link rel="stylesheet" href="/css/quiz.css">

<x-layout> 
   
    @if (!empty($questions) && count($questions) > 0)
       @if ($showNextDiv==0)
       <div id="main">
        
 
        <div class="questionsCard">
     
          <div class="question">
            <h1>{{$questions[$questionNumber-1]->question}}</h1>
          </div>
          <form method="POST" class="formApprove" action="/checkAnswer/{{$course->id}}/?questionId={{$questions[$questionNumber-1]->id}}&qNum={{$questionNumber}}&userCorrectAnswe={{$userCorrectAnswe}}&showNextDiv=1">
              @method("PUT")
              @csrf
              <div class="answersDiv">
              <div class="answerDiv">
                 <input type="radio" name="answer" value="1" id="radio1">
                 <label for="radio1">{{$questions[$questionNumber-1]->answerOne}}</label>
              </div>
              <div class="answerDiv">
                  <input type="radio" name="answer" value="2" id="radio2">
                  <label for="radio2">{{$questions[$questionNumber-1]->answerTwo}}</label>
              </div>
              <div class="answerDiv">
                  <input type="radio" name="answer" value="3" id="radio3">
                  <label for="radio3">{{$questions[$questionNumber-1]->answerThree}}</label>
              </div>
              <div class="answerDiv">
                  <input type="radio" name="answer" value="4" id="radio4">
                  <label for="radio4">{{$questions[$questionNumber-1]->answerFour}}</label>
              </div>
              </div>
              @error('answer')
                 <p class="error">Odaberite odgovor</p>
              @enderror
              <button class="approveAnswerBtn">Potvrdi odgovor</button>
          </form>
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
          <form  class="formSledecePitanje" method="post" action="/showKviz/{{$course->id}}/?questionNumber={{$questionNumber}}&userCorrectAnswe={{$userCorrectAnswe}}">
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
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
