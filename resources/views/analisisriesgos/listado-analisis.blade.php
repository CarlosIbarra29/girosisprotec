@extends('layouts.app')
@push('scripts')

  <script src="{{ asset('js/cliente/CatalogoClientes.js') }}"></script>
  <meta name="csrf-token" content="{{ csrf_token() }}" />
@endpush

@push('styles')
  <link href="{{ asset('/css/version2/tablesgen3.css?v=1.0.3') }}" rel="stylesheet" type="text/css" />
@endpush

@section('title')
  Inventario de clientes
@endsection
@section('content')

    <div class="d-flex flex-row">

        <div class="flex-row-fluid">

            <div class="d-flex flex-column flex-grow-1">

                <div class="row">
                    
                    <div class="col-xl-12">

                        <!--begin::Card-->
                        <div class="card card-custom">

                            <div class="card-header">
                                
                                <div class="card-title">
                      
                                    <span class="card-icon">
                                      <i class="flaticon2-file" style="color: var(--camel)"></i>
                                    </span>
                                    <h3 class="card-label">Analisis de Riesgos por cliente</h3>
                                
                                </div>

                                <div class="card-toolbar">

                                    <!-- <a class="btn btn-link-primary font-weight-bold mr-2 busqueda" data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample"> Busqueda</a> -->
 

                                    <!--begin::Dropdown-->
                                    <div class="dropdown dropdown-inline mr-2">
                                        {{--<button type="button" class="btn btn-light-primary font-weight-bolder dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <span class="svg-icon svg-icon-md">

                                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                  <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                    <rect x="0" y="0" width="24" height="24" />
                                                    <path d="M3,16 L5,16 C5.55228475,16 6,15.5522847 6,15 C6,14.4477153 5.55228475,14 5,14 L3,14 L3,12 L5,12 C5.55228475,12 6,11.5522847 6,11 C6,10.4477153 5.55228475,10 5,10 L3,10 L3,8 L5,8 C5.55228475,8 6,7.55228475 6,7 C6,6.44771525 5.55228475,6 5,6 L3,6 L3,4 C3,3.44771525 3.44771525,3 4,3 L10,3 C10.5522847,3 11,3.44771525 11,4 L11,19 C11,19.5522847 10.5522847,20 10,20 L4,20 C3.44771525,20 3,19.5522847 3,19 L3,16 Z" fill="#000000" opacity="0.3" />
                                                    <path d="M16,3 L19,3 C20.1045695,3 21,3.8954305 21,5 L21,15.2485298 C21,15.7329761 20.8241635,16.200956 20.5051534,16.565539 L17.8762883,19.5699562 C17.6944473,19.7777745 17.378566,19.7988332 17.1707477,19.6169922 C17.1540423,19.602375 17.1383289,19.5866616 17.1237117,19.5699562 L14.4948466,16.565539 C14.1758365,16.200956 14,15.7329761 14,15.2485298 L14,5 C14,3.8954305 14.8954305,3 16,3 Z" fill="#000000" />
                                                  </g>
                                                </svg>

                                            </span>Exportar
                                        </button>
                                        --}}
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
                                                  <a href="#" class="navi-link" id="export-pdf">
                                                    <span class="navi-icon">
                                                      <i class="la la-file-pdf-o"></i>
                                                    </span>
                                                    <span class="navi-text">PDF</span>
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
                                <div class="table-responsive table-surface">
                                    <!--begin: Datatable-->
                                    <table class="table table-hover table-brand table-checkable" id="kdatatable_clientes_inactivos">
                                        <thead>
                                        <tr>
                                          <th>No.</th>
                                          <th>Nombre comercial</th>
                                          <th>Razón Social</th>
                                          <th>Contacto</th>
                                          <th>Telefono</th>
                                          <th>Email</th>
                                          <!-- <th class="text-center">Acciones</th> -->
                                        </tr>
                                        </thead>

                                        <tbody>
                                          @foreach($data as $unid)
                                            <tr class="tr-clickable"data-href="{{ route('analisis.analisiscliente', $unid->id ) }}">
                                              <td>{{ $unid->id }}</td>

                                              <td>
                                                @if(!empty($unid->nombre_comercial))
                                                  {{ $unid->nombre_comercial }}
                                                @else
                                                  <span class="sin-dato">Sin dato</span>
                                                @endif
                                              </td>

                                              <td>
                                                @if(!empty($unid->organizacion))
                                                  {{ $unid->organizacion }}
                                                @else
                                                  <span class="sin-dato">Sin dato</span>
                                                @endif
                                              </td>

                                              <td>
                                                @if(!empty($unid->contacto_principal))
                                                  {{ $unid->contacto_principal }}
                                                @else
                                                  <span class="sin-dato">Sin dato</span>
                                                @endif
                                              </td>

                                              <td>
                                                @if(!empty($unid->telefono))
                                                  <a href="tel:{{ $unid->telefono }}">{{ $unid->telefono }}</a>
                                                @else
                                                  <span class="sin-dato">Sin dato</span>
                                                @endif
                                              </td>

                                              <td>
                                                @if(!empty($unid->mail))
                                                  <a href="mailto:{{ $unid->mail }}">{{ $unid->mail }}</a>
                                                @else
                                                  <span class="sin-dato">Sin dato</span>
                                                @endif
                                              </td>

                                              <!-- <td class="text-center"> -->
                                                <!-- <a href="{{ route('analisis.analisiscliente', $unid->id ) }}" class="btn btn-sm btn-clean btn-hover-icon-success btn-icon" data-id="{{ $unid->id }}" data-nombre="{{ $unid->organizacion }}" data-toggle="tooltip" data-theme="dark" title="Riesgos Sociales"><i class="flaticon-users-1"></i></a> -->

                                                <!-- <span class="badge-analisis">2</span> -->

                                                <!-- <a href="{{ route('analisis.analisistecnologicoscli', $unid->id ) }}" class="btn btn-sm btn-clean btn-hover-icon-success btn-icon" data-id="{{ $unid->id }}" data-nombre="{{ $unid->organizacion }}" data-toggle="tooltip" data-theme="dark" title="Riesgos Tecnológicos"><i class="flaticon-profile"></i></a>

                                                <a href="{{ route('analisis.analisisnaturalescli', $unid->id ) }}" class="btn btn-sm btn-clean btn-hover-icon-success btn-icon" data-id="{{ $unid->id }}" data-nombre="{{ $unid->organizacion }}" data-toggle="tooltip" data-theme="dark" title="Riesgos naturales"><i class="flaticon-security"></i></a>

                                                <a href="{{ route('analisis.analisisotroscli', $unid->id ) }}" class="btn btn-sm btn-clean btn-hover-icon-success btn-icon" data-id="{{ $unid->id }}" data-nombre="{{ $unid->organizacion }}" data-toggle="tooltip" data-theme="dark" title="Otros riesgos"><i class="flaticon2-gear"></i></a> -->
                                              <!-- </td> -->
                                            </tr>
                                          @endforeach
                                        </tbody>

                                        <tfoot>
                                        <tr>
                                          <th>No.</th>
                                          <th>Nombre comercial</th>
                                          <th>Razón Social</th>
                                          <th>Contacto</th>
                                          <th>Telefono</th>
                                          <th>Email</th>
                                          <!-- <th class="text-center">Acciones</th> -->
                                        </tr>
                                        </tfoot>

                                    </table>
                                    <!--end: Datatable-->
                                </div>
                                <input type="hidden" id="datatable_i18n" value="{{ asset('/js/datatables/i18n/es-mx.json') }}">
                                {{-- <input type="hidden" id="clientedatatable" value="{{ route('cliente.clientelistadodatatable') }}"> --}}

                            </div>
                        </div>
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

<script>
document.addEventListener('DOMContentLoaded', function () {

    document.querySelectorAll('.tr-clickable').forEach(function(row) {
        row.addEventListener('click', function(e) {

            // Evita que afecte si algún día vuelves a poner botones dentro
            if (e.target.closest('a, button, input')) {
                return;
            }

            window.location.href = this.dataset.href;
        });
    });

});
</script>
