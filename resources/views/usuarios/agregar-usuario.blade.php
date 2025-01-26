@extends('layouts.app')
@push('scripts')
	<script src="{{ asset('js/usuarios/AgregarUsuario.js') }}"></script>
@endpush
@section('title')
    Agregar usuario
@endsection
@section('content')

    <!--begin::Card-->
    <div class="row">
        <div class="col-lg-12">
            <!--begin::Card-->
            <div class="card card-custom gutter-b">
                <div class="card-header">
                    <h3 class="card-title">Agregar usuario</h3>
                </div>
                <!--begin::Form-->
                <form action="{{ route('user.guardarusuario') }}" method="post" id="submit_user">
                    @csrf
                    <div class="card-body">

                                <div class="form-group row">
                                    <div class="col-lg-6">
                                        <label>Nombre del usuario</label>
                                        <div class="input-group">
                                            <input type="text" class="form-control" name="name_user" id="name_user" required onKeyUp="document.getElementById(this.id).value=document.getElementById(this.id).value.toUpperCase()"/>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <label>Contraseña</label>
                                        <div class="input-group">
                                            <input type="password" class="form-control" name="password" id="password" required/>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-lg-6">
                                        <label>Correo electrónico</label>
                                        <div class="input-group">
                                            <input type="text" class="form-control" name="email_user" id="email_user" required onKeyUp="document.getElementById(this.id).value=document.getElementById(this.id).value.toUpperCase()"/>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <label>Roles</label>
                                        <div class="input-group">
                                            <select class="form-control" id="rol" name="rol_user"  required >
                                                <option value="">Selecciona una opción</option>
                                                @foreach($rol as $ub)
                                                    <option value="{{ $ub->id }}" >{{ $ub->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-lg-6">
                                        <label>RFC</label>
                                        <div class="input-group">
                                            <input type="text" class="form-control" name="rfc" id="rfc" onKeyUp="document.getElementById(this.id).value=document.getElementById(this.id).value.toUpperCase()"/>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <label>Teléfono</label>
                                        <div class="input-group">
                                            <input type="number" class="form-control" maxlength="10" name="telefono" id="telefono" required/>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-lg-6">
                                        <label>Dirección</label>
                                        <div class="input-group">
                                            <input type="text" class="form-control" name="ubicacion" id="ubicacion" onKeyUp="document.getElementById(this.id).value=document.getElementById(this.id).value.toUpperCase()"/>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <label>Área personal</label>
                                        <div class="input-group">
                                            <select class="form-control" id="area_personal" name="area_personal"  required >
                                                <option value="">Selecciona una opción</option>
                                                @foreach($areas  as $area)
                                                    <option value="{{ $area->id }}" >{{ $area->nombre_area }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
{{--                                 <div class="form-group row">
                                    <div class="col-lg-6">
                                        <label>Tipo de usuario</label>
                                        <div class="input-group">
                                            <select class="form-control" name="tipo_usuario" id="tipo_usuario" required>
                                                <option value="">Selecciona un opción</option>
                                                @foreach ($tipos_usuario as $tipo)
                                                    <option value="{{ $tipo->id }}">{{ strtoupper($tipo->nombre) }}
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div> --}}



                        <!--end::tabs-->

                    </div>
                    <div class="card-footer">
                        <div class="row">
                            <div class="col-lg-6">
                                <button type="button"  id="btnGuardar" class="btn btn-primary mr-2">Guardar</button>
                                <a href="{{ route('user.catalogousuarios') }}"  class="btn btn-secondary">Cancelar</a>
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