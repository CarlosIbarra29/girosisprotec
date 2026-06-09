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
        --camel: #C2A476;
        --camel-soft: #F5F1EA;
        --camel-700: #9B7C4E;
        --camel-800: #7F653F;
        --gold: #D7A73F;
        --gold-soft: #F2C766;
        --ink: #121212;
        --paper: #ffffff;

        --dark-950: #05080d;
        --dark-900: #080d14;
        --dark-850: #0a111b;
        --dark-800: #0d1520;
        --dark-750: #111b29;
        --dark-line: rgba(255,255,255,.09);
        --dark-line-gold: rgba(194,164,118,.22);
    }

    .giro-parametros-card.card.card-custom{
        overflow: hidden;
        border: 1px solid rgba(194,164,118,.22);
        border-radius: 14px;
        background:
            radial-gradient(circle at top center, rgba(194,164,118,.08), transparent 36%),
            linear-gradient(180deg, #0b1119 0%, #05080d 100%);
        box-shadow:
            0 22px 48px rgba(0,0,0,.32),
            inset 0 1px 0 rgba(255,255,255,.035);
    }

    .giro-parametros-card.card.card-custom .card-header{
        min-height: 74px;
        background:
            radial-gradient(circle at top left, rgba(194,164,118,.12), transparent 34%),
            linear-gradient(180deg, #151515 0%, #0c0c0c 100%) !important;
        border-bottom: 2px solid rgba(194,164,118,.78) !important;
    }

    .giro-parametros-card .card-label{
        color: #ffffff !important;
        font-weight: 900;
        letter-spacing: -.025em;
    }

    .giro-parametros-card .card-icon i{
        color: var(--gold-soft) !important;
    }

    .parametros-wrapper{
        padding: 24px 26px 24px !important;
        background:
            radial-gradient(circle at 14% 0%, rgba(215,167,63,.08), transparent 28%),
            radial-gradient(circle at 86% 6%, rgba(255,255,255,.035), transparent 26%),
            linear-gradient(180deg, #090f17 0%, #05080d 100%) !important;
    }

    .parametros-panel{
        position: relative;
        max-width: 1160px;
        margin: 0 auto;
        min-height: 520px;
        border-radius: 18px !important;
        background:
            radial-gradient(circle at top center, rgba(215,167,63,.075), transparent 34%),
            radial-gradient(circle at bottom left, rgba(255,255,255,.035), transparent 30%),
            linear-gradient(180deg, #0f1823 0%, #0a111a 100%) !important;
        border: 1px solid rgba(194,164,118,.20);
        box-shadow:
            inset 0 1px 0 rgba(255,255,255,.04),
            0 18px 34px rgba(0,0,0,.26);
        padding: 34px 28px 38px !important;
        overflow: hidden;
    }

    .parametros-panel::before{
        content: "";
        position: absolute;
        inset: 18px;
        border-radius: 16px;
        border: 1px solid rgba(255,255,255,.045);
        background:
            linear-gradient(180deg, rgba(255,255,255,.018), rgba(255,255,255,.006));
        pointer-events: none;
    }

    .parametros-header{
        position: relative;
        z-index: 1;
        text-align: center;
        margin-bottom: 30px;
    }

    .parametros-pill{
        display: inline-flex;
        align-items: center;
        justify-content: center;
        min-height: 28px;
        padding: 0 14px;
        border-radius: 999px;
        font-size: .72rem;
        line-height: 1;
        letter-spacing: .07em;
        text-transform: uppercase;
        background: rgba(215,167,63,.10);
        color: #f7d886;
        border: 1px solid rgba(215,167,63,.30);
        margin-bottom: 10px;
        font-weight: 800;
    }

    .parametros-title{
        font-size: 1.55rem !important;
        font-weight: 950 !important;
        color: rgba(255,255,255,.94) !important;
        margin: 0;
        letter-spacing: -.03em;
    }

    .parametros-subtitle{
        max-width: 620px;
        margin: 8px auto 0;
        color: rgba(255,255,255,.62);
        font-size: .92rem;
        line-height: 1.45;
    }

    .parametros-grid{
        position: relative;
        z-index: 1;
        display: grid;
        grid-template-columns: repeat(3, minmax(0, 1fr));
        gap: 18px;
        margin-top: 28px;
    }

    .parametro-card{
        position: relative;
        min-height: 210px;
        border-radius: 16px;
        padding: 22px 20px;
        overflow: hidden;
        background:
            radial-gradient(circle at top left, rgba(215,167,63,.12), transparent 38%),
            linear-gradient(180deg, #111b29 0%, #0b121c 100%);
        border: 1px solid rgba(194,164,118,.20);
        box-shadow:
            inset 0 1px 0 rgba(255,255,255,.04),
            0 14px 28px rgba(0,0,0,.22);
        transition:
            transform .22s ease,
            border-color .22s ease,
            box-shadow .22s ease,
            background .22s ease;
        opacity: 0;
    }

    .parametro-card::before{
        content: "";
        position: absolute;
        inset: 0;
        background:
            linear-gradient(90deg, rgba(215,167,63,.10), transparent 42%),
            radial-gradient(circle at top right, rgba(255,255,255,.045), transparent 44%);
        pointer-events: none;
    }

    .parametro-card::after{
        content: "";
        position: absolute;
        left: 20px;
        right: 20px;
        bottom: 0;
        height: 3px;
        border-radius: 999px 999px 0 0;
        background: linear-gradient(90deg, #9c6f1d 0%, #f0c15a 52%, #9c6f1d 100%);
        opacity: .70;
        transition: opacity .22s ease, box-shadow .22s ease;
    }

    .parametro-card:hover{
        transform: translateY(-4px);
        border-color: rgba(215,167,63,.46);
        background:
            radial-gradient(circle at top left, rgba(215,167,63,.18), transparent 42%),
            linear-gradient(180deg, #172231 0%, #101925 100%);
        box-shadow:
            inset 0 1px 0 rgba(255,255,255,.055),
            0 22px 38px rgba(0,0,0,.32),
            0 0 0 1px rgba(215,167,63,.08);
    }

    .parametro-card:hover::after{
        opacity: 1;
        box-shadow: 0 0 18px rgba(240,193,90,.25);
    }

    .parametro-link{
        position: relative;
        z-index: 1;
        height: 100%;
        display: flex;
        flex-direction: column;
        align-items: flex-start;
        justify-content: space-between;
        text-decoration: none !important;
        color: inherit !important;
    }

    .parametro-icon{
        width: 56px;
        height: 56px;
        border-radius: 14px;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        background:
            radial-gradient(circle at top, rgba(255,255,255,.22), transparent 56%),
            linear-gradient(180deg, #d7a73f 0%, #85642b 100%);
        color: #ffffff;
        font-size: 1.65rem;
        box-shadow:
            inset 0 1px 0 rgba(255,255,255,.22),
            0 12px 22px rgba(0,0,0,.24);
    }

    .parametro-content{
        width: 100%;
        margin-top: 22px;
    }

    .parametro-content h5{
        margin: 0 0 8px;
        color: rgba(255,255,255,.94);
        font-size: 1.12rem;
        line-height: 1.1;
        font-weight: 950;
        letter-spacing: -.025em;
    }

    .parametro-content p{
        margin: 0;
        color: rgba(255,255,255,.60);
        font-size: .83rem;
        line-height: 1.42;
    }

    .parametro-action{
        margin-top: 18px;
        display: inline-flex;
        align-items: center;
        gap: 7px;
        color: #f7d886;
        font-size: .78rem;
        font-weight: 900;
        letter-spacing: .01em;
    }

    .parametro-action i{
        font-size: .9rem;
        transition: transform .2s ease;
    }

    .parametro-card:hover .parametro-action i{
        transform: translateX(3px);
    }

    .parametro-card--control{ animation: parametroFade 0.75s ease forwards 0.10s; }
    .parametro-card--libro{ animation: parametroFade 0.75s ease forwards 0.22s; }
    .parametro-card--matriz{ animation: parametroFade 0.75s ease forwards 0.34s; }

    @keyframes parametroFade{
        from{
            opacity: 0;
            transform: translateY(18px);
        }
        to{
            opacity: 1;
            transform: translateY(0);
        }
    }

    .parametros-flow{
        position: relative;
        z-index: 1;
        max-width: 980px;
        margin: 30px auto 0;
        padding: 18px 20px;
        border-radius: 16px;
        display: grid;
        grid-template-columns: repeat(3, minmax(0, 1fr));
        gap: 16px;
        background:
            radial-gradient(circle at top center, rgba(215,167,63,.07), transparent 42%),
            linear-gradient(180deg, rgba(255,255,255,.035), rgba(255,255,255,.012)),
            #080d14;
        border: 1px solid rgba(194,164,118,.18);
        box-shadow:
            inset 0 1px 0 rgba(255,255,255,.04),
            0 14px 28px rgba(0,0,0,.22);
        overflow: hidden;
    }

    .parametros-flow-line{
        position: absolute;
        left: 15%;
        right: 15%;
        top: 45px;
        height: 1px;
        background: linear-gradient(
            90deg,
            transparent 0%,
            rgba(215,167,63,.35) 18%,
            rgba(255,255,255,.12) 50%,
            rgba(215,167,63,.35) 82%,
            transparent 100%
        );
        pointer-events: none;
    }

    .parametros-flow-item{
        position: relative;
        z-index: 1;
        display: flex;
        align-items: flex-start;
        gap: 12px;
        padding: 10px;
        border-radius: 14px;
        transition:
            background .2s ease,
            transform .2s ease;
    }

    .parametros-flow-item:hover{
        transform: translateY(-2px);
        background: rgba(255,255,255,.035);
    }

    .parametros-flow-icon{
        width: 38px;
        min-width: 38px;
        height: 38px;
        border-radius: 12px;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        color: #ffffff;
        font-size: 1rem;
        background:
            radial-gradient(circle at top, rgba(255,255,255,.20), transparent 56%),
            linear-gradient(180deg, #d7a73f 0%, #85642b 100%);
        box-shadow:
            inset 0 1px 0 rgba(255,255,255,.20),
            0 8px 16px rgba(0,0,0,.22);
    }

    .parametros-flow-content{
        min-width: 0;
    }

    .parametros-flow-content strong{
        display: block;
        margin-bottom: 4px;
        color: rgba(255,255,255,.92);
        font-size: .86rem;
        line-height: 1.1;
        font-weight: 950;
    }

    .parametros-flow-content span{
        display: block;
        color: rgba(255,255,255,.58);
        font-size: .76rem;
        line-height: 1.32;
    }

    @media (max-width: 991px){
        .parametros-grid,
        .parametros-flow{
            grid-template-columns: 1fr;
        }

        .parametros-flow-line{
            display: none;
        }

        .parametros-panel{
            min-height: auto;
        }

        .parametro-card{
            min-height: 175px;
        }
    }

    @media (max-width: 768px){
        .parametros-wrapper{
            padding: 16px 14px !important;
        }

        .parametros-panel{
            padding: 22px 16px 24px !important;
        }

        .parametros-title{
            font-size: 1.2rem !important;
        }

        .parametros-subtitle{
            font-size: .82rem;
        }

        .parametro-card{
            padding: 18px 16px;
        }

        .parametro-icon{
            width: 50px;
            height: 50px;
            font-size: 1.35rem;
        }

        .parametro-content h5{
            font-size: 1rem;
        }

        .parametro-content p{
            font-size: .78rem;
        }
    }
</style>

<div class="d-flex flex-row">
    <div class="flex-row-fluid">
        <div class="d-flex flex-column flex-grow-1">
            <div class="row">
                <div class="col-xl-12">

                    <div class="card card-custom giro-parametros-card">
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
                                    <p class="parametros-subtitle">
                                        Administra los catálogos y matrices principales para configurar la evaluación de riesgos.
                                    </p>
                                </div>

                                <div class="parametros-grid">

                                    <div class="parametro-card parametro-card--control">
                                        <a href="{{ route('hd.catalogonivelcontrol') }}" class="parametro-link">
                                            <div>
                                                <div class="parametro-icon">
                                                    <i class="fas fa-shield-alt"></i>
                                                </div>

                                                <div class="parametro-content">
                                                    <h5>Punto de Control</h5>
                                                    <p>
                                                        Gestiona los niveles de control,  exposición y detalles para un calculo exitoso.
                                                    </p>
                                                </div>
                                            </div>

                                            <span class="parametro-action">
                                                Abrir módulo <i class="fas fa-arrow-right"></i>
                                            </span>
                                        </a>
                                    </div>

                                    <div class="parametro-card parametro-card--libro">
                                        <a href="{{ route('libro.listadolibroriesgos') }}" class="parametro-link">
                                            <div>
                                                <div class="parametro-icon">
                                                    <i class="fas fa-book"></i>
                                                </div>

                                                <div class="parametro-content">
                                                    <h5>Libro de Riesgos</h5>
                                                    <p>
                                                        Consulta y administra los puntos normativos para la identificación de riesgos.
                                                    </p>
                                                </div>
                                            </div>

                                            <span class="parametro-action">
                                                Abrir módulo <i class="fas fa-arrow-right"></i>
                                            </span>
                                        </a>
                                    </div>

                                    <div class="parametro-card parametro-card--matriz">
                                        <a href="{{ route('analisis.matrizaceptabilidad') }}" class="parametro-link">
                                            <div>
                                                <div class="parametro-icon">
                                                    <i class="fas fa-table"></i>
                                                </div>

                                                <div class="parametro-content">
                                                    <h5>Matriz de Aceptabilidad</h5>
                                                    <p>
                                                        Visualiza los rangos de amenaza, impacto y aceptación para clasificar el riesgo.
                                                    </p>
                                                </div>
                                            </div>

                                            <span class="parametro-action">
                                                Abrir módulo <i class="fas fa-arrow-right"></i>
                                            </span>
                                        </a>
                                    </div>

                                </div>

                                <div class="parametros-flow">
                                    <!-- <div class="parametros-flow-line"></div> -->

                                    <div class="parametros-flow-item">
                                        <div class="parametros-flow-icon">
                                            <i class="fas fa-sliders"></i>
                                        </div>
                                        <div class="parametros-flow-content">
                                            <strong>1. Configura</strong>
                                            <span>Define controles, exposición y parámetros base.</span>
                                        </div>
                                    </div>

                                    <div class="parametros-flow-item">
                                        <div class="parametros-flow-icon">
                                            <i class="fas fa-book-open"></i>
                                        </div>
                                        <div class="parametros-flow-content">
                                            <strong>2. Consulta</strong>
                                            <span>Revisa puntos normativos y riesgos registrados.</span>
                                        </div>
                                    </div>

                                    <div class="parametros-flow-item">
                                        <div class="parametros-flow-icon">
                                            <i class="fas fa-chart-simple"></i>
                                        </div>
                                        <div class="parametros-flow-content">
                                            <strong>3. Evalúa</strong>
                                            <span>Usa la matriz para clasificar el nivel de riesgo.</span>
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

@endsection