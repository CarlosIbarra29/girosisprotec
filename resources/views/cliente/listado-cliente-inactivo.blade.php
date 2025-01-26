@extends('layouts.app')

@section('title')
    Catálogo de clientes inactivos
@endsection

@push('scripts')
  <script src="{{ asset('js/cliente/CatalogoClientes.js') }}"></script>
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
                                <h3 class="card-label">Inventario de clientes inactivos</h3>
                            </div>
                            <div class="card-toolbar">

                                <!--begin::Button-->
                                <a href="{{ route('cliente.listadocliente') }}" class="btn btn-light-primary font-weight-bolder mr-3 ml-3">
                                  Regresar</a>
                                <!--end::Button-->

                            </div>
                        </div>
                        <div class="card-body">
                            <!--begin: Datatable-->
                            <table class="table table-hover table-checkable" id="kdatatable_clientes_inactivos">
                                <thead>
                                <tr>
                                  <th>No.</th>
                                  <th>Organización</th>
                                  <th>Nombre comercial</th>
                                  <th>Contacto</th>
                                  <th>Telefono</th>
                                  <th>Email</th>
                                  <th class="text-center">Acciones</th>
                                </tr>
                                </thead>

                                <tbody>
                                  @foreach($data as $unid)
                                    <tr>
                                      <td>{{ $unid->id }}</td>
                                      <td>{{ $unid->organizacion }}</td>
                                      <td>{{ $unid->nombre_comercial }}</td>
                                      <td>{{ $unid->contacto_principal }}</td>
                                      <td>{{ $unid->telefono }}</td>
                                      <td>{{ $unid->mail }}</td>

                                      <td class="text-center">
                                        <button class="btn btn-clean btn-icon btn-outline-success mt-1 activar-cliente" data-id="{{ $unid->id }}" data-nombre="{{ $unid->organizacion }}" data-toggle="tooltip" data-theme="dark" title="Activar Cliente" ><i class="flaticon2-reply "></i></button>
                                      </td>
                                    </tr>
                                  @endforeach
                                </tbody>

                                <tfoot>
                                <tr>
                                  <th>No.</th>
                                  <th>Organización</th>
                                  <th>Nombre comercial</th>
                                  <th>Contacto</th>
                                  <th>Telefono</th>
                                  <th>Email</th>
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

  <form method="post" id="cliente_act_form" action="{{ route('cliente.activarcliente') }}" enctype="multipart/form-data">
    @csrf
    <input type="hidden" name="id" id="id_delete" value="">
  </form>



@endsection