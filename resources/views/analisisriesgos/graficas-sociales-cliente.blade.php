@extends('layouts.app')

@push('scripts')
  <script src="{{ asset('js/cliente/CatalogoClientes.js') }}"></script>
  <meta name="csrf-token" content="{{ csrf_token() }}" />
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.js"></script>

  <script type="text/javascript">
    @php
      $indiceDistribucionData = [
        (int) ($conteoIndice['muy_bajo'] ?? 0),
        (int) ($conteoIndice['bajo'] ?? 0),
        (int) ($conteoIndice['medio'] ?? 0),
        (int) ($conteoIndice['alto'] ?? 0),
        (int) ($conteoIndice['muy_alto'] ?? 0),
      ];
    @endphp

    const indiceDistribucionData = {!! json_encode($indiceDistribucionData) !!};

    const vulnerabilidadLabels = {!! json_encode($vulnerabilidadLabels ?? []) !!};
    const vulnerabilidadPromedios = {!! json_encode($vulnerabilidadPromedios ?? []) !!};

    const riesgosPorCriterioLabels = {!! json_encode($riesgosPorCriterioLabels ?? []) !!};
    const riesgosPorCriterioMuyAlto = {!! json_encode($riesgosPorCriterioMuyAlto ?? []) !!};
    const riesgosPorCriterioAlto = {!! json_encode($riesgosPorCriterioAlto ?? []) !!};
    const riesgosPorCriterioMedio = {!! json_encode($riesgosPorCriterioMedio ?? []) !!};
    const riesgosPorCriterioBajo = {!! json_encode($riesgosPorCriterioBajo ?? []) !!};
    const riesgosPorCriterioMuyBajo = {!! json_encode($riesgosPorCriterioMuyBajo ?? []) !!};

    document.addEventListener('DOMContentLoaded', function () {

      /* ========= Tabs / mostrar solo una gráfica ========= */
      const tabs = document.querySelectorAll('.giro-kpi-tab');
      const panels = document.querySelectorAll('.giro-chart-panel');

      tabs.forEach(function(tab){
        tab.addEventListener('click', function(){
          const target = this.getAttribute('data-chart-target');

          tabs.forEach(function(btn){
            btn.classList.remove('is-active');
          });

          panels.forEach(function(panel){
            panel.classList.remove('is-active');
          });

          this.classList.add('is-active');

          const selectedPanel = document.getElementById(target);
          if (selectedPanel) {
            selectedPanel.classList.add('is-active');
          }
        });
      });

      /* ========= Config global Chart ========= */
      Chart.defaults.global.defaultFontColor = '#121212';
      Chart.defaults.global.defaultFontFamily = "'Poppins', Arial, sans-serif";

      /* ========= Plugin: valores arriba de cada barra (solo índice) ========= */
      Chart.plugins.register({
        afterDatasetsDraw: function(chart) {
          if (chart.config.type !== 'bar' || chart.canvas.id !== 'myindicedistribucion') return;

          var ctx = chart.ctx;
          ctx.save();
          ctx.font = "bold 15px Poppins, Arial, sans-serif";
          ctx.fillStyle = "#121212";
          ctx.textAlign = "center";
          ctx.textBaseline = "bottom";

          var meta = chart.getDatasetMeta(0);
          meta.data.forEach(function(bar, index) {
            var value = chart.data.datasets[0].data[index];
            ctx.fillText(value, bar._model.x, bar._model.y - 8);
          });

          ctx.restore();
        }
      });

      /* ========= Plugin: flecha + líneas de referencia (solo vulnerabilidad) ========= */
      Chart.plugins.register({
        afterDraw: function(chart) {
          if (chart.canvas.id !== 'myanalisisvulnerabilidad') return;

          var ctx = chart.chart.ctx;
          var yAxis = chart.scales['y-axis-0'];
          var chartArea = chart.chartArea;
          var isMobile = window.innerWidth <= 768;

          if (!yAxis || !chartArea) return;

          var niveles = [
            { value: 10, label: 'Óptimo',      color: '#00B050' },
            { value: 8,  label: 'Eficiente',   color: '#92D050' },
            { value: 6,  label: 'Regular',     color: '#FFC000' },
            { value: 4,  label: 'Deficiente',  color: '#FF4F81' },
            { value: 2,  label: 'Sin Control', color: '#C00000' }
          ];

          var arrowX  = chartArea.right + (isMobile ? 40 : 46);
          var arrowTop = yAxis.getPixelForValue(10);
          var arrowBottom = yAxis.getPixelForValue(0.5);

          var lineEndX = chartArea.right + (isMobile ? 76 : 120);
          var labelX   = chartArea.right + (isMobile ? 62 : 86);
          var fontSize = isMobile ? 11 : 14;

          ctx.save();

          /* 1) líneas horizontales */
          niveles.forEach(function(nivel) {
            var y = yAxis.getPixelForValue(nivel.value);

            ctx.beginPath();
            ctx.strokeStyle = nivel.color;
            ctx.lineWidth = 2;
            ctx.moveTo(chartArea.left, y);
            ctx.lineTo(lineEndX, y);
            ctx.stroke();
          });

          /* 2) flecha */
          var grad = ctx.createLinearGradient(0, arrowBottom, 0, arrowTop);
          grad.addColorStop(0, '#111111');
          grad.addColorStop(0.25, '#C00000');
          grad.addColorStop(0.5, '#FF0000');
          grad.addColorStop(0.75, '#FFC000');
          grad.addColorStop(1, '#92D050');

          ctx.fillStyle = grad;
          ctx.fillRect(arrowX - 9, arrowTop + 20, 18, arrowBottom - arrowTop - 28);

          ctx.beginPath();
          ctx.moveTo(arrowX, arrowTop);
          ctx.lineTo(arrowX - 20, arrowTop + 20);
          ctx.lineTo(arrowX + 20, arrowTop + 20);
          ctx.closePath();
          ctx.fill();

          /* 3) texto encima (para que no se pierda detrás) */
          niveles.forEach(function(nivel) {
            var y = yAxis.getPixelForValue(nivel.value);

            ctx.font = 'bold ' + fontSize + 'px Poppins, Arial, sans-serif';
            ctx.textAlign = 'left';
            ctx.textBaseline = 'middle';

            var textW = ctx.measureText(nivel.label).width;
            ctx.fillStyle = 'rgba(255,255,255,0.92)';
            ctx.fillRect(labelX - 4, y - (fontSize / 2) - 2, textW + 8, fontSize + 4);

            ctx.fillStyle = '#4A6FA5';
            ctx.fillText(nivel.label, labelX, y);
          });

          ctx.restore();
        }
      });

      /* ========= Sombra suave para barras (global) ========= */
      var originalBarDraw = Chart.elements.Rectangle.prototype.draw;
      Chart.elements.Rectangle.prototype.draw = function() {
        var ctx = this._chart.ctx;

        ctx.save();
        ctx.shadowColor = 'rgba(0,0,0,0.18)';
        ctx.shadowBlur = 10;
        ctx.shadowOffsetX = 2;
        ctx.shadowOffsetY = 4;

        originalBarDraw.apply(this, arguments);
        ctx.restore();
      };

      /* ========= 1. Índice de distribución ========= */
      var canvasIndice = document.getElementById('myindicedistribucion');
      var ctx1 = canvasIndice.getContext('2d');

      function crearGradientesIndice(ctx) {
        var g1 = ctx.createLinearGradient(0, 0, 0, 320);
        g1.addColorStop(0, 'rgba(255,255,255,1)');
        g1.addColorStop(1, 'rgba(235,235,235,0.95)');

        var g2 = ctx.createLinearGradient(0, 0, 0, 320);
        g2.addColorStop(0, 'rgba(153,255,153,1)');
        g2.addColorStop(1, 'rgba(110,230,110,0.90)');

        var g3 = ctx.createLinearGradient(0, 0, 0, 320);
        g3.addColorStop(0, 'rgba(255,255,120,1)');
        g3.addColorStop(1, 'rgba(255,215,0,0.92)');

        var g4 = ctx.createLinearGradient(0, 0, 0, 320);
        g4.addColorStop(0, 'rgba(255,80,80,1)');
        g4.addColorStop(1, 'rgba(255,0,0,0.92)');

        var g5 = ctx.createLinearGradient(0, 0, 0, 320);
        g5.addColorStop(0, 'rgba(230,40,40,1)');
        g5.addColorStop(1, 'rgba(204,0,0,0.95)');

        return [g1, g2, g3, g4, g5];
      }

      var gradientesIndice = crearGradientesIndice(ctx1);

      new Chart(ctx1, {
        type: 'bar',
        data: {
          labels: ['Muy Bajo','Bajo','Medio','Alto','Muy Alto'],
          datasets: [{
            label: 'Cantidad de registros',
            data: indiceDistribucionData,
            backgroundColor: gradientesIndice,
            borderColor: [
              'rgba(180,180,180,1)',
              'rgba(153,255,153,1)',
              'rgba(210,210,0,1)',
              'rgba(255,0,0,1)',
              'rgba(204,0,0,1)'
            ],
            borderWidth: 3,
            hoverBackgroundColor: gradientesIndice,
            hoverBorderWidth: 5,
            categoryPercentage: 0.62,
            barPercentage: 0.82
          }]
        },
        options: {
          responsive: true,
          maintainAspectRatio: false,
          animation: {
            duration: 1200,
            easing: 'easeOutQuart'
          },
          legend: { display: false },
          tooltips: {
            backgroundColor: 'rgba(18,18,18,0.92)',
            titleFontStyle: 'bold',
            bodyFontStyle: 'bold',
            displayColors: false,
            callbacks: {
              label: function(tooltipItem) {
                return 'Registros: ' + tooltipItem.yLabel;
              }
            }
          },
          scales: {
            yAxes: [{
              ticks: {
                beginAtZero: true,
                precision: 0,
                stepSize: 1,
                fontColor: '#121212',
                fontStyle: 'bold'
              },
              gridLines: {
                color: 'rgba(0,0,0,0.08)',
                zeroLineColor: 'rgba(0,0,0,0.14)'
              }
            }],
            xAxes: [{
              ticks: {
                fontColor: '#121212',
                fontStyle: 'bold'
              },
              gridLines: { display: false }
            }]
          }
        }
      });

      /* ========= 2. Daño potencial ========= */
      var ctx2 = document.getElementById('mydapotencial').getContext('2d');
      new Chart(ctx2, {
        type: 'line',
        data: {
          labels: ['Muy Bajo','Bajo','Medio','Alto','Muy Alto'],
          datasets: [{
            label: 'Documentación',
            data: [75, 55, 35, 15, 5],
            backgroundColor: 'rgba(194, 164, 118, 0.20)',
            borderColor: 'rgba(194, 164, 118, 1)',
            pointBackgroundColor: 'rgba(127, 101, 63, 1)',
            pointBorderColor: 'rgba(255,255,255,1)',
            pointRadius: 4,
            borderWidth: 2,
            fill: true,
            lineTension: 0.25
          }]
        },
        options: {
          responsive: true,
          maintainAspectRatio: false,
          legend: { display: true, position: 'top' },
          scales: {
            yAxes: [{
              ticks: { beginAtZero: true },
              gridLines: { color: 'rgba(0,0,0,0.06)' }
            }],
            xAxes: [{
              gridLines: { color: 'rgba(0,0,0,0.03)' }
            }]
          }
        }
      });

      /* ========= 3. Análisis de Vulnerabilidad ========= */
      var ctx3 = document.getElementById('myanalisisvulnerabilidad').getContext('2d');

      var gradVul = ctx3.createLinearGradient(0, 0, 0, 320);
      gradVul.addColorStop(0, 'rgba(24, 40, 62, 1)');
      gradVul.addColorStop(1, 'rgba(56, 92, 140, 0.95)');

      new Chart(ctx3, {
        type: 'bar',
        data: {
          labels: vulnerabilidadLabels,
          datasets: [{
            label: 'Promedio de nivel de control',
            data: vulnerabilidadPromedios,
            backgroundColor: gradVul,
            borderColor: 'rgba(18, 26, 38, 0.95)',
            borderWidth: 2,
            hoverBackgroundColor: 'rgba(36, 66, 102, 0.95)',
            categoryPercentage: 0.65,
            barPercentage: 0.78
          }]
        },
        options: {
          responsive: true,
          maintainAspectRatio: false,
          legend: { display: false },
          tooltips: {
            backgroundColor: 'rgba(18,18,18,0.92)',
            displayColors: false,
            callbacks: {
              label: function(tooltipItem) {
                return 'Indice: ' + tooltipItem.yLabel;
              }
            }
          },
          layout: {
            padding: {
              right: window.innerWidth <= 768 ? 120 : 190
            }
          },
          scales: {
            yAxes: [{
              ticks: {
                beginAtZero: true,
                max: 10,
                min: 0,
                stepSize: 1,
                fontColor: '#4A4A4A',
                fontStyle: 'bold'
              },
              gridLines: { color: 'rgba(0,0,0,0.06)' }
            }],
            xAxes: [{
              ticks: {
                autoSkip: false,
                maxRotation: 0,
                minRotation: 0,
                fontColor: '#4A6FA5',
                fontStyle: 'bold',
                fontSize: 11
              },
              gridLines: { display: false }
            }]
          }
        }
      });

      /* ========= 4. Distribución de riesgos por criterio (AGRUPADO) ========= */
      var canvasRiesgos = document.getElementById('myriesgosporcriterio');

      if (canvasRiesgos) {
        var ctx4 = canvasRiesgos.getContext('2d');

        function makeGrad(ctx, c1, c2) {
          var g = ctx.createLinearGradient(0, 0, 0, 380);
          g.addColorStop(0, c1);
          g.addColorStop(1, c2);
          return g;
        }

        function roundRect(ctx, x, y, w, h, r) {
          ctx.beginPath();
          ctx.moveTo(x + r, y);
          ctx.lineTo(x + w - r, y);
          ctx.quadraticCurveTo(x + w, y, x + w, y + r);
          ctx.lineTo(x + w, y + h - r);
          ctx.quadraticCurveTo(x + w, y + h, x + w - r, y + h);
          ctx.lineTo(x + r, y + h);
          ctx.quadraticCurveTo(x, y + h, x, y + h - r);
          ctx.lineTo(x, y + r);
          ctx.quadraticCurveTo(x, y, x + r, y);
          ctx.closePath();
        }

        var gradMuyBajo = makeGrad(ctx4, 'rgba(255,255,255,0.98)', 'rgba(236,236,236,0.96)');
        var gradBajo    = makeGrad(ctx4, 'rgba(179, 244, 182, 0.98)', 'rgba(123, 223, 129, 0.96)');
        var gradMedio   = makeGrad(ctx4, 'rgba(255, 232, 92, 0.98)', 'rgba(255, 205, 0, 0.96)');
        var gradAlto    = makeGrad(ctx4, 'rgba(255, 90, 90, 0.98)', 'rgba(255, 18, 18, 0.96)');
        var gradMuyAlto = makeGrad(ctx4, 'rgba(228, 40, 40, 0.98)', 'rgba(176, 0, 0, 0.98)');

        /* Fondo suave del área de trazado */
        Chart.plugins.register({
          beforeDraw: function(chart) {
            if (chart.canvas.id !== 'myriesgosporcriterio') return;
            var area = chart.chartArea;
            if (!area) return;

            var ctx = chart.ctx;
            ctx.save();

            roundRect(
              ctx,
              area.left - 8,
              area.top - 6,
              (area.right - area.left) + 16,
              (area.bottom - area.top) + 12,
              18
            );

            var bg = ctx.createLinearGradient(0, area.top, 0, area.bottom);
            bg.addColorStop(0, 'rgba(255,255,255,0.92)');
            bg.addColorStop(1, 'rgba(249,246,240,0.90)');

            ctx.fillStyle = bg;
            ctx.fill();
            ctx.restore();
          }
        });

        /* Etiquetas tipo “badge” arriba de cada barra */
        Chart.plugins.register({
          afterDatasetsDraw: function(chart) {
            if (chart.canvas.id !== 'myriesgosporcriterio') return;

            var ctx = chart.ctx;
            ctx.save();
            ctx.font = "700 12px Poppins, Arial, sans-serif";
            ctx.textAlign = "center";
            ctx.textBaseline = "middle";

            chart.data.datasets.forEach(function(dataset, datasetIndex) {
              var meta = chart.getDatasetMeta(datasetIndex);

              meta.data.forEach(function(bar, index) {
                var value = Number(dataset.data[index] || 0);
                var text = String(value);

                var x = bar._model.x;
                var y = value > 0 ? (bar._model.y - 12) : (bar._model.base - 12);

                var tw = ctx.measureText(text).width;
                var bw = tw + 16;
                var bh = 22;

                roundRect(ctx, x - (bw / 2), y - bh, bw, bh, 8);
                ctx.fillStyle = 'rgba(255,255,255,0.97)';
                ctx.shadowColor = 'rgba(0,0,0,0.10)';
                ctx.shadowBlur = 8;
                ctx.shadowOffsetX = 0;
                ctx.shadowOffsetY = 3;
                ctx.fill();

                ctx.shadowColor = 'transparent';
                ctx.lineWidth = 1;
                ctx.strokeStyle = 'rgba(194,164,118,0.24)';
                ctx.stroke();

                ctx.fillStyle = '#121212';
                ctx.fillText(text, x, y - (bh / 2));
              });
            });

            ctx.restore();
          }
        });

        new Chart(ctx4, {
          type: 'bar',
          data: {
            labels: riesgosPorCriterioLabels,
            datasets: [
              {
                label: 'Muy Bajo',
                data: riesgosPorCriterioMuyBajo,
                backgroundColor: gradMuyBajo,
                borderColor: 'rgba(188, 188, 188, 1)',
                borderWidth: 2,
                hoverBackgroundColor: 'rgba(245,245,245,1)',
                hoverBorderColor: 'rgba(160,160,160,1)',
                categoryPercentage: 0.58,
                barPercentage: 0.76
              },
              {
                label: 'Bajo',
                data: riesgosPorCriterioBajo,
                backgroundColor: gradBajo,
                borderColor: 'rgba(108, 204, 114, 1)',
                borderWidth: 2,
                hoverBackgroundColor: 'rgba(146,235,152,1)',
                hoverBorderColor: 'rgba(96,188,102,1)',
                categoryPercentage: 0.58,
                barPercentage: 0.76
              },
              {
                label: 'Medio',
                data: riesgosPorCriterioMedio,
                backgroundColor: gradMedio,
                borderColor: 'rgba(220, 180, 0, 1)',
                borderWidth: 2,
                hoverBackgroundColor: 'rgba(255,221,45,1)',
                hoverBorderColor: 'rgba(206,168,0,1)',
                categoryPercentage: 0.58,
                barPercentage: 0.76
              },
              {
                label: 'Alto',
                data: riesgosPorCriterioAlto,
                backgroundColor: gradAlto,
                borderColor: 'rgba(220, 0, 0, 1)',
                borderWidth: 2,
                hoverBackgroundColor: 'rgba(255,55,55,1)',
                hoverBorderColor: 'rgba(190,0,0,1)',
                categoryPercentage: 0.58,
                barPercentage: 0.76
              },
              {
                label: 'Muy Alto',
                data: riesgosPorCriterioMuyAlto,
                backgroundColor: gradMuyAlto,
                borderColor: 'rgba(150, 0, 0, 1)',
                borderWidth: 2,
                hoverBackgroundColor: 'rgba(200, 0, 0, 1)',
                hoverBorderColor: 'rgba(120, 0, 0, 1)',
                categoryPercentage: 0.58,
                barPercentage: 0.76
              }
            ]
          },
          options: {
            responsive: true,
            maintainAspectRatio: false,
            animation: {
              duration: 1200,
              easing: 'easeOutQuart'
            },
            layout: {
              padding: {
                top: 32,
                right: 12,
                bottom: 32,
                left: 12
              }
            },
            legend: {
              display: true,
              position: 'bottom',
              labels: {
                boxWidth: 12,
                fontSize: 13,
                fontStyle: 'bold',
                fontColor: '#121212',
                padding: 20,
                usePointStyle: true
              }
            },
            tooltips: {
              mode: 'index',
              intersect: false,
              backgroundColor: 'rgba(18,18,18,0.94)',
              titleFontStyle: 'bold',
              bodyFontStyle: 'bold',
              xPadding: 12,
              yPadding: 10,
              cornerRadius: 10,
              callbacks: {
                label: function(tooltipItem, data) {
                  var label = data.datasets[tooltipItem.datasetIndex].label || '';
                  return ' ' + label + ': ' + tooltipItem.yLabel;
                }
              }
            },
            hover: {
              mode: 'nearest',
              intersect: false
            },
            scales: {
              xAxes: [{
                stacked: false,
                ticks: {
                  autoSkip: false,
                  maxRotation: 0,
                  minRotation: 0,
                  fontColor: '#48699b',
                  fontStyle: 'bold',
                  fontSize: 11,
                  padding: 8
                },
                gridLines: {
                  display: false,
                  drawBorder: false
                }
              }],
              yAxes: [{
                stacked: false,
                ticks: {
                  beginAtZero: true,
                  precision: 0,
                  stepSize: 1,
                  fontColor: '#4a4a4a',
                  fontStyle: 'bold',
                  fontSize: 12,
                  padding: 8
                },
                gridLines: {
                  color: 'rgba(0,0,0,0.055)',
                  zeroLineColor: 'rgba(0,0,0,0.12)',
                  drawBorder: false,
                  borderDash: [4, 4]
                }
              }]
            }
          }
        });
      }


    });
  </script>
