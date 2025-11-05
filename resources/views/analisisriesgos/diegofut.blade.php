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

        .results-container {
            border: 1px solid #e5e7eb;
        }

        .badge {
            display: inline-block;
            font-size: 0.75rem;
            padding: 0.5em 0.6em;
            border-radius: 30px;
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

        .bracket {
            background-color: #fff;
            border-radius: 10px;
            padding: 15px;
            box-shadow: 0 4px 8px rgba(0,0,0,0.05);
            font-size: 0.85rem;
            animation: fadeIn 0.8s ease-in-out;
        }

        .bracket-phase {
            margin-bottom: 20px;
        }

        .bracket-match {
            display: flex;
            justify-content: space-between;
            padding: 5px 0;
            border-bottom: 1px dashed #ccc;
            opacity: 0;
            transform: translateY(10px);
            animation: slideUp 0.4s forwards;
        }

        .bracket-match .team {
            width: 40%;
            font-weight: 500;
        }

        .bracket-match .score {
            width: 20%;
            text-align: center;
            font-weight: bold;
            color: #1f2937;
        }

        .champion {
            text-align: center;
            margin-top: 15px;
            animation: fadeIn 1s ease-in-out 0.4s forwards;
            opacity: 0;
        }

        @keyframes slideUp {
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes fadeIn {
            to {
                opacity: 1;
            }
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
    💕Resultados de Fútbol
@endsection

@section('content')

<!-- Portada -->
<section class="hero-section">
    <h1>Resultados y Equipos Favoritos</h1>
    <p>Consulta marcadores y conoce tus clubes preferidos</p>
</section>

<!-- Principipio -->
<div class="main-layout">

    <!-- Ligas -->
    <aside class="sidebar">
        <h4 class="section-title">✔Ligas</h4>
        <ul class="league-list">
            <li>🏆Champions League</li>
            <li>🎖LaLiga</li>
            <li>🌌Ligue 1</li>
            <li>🎶Bundesliga</li>
            <li>🌊Serie A</li>
            <li>🧊Premier League</li>
            <li>🍔MLS</li>
            <li>🌐Europa League</li>
            <li>🚩Liga MX</li>
        </ul>

        <hr class="my-4">

        <h4 class="section-title">🚩Copa Mundial de Clubes🏆</h4>

        <div class="bracket">P
            @php
                $bracket = [
                    'Octavos' => [
                        ['local' => 'PSG', 'visitante' => 'MIA', 'resultado' => '4 - 0'],
                        ['local' => 'FLA', 'visitante' => 'FCB', 'resultado' => '2 - 4'],
                        ['local' => 'RMA', 'visitante' => 'JUV', 'resultado' => '1 - 0'],
                        ['local' => 'BVB', 'visitante' => 'MON', 'resultado' => '2 - 1'],
                    ],
                    'Cuartos' => [
                        ['local' => 'PSG', 'visitante' => 'FCB', 'resultado' => '2 - 0'],
                        ['local' => 'RMA', 'visitante' => 'BVB', 'resultado' => '3 - 2'],
                    ],
                    'Semifinal' => [
                        ['local' => 'CHE', 'visitante' => 'PSG', 'resultado' => '3 - 0'],
                        ['local' => 'PSG', 'visitante' => 'RMA', 'resultado' => '4 - 0'],
                    ],
                    'Final' => [
                        ['local' => 'CHE', 'visitante' => 'FLU', 'resultado' => '2 - 0', 'campeon' => 'Chelsea'],
                    ]
                ];
            @endphp

            @foreach ($bracket as $fase => $partidos)
                <div class="bracket-phase">
                    <h6 class="text-muted mb-2">{{ $fase }}</h6>
                    @foreach ($partidos as $juego)
                        <div class="bracket-match">
                            <span class="team">{{ $juego['local'] }}</span>
                            <span class="score">{{ $juego['resultado'] }}</span>
                            <span class="team text-end">{{ $juego['visitante'] }}</span>
                        </div>
                    @endforeach
                </div>
            @endforeach

            <div class="champion">
                <img src="{{ asset('img/futbol/trophy.png') }}" alt="Trophy" width="40">
                <div class="fw-bold mt-2">🧊Chelsea 🏆CAMPEÓN</div>
            </div>
        </div>
    </aside>

    <!-- Resultados -->
    <main class="content">
        <h4 class="section-title">❄Resultados por Liga</h4>

        @php
            $resultados = [
                'Champions League Qualification' => [
                    ['estado' => '77', 'local' => 'Brann', 'visitante' => 'Salzburg', 'marcador' => '1 - 2', 'icono' => 'green'],
                    ['estado' => '11:45 AM', 'local' => 'Shelbourne', 'visitante' => 'Qarabag FK', 'marcador' => '', 'icono' => 'gray'],
                ],
                'Club Friendlies' => [
                    ['estado' => 'FT', 'local' => 'Lyon', 'visitante' => 'RWDM Brussels', 'marcador' => '0 - 0', 'icono' => 'gray'],
                    ['estado' => 'Pen', 'local' => 'Milan', 'visitante' => 'Arsenal', 'marcador' => '0 - 1', 'icono' => 'gray'],
                    ['estado' => 'FT', 'local' => 'Trabzonspor', 'visitante' => 'Persepolis', 'marcador' => '0 - 0', 'icono' => 'gray'],
                    ['estado' => 'FT', 'local' => 'Homburg', 'visitante' => 'Hoffenheim', 'marcador' => '0 - 4', 'icono' => 'gray'],
                    ['estado' => '76', 'local' => 'Girona', 'visitante' => 'Espanyol', 'marcador' => '0 - 0', 'icono' => 'green'],
                    ['estado' => 'HT', 'local' => 'Galatasaray', 'visitante' => 'Cagliari', 'marcador' => '2 - 1', 'icono' => 'green'],
                ],
            ];
        @endphp

        <div class="results-container bg-white rounded shadow-sm p-3">
            @foreach ($resultados as $liga => $partidos)
                <div class="mb-4">
                    <div class="d-flex align-items-center mb-3">
                        <span class="fw-bold text-dark" style="font-size: 1.1rem;">
                            @if(str_contains($liga, 'Champions')) ⚽ @else 🌍 @endif {{ $liga }}
                        </span>
                    </div>

                    @foreach ($partidos as $partido)
                    <div class="d-flex align-items-center justify-content-between py-2 px-3 mb-2 rounded" style="background-color: #f9f9f9;">
                        <span class="badge @if($partido['icono'] == 'green') bg-success @else bg-secondary @endif text-white me-2" style="width: 45px;">
                            {{ $partido['estado'] }}
                        </span>
                        <div class="text-end flex-fill me-2" style="min-width: 120px;">
                            <strong>{{ $partido['local'] }}</strong>
                        </div>
                        <div style="min-width: 80px;" class="text-center">
                            <span class="fw-semibold">{{ $partido['marcador'] ?: '-' }}</span>
                        </div>
                        <div class="text-start flex-fill ms-2" style="min-width: 120px;">
                            <strong>{{ $partido['visitante'] }}</strong>
                        </div>
                    </div>
                    @endforeach
                </div>
            @endforeach
        </div>
    </main>

    <!-- Equipos favoritos -->
    <aside class="favorites">
        <h4 class="section-title">🌟Equipos Favoritos</h4>

        @php
            $equipos = [
                ['nombre' => 'Real Madrid', 'imagen' => 'img/futbol/realmadrid.jpg', 'link' => 'https://www.realmadrid.com'],
                ['nombre' => 'FC Barcelona', 'imagen' => 'img/futbol/barcelona.jpg', 'link' => 'https://www.fcbarcelona.com'],
                ['nombre' => 'Cruz Azul', 'imagen' => 'img/futbol/cruzazul.jpg', 'link' => 'https://www.cruzazulfc.com.mx'],
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