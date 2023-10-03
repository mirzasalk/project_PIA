<link rel="stylesheet" href="/css/questionCreate.css">
<x-layout>
    <div class="questionCreateMain">
      
    <form action="/createNewQuestionsSecond/{{$course->id}}">
        @csrf
        <h2>Kreirajte novo pitanje</h2>
        <div class="inputDiv">
           <input type="text" name="question" placeholder="Unesite pitanje" value="">
           @error('question')
               <p class="error">Unesite pitanje </p>
           @enderror
        </div>
        <div class="firstTwoQuestionsField">
            <div class="questionsInputDiv">
               <input type="text" name="answerOne" placeholder="Unesite prvi odgovor">
               @error('answerOne')
                   <p class="error">Unesite odgovor 1</p>
               @enderror
            </div>
            <div class="questionsInputDiv">
               <input type="text" name="answerTwo" placeholder="Unesite drugi odgovor">
               @error('answerTwo')
                  <p class="error">Unesite odgovor 2</p>
               @enderror
            </div>
        </div>
        <div class="lastTwoQuestionsField">
            <div class="questionsInputDiv">
               <input type="text" name="answerThree" class="answerThree" placeholder="Unesite treci odgovor">
               @error('answerThree')
                  <p class="error">Unesite odgovor 3</p>
               @enderror
            </div>
            <div class="questionsInputDiv">
               <input type="text" name="answerFour" placeholder="Unesite cetvrti odgovor">
               @error('answerFour')
                  <p class="error">Unesite odgovor 4</p>
               @enderror
            </div>
        </div>
        <div class="inputDiv">
           <input type="number" name="correctAnswer" placeholder="Unesite broj tacnog odgovora">
           @error('correctAnswer')
               <p class="error">Unesite broj tacnog odgovora</p>
           @enderror
        </div>
        <div class="checkLevelDiv">
            <label for="category"></label>
            <select name="category" id="category">
                <option value="Lako">Lako</option>
                <option value="Srednje">Srednje</option>
                <option value="Tesko">Teško</option>
            </select>
            @error('category')
            <p class="error">Unesite kategoriju</p>
        @enderror
        </div>
        <button class="submitBtn" type="submit">Pošalji</button>
    </form>
</div>
</x-layout>