@extends('layouts.app')

@section('title')
    Dashboard Análisis de riesgos
@endsection

@push('scripts')
    <script src="{{ asset('js/tablero/Notificaciones.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
@endpush

@push('styles')
  <link href="{{ asset('/css/version2/tablero.css?v=1.0.5') }}" rel="stylesheet" type="text/css" />
@endpush

@section('content')

@php
    $totalDash = max((int)($dashStats['total'] ?? 0), 1);

    $pctMuyAlto = round((($riskCounts['muy_alto'] ?? 0) / $totalDash) * 100, 1);
    $pctAlto = round((($riskCounts['alto'] ?? 0) / $totalDash) * 100, 1);
    $pctMedio = round((($riskCounts['medio'] ?? 0) / $totalDash) * 100, 1);
    $pctBajo = round((($riskCounts['bajo'] ?? 0) / $totalDash) * 100, 1);
    $pctMuyBajo = round((($riskCounts['muy_bajo'] ?? 0) / $totalDash) * 100, 1);

    $riesgosCriticos = ($riskCounts['muy_alto'] ?? 0) + ($riskCounts['alto'] ?? 0);
    $pctCriticos = round(($riesgosCriticos / $totalDash) * 100, 1);
@endphp

<div class="dashboard-shell dashboard-shell--dark">

    <div class="dashboard-topbar">
        <div>
            <div class="dashboard-eyebrow">¡Hola, {{ auth()->user()->name ?? 'ADMIN' }}!</div>
            <h1 class="dashboard-title">Dashboard Análisis de riesgos</h1>
            <p class="dashboard-subtitle">
                Gestiona y monitorea el comportamiento general de los análisis de riesgo social.
            </p>
        </div>

        <div class="dashboard-actions">
            <a href="{{ route('cliente.nuevocliente') }}" class="dashboard-btn dashboard-btn--primary">
                <i class="la la-plus"  style="color: #000;"></i>
                Nuevo Análisis de Riesgo
            </a>
        </div>
    </div>

    {{-- KPIS --}}
    <div class="dashboard-kpi-row">
        <div class="risk-kpi-card risk-kpi-card--total">
            <div class="risk-kpi-icon">
                <i class="la la-file-text"></i>
            </div>
            <div>
                <span>Análisis totales</span>
                <strong>{{ $dashStats['total'] ?? 0 }}</strong>
                <small>Todos los análisis registrados</small>
            </div>
        </div>

        <div class="risk-kpi-card risk-kpi-card--muy-alto">
            <div class="risk-kpi-icon">
                <i class="la la-shield"></i>
            </div>
            <div>
                <span>Riesgos muy altos</span>
                <strong>{{ $dashStats['muy_alto'] ?? 0 }}</strong>
                <small>Atención inmediata</small>
            </div>
        </div>

        <div class="risk-kpi-card risk-kpi-card--alto">
            <div class="risk-kpi-icon">
                <i class="la la-warning"></i>
            </div>
            <div>
                <span>Riesgos altos</span>
                <strong>{{ $dashStats['alto'] ?? 0 }}</strong>
                <small>Prioridad operativa</small>
            </div>
        </div>

        <div class="risk-kpi-card risk-kpi-card--medio">
            <div class="risk-kpi-icon">
                <i class="la la-balance-scale"></i>
            </div>
            <div>
                <span>Riesgos medios</span>
                <strong>{{ $dashStats['medio'] ?? 0 }}</strong>
                <small>Seguimiento preventivo</small>
            </div>
        </div>

        <div class="risk-kpi-card risk-kpi-card--bajo">
            <div class="risk-kpi-icon">
                <i class="la la-check-circle"></i>
            </div>
            <div>
                <span>Riesgos bajos</span>
                <strong>{{ $dashStats['bajo'] ?? 0 }}</strong>
                <small>Controlados</small>
            </div>
        </div>

        <div class="risk-kpi-card risk-kpi-card--muy-bajo">
            <div class="risk-kpi-icon">
                <i class="la la-leaf"></i>
            </div>
            <div>
                <span>Riesgos muy bajos</span>
                <strong>{{ $dashStats['muy_bajo'] ?? 0 }}</strong>
                <small>Aceptables</small>
            </div>
        </div>
    </div>

    {{-- MAIN GRID --}}
    <div class="dashboard-main-grid">

        {{-- DISTRIBUCIÓN --}}
        <div class="dash-card dash-card--distribution">
            <div class="dash-card-header">
                <div>
                    <h3>Distribución de riesgos por nivel</h3>
                    <span>Matriz general de criticidad</span>
                </div>
            </div>

            <div class="dash-card-body">
                <div class="risk-distribution-layout">
                    <div class="risk-donut-wrap">
                        <canvas id="riskDonutChart"></canvas>
                        <div class="risk-donut-center">
                            <strong>{{ $dashStats['total'] ?? 0 }}</strong>
                            <span>Total</span>
                        </div>
                    </div>

                    <div class="risk-donut-legend">
                        <div class="risk-legend-row risk-legend-row--muy-alto">
                            <span><i></i> Muy Alto</span>
                            <strong>{{ $riskCounts['muy_alto'] ?? 0 }}</strong>
                        </div>
                        <div class="risk-legend-row risk-legend-row--alto">
                            <span><i></i> Alto</span>
                            <strong>{{ $riskCounts['alto'] ?? 0 }}</strong>
                        </div>
                        <div class="risk-legend-row risk-legend-row--medio">
                            <span><i></i> Medio</span>
                            <strong>{{ $riskCounts['medio'] ?? 0 }}</strong>
                        </div>
                        <div class="risk-legend-row risk-legend-row--bajo">
                            <span><i></i> Bajo</span>
                            <strong>{{ $riskCounts['bajo'] ?? 0 }}</strong>
                        </div>
                        <div class="risk-legend-row risk-legend-row--muy-bajo">
                            <span><i></i> Muy Bajo</span>
                            <strong>{{ $riskCounts['muy_bajo'] ?? 0 }}</strong>
                        </div>
                    </div>
                </div>

                <div class="dashboard-insight-box">
                    <div>
                        <span>Riesgos no aceptables</span>
                        <strong>{{ $dashStats['no_aceptables'] ?? 0 }}</strong>
                    </div>
                    <div>
                        <span>Riesgos aceptables</span>
                        <strong>{{ $dashStats['aceptables'] ?? 0 }}</strong>
                    </div>
                </div>
            </div>
        </div>

        {{-- ANÁLISIS RECIENTES --}}
        <div class="dash-card dash-card--recent">
            <div class="dash-card-header">
                <div>
                    <h3>Análisis recientes</h3>
                    <span>Últimos registros capturados</span>
                </div>
            </div>

            <div class="dash-card-body">
                <div class="recent-list">
                    @forelse($recentAnalyses as $item)
                        <a href="{{ $item['cliente_id'] ? route('analisis.analisiscliente', $item['cliente_id']) : 'javascript:void(0)' }}"
                           class="recent-analysis-item">
                            <div class="recent-analysis-icon recent-analysis-icon--{{ $item['tipo_class'] }}">
                                <i class="la la-file-text"></i>
                            </div>

                            <div class="recent-analysis-content">
                                <strong>{{ $item['cliente'] }}</strong>
                                <span>{{ $item['tipo'] }} · {{ $item['fecha'] }}</span>
                                <small>{{ Str::limit($item['evento'], 78) }}</small>
                            </div>

                            <div class="recent-analysis-right">
                                <span class="risk-badge risk-badge--{{ $item['nivel_key'] }}">
                                    {{ $item['nivel'] }}
                                </span>
                                <em>{{ $item['hace'] }}</em>
                            </div>
                        </a>
                    @empty
                        <div class="empty-state">
                            <i class="la la-folder-open"></i>
                            <span>No hay análisis recientes</span>
                        </div>
                    @endforelse
                </div>
            </div>
        </div>

        {{-- ACTIVIDAD --}}
        <div class="dash-card dash-card--activity">
            <div class="dash-card-header">
                <div>
                    <h3>Actividad reciente</h3>
                    <span>Movimientos del sistema</span>
                </div>
            </div>

            <div class="dash-card-body">
                <div class="activity-list">
                    @forelse($recentActivity as $activity)
                        <div class="activity-item">
                            <div class="activity-icon activity-icon--{{ $activity['tipo_class'] }}">
                                <i class="la la-history"></i>
                            </div>
                            <div>
                                <strong>{{ $activity['text'] }}</strong>
                                <span>{{ $activity['subtext'] }}</span>
                            </div>
                            <em>{{ $activity['hace'] }}</em>
                        </div>
                    @empty
                        <div class="empty-state">
                            <i class="la la-bell-slash"></i>
                            <span>Sin actividad reciente</span>
                        </div>
                    @endforelse
                </div>
            </div>
        </div>

        {{-- SEMÁFORO OPERATIVO --}}
        <div class="dash-card dash-card--priority">
            <div class="dash-card-header">
                <div>
                    <h3>Semáforo operativo</h3>
                    <span>Prioridad de atención social</span>
                </div>
            </div>

            <div class="dash-card-body">
                <div class="priority-hero">
                    <div class="priority-ring" style="--priority-percent: {{ $pctCriticos }}%;">
                        <span>{{ $pctCriticos }}%</span>
                    </div>

                    <div class="priority-copy">
                        <strong>{{ $riesgosCriticos }}</strong>
                        <span>riesgos críticos</span>
                        <small>Muy altos y altos que requieren seguimiento prioritario.</small>
                    </div>
                </div>

                <div class="priority-bars">
                    <div class="priority-row priority-row--muy-alto">
                        <div><i></i> Muy Alto</div>
                        <span>{{ $riskCounts['muy_alto'] ?? 0 }}</span>
                        <b><em style="width: {{ $pctMuyAlto }}%;"></em></b>
                    </div>

                    <div class="priority-row priority-row--alto">
                        <div><i></i> Alto</div>
                        <span>{{ $riskCounts['alto'] ?? 0 }}</span>
                        <b><em style="width: {{ $pctAlto }}%;"></em></b>
                    </div>

                    <div class="priority-row priority-row--medio">
                        <div><i></i> Medio</div>
                        <span>{{ $riskCounts['medio'] ?? 0 }}</span>
                        <b><em style="width: {{ $pctMedio }}%;"></em></b>
                    </div>

                    <div class="priority-row priority-row--bajo">
                        <div><i></i> Bajo</div>
                        <span>{{ $riskCounts['bajo'] ?? 0 }}</span>
                        <b><em style="width: {{ $pctBajo }}%;"></em></b>
                    </div>

                    <div class="priority-row priority-row--muy-bajo">
                        <div><i></i> Muy Bajo</div>
                        <span>{{ $riskCounts['muy_bajo'] ?? 0 }}</span>
                        <b><em style="width: {{ $pctMuyBajo }}%;"></em></b>
                    </div>
                </div>
            </div>
        </div>

        {{-- EVOLUCIÓN --}}
        <div class="dash-card dash-card--evolution">
            <div class="dash-card-header">
                <div>
                    <h3>Evolución mensual</h3>
                    <span>Últimos 6 meses</span>
                </div>
            </div>

            <div class="dash-card-body">
                <canvas id="monthlyRiskChart"></canvas>
            </div>
        </div>

        {{-- ACCIONES RÁPIDAS --}}
        <div class="dash-card dash-card--quick">
            <div class="dash-card-header">
                <div>
                    <h3>Acciones rápidas</h3>
                    <span>Atajos operativos</span>
                </div>
            </div>

            <div class="dash-card-body">
                <div class="quick-actions-grid">
                    <a href="{{ route('cliente.nuevocliente') }}" class="quick-action-card">
                        <i class="la la-plus-circle"></i>
                        <strong>Nuevo Análisis</strong>
                        <span>Crear análisis</span>
                    </a>

                    <a href="{{ route('cliente.agregarcliente') }}" class="quick-action-card">
                        <i class="la la-users"></i>
                        <strong>Nuevo Cliente</strong>
                        <span>Registrar cliente</span>
                    </a>

                    <a href="{{ route('cliente.listadocliente') }}" class="quick-action-card">
                        <i class="la la-list"></i>
                        <strong>Mis Clientes</strong>
                        <span>Ver clientes</span>
                    </a>

                    <a href="{{ route('hd.parametros') }}" class="quick-action-card">
                        <i class="la la-cog"></i>
                        <strong>Parámetros</strong>
                        <span>Configurar sistema</span>
                    </a>
                </div>
            </div>
        </div>

        {{-- CLIENTES --}}
        <div class="dash-card dash-card--clients">
            <div class="dash-card-header">
                <div>
                    <h3>Clientes registrados</h3>
                    <span>Resumen operativo</span>
                </div>

                <a href="{{ route('cliente.listadocliente') }}" class="dash-header-link">
                    Ver todos mis clientes
                    <i class="la la-arrow-right"></i>
                </a>
            </div>

            <div class="dash-card-body">
                <div class="client-table-wrap">
                    <table class="client-table">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Nombre comercial</th>
                                <th>Razón social</th>
                                <th>Contacto</th>
                                <th>Teléfono</th>
                                <th>Email</th>
                                <th>Análisis</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($clientesPreview as $clienteRow)
                                <tr>
                                    <td>{{ $clienteRow['no'] }}</td>
                                    <td>{{ $clienteRow['nombre'] }}</td>
                                    <td>{{ $clienteRow['razon_social'] }}</td>
                                    <td>{{ $clienteRow['contacto'] }}</td>
                                    <td>{{ $clienteRow['telefono'] }}</td>
                                    <td>{{ $clienteRow['email'] }}</td>
                                    <td>
                                        <span class="client-count-pill">
                                            {{ $clienteRow['analisis'] }}
                                        </span>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="7" class="text-center">No hay clientes registrados</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                <div class="client-table-footer">
                    <span>Mostrando clientes principales</span>
                    <strong>{{ $dashStats['clientes'] ?? 0 }} clientes registrados</strong>
                </div>
            </div>
        </div>

    </div>
