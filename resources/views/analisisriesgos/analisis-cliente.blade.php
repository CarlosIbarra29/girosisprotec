@extends('layouts.app')
@push('scripts')

  <script src="{{ asset('js/cliente/ListadoAnalisis.js') }}"></script>
  <meta name="csrf-token" content="{{ csrf_token() }}" />
@endpush
@section('title')
  Analisis de riesgos sociales
@endsection
@section('content')

    <div class="d-flex flex-row">

    <!--begin::List-->
    <div class="flex-row-fluid">
        <div class="d-flex flex-column flex-grow-1">

            <!--begin::Row-->
            <div class="row">
                <div class="col-xl-12">

                <!--begin::Card-->
                    <div class="card card-custom">
                        <div class="card-header">
                            <div class="card-title">
                      <span class="card-icon">
                        <i class="flaticon2-file text-primary"></i>
                      </span>
                                <h3 class="card-label">Analisis de riesgos sociales ({{ $cliente->organizacion }})</h3>
                            </div>
                            <div class="card-toolbar">
                                  <!-- <a href="{{ route('analisis.listadoanalisis') }}" class="btn btn-light-primary font-weight-bolder mr-3 ml-3">
                                    <i class="la la-arrow-left"></i>Regresar</a> -->

                              <a href="{{ url()->previous() }}" class="btn btn-light-primary font-weight-bolder mr-3 ml-3">
                                  <i class="la la-arrow-left"></i>Regresar
                              </a>
                              <a href="{{ route('analisis.graficassociales', $cliente->id) }}" class="btn btn-light-primary font-weight-bolder mr-3 ml-3">
                                <i class="la la-bar-chart"></i>Graficas
                              </a>

                              <a href="{{ route('analisis.seleccionaanalisis', $cliente->id) }}" class="btn btn-light-primary font-weight-bolder mr-3 ml-3">
                                <i class="la la-plus"></i>Nuevo
                              </a>
                            </div>
                        </div>
                        <div class="card-body">

                          <div class="text-center">
                            <a href="{{ route('analisis.analisiscliente', $cliente->id) }}" class="btn btn-light-primary font-weight-bolder mr-3 ml-3">
                                <i class="fas fa-exclamation-triangle"></i>Riesgos Sociales
                            </a>
                            
                            <a href="{{ route('analisis.analisistecnologicoscli', $cliente->id) }}" class="btn btn-light-primary font-weight-bolder mr-3 ml-3">
                                <i class="la la-laptop"></i>Riesgos Técnologicos
                            </a>
                              
                            <a href="{{ route('analisis.analisisnaturalescli', $cliente->id) }}" class="btn btn-light-primary font-weight-bolder mr-3 ml-3">
                                <i class="fas fa-mountain"></i>Riesgos Naturales
                            </a>
                          
                          </div>

                          <div class="collapse" id="collapseExample">
                              <div class="card card-body">
                                <!--begin: Search Form-->
                                <form class="mb-15">
                                  <div class="row mb-6">
                                    <div class="col-lg-6 mb-lg-0 mb-6">
                                      <label>Nombre del cliente:</label>
                                      <input type="text" class="form-control datatable-input" data-col-index="1" />
                                    </div>
                                  </div>

                                  <div class="row mt-8">
                                    <div class="col-lg-12">
                                      <button class="btn btn-primary btn-primary--icon" id="kt_search">
                                        <span><i class="la la-search"></i><span>Buscar</span></span>
                                      </button>&#160;&#160;
                                      <button class="btn btn-secondary btn-secondary--icon" id="kt_reset">
                                        <span><i class="la la-close"></i><span>Limpiar</span></span>
                                      </button>
                                    </div>
                                  </div>
                                </form>
                              </div>
                          </div>

                            <!--begin: Datatable-->
                            <table class="table table-hover table-checkable" id="kdatatable_clientes_inactivos">
                                <thead>
                                <tr>


                                  <th>Esc.</th>
                                  <th>Criterio</th>
                                  <th>Punto Normativo</th>
                                  <th>Ubicacion del Riesgo</th>
                                  <th>Factor de riesgo</th>
                                  <th>Eventos de riesgo</th>
                                  <th>Recursos Expuestos</th>
                                  <th>Fuente de Riesgo</th>
                                  <th>Medidas de Prevención y Protección</th>
                                  <th>Nivel de control</th>
                                  

                                  <th>Exp.</th>
                                  <th>Prob</th>
                                  <th>Amz.</th>
                                  <th>Fac.</th>
                                  <th>Sev.</th>
                                  <th>Fac.</th>
                                  <th>IPD</th>
                                  <th>Riesgo Marginal</th>
                                  <th>Indice Criticidad</th>
                                  <th>Perfil Riesgo</th>
                                  <th>Nivel Riesgo</th>
                                  <th>Respuesta</th>
                                  <th>Impactos a la organización</th>
                                  <th>Estrategia</th>
                                  <th>Contramedidas</th>
                                  <th>Costo de Solución</th>



                                  <th class="text-center">Acciones</th>
                                </tr>
                                </thead>

                                <tbody>
                                  @php
                                      $totalIPD = 0;
                                      foreach($data as $unid) {
                                          $ipd = (round(($unid->factorExp?->factor_dato ?? 0) * 
                                                       ($unid->hdProbabilidadif?->calculo_probabilidad ?? 0))) * 
                                                       ($unid->hdConsecuencia?->calculo_consecuencia ?? 0);
                                          $totalIPD += $ipd;
                                      }
                                  @endphp

                                  @foreach($data as $unid)
                                    <tr>
                                      <td>E.{{ $unid->id }}</td>
                                      <td>{{ $unid->BarrerasPerimetrales->alcance }}</td>
                                      <td>{{ $unid->punto_control }}</td>
                                      <td>{{ $unid->ubicacion_riesgo }}</td>
                                      <td>{{ $unid->factores_riesgo }}</td>
                                      <td>{{ $unid->eventos_riesgo }}</td>
                                      <td>{{ $unid->recursos_expuestos }}</td>
                                      <td>{{ $unid->fuente_riesgo }}</td>
                                      <td>{{ $unid->medidas_prevencion }}</td>
                                      <td>{{ $unid->hdNivelControl->nivel_control }}</td>
                                      <td>@if($unid->factorExp)
                                              {{ $unid->factorExp->factor_exposicion }}
                                          @else
                                              <span>Sin asignar</span>
                                          @endif
                                      </td>
                                      <td>@if($unid->hdProbabilidadif)
                                              {{ $unid->hdProbabilidadif->probabilidad }}
                                          @else
                                              <span>Sin asignar</span>
                                          @endif
                                      </td>
                                      <td>@if($unid->hdAmenaza)
                                              {{ $unid->hdAmenaza->nivel_amenaza }}
                                          @else
                                              <span>Sin asignar</span>
                                          @endif
                                      </td>
                                      <td>
                                        
                                        {{round(($unid->factorExp?->factor_dato ?? 0) * ($unid->hdProbabilidadif?->calculo_probabilidad ?? 0))}}

                                      </td>

                                      <td>@if($unid->hdConsecuencia)
                                              {{ $unid->hdConsecuencia->consecuencia }}
                                          @else
                                              <span>Sin asignar</span>
                                          @endif
                                      </td>
                                      <td>
                                        @if($unid->hdConsecuencia)
                                              {{ $unid->hdConsecuencia->calculo_consecuencia }}
                                        @else
                                            <span>0</span>
                                        @endif
                                      </td>

                                      <td>
                                        {{(round(($unid->factorExp?->factor_dato ?? 0) * ($unid->hdProbabilidadif?->calculo_probabilidad ?? 0))) * ($unid->hdConsecuencia?->calculo_consecuencia ?? 0) }}
                                      </td>
                                      
                                      <td>
                                        {{
                                          ((($calc = (round(($unid->factorExp?->factor_dato ?? 0) * ($unid->hdProbabilidadif?->calculo_probabilidad ?? 0))) * 
                                            ($unid->hdConsecuencia?->calculo_consecuencia ?? 0)) - 6.4) < 6.4) ? 0 : $calc - 6.4
                                        }}
                                      </td>

                                      <td>
                                        @php
                                          $ipd = (round(($unid->factorExp?->factor_dato ?? 0) * 
                                                        ($unid->hdProbabilidadif?->calculo_probabilidad ?? 0))) * 
                                                        ($unid->hdConsecuencia?->calculo_consecuencia ?? 0);

                                          $indiceCriticidad = $totalIPD > 0 ? round(($ipd / $totalIPD) * 100, 2) : 0;
                                        @endphp
                                        {{ $indiceCriticidad }}%
                                      </td>
                                      
                                      <td>
                                          ({{ 
                                              round(($unid->factorExp?->factor_dato ?? 0) * ($unid->hdProbabilidadif?->calculo_probabilidad ?? 0))
                                              . '-' .
                                              round($unid->hdConsecuencia?->calculo_consecuencia ?? 0)
                                          }})
                                      </td>

                                        @php
                                            $riesgo = $unid->nivel_riesgo ?? 0;

                                            if ($riesgo >= 36.10) {
                                                $color = '#cc0000'; // Muy Alto
                                                $nivel = 'Muy Alto';
                                            } elseif ($riesgo >= 16.10) {
                                                $color = '#ff0000'; // Alto
                                                $nivel = 'Alto';
                                            } elseif ($riesgo >= 6.50) {
                                                $color = '#ffff00'; // Medio
                                                $nivel = 'Medio';
                                            } elseif ($riesgo >= 1.50) {
                                                $color = '#99ff99'; // Bajo
                                                $nivel = 'Bajo';
                                            } else {
                                                $color = ''; // Muy Bajo
                                                $nivel = 'Muy Bajo';
                                            }
                                        @endphp
                                      <td @if($color) style="background-color: {{ $color }}; text-align: center;" @else style="text-align: center;" @endif >
                                          {{ $nivel }}
                                      </td>

                                        @php
                                          switch ($nivel) {
                                              case 'Muy Bajo':
                                                  $impacto = 'Riesgo Aceptable';
                                                  break;
                                              case 'Bajo':
                                                  $impacto = 'Monitorear';
                                                  break;
                                              case 'Medio':
                                                  $impacto = 'Acción fundamental a mediano Plazo';
                                                  break;
                                              case 'Alto':
                                                  $impacto = 'Acción fundamental a corto plazo';
                                                  break;
                                              case 'Muy Alto':
                                                  $impacto = 'Acción fundamental inmediata';
                                                  break;
                                              default:
                                                  $impacto = 'Sin clasificar';
                                                  break;
                                          }
                                        @endphp
                                      <td>{{ $impacto }}</td>
                                      
                                      <td>
                                          @php
                                              $impactosFiltrados = $unid->ImpactosSocial->where('analisis_riesgo_social_id', $unid->id);

                                              $tiposImpacto = [
                                                  1 => 'Patrimonial',
                                                  2 => 'Operacional',
                                                  3 => 'Comercial',
                                                  4 => 'Reputacional',
                                                  5 => 'Humano',
                                                  6 => 'Ambiental',
                                                  7 => 'Comunidad'
                                              ];

                                              $nombresImpactos = $impactosFiltrados->pluck('id_impacto')->map(function ($valor) use ($tiposImpacto) {
                                                  return $tiposImpacto[$valor] ?? 'Desconocido';
                                              });
                                          @endphp

                                          @if ($nombresImpactos->count())
                                              {{ $nombresImpactos->implode(', ') }}
                                          @else
                                              <span>Sin registros</span>
                                          @endif
                                      </td>

                                      <td>Sin Registro</td>
                                      <td>{{ $unid->contramedidas }}</td>
                                      <td>Sin Registro</td>

                                      <td class="text-center">
                                        <a href="{{ route('analisis.detalleanalisissocial',[$cliente->id , $unid->id]) }}" class="btn btn-sm btn-clean btn-hover-icon-success btn-icon mt-1" data-toggle="tooltip" data-theme="dark" title="Detalle de analisis del riesgo" ><i class="flaticon-eye"></i></a>


                                        <a href="{{ route('analisis.analisisanalisissocial',[$cliente->id , $unid->id]) }}" class="btn btn-sm btn-clean btn-hover-icon-success btn-icon edit-riesgo"   class="btn btn-sm btn-clean btn-hover-icon-success btn-icon mt-1" data-toggle="tooltip" data-theme="dark" title="Editar analisis del riesgo" ><i class="flaticon-edit"></i></a>

                                        <button class="btn btn-sm btn-clean btn-hover-icon-success btn-icon edit-riesgo"  data-toggle="tooltip" data-theme="dark" title="Eliminar analisis del riesgo" > <span class="svg-icon svg-icon-md"> <i class="flaticon-delete"></i></span>
                                        </button>
                                      </td>
                                    </tr>
                                  @endforeach
                                </tbody>

                                <tfoot>
                                <tr>
                                  <th>Esc.</th>
                                  <th>Criterio</th>
                                  <th>Punto Normativo</th>
                                  <th>Ubicacion del Riesgo</th>
                                  <th>Factor de riesgo</th>
                                  <th>Eventos de riesgo</th>
                                  <th>Recursos Expuestos</th>
                                  <th>Fuente de Riesgo</th>
                                  <th>Medidas de Prevención y Protección</th>
                                  <th>Nivel de control</th>
                                  <th>Exp.</th>
                                  <th>Prob</th>
                                  <th>Amz.</th>
                                  <th>Fac.</th>
                                  <th>Sev.</th>
                                  <th>Fac.</th>
                                  <th>IPD</th>
                                  <th>Riesgo Marginal</th>
                                  <th>Indice Criticidad</th>
                                  <th>Perfil Riesgo</th>
                                  <th>Nivel Riesgo</th>
                                  <th>Respuesta</th>
                                  <th>Impactos a la organización</th>
                                  <th>Estrategia</th>
                                  <th>Contramedidas</th>
                                  <th>Costo de Solución</th>
                                  <th class="text-center">Acciones</th>
                                </tr>
                                </tfoot>

                            </table>
                            <!--end: Datatable-->

                            <input type="hidden" id="datatable_i18n" value="{{ asset('/js/datatables/i18n/es-mx.json') }}">
                            {{-- <input type="hidden" id="clientedatatable" value="{{ route('cliente.clientelistadodatatable') }}"> --}}

                        </div>
                    </div>
                    <!--end::Card-->
                    <!--end::Card-->
                </div>

            </div>
            <!--end::Row-->
        </div>
    </div>
    <!--end::List-->
</div>

{{-- M O D A L S --}}

  <input type="hidden" id="datatable_i18n" value="{{ asset('/js/datatables/i18n/es-mx.json') }}">


@endsection