@endpush

@push('styles')
  <link href="{{ asset('/css/version2/kpis.css') }}?v={{ date('YmdHis') }}" rel="stylesheet" type="text/css" />

  <style>
    /* ===== Fix overflow en web (no barra) + wrap especial ===== */
    .giro-chart-canvas-wrap--vuln,
    .giro-chart-canvas-wrap--security{
      position: relative;
      overflow: hidden; /* en web NO scroll */
      width: 100%;
    }

    .giro-chart-canvas-inner--vuln,
    .giro-chart-canvas-inner--security{
      position: relative;
      width: 100%;
      height: 430px;
    }

    #myanalisisvulnerabilidad,
    #myriesgosporcriterio{
      display: block;
      width: 100% !important;
      height: 430px !important;
      max-width: 100%;
    }

    /* ===== Mobile: permitir scroll horizontal si hay muchas etiquetas ===== */
    @media (max-width: 768px){
      .giro-chart-canvas-wrap--vuln,
      .giro-chart-canvas-wrap--security{
        overflow-x: auto;
        overflow-y: hidden;
        -webkit-overflow-scrolling: touch;
      }

      .giro-chart-canvas-inner--vuln{
        width: 900px;
        min-width: 900px;
        height: 360px;
      }

      .giro-chart-canvas-inner--security{
        width: 900px;
        min-width: 900px;
        height: 360px;
      }

      #myanalisisvulnerabilidad,
      #myriesgosporcriterio{
        width: 900px !important;
        height: 360px !important;
        max-width: none;
      }
    }
  </style>
