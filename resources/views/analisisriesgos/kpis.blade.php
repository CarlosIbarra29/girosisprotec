@extends('layouts.app')

@push('styles')
    <style>
        .tabla-encabezado {
            background-color: #003366;
            color: white;
        }
        .leyenda-color {
            display: flex;
            justify-content: center;
            flex-wrap: wrap;
            gap: 10px;
            margin-top: 15px;
        }
        .leyenda-color span {
            display: flex;
            align-items: center;
            font-size: 13px;
        }
        .leyenda-color div {
            width: 15px;
            height: 15px;
            margin-right: 5px;
            border: 1px solid #333;
        }
    </style>
@endpush

    @section('title')
        Clasificación de Riesgos
    @endsection

    @section('content')
    @php
        $niveles = [
            ['nombre' => 'Muy Alto', 'min' => 36.1, 'max' => 100, 'consideracion' => 'Inaceptable', 'respuesta' => 'Acción fundamental inmediata', 'color' => '#d32f2f'],
            ['nombre' => 'Alto', 'min' => 16.1, 'max' => 36, 'consideracion' => 'Inaceptable', 'respuesta' => 'Acción fundamental a corto plazo', 'color' => '#ef5350'],
            ['nombre' => 'Medio', 'min' => 6.5, 'max' => 16, 'consideracion' => 'Inaceptable', 'respuesta' => 'Acción fundamental a mediano plazo', 'color' => '#fff176'],
            ['nombre' => 'Bajo', 'min' => 1.5, 'max' => 6.4, 'consideracion' => 'Tolerable', 'respuesta' => 'Monitorear', 'color' => '#aed581'],
            ['nombre' => 'Muy Bajo', 'min' => 0, 'max' => 1.4, 'consideracion' => 'Tolerable', 'respuesta' => 'Monitorear', 'color' => '#c8e6c9'],
        ];
    @endphp

