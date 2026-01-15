@extends('layouts.app')

@push('scripts')
    <script src="{{ asset('js/cliente/NuevoCliente.js') }}"></script>
    <link href="{{ asset('css/tables.css') }}" rel="stylesheet" type="text/css" />
@endpush

@push('styles')
  <link href="{{ asset('/css/version2/tablesgen2.css?v=1.0.4') }}" rel="stylesheet" type="text/css" />
@endpush


@section('title')
    Métodos
@endsection

@section('content')
<div class="row">
    <div class="col-lg-12">

        <div class="card card-custom gutter-b">
            <div class="card-header bg-white">
                <h3 class="card-title fw-bold text-dark" style="color: white !important;">Clasificación de Riesgos</h3>

                <div class="card-toolbar">

                    <a href="{{  route('analisis.matrizaceptabilidad') }}" class="btn btn-light-primary font-weight-bolder mr-3 ml-3">
                    <i class="la la-arrow-left"></i>Regresar</a>

                </div>

            </div>
            
            <div class="card-body">

                <div class="mb-15">

                    <!-- Primera tabla: Clasificación -->
                    <h5 class="fw-bold mb-3">Tabla de Clasificación</h5>
                    <table class="table table-bordered text-center align-middle mb-5">
                        <thead style="background-color: #003366; color: white;">
                            <tr>
                                <th>Clasificación</th>
                                <th>Valor Mínimo</th>
                                <th>Valor Máximo</th>
                                <th>Consideración</th>
                                <th>Respuesta</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Muy Alto</td>
                                <td style="background-color: #c62828; color: white;">36.1</td>
                                <td style="background-color: #c62828; color: white;">100</td>
                                <td>Inaceptable</td>
                                <td>Acción fundamental inmediata</td>
                            </tr>
                            <tr>
                                <td>Alto</td>
                                <td style="background-color: #ef5350; color: white;">16.1</td>
                                <td style="background-color: #ef5350; color: white;">36</td>
                                <td>Inaceptable</td>
                                <td>Acción fundamental a corto plazo</td>
                            </tr>
                            <tr>
                                <td>Medio</td>
                                <td style="background-color: #fff176;">6.5</td>
                                <td style="background-color: #fff176;">16</td>
                                <td>Inaceptable</td>
                                <td>Acción fundamental a mediano plazo</td>
                            </tr>
                            <tr>
                                <td>Bajo</td>
                                <td style="background-color: #aed581;">1.5</td>
                                <td style="background-color: #aed581;">6.4</td>
                                <td>Tolerable</td>
                                <td>Monitorear</td>
                            </tr>
                            <tr>
                                <td>Muy Bajo</td>
                                <td style="background-color: #c8e6c9;">0.0</td>
                                <td style="background-color: #c8e6c9;">1.4</td>
                                <td>Tolerable</td>
                                <td>Monitorear</td>
                            </tr>
                        </tbody>
                    </table>

                    <div class="d-flex justify-content-center flex-wrap my-4">
                        <div class="mx-4 mb-3 d-flex align-items-center" style="font-size: 1.1rem;">
                            
                            <div style="width: 24px; height: 24px; background-color: #a5d6a7; border: 1px solid #ccc; margin-right: 10px;"></div>
                            <span>Muy Bajo</span>
                        
                        </div>
                        
                        <div class="mx-4 mb-3 d-flex align-items-center" style="font-size: 1.1rem;">
                            
                            <div style="width: 24px; height: 24px; background-color: #63b971; border: 1px solid #ccc; margin-right: 10px;"></div>
                            <span>Bajo</span>
                        
                        </div>
                        
                        <div class="mx-4 mb-3 d-flex align-items-center" style="font-size: 1.1rem;">
                        
                            <div style="width: 24px; height: 24px; background-color: #fff59d; border: 1px solid #ccc; margin-right: 10px;"></div>
                            <span>Medio</span>
                        
                        </div>
                
                        <div class="mx-4 mb-3 d-flex align-items-center" style="font-size: 1.1rem;">
                            <div style="width: 24px; height: 24px; background-color: #ef9a9a; border: 1px solid #ccc; margin-right: 10px;"></div>
                            <span>Alto</span>
                        </div>
                        
                        <div class="mx-4 mb-3 d-flex align-items-center" style="font-size: 1.1rem;">
                            
                            <div style="width: 24px; height: 24px; background-color: #c62828; border: 1px solid #ccc; margin-right: 10px;"></div>
                            <span>Muy Alto</span>
                        
                        </div>
                    
                    </div>

                </div>

                <div class="mb-15">

                    <!-- Segunda tabla: Factor de exposición y probabilidad -->
                    <h5 class="fw-bold mb-3">Tabla de Factor de Exposición y Probabilidad</h5>
                    <div class="table-responsive mb-5">
                        <table class="table table-bordered table-striped text-center align-middle">
                            <thead class="bg-dark text-white">
                                <tr>
                                    <th colspan="2">Factor de Exposición</th>
                                    <th colspan="2">Probabilidad</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $valores = [
                                        ['label' => 'Muy Alta', 'valor' => 36.10, 'color' => 'text-danger fw-bold'],
                                        ['label' => 'Alta', 'valor' => 16.10, 'color' => 'text-warning fw-bold'],
                                        ['label' => 'Media', 'valor' => 6.50, 'color' => 'text-warning'],
                                        ['label' => 'Baja', 'valor' => 1.50, 'color' => 'text-success'],
                                        ['label' => 'Muy Baja', 'valor' => 0.00, 'color' => 'text-success-emphasis']
                                    ];
                                @endphp

                                @foreach ($valores as $item)
                                    <tr>
                                        <td class="{{ $item['color'] }}">{{ $item['label'] }}</td>
                                        <td>{{ $item['valor'] }}</td>
                                        <td class="{{ $item['color'] }}">{{ $item['label'] }}</td>
                                        <td>{{ $item['valor'] }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>


                    <div class="d-flex justify-content-center flex-wrap my-4">
                        <div class="mx-4 mb-3 d-flex align-items-center" style="font-size: 1.1rem;">
                            <div style="width: 24px; height: 24px; background-color: #000; border: 1px solid #ccc; margin-right: 10px;"></div>
                            <span>Muy Bajo</span>
                        
                        </div>
                        
                        <div class="mx-4 mb-3 d-flex align-items-center" style="font-size: 1.1rem;">
                            <div style="width: 24px; height: 24px; background-color: #29eeb9; border: 1px solid #ccc; margin-right: 10px;"></div>
                            <span>Bajo</span>
                        </div>
                        
                        <div class="mx-4 mb-3 d-flex align-items-center" style="font-size: 1.1rem;">
                        
                            <div style="width: 24px; height: 24px; background-color: #eea529; border: 1px solid #ccc; margin-right: 10px;"></div>
                            <span>Medio</span>
                        
                        </div>
                        
                        <div class="mx-4 mb-3 d-flex align-items-center" style="font-size: 1.1rem;">
                            <div style="width: 24px; height: 24px; background-color: #f2c50e; border: 1px solid #ccc; margin-right: 10px;"></div>
                            <span>Alto</span>
                        </div>
                        
                        <div class="mx-4 mb-3 d-flex align-items-center" style="font-size: 1.1rem;">
                            <div style="width: 24px; height: 24px; background-color: #c62828; border: 1px solid #ccc; margin-right: 10px;"></div>
                            <span>Muy Alto</span>
                        </div>

                    </div>

                </div>

                <div class="mb-15">

                    <!-- Tercera tabla: Nivel de Amenaza y Consecuencia -->
                    <h5 class="fw-bold mb-3">Tabla de Nivel de Amenaza y Consecuencia</h5>
                    <div class="table-responsive">
                        <table class="table table-bordered text-center align-middle">
                            <thead class="bg-dark text-white">
                                <tr>
                                    <th colspan="2">Nivel de Amenaza</th>
                                    <th colspan="2">Consecuencia</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $datos = [
                                        ['amenaza' => 'Improbable', 'valor_a' => 0.4, 'consecuencia' => 'Insignificante', 'valor_c' => 0.4],
                                        ['amenaza' => 'Remoto', 'valor_a' => 1.2, 'consecuencia' => 'Leve', 'valor_c' => 1.2],
                                        ['amenaza' => 'Esporádico', 'valor_a' => 2, 'consecuencia' => 'Marginal', 'valor_c' => 2],
                                        ['amenaza' => 'Ocasional', 'valor_a' => 4, 'consecuencia' => 'Grave', 'valor_c' => 4],
                                        ['amenaza' => 'Frecuente', 'valor_a' => 6, 'consecuencia' => 'Crítico', 'valor_c' => 6],
                                        ['amenaza' => 'Habitual', 'valor_a' => 8, 'consecuencia' => 'Desastroso', 'valor_c' => 8],
                                        ['amenaza' => 'Constante', 'valor_a' => 10, 'consecuencia' => 'Catastrófico', 'valor_c' => 10],
                                    ];

                                    function getTextColor($value) {
                                        if ($value >= 8) return 'text-danger fw-bold';
                                        if ($value >= 4) return 'text-warning fw-semibold';
                                        return 'text-success fw-medium';
                                    }
                                @endphp

                                @foreach ($datos as $item)
                                    <tr>
                                        <td class="{{ getTextColor($item['valor_a']) }}">{{ $item['amenaza'] }}</td>
                                        <td>{{ $item['valor_a'] }}</td>
                                        <td class="{{ getTextColor($item['valor_c']) }}">{{ $item['consecuencia'] }}</td>
                                        <td>{{ $item['valor_c'] }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    <div class="d-flex justify-content-center flex-wrap my-4">
                        <div class="mx-4 mb-3 d-flex align-items-center" style="font-size: 1.1rem;">
                            
                            <div style="width: 24px; height: 24px; background-color: #49e7c8; border: 1px solid #ccc; margin-right: 10px;"></div>
                            <span>Improbable/Remoto/Esporádico</span>
                        
                        </div>
                        
                        <div class="mx-4 mb-3 d-flex align-items-center" style="font-size: 1.1rem;">
                            
                            <div style="width: 24px; height: 24px; background-color: #edb441; border: 1px solid #ccc; margin-right: 10px;"></div>
                            <span>Frecuente/Ocasional</span>
                        
                        </div>
                        
                        <div class="mx-4 mb-3 d-flex align-items-center" style="font-size: 1.1rem;">
                        
                            <div style="width: 24px; height: 24px; background-color: #c62828; border: 1px solid #ccc; margin-right: 10px;"></div>
                            <span>Desastroso/Catastrofico</span>
                        
                        </div>
                    
                    </div>

                    <div class="d-flex justify-content-center flex-wrap my-4">
                        <div class="mx-4 mb-3 d-flex align-items-center" style="font-size: 1.1rem;">
                        
                            <div style="width: 24px; height: 24px; background-color: #49e7c8; border: 1px solid #ccc; margin-right: 10px;"></div>
                            <span>Insignificante/Leve/Marginal</span>
                        
                        </div>
                        <div class="mx-4 mb-3 d-flex align-items-center" style="font-size: 1.1rem;">
                        
                            <div style="width: 24px; height: 24px; background-color: #edb441; border: 1px solid #ccc; margin-right: 10px;"></div>
                            <span>Grave/Crítico</span>
                    
                        </div>
                    </div>
                </div>
                <!-- Cuarta Tabla: Matriz Frecuencia e Impacto -->
                <div class="mb-15">
                    <h5 class="fw-bold mb-3">Matriz de Frecuencia vs Impacto</h5>
                    
                    <div class="table-responsive">
                        <table class="table table-bordered text-center align-middle">
                            <thead>
                                <tr>
                                    <th rowspan="2" class="align-middle">Frecuencia</th>
                                    <th colspan="5">Impacto / Consecuencia</th>
                                </tr>
                                <tr>
                                    <th>Insignificante</th>
                                    <th>Bajo</th>
                                    <th>Moderado</th>
                                    <th>Grave</th>
                                    <th>Catastrófico</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Probabilidad Compr.</td>
                                    <td style="background-color: white;">10</td>
                                    <td style="background-color: #ffff00;">25</td>
                                    <td style="background-color: #ffcc00;">50</td>
                                    <td style="background-color: #ff0000; color: white;">75</td>
                                    <td style="background-color: #c00000; color: white;">100</td>
                                </tr>
                                <tr>
                                    <td>Frecuente</td>
                                    <td style="background-color: white;">8</td>
                                    <td style="background-color: #ffff00;">20</td>
                                    <td style="background-color: #ffcc00;">40</td>
                                    <td style="background-color: #ff0000; color: white;">60</td>
                                    <td style="background-color: #c00000; color: white;">80</td>
                                </tr>
                                <tr>
                                    <td>Posible</td>
                                    <td style="background-color: white;">6</td>
                                    <td style="background-color: #c6efce;">15</td>
                                    <td style="background-color: #ffff00;">30</td>
                                    <td style="background-color: #ff9900;">45</td>
                                    <td style="background-color: #ff0000; color: white;">60</td>
                                </tr>
                                <tr>
                                    <td>Raro</td>
                                    <td style="background-color: white;">4</td>
                                    <td style="background-color: white;">10</td>
                                    <td style="background-color: #c6efce;">20</td>
                                    <td style="background-color: #ffff00;">30</td>
                                    <td style="background-color: #ffc000;">40</td>
                                </tr>
                                <tr>
                                    <td>Improbable</td>
                                    <td style="background-color: white;">2</td>
                                    <td style="background-color: white;">5</td>
                                    <td style="background-color: white;">10</td>
                                    <td style="background-color: #d9ead3;">15</td>
                                    <td style="background-color: #c6efce;">20</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <div class="d-flex justify-content-center flex-wrap my-4">
                        <div class="mx-4 mb-3 d-flex align-items-center" style="font-size: 1.1rem;">
                            <div style="width: 24px; height: 24px; background-color: #fff; border: 1px solid #ccc; margin-right: 10px;"></div>
                            <span>Insignificante</span>
                        </div>
                        
                        <div class="mx-4 mb-3 d-flex align-items-center" style="font-size: 1.1rem;">
                            <div style="width: 24px; height: 24px; background-color: #93f476; border: 1px solid #ccc; margin-right: 10px;"></div>
                            <span>Muy Bajo</span>
                        </div>

                        <div class="mx-4 mb-3 d-flex align-items-center" style="font-size: 1.1rem;">
                            <div style="width: 24px; height: 24px; background-color: #f9c700; border: 1px solid #ccc; margin-right: 10px;"></div>
                            <span>Bajo</span>
                        </div>
                            
                        <div class="mx-4 mb-3 d-flex align-items-center" style="font-size: 1.1rem;">
                            <div style="width: 24px; height: 24px; background-color: #eea529; border: 1px solid #ccc; margin-right: 10px;"></div>
                            <span>Medio</span>
                        </div>
                        
                        <div class="mx-4 mb-3 d-flex align-items-center" style="font-size: 1.1rem;">
                            <div style="width: 24px; height: 24px; background-color: red; border: 1px solid #ccc; margin-right: 10px;"></div>
                            <span>Alto</span>
                        </div>
                        
                        <div class="mx-4 mb-3 d-flex align-items-center" style="font-size: 1.1rem;">
                            <div style="width: 24px; height: 24px; background-color: #c62828; border: 1px solid #ccc; margin-right: 10px;"></div>
                            <span>Muy Alto</span>
                        </div>
                        
                    </div>
                
                </div>


                <!-- Quinta Tabla: Matriz de Clasificacion de riesgo -->
                <div class="mb-15">
                    <h5 class="fw-bold mb-3">Matriz de Clasificación de Riesgo</h5>
                    <div class="table-responsive">
                        <table class="table table-bordered text-center align-middle">
                            <thead style="background-color: #003366; color: white;">
                                <tr>
                                    <th>Nivel</th>
                                    <th>Código</th>
                                    <th>Probabilidad Baja</th>
                                    <th>Probabilidad Alta</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Catastófico</td>
                                    <td>A</td>
                                    <td style="background-color: #ff0000; color: white;">50.1%</td>
                                    <td style="background-color: #ff0000; color: white;">100%</td>
                                </tr>
                                <tr>
                                    <td>Grave</td>
                                    <td>B</td>
                                    <td style="background-color: #ffc000;">20.1%</td>
                                    <td style="background-color: #ffff00;">50%</td>
                                </tr>
                                <tr>
                                    <td>Moderado</td>
                                    <td>C</td>
                                    <td style="background-color: #92d050;">10.1%</td>
                                    <td style="background-color: #92d050;">20%</td>
                                </tr>
                                <tr>
                                    <td>Bajo</td>
                                    <td>D</td>
                                    <td>0.1%</td>
                                    <td>10%</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <div class="d-flex justify-content-center flex-wrap my-4">
                        
                        <div class="mx-4 mb-3 d-flex align-items-center" style="font-size: 1.1rem;">
                            <div style="width: 24px; height: 24px; background-color: #fff; border: 1px solid #ccc; margin-right: 10px;"></div>
                            <span>Insignificante</span>
                        </div>
                        
                        <div class="mx-4 mb-3 d-flex align-items-center" style="font-size: 1.1rem;">
                            <div style="width: 24px; height: 24px; background-color: #93f476; border: 1px solid #ccc; margin-right: 10px;"></div>
                            <span>Muy Bajo</span>
                        </div>
                        
                        <div class="mx-4 mb-3 d-flex align-items-center" style="font-size: 1.1rem;">
                            <div style="width: 24px; height: 24px; background-color: #f9c700; border: 1px solid #ccc; margin-right: 10px;"></div>
                            <span>Bajo</span>
                        </div>
                            
                        <div class="mx-4 mb-3 d-flex align-items-center" style="font-size: 1.1rem;">
                            <div style="width: 24px; height: 24px; background-color: #eea529; border: 1px solid #ccc; margin-right: 10px;"></div>
                            <span>Medio</span>
                        </div>
                            
                        <div class="mx-4 mb-3 d-flex align-items-center" style="font-size: 1.1rem;">
                            <div style="width: 24px; height: 24px; background-color: red; border: 1px solid #ccc; margin-right: 10px;"></div>
                            <span>Alto</span>
                        </div>
                        
                    </div>

                </div>


                <!-- //Sexta Tabla: Nivel Control y Exposicion -->

                <div class="mb-15">
                    
                    <h5 class="fw-bold mb-3">Nivel de Control vs Exposición</h5>
                    
                    <div class="table-responsive">
                        <table class="table table-bordered text-center align-middle">
                            <thead style="background-color: #003366; color: white;">
                                <tr>
                                    <th>Nivel de Control</th>
                                    <th>Exposición</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Inoperante</td>
                                    <td>Muy Alta</td>
                                </tr>
                                <tr>
                                    <td>Sin control</td>
                                    <td>Muy Alta</td>
                                </tr>
                                <tr>
                                    <td>Deficiente</td>
                                    <td>Alta</td>
                                </tr>
                                <tr>
                                    <td>Regular</td>
                                    <td>Media</td>
                                </tr>
                                <tr>
                                    <td>Eficiente</td>
                                    <td>Baja</td>
                                </tr>
                                <tr>
                                    <td>Óptimo</td>
                                    <td>Muy Baja</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                
                </div>

            </div>

        </div>

    </div>

</div>
@endsection