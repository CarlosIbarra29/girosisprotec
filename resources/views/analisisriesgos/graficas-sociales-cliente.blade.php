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

    const medDebLabels = {!! json_encode($medDebLabels ?? []) !!};
    const medDebData   = {!! json_encode($medDebData ?? []) !!};
    const medForLabels = {!! json_encode($medForLabels ?? []) !!};
    const medForData   = {!! json_encode($medForData ?? []) !!};

    const medDebDetalle = {!! json_encode($medDebDetalle ?? []) !!};
    const medForDetalle = {!! json_encode($medForDetalle ?? []) !!};

    const paretoLabels = {!! json_encode($paretoLabels ?? []) !!};
    const paretoIPD    = {!! json_encode($paretoIPD ?? []) !!};
    const paretoCrit   = {!! json_encode($paretoCrit ?? []) !!};
    const paretoAcum   = {!! json_encode($paretoAcum ?? []) !!};
    const paretoEventos = {!! json_encode($paretoEventos ?? []) !!};

    const avanceConsecucionPorcentaje = {!! json_encode($avanceConsecucionPorcentaje ?? 0) !!};
    const avanceNoAceptables = {!! json_encode($avanceNoAceptables ?? []) !!};
    const avanceDetalleNoAceptables = {!! json_encode($avanceDetalleNoAceptables ?? []) !!};
    const avanceAceptables = {!! json_encode($avanceAceptables ?? []) !!};

    // ======= MATRIZ (DATA DESDE CONTROLLER) =======
    // Espera:
    // matrixPoints: [{id,label,x,y,ipd,perfil,nivel}, ...]
    // matrixRows:   [{label,ipd,perfil,nivel}, ...] para la tabla
    const matrixPoints = {!! json_encode($matrixPoints ?? []) !!};
    const matrixCriteria = {!! json_encode($matrixCriteria ?? []) !!};

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
          ctx.fillStyle = "rgba(255,255,255,0.94)";
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

      /* ========= Plugin: líneas + flecha + valores (solo vulnerabilidad) ========= */
      Chart.plugins.register({
        afterDraw: function(chart) {
          if (chart.canvas.id !== 'myanalisisvulnerabilidad') return;

          var ctx = chart.chart.ctx;
          var yAxis = chart.scales['y-axis-0'];
          var chartArea = chart.chartArea;
          var isMobile = window.innerWidth <= 768;

          if (!yAxis || !chartArea) return;

          var niveles = [
            { value: 10, label: 'Óptimo',      color: '#8BAA35' },
            { value: 8,  label: 'Eficiente',   color: '#6F8F2A' },
            { value: 6,  label: 'Regular',     color: '#D59B22' },
            { value: 4,  label: 'Deficiente',  color: '#C33535' },
            { value: 2,  label: 'Sin Control', color: '#8D1111' }
          ];

          var arrowX = chartArea.right + (isMobile ? 30 : 34);
          var arrowTop = yAxis.getPixelForValue(10);
          var arrowBottom = yAxis.getPixelForValue(0.7);

          var labelX = chartArea.right + (isMobile ? 60 : 76);
          var valueX = chartArea.right + (isMobile ? 38 : 48);

          ctx.save();

          niveles.forEach(function(nivel) {
            var y = yAxis.getPixelForValue(nivel.value);

            ctx.beginPath();
            ctx.strokeStyle = nivel.color;
            ctx.lineWidth = 1.7;
            ctx.globalAlpha = 0.82;
            ctx.moveTo(chartArea.left, y);
            ctx.lineTo(chartArea.right, y);
            ctx.stroke();

            ctx.globalAlpha = 1;
            ctx.font = '800 ' + (isMobile ? 10 : 12) + 'px Poppins, Arial, sans-serif';
            ctx.textAlign = 'left';
            ctx.textBaseline = 'middle';
            ctx.fillStyle = nivel.color;
            ctx.fillText(nivel.label, labelX, y);

            ctx.fillStyle = 'rgba(255,255,255,.88)';
            ctx.textAlign = 'center';
            ctx.fillText(String(nivel.value), valueX, y);
          });

          var grad = ctx.createLinearGradient(0, arrowBottom, 0, arrowTop);
          grad.addColorStop(0, '#520000');
          grad.addColorStop(0.22, '#B80000');
          grad.addColorStop(0.43, '#FF2A20');
          grad.addColorStop(0.62, '#FFC13B');
          grad.addColorStop(0.82, '#C6C928');
          grad.addColorStop(1, '#9BBE3B');

          ctx.fillStyle = grad;
          ctx.shadowColor = 'rgba(0,0,0,.45)';
          ctx.shadowBlur = 12;
          ctx.shadowOffsetX = 0;
          ctx.shadowOffsetY = 5;

          ctx.fillRect(arrowX - 8, arrowTop + 22, 16, arrowBottom - arrowTop - 28);

          ctx.beginPath();
          ctx.moveTo(arrowX, arrowTop);
          ctx.lineTo(arrowX - 19, arrowTop + 22);
          ctx.lineTo(arrowX + 19, arrowTop + 22);
          ctx.closePath();
          ctx.fill();

          ctx.restore();
        },

        afterDatasetsDraw: function(chart) {
          if (chart.canvas.id !== 'myanalisisvulnerabilidad') return;

          var ctx = chart.ctx;
          var meta = chart.getDatasetMeta(0);

          ctx.save();
          ctx.font = "900 13px Poppins, Arial, sans-serif";
          ctx.fillStyle = "#D7A73F";
          ctx.textAlign = "center";
          ctx.textBaseline = "bottom";

          meta.data.forEach(function(bar, index) {
            var value = Number(chart.data.datasets[0].data[index] || 0);
            ctx.fillText(value.toFixed(1), bar._model.x, bar._model.y - 8);
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
      if (canvasIndice) {
        var ctx1 = canvasIndice.getContext('2d');

        function crearGradientesIndice(ctx) {
          var g1 = ctx.createLinearGradient(0, 0, 0, 360);
          g1.addColorStop(0, 'rgba(185,187,191,1)');
          g1.addColorStop(1, 'rgba(88,92,98,0.96)');

          var g2 = ctx.createLinearGradient(0, 0, 0, 360);
          g2.addColorStop(0, 'rgba(79,188,92,1)');
          g2.addColorStop(1, 'rgba(28,112,44,0.96)');

          var g3 = ctx.createLinearGradient(0, 0, 0, 360);
          g3.addColorStop(0, 'rgba(236,175,61,1)');
          g3.addColorStop(1, 'rgba(158,111,28,0.98)');

          var g4 = ctx.createLinearGradient(0, 0, 0, 360);
          g4.addColorStop(0, 'rgba(214,67,74,1)');
          g4.addColorStop(1, 'rgba(135,25,34,0.98)');

          var g5 = ctx.createLinearGradient(0, 0, 0, 360);
          g5.addColorStop(0, 'rgba(217,38,45,1)');
          g5.addColorStop(1, 'rgba(151,0,9,0.98)');

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
                'rgba(215,217,222,0.50)',
                'rgba(86,210,100,0.82)',
                'rgba(236,175,61,0.90)',
                'rgba(214,67,74,0.90)',
                'rgba(217,38,45,0.95)'
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
                  fontColor: 'rgba(255,255,255,0.76)',
                  fontStyle: 'bold',
                  fontSize: 13
                },
                gridLines: {
                  color: 'rgba(255,255,255,0.11)',
                  zeroLineColor: 'rgba(255,255,255,0.22)',
                  borderDash: [4, 4]
                }
              }],
              xAxes: [{
                ticks: {
                  fontColor: 'rgba(255,255,255,0.84)',
                  fontStyle: 'bold',
                  fontSize: 13
                },
                gridLines: {
                  display: false,
                  zeroLineColor: 'rgba(255,255,255,0.18)'
                }
              }]
            }
          }
        });
      }

      /* ========= 2. Daño potencial vs Patrón estándar ========= */
      var canvasDano = document.getElementById('mydanopotencial');
      if (canvasDano) {
        var ctx2 = canvasDano.getContext('2d');

        var xLabels = ['Muy Bajo','Bajo','Medio','Alto','Muy Alto'];

        var danoPotencialY = [
          Number({!! json_encode($distribucionEscenarios['muy_bajo'] ?? 0) !!}),
          Number({!! json_encode($distribucionEscenarios['bajo'] ?? 0) !!}),
          Number({!! json_encode($distribucionEscenarios['medio'] ?? 0) !!}),
          Number({!! json_encode($distribucionEscenarios['alto'] ?? 0) !!}),
          Number({!! json_encode($distribucionEscenarios['muy_alto'] ?? 0) !!})
        ];

        var riesgoEstandarY = [60, 30, 10, 0, 0];

        function toXY(arrY){
          return arrY.map(function(y, i){ return { x: i, y: Number(y || 0) }; });
        }

        var pointPctPlugin = {
          afterDatasetsDraw: function(chart) {
            if (!chart || chart.canvas.id !== 'mydanopotencial') return;

            var ctx = chart.ctx;
            ctx.save();
            ctx.font = "800 11px Poppins, Arial, sans-serif";
            ctx.fillStyle = "rgba(255,255,255,0.88)";
            ctx.textAlign = "center";
            ctx.textBaseline = "bottom";

            chart.data.datasets.forEach(function(ds, di){
              var meta = chart.getDatasetMeta(di);
              if (meta.hidden) return;

              meta.data.forEach(function(pt, i){
                var v = Number((ds.data[i] && ds.data[i].y) || 0);
                if (v === 0) return;

                var x = pt._model.x;
                var y = pt._model.y;
                ctx.fillText(v.toFixed(1) + "%", x, y - 8);
              });
            });

            ctx.restore();
          }
        };

        var danoDesviacionPlugin = {
          afterDatasetsDraw: function(chart) {
            if (!chart || chart.canvas.id !== 'mydanopotencial') return;

            var riesgoPotencialIndex = 0; // dataset 0 = Riesgo Potencial
            var ds = chart.data.datasets[riesgoPotencialIndex];
            var meta = chart.getDatasetMeta(riesgoPotencialIndex);

            if (!ds || !meta || meta.hidden || !meta.data || !meta.data.length) return;

            var maxIndex = -1;
            var maxValue = -Infinity;

            ds.data.forEach(function(point, i){
              var value = Number((point && point.y) || 0);
              if (value > maxValue) {
                maxValue = value;
                maxIndex = i;
              }
            });

            if (maxIndex === -1 || maxValue <= 0 || !meta.data[maxIndex]) return;

            var pt = meta.data[maxIndex];
            var model = pt._model;
            var x = model.x;
            var y = model.y;

            var ctx = chart.ctx;
            var area = chart.chartArea;
            var isMobile = window.innerWidth <= 768;

            var text = 'Desviación';
            var fontSize = isMobile ? 12 : 14;
            var textX = x - (isMobile ? 56 : 72);
            var textY = Math.max(area.top + 18, y - (isMobile ? 58 : 64));

            var textWidth;
            ctx.save();
            ctx.font = (isMobile ? '700 ' : '800 ') + fontSize + 'px Poppins, Arial, sans-serif';
            textWidth = ctx.measureText(text).width;
            ctx.restore();

            /* la flecha sale del centro de la palabra */
            var arrowStartX = textX + (textWidth / 2);
            var arrowStartY = textY + (isMobile ? 10 : 12);

            /* termina arriba a la izquierda del punto para no tapar el porcentaje */
            var arrowEndX = x - (isMobile ? 16 : 18);
            var arrowEndY = y - (isMobile ? 14 : 16);

            ctx.save();

            /* texto */
            ctx.font = (isMobile ? '700 ' : '800 ') + fontSize + 'px Poppins, Arial, sans-serif';
            ctx.fillStyle = '#D7A73F';
            ctx.textAlign = 'left';
            ctx.textBaseline = 'middle';
            ctx.fillText(text, textX, textY);

            /* línea diagonal */
            ctx.beginPath();
            ctx.moveTo(arrowStartX, arrowStartY);
            ctx.lineTo(arrowEndX, arrowEndY);
            ctx.lineWidth = isMobile ? 2 : 3;
            ctx.strokeStyle = '#D7A73F';
            ctx.stroke();

            /* punta */
            var angle = Math.atan2(arrowEndY - arrowStartY, arrowEndX - arrowStartX);
            var headLength = isMobile ? 8 : 10;

            ctx.beginPath();
            ctx.moveTo(arrowEndX, arrowEndY);
            ctx.lineTo(
              arrowEndX - headLength * Math.cos(angle - Math.PI / 6),
              arrowEndY - headLength * Math.sin(angle - Math.PI / 6)
            );
            ctx.lineTo(
              arrowEndX - headLength * Math.cos(angle + Math.PI / 6),
              arrowEndY - headLength * Math.sin(angle + Math.PI / 6)
            );
            ctx.closePath();
            ctx.fillStyle = '#D7A73F';
            ctx.fill();

            ctx.restore();
          }
        };

        new Chart(ctx2, {
          type: 'line',
          plugins: [pointPctPlugin, danoDesviacionPlugin],
          data: {
            labels: xLabels,
            datasets: [
              {
                label: 'Riesgo Potencial',
                data: toXY(danoPotencialY),
                borderColor: '#D7A73F',
                backgroundColor: 'rgba(215,167,63,0.14)',
                pointBackgroundColor: '#D7A73F',
                pointBorderColor: '#0b1119',
                pointRadius: 4,
                pointHoverRadius: 6,
                borderWidth: 3,
                fill: true,
                lineTension: 0.28
              },
              {
                label: 'Riesgo Estándar',
                data: toXY(riesgoEstandarY),
                borderColor: 'rgba(135,140,145,0.86)',
                backgroundColor: 'transparent',
                pointBackgroundColor: 'rgba(135,140,145,0.95)',
                pointBorderColor: '#0b1119',
                pointStyle: 'circle',
                pointRadius: 4,
                pointHoverRadius: 6,
                borderWidth: 2,
                borderDash: [7, 5],
                fill: false,
                lineTension: 0.28
              }
            ]
          },
          options: {
            responsive: true,
            maintainAspectRatio: false,
            animation: { duration: 1000, easing: 'easeOutQuart' },
            legend: {
              display: true,
              position: 'bottom',
              labels: {
                fontStyle: 'bold',
                fontColor: 'rgba(255,255,255,0.86)',
                boxWidth: 12,
                padding: 18,
                usePointStyle: true
              }
            },
            tooltips: {
              mode: 'index',
              intersect: false,
              backgroundColor: 'rgba(8,13,20,0.96)',
              titleFontStyle: 'bold',
              bodyFontStyle: 'bold',
              titleFontColor: '#ffffff',
              bodyFontColor: '#ffffff',
              xPadding: 12,
              yPadding: 10,
              cornerRadius: 10,
              callbacks: {
                title: function(items){
                  var x = items && items[0] ? Math.round(items[0].xLabel) : 0;
                  return xLabels[x] || '';
                },
                label: function(t, d){
                  var label = d.datasets[t.datasetIndex].label || '';
                  return ' ' + label + ': ' + Number(t.yLabel).toFixed(2) + '%';
                }
              }
            },
            hover: { mode: 'nearest', intersect: false },
            layout: {
              padding: {
                top: 22,
                right: 16,
                bottom: 6,
                left: 8
              }
            },
            scales: {
              yAxes: [{
                ticks: {
                  beginAtZero: true,
                  suggestedMax: 100,
                  callback: function(v){ return v + '%'; },
                  fontColor: 'rgba(255,255,255,0.86)',
                  fontStyle: 'bold',
                  fontSize: 12,
                  padding: 8
                },
                gridLines: {
                  color: 'rgba(255,255,255,0.075)',
                  zeroLineColor: 'rgba(255,255,255,0.18)',
                  borderDash: [4, 4],
                  drawBorder: false
                }
              }],
              xAxes: [{
                type: 'linear',
                ticks: {
                  min: -0.08,
                  max: 4,
                  stepSize: 1,
                  fontColor: 'rgba(255,255,255,0.86)',
                  fontStyle: 'bold',
                  padding: 10,
                  callback: function(value){
                    var i = Math.round(value);
                    return (Number.isInteger(value) && xLabels[i]) ? xLabels[i] : '';
                  }
                },
                gridLines: {
                  display: false,
                  drawBorder: false
                }
              }]
            }
          }
        });
      }

      /* ========= 3. Análisis de Vulnerabilidad ========= */
      var cVul = document.getElementById('myanalisisvulnerabilidad');
      if (cVul) {
        var ctx3 = cVul.getContext('2d');

        var gradVul = ctx3.createLinearGradient(0, 0, 0, 420);
        gradVul.addColorStop(0, 'rgba(95, 116, 142, 0.98)');
        gradVul.addColorStop(0.48, 'rgba(58, 75, 98, 0.96)');
        gradVul.addColorStop(1, 'rgba(31, 42, 59, 0.98)');

        new Chart(ctx3, {
          type: 'bar',
          data: {
            labels: vulnerabilidadLabels,
            datasets: [{
              label: 'Promedio de nivel de control',
              data: vulnerabilidadPromedios,
              backgroundColor: gradVul,
              borderColor: 'rgba(118, 142, 171, 0.55)',
              borderWidth: 1,
              hoverBackgroundColor: 'rgba(88, 111, 140, 0.98)',
              hoverBorderColor: 'rgba(215,167,63,0.9)',
              hoverBorderWidth: 2,
              categoryPercentage: 0.58,
              barPercentage: 0.68
            }]
          },
          options: {
            responsive: true,
            maintainAspectRatio: false,
            animation: {
              duration: 1100,
              easing: 'easeOutQuart'
            },
            legend: { display: false },
            tooltips: {
              backgroundColor: 'rgba(8,13,20,0.96)',
              titleFontStyle: 'bold',
              bodyFontStyle: 'bold',
              displayColors: false,
              xPadding: 12,
              yPadding: 10,
              cornerRadius: 10,
              callbacks: {
                label: function(tooltipItem) {
                  return 'Índice: ' + Number(tooltipItem.yLabel || 0).toFixed(1);
                }
              }
            },
            layout: {
              padding: {
                top: 26,
                right: window.innerWidth <= 768 ? 115 : 155,
                bottom: 8,
                left: 4
              }
            },
            scales: {
              yAxes: [{
                ticks: {
                  beginAtZero: true,
                  max: 10,
                  min: 0,
                  stepSize: 2,
                  fontColor: 'rgba(255,255,255,0.78)',
                  fontStyle: 'bold',
                  fontSize: 12,
                  padding: 8
                },
                scaleLabel: {
                  display: true,
                  labelString: 'Puntaje',
                  fontColor: '#D7A73F',
                  fontStyle: 'bold',
                  fontSize: 11
                },
                gridLines: {
                  color: 'rgba(255,255,255,0.08)',
                  zeroLineColor: 'rgba(255,255,255,0.20)',
                  borderDash: [4, 4],
                  drawBorder: false
                }
              }],
              xAxes: [{
                ticks: {
                  autoSkip: false,
                  maxRotation: 0,
                  minRotation: 0,
                  fontColor: 'rgba(255,255,255,0.86)',
                  fontStyle: 'bold',
                  fontSize: 10,
                  padding: 8,
                  callback: function(value) {
                    var text = String(value || '');
                    if (text.length <= 18) return text;

                    var parts = text.split(' ');
                    var line = '';
                    var lines = [];

                    parts.forEach(function(word) {
                      if ((line + ' ' + word).trim().length > 16) {
                        lines.push(line.trim());
                        line = word;
                      } else {
                        line += ' ' + word;
                      }
                    });

                    if (line.trim()) lines.push(line.trim());

                    return lines.slice(0, 2);
                  }
                },
                gridLines: {
                  display: false,
                  drawBorder: false
                }
              }]
            }
          }
        });
      }

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

      /* ========= 5. Distribución de Medidas de Seguridad ========= */
      function safeCanvas(id){
        var el = document.getElementById(id);
        return el ? el.getContext('2d') : null;
      }

      function makePie(ctx, title, labels, data, colors){
        var piePercentPlugin = {
          afterDatasetsDraw: function(chart) {
            if (!chart || chart.config.type !== 'doughnut') return;

            var ctx = chart.chart.ctx;
            var dataset = chart.data.datasets[0];
            var meta = chart.getDatasetMeta(0);
            var total = dataset.data.reduce(function(a,b){ return a + (Number(b)||0); }, 0);

            if (!total) return;

            ctx.save();
            ctx.textAlign = 'center';
            ctx.textBaseline = 'middle';

            meta.data.forEach(function(arc, i){
              var val = Number(dataset.data[i] || 0);
              if (!val) return;

              var pct = (val / total) * 100;
              if (pct < 3) return;

              var model = arc._model;
              var angle = (model.startAngle + model.endAngle) / 2;
              var r = (model.innerRadius + model.outerRadius) / 2;

              var x = model.x + Math.cos(angle) * r;
              var y = model.y + Math.sin(angle) * r;

              var isMobile = window.innerWidth <= 480;
              ctx.font = (isMobile ? '700 10px' : '800 11px') + " Poppins, Arial, sans-serif";

              var text = pct.toFixed(0) + '%';
              var tw = ctx.measureText(text).width;
              var padX = isMobile ? 5 : 6;
              var bw = tw + padX * 2;
              var bh = (isMobile ? 16 : 18);

              ctx.fillStyle = 'rgba(18,18,18,0.65)';
              ctx.beginPath();
              ctx.moveTo(x - bw/2 + 6, y - bh/2);
              ctx.lineTo(x + bw/2 - 6, y - bh/2);
              ctx.quadraticCurveTo(x + bw/2, y - bh/2, x + bw/2, y - bh/2 + 6);
              ctx.lineTo(x + bw/2, y + bh/2 - 6);
              ctx.quadraticCurveTo(x + bw/2, y + bh/2, x + bw/2 - 6, y + bh/2);
              ctx.lineTo(x - bw/2 + 6, y + bh/2);
              ctx.quadraticCurveTo(x - bw/2, y + bh/2, x - bw/2, y + bh/2 - 6);
              ctx.lineTo(x - bw/2, y - bh/2 + 6);
              ctx.quadraticCurveTo(x - bw/2, y - bh/2, x - bw/2 + 6, y - bh/2);
              ctx.closePath();
              ctx.fill();

              ctx.fillStyle = '#fff';
              ctx.fillText(text, x, y);
            });

            ctx.restore();
          }
        };

        var isMobile = window.innerWidth <= 480;

        return new Chart(ctx, {
          type: 'doughnut',
          plugins: [piePercentPlugin],
          data: {
            labels: labels,
            datasets: [{
              data: data,
              backgroundColor: colors,
              borderColor: 'rgba(255,255,255,0.95)',
              borderWidth: 2
            }]
          },
          options: {
            responsive: true,
            maintainAspectRatio: false,
            cutoutPercentage: 62,
            animation: { duration: 900, easing: 'easeOutQuart' },
            legend: {
              position: isMobile ? 'bottom' : 'right',
              labels: {
                fontStyle: 'bold',
                fontColor: 'rgba(255,255,255,0.88)',
                boxWidth: isMobile ? 9 : 10,
                fontSize: isMobile ? 10 : 12,
                padding: isMobile ? 8 : 12,
                usePointStyle: true
              }
            },
            tooltips: {
              backgroundColor: 'rgba(18,18,18,0.92)',
              displayColors: true,
              callbacks: {
                label: function(tooltipItem, data) {
                  var l = data.labels[tooltipItem.index] || '';
                  var v = Number(data.datasets[0].data[tooltipItem.index] || 0);
                  var total = data.datasets[0].data.reduce(function(a,b){ return a + (Number(b)||0); }, 0);
                  var pct = total ? ((v/total)*100).toFixed(1) : '0.0';
                  return ' ' + l + ': ' + v + ' (' + pct + '%)';
                }
              }
            }
          }
        });
      }

      function makeHBar(ctx, labels, data, fill, border, maxX){
        var isMobile = window.innerWidth <= 480;

        return new Chart(ctx, {
          type: 'horizontalBar',
          data: {
            labels: labels,
            datasets: [{
              data: data,
              backgroundColor: fill,
              borderColor: border,
              borderWidth: 2,
              barThickness: isMobile ? 12 : 14
            }]
          },
          options: {
            responsive: true,
            maintainAspectRatio: false,
            legend: { display: false },
            layout: { padding: { left: isMobile ? 18 : 10, right: 10, top: 6, bottom: 6 } },
            scales: {
              xAxes: [{
                ticks: {
                  beginAtZero: true,
                  precision: 0,
                  stepSize: 1,
                  fontColor: 'rgba(255,255,255,0.88)',
                  fontStyle: 'bold',
                  suggestedMax: (typeof maxX === 'number' ? maxX : undefined)
                },
                gridLines: { color: 'rgba(255,255,255,0.075)' }
              }],
              yAxes: [{
                gridLines: { display: false },
                ticks: {
                  fontColor: 'rgba(255,255,255,0.92)',
                  fontStyle: 'bold',
                  fontSize: isMobile ? 10 : 10,
                  padding: isMobile ? 6 : 4
                }
              }]
            },
            tooltips: {
              backgroundColor: 'rgba(18,18,18,0.92)',
              displayColors: false,
              callbacks: {
                label: function(t) { return ' ' + t.yLabel + ': ' + t.xLabel; }
              }
            }
          }
        });
      }

      /* --- Pies --- */
      var pieDebCtx = safeCanvas('pieDebilidades');
      if (pieDebCtx) {
        makePie(
          pieDebCtx,
          'Debilidades',
          medDebLabels,
          medDebData,
          [
            'rgba(255, 90, 90, 0.95)',
            'rgba(255, 0, 0, 0.92)',
            'rgba(255, 180, 0, 0.92)',
            'rgba(255, 110, 110, 0.55)'
          ]
        );
      }

      var pieForCtx = safeCanvas('pieFortalezas');
      if (pieForCtx) {
        makePie(
          pieForCtx,
          'Fortalezas',
          medForLabels,
          medForData,
          [
            'rgba(120, 170, 60, 0.95)',
            'rgba(155, 220, 85, 0.92)',
            'rgba(100, 170, 120, 0.92)',
            'rgba(180, 240, 120, 0.70)'
          ]
        );
      }

      /* ===== Pintar mini bars ===== */
      function debBarData(key){
        var d = (medDebDetalle && medDebDetalle[key]) ? medDebDetalle[key] : {};
        return [ d['Regular']||0, d['Deficiente']||0, d['Sin control']||0, d['Inoperante']||0 ];
      }
      var debLabels = ['Regular','Deficiente','Sin control','Inoperante'];

      function forBarData(key){
        var d = (medForDetalle && medForDetalle[key]) ? medForDetalle[key] : {};
        return [ d['Óptimo']||0, d['Eficiente']||0 ];
      }
      var forLabels = ['Óptimo','Eficiente'];

      var ctxDebPas = safeCanvas('barDebPasivas');
      var ctxDebAct = safeCanvas('barDebActivas');
      var ctxDebDoc = safeCanvas('barDebDoc');
      var ctxDebHum = safeCanvas('barDebHumanas');

      var ctxForPas = safeCanvas('barForPasivas');
      var ctxForAct = safeCanvas('barForActivas');
      var ctxForDoc = safeCanvas('barForDoc');
      var ctxForHum = safeCanvas('barForHumanas');

      if (ctxDebPas) makeHBar(ctxDebPas, debLabels, debBarData('pasivas'),      'rgba(255, 90, 90, 0.65)',   'rgba(255, 90, 90, 0.95)');
      if (ctxDebAct) makeHBar(ctxDebAct, debLabels, debBarData('activas'),      'rgba(255, 0, 0, 0.65)',     'rgba(255, 0, 0, 0.92)');
      if (ctxDebHum) makeHBar(ctxDebHum, debLabels, debBarData('humanas'),      'rgba(255, 180, 0, 0.60)',   'rgba(255, 180, 0, 0.92)');
      if (ctxDebDoc) makeHBar(ctxDebDoc, debLabels, debBarData('documentales'), 'rgba(255, 110, 110, 0.45)', 'rgba(255, 110, 110, 0.55)');

      if (ctxForPas) makeHBar(ctxForPas, forLabels, forBarData('pasivas'),      'rgba(120, 170, 60, 0.55)',   'rgba(120, 170, 60, 0.95)');
      if (ctxForAct) makeHBar(ctxForAct, forLabels, forBarData('activas'),      'rgba(155, 220, 85, 0.55)',   'rgba(155, 220, 85, 0.92)');
      if (ctxForHum) makeHBar(ctxForHum, forLabels, forBarData('humanas'),      'rgba(100, 170, 120, 0.55)',  'rgba(100, 170, 120, 0.92)');
      if (ctxForDoc) makeHBar(ctxForDoc, forLabels, forBarData('documentales'), 'rgba(180, 240, 120, 0.55)',  'rgba(180, 240, 120, 0.70)');

      /* ========= 7. Pareto (80-20) ========= */
      var canvasPareto = document.getElementById('mypareto');
      if (canvasPareto) {
        var ctxP = canvasPareto.getContext('2d');

        var pl = (paretoLabels || []);
        var pi = (paretoIPD || []);
        var pa = (paretoAcum || []);

        function barGradient(ctx) {
          var g = ctx.createLinearGradient(0, 0, 0, 340);
          g.addColorStop(0, 'rgba(194, 164, 118, 0.58)'); // camel
          g.addColorStop(0.55, 'rgba(155, 124, 78, 0.56)'); // camel-700
          g.addColorStop(1, 'rgba(127, 101, 63, 0.54)'); // camel-800
          return g;
        }
        var gradBar = barGradient(ctxP);

        var paretoPointPctPlugin = {
          afterDatasetsDraw: function(chart) {
            if (!chart || chart.canvas.id !== 'mypareto') return;

            var meta = chart.getDatasetMeta(1);
            if (!meta || meta.hidden) return;

            var ctx = chart.ctx;
            var area = chart.chartArea;

            ctx.save();
            ctx.font = "800 11px Poppins, Arial, sans-serif";
            ctx.fillStyle = "rgba(18,18,18,0.78)";
            ctx.textAlign = "center";
            ctx.textBaseline = "bottom";

            meta.data.forEach(function(pt, i){
              var v = Number(chart.data.datasets[1].data[i] || 0);
              if (!v) return;

              var x = pt._model.x;
              var y = pt._model.y - 10;
              var safeTop = area.top + 14;
              if (y < safeTop) y = safeTop;

              ctx.fillText(v.toFixed(0) + "%", x, y);
            });

            ctx.restore();
          }
        };

        function renderParetoLegend(chart){
          var el = document.getElementById('paretoLegend');
          if (!el) return;

          var d0 = chart.data.datasets[0];
          var d1 = chart.data.datasets[1];

          el.innerHTML = `
            <div class="giro-pareto-legend__inner">
              <div class="giro-pareto-legend__item">
                <span class="giro-pareto-legend__swatch giro-pareto-legend__swatch--bar"></span>
                <span class="giro-pareto-legend__text">${d0.label}</span>
              </div>
              <div class="giro-pareto-legend__item">
                <span class="giro-pareto-legend__swatch giro-pareto-legend__swatch--line"></span>
                <span class="giro-pareto-legend__text">${d1.label}</span>
              </div>
            </div>
          `;
        }

        var paretoLineFrontPlugin = {
          afterDatasetsDraw: function(chart) {
            if (!chart || chart.canvas.id !== 'mypareto') return;
            var meta = chart.getDatasetMeta(1);
            if (!meta || meta.hidden) return;
            meta.controller.draw();
          }
        };

        var isMobile = window.innerWidth <= 480;

        var paretoChart = new Chart(ctxP, {
          type: 'bar',
          plugins: [paretoPointPctPlugin, paretoLineFrontPlugin],
          data: {
            labels: pl,
            datasets: [
              {
                type: 'bar',
                label: 'IPD',
                data: pi,
                backgroundColor: gradBar,
                borderColor: 'rgba(18,18,18,0.75)',
                borderWidth: 2,
                hoverBackgroundColor: 'rgba(127, 101, 63, 0.98)',
                hoverBorderColor: 'rgba(18,18,18,0.95)',
                hoverBorderWidth: 2,
                barThickness: isMobile ? 14 : 20,
                maxBarThickness: isMobile ? 16 : 24,
                categoryPercentage: 0.70,
                barPercentage: 0.62,
                order: 1
              },
              {
                type: 'line',
                label: 'Riesgo Acumulado',
                data: pa,
                yAxisID: 'yPct',
                borderColor: 'rgba(255,0,0,0.92)',
                backgroundColor: 'transparent',
                borderWidth: 3,
                pointRadius: 4,
                pointHoverRadius: 5,
                pointBackgroundColor: 'rgba(255,255,255,1)',
                pointBorderColor: 'rgba(255,0,0,0.92)',
                pointBorderWidth: 2,
                fill: false,
                lineTension: 0.25,
                order: 99
              }
            ]
          },
          options: {
            responsive: true,
            maintainAspectRatio: false,
            animation: { duration: 900, easing: 'easeOutQuart' },
            legend: { display: false },
            tooltips: {
              mode: 'index',
              intersect: false,
              backgroundColor: 'rgba(18,18,18,0.92)',
              titleFontStyle: 'bold',
              bodyFontStyle: 'bold',
              callbacks: {
                title: function(items, data){
                  var i = items && items[0] ? items[0].index : 0;
                  return data.labels[i] || '';
                },
                label: function(t, d){
                  var label = d.datasets[t.datasetIndex].label || '';
                  if (t.datasetIndex === 1) return ' ' + label + ': ' + Number(t.yLabel).toFixed(2) + '%';
                  return ' ' + label + ': ' + t.yLabel;
                },
                afterBody: function(items){
                  var i = items && items[0] ? items[0].index : 0;
                  var evento = (paretoEventos[i] || '').trim();

                  if (!evento) {
                    return ['Evento de riesgo: -'];
                  }

                  var limite = 70;
                  var corto = evento.length > limite ? evento.substring(0, limite).trim() + '...' : evento;

                  var salida = ['Evento de riesgo: ' + corto];

                  if (evento.length > limite) {
                    salida.push('Ver más en detalle');
                  }

                  return salida;
                }
              }
            },
            hover: { mode: 'nearest', intersect: false },
            layout: { padding: { top: 22, right: 16, bottom: 6, left: 10 } },
            scales: {
              yAxes: [
                {
                  id: 'yIPD',
                  position: 'left',
                  ticks: { beginAtZero: true, precision: 0, fontStyle: 'bold' },
                  gridLines: { color: 'rgba(0,0,0,0.06)' }
                },
                {
                  id: 'yPct',
                  position: 'right',
                  ticks: { beginAtZero: true, max: 100, callback: function(v){ return v + '%'; }, fontStyle: 'bold' },
                  gridLines: { drawOnChartArea: false }
                }
              ],
              xAxes: [
                {
                  ticks: { fontStyle: 'bold', maxRotation: 0, minRotation: 0, padding: 10 },
                  gridLines: { display: false }
                }
              ]
            }
          }
        });

        renderParetoLegend(paretoChart);

        window.addEventListener('resize', function(){
          renderParetoLegend(paretoChart);
          paretoChart.update(0);
        });
      }


      /* ========= 8. Matriz de evaluación de riesgos (filtro + nuevo perfil) ========= */
      var canvasMatrix = document.getElementById('mymatrizriesgos');
      if (canvasMatrix) {
        var ctxM = canvasMatrix.getContext('2d');
        var selectedCriteria = (matrixCriteria || []).map(function(c){ return String(c.id); });
        var showNuevoPerfil = false;
        var matrixChart = null;

        var matrixAxisValues = [0.4, 1.2, 2.0, 4.0, 6.0, 8.0, 10.0];

        function mapMatrixValue(value) {
          var v = Number(value || 0);

          if (v <= matrixAxisValues[0]) return 0;
          if (v >= matrixAxisValues[matrixAxisValues.length - 1]) return matrixAxisValues.length - 1;

          for (var i = 0; i < matrixAxisValues.length - 1; i++) {
            var a = matrixAxisValues[i];
            var b = matrixAxisValues[i + 1];

            if (v >= a && v <= b) {
              var pct = (v - a) / (b - a);
              return i + pct;
            }
          }

          return 0;
        }

        function getFilteredMatrixPoints() {
          return (matrixPoints || []).filter(function(p){
            return selectedCriteria.indexOf(String(p.criterio_id)) !== -1;
          });
        }

        function updateMatrixTable() {
          var rows = document.querySelectorAll('#matrixTableBody tr[data-criterio]');
          rows.forEach(function(row){
            var criterio = row.getAttribute('data-criterio');
            row.style.display = (selectedCriteria.indexOf(String(criterio)) !== -1) ? '' : 'none';
          });
        }

        function buildLineData(points) {
          var out = [];

          points.forEach(function(p){
            if (
              p.x !== null && p.y !== null &&
              p.x2 !== null && p.y2 !== null &&
              p.x2 !== undefined && p.y2 !== undefined
            ) {
              out.push({
                x: mapMatrixValue(p.x),
                y: mapMatrixValue(p.y),
                rawX: Number(p.x || 0),
                rawY: Number(p.y || 0),
                id: p.id,
                isLine: true
              });

              out.push({
                x: mapMatrixValue(p.x2),
                y: mapMatrixValue(p.y2),
                rawX: Number(p.x2 || 0),
                rawY: Number(p.y2 || 0),
                id: p.id,
                isLine: true
              });

              out.push(null);
            }
          });

          return out;
        }

        function renderMatrix() {
          var filtered = getFilteredMatrixPoints();

          var originalData = filtered.map(function(p){
            return {
              x: mapMatrixValue(p.x),
              y: mapMatrixValue(p.y),
              rawX: Number(p.x || 0),
              rawY: Number(p.y || 0),
              id: p.id,
              label: p.label,
              ipd: p.ipd,
              perfil: p.perfil,
              nivel: p.nivel,
              isNew: false
            };
          });

          var nuevoData = filtered
            .filter(function(p){
              return p.x2 !== null && p.y2 !== null && p.x2 !== undefined && p.y2 !== undefined;
            })
            .map(function(p){
              return {
                x: mapMatrixValue(p.x2),
                y: mapMatrixValue(p.y2),
                rawX: Number(p.x2 || 0),
                rawY: Number(p.y2 || 0),
                id: p.id,
                label: p.label,
                ipd: p.ipd2,
                perfil: p.nuevo_perfil,
                nivel: p.nuevo_nivel,
                isNew: true
              };
            });

          var lineData = buildLineData(filtered);

          if (matrixChart) {
            matrixChart.destroy();
          }

          var matrixPointLabelPlugin = {
            afterDatasetsDraw: function(chart) {
              if (!chart || chart.canvas.id !== 'mymatrizriesgos') return;

              var ctx = chart.ctx;
              ctx.save();
              ctx.textAlign = "center";
              ctx.textBaseline = "middle";

              chart.data.datasets.forEach(function(ds, datasetIndex){
                if (datasetIndex === 2) return; // no pintar labels en líneas
                if (ds.label === 'Nuevo perfil' && !showNuevoPerfil) return; // ocultar labels del nuevo perfil

                var meta = chart.getDatasetMeta(datasetIndex);
                if (!meta || meta.hidden) return;

                meta.data.forEach(function(pt, i) {
                  var d = ds.data[i];
                  if (!d) return;
                  if (d.isNew && !showNuevoPerfil) return; // doble seguridad

                  ctx.font = "900 10px Poppins, Arial, sans-serif";
                  ctx.fillStyle = d.isNew ? "#111111" : "#ffffff";
                  ctx.fillText(String(d.id || ''), pt._model.x, pt._model.y);
                });
              });

              ctx.restore();
            }
          };
          matrixChart = new Chart(ctxM, {
            type: 'scatter',
            plugins: [matrixPointLabelPlugin],
            data: {
              datasets: [
                {
                  label: 'Perfil actual',
                  data: originalData,
                  pointRadius: 13,
                  pointHoverRadius: 14,
                  pointBackgroundColor: 'rgba(0,0,0,0.96)',
                  pointBorderColor: '#ffffff',
                  pointBorderWidth: 2,
                  showLine: false
                },
                {
                  label: 'Nuevo perfil',
                  data: nuevoData,
                  pointRadius: showNuevoPerfil ? 13 : 0,
                  pointHoverRadius: showNuevoPerfil ? 14 : 0,
                  pointBackgroundColor: '#ffffff',
                  pointBorderColor: '#111111',
                  pointBorderWidth: 2,
                  showLine: false,
                  hidden: !showNuevoPerfil
                },
                {
                  type: 'line',
                  label: 'Conexión',
                  data: lineData,
                  fill: false,
                  showLine: true,
                  pointRadius: 0,
                  pointHoverRadius: 0,
                  borderColor: 'rgba(255,255,255,0.92)',
                  borderWidth: 3,
                  borderDash: [8, 6],
                  lineTension: 0,
                  spanGaps: false,
                  hidden: !showNuevoPerfil
                }
              ]
            },
            options: {
              responsive: true,
              maintainAspectRatio: false,
              legend: { display: false },
              animation: { duration: 700 },
              layout: {
                padding: { top: 0, right: 0, bottom: 0, left: 0 }
              },
              tooltips: {
                backgroundColor: 'rgba(25,25,25,0.88)',
                titleFontStyle: 'bold',
                bodyFontStyle: 'bold',
                displayColors: false,
                xPadding: 14,
                yPadding: 12,
                cornerRadius: 12,
                caretSize: 8,
                callbacks: {
                  title: function(items, data){
                    var i = items && items[0] ? items[0].index : 0;
                    var ds = data.datasets[items[0].datasetIndex];
                    var p = ds.data[i] || {};
                    return (p.label || 'Escenario');
                  },
                  label: function(item, data){
                    var ds = data.datasets[item.datasetIndex];
                    var p = ds.data[item.index] || {};
                    if (ds.label === 'Conexión') return '';

                    return [
                      (p.isNew ? 'Nuevo Perfil' : 'Perfil actual'),
                      'IPD: ' + Number(p.ipd || 0).toFixed(2),
                      'Perfil: ' + (p.perfil || ''),
                      'Nivel: ' + (p.nivel || ''),
                      'Amenaza: ' + Number(p.rawY || 0).toFixed(1),
                      'Impacto: ' + Number(p.rawX || 0).toFixed(1)
                    ];
                  },
                  filter: function(tooltipItem, data) {
                    return data.datasets[tooltipItem.datasetIndex].label !== 'Conexión';
                  }
                }
              },
              scales: {
                xAxes: [{
                  type: 'linear',
                  position: 'bottom',
                  ticks: {
                    min: -0.5,
                    max: 6.5,
                    display: false
                  },
                  gridLines: {
                    display: false,
                    drawBorder: false
                  }
                }],
                yAxes: [{
                  type: 'linear',
                  ticks: {
                    min: -0.5,
                    max: 6.5,
                    display: false
                  },
                  gridLines: {
                    display: false,
                    drawBorder: false
                  }
                }]
              }
            }
          });

          updateMatrixTable();
        }

        // ===== Multiselect =====
        var trigger = document.getElementById('matrixCriteriaTrigger');
        var menu = document.getElementById('matrixCriteriaMenu');
        var summary = document.getElementById('matrixCriteriaSummary');
        var allCheckbox = document.getElementById('matrixCriteriaAll');
        var checkboxes = Array.prototype.slice.call(document.querySelectorAll('.matrix-criteria-checkbox'));
        var btnNuevoPerfil = document.getElementById('btnToggleNuevoPerfil');

        function updateSummary() {
          var selected = checkboxes.filter(function(cb){ return cb.checked; });
          selectedCriteria = selected.map(function(cb){ return String(cb.value); });

          if (selected.length === checkboxes.length) {
            summary.textContent = 'Todos los criterios';
            allCheckbox.checked = true;
            allCheckbox.indeterminate = false;
          } else if (selected.length === 0) {
            summary.textContent = 'Sin criterios seleccionados';
            allCheckbox.checked = false;
            allCheckbox.indeterminate = false;
          } else if (selected.length === 1) {
            summary.textContent = selected[0].parentNode.querySelector('span').textContent.trim();
            allCheckbox.checked = false;
            allCheckbox.indeterminate = true;
          } else {
            summary.textContent = selected.length + ' criterios seleccionados';
            allCheckbox.checked = false;
            allCheckbox.indeterminate = true;
          }

          renderMatrix();
        }

        if (trigger && menu) {
          trigger.addEventListener('click', function(e){
            e.stopPropagation();
            menu.classList.toggle('is-open');
            trigger.classList.toggle('is-open');
          });

          document.addEventListener('click', function(e){
            if (!document.getElementById('matrixCriteriaFilter').contains(e.target)) {
              menu.classList.remove('is-open');
              trigger.classList.remove('is-open');
            }
          });
        }

        if (allCheckbox) {
          allCheckbox.addEventListener('change', function(){
            checkboxes.forEach(function(cb){
              cb.checked = allCheckbox.checked;
            });
            updateSummary();
          });
        }

        checkboxes.forEach(function(cb){
          cb.addEventListener('change', function(){
            updateSummary();
          });
        });

        if (btnNuevoPerfil) {
          btnNuevoPerfil.addEventListener('click', function(){
            showNuevoPerfil = !showNuevoPerfil;
            btnNuevoPerfil.classList.toggle('is-active', showNuevoPerfil);
            btnNuevoPerfil.textContent = showNuevoPerfil ? 'Ocultar Nuevo Perfil' : 'Mostrar Nuevo Perfil';
            renderMatrix();
          });
        }

        renderMatrix();
      }

      /* ========= 9. Avance de Consecución ========= */
      // Gauge semicircular
      var gaugeCanvas = document.getElementById('myavanceconsecuciongauge');
      if (gaugeCanvas) {
        var gctx = gaugeCanvas.getContext('2d');

        var avancePct = Number(avanceConsecucionPorcentaje || 0);
        var restantePct = Math.max(0, 100 - avancePct);

        new Chart(gctx, {
          type: 'doughnut',
          data: {
            datasets: [{
              data: [avancePct, restantePct],
              backgroundColor: [
                (avancePct >= 90) ? '#00B050'
                  : (avancePct >= 80) ? '#92D050'
                  : (avancePct >= 70) ? '#FFC000'
                  : '#FF0000',
                '#E7E7E7'
              ],
              borderColor: '#ffffff',
              borderWidth: 2,
              hoverBackgroundColor: [
                (avancePct >= 90) ? '#00B050'
                  : (avancePct >= 80) ? '#92D050'
                  : (avancePct >= 70) ? '#FFC000'
                  : '#FF0000',
                '#E7E7E7'
              ]
            }]
          },
          options: {
            responsive: true,
            maintainAspectRatio: false,
            rotation: Math.PI,
            circumference: Math.PI,
            cutoutPercentage: 62,
            legend: { display: false },
            tooltips: {
              enabled: true,
              callbacks: {
                label: function(tooltipItem, data) {
                  return tooltipItem.index === 0
                    ? 'Avance: ' + avancePct.toFixed(2) + '%'
                    : 'Pendiente: ' + restantePct.toFixed(2) + '%';
                }
              }
            },
            animation: {
              duration: 1100,
              easing: 'easeOutQuart'
            }
          }
        });
      }

      // Barra estados no aceptables
      var barCanvas = document.getElementById('myavanceconsecucionbar');
      if (barCanvas) {
        var bctx = barCanvas.getContext('2d');

        new Chart(bctx, {
          type: 'bar',
          data: {
            labels: ['Abierta', 'Proceso', 'Ejecutada'],
            datasets: [{
              data: [
                Number((avanceNoAceptables && avanceNoAceptables.abierta) || 0),
                Number((avanceNoAceptables && avanceNoAceptables.proceso) || 0),
                Number((avanceNoAceptables && avanceNoAceptables.ejecutada) || 0)
              ],
              backgroundColor: [
                'rgba(255, 0, 0, 0.92)',
                'rgba(255, 192, 0, 0.92)',
                'rgba(0, 176, 80, 0.92)'
              ],
              borderColor: [
                'rgba(210, 0, 0, 1)',
                'rgba(214, 157, 0, 1)',
                'rgba(0, 140, 62, 1)'
              ],
              borderWidth: 2,
              categoryPercentage: 0.58,
              barPercentage: 0.7
            }]
          },
          options: {
            responsive: true,
            maintainAspectRatio: false,
            legend: { display: false },
            animation: {
              duration: 1000,
              easing: 'easeOutQuart'
            },
            tooltips: {
              backgroundColor: 'rgba(18,18,18,0.94)',
              displayColors: false,
              callbacks: {
                label: function(tooltipItem) {
                  return 'Total: ' + tooltipItem.yLabel;
                }
              }
            },
            scales: {
              yAxes: [{
                ticks: {
                  beginAtZero: true,
                  precision: 0,
                  stepSize: 1,
                  fontStyle: 'bold',
                  fontColor: '#4a4a4a'
                },
                gridLines: {
                  color: 'rgba(0,0,0,0.06)',
                  zeroLineColor: 'rgba(0,0,0,0.12)'
                }
              }],
              xAxes: [{
                ticks: {
                  fontStyle: 'bold',
                  fontColor: '#303030'
                },
                gridLines: {
                  display: false
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
@endpush

@section('title')
  KPIs de riesgos sociales
@endsection

@section('content')

@php
  $indiceDistribucionDataBlade = [
    (int) ($conteoIndice['muy_bajo'] ?? 0),
    (int) ($conteoIndice['bajo'] ?? 0),
    (int) ($conteoIndice['medio'] ?? 0),
    (int) ($conteoIndice['alto'] ?? 0),
    (int) ($conteoIndice['muy_alto'] ?? 0),
  ];

  $indiceTotal = array_sum($indiceDistribucionDataBlade);

  $indiceCards = [
    [
      'label' => 'Muy Bajo',
      'value' => (int) ($conteoIndice['muy_bajo'] ?? 0),
      'class' => 'muy-bajo',
    ],
    [
      'label' => 'Bajo',
      'value' => (int) ($conteoIndice['bajo'] ?? 0),
      'class' => 'bajo',
    ],
    [
      'label' => 'Medio',
      'value' => (int) ($conteoIndice['medio'] ?? 0),
      'class' => 'medio',
    ],
    [
      'label' => 'Alto',
      'value' => (int) ($conteoIndice['alto'] ?? 0),
      'class' => 'alto',
    ],
    [
      'label' => 'Muy Alto',
      'value' => (int) ($conteoIndice['muy_alto'] ?? 0),
      'class' => 'muy-alto',
    ],
  ];

  $vulnerabilidadCards = [];

  foreach (($vulnerabilidadLabels ?? []) as $i => $label) {
    $value = (float) (($vulnerabilidadPromedios ?? [])[$i] ?? 0);

    $nivel = 'Sin Control';
    $class = 'sin-control';

    if ($value > 8) {
      $nivel = 'Óptimo';
      $class = 'optimo';
    } elseif ($value > 6) {
      $nivel = 'Eficiente';
      $class = 'eficiente';
    } elseif ($value > 4) {
      $nivel = 'Regular';
      $class = 'regular';
    } elseif ($value >= 3) {
      $nivel = 'Deficiente';
      $class = 'deficiente';
    }

    $vulnerabilidadCards[] = [
      'label' => $label,
      'value' => $value,
      'nivel' => $nivel,
      'class' => $class,
    ];
  }
@endphp

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

              <div class="card-toolbar giro-card-toolbar">
                <a href="{{ route('analisis.analisiscliente', $id_cliente) }}" class="giro-back-btn">
                    <i class="la la-arrow-left giro-back-btn__icon"></i>
                    <span class="giro-back-btn__text">Regresar</span>
                </a>
            </div>
            </div>

            <div class="card-body">

              {{-- Barra de navegación de gráficas --}}
              <div class="giro-kpi-tabs" id="giroKpiTabs">

                <button type="button" class="giro-kpi-tab is-active" data-chart-target="chart-indice">
                  <span class="giro-kpi-tab__icon">
                    <i class="flaticon2-analytics"></i>
                  </span>
                  <span class="giro-kpi-tab__text">Índice de<br>Distribución</span>
                </button>

                <button type="button" class="giro-kpi-tab" data-chart-target="chart-dano">
                  <span class="giro-kpi-tab__icon">
                    <i class="flaticon2-file"></i>
                  </span>
                  <span class="giro-kpi-tab__text">Daño potencial<br>vs P. Estándar</span>
                </button>

                <button type="button" class="giro-kpi-tab" data-chart-target="chart-vulnerabilidad">
                  <span class="giro-kpi-tab__icon">
                    <i class="flaticon-network"></i>
                  </span>
                  <span class="giro-kpi-tab__text">Análisis de<br>Vulnerabilidad</span>
                </button>

                <button type="button" class="giro-kpi-tab" data-chart-target="chart-medidas">
                  <span class="giro-kpi-tab__icon" aria-hidden="true">
                    <svg viewBox="0 0 24 24">
                      <path d="M4 19h16"></path>
                      <path d="M7 19v-6"></path>
                      <path d="M12 19V9"></path>
                      <path d="M17 19v-11"></path>
                      <path d="M5 11l4-4 3 2 5-5"></path>
                    </svg>
                  </span>
                  <span class="giro-kpi-tab__text">Vulnerabilidades del<br> Sistema</span>
                </button>

                <button type="button" class="giro-kpi-tab" data-chart-target="chart-origen">
                  <span class="giro-kpi-tab__icon">
                    <i class="flaticon-grid-menu"></i>
                  </span>
                  <span class="giro-kpi-tab__text">Matriz de evaluación<br>de riesgos</span>
                </button>

                <button type="button" class="giro-kpi-tab" data-chart-target="chart-security">
                  <span class="giro-kpi-tab__icon">
                    <i class="flaticon2-pie-chart"></i>
                  </span>
                  <span class="giro-kpi-tab__text">Distr. Riesgos<br>por criterio</span>
                </button>

                <button type="button" class="giro-kpi-tab" data-chart-target="chart-pareto">
                  <span class="giro-kpi-tab__icon">
                    <i class="flaticon2-chart"></i>
                  </span>
                  <span class="giro-kpi-tab__text">Gráfico<br>Pareto (80–20)</span>
                </button>

                <button type="button" class="giro-kpi-tab" data-chart-target="chart-escenarios">
                  <span class="giro-kpi-tab__icon">
                    <i class="flaticon2-percentage"></i>
                  </span>
                  <span class="giro-kpi-tab__text">Distribución %<br>de Escenarios</span>
                </button>

                <button type="button" class="giro-kpi-tab" data-chart-target="chart-avance">
                  <span class="giro-kpi-tab__icon">
                    <i class="flaticon2-check-mark"></i>
                  </span>
                  <span class="giro-kpi-tab__text">Avance de<br>Consecución</span>
                </button>

              </div>

              {{-- Área central: solo se muestra una gráfica a la vez --}}
              <div class="giro-chart-stage">

                {{-- 1. Índice de distribución (VISIBLE POR DEFAULT) --}}
                <div class="giro-chart-panel is-active" id="chart-indice">
                  <div class="giro-chart-card giro-chart-card--indice">

                    <h5 class="giro-chart-title">Índice de Distribución de Eventos de Riesgo</h5>

                    <div class="giro-chart-canvas-wrap giro-chart-canvas-wrap--indice">
                      <canvas id="myindicedistribucion"></canvas>
                    </div>

                    <div class="giro-indice-summary">
                      @foreach($indiceCards as $card)
                        @php
                          $pct = $indiceTotal > 0 ? round(($card['value'] / $indiceTotal) * 100, 1) : 0;
                        @endphp

                        <div class="giro-indice-card giro-indice-card--{{ $card['class'] }}">
                          <div class="giro-indice-card__icon">
                            <i class="flaticon-security"></i>
                          </div>

                          <div class="giro-indice-card__content">
                            <div class="giro-indice-card__label">{{ $card['label'] }}</div>
                            <div class="giro-indice-card__value">{{ $card['value'] }}</div>
                            <div class="giro-indice-card__pct">{{ number_format($pct, 1) }}% del total</div>
                          </div>

                          <div class="giro-indice-card__bar">
                            <span style="width: {{ min(100, $pct) }}%;"></span>
                          </div>
                        </div>
                      @endforeach
                    </div>

                  </div>
                </div>

                {{-- 2. Daño potencial --}}
                <div class="giro-chart-panel" id="chart-dano">
                  <div class="giro-chart-card giro-chart-card--dano">
                    <h5 class="giro-chart-title">Daño Potencial vs Patrón Estándar</h5>

                    <div class="giro-chart-canvas-wrap giro-chart-canvas-wrap--dano">
                      <canvas id="mydanopotencial"></canvas>
                    </div>

                    {{-- Tabla  --}}
                    <div class="giro-dano-table-wrap">
                      <table class="giro-dano-table">
                        <thead>
                          <tr>
                            <th></th>
                            <th>Muy Bajo</th>
                            <th>Bajo</th>
                            <th>Medio</th>
                            <th>Alto</th>
                            <th>Muy Alto</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <td><span class="giro-dano-dot giro-dano-dot--pot"></span> Riesgo Potencial</td>
                            <td>{{ number_format($distribucionEscenarios['muy_bajo'] ?? 0, 2) }}%</td>
                            <td>{{ number_format($distribucionEscenarios['bajo'] ?? 0, 2) }}%</td>
                            <td>{{ number_format($distribucionEscenarios['medio'] ?? 0, 2) }}%</td>
                            <td>{{ number_format($distribucionEscenarios['alto'] ?? 0, 2) }}%</td>
                            <td>{{ number_format($distribucionEscenarios['muy_alto'] ?? 0, 2) }}%</td>
                          </tr>
                          <tr>
                            <td><span class="giro-dano-dot giro-dano-dot--std"></span> Riesgo Estándar</td>
                            <td>60.00%</td>
                            <td>30.00%</td>
                            <td>10.00%</td>
                            <td>0.00%</td>
                            <td>0.00%</td>
                          </tr>
                        </tbody>
                      </table>
                    </div>

                  </div>
                </div>

                {{-- 3. Vulnerabilidad --}}
                <div class="giro-chart-panel" id="chart-vulnerabilidad">
                  <div class="giro-chart-card giro-chart-card--vuln">

                    <h5 class="giro-chart-title giro-chart-title--vuln">
                      <span class="giro-vuln-title-icon">
                        <i class="flaticon-network"></i>
                      </span>
                      Análisis de Vulnerabilidad
                    </h5>

                    <div class="giro-chart-canvas-wrap giro-chart-canvas-wrap--vuln">
                      <div class="giro-chart-canvas-inner giro-chart-canvas-inner--vuln">
                        <canvas id="myanalisisvulnerabilidad"></canvas>
                      </div>
                    </div>

                    <div class="giro-vuln-summary">
                      @forelse($vulnerabilidadCards as $card)
                        <div class="giro-vuln-card giro-vuln-card--{{ $card['class'] }}">
                          <div class="giro-vuln-card__icon">
                            <i class="flaticon-security"></i>
                          </div>

                          <div class="giro-vuln-card__body">
                            <div class="giro-vuln-card__label">
                              {{ $card['label'] }}
                            </div>

                            <div class="giro-vuln-card__value">
                              {{ number_format($card['value'], 1) }}
                            </div>

                            <div class="giro-vuln-card__badge">
                              {{ $card['nivel'] }}
                            </div>
                          </div>
                        </div>
                      @empty
                        <div class="giro-vuln-empty">
                          Sin datos de vulnerabilidad
                        </div>
                      @endforelse
                    </div>

                  </div>
                </div>

                {{-- 4. Medidas --}}
                <div class="giro-chart-panel" id="chart-medidas">
                  <div class="giro-chart-card">
                    <h5 class="giro-chart-title">Vulnerabilidades del sistema</h5>

                    <div class="giro-medidas-grid">

                      {{-- ===================== DEBILIDADES ===================== --}}
                      <div class="giro-medidas-block">
                        <div class="giro-medidas-head giro-medidas-head--bad">
                          <span>DEBILIDADES DEL SISTEMA DE SEGURIDAD</span>
                        </div>

                        <div class="giro-medidas-pie">
                          <canvas id="pieDebilidades"></canvas>
                        </div>

                        <div class="giro-medidas-mini">
                          <div class="giro-mini-card">
                            <div class="giro-mini-title">Pasivas</div>
                            <canvas id="barDebPasivas"></canvas>
                          </div>

                          <div class="giro-mini-card">
                            <div class="giro-mini-title">Activas</div>
                            <canvas id="barDebActivas"></canvas>
                          </div>

                          <div class="giro-mini-card">
                            <div class="giro-mini-title">Documentales</div>
                            <canvas id="barDebDoc"></canvas>
                          </div>

                          <div class="giro-mini-card">
                            <div class="giro-mini-title">Humanas</div>
                            <canvas id="barDebHumanas"></canvas>
                          </div>
                        </div>
                      </div>

                      {{-- ===================== FORTALEZAS ===================== --}}
                      <div class="giro-medidas-block">
                        <div class="giro-medidas-head giro-medidas-head--good">
                          <span>FORTALEZAS DEL SISTEMA DE SEGURIDAD</span>
                        </div>

                        <div class="giro-medidas-pie">
                          <canvas id="pieFortalezas"></canvas>
                        </div>

                        <div class="giro-medidas-mini">
                          <div class="giro-mini-card">
                            <div class="giro-mini-title">Pasivas</div>
                            <canvas id="barForPasivas"></canvas>
                          </div>

                          <div class="giro-mini-card">
                            <div class="giro-mini-title">Activas</div>
                            <canvas id="barForActivas"></canvas>
                          </div>

                          <div class="giro-mini-card">
                            <div class="giro-mini-title">Documentales</div>
                            <canvas id="barForDoc"></canvas>
                          </div>

                          <div class="giro-mini-card">
                            <div class="giro-mini-title">Humanas</div>
                            <canvas id="barForHumanas"></canvas>
                          </div>
                        </div>
                      </div>

                    </div>
                  </div>
                </div>

                {{-- 5. Matriz de evaluación de riesgos --}}
                {{-- 5. Matriz de evaluación de riesgos --}}
                <div class="giro-chart-panel" id="chart-origen">
                  <div class="giro-chart-card giro-chart-card--matrix">
                    <h5 class="giro-chart-title">Matriz de evaluación de riesgos</h5>
                    <div class="giro-matrix-toolbar">
                      <div class="giro-matrix-filter">
                        <label class="giro-matrix-filter__label">Filtrar por criterio</label>

                        <div class="giro-matrix-multiselect" id="matrixCriteriaFilter">
                          <button type="button" class="giro-matrix-multiselect__trigger" id="matrixCriteriaTrigger">
                            <span id="matrixCriteriaSummary">Todos los criterios</span>
                            <span class="giro-matrix-multiselect__arrow">▼</span>
                          </button>

                          <div class="giro-matrix-multiselect__menu" id="matrixCriteriaMenu">
                            <label class="giro-matrix-multiselect__option giro-matrix-multiselect__option--all">
                              <input type="checkbox" id="matrixCriteriaAll" checked>
                              <span>Seleccionar todos</span>
                            </label>

                            @foreach(($matrixCriteria ?? []) as $crit)
                              <label class="giro-matrix-multiselect__option">
                                <input
                                  type="checkbox"
                                  class="matrix-criteria-checkbox"
                                  value="{{ $crit['id'] }}"
                                  checked
                                >
                                <span>{{ $crit['label'] }}</span>
                              </label>
                            @endforeach
                          </div>
                        </div>
                      </div>

                      <div class="giro-matrix-actions">
                        <button type="button" class="giro-matrix-toggle-btn" id="btnToggleNuevoPerfil">
                          Mostrar Nuevo Perfil
                        </button>
                      </div>
                    </div>

                    <div class="giro-matrix-wrap giro-matrix-wrap--vertical">
                      <div class="giro-matrix-left giro-matrix-left--full">

                        <div class="giro-matrix-stage">
                          {{-- Eje Y categorías --}}
                          <div class="giro-matrix-ylabels">
                            <div class="y10">Constante</div>
                            <div class="y8">Habitual</div>
                            <div class="y6">Frecuente</div>
                            <div class="y4">Ocasional</div>
                            <div class="y2">Esporádico</div>
                            <div class="y12">Remoto</div>
                            <div class="y04">Improbable</div>
                          </div>

                          {{-- Eje Y valores --}}
                          <div class="giro-matrix-yvals">
                            <div class="y10">10.0</div>
                            <div class="y8">8.0</div>
                            <div class="y6">6.0</div>
                            <div class="y4">4.0</div>
                            <div class="y2">2.0</div>
                            <div class="y12">1.2</div>
                            <div class="y04">0.4</div>
                          </div>

                          {{-- Área principal --}}
                          <div class="giro-matrix-main">
                            <div class="giro-matrix-grid">
                              {{-- fila 1 --}}
                              <div class="c g"></div><div class="c y"></div><div class="c r"></div><div class="c d"></div><div class="c d"></div><div class="c d"></div><div class="c d"></div>
                              {{-- fila 2 --}}
                              <div class="c g"></div><div class="c y"></div><div class="c y"></div><div class="c r"></div><div class="c d"></div><div class="c d"></div><div class="c d"></div>
                              {{-- fila 3 --}}
                              <div class="c g"></div><div class="c y"></div><div class="c y"></div><div class="c r"></div><div class="c r"></div><div class="c d"></div><div class="c d"></div>
                              {{-- fila 4 --}}
                              <div class="c g"></div><div class="c g"></div><div class="c y"></div><div class="c y"></div><div class="c r"></div><div class="c r"></div><div class="c d"></div>
                              {{-- fila 5 --}}
                              <div class="c x"></div><div class="c g"></div><div class="c g"></div><div class="c y"></div><div class="c y"></div><div class="c y"></div><div class="c r"></div>
                              {{-- fila 6 --}}
                              <div class="c x"></div><div class="c x"></div><div class="c g"></div><div class="c g"></div><div class="c y"></div><div class="c y"></div><div class="c y"></div>
                              {{-- fila 7 --}}
                              <div class="c x"></div><div class="c x"></div><div class="c x"></div><div class="c g"></div><div class="c g"></div><div class="c g"></div><div class="c g"></div>
                            </div>

                            <div class="giro-matrix-canvas-wrap">
                              <canvas id="mymatrizriesgos"></canvas>
                            </div>

                            <div class="giro-matrix-xvals">
                              <div>0.4</div>
                              <div>1.2</div>
                              <div>2.0</div>
                              <div>4.0</div>
                              <div>6.0</div>
                              <div>8.0</div>
                              <div>10.0</div>
                            </div>

                            <div class="giro-matrix-xlabels">
                              <div>Insignificante</div>
                              <div>leve</div>
                              <div>Marginal</div>
                              <div>Grave</div>
                              <div>Crítico</div>
                              <div>Desastroso</div>
                              <div>Catastrófico</div>
                            </div>
                          </div>
                        </div>

                        <div class="giro-matrix-axis-note giro-matrix-axis-note--matrix">
                          <span><strong>Amenaza</strong></span>
                          <span><strong>Impacto / Severidad</strong></span>
                        </div>

                        <div class="giro-matrix-legend">
                          <div class="giro-matrix-legend__item">
                            <span class="giro-matrix-legend__dot giro-matrix-legend__dot--muy-bajo"></span>
                            <span>Muy Bajo</span>
                          </div>

                          <div class="giro-matrix-legend__item">
                            <span class="giro-matrix-legend__dot giro-matrix-legend__dot--bajo"></span>
                            <span>Bajo</span>
                          </div>

                          <div class="giro-matrix-legend__item">
                            <span class="giro-matrix-legend__dot giro-matrix-legend__dot--medio"></span>
                            <span>Medio</span>
                          </div>

                          <div class="giro-matrix-legend__item">
                            <span class="giro-matrix-legend__dot giro-matrix-legend__dot--alto"></span>
                            <span>Alto</span>
                          </div>

                          <div class="giro-matrix-legend__item">
                            <span class="giro-matrix-legend__dot giro-matrix-legend__dot--muy-alto"></span>
                            <span>Muy Alto</span>
                          </div>
                        </div>
                      </div>

                      <div class="giro-matrix-bottom">
                        <div class="giro-matrix-table-title">
                          Resumen de escenarios
                          <small style="display:block;font-size:12px;font-weight:700;color:#6b7280;margin-top:4px;">
                            Se muestran 8 registros visibles. Desliza para ver más.
                          </small>
                        </div>

                        <div class="giro-matrix-table-wrap giro-matrix-table-wrap--bottom">
                          <table class="giro-matrix-table giro-matrix-table--extended">
                            <thead>
                              <tr>
                                <th>Escenario</th>
                                <th>IPD</th>
                                <th>Perfil</th>
                                <th>Nivel</th>
                                <th>Nuevo Perfil</th>
                                <th>Nivel de R. Nuevo Perfil</th>
                              </tr>
                            </thead>
                            <tbody id="matrixTableBody">
                              @forelse(($matrixRows ?? []) as $r)
                                @php
                                  $lvl = $r['nivel'] ?? '';
                                  $cls = 'lvl-bajo';
                                  if ($lvl === 'Muy Alto') $cls = 'lvl-muy-alto';
                                  elseif ($lvl === 'Alto') $cls = 'lvl-alto';
                                  elseif ($lvl === 'Medio') $cls = 'lvl-medio';
                                  elseif ($lvl === 'Bajo') $cls = 'lvl-bajo';
                                  else $cls = 'lvl-muy-bajo';

                                  $lvl2 = $r['nuevo_nivel'] ?? '-';
                                  $cls2 = 'lvl-empty';
                                  if ($lvl2 === 'Muy Alto') $cls2 = 'lvl-muy-alto';
                                  elseif ($lvl2 === 'Alto') $cls2 = 'lvl-alto';
                                  elseif ($lvl2 === 'Medio') $cls2 = 'lvl-medio';
                                  elseif ($lvl2 === 'Bajo') $cls2 = 'lvl-bajo';
                                  elseif ($lvl2 === 'Muy Bajo') $cls2 = 'lvl-muy-bajo';
                                @endphp

                                <tr data-criterio="{{ $r['criterio_id'] ?? 0 }}">
                                  <td class="td-esc">{{ $r['label'] ?? '' }}</td>
                                  <td>{{ number_format((float)($r['ipd'] ?? 0), 2) }}</td>
                                  <td>{{ $r['perfil'] ?? '-' }}</td>
                                  <td><span class="giro-lvl {{ $cls }}">{{ $lvl ?: '-' }}</span></td>
                                  <td>{{ $r['nuevo_perfil'] ?? '-' }}</td>
                                  <td>
                                    @if(($r['nuevo_nivel'] ?? '-') !== '-')
                                      <span class="giro-lvl {{ $cls2 }}">{{ $r['nuevo_nivel'] }}</span>
                                    @else
                                      -
                                    @endif
                                  </td>
                                </tr>
                              @empty
                                <tr>
                                  <td colspan="6" class="text-center py-3">Sin datos</td>
                                </tr>
                              @endforelse
                            </tbody>
                          </table>
                        </div>
                      </div>
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

                {{-- 7. Pareto (80-20) --}}
                <div class="giro-chart-panel" id="chart-pareto">
                  <div class="giro-chart-card giro-chart-card--pareto">
                    <h5 class="giro-chart-title">Gráfico Pareto (80-20)</h5>

                    <div class="giro-chart-canvas-wrap giro-chart-canvas-wrap--pareto">
                      <div class="giro-chart-canvas-inner giro-chart-canvas-inner--pareto" id="paretoInner">
                        <canvas id="mypareto"></canvas>
                      </div>
                    </div>

                    <div id="paretoLegend" class="giro-pareto-legend"></div>
                  </div>
                </div>

                {{-- 8. Distribución % de Escenarios --}}
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
                              <td class="giro-td-muy-bajo">{{ ($fila['muy_bajo'] ?? 0) == 0 ? '' : $fila['muy_bajo'] }}</td>
                              <td class="giro-td-bajo">{{ ($fila['bajo'] ?? 0) == 0 ? '' : $fila['bajo'] }}</td>
                              <td class="giro-td-medio">{{ ($fila['medio'] ?? 0) == 0 ? '' : $fila['medio'] }}</td>
                              <td class="giro-td-alto">{{ ($fila['alto'] ?? 0) == 0 ? '' : $fila['alto'] }}</td>
                              <td class="giro-td-muy-alto">{{ ($fila['muy_alto'] ?? 0) == 0 ? '' : $fila['muy_alto'] }}</td>
                              <td class="giro-td-total">{{ ($fila['total'] ?? 0) == 0 ? '' : $fila['total'] }}</td>
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

                {{-- 9. Avance de Consecución --}}
                <div class="giro-chart-panel" id="chart-avance">
                  <div class="giro-chart-card giro-chart-card--avance">
                    <h5 class="giro-chart-title">Avance de Consecución</h5>

                    <div class="giro-avance-top">
                      <div class="giro-avance-gauge-card">
                        <div class="giro-avance-mini-title">Avance de Consecución</div>
                        <div class="giro-avance-gauge-wrap">
                          <canvas id="myavanceconsecuciongauge"></canvas>
                        </div>
                        <div class="giro-avance-gauge-value">
                          {{ number_format((float)($avanceConsecucionPorcentaje ?? 0), 2) }}%
                        </div>
                      </div>

                      <div class="giro-avance-bar-card">
                        <div class="giro-avance-mini-title">Estado de las Acciones de los Riesgos No Aceptables</div>
                        <div class="giro-avance-bar-wrap">
                          <canvas id="myavanceconsecucionbar"></canvas>
                        </div>
                      </div>
                    </div>

                    <div class="giro-avance-bottom">
                      <div class="giro-avance-table-card giro-avance-table-card--na">
                        <div class="giro-avance-table-head giro-avance-table-head--danger">
                          No aceptables
                        </div>

                        <div class="giro-avance-table-wrap">
                          <table class="giro-avance-table">
                            <thead>
                              <tr>
                                <th>Estado de las Acciones</th>
                                <th>Muy Alto</th>
                                <th>Alto</th>
                                <th>Medio</th>
                                <th>Total Esc.</th>
                              </tr>
                            </thead>
                            <tbody>
                              <tr>
                                <td>Abierta</td>
                                <td>{{ $avanceDetalleNoAceptables['abierta']['muy_alto'] ?? 0 }}</td>
                                <td>{{ $avanceDetalleNoAceptables['abierta']['alto'] ?? 0 }}</td>
                                <td>{{ $avanceDetalleNoAceptables['abierta']['medio'] ?? 0 }}</td>
                                <td>{{ $avanceDetalleNoAceptables['abierta']['total'] ?? 0 }}</td>
                              </tr>
                              <tr>
                                <td>Proceso</td>
                                <td>{{ $avanceDetalleNoAceptables['proceso']['muy_alto'] ?? 0 }}</td>
                                <td>{{ $avanceDetalleNoAceptables['proceso']['alto'] ?? 0 }}</td>
                                <td>{{ $avanceDetalleNoAceptables['proceso']['medio'] ?? 0 }}</td>
                                <td>{{ $avanceDetalleNoAceptables['proceso']['total'] ?? 0 }}</td>
                              </tr>
                              <tr>
                                <td>Ejecutada</td>
                                <td>{{ $avanceDetalleNoAceptables['ejecutada']['muy_alto'] ?? 0 }}</td>
                                <td>{{ $avanceDetalleNoAceptables['ejecutada']['alto'] ?? 0 }}</td>
                                <td>{{ $avanceDetalleNoAceptables['ejecutada']['medio'] ?? 0 }}</td>
                                <td>{{ $avanceDetalleNoAceptables['ejecutada']['total'] ?? 0 }}</td>
                              </tr>
                            </tbody>
                            <tfoot>
                              <tr>
                                <td>Total</td>
                                <td>
                                  {{ ($avanceDetalleNoAceptables['abierta']['muy_alto'] ?? 0)
                                    + ($avanceDetalleNoAceptables['proceso']['muy_alto'] ?? 0)
                                    + ($avanceDetalleNoAceptables['ejecutada']['muy_alto'] ?? 0) }}
                                </td>
                                <td>
                                  {{ ($avanceDetalleNoAceptables['abierta']['alto'] ?? 0)
                                    + ($avanceDetalleNoAceptables['proceso']['alto'] ?? 0)
                                    + ($avanceDetalleNoAceptables['ejecutada']['alto'] ?? 0) }}
                                </td>
                                <td>
                                  {{ ($avanceDetalleNoAceptables['abierta']['medio'] ?? 0)
                                    + ($avanceDetalleNoAceptables['proceso']['medio'] ?? 0)
                                    + ($avanceDetalleNoAceptables['ejecutada']['medio'] ?? 0) }}
                                </td>
                                <td>{{ $avanceNoAceptables['total'] ?? 0 }}</td>
                              </tr>
                            </tfoot>
                          </table>
                        </div>
                      </div>

                      <div class="giro-avance-table-card giro-avance-table-card--ok">
                        <div class="giro-avance-table-head giro-avance-table-head--success">
                          Aceptables
                          <small>Conteo general sin estado de acciones</small>
                        </div>

                        <div class="giro-avance-accept-note">
                          Este bloque resume únicamente los riesgos <strong>Bajo</strong> y <strong>Muy Bajo</strong>.
                        </div>

                        <div class="giro-avance-table-wrap giro-avance-table-wrap--accept">
                          <table class="giro-avance-table giro-avance-table--accept">
                            <thead>
                              <tr>
                                <th>Bajo</th>
                                <th>Muy Bajo</th>
                                <th>Total</th>
                              </tr>
                            </thead>
                            <tbody>
                              <tr>
                                <td>{{ $avanceAceptables['bajo'] ?? 0 }}</td>
                                <td>{{ $avanceAceptables['muy_bajo'] ?? 0 }}</td>
                                <td>{{ $avanceAceptables['total'] ?? 0 }}</td>
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
  </div>
</div>

<input type="hidden" id="datatable_i18n" value="{{ asset('/js/datatables/i18n/es-mx.json') }}">

@endsection