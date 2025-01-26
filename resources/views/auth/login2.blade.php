{{--<x-guest-layout>--}}
{{--    <x-auth-card>--}}
{{--        <x-slot name="logo">--}}
{{--            <a href="/">--}}
{{--                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />--}}
{{--            </a>--}}
{{--        </x-slot>--}}

{{--        <!-- Session Status -->--}}
{{--        <x-auth-session-status class="mb-4" :status="session('status')" />--}}

{{--        <!-- Validation Errors -->--}}
{{--        <x-auth-validation-errors class="mb-4" :errors="$errors" />--}}

{{--        <form method="POST" action="{{ route('login') }}">--}}
{{--            @csrf--}}

{{--            <!-- Email Address -->--}}
{{--            <div>--}}
{{--                <x-label for="email" :value="__('Email')" />--}}

{{--                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />--}}
{{--            </div>--}}

{{--            <!-- Password -->--}}
{{--            <div class="mt-4">--}}
{{--                <x-label for="password" :value="__('Password')" />--}}

{{--                <x-input id="password" class="block mt-1 w-full"--}}
{{--                                type="password"--}}
{{--                                name="password"--}}
{{--                                required autocomplete="current-password" />--}}
{{--            </div>--}}

{{--            <!-- Remember Me -->--}}
{{--            <div class="block mt-4">--}}
{{--                <label for="remember_me" class="inline-flex items-center">--}}
{{--                    <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" name="remember">--}}
{{--                    <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>--}}
{{--                </label>--}}
{{--            </div>--}}

{{--            <div class="flex items-center justify-end mt-4">--}}
{{--                @if (Route::has('password.request'))--}}
{{--                    <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('password.request') }}">--}}
{{--                        {{ __('Forgot your password?') }}--}}
{{--                    </a>--}}
{{--                @endif--}}

{{--                <x-button class="ml-3">--}}
{{--                    {{ __('Log in') }}--}}
{{--                </x-button>--}}
{{--            </div>--}}
{{--        </form>--}}
{{--    </x-auth-card>--}}
{{--</x-guest-layout>--}}

<!DOCTYPE html>
<html lang="en">
<!--begin::Head-->
<head>
    <title>{{ config('app.name', 'SIAF SISTEMA INTEGRAL DE ADMINISTRACIÓN Y FINANZAS') }} login</title>
    <meta charset="utf-8" />
    <meta name="description" content="SIAF SISTEMA INTEGRAL DE ADMINISTRACIÓN Y FINANZAS" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="shortcut icon" href="{{ asset('theme/assets/media/logos/favicon.ico') }}" />

    <meta name="robots" content="noindex, nofollow" />

    {{-- begin::Fonts --}}
    <!--begin::Fonts-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" />
    <!--end::Fonts-->
    <!--begin::Global Stylesheets Bundle(used by all pages)-->
    <link href="{{ asset('theme/assets/plugins/global/plugins.bundle.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('theme/assets/css/style.bundle.css') }}" rel="stylesheet" type="text/css" />
    <!--end::Global Stylesheets Bundle-->
</head>
<!--end::Head-->
<!--begin::Body-->
<body id="kt_body" class="bg-body">
<!--begin::Main-->
<!--begin::Root-->
<div class="d-flex flex-column flex-root">
    <!--begin::Authentication - Sign-in -->
    <div class="d-flex flex-column flex-column-fluid bgi-position-y-bottom position-x-center bgi-no-repeat bgi-size-contain bgi-attachment-fixed" style="background-image: url({{ asset('theme/assets/media/illustrations/sketchy-1/14.png') }}">
        <!--begin::Content-->
        <div class="d-flex flex-center flex-column flex-column-fluid p-10 pb-lg-20">
            <!--begin::Logo-->
            <a href="/" class="mb-12">
                <img alt="Siaf" src="{{ asset('theme/assets/media/logos/jv.svg') }}" class="h-125px" />
            </a>
            <!--end::Logo-->
            <!--begin::Wrapper-->
            <div class="w-lg-500px bg-body rounded shadow-sm p-10 p-lg-15 mx-auto">
                <!--begin::Form-->
                <form class="form w-100" novalidate="novalidate" id="kt_sign_in_form" method="POST" action="{{ route('login') }}">
                    @csrf
                    <!--begin::Heading-->
                    <div class="text-center mb-10">
                        <!--begin::Title-->
                        <h1 class="text-dark mb-3">{{ __('Iniciar Sesión') }}</h1>
                        <!--end::Title-->

                    </div>
                    <!--begin::Heading-->

                    @if(count($errors) > 0)
                        @foreach( $errors->all() as $message )
                            <div class="mb-10 bg-light-info p-8 rounded"><div class="text-danger">{{ $message }}</div></div>
                        @endforeach
                    @endif

                    <!--begin::Input group-->
                    <div class="fv-row mb-10">
                        <!--begin::Label-->
                        <label class="form-label fs-6 fw-bolder text-dark">{{ __('Correo') }}</label>
                        <!--end::Label-->
                        <!--begin::Input-->
                        <input class="form-control form-control-lg form-control-solid" type="email" name="email" autocomplete="off" value="{{ old('email') }}" required autofocus />
                        <!--end::Input-->
                    </div>
                    <!--end::Input group-->
                    <!--begin::Input group-->
                    <div class="fv-row mb-10">
                        <!--begin::Wrapper-->
                        <div class="d-flex flex-stack mb-2">
                            <!--begin::Label-->
                            <label class="form-label fw-bolder text-dark fs-6 mb-0">{{ __('Contraseña') }}</label>
                            <!--end::Label-->
                            <!--begin::Link-->
                            <a href="#" class="link-primary fs-6 fw-bolder">{{ __('¿Recuperar contraseña?') }}</a>
                            <!--end::Link-->
                        </div>
                        <!--end::Wrapper-->
                        <!--begin::Input-->
                        <input class="form-control form-control-lg form-control-solid" type="password" name="password" autocomplete="off" required />
                        <!--end::Input-->
                    </div>
                    <!--end::Input group-->
                        <!--begin::Input group-->
                        <div class="fv-row mb-10">
                            <label class="form-check form-check-custom form-check-solid">
                                <input class="form-check-input" type="checkbox" name="remember"/>
                                <span class="form-check-label fw-bold text-gray-700 fs-6">{{ __('Recordar Sesión') }}
                                </span>
                            </label>
                        </div>
                        <!--end::Input group-->

                    <!--begin::Actions-->
                    <div class="text-center">
                        <!--begin::Submit button-->
                        <button type="submit" id="kt_sign_in_submit" class="btn btn-lg btn-primary w-100 mb-5">
                            <span class="indicator-label">{{ __('Iniciar Sesión') }}</span>
                            <span class="indicator-progress">{{ __('Espere un momento') }}...
									<span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                        </button>
                        <!--end::Submit button-->

                    </div>
                    <!--end::Actions-->
                </form>
                <!--end::Form-->
            </div>
            <!--end::Wrapper-->
        </div>
        <!--end::Content-->
        <!--begin::Footer-->
        <div class="d-flex flex-center flex-column-auto p-10">
            <!--begin::Links-->
            <div class="d-flex align-items-center fw-bold fs-6">
                <a href="#" class="text-muted text-hover-primary px-2">SIAF SISTEMA INTEGRAL DE ADMINISTRACIÓN Y FINANZAS - COPYRIGHT @php echo date('Y'); @endphp</a>

            </div>
            <!--end::Links-->
        </div>
        <!--end::Footer-->
    </div>
    <!--end::Authentication - Sign-in-->
</div>
<!--end::Root-->
<!--end::Main-->
<!--begin::Javascript-->
<script>var hostUrl = "assets/";</script>
<!--begin::Global Javascript Bundle(used by all pages)-->
<script src="{{ asset('theme/assets/plugins/global/plugins.bundle.js') }}"></script>
<script src="{{ asset('theme/assets/js/scripts.bundle.js') }}"></script>
<!--end::Global Javascript Bundle-->
<!--begin::Page Custom Javascript(used by this page)-->
<script src="{{ asset('theme/assets/js/custom/authentication/sign-in/general.js') }}"></script>
<!--end::Page Custom Javascript-->
<!--end::Javascript-->
</body>
<!--end::Body-->
</html>
