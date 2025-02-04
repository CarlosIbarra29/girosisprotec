@extends('layouts.app')

@section('title')
    Analisis de vulnerabilidad y riesgos
@endsection

@push('scripts')
    <script src="{{ asset('js/riesgosocial/crearriesgosocial.js') }}"></script>
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
                                    <h3 class="card-label">Analisis de vulnerabilidad y riesgos</h3>
                                </div>
                                <div class="card-toolbar">

                                  <a href="{{ route('analisis.analisisnaturalescli', $id_cliente) }}" class="btn btn-light-primary font-weight-bolder mr-3 ml-3">
                                    <i class="la la-arrow-left"></i>Regresar</a>

                                </div>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-lg-6 div_riesgos_sociales">
                                        <h4>Vista previa de riesgos naturales</h4>
                                        <table class="table table-hover table-checkable" id="kdatatable_clientes_inactivos">
                                            <thead>
                                                <tr>
                                                    <th>No.</th>
                                                    {{-- <th class="text-center">Seleccionar</th> --}}
                                                </tr>
                                            </thead>

                                            <tbody>
                                                @foreach($RiesgosNaturales as $unid)
                                                <tr>
                                                    <td>{{ $unid->alcance }}</td>
                                                    <td class="text-center">

                                                    </td>
                                                </tr>
                                                @endforeach
                                            </tbody>

                                        </table>
                                    </div>

                                    <div class="col-lg-6">
                                        <div class="text-center div_riesgos_sociales">
                                            <a href="{{ route('analisis.generaranalisisnaturales', [$id_cliente, $RiesgosNaturales[0]->id, 0, 1]) }}" class="btn btn-light-warning font-weight-bolder mr-3 ml-3">
                                            Crear riesgo natural</a>
                                        </div>

                                        <img src="{{ asset('img/riesgo_nat.jpg') }}" width="400" class="img-responsive">
                                    </div>

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
