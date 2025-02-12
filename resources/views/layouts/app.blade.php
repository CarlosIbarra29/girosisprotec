<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<!--begin::Head-->
<head>
    <title>@yield('title') | {{ config('app.name', 'Sistema Integral de Administración') }}</title>
    <meta charset="utf-8" />
    <meta name="description" content="Sistrack for SISPROTEC" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <link rel="shortcut icon" href="{{ asset('theme/assets/media/logos/favicon.ico') }}" />
    <!--begin::Fonts-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" />
    <!--end::Fonts-->

    <!--begin::Page Vendor Stylesheets-->
    <link href="{{ asset('theme/assets/plugins/custom/fullcalendar/fullcalendar.bundle.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('theme/assets/plugins/custom/datatables/datatables.bundle.css') }}" rel="stylesheet" type="text/css" />
    <!--end::Page Vendor Stylesheets-->

    <!--begin::Global Stylesheets Bundle(used by all pages)-->
    <link href="{{ asset('theme/assets/plugins/global/plugins.bundle.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('theme/assets/plugins/custom/prismjs/prismjs.bundle.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('theme/assets/css/style.bundle.css') }}" rel="stylesheet" type="text/css" />
    <!--end::Global Stylesheets Bundle-->

    <!--begin::Layout Themes(used by all pages)-->
    <link href="{{ asset('theme/assets/css/themes/layout/header/base/light.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('theme/assets/css/themes/layout/header/menu/light.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('theme/assets/css/themes/layout/brand/dark.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('theme/assets/css/themes/layout/aside/dark.css') }}" rel="stylesheet" type="text/css" />

    <link href="{{ asset('theme/assets/css/principal/formprincipal.css') }}" rel="stylesheet" type="text/css" />
    <!--end::Layout Themes-->

    <!--begin::Custom Theme(used by all pages)-->
    <link href="{{ asset('css/principal.css') }}" rel="stylesheet" type="text/css" />
    <!--end::Custom Theme-->

    @stack('styles')
</head>

<!--end::Head-->

<!--begin::Body-->
<body id="kt_body" class="header-fixed header-mobile-fixed aside-enabled aside-fixed aside-minimize-hoverable page-loading">
@php $routeName = Route::currentRouteName(); @endphp
<script>
    console.log("{{ $routeName }}");
</script>
<input type="hidden" name="routeName" id="routeName" value="{{ $routeName }}">
<!--begin::Main-->
<!--begin::Header Mobile-->
<div id="kt_header_mobile" class="header-mobile align-items-center header-mobile-fixed">
    <!--begin::Logo-->
    <a href="{{ route('tablero.show') }}">
        {{-- <img alt="Logo" class="h-55px brand-logo" src="{{ asset('img/logos/LogoSis.png') }}" /> --}}
    </a>
    <!--end::Logo-->
    <!--begin::Toolbar-->
    <div class="d-flex align-items-center">
        <!--begin::Aside Mobile Toggle-->
        <button class="btn p-0 burger-icon burger-icon-left" id="kt_aside_mobile_toggle">
            <span></span>
        </button>
        <!--end::Aside Mobile Toggle-->
        <!--begin::Topbar Mobile Toggle-->
        <button class="btn btn-hover-text-primary p-0 ml-2" id="kt_header_mobile_topbar_toggle">
					<span class="svg-icon svg-icon-xl">
						<!--begin::Svg Icon | path:assets/media/svg/icons/General/User.svg-->
						<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
							<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
								<polygon points="0 0 24 0 24 24 0 24" />
								<path d="M12,11 C9.790861,11 8,9.209139 8,7 C8,4.790861 9.790861,3 12,3 C14.209139,3 16,4.790861 16,7 C16,9.209139 14.209139,11 12,11 Z" fill="#000000" fill-rule="nonzero" opacity="0.3" />
								<path d="M3.00065168,20.1992055 C3.38825852,15.4265159 7.26191235,13 11.9833413,13 C16.7712164,13 20.7048837,15.2931929 20.9979143,20.2 C21.0095879,20.3954741 20.9979143,21 20.2466999,21 C16.541124,21 11.0347247,21 3.72750223,21 C3.47671215,21 2.97953825,20.45918 3.00065168,20.1992055 Z" fill="#000000" fill-rule="nonzero" />
							</g>
						</svg>
                        <!--end::Svg Icon-->
					</span>
        </button>
        <!--end::Topbar Mobile Toggle-->
    </div>
    <!--end::Toolbar-->
</div>
<!--end::Header Mobile-->
<div class="d-flex flex-column flex-root">
    <!--begin::Page-->
    <div class="d-flex flex-row flex-column-fluid page">
        <!--begin::Aside-->
        <div class="aside aside-left aside-fixed d-flex flex-column flex-row-auto" id="kt_aside" >
            <!--begin::Brand-->
            <div class="brand flex-column-auto" id="kt_brand" style="height: 85px; background-color: {{ Session::get('menu_color') }} !important" >
                <!--begin::Logo-->
                <a href="{{ route('tablero.show') }}" class="brand-logo">
                    {{-- <img alt="Logo" class="h-55px brand-logo" src="{{ asset('img/logos/LogoSis.png') }}" /> --}}
                </a>
                <!--end::Logo-->
                <!--begin::Toggle-->
                <button class="brand-toggle btn btn-sm px-0" id="kt_aside_toggle">
							<span class="svg-icon svg-icon svg-icon-xl">
								<!--begin::Svg Icon | path:assets/media/svg/icons/Navigation/Angle-double-left.svg-->
								<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
									<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
										<polygon points="0 0 24 0 24 24 0 24" />
										<path d="M5.29288961,6.70710318 C4.90236532,6.31657888 4.90236532,5.68341391 5.29288961,5.29288961 C5.68341391,4.90236532 6.31657888,4.90236532 6.70710318,5.29288961 L12.7071032,11.2928896 C13.0856821,11.6714686 13.0989277,12.281055 12.7371505,12.675721 L7.23715054,18.675721 C6.86395813,19.08284 6.23139076,19.1103429 5.82427177,18.7371505 C5.41715278,18.3639581 5.38964985,17.7313908 5.76284226,17.3242718 L10.6158586,12.0300721 L5.29288961,6.70710318 Z" fill="#000000" fill-rule="nonzero" transform="translate(8.999997, 11.999999) scale(-1, 1) translate(-8.999997, -11.999999)" />
										<path d="M10.7071009,15.7071068 C10.3165766,16.0976311 9.68341162,16.0976311 9.29288733,15.7071068 C8.90236304,15.3165825 8.90236304,14.6834175 9.29288733,14.2928932 L15.2928873,8.29289322 C15.6714663,7.91431428 16.2810527,7.90106866 16.6757187,8.26284586 L22.6757187,13.7628459 C23.0828377,14.1360383 23.1103407,14.7686056 22.7371482,15.1757246 C22.3639558,15.5828436 21.7313885,15.6103465 21.3242695,15.2371541 L16.0300699,10.3841378 L10.7071009,15.7071068 Z" fill="#000000" fill-rule="nonzero" opacity="0.3" transform="translate(15.999997, 11.999999) scale(-1, 1) rotate(-270.000000) translate(-15.999997, -11.999999)" />
									</g>
								</svg>
                                <!--end::Svg Icon-->
							</span>
                </button>
                <!--end::Toolbar-->
            </div>
            <!--end::Brand-->
            <!--begin::Aside Menu-->
            <div class="aside-menu-wrapper flex-column-fluid" id="kt_aside_menu_wrapper">
                <!--begin::Menu Container-->
                <div id="kt_aside_menu" class="aside-menu my-4" data-menu-vertical="1" data-menu-scroll="1" data-menu-dropdown-timeout="500">
                    <!--begin::Menu Nav-->
                    <ul class="menu-nav">
                    {{-- si es cliente --}}
                    @if(Auth::user()->tipo_usuario_id == 1)

                    @elseif(Auth::user()->tipo_usuario_id == 2)

                    @else
                        <li id="menuHome" class="menu-item menu-item-active" aria-haspopup="true">
                            <a href="{{ route('tablero.show') }}" class="menu-link">
                                <i class="flaticon-pie-chart-1 menu-icon"></i>
                                <span class="menu-text">Tablero</span>
                            </a>
                        </li>
                        @if (in_array("1", Session::get('permisos')) || in_array("2", Session::get('permisos')) || in_array("5", Session::get('permisos')) || in_array("6", Session::get('permisos')) )
                            <li id="menuAdministracion" class="menu-item menu-item-submenu" aria-haspopup="true" data-menu-toggle="hover">
                                <a href="javascript:;" class="menu-link menu-toggle">
                                    <i class="flaticon2-user-1 menu-icon"></i>
                                    <span class="menu-text">Administración del sistema</span>
                                    <i class="menu-arrow"></i>
                                </a>
                                <div class="menu-submenu">
                                    <i class="menu-arrow"></i>
                                    <ul class="menu-subnav">

                                        {{-- USUARIOS --}}
                                        @if (in_array("5", Session::get('permisos')) || in_array("6", Session::get('permisos')) )  
                                            <li id="menuUsuarios" class="menu-item menu-item-submenu" aria-haspopup="true" data-menu-toggle="hover">
                                                <a href="javascript:;" class="menu-link menu-toggle">
                                                    <i class="flaticon-users-1 menu-icon"></i>
                                                    <span class="menu-text">Usuarios</span>
                                                    <i class="menu-arrow"></i>
                                                </a>
                                                <div class="menu-submenu">
                                                    <i class="menu-arrow"></i>
                                                    <ul class="menu-subnav">
                                                        @if (in_array("5", Session::get('permisos')))
                                                            <li id="menuListadoUsuarios" class="menu-item" aria-haspopup="true">
                                                                <a href="{{ route('user.catalogousuarios') }}" class="menu-link">
                                                                    <i class="menu-bullet menu-bullet-dot">
                                                                        <span></span>
                                                                    </i>
                                                                    <span class="menu-text">Listado de Usuarios</span>

                                                                </a>
                                                            </li>
                                                        @endif
                                                    </ul>
                                                </div>
                                            </li>
                                        @endif
                                        {{-- ROLES --}}
                                        @if (in_array("1", Session::get('permisos')) || in_array("2", Session::get('permisos')) )
                                            <li id="menuRoles" class="menu-item menu-item-submenu" aria-haspopup="true" data-menu-toggle="hover">
                                                <a href="javascript:;" class="menu-link menu-toggle">
                                                    <i class="flaticon-security menu-icon"></i>
                                                    <span class="menu-text">Paquetes</span>
                                                    <i class="menu-arrow"></i>
                                                </a>
                                                <div class="menu-submenu">
                                                    <i class="menu-arrow"></i>
                                                    <ul class="menu-subnav">
                                                        @if (in_array("1", Session::get('permisos')))
                                                            <li id="menuListadoRoles" class="menu-item" aria-haspopup="true">
                                                                <a href="{{ route('rol.catalogoroles') }}" class="menu-link">
                                                                    <i class="menu-bullet menu-bullet-dot">
                                                                        <span></span>
                                                                    </i>
                                                                    <span class="menu-text">Listado de Paquetes</span>
                                                                </a>
                                                            </li>
                                                        @endif
                                                    </ul>
                                                </div>
                                            </li>
                                        @endif
                                    </ul>
                                </div>
                            </li>
                        @endif             
        {{-- END ADMINISTRACIÓN DEL SISTEMA --}}

                        <li class="menu-item menu-item-submenu" aria-haspopup="true" data-menu-toggle="hover" id="menuGerenciaComercial">
                            <a href="javascript:;" class="menu-link menu-toggle">
                                <i class="flaticon-notepad menu-icon"></i>
                                <span class="menu-text">Información general</span>
                                <i class="menu-arrow"></i>
                            </a>
                            <div class="menu-submenu">
                                <i class="menu-arrow"></i>
                                <ul class="menu-subnav">
                                    {{-- CLIENTES --}}
                                    {{-- @if (in_array("33", Session::get('permisos')) || in_array("34", Session::get('permisos')) )  --}}
                                        <li class="menu-item menu-item-submenu" aria-haspopup="true" data-menu-toggle="hover" id="menuCatalogoClientes">
                                            <a href="javascript:;" class="menu-link menu-toggle">
                                                <i class="flaticon-profile menu-icon"></i>
                                                <span class="menu-text">Catálogo de clientes</span>
                                                <i class="menu-arrow"></i>
                                            </a>
                                            <div class="menu-submenu">
                                                <i class="menu-arrow"></i>
                                                <ul class="menu-subnav">
                                                    <li class="menu-item menu-item-parent" aria-haspopup="true">
                                                        <span class="menu-link">
                                                            <span class="menu-text">Catálogo de clientes</span>
                                                        </span>
                                                    </li>
                                                    {{-- @if (in_array("33", Session::get('permisos')))  --}}
                                                        <li class="menu-item" aria-haspopup="true" id="menuListadoClientes">
                                                            <a href="{{ route('cliente.listadocliente') }}" class="menu-link">
                                                                <i class="menu-bullet menu-bullet-dot">
                                                                    <span></span>
                                                                </i>
                                                                <span class="menu-text">Listado de clientes</span>
                                                            </a>
                                                        </li>
                                                    {{-- @endif --}}
                                                </ul>
                                            </div>
                                        </li>

                                        <li class="menu-item menu-item-submenu" aria-haspopup="true" data-menu-toggle="hover" id="menuCatalogoAnalisis">
                                            <a href="javascript:;" class="menu-link menu-toggle">
                                                <i class="flaticon-profile menu-icon"></i>
                                                <span class="menu-text">Analisis de riesgos</span>
                                                <i class="menu-arrow"></i>
                                            </a>
                                            <div class="menu-submenu">
                                                <i class="menu-arrow"></i>
                                                <ul class="menu-subnav">
                                                    <li class="menu-item menu-item-parent" aria-haspopup="true">
                                                        <span class="menu-link">
                                                            <span class="menu-text">Catálogo de analisis</span>
                                                        </span>
                                                    </li>
                                                    {{-- @if (in_array("33", Session::get('permisos')))  --}}
                                                        <li class="menu-item" aria-haspopup="true" id="menuListadoAnalisis">
                                                            <a href="{{ route('analisis.listadoanalisis') }}" class="menu-link">
                                                                <i class="menu-bullet menu-bullet-dot">
                                                                    <span></span>
                                                                </i>
                                                                <span class="menu-text">Listado de analisis de riesgos</span>
                                                            </a>
                                                        </li>
                                                    {{-- @endif --}}
                                                </ul>
                                            </div>
                                        </li>


                                </ul>
                            </div>
                        </li>


                        <li class="menu-item menu-item-submenu" aria-haspopup="true" data-menu-toggle="hover" id="menuHd">
                            <a href="javascript:;" class="menu-link menu-toggle">
                                <i class="flaticon-notepad menu-icon"></i>
                                <span class="menu-text">Niveles de exposición</span>
                                <i class="menu-arrow"></i>
                            </a>
                            <div class="menu-submenu">
                                <i class="menu-arrow"></i>
                                <ul class="menu-subnav">
                                    {{-- CLIENTES --}}
                                    {{-- @if (in_array("33", Session::get('permisos')) || in_array("34", Session::get('permisos')) )  --}}
                                        <li class="menu-item menu-item-submenu" aria-haspopup="true" data-menu-toggle="hover" id="menuNivelcontrol">
                                            <a href="javascript:;" class="menu-link menu-toggle">
                                                <i class="flaticon-profile menu-icon"></i>
                                                <span class="menu-text">Niveles de exposición</span>
                                                <i class="menu-arrow"></i>
                                            </a>
                                            <div class="menu-submenu">
                                                <i class="menu-arrow"></i>
                                                <ul class="menu-subnav">
                                                    <li class="menu-item menu-item-parent" aria-haspopup="true">
                                                        <span class="menu-link">
                                                            <span class="menu-text">Catálogo de niveles de exposición</span>
                                                        </span>
                                                    </li>
                                                    {{-- @if (in_array("33", Session::get('permisos')))  --}}
                                                        <li class="menu-item" aria-haspopup="true" id="menuListadoNivelcontrol">
                                                            <a href="{{ route('hd.catalogonivelcontrol') }}" class="menu-link">
                                                                <i class="menu-bullet menu-bullet-dot">
                                                                    <span></span>
                                                                </i>
                                                                <span class="menu-text">Listado de nivel de control</span>
                                                            </a>
                                                        </li>
                                                    {{-- @endif --}}
                                                </ul>
                                            </div>
                                        </li>
                                    {{-- @endif --}}


                                </ul>
                            </div>
                        </li>



                        @if (in_array("1", Session::get('permisos')) || in_array("2", Session::get('permisos')) || in_array("5", Session::get('permisos')) || in_array("6", Session::get('permisos')) )
                            <li id="menuLibro" class="menu-item menu-item-submenu" aria-haspopup="true" data-menu-toggle="hover">
                                <a href="javascript:;" class="menu-link menu-toggle">
                                    <i class="flaticon2-user-1 menu-icon"></i>
                                    <span class="menu-text">Libro</span>
                                    <i class="menu-arrow"></i>
                                </a>
                                <div class="menu-submenu">
                                    <i class="menu-arrow"></i>
                                    <ul class="menu-subnav">

                                        {{-- USUARIOS --}}
                                        @if (in_array("5", Session::get('permisos')) || in_array("6", Session::get('permisos')) )  
                                            <li id="menuRiesgos" class="menu-item menu-item-submenu" aria-haspopup="true" data-menu-toggle="hover">
                                                <a href="javascript:;" class="menu-link menu-toggle">
                                                    <i class="flaticon-users-1 menu-icon"></i>
                                                    <span class="menu-text">Libro de riesgos</span>
                                                    <i class="menu-arrow"></i>
                                                </a>
                                                <div class="menu-submenu">
                                                    <i class="menu-arrow"></i>
                                                    <ul class="menu-subnav">
                                                        @if (in_array("5", Session::get('permisos')))
                                                            <li id="menuListadoRiesgos" class="menu-item" aria-haspopup="true">
                                                                <a href="{{ route('libro.listadolibroriesgos') }}" class="menu-link">
                                                                    <i class="menu-bullet menu-bullet-dot">
                                                                        <span></span>
                                                                    </i>
                                                                    <span class="menu-text">Riesgos sociales</span>

                                                                </a>
                                                            </li>
                                                        @endif

                                                        @if (in_array("5", Session::get('permisos')))
                                                            <li id="menuListadoRiesgosTecnologicos" class="menu-item" aria-haspopup="true">
                                                                <a href="{{ route('librotec.listadolibroriesgostec') }}" class="menu-link">
                                                                    <i class="menu-bullet menu-bullet-dot">
                                                                        <span></span>
                                                                    </i>
                                                                    <span class="menu-text">Riesgos tecnológicos</span>

                                                                </a>
                                                            </li>
                                                        @endif

                                                        @if (in_array("5", Session::get('permisos')))
                                                            <li id="menuListadoRiesgosNaturales" class="menu-item" aria-haspopup="true">
                                                                <a href="{{ route('libronat.listadolibroriesgosnat') }}" class="menu-link">
                                                                    <i class="menu-bullet menu-bullet-dot">
                                                                        <span></span>
                                                                    </i>
                                                                    <span class="menu-text">Riesgos naturales</span>

                                                                </a>
                                                            </li>
                                                        @endif

                                                        @if (in_array("5", Session::get('permisos')))
                                                            <li id="menuListadoRiesgosOtros" class="menu-item" aria-haspopup="true">
                                                                <a href="{{ route('librootr.listadonuevosriesgos') }}" class="menu-link">
                                                                    <i class="menu-bullet menu-bullet-dot">
                                                                        <span></span>
                                                                    </i>
                                                                    <span class="menu-text">Otros riesgos</span>
                                                                </a>
                                                            </li>
                                                        @endif

                                                    </ul>
                                                </div>
                                            </li>
                                        @endif

                                    </ul>
                                </div>
                            </li>
                        @endif             
        {{-- END LIBROS DE RIESGOS --}}


                        
        {{-- CATÁLOGOS --}}
                        <li id="menuCatalogos" class="menu-item menu-item-submenu" aria-haspopup="true" data-menu-toggle="hover">
                            <a href="javascript:;" class="menu-link menu-toggle">
                                <i class="flaticon2-folder menu-icon"></i>
                                <span class="menu-text">Catálogos</span>
                                <i class="menu-arrow"></i>
                            </a>
                            <div class="menu-submenu">
                                <i class="menu-arrow"></i>
                                <ul class="menu-subnav">

                            {{-- END  MENU  CLIENTES --}}

                                    {{-- Area Personal --}}
                                    <li id="menuCatalogoArePersonal" class="menu-item menu-item-submenu" aria-haspopup="true" data-menu-toggle="hover">
                                        <a href="javascript:;" class="menu-link menu-toggle">
                                            <i class="menu-bullet menu-bullet-dot">
                                                <span></span>
                                            </i>
                                            <span class="menu-text">Area Personal</span>
                                            <i class="menu-arrow"></i>
                                        </a>
                                        <div class="menu-submenu">
                                            <i class="menu-arrow"></i>
                                            <ul class="menu-subnav">
                                    
                                                <li class="menu-item" aria-haspopup="true" id="menuListadoareapersonal">
                                                    <a href="{{ route('area.listadoarea') }}" class="menu-link">
                                                        <i class="menu-bullet menu-bullet-dot">
                                                            <span></span>
                                                        </i>
                                                        <span class="menu-text">Listado de area personal</span>
                                                    </a>
                                                </li>
                                    
                                            </ul>
                                        </div>
                                    </li>



                        
                                </ul>
                            </div>

                        </li>
                        @endif
                        {{-- Fin de catalogos --}}

                    </ul>
                    <!--end::Menu Nav-->
                </div>
                <!--end::Menu Container-->
            </div>
            <!--end::Aside Menu-->
        </div>
        <!--end::Aside-->
        <!--begin::Wrapper-->
        <div class="d-flex flex-column flex-row-fluid wrapper" id="kt_wrapper">
            <!--begin::Header-->
            <div id="kt_header" class="header header-fixed">
                <!--begin::Container-->
                <div class="container-fluid d-flex align-items-stretch justify-content-between">
                    <!--begin::Header Menu Wrapper-->  
{{-- @foreach (Session::get('permisos') as $product_id)
    {{$product_id}}
@endforeach --}}
                    <div class="header-menu-wrapper header-menu-wrapper-left" id="kt_header_menu_wrapper">
                        <!--begin::Header Menu-->
                        <div id="kt_header_menu" class="header-menu header-menu-mobile header-menu-layout-default">
                            <div class="menu-item menu-item-rel" style="display: grid; place-items: center;">
                                <h3 id="scroll_title" class="text-dark font-weight-bold my-2 ml-2 mr-2" style="display:none;">
                                    @yield('title')
                                </h3>
                            </div>
                        </div>
                        <!--end::Header Menu-->
                    </div>
                    <!--end::Header Menu Wrapper-->
                    <!--begin::Topbar-->
                    <div class="topbar">

                        <!--begin::Notifications-->
                        <div class="dropdown">
                            <!--begin::Toggle-->
                            <div class="topbar-item" data-toggle="dropdown" data-offset="10px,0px">
                                <div class="btn btn-icon btn-clean btn-dropdown btn-lg mr-1 pulse pulse-primary">
											<span class="svg-icon svg-icon-xl svg-icon-primary">
												<!--begin::Svg Icon | path:assets/media/svg/icons/Code/Compiling.svg-->
												<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
													<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
														<rect x="0" y="0" width="24" height="24" />
														<path d="M2.56066017,10.6819805 L4.68198052,8.56066017 C5.26776695,7.97487373 6.21751442,7.97487373 6.80330086,8.56066017 L8.9246212,10.6819805 C9.51040764,11.267767 9.51040764,12.2175144 8.9246212,12.8033009 L6.80330086,14.9246212 C6.21751442,15.5104076 5.26776695,15.5104076 4.68198052,14.9246212 L2.56066017,12.8033009 C1.97487373,12.2175144 1.97487373,11.267767 2.56066017,10.6819805 Z M14.5606602,10.6819805 L16.6819805,8.56066017 C17.267767,7.97487373 18.2175144,7.97487373 18.8033009,8.56066017 L20.9246212,10.6819805 C21.5104076,11.267767 21.5104076,12.2175144 20.9246212,12.8033009 L18.8033009,14.9246212 C18.2175144,15.5104076 17.267767,15.5104076 16.6819805,14.9246212 L14.5606602,12.8033009 C13.9748737,12.2175144 13.9748737,11.267767 14.5606602,10.6819805 Z" fill="#000000" opacity="0.3" />
														<path d="M8.56066017,16.6819805 L10.6819805,14.5606602 C11.267767,13.9748737 12.2175144,13.9748737 12.8033009,14.5606602 L14.9246212,16.6819805 C15.5104076,17.267767 15.5104076,18.2175144 14.9246212,18.8033009 L12.8033009,20.9246212 C12.2175144,21.5104076 11.267767,21.5104076 10.6819805,20.9246212 L8.56066017,18.8033009 C7.97487373,18.2175144 7.97487373,17.267767 8.56066017,16.6819805 Z M8.56066017,4.68198052 L10.6819805,2.56066017 C11.267767,1.97487373 12.2175144,1.97487373 12.8033009,2.56066017 L14.9246212,4.68198052 C15.5104076,5.26776695 15.5104076,6.21751442 14.9246212,6.80330086 L12.8033009,8.9246212 C12.2175144,9.51040764 11.267767,9.51040764 10.6819805,8.9246212 L8.56066017,6.80330086 C7.97487373,6.21751442 7.97487373,5.26776695 8.56066017,4.68198052 Z" fill="#000000" />
													</g>
												</svg>
                                                <!--end::Svg Icon-->
											</span>
                                    <span class="pulse-ring"></span>
                                </div>
                            </div>
                            <!--end::Toggle-->
                            <!--begin::Dropdown-->
                            <div class="dropdown-menu p-0 m-0 dropdown-menu-right dropdown-menu-anim-up dropdown-menu-lg">
                                <form>
                                    <!--begin::Header-->
                                    <div class="d-flex flex-column pt-12 bgi-size-cover bgi-no-repeat rounded-top" style="background-image: url({{ asset('theme/assets/media/misc/bg-1.jpg') }})">
                                        <!--begin::Title-->
                                        <h4 class="d-flex flex-center rounded-top">
                                            <span class="text-white">Notificaciones</span>
                                            <span class="btn btn-text btn-success btn-sm font-weight-bold btn-font-md ml-2">0 Nuevos</span>
                                        </h4>
                                        <!--end::Title-->
                                        <!--begin::Tabs-->
                                        <ul class="nav nav-bold nav-tabs nav-tabs-line nav-tabs-line-3x nav-tabs-line-transparent-white nav-tabs-line-active-border-success mt-3 px-8" role="tablist">
                                            <li class="nav-item">
                                                <a class="nav-link active show" data-toggle="tab" href="#topbar_notifications_notifications">Notificaciones</a>
                                            </li>
                                        </ul>
                                        <!--end::Tabs-->
                                    </div>
                                    <!--end::Header-->
                                    <!--begin::Content-->
                                    <div class="tab-content">
                                        <!--begin::Tabpane-->
                                        <div class="tab-pane active show p-8" id="topbar_notifications_notifications" role="tabpanel">
                                            <!--begin::Scroll-->
                                            <div class="scroll pr-7 mr-n7" data-scroll="true" data-height="300" data-mobile-height="200">
                                                <!--begin::Item-->
                                                <div class="d-flex align-items-center mb-6">

                                                </div>
                                                <!--end::Item-->
                                            </div>
                                            <!--end::Scroll-->
                                            <!--begin::Action-->
                                            <div class="d-flex flex-center pt-7">
                                                <a href="#" class="btn btn-light-primary font-weight-bold text-center">Ver todos</a>
                                            </div>
                                            <!--end::Action-->
                                        </div>
                                        <!--end::Tabpane-->

                                    </div>
                                    <!--end::Content-->
                                </form>
                            </div>
                            <!--end::Dropdown-->
                        </div>
                        <!--end::Notifications-->
                        @if(Auth::user()->tipo_usuario_id != 1 && Auth::user()->tipo_usuario_id != 2)
                        <!--begin::Quick Actions-->
                        <div class="dropdown">
                            <!--begin::Toggle-->
                            <div class="topbar-item" data-toggle="dropdown" data-offset="10px,0px">
                                <div class="btn btn-icon btn-clean btn-dropdown btn-lg mr-1">
											<span class="svg-icon svg-icon-xl svg-icon-primary">
												<!--begin::Svg Icon | path:assets/media/svg/icons/Media/Equalizer.svg-->
												<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
													<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
														<rect x="0" y="0" width="24" height="24" />
														<rect fill="#000000" opacity="0.3" x="13" y="4" width="3" height="16" rx="1.5" />
														<rect fill="#000000" x="8" y="9" width="3" height="11" rx="1.5" />
														<rect fill="#000000" x="18" y="11" width="3" height="9" rx="1.5" />
														<rect fill="#000000" x="3" y="13" width="3" height="7" rx="1.5" />
													</g>
												</svg>
                                                <!--end::Svg Icon-->
											</span>
                                </div>
                            </div>
                            <!--end::Toggle-->
                            <!--begin::Dropdown-->
                            <div class="dropdown-menu p-0 m-0 dropdown-menu-right dropdown-menu-anim-up dropdown-menu-lg">
                                <!--begin:Header-->
                                <div class="d-flex flex-column flex-center py-10 bgi-size-cover bgi-no-repeat rounded-top" style="background-image: url({{ asset('theme/assets/media/misc/bg-1.jpg') }})">
                                    <h4 class="text-white font-weight-bold">Accesos Directos</h4>
                                </div>
                                <!--end:Header-->
                                <!--begin:Nav-->
                                <div class="row row-paddingless">
                                    <!--begin:Item-->
                                    <div class="col-6">
                                        <a href="" class="d-block py-10 px-5 text-center bg-hover-light border-right border-bottom">
													<span class="svg-icon svg-icon-3x svg-icon-success">
														<!--begin::Svg Icon | path:assets/media/svg/icons/Shopping/Euro.svg-->
														<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
															<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
																<rect x="0" y="0" width="24" height="24" />
																<path d="M4.3618034,10.2763932 L4.8618034,9.2763932 C4.94649941,9.10700119 5.11963097,9 5.30901699,9 L15.190983,9 C15.4671254,9 15.690983,9.22385763 15.690983,9.5 C15.690983,9.57762255 15.6729105,9.65417908 15.6381966,9.7236068 L15.1381966,10.7236068 C15.0535006,10.8929988 14.880369,11 14.690983,11 L4.80901699,11 C4.53287462,11 4.30901699,10.7761424 4.30901699,10.5 C4.30901699,10.4223775 4.32708954,10.3458209 4.3618034,10.2763932 Z M14.6381966,13.7236068 L14.1381966,14.7236068 C14.0535006,14.8929988 13.880369,15 13.690983,15 L4.80901699,15 C4.53287462,15 4.30901699,14.7761424 4.30901699,14.5 C4.30901699,14.4223775 4.32708954,14.3458209 4.3618034,14.2763932 L4.8618034,13.2763932 C4.94649941,13.1070012 5.11963097,13 5.30901699,13 L14.190983,13 C14.4671254,13 14.690983,13.2238576 14.690983,13.5 C14.690983,13.5776225 14.6729105,13.6541791 14.6381966,13.7236068 Z" fill="#000000" opacity="0.3" />
																<path d="M17.369,7.618 C16.976998,7.08599734 16.4660031,6.69750122 15.836,6.4525 C15.2059968,6.20749878 14.590003,6.085 13.988,6.085 C13.2179962,6.085 12.5180032,6.2249986 11.888,6.505 C11.2579969,6.7850014 10.7155023,7.16999755 10.2605,7.66 C9.80549773,8.15000245 9.45550123,8.72399671 9.2105,9.382 C8.96549878,10.0400033 8.843,10.7539961 8.843,11.524 C8.843,12.3360041 8.96199881,13.0779966 9.2,13.75 C9.43800119,14.4220034 9.7774978,14.9994976 10.2185,15.4825 C10.6595022,15.9655024 11.1879969,16.3399987 11.804,16.606 C12.4200031,16.8720013 13.1129962,17.005 13.883,17.005 C14.681004,17.005 15.3879969,16.8475016 16.004,16.5325 C16.6200031,16.2174984 17.1169981,15.8010026 17.495,15.283 L19.616,16.774 C18.9579967,17.6000041 18.1530048,18.2404977 17.201,18.6955 C16.2489952,19.1505023 15.1360064,19.378 13.862,19.378 C12.6999942,19.378 11.6325049,19.1855019 10.6595,18.8005 C9.68649514,18.4154981 8.8500035,17.8765035 8.15,17.1835 C7.4499965,16.4904965 6.90400196,15.6645048 6.512,14.7055 C6.11999804,13.7464952 5.924,12.6860058 5.924,11.524 C5.924,10.333994 6.13049794,9.25950479 6.5435,8.3005 C6.95650207,7.34149521 7.5234964,6.52600336 8.2445,5.854 C8.96550361,5.18199664 9.8159951,4.66400182 10.796,4.3 C11.7760049,3.93599818 12.8399943,3.754 13.988,3.754 C14.4640024,3.754 14.9609974,3.79949954 15.479,3.8905 C15.9970026,3.98150045 16.4939976,4.12149906 16.97,4.3105 C17.4460024,4.49950095 17.8939979,4.7339986 18.314,5.014 C18.7340021,5.2940014 19.0909985,5.62999804 19.385,6.022 L17.369,7.618 Z" fill="#000000" />
															</g>
														</svg>
                                                        <!--end::Svg Icon-->
													</span>
                                            <span class="d-block text-dark-75 font-weight-bold font-size-h6 mt-2 mb-1">Custodios</span>
                                            <span class="d-block text-dark-50 font-size-lg">Listado de custodios</span>
                                        </a>
                                    </div>
                                    <!--end:Item-->
                                    <!--begin:Item-->
                                    <div class="col-6">
                                        <a href="{{ route('user.catalogousuarios') }}" class="d-block py-10 px-5 text-center bg-hover-light border-bottom">
													<span class="svg-icon svg-icon-3x svg-icon-success">
														<!--begin::Svg Icon | path:assets/media/svg/icons/Communication/Mail-attachment.svg-->
														<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
															<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
																<rect x="0" y="0" width="24" height="24" />
																<path d="M14.8571499,13 C14.9499122,12.7223297 15,12.4263059 15,12.1190476 L15,6.88095238 C15,5.28984632 13.6568542,4 12,4 L11.7272727,4 C10.2210416,4 9,5.17258756 9,6.61904762 L10.0909091,6.61904762 C10.0909091,5.75117158 10.823534,5.04761905 11.7272727,5.04761905 L12,5.04761905 C13.0543618,5.04761905 13.9090909,5.86843034 13.9090909,6.88095238 L13.9090909,12.1190476 C13.9090909,12.4383379 13.8240964,12.7385644 13.6746497,13 L10.3253503,13 C10.1759036,12.7385644 10.0909091,12.4383379 10.0909091,12.1190476 L10.0909091,9.5 C10.0909091,9.06606198 10.4572216,8.71428571 10.9090909,8.71428571 C11.3609602,8.71428571 11.7272727,9.06606198 11.7272727,9.5 L11.7272727,11.3333333 L12.8181818,11.3333333 L12.8181818,9.5 C12.8181818,8.48747796 11.9634527,7.66666667 10.9090909,7.66666667 C9.85472911,7.66666667 9,8.48747796 9,9.5 L9,12.1190476 C9,12.4263059 9.0500878,12.7223297 9.14285008,13 L6,13 C5.44771525,13 5,12.5522847 5,12 L5,3 C5,2.44771525 5.44771525,2 6,2 L18,2 C18.5522847,2 19,2.44771525 19,3 L19,12 C19,12.5522847 18.5522847,13 18,13 L14.8571499,13 Z" fill="#000000" opacity="0.3" />
																<path d="M9,10.3333333 L9,12.1190476 C9,13.7101537 10.3431458,15 12,15 C13.6568542,15 15,13.7101537 15,12.1190476 L15,10.3333333 L20.2072547,6.57253826 C20.4311176,6.4108595 20.7436609,6.46126971 20.9053396,6.68513259 C20.9668779,6.77033951 21,6.87277228 21,6.97787787 L21,17 C21,18.1045695 20.1045695,19 19,19 L5,19 C3.8954305,19 3,18.1045695 3,17 L3,6.97787787 C3,6.70173549 3.22385763,6.47787787 3.5,6.47787787 C3.60510559,6.47787787 3.70753836,6.51099993 3.79274528,6.57253826 L9,10.3333333 Z M10.0909091,11.1212121 L12,12.5 L13.9090909,11.1212121 L13.9090909,12.1190476 C13.9090909,13.1315697 13.0543618,13.952381 12,13.952381 C10.9456382,13.952381 10.0909091,13.1315697 10.0909091,12.1190476 L10.0909091,11.1212121 Z" fill="#000000" />
															</g>
														</svg>
                                                        <!--end::Svg Icon-->
													</span>
                                            <span class="d-block text-dark-75 font-weight-bold font-size-h6 mt-2 mb-1">Usuarios</span>
                                            <span class="d-block text-dark-50 font-size-lg">Listado de usuarios</span>
                                        </a>
                                    </div>
                                    <!--end:Item-->
                                    <!--begin:Item-->
                                    <div class="col-6">
                                        <a href="{{ route('cliente.listadocliente') }}" class="d-block py-10 px-5 text-center bg-hover-light border-right">
													<span class="svg-icon svg-icon-3x svg-icon-success">
														<!--begin::Svg Icon | path:assets/media/svg/icons/Shopping/Box2.svg-->
														<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
															<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
																<rect x="0" y="0" width="24" height="24" />
																<path d="M4,9.67471899 L10.880262,13.6470401 C10.9543486,13.689814 11.0320333,13.7207107 11.1111111,13.740321 L11.1111111,21.4444444 L4.49070127,17.526473 C4.18655139,17.3464765 4,17.0193034 4,16.6658832 L4,9.67471899 Z M20,9.56911707 L20,16.6658832 C20,17.0193034 19.8134486,17.3464765 19.5092987,17.526473 L12.8888889,21.4444444 L12.8888889,13.6728275 C12.9050191,13.6647696 12.9210067,13.6561758 12.9368301,13.6470401 L20,9.56911707 Z" fill="#000000" />
																<path d="M4.21611835,7.74669402 C4.30015839,7.64056877 4.40623188,7.55087574 4.5299008,7.48500698 L11.5299008,3.75665466 C11.8237589,3.60013944 12.1762411,3.60013944 12.4700992,3.75665466 L19.4700992,7.48500698 C19.5654307,7.53578262 19.6503066,7.60071528 19.7226939,7.67641889 L12.0479413,12.1074394 C11.9974761,12.1365754 11.9509488,12.1699127 11.9085461,12.2067543 C11.8661433,12.1699127 11.819616,12.1365754 11.7691509,12.1074394 L4.21611835,7.74669402 Z" fill="#000000" opacity="0.3" />
															</g>
														</svg>
                                                        <!--end::Svg Icon-->
													</span>
                                            <span class="d-block text-dark-75 font-weight-bold font-size-h6 mt-2 mb-1">Clientes</span>
                                            <span class="d-block text-dark-50 font-size-lg">Listado de clientes</span>
                                        </a>
                                    </div>
                                    <!--end:Item-->
                                    <!--begin:Item-->
                                    <div class="col-6">
                                        <a href="{{ route('rol.catalogoroles') }}" class="d-block py-10 px-5 text-center bg-hover-light">
													<span class="svg-icon svg-icon-3x svg-icon-success">
														<!--begin::Svg Icon | path:assets/media/svg/icons/Communication/Group.svg-->
														<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
															<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
																<polygon points="0 0 24 0 24 24 0 24" />
																<path d="M18,14 C16.3431458,14 15,12.6568542 15,11 C15,9.34314575 16.3431458,8 18,8 C19.6568542,8 21,9.34314575 21,11 C21,12.6568542 19.6568542,14 18,14 Z M9,11 C6.790861,11 5,9.209139 5,7 C5,4.790861 6.790861,3 9,3 C11.209139,3 13,4.790861 13,7 C13,9.209139 11.209139,11 9,11 Z" fill="#000000" fill-rule="nonzero" opacity="0.3" />
																<path d="M17.6011961,15.0006174 C21.0077043,15.0378534 23.7891749,16.7601418 23.9984937,20.4 C24.0069246,20.5466056 23.9984937,21 23.4559499,21 L19.6,21 C19.6,18.7490654 18.8562935,16.6718327 17.6011961,15.0006174 Z M0.00065168429,20.1992055 C0.388258525,15.4265159 4.26191235,13 8.98334134,13 C13.7712164,13 17.7048837,15.2931929 17.9979143,20.2 C18.0095879,20.3954741 17.9979143,21 17.2466999,21 C13.541124,21 8.03472472,21 0.727502227,21 C0.476712155,21 -0.0204617505,20.45918 0.00065168429,20.1992055 Z" fill="#000000" fill-rule="nonzero" />
															</g>
														</svg>
                                                        <!--end::Svg Icon-->
													</span>
                                            <span class="d-block text-dark-75 font-weight-bold font-size-h6 mt-2 mb-1">Roles</span>
                                            <span class="d-block text-dark-50 font-size-lg">Listado de roles</span>
                                        </a>
                                    </div>
                                    <!--end:Item-->
                                </div>
                                <!--end:Nav-->
                            </div>
                            <!--end::Dropdown-->
                        </div>
                        <!--end::Quick Actions-->
                        @endif
                        @if(Auth::user()->tipo_usuario_id != 1 && Auth::user()->tipo_usuario_id != 2)
                        <!--begin::Messages-->
                        <div class="topbar-item">
                            <div class="btn btn-icon btn-clean btn-dropdown btn-lg mr-1 pulse pulse-primary" id="kt_quick_panel_toggle">
                                <a href="">
                                <span class="svg-icon svg-icon-xl svg-icon-primary">
                                    <!--begin::Svg Icon | path:assets/media/svg/icons/Communication/Group-chat.svg-->
                                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                            <rect x="0" y="0" width="24" height="24"></rect>
                                            <path d="M16,15.6315789 L16,12 C16,10.3431458 14.6568542,9 13,9 L6.16183229,9 L6.16183229,5.52631579 C6.16183229,4.13107011 7.29290239,3 8.68814808,3 L20.4776218,3 C21.8728674,3 23.0039375,4.13107011 23.0039375,5.52631579 L23.0039375,13.1052632 L23.0206157,17.786793 C23.0215995,18.0629336 22.7985408,18.2875874 22.5224001,18.2885711 C22.3891754,18.2890457 22.2612702,18.2363324 22.1670655,18.1421277 L19.6565168,15.6315789 L16,15.6315789 Z" fill="#000000"></path>
                                            <path d="M1.98505595,18 L1.98505595,13 C1.98505595,11.8954305 2.88048645,11 3.98505595,11 L11.9850559,11 C13.0896254,11 13.9850559,11.8954305 13.9850559,13 L13.9850559,18 C13.9850559,19.1045695 13.0896254,20 11.9850559,20 L4.10078614,20 L2.85693427,21.1905292 C2.65744295,21.3814685 2.34093638,21.3745358 2.14999706,21.1750444 C2.06092565,21.0819836 2.01120804,20.958136 2.01120804,20.8293182 L2.01120804,18.32426 C1.99400175,18.2187196 1.98505595,18.1104045 1.98505595,18 Z M6.5,14 C6.22385763,14 6,14.2238576 6,14.5 C6,14.7761424 6.22385763,15 6.5,15 L11.5,15 C11.7761424,15 12,14.7761424 12,14.5 C12,14.2238576 11.7761424,14 11.5,14 L6.5,14 Z M9.5,16 C9.22385763,16 9,16.2238576 9,16.5 C9,16.7761424 9.22385763,17 9.5,17 L11.5,17 C11.7761424,17 12,16.7761424 12,16.5 C12,16.2238576 11.7761424,16 11.5,16 L9.5,16 Z" fill="#000000" opacity="0.3"></path>
                                        </g>
                                    </svg>
                                    <!--end::Svg Icon-->
                                </span>
                                </a>
                            </div>
                        </div>
                        <!--end::Messages-->
                        @endif
                        <!--begin::User-->
                        <div class="topbar-item">
                            <div class="btn btn-icon btn-icon-mobile w-auto btn-clean d-flex align-items-center btn-lg px-2" id="kt_quick_user_toggle">
                                <span class="text-dark-50 font-weight-bolder font-size-base d-none d-md-inline mr-3">{{ Auth::user()->name }}</span>
                                <span class="symbol symbol-lg-35 symbol-25 symbol-light-success">
                                @if(Auth::user()->avatar)
                                    <img src="{{ route('archivo.documentoAvatar', Auth::user()->avatar) }}" alt="photo">
                                @else
                                    <span class="symbol-label font-size-h5 font-weight-bold">{{ Auth::user()->name[0] }}</span>
                                @endif
                            </span>
                            </div>
                        </div>
                        <!--end::User-->
                    </div>
                    <!--end::Topbar-->
                </div>
                <!--end::Container-->
            </div>
            <!--end::Header-->
            <!--begin::Content-->
            <div class="content d-flex flex-column flex-column-fluid pb-0" id="kt_content">
                <!--begin::Subheader-->
                <!--end::Subheader-->
                <!--begin::Entry-->
                <div class="d-flex flex-column-fluid pb-5">
                    <!--begin::Container-->
                    <div class="container-fluid">
                        @yield('content')
                    </div>
                    <!--end::Container-->
                </div>
                <!--end::Entry-->
            </div>
            <!--end::Content-->
            <!--begin::Footer-->
            <div class="footer bg-white py-4 d-flex flex-lg-column" id="kt_footer">
                <!--begin::Container-->
                <div class="container-fluid d-flex flex-column flex-md-row align-items-center justify-content-between">
                    <!--begin::Copyright-->
                    <div class="text-dark order-2 order-md-1">
                        <span class="text-muted font-weight-bold mr-2">@php echo date('Y'); @endphp©</span>
                        <a href="#" target="_blank" class="text-dark-75 text-hover-primary">
                        @if(Auth::user()->tipo_usuario_id != 1 && Auth::user()->tipo_usuario_id != 2)
                            Gestion de rriesgos
                        @else
                            Gestion de riesgos
                        @endif
                        </a>
                    </div>
                    <!--end::Copyright-->
                    <!--begin::Nav-->
                    <div class="nav nav-dark">
                        <a href="#" target="_blank" class="nav-link pl-0 pr-5">Soporte</a>
                    @if(Auth::user()->tipo_usuario_id != 1 && Auth::user()->tipo_usuario_id != 2)
                        <a href="#" target="_blank" class="nav-link pl-0 pr-5">Manual de Ayuda</a>
                    @endif
                    </div>
                    <!--end::Nav-->
                </div>
                <!--end::Container-->
            </div>
            <!--end::Footer-->
        </div>
        <!--end::Wrapper-->
    </div>
    <!--end::Page-->
</div>
<!--end::Main-->
<!-- begin::User Panel-->
<div id="kt_quick_user" class="offcanvas offcanvas-right p-10">
    <!--begin::Header-->
    <div class="offcanvas-header d-flex align-items-center justify-content-between pb-5">
        <h3 class="font-weight-bold m-0">Mi Perfil</h3>
        <a href="#" class="btn btn-xs btn-icon btn-light btn-hover-primary" id="kt_quick_user_close">
            <i class="ki ki-close icon-xs text-muted"></i>
        </a>
    </div>
    <!--end::Header-->
    <!--begin::Content-->
    <div class="offcanvas-content pr-5 mr-n5">
        <!--begin::Header-->
        <div class="d-flex align-items-center mt-5">
            <div class="symbol symbol-100 mr-5">
                <div class="symbol-label" style="@if(Auth::user()->avatar)
                background-image:url('{{route('archivo.documentoAvatar', Auth::user()->avatar)}}');background-size: cover;background-position: center;
                @endif
                ">
                    @if(!Auth::user()->avatar)
                        <span class="font-size-h3 font-weight-boldest text-dark-75">{{ Auth::user()->name[0] }}</span>
                    @endif    
            </div>
                <i class="symbol-badge bg-success"></i>
            </div>
            <div class="d-flex flex-column">
                <a href="{{ route('perfil.informacion') }}" class="font-weight-bold font-size-h5 text-dark-75 text-hover-primary">{{ Auth::user()->name }}</a>
                <div class="navi mt-2">
                    <a href="#" class="navi-item">
								<span class="navi-link p-0 pb-2">
									<span class="navi-icon mr-1">
										<span class="svg-icon svg-icon-lg svg-icon-primary">
											<!--begin::Svg Icon | path:assets/media/svg/icons/Communication/Mail-notification.svg-->
											<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
												<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
													<rect x="0" y="0" width="24" height="24" />
													<path d="M21,12.0829584 C20.6747915,12.0283988 20.3407122,12 20,12 C16.6862915,12 14,14.6862915 14,18 C14,18.3407122 14.0283988,18.6747915 14.0829584,19 L5,19 C3.8954305,19 3,18.1045695 3,17 L3,8 C3,6.8954305 3.8954305,6 5,6 L19,6 C20.1045695,6 21,6.8954305 21,8 L21,12.0829584 Z M18.1444251,7.83964668 L12,11.1481833 L5.85557487,7.83964668 C5.4908718,7.6432681 5.03602525,7.77972206 4.83964668,8.14442513 C4.6432681,8.5091282 4.77972206,8.96397475 5.14442513,9.16035332 L11.6444251,12.6603533 C11.8664074,12.7798822 12.1335926,12.7798822 12.3555749,12.6603533 L18.8555749,9.16035332 C19.2202779,8.96397475 19.3567319,8.5091282 19.1603533,8.14442513 C18.9639747,7.77972206 18.5091282,7.6432681 18.1444251,7.83964668 Z" fill="#000000" />
													<circle fill="#000000" opacity="0.3" cx="19.5" cy="17.5" r="2.5" />
												</g>
											</svg>
                                            <!--end::Svg Icon-->
										</span>
									</span>
									<span title="{{ Auth::user()->email }}" class="navi-text text-muted text-hover-primary" style="display: block; white-space: nowrap; overflow: hidden; text-overflow: ellipsis; max-width: 150px;">{{ Auth::user()->email }}</span>
								</span>
                    </a>
                    <form method="POST" action="{{ route('logout') }}" id="formLogout">
                        @csrf
                        <a href="javascript:void(0);" onclick="event.preventDefault(); document.getElementById('formLogout').submit();" class="btn btn-sm btn-light-primary font-weight-bolder py-2 px-5">Salir</a>
                    </form>
                </div>
            </div>
        </div>
        <!--end::Header-->
        <!--begin::Separator-->
        <div class="separator separator-dashed mt-8 mb-5"></div>
        <!--end::Separator-->
        <!--begin::Nav-->
        <div class="navi navi-spacer-x-0 p-0">
            <!--begin::Item-->
            <a href="{{ route('perfil.informacion') }}" class="navi-item">
                <div class="navi-link">
                    <div class="symbol symbol-40 bg-light mr-3">
                        <div class="symbol-label">
							<i class="flaticon2-user text-success icon-lg"></i>
                        </div>
                    </div>
                    <div class="navi-text">
                        <div class="font-weight-bold">Mi Perfil</div>
                        <div class="text-muted">Configuración de mi perfil</div>
                    </div>
                </div>
            </a>
            <!--end:Item-->

        </div>
        <!--end::Nav-->
        <!--begin::Separator-->
        <div class="separator separator-dashed my-7"></div>
        <!--end::Separator-->

    </div>
    <!--end::Content-->
</div>
<!-- end::User Panel-->
<script>var HOST_URL = "https://preview.keenthemes.com/metronic/theme/html/tools/preview";</script>
<!--begin::Global Config(global config for global JS scripts)-->
<script>var KTAppSettings = { "breakpoints": { "sm": 576, "md": 768, "lg": 992, "xl": 1200, "xxl": 1400 }, "colors": { "theme": { "base": { "white": "#ffffff", "primary": "#3699FF", "secondary": "#E5EAEE", "success": "#1BC5BD", "info": "#8950FC", "warning": "#FFA800", "danger": "#F64E60", "light": "#E4E6EF", "dark": "#181C32" }, "light": { "white": "#ffffff", "primary": "#E1F0FF", "secondary": "#EBEDF3", "success": "#C9F7F5", "info": "#EEE5FF", "warning": "#FFF4DE", "danger": "#FFE2E5", "light": "#F3F6F9", "dark": "#D6D6E0" }, "inverse": { "white": "#ffffff", "primary": "#ffffff", "secondary": "#3F4254", "success": "#ffffff", "info": "#ffffff", "warning": "#ffffff", "danger": "#ffffff", "light": "#464E5F", "dark": "#ffffff" } }, "gray": { "gray-100": "#F3F6F9", "gray-200": "#EBEDF3", "gray-300": "#E4E6EF", "gray-400": "#D1D3E0", "gray-500": "#B5B5C3", "gray-600": "#7E8299", "gray-700": "#5E6278", "gray-800": "#3F4254", "gray-900": "#181C32" } }, "font-family": "Poppins" };</script>
<!--end::Global Config-->
<!--begin::Global Theme Bundle(used by all pages)-->
<script src="{{ asset('theme/assets/plugins/global/plugins.bundle.js') }}"></script>
<script src="{{ asset('theme/assets/plugins/custom/prismjs/prismjs.bundle.js') }}"></script>
<script src="{{ asset('theme/assets/js/scripts.bundle.js') }}"></script>
<!--end::Global Theme Bundle-->
<!--begin::Page Vendors(used by this page)-->
<script src="{{ asset('vendors/select2/i18n/es.js') }}"></script>
<script src="{{ asset('theme/assets/plugins/custom/fullcalendar/fullcalendar.bundle.js') }}"></script>
<script src="{{ asset('theme/assets/plugins/custom/datatables/datatables.bundle.js') }}"></script>
<script src="{{ asset('theme/assets/js/pages/crud/forms/widgets/bootstrap-datepicker.js') }}"></script>
<script src="{{ asset('vendors/bootstrap-datepicker/locale/bootstrap-datepicker.es.min.js') }}"></script>
<script src="{{ asset('vendors/formvalidation/js/locales/es_ES.js') }}"></script>
<script src="{{ asset('vendors/formvalidation/js/validacionComun.js') }}"></script>
<script src="{{ asset('theme/assets/js/pages/features/miscellaneous/sweetalert2.js') }}"></script>
<script src="{{ asset('theme/assets/js/pages/crud/forms/widgets/bootstrap-switch.js') }}"></script>
<!--end::Page Vendors-->
<!--begin::Page Scripts(used by this page)-->
@stack('scripts')
<!--end::Page Scripts-->

<!--begin::Custom Scripts(used by all pages)-->
<script src="{{ asset('js/Principal.js') }}"></script>
<!--end::Custom Scripts-->

<!--begin::Page Scripts(Para mostrar los mensajes con toastr)-->
<script>

    @if(Session::has('message'))
        toastr.options =
        {
            "closeButton" : true,
            "progressBar" : true
        }
        toastr.success("{{ session('message') }}");
    @endif
    @if(Session::has('success'))
        toastr.options =
        {
            "closeButton" : true,
            "progressBar" : true
        }
        toastr.success("{{ session('success') }}");
    @endif
    @if(Session::has('error'))
        toastr.options =
        {
            "closeButton" : true,
            "progressBar" : true
        }
        toastr.error("{{ session('error') }}");
    @endif
        @if(Session::has('info'))
        toastr.options =
        {
            "closeButton" : true,
            "progressBar" : true
        }
        toastr.info("{{ session('info') }}");
    @endif
    @if(Session::has('warning'))
        toastr.options =
        {
            "closeButton" : true,
            "progressBar" : true
        }
        toastr.warning("{{ session('warning') }}");
    @endif
</script>
<!--end::Page Scripts(Para mostrar los mensajes con toastr)-->
</body>
<!--end::Body-->
</html>
