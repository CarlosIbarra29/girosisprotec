@extends('layouts.app')

@push('scripts')
    <link href="{{ asset('css/tables.css') }}" rel="stylesheet" />
    <style>
        .main-layout {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
            padding: 40px 20px;
            background-color: #f9fafb;
        }

        .sidebar, .favorites {
            flex: 1 1 250px;
        }

        .content {
            flex: 2 1 600px;
        }

        .section-title {
            font-size: 1.3rem;
            font-weight: bold;
            margin-bottom: 15px;
            color: #333;
        }

        .league-list li {
            list-style: none;
            padding: 10px 15px;
            background-color: #fff;
            margin-bottom: 10px;
            border-radius: 8px;
            cursor: pointer;
            transition: all 0.2s ease;
        }

        .league-list li:hover {
            background-color: #e2e8f0;
        }

        .match {
            background-color: #fff;
            padding: 15px;
            margin-bottom: 20px;
            border-radius: 10px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.05);
        }

        .favorites .team-card {
            background-color: #f8fafc;
            margin-bottom: 20px;
            padding: 15px;
            border-radius: 8px;
            text-align: center;
            box-shadow: 0 5px 10px rgba(0,0,0,0.05);
        }

        .favorites .team-card img {
            width: 60px;
            height: 60px;
            object-fit: contain;
            margin-bottom: 10px;
        }

        .hero-section {
            background: url('{{ asset('img/futbol/fondo_estadio.jpg') }}') center center / cover no-repeat;
            color: #fff;
            text-align: center;
            padding: 60px 20px;
        }

        .hero-section h1 {
            font-size: 3rem;
            font-weight: bold;
        }

        @media (max-width: 992px) {
            .main-layout {
                flex-direction: column;
            }

            .sidebar, .favorites {
                order: 2;
            }

            .content {
                order: 1;
            }
        }
    </style>
@endpush

@section('title')
    Resultados de Fútbol
@endsection

@section('content')

<!-- Portada  -->
<section class="hero-section">
    <h1>Resultados y Equipos Favoritos</h1>
    <p>Consulta marcadores y conoce tus clubes preferidos</p>
</section>

<!-- Principal -->
<div class="main-layout">

    <!-- Ligas -->
    <aside class="sidebar">
        <h4 class="section-title">Ligas</h4>
        <ul class="league-list">
            <li>Champions League</li>
            <li>LaLiga</li>
            <li>Ligue 1</li>
            <li>Bundesliga</li>
            <li>Serie A</li>
            <li>Premier League</li>
            <li>MLS</li>
            <li>Europa League</li>
            <li>Liga MX</li>
        </ul>
    </aside>

    <!-- Resultados -->
    <main class="content">
        <h4 class="section-title">Resultados por Liga</h4>

        @php
            $resultados = [
                'Champions League' => [
                    ['local' => 'Brann', 'visitante' => 'Salzburg', 'fecha' => '2025-07-22', 'marcador' => '1 - 0'],
                    ['local' => 'Shelbourne', 'visitante' => 'Qarabag FK', 'fecha' => '2025-07-22', 'marcador' => '11:45 AM'],
                ],
                'Club Friendlies' => [
                    ['local' => 'Lyon', 'visitante' => 'RWDM Brussels', 'fecha' => '2025-07-22', 'marcador' => '0 - 0'],
                    ['local' => 'Milan', 'visitante' => 'Arsenal', 'fecha' => '2025-07-22', 'marcador' => '0 - 1'],
                    ['local' => 'Galatasaray', 'visitante' => 'Cagliari', 'fecha' => '2025-07-22', 'marcador' => '2 - 1'],
                ],
            ];
        @endphp

        @foreach ($resultados as $liga => $partidos)
            <h5 class="text-primary mt-4 mb-3">{{ $liga }}</h5>
            @foreach ($partidos as $partido)
                <div class="match">
                    <strong>{{ $partido['local'] }}</strong> vs <strong>{{ $partido['visitante'] }}</strong><br>
                    <small>Fecha: {{ $partido['fecha'] }} | Marcador: {{ $partido['marcador'] }}</small>
                </div>
            @endforeach
        @endforeach
    </main>

    <!-- Favoritos -->
    <aside class="favorites">
        <h4 class="section-title">Equipos Favoritos</h4>
        @php
            $equipos = [
                ['nombre' => 'Real Madrid', 'imagen' => 'img/futbol/realmadrid.jpg', 'link' => 'https://www.realmadrid.com'],
                ['nombre' => 'FC Barcelona', 'imagen' => 'img/futbol/barcelona.jpg', 'link' => 'https://www.fcbarcelona.com'],
                ['nombre' => 'Cruz Azul', 'imagen' => 'img/futbol/cruzazul.jpg', 'link' => 'https://cfcruzazul.com/'],
                ['nombre' => 'Manchester City', 'imagen' => 'img/futbol/mcity.jpg', 'link' => 'https://www.mancity.com'],
                ['nombre' => 'PSG', 'imagen' => 'img/futbol/psg.jpg', 'link' => 'https://en.psg.fr'],
                ['nombre' => 'Bayern Munich', 'imagen' => 'img/futbol/bayern.jpg', 'link' => 'https://fcbayern.com'],
                ['nombre' => 'LA Galaxy', 'imagen' => 'img/futbol/lagalaxy.jpg', 'link' => 'https://www.lagalaxy.com'],
            ];
        @endphp

        @foreach ($equipos as $equipo)
            <div class="team-card">
                <img src="{{ asset($equipo['imagen']) }}" alt="{{ $equipo['nombre'] }}">
                <a href="{{ $equipo['link'] }}" target="_blank" class="text-decoration-none d-block mt-2">
                    <strong>{{ $equipo['nombre'] }}</strong>
                </a>
                <p class="small text-muted mb-0">Conócelos</p>
            </div>
        @endforeach
    </aside>

</div>
@endsection