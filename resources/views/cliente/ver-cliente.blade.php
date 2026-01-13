@extends('layouts.app')

@push('scripts')
    <script src="{{ asset('js/cliente/EditarCliente.js') }}"></script>

    {{-- Copiar al portapapeles --}}
    <script>
      document.addEventListener('click', function(e){
        const btn = e.target.closest('[data-copy]');
        if(!btn) return;
        const text = btn.getAttribute('data-copy') || '';
        if(!text) return;
        navigator.clipboard.writeText(text).then(() => {
          if (window.Swal) {
            Swal.fire({ toast:true, position:'top-end', timer:1500, showConfirmButton:false,
              icon:'success', title:'Copiado' });
          }
        });
      });
    </script>
@endpush

@push('styles')
  <link href="{{ asset('/css/version2/vercliente.css?v=1.0.10') }}" rel="stylesheet" type="text/css" />
@endpush

@section('title') Ver cliente @endsection

@section('content')
@php
  $campos = [
    $data->organizacion ?? null,
    $data->nombre_comercial ?? null,
    $data->contacto_principal ?? null,
    $data->calle ?? null,
    $data->no_exterior ?? null,
    $data->delegacion ?? null,
    $data->telefono ?? null,
    $data->mail ?? null,
  ];
  $total = count($campos);
  $llenados = collect($campos)->filter(fn($v)=> !empty($v))->count();
  $pct = $total ? intval(($llenados/$total)*100) : 0;

  $direccionStr = trim(implode(' ', array_filter([
    $data->calle ?? '',
    $data->no_exterior ? 'No. '.$data->no_exterior : '',
    $data->no_interior ? 'Int. '.$data->no_interior : '',
    $data->delegacion ?? ''
  ])));
@endphp

