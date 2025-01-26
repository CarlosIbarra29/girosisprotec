@extends('layouts.app')
@push('scripts')
	<script src="{{ asset('js/cliente/EditarCliente.js') }}"></script>
@endpush
@section('title')
    Editar cliente
@endsection
@section('content')

    <!--begin::Card-->
    <div class="row">
        <div class="col-lg-12">
            <!--begin::Card-->
            <div class="card card-custom gutter-b">
                <div class="card-header">
                    <h3 class="card-title">Editar Cliente</h3>
                </div>


                <!--begin::Form-->
                <form action="{{ route('cliente.updatecliente') }}" method="post" id="submit_cliente">
                    @csrf
                    <div class="card-body">


                        <ul class="nav nav-tabs nav-tabs-line">
                            <li class="nav-item">
                                <a class="nav-link active" data-toggle="tab" href="#kt_tab_pane_1">Información del Cliente</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#kt_tab_pane_2">Contacto por parte del cliente</a>
                            </li>
                        </ul>

                        <input type="hidden" name="cliente_id" value="{{ $data->id }}">
                        <div class="tab-content mt-5" id="myTabContent">
                            <div class="tab-pane fade show active mt-10" id="kt_tab_pane_1" role="tabpanel" aria-labelledby="kt_tab_pane_1">
                                <div class="form-group row">
                                    <div class="col-lg-6">
                                        <label>Organización</label>
                                        <div class="input-group">
                                            <input type="text" class="form-control" name="organizacion" id="organizacion" value="{{ $data->organizacion }}" required/>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <label>Nombre comercial</label>
                                        <div class="input-group">
                                            <input type="text" class="form-control" name="nombre_comercial" id="nombre_comercial" value="{{ $data->nombre_comercial }}" required/>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-lg-12">
                                        <label>Calle</label>
                                        <div class="input-group">
                                            <input type="text" class="form-control" name="calle" id="calle" value="{{ $data->calle }}"  />
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <div class="col-lg-6">
                                        <label>No. Exterior</label>
                                        <div class="input-group">
                                            <input type="text" class="form-control" name="no_exterior" id="no_exterior" value="{{ $data->no_exterior }}"  />
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <label>No. Interior</label>
                                        <div class="input-group">
                                            <input type="text" class="form-control" name="no_interior" id="no_interior" value="{{ $data->no_interior }}"  />
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <div class="col-lg-6">
                                        <label>Delegación</label>
                                        <div class="input-group">
                                            <input type="text" class="form-control" name="delegacion" id="delegacion" value="{{ $data->delegacion }}"  />
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <label>Giro comercial</label>
                                        <div class="input-group">
                                            <input type="text" class="form-control" name="giro_comercial" id="giro_comercial" value="{{ $data->giro_comercial }}"  />
                                        </div>
                                    </div>
                                </div>  

                                <div class="form-group row">
                                    <div class="col-lg-6">
                                        <label>Sector</label>
                                        <div class="input-group">
                                            <input type="text" class="form-control" name="sector" id="sector" value="{{ $data->sector }}"  />
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <label>No. de personas que laboran en la instalación</label>
                                        <div class="input-group">
                                            <input type="text" class="form-control" name="no_personal" id="no_personal" value="{{ $data->no_personal }}"  />
                                        </div>
                                    </div>
                                </div> 
                            </div>


                            <div class="tab-pane fade mt-10" id="kt_tab_pane_2" role="tabpanel" aria-labelledby="kt_tab_pane_2">
                                <div class="form-group row">
                                    <div class="col-lg-6">
                                        <label>Contacto principal</label>
                                        <div class="input-group">
                                            <input type="text" class="form-control" name="contacto_principal" id="contacto_principal" value="{{ $data->contacto_principal }}" />
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <label>Cargo</label>
                                        <div class="input-group">
                                            <input type="text" class="form-control" name="cargo" id="cargo" value="{{ $data->cargo }}" />
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <div class="col-lg-6">
                                        <label>Telefono</label>
                                        <div class="input-group">
                                            <input type="number" class="form-control" name="telefono" id="telefono" value="{{ $data->telefono }}" />
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <label>Email</label>
                                        <div class="input-group">
                                            <input type="text" class="form-control" name="mail" id="mail" value="{{ $data->mail }}" />
                                        </div>
                                    </div>
                                </div>
                                <hr>

                                <div class="form-group row">
                                    <div class="col-lg-6">
                                        <label>Persona que atiende la visita</label>
                                        <div class="input-group">
                                            <input type="text" class="form-control" name="persona_atiende" id="persona_atiende" value="{{ $data->persona_atiende }}" />
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <label>Cargo</label>
                                        <div class="input-group">
                                            <input type="text" class="form-control" name="cargo_atiende" id="cargo_atiende" value="{{ $data->cargo_atiende }}" />
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <div class="col-lg-6">
                                        <label>Telefono</label>
                                        <div class="input-group">
                                            <input type="number" class="form-control" name="telefono_atiende" id="telefono_atiende" value="{{ $data->telefono_atiende }}" />
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <label>Email</label>
                                        <div class="input-group">
                                            <input type="text" class="form-control" name="mail_atiende" id="mail_atiende" value="{{ $data->mail_atiende }}" />
                                        </div>
                                    </div>
                                </div>


                            </div>

                        </div>



                    </div>
                    <div class="card-footer">
                        <div class="row">
                            <div class="col-lg-6">
                                <button type="button"  id="btnGuardar" class="btn btn-primary mr-2">Guardar</button>
                                <a href="{{ route('cliente.listadocliente') }}"  class="btn btn-secondary">Cancelar</a>
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