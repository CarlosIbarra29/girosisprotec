@extends('layouts.app')

@push('scripts')
    <script src="{{ asset('js/cliente/NuevoCliente.js') }}"></script>
    <link href="{{ asset('css/tables.css') }}" rel="stylesheet" type="text/css" />
@endpush

@section('title')
    Métodos
@endsection

@section('content')
<div class="row">
    <div class="col-lg-12">

        <div class="card card-custom gutter-b">
            <div class="card-header bg-white">
                <h3 class="card-title fw-bold text-dark">Clasificación de Riesgos</h3>

                <div class="card-toolbar">

                    <a href="{{  route('analisis.listadoanalisis') }}" class="btn btn-light-primary font-weight-bolder mr-3 ml-3">
                    <i class="la la-arrow-left"></i>Regresar</a>

                </div>

            </div>
            <div class="card-body">

                <div class="mb-15">


        <!-- Indice de Distribucion  -->
        <div class="table-responsive text-center" style="background: linear-gradient(to bottom, #ffffff 70%, #d9d9d9 100%); border-radius: 6px; padding: 20px; box-shadow: inset -10px 0px 20px rgba(0,0,0,0.2);">
            <h5 class="fw-bold mb-4">Índice de distribución de Eventos de Riesgos</h5>
            <div class="d-flex justify-content-around align-items-end" style="height: 200px;">
                <!-- Muy Bajo -->
                <div class="d-flex flex-column align-items-center" style="width: 70px;">
                    <span class="fw-bold">0</span>
                    <div style="width: 40px; height: 5px; background-color: #cccccc; margin-top: auto;"></div>
                    <span class="fw-bold text-primary mt-2">Muy Bajo</span>
                </div>
                <!-- Bajo -->
                <div class="d-flex flex-column align-items-center" style="width: 70px;">
                    <span class="fw-bold">1</span>
                    <div style="width: 40px; height: 120px; background-color: #99cc66;"></div>
                    <span class="fw-bold text-primary mt-2">Bajo</span>
                </div>
                <!-- Medio -->
                <div class="d-flex flex-column align-items-center" style="width: 70px;">
                    <span class="fw-bold">1</span>
                    <div style="width: 40px; height: 120px; background-color: #ffcc33;"></div>
                    <span class="fw-bold text-primary mt-2">Medio</span>
                </div>
                <!-- Alto -->
                <div class="d-flex flex-column align-items-center" style="width: 70px;">
                    <span class="fw-bold">1</span>
                    <div style="width: 40px; height: 120px; background-color: #ff3333;"></div>
                    <span class="fw-bold text-primary mt-2">Alto</span>
                </div>
                <!-- Muy Alto -->
                <div class="d-flex flex-column align-items-center" style="width: 70px;">
                    <span class="fw-bold">0</span>
                    <div style="width: 40px; height: 5px; background-color: #b3b3b3; margin-top: auto;"></div>
                    <span class="fw-bold text-primary mt-2">Muy Alto</span>
                </div>
            </div>
        </div>

        <!-- Daño potencial vs Patron Estandar -->
        <div class="table-responsive" style="background: linear-gradient(to bottom, #ffffff 60%, #d9d9d9); border-radius: 6px; padding: 20px; box-shadow: inset -10px 0px 20px rgba(0,0,0,0.2); text-align: center;">
            <h5 class="fw-bold mb-3">Daño Potencial vs Patrón Estándar</h5>
            
            <!-- Simulación de gráfico -->
            <div class="position-relative mb-4" style="height: 250px; background: linear-gradient(to bottom, #f2f2f2, #cccccc); border: 1px solid #999; border-radius: 4px;">
                <!-- Líneas y puntos -->
                <svg width="100%" height="100%" viewBox="0 0 600 250">
                    <!-- Línea roja (Riesgo Potencial) -->
                    <polyline fill="none" stroke="red" stroke-width="2" 
                        points="0,230 100,160 200,150 300,145 400,155 500,230" />
                    <!-- Puntos Riesgo Potencial -->
                    <circle cx="0" cy="230" r="4" fill="blue" />
                    <circle cx="100" cy="160" r="4" fill="blue" />
                    <circle cx="200" cy="150" r="4" fill="blue" />
                    <circle cx="300" cy="145" r="4" fill="blue" />
                    <circle cx="400" cy="155" r="4" fill="blue" />
                    <circle cx="500" cy="230" r="4" fill="blue" />
                    
                    <!-- Línea negra punteada (Riesgo Estándar) -->
                    <path d="M0,80 L100,110 L200,140 L300,180 L400,210 L500,230" 
                          stroke="black" stroke-width="2" fill="none" stroke-dasharray="6,4" />
                    <!-- Puntos Riesgo Estándar -->
                    <circle cx="0" cy="80" r="4" fill="red" />
                    <circle cx="100" cy="110" r="4" fill="red" />
                    <circle cx="200" cy="140" r="4" fill="red" />
                    <circle cx="300" cy="180" r="4" fill="red" />
                    <circle cx="400" cy="210" r="4" fill="red" />
                    <circle cx="500" cy="230" r="4" fill="red" />
                </svg>
            </div>

            <!-- Leyenda -->
            <div class="d-flex justify-content-center mb-2 gap-4">
                <div>
                    <span style="color: red;">●</span> <span style="border-bottom: 2px solid red;">Riesgo Potencial</span>
                </div>
                <div>
                    <span style="color: black;">◆</span> <span style="border-bottom: 2px dashed black;">Riesgo Estándar</span>
                </div>
            </div>

            <!-- Tabla de valores -->
            <table class="table table-bordered mb-0 text-center">
                <thead class="table-light">
                    <tr>
                        <th class="text-primary">Muy Bajo</th>
                        <th class="text-primary">Bajo</th>
                        <th class="text-primary">Medio</th>
                        <th class="text-primary">Alto</th>
                        <th class="text-primary">Muy Alto</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>0.00%</td>
                        <td>33.33%</td>
                        <td>33.33%</td>
                        <td>33.33%</td>
                        <td>0.00%</td>
                    </tr>
                    <tr>
                        <td>60.0%</td>
                        <td>30.0%</td>
                        <td>10.0%</td>
                        <td>0.0%</td>
                        <td>0.0%</td>
                    </tr>
                </tbody>
            </table>
        </div>

            @php
        $valores = [
            ['categoria' => 'Barreras Perimetrales', 'valor' => 5.2],
            ['categoria' => 'Seguridad de la Información', 'valor' => 4.8],
        ];

        $niveles = [
            ['label' => 'Óptimo', 'color' => '#1b5e20', 'rango' => [9, 10]],
            ['label' => 'Eficiente', 'color' => '#66bb6a', 'rango' => [8, 8.9]],
            ['label' => 'Regular', 'color' => '#ffca28', 'rango' => [6, 7.9]],
            ['label' => 'Deficiente', 'color' => '#ec407a', 'rango' => [4, 5.9]],
            ['label' => 'Sin Control', 'color' => '#c62828', 'rango' => [0, 3.9]],
        ];

        function getNivelColor($valor, $niveles) {
            foreach ($niveles as $nivel) {
                if ($valor >= $nivel['rango'][0] && $valor <= $nivel['rango'][1]) {
                    return $nivel;
                }
            }
            return end($niveles);
        }
        @endphp

        <style>
            .grafica-vuln-wrapper {
                overflow-x: auto;
                padding-bottom: 20px;
            }

            .grafica-vuln {
                display: flex;
                align-items: flex-end;
                justify-content: space-around;
                height: 300px;
                border-left: 2px solid #000;
                position: relative;
                padding-left: 40px;
                min-width: 600px;
                max-width: 100%;
                margin: auto;
            }

            .barra {
                width: 80px;
                background: linear-gradient(to top, #0f2027, #203a43, #2c5364);
                margin: 0 10px;
                border-radius: 4px;
            }

            .linea-nivel {
                position: absolute;
                left: 0;
                width: 100%;
                height: 1px;
            }

            .etiquetas-nivel {
                position: absolute;
                right: 10px;
                text-align: left;
                font-size: 13px;
                font-weight: bold;
            }

            .flecha {
                position: absolute;
                right: 40px;
                top: 0;
                width: 20px;
                height: 100%;
                background: linear-gradient(to top, black, red, orange, yellow, #66bb6a, #1b5e20);
                border-radius: 4px;
            }

            .flecha::after {
                content: "";
                position: absolute;
                top: -20px;
                left: 3px;
                border-left: 8px solid transparent;
                border-right: 8px solid transparent;
                border-bottom: 20px solid #1b5e20;
            }

            .etiqueta-x {
                text-align: center;
                font-size: 13px;
                margin-top: 6px;
            }
        </style>

        <div class="card shadow-sm mb-5">
            <div class="card-header text-center bg-white">
                <h4 class="fw-bold">Análisis de Vulnerabilidad</h4>
            </div>

            <div class="card-body">
                <div class="grafica-vuln-wrapper">
                    <div class="grafica-vuln">
                        {{-- Líneas horizontales + etiquetas --}}
                        @foreach ($niveles as $index => $nivel)
                            @php
                                $top = ($index * 20) + ($index * 40); // espaciado relativo a 300px total
                            @endphp
                            <div class="linea-nivel" style="top: {{ $top }}px; border-top: 2px solid {{ $nivel['color'] }};"></div>
                            <div class="etiquetas-nivel" style="top: {{ $top - 8 }}px; color: {{ $nivel['color'] }};">
                                {{ $nivel['label'] }}
                            </div>
                        @endforeach

                        {{-- Barras verticales --}}
                        @foreach ($valores as $item)
                            @php
                                $altura = ($item['valor'] / 10) * 300;
                            @endphp
                            <div>
                                <div class="barra" style="height: {{ $altura }}px;"></div>
                                <div class="etiqueta-x">{{ $item['categoria'] }}</div>
                            </div>
                        @endforeach

                        {{-- Flecha tipo escala a la derecha --}}
                        <div class="flecha"></div>
                    </div>
                </div>
            </div>
        </div>


@endsection