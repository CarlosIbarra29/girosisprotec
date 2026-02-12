@extends('layouts.app')

@section('title')
    Parámetros 
@endsection

@push('scripts')
    <script src="{{ asset('js/riesgosocial/crearriesgosocial.js') }}"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
@endpush

@push('styles')
  <link href="{{ asset('/css/version2/tablesgen2.css?v=1.1.3') }}" rel="stylesheet" type="text/css" />
@endpush


@section('content')

<style type="text/css">
    :root {
        --camel:      #C2A476;
        --camel-soft: #F5F1EA;
        --camel-700:  #9B7C4E;
        --ink:        #121212;
        --paper:      #ffffff;
    }

    .parametros-wrapper {
        padding: 1.5rem 1.5rem 3rem !important;
    }

    .parametros-panel {
        --circle-size: 190px; /* tamaño base de los círculos */

        border-radius: 15px !important;
        background: linear-gradient(135deg, #fdfaf5 0%, #f7f4ee 50%, #ffffff 100%) !important;
        box-shadow: 0 18px 45px rgba(15, 23, 42, 0.06) !important;
        padding: 2.5rem 2rem 3rem !important;
    }

    .parametros-header {
        text-align: center;
        margin-bottom: 1.8rem;
    }

    .parametros-pill {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        padding: .25rem .9rem;
        border-radius: 999px;
        font-size: .75rem;
        letter-spacing: .06em;
        text-transform: uppercase;
        background: rgba(194,164,118,.12);
        color: var(--camel-700);
        margin-bottom: .5rem;
    }

    .parametros-title {
        font-size: 1.5rem !important;
        font-weight: 600 !important;
        color: #111827 !important;
        margin: 0;
    }

    /* Layout triángulo */
    .parametros-triangle {
        display: flex !important;
        flex-direction: column !important;
        align-items: center !important;
        gap: 3rem !important;
    }

    .parametros-row {
        display: flex !important;
        justify-content: center !important;
        align-items: center !important;
        gap: 3.2rem !important;
        flex-wrap: nowrap !important;
    }

    /* Botón circular */
    .parametro-circle {
        width: var(--circle-size) !important;
        height: var(--circle-size) !important;
        border-radius: 999px !important;
        background: radial-gradient(circle at 30% 15%, #ffffff, #faf4ea) !important;
        box-shadow:
            0 24px 50px rgba(0, 0, 0, 0.04),
            0 0 0 1px rgba(0, 0, 0, 0.02) !important;
        position: relative !important;
        overflow: hidden !important;

        display: flex !important;
        align-items: center !important;
        justify-content: center !important;
        text-align: center !important;

        transition: transform .22s ease,
                    box-shadow .22s ease,
                    background .22s ease !important;
        cursor: pointer !important;

        opacity: 0;
    }

    .parametro-circle::before {
        content: "" !important;
        position: absolute !important;
        inset: 0 !important;
        background: radial-gradient(circle at top, rgba(255,255,255,.6), transparent 55%) !important;
        opacity: .9 !important;
        pointer-events: none !important;
    }

    .parametro-circle::after {
        content: "";
        position: absolute;
        inset: 14px;
        border-radius: inherit;
        border: 1px solid rgba(194,164,118,0.20);
        pointer-events: none;
    }

    .parametro-circle:hover {
        transform: translateY(-4px);
        box-shadow:
            0 26px 60px rgba(15,23,42,0.16),
            0 0 0 1px rgba(194,164,118,0.40);
        background: radial-gradient(circle at 30% 15%, #ffffff, #f0e2cf);
    }

    .parametro-link {
        position: relative;
        z-index: 1;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        text-decoration: none;
        color: var(--ink);
        font-weight: 600;
        font-size: 1.02rem;
        line-height: 1.3;
        max-width: 9rem; /* para que los 3 textos rompan de forma similar */
    }

    .parametro-link i {
        font-size: 2.25rem;
        margin-bottom: .8rem;
        color: var(--camel-700);
    }

    .parametro-link span {
        display: block;
    }

    .parametro-link:hover {
        color: var(--camel-700);
    }

    /* Animaciones de entrada */
    .parametro-circle--top    { animation: circleFade 0.8s ease forwards 0.15s; }
    .parametro-circle--left   { animation: circleFade 0.8s ease forwards 0.30s; }
    .parametro-circle--right  { animation: circleFade 0.8s ease forwards 0.45s; }

    @keyframes circleFade {
        from { opacity: 0; transform: translateY(18px); }
        to   { opacity: 1; transform: translateY(0); }
    }

    /* Responsive */
    @media (max-width: 992px) {
        .parametros-panel {
            padding-inline: 1.5rem !important;
        }
        .parametros-row {
            gap: 2.4rem !important;
        }
    }

    @media (max-width: 768px) {
        .parametros-panel {
            padding-inline: 1.2rem !important;
            --circle-size: 170px;  /* mismo tamaño para los 3 en móvil */
        }

        .parametros-triangle {
            gap: 2.1rem !important;
        }

        .parametros-row {
            flex-direction: column !important;
            gap: 2.1rem !important;
        }

        .parametro-link {
            max-width: 100%;
            padding-inline: 1.2rem;
        }
    }
</style>

<div class="d-flex flex-row">
    <!--begin::List-->
    <div class="flex-row-fluid">
        <div class="d-flex flex-column flex-grow-1">
            <!--begin::Row-->
            <div class="row">
                <div class="col-xl-12">
                    <!--begin::Card-->
                    <div class="card card-custom">
                        <div class="card-header">
                            <div class="card-title">
                                <span class="card-icon">
                                    <i class="flaticon2-file text-primary"></i>
                                </span>
                                <h3 class="card-label mb-0">Parámetros</h3>
                            </div>
                        </div>

                        <div class="card-body parametros-wrapper">
                            <div class="parametros-panel">
                                <div class="parametros-header">
                                    <span class="parametros-pill">Módulos base</span>
                                    <h4 class="parametros-title">Selecciona una opción</h4>
                                </div>

                                <div class="parametros-triangle">
                                    <!-- Arriba -->
                                    <div class="parametro-circle parametro-circle--top">
                                        <a href="{{ route('hd.catalogonivelcontrol') }}" class="parametro-link">
                                            <i class="fas fa-shield-alt"></i>
                                            <span>Punto de Control</span>
                                        </a>
                                    </div>

                                    <!-- Abajo izquierda / derecha -->
                                    <div class="parametros-row">
                                        <div class="parametro-circle parametro-circle--left">
                                            <a href="{{ route('libro.listadolibroriesgos') }}" class="parametro-link">
                                                <i class="fas fa-book"></i>
                                                <span>Libro de Riesgos</span>
                                            </a>
                                        </div>

                                        <div class="parametro-circle parametro-circle--right">
                                            <a href="{{ route('analisis.matrizaceptabilidad') }}" class="parametro-link">
                                                <i class="fas fa-table"></i>
                                                <span>Matriz Aceptabilidad</span>
                                            </a>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <!--end::Card body-->
                    </div>
                    <!--end::Card-->
                </div>
            </div>
            <!--end::Row-->
        </div>
    </div>
    <!--end::List-->
</div>

@endsection
