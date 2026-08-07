@extends('layouts.app')
@push('scripts')
    <script src="{{ asset('js/cliente/NuevoCliente.js?v=5.0.5') }}"></script>
    <link href="{{ asset('/css/version2/nuevocliente.css?v=2.1.2') }}" rel="stylesheet" type="text/css" />
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

                        {{-- 
                            ==========================================================
                            SEDE - PREPARADO PARA SIGUIENTE ETAPA
                            Actualmente queda oculto y deshabilitado para no afectar
                            productivo ni el guardado actual.
                            Cuando ya esté lista la BD, quitar d-none y disabled.
                            ==========================================================
                        --}}
                        <div class="col-lg-4 d-none" id="wrap_sede_select">
                            <label class="form-label"><b>Sede</b></label>
                            <div class="input-group">
                                <select class="form-control" id="sede_select" name="sede_select" disabled>
                                    <option value="" disabled selected>Selecciona un cliente primero</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>

                <!--begin::Form-->
                <form action="{{ route('cliente.guardarclientenuevo') }}" method="post" id="submit_cliente" enctype="multipart/form-data">
                    @csrf

                    {{-- Hidden preparado para sede. Ahorita deshabilitado para que no afecte --}}
                    <input type="hidden" name="sede_id" id="sede_id" value="" disabled>

                    <div class="card-body gi-tabs">

                        <ul class="nav nav-tabs nav-tabs-line" id="giClienteTabs">
                            <li class="nav-item">
                                <a class="nav-link active" data-toggle="tab" href="#kt_tab_pane_1" data-step="1">
                                    Información del Cliente
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#kt_tab_pane_2" data-step="2">
                                    Contacto por parte del cliente
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#kt_tab_pane_3" data-step="3">
                                    Alcance
                                </a>
                            </li>
                        </ul>

                        <div class="tab-content mt-5" id="myTabContent">

                            {{-- TAB 1 --}}
                            <div class="tab-pane fade show active mt-10" id="kt_tab_pane_1" role="tabpanel" aria-labelledby="kt_tab_pane_1">

                                {{-- 
                                    Nombre de sede preparado para siguiente etapa.
                                    Oculto y deshabilitado por ahora.
                                --}}
                                <div class="form-group row gi-row-gap d-none" id="wrap_sede_nombre">
                                    <div class="col-lg-6">
                                        <div class="f-field">
                                            <input type="text" class="form-control f-control" name="sede_nombre" id="sede_nombre" placeholder=" " disabled>
                                            <label for="sede_nombre" class="f-label">Nombre sede</label>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group row gi-row-gap">
                                    <div class="col-lg-6">
                                        <div class="f-field">
                                            <input type="text" class="form-control f-control" name="nombre_comercial" id="nombre_comercial" placeholder=" " required>
                                            <label for="nombre_comercial" class="f-label">Nombre comercial</label>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="f-field">
                                            <!-- <input type="text" class="form-control" name="organizacion" value="{{ $datacl->organizacion ?? '' }}" id="organizacion" required/> -->
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

                                <!-- <div class="form-group row gi-row-gap">
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
                                </div> -->
                            </div>

                            {{-- TAB 2 --}}
                            <div class="tab-pane fade mt-10" id="kt_tab_pane_2" role="tabpanel" aria-labelledby="kt_tab_pane_2">
                                <div class="form-group row gi-row-gap">
                                    <div class="col-lg-6">
                                        <div class="f-field">
                                            <input type="text" class="form-control f-control" name="contacto_principal" id="contacto_principal" placeholder=" " required>
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
                                            <input type="text" class="form-control f-control js-phone-10" name="telefono" id="telefono" placeholder=" " maxlength="10" inputmode="numeric" pattern="[0-9]{10}" required>
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
                                            <input type="text" class="form-control f-control js-phone-10" name="telefono_atiende" id="telefono_atiende" placeholder=" " maxlength="10" inputmode="numeric" pattern="[0-9]{10}">
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

                            {{-- TAB 3 - ALCANCE --}}
                            <div class="tab-pane fade mt-10" id="kt_tab_pane_3" role="tabpanel" aria-labelledby="kt_tab_pane_3">

                                <div class="gi-scope-section">
                                    <h5 class="gi-section-title">1. Descripción General de la Instalación</h5>

                                    <div class="form-group row gi-row-gap">
                                        <div class="col-lg-6">
                                            <div class="f-field">
                                                <input type="text" class="form-control f-control" name="alcance_nombre_instalacion" id="alcance_nombre_instalacion" placeholder=" ">
                                                <label for="alcance_nombre_instalacion" class="f-label">Nombre de la instalación</label>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="f-field">
                                                <input type="text" class="form-control f-control" name="alcance_procesos_clave" id="alcance_procesos_clave" placeholder=" ">
                                                <label for="alcance_procesos_clave" class="f-label">Procesos Clave</label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group row gi-row-gap">
                                        <div class="col-lg-4">
                                            <div class="f-field">
                                                <input type="number" class="form-control f-control" name="alcance_empleados_administrativos" id="alcance_empleados_administrativos" placeholder=" ">
                                                <label for="alcance_empleados_administrativos" class="f-label">Número de empleados administrativos</label>
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="f-field">
                                                <input type="number" class="form-control f-control" name="alcance_empleados_operativos" id="alcance_empleados_operativos" placeholder=" ">
                                                <label for="alcance_empleados_operativos" class="f-label">Número de empleados operativos</label>
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="f-field f-field-select">
                                                <select class="form-control f-control" name="alcance_horario_operacion" id="alcance_horario_operacion">
                                                    <option value="" selected>Selecciona una opción</option>
                                                    <option value="diurno">Diurno</option>
                                                    <option value="nocturno">Nocturno</option>
                                                    <option value="24_horas">24 horas</option>
                                                </select>
                                                <label for="alcance_horario_operacion" class="f-label">Horarios de operación</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <hr class="gi-hr">

                                <div class="gi-scope-section">
                                    <h5 class="gi-section-title">2. Entorno externo</h5>

                                    <div class="form-group row gi-row-gap">
                                        <div class="col-lg-6">
                                            <div class="gi-simple-field">
                                                <label for="alcance_nivel_inseguridad">Nivel de inseguridad de la zona</label>
                                                <textarea
                                                    class="form-control gi-textarea"
                                                    name="alcance_nivel_inseguridad"
                                                    id="alcance_nivel_inseguridad"
                                                    placeholder="Ejemplo: robos, asaltos, crimen organizado"></textarea>
                                            </div>
                                        </div>

                                        <div class="col-lg-6">
                                            <div class="gi-simple-field">
                                                <label for="alcance_accesibilidad">Accesibilidad</label>
                                                <textarea
                                                    class="form-control gi-textarea"
                                                    name="alcance_accesibilidad"
                                                    id="alcance_accesibilidad"
                                                    placeholder="Ejemplo: carreteras, rutas críticas"></textarea>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group row gi-row-gap">
                                        <div class="col-lg-6">
                                            <div class="gi-simple-field">
                                                <label for="alcance_presencia_autoridades">Presencia de autoridades</label>
                                                <textarea
                                                    class="form-control gi-textarea"
                                                    name="alcance_presencia_autoridades"
                                                    id="alcance_presencia_autoridades"
                                                    placeholder="Describe la presencia de autoridades en la zona"></textarea>
                                            </div>
                                        </div>

                                        <div class="col-lg-6">
                                            <div class="gi-simple-field">
                                                <label for="alcance_factores_sociales_politicos">Factores sociales o políticos</label>
                                                <textarea
                                                    class="form-control gi-textarea"
                                                    name="alcance_factores_sociales_politicos"
                                                    id="alcance_factores_sociales_politicos"
                                                    placeholder="Describe factores sociales o políticos relevantes"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <hr class="gi-hr">

                                <div class="gi-scope-section">
                                    <h5 class="gi-section-title">3. Activos críticos para proteger</h5>

                                    <div class="form-group row gi-row-gap">
                                        <div class="col-lg-12">
                                            <div class="gi-simple-field">
                                                <label for="alcance_activos_criticos">Activos críticos para proteger</label>
                                                <textarea
                                                    class="form-control gi-textarea gi-textarea-large"
                                                    name="alcance_activos_criticos"
                                                    id="alcance_activos_criticos"
                                                    placeholder="Personas: empleados, operadores, custodios&#10;Activos físicos: instalación, vehículos, equipo&#10;Mercancía: alto valor, sensible, regulada&#10;Información: rutas, clientes, operaciones"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <hr class="gi-hr">

                                <div class="gi-scope-section">
                                    <h5 class="gi-section-title">4. Certificaciones actuales en seguridad</h5>

                                    <div class="form-group row gi-row-gap">
                                        <div class="col-lg-12">
                                            <div class="gi-checkbox-grid">
                                                <label class="gi-check-option">
                                                    <input type="checkbox" name="alcance_certificaciones[]" value="ISO 28000">
                                                    <span>ISO 28000</span>
                                                </label>

                                                <label class="gi-check-option">
                                                    <input type="checkbox" name="alcance_certificaciones[]" value="C-TPAT">
                                                    <span>C-TPAT</span>
                                                </label>

                                                <label class="gi-check-option">
                                                    <input type="checkbox" name="alcance_certificaciones[]" value="OEA">
                                                    <span>OEA</span>
                                                </label>

                                                <label class="gi-check-option">
                                                    <input type="checkbox" name="alcance_certificaciones[]" value="BASC">
                                                    <span>BASC</span>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <hr class="gi-hr">

                                <div class="gi-scope-section">
                                    <h5 class="gi-section-title">5. Antecedentes de seguridad en el último año</h5>

                                    <div class="form-group row gi-row-gap">
                                        <div class="col-lg-12">
                                            <div class="gi-simple-field">
                                                <label for="alcance_antecedentes_seguridad">Antecedentes de seguridad en el último año</label>
                                                <textarea
                                                    class="form-control gi-textarea gi-textarea-large"
                                                    name="alcance_antecedentes_seguridad"
                                                    id="alcance_antecedentes_seguridad"
                                                    placeholder="Describe incidentes, eventos, pérdidas, robos, intrusiones o cualquier antecedente relevante del último año"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <hr class="gi-hr">

                                <div class="gi-scope-section">
                                    <h5 class="gi-section-title">6. Fotografías del lugar del análisis</h5>

                                    <div class="form-group row gi-row-gap">
                                        <div class="col-lg-12">
                                            <div class="gi-photo-upload">
                                                <div class="gi-photo-upload-icon" aria-hidden="true">
                                                    <i class="la la-camera"></i>
                                                </div>

                                                <div class="gi-photo-upload-content">
                                                    <label for="alcance_fotos" class="gi-photo-upload-title">
                                                        Agrega hasta 3 fotografías
                                                    </label>
                                                    <p class="gi-photo-upload-text">
                                                        En celular puedes tomar una fotografía o seleccionar imágenes de tu dispositivo.
                                                        En computadora puedes seleccionar imágenes desde tu equipo.
                                                    </p>

                                                    <input
                                                        type="file"
                                                        class="gi-photo-input"
                                                        name="alcance_fotos[]"
                                                        id="alcance_fotos"
                                                        accept="image/*"
                                                        multiple>

                                                    <label for="alcance_fotos" class="gi-photo-upload-button">
                                                        <i class="la la-image"></i>
                                                        Seleccionar fotografías
                                                    </label>

                                                    <span class="gi-photo-upload-help">
                                                        Formatos permitidos: JPG, JPEG y PNG. Máximo 3 fotografías.
                                                    </span>
                                                </div>
                                            </div>

                                            <div id="alcance_fotos_error" class="gi-photo-error d-none"></div>
                                            <div id="alcance_fotos_preview" class="gi-photo-preview"></div>
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

@endsection