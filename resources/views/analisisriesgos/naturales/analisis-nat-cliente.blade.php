@extends('layouts.app')
@push('scripts')

  <script src="{{ asset('js/cliente/CatalogoClientes.js') }}"></script>
  <meta name="csrf-token" content="{{ csrf_token() }}" />
@endpush
@section('title')
  Analisis de riesgos naturales
@endsection
@section('content')

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
                                <h3 class="card-label">Analisis de riesgos naturales ({{ $cliente->organizacion }})</h3>
                            </div>
                            <div class="card-toolbar">
                                  <a href="{{ route('analisis.listadoanalisis') }}" class="btn btn-light-primary font-weight-bolder mr-3 ml-3">
                                    <i class="la la-arrow-left"></i>Regresar</a>
                              <a href="{{ route('analisis.graficasnaturales', $cliente->id) }}" class="btn btn-light-primary font-weight-bolder mr-3 ml-3">
                                <i class="la la-bar-chart"></i>Graficas
                              </a>

                              <a href="{{ route('analisis.seleccionaanalisisnaturales', $cliente->id) }}" class="btn btn-light-primary font-weight-bolder mr-3 ml-3">
                                <i class="la la-plus"></i>Nuevo
                              </a>
                            </div>
                        </div>
                        <div class="card-body">

                          <div class="collapse" id="collapseExample">
                              <div class="card card-body">
                                <!--begin: Search Form-->
                                <form class="mb-15">
                                  <div class="row mb-6">
                                    <div class="col-lg-6 mb-lg-0 mb-6">
                                      <label>Nombre del cliente:</label>
                                      <input type="text" class="form-control datatable-input" data-col-index="1" />
                                    </div>
                                  </div>

                                  <div class="row mt-8">
                                    <div class="col-lg-12">
                                      <button class="btn btn-primary btn-primary--icon" id="kt_search">
                                        <span><i class="la la-search"></i><span>Buscar</span></span>
                                      </button>&#160;&#160;
                                      <button class="btn btn-secondary btn-secondary--icon" id="kt_reset">
                                        <span><i class="la la-close"></i><span>Limpiar</span></span>
                                      </button>
                                    </div>
                                  </div>
                                </form>
                              </div>
                          </div>

                            <!--begin: Datatable-->
                            <table class="table table-hover table-checkable" id="kdatatable_clientes_inactivos">
                                <thead>
                                <tr>
                                  <th>No.</th>
                                  <th>Alcance</th>
                                  <th>Punto de control</th>
                                  <th>Factor de riesgo</th>
                                  <th>Eventos de riesgo</th>
                                  <th>Nivel de control</th>
                                  <th class="text-center">Acciones</th>
                                </tr>
                                </thead>

                                <tbody>
                                  @foreach($data as $unid)
                                    <tr>
                                      <td>{{ $unid->id }}</td>
                                      <td>{{ $unid->librorConceptosNaturale->alcance }}</td>
                                      <td>{{ $unid->punto_control }}</td>
                                      <td>{{ $unid->factores_riesgo }}</td>
                                      <td>{{ $unid->eventos_riesgo }}</td>
                                      <td>{{ $unid->hdNivelControl->nivel_control }}</td>
                                      <td class="text-center">
                                        <a href="" class="btn btn-sm btn-clean btn-hover-icon-success btn-icon mt-1" data-toggle="tooltip" data-theme="dark" title="Detalle de analisis del riesgo" ><i class="flaticon-eye"></i></a>
                                      </td>
                                    </tr>
                                  @endforeach
                                </tbody>

                                <tfoot>
                                <tr>
                                  <th>No.</th>
                                  <th>Alcance</th>
                                  <th>Punto de control</th>
                                  <th>Factor de riesgo</th>
                                  <th>Eventos de riesgo</th>
                                  <th>Nivel de control</th>
                                  <th class="text-center">Acciones</th>
                                </tr>
                                </tfoot>

                            </table>
                            <!--end: Datatable-->

                            <input type="hidden" id="datatable_i18n" value="{{ asset('/js/datatables/i18n/es-mx.json') }}">
                            {{-- <input type="hidden" id="clientedatatable" value="{{ route('cliente.clientelistadodatatable') }}"> --}}

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

{{-- M O D A L S --}}

  <input type="hidden" id="datatable_i18n" value="{{ asset('/js/datatables/i18n/es-mx.json') }}">


@endsection