<!-- Clasificación -->
<div class="card mt-5 shadow-sm">
    <div class="card-body">
        <h5 class="fw-bold mb-4">Tabla de Clasificación</h5>
        <table class="table table-bordered text-center">
            <thead class="tabla-encabezado">
                <tr>
                    <th>Clasificación</th>
                    <th>Valor Mínimo</th>
                    <th>Valor Máximo</th>
                    <th>Consideración</th>
                    <th>Respuesta</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($niveles as $n)
                    <tr style="background-color: {{ $n['color'] }}">
                        <td>{{ $n['nombre'] }}</td>
                        <td>{{ $n['min'] }}</td>
                        <td>{{ $n['max'] }}</td>
                        <td>{{ $n['consideracion'] }}</td>
                        <td>{{ $n['respuesta'] }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <!-- Leyenda -->
        <div class="leyenda-color">
            @foreach ($niveles as $n)
                <span><div style="background-color: {{ $n['color'] }}"></div>{{ $n['nombre'] }}</span>
            @endforeach
        </div>
    </div>
</div>

<!-- Factor de Exposición y Probabilidad -->
<div class="card mt-5 shadow-sm">
    <div class="card-body">
        <h5 class="fw-bold mb-4">Tabla de Factor de Exposición y Probabilidad</h5>
        <table class="table table-bordered text-center">
            <thead class="tabla-encabezado">
                <tr>
                    <th>Factor de Exposición</th>
                    <th></th>
                    <th>Probabilidad</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($niveles as $n)
                    <tr class="{{ $loop->odd ? 'table-light' : '' }}">
                        <td style="color: {{ $n['color'] }}">{{ $n['nombre'] }}</td>
                        <td>{{ $n['min'] }}</td>
                        <td style="color: {{ $n['color'] }}">{{ $n['nombre'] }}</td>
                        <td>{{ $n['min'] }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <div class="leyenda-color">
            @foreach ($niveles as $n)
                <span><div style="background-color: {{ $n['color'] }}"></div>{{ $n['nombre'] }}</span>
            @endforeach
        </div>
    </div>
</div>

    <!-- Niveles de Riesgo por Escenario -->
    @php
        $escenarios = [
            ['escenario' => 'E.1', 'ipd' => 14.4, 'perfil' => '(3-4)', 'nivel' => 'Medio'],
            ['escenario' => 'E.2', 'ipd' => 19.2, 'perfil' => '(4-4)', 'nivel' => 'Alto'],
            ['escenario' => 'E.3', 'ipd' => 14.4, 'perfil' => '(3-5)', 'nivel' => 'Medio'],
            ['escenario' => 'E.4', 'ipd' => 19.2, 'perfil' => '(4-4)', 'nivel' => 'Alto'],
            ['escenario' => 'E.5', 'ipd' => 9.6, 'perfil' => '(2-5)', 'nivel' => 'Medio'],
            ['escenario' => 'E.6', 'ipd' => 21.6, 'perfil' => '(3-5)', 'nivel' => 'Alto'],
        ];
    @endphp

<div class="card mt-5 shadow-sm">
    <div class="card-body">
        <h5 class="fw-bold mb-4">Niveles de Riesgo por Escenario</h5>
        <table class="table table-bordered text-center">
            <thead class="tabla-encabezado">
                <tr>
                    <th>Escenario</th>
                    <th>IPD</th>
                    <th>Perfil</th>
                    <th>Nivel de R.</th>
                    <th>Nvo. Perfil</th>
                    <th>Nivel de R.</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($escenarios as $e)
                    @php
                        $colorNivel = collect($niveles)->firstWhere('nombre', $e['nivel'])['color'] ?? '#fff';
                    @endphp
                    <tr>
                        <td>{{ $e['escenario'] }}</td>
                        <td>{{ $e['ipd'] }}</td>
                        <td>{{ $e['perfil'] }}</td>
                        <td style="background-color: {{ $colorNivel }}">{{ $e['nivel'] }}</td>
                        <td>–</td>
                        <td>–</td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <div class="leyenda-color">
            @foreach ($niveles as $n)
                <span><div style="background-color: {{ $n['color'] }}"></div>{{ $n['nombre'] }}</span>
            @endforeach
        </div>
    </div>
</div>
    @php

        // Distribucion por Item
        $distribucionRiesgos = [
            'Muy Alto' => 1,
            'Alto' => 0,
            'Medio' => 0,
            'Bajo' => 0,
            'Muy Bajo' => 0,
        ];

        $coloresDistribucion = [
            'Muy Alto' => '#d32f2f',
            'Alto' => '#ef5350',
            'Medio' => '#fff176',
            'Bajo' => '#aed581',
            'Muy Bajo' => '#c8e6c9',
        ];

        $valorMaxDistribucion = max($distribucionRiesgos) ?: 1;
    @endphp

<div class="card mt-5 shadow-sm">
    <div class="card-body">
        <h5 class="fw-bold text-center mb-4">Distribución de los riesgos por ítem</h5>

        <div class="d-flex justify-content-center align-items-end" style="height: 200px; gap: 20px;">
            @foreach ($distribucionRiesgos as $nivel => $cantidad)
                @php
                    $altura = ($cantidad / $valorMaxDistribucion) * 160;
                    $color = $coloresDistribucion[$nivel] ?? '#ccc';
                @endphp
                <div class="text-center">
                    <!-- Barra -->
                    <div style="width: 40px; height: {{ $altura }}px; background-color: {{ $color }}; margin: 0 auto; border-top-left-radius: 5px; border-top-right-radius: 5px;"></div>
                    <!-- Valor -->
                    <div style="margin-top: 5px;">{{ $cantidad }}</div>
                </div>
            @endforeach
        </div>

        <div class="text-center mt-2 fw-bold">Barreras Perimetrales</div>

        <!-- Leyenda -->
        <div class="leyenda-color mt-3">
            @foreach ($distribucionRiesgos as $nivel => $cantidad)
                <span><div style="background-color: {{ $coloresDistribucion[$nivel] }}"></div>{{ $nivel }}</span>
            @endforeach
        </div>
    </div>
</div>

@endsection