</div>

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function () {
    if (typeof Chart === 'undefined') return;

    Chart.defaults.font.family = '"Poppins", system-ui, -apple-system, BlinkMacSystemFont, "Segoe UI", sans-serif';
    Chart.defaults.color = 'rgba(255,255,255,.70)';

    const riskCounts = @json($riskCounts ?? []);
    const monthlyEvolution = @json($monthlyEvolution ?? []);

    const riskDonut = document.getElementById('riskDonutChart');

    if (riskDonut) {
        new Chart(riskDonut.getContext('2d'), {
            type: 'doughnut',
            data: {
                labels: ['Muy Alto', 'Alto', 'Medio', 'Bajo', 'Muy Bajo'],
                datasets: [{
                    data: [
                        riskCounts.muy_alto || 0,
                        riskCounts.alto || 0,
                        riskCounts.medio || 0,
                        riskCounts.bajo || 0,
                        riskCounts.muy_bajo || 0
                    ],
                    backgroundColor: [
                        '#ef1d1d',
                        '#f97316',
                        '#facc15',
                        '#22c55e',
                        '#86efac'
                    ],
                    borderColor: '#11161d',
                    borderWidth: 4,
                    hoverOffset: 8
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                cutout: '72%',
                plugins: {
                    legend: { display: false },
                    tooltip: {
                        backgroundColor: 'rgba(8,13,20,.96)',
                        titleColor: '#fff',
                        bodyColor: '#fff',
                        borderColor: 'rgba(194,164,118,.25)',
                        borderWidth: 1
                    }
                }
            }
        });
    }

    const monthlyChart = document.getElementById('monthlyRiskChart');

    if (monthlyChart) {
        new Chart(monthlyChart.getContext('2d'), {
            type: 'line',
            data: {
                labels: monthlyEvolution.map(row => row.label),
                datasets: [
                    {
                        label: 'Análisis registrados',
                        data: monthlyEvolution.map(row => row.total),
                        tension: 0.35,
                        borderColor: '#D7A73F',
                        backgroundColor: 'rgba(215,167,63,.16)',
                        fill: true,
                        pointRadius: 4,
                        pointHoverRadius: 6,
                        pointBackgroundColor: '#D7A73F',
                        pointBorderColor: '#0b1119',
                        borderWidth: 3
                    },
                    {
                        label: 'Riesgos altos / muy altos',
                        data: monthlyEvolution.map(row => row.criticos),
                        tension: 0.35,
                        borderColor: '#ef4444',
                        backgroundColor: 'rgba(239,68,68,.10)',
                        fill: true,
                        pointRadius: 4,
                        pointHoverRadius: 6,
                        pointBackgroundColor: '#ef4444',
                        pointBorderColor: '#0b1119',
                        borderWidth: 3
                    }
                ]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                interaction: {
                    mode: 'index',
                    intersect: false
                },
                plugins: {
                    legend: {
                        display: true,
                        position: 'bottom',
                        labels: {
                            color: 'rgba(255,255,255,.72)',
                            usePointStyle: true,
                            boxWidth: 8,
                            font: {
                                weight: '700'
                            }
                        }
                    },
                    tooltip: {
                        backgroundColor: 'rgba(8,13,20,.96)',
                        titleColor: '#fff',
                        bodyColor: '#fff',
                        borderColor: 'rgba(194,164,118,.25)',
                        borderWidth: 1
                    }
                },
                scales: {
                    x: {
                        grid: { display: false },
                        ticks: {
                            color: 'rgba(255,255,255,.62)',
                            font: { weight: '700' }
                        }
                    },
                    y: {
                        beginAtZero: true,
                        grid: {
                            color: 'rgba(255,255,255,.075)',
                            borderDash: [4, 4]
                        },
                        ticks: {
                            precision: 0,
                            color: 'rgba(255,255,255,.62)',
                            font: { weight: '700' }
                        }
                    }
                }
            }
        });
    }
});
</script>
@endpush

@endsection