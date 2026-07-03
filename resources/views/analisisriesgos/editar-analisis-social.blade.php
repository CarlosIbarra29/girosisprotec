@extends('layouts.app')

@push('scripts')
    <script src="{{ asset('js/cliente/AnalisisRiesgo.js?v=1.2.5') }}"></script>
@endpush

@push('styles')
    <link href="{{ asset('/css/version2/analisisver-editar.css?v=1.2.4') }}" rel="stylesheet" type="text/css" />
@endpush

@section('title')
   Editar análisis de riesgos al cliente "{{ $clienteData->nombre_comercial ?? 'SIS PROTEC' }}"
@endsection

@section('content')
@php
    $clienteNombre = $clienteData->nombre_comercial ?? 'SIS PROTEC';

    $puntoNormativoTxt = '';
    foreach($alcances as $alcanec){
        if($ana_riesgo->libror_barreras_perimetrales_id == $alcanec->id){
            $puntoNormativoTxt = $alcanec->alcance;
            break;
        }
    }

    $nivelControl = (int)($ana_riesgo->hd_nivel_control_id ?? 0);
    $probabilidad = (int)($ana_riesgo->hd_probabilidad_id ?? 0);
    $severidad    = (int)($ana_riesgo->hd_consecuencia_id ?? 0);
    $nivelRiesgoActual = (float)($ana_riesgo->nivel_riesgo ?? 0);

    $controlDesc = [
        1 => 'Cuenta con los criterios de aplicación pero no funciona',
        2 => 'Adquirir la licencia de Windows más reciente con el fin de no vulnerar la información de la empresa.',
        3 => 'Cuenta con los criterios de aplicación pero no son los adecuados para la instalación.',
        4 => 'Cuenta con los criterios de aplicación pero existen posibilidades de mejora.',
        5 => 'Los criterios de aplicación son los adecuados a la instalación.',
        6 => 'Excede los criterios de aplicación.',
    ];

    $factorExposicionLabels = [
        1 => 'Muy Alta',
        2 => 'Muy Alta',
        3 => 'Alta',
        4 => 'Media',
        5 => 'Baja',
        6 => 'Muy Baja',
    ];
    $factorExposicionActual = $factorExposicionLabels[$nivelControl] ?? 'Selecciona nivel de control';
@endphp

