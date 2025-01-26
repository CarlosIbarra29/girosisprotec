@extends('layouts.app')
@section('title')
    Catálogo de nivel de control inactivos
@endsection

@push('scripts')
  <script src="{{ asset('js/h_d/NivelControl.js') }}"></script> 
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
                                <h3 class="card-label">Inventario de nivel de control inactivos</h3>
                            </div>
                            <div class="card-toolbar">

                                <!--begin::Button-->
                                <a href="{{ route('hd.catalogonivelcontrol') }}" class="btn btn-light-primary font-weight-bolder mr-3 ml-3">
                                  Regresar</a>
                                <!--end::Button-->

                            </div>
                        </div>
                        <div class="card-body">
                            <!--begin: Datatable-->
                            <table class="table table-hover table-checkable" id="kdatatable_nivelcontrol_inactivos">
                                <thead>
                                <tr>
                                  <th>No.</th>
                                  <th>Nivel control</th>
                                  <th>Exposición</th>
                                  <th>Detalle</th>
                                  <th>Calculo</th>
                                  <th class="text-center">Opciones</th>
                                </tr>
                                </thead>

                                <tbody>
                                  @foreach($nivel_control as $unid)
                                    <tr>
                                      <td>{{ $unid->id }}</td>
                                      <td>{{ $unid->nivel_control }}</td>
                                      <td>{{ $unid->exposicion }}</td>
                                      <td>{{ $unid->detalle }}</td>
                                      <td>{{ $unid->nc_calculo }}</td>

                                      <td class="text-center">
                                        <a class="btn btn-sm btn-clean btn-hover-icon-success btn-icon activar_nivelcontrol" data-id="{{ $unid->id }}" data-nombre="{{ $unid->nivel_control }}" data-toggle="tooltip" data-theme="dark" title="Activar nivel de control" ><i class="flaticon2-reply "></i></a>
                                      </td>
                                    </tr>
                                  @endforeach
                                </tbody>

                                <tfoot>
                                <tr>
                                  <th>No.</th>
                                  <th>Nivel control</th>
                                  <th>Exposición</th>
                                  <th>Detalle</th>
                                  <th>Calculo</th>
                                  <th class="text-center">Opciones</th>
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

  <form method="post" id="nivelcontrol_act_form" action="{{ route('hd.activarnivelcontrol') }}" enctype="multipart/form-data">
    @csrf
    <input type="hidden" name="id" id="id_act_nivelcontrol" value="">
  </form>


@endsection