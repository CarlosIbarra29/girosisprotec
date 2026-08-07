@extends('layouts.app')

@push('scripts')
  <script src="{{ asset('js/cliente/ListadoAnalisis.js?v=3.1.2') }}"></script>
  <meta name="csrf-token" content="{{ csrf_token() }}" />
  <!-- <link rel="stylesheet" href="https://cdn.datatables.net/fixedheader/3.5.0/css/fixedHeader.bootstrap4.min.css"> -->
  <script src="https://cdn.datatables.net/fixedheader/3.5.0/js/dataTables.fixedHeader.min.js"></script>
@endpush

@push('styles')
  <link href="{{ asset('/css/version2/listadoanalisis.css?v=4.0.6') }}" rel="stylesheet" type="text/css" />
@endpush

@section('title')
  Analisis de riesgos
@endsection

@section('content') 

<div class="d-flex flex-row giro-list-page">
  <!--begin::List-->
  <div class="flex-row-fluid">
    <div class="d-flex flex-column flex-grow-1">
      <!--begin::Row-->
      <div class="row">
        <div class="col-xl-12">
          <!--begin::Card-->
          <div class="card card-custom giro-list-card">
            <div class="card-header giro-list-header">
              <div class="card-title giro-list-titlebox">
                <span class="card-icon">
                  <i class="flaticon2-file text-primary"></i>
                </span>
                <h3 class="card-label">
                  Analisis de riesgos ({{ $cliente->organizacion }})
                </h3>
              </div>
              <div class="card-toolbar giro-list-toolbar">
                <a href="{{ route('analisis.generaranalisis', [$cliente->id, 1, 0, 1]) }}"
                   class="btn btn-light-primary font-weight-bolder mr-3 ml-3">
                  <i class="la la-calculator"></i> Calcular Riesgo
                </a>

                <a href="{{ route('analisis.graficassociales', $cliente->id) }}"
                   class="btn btn-light-primary font-weight-bolder mr-3 ml-3">
                  <i class="la la-tachometer"></i> KPI's
                </a>

                <a href="#"
                   class="btn btn-light-primary font-weight-bolder mr-3 ml-3 active disabled"
                   aria-disabled="true"
                   tabindex="-1"
                   style="pointer-events: none;  border-color: #ced4da !important; box-shadow: none !important;">
                  <i class="la la-project-diagram"></i> Analisis de Escenarios
                </a>
 
                <a href="{{ route('analisis.documentoejecutivo', $cliente->id) }}"
                   class="btn btn-light-primary font-weight-bolder mr-3 ml-3">
                  <i class="la la-file-alt"></i> Generar Documento 
                </a>

                {{-- Botón modo edición (oculto) --}}
                <!-- <button id="btnEditarCeldas" class="btn btn-warning font-weight-bolder mr-3 ml-3 d-none">
                  <i class="la la-edit"></i> Modo edición
                </button> -->
              </div>
            </div>

            <div class="edit-legend giro-edit-legend alert alert-light border mb-3" role="note" aria-label="Ayuda de edición">
              <strong class="mr-3">Campos editables</strong>
              <span class="legend-item mr-3">
                <span class="legend-dot" style="
                  display:inline-block;width:10px;height:10px;border-radius:50%;
                  background: var(--camel-700); margin-right:.35rem;"></span>
                Marcados con punto
              </span>
              <span class="legend-item mr-3"><span class="legend-icon">✎</span> Texto (doble clic)</span>
              <span class="legend-item mr-3"><span class="legend-icon">📅</span> Fecha (clic)</span>
              <span class="legend-item"><span class="legend-icon">▾</span> Select (clic)</span>
            </div>

            <div class="card-body giro-list-body">
              <!-- <div class="giro-list-summary" aria-label="Resumen de análisis">
                <div class="giro-summary-main">
                  <span class="giro-summary-kicker">Matriz de escenarios</span>
                  <h4>Libro de análisis social</h4>
                  <p>Arrastra el borde derecho de cada encabezado para ajustar el ancho de columna como en Excel.</p>
                </div>
                <div class="giro-summary-stats">
                  <div class="giro-stat-pill">
                    <span>Registros</span>
                    <strong>{{ count($data) }}</strong>
                  </div>
                  <div class="giro-stat-pill">
                    <span>Columnas</span>
                    <strong>53</strong>
                  </div>
                </div>
              </div> -->

              <!-- <div class="text-center mb-4">
                <a href="{{ route('analisis.analisiscliente', $cliente->id) }}" class="btn btn-light-primary font-weight-bolder mr-3 ml-3">
                  <i class="fas fa-exclamation-triangle"></i>Riesgos Sociales
                </a>
                <a href="{{ route('analisis.analisistecnologicoscli', $cliente->id) }}" class="btn btn-light-primary font-weight-bolder mr-3 ml-3">
                  <i class="la la-laptop"></i>Riesgos Técnologicos
                </a>
                <a href="{{ route('analisis.analisisnaturalescli', $cliente->id) }}" class="btn btn-light-primary font-weight-bolder mr-3 ml-3">
                  <i class="fas fa-mountain"></i>Riesgos Naturales
                </a>
              </div> -->

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
                          <span>
                            <i class="la la-search"></i>
                            <span>Buscar</span>
                          </span>
                        </button>&nbsp;&nbsp;
                        <button class="btn btn-secondary btn-secondary--icon" id="kt_reset">
                          <span>
                            <i class="la la-close"></i>
                            <span>Limpiar</span>
                          </span>
                        </button>
                      </div>
                    </div>
                  </form>
                </div>
              </div>

              <!--begin: Datatable-->
              <div class="table-filters-wrapper has-floating giro-table-zone">
                <div id="tbl-scroll" class="table-responsive giro-table-scroll">
                  <table class="table table-hover table-checkable giro-analysis-table" id="kdatatable_clientes_inactivos" data-resizable-table="true">
                    <thead>
                      <tr class="quadrant-row">
                        <th colspan="27" class="quadrant-title quadrant-1"></th>
                        <th colspan="26" class="quadrant-title quadrant-2">RIESGO RESIDUAL</th>
                      </tr>
                       <tr class="main-header-row">
                        <th>
                          Esc.
                          <button type="button"
                                  class="btn btn-light-primary btn-sm btn-filters-toggle ml-2"
                                  title="Ocultar filtros">
                            <i class="la la-filter"></i>
                          </button>
                        </th>
                        <th><b>Fecha Registro</b></th>
                        <th>Criterio</th>
                        <th>Punto Normativo</th>
                        <th>Ubicacion del Riesgo</th>
                        <th>Factor de riesgo</th>
                        <th>Eventos de riesgo</th>
                        <th>Recursos Expuestos</th>
                        <th>Fuente de Riesgo</th>
                        <th>Medidas de Prevención</th>
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
                        <th>Impactos organización</th>
                        <th>Estrategia</th>
                        <th>Contramedidas</th>
                        <th>Costo de Solución</th>

                        {{-- Nuevos campos --}}
                        <th><b>Nivel de control2</b></th>
                        <th><b>#3</b></th>
                        <th><b>Exp.3</b></th>
                        <th><b>Prob</b></th>
                        <th><b>Amz.</b></th>
                        <th><b>Fac.2</b></th>
                        <th><b>Sev.</b></th>
                        <th><b>Fac.3</b></th>
                        <th><b>IPD2</b></th>
                        <th><b>Riesgo Marginal2</b></th>
                        <th><b>Nvo. Perfil</b></th>
                        <th><b>Indice Reducción</b></th>
                        <th><b>Indice Reducción Porcentual</b></th>
                        <th><b>Nivel Riesgo2</b></th>
                        <th><b>Aceptabilidad</b></th>
                        <th><b>Solución Eficaz</b></th>
                        <th><b>Observaciones</b></th>
                        <th><b>Plan Contingencia</b></th>
                        <th><b>Responsable</b></th>
                        <th><b>Area</b></th>
                        <th><b>Fecha Fin</b></th>
                        <th><b>Estatus</b></th>
                        <th><b>Controles Asegurados</b></th>
                        <th><b></b></th>

                        <th class="text-center">Acciones</th>
                      </tr>
                    </thead>

                    <tbody>
                      @php
                        $totalIPD = 0;
                        foreach($data as $unid) {
                          $fac1Loop = round(
                            (float)($unid->factorExp?->factor_dato ?? 0)
                            * (float)($unid->hdProbabilidadif?->calculo_probabilidad ?? 0),
                            1
                          );

                          $ipd = (float)($unid->hdConsecuencia?->calculo_consecuencia ?? 0) * $fac1Loop;
                          $totalIPD += $ipd;
                        }
                      @endphp

                      @foreach($data as $unid)
                        <tr data-row-id="{{ $unid->id }}">
                          <!-- <td>E.{{ $unid->id }}</td> -->
                          <td>E.{{ $loop->iteration }}</td>

                          {{-- Fechas EDITABLES --}}
                          @php
                            $fiRaw = $unid->fecha_inicio ? \Carbon\Carbon::parse($unid->fecha_inicio)->format('Y-m-d') : '';
                            $fiUI  = $fiRaw ? \Carbon\Carbon::parse($fiRaw)->format('d/m/Y') : null;
                            $ffRaw = $unid->fecha_fin ? \Carbon\Carbon::parse($unid->fecha_fin)->format('Y-m-d') : '';
                            $ffUI  = $ffRaw ? \Carbon\Carbon::parse($ffRaw)->format('d/m/Y') : null;
                          @endphp

                          <td class="date-cell"
                              data-id="{{ $unid->id }}"
                              data-field="fecha_inicio">
                            <span class="date-text">{{ $fiUI ?? 'Elige Fecha' }}</span>
                            <input type="date"
                                   class="date-input form-control form-control-sm"
                                   value="{{ $fiRaw }}"
                                   style="display:none; min-width: 170px;">
                          </td>


                          <td>{{ $unid->BarrerasPerimetrales->alcance }}</td>

                          {{-- Punto Normativo (editable opcional) --}}
                          <td class="text-long">
                            <div class="clamp-3"
                                 data-id="{{ $unid->id }}"
                                 data-field="punto_control"
                                 contenteditable="false">
                              {{ $unid->punto_control }}
                            </div>
                            <a href="#" class="toggle-more ml-2">Ver más</a>
                          </td>

                          {{-- Ubicación (editable opcional) --}}
                          <td class="text-long">
                            <div class="clamp-3"
                                 data-id="{{ $unid->id }}"
                                 data-field="ubicacion_riesgo"
                                 contenteditable="false">
                              {{ $unid->ubicacion_riesgo ?: '' }}
                            </div>
                            <a href="#" class="toggle-more ml-2">Ver más</a>
                          </td>

                          {{-- Factor / Eventos / Recursos / Fuente (solo lectura) --}}
                          <td class="text-long">
                            <div class="clamp-3"
                                 data-id="{{ $unid->id }}"
                                 data-field="factores_riesgo"
                                 contenteditable="false">
                              {{ $unid->factores_riesgo }}
                            </div>
                            <a href="#" class="toggle-more ml-2">Ver más</a>
                          </td>

                          <td class="text-long">
                            <div class="clamp-3"
                                 data-id="{{ $unid->id }}"
                                 data-field="eventos_riesgo"
                                 contenteditable="false">
                              {{ $unid->eventos_riesgo }}
                            </div>
                            <a href="#" class="toggle-more ml-2">Ver más</a>
                          </td>

                          <td class="text-long">
                            <div class="clamp-3"
                                 data-id="{{ $unid->id }}"
                                 data-field="recursos_expuestos"
                                 contenteditable="false">
                              {{ $unid->recursos_expuestos }}
                            </div>
                            <a href="#" class="toggle-more ml-2">Ver más</a>
                          </td>

                          <td class="text-long">
                            <div class="clamp-3"
                                 data-id="{{ $unid->id }}"
                                 data-field="fuente_riesgo"
                                 contenteditable="false">
                              {{ $unid->fuente_riesgo }}
                            </div>
                            <a href="#" class="toggle-more ml-2">Ver más</a>
                          </td>

                          {{-- Medidas de Prevención (EDITABLE) --}}
                          <td class="text-long">
                            <div class="cell-edit clamp-3 {{ empty(trim($unid->medidas_prevencion ?? '')) ? 'is-empty' : '' }}"
                                 data-id="{{ $unid->id }}"
                                 data-field="medidas_prevencion"
                                 contenteditable="false">{{ $unid->medidas_prevencion }}</div>
                            <a href="#" class="toggle-more ml-2">Ver más</a>
                          </td>

                          <td>{{ $unid->hdNivelControl->nivel_control }}</td>

                          <td class="nowrap-num">
                            @if($unid->factorExp)
                              {{ $unid->factorExp->factor_exposicion }}
                            @else
                              <!-- <span>Sin asignar</span> -->
                            @endif
                          </td>

                          <td class="nowrap-num">
                            @if($unid->hdProbabilidadif)
                              {{ $unid->hdProbabilidadif->probabilidad }}
                            @else
                              <!-- <span>Sin asignar</span> -->
                            @endif
                          </td>

                          @php
                            $fac1 = round(
                              (float)($unid->factorExp?->factor_dato ?? 0)
                              * (float)($unid->hdProbabilidadif?->calculo_probabilidad ?? 0),
                              1
                            );

                            $amz1Label = '';
                            if(isset($nivelesAmenaza) && $nivelesAmenaza->count()){
                              $closest = $nivelesAmenaza->sortBy(function($n) use ($fac1){
                                return abs((float)$n->calculo_nivel_amenaza - (float)$fac1);
                              })->first();
                              if ($closest) $amz1Label = $closest->nivel_amenaza;
                            }
                          @endphp

                          <td class="nowrap-num">
                            <span class="amz1-val" data-id="{{ $unid->id }}">{{ $amz1Label }}</span>
                          </td>

                          <td class="nowrap-num">
                            <span class="fac1-val" data-id="{{ $unid->id }}">
                              {{ number_format($fac1, 1, '.', '') }}
                            </span>
                          </td>

                          <td class="nowrap-num">
                            @if($unid->hdConsecuencia)
                              {{ $unid->hdConsecuencia->consecuencia }}
                            @else
                              <!-- <span>Sin asignar</span> -->
                            @endif
                          </td>

                          <td class="nowrap-num">
                            @if($unid->hdConsecuencia)
                              {{ $unid->hdConsecuencia->calculo_consecuencia }}
                            @else
                              <span>0</span>
                            @endif
                          </td>

                          @php
                            $ipdBase = (float)($unid->hdConsecuencia?->calculo_consecuencia ?? 0) * (float)$fac1;
                          @endphp

                          <td class="nowrap-num">
                            <span class="ipd1-val" data-id="{{ $unid->id }}">{{ number_format($ipdBase, 1, '.', '') }}</span>
                          </td>

                          @php
                            $riesgoMarginal = (($ipdBase - 6.4) < 0) ? 0 : ($ipdBase - 6.4);
                          @endphp

                          <td class="nowrap-num">
                            {{ number_format($riesgoMarginal, 1, '.', '') }}
                          </td>

                          <td class="nowrap-num">
                            @php
                              $indiceCriticidad = $totalIPD > 0 ? round(($ipdBase / $totalIPD) * 100, 2) : 0;
                            @endphp

                            {{ $indiceCriticidad }}%
                          </td>

                          <td class="nowrap-num">
                            ({{ number_format((($unid->factorExp?->factor_dato ?? 0) * ($unid->hdProbabilidadif?->calculo_probabilidad ?? 0)), 1, '.', '') . '-' . number_format(($unid->hdConsecuencia?->calculo_consecuencia ?? 0), 1, '.', '') }})
                          </td>

                          @php
                            $riesgo = (float)($unid->nivel_riesgo ?? 0);

                            if ($riesgo >= 36.10) {
                              $nivel = 'Muy Alto';
                              $nivelClass = 'risk-level-muyalto';
                            } elseif ($riesgo >= 16.10) {
                              $nivel = 'Alto';
                              $nivelClass = 'risk-level-alto';
                            } elseif ($riesgo >= 6.50) {
                              $nivel = 'Medio';
                              $nivelClass = 'risk-level-medio';
                            } elseif ($riesgo >= 1.50) {
                              $nivel = 'Bajo';
                              $nivelClass = 'risk-level-bajo';
                            } else {
                              $nivel = 'Muy Bajo';
                              $nivelClass = 'risk-level-muybajo';
                            }
                          @endphp

                          <td class="nowrap-num td-risk-level td-risk-original {{ $nivelClass }}">
                            <span class="risk-level-label">{{ $nivel }}</span>
                          </td>

                          @php
                            switch ($nivel) {
                              case 'Muy Bajo': $impacto = 'Riesgo Aceptable'; break;
                              case 'Bajo':     $impacto = 'Monitorear'; break;
                              case 'Medio':    $impacto = 'Acción fundamental a mediano Plazo'; break;
                              case 'Alto':     $impacto = 'Acción fundamental a corto plazo'; break;
                              case 'Muy Alto': $impacto = 'Acción fundamental inmediata'; break;
                              default:         $impacto = 'Sin clasificar'; break;
                            }
                          @endphp

                          <td>{{ $impacto }}</td>

                          {{-- Impactos: solo lectura --}}
                          <td class="text-long">
                            @php
                              $tiposImpacto = [
                                1=>'Patrimonial', 2=>'Operacional', 3=>'Comercial', 4=>'Reputacional',
                                5=>'Humano', 6=>'Ambiental', 7=>'Comunidad'
                              ];
                              $nombresImpactos = collect();
                              if (!empty($unid->ImpactosSocial)) {
                                $impactosFiltrados = $unid->ImpactosSocial
                                  ->where('analisis_riesgo_social_id', $unid->id);
                                $nombresImpactos = $impactosFiltrados
                                  ->pluck('id_impacto')
                                  ->map(fn($v) => $tiposImpacto[$v] ?? 'Desconocido');
                              }
                              $txtImp = $nombresImpactos->isNotEmpty()
                                ? $nombresImpactos->implode(', ')
                                : '';
                            @endphp
                            <div class="clamp-3">{{ $txtImp }}</div>
                            <a href="#" class="toggle-more ml-2">Ver más</a>
                          </td>

                          {{-- Estrategia (EDITABLE) --}}
                          @php
                            $estrategiaVal = (int)($unid->estrategias ?? 0);
                          @endphp
                          <td>
                            <select class="form-control gray_area sel-estrategia"
                                    data-id="{{ $unid->id }}"
                                    data-field="estrategias"
                                    disabled>
                              <option value="">Seleccionar</option>
                              <option value="1" {{ $estrategiaVal === 1 ? 'selected' : '' }}>Aceptar</option>
                              <option value="2" {{ $estrategiaVal === 2 ? 'selected' : '' }}>Mitigar</option>
                              <option value="3" {{ $estrategiaVal === 3 ? 'selected' : '' }}>Compartir</option>
                              <option value="4" {{ $estrategiaVal === 4 ? 'selected' : '' }}>Evitar</option>
                            </select>
                          </td>

                          {{-- Contramedidas (EDITABLE) --}}
                          <td class="text-long">
                            <div class="cell-edit clamp-3 {{ empty(trim($unid->contramedidas ?? '')) ? 'is-empty' : '' }}"
                                 data-id="{{ $unid->id }}"
                                 data-field="contramedidas"
                                 contenteditable="false">{{ $unid->contramedidas }}</div>
                            <a href="#" class="toggle-more ml-2">Ver más</a>
                          </td>

                          {{-- Costo de Solución (EDITABLE) --}}
                          <td>
                            <div class="cell-edit clamp-3 cell-money {{ empty(trim((string)($unid->costo_sol ?? ''))) ? 'is-empty' : 'has-value' }}"
                                 data-id="{{ $unid->id }}"
                                 data-field="costo_sol"
                                 contenteditable="false">{{ $unid->costo_sol }}</div>
                          </td>

                          {{-- NIVEL DE CONTROL 2 (SELECT) --}}
                          @php
                            $nc2 = $unid->nivel_control2;
                          @endphp
                          <td>
                            <select class="form-control gray_area sel-nivel-control2"
                                    data-id="{{ $unid->id }}"
                                    data-field="nivel_control2"
                                    disabled>
                              <option value="null" {{ empty($nc2) ? 'selected' : '' }}>Seleccionar</option>
                              <option value="1" {{ (int)$nc2===1 ? 'selected' : '' }}>Inoperante</option>
                              <option value="2" {{ (int)$nc2===2 ? 'selected' : '' }}>Sin control</option>
                              <option value="3" {{ (int)$nc2===3 ? 'selected' : '' }}>Deficiente</option>
                              <option value="4" {{ (int)$nc2===4 ? 'selected' : '' }}>Regular</option>
                              <option value="5" {{ (int)$nc2===5 ? 'selected' : '' }}>Eficiente</option>
                              <option value="6" {{ (int)$nc2===6 ? 'selected' : '' }}>Optimo</option>
                            </select>
                          </td>

                          {{-- #3 / Exp.3 derivados --}}
                          <td class="nowrap-num">
                            <span class="nc3-val" data-id="{{ $unid->id }}">
                              {{ optional($unid->NivelExp2)->nc_calculo ?? '' }}
                            </span>
                          </td>
                          <td class="nowrap-num">
                            <span class="exp3-val" data-id="{{ $unid->id }}">
                              {{ optional($unid->NivelExp2)->exposicion ?? '' }}
                            </span>
                          </td>

                          {{-- NIVEL DE PROBABILIDAD2 (SELECT) --}}
                          @php
                            $np2 = $unid->probabilidad_id2;
                          @endphp
                          <td>
                            <select class="form-control gray_area sel-nivel-probabilidad2"
                                    data-id="{{ $unid->id }}"
                                    data-field="probabilidad_id2"
                                    disabled>
                              <option value="null" {{ empty($np2) ? 'selected' : '' }}>Seleccionar</option>
                              <option value="1" {{ (int)$np2===1 ? 'selected' : '' }}>Muy Alta</option>
                              <option value="2" {{ (int)$np2===2 ? 'selected' : '' }}>Alta</option>
                              <option value="3" {{ (int)$np2===3 ? 'selected' : '' }}>Media</option>
                              <option value="4" {{ (int)$np2===4 ? 'selected' : '' }}>Baja</option>
                              <option value="5" {{ (int)$np2===5 ? 'selected' : '' }}>Muy Baja</option>
                            </select>
                          </td>

                          @php
                            $amenazas = [
                              0.4=>'Improbable', 1.2=>'Remoto', 2.0=>'Esporádico',
                              4.0=>'Ocasional', 6.0=>'Frecuente', 9.0=>'Habitual', 10.0=>'Constante',
                            ];
                            $amzLabel2 = '';
                            if ($unid->fac2 !== null) {
                              $v = (float) $unid->fac2; $label = null;
                              foreach ($amenazas as $th => $lbl) {
                                if ($v < (float)$th) break; $label = $lbl;
                              }
                              if ($label === null) $label = reset($amenazas);
                              $amzLabel2 = $label;
                            }
                          @endphp

                          <td class="nowrap-num">
                            <span class="amz2-val" data-id="{{ $unid->id }}">{{ $amzLabel2 }}</span>
                          </td>

                          <td class="nowrap-num">
                            <span class="fac2-val" data-id="{{ $unid->id }}">
                              {{ $unid->fac2 !== null ? number_format((float)$unid->fac2, 1, '.', '') : '' }}
                            </span>
                          </td>

                          {{-- NIVEL DE SEVERIDAD/CONSECUENCIA 2 (SELECT) --}}
                          @php
                            $nsr2 = $unid->sev2;
                          @endphp
                          <td>
                            <select class="form-control gray_area sel-nivel-sev2"
                                    data-id="{{ $unid->id }}"
                                    data-field="sev2"
                                    disabled>
                              <option value="null" {{ empty($nsr2) ? 'selected' : '' }}>Seleccionar</option>
                              <option value="1" {{ (int)$nsr2===1 ? 'selected' : '' }}>Insignificante</option>
                              <option value="2" {{ (int)$nsr2===2 ? 'selected' : '' }}>Leve</option>
                              <option value="3" {{ (int)$nsr2===3 ? 'selected' : '' }}>Marginal</option>
                              <option value="4" {{ (int)$nsr2===4 ? 'selected' : '' }}>Grave</option>
                              <option value="5" {{ (int)$nsr2===5 ? 'selected' : '' }}>Critico</option>
                              <option value="6" {{ (int)$nsr2===6 ? 'selected' : '' }}>Desastroso</option>
                              <option value="7" {{ (int)$nsr2===7 ? 'selected' : '' }}>Catastrófico</option>
                            </select>
                          </td>

                          @php
                            $fac3Val = '';
                            if ($unid->sev2) {
                              $c = \App\Models\Hd\Consecuencia::find($unid->sev2);
                              if ($c) $fac3Val = number_format((float)$c->calculo_consecuencia, 1, '.', '');
                            }
                            $ipd2Val = ($unid->fac2 !== null && is_numeric($fac3Val))
                                      ? number_format((float)$unid->fac2 * (float)$fac3Val, 1, '.', '')
                                      : '';
                          @endphp

                          <td class="nowrap-num">
                            <span class="fac3-val" data-id="{{ $unid->id }}">{{ $fac3Val }}</span>
                          </td>

                          <td class="nowrap-num">
                            <span class="ipd2-val" data-id="{{ $unid->id }}">{{ $ipd2Val }}</span>
                          </td>

                          @php
                            $rm2Val = '';
                            if (is_numeric($ipd2Val)) {
                              $diff = (float)$ipd2Val - 6.4;
                              $rm2Val = number_format(($diff < 0 ? 0 : $diff), 1, '.', '');
                            }
                          @endphp

                          <td class="nowrap-num">
                            <span class="rm2-val" data-id="{{ $unid->id }}">{{ $rm2Val }}</span>
                          </td>

                          @php
                              $nvPerfil = '';
                              $fac2Num  = $unid->fac2;
                              $fac3Num  = is_numeric($fac3Val) ? (float)$fac3Val : null;

                              if ($fac2Num !== null && $fac3Num !== null) {
                                  $nvPerfil = '('
                                      . number_format((float)$fac2Num, 1, '.', '')
                                      . '-'
                                      . number_format((float)$fac3Num, 1, '.', '')
                                      . ')';
                              }
                          @endphp
                          <td class="nowrap-num">
                            <span class="perfil2-val" data-id="{{ $unid->id }}">{{ $nvPerfil }}</span>
                          </td>

                          @php
                            $irVal = '';
                            if (is_numeric($ipd2Val)) $irVal = number_format((float)$ipdBase - (float)$ipd2Val, 1, '.', '');
                          @endphp
                          <td class="nowrap-num">
                            <span class="ir-val" data-id="{{ $unid->id }}">{{ $irVal }}</span>
                          </td>

                          @php
                            $irpVal = '';
                            if (is_numeric($ipd2Val) && $ipdBase > 0) {
                              $irpVal = number_format((1 - ((float)$ipd2Val / (float)$ipdBase)) * 100, 1, '.', '') . '%';
                            }
                          @endphp
                          <td class="nowrap-num">
                            <span class="irp-val" data-id="{{ $unid->id }}">{{ $irpVal }}</span>
                          </td>

                          @php
                            $nivelR2Txt = '';
                            $aceptTxt   = '';
                            if (is_numeric($ipd2Val)) {
                              $nr = \App\Models\Hd\NivelRiesgo::where('min','<=',(float)$ipd2Val)
                                ->where('max','>=',(float)$ipd2Val)->first();
                              if ($nr) { $nivelR2Txt = $nr->nivel_riesgo; $aceptTxt = $nr->aceptabilidad; }
                            }

                            $nivelR2Norm = trim(mb_strtolower($nivelR2Txt ?? '', 'UTF-8'));

                            $nr2Class = '';
                            switch ($nivelR2Norm) {
                              case 'muy bajo':
                                $nr2Class = 'risk-level-muybajo';
                                break;
                              case 'bajo':
                                $nr2Class = 'risk-level-bajo';
                                break;
                              case 'medio':
                                $nr2Class = 'risk-level-medio';
                                break;
                              case 'alto':
                                $nr2Class = 'risk-level-alto';
                                break;
                              case 'muy alto':
                                $nr2Class = 'risk-level-muyalto';
                                break;
                            }

                            $accClass = '';
                            if (strtolower($aceptTxt) === 'aceptable')      $accClass = 'acc-acept';
                            elseif (strtolower($aceptTxt) === 'no aceptable') $accClass = 'acc-noacept';
                          @endphp

                          <td class="nowrap-num td-nr2 td-risk-level td-risk-residual {{ $nr2Class }}">
                            <span class="nivel2-val risk-level-label" data-id="{{ $unid->id }}">{{ $nivelR2Txt }}</span>
                          </td>

                          <td class="nowrap-num td-acept {{ $accClass }}">
                            <span class="acept-val" data-id="{{ $unid->id }}">{{ $aceptTxt }}</span>
                          </td>

                          @php
                            $solEf = null;
                            $accLower = strtolower($aceptTxt ?? '');
                            if ($accLower === 'aceptable')      $solEf = 'SI';
                            elseif ($accLower === 'no aceptable') $solEf = 'NO';
                          @endphp

                          <td class="nowrap-num td-sol">
                            <span class="sol-eficaz-val" data-id="{{ $unid->id }}">{{ $solEf ?? '' }}</span>
                          </td>

                          {{-- Observaciones / Plan / Responsable (EDITABLES) --}}
                          <td class="text-long">
                            <div class="cell-edit clamp-3 {{ empty(trim($unid->observaciones ?? '')) ? 'is-empty' : '' }}"
                                 data-id="{{ $unid->id }}"
                                 data-field="observaciones"
                                 contenteditable="false">{{ $unid->observaciones }}</div>
                            <a href="#" class="toggle-more ml-2">Ver más</a>
                          </td>

                          <td class="text-long">
                            <div class="cell-edit clamp-3 {{ empty(trim($unid->plan ?? '')) ? 'is-empty' : '' }}"
                                 data-id="{{ $unid->id }}"
                                 data-field="plan"
                                 contenteditable="false">{{ $unid->plan }}</div>
                            <a href="#" class="toggle-more ml-2">Ver más</a>
                          </td>

                          <td class="text-long">
                            <div class="cell-edit clamp-3 {{ empty(trim($unid->responsable ?? '')) ? 'is-empty' : '' }}"
                                 data-id="{{ $unid->id }}"
                                 data-field="responsable"
                                 contenteditable="false">{{ $unid->responsable }}</div>
                            <a href="#" class="toggle-more ml-2">Ver más</a>
                          </td>

                          <td class="text-long">
                            <div class="cell-edit clamp-3 {{ empty(trim($unid->area_responsable ?? '')) ? 'is-empty' : '' }}"
                                 data-id="{{ $unid->id }}"
                                 data-field="area_responsable"
                                 contenteditable="false">{{ $unid->area_responsable }}</div>
                            <a href="#" class="toggle-more ml-2">Ver más</a>
                          </td>

                          <td class="date-cell"
                              data-id="{{ $unid->id }}"
                              data-field="fecha_fin">
                            <span class="date-text">{{ $ffUI ?? 'Elige Fecha' }}</span>
                            <input type="date"
                                   class="date-input form-control form-control-sm"
                                   value="{{ $ffRaw }}"
                                   style="display:none; min-width: 170px;">
                          </td>

                          @php $st = (int)($unid->estatus_riesgo ?? null); @endphp
                          <td>
                            <select class="form-control gray_area sel-estatus"
                                    data-id="{{ $unid->id }}"
                                    data-field="estatus_riesgo"
                                    disabled>
                              <option value="null" {{ empty($st) ? 'selected' : '' }}>Seleccionar</option>
                              <option value="1" {{ $st===1 ? 'selected' : '' }}>Abierta</option>
                              <option value="2" {{ $st===2 ? 'selected' : '' }}>Proceso</option>
                              <option value="3" {{ $st===3 ? 'selected' : '' }}>Ejecutada</option>
                            </select>
                          </td>

                          @php $seg = (int)($unid->seg_control ?? null); @endphp
                          <td>
                            <select class="form-control gray_area sel-seg-control"
                                    data-id="{{ $unid->id }}"
                                    data-field="seg_control"
                                    disabled>
                              <option value="null" {{ empty($seg) ? 'selected' : '' }}>Seleccionar</option>
                              <option value="1" {{ $seg===1 ? 'selected' : '' }}>Si</option>
                              <option value="2" {{ $seg===2 ? 'selected' : '' }}>No</option>
                            </select>
                          </td>

                          @php
                            $val = $unid->seg_control ?? 0;
                            if ($val == 1)      { $color2 = 'green'; $vlcontrol = 'Riesgo Gestionado'; }
                            elseif ($val == 2)  { $color2 = 'red';   $vlcontrol = 'Riesgo No Gestionado'; }
                            else                { $color2 = '';      $vlcontrol = 'NA'; }
                          @endphp

                          <td class="td-gestion {{ $val == 1 ? 'gestion-si' : ($val == 2 ? 'gestion-no' : 'gestion-na') }}">
                            <p class="gestion-label">{{ $vlcontrol }}</p>
                          </td>

                          <td class="text-center col-actions">
                            <a href="{{ route('analisis.detalleanalisissocial',[$cliente->id , $unid->id]) }}"
                               class="btn btn-sm btn-clean btn-hover-icon-success btn-icon mt-1"
                               data-toggle="tooltip"
                               data-theme="dark"
                               title="Detalle de analisis del riesgo">
                              <i class="flaticon-eye"></i>
                            </a>

                            <a href="{{ route('analisis.analisisanalisissocial',[$cliente->id , $unid->id]) }}"
                               class="btn btn-sm btn-clean btn-hover-icon-success btn-icon mt-1"
                               data-toggle="tooltip"
                               data-theme="dark"
                               title="Editar analisis del riesgo">
                              <i class="flaticon-edit"></i>
                            </a>

                            <button type="button"
                                    class="btn btn-sm btn-clean btn-hover-icon-success btn-icon mt-1"
                                    onclick="deleteanalisis('E.{{ $loop->iteration }}', {{ $unid->id }})"
                                    data-toggle="tooltip"
                                    data-theme="dark"
                                    title="Eliminar analisis del riesgo">
                              <span class="svg-icon svg-icon-md">
                                <i class="flaticon-delete"></i>
                              </span>
                            </button>
                          </td>
                        </tr>
                      @endforeach
                    </tbody>

                    <tfoot>
                      <tr>
                        <th>Esc.</th>
                        <th><b>Fecha Registro</b></th>
                        <th>Criterio</th>
                        <th>Punto Normativo</th>
                        <th>Ubicacion del Riesgo</th>
                        <th>Factor de riesgo</th>
                        <th>Eventos de riesgo</th>
                        <th>Recursos Expuestos</th>
                        <th>Fuente de Riesgo</th>
                        <th>Medidas de Prevención</th>
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
                        <th>Impactos organización</th>
                        <th>Estrategia</th>
                        <th>Contramedidas</th>
                        <th>Costo de Solución</th>

                        <th><b>Nivel de control2</b></th>
                        <th><b>#3</b></th>
                        <th><b>Exp.3</b></th>
                        <th><b>Prob</b></th>
                        <th><b>Amz.</b></th>
                        <th><b>Fac.2</b></th>
                        <th><b>Sev.</b></th>
                        <th><b>Fac.3</b></th>
                        <th><b>IPD2</b></th>
                        <th><b>Riesgo Marginal2</b></th>
                        <th><b>Nvo. Perfil</b></th>
                        <th><b>Indice Reducción</b></th>
                        <th><b>Indice Reducción Porcentual</b></th>
                        <th><b>Nivel Riesgo2</b></th>
                        <th><b>Aceptabilidad</b></th>
                        <th><b>Solución Eficaz</b></th>
                        <th><b>Observaciones</b></th>
                        <th><b>Plan Contingencia</b></th>
                        <th><b>Responsable</b></th>
                        <th><b>Area</b></th>
                        <th><b>Fecha Fin</b></th>
                        <th><b>Estatus</b></th>
                        <th><b>Controles Asegurados</b></th>
                        <th><b></b></th>
                        <th class="text-center">Acciones</th>
                      </tr>
                    </tfoot>
                  </table>
                </div>
              </div>
              <!--end: Datatable-->

              <input type="hidden"
                     id="datatable_i18n"
                     value="{{ asset('/js/datatables/i18n/es-mx.json') }}">
            </div>
          </div>
          <!--end::Card-->
        </div>
      </div>
      <!--end::Row-->
    </div>
  </div>
  <!--end::List-->
</div>

{{-- JS: Click-to-edit (texto), selects por clic y fechas con datepicker --}}
<script>
  document.addEventListener('DOMContentLoaded', function(){

    // ===== Utils =====
    function normalizeText(t){
      const s = (t || '').trim();
      return /^sin registro$/i.test(s) ? '' : s;
    }
    function isEmptyText(t){
      return (t || '')
        .replace(/\u00A0/g,' ')
        .replace(/\s+/g,' ')
        .trim() === '';
    }
    function ymdToDMY(ymd){
      if(!ymd) return '';
      const [y,m,d] = ymd.split('-');
      if(!y || !m || !d) return ymd;
      return `${d}/${m}/${y}`;
    }
    function toNum(x){
      if (x == null) return NaN;
      return parseFloat(String(x).replace(',', '.'));
    }
    function _norm(s){
      return (s||'').toString().trim().toLowerCase();
    }

    // ===== Derivados =====
    function setIR(row){
      const irEl = row && row.querySelector('.ir-val');
      if (!irEl) return;

      const ipd1 = toNum(row.querySelector('.ipd1-val')?.textContent || '');
      const ipd2 = toNum(row.querySelector('.ipd2-val')?.textContent || '');

      if (!isFinite(ipd1) || !isFinite(ipd2)) {
        irEl.textContent = '';
        return;
      }

      irEl.textContent = (ipd1 - ipd2).toFixed(1);
    }

    function setIRP(row){
      const irpEl = row && row.querySelector('.irp-val');
      if (!irpEl) return;

      const ipd1 = toNum(row.querySelector('.ipd1-val')?.textContent || '');
      const ipd2 = toNum(row.querySelector('.ipd2-val')?.textContent || '');

      if (!isFinite(ipd1) || !isFinite(ipd2) || ipd1 <= 0) {
        irpEl.textContent = '';
        return;
      }

      irpEl.textContent = `${((1 - (ipd2 / ipd1)) * 100).toFixed(1)}%`;
    }

    function setPerfil(row, data){
      const perfilEl = row && row.querySelector('.perfil2-val');
      if (!perfilEl) return;

      const f2 = (data && data.fac2 != null) ? data.fac2 : toNum(row.querySelector('.fac2-val')?.textContent || '');
      const f3 = (data && data.fac3 != null) ? data.fac3 : toNum(row.querySelector('.fac3-val')?.textContent || '');

      if (isNaN(f2) || isNaN(f3)) perfilEl.textContent = '';
      else perfilEl.textContent = `(${Number(f2).toFixed(1)}-${Number(f3).toFixed(1)})`;
    }

    // ===== Colores =====
    function colorNivelRiesgo2(td, txt){
      if (!td) return;

      td.classList.remove(
        'risk2-bajo',
        'risk2-medio',
        'risk2-alto',
        'risk2-muyalto',
        'risk-level-muybajo',
        'risk-level-bajo',
        'risk-level-medio',
        'risk-level-alto',
        'risk-level-muyalto'
      );

      td.style.backgroundColor = '';
      td.style.color = '';

      td.classList.add('td-risk-level', 'td-risk-residual');

      const t = _norm(txt);

      if (t === 'muy bajo') {
        td.classList.add('risk-level-muybajo');
      } else if (t === 'bajo') {
        td.classList.add('risk-level-bajo');
      } else if (t === 'medio') {
        td.classList.add('risk-level-medio');
      } else if (t === 'alto') {
        td.classList.add('risk-level-alto');
      } else if (t === 'muy alto') {
        td.classList.add('risk-level-muyalto');
      }
    }

    function colorAceptabilidad(td, txt){
      if (!td) return;

      td.classList.remove('acc-acept', 'acc-noacept');
      td.style.backgroundColor = '';
      td.style.color = '';

      const t = _norm(txt);

      if (t === 'aceptable' || t === 'aceptables'){
        td.classList.add('acc-acept');
      } else if (t === 'no aceptable' || t === 'no aceptables'){
        td.classList.add('acc-noacept');
      }
    }

    function updateGestionCell(row, segValue){
      const td = row && row.querySelector('.td-gestion');
      const label = td && td.querySelector('.gestion-label');
      if (!td || !label) return;

      td.classList.remove('gestion-si', 'gestion-no', 'gestion-na');

      const val = parseInt(segValue, 10);

      if (val === 1) {
        td.classList.add('gestion-si');
        label.textContent = 'Riesgo Gestionado';
      } else if (val === 2) {
        td.classList.add('gestion-no');
        label.textContent = 'Riesgo No Gestionado';
      } else {
        td.classList.add('gestion-na');
        label.textContent = 'NA';
      }
    }

    function applyRowColors(row){
      const nr2El = row.querySelector('.nivel2-val');
      if (nr2El) colorNivelRiesgo2(nr2El.closest('td'), nr2El.textContent);

      const acEl  = row.querySelector('.acept-val');
      if (acEl) colorAceptabilidad(acEl.closest('td'), acEl.textContent);
    }

    function setSolEficaz(row, aceptTxt){
      const el = row && row.querySelector('.sol-eficaz-val');
      if (!el) return;

      const t = (aceptTxt || '').toString().trim().toLowerCase();

      el.textContent =
        (t === 'aceptable' || t === 'aceptables') ? 'SI' :
        (t === 'no aceptable' || t === 'no aceptables') ? 'NO' :
        '';
    }

    function hasRealOverflow(el){
      if (!el) return false;

      const text = (el.textContent || '')
        .replace(/\u00A0/g, ' ')
        .replace(/\s+/g, ' ')
        .trim();

      // Si está vacío o muy corto, jamás mostrar "Ver más"
      if (!text || text.length <= 60) return false;

      const hadClamp = el.classList.contains('clamp-3');

      // Forzamos medición estable
      el.classList.add('clamp-3');

      const computed = window.getComputedStyle(el);
      let lineHeight = parseFloat(computed.lineHeight);

      if (!isFinite(lineHeight) || lineHeight <= 0) {
        const fontSize = parseFloat(computed.fontSize) || 12;
        lineHeight = fontSize * 1.2;
      }

      const maxThreeLinesHeight = (lineHeight * 3) + 4;

      // Medimos el alto completo sin clamp
      el.classList.remove('clamp-3');

      const fullHeight = el.scrollHeight;

      // Regresamos el estado anterior
      if (hadClamp) {
        el.classList.add('clamp-3');
      } else {
        el.classList.remove('clamp-3');
      }

      return fullHeight > maxThreeLinesHeight;
    }

    function refreshToggleMore(scope = document){
      let cells = [];

      if (scope instanceof Element && scope.classList.contains('text-long')) {
        cells = [scope];
      } else if (scope instanceof Element) {
        cells = Array.from(scope.querySelectorAll('.text-long'));
      } else {
        cells = Array.from(document.querySelectorAll('.text-long'));
      }

      cells.forEach((cell) => {
        const content = cell.querySelector('.clamp-3, .cell-edit, div');
        const link = cell.querySelector('.toggle-more');

        if (!content || !link) return;

        const isExpanded = !content.classList.contains('clamp-3');

        // Para medir siempre cerrado
        if (isExpanded) content.classList.add('clamp-3');

        const shouldShow = hasRealOverflow(content);

        if (shouldShow) {
          link.classList.remove('is-hidden');

          if (isExpanded) {
            content.classList.remove('clamp-3');
            link.textContent = 'Ver menos';
          } else {
            content.classList.add('clamp-3');
            link.textContent = 'Ver más';
          }
        } else {
          link.classList.add('is-hidden');
          content.classList.add('clamp-3');
          link.textContent = 'Ver más';
        }
      });
    }

    // ===== Ver más / Ver menos =====
    document.addEventListener('click', function(e){
      if(!e.target.classList.contains('toggle-more')) return;
      if (e.target.classList.contains('is-hidden')) return;

      e.preventDefault();
      const link = e.target;
      const target = link.previousElementSibling;
      if(!target) return;

      target.classList.toggle('clamp-3');
      link.textContent = target.classList.contains('clamp-3') ? 'Ver más' : 'Ver menos';
    });

    const token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

    // Cola por fila para los campos residuales.
    // Garantiza que Nivel de control 2, Probabilidad y Severidad
    // se guarden y calculen en el mismo orden en que el usuario los cambia.
    const residualRequestQueue = new Map();

    function enqueueResidualRequest(id, task) {
      const previous = residualRequestQueue.get(id) || Promise.resolve();

      const next = previous
        .catch(() => {})
        .then(task);

      residualRequestQueue.set(id, next);

      next.finally(() => {
        if (residualRequestQueue.get(id) === next) {
          residualRequestQueue.delete(id);
        }
      });

      return next;
    }

    // =========================================================
    // A) TEXTO: doble-clic para editar
    // =========================================================
    function startEditText(el){
      if (!el || !el.classList.contains('cell-edit')) return;
      if (el.getAttribute('contenteditable') === 'true') return;

      el.dataset.orig = normalizeText(el.textContent);

      el.setAttribute('contenteditable','true');
      el.classList.remove('clamp-3');

      if (el.classList.contains('is-empty') || isEmptyText(el.textContent)) {
        el.textContent = '';
        el.classList.remove('is-empty');
      }

      const range = document.createRange();
      const sel = window.getSelection();
      range.selectNodeContents(el);
      range.collapse(false);
      sel.removeAllRanges();
      sel.addRange(range);
      el.focus();
    }

    document.addEventListener('dblclick', (e)=>{
      const el = e.target.closest('.cell-edit');
      if (!el) return;
      startEditText(el);
    });

    document.addEventListener('keydown', (e)=>{
      const el = e.target;
      if (!el || !el.classList || !el.classList.contains('cell-edit')) return;
      if (el.getAttribute('contenteditable') !== 'true') return;

      if (e.key === 'Enter' && (e.ctrlKey || e.metaKey)) {
        e.preventDefault();
        el.blur();
      }

      if (e.key === 'Escape') {
        e.preventDefault();
        if (el.dataset.orig != null) el.textContent = el.dataset.orig;
        el.blur();
      }
    });

    document.addEventListener('focusout', async (e)=>{
      const el = e.target;
      if (!el.classList || !el.classList.contains('cell-edit')) return;
      if (el.getAttribute('contenteditable') !== 'true') return;

      const nuevoRaw = normalizeText(el.textContent);
      const origRaw  = normalizeText(el.dataset.orig || '');

      const nuevoEmpty = isEmptyText(nuevoRaw);
      const origEmpty  = isEmptyText(origRaw);

      el.setAttribute('contenteditable','false');
      el.classList.add('clamp-3');

      if (nuevoEmpty) el.classList.add('is-empty');
      else el.classList.remove('is-empty');

      if ((nuevoEmpty && origEmpty) || (!nuevoEmpty && !origEmpty && nuevoRaw.trim() === origRaw.trim())) return;

      const id    = el.dataset.id;
      const field = el.dataset.field;

      el.classList.add('saving');

      try {
        const resp = await fetch("{{ route('analisis.updateCell') }}", {
          method: 'POST',
          headers: {
            'Content-Type':'application/json',
            'Accept':'application/json',
            'X-CSRF-TOKEN': token
          },
          credentials: 'same-origin',
          body: JSON.stringify({ id, field, value: (nuevoEmpty ? null : nuevoRaw.trim()) })
        });

        const data = await resp.json();
        el.classList.remove('saving');

        if (resp.ok && data.ok) {
          el.classList.add('saved');
          setTimeout(()=>el.classList.remove('saved'), 1200);
          el.dataset.orig = nuevoEmpty ? '' : nuevoRaw.trim();

          const textLong = el.closest('.text-long');
          if (textLong) {
            requestAnimationFrame(() => refreshToggleMore(textLong));
          }
        } else {
          throw new Error(data.message || 'Error al guardar');
        }
      } catch (err) {
        el.classList.remove('saving');
        el.classList.add('error');
        setTimeout(()=>el.classList.remove('error'), 1200);

        el.textContent = origRaw;
        if (origEmpty) el.classList.add('is-empty');
        else el.classList.remove('is-empty');

        console.error(err);
        alert('No se pudo guardar el cambio.');
      }
    });

    // =========================================================
    // B) SELECTS: clic en la celda para habilitar temporalmente
    // =========================================================
    const selQuery = 'select.sel-nivel-control2, select.sel-estatus, select.sel-seg-control, select.sel-nivel-probabilidad2, select.sel-nivel-sev2, select.sel-estrategia';

    document.addEventListener('pointerdown', (e) => {
      const td = e.target.closest('td');
      if (!td) return;

      const sel = td.querySelector(selQuery);
      if (!sel || !sel.disabled) return;

      sel.disabled = false;
      setTimeout(()=>{ try{ sel.focus(); }catch(_){} }, 0);
    });

    document.addEventListener('blur', (e)=>{
      const sel = e.target;
      if (!(sel && sel.tagName === 'SELECT')) return;
      if (!sel.matches(selQuery)) return;
      setTimeout(()=>{ sel.disabled = true; }, 150);
    }, true);

    document.addEventListener('change', async (e)=>{
      const sel = e.target;
      if (!(sel && sel.tagName==='SELECT' && sel.matches(selQuery))) return;

      const id    = sel.dataset.id;
      const field = sel.dataset.field;
      let value   = sel.value;
      value = isNaN(parseInt(value,10)) ? null : parseInt(value,10);

      const isResidualField = ['nivel_control2', 'probabilidad_id2', 'sev2'].includes(field);

      sel.classList.add('saving');

      const executeUpdate = async () => {
        try {
          const resp = await fetch("{{ route('analisis.updateCell') }}", {
            method:'POST',
            headers:{
              'Content-Type':'application/json',
              'Accept':'application/json',
              'X-CSRF-TOKEN': token
            },
            credentials:'same-origin',
            body: JSON.stringify({ id, field, value })
          });

          const data = await resp.json();
          sel.classList.remove('saving');

          if (resp.ok && data.ok){
            sel.classList.add('saved');
            setTimeout(()=>sel.classList.remove('saved'), 900);

            const row = sel.closest('tr');

            if (field === 'probabilidad_id2' || field === 'nivel_control2') {
              const facEl = row && row.querySelector('.fac2-val');
              if (facEl) facEl.textContent = (data.fac2 == null) ? '' : Number(data.fac2).toFixed(1);

              const amzEl = row && row.querySelector('.amz2-val');
              if (amzEl) amzEl.textContent = data.amz2_label || '';

              const ipdEl = row && row.querySelector('.ipd2-val');
              if (ipdEl) ipdEl.textContent = (data.ipd2 == null) ? '' : Number(data.ipd2).toFixed(1);

              const rm2El = row && row.querySelector('.rm2-val');
              if (rm2El) {
                const currentIpd2 = toNum(ipdEl?.textContent || '');
                rm2El.textContent = isFinite(currentIpd2)
                  ? Math.max(currentIpd2 - 6.4, 0).toFixed(1)
                  : '';
              }

              const nc3El = row && row.querySelector('.nc3-val');
              if (nc3El) nc3El.textContent = (data.nc3 == null) ? '' : data.nc3;

              const exp3El = row && row.querySelector('.exp3-val');
              if (exp3El) exp3El.textContent = (data.exp3 == null) ? '' : data.exp3;

              setPerfil(row, data);
              setIR(row);
              setIRP(row);

              const nr2El = row && row.querySelector('.nivel2-val');
              if (nr2El){
                nr2El.textContent = (data.nivel_riesgo2 || '');
                colorNivelRiesgo2(nr2El.closest('td'), nr2El.textContent);
              }

              const aceptEl = row && row.querySelector('.acept-val');
              if (aceptEl){
                aceptEl.textContent = (data.aceptabilidad || '');
                colorAceptabilidad(aceptEl.closest('td'), aceptEl.textContent);
              }

              const solEl = row && row.querySelector('.sol-eficaz-val');
              if (solEl){
                if (data.sol_eficaz != null) solEl.textContent = data.sol_eficaz;
                else setSolEficaz(row, (aceptEl && aceptEl.textContent) || '');
              }
            }

            if (field === 'sev2') {
              const fac3El = row && row.querySelector('.fac3-val');
              if (fac3El) fac3El.textContent = (data.fac3 == null) ? '' : Number(data.fac3).toFixed(1);

              const ipdEl  = row && row.querySelector('.ipd2-val');
              if (ipdEl) ipdEl.textContent  = (data.ipd2 == null) ? '' : Number(data.ipd2).toFixed(1);

              const rm2El  = row && row.querySelector('.rm2-val');
              if (rm2El) {
                const currentIpd2 = toNum(ipdEl?.textContent || '');
                rm2El.textContent = isFinite(currentIpd2)
                  ? Math.max(currentIpd2 - 6.4, 0).toFixed(1)
                  : '';
              }

              setPerfil(row, data);
              setIR(row);
              setIRP(row);

              const nr2El = row && row.querySelector('.nivel2-val');
              if (nr2El){
                nr2El.textContent = (data.nivel_riesgo2 || '');
                colorNivelRiesgo2(nr2El.closest('td'), nr2El.textContent);
              }

              const aceptEl = row && row.querySelector('.acept-val');
              if (aceptEl){
                aceptEl.textContent = (data.aceptabilidad || '');
                colorAceptabilidad(aceptEl.closest('td'), aceptEl.textContent);
              }

              const solEl = row && row.querySelector('.sol-eficaz-val');
              if (solEl){
                if (data.sol_eficaz != null) solEl.textContent = data.sol_eficaz;
                else setSolEficaz(row, (aceptEl && aceptEl.textContent) || '');
              }
            }

            if (field === 'seg_control') {
              updateGestionCell(row, value);
            }
          } else {
            throw new Error(data.message || 'Error al guardar');
          }
        } catch (err) {
          sel.classList.remove('saving');
          sel.classList.add('error');
          setTimeout(()=>sel.classList.remove('error'), 900);
          console.error(err);
          alert('No se pudo guardar el cambio.');
        }
      };

      if (isResidualField) {
        await enqueueResidualRequest(id, executeUpdate);
      } else {
        await executeUpdate();
      }
    });

    // =========================================================
    // C) FECHAS: clic en la celda para abrir datepicker
    // =========================================================
    document.addEventListener('click', (e)=>{
      const cell = e.target.closest('.date-cell');
      if (!cell) return;
      if (e.target.classList && e.target.classList.contains('date-input')) return;

      const span  = cell.querySelector('.date-text');
      const input = cell.querySelector('.date-input');
      if (!span || !input) return;

      span.style.display = 'none';
      input.style.display = 'block';

      setTimeout(()=>{
        try {
          input.focus();
          if (typeof input.showPicker === 'function') input.showPicker();
        } catch(_) {}
      }, 0);
    });

    document.addEventListener('change', async (e)=>{
      const input = e.target;
      if (!input.classList || !input.classList.contains('date-input')) return;

      const cell = input.closest('.date-cell');
      if (!cell) return;

      const id    = cell.dataset.id;
      const field = cell.dataset.field;
      const value = input.value || null;

      input.classList.add('saving');

      try {
        const resp = await fetch("{{ route('analisis.updateCell') }}", {
          method: 'POST',
          headers: {
            'Content-Type': 'application/json',
            'Accept': 'application/json',
            'X-CSRF-TOKEN': token
          },
          credentials: 'same-origin',
          body: JSON.stringify({ id, field, value })
        });

        const data = await resp.json();
        input.classList.remove('saving');

        const span = cell.querySelector('.date-text');
        if (resp.ok && data.ok) {
          if (span) span.textContent = value ? ymdToDMY(value) : '';
          input.classList.add('saved');
          setTimeout(()=>input.classList.remove('saved'), 900);
        } else {
          throw new Error(data.message || 'Error al guardar la fecha');
        }
      } catch (err) {
        input.classList.remove('saving');
        input.classList.add('error');
        setTimeout(()=>input.classList.remove('error'), 900);
        console.error(err);
        alert('No se pudo guardar la fecha.');
      } finally {
        const span = cell.querySelector('.date-text');
        if (span) span.style.display = 'inline';
        input.style.display = 'none';
      }
    });

    // Estado inicial: colores + solución eficaz
    document.querySelectorAll('tr[data-row-id]').forEach(row => {
      applyRowColors(row);
      const ac = row.querySelector('.acept-val')?.textContent;
      setSolEficaz(row, ac);
    });

    refreshToggleMore();

  
    window.addEventListener('resize', () => {
      requestAnimationFrame(() => refreshToggleMore());
    })

    setTimeout(() => refreshToggleMore(), 150);
    setTimeout(() => refreshToggleMore(), 500);

    document.addEventListener('shown.bs.tab', () => refreshToggleMore());
    document.addEventListener('shown.bs.collapse', () => refreshToggleMore());
  });
</script>


  <form method="post"
        id="analisis_delete_form"
        action="{{ route('analisis.eliminarAnalisis') }}"
        enctype="multipart/form-data">
    @csrf

    <input type="hidden" name="id" id="id_delete_analisis" value="">
    <input type="hidden" name="cliente_id" value="{{ $cliente->id }}">
  </form>
@endsection