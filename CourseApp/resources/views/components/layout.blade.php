@php
$myNotification = session('notification');
@endphp
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
            <img src={{ asset('img/logo.png') }} alt="SR" class="logo">
        </div>
        <nav>
            <div class="meni">
                <div><a href="/">Početna</a></div>
                @auth
                @if(auth()->user()->role !== "Predavac")
                <div><a href="/apply">Apliciraj za predavača</a></div>
                @endif
                @else
                <div><a href="/apply">Apliciraj za predavača</a></div>
                @endauth
                
                <div><a href="/courses">Kursevi</a></div>
                <div><a href="/contact">Kontakt</a></div>
            </div>
        </nav>
        <div class="reglog">
           
        @auth
           @if (auth()->user()->role === "Admin")
           <a href="/adminNotificationPage"> <img src={{ asset('img/notification.png') }} alt="SR" class="notificationImg"></a>
           
           @if (count($myNotification)>0)
           <a href="/adminNotificationPage" class="notificationDiv">
           {{count($myNotification)}}
           </a>
           @endif
           @endif
           @if (auth()->user()->role === "Predavac")
           <a href="/courses/manage" class="manageCoursesTag">Moji kursevi</a>
           @endif
           
            <form method="POST" action="/logout">
                @csrf
                <button type="submit" class="LogoutBtn"> 
                    Logout
                </button>
            </form>
            @else
            <div class="login-regDiv">
            <a class="login-reg" href="/register">Registracija</a>
            <p>/</p>
            <a class="login-reg" href="/login">Prijava</a>
             </div>
            @endauth
        </div>
    </header>
    
    <x-flash-message />

    <main>
        {{$slot}}
    </main>

    <footer>
        <p>&copy;2023 By Mirza Salković</p>
    </footer>

</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>