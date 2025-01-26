@extends('layouts.app')
@push('scripts')
{{-- <script src="{{ asset('js/Usuarios.js') }}"></script> --}}
<script src="{{ asset('js/roles/CatalogoRoles.js') }}"></script>
@endpush
@section('title')
    Inventario de roles inactivos
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
                                <h3 class="card-label">Inventario de roles inactivos</h3>
                            </div>
                            <div class="card-toolbar">

                                <!--begin::Button-->
                                <a href="{{ route('rol.catalogoroles') }}" class="btn btn-light-primary font-weight-bolder mr-3 ml-3">
                                  Regresar</a>
                                <!--end::Button-->

                            </div>
                        </div>
                        <div class="card-body">
                            <!--begin: Datatable-->
                            <table class="table table-hover table-checkable" id="kdatatable_rol_inactivo">
                                <thead>
                                <tr>
                                  <th>No.</th>
                                  <th>Nombre</th>
                                  <th class="text-center">Acciones</th>
                                </tr>
                                </thead>

                                <tbody>
                                  @foreach($rol as $unid)
                                    <tr>
                                      <td>{{ $unid->id }}</td>
                                      <td>{{ $unid->name }}</td>

                                      <td class="text-center">
                                        <button class="btn btn-sm btn-clean btn-icon activar-rol" data-id="{{ $unid->id }}" data-nombre="{{ $unid->name }}" data-toggle="tooltip" data-theme="dark" title="Activar rol"><i class="flaticon2-reply "></i></button>
                                      </td>
                                    </tr>
                                  @endforeach
                                </tbody>

                                <tfoot>
                                <tr>
                                  <th>No.</th>
                                  <th>Nombre</th>
                                  <th class="text-center">Acciones</th>
                                </tr>
                                </tfoot>

                            </table>
                            <!--end: Datatable-->

                            <input type="hidden" id="datatable_i18n" value="{{ asset('/js/datatables/i18n/es-mx.json') }}">

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

  <form method="post" id="rol_act_form" action="{{ route('rol.activarrol') }}" enctype="multipart/form-data">
    @csrf
    <input type="hidden" name="id" id="id_rol_act" value="">
  </form>

@endsection