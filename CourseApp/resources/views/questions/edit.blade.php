<link rel="stylesheet" href="/css/editQuestion.css">
<x-layout>
    <div id="editQMain">
        
        <form method="post" action="/updateQuestions/{{$course->id}}/?qId={{$question->id}}">
            @csrf
            @method("PUT")
            <h2>Izmenite pitanje koje ima id: {{$question->id}}<strong></strong></h2>
            <div class="inputDiv">
               <input type="text" name="question" placeholder="Unesite pitanje" value="{{$question->question}}">
            </div>
            <div class="firstTwoQuestionsField">
                <div class="questionsInputDiv">
                   <input type="text" name="answerOne" placeholder="Unesite prvi odgovor" value="{{$question->answerOne}}">
                   
                </div>
                <div class="questionsInputDiv">
                   <input type="text" name="answerTwo" placeholder="Unesite drugi odgovor" value="{{$question->answerTwo}}">
                   
                </div>
            </div>
            <div class="lastTwoQuestionsField">
                <div class="questionsInputDiv">
                   <input type="text" name="answerThree" class="answerThree" placeholder="Unesite treci odgovor" value="{{$question->answerThree}}">
                   
                </div>
                <div class="questionsInputDiv">
                   <input type="text" name="answerFour" placeholder="Unesite cetvrti odgovor" value="{{$question->answerFour}}">
                   
                </div>
            </div>
            <div class="inputDiv">
               <input type="number" name="correctAnswer" placeholder="Unesite broj tacnog odgovora" value="{{$question->correctAnswer}}">
               
            </div>
            <div class="checkLevelDiv">
                <label for="category"></label>
                <select name="category" id="category" value="{{$question->category}}">
                    <option value="Lako">Lako</option>
                    <option value="Srednje">Srednje</option>
                    <option value="Tesko">Teško</option>
                </select>
                
            </div>
            <button class="submitBtn" type="submit">Pošalji</button>
        </form>
    </div>
</x-layou>