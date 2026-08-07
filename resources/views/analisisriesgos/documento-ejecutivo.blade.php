@php
  $modoPdf = $modoPdf ?? false;
@endphp

@if(!$modoPdf)
@extends('layouts.app')

@push('styles')
  <link href="{{ asset('/css/version2/documento-ejecutivo.css?v=4.0.0') }}" rel="stylesheet" type="text/css" />
@endpush

@section('title')
  Documento ejecutivo de riesgos
@endsection

@section('content')
@else
<!doctype html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <title>Documento ejecutivo de riesgos</title>
  <style>
    {!! file_exists(public_path('css/version2/documento-ejecutivo.css')) ? file_get_contents(public_path('css/version2/documento-ejecutivo.css')) : '' !!}
  </style>
</head>
<body class="doc-pdf-body">
@endif

@php
  $clienteNombre = $cliente->organizacion ?? $cliente->nombre_comercial ?? 'Cliente';
  $fechaEstudio = $fechaEstudio ?? now()->locale('es')->translatedFormat('d \d\e F \d\e Y');

  $logoPath = public_path('img/logos/logogiro.png');
  $logoSrc = file_exists($logoPath)
      ? 'data:image/png;base64,'.base64_encode(file_get_contents($logoPath))
      : asset('img/logos/logogiro.png');

  $labelsNivel = [
    'muy_bajo' => 'Muy Bajo',
    'bajo' => 'Bajo',
    'medio' => 'Medio',
    'alto' => 'Alto',
    'muy_alto' => 'Muy Alto',
  ];

  $colorsNivel = [
    'muy_bajo' => 'doc-risk-min',
    'bajo' => 'doc-risk-low',
    'medio' => 'doc-risk-mid',
    'alto' => 'doc-risk-high',
    'muy_alto' => 'doc-risk-critical',
  ];

  $totalRiesgos = $totalRiesgos ?? ($data->count() ?? 0);
  $maxRiesgo = $data->max('nivel_riesgo') ?? 0;
  $promedioRiesgo = $totalRiesgos > 0 ? round($data->avg('nivel_riesgo'), 2) : 0;

  $topNivelKey = collect($niveles ?? [])->sortDesc()->keys()->first() ?? 'muy_bajo';
  if(($niveles[$topNivelKey] ?? 0) == 0){ $topNivelKey = 'muy_bajo'; }
  $topNivelTxt = $labelsNivel[$topNivelKey] ?? 'Sin clasificar';

  $deficienciasNombre = [1=>'Pasivas',2=>'Activas',3=>'Humanas',4=>'Documentales'];
  $impactosNombre = [1=>'Patrimonial',2=>'Operacional',3=>'Comercial',4=>'Reputacional',5=>'Humano',6=>'Ambiental',7=>'Comunidad / social',8=>'Financiero',9=>'Tecnológico',10=>'Legal / Regulatorio'];

  $objetivo = 'El presente estudio de riesgos tiene por objetivo identificar los riesgos que amenazan a la organización, evaluar la frecuencia de exposición con las medidas de prevención y protección existentes, estimar el impacto y redefinir medidas adecuadas que permitan reducir la exposición, ocurrencia o consecuencias de eventos amenazantes.';

  $criteriosEvaluacion = [
    'Business Alliance for Secure Commerce (BASC)',
    'Operador Económico Autorizado (OEA)',
    'Customs-Trade Partnership Against Terrorism (C-TPAT)',
  ];

  $itemsSimulados = [
    'Seguridad del perímetro',
    'Control de accesos empleados',
    'Control de accesos proveedores y terceros',
    'Control de accesos transporte de carga',
    'Sistema de vigilancia CCTV',
    'Estructura de protección y vigilancia',
    'Iluminación',
  ];

  $rangos = [
    ['nivel'=>'Muy Alto','rango'=>'36.10 - 100','aceptabilidad'=>'Inaceptable','respuesta'=>'Acción fundamental inmediata','class'=>'doc-risk-critical'],
    ['nivel'=>'Alto','rango'=>'16.10 - 36.09','aceptabilidad'=>'Inaceptable','respuesta'=>'Acción fundamental a corto plazo','class'=>'doc-risk-high'],
    ['nivel'=>'Medio','rango'=>'6.50 - 16.09','aceptabilidad'=>'Inaceptable','respuesta'=>'Acción fundamental a mediano plazo','class'=>'doc-risk-mid'],
    ['nivel'=>'Bajo','rango'=>'1.50 - 6.49','aceptabilidad'=>'Tolerable','respuesta'=>'Monitorear','class'=>'doc-risk-low'],
    ['nivel'=>'Muy Bajo','rango'=>'0 - 1.49','aceptabilidad'=>'Aceptable','respuesta'=>'Aceptable','class'=>'doc-risk-min'],
  ];

  $factorExposicion = [
    ['factor'=>'3.162','exposicion'=>'Muy Alta','control'=>'Inoperante','criterio'=>'Cuenta con los criterios de control, pero no funcionan.'],
    ['factor'=>'3.162','exposicion'=>'Muy Alta','control'=>'Sin control','criterio'=>'No se cuenta con los criterios de control.'],
    ['factor'=>'2.530','exposicion'=>'Alta','control'=>'Deficiente','criterio'=>'Cuenta con los criterios de control, pero no son los adecuados para la instalación.'],
    ['factor'=>'1.897','exposicion'=>'Media','control'=>'Regular','criterio'=>'Cuenta con los criterios de control, pero existen posibilidades de mejora.'],
    ['factor'=>'1.265','exposicion'=>'Baja','control'=>'Eficiente','criterio'=>'Los criterios de control son adecuados a la instalación.'],
    ['factor'=>'0.632','exposicion'=>'Muy Baja','control'=>'Óptimo','criterio'=>'Excede los criterios de control.'],
  ];

  $factorProbabilidad = [
    ['factor'=>'3.162','exposicion'=>'Muy Alta','criterio'=>'Casi seguro que ocurra.'],
    ['factor'=>'2.530','exposicion'=>'Alta','criterio'=>'50% probabilidad que ocurra.'],
    ['factor'=>'1.897','exposicion'=>'Media','criterio'=>'Posiblemente que ocurra.'],
    ['factor'=>'1.265','exposicion'=>'Baja','criterio'=>'No se ha comprobado que ocurra.'],
    ['factor'=>'0.632','exposicion'=>'Muy Baja','criterio'=>'Prácticamente imposible que ocurra.'],
  ];

  $factorConsecuencia = [
    ['factor'=>'0.40','exposicion'=>'Insignificante','criterio'=>'Sin efecto alguno y/o afectaciones mínimas a la operación.'],
    ['factor'=>'1.20','exposicion'=>'Leve','criterio'=>'Quejas, retrasos normales de procesos, pérdida de eficacia o pérdidas económicas mínimas.'],
    ['factor'=>'2.00','exposicion'=>'Marginal','criterio'=>'Pérdidas económicas moderadas o daño patrimonial moderado.'],
    ['factor'=>'4.00','exposicion'=>'Grave','criterio'=>'Robos constantes, retrasos de operación, multas graves o cambios en procedimientos.'],
    ['factor'=>'6.00','exposicion'=>'Crítico','criterio'=>'Pérdidas financieras muy graves, asuntos legales, multas e indemnizaciones.'],
    ['factor'=>'8.00','exposicion'=>'Desastroso','criterio'=>'Pérdida de capacidad de servicio, pérdidas importantes o clientes clave.'],
    ['factor'=>'10.00','exposicion'=>'Catastrófico','criterio'=>'Riesgo extremo, enormes pérdidas económicas, cierre de operaciones o pérdida de empleos.'],
  ];

  $scenarioRows = collect($data ?? [])->values()->map(function($row, $i){
    $riesgo = (float)($row->nivel_riesgo ?? 0);
    if ($riesgo >= 36.10) { $nivel='Muy Alto'; $nivelKey='muy_alto'; }
    elseif ($riesgo >= 16.10) { $nivel='Alto'; $nivelKey='alto'; }
    elseif ($riesgo >= 6.50) { $nivel='Medio'; $nivelKey='medio'; }
    elseif ($riesgo >= 1.50) { $nivel='Bajo'; $nivelKey='bajo'; }
    else { $nivel='Muy Bajo'; $nivelKey='muy_bajo'; }
    return [
      'esc' => 'E.'.($i+1),
      'criterio' => optional($row->BarrerasPerimetrales)->alcance ?? 'Sin criterio',
      'ubicacion' => $row->ubicacion_riesgo ?: 'Sin información',
      'factor' => $row->factores_riesgo ?: 'Sin información',
      'evento' => $row->eventos_riesgo ?: 'Sin información',
      'fuente' => $row->fuente_riesgo ?: 'Sin información',
      'exp' => optional($row->factorExp)->factor_exposicion ?? '',
      'prob' => optional($row->hdProbabilidadif)->probabilidad ?? '',
      'sev' => optional($row->hdConsecuencia)->consecuencia ?? '',
      'ipd' => number_format($riesgo, 2),
      'nivel' => $nivel,
      'nivel_key' => $nivelKey,
      'contramedidas' => $row->contramedidas ?: 'Sin información',
    ];
  });

  $scenarioChunks = $scenarioRows->chunk(5)->values();
  $scenarioPages = max(1, $scenarioChunks->count());

  $pageObjetivo = 3;
  $pageMetodologia = 4;
  $pageRangos = 5;
  $pageContexto = 6;
  $pageRiesgos = 7;
  $pageKri = 8;
  $pageDistribucion = 9;
  $pageDebilidades = 10;
  $pageEscenarios = 11;
  $pageFotos = $pageEscenarios + $scenarioPages;
  $pageRecomendaciones = $pageFotos + 1;

  $indice = [
    ['num'=>'1', 'titulo'=>'Objetivo', 'pagina'=>$pageObjetivo],
    ['num'=>'2', 'titulo'=>'Alcance', 'pagina'=>$pageObjetivo],
    ['num'=>'2.1', 'titulo'=>'Criterios de Evaluación', 'pagina'=>$pageObjetivo],
    ['num'=>'3', 'titulo'=>'Referencias normativas', 'pagina'=>$pageObjetivo],
    ['num'=>'4', 'titulo'=>'Metodología de evaluación GIRO', 'pagina'=>$pageMetodologia],
    ['num'=>'4.1', 'titulo'=>'Formulación del riesgo', 'pagina'=>$pageMetodologia],
    ['num'=>'4.2', 'titulo'=>'Rangos de aceptabilidad', 'pagina'=>$pageRangos],
    ['num'=>'4.3', 'titulo'=>'Factores de evaluación', 'pagina'=>$pageRangos],
    ['num'=>'5', 'titulo'=>'Percepción de seguridad geográfica', 'pagina'=>$pageContexto],
    ['num'=>'6', 'titulo'=>'Identificación de riesgos latentes', 'pagina'=>$pageRiesgos],
    ['num'=>'7', 'titulo'=>'Key Risk Indicator (KRI)', 'pagina'=>$pageKri],
    ['num'=>'7.1', 'titulo'=>'Índice de distribución de eventos', 'pagina'=>$pageKri],
    ['num'=>'7.2', 'titulo'=>'Distribución porcentual de riesgos', 'pagina'=>$pageDistribucion],
    ['num'=>'7.3', 'titulo'=>'Debilidades del sistema de seguridad', 'pagina'=>$pageDebilidades],
    ['num'=>'8', 'titulo'=>'Análisis de escenarios', 'pagina'=>$pageEscenarios],
    ['num'=>'9', 'titulo'=>'Archivo fotográfico', 'pagina'=>$pageFotos],
    ['num'=>'10', 'titulo'=>'Recomendaciones', 'pagina'=>$pageRecomendaciones],
  ];
