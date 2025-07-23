@extends('layouts.app')

@push('scripts')
    <script src="{{ asset('js/cliente/NuevoCliente.js') }}"></script>
    <link href="{{ asset('css/tables.css') }}" rel="stylesheet" type="text/css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .match-row {
            padding: 0.6rem 0;
            border-bottom: 1px solid #eee;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }
        .match-row:hover {
            background-color: #f9f9f9;
        }
        .match-status {
            width: 40px;
            text-align: center;
            font-size: 0.8rem;
            font-weight: bold;
        }
        .team-logo {
            height: 22px;
            margin-right: 6px;
        }
        .carousel-inner img {
            border-radius: 0.5rem;
        }
        .section-title {
            background: linear-gradient(to right, #004aad, #0076ff);
            color: #fff;
            padding: 1rem;
            border-radius: 0.5rem 0.5rem 0 0;
            font-size: 1.4rem;
            font-weight: bold;
            display: flex;
            align-items: center;
        }
        .section-title i {
            margin-right: 0.5rem;
        }
    </style>
@endpush

@section('title')
    DiegFut
@endsection

@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="card card-custom gutter-b">

            {{-- Header más profesional --}}
            <div class="section-title">
                <i class="fas fa-futbol"></i> Resultados en Vivo - DiegFut
            </div>

            {{-- Carrusel de imágenes --}}
            <div id="futCarousel" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="https://source.unsplash.com/1200x250/?soccer,stadium" class="d-block w-100" alt="Slide 1">
                    </div>
                    <div class="carousel-item">
                        <img src="https://source.unsplash.com/1200x250/?football,goal" class="d-block w-100" alt="Slide 2">
                    </div>
                    <div class="carousel-item">
                        <img src="https://source.unsplash.com/1200x250/?futbol,match" class="d-block w-100" alt="Slide 3">
                    </div>
                </div>
            </div>

            {{-- Contenido --}}
            <div class="card-body pt-5">
                <div class="row g-4">
                    {{-- Ligas (Sidebar izquierda) --}}
                    <div class="col-md-2">
                        <h6 class="fw-bold text-primary">Top Leagues</h6>
                        <ul class="list-group list-group-flush small">
                            <li class="list-group-item">🏴 Premier League</li>
                            <li class="list-group-item">🇲🇽 Liga MX</li>
                            <li class="list-group-item">⭐ Champions League</li>
                            <li class="list-group-item">🇪🇸 LaLiga</li>
                            <li class="list-group-item">🇩🇪 Bundesliga</li>
                            <li class="list-group-item">🌎 FIFA World Cup</li>
                            <li class="list-group-item">🇮🇹 Serie A</li>
                        </ul>
                    </div>

                    {{-- Resultados (Centro) --}}
                    <div class="col-md-7">
                        {{-- Filtros --}}
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <div class="btn-group">
                                <button class="btn btn-outline-secondary btn-sm">Ongoing</button>
                                <button class="btn btn-outline-secondary btn-sm">On TV</button>
                                <button class="btn btn-outline-secondary btn-sm">By time</button>
                                <button class="btn btn-outline-secondary btn-sm">Filter</button>
                            </div>
                            <div><strong>Today ▼</strong></div>
                        </div>

                        {{-- Champions League Qualification --}}
                        <h6 class="fw-bold text-dark">🏆 Champions League Qualification</h6>
                        <div class="match-row">
                            <div class="match-status text-success">LIVE</div>
                            <div>Brann</div>
                            <div>1 - 0</div>
                            <div>Salzburg</div>
                        </div>
                        <div class="match-row">
                            <div class="match-status text-muted">11:45</div>
                            <div>Shelbourne</div>
                            <div>-</div>
                            <div>Qarabag FK</div>
                        </div>

                        {{-- Club Friendlies --}}
                        <h6 class="fw-bold mt-4 text-dark">🌐 Club Friendlies</h6>
                        @php
                            $friendlies = [
                                ['status' => 'FT', 'team1' => 'Lyon', 'score' => '0 - 0', 'team2' => 'RWDM Brussels'],
                                ['status' => 'Pen', 'team1' => 'Milan', 'score' => '0 - 1', 'team2' => 'Arsenal'],
                                ['status' => 'FT', 'team1' => 'Trabzonspor', 'score' => '0 - 0', 'team2' => 'Persepolis'],
                                ['status' => 'FT', 'team1' => 'Homburg', 'score' => '0 - 4', 'team2' => 'Hoffenheim'],
                                ['status' => '48\'', 'team1' => 'Girona', 'score' => '0 - 0', 'team2' => 'Espanyol'],
                                ['status' => '36\'', 'team1' => 'Galatasaray', 'score' => '2 - 1', 'team2' => 'Cagliari'],
                                ['status' => '7\'', 'team1' => 'Bradford', 'score' => '0 - 0', 'team2' => 'Middlesbrough'],
                            ];
                        @endphp
                        @foreach ($friendlies as $match)
                            <div class="match-row">
                                <div class="match-status">{{ $match['status'] }}</div>
                                <div>{{ $match['team1'] }}</div>
                                <div>{{ $match['score'] }}</div>
                                <div>{{ $match['team2'] }}</div>
                            </div>
                        @endforeach
                    </div>

                    {{-- Sidebar derecha: Transferencias y Equipos favoritos --}}
                    <div class="col-md-3">
                        {{-- Transferencias --}}
                        <div class="card mb-4">
                            <div class="card-body">
                                <h6 class="fw-bold text-primary">📥 Top Transfers</h6>
                                <ul class="list-unstyled small">
                                    <li><strong>Marcus Rashford</strong> – <span class="text-muted">On loan</span></li>
                                    <li><strong>Evan Ferguson</strong> – €3M <span class="text-muted">On loan</span></li>
                                    <li><strong>Richard Rios</strong> – €27M</li>
                                </ul>
                            </div>
                        </div>

                        {{-- Equipos favoritos --}}
                        <div class="card">
                            <div class="card-body text-center">
                                <h6 class="fw-bold text-primary mb-3">⭐ Equipos Favoritos</h6>
                                <div class="row row-cols-3 g-2 justify-content-center">
                                    @php
                                        $teams = [
                                            ['name' => 'Real Madrid', 'url' => 'https://www.realmadrid.com', 'img' => 'https://upload.wikimedia.org/wikipedia/en/5/56/Real_Madrid_CF.svg'],
                                            ['name' => 'FC Barcelona', 'url' => 'https://www.fcbarcelona.com', 'img' => 'https://upload.wikimedia.org/wikipedia/en/4/47/FC_Barcelona_%28crest%29.svg'],
                                            ['name' => 'Cruz Azul', 'url' => 'https://cruzazulfc.com.mx', 'img' => 'https://upload.wikimedia.org/wikipedia/en/d/d2/Cruz_Azul_logo.svg'],
                                            ['name' => 'Man City', 'url' => 'https://www.mancity.com', 'img' => 'https://upload.wikimedia.org/wikipedia/en/e/eb/Manchester_City_FC_badge.svg'],
                                            ['name' => 'PSG', 'url' => 'https://en.psg.fr', 'img' => 'https://upload.wikimedia.org/wikipedia/en/a/a7/Paris_Saint-Germain_F.C..svg'],
                                            ['name' => 'Bayern', 'url' => 'https://fcbayern.com', 'img' => 'https://upload.wikimedia.org/wikipedia/en/1/1f/FC_Bayern_München_logo_%282017%29.svg'],
                                            ['name' => 'LA Galaxy', 'url' => 'https://www.lagalaxy.com', 'img' => 'https://upload.wikimedia.org/wikipedia/en/0/0c/LA_Galaxy_logo.svg'],
                                        ];
                                    @endphp
                                    @foreach($teams as $team)
                                        <div class="col">
                                            <a href="{{ $team['url'] }}" target="_blank" class="d-block text-decoration-none favorite-team">
                                                <img src="{{ $team['img'] }}" class="img-fluid" style="max-height:50px;" alt="{{ $team['name'] }}">
                                            </a>
                                        </div>
                                    @endforeach
                                </div>
                                <p class="mt-3 small text-muted">Conócelos</p>
                            </div>
                        </div>
                    </div>
                </div> <!-- /.row -->
            </div> <!-- /.card-body -->
        </div> <!-- /.card -->
    </div>
</div>
@endsection