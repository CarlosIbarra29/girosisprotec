@extends('layouts.app')


@push('scripts')
    <link href="{{ asset('css/tables.css') }}" rel="stylesheet" />  
@section('content')
<div class="container mt-5">
    <div class="row">
        <!-- Columna izquierda - Momentos Destacados -->
        <div class="col-lg-3 mb-4">
            <div class="card shadow rounded-4 border-0">
                <div class="card-header bg-primary text-white rounded-top-4">
                    <h5 class="mb-0">Momentos Destacados</h5>
                </div>
                <div class="card-body">
                    <p>Revive los mejores momentos del partido en el siguiente enlace:</p>
                    <a href="https://www.youtube.com" target="_blank" class="btn btn-danger btn-sm">Ver en YouTube</a>
                </div>
            </div>
        </div>

        <!-- Columna central - Alineación -->
        <div class="col-lg-6 mb-4">
            <div class="card shadow rounded-4 border-0">
                <div class="card-header bg-success text-white text-center rounded-top-4">
                    <h5 class="mb-0">Alineación del Partido</h5>
                </div>
                <div class="card-body bg-light rounded-bottom-4">
                    <div class="p-3">
                        <div class="row text-center">
                            <div class="col-12 fw-bold">Portero</div>
                            <div class="col-12 mb-3">
                                <img src="{{ asset('img/jugadores/25.png') }}" class="rounded-circle" width="40">
                                <div>Szczesny <span class="badge bg-warning ms-2">5.1</span></div>
                            </div>
                            <div class="col-12 fw-bold">Defensores</div>
                            <div class="col d-flex justify-content-around mb-3">
                                <div class="text-center">
                                    <img src="{{ asset('img/jugadores/5.png') }}" class="rounded-circle" width="40">
                                    <div>Martínez <span class="badge bg-warning">6.4</span></div>
                                </div>
                                <div class="text-center">
                                    <img src="{{ asset('img/jugadores/2.png') }}" class="rounded-circle" width="40">
                                    <div>Cubarsí <span class="badge bg-warning">6.5</span></div>
                                </div>
                                <div class="text-center">
                                    <img src="{{ asset('img/jugadores/21.png') }}" class="rounded-circle" width="40">
                                    <div>De Jong <span class="badge bg-success">7.2</span></div>
                                </div>
                                <div class="text-center">
                                    <img src="{{ asset('img/jugadores/24.png') }}" class="rounded-circle" width="40">
                                    <div>Eric García <span class="badge bg-success">7.8</span></div>
                                </div>
                            </div>
                            <div class="col-12 fw-bold">Mediocampistas</div>
                            <div class="col d-flex justify-content-around mb-3">
                                <div class="text-center">
                                    <img src="{{ asset('img/jugadores/20.png') }}" class="rounded-circle" width="40">
                                    <div>Olmo <span class="badge bg-warning">6.4</span></div>
                                </div>
                                <div class="text-center">
                                    <img src="{{ asset('img/jugadores/7.png') }}" class="rounded-circle" width="40">
                                    <div>Ferran <span class="badge bg-success">9.2</span></div>
                                </div>
                            </div>
                            <div class="col-12 fw-bold">Delanteros</div>
                            <div class="col d-flex justify-content-around mb-3">
                                <div class="text-center">
                                    <img src="{{ asset('img/jugadores/11.png') }}" class="rounded-circle" width="40">
                                    <div>Raphinha <span class="badge bg-success">9.0</span></div>
                                </div>
                                <div class="text-center">
                                    <img src="{{ asset('img/jugadores/8.png') }}" class="rounded-circle" width="40">
                                    <div>Pedri <span class="badge bg-success">8.0</span></div>
                                </div>
                                <div class="text-center">
                                    <img src="{{ asset('img/jugadores/19.png') }}" class="rounded-circle" width="40">
                                    <div>Lamine <span class="badge bg-success">8.9</span></div>
                                </div>
                            </div>
                            <div class="col-12 fw-bold">Delantero Centro</div>
                            <div class="col text-center mb-3">
                                <img src="{{ asset('img/jugadores/9.png') }}" class="rounded-circle" width="40">
                                <div>Mbappé <span class="badge bg-primary">9.5</span></div>
                            </div>
                        </div>

                        <hr>
                        <div>
                            <div class="d-flex justify-content-between">
                                <div><strong>Entrenador:</strong> Hans-Dieter Flick</div>
                                <div><strong>Entrenador:</strong> Carlo Ancelotti</div>
                            </div>
                            <h6 class="mt-3">Suplentes</h6>
                            <ul class="list-group">
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    Andreas Christensen <span class="badge bg-secondary">57'</span>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    Alejandro Balde <span class="badge bg-secondary">58'</span>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    Fermín López <span class="badge bg-secondary">77'</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Columna derecha - Jornadas disputadas -->
        <div class="col-lg-3 mb-4">
            <div class="card shadow rounded-4 border-0">
                <div class="card-header bg-info text-white rounded-top-4">
                    <h5 class="mb-0">Jornadas</h5>
                </div>
                <div class="card-body">
                    <ul class="list-group">
                        <li class="list-group-item">Las Palmas 0 - 1 Rayo Vallecano</li>
                        <li class="list-group-item">Valencia 3 - 0 Getafe</li>
                        <li class="list-group-item">Celta Vigo 2 - 1 Sevilla</li>
                        <li class="list-group-item">Girona 0 - 1 Villarreal</li>
                        <li class="list-group-item">Mallorca 2 - 1 Valladolid</li>
                        <li class="list-group-item">Atlético 4 - 0 Sociedad</li>
                        <li class="list-group-item">Leganés 2 - 1 Espanyol</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection