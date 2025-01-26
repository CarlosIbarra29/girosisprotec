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

                                  <a href="{{ route('analisis.analisiscliente', $id_cliente) }}" class="btn btn-light-primary font-weight-bolder mr-3 ml-3">
                                    <i class="la la-arrow-left"></i>Regresar</a>

                                </div>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-lg-3">
                                        <button id="btn_riesgo_social" class="btn btn-light-warning font-weight-bolder mr-3 ml-3">
                                        Riesgos sociales</button>
                                    </div>

                                    <div class="col-lg-3">
                                        <button id="btn_riesgo_tecnologico" class="btn btn-light-warning font-weight-bolder mr-3 ml-3">
                                        Riesgos tecnológicos</button>
                                    </div>

                                    <div class="col-lg-3">
                                        <button id="btn_riesgo_natural" class="btn btn-light-warning font-weight-bolder mr-3 ml-3">
                                        Riesgos naturales</button>
                                    </div>

                                    <div class="col-lg-3">
                                        <button id="btn_riesgo_otro" class="btn btn-light-warning font-weight-bolder mr-3 ml-3">
                                        Otros riesgos</button>
                                    </div>
                                </div>


                                <div class="card card-custom gutter-b">
                                    <div class="card-header">
                                        <div class="card-title">
                                        </div>
                                    </div>
                                    <div class="card-body">

                                        <div class="row mt-4">
                                            <div class="col-lg-6 div_riesgos_sociales">
                                                <h4>Vista previa de riesgos sociales</h4>
                                                <table class="table table-hover table-checkable" id="kdatatable_clientes_inactivos">
                                                    <thead>
                                                    <tr>
                                                      <th>No.</th>
                                                      <th class="text-center">Seleccionar</th>
                                                    </tr>
                                                    </thead>

                                                    <tbody>
                                                      @foreach($BarrerasPerimetrale as $unid)
                                                        <tr>
                                                          <td>{{ $unid->alcance }}</td>
                                                          <td class="text-center">

                                                          </td>
                                                        </tr>
                                                      @endforeach
                                                    </tbody>

                                                </table>
                                            </div>
                                             {{-- ______________________________________________________________________________________________________________________ END  Riesgos Sociales --}}

                                            <div class="col-lg-6 div_riesgos_tecnologicos oculto">
                                                <h4>Vista previa de riesgos tecnológicos</h4>
                                                <table class="table table-hover table-checkable" id="kdatatable_clientes_inactivos">
                                                    <thead>
                                                    <tr>
                                                      <th>No.</th>
                                                      <th class="text-center">Acciones</th>
                                                    </tr>
                                                    </thead>

                                                    <tbody>
                                                      @foreach($ConceptosTecnologicos as $unid)
                                                        <tr>
                                                          <td>{{ $unid->alcance }}</td>
                                                          <td class="text-center">
                                                            {{-- <a href="{{ route('analisis.analisiscliente', $unid->id ) }}" class="btn btn-clean btn-icon btn-outline-success mt-1" data-id="{{ $unid->id }}" data-nombre="{{ $unid->organizacion }}" data-toggle="tooltip" data-theme="dark" title="Detalle de analisis del Cliente" ><i class="flaticon-eye"></i></a> --}}
                                                          </td>
                                                        </tr>
                                                      @endforeach
                                                    </tbody>

                                                </table>
                                            </div>
                                            {{-- ______________________________________________________________________________________________________________________ END  Riesgos tecnológicos --}}

                                            <div class="col-lg-6 div_riesgos_naturales oculto">
                                                <h4>Vista previa de riesgos naturales</h4>
                                                <table class="table table-hover table-checkable" id="kdatatable_clientes_inactivos">
                                                    <thead>
                                                    <tr>
                                                      <th>No.</th>
                                                      <th class="text-center">Acciones</th>
                                                    </tr>
                                                    </thead>

                                                    <tbody>
                                                      @foreach($RiesgosNaturales as $unid)
                                                        <tr>
                                                          <td>{{ $unid->alcance }}</td>
                                                          <td class="text-center">
                                                            {{-- <a href="{{ route('analisis.analisiscliente', $unid->id ) }}" class="btn btn-clean btn-icon btn-outline-success mt-1" data-id="{{ $unid->id }}" data-nombre="{{ $unid->organizacion }}" data-toggle="tooltip" data-theme="dark" title="Detalle de analisis del Cliente" ><i class="flaticon-eye"></i></a> --}}
                                                          </td>
                                                        </tr>
                                                      @endforeach
                                                    </tbody>

                                                </table>
                                            </div>
                                            {{-- ______________________________________________________________________________________________________________________ END  Riesgos naturales --}}

                                            <div class="col-lg-6 div_riesgos_otros oculto">
                                                <h4>Vista previa de otros riesgos</h4>
                                                <table class="table table-hover table-checkable" id="kdatatable_clientes_inactivos">
                                                    <thead>
                                                    <tr>
                                                      <th>No.</th>
                                                      <th class="text-center">Acciones</th>
                                                    </tr>
                                                    </thead>

                                                    <tbody>
                                                      @foreach($ConceptosOtros as $unid)
                                                        <tr>
                                                          <td>{{ $unid->alcance }}</td>
                                                          <td class="text-center">
                                                            {{-- <a href="{{ route('analisis.analisiscliente', $unid->id ) }}" class="btn btn-clean btn-icon btn-outline-success mt-1" data-id="{{ $unid->id }}" data-nombre="{{ $unid->organizacion }}" data-toggle="tooltip" data-theme="dark" title="Detalle de analisis del Cliente" ><i class="flaticon-eye"></i></a> --}}
                                                          </td>
                                                        </tr>
                                                      @endforeach
                                                    </tbody>

                                                </table>
                                            </div>


                                            <div class="col-lg-6">
                                                <div class="text-center div_riesgos_sociales">
                                                    <a href="{{ route('analisis.generaranalisis', [$id_cliente, $BarrerasPerimetrale[0]->id, 0, 1]) }}" class="btn btn-light-primary font-weight-bolder mr-3 ml-3">
                                                    Crear riesgo social</a>
                                                </div>
                                                <div class="text-center div_riesgos_tecnologicos oculto">
                                                    <a href="" class="btn btn-light-primary font-weight-bolder mr-3 ml-3">
                                                    Crear riesgo tecnológico</a>
                                                </div>
                                                <div class="text-center div_riesgos_naturales oculto">
                                                    <a href="" class="btn btn-light-primary font-weight-bolder mr-3 ml-3">
                                                    Crear riesgo natural</a>
                                                </div>
                                                <div class="text-center div_riesgos_otros oculto">
                                                    <a href="" class="btn btn-light-primary font-weight-bolder mr-3 ml-3">
                                                    Crear otro riesgo</a>
                                                </div>

                                                <img src="/img/mapa_analisis.png" class="img-responsive">
                                            </div>



                                        </div>
                                       

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
