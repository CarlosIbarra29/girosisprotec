@extends('layouts.app')
@section('title')
    Catálogo de area personal inactivos
@endsection

@push('scripts')
    <script src="{{ asset('js/catalogos/requisiciones/CatalogoAreaPersonal.js') }}"></script>
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
                                    <h3 class="card-label">Inventario de area personal inactivos</h3>
                                </div>
                                <div class="card-toolbar">

                                    <!--begin::Button-->
                                    <a href="{{ route('area.listadoarea') }}"
                                        class="btn btn-light-primary font-weight-bolder mr-3 ml-3">
                                        Regresar</a>
                                    <!--end::Button-->

                                </div>
                            </div>
                            <div class="card-body">
                                <!--begin: Datatable-->
                                <table class="table table-hover table-checkable" id="kdatatable_formapago_inactiva">
                                    <thead>
                                        <tr>
                                            <th>No.</th>
                                            <th>Area Personal</th>
                                            <th class="text-center">Acciones</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        @foreach ($data as $registro)
                                            <tr>
                                                <td>{{ $registro->id }}</td>
                                                <td>{{ $registro->nombre_area }}</td>
                                                <td class="text-center">
                                                    <button
                                                        class="btn btn-clean btn-icon btn-outline-success mt-1 activar-registro"
                                                        data-id="{{ $registro->id }}" data-nombre="{{ $registro->nombre_area }}"
                                                        data-toggle="tooltip" data-theme="dark"
                                                        title="Activar registro"><i
                                                            class="flaticon2-reply "></i></button>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>

                                    <tfoot>
                                        <tr>
                                            <th>No.</th>
                                            <th>Area Personal</th>
                                            <th class="text-center">Acciones</th>
                                        </tr>
                                    </tfoot>

                                </table>
                                <!--end: Datatable-->

                                <input type="hidden" id="datatable_i18n"
                                    value="{{ asset('/js/datatables/i18n/es-mx.json') }}">

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

    <form method="post" id="form_activar_registro" action="{{ route('area.activararea') }}"
        enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="id" id="id_registro" value="">
    </form>
@endsection
