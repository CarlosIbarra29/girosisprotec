@extends('layouts.app')

@section('title')
    Tablero
@endsection

@push('scripts')
    <script src="{{ asset('js/tablero/Notificaciones.js') }}"></script>
    {{-- Chart.js para las gráficas del tablero (datos simulados) --}}
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
@endpush

@push('styles')
  <link href="{{ asset('/css/version2/tablero.css?v=1.0.2') }}" rel="stylesheet" type="text/css" />
@endpush

@section('content')

<div class="dashboard-shell">
    <div class="dashboard-header">
        <div class="dashboard-title-block">
            <div class="dashboard-title">Tablero de análisis de riesgo</div>
            <div class="dashboard-subchip">
                <i class="fas fa-chart-pie"></i>
                Visión general de los análisis de riesgos de tu cliente.
            </div>
        </div>
        <div class="dashboard-chips">
            <div class="dash-chip">
                <span class="dash-chip-dot"></span> Datos simulados
            </div>
            <div class="dash-chip dash-chip--ghost">
                Hoy
            </div>
            <div class="dash-chip dash-chip--ghost">
                Últimos 30 días
            </div>
        </div>
    </div>

    {{-- FILA 1 --}}
    <div class="row">
        {{-- Alertas recientes --}}
        <div class="col-xl-7 col-lg-7 mb-5">
            <div class="dash-card">
                <div class="dash-card-header">
                    <div class="dash-card-title">Alertas recientes de riesgo</div>
                    <div class="dash-card-tag">Últimas 5 revisiones</div>
                </div>
                <div class="dash-card-body">
                    <div class="table-responsive">
                        <table class="alerts-table">
                            <thead>
                                <tr>
                                    <th>Cliente</th>
                                    <th>Categoría</th>
                                    <th>Descripción</th>
                                    <th>Nivel</th>
                                    <th>Fecha</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Planta Norte</td>
                                    <td>Riesgo Social</td>
                                    <td>Incremento de incidentes en acceso principal.</td>
                                    <td><span class="alerts-badge badge-alta">Alto</span></td>
                                    <td>01-12-2025</td>
                                    <td><a href="#" class="alerts-link">Ver detalle</a></td>
                                </tr>
                                <tr>
                                    <td>Centro Logístico</td>
                                    <td>Riesgo Tecnológico</td>
                                    <td>Fallas intermitentes en CCTV perimetral.</td>
                                    <td><span class="alerts-badge badge-media">Medio</span></td>
                                    <td>29-11-2025</td>
                                    <td><a href="#" class="alerts-link">Ver detalle</a></td>
                                </tr>
                                <tr>
                                    <td>Sucursal Sur</td>
                                    <td>Riesgo Natural</td>
                                    <td>Zona identificada con riesgo de inundación.</td>
                                    <td><span class="alerts-badge badge-alta">Alto</span></td>
                                    <td>28-11-2025</td>
                                    <td><a href="#" class="alerts-link">Ver detalle</a></td>
                                </tr>
                                <tr>
                                    <td>Edificio Corporativo</td>
                                    <td>Riesgo Social</td>
                                    <td>Reportes de accesos no autorizados nocturnos.</td>
                                    <td><span class="alerts-badge badge-media">Medio</span></td>
                                    <td>27-11-2025</td>
                                    <td><a href="#" class="alerts-link">Ver detalle</a></td>
                                </tr>
                                <tr>
                                    <td>Almacén SAT</td>
                                    <td>Riesgo Tecnológico</td>
                                    <td>Servidor de monitoreo con capacidad al 90%.</td>
                                    <td><span class="alerts-badge badge-baja">Bajo</span></td>
                                    <td>26-11-2025</td>
                                    <td><a href="#" class="alerts-link">Ver detalle</a></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        {{-- Resumen rápido --}}
        <div class="col-xl-5 col-lg-5 mb-5">
            <div class="dash-card">
                <div class="dash-card-header">
                    <div class="dash-card-title">Resumen rápido</div>
                    <div class="dash-card-tag">Hoy</div>
                </div>
                <div class="dash-card-body">
                    <div class="kpi-grid">
                        <div class="kpi-item" style="--kpi-percent: 82%;">
                            <div class="kpi-indicator">
                                <span>82%</span>
                            </div>
                            <div>
                                <div class="kpi-label">Análisis concluidos</div>
                                <div class="kpi-value">148</div>
                            </div>
                        </div>
                        <div class="kpi-item" style="--kpi-percent: 36%;">
                            <div class="kpi-indicator">
                                <span>36</span>
                            </div>
                            <div>
                                <div class="kpi-label">En proceso</div>
                                <div class="kpi-value">36</div>
                            </div>
                        </div>
                        <div class="kpi-item" style="--kpi-percent: 18%;">
                            <div class="kpi-indicator">
                                <span>18</span>
                            </div>
                            <div>
                                <div class="kpi-label">Pendientes por iniciar</div>
                                <div class="kpi-value">18</div>
                            </div>
                        </div>
                        <div class="kpi-item" style="--kpi-percent: 64%;">
                            <div class="kpi-indicator">
                                <span>64%</span>
                            </div>
                            <div>
                                <div class="kpi-label">Planes de acción con seguimiento</div>
                                <div class="kpi-value">64</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- FILA 2 --}}
    <div class="row">
        {{-- Análisis por tipo --}}
        <div class="col-xl-4 col-lg-6 mb-5">
            <div class="dash-card dash-card--types">
                <div class="dash-card-header">
                    <div class="dash-card-title">Análisis por tipo de riesgo</div>
                    <div class="dash-card-tag">Últimos 30 días</div>
                </div>
                <div class="dash-card-body">
                    <div>
                        <div class="risk-type-row">
                            <div class="risk-type-label">
                                <span class="risk-type-dot" style="background:#4f46e5;"></span> Sociales
                            </div>
                            <div class="flex-grow-1 mx-2">
                                <div class="risk-type-bar-wrap">
                                    <div class="risk-type-bar" style="--risk-percent: 72%; background:linear-gradient(90deg,#4f46e5,#a855f7);"></div>
                                </div>
                            </div>
                            <div class="risk-type-count">72</div>
                        </div>
                        <div class="risk-type-row">
                            <div class="risk-type-label">
                                <span class="risk-type-dot" style="background:#059669;"></span> Tecnológicos
                            </div>
                            <div class="flex-grow-1 mx-2">
                                <div class="risk-type-bar-wrap">
                                    <div class="risk-type-bar" style="--risk-percent: 54%; background:linear-gradient(90deg,#059669,#22c55e);"></div>
                                </div>
                            </div>
                            <div class="risk-type-count">54</div>
                        </div>
                        <div class="risk-type-row">
                            <div class="risk-type-label">
                                <span class="risk-type-dot" style="background:#f97316;"></span> Naturales
                            </div>
                            <div class="flex-grow-1 mx-2">
                                <div class="risk-type-bar-wrap">
                                    <div class="risk-type-bar" style="--risk-percent: 38%; background:linear-gradient(90deg,#f97316,#ef4444);"></div>
                                </div>
                            </div>
                            <div class="risk-type-count">38</div>
                        </div>
                        <div class="risk-type-row">
                            <div class="risk-type-label">
                                <span class="risk-type-dot" style="background:#6b7280;"></span> Otros
                            </div>
                            <div class="flex-grow-1 mx-2">
                                <div class="risk-type-bar-wrap">
                                    <div class="risk-type-bar" style="--risk-percent: 26%; background:linear-gradient(90deg,#6b7280,#9ca3af);"></div>
                                </div>
                            </div>
                            <div class="risk-type-count">26</div>
                        </div>
                    </div>

                    <div class="risk-type-summary">
                                <span>Sociales 38%</span>
                                <span>Tecnológicos 28%</span>
                                <span>Naturales 20%</span>
                                <span>Otros 14%</span>
                            </div>

                    <div class="risk-type-footer">
                        <div>
                            <div>Total análisis: <strong>190</strong></div>
                            
                        </div>
                        <span>Actualizado al día de hoy</span>
                    </div>
                </div>
            </div>
        </div>

        {{-- Planes de acción --}}
        <div class="col-xl-4 col-lg-6 mb-5">
            <div class="dash-card">
                <div class="dash-card-header">
                    <div class="dash-card-title">Planes de acción</div>
                    <div class="dash-card-tag">Seguimiento operativo</div>
                </div>
                <div class="dash-card-body">
                    <div class="plan-chip">
                        <span><span class="dot" style="--bg:#22c55e;"></span> Ejecutados en tiempo</span>
                        <strong>46</strong>
                    </div>
                    <div class="plan-chip">
                        <span><span class="dot" style="--bg:#facc15;"></span> En curso</span>
                        <strong>29</strong>
                    </div>
                    <div class="plan-chip">
                        <span><span class="dot" style="--bg:#fb923c;"></span> Con retraso</span>
                        <strong>12</strong>
                    </div>
                    <div class="plan-chip">
                        <span><span class="dot" style="--bg:#ef4444;"></span> Sin iniciar</span>
                        <strong>7</strong>
                    </div>

                    <hr class="my-3">

                    <div style="font-size:.8rem; color:var(--muted); margin-bottom:.25rem;">
                        Porcentaje de controles asegurados
                    </div>
                    <div class="risk-type-bar-wrap mb-1" style="height:11px;">
                        <div class="risk-type-bar" style="--risk-percent:68%; background:linear-gradient(90deg,var(--camel),var(--camel-700));"></div>
                    </div>
                    <div class="d-flex justify-content-between" style="font-size:.8rem; color:var(--muted);">
                        <span>Objetivo: 80%</span>
                        <span><strong>68%</strong> actual</span>
                    </div>
                </div>
            </div>
        </div>

        {{-- Evolución mensual --}}
        <div class="col-xl-4 col-lg-12 mb-5">
            <div class="dash-card dash-card--line">
                <div class="dash-card-header">
                    <div class="dash-card-title">Evolución mensual de análisis</div>
                    <div class="dash-card-tag">Últimos 6 meses</div>
                </div>
                <div class="dash-card-body">
                    <canvas id="evolucionChart"></canvas>
                </div>
            </div>
        </div>
    </div>

    {{-- FILA 3 --}}
    <div class="row">
        {{-- Criticidad --}}
        <div class="col-xl-4 col-lg-6 mb-5">
            <div class="dash-card dash-card--donut">
                <div class="dash-card-header">
                    <div class="dash-card-title">Distribución por nivel de criticidad</div>
                    <div class="dash-card-tag">Matriz general</div>
                </div>
                <div class="dash-card-body">
                    <div class="donut-wrapper">
                        <canvas id="criticidadChart"></canvas>
                        <div class="donut-center-text">
                            <span>Total análisis</span>
                            <strong>190</strong>
                        </div>
                    </div>
                    <div class="donut-legend">
                        <div class="donut-pill">
                            <span class="dot" style="--bg:#e5e7eb;"></span> Muy bajo (8)
                        </div>
                        <div class="donut-pill">
                            <span class="dot" style="--bg:#bbf7d0;"></span> Bajo (24)
                        </div>
                        <div class="donut-pill">
                            <span class="dot" style="--bg:#fde68a;"></span> Medio (36)
                        </div>
                        <div class="donut-pill">
                            <span class="dot" style="--bg:#fed7aa;"></span> Alto (18)
                        </div>
                        <div class="donut-pill">
                            <span class="dot" style="--bg:#fecaca;"></span> Muy alto (14)
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- Cumpleaños del mes --}}
        <div class="col-xl-4 col-lg-6 mb-5">
            <div class="dash-card">
                <div class="dash-card-header">
                    <div class="dash-card-title">Cumpleaños del mes</div>
                    <div class="dash-card-tag">Equipo clave</div>
                </div>
                <div class="dash-card-body">
                    <div class="birthday-item">
                        <div class="birthday-left">
                            <div class="birthday-avatar">AL</div>
                            <div>
                                <div class="birthday-name">Ana López</div>
                                <div class="birthday-role">Coordinadora de riesgos</div>
                            </div>
                        </div>
                        <div class="birthday-date">03 Dic</div>
                    </div>
                    <div class="birthday-item">
                        <div class="birthday-left">
                            <div class="birthday-avatar">JR</div>
                            <div>
                                <div class="birthday-name">José Ramírez</div>
                                <div class="birthday-role">Analista social</div>
                            </div>
                        </div>
                        <div class="birthday-date">11 Dic</div>
                    </div>
                    <div class="birthday-item">
                        <div class="birthday-left">
                            <div class="birthday-avatar">MC</div>
                            <div>
                                <div class="birthday-name">Mariana Cruz</div>
                                <div class="birthday-role">Analista tecnológico</div>
                            </div>
                        </div>
                        <div class="birthday-date">21 Dic</div>
                    </div>
                </div>
            </div>
        </div>

        {{-- Calendario --}}
        <div class="col-xl-4 col-lg-12 mb-5">
            <div class="dash-card">
                <div class="dash-card-header">
                    <div class="dash-card-title">Calendario</div>
                    <div class="dash-card-tag">Vista mensual</div>
                </div>
                <div class="dash-card-body">
                    <div class="calendar-wrapper">
                        <div class="calendar-header">
                            <button class="calendar-nav-btn" id="calPrev">&lsaquo;</button>
                            <div id="calMonthLabel"></div>
                            <button class="calendar-nav-btn" id="calNext">&rsaquo;</button>
                        </div>
                        <div class="calendar-grid" id="calendarGrid">
                            <!-- se llena por JS -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function () {
    // Config global Chart.js
    if (typeof Chart !== 'undefined') {
        Chart.defaults.font.family = '"Poppins", system-ui, -apple-system, BlinkMacSystemFont, "Segoe UI", sans-serif';
        Chart.defaults.color = '#4b5563';
    }

    // Donut criticidad
    const criticidadCtx = document.getElementById('criticidadChart');
    if (criticidadCtx && typeof Chart !== 'undefined') {
        new Chart(criticidadCtx.getContext('2d'), {
            type: 'doughnut',
            data: {
                labels: ['Muy bajo', 'Bajo', 'Medio', 'Alto', 'Muy alto'],
                datasets: [{
                    data: [8, 24, 36, 18, 14],
                    backgroundColor: [
                        '#e5e7eb',
                        '#bbf7d0',
                        '#fde68a',
                        '#fed7aa',
                        '#fecaca'
                    ],
                    borderWidth: 0
                }]
            },
            options: {
                plugins: {
                    legend: { display: false }
                },
                cutout: '72%',
                maintainAspectRatio: false
            }
        });
    }

    // Línea evolución mensual
    const evoCtx = document.getElementById('evolucionChart');
    if (evoCtx && typeof Chart !== 'undefined') {
        new Chart(evoCtx.getContext('2d'), {
            type: 'line',
            data: {
                labels: ['Jul', 'Ago', 'Sep', 'Oct', 'Nov', 'Dic'],
                datasets: [
                    {
                        label: 'Análisis concluidos',
                        data: [18, 24, 30, 28, 34, 39],
                        tension: 0.35,
                        borderColor: '#C2A476',
                        backgroundColor: 'rgba(194,164,118,0.25)',
                        fill: true,
                        pointRadius: 3,
                        pointHoverRadius: 4
                    },
                    {
                        label: 'Nuevos riesgos',
                        data: [10, 14, 16, 19, 17, 21],
                        tension: 0.35,
                        borderColor: '#6b7280',
                        backgroundColor: 'rgba(148,163,184,0.2)',
                        fill: true,
                        pointRadius: 3,
                        pointHoverRadius: 4
                    }
                ]
            },
            options: {
                plugins: {
                    legend: { display: false }
                },
                maintainAspectRatio: false,
                scales: {
                    x: {
                        grid: { display: false }
                    },
                    y: {
                        beginAtZero: true,
                        grid: { color: 'rgba(148,163,184,.25)' },
                        ticks: { stepSize: 10 }
                    }
                }
            }
        });
    }

    // Calendario simple
    const grid  = document.getElementById('calendarGrid');
    const label = document.getElementById('calMonthLabel');
    const btnPrev = document.getElementById('calPrev');
    const btnNext = document.getElementById('calNext');

    if (grid && label && btnPrev && btnNext) {
        let current = new Date();

        const dayNames = ['L', 'M', 'M', 'J', 'V', 'S', 'D'];
        function renderCalendar() {
            grid.innerHTML = '';
            // cabecera días
            dayNames.forEach(d => {
                const el = document.createElement('div');
                el.className = 'calendar-day-name';
                el.textContent = d;
                grid.appendChild(el);
            });

            const year  = current.getFullYear();
            const month = current.getMonth();
            const first = new Date(year, month, 1);
            const last  = new Date(year, month + 1, 0);
            const startDay = (first.getDay() + 6) % 7; // Lunes = 0

            label.textContent = first.toLocaleDateString('es-MX', {
                month: 'long',
                year: 'numeric'
            });

            // días previos
            for (let i = 0; i < startDay; i++) {
                const cell = document.createElement('div');
                cell.className = 'calendar-cell calendar-cell--muted';
                cell.textContent = '';
                grid.appendChild(cell);
            }

            const today = new Date();
            for (let d = 1; d <= last.getDate(); d++) {
                const cellDate = new Date(year, month, d);
                const cell = document.createElement('div');
                cell.className = 'calendar-cell';
                cell.textContent = d;

                if (today.toDateString() === cellDate.toDateString()) {
                    cell.classList.add('calendar-cell--today');
                }

                grid.appendChild(cell);
            }
        }

        btnPrev.addEventListener('click', () => {
            current.setMonth(current.getMonth() - 1);
            renderCalendar();
        });
        btnNext.addEventListener('click', () => {
            current.setMonth(current.getMonth() + 1);
            renderCalendar();
        });

        renderCalendar();
    }
});
</script>
@endpush

@endsection
