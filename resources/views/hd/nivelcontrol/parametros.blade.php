@extends('layouts.app')

@section('title')
    Parámetros 
@endsection

@push('scripts')
    <script src="{{ asset('js/riesgosocial/crearriesgosocial.js') }}"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
@endpush

@section('content')

<style type="text/css">
    .oculto {
        display: none;
    }

    .triangle-container {
        display: flex;
        flex-direction: column;
        align-items: center;
        gap: 50px;
        padding-top: 30px;
        padding-bottom: 30px;
    }

    .triangle-row {
        display: flex;
        justify-content: center;
        gap: 80px;
    }

    .triangle-button {
        width: 300px;
        height: 300px;
        border-radius: 50%;
        font-size: 18px;
        padding: 25px;
        display: flex;
        align-items: center;
        justify-content: center;
        text-align: center;
        box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
        opacity: 0;
        animation: fadeInUp 0.8s ease forwards;
        transition: transform 0.2s ease, box-shadow 0.2s ease;
    }

    .btn-top {
        animation-delay: 0.3s;
    }

    .btn-left {
        animation-delay: 0.6s;
    }

    .btn-right {
        animation-delay: 0.9s;
    }

    @keyframes fadeInUp {
        from {
            opacity: 0;
            transform: translateY(20px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    .triangle-button:hover {
        transform: scale(1.05);
        box-shadow: 0 12px 20px rgba(0, 0, 0, 0.3);
    }

    @media (max-width: 768px) {
        .triangle-container {
            gap: 30px;
        }

        .triangle-row {
            flex-direction: column;
            gap: 20px;
        }

        .triangle-button {
            width: 100%;
            max-width: 280px;
            height: auto;
            border-radius: 20px;
            animation: none !important;
            opacity: 1;
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
                                <h3 class="card-label">Parámetros</h3>
                            </div>
                        </div>
                        
                            <div class="row">
                                <div class="col-lg-12 div_riesgos_sociales">
                                    <h4 class="text-center">Selecciona una opción</h4>
                                </div>
                            </div>

                            <!-- Botones -->
                            <div class="triangle-container">
                            <div class="triangle-button btn-top btn btn-light-primary font-weight-bold">
                                <a href="{{ route('hd.catalogonivelcontrol') }}" class="text-decoration-none text-primary">
                                    <i class="fas fa-shield-alt fa-2x mr-2"></i><br>Punto de Control
                                </a>
                            </div>
                            <div class="triangle-row">
                                <div class="triangle-button btn-left btn btn-light-primary font-weight-bold">
                                    <a href="{{ route('libro.listadolibroriesgos') }}" class="text-decoration-none text-primary">
                                        <i class="fas fa-book fa-2x mr-2"></i><br>Libro de Riesgos
                                    </a>
                                </div>
                                <div class="triangle-button btn-right btn btn-light-primary font-weight-bold">
                                    <a href="{{ route('analisis.matrizaceptabilidad') }}" class="text-decoration-none text-primary">
                                        <i class="fas fa-table fa-2x mr-2"></i><br>Matriz de Aceptabilidad
                                    </a>
                                </div>
                            </div>
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
