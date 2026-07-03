@extends('layouts.app')

@push('styles')
    <link href="{{ asset('/css/version2/analisisver-editar.css?v=2.2.1') }}" rel="stylesheet" type="text/css" />
@endpush

@section('title')
   Ver análisis de riesgos al cliente "{{ $clienteData->nombre_comercial ?? 'SIS PROTEC' }}"
@endsection

@section('content')
@php
    $clienteNombre = $clienteData->nombre_comercial ?? 'SIS PROTEC';

    $array_deficiencia = $array_deficiencia ?? [];
    $array_impacto = $array_impacto ?? [];

    $puntoNormativoTxt = '';
    foreach($alcances as $alcanec){
        if($ana_riesgo->libror_barreras_perimetrales_id == $alcanec->id){
            $puntoNormativoTxt = $alcanec->alcance;
            break;
        }
    }

    $nivelesControl = [1=>'Inoperante',2=>'Sin control',3=>'Deficiente',4=>'Regular',5=>'Eficiente',6=>'Optimo'];
    $probabilidades = [1=>'Muy Alta',2=>'Alta',3=>'Media',4=>'Baja',5=>'Muy Baja'];
    $severidades = [1=>'Insignificante',2=>'Leve',3=>'Marginal',4=>'Grave',5=>'Critico',6=>'Desastroso',7=>'Catastrófico'];

    $controlDesc = [
        1 => 'Cuenta con los criterios de aplicación pero no funciona',
        2 => 'Adquirir la licencia de Windows más reciente con el fin de no vulnerar la información de la empresa.',
        3 => 'Cuenta con los criterios de aplicación pero no son los adecuados para la instalación.',
        4 => 'Cuenta con los criterios de aplicación pero existen posibilidades de mejora.',
        5 => 'Los criterios de aplicación son los adecuados a la instalación.',
        6 => 'Excede los criterios de aplicación.',
    ];

    /* IDs correctos */
    $deficiencias = [1=>'Pasivas',2=>'Activas',3=>'Humanas',4=>'Documentales'];
    $impactos = [
        1=>'Patrimonial',
        2=>'Operacional',
        3=>'Comercial',
        4=>'Reputacional',
        5=>'Humano',
        6=>'Ambiental',
        9=>'Tecnológico',
        8=>'Financiero',
        7=>'Comunidad / social',
        10=>'Legal / Regulatorio'
    ];

    $nivelControl = (int)($ana_riesgo->hd_nivel_control_id ?? 0);
    $probabilidad = (int)($ana_riesgo->hd_probabilidad_id ?? 0);
    $severidad = (int)($ana_riesgo->hd_consecuencia_id ?? 0);
    $nivelRiesgoActual = (float)($ana_riesgo->nivel_riesgo ?? 0);

    $factorExposicionLabels = [
        1 => 'Muy Alta',
        2 => 'Muy Alta',
        3 => 'Alta',
        4 => 'Media',
        5 => 'Baja',
        6 => 'Muy Baja',
    ];
    $factorExposicionActual = $factorExposicionLabels[$nivelControl] ?? 'Sin información';

    if ($nivelRiesgoActual >= 36.10) {
        $nivelTxt = 'Muy alto'; $nivelTxtHero = 'MUY ALTO'; $nivelClass = 'risk-muyalto'; $severityClass = 'is-critical'; $rangoTxt = '36.10 - 100';
    } elseif ($nivelRiesgoActual >= 16.10) {
        $nivelTxt = 'Alto'; $nivelTxtHero = 'ALTO'; $nivelClass = 'risk-alto'; $severityClass = 'is-high'; $rangoTxt = '16.10 - 36.09';
    } elseif ($nivelRiesgoActual >= 6.50) {
        $nivelTxt = 'Medio'; $nivelTxtHero = 'MEDIO'; $nivelClass = 'risk-medio'; $severityClass = 'is-medium'; $rangoTxt = '6.50 - 16.09';
    } elseif ($nivelRiesgoActual >= 1.50) {
        $nivelTxt = 'Bajo'; $nivelTxtHero = 'BAJO'; $nivelClass = 'risk-bajo'; $severityClass = 'is-low'; $rangoTxt = '1.50 - 6.49';
    } else {
        $nivelTxt = 'Muy Bajo'; $nivelTxtHero = 'MUY BAJO'; $nivelClass = 'risk-muybajo'; $severityClass = 'is-min'; $rangoTxt = '0 - 1.49';
    }

    $fechaRegistro = $ana_riesgo->fecha_inicio
        ? \Carbon\Carbon::parse($ana_riesgo->fecha_inicio)->format('d/m/Y')
        : ($ana_riesgo->created_at ? \Carbon\Carbon::parse($ana_riesgo->created_at)->format('d/m/Y') : 'Sin fecha');

    $fechaActualizacion = $ana_riesgo->updated_at
        ? \Carbon\Carbon::parse($ana_riesgo->updated_at)->format('d/m/Y H:i')
        : 'Sin información';

    $fechaCreacion = $ana_riesgo->created_at
        ? \Carbon\Carbon::parse($ana_riesgo->created_at)->format('d/m/Y H:i')
        : $fechaRegistro;

    $safe = function($value, $fallback = 'Sin información'){
        $value = trim((string)($value ?? ''));
        return $value !== '' ? $value : $fallback;
    };

    $countDeficiencias = is_array($array_deficiencia) ? count($array_deficiencia) : 0;
    $countImpactos = is_array($array_impacto) ? count($array_impacto) : 0;

    $registradoPor = optional($ana_riesgo->userCreated ?? null)->name
        ?? optional($ana_riesgo->usuarioCreated ?? null)->name
        ?? optional($ana_riesgo->createdBy ?? null)->name
        ?? ($ana_riesgo->iduserCreated ? 'Usuario #'.$ana_riesgo->iduserCreated : 'Sistema');

    $modificadoPor = optional($ana_riesgo->userUpdated ?? null)->name
        ?? optional($ana_riesgo->usuarioUpdated ?? null)->name
        ?? optional($ana_riesgo->updatedBy ?? null)->name
        ?? ($ana_riesgo->iduserUpdated ? 'Usuario #'.$ana_riesgo->iduserUpdated : 'Sistema');
