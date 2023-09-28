<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <script src="//unpkg.com/alpinejs" defer></script>
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Dancing+Script&display=swap" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href={{ asset('css/layout.css') }}>
    {{-- <link rel="icon" href={{ asset('img/logo.png') }} type="image/x-icon"> --}}
    <title>Courses</title>
</head>
<body>
    <div id="layoutMain">
    <header>
        <div class="logo">
            <img src={{ asset('img/logo4.png') }} alt="Cubickly" class="logo">
        </div>
        <nav>
            <ul>
                <li><a href="/">Home</a></li>
                <li><a href="/apply">Apliciraj za predavača</a></li>
                <li><a href="/courses">Courses</a></li>
                <li><a href="/contact">Contact</a></li>
            </ul>
        </nav>
        <div class="reglog">
            @auth
                
            <span>Welcome {{auth()->user()->name}}</span>
            <a href="/courses/manage">Manage Courses</a>
            
            <form method="POST" action="/logout">
                @csrf
                <button type="submit"> 
                    Logout
                </button>
            </form>

            @else
            <a href="/register">Register</a>
            <a href="/login">Login</a>

            @endauth
        </div>
    </header>
    
    <x-flash-message />

    <main>
        {{$slot}}
    </main>

    <footer>
        <p>&copy;2023 By Amel Tutic</p>
    </footer>

</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>