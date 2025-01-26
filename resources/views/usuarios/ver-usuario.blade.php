@extends('layouts.app')

@section('title')
    Ver usuario
@endsection
@section('content')

    <!--begin::Card-->
    <div class="row">
        <div class="col-lg-12">
            <!--begin::Card-->
            <div class="card card-custom gutter-b">
                <div class="card-header">
                    <h3 class="card-title">Ver usuario</h3>
                </div>
                <!--begin::Form-->
                    <div class="card-body">

			            <input type="hidden" name="id" value="{{ $usuario }}">
			            @foreach($userinfo as $user)
			                <div class="row form-group">
			                    <div class="col-lg-6">
			                    	<label>Nombre del usuario</label>
                                    <p>{{ $user->name }}</p>
			                    </div>

			                    <div class="col-lg-6">
			                    	<label>Contraseña</label>
                                    <p>Información no disponible</p>
			                    </div>
			                  </div>

			                  <div class="row form-group">
			                    <div class="col-lg-6">
			                    	<label>Email del usuario</label>
                                    <p>{{ $user->email }}</p>
			                    </div>

			                    <div class="col-lg-6">
			                    	<label>Roles</label>
                                    @foreach($rol as $ub)
                                        @if($ub->id == $user->role)
                                            <p>{{ $ub->name }}</p>
                                        @endif
                                    @endforeach
			                    </div>
			                  </div>

                                <div class="form-group row">
                                    <div class="col-lg-6">
                                        <label>RFC</label>
                                        <div class="input-group">
                                            <p>{{ $user->rfc }}</p>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <label>Teléfono</label>
                                        <div class="input-group">
                                            <p>{{ $user->telefono }}</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-lg-6">
                                        <label>Ubicación en JetVan</label>
                                        <div class="input-group">
                                            <p>{{ $user->ubicacion }}</p>
                                        </div>
                                    </div>
                                </div>
			            @endforeach

                    </div>
                    <div class="card-footer">
                        <div class="row">
                            <div class="col-lg-6">
                                <a href="{{ route('user.catalogousuarios') }}"  class="btn btn-secondary">Regresar</a>
                            </div>
                        </div>
                    </div>

                <!--end::Form-->
            </div>
            <!--end::Card-->
        </div>
    </div>
    <!--end::Card-->

@endsection