@endphp

<div class="row giro-detail-page giro-exec-v2">
    <div class="col-lg-12">
        <div class="card card-custom gutter-b giro-detail-card giro-exec2-card">
            <div class="card-header giro-detail-header giro-exec2-header">
                <div class="giro-detail-titlebox giro-exec2-titlebox">
                    <span class="giro-detail-kicker giro-exec2-kicker">Consulta</span>
                    <h3 class="card-title">Expediente ejecutivo del riesgo</h3>
                    <p>{{ $clienteNombre }}</p>
                </div>

                <div class="giro-detail-nav giro-exec2-nav">
                    <a href="{{ route('analisis.analisiscliente', $id_cliente) }}" class="btn btn-secondary btn-xs">
                        <i class="la la-arrow-left"></i> Regresar
                    </a>
                    <a href="{{ route('analisis.analisisanalisissocial', [$id_cliente, $id_riesgo]) }}" class="btn btn-primary btn-xs">
                        <i class="la la-edit"></i> Editar
                    </a>
                </div>
            </div>

            <div class="card-body giro-detail-body giro-exec2-body">
                <section class="giro-exec2-hero {{ $severityClass }}">
                    <div class="giro-exec2-hero-icon">
                        <i class="la la-shield"></i>
                    </div>

                    <div class="giro-exec2-hero-main">
                        <span class="giro-exec2-type">Riesgo social</span>
                        <h2>{{ $puntoNormativoTxt ?: 'Sin punto normativo' }}</h2>
                        <p>Cliente: <strong>{{ $clienteNombre }}</strong></p>
                    </div>

                    <div class="giro-exec2-hero-metric">
                        <i class="la la-shield-alt"></i>
                        <span>Control existente</span>
                        <strong>{{ $nivelesControl[$nivelControl] ?? 'Sin información' }}</strong>
                    </div>

                    <div class="giro-exec2-hero-metric">
                        <i class="la la-exclamation-triangle"></i>
                        <span>Probabilidad</span>
                        <strong>{{ $probabilidades[$probabilidad] ?? 'Sin información' }}</strong>
                    </div>

                    <div class="giro-exec2-hero-metric">
                        <i class="la la-user-shield"></i>
                        <span>Severidad</span>
                        <strong>{{ $severidades[$severidad] ?? 'Sin información' }}</strong>
                    </div>

                    <div class="giro-exec2-hero-risk">
                        <span>Nivel de riesgo</span>
                        <strong class="{{ $nivelClass }}">{{ $nivelTxtHero }}</strong>
                    </div>
                </section>

                <div class="giro-exec2-layout">
                    <main class="giro-exec2-main">
                        <section class="giro-exec2-panel">
                            <div class="giro-exec2-section-title">
                                <span class="giro-exec2-number">1</span>
                                <i class="la la-clipboard-check"></i>
                                <h4>Identificación del riesgo</h4>
                            </div>

                            <div class="giro-exec2-info-grid giro-exec2-info-grid-4">
                                <article class="giro-exec2-info-item">
                                    <span class="giro-exec2-icon"><i class="la la-bookmark"></i></span>
                                    <div>
                                        <small>Punto normativo</small>
                                        <strong>{{ $puntoNormativoTxt ?: 'Sin punto normativo' }}</strong>
                                    </div>
                                </article>
                                <article class="giro-exec2-info-item">
                                    <span class="giro-exec2-icon"><i class="la la-tasks"></i></span>
                                    <div>
                                        <small>Punto de control</small>
                                        <strong>{{ $safe($ana_riesgo->punto_control) }}</strong>
                                    </div>
                                </article>
                                <article class="giro-exec2-info-item">
                                    <span class="giro-exec2-icon"><i class="la la-exclamation-circle"></i></span>
                                    <div>
                                        <small>Factor de riesgo</small>
                                        <strong>{{ $safe($ana_riesgo->factores_riesgo) }}</strong>
                                    </div>
                                </article>
                                <article class="giro-exec2-info-item">
                                    <span class="giro-exec2-icon"><i class="la la-bolt"></i></span>
                                    <div>
                                        <small>Evento de riesgo</small>
                                        <strong>{{ $safe($ana_riesgo->eventos_riesgo) }}</strong>
                                    </div>
                                </article>
                            </div>

                            <div class="giro-exec2-info-grid giro-exec2-info-grid-4 giro-exec2-line-top">
                                <article class="giro-exec2-info-item">
                                    <span class="giro-exec2-icon"><i class="la la-layer-group"></i></span>
                                    <div>
                                        <small>Recursos expuestos</small>
                                        <strong>{{ $safe($ana_riesgo->recursos_expuestos) }}</strong>
                                    </div>
                                </article>
                                <article class="giro-exec2-info-item">
                                    <span class="giro-exec2-icon"><i class="la la-cogs"></i></span>
                                    <div>
                                        <small>Fuente de riesgo</small>
                                        <strong>{{ $safe($ana_riesgo->fuente_riesgo) }}</strong>
                                    </div>
                                </article>
                                <article class="giro-exec2-info-item">
                                    <span class="giro-exec2-icon"><i class="la la-map-marker"></i></span>
                                    <div>
                                        <small>Ubicación del riesgo</small>
                                        <strong>{{ $safe($ana_riesgo->ubicacion_riesgo) }}</strong>
                                    </div>
                                </article>
                                <article class="giro-exec2-info-item">
                                    <span class="giro-exec2-icon"><i class="la la-home"></i></span>
                                    <div>
                                        <small>Prevención actual</small>
                                        <strong>{{ $safe($ana_riesgo->medidas_prevencion) }}</strong>
                                    </div>
                                </article>
                            </div>
                        </section>

                        <section class="giro-exec2-panel">
                            <div class="giro-exec2-section-title">
                                <span class="giro-exec2-number">2</span>
                                <i class="la la-shield-alt"></i>
                                <h4>Controles y exposición</h4>
                            </div>

                            <div class="giro-exec2-control-row">
                                <article class="giro-exec2-info-item giro-exec2-pill-item">
                                    <span class="giro-exec2-icon"><i class="la la-shield"></i></span>
                                    <div>
                                        <small>Nivel de control existente</small>
                                        <strong><span class="giro-exec2-chip-warning">{{ $nivelesControl[$nivelControl] ?? 'Sin información' }}</span></strong>
                                    </div>
                                </article>

                                <article class="giro-exec2-info-item giro-exec2-description-item">
                                    <span class="giro-exec2-icon"><i class="la la-info-circle"></i></span>
                                    <div>
                                        <small>Descripción</small>
                                        <strong>{{ $controlDesc[$nivelControl] ?? ($ana_riesgo->descripcion ?: 'Sin información') }}</strong>
                                    </div>
                                </article>
                            </div>

                            <div class="giro-exec2-tags-row giro-exec2-line-top">
                                <article>
                                    <div class="giro-exec2-tags-head">
                                        <span class="giro-exec2-icon"><i class="la la-shield"></i></span>
                                        <small>Vulnerabilidades del Sistema Identificadas</small>
                                    </div>
                                    <div class="giro-tag-list">
                                        @forelse($array_deficiencia as $def)
                                            <span class="giro-tag giro-tag-risk"><i></i>{{ $deficiencias[$def] ?? 'Deficiencia '.$def }}</span>
                                        @empty
                                            <span class="giro-tag giro-tag-empty"><i></i>Sin selección</span>
                                        @endforelse
                                    </div>
                                </article>

                                <article>
                                    <div class="giro-exec2-tags-head">
                                        <span class="giro-exec2-icon"><i class="la la-globe"></i></span>
                                        <small>Áreas de Impacto Organizacional</small>
                                    </div>
                                    <div class="giro-tag-list">
                                        @forelse($array_impacto as $imp)
                                            <span class="giro-tag giro-tag-impact"><i></i>{{ $impactos[$imp] ?? 'Impacto '.$imp }}</span>
                                        @empty
                                            <span class="giro-tag giro-tag-empty"><i></i>Sin selección</span>
                                        @endforelse
                                    </div>
                                </article>
                            </div>
                        </section>

                        <section class="giro-exec2-panel">
                            <div class="giro-exec2-section-title">
                                <span class="giro-exec2-number">3</span>
                                <i class="la la-chart-line"></i>
                                <h4>Análisis del riesgo</h4>
                            </div>

                            <article class="giro-exec2-mitigation">
                                <span class="giro-exec2-icon"><i class="la la-crosshairs"></i></span>
                                <div>
                                    <small>Medidas de mitigación</small>
                                    <strong>{{ $safe($ana_riesgo->contramedidas) }}</strong>
                                </div>
                            </article>

                            <div class="giro-exec2-factor-row giro-exec2-line-top">
                                <article>
                                    <span class="giro-exec2-icon"><i class="la la-shield"></i></span>
                                    <div>
                                        <small>Factor de exposición</small>
                                        <strong><span class="giro-exec2-chip-warning">{{ $factorExposicionActual }}</span></strong>
                                    </div>
                                </article>
                                <article>
                                    <span class="giro-exec2-icon"><i class="la la-home"></i></span>
                                    <div>
                                        <small>Factor de probabilidad</small>
                                        <strong><span class="giro-exec2-chip-danger">{{ $probabilidades[$probabilidad] ?? 'Sin información' }}</span></strong>
                                    </div>
                                </article>
                                <article>
                                    <span class="giro-exec2-icon"><i class="la la-search-plus"></i></span>
                                    <div>
                                        <small>Impacto / Severidad</small>
                                        <strong><span class="giro-exec2-chip-danger">{{ $severidades[$severidad] ?? 'Sin información' }}</span></strong>
                                    </div>
                                </article>
                            </div>
                        </section>
                    </main>

                    <aside class="giro-exec2-aside">
                        <section class="giro-exec2-side-panel giro-exec2-risk-panel">
                            <div class="giro-exec2-side-title">
                                <i class="la la-chart-bar"></i>
                                <h4>Valoración de riesgo</h4>
                            </div>

                            <div class="giro-exec2-gauge-wrap">
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
                                <input type="hidden" id="nivel_riesgo" value="{{ $nivelRiesgoActual }}">
                            </div>

                            <div class="giro-exec2-score-main">
                                <strong id="nivel_riesgo2">{{ number_format($nivelRiesgoActual, 2, '.', '') }}</strong>
                                <span>Índice Potencial de daño</span>
                            </div>

                            <div class="giro-exec2-risk-badge {{ $nivelClass }}">{{ $nivelTxt }}</div>

                            <div class="giro-exec2-risk-mini">
                                <div>
                                    <i class="la la-shield"></i>
                                    <span>Exposición</span>
                                    <strong>{{ $factorExposicionActual }}</strong>
                                </div>
                                <div>
                                    <i class="la la-exclamation-triangle"></i>
                                    <span>Probabilidad</span>
                                    <strong>{{ $probabilidades[$probabilidad] ?? 'Sin información' }}</strong>
                                </div>
                                <div>
                                    <i class="la la-trophy"></i>
                                    <span>Impacto</span>
                                    <strong>{{ $severidades[$severidad] ?? 'Sin información' }}</strong>
                                </div>
                            </div>

                            <div class="giro-exec2-risk-range">
                                <div>
                                    <span>Índice</span>
                                    <strong>{{ number_format($nivelRiesgoActual, 2, '.', '') }}</strong>
                                </div>
                                <div>
                                    <span>Rango</span>
                                    <strong>{{ $rangoTxt }}</strong>
                                </div>
                            </div>
                        </section>

                        <section class="giro-exec2-side-panel giro-exec2-log-panel">
                            <div class="giro-exec2-side-title">
                                <i class="la la-clipboard-list"></i>
                                <h4>Bitácora del expediente</h4>
                            </div>

                            <div class="giro-exec2-log-list">
                                <div>
                                    <i class="la la-calendar"></i>
                                    <span>Fecha de registro</span>
                                    <strong>{{ $fechaRegistro }}</strong>
                                </div>
                                <div>
                                    <i class="la la-clock"></i>
                                    <span>Última actualización</span>
                                    <strong>{{ $fechaActualizacion }}</strong>
                                </div>
                                <div>
                                    <i class="la la-user"></i>
                                    <span>Registrado por</span>
                                    <strong>{{ $registradoPor }}</strong>
                                </div>
                                <div>
                                    <i class="la la-user-edit"></i>
                                    <span>Última modificación por</span>
                                    <strong>{{ $modificadoPor }}</strong>
                                </div>
                                <div class="giro-exec2-status-row">
                                    <i class="la la-check-circle"></i>
                                    <span>Estado del análisis</span>
                                    <strong>Activo</strong>
                                </div>
                            </div>
                        </section>
                    </aside>
                </div>
            </div>
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
  }

  if(document.readyState === 'loading') document.addEventListener('DOMContentLoaded', initGauge);
  else initGauge();
})();
</script>
@endpush
