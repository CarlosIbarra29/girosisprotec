@extends('layouts.app')
@section('title')
    Mi Perfil
@endsection

@push('scripts')
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <script src="{{ asset('js/perfil/Informacion.js') }}" type="text/javascript"></script>
@endpush

@section('content')
    <div class="d-flex flex-row">

        <!--begin::List-->
        <div class="flex-row-fluid">
            <div class="d-flex flex-column flex-grow-1">

                <!--begin::Row-->
                <div class="row">
                    <div class="col-xl-12">
                        <div class="container">
                            <!--begin::Profile Personal Information-->
                            <div class="d-flex flex-row">
                                <!--begin::Aside-->
                                @include('perfil.seccion.navbar', ['actual_link' => 'informacion'])
                                <!--end::Aside-->
                                <!--begin::Content-->
                                <div class="flex-row-fluid ml-lg-8">
                                    <!--begin::Card-->
                                    <div class="card card-custom card-stretch">
                                        <!--begin::Header-->
                                        <div class="card-header py-3">
                                            <div class="card-title align-items-start flex-column">
                                                <h3 class="font-weight-bolder text-dark pt-2">Información</h3>
                                            </div>
                                        </div>
                                        <!--end::Header-->
                                        <!--begin::Form-->
                                        <form class="form" id="form-informacion" method="POST"
                                            action="{{ route('perfil.actualizarinformacion') }}" enctype="multipart/form-data">
                                            @csrf
                                            <!--begin::Body-->
                                            <div class="card-body">
                                                <div class="row">
                                                    <label class="col-xl-3"></label>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-xl-3 col-lg-3 col-form-label">Imagen de perfil</label>
                                                    <div class="col-lg-9 col-xl-6">
                                                        <div class="image-input image-input-outline" id="kt_profile_avatar">
                                                            <div class="image-input-wrapper"
                                                                style="
                                                                @if($usuario->avatar)
                                                                    background-image: url({{ route('archivo.documentoAvatar', $usuario->avatar) }});
                                                                @else
                                                                    background-color: #f3f3f3;
                                                                @endif
                                                                ">
                                                            </div>
                                                            
                                                            <label
                                                                class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow"
                                                                data-action="change" data-toggle="tooltip" title=""
                                                                data-original-title="Cambiar foto de perfil">
                                                                <i class="fa fa-pen icon-sm text-muted"></i>
                                                                <input type="file" name="profile_avatar"
                                                                    accept=".png, .jpg, .jpeg" />
                                                                <input type="hidden" name="profile_avatar_remove" />
                                                            </label>

                                                            <span
                                                                class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow"
                                                                data-action="cancel" data-toggle="tooltip"
                                                                title="Cancel avatar">
                                                                <i class="ki ki-bold-close icon-xs text-muted"></i>
                                                            </span>
                                                        </div>
                                                        <span class="form-text text-muted">Archivos permitidos: png, jpg,
                                                            jpeg.</span>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-xl-3 col-lg-3 col-form-label">Nombre</label>
                                                    <div class="col-lg-9 col-xl-6">
                                                        <input class="form-control form-control-lg form-control-solid"
                                                            type="text" value="{{ $usuario->name }}" name="name"
                                                            id="name" placeholder="Nombre" required>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <label class="col-xl-3"></label>
                                                    <div class="col-lg-9 col-xl-6">
                                                        <h5 class="font-weight-bold mt-10 mb-6">Información de contacto</h5>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-xl-3 col-lg-3 col-form-label">Teléfono</label>
                                                    <div class="col-lg-9 col-xl-6">
                                                        <div class="input-group input-group-lg input-group-solid">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text">
                                                                    <i class="la la-phone"></i>
                                                                </span>
                                                            </div>
                                                            <input type="text" name="telefono" id="telefono"
                                                                class="form-control form-control-lg form-control-solid"
                                                                value="{{ $usuario->telefono }}" placeholder="Teléfono"
                                                                required>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-xl-3 col-lg-3 col-form-label">Correo
                                                        electrónico</label>
                                                    <div class="col-lg-9 col-xl-6">
                                                        <div class="input-group input-group-lg input-group-solid">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text">
                                                                    <i class="la la-at"></i>
                                                                </span>
                                                            </div>
                                                            <input type="text" name="email" id="email"
                                                                class="form-control form-control-lg form-control-solid"
                                                                value="{{ $usuario->email }}"
                                                                placeholder="Correo electrónico" required>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <label class="col-xl-3"></label>
                                                    <div class="col-lg-9 col-xl-6">
                                                        <h5 class="font-weight-bold mt-10 mb-6">Contraseña</h5>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-xl-3 col-lg-3 col-form-label">Nueva contraseña</label>
                                                    <div class="col-lg-9 col-xl-6">
                                                        <div class="input-group input-group-lg input-group-solid">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text">
                                                                    <i class="la la-lock"></i>
                                                                </span>
                                                            </div>
                                                            <input type="password" name="password1" id="password1"
                                                                class="form-control form-control-lg form-control-solid"
                                                                value="" placeholder="Nueva contraseña">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-xl-3 col-lg-3 col-form-label">Confirmar nueva
                                                        contraseña</label>
                                                    <div class="col-lg-9 col-xl-6">
                                                        <div class="input-group input-group-lg input-group-solid">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text">
                                                                    <i class="la la-lock"></i>
                                                                </span>
                                                            </div>
                                                            <input type="password" name="password2" id="password2"
                                                                class="form-control form-control-lg form-control-solid"
                                                                value="" placeholder="">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!--end::Body-->
                                            <!--begin::Footer-->
                                            <div class="card-footer">
                                                <div class="row">
                                                    <div class="col-md-12 d-flex" style="justify-content: flex-end;">
                                                        <button type="submit"
                                                            class="btn btn-lg btn-primary mr-2">Guardar</button>
                                                    </div>
                                                </div>
                                        </form>
                                        <!--end::Form-->
                                    </div>
                                </div>
                                <!--end::Content-->
                            </div>
                            <!--end::Profile Personal Information-->
                        </div>
                    </div>
                </div>
                <!--end::Row-->
            </div>
        </div>
        <!--end::List-->
    </div>
@endsection
