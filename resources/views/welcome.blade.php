
@extends('layouts.app')

@section('title', 'Inicio')

@section('content')

<section class="hero">

    <div class="hero-content">

        <span class="eyebrow">
            TU FUTURO PROFESIONAL COMIENZA AQUÍ
        </span>

        <h1>
            El talento que tienes.<br>
            <span>Las oportunidades</span><br>
            que buscas.
        </h1>

        <p>
            Encuentra prácticas, empleos de medio tiempo y oportunidades
            laborales diseñadas para estudiantes que quieren comenzar
            su camino profesional.
        </p>

        <div class="hero-buttons">
            <a href="{{ route('jobs.index') }}" class="btn btn-primary">
                Explorar vacantes →
            </a>

            <a href="{{ route('register') }}" class="btn btn-outline">
                Crear mi perfil
            </a>
        </div>

        <div class="hero-note">
            <span>✓</span> Oportunidades pensadas para estudiantes
        </div>

    </div>

    <div class="hero-visual">

        <div class="decoration decoration-one"></div>
        <div class="decoration decoration-two"></div>

        <div class="opportunity-card">

            <div class="opportunity-icon">✦</div>

            <span class="card-label">NUEVA OPORTUNIDAD</span>

            <h2>
                Tu futuro<br>
                profesional<br>
                empieza hoy.
            </h2>

            <div class="card-divider"></div>

            <div class="card-footer">
                <span>Encuentra tu lugar</span>
                <strong>↗</strong>
            </div>

        </div>

        <div class="floating-box floating-top">
            ✓ Perfil profesional
        </div>

        <div class="floating-box floating-bottom">
            ✧ Nuevas vacantes
        </div>

    </div>

</section>

<section class="stats">

    <div class="stat-item">
        <strong>01</strong>
        <span>Crea tu perfil</span>
    </div>

    <div class="stat-item">
        <strong>02</strong>
        <span>Encuentra oportunidades</span>
    </div>

    <div class="stat-item">
        <strong>03</strong>
        <span>Haz seguimiento</span>
    </div>

</section>

<section class="features-section">

    <div class="section-heading">

        <div>
            <span class="eyebrow">SENCILLO Y DIRECTO</span>
            <h2>Tu camino al primer empleo</h2>
            <p>Todo lo que necesitas para acercarte a tu próxima oportunidad.</p>
        </div>

        <a href="{{ route('jobs.index') }}" class="text-link">
            Ver vacantes →
        </a>

    </div>

    <div class="features-grid">

        <article class="feature-card">
            <div class="feature-icon">◎</div>
            <h3>Un perfil que habla por ti</h3>
            <p>
                Presenta tu formación, habilidades e intereses
                en un solo lugar.
            </p>
        </article>

        <article class="feature-card">
            <div class="feature-icon">⌕</div>
            <h3>Oportunidades a tu alcance</h3>
            <p>
                Explora y filtra vacantes según ubicación,
                tipo de empleo y modalidad.
            </p>
        </article>

        <article class="feature-card">
            <div class="feature-icon">↗</div>
            <h3>Postúlate y haz seguimiento</h3>
            <p>
                Envía tus candidaturas y consulta
                el estado de cada postulación.
            </p>
        </article>

    </div>

</section>

<section class="bottom-banner">

    <div>
        <span class="eyebrow">TU PRÓXIMO PASO</span>

        <h2>
            Una oportunidad puede<br>
            cambiarlo todo.
        </h2>
    </div>

    <a href="{{ route('register') }}" class="btn btn-white">
        Crear cuenta gratis →
    </a>

</section>

@endsection
