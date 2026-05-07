<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8" />
    <title>{{ config('app.name', 'Gestion de riesgos') }} Login</title>
    <meta name="description" content="GIRO for SISPROTEC Sistema de Gestión de Riesgos" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="robots" content="noindex, nofollow" />

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" />

    <link href="{{ asset('theme/assets/css/pages/login/login-2.css') }}" rel="stylesheet" type="text/css" />
    <link rel="shortcut icon" href="{{ asset('theme/assets/media/logos/logogiro2.png') }}" />

    <link href="{{ asset('theme/assets/plugins/global/plugins.bundle.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('theme/assets/plugins/custom/prismjs/prismjs.bundle.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('theme/assets/css/style.bundle.css') }}" rel="stylesheet" type="text/css" />

    <link href="{{ asset('theme/assets/css/themes/layout/header/base/light.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('theme/assets/css/themes/layout/header/menu/light.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('theme/assets/css/themes/layout/brand/dark.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('theme/assets/css/themes/layout/aside/dark.css') }}" rel="stylesheet" type="text/css" />

    <link href="{{ asset('css/principal2.css?v=1.1.1') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('css/login.css') }}" rel="stylesheet" type="text/css" />
</head>

<body id="kt_body"
      class="header-fixed header-mobile-fixed subheader-enabled subheader-fixed aside-enabled aside-fixed aside-minimize-hoverable page-loading">

    <div class="d-flex flex-column flex-root">
        <div class="login login-2 login-signin-on d-flex flex-column flex-lg-row bg-white"
             id="kt_login"
             style="min-height:100vh;">

            {{-- LADO IZQUIERDO VISUAL SOLO DESKTOP --}}
            <div class="d-flex flex-row-fluid bgi-size-cover bgi-position-center bgi-no-repeat hidden-mobile login-illustration">
                <div class="login-showcase">
                    <div class="login-showcase-inner">

                        <div class="login-showcase-brand">
                            <div class="login-showcase-logo">
                                <img src="{{ asset('theme/assets/media/logos/logogiro12.png') }}" alt="GIRO">
                            </div>

                            <div class="login-showcase-brand-copy">
                                <span class="login-showcase-kicker">
                                    <i class="flaticon-shield"></i>
                                    Plataforma de riesgos
                                </span>
                            </div>
                        </div>

                        <h1 class="login-showcase-title">
                            Gestión inteligente
                            de <strong>riesgos</strong>
                            y toma de decisiones
                        </h1>

                        <p class="login-showcase-text">
                            Centraliza escenarios, fortalece controles y transforma información crítica
                            en decisiones más claras, seguras y oportunas dentro de una experiencia
                            corporativa moderna.
                        </p>

                        <div class="login-showcase-pills">
                            <div class="login-showcase-pill">
                                <i class="flaticon-lock"></i>
                                <span>Acceso protegido</span>
                            </div>

                            <div class="login-showcase-pill">
                                <i class="flaticon2-check-mark"></i>
                                <span>Validación segura</span>
                            </div>

                            <div class="login-showcase-pill">
                                <i class="flaticon-network"></i>
                                <span>Entorno corporativo</span>
                            </div>
                        </div>

                        <div class="login-showcase-bottom">
                            <div class="login-showcase-feature">
                                <span class="login-showcase-feature__label">Análisis</span>
                                <span class="login-showcase-feature__text">Visión clara sobre escenarios y criticidad.</span>
                            </div>

                            <div class="login-showcase-feature">
                                <span class="login-showcase-feature__label">Control</span>
                                <span class="login-showcase-feature__text">Seguimiento estructurado y enfoque operativo.</span>
                            </div>

                            <div class="login-showcase-feature">
                                <span class="login-showcase-feature__label">Decisión</span>
                                <span class="login-showcase-feature__text">Información útil para actuar con rapidez.</span>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

            {{-- LADO DERECHO FORMULARIO --}}
            <div class="d-flex login-side">
                <div class="login-side-inner">

                    {{-- Logo superior --}}
                    <a href="javascript:;" class="text-center login-logo">
                        <img src="{{ asset('theme/assets/media/logos/logogiro2.png') }}" alt="GIRO by SISPROTEC">
                    </a>

                    <div class="d-flex flex-column-fluid flex-column flex-center">
                        {{-- Signin --}}
                        <div class="login-form login-signin py-3 w-100">
                            <div class="login-panel">
                                <form class="form"
                                      action="{{ route('login') }}"
                                      method="post"
                                      autocomplete="off"
                                      novalidate="novalidate"
                                      id="kt_login_signin_form">
                                    @csrf

                                    {{-- Título --}}
                                    <div class="text-left pb-6">
                                        <h2 class="login-title">
                                            {{ __('Iniciar Sesión') }}
                                        </h2>
                                        <p class="login-subtitle">
                                            Accede a tu panel de análisis de riesgos.
                                        </p>

                                        @if (count($errors) > 0)
                                            @foreach ($errors->all() as $message)
                                                <div class="alert alert-custom alert-outline-danger fade show mb-4 animate__animated animate__fadeIn"
                                                     role="alert">
                                                    <div class="alert-icon"><i class="flaticon-warning"></i></div>
                                                    <div class="alert-text">{{ $message }}</div>
                                                </div>
                                            @endforeach
                                        @endif
                                    </div>

                                    {{-- Correo --}}
                                    <div class="form-group">
                                        <label class="font-weight-bolder">{{ __('Correo') }}</label>
                                        <input
                                            class="form-control h-auto rounded-lg font-weight-bold"
                                            type="email"
                                            name="email"
                                            autocomplete="off"
                                            value="{{ old('email') }}"
                                            required
                                            autofocus />
                                    </div>

                                    {{-- Contraseña --}}
                                    <div class="form-group">
                                        <label class="font-weight-bolder pt-3">{{ __('Contraseña') }}</label>
                                        <input
                                            class="form-control h-auto rounded-lg"
                                            type="password"
                                            name="password"
                                            autocomplete="off"
                                            required />
                                    </div>

                                    {{-- CAPTCHA --}}
                                    <div class="form-group mt-4">
                                        <div class="d-flex flex-wrap captcha-row">
                                            <div class="captcha">
                                                <span style="display:inline-block; width:160px;">
                                                    {!! captcha_img('flat') !!}
                                                </span>
                                            </div>

                                            <a href="#"
                                               id="refresh-captcha"
                                               class="btn btn-icon btn-outline-secondary btn-circle ml-2">
                                                <i class="flaticon-refresh"></i>
                                            </a>

                                            <blockquote class="blockquote text-left ml-2">
                                                <p class="mb-0 font-size-base">CAPTCHA</p>
                                                <p class="text-muted font-size-sm">No sensible a mayúsculas.</p>
                                            </blockquote>
                                        </div>

                                        <input id="captcha"
                                               type="text"
                                               class="form-control mt-3"
                                               placeholder="Captcha"
                                               name="captcha"
                                               required>
                                    </div>

                                    {{-- Recordar / Recuperar --}}
                                    <div class="form-group d-flex flex-wrap justify-content-between align-items-center mt-3">
                                        <div class="checkbox-inline">
                                            <label class="checkbox checkbox-outline m-0 text-gray-700">
                                                <input type="checkbox" name="remember">
                                                <span></span>Recordar Sesión
                                            </label>
                                        </div>

                                        <a href="javascript:;" id="kt_login_forgot" class="text-hover-primary">
                                            Recuperar Contraseña
                                        </a>
                                    </div>

                                    {{-- Botón --}}
                                    <div class="text-center pt-2">
                                        <button id="kt_login_signin_submit"
                                                class="btn btn-login-green btn-lg btn-block font-weight-bolder font-size-h6 px-8 py-3 my-3">
                                            {{ __('Iniciar Sesión') }}
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>

                        {{-- form vacío que usa metronic --}}
                        <form class="form" novalidate="novalidate" id="kt_login_signup_form"></form>

                        {{-- Forgot --}}
                        <div class="login-form login-forgot pt-11 w-100">
                            <form class="form" novalidate="novalidate" id="kt_login_forgot_form">
                                <div class="text-center pb-8">
                                    <h2 class="font-weight-bolder text-dark font-size-h4 font-size-h1-lg">
                                        Recuperar Contraseña
                                    </h2>
                                    <p class="text-muted font-weight-bold font-size-h6">
                                        Ingresa tu correo para recuperar la contraseña
                                    </p>
                                </div>

                                <div class="form-group">
                                    <input
                                        class="form-control form-control-solid h-auto py-7 px-6 rounded-lg font-size-h6"
                                        type="email"
                                        placeholder="Correo"
                                        name="email"
                                        autocomplete="off" />
                                </div>

                                <div class="form-group d-flex flex-wrap flex-center pb-lg-0 pb-3">
                                    <button type="button"
                                            id="kt_login_forgot_submit"
                                            class="btn btn-primary font-weight-bolder font-size-h6 px-8 py-4 my-3 mx-4">
                                        Recuperar
                                    </button>

                                    <button type="button"
                                            id="kt_login_forgot_cancel"
                                            class="btn btn-light-primary font-weight-bolder font-size-h6 px-8 py-4 my-3 mx-4">
                                        Cancelar
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>

                    {{-- Footer --}}
                    <div class="text-center login-footer mt-4">
                        GIRO for SISPROTEC &mdash; Sistema de Gestión de Riesgos @php echo date('Y'); @endphp
                    </div>
                </div>
            </div>

        </div>
    </div>

    <script>
        var HOST_URL = "";
    </script>

    <script>
        var KTAppSettings = {
            "breakpoints": {"sm":576,"md":768,"lg":992,"xl":1200,"xxl":1400},
            "colors": {
                "theme": {
                    "base": {
                        "white":"#ffffff","primary":"#3699FF","secondary":"#E5EAEE","success":"#1BC5BD",
                        "info":"#8950FC","warning":"#FFA800","danger":"#F64E60","light":"#E4E6EF","dark":"#181C32"
                    },
                    "light": {
                        "white":"#ffffff","primary":"#E1F0FF","secondary":"#EBEDF3","success":"#C9F7F5",
                        "info":"#EEE5FF","warning":"#FFF4DE","danger":"#FFE2E5","light":"#F3F6F9","dark":"#D6D6E0"
                    },
                    "inverse": {
                        "white":"#ffffff","primary":"#ffffff","secondary":"#3F4254","success":"#ffffff",
                        "info":"#ffffff","warning":"#ffffff","danger":"#ffffff","light":"#464E5F","dark":"#ffffff"
                    }
                },
                "gray": {
                    "gray-100":"#F3F6F9","gray-200":"#EBEDF3","gray-300":"#E4E6EF","gray-400":"#D1D3E0",
                    "gray-500":"#B5B5C3","gray-600":"#7E8299","gray-700":"#5E6278","gray-800":"#3F4254","gray-900":"#181C32"
                }
            },
            "font-family":"Poppins"
        };
    </script>

    <script src="{{ asset('theme/assets/plugins/global/plugins.bundle.js') }}"></script>
    <script src="{{ asset('theme/assets/plugins/custom/prismjs/prismjs.bundle.js') }}"></script>
    <script src="{{ asset('theme/assets/js/scripts.bundle.js') }}"></script>
    <script src="{{ asset('theme/assets/js/pages/custom/login/login-general.js') }}"></script>
</body>
</html>