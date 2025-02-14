@extends('layouts.app')

@section('title')
    Listado libro de otros riesgos
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
                                    <h3 class="card-label">Listado de otros riesgos</h3>
                                </div>
                                <div class="card-toolbar">
                                    <a href="{{ route('librootr.listadonuevosriesgos') }}" class="btn btn-light-primary font-weight-bolder mr-3 ml-3">
                                    <i class="la la-arrow-left"></i>Regresar</a>

                                    <a href="#" class="btn btn-light-primary font-weight-bolder mr-3 ml-3"
                                        data-toggle="modal" data-target="#kt_modal_1">
                                     <i class="la la-plus"></i>Nuevo</a>


                                    <!--begin::Dropdown-->
                                    <div class="dropdown dropdown-inline mr-2">

                                        <!--begin::Dropdown Menu-->
                                        <div class="dropdown-menu dropdown-menu-sm dropdown-menu-right">
                                            <!--begin::Navigation-->
                                            <ul class="navi flex-column navi-hover py-2">

                                                <li class="navi-item">
                                                    <a href="#" class="navi-link" id="export-excel">
                                                        <span class="navi-icon">
                                                            <i class="la la-file-excel-o"></i>
                                                        </span>
                                                        <span class="navi-text">Excel</span>
                                                    </a>
                                                </li>

                                                <li class="navi-item">
                                                    <a href="#" class="navi-link" id="export-csv">
                                                        <span class="navi-icon">
                                                            <i class="la la-file-text-o"></i>
                                                        </span>
                                                        <span class="navi-text">CSV</span>
                                                    </a>
                                                </li>
                                                <li class="navi-item">
                                                    <a href="#" class="navi-link" id="export-print">
                                                        <span class="navi-icon">
                                                            <i class="la la-file-text-o"></i>
                                                        </span>
                                                        <span class="navi-text">Imprimir</span>
                                                    </a>
                                                </li>

                                            </ul>
                                            <!--end::Navigation-->
                                        </div>
                                        <!--end::Dropdown Menu-->
                                    </div>
                                    <!--end::Dropdown-->
                                </div>
                            </div>
                            <div class="card-body">

                                <div class="collapse" id="collapseExample">
                                    <div class="card card-body">
                                        <!--begin: Search Form-->
                                        <form class="mb-15">
                                            <div class="row mb-6">
                                                <div class="col-lg-6 mb-lg-0 mb-6">
                                                    <label>Area personal:</label>
                                                    <input type="text" class="form-control datatable-input"
                                                        data-col-index="1" />
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


                                <div class="card-body">
                                    <!--begin: Datatable-->
                                    <table class="table table-hover table-checkable" id="kdatatable_libro_riesgos_sociales">
                                        <thead>
                                        <tr>
                                          <th>No.</th>
                                          <th>Alcance</th>
                                          <th class="text-center">Opciones</th>
                                        </tr>
                                        </thead>

                                        <tbody>
                                          @foreach($alcances as $unid)
                                            <tr>
                                              <td>{{ $unid->id }}</td>
                                              <td>{{ $unid->alcance }}</td>

                                              <td class="text-center">
                                                <a  href="{{ route('librootr.riesgootroid', $unid->id) }}" class="btn btn-sm btn-clean btn-hover-icon-success btn-icon activar-emisor" data-id="{{ $unid->id }}" data-nombre="{{ $unid->alcance }}" data-toggle="tooltip" data-theme="dark" title="Ver '{{ $unid->alcance }}'" ><i class="flaticon-eye"></i></a>

                                                <button class="btn btn-sm btn-clean btn-hover-icon-success btn-icon edit-riesgo"  onClick="editriesgosocial({{ $unid->id }},'{{ $unid->alcance }}')" data-toggle="modal" data-target="#model_edit_riesgosocial" data-toggle="tooltip" data-theme="dark" title="Editar nombre riesgo">
                                                    <i class="flaticon-edit"></i></button>

                                              </td>
                                            </tr>
                                          @endforeach
                                        </tbody>

                                        <tfoot>
                                        <tr>
                                          <th>No.</th>
                                          <th>Alcance</th>
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


    <form method="post" id="form_desactivar" action="{{ route('area.desactivararea') }}"
        enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="id" id="id_tipo_documento_desactivar" value="">
    </form>



    {{-- M O D A L S --}}

    <div class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true"
        id="kt_modal_1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Agregar nombre del riesgo</h5>

                    <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal"
                        aria-label="Close">
                        <span class="svg-icon svg-icon-2x"></span>
                    </div>
                </div>

                <div class="modal-body">
                    <form action="{{ route('librootr.adnameriesgootro') }}" method="post" id="submit_nameriesgo">
                        @csrf
                        <div class="row form-group">
                            <div class="col-lg-12 mt-2">
                                <label>Nombre del riesgo</label>
                                <input type="text" class="form-control" name="nombre_riesgo" id="nombre_riesgo" />
                                <input type="hidden" name="id_riesgo" value="{{ $id_riesgo }}">
                            </div>
                        </div>
                    </form>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn btn-secondary font-weight-bold"
                        data-dismiss="modal"><i class="la la-times"></i>Cancelar</button>
                    <button type="button" id="send_riesgo" class="btn btn-success"><i class="la la-plus"></i>Guardar</button>
                </div>
            </div>
        </div>
    </div>



    <div class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true"
        id="model_edit_riesgosocial">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Editar nombre del riesgo</h5>

                    <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal"
                        aria-label="Close">
                        <span class="svg-icon svg-icon-2x"></span>
                    </div>
                </div>

                <div class="modal-body">
                    <form action="{{ route('librootr.editnameriesgootro') }}" method="post" id="submit_nameriesgo_edit">
                        @csrf
                        <div class="row form-group">
                            <div class="col-lg-12 mt-2">
                                <label>Nombre del riesgo</label>
                                <input type="text" class="form-control" name="nombre_riesgo_edit" id="nombre_riesgo_edit" value=""/>
                                <input type="hidden" name="id_riesgo_edit" id="id_riesgo_edit" value="">
                                <input type="hidden" name="id_riesgo" value="{{ $id_riesgo }}">
                            </div>
                        </div>
                    </form>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn btn-secondary font-weight-bold"
                        data-dismiss="modal"><i class="la la-times"></i>Cancelar</button>
                    <button type="button" id="send_riesgo_edit" class="btn btn-success"><i class="la la-plus"></i>Guardar</button>
                </div>
            </div>
        </div>
    </div>


@endsection