<div class="row">
  <div class="col-lg-12">
    <div class="card card-custom gutter-b ver-cliente">
      {{-- Header --}}
      <div class="card-header d-flex align-items-center justify-content-between">
        <div class="d-flex align-items-center">
          <div class="vc-header-avatar mr-3">
            {{ strtoupper(mb_substr($data->organizacion ?: 'C', 0, 1)) }}
          </div>

          {{-- Título + chips en la misma línea --}}
          <div class="vc-title-wrap">
            <h3 class="vc-title mb-0">Ver Cliente</h3>
            <div class="vc-chips-inline">
              <span class="vc-chip">
                <i class="flaticon2-layers"></i>
                <span class="text-white">{{ $data->sector ?: 'Sin dato' }}</span>
              </span>
              <span class="vc-chip">
                <i class="flaticon2-shopping-cart"></i>
                <span class="text-white">{{ $data->giro_comercial ?: 'Sin dato' }}</span>
              </span>
            </div>
          </div>
        </div>

        <div class="card-toolbar">
          <a href="{{ route('cliente.listadocliente') }}" class="btn btn-light-primary font-weight-bolder mr-2">
            <i class="la la-arrow-left mr-1"></i>Regresar
          </a>
          <button type="button" class="btn btn-ghost-camel" onclick="window.print()">
            <i class="la la-print mr-1"></i>Imprimir
          </button>
        </div>
      </div>

      {{-- Form (compatibilidad) --}}
      <form action="{{ route('cliente.updatecliente') }}" method="post" id="submit_cliente">
        @csrf
        <input type="hidden" name="cliente_id" value="{{ $data->id }}">

        <div class="card-body">
          {{-- Tabs --}}
          <ul class="nav nav-tabs nav-tabs-line">
            <li class="nav-item">
              <a class="nav-link active" data-toggle="tab" href="#tab_info">Información del Cliente</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" data-toggle="tab" href="#tab_contacto">Contacto por parte del cliente</a>
            </li>
          </ul>

          {{-- Resumen + Completitud --}}
          <div class="rounded p-4 mb-6 border border-muted" style="background: var(--muted)">
            <div class="row">
              <div class="col-md-8">
                <div class="row">
                  <div class="col-md-4 mb-3">
                    <div class="vc-card p-3 h-100">
                      <div class="vc-section-title mb-2">Nombre comercial</div>
                      <div class="font-weight-bold">{{ $data->nombre_comercial ?: '—' }}</div>
                    </div>
                  </div>
                  <div class="col-md-4 mb-3">
                    <div class="vc-card p-3 h-100">
                      <div class="vc-section-title mb-2">Razón Social</div>
                      <div class="font-weight-bold">{{ $data->organizacion ?: '—' }}</div>
                    </div>
                  </div>
                  <div class="col-md-4 mb-3">
                    <div class="vc-card p-3 h-100">
                      <div class="vc-section-title mb-2">Delegación</div>
                      <div class="font-weight-bold">{{ $data->delegacion ?: '—' }}</div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-md-4 mt-3 mt-md-0 d-flex flex-column justify-content-center">
                <div class="d-flex align-items-center mb-2">
                  <i class="flaticon2-graph-1 mr-2" style="color:var(--camel)"></i>
                  <span class="font-weight-600">Completitud del perfil</span>
                  <span class="ml-auto font-weight-700">{{ $pct }}%</span>
                </div>
                <div class="vc-complete"><span style="width: {{ $pct }}%"></span></div>
                <div class="text-muted small mt-2">Completa los campos faltantes para mejorar el perfil.</div>
              </div>
            </div>
          </div>

          {{-- Contenido de tabs --}}
          <div class="tab-content mt-4" id="myTabContent">

            {{-- TAB 1 --}}
            <div class="tab-pane fade show active" id="tab_info" role="tabpanel">
              <div class="row">
                <div class="col-lg-6">
                  <div class="vc-card p-4 mb-4">
                    <div class="vc-section-title">Identidad</div>
                    <dl class="vc-dl">
                      <dt>Nombre comercial</dt>
                      <dd>{{ $data->nombre_comercial ?: '—' }}</dd>

                      <dt>Razón Social</dt>
                      <dd>{{ $data->organizacion ?: '—' }}</dd>

                      <dt>Giro comercial</dt>
                      <dd>{{ $data->giro_comercial ?: '—' }}</dd>

                      <dt>Sector</dt>
                      <dd>{{ $data->sector ?: '—' }}</dd>
                    </dl>
                  </div>

                  <div class="vc-card p-4">
                    <div class="vc-section-title">Operación</div>
                    <dl class="vc-dl">
                      <dt>No. de personas que laboran en la instalación</dt>
                      <dd>{{ $data->no_personal ?: '—' }}</dd>
                    </dl>
                  </div>
                </div>

                <div class="col-lg-6">
                  <div class="vc-card p-4">
                    {{-- Título "Dirección" + botón Maps compacto a la derecha --}}
                    <div class="vc-section-title-row">
                      <div class="vc-section-title">Dirección</div>

                      @if($direccionStr)
                        <a class="btn btn-camel btn-camel-xs"
                           target="_blank"
                           href="https://www.google.com/maps/search/?api=1&query={{ urlencode($direccionStr) }}">
                          <i class="la la-map-marker mr-1"></i>Ver Mapas
                        </a>
                      @endif
                    </div>

                    <dl class="vc-dl">
                      <dt>Calle</dt>
                      <dd>{{ $data->calle ?: '—' }}</dd>

                      <dt>No. Exterior</dt>
                      <dd>{{ $data->no_exterior ?: '—' }}</dd>

                      <dt>No. Interior</dt>
                      <dd>{{ $data->no_interior ?: '—' }}</dd>

                      <dt>Delegación</dt>
                      <dd>{{ $data->delegacion ?: '—' }}</dd>
                    </dl>
                  </div>
                </div>
              </div>
            </div>

            {{-- TAB 2 --}}
            <div class="tab-pane fade" id="tab_contacto" role="tabpanel">
              <div class="row">
                <div class="col-lg-6">
                  <div class="vc-card p-4 mb-4">
                    <div class="vc-section-title">Contacto principal</div>
                    <dl class="vc-dl">
                      <dt>Nombre</dt>
                      <dd>{{ $data->contacto_principal ?: '—' }}</dd>

                      <dt>Cargo</dt>
                      <dd>{{ $data->cargo ?: '—' }}</dd>

                      <dt>Teléfono</dt>
                      <dd>
                        @php $tel = $data->telefono ?? ''; @endphp
                        @if(!empty($tel))
                          <a href="tel:{{ $tel }}">{{ $tel }}</a>
                          <button type="button" class="copy-btn" data-copy="{{ $tel }}" title="Copiar">
                            <i class="flaticon2-copy"></i>
                          </button>
                        @else
                          —
                        @endif
                      </dd>

                      <dt>Email</dt>
                      <dd>
                        @php $mail = $data->mail ?? ''; @endphp
                        @if(!empty($mail))
                          <a href="mailto:{{ $mail }}">{{ $mail }}</a>
                          <button type="button" class="copy-btn" data-copy="{{ $mail }}" title="Copiar">
                            <i class="flaticon2-copy"></i>
                          </button>
                        @else
                          —
                        @endif
                      </dd>
                    </dl>
                  </div>
                </div>

                <div class="col-lg-6">
                  <div class="vc-card p-4 mb-4">
                    <div class="vc-section-title">Contacto que atiende la visita</div>
                    <dl class="vc-dl">
                      <dt>Nombre</dt>
                      <dd>{{ $data->persona_atiende ?: '—' }}</dd>

                      <dt>Cargo</dt>
                      <dd>{{ $data->cargo_atiende ?: '—' }}</dd>

                      <dt>Teléfono</dt>
                      <dd>
                        @php $tel2 = $data->telefono_atiende ?? ''; @endphp
                        @if(!empty($tel2))
                          <a href="tel:{{ $tel2 }}">{{ $tel2 }}</a>
                          <button type="button" class="copy-btn" data-copy="{{ $tel2 }}" title="Copiar">
                            <i class="flaticon2-copy"></i>
                          </button>
                        @else
                          —
                        @endif
                      </dd>

                      <dt>Email</dt>
                      <dd>
                        @php $mail2 = $data->mail_atiende ?? ''; @endphp
                        @if(!empty($mail2))
                          <a href="mailto:{{ $mail2 }}">{{ $mail2 }}</a>
                          <button type="button" class="copy-btn" data-copy="{{ $mail2 }}" title="Copiar">
                            <i class="flaticon2-copy"></i>
                          </button>
                        @else
                          —
                        @endif
                      </dd>
                    </dl>
                  </div>
                </div>
              </div>
            </div>

          </div> {{-- /tab-content --}}
        </div> {{-- /card-body --}}

        <div class="card-footer">
          <div class="row">
            <div class="col-lg-6">
              <a href="{{ route('cliente.listadocliente') }}" class="btn btn-camel-outline">Cancelar</a>
            </div>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>
@endsection