@endphp

<div class="doc-preview-shell {{ $modoPdf ? 'doc-pdf-mode' : '' }}">
  @if(!$modoPdf)
    <div class="doc-preview-toolbar">
      <div class="doc-toolbar-title">
        <span>Vista previa</span>
        <h3>Documento ejecutivo de riesgos</h3>
        <p>{{ $clienteNombre }}</p>
      </div>
      <div class="doc-toolbar-actions">
        <a href="{{ route('analisis.analisiscliente', $cliente->id) }}" class="btn btn-light-primary font-weight-bolder">
          <i class="la la-arrow-left"></i> Regresar
        </a>
        <a href="javascript:void(0);" onclick="window.print(); return false;" class="btn btn-primary font-weight-bolder">
          <i class="la la-file-pdf-o"></i> Descargar PDF
        </a>
      </div>
    </div>
  @endif

  <!-- GIRO_DOC_START -->
  <div class="doc-paper-stack">
    {{-- 1 PORTADA --}}
    <section class="doc-page doc-cover">
      <div class="doc-cover-band"></div>
      <div class="doc-cover-watermark">GIRO</div>
      <div class="doc-cover-logo-wrap">
        <img src="{{ $logoSrc }}" alt="GIRO" class="doc-cover-logo">
      </div>
      <div class="doc-cover-pill">Análisis ejecutivo de riesgos</div>
      <h1>Análisis de Riesgos</h1>
      <div class="doc-cover-client">
        <span>Cliente</span>
        <strong>{{ $clienteNombre }}</strong>
      </div>
      <div class="doc-cover-date">
        <span>Fecha de estudio</span>
        <strong>{{ $fechaEstudio }}</strong>
      </div>
      <table class="doc-cover-metrics">
        <tr>
          <td><span>Escenarios</span><b>{{ $totalRiesgos }}</b></td>
          <td><span>Riesgo dominante</span><b>{{ $topNivelTxt }}</b></td>
          <td><span>IPD promedio</span><b>{{ number_format($promedioRiesgo, 2) }}</b></td>
        </tr>
      </table>
      <div class="doc-page-foot"></div>
    </section>

    {{-- 2 ÍNDICE --}}
    <section class="doc-page">
      <header class="doc-page-header">
        <table><tr>
          <td class="doc-head-brand"><img src="{{ $logoSrc }}" alt="GIRO"></td>
          <td><h2>Análisis de Riesgo</h2><p>{{ $clienteNombre }}</p></td>
          <td class="doc-head-section">Índice</td>
        </tr></table>
      </header>
      <h2 class="doc-main-title">Índice del documento</h2>
      <div class="doc-index-list">
        @foreach($indice as $row)
          <div class="doc-index-row"><span>{{ $row['num'] }}.- {{ $row['titulo'] }}</span><em></em><b>{{ $row['pagina'] }}</b></div>
        @endforeach
      </div>
      <div class="doc-note-box">
        <b>Nota de versión:</b> Se integran datos reales del análisis social capturado. Ubicación, contexto ampliado y archivo fotográfico permanecen simulados hasta que esos módulos queden conectados a base de datos.
      </div>
      <div class="doc-page-foot"></div>
    </section>

    {{-- 3 OBJETIVO / ALCANCE --}}
    <section class="doc-page">
      <header class="doc-page-header">
        <table><tr>
          <td class="doc-head-brand"><img src="{{ $logoSrc }}" alt="GIRO"></td>
          <td><h2>Análisis de Riesgo</h2><p>{{ $clienteNombre }}</p></td>
          <td class="doc-head-section">Objetivo y alcance</td>
        </tr></table>
      </header>
      <div class="doc-section-card">
        <h2>1.- Objetivo</h2>
        <p>{{ $objetivo }}</p>
      </div>
      <div class="doc-section-card">
        <h2>2.- Alcance</h2>
        <p><b>Ubicación:</b> pendiente de integrar desde el módulo de ubicación del estudio.</p>
        <p><b>Contexto:</b> giro de la empresa, procesos críticos, horarios, rotación, plantilla, certificaciones y antecedentes se integrarán cuando esos campos queden registrados en base de datos.</p>
      </div>
      <table class="doc-card-table">
        <tr>
          <td>
            <h3>2.1 Criterios de Evaluación</h3>
            <ul>@foreach($criteriosEvaluacion as $item)<li>{{ $item }}</li>@endforeach</ul>
          </td>
          <td>
            <h3>2.3 Ítems de evaluación</h3>
            <ul>@foreach($itemsSimulados as $item)<li>{{ $item }}</li>@endforeach</ul>
          </td>
        </tr>
      </table>
      <div class="doc-page-foot"></div>
    </section>

    {{-- 4 METODOLOGÍA --}}
    <section class="doc-page">
      <header class="doc-page-header">
        <table><tr>
          <td class="doc-head-brand"><img src="{{ $logoSrc }}" alt="GIRO"></td>
          <td><h2>Análisis de Riesgo</h2><p>{{ $clienteNombre }}</p></td>
          <td class="doc-head-section">Metodología GIRO</td>
        </tr></table>
      </header>
      <div class="doc-section-card">
        <h2>4.- Metodología de evaluación GIRO</h2>
        <p>Cada escenario se evalúa mediante una matriz de frecuencia de amenaza y consecuencia, asignando valores ponderados de exposición, probabilidad e impacto. El resultado determina la clasificación del riesgo y facilita la toma de decisiones.</p>
      </div>
      <div class="doc-formula-line">
        <span>Riesgo</span><b>=</b><span>Exposición × Probabilidad</span><b>×</b><span>Consecuencia</span>
      </div>
      <h3 class="doc-subtitle">Matriz de aceptabilidad</h3>
      <table class="doc-heatmap">
        <tr><th>Amenaza \ Consecuencia</th><th>Insig.</th><th>Leve</th><th>Marginal</th><th>Grave</th><th>Crítico</th><th>Desast.</th><th>Catastr.</th></tr>
        <tr><td>Constante</td><td class="hm-low">4.0</td><td class="hm-mid">12.0</td><td class="hm-high">20.0</td><td class="hm-critical">40.0</td><td class="hm-critical">60.0</td><td class="hm-critical">80.0</td><td class="hm-critical">100.0</td></tr>
        <tr><td>Habitual</td><td class="hm-low">3.2</td><td class="hm-mid">9.6</td><td class="hm-high">16.0</td><td class="hm-critical">32.0</td><td class="hm-critical">48.0</td><td class="hm-critical">64.0</td><td class="hm-critical">80.0</td></tr>
        <tr><td>Frecuente</td><td class="hm-low">2.4</td><td class="hm-mid">7.2</td><td class="hm-mid">12.0</td><td class="hm-high">24.0</td><td class="hm-critical">36.0</td><td class="hm-critical">48.0</td><td class="hm-critical">60.0</td></tr>
        <tr><td>Ocasional</td><td class="hm-min">1.6</td><td class="hm-low">4.8</td><td class="hm-low">8.0</td><td class="hm-mid">16.0</td><td class="hm-high">24.0</td><td class="hm-high">32.0</td><td class="hm-critical">40.0</td></tr>
        <tr><td>Esporádico</td><td class="hm-min">0.8</td><td class="hm-low">2.4</td><td class="hm-low">4.0</td><td class="hm-low">8.0</td><td class="hm-mid">12.0</td><td class="hm-high">16.0</td><td class="hm-high">20.0</td></tr>
        <tr><td>Remoto</td><td class="hm-min">0.5</td><td class="hm-min">1.4</td><td class="hm-low">2.4</td><td class="hm-low">4.8</td><td class="hm-low">7.2</td><td class="hm-mid">9.6</td><td class="hm-mid">12.0</td></tr>
        <tr><td>Improbable</td><td class="hm-min">0.2</td><td class="hm-min">0.5</td><td class="hm-min">0.8</td><td class="hm-low">1.6</td><td class="hm-low">2.4</td><td class="hm-low">3.2</td><td class="hm-low">4.0</td></tr>
      </table>
      <div class="doc-page-foot"></div>
    </section>

    {{-- 5 RANGOS --}}
    <section class="doc-page">
      <header class="doc-page-header">
        <table><tr>
          <td class="doc-head-brand"><img src="{{ $logoSrc }}" alt="GIRO"></td>
          <td><h2>Análisis de Riesgo</h2><p>{{ $clienteNombre }}</p></td>
          <td class="doc-head-section">Rangos y factores</td>
        </tr></table>
      </header>
      <h2 class="doc-main-title">4.2 Rangos de aceptabilidad</h2>
      <table class="doc-data-table">
        <thead><tr><th>Clasificación</th><th>Rango</th><th>Aceptabilidad</th><th>Respuesta</th></tr></thead>
        <tbody>@foreach($rangos as $r)<tr><td><span class="doc-pill {{ $r['class'] }}">{{ $r['nivel'] }}</span></td><td>{{ $r['rango'] }}</td><td>{{ $r['aceptabilidad'] }}</td><td>{{ $r['respuesta'] }}</td></tr>@endforeach</tbody>
      </table>
      <table class="doc-card-table doc-mt">
        <tr>
          <td><h3>4.3 Factor de exposición</h3><table class="doc-mini-table"><tr><th>Factor</th><th>Exposición</th><th>Nivel</th></tr>@foreach($factorExposicion as $f)<tr><td>{{ $f['factor'] }}</td><td>{{ $f['exposicion'] }}</td><td>{{ $f['control'] }}</td></tr>@endforeach</table></td>
          <td><h3>4.4 Factor de probabilidad</h3><table class="doc-mini-table"><tr><th>Factor</th><th>Exposición</th><th>Criterio</th></tr>@foreach($factorProbabilidad as $f)<tr><td>{{ $f['factor'] }}</td><td>{{ $f['exposicion'] }}</td><td>{{ $f['criterio'] }}</td></tr>@endforeach</table></td>
        </tr>
      </table>
      <h3 class="doc-subtitle">4.5 Factor consecuencia</h3>
      <table class="doc-mini-table"><tr><th>Factor</th><th>Consecuencia</th><th>Criterio</th></tr>@foreach($factorConsecuencia as $f)<tr><td>{{ $f['factor'] }}</td><td>{{ $f['exposicion'] }}</td><td>{{ $f['criterio'] }}</td></tr>@endforeach</table>
      <div class="doc-page-foot"></div>
    </section>

    {{-- 6 CONTEXTO --}}
    <section class="doc-page">
      <header class="doc-page-header">
        <table><tr>
          <td class="doc-head-brand"><img src="{{ $logoSrc }}" alt="GIRO"></td>
          <td><h2>Análisis de Riesgo</h2><p>{{ $clienteNombre }}</p></td>
          <td class="doc-head-section">Contexto geográfico</td>
        </tr></table>
      </header>
      <h2 class="doc-main-title">5.- Percepción de seguridad geográfica</h2>
      <p class="doc-paragraph">La información geográfica, incidencia delictiva y evidencia fotográfica se integrará en una siguiente versión cuando se active el módulo de fotografías y ubicación del estudio.</p>
      <div class="doc-map-box"><div class="doc-map-pin">⌖</div><strong>Mapa / ubicación del sitio</strong><span>Contenido simulado temporal</span></div>
      <table class="doc-semaforo-table"><tr><td>Homicidios <span class="red-dot"></span></td><td>Secuestro <span class="red-dot"></span></td><td>Extorsión <span class="red-dot"></span></td></tr><tr><td>Narcomenudeo <span class="red-dot"></span></td><td>Robo a vehículo <span class="yellow-dot"></span></td><td>Robo a negocio <span class="red-dot"></span></td></tr></table>
      <div class="doc-page-foot"></div>
    </section>

    {{-- 7 LATENTES --}}
    <section class="doc-page">
      <header class="doc-page-header">
        <table><tr>
          <td class="doc-head-brand"><img src="{{ $logoSrc }}" alt="GIRO"></td>
          <td><h2>Análisis de Riesgo</h2><p>{{ $clienteNombre }}</p></td>
          <td class="doc-head-section">Riesgos latentes</td>
        </tr></table>
      </header>
      <h2 class="doc-main-title">6.- Identificación de los riesgos latentes</h2>
      <p class="doc-paragraph">Al término del análisis se identificaron los siguientes riesgos potenciales, derivados de los escenarios capturados en el sistema.</p>
      <div class="doc-latent-list">
        @foreach($riesgosLatentes as $riesgo)
          <div><span>!</span><strong>{{ $riesgo }}</strong></div>
        @endforeach
      </div>
      <div class="doc-note-box">La priorización deberá atender el nivel de criticidad, la exposición actual, la efectividad de los controles y la viabilidad de las medidas de mitigación registradas.</div>
      <div class="doc-page-foot"></div>
    </section>

    {{-- 8 KRI --}}
    <section class="doc-page">
      <header class="doc-page-header">
        <table><tr>
          <td class="doc-head-brand"><img src="{{ $logoSrc }}" alt="GIRO"></td>
          <td><h2>Análisis de Riesgo</h2><p>{{ $clienteNombre }}</p></td>
          <td class="doc-head-section">KRI</td>
        </tr></table>
      </header>
      <h2 class="doc-main-title">7.- Key Risk Indicator (KRI)</h2>
      <table class="doc-kpi-grid">
        <tr>
          <td><span>Total eventos</span><strong>{{ $totalRiesgos }}</strong></td>
          <td><span>Riesgo dominante</span><strong>{{ $topNivelTxt }}</strong></td>
          <td><span>IPD promedio</span><strong>{{ number_format($promedioRiesgo, 2) }}</strong></td>
          <td><span>IPD máximo</span><strong>{{ number_format($maxRiesgo, 2) }}</strong></td>
        </tr>
      </table>
      <h3 class="doc-subtitle">7.1 Índice de distribución de eventos</h3>
      <table class="doc-bars-table">
        <tr class="doc-bars-values">
          @foreach($labelsNivel as $key => $label)
            <td>{{ $niveles[$key] ?? 0 }}</td>
          @endforeach
        </tr>
        <tr class="doc-bars-row">
          @foreach($labelsNivel as $key => $label)
            @php $max = max(array_values($niveles ?: ['x'=>1])); $value = $niveles[$key] ?? 0; $height = $max > 0 ? max(10, round(($value / $max) * 155)) : 10; @endphp
            <td><div class="doc-bar {{ $colorsNivel[$key] }}" style="height:{{ $height }}px"></div></td>
          @endforeach
        </tr>
        <tr class="doc-bars-labels">
          @foreach($labelsNivel as $label)<td>{{ $label }}</td>@endforeach
        </tr>
      </table>
      <div class="doc-kri-insight">
        <b>Lectura ejecutiva:</b> el análisis concentra {{ number_format(($porcentajes['alto'] ?? 0) + ($porcentajes['muy_alto'] ?? 0), 2) }}% de escenarios en niveles Alto y Muy Alto.
      </div>
      <div class="doc-page-foot"></div>
    </section>

    {{-- 9 DISTRIBUCIÓN --}}
    <section class="doc-page">
      <header class="doc-page-header">
        <table><tr>
          <td class="doc-head-brand"><img src="{{ $logoSrc }}" alt="GIRO"></td>
          <td><h2>Análisis de Riesgo</h2><p>{{ $clienteNombre }}</p></td>
          <td class="doc-head-section">Distribución porcentual</td>
        </tr></table>
      </header>
      <h2 class="doc-main-title">7.2 Distribución porcentual de riesgos</h2>
      <table class="doc-data-table"><thead><tr><th>Nivel</th><th>Eventos</th><th>Distribución</th><th>Interpretación</th></tr></thead><tbody>
        @foreach($labelsNivel as $key => $label)
          <tr><td><span class="doc-pill {{ $colorsNivel[$key] }}">{{ $label }}</span></td><td>{{ $niveles[$key] ?? 0 }}</td><td>{{ number_format($porcentajes[$key] ?? 0, 2) }}%</td><td>{{ in_array($key,['alto','muy_alto']) ? 'Atención prioritaria' : ($key === 'medio' ? 'Plan de acción' : 'Monitoreo') }}</td></tr>
        @endforeach
      </tbody></table>
      <h3 class="doc-subtitle">Distribución por criterio</h3>
      <table class="doc-data-table compact"><thead><tr><th>Criterio</th><th>Muy Bajo</th><th>Bajo</th><th>Medio</th><th>Alto</th><th>Muy Alto</th><th>Total</th></tr></thead><tbody>
        @foreach($riesgosPorCriterio as $row)
          <tr><td>{{ $row['criterio'] }}</td><td>{{ $row['muy_bajo'] }}</td><td>{{ $row['bajo'] }}</td><td>{{ $row['medio'] }}</td><td>{{ $row['alto'] }}</td><td>{{ $row['muy_alto'] }}</td><td>{{ $row['total'] }}</td></tr>
        @endforeach
      </tbody></table>
      <div class="doc-page-foot"></div>
    </section>

    {{-- 10 DEBILIDADES --}}
    <section class="doc-page">
      <header class="doc-page-header">
        <table><tr>
          <td class="doc-head-brand"><img src="{{ $logoSrc }}" alt="GIRO"></td>
          <td><h2>Análisis de Riesgo</h2><p>{{ $clienteNombre }}</p></td>
          <td class="doc-head-section">Debilidades</td>
        </tr></table>
      </header>
      <h2 class="doc-main-title">7.3 Debilidades del sistema de seguridad</h2>
      <table class="doc-card-table">
        <tr>
          <td><h3>Vulnerabilidades identificadas</h3><table class="doc-mini-table"><tr><th>Tipo</th><th>Eventos</th></tr>@foreach($deficienciasNombre as $id => $name)<tr><td>{{ $name }}</td><td>{{ $deficienciasConteo[$id] ?? 0 }}</td></tr>@endforeach</table></td>
          <td><h3>Áreas de impacto organizacional</h3><table class="doc-mini-table"><tr><th>Impacto</th><th>Eventos</th></tr>@foreach($impactosNombre as $id => $name)<tr><td>{{ $name }}</td><td>{{ $impactosConteo[$id] ?? 0 }}</td></tr>@endforeach</table></td>
        </tr>
      </table>
      <div class="doc-note-box">Las categorías con mayor concentración deben considerarse como puntos de enfoque para la estrategia de mitigación y seguimiento.</div>
      <div class="doc-page-foot"></div>
    </section>

    {{-- 11+ ESCENARIOS --}}
    @foreach($scenarioChunks as $chunkIndex => $chunk)
      <section class="doc-page doc-page-wide">
        <header class="doc-page-header">
        <table><tr>
          <td class="doc-head-brand"><img src="{{ $logoSrc }}" alt="GIRO"></td>
          <td><h2>Análisis de Riesgo</h2><p>{{ $clienteNombre }}</p></td>
          <td class="doc-head-section">Análisis de escenarios</td>
        </tr></table>
      </header>
        <h2 class="doc-main-title">8.- Análisis de escenarios {{ $scenarioChunks->count() > 1 ? '(' . ($chunkIndex + 1) . '/' . $scenarioChunks->count() . ')' : '' }}</h2>
        <table class="doc-scenarios-table"><thead><tr><th>Esc.</th><th>Criterio</th><th>Ubicación</th><th>Factor de riesgo</th><th>Evento</th><th>Fuente</th><th>Exp.</th><th>Prob.</th><th>Sev.</th><th>IPD</th><th>Nivel</th></tr></thead><tbody>
          @foreach($chunk as $row)
            <tr><td>{{ $row['esc'] }}</td><td>{{ $row['criterio'] }}</td><td>{{ $row['ubicacion'] }}</td><td>{{ $row['factor'] }}</td><td>{{ $row['evento'] }}</td><td>{{ $row['fuente'] }}</td><td>{{ $row['exp'] }}</td><td>{{ $row['prob'] }}</td><td>{{ $row['sev'] }}</td><td>{{ $row['ipd'] }}</td><td><span class="doc-pill {{ $colorsNivel[$row['nivel_key']] ?? 'doc-risk-min' }}">{{ $row['nivel'] }}</span></td></tr>
          @endforeach
        </tbody></table>
        <div class="doc-page-foot"></div>
      </section>
    @endforeach

    {{-- FOTOS --}}
    <section class="doc-page">
      <header class="doc-page-header">
        <table><tr>
          <td class="doc-head-brand"><img src="{{ $logoSrc }}" alt="GIRO"></td>
          <td><h2>Análisis de Riesgo</h2><p>{{ $clienteNombre }}</p></td>
          <td class="doc-head-section">Archivo fotográfico</td>
        </tr></table>
      </header>
      <h2 class="doc-main-title">9.- Archivo fotográfico</h2>
      <p class="doc-paragraph">El módulo de fotografías se integrará posteriormente para permitir captura desde móvil o carga desde archivo.</p>
      <table class="doc-photo-grid"><tr><td>Fotografía 1<br><span>Pendiente</span></td><td>Fotografía 2<br><span>Pendiente</span></td></tr><tr><td>Fotografía 3<br><span>Pendiente</span></td><td>Fotografía 4<br><span>Pendiente</span></td></tr></table>
      <div class="doc-page-foot"></div>
    </section>

    {{-- RECOMENDACIONES --}}
    <section class="doc-page doc-last-page">
      <header class="doc-page-header">
        <table><tr>
          <td class="doc-head-brand"><img src="{{ $logoSrc }}" alt="GIRO"></td>
          <td><h2>Análisis de Riesgo</h2><p>{{ $clienteNombre }}</p></td>
          <td class="doc-head-section">Recomendaciones</td>
        </tr></table>
      </header>
      <h2 class="doc-main-title">10.- Recomendaciones</h2>
      <div class="doc-recommendations">
        @foreach($recomendaciones as $i => $rec)
          <div><span>{{ $i + 1 }}</span><p>{{ $rec }}</p></div>
        @endforeach
      </div>
      <div class="doc-final-card"><img src="{{ $logoSrc }}" alt="GIRO"><b>GIRO BY SIS PROTEC</b><p>Documento generado desde el sistema GIRO. La información presentada corresponde a los escenarios registrados al momento de la emisión.</p></div>
      <div class="doc-page-foot"></div>
    </section>
  </div>
<!-- GIRO_DOC_END -->
</div>

@if($modoPdf)
</body>
</html>
@else
@endsection
@endif
