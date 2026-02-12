@extends('layouts.app')
@push('scripts')
    <script src="{{ asset('js/cliente/NuevoCliente.js?v=1.0.3') }}"></script>
    <link href="{{ asset('/css/version2/nuevocliente.css') }}" rel="stylesheet" type="text/css" />
@endpush
@section('title')
    Agregar cliente
@endsection

@section('content')

    <!--begin::Card-->
    <div class="row gi-form">
        <div class="col-lg-12">
            <!--begin::Card-->
            <div class="card card-custom gutter-b gi-card">
                <div class="card-header">
                    <h3 class="card-title">
                        <span class="dot"></span>
                        Nuevo Analisis Agrega/Seleciona Cliente
                    </h3>
                </div>

                <div class="col-lg-12 mt-4">
                    <div class="row form-group">
                        <div class="col-lg-8">
                            <label class="form-label"><b>Clientes</b></label>
                            <div class="input-group">
                                <select class="form-control" id="cliente_select" name="cliente_select" required>
                                    <option value="" disabled selected>Selecciona una opción</option>
                                    <option value="0">Nuevo Cliente</option>
                                    @foreach($clientes as $cliente)
                                        <option value="{{ $cliente->id }}">{{ $cliente->nombre_comercial }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                </div>

                <!--begin::Form-->
                <form action="{{ route('cliente.guardarclientenuevo') }}" method="post" id="submit_cliente">
                    @csrf
                    <div class="card-body gi-tabs">

                        <ul class="nav nav-tabs nav-tabs-line">
                            <li class="nav-item">
                                <a class="nav-link active" data-toggle="tab" href="#kt_tab_pane_1">Información del Cliente</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#kt_tab_pane_2">Contacto por parte del cliente</a>
                            </li>
                        </ul>

                        <div class="tab-content mt-5" id="myTabContent">
                            <div class="tab-pane fade show active mt-10" id="kt_tab_pane_1" role="tabpanel" aria-labelledby="kt_tab_pane_1">
                                <div class="form-group row gi-row-gap">
                                    <div class="col-lg-6">
                                        <div class="f-field">
                                            <input type="text" class="form-control f-control" name="nombre_comercial" id="nombre_comercial" placeholder=" " required>
                                            <label for="nombre_comercial" class="f-label">Nombre comercial</label>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="f-field">
                                            
                                            <input type="text" class="form-control f-control" name="organizacion" id="organizacion" placeholder=" " required>
                                            <label for="organizacion" class="f-label">Razón Social</label>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group row gi-row-gap">
                                    <div class="col-lg-12">
                                        <div class="f-field">
                                            <input type="text" class="form-control f-control" name="calle" id="calle" placeholder=" ">
                                            <label for="calle" class="f-label">Calle</label>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group row gi-row-gap">
                                    <div class="col-lg-6">
                                        <div class="f-field">
                                            <input type="text" class="form-control f-control" name="no_exterior" id="no_exterior" placeholder=" ">
                                            <label for="no_exterior" class="f-label">No. Exterior</label>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="f-field">
                                            <input type="text" class="form-control f-control" name="no_interior" id="no_interior" placeholder=" ">
                                            <label for="no_interior" class="f-label">No. Interior</label>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group row gi-row-gap">
                                    <div class="col-lg-6">
                                        <div class="f-field">
                                            <input type="text" class="form-control f-control" name="delegacion" id="delegacion" placeholder=" ">
                                            <label for="delegacion" class="f-label">Delegación</label>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="f-field">
                                            <input type="text" class="form-control f-control" name="giro_comercial" id="giro_comercial" placeholder=" ">
                                            <label for="giro_comercial" class="f-label">Giro comercial</label>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group row gi-row-gap">
                                    <div class="col-lg-6">
                                        <div class="f-field">
                                            <input type="text" class="form-control f-control" name="sector" id="sector" placeholder=" ">
                                            <label for="sector" class="f-label">Creación de valor</label>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="f-field">
                                            <input type="text" class="form-control f-control" name="no_personal" id="no_personal" placeholder=" ">
                                            <label for="no_personal" class="f-label">No. de personas que laboran en la instalación</label>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="tab-pane fade mt-10" id="kt_tab_pane_2" role="tabpanel" aria-labelledby="kt_tab_pane_2">
                                <div class="form-group row gi-row-gap">
                                    <div class="col-lg-6">
                                        <div class="f-field">
                                            <input type="text" class="form-control f-control" name="contacto_principal" id="contacto_principal" placeholder=" ">
                                            <label for="contacto_principal" class="f-label">Contacto principal</label>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="f-field">
                                            <input type="text" class="form-control f-control" name="cargo" id="cargo" placeholder=" ">
                                            <label for="cargo" class="f-label">Cargo</label>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group row gi-row-gap">
                                    <div class="col-lg-6">
                                        <div class="f-field">
                                            <input type="number" class="form-control f-control" name="telefono" id="telefono" placeholder=" ">
                                            <label for="telefono" class="f-label">Telefono</label>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="f-field">
                                            <input type="text" class="form-control f-control" name="mail" id="mail" placeholder=" ">
                                            <label for="mail" class="f-label">Email</label>
                                        </div>
                                    </div>
                                </div>

                                <hr class="gi-hr">

                                <div class="form-group row gi-row-gap">
                                    <div class="col-lg-6">
                                        <div class="f-field">
                                            <input type="text" class="form-control f-control" name="persona_atiende" id="persona_atiende" placeholder=" ">
                                            <label for="persona_atiende" class="f-label">Persona que atiende la visita</label>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="f-field">
                                            <input type="text" class="form-control f-control" name="cargo_atiende" id="cargo_atiende" placeholder=" ">
                                            <label for="cargo_atiende" class="f-label">Cargo</label>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group row gi-row-gap">
                                    <div class="col-lg-6">
                                        <div class="f-field">
                                            <input type="number" class="form-control f-control" name="telefono_atiende" id="telefono_atiende" placeholder=" ">
                                            <label for="telefono_atiende" class="f-label">Telefono</label>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="f-field">
                                            <input type="text" class="form-control f-control" name="mail_atiende" id="mail_atiende" placeholder=" ">
                                            <label for="mail_atiende" class="f-label">Email</label>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>

                    </div>

                    <div class="card-footer gi-footer">
                        <div class="row">
                            <div class="col-lg-6">
                                <button type="button" id="btnGuardar" class="btn btn-primary mr-2" disabled>Siguiente</button>
                                <a href="{{ route('cliente.listadocliente') }}" class="btn btn-secondary">Cancelar</a>
                            </div>
                        </div>
                    </div>
                </form>
                <!--end::Form-->
            </div>
            <!--end::Card-->
        </div>
    </div>
    <!--end::Card-->

    <!-- Script mínimo para habilitar botón según select y soporte de etiquetas flotantes con datos precargados -->
    <script>
      (function(){
        const sel = document.getElementById('cliente_select');
        const btn = document.getElementById('btnGuardar');

        function toggleButton(){
          // Habilita si hay un valor seleccionado (incluye "0")
          btn.disabled = (sel.value === "" || sel.value === null);
        }
        sel.addEventListener('change', toggleButton);
        document.addEventListener('DOMContentLoaded', toggleButton);

        // Mantener "flotante" si hay valores precargados
        function markFilled(el){
          if(!el) return;
          const hasValue = el.value != null && String(el.value).trim() !== '';
          el.classList.toggle('filled', hasValue);
        }
        function scanAll(){
          document.querySelectorAll('.f-control').forEach(markFilled);
        }
        document.addEventListener('input', function(e){
          if(e.target && e.target.classList && e.target.classList.contains('f-control')){
            markFilled(e.target);
          }
        });
        document.addEventListener('DOMContentLoaded', scanAll);
        // Por si llenas vía JS externo al elegir cliente existente
        document.addEventListener('cliente-datos-cargados', scanAll);
      })();
    </script>

@endsection
