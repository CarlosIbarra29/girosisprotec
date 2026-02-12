@extends('layouts.app')
@push('scripts')
	<script src="{{ asset('js/cliente/NuevoCliente.js') }}"></script>
	<link href="{{ asset('css/tables.css') }}" rel="stylesheet" type="text/css" />

@endpush

@push('styles')
  <link href="{{ asset('/css/version2/tablesgen2.css?v=1.0.4') }}" rel="stylesheet" type="text/css" />
@endpush

@section('title')
    Matriz de Aceptabilidad
@endsection
@section('content')
  


    <!--begin::Card-->
    <div class="row">
        <div class="col-lg-12">
            <!--begin::Card-->
            <div class="card card-custom gutter-b">
                <div class="card-header">
                    <h3 class="card-title" style="color: white !important;">Matriz de Aceptabilidad</h3>
                    <div class="card-toolbar">

                        <a href="{{  route('analisis.metodos') }}" class="btn btn-light-primary font-weight-bolder mr-3 ml-3">
                        <i class="la la-calculator"></i></i>Calculos</a>

                        <a href="{{  route('hd.parametros') }}" class="btn btn-light-primary font-weight-bolder mr-3 ml-3">
                        <i class="la la-arrow-left"></i>Regresar</a>

                    </div>
                
                </div>

                <div class="col-lg-12"> 
                    <div class="col-lg-1"></div>
                    <div class="col-lg-10"><br><h4>* Nuestra Matriz de Aceptibilidad Giro by Sisprotec</h4></div>
                    <div class="col-lg-1"></div>
                </div>

                <div class="card-body table-responsive" style="padding-bottom: 0px;">

                    <table class="table table-sm table-bordered align-middle">

                        <tr>
                            <td class="text-left"><span class="badge badge-primary me-2">7</span> Constante</td>
                            <td class="text-custom-blue">10.0</td>
                            <td class="green">4.0</td>
                            <td class="yellow">12.0</td>
                            <td class="red">20.0</td>
                            <td class="red-forte">40.0</td>
                            <td class="red-forte">60.0</td>
                            <td class="red-forte">80.0</td>
                            <td class="red-forte">100.0</td>
                        </tr>
                        <tr>
                            <td class="text-left"><span class="badge badge-primary me-2">6</span> Habitual</td>
                            <td class="text-custom-blue">8.0</td>
                            <td class="green">3.2</td>
                            <td class="yellow">9.6</td>
                            <td class="yellow">16.0</td>
                            <td class="red">32.0</td>
                            <td class="red-forte">48.0</td>
                            <td class="red-forte">64.0</td>
                            <td class="red-forte">80.0</td>
                        </tr>
                        <tr>
                            <td class="text-left"><span class="badge badge-primary me-2">5</span> Frecuente</td>
                            <td class="text-custom-blue">6.0</td>
                            <td class="green">2.4</td>
                            <td class="yellow">7.2</td>
                            <td class="yellow">12.0</td>
                            <td class="red">24.0</td>
                            <td class="red">36.0</td>
                            <td class="red-forte">48.0</td>
                            <td class="red-forte">60.0</td>
                        </tr>
                        <tr>
                            <td class="text-left"><span class="badge badge-primary me-2">4</span> Ocasional</td>
                            <td class="text-custom-blue">4.0</td>
                            <td class="green">1.6</td>
                            <td class="green">4.8</td>
                            <td class="yellow">8.0</td>
                            <td class="yellow">16.0</td>
                            <td class="red">24.0</td>
                            <td class="red">32.0</td>
                            <td class="red-forte">40.0</td>
                        </tr>
                        <tr>
                            <td class="text-left"><span class="badge badge-primary me-2">3</span> Esporádico</td>
                            <td class="text-custom-blue">2.0</td>  
                            <td class="green">0.8</td>
                            <td class="green">2.4</td>
                            <td class="green">4.0</td>
                            <td class="yellow">8.0</td>
                            <td class="yellow">12.0</td>
                            <td class="yellow">16.0</td>
                            <td class="red">20.0</td>
                        </tr>
                        <tr>
                            <td class="text-left"><span class="badge badge-primary me-2">2</span> Remoto</td>
                            <td class="text-custom-blue">1.2</td>
                            <td class="green">0.5</td>
                            <td class="green">1.4</td>
                            <td class="green">2.4</td>
                            <td class="green">4.8</td>
                            <td class="yellow">7.2</td>
                            <td class="yellow">9.6</td>
                            <td class="yellow">12.0</td>
                        </tr>
                        <tr>
                            <td class="text-left"><span class="badge badge-primary me-2">1</span> Improbable</td>
                            <td class="text-custom-blue">0.4</td>
                            <td class="green">0.2</td>
                            <td class="green">0.5</td>
                            <td class="green">0.8</td>
                            <td class="green">1.6</td>
                            <td class="green">2.4</td>
                            <td class="green">3.2</td>
                            <td class="green">4.0</td>
                        </tr>
                        <tr>
                            <!-- <td class="text-left"><span class="badge badge-primary me-2">1</span> Improbable</td> -->
                            <td colspan="2" class="bg-white text-dark border">Amenza</td>
                            <td class="text-custom-blue">0.4</td>
                            <td class="text-custom-blue">1.2</td>
                            <td class="text-custom-blue">2.0</td>
                            <td class="text-custom-blue">4.0</td>
                            <td class="text-custom-blue">6.0</td>
                            <td class="text-custom-blue">8.0</td>
                            <td class="text-custom-blue">10.0</td>
                        </tr>

                        <tr>
                            <th colspan="2" class="bg-white text-dark border">Impacto/Severidad</th>
                            <th><span class="badge border border-dark bg-white text-dark me-2">1</span> Insignificante</th>
                            <th><span class="badge border border-dark bg-white text-dark me-2">2</span> Leve</th>
                            <th><span class="badge border border-dark bg-white text-dark me-2">3</span> Marginal</th>
                            <th><span class="badge border border-dark bg-white text-dark me-2">4</span> Grave</th>
                            <th><span class="badge border border-dark bg-white text-dark me-2">5</span> Crítico</th>
                            <th><span class="badge border border-dark bg-white text-dark me-2">6</span> Desastroso</th>
                            <th><span class="badge border border-dark bg-white text-dark me-2">7</span> Catastrófico</th>
                        </tr>
                    </table>

                </div>

                <div class="legend">
                    <div class="legend-item"><div class="box green"></div> Aceptable</div>
                    <div class="legend-item"><div class="box yellow"></div> Tolerable</div>
                    <div class="legend-item"><div class="box red"></div> Importante</div>
                    <div class="legend-item"><div class="box red-forte"></div> Inaceptable</div>
                </div>

                <div class="foot">
                    Impacto / Severidad: 1 (Insignificante) a 7 (Catastrófico) &nbsp;|&nbsp; Nivel de Amenaza: 1 (Improbable) a 7 (Constante)
                </div>

                <div class="card-body table-responsive" style="padding-bottom: 0px;">

                    <table class="table table-sm  table-bordered align-middle">
                        <thead>
                            <tr>
                                <th rowspan="2" class="align-middle">Clasificación</th>
                                <th colspan="3">Clasificación</th>
                                <th rowspan="2" class="align-middle">Respuesta</th>
                            </tr>
                            <tr>
                                <th>Valor Mínimo</th>
                                <th>Valor Máximo</th>
                                <th>Consideración</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Muy Alto</td>
                                <td class="red-forte">36.1</td>
                                <td class="red-forte">100</td>
                                <td>Inaceptable</td>
                                <td>Acción fundamental inmediata</td>
                            </tr>
                            <tr>
                                <td>Alto</td>
                                <td class="red">16.1</td>
                                <td class="red">36</td>
                                <td>Inaceptable</td>
                                <td>Acción fundamental a corto plazo</td>
                            </tr>
                            <tr>
                                <td>Medio</td>
                                <td class="yellow">6.5</td>
                                <td class="yellow">16</td>
                                <td>Inaceptable</td>
                                <td>Acción fundamental a mediano plazo</td>
                            </tr>
                            <tr>
                                <td>Bajo</td>
                                <td class="green">1.5</td>
                                <td class="green">6.4</td>
                                <td>Tolerable</td>
                                <td>Monitorear</td>
                            </tr>
                            <tr>
                                <td>Muy Bajo</td>
                                <td class="bg-white text-dark">0</td>
                                <td class="bg-white text-dark">1.4</td>
                                <td>Tolerable</td>
                                <td>Monitorear</td>
                            </tr>
                        </tbody>

                    </table>

                    <div class="foot text-right">
                        *Valores establecidos 2025
                    </div>

                </div>
    
            </div>
           <!--end::Card-->
        </div>
    </div>
    <!--end::Card-->


@endsection