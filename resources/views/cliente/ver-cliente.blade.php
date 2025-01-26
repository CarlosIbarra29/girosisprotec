@extends('layouts.app')
@push('scripts')
    <script src="{{ asset('js/cliente/EditarCliente.js') }}"></script>
@endpush
@section('title')
    Ver cliente
@endsection
@section('content')

    <!--begin::Card-->
    <div class="row">
        <div class="col-lg-12">
            <!--begin::Card-->
            <div class="card card-custom gutter-b">
                <div class="card-header">
                    <h3 class="card-title">Ver Cliente</h3>
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
                                            <p>{{ $data->organizacion }}</p>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <label>Nombre comercial</label>
                                        <div class="input-group">
                                            <p>{{ $data->nombre_comercial }}</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-lg-12">
                                        <label>Calle</label>
                                        <div class="input-group">
                                            <p>{{ $data->calle }}</p>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <div class="col-lg-6">
                                        <label>No. Exterior</label>
                                        <div class="input-group">
                                            <p>{{ $data->no_exterior }}</p>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <label>No. Interior</label>
                                        <div class="input-group">
                                            <p>{{ $data->no_interior }}</p>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <div class="col-lg-6">
                                        <label>Delegación</label>
                                        <div class="input-group">
                                            <p>{{ $data->delegacion }}</p>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <label>Giro comercial</label>
                                        <div class="input-group">
                                            <p>{{ $data->giro_comercial }}</p>
                                        </div>
                                    </div>
                                </div>  

                                <div class="form-group row">
                                    <div class="col-lg-6">
                                        <label>Sector</label>
                                        <div class="input-group">
                                            <p>{{ $data->sector }}</p>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <label>No. de personas que laboran en la instalación</label>
                                        <div class="input-group">
                                            <p>{{ $data->no_personal }}</p>
                                        </div>
                                    </div>
                                </div> 
                            </div>


                            <div class="tab-pane fade mt-10" id="kt_tab_pane_2" role="tabpanel" aria-labelledby="kt_tab_pane_2">
                                <div class="form-group row">
                                    <div class="col-lg-6">
                                        <label>Contacto principal</label>
                                        <div class="input-group">
                                            <p>{{ $data->contacto_principal }}</p>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <label>Cargo</label>
                                        <div class="input-group">
                                            <p>{{ $data->cargo }}</p>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <div class="col-lg-6">
                                        <label>Telefono</label>
                                        <div class="input-group">
                                            <p>{{ $data->telefono }}</p>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <label>Email</label>
                                        <div class="input-group">
                                            <p>{{ $data->mail }}</p>
                                        </div>
                                    </div>
                                </div>
                                <hr>

                                <div class="form-group row">
                                    <div class="col-lg-6">
                                        <label>Persona que atiende la visita</label>
                                        <div class="input-group">
                                            <p>{{ $data->persona_atiende }}</p>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <label>Cargo</label>
                                        <div class="input-group">
                                            <p>{{ $data->cargo_atiende }}</p>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <div class="col-lg-6">
                                        <label>Telefono</label>
                                        <div class="input-group">
                                            <p>{{ $data->telefono_atiende }}</p>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <label>Email</label>
                                        <div class="input-group">
                                            <p>{{ $data->mail_atiende }}</p>
                                        </div>
                                    </div>
                                </div>


                            </div>

                        </div>



                    </div>
                    <div class="card-footer">
                        <div class="row">
                            <div class="col-lg-6">
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