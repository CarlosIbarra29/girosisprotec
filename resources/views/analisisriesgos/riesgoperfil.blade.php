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

                    <a href="{{  route('analisis.matrizaceptabilidad') }}" class="btn btn-light-primary font-weight-bolder mr-3 ml-3">
                    <i class="la la-arrow-left"></i>Regresar</a>

                </div>

            </div>
            <div class="card-body">

                <div class="mb-15">

        <!-- Tabla de Niveles de Riesgo por Escenario -->
        <h5 class="fw-bold mb-3">Niveles de Riesgo por Escenario</h5>

        <table class="table table-bordered text-center align-middle mb-5">
            <thead style="background-color: #003366; color: white;">
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
                @foreach ($datos as $num)
                    @php
                        // Clasificación de riesgo con color y nombre
                        if ($num->ipd >= 36.1) {
                            $color = '#c62828'; // Muy Alto
                            $nivel = 'Muy Alto';
                            $textoColor = 'white';
                        } elseif ($num->ipd >= 16.1) {
                            $color = '#ef5350'; // Alto
                            $nivel = 'Alto';
                            $textoColor = 'white';
                        } elseif ($num->ipd >= 6.5) {
                            $color = '#fff176'; // Medio
                            $nivel = 'Medio';
                            $textoColor = '#000';
                        } elseif ($num->ipd >= 1.5) {
                            $color = '#aed581'; // Bajo
                            $nivel = 'Bajo';
                            $textoColor = '#000';
                        } else {
                            $color = '#c8e6c9'; // Muy Bajo
                            $nivel = 'Muy Bajo';
                            $textoColor = '#000';
                        }
                    @endphp
                    <tr>
                        <td>{{ $num->escenario }}</td>
                        <td>{{ $num->ipd }}</td>
                        <td>{{ $num->perfil }}</td>
                        <td style="background-color: {{ $color }}; color: {{ $textoColor }};">
                            {{ $nivel }}
                        </td>
                        <td>-</td>
                        <td>-</td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <!-- Leyenda de colores -->
        <div class="d-flex justify-content-center flex-wrap my-4">
            <div class="mx-4 mb-3 d-flex align-items-center" style="font-size: 1.1rem;">
                <div style="width: 24px; height: 24px; background-color: #c8e6c9; border: 1px solid #ccc; margin-right: 10px;"></div>
                <span>Muy Bajo</span>
            </div>
            <div class="mx-4 mb-3 d-flex align-items-center" style="font-size: 1.1rem;">
                <div style="width: 24px; height: 24px; background-color: #aed581; border: 1px solid #ccc; margin-right: 10px;"></div>
                <span>Bajo</span>
            </div>
            <div class="mx-4 mb-3 d-flex align-items-center" style="font-size: 1.1rem;">
                <div style="width: 24px; height: 24px; background-color: #fff176; border: 1px solid #ccc; margin-right: 10px;"></div>
                <span>Medio</span>
            </div>
            <div class="mx-4 mb-3 d-flex align-items-center" style="font-size: 1.1rem;">
                <div style="width: 24px; height: 24px; background-color: #ef5350; border: 1px solid #ccc; margin-right: 10px;"></div>
                <span>Alto</span>
            </div>
            <div class="mx-4 mb-3 d-flex align-items-center" style="font-size: 1.1rem;">
                <div style="width: 24px; height: 24px; background-color: #c62828; border: 1px solid #ccc; margin-right: 10px;"></div>
                <span>Muy Alto</span>
            </div>
        </div>

        <h5 class="fw-bold mb-3">Matriz de Riesgo (Probabilidad vs Severidad)</h5>

        <style>
            .risk-table td {
                width: 50px;
                height: 50px;
                text-align: center;
                vertical-align: middle;
                font-weight: bold;
                color: black;
            }

            .verde-claro { background-color: #c8e6c9; }
            .verde { background-color: #a5d6a7; }
            .amarillo { background-color: #fff176; }
            .naranja { background-color: #ff7043; }
            .rojo { background-color: #e53935; color: white; }
            .granate { background-color: #b71c1c; color: white; }

            .rotated-header {
                writing-mode: vertical-rl;
                transform: rotate(180deg);
            }

            .point {
                width: 28px;
                height: 28px;
                background-color: black;
                color: white;
                border-radius: 50%;
                display: inline-block;
                line-height: 28px;
            }

            .table-container {
                overflow-x: auto;
            }
        </style>

        <div class="table-container">
            <table class="table table-bordered text-center risk-table">
                <thead>
                    <tr>
                        <th rowspan="2" class="align-middle">Probabilidad</th>
                        <th colspan="7">Impacto / Severidad</th>
                    </tr>
                    <tr>
                        <th>Insignificante <br> (1)</th>
                        <th>Leve <br> (2)</th>
                        <th>Marginal <br> (4)</th>
                        <th>Grave <br> (6)</th>
                        <th>Crítico <br> (8)</th>
                        <th>Desastroso <br> (9)</th>
                        <th>Catastrófico <br> (10)</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Constante (10)</td>
                        <td class="verde"></td>
                        <td class="amarillo"><span class="point">3</span></td>
                        <td class="naranja"></td>
                        <td class="rojo"></td>
                        <td class="granate"></td>
                        <td class="granate"></td>
                        <td class="granate"></td>
                    </tr>
                    <tr>
                        <td>Habitual (8)</td>
                        <td class="verde"></td>
                        <td class="amarillo"></td>
                        <td class="amarillo"></td>
                        <td class="naranja"><span class="point">5</span></td>
                        <td class="rojo"></td>
                        <td class="granate"><span class="point">7</span></td>
                        <td class="granate"></td>
                    </tr>
                    <tr>
                        <td>Frecuente (6)</td>
                        <td class="verde"></td>
                        <td class="amarillo"></td>
                        <td class="amarillo"></td>
                        <td class="naranja"></td>
                        <td class="rojo"></td>
                        <td class="rojo"></td>
                        <td class="granate"></td>
                    </tr>
                    <tr>
                        <td>Ocasional (4)</td>
                        <td class="verde"></td>
                        <td class="verde"></td>
                        <td class="amarillo"></td>
                        <td class="amarillo"><span class="point">8</span></td>
                        <td class="naranja"></td>
                        <td class="rojo"></td>
                        <td class="rojo"></td>
                    </tr>
                    <tr>
                        <td>Esporádico (2)</td>
                        <td class="verde-claro"></td>
                        <td class="verde"></td>
                        <td class="amarillo"></td>
                        <td class="amarillo"></td>
                        <td class="amarillo"></td>
                        <td class="naranja"></td>
                        <td class="rojo"></td>
                    </tr>
                    <tr>
                        <td>Remoto (1)</td>
                        <td class="blanco"></td>
                        <td class="verde-claro"></td>
                        <td class="verde"></td>
                        <td class="verde"></td>
                        <td class="amarillo"></td>
                        <td class="amarillo"></td>
                        <td class="rojo"><span class="point">6</span></td>
                    </tr>
                    <tr>
                        <td>Improbable (0.4)</td>
                        <td class="blanco"></td>
                        <td class="blanco"></td>
                        <td class="verde-claro"></td>
                        <td class="verde"></td>
                        <td class="amarillo"></td>
                        <td class="amarillo"></td>
                        <td class="naranja"></td>
                    </tr>
                </tbody>
            </table>
        </div>

        <!-- Leyenda de colores -->
        <div class="d-flex justify-content-center flex-wrap my-4">
            <div class="mx-4 mb-3 d-flex align-items-center" style="font-size: 1.1rem;">
                <div style="width: 24px; height: 24px; background-color: #c8e6c9; border: 1px solid #ccc; margin-right: 10px;"></div>
                <span>Muy Bajo</span>
            </div>
            <div class="mx-4 mb-3 d-flex align-items-center" style="font-size: 1.1rem;">
                <div style="width: 24px; height: 24px; background-color: #aed581; border: 1px solid #ccc; margin-right: 10px;"></div>
                <span>Bajo</span>
            </div>
            <div class="mx-4 mb-3 d-flex align-items-center" style="font-size: 1.1rem;">
                <div style="width: 24px; height: 24px; background-color: #fff176; border: 1px solid #ccc; margin-right: 10px;"></div>
                <span>Medio</span>
            </div>
            <div class="mx-4 mb-3 d-flex align-items-center" style="font-size: 1.1rem;">
                <div style="width: 24px; height: 24px; background-color: #ef5350; border: 1px solid #ccc; margin-right: 10px;"></div>
                <span>Alto</span>
            </div>
            <div class="mx-4 mb-3 d-flex align-items-center" style="font-size: 1.1rem;">
                <div style="width: 24px; height: 24px; background-color: #c62828; border: 1px solid #ccc; margin-right: 10px;"></div>
                <span>Muy Alto</span>
            </div>
        </div>


@endsection