@endpush

@section('title')
  KPIs de riesgos sociales
@endsection

@section('content')

<div class="d-flex flex-row">
  <div class="flex-row-fluid">
    <div class="d-flex flex-column flex-grow-1">

      <div class="row">
        <div class="col-xl-12">

          <div class="card card-custom">
            <div class="card-header">
              <div class="card-title">
                <span class="card-icon">
                  <i class="flaticon2-file text-primary"></i>
                </span>
                <h3 class="card-label">KPIs de riesgos sociales ({{ $cliente->organizacion }})</h3>
              </div>

              <div class="card-toolbar">
                <a href="{{ route('analisis.analisiscliente', $id_cliente) }}" class="btn btn-light-primary font-weight-bolder mr-3 ml-3">
                  <i class="la la-arrow-left"></i>Regresar
                </a>
              </div>
            </div>

            <div class="card-body">

              {{-- Barra de navegación de gráficas --}}
              <div class="giro-kpi-tabs" id="giroKpiTabs">
                <button type="button" class="giro-kpi-tab is-active" data-chart-target="chart-indice">
                  Índice de Distribución
                </button>
                <button type="button" class="giro-kpi-tab" data-chart-target="chart-dano">
                  Daño potencial<br>vs P. Estándar
                </button>
                <button type="button" class="giro-kpi-tab" data-chart-target="chart-vulnerabilidad">
                  Análisis de<br>Vulnerabilidad
                </button>
                <button type="button" class="giro-kpi-tab" data-chart-target="chart-medidas">
                  Distr. de<br>Medidas de S
                </button>
                <button type="button" class="giro-kpi-tab" data-chart-target="chart-origen">
                  Distr. Riesgos<br>por Origen
                </button>
                <button type="button" class="giro-kpi-tab" data-chart-target="chart-security">
                  Distr. Riesgos<br> por criterio
                </button>
                <button type="button" class="giro-kpi-tab" data-chart-target="chart-pareto">
                  Gráfico<br>Pareto (80-20)
                </button>
                <button type="button" class="giro-kpi-tab" data-chart-target="chart-escenarios">
                  Distribución %<br>de Escenarios
                </button>
              </div>

              {{-- Área central: solo se muestra una gráfica a la vez --}}
              <div class="giro-chart-stage">

                {{-- 1. Índice de distribución (VISIBLE POR DEFAULT) --}}
                <div class="giro-chart-panel is-active" id="chart-indice">
                  <div class="giro-chart-card">
                    <h5 class="giro-chart-title">Índice de Distribución de Eventos de Riesgo</h5>
                    <div class="giro-chart-canvas-wrap">
                      <canvas id="myindicedistribucion"></canvas>
                    </div>
                  </div>
                </div>

                {{-- 2. Daño potencial --}}
                <div class="giro-chart-panel" id="chart-dano">
                  <div class="giro-chart-card">
                    <h5 class="giro-chart-title">Daño Potencial vs Patrón Estándar</h5>
                    <div class="giro-chart-canvas-wrap">
                      <canvas id="mydapotencial"></canvas>
                    </div>
                  </div>
                </div>

                {{-- 3. Vulnerabilidad --}}
                <div class="giro-chart-panel" id="chart-vulnerabilidad">
                  <div class="giro-chart-card">
                    <h5 class="giro-chart-title">Análisis de Vulnerabilidad</h5>
                    <div class="giro-chart-canvas-wrap giro-chart-canvas-wrap--vuln">
                      <div class="giro-chart-canvas-inner giro-chart-canvas-inner--vuln">
                        <canvas id="myanalisisvulnerabilidad"></canvas>
                      </div>
                    </div>
                  </div>
                </div>

                {{-- 4. Placeholder --}}
                <div class="giro-chart-panel" id="chart-medidas">
                  <div class="giro-chart-card">
                    <h5 class="giro-chart-title">Distribución de Medidas de Seguridad</h5>
                    <div class="giro-chart-placeholder">
                      Aquí irá la gráfica de <strong>Distribución de Medidas de Seguridad</strong>
                    </div>
                  </div>
                </div>

                {{-- 5. Placeholder --}}
                <div class="giro-chart-panel" id="chart-origen">
                  <div class="giro-chart-card">
                    <h5 class="giro-chart-title">Distribución de Riesgos por Origen</h5>
                    <div class="giro-chart-placeholder">
                      Aquí irá la gráfica de <strong>Distribución de Riesgos por Origen</strong>
                    </div>
                  </div>
                </div>

                {{-- 6. Distribución de riesgos por criterio --}}
                <div class="giro-chart-panel" id="chart-security">
                  <div class="giro-chart-card">
                    <h5 class="giro-chart-title">Distribución de los riesgos por criterio</h5>
                    <div class="giro-chart-canvas-wrap giro-chart-canvas-wrap--security">
                      <div class="giro-chart-canvas-inner giro-chart-canvas-inner--security">
                        <canvas id="myriesgosporcriterio"></canvas>
                      </div>
                    </div>
                  </div>
                </div>

                {{-- 7. Placeholder --}}
                <div class="giro-chart-panel" id="chart-pareto">
                  <div class="giro-chart-card">
                    <h5 class="giro-chart-title">Gráfico Pareto (80-20)</h5>
                    <div class="giro-chart-placeholder">
                      Aquí irá la gráfica de <strong>Pareto (80-20)</strong>
                    </div>
                  </div>
                </div>

                {{-- 8. Placeholder --}}
                <div class="giro-chart-panel" id="chart-escenarios">
                  <div class="giro-chart-card">
                    <h5 class="giro-chart-title">Distribución % de Escenarios</h5>

                    <div class="giro-escenarios-wrap">
                      <table class="giro-escenarios-table">
                        <thead>
                          <tr>
                            <th rowspan="2" class="giro-escenarios-left"></th>
                            <th colspan="2" class="giro-th-group giro-th-group--ok">Tolerables</th>
                            <th colspan="3" class="giro-th-group giro-th-group--risk">No tolerables</th>
                            <th rowspan="2" class="giro-th-total">Total</th>
                          </tr>
                          <tr>
                            <th class="giro-th-muy-bajo">Muy Bajo</th>
                            <th class="giro-th-bajo">Bajo</th>
                            <th class="giro-th-medio">Medio</th>
                            <th class="giro-th-alto">Alto</th>
                            <th class="giro-th-muy-alto">Muy Alto</th>
                          </tr>
                        </thead>
                        <tbody>
                          @forelse($escenariosFilas as $fila)
                            <tr>
                              <td class="giro-escenarios-label">{{ $fila['label'] }}</td>
                              <td class="giro-td-muy-bajo">{{ $fila['muy_bajo'] }}</td>
                              <td class="giro-td-bajo">{{ $fila['bajo'] }}</td>
                              <td class="giro-td-medio">{{ $fila['medio'] }}</td>
                              <td class="giro-td-alto">{{ $fila['alto'] }}</td>
                              <td class="giro-td-muy-alto">{{ $fila['muy_alto'] }}</td>
                              <td class="giro-td-total">{{ $fila['total'] }}</td>
                            </tr>
                          @empty
                            <tr>
                              <td colspan="7" class="text-center py-4">Sin datos</td>
                            </tr>
                          @endforelse

                          <tr class="giro-row-total">
                            <td class="giro-escenarios-label"><strong>Total</strong></td>
                            <td class="giro-td-total">{{ $totalesEscenarios['muy_bajo'] ?? 0 }}</td>
                            <td class="giro-td-total">{{ $totalesEscenarios['bajo'] ?? 0 }}</td>
                            <td class="giro-td-total">{{ $totalesEscenarios['medio'] ?? 0 }}</td>
                            <td class="giro-td-total">{{ $totalesEscenarios['alto'] ?? 0 }}</td>
                            <td class="giro-td-total">{{ $totalesEscenarios['muy_alto'] ?? 0 }}</td>
                            <td class="giro-td-total">{{ $totalesEscenarios['total'] ?? 0 }}</td>
                          </tr>

                          <tr class="giro-row-percent">
                            <td class="giro-escenarios-label"><strong>Distribución %</strong></td>
                            <td class="giro-td-total">{{ number_format($distribucionEscenarios['muy_bajo'] ?? 0, 2) }}%</td>
                            <td class="giro-td-total">{{ number_format($distribucionEscenarios['bajo'] ?? 0, 2) }}%</td>
                            <td class="giro-td-total">{{ number_format($distribucionEscenarios['medio'] ?? 0, 2) }}%</td>
                            <td class="giro-td-total">{{ number_format($distribucionEscenarios['alto'] ?? 0, 2) }}%</td>
                            <td class="giro-td-total">{{ number_format($distribucionEscenarios['muy_alto'] ?? 0, 2) }}%</td>
                            <td class="giro-td-total">{{ number_format($distribucionEscenarios['total'] ?? 0, 2) }}%</td>
                          </tr>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>

              </div>

            </div>
          </div>

        </div>
      </div>

    </div>
  </div>
</div>

<input type="hidden" id="datatable_i18n" value="{{ asset('/js/datatables/i18n/es-mx.json') }}">

@endsection
