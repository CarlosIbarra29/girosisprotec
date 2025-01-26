<div class="flex-row-auto offcanvas-mobile w-250px w-xxl-350px" id="kt_profile_aside">
    <!--begin::Profile Card-->
    <div class="card card-custom card-stretch">
        <!--begin::Body-->
        <div class="card-body pt-4">
            <!--begin::User-->
            <div class="d-flex align-items-center pt-4">
                <div class="symbol symbol-60 symbol-xxl-100 mr-5 align-self-start align-self-xxl-center">
                    <div class="symbol-label" style="
                        @if($usuario->avatar)
                            background-image:url({{ route('archivo.documentoAvatar', $usuario->avatar) }})
                        @else
                            background-color: #e1e1e1;
                        @endif
                    ">
                    @php 
                    if(!$usuario->avatar){

                        echo '<span class="font-size-h3 font-weight-boldest text-dark-75">'
                                .$usuario->name[0].
                            '</span>';
                    }
                    @endphp    
                </div>
                    <i class="symbol-badge bg-success"></i>
                </div>
                <div>
                    <a class="font-weight-bolder font-size-h5 text-dark-75 text-hover-primary" style="text-transform: capitalize">{{ $usuario->name }}</a>
                    <div class="text-muted">
                        <span>
                        @if($usuario->area_personal_id != 0)
                            @if($usuario->areaPersonal->nombre_area)
                                {{ $usuario->areaPersonal->nombre_area }}
                            @endif
                        @else
                            Sin área asignada
                        @endif
                        </span>
                    </div>
                    <div class="mt-2">
                        <a href="#" onclick="event.preventDefault(); document.getElementById('formLogout').submit();" class="btn btn-sm btn-primary font-weight-bold mr-2 py-2 px-3 px-xxl-5 my-1">Cerrar Sesión</a>
                    </div>
                </div>
            </div>
            <!--end::User-->
            <!--begin::Contact-->
            <div class="py-9">
                <div class="d-flex align-items-center justify-content-between mb-2">
                    <span class="font-weight-bold mr-2">Email:</span>
                    <a href="mailto:{{ $usuario->email }}"
                    class="text-muted text-hover-primary" style="max-width: 150px; overflow: hidden; text-overflow: ellipsis; white-space: nowrap;" data-toggle="tooltip" data-placement="top" data-theme="dark" title="{{ $usuario->email }}"> 
                    {{ $usuario->email }}
                    </a>
                </div>
                <div class="d-flex align-items-center justify-content-between mb-2">
                    <span class="font-weight-bold mr-2">Teléfono:</span>
                    <span class="text-muted">
                        @if($usuario->telefono)
                            <a href="tel:{{ $usuario->telefono }}" class="text-muted text-hover-primary" data-toggle="tooltip" data-placement="top" data-theme="dark" title="{{ $usuario->telefono }}">
                                {{ $usuario->telefono }}
                            </a>
                        @endif
                    </span>
                </div>
            </div>
            <!--end::Contact-->
            <!--begin::Nav-->
            <div class="navi navi-bold navi-hover navi-active navi-link-rounded">
                <div class="navi-item mb-2">
                    <a href="{{ route('perfil.informacion') }}" class="navi-link py-4 active">
                        <span class="navi-icon mr-2">
                            <i class="flaticon2-user"></i>
                        </span>
                        <span class="navi-text font-size-lg">Información</span>
                    </a>
                </div>
            </div>
            <!--end::Nav-->
        </div>
        <!--end::Body-->
    </div>
    <!--end::Profile Card-->
</div>