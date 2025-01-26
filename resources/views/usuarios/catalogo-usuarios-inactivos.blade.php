@extends('layouts.app')
@push('scripts')
{{-- <script src="{{ asset('js/Usuarios.js') }}"></script> --}}
<script src="{{ asset('js/usuarios/CatalogoUsuarios.js') }}"></script>
@endpush
@section('title')
  Inventario de usuarios inactivos
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
                                <h3 class="card-label">Inventario de usuarios inactivos</h3>
                            </div>
                            <div class="card-toolbar">

                                <!--begin::Button-->
                                <a href="{{ route('user.catalogousuarios') }}" class="btn btn-light-primary font-weight-bolder mr-3 ml-3">
                                  Regresar</a>
                                <!--end::Button-->

                            </div>
                        </div>
                        <div class="card-body">
                            <!--begin: Datatable-->
                            <table class="table table-hover table-checkable" id="kdatatable_user_inactivo">
                                <thead>
                                <tr>
                                  <th>No.</th>
                                  <th>Nombre</th>
                                  <th>RFC</th>
                                  <th>Teléfono</th>
                                  <th>Email</th>
                                  <th>Rol</th>
                                  <th>Motivo</th>
                                  <th class="text-center">Acciones</th>
                                </tr>
                                </thead>

                                <tbody>
                                  @foreach($usuario as $unid)
                                    <tr>
                                      <td>{{ $unid->id }}</td>
                                      <td>{{ $unid->name }}</td>
                                      <td>{{ $unid->rfc }}</td>
                                      <td>{{ $unid->telefono }}</td>
                                      <td>{{ $unid->email }}</td>
                                      <td>{{ $unid->name_role }}</td>
                                      <td><span style="color: red;">{{ $unid->motivo_desactivar }}</span></td>
                                      <td class="text-center">
                                        <button class="btn btn-clean btn-icon btn-outline-success mt-1 activar-user" data-id="{{ $unid->id }}" data-nombre="{{ $unid->name }}" data-toggle="tooltip" data-theme="dark" title="Activar Usuario" ><i class="flaticon2-reply "></i></button>
                                      </td>
                                    </tr>
                                  @endforeach
                                </tbody>

                                <tfoot>
                                <tr>
                                  <th>No.</th>
                                  <th>Nombre</th>
                                  <th>RFC</th>
                                  <th>Telefono</th>
                                  <th>Email</th>
                                  <th>Rol</th>
                                  <th>Motivo</th>
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

  <input type="hidden" id="datatable_i18n" value="{{ asset('/js/datatables/i18n/es-mx.json') }}">
  <form method="post" id="user_act_form" action="{{ route('user.activarusuario') }}" enctype="multipart/form-data">
    @csrf
    <input type="hidden" name="id" id="id_user_act" value="">
  </form>

@endsection