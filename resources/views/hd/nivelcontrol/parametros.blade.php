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
    .oculto{
        display: none;
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
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-lg-12 div_riesgos_sociales">
                                        <h4>Selecciona a una opción.</h4>
                                        
                                    </div>
                                </div><br><br>
                                <div class="row">
								    <div class="col-lg-4">
								        <div class="text-center div_riesgos_sociales mb-4">
								            <a href="{{ route('hd.catalogonivelcontrol') }}" class="btn btn-lg btn-light-primary font-weight-bold shadow-sm mr-2">
								                <i class="fas fa-shield-alt mr-2"></i> Punto de Control
								            </a>
								        </div>
								    </div>

								    <div class="col-lg-4">
								        <div class="text-center div_riesgos_sociales mb-4">
								            <a href="{{ route('libro.listadolibroriesgos') }}" class="btn btn-lg btn-light-primary font-weight-bold shadow-sm mr-2">
								                <i class="fas fa-book mr-2"></i> Libro de Riesgos
								            </a>
								        </div>
								    </div>

								    <div class="col-lg-4">
								        <div class="text-center div_riesgos_sociales mb-4">
								            <a href="{{ route('analisis.matrizaceptabilidad') }}"  class="btn btn-lg btn-light-primary font-weight-bold shadow-sm " >
								                <i class="fas fa-table mr-2"></i> Matriz de Aceptibilidad
								            </a>
								        </div>
								    </div>
<!-- 
                                    <div class="col-lg-4">
                                        <div class="text-center div_riesgos_sociales mb-4">
                                            <a href="{{ route('hd.catalogonivelcontrol') }}"  class="btn btn-lg btn-light-primary font-weight-bold shadow-sm disabled" style="pointer-events: none; opacity: 0.6;">
                                                <i class="fas fa-table mr-2"></i> Matriz de Aceptibilidad
                                            </a>
                                        </div>
                                    </div> -->
								</div>

                            </div>
                        </div>
                        <!--end::Card-->
                        <!--end::Card-->
                    </div>
                </div>
                <!--end::Row-->
            </div>
        </div>
        <!--end::List-->
    </div>

@endsection
