@extends('layouts.app')

@section('title')
    Libro de otros riesgos
@endsection

@push('scripts')
    <script src="{{ asset('js/libroriesgos/CatalogoRiesgosSociales.js') }}"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}" />
@endpush

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
                                    <h3 class="card-label">Riesgo ({{ $alcance_id->alcance}})</h3>
                                </div>
                                <div class="card-toolbar">

                                  <a href="{{ route('librootr.listadolibroriesgosotros',$alcance_id->libror_otros_riesgos_id) }}" class="btn btn-light-primary font-weight-bolder mr-3 ml-3">
                                    <i class="la la-arrow-left"></i>Regresar</a>

                                    <!--begin::Button-->
                                    <a href="{{ route('librootr.crearriesgootro', $alcance_id->id) }}" class="btn btn-light-primary font-weight-bolder mr-3 ml-3">
                                        <i class="la la-plus"></i>Nuevo</a>

                                    <a href="{{ route('librootr.riesgootrosidinactivos', $alcance_id->id) }}"
                                        class="btn btn-light-primary font-weight-bolder mr-3 ml-3">
                                        <i class="far fa-trash-alt"></i>Riesgos inactivos</a>
                                    <!--end::Button-->

                                </div>
                            </div>
                            <div class="card-body">


                                <div class="card-body">
                                    <!--begin: Datatable-->
                                    <table class="table table-hover table-checkable" id="kdatatable_riesgos_sociales">
                                        <thead>
                                        <tr>
                                          <th>No.</th>
                                          <th>Punto de control</th>
                                          <th>Factores riesgo</th>
                                          <th>Eventos riesgo</th>
                                          <th>Medidas de Mitigacón</th>
                                          <th class="text-center">Opciones</th>
                                        </tr>
                                        </thead>

                                        <tbody>
                                          @foreach($riesgos as $unid)
                                            <tr>
                                              <td>{{ $unid->id }}</td>
                                              <td>{{ $unid->criterio }}</td>
                                              <td>{{ $unid->factores_riesgo }}</td>
                                              <td>{{ $unid->eventos_riesgo }}</td>
                                              <td>{{ $unid->contramedidas }}</td>

                                              <td class="text-center">
{{--                                                 <a  href="" class="btn btn-sm btn-clean btn-hover-icon-success btn-icon mt-1" data-id="{{ $unid->id }}" data-nombre="{{ $unid->factores_riesgo }}" data-toggle="tooltip" data-theme="dark" title="Ver '{{ $unid->factores_riesgo }}'" ><i class="flaticon-eye"></i></a> --}}

                                                <a  href="{{ route('librootr.editarriesgootro', [$alcance_id->id,$unid->id]) }}" class="btn btn-sm btn-clean btn-hover-icon-success btn-icon mt-1" data-id="{{ $unid->id }}" data-nombre="{{ $unid->factores_riesgo }}" data-toggle="tooltip" data-theme="dark" title="Editar '{{ $unid->factores_riesgo }}'" ><i class="flaticon-edit"></i></a>

                                                <button   class="btn btn-sm btn-clean btn-hover-icon-success btn-icon mt-1 desactivar-tecnologico" data-id="{{ $unid->id }}" data-nombre="{{ $unid->factores_riesgo }}" data-toggle="tooltip" data-theme="dark" title="Desactivar '{{ $unid->factores_riesgo }}'" ><i class="flaticon-delete"></i></button>
                                              </td>
                                            </tr>
                                          @endforeach
                                        </tbody>

                                        <tfoot>
                                        <tr>
                                          <th>No.</th>
                                          <th>Punto de control</th>
                                          <th>Factores riesgo</th>
                                          <th>Eventos riesgo</th>
                                          <th>Medidas de Mitigacón</th>
                                          <th class="text-center">Opciones</th>
                                        </tr>
                                        </tfoot>

                                    </table>
                                    <!--end: Datatable-->

                                </div>
                                <!--end: Datatable-->
                                <input type="hidden" id="datatable_i18n"
                                    value="{{ asset('/js/datatables/i18n/es-mx.json') }}">
                                <input type="hidden" id="catalogodatatable"
                                    value="{{ route('area.areadatatable') }}">

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


  <form method="post" id="tecnologico_delete_form" action="{{ route('librootr.deleteriesgootro') }}" enctype="multipart/form-data">
    @csrf
    <input type="hidden" name="id" id="id_delete_tecnologico" value="">
    <input type="hidden" name="id_libro" value="{{ $alcance_id->id }}">
  </form>
@endsection
