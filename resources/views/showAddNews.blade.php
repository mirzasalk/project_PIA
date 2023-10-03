
<link rel="stylesheet" href={{ asset('css/addNews.css') }}>
<x-layout>
    <div class="main">
        <form method="post" action="/" class="center">
            @csrf
            <h1>Dodaj Vest</h1>
            <div class="inputs">
                <input type="text" name="title" placeholder="Dodaj naslov">
                <textarea name="description" id="des" cols="60" rows="10" style="margin-top: 1em" placeholder="Dodaj tekst vesti"></textarea>
            </div>
            <button class="addNewsBtn">Dodaj</button>
        </form>
    </div>
</x-layout>