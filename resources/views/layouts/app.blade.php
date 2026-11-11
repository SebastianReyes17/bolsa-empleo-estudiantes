
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>@yield('title', 'Inicio') | EmpleaU</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;600;700;800&family=Manrope:wght@600;700;800&display=swap" rel="stylesheet">

    @vite(['resources/css/app.css'])
</head>

<body>

<header class="topbar">
    <div class="nav-container">

        <a href="{{ route('home') }}" class="brand">
            <span class="brand-mark">E</span>
            emplea<span>U</span>
        </a>

        <nav class="nav-links">
            <a href="{{ route('home') }}">Inicio</a>
            <a href="{{ route('jobs.index') }}">Vacantes</a>

            @auth
                <a href="{{ route('dashboard') }}">Mi panel</a>
                <a href="{{ route('profile.edit') }}">Mi perfil</a>

                @if(auth()->user()->role === 'student')
                    <a href="{{ route('applications.index') }}">Postulaciones</a>
                @endif

                <form method="POST" action="{{ route('logout') }}" class="inline">
                    @csrf
                    <button type="submit" class="nav-button">Cerrar sesión</button>
                </form>
            @else
                <a href="{{ route('login') }}">Ingresar</a>
                <a href="{{ route('register') }}" class="nav-cta">Crear cuenta</a>
            @endauth
        </nav>

    </div>
</header>

<main class="container">

    @if(session('success'))
        <div class="alert success">{{ session('success') }}</div>
    @endif

    @if(session('error'))
        <div class="alert error">{{ session('error') }}</div>
    @endif

    @if($errors->any())
        <div class="alert error">
            <strong>Revisa los siguientes campos:</strong>
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    @yield('content')

</main>

<footer class="footer">
    <div class="footer-inner">

        <a href="{{ route('home') }}" class="brand">
            <span class="brand-mark">E</span>
            emplea<span>U</span>
        </a>

        <p>Conectamos tu talento con nuevas oportunidades.</p>

        <small>
            Proyecto académico · Tecnología en Sistemas de Información
        </small>

    </div>
</footer>

</body>
</html>
