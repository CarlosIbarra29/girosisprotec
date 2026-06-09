@extends('layouts.app')

@push('scripts')
  <script src="{{ asset('js/cliente/NuevoCliente.js') }}"></script>
@endpush

@push('styles')
  <link href="{{ asset('/css/version2/tablesgen2.css?v=1.0.4') }}" rel="stylesheet" type="text/css" />
  <link href="{{ asset('/css/version2/matriz_aceptabilidad.css?v=1.0.0') }}" rel="stylesheet" type="text/css" />
@endpush

@section('title')
  Matriz de Aceptabilidad
@endsection

@section('content')

<div class="row giro-accept-page">
  <div class="col-lg-12">
    <div class="card card-custom gutter-b giro-accept-card">

      <div class="card-header giro-accept-header">
        <div class="card-title">
          <span class="card-icon">
            <i class="flaticon2-file text-primary"></i>
          </span>
          <h3 class="card-label">Matriz de Aceptabilidad</h3>
        </div>

        <div class="card-toolbar giro-accept-toolbar">
          <a href="{{ route('analisis.metodos') }}" class="btn btn-light-primary font-weight-bolder mr-3 ml-3">
            <i class="la la-calculator"></i> Clasificación de Riesgos
          </a>

          <a href="{{ route('hd.parametros') }}" class="btn btn-light-primary font-weight-bolder mr-3 ml-3">
            <i class="la la-arrow-left"></i> Regresar
          </a>
        </div>
      </div>

      <div class="card-body giro-accept-body">

        <div class="giro-accept-hero">
          <div class="giro-accept-hero__icon">
            <i class="la la-th"></i>
          </div>

          <div class="giro-accept-hero__content">
            <h4>Nuestra Matriz de Aceptabilidad Giro by Sisprotec</h4>
            <p>
              Evaluación visual del nivel de riesgo combinando amenaza e impacto/severidad.
            </p>
          </div>

          <div class="giro-accept-hero__badge">
            Valores 2026
          </div>
        </div>

        <div class="giro-matrix-shell">
          <div class="giro-matrix-scroll">
            <table class="giro-matrix-table">
              <tbody>
                <tr>
                  <td class="axis-threat text-left"><span class="risk-badge">7</span> Constante</td>
                  <td class="axis-value">10.0</td>
                  <td class="green">4.0</td>
                  <td class="yellow">12.0</td>
                  <td class="red">20.0</td>
                  <td class="red-forte">40.0</td>
                  <td class="red-forte">60.0</td>
                  <td class="red-forte">80.0</td>
                  <td class="red-forte">100.0</td>
                </tr>

                <tr>
                  <td class="axis-threat text-left"><span class="risk-badge">6</span> Habitual</td>
                  <td class="axis-value">8.0</td>
                  <td class="green">3.2</td>
                  <td class="yellow">9.6</td>
                  <td class="yellow">16.0</td>
                  <td class="red">32.0</td>
                  <td class="red-forte">48.0</td>
                  <td class="red-forte">64.0</td>
                  <td class="red-forte">80.0</td>
                </tr>

                <tr>
                  <td class="axis-threat text-left"><span class="risk-badge">5</span> Frecuente</td>
                  <td class="axis-value">6.0</td>
                  <td class="green">2.4</td>
                  <td class="yellow">7.2</td>
                  <td class="yellow">12.0</td>
                  <td class="red">24.0</td>
                  <td class="red">36.0</td>
                  <td class="red-forte">48.0</td>
                  <td class="red-forte">60.0</td>
                </tr>

                <tr>
                  <td class="axis-threat text-left"><span class="risk-badge">4</span> Ocasional</td>
                  <td class="axis-value">4.0</td>
                  <td class="green">1.6</td>
                  <td class="green">4.8</td>
                  <td class="yellow">8.0</td>
                  <td class="yellow">16.0</td>
                  <td class="red">24.0</td>
                  <td class="red">32.0</td>
                  <td class="red-forte">40.0</td>
                </tr>

                <tr>
                  <td class="axis-threat text-left"><span class="risk-badge">3</span> Esporádico</td>
                  <td class="axis-value">2.0</td>
                  <td class="green">0.8</td>
                  <td class="green">2.4</td>
                  <td class="green">4.0</td>
                  <td class="yellow">8.0</td>
                  <td class="yellow">12.0</td>
                  <td class="yellow">16.0</td>
                  <td class="red">20.0</td>
                </tr>

                <tr>
                  <td class="axis-threat text-left"><span class="risk-badge">2</span> Remoto</td>
                  <td class="axis-value">1.2</td>
                  <td class="green">0.5</td>
                  <td class="green">1.4</td>
                  <td class="green">2.4</td>
                  <td class="green">4.8</td>
                  <td class="yellow">7.2</td>
                  <td class="yellow">9.6</td>
                  <td class="yellow">12.0</td>
                </tr>

                <tr>
                  <td class="axis-threat text-left"><span class="risk-badge">1</span> Improbable</td>
                  <td class="axis-value">0.4</td>
                  <td class="green">0.2</td>
                  <td class="green">0.5</td>
                  <td class="green">0.8</td>
                  <td class="green">1.6</td>
                  <td class="green">2.4</td>
                  <td class="green">3.2</td>
                  <td class="green">4.0</td>
                </tr>

                <tr class="axis-row">
                  <td colspan="2">Amenaza</td>
                  <td>0.4</td>
                  <td>1.2</td>
                  <td>2.0</td>
                  <td>4.0</td>
                  <td>6.0</td>
                  <td>8.0</td>
                  <td>10.0</td>
                </tr>

                <tr class="severity-row">
                  <th colspan="2">Impacto/Severidad</th>
                  <th><span class="sev-badge">1</span> Insignificante</th>
                  <th><span class="sev-badge">2</span> Leve</th>
                  <th><span class="sev-badge">3</span> Marginal</th>
                  <th><span class="sev-badge">4</span> Grave</th>
                  <th><span class="sev-badge">5</span> Crítico</th>
                  <th><span class="sev-badge">6</span> Desastroso</th>
                  <th><span class="sev-badge">7</span> Catastrófico</th>
                </tr>
              </tbody>
            </table>
          </div>
        </div>

        <div class="giro-accept-legend">
          <div class="legend-item"><span class="box green"></span> Aceptable</div>
          <div class="legend-item"><span class="box yellow"></span> Tolerable</div>
          <div class="legend-item"><span class="box red"></span> Importante</div>
          <div class="legend-item"><span class="box red-forte"></span> Inaceptable</div>
        </div>

        <div class="giro-accept-foot">
          Impacto / Severidad: <strong>1</strong> (Insignificante) a <strong>7</strong> (Catastrófico)
          <span></span>
          Nivel de Amenaza: <strong>1</strong> (Improbable) a <strong>7</strong> (Constante)
        </div>

        <div class="giro-classification-shell">
          <div class="giro-section-title">
            <h4>Clasificación y respuesta</h4>
          </div>

          <div class="giro-classification-scroll">
            <table class="giro-classification-table">
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
                  <td><strong>Muy Alto</strong></td>
                  <td class="red-forte">36.1</td>
                  <td class="red-forte">100</td>
                  <td>Inaceptable</td>
                  <td>Acción fundamental inmediata</td>
                </tr>

                <tr>
                  <td><strong>Alto</strong></td>
                  <td class="red">16.1</td>
                  <td class="red">36</td>
                  <td>Inaceptable</td>
                  <td>Acción fundamental a corto plazo</td>
                </tr>

                <tr>
                  <td><strong>Medio</strong></td>
                  <td class="yellow">6.5</td>
                  <td class="yellow">16</td>
                  <td>Inaceptable</td>
                  <td>Acción fundamental a mediano plazo</td>
                </tr>

                <tr>
                  <td><strong>Bajo</strong></td>
                  <td class="green">1.5</td>
                  <td class="green">6.4</td>
                  <td>Tolerable</td>
                  <td>Monitorear</td>
                </tr>

                <tr>
                  <td><strong>Muy Bajo</strong></td>
                  <td class="neutral">0</td>
                  <td class="neutral">1.4</td>
                  <td>Tolerable</td>
                  <td>Monitorear</td>
                </tr>
              </tbody>
            </table>
          </div>

          <div class="giro-values-note">
            *Valores establecidos 2026
          </div>
        </div>

      </div>
    </div>
  </div>
</div>

@endsection