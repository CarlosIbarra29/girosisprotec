@extends('layouts.app')

@section('title')
    Ver Usuario
@endsection
@section('content')

    <!--begin::Card-->
    <div class="row">
        <div class="col-lg-12">
            <!--begin::Card-->
            <div class="card card-custom gutter-b">

                <!--begin::Form-->
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-8 text-center">
                                <img src="/img/administracion-permiso.png" width="420">
                            </div>
                            <div class="col-lg-4 text-center mt-4">
                                <img alt="Logo" class="h-55px brand-logo" src="{{ asset('img/logos/LogoSis.png') }}" />
                                <h1>¡Lo sentimos!</h1>
                                <h4>Tu usuario no tiene permisos para realizar esta acción.</h4>

                                <div class="row mt-4">
                                    <h5>Para mayor información comunicate con un administrador.</h5>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="card-footer">

                    </div>

                <!--end::Form-->
            </div>
            <!--end::Card-->
        </div>
    </div>
    <!--end::Card-->


@endsection