<div class="row giro-edit-page">
    <div class="col-lg-12">
        <div class="card card-custom gutter-b giro-edit-card">
            <div class="card-header giro-edit-header">
                <div class="giro-edit-titlebox">
                    <span class="giro-edit-kicker">Edición</span>
                    <h3 class="card-title">Editar análisis de riesgo</h3>
                    <p>{{ $clienteNombre }}</p>
                </div>

                <div class="giro-edit-nav">
                    <a href="{{ route('analisis.analisiscliente', $id_cliente) }}" class="btn btn-secondary btn-xs">
                        <i class="la la-arrow-left"></i> Regresar
                    </a>
                </div>
            </div>

            <input type="hidden" id="url_alcances" value="{{ route('analisis.obteneralcances') }}">

            <form action="{{ route('analisis.actualizarriesgo') }}" method="post" id="submit_analisis_social">
                @csrf
                <input type="hidden" name="cliente" id="id_cliente" value="{{ $id_cliente }}">
                <input type="hidden" name="id_riesgo" id="id_riesgo" value="{{ $id_riesgo }}">
                <input type="hidden" name="punto_normativo" id="id_alcance" value="{{ $ana_riesgo->libror_barreras_perimetrales_id }}">
                <input type="hidden" name="alcances" id="num" value="{{ $ana_riesgo->libror_sociales_alcances_id }}">
                <input type="hidden" name="tipo" id="id_tipo" value="1">

                <div class="card-body giro-edit-body">
                    <div class="row hr-containers">
                        <span><h3><b>Identificación del riesgo</b></h3></span>
                    </div>

                    <div class="card card-custom gutter-b giro-edit-section">
                        <div class="card-body">
                            <div class="row form-group">
                                <div class="col-lg-8 fl">
                                    <label><b>Punto normativo</b></label>
                                    <div class="giro-readonly-field">{{ $puntoNormativoTxt ?: 'Sin punto normativo' }}</div>
                                </div>
                                <div class="col-lg-4 fl giro-options-field">
                                    <label><b>Modo</b></label>
                                    <div class="giro-readonly-field giro-mode-field">Edición de registro existente</div>
                                </div>
                            </div>

                            <div class="row form-group">
                                <div class="col-lg-6 fl">
                                    <label for="punto_control"><b>Punto de control</b></label>
                                    <textarea class="form-control gray_area" name="punto_control" id="punto_control" rows="2">{{ $ana_riesgo->punto_control }}</textarea>
                                </div>
                            </div>

                            <div class="row form-group">
                                <div class="col-lg-6 fl">
                                    <label for="factor_riesgo"><b>Factor de riesgo</b></label>
                                    <textarea class="form-control gray_area" name="factor_riesgo" id="factor_riesgo" rows="2">{{ $ana_riesgo->factores_riesgo }}</textarea>
                                </div>
                                <div class="col-lg-6 fl">
                                    <label for="evento_riesgo"><b>Evento de riesgo</b></label>
                                    <textarea class="form-control gray_area" name="evento_riesgo" id="evento_riesgo" rows="2">{{ $ana_riesgo->eventos_riesgo }}</textarea>
                                </div>
                            </div>

                            <div class="row form-group">
                                <div class="col-lg-4 fl">
                                    <label for="recursos_expuestos"><b>Recursos Expuestos (Activos)</b></label>
                                    <input type="text" class="form-control gray_area" name="recursos_expuestos" id="recursos_expuestos" value="{{ $ana_riesgo->recursos_expuestos }}">
                                </div>
                                <div class="col-lg-4 fl">
                                    <label for="fuente_riesgo"><b>Fuente de Riesgo</b></label>
                                    <input type="text" class="form-control gray_area" name="fuente_riesgo" id="fuente_riesgo" value="{{ $ana_riesgo->fuente_riesgo }}">
                                </div>
                                <div class="col-lg-4 fl">
                                    <label for="ubicacion_riesgo"><b>Ubicación del riesgo</b></label>
                                    <input type="text" class="form-control gray_area" name="ubicacion_riesgo" id="ubicacion_riesgo" value="{{ $ana_riesgo->ubicacion_riesgo }}">
                                </div>
                            </div>

                            <div class="row form-group">
                                <div class="col-lg-12 fl">
                                    <label for="generales_unidad"><b>Medidas de Prevención y Protección Actuales</b></label>
                                    <textarea class="form-control gray_area" name="medidas_prevencion" id="generales_unidad" rows="5">{{ $ana_riesgo->medidas_prevencion }}</textarea>
                                </div>
                            </div>

                            <div class="row form-group giro-checks-block">
                                <div class="col-lg-4 degradado-border-right">
                                    <label><b>Vulnerabilidades del Sistemas Identificadas</b></label>
                                    <div class="giro-check-grid giro-check-grid-2">
                                        <label class="checkbox"><input type="checkbox" value="1" name="deficiencia_medida_s[]" {{ in_array(1, $array_deficiencia) ? 'checked' : '' }}><span></span> Pasivas</label>
                                        <label class="checkbox"><input type="checkbox" value="2" name="deficiencia_medida_s[]" {{ in_array(2, $array_deficiencia) ? 'checked' : '' }}><span></span> Activas</label>
                                        <label class="checkbox"><input type="checkbox" value="3" name="deficiencia_medida_s[]" {{ in_array(3, $array_deficiencia) ? 'checked' : '' }}><span></span> Humanas</label>
                                        <label class="checkbox"><input type="checkbox" value="4" name="deficiencia_medida_s[]" {{ in_array(4, $array_deficiencia) ? 'checked' : '' }}><span></span> Documentales</label>
                                    </div>
                                </div>

                                <div class="col-lg-8">
                                    <label><b>Áreas de Impacto Organizacional</b></label>
                                    <div class="giro-check-grid giro-check-grid-4">
                                        <label class="checkbox"><input type="checkbox" value="1" name="impactos_negocio[]" {{ in_array(1, $array_impacto) ? 'checked' : '' }}><span></span> Patrimonial</label>
                                        <label class="checkbox"><input type="checkbox" value="2" name="impactos_negocio[]" {{ in_array(2, $array_impacto) ? 'checked' : '' }}><span></span> Operacional</label>
                                        <label class="checkbox"><input type="checkbox" value="3" name="impactos_negocio[]" {{ in_array(3, $array_impacto) ? 'checked' : '' }}><span></span> Comercial</label>
                                        <label class="checkbox"><input type="checkbox" value="4" name="impactos_negocio[]" {{ in_array(4, $array_impacto) ? 'checked' : '' }}><span></span> Reputacional</label>
                                        <label class="checkbox"><input type="checkbox" value="5" name="impactos_negocio[]" {{ in_array(5, $array_impacto) ? 'checked' : '' }}><span></span> Humano</label>
                                        <label class="checkbox"><input type="checkbox" value="6" name="impactos_negocio[]" {{ in_array(6, $array_impacto) ? 'checked' : '' }}><span></span> Ambiental</label>
                                        <label class="checkbox"><input type="checkbox" value="9" name="impactos_negocio[]" {{ in_array(9, $array_impacto) ? 'checked' : '' }}><span></span> Tecnológico</label>
                                        <label class="checkbox"><input type="checkbox" value="8" name="impactos_negocio[]" {{ in_array(8, $array_impacto) ? 'checked' : '' }}><span></span> Financiero</label>
                                        <label class="checkbox"><input type="checkbox" value="7" name="impactos_negocio[]" {{ in_array(7, $array_impacto) ? 'checked' : '' }}><span></span> Comunidad / social</label>
                                        <label class="checkbox"><input type="checkbox" value="10" name="impactos_negocio[]" {{ in_array(10, $array_impacto) ? 'checked' : '' }}><span></span> Legal / Regulatorio</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row hr-containers">
                        <span><h3><b>Análisis del Riesgo</b></h3></span>
                    </div>

                    <div class="card card-custom gutter-b giro-edit-section">
                        <div class="card-body">
                            <div class="row form-group giro-risk-analysis-layout align-items-stretch">
                                <div class="col-lg-8 giro-risk-form-col">
                                    <div class="row form-group">
                                        <div class="col-lg-4 fl">
                                            <label for="nivel_control"><b>Nivel de control Existente</b></label>
                                            <select class="form-control gray_area" id="nivel_control" name="nivel_control" required>
                                                <option value="" disabled>Selecciona una opción</option>
                                                <option value="1" @selected($nivelControl == 1)>Inoperante</option>
                                                <option value="2" @selected($nivelControl == 2)>Sin control</option>
                                                <option value="3" @selected($nivelControl == 3)>Deficiente</option>
                                                <option value="4" @selected($nivelControl == 4)>Regular</option>
                                                <option value="5" @selected($nivelControl == 5)>Eficiente</option>
                                                <option value="6" @selected($nivelControl == 6)>Optimo</option>
                                            </select>
                                        </div>

                                        <div class="col-lg-8 fl nivel_inoperante {{ $nivelControl == 1 ? '' : 'oculto' }}">
                                            <label><b>Descripción</b></label>
                                            <textarea class="form-control gray_area" rows="2" readonly>{{ $controlDesc[1] }}</textarea>
                                        </div>
                                        <div class="col-lg-8 fl nivel_sincontrol {{ $nivelControl == 2 ? '' : 'oculto' }}">
                                            <label><b>Descripción</b></label>
                                            <textarea class="form-control gray_area" rows="2" readonly>{{ $controlDesc[2] }}</textarea>
                                        </div>
                                        <div class="col-lg-8 fl nivel_deficiente {{ $nivelControl == 3 ? '' : 'oculto' }}">
                                            <label><b>Descripción</b></label>
                                            <textarea class="form-control gray_area" rows="2" readonly>{{ $controlDesc[3] }}</textarea>
                                        </div>
                                        <div class="col-lg-8 fl regular {{ $nivelControl == 4 ? '' : 'oculto' }}">
                                            <label><b>Descripción</b></label>
                                            <textarea class="form-control gray_area" rows="2" readonly>{{ $controlDesc[4] }}</textarea>
                                        </div>
                                        <div class="col-lg-8 fl eficiente {{ $nivelControl == 5 ? '' : 'oculto' }}">
                                            <label><b>Descripción</b></label>
                                            <textarea class="form-control gray_area" rows="2" readonly>{{ $controlDesc[5] }}</textarea>
                                        </div>
                                        <div class="col-lg-8 fl optimo {{ $nivelControl == 6 ? '' : 'oculto' }}">
                                            <label><b>Descripción</b></label>
                                            <textarea class="form-control gray_area" rows="2" readonly>{{ $controlDesc[6] }}</textarea>
                                        </div>
                                    </div>

                                    <div class="row form-group">
                                        <div class="col-lg-12 fl">
                                            <label for="contramedidas"><b>Medidas de Mitigación</b></label>
                                            <textarea class="form-control gray_area giro-mitigacion-field" name="contramedidas" id="contramedidas" rows="5">{{ $ana_riesgo->contramedidas }}</textarea>
                                        </div>
                                    </div>

                                    <div class="row form-group giro-bottom-selects">
                                        <div class="col-lg-4 fl">
                                            <label for="factor_exposicion"><b>Factor de exposición</b></label>
                                            <input type="text"
                                                   class="form-control gray_area giro-factor-exposure-readonly"
                                                   id="factor_exposicion"
                                                   value="{{ $factorExposicionActual }}"
                                                   readonly>
                                        </div>
                                        <div class="col-lg-4 fl">
                                            <label for="factor_probabilidad"><b>Factor de probabilidad</b></label>
                                            <select class="form-control gray_area" id="factor_probabilidad" name="factor_probabilidad" required>
                                                <option value="" disabled>Selecciona una opción</option>
                                                <option value="1" @selected($probabilidad == 1)>Muy Alta</option>
                                                <option value="2" @selected($probabilidad == 2)>Alta</option>
                                                <option value="3" @selected($probabilidad == 3)>Media</option>
                                                <option value="4" @selected($probabilidad == 4)>Baja</option>
                                                <option value="5" @selected($probabilidad == 5)>Muy Baja</option>
                                            </select>
                                        </div>
                                        <div class="col-lg-4 fl">
                                            <label for="impacto_severidad"><b>Impacto/Severidad</b></label>
                                            <select class="form-control gray_area" id="impacto_severidad" name="impacto_severidad" required>
                                                <option value="" disabled>Selecciona una opción</option>
                                                <option value="1" @selected($severidad == 1)>Insignificante</option>
                                                <option value="2" @selected($severidad == 2)>Leve</option>
                                                <option value="3" @selected($severidad == 3)>Marginal</option>
                                                <option value="4" @selected($severidad == 4)>Grave</option>
                                                <option value="5" @selected($severidad == 5)>Critico</option>
                                                <option value="6" @selected($severidad == 6)>Desastroso</option>
                                                <option value="7" @selected($severidad == 7)>Catastrófico</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-4 text-center giro-risk-panel">
                                    <div class="giro-risk-card">
                                        <div class="risk-level nivelmma" style="{{ $nivelRiesgoActual >= 80.10 ? '' : 'display:none;' }}">
                                            <span class="title">Valoración de Riesgo</span>
                                            <!-- <span style="display:block;height:0.5lh" aria-hidden="true"></span> -->
                                            <div class="risk-color" style="background-color:#8B0000;">Muy alto</div>
                                        </div>
                                        <div class="risk-level nivelma" style="{{ ($nivelRiesgoActual >= 36.10 && $nivelRiesgoActual <= 80) ? '' : 'display:none;' }}">
                                            <span class="title">Valoración de Riesgo</span>
                                            <!-- <span style="display:block;height:0.5lh" aria-hidden="true"></span> -->
                                            <div class="risk-color" style="background-color:#8B0000;">Muy alto</div>
                                        </div>
                                        <div class="risk-level nivela" style="{{ ($nivelRiesgoActual >= 16.10 && $nivelRiesgoActual <= 36) ? '' : 'display:none;' }}">
                                            <span class="title">Valoración de Riesgo</span>
                                            <!-- <span style="display:block;height:0.5lh" aria-hidden="true"></span> -->
                                            <div class="risk-color" style="background-color:#FF0000;">Alto</div>
                                        </div>
                                        <div class="risk-level nivelm" style="{{ ($nivelRiesgoActual >= 6.5 && $nivelRiesgoActual <= 16) ? '' : 'display:none;' }}">
                                            <span class="title">Valoración de Riesgo</span>
                                            <!-- <span style="display:block;height:0.5lh" aria-hidden="true"></span> -->
                                            <div class="risk-color" style="color:#071225;background-color:#f4c542;">Medio</div>
                                        </div>
                                        <div class="risk-level nivelb" style="{{ ($nivelRiesgoActual >= 1.50 && $nivelRiesgoActual <= 6.4) ? '' : 'display:none;' }}">
                                            <span class="title">Valoración de Riesgo</span>
                                            <!-- <span style="display:block;height:0.5lh" aria-hidden="true"></span> -->
                                            <div class="risk-color" style="background-color:#32CD32;">Bajo</div>
                                        </div>
                                        <div class="risk-level nivelmb" style="{{ ($nivelRiesgoActual > 0 && $nivelRiesgoActual <= 1.4) ? '' : 'display:none;' }}">
                                            <span class="title">Valoración de Riesgo</span>
                                            <!-- <span style="display:block;height:0.5lh" aria-hidden="true"></span> -->
                                            <div class="risk-color" style="color:#071225;background-color:#F1EBEB;">Muy Bajo</div>
                                        </div>
                                        <div class="risk-level nivelmmb" style="{{ $nivelRiesgoActual == 0 ? '' : 'display:none;' }}">
                                            <span class="title">Valoración de Riesgo</span>
                                            <!-- <span style="display:block;height:0.5lh" aria-hidden="true"></span> -->
                                            <div class="risk-color" style="color:#071225;background-color:#F1EBEB;">Muy Bajo</div>
                                        </div>

                                        <div class="text-centerx">
                                            <label>Índice Potencial de daño: </label>
                                            <label class="risk-score" id="nivel_riesgo2">{{ number_format($nivelRiesgoActual, 2, '.', '') }}</label>
                                        </div>

                                        <div class="gauge2" id="svgGaugeWrap">
                                            <svg id="riskGauge" viewBox="0 0 300 190" aria-label="Indicador de riesgo">
                                                <defs>
                                                    <linearGradient id="gBandGrad" gradientUnits="userSpaceOnUse">
                                                        <stop offset="0%"   stop-color="#67C46A"/>
                                                        <stop offset="6%"   stop-color="#6DCA6B"/>
                                                        <stop offset="9%"   stop-color="#75CE67"/>
                                                        <stop offset="10%"  stop-color="#85D05F"/>
                                                        <stop offset="12%"  stop-color="#BFD35C"/>
                                                        <stop offset="15%"  stop-color="#E2CF53"/>
                                                        <stop offset="17%"  stop-color="#F0CB4D"/>
                                                        <stop offset="19%"  stop-color="#F4C94A"/>
                                                        <stop offset="25%"  stop-color="#F28C3D"/>
                                                        <stop offset="30%"  stop-color="#EE5D3A"/>
                                                        <stop offset="35%"  stop-color="#E84237"/>
                                                        <stop offset="39%"  stop-color="#E03834"/>
                                                        <stop offset="50%"  stop-color="#C42525"/>
                                                        <stop offset="65%"  stop-color="#A81C1C"/>
                                                        <stop offset="80%"  stop-color="#911515"/>
                                                        <stop offset="100%" stop-color="#7A0E0E"/>
                                                    </linearGradient>
                                                </defs>
                                                <path id="gTrack" class="track" d=""/>
                                                <path id="gBand" class="band" stroke="url(#gBandGrad)" d=""/>
                                                <g id="gTicks"></g>
                                                <text id="gCaption" class="cap" x="150" y="108" text-anchor="middle">Índice Potencial</text>
                                                <text id="gValue" class="value" x="150" y="128" text-anchor="middle">0.00</text>
                                                <g id="gNeedle" class="needle" transform="rotate(-180 150 160)">
                                                    <line x1="150" y1="160" x2="260" y2="160"></line>
                                                    <polygon points="260,160 242,154 242,166"></polygon>
                                                </g>
                                                <circle cx="150" cy="160" r="10" class="hub"></circle>
                                            </svg>
                                        </div>
                                        <input type="hidden" name="nivel_riesgo" id="nivel_riesgo" value="{{ $nivelRiesgoActual }}">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card-footer giro-edit-footer">
                    <button type="button" id="btnGuardar" class="btn btn-primary mr-2">Guardar cambios</button>
                    <a href="{{ route('analisis.analisiscliente', $id_cliente) }}" class="btn btn-secondary">Cancelar</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection


@push('scripts')
<script>
/* ===== Gauge SVG premium: mismo comportamiento visual del formulario inicial ===== */
(function(){
  function initGauge(){
    const svg = document.getElementById('riskGauge');
    if(!svg) return;

    const R  = 120;
    const CX = 150, CY = 160;
    const deg2rad = d => (Math.PI/180)*d;
    const polar = (deg)=>({ x: CX + R*Math.cos(deg2rad(deg)), y: CY - R*Math.sin(deg2rad(deg)) });
    const LEFT=180, RIGHT=0, TOP=90;

    const gTrack = document.getElementById('gTrack');
    const gBand = document.getElementById('gBand');
    const gBandGrad = document.getElementById('gBandGrad');
    const ticks = document.getElementById('gTicks');
    const needle = document.getElementById('gNeedle');
    const txt = document.getElementById('gValue');

    if(!gTrack || !gBand || !gBandGrad || !ticks || !needle || !txt) return;

    const arcPath = `M ${polar(LEFT).x} ${polar(LEFT).y} A ${R} ${R} 0 0 1 ${polar(TOP).x} ${polar(TOP).y} A ${R} ${R} 0 0 1 ${polar(RIGHT).x} ${polar(RIGHT).y}`;
    gTrack.setAttribute('d', arcPath);
    gBand.setAttribute('d', arcPath);

    const pS = polar(LEFT), pE = polar(RIGHT);
    gBandGrad.setAttribute('x1', pS.x); gBandGrad.setAttribute('y1', pS.y);
    gBandGrad.setAttribute('x2', pE.x); gBandGrad.setAttribute('y2', pE.y);

    ticks.innerHTML='';
    for(let v=10; v<100; v+=10){
      const a = 180 - v*1.8;
      const p1 = { x: CX + (R+1)*Math.cos(deg2rad(a)), y: CY - (R+1)*Math.sin(deg2rad(a)) };
      const p2 = { x: CX + (R+11)*Math.cos(deg2rad(a)), y: CY - (R+11)*Math.sin(deg2rad(a)) };
      const el = document.createElementNS('http://www.w3.org/2000/svg','line');
      el.setAttribute('x1',p1.x); el.setAttribute('y1',p1.y);
      el.setAttribute('x2',p2.x); el.setAttribute('y2',p2.y);
      el.setAttribute('class','tick');
      ticks.appendChild(el);
    }

    const clamp = v => Math.max(0, Math.min(100, v));
    const mapAngle = v => (clamp(v)*1.8 - 180);

    function readRisk(){
      const h = document.getElementById('nivel_riesgo');
      let v = parseFloat(h && h.value);
      if(!isNaN(v)) return clamp(v);
      const score = document.getElementById('nivel_riesgo2');
      v = parseFloat(score && score.textContent);
      if(!isNaN(v)) return clamp(v);
      return 0;
    }

    function updateGauge(){
      const v = readRisk();
      needle.setAttribute('transform', `rotate(${mapAngle(v)} ${CX} ${CY})`);
      const t = document.getElementById('nivel_riesgo2');
      txt.textContent = (t && t.textContent && t.textContent.trim()) ? t.textContent.trim() : v.toFixed(2);
    }

    updateGauge();
    document.addEventListener('change', function(e){
      const id = e.target && e.target.id;
      if(id==='nivel_control' || id==='factor_probabilidad' || id==='impacto_severidad'){
        setTimeout(updateGauge, 80);
      }
    });

    const target = document.getElementById('nivel_riesgo2');
    const hidden = document.getElementById('nivel_riesgo');
    if(window.MutationObserver && target){ new MutationObserver(updateGauge).observe(target,{childList:true,characterData:true,subtree:true}); }
    if(window.MutationObserver && hidden){ new MutationObserver(updateGauge).observe(hidden,{attributes:true,attributeFilter:['value']}); }
    let lastRiskValue = null;
    setInterval(function(){
      const h = document.getElementById('nivel_riesgo');
      const v = h ? String(h.value || '') : '';
      if(v !== lastRiskValue){ lastRiskValue = v; updateGauge(); }
    }, 250);
  }

  if(document.readyState === 'loading') document.addEventListener('DOMContentLoaded', initGauge);
  else initGauge();
})();


