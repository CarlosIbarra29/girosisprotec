@extends('layouts.app')
@push('scripts')

  <script src="{{ asset('js/cliente/CatalogoClientes.js') }}"></script>
  <meta name="csrf-token" content="{{ csrf_token() }}" />
@endpush
@section('title')
  Analisis de riesgos sociales
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
                                <h3 class="card-label">Analisis de riesgos sociales ({{ $cliente->organizacion }})</h3>
                            </div>
                            <div class="card-toolbar">
                                  <a href="{{ route('analisis.listadoanalisis') }}" class="btn btn-light-primary font-weight-bolder mr-3 ml-3">
                                    <i class="la la-arrow-left"></i>Regresar</a>
                              <a href="{{ route('analisis.graficassociales', $cliente->id) }}" class="btn btn-light-primary font-weight-bolder mr-3 ml-3">
                                <i class="la la-bar-chart"></i>Graficas
                              </a>

                              <a href="{{ route('analisis.seleccionaanalisis', $cliente->id) }}" class="btn btn-light-primary font-weight-bolder mr-3 ml-3">
                                <i class="la la-plus"></i>Nuevo
                              </a>
                            </div>
                        </div>
                        <div class="card-body">

                          <div class="text-center">
                            <a href="{{ route('analisis.analisiscliente', $cliente->id) }}" class="btn btn-light-primary font-weight-bolder mr-3 ml-3">
                                <i class="fas fa-exclamation-triangle"></i>Riesgos Sociales
                            </a>
                            
                            <a href="{{ route('analisis.analisistecnologicoscli', $cliente->id) }}" class="btn btn-light-primary font-weight-bolder mr-3 ml-3">
                                <i class="la la-laptop"></i>Riesgos Técnologicos
                            </a>
                              
                            <a href="{{ route('analisis.analisisnaturalescli', $cliente->id) }}" class="btn btn-light-primary font-weight-bolder mr-3 ml-3">
                                <i class="fas fa-mountain"></i>Riesgos Naturales
                            </a>
                          
                          </div>

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
                                      <td>{{ $unid->BarrerasPerimetrales->alcance }}</td>
                                      <td>{{ $unid->punto_control }}</td>
                                      <td>{{ $unid->factores_riesgo }}</td>
                                      <td>{{ $unid->eventos_riesgo }}</td>
                                      <td>{{ $unid->hdNivelControl->nivel_control }}</td>
                                      <td class="text-center">
                                        <a href="{{ route('analisis.detalleanalisissocial',[$cliente->id , $unid->id]) }}" class="btn btn-sm btn-clean btn-hover-icon-success btn-icon mt-1" data-toggle="tooltip" data-theme="dark" title="Detalle de analisis del riesgo" ><i class="flaticon-eye"></i></a>


                                        <a href="{{ route('analisis.analisisanalisissocial',[$cliente->id , $unid->id]) }}" class="btn btn-sm btn-clean btn-hover-icon-success btn-icon edit-riesgo"   class="btn btn-sm btn-clean btn-hover-icon-success btn-icon mt-1" data-toggle="tooltip" data-theme="dark" title="Editar analisis del riesgo" ><i class="flaticon-edit"></i></a>

                                        <button class="btn btn-sm btn-clean btn-hover-icon-success btn-icon edit-riesgo"  data-toggle="tooltip" data-theme="dark" title="Eliminar analisis del riesgo" > <span class="svg-icon svg-icon-md"> <i class="flaticon-delete"></i></span>
                                        </button>
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