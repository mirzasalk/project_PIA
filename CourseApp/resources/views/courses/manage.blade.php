<x-layout>

    <div class="userCourses">
        @unless ($courses->isEmpty())
            
        
        @foreach ($courses as $item)
        <div class="kursKartica">
            <h1>{{$item->title}}</h1>
        <a href="/courses/{{$item->id}}/edit">
            <button type="submit">Edit</button>
        </a>
        
        <button id="deleteButton">Delete</button>
    
        <div id="confirmDeleteWindow">
            <form method="POST" action="/courses/{{$item->id}}">
                @csrf
                @method('DELETE')
                <button type="submit">
                    Confirm
                </button>
            </form>
            <button id="cancelButton">Cancel</button>
    </div>
</div>
        @endforeach
        @else
        <div>Nema kurseva</div>
        @endunless

    </div>

</x-layout>
<script>
   
    var myVariable = false;
    var myVariable2 = true
   
    function updateDivVisibility() {
        var myDiv = document.getElementById("confirmDeleteWindow");
        if (myVariable) {
            myDiv.style.display = "flex";
        } else {
            myDiv.style.display = "none"; 
        }
    }
    updateDivVisibility();

    var changeValueButton = document.getElementById("deleteButton");
    changeValueButton.addEventListener("click", function() {
        
        myVariable = true;
        
        updateDivVisibility();
    });
    var changeValueButtonSecond =  document.getElementById("cancelButton");
    changeValueButtonSecond.addEventListener("click", function() {
        
        myVariable = false;
        updateDivVisibility();
    });
</script>