/* ===== Factor de exposición: se actualiza solo por Nivel de control ===== */
(function(){
  const labels = {
    '1': 'Muy Alta',
    '2': 'Muy Alta',
    '3': 'Alta',
    '4': 'Media',
    '5': 'Baja',
    '6': 'Muy Baja'
  };

  function updateFactorExposicion(){
    const nivel = document.getElementById('nivel_control');
    const factor = document.getElementById('factor_exposicion');
    if(!nivel || !factor) return;
    factor.value = labels[String(nivel.value || '')] || 'Selecciona nivel de control';
  }

  if(document.readyState === 'loading') document.addEventListener('DOMContentLoaded', updateFactorExposicion);
  else updateFactorExposicion();

  document.addEventListener('change', function(e){
    if(e.target && e.target.id === 'nivel_control') updateFactorExposicion();
  });
})();


/* ===== Descripción del nivel de control: mantener visible aunque AnalisisRiesgo.js use .show/.hide ===== */
(function(){
  const blocks = {
    '1': '.nivel_inoperante',
    '2': '.nivel_sincontrol',
    '3': '.nivel_deficiente',
    '4': '.regular',
    '5': '.eficiente',
    '6': '.optimo'
  };

  function syncDescripcionNivelControl(){
    const nivel = document.getElementById('nivel_control');
    if(!nivel) return;

    Object.keys(blocks).forEach(function(key){
      document.querySelectorAll(blocks[key]).forEach(function(el){
        if(key === String(nivel.value || '')){
          el.classList.remove('oculto');
          el.style.display = '';
        }else{
          el.classList.add('oculto');
          el.style.display = 'none';
        }
      });
    });
  }

  if(document.readyState === 'loading'){
    document.addEventListener('DOMContentLoaded', syncDescripcionNivelControl);
  }else{
    syncDescripcionNivelControl();
  }

  document.addEventListener('change', function(e){
    if(e.target && e.target.id === 'nivel_control'){
      setTimeout(syncDescripcionNivelControl, 30);
      setTimeout(syncDescripcionNivelControl, 120);
    }
  });
})();

</script>
@endpush
