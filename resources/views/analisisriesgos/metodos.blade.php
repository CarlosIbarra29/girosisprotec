@extends('layouts.app')

@push('scripts')
  <script src="{{ asset('js/cliente/NuevoCliente.js') }}"></script>
@endpush

@push('styles')
  <link href="{{ asset('/css/version2/tablesgen2.css?v=1.0.4') }}" rel="stylesheet" type="text/css" />
  <link href="{{ asset('/css/version2/metodos_riesgo.css?v=1.0.0') }}" rel="stylesheet" type="text/css" />
@endpush

@section('title')
  Métodos
@endsection

@section('content')

<div class="row giro-methods-page">
  <div class="col-lg-12">

    <div class="card card-custom gutter-b giro-methods-card">

      <div class="card-header giro-methods-header">
        <div class="card-title">
          <span class="card-icon">
            <i class="flaticon2-file text-primary"></i>
          </span>
          <h3 class="card-label">Clasificación de Riesgos</h3>
        </div>

        <div class="card-toolbar giro-methods-toolbar">
          <a href="{{ route('analisis.matrizaceptabilidad') }}"
             class="btn btn-light-primary font-weight-bolder mr-3 ml-3">
            <i class="la la-arrow-left"></i> Regresar
          </a>
        </div>
      </div>

      <div class="card-body giro-methods-body">

        <div class="giro-methods-hero">
          <div class="giro-methods-hero__icon">
            <i class="la la-layer-group"></i>
          </div>

          <div class="giro-methods-hero__content">
            <h4>Tablas base para cálculo y clasificación</h4>
            <p>
              Consulta de rangos, factores, niveles de amenaza, consecuencia y matrices de referencia.
            </p>
          </div>
        </div>

        {{-- 1. Tabla de Clasificación --}}
        <section class="giro-method-section">
          <div class="giro-section-title">
            <h4>Tabla de Clasificación</h4>
          </div>

          <div class="giro-table-scroll">
            <table class="giro-method-table">
              <thead>
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
                  <td><strong>Muy Alto</strong></td>
                  <td class="risk-muy-alto">36.1</td>
                  <td class="risk-muy-alto">100</td>
                  <td>Inaceptable</td>
                  <td>Acción fundamental inmediata</td>
                </tr>

                <tr>
                  <td><strong>Alto</strong></td>
                  <td class="risk-alto">16.1</td>
                  <td class="risk-alto">36</td>
                  <td>Inaceptable</td>
                  <td>Acción fundamental a corto plazo</td>
                </tr>

                <tr>
                  <td><strong>Medio</strong></td>
                  <td class="risk-medio">6.5</td>
                  <td class="risk-medio">16</td>
                  <td>Inaceptable</td>
                  <td>Acción fundamental a mediano plazo</td>
                </tr>

                <tr>
                  <td><strong>Bajo</strong></td>
                  <td class="risk-bajo">1.5</td>
                  <td class="risk-bajo">6.4</td>
                  <td>Tolerable</td>
                  <td>Monitorear</td>
                </tr>

                <tr>
                  <td><strong>Muy Bajo</strong></td>
                  <td class="risk-muy-bajo">0.0</td>
                  <td class="risk-muy-bajo">1.4</td>
                  <td>Tolerable</td>
                  <td>Monitorear</td>
                </tr>
              </tbody>
            </table>
          </div>

          <div class="giro-method-legend">
            <div class="legend-item"><span class="box risk-muy-bajo"></span> Muy Bajo</div>
            <div class="legend-item"><span class="box risk-bajo"></span> Bajo</div>
            <div class="legend-item"><span class="box risk-medio"></span> Medio</div>
            <div class="legend-item"><span class="box risk-alto"></span> Alto</div>
            <div class="legend-item"><span class="box risk-muy-alto"></span> Muy Alto</div>
          </div>
        </section>

        {{-- 2. Factor de exposición y probabilidad --}}
        <section class="giro-method-section">
          <div class="giro-section-title">
            <h4>Tabla de Factor de Exposición y Probabilidad</h4>
          </div>

          @php
            $valores = [
              ['label' => 'Muy Alta', 'valor' => 36.10, 'class' => 'level-danger'],
              ['label' => 'Alta', 'valor' => 16.10, 'class' => 'level-warning'],
              ['label' => 'Media', 'valor' => 6.50, 'class' => 'level-medium'],
              ['label' => 'Baja', 'valor' => 1.50, 'class' => 'level-success'],
              ['label' => 'Muy Baja', 'valor' => 0.00, 'class' => 'level-low'],
            ];
          @endphp

          <div class="giro-table-scroll">
            <table class="giro-method-table giro-method-table--split">
              <thead>
                <tr>
                  <th colspan="2">Factor de Exposición</th>
                  <th colspan="2">Probabilidad</th>
                </tr>
              </thead>

              <tbody>
                @foreach ($valores as $item)
                  <tr>
                    <td class="{{ $item['class'] }}"><strong>{{ $item['label'] }}</strong></td>
                    <td>{{ number_format($item['valor'], 2) }}</td>
                    <td class="{{ $item['class'] }}"><strong>{{ $item['label'] }}</strong></td>
                    <td>{{ number_format($item['valor'], 2) }}</td>
                  </tr>
                @endforeach
              </tbody>
            </table>
          </div>

          <div class="giro-method-legend">
            <div class="legend-item"><span class="box level-low-box"></span> Muy Baja</div>
            <div class="legend-item"><span class="box level-success-box"></span> Baja</div>
            <div class="legend-item"><span class="box level-medium-box"></span> Media</div>
            <div class="legend-item"><span class="box level-warning-box"></span> Alta</div>
            <div class="legend-item"><span class="box level-danger-box"></span> Muy Alta</div>
          </div>
        </section>

        {{-- 3. Nivel de Amenaza y Consecuencia --}}
        <section class="giro-method-section">
          <div class="giro-section-title">
            <h4>Tabla de Nivel de Amenaza y Consecuencia</h4>
          </div>

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

            function giroLevelClass($value) {
              if ($value >= 8) return 'level-danger';
              if ($value >= 4) return 'level-warning';
              return 'level-success';
            }
          @endphp

          <div class="giro-table-scroll">
            <table class="giro-method-table giro-method-table--split">
              <thead>
                <tr>
                  <th colspan="2">Nivel de Amenaza</th>
                  <th colspan="2">Consecuencia</th>
                </tr>
              </thead>

              <tbody>
                @foreach ($datos as $item)
                  <tr>
                    <td class="{{ giroLevelClass($item['valor_a']) }}"><strong>{{ $item['amenaza'] }}</strong></td>
                    <td>{{ $item['valor_a'] }}</td>
                    <td class="{{ giroLevelClass($item['valor_c']) }}"><strong>{{ $item['consecuencia'] }}</strong></td>
                    <td>{{ $item['valor_c'] }}</td>
                  </tr>
                @endforeach
              </tbody>
            </table>
          </div>

          <div class="giro-method-legend">
            <div class="legend-item"><span class="box level-success-box"></span> Bajo / Controlado</div>
            <div class="legend-item"><span class="box level-warning-box"></span> Medio / Atención</div>
            <div class="legend-item"><span class="box level-danger-box"></span> Alto / Crítico</div>
          </div>
        </section>

        {{-- 4. Matriz Frecuencia vs Impacto --}}
        <section class="giro-method-section">
          <div class="giro-section-title">
            <h4>Matriz de Frecuencia vs Impacto</h4>
          </div>

          <div class="giro-table-scroll">
            <table class="giro-method-table giro-method-table--matrix">
              <thead>
                <tr>
                  <th rowspan="2">Frecuencia</th>
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
                  <td><strong>Probabilidad Compr.</strong></td>
                  <td class="matrix-none">10</td>
                  <td class="matrix-low">25</td>
                  <td class="matrix-medium">50</td>
                  <td class="matrix-high">75</td>
                  <td class="matrix-critical">100</td>
                </tr>

                <tr>
                  <td><strong>Frecuente</strong></td>
                  <td class="matrix-none">8</td>
                  <td class="matrix-low">20</td>
                  <td class="matrix-medium">40</td>
                  <td class="matrix-high">60</td>
                  <td class="matrix-critical">80</td>
                </tr>

                <tr>
                  <td><strong>Posible</strong></td>
                  <td class="matrix-none">6</td>
                  <td class="matrix-very-low">15</td>
                  <td class="matrix-low">30</td>
                  <td class="matrix-medium">45</td>
                  <td class="matrix-high">60</td>
                </tr>

                <tr>
                  <td><strong>Raro</strong></td>
                  <td class="matrix-none">4</td>
                  <td class="matrix-none">10</td>
                  <td class="matrix-very-low">20</td>
                  <td class="matrix-low">30</td>
                  <td class="matrix-medium">40</td>
                </tr>

                <tr>
                  <td><strong>Improbable</strong></td>
                  <td class="matrix-none">2</td>
                  <td class="matrix-none">5</td>
                  <td class="matrix-none">10</td>
                  <td class="matrix-very-low">15</td>
                  <td class="matrix-very-low">20</td>
                </tr>
              </tbody>
            </table>
          </div>

          <div class="giro-method-legend">
            <div class="legend-item"><span class="box matrix-none"></span> Insignificante</div>
            <div class="legend-item"><span class="box matrix-very-low"></span> Muy Bajo</div>
            <div class="legend-item"><span class="box matrix-low"></span> Bajo</div>
            <div class="legend-item"><span class="box matrix-medium"></span> Medio</div>
            <div class="legend-item"><span class="box matrix-high"></span> Alto</div>
            <div class="legend-item"><span class="box matrix-critical"></span> Muy Alto</div>
          </div>
        </section>

        {{-- 5. Matriz de Clasificación de Riesgo --}}
        <section class="giro-method-section">
          <div class="giro-section-title">
            <h4>Matriz de Clasificación de Riesgo</h4>
          </div>

          <div class="giro-table-scroll">
            <table class="giro-method-table">
              <thead>
                <tr>
                  <th>Nivel</th>
                  <th>Código</th>
                  <th>Probabilidad Baja</th>
                  <th>Probabilidad Alta</th>
                </tr>
              </thead>

              <tbody>
                <tr>
                  <td><strong>Catastófico</strong></td>
                  <td>A</td>
                  <td class="matrix-high">50.1%</td>
                  <td class="matrix-high">100%</td>
                </tr>

                <tr>
                  <td><strong>Grave</strong></td>
                  <td>B</td>
                  <td class="matrix-medium">20.1%</td>
                  <td class="matrix-low">50%</td>
                </tr>

                <tr>
                  <td><strong>Moderado</strong></td>
                  <td>C</td>
                  <td class="matrix-very-low">10.1%</td>
                  <td class="matrix-very-low">20%</td>
                </tr>

                <tr>
                  <td><strong>Bajo</strong></td>
                  <td>D</td>
                  <td class="matrix-none">0.1%</td>
                  <td class="matrix-none">10%</td>
                </tr>
              </tbody>
            </table>
          </div>

          <div class="giro-method-legend">
            <div class="legend-item"><span class="box matrix-none"></span> Insignificante</div>
            <div class="legend-item"><span class="box matrix-very-low"></span> Muy Bajo</div>
            <div class="legend-item"><span class="box matrix-low"></span> Bajo</div>
            <div class="legend-item"><span class="box matrix-medium"></span> Medio</div>
            <div class="legend-item"><span class="box matrix-high"></span> Alto</div>
          </div>
        </section>

        {{-- 6. Nivel Control y Exposición --}}
        <section class="giro-method-section">
          <div class="giro-section-title">
            <h4>Nivel de Control vs Exposición</h4>
          </div>

          <div class="giro-table-scroll">
            <table class="giro-method-table">
              <thead>
                <tr>
                  <th>Nivel de Control</th>
                  <th>Exposición</th>
                </tr>
              </thead>

              <tbody>
                <tr>
                  <td><strong>Inoperante</strong></td>
                  <td class="level-danger"><strong>Muy Alta</strong></td>
                </tr>
                <tr>
                  <td><strong>Sin control</strong></td>
                  <td class="level-danger"><strong>Muy Alta</strong></td>
                </tr>
                <tr>
                  <td><strong>Deficiente</strong></td>
                  <td class="level-warning"><strong>Alta</strong></td>
                </tr>
                <tr>
                  <td><strong>Regular</strong></td>
                  <td class="level-medium"><strong>Media</strong></td>
                </tr>
                <tr>
                  <td><strong>Eficiente</strong></td>
                  <td class="level-success"><strong>Baja</strong></td>
                </tr>
                <tr>
                  <td><strong>Óptimo</strong></td>
                  <td class="level-low"><strong>Muy Baja</strong></td>
                </tr>
              </tbody>
            </table>
          </div>
        </section>

      </div>
    </div>

  </div>
</div>

@endsection