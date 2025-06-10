@extends('layouts.app')
@push('scripts')
	<script src="{{ asset('js/cliente/AnalisisRiesgo.js?v=1.01') }}"></script>
@endpush
@section('title')
   Generar analisis de riesgos al cliente "SIS PROTEC"
@endsection
@section('content')


    <!--begin::Card-->
    <div class="row">
        <div class="col-lg-12">
            <!--begin::Card-->
            <div class="card card-custom gutter-b">
                <div class="card-header" {{-- style="background-color: #afafae !important; color: white!important;" --}}>
                    <h3 class="card-title">Editar analisis de riesgos al cliente "SIS PROTEC"</h3>
                     <div class="card-toolbar">
                    <a href="{{ route('analisis.analisiscliente', $id_cliente) }}" class="btn btn-light-primary font-weight-bolder mr-3 ml-3">
                    <i class="la la-arrow-left"></i>Regresar</a>
                </div>
                </div>
                <input type='hidden' id='url_alcances' value='{{ route('analisis.obteneralcances') }}'>
                <!--begin::Form-->
                    <div class="card-body">

                        <div class="card card-custom gutter-b">
                            <div class="card-body">
                                <div class="row form-group">
                                    <div class="col-lg-8">
                                        <label><b>Punto normativo</b></label>
                                        <div class="input-group">
                                            @foreach($alcances as $alcanec)
                                                @if($ana_riesgo->libror_barreras_perimetrales_id == $alcanec->id)
                                                    <p>{{ $alcanec->alcance }}</p>
                                                @endif
                                            @endforeach
                                        </div>
                                    </div>
                                    <div class="col-lg-4 mt-2 text-center">
                                    </div>

                                </div>
                {{-- ENvoiar Formulario  --}}
                <form action="{{ route('analisis.guardarriesgo') }}" method="post" id="submit_analisis_social">  
                                @csrf

                                    <div class="row form-group">
                                            <div class="col-lg-6">
                                                <label for="observaciones"><b>Punto de control</b></label>
                                                <textarea class="form-control gray_area" name="punto_control" placeholder="" id="punto_control" rows="2">{{ $ana_riesgo->punto_control }}</textarea>
                                            </div>
                                
    
                                    </div>

                                    <div class="row form-group">
                                            <div class="col-lg-6">
                                                <label for="observaciones"><b>Factor de riesgo</b></label>
                                                <textarea class="form-control gray_area" name="factor_riesgo" placeholder="" id="factor_riesgo" rows="2">{{ $ana_riesgo->factores_riesgo }}</textarea>
                                                {{-- <input type="hidden" name="id_alcance_seleccionado" value="{{ $alcance_social->id }}"> --}}

                                            </div>
                                            <div class="col-lg-6">
                                                <label for="observaciones"><b>Evento de riesgo</b></label>
                                                <textarea class="form-control gray_area" name="evento_riesgo" placeholder="" id="evento_riesgo" rows="2">{{ $ana_riesgo->eventos_riesgo }}</textarea>
                                            </div>

                                    </div>

                                    <div class="row form-group">
                                        <div class="col-lg-4">
                                            <label for="observaciones"><b>Recursos Expuestos (Activos)</b></label>
                                            <input type="text" class="form-control gray_area" name="recursos_expuestos" id="recursos_expuestos" value="{{ $ana_riesgo->recursos_expuestos }}"/>
                                        </div>
                                        <div class="col-lg-4">
                                            <label for="observaciones"><b>Fuente de Riesgo</b></label>
                                            <input type="text" class="form-control gray_area" name="fuente_riesgo" id="fuente_riesgo" value="{{ $ana_riesgo->fuente_riesgo }}"/>
                                        </div>
                                        <div class="col-lg-4">
                                            <label for="observaciones"><b>Ubicación del riesgo</b></label>
                                            <input type="text" class="form-control gray_area" name="ubicacion_riesgo" id="ubicacion_riesgo" value="{{ $ana_riesgo->ubicacion_riesgo }}"/>
                                        </div>
                                    </div>

                            </div>
                        </div>

                            <div class="row  hr-container">
                                <span><h3><b>Controles</b></h3></span>
                            </div>

                            <div class="card card-custom gutter-b">
                                <div class="card-body">
                                    <div class="row form-group">
                                        <div class="col-lg-4">
                                            <label><b>Nivel de control</b></label>
                                            <div class="input-group">
                                                <select class="form-control gray_area" id="nivel_control" name="nivel_control"  required >
                                                    <option value="1" @selected($ana_riesgo->hd_nivel_control_id == 1)>Inoperante</option>
                                                    <option value="2" @selected($ana_riesgo->hd_nivel_control_id == 2)>Sin control</option>
                                                    <option value="3" @selected($ana_riesgo->hd_nivel_control_id == 3)>Deficiente</option>
                                                    <option value="4" @selected($ana_riesgo->hd_nivel_control_id == 4)>Regular</option>
                                                    <option value="5" @selected($ana_riesgo->hd_nivel_control_id == 5)>Eficiente</option>
                                                    <option value="6" @selected($ana_riesgo->hd_nivel_control_id == 6)>Optimo</option>
                                                </select>
                                            </div>
                                        </div>
                                        @if($ana_riesgo->hd_nivel_control_id == 1)
                                            <div class="col-lg-8 mt-2 nivel_inoperante">
                                                <label><b>Descripción</b></label>
                                                <textarea class="form-control gray_area" name="descripción" placeholder="" id="descripcion" rows="2">Cuenta con los criterios de aplicación pero no funciona</textarea>
                                            </div>
                                            <div class="col-lg-8 mt-2 oculto nivel_sincontrol">
                                                <label><b>Descripción</b></label>
                                                <textarea class="form-control gray_area" name="descripción" placeholder="" id="descripcion" rows="2">Adquirir la licencia de Windows más reciente con el fin de no vulnerar la información de la empresa.</textarea>
                                            </div>
                                            <div class="col-lg-8 mt-2 oculto nivel_deficiente">
                                                <label><b>Descripción</b></label>
                                                <textarea class="form-control gray_area" name="descripción" placeholder="" id="descripcion" rows="2">Cuenta con los criterios de aplicación pero no son los adecuados para la instalación.</textarea>
                                            </div>
                                            <div class="col-lg-8 mt-2 oculto regular">
                                                <label><b>Descripción</b></label>
                                                <textarea class="form-control gray_area" name="descripción" placeholder="" id="descripcion" rows="2">Cuenta con los criterios de aplicación pero existen posibilidades de mejora.</textarea>
                                            </div>
                                            <div class="col-lg-8 mt-2 oculto eficiente">
                                                <label><b>Descripción</b></label>
                                                <textarea class="form-control gray_area" name="descripción" placeholder="" id="descripcion" rows="2">Los criterios de aplicación son los adecuados a la instalación.</textarea>
                                            </div>
                                            <div class="col-lg-8 mt-2 oculto optimo">
                                                <label><b>Descripción</b></label>
                                                <textarea class="form-control gray_area" name="descripción" placeholder="" id="descripcion" rows="2">Excede los criterios de aplicación.</textarea>
                                            </div>
                                        @endif


                                        @if($ana_riesgo->hd_nivel_control_id == 2)
                                            <div class="col-lg-8 mt-2 oculto nivel_inoperante">
                                                <label><b>Descripción</b></label>
                                                <textarea class="form-control gray_area" name="descripción" placeholder="" id="descripcion" rows="2">Cuenta con los criterios de aplicación pero no funciona</textarea>
                                            </div>
                                            <div class="col-lg-8 mt-2  nivel_sincontrol">
                                                <label><b>Descripción</b></label>
                                                <textarea class="form-control gray_area" name="descripción" placeholder="" id="descripcion" rows="2">Adquirir la licencia de Windows más reciente con el fin de no vulnerar la información de la empresa.</textarea>
                                            </div>
                                            <div class="col-lg-8 mt-2 oculto nivel_deficiente">
                                                <label><b>Descripción</b></label>
                                                <textarea class="form-control gray_area" name="descripción" placeholder="" id="descripcion" rows="2">Cuenta con los criterios de aplicación pero no son los adecuados para la instalación.</textarea>
                                            </div>
                                            <div class="col-lg-8 mt-2 oculto regular">
                                                <label><b>Descripción</b></label>
                                                <textarea class="form-control gray_area" name="descripción" placeholder="" id="descripcion" rows="2">Cuenta con los criterios de aplicación pero existen posibilidades de mejora.</textarea>
                                            </div>
                                            <div class="col-lg-8 mt-2 oculto eficiente">
                                                <label><b>Descripción</b></label>
                                                <textarea class="form-control gray_area" name="descripción" placeholder="" id="descripcion" rows="2">Los criterios de aplicación son los adecuados a la instalación.</textarea>
                                            </div>
                                            <div class="col-lg-8 mt-2 oculto optimo">
                                                <label><b>Descripción</b></label>
                                                <textarea class="form-control gray_area" name="descripción" placeholder="" id="descripcion" rows="2">Excede los criterios de aplicación.</textarea>
                                            </div>
                                        @endif

                                        @if($ana_riesgo->hd_nivel_control_id == 3)
                                            <div class="col-lg-8 mt-2 oculto nivel_inoperante">
                                                <label><b>Descripción</b></label>
                                                <textarea class="form-control gray_area" name="descripción" placeholder="" id="descripcion" rows="2">Cuenta con los criterios de aplicación pero no funciona</textarea>
                                            </div>
                                            <div class="col-lg-8 mt-2 oculto nivel_sincontrol">
                                                <label><b>Descripción</b></label>
                                                <textarea class="form-control gray_area" name="descripción" placeholder="" id="descripcion" rows="2">Adquirir la licencia de Windows más reciente con el fin de no vulnerar la información de la empresa.</textarea>
                                            </div>
                                            <div class="col-lg-8 mt-2  nivel_deficiente">
                                                <label><b>Descripción</b></label>
                                                <textarea class="form-control gray_area" name="descripción" placeholder="" id="descripcion" rows="2">Cuenta con los criterios de aplicación pero no son los adecuados para la instalación.</textarea>
                                            </div>
                                            <div class="col-lg-8 mt-2 oculto regular">
                                                <label><b>Descripción</b></label>
                                                <textarea class="form-control gray_area" name="descripción" placeholder="" id="descripcion" rows="2">Cuenta con los criterios de aplicación pero existen posibilidades de mejora.</textarea>
                                            </div>
                                            <div class="col-lg-8 mt-2 oculto eficiente">
                                                <label><b>Descripción</b></label>
                                                <textarea class="form-control gray_area" name="descripción" placeholder="" id="descripcion" rows="2">Los criterios de aplicación son los adecuados a la instalación.</textarea>
                                            </div>
                                            <div class="col-lg-8 mt-2 oculto optimo">
                                                <label><b>Descripción</b></label>
                                                <textarea class="form-control gray_area" name="descripción" placeholder="" id="descripcion" rows="2">Excede los criterios de aplicación.</textarea>
                                            </div>
                                        @endif

                                        @if($ana_riesgo->hd_nivel_control_id == 4)
                                            <div class="col-lg-8 mt-2 oculto nivel_inoperante">
                                                <label><b>Descripción</b></label>
                                                <textarea class="form-control gray_area" name="descripción" placeholder="" id="descripcion" rows="2">Cuenta con los criterios de aplicación pero no funciona</textarea>
                                            </div>
                                            <div class="col-lg-8 mt-2 oculto nivel_sincontrol">
                                                <label><b>Descripción</b></label>
                                                <textarea class="form-control gray_area" name="descripción" placeholder="" id="descripcion" rows="2">Adquirir la licencia de Windows más reciente con el fin de no vulnerar la información de la empresa.</textarea>
                                            </div>
                                            <div class="col-lg-8 mt-2 oculto nivel_deficiente">
                                                <label><b>Descripción</b></label>
                                                <textarea class="form-control gray_area" name="descripción" placeholder="" id="descripcion" rows="2">Cuenta con los criterios de aplicación pero no son los adecuados para la instalación.</textarea>
                                            </div>
                                            <div class="col-lg-8 mt-2  regular">
                                                <label><b>Descripción</b></label>
                                                <textarea class="form-control gray_area" name="descripción" placeholder="" id="descripcion" rows="2">Cuenta con los criterios de aplicación pero existen posibilidades de mejora.</textarea>
                                            </div>
                                            <div class="col-lg-8 mt-2 oculto eficiente">
                                                <label><b>Descripción</b></label>
                                                <textarea class="form-control gray_area" name="descripción" placeholder="" id="descripcion" rows="2">Los criterios de aplicación son los adecuados a la instalación.</textarea>
                                            </div>
                                            <div class="col-lg-8 mt-2 oculto optimo">
                                                <label><b>Descripción</b></label>
                                                <textarea class="form-control gray_area" name="descripción" placeholder="" id="descripcion" rows="2">Excede los criterios de aplicación.</textarea>
                                            </div>
                                        @endif

                                        @if($ana_riesgo->hd_nivel_control_id == 5)
                                            <div class="col-lg-8 mt-2 oculto nivel_inoperante">
                                                <label><b>Descripción</b></label>
                                                <textarea class="form-control gray_area" name="descripción" placeholder="" id="descripcion" rows="2">Cuenta con los criterios de aplicación pero no funciona</textarea>
                                            </div>
                                            <div class="col-lg-8 mt-2 oculto nivel_sincontrol">
                                                <label><b>Descripción</b></label>
                                                <textarea class="form-control gray_area" name="descripción" placeholder="" id="descripcion" rows="2">Adquirir la licencia de Windows más reciente con el fin de no vulnerar la información de la empresa.</textarea>
                                            </div>
                                            <div class="col-lg-8 mt-2 oculto nivel_deficiente">
                                                <label><b>Descripción</b></label>
                                                <textarea class="form-control gray_area" name="descripción" placeholder="" id="descripcion" rows="2">Cuenta con los criterios de aplicación pero no son los adecuados para la instalación.</textarea>
                                            </div>
                                            <div class="col-lg-8 mt-2 oculto regular">
                                                <label><b>Descripción</b></label>
                                                <textarea class="form-control gray_area" name="descripción" placeholder="" id="descripcion" rows="2">Cuenta con los criterios de aplicación pero existen posibilidades de mejora.</textarea>
                                            </div>
                                            <div class="col-lg-8 mt-2  eficiente">
                                                <label><b>Descripción</b></label>
                                                <textarea class="form-control gray_area" name="descripción" placeholder="" id="descripcion" rows="2">Los criterios de aplicación son los adecuados a la instalación.</textarea>
                                            </div>
                                            <div class="col-lg-8 mt-2 oculto optimo">
                                                <label><b>Descripción</b></label>
                                                <textarea class="form-control gray_area" name="descripción" placeholder="" id="descripcion" rows="2">Excede los criterios de aplicación.</textarea>
                                            </div>
                                        @endif

                                        @if($ana_riesgo->hd_nivel_control_id == 6)
                                            <div class="col-lg-8 mt-2 oculto nivel_inoperante">
                                                <label><b>Descripción</b></label>
                                                <textarea class="form-control gray_area" name="descripción" placeholder="" id="descripcion" rows="2">Cuenta con los criterios de aplicación pero no funciona</textarea>
                                            </div>
                                            <div class="col-lg-8 mt-2 oculto nivel_sincontrol">
                                                <label><b>Descripción</b></label>
                                                <textarea class="form-control gray_area" name="descripción" placeholder="" id="descripcion" rows="2">Adquirir la licencia de Windows más reciente con el fin de no vulnerar la información de la empresa.</textarea>
                                            </div>
                                            <div class="col-lg-8 mt-2 oculto nivel_deficiente">
                                                <label><b>Descripción</b></label>
                                                <textarea class="form-control gray_area" name="descripción" placeholder="" id="descripcion" rows="2">Cuenta con los criterios de aplicación pero no son los adecuados para la instalación.</textarea>
                                            </div>
                                            <div class="col-lg-8 mt-2 oculto regular">
                                                <label><b>Descripción</b></label>
                                                <textarea class="form-control gray_area" name="descripción" placeholder="" id="descripcion" rows="2">Cuenta con los criterios de aplicación pero existen posibilidades de mejora.</textarea>
                                            </div>
                                            <div class="col-lg-8 mt-2 oculto eficiente">
                                                <label><b>Descripción</b></label>
                                                <textarea class="form-control gray_area" name="descripción" placeholder="" id="descripcion" rows="2">Los criterios de aplicación son los adecuados a la instalación.</textarea>
                                            </div>
                                            <div class="col-lg-8 mt-2  optimo">
                                                <label><b>Descripción</b></label>
                                                <textarea class="form-control gray_area" name="descripción" placeholder="" id="descripcion" rows="2">Excede los criterios de aplicación.</textarea>
                                            </div>
                                        @endif

                                    </div>

                                    <div class="row form-group">
                                        <div class="col-lg-12">
                                            <label for="observaciones"><b>Medidas de Prevención y Protección Actuales</b></label>
                                            <textarea class="form-control gray_area" name="medidas_prevencion" placeholder="" id="generales_unidad" rows="5">{{ $ana_riesgo->medidas_prevencion }}</textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row  hr-container">
                                
                                <span><h3><b>Deficiencias e Impactos</b></h3></span>
                                
                            </div>
                            
                            <div class="card card-custom gutter-b">
                                <div class="card-body">
                                   
                                    <div class="row form-group">
                                        <div class="col-lg-4 degradado-border-right" >
                                            <label for="observaciones"><b style="font-size: 15px;">Deficiencia medidas de seguridad</b></label><br>
                                            <div class="row">
                                                <div class="col-lg-6">
                                                    <div class="checkbox-list">
                                                        <label class="checkbox">
                                                            <input type="checkbox" value="0" name="deficiencia_medida_s[]" {{(in_array(0 , $array_deficiencia)) ? 'checked' : ''}} />
                                                            <span></span>
                                                            Pasivas
                                                        </label>
                                                        <label class="checkbox">
                                                            <input type="checkbox" value="1"  name="deficiencia_medida_s[]" {{(in_array(1 , $array_deficiencia)) ? 'checked' : ''}} />
                                                            <span></span>
                                                            Activas
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                        <div class="checkbox-list">
                                                            <label class="checkbox">
                                                                <input type="checkbox" value="2" name="deficiencia_medida_s[]" {{(in_array(2 , $array_deficiencia)) ? 'checked' : ''}} />
                                                                <span></span>
                                                                Humanas
                                                            </label>
                                                            <label class="checkbox">
                                                                <input type="checkbox" value="3" name="deficiencia_medida_s[]" {{(in_array(3 , $array_deficiencia)) ? 'checked' : ''}} />
                                                                <span></span>
                                                                Organizativas
                                                            </label>
                                                        </div>
                                                </div>
                                            </div>

                                        </div>
                                        <div class="col-lg-8">
                                            <label for="observaciones"><b style="font-size: 17px;">Impactos al Negocio</b></label><br>

                                            <div class="row form-group">
                                                <div class="col-lg-12">
                                                    <div class="form-group">
                                                        <div class="row">
                                                            <div class="col-lg-3">
                                                                <div class="checkbox-list">
                                                                    <label class="checkbox">
                                                                        <input type="checkbox" value="0" name="impactos_negocio[]" {{(in_array(0 , $array_impacto)) ? 'checked' : ''}}/>
                                                                        <span></span>
                                                                        Patrimonial
                                                                    </label>
                                                                    <label class="checkbox">
                                                                        <input type="checkbox" value="1"  name="impactos_negocio[]" {{(in_array(1 , $array_impacto)) ? 'checked' : ''}}/>
                                                                        <span></span>
                                                                        Operacional
                                                                    </label>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-3">
                                                                <div class="checkbox-list">

                                                                    <label class="checkbox">
                                                                        <input type="checkbox" value="2" name="impactos_negocio[]" {{(in_array(2 , $array_impacto)) ? 'checked' : ''}}/>
                                                                        <span></span>
                                                                        Comercial
                                                                    </label>
                                                                    <label class="checkbox">
                                                                        <input type="checkbox" value="3" name="impactos_negocio[]" {{(in_array(3 , $array_impacto)) ? 'checked' : ''}}/>
                                                                        <span></span>
                                                                        Reputacional
                                                                    </label>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-3">
                                                                <div class="checkbox-list">
                                                                    <label class="checkbox">
                                                                        <input type="checkbox" value="4" name="impactos_negocio[]" {{(in_array(4 , $array_impacto)) ? 'checked' : ''}}/>
                                                                        <span></span>
                                                                        Humano
                                                                    </label>
                                                                    <label class="checkbox">
                                                                        <input type="checkbox" value="5" name="impactos_negocio[]" {{(in_array(5 , $array_impacto)) ? 'checked' : ''}}/>
                                                                        <span></span>
                                                                        Ambiental
                                                                    </label>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-3">
                                                                <div class="checkbox-list">
                                                                    <label class="checkbox">
                                                                        <input type="checkbox" value="6" name="impactos_negocio[]"/>
                                                                        <span></span>
                                                                        Comunidad
                                                                    </label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>

                                    <div class="row form-group">
                                        <div class="col-lg-8">
                                            <label for="contramedidas"><b>Medidas de Mitigacón</b></label>
                                         
                                                <textarea class="form-control gray_area" name="contramedidas" placeholder="" id="contramedidas" rows="5">{{ $ana_riesgo->contramedidas }}</textarea>


                                            <div class="row mt-2">
                                                @if($ana_riesgo->hd_nivel_control_id == 1)
                                                    <div class="col-lg-4 nivel_inoperante">
                                                        <label for="observaciones"><b>Factor de exposición</b></label>
                                                        <input type="text" class="form-control gray_area" disabled name="factor_exposicion" id="factor_exposicion" value="Muy Alta"/>
                                                    </div>

                                                    <div class="col-lg-4 oculto nivel_sincontrol">
                                                        <label for="observaciones"><b>Factor de exposición</b></label>
                                                        <input type="text" class="form-control gray_area" disabled name="factor_exposicion" id="factor_exposicion" value="Muy Alta"/>
                                                    </div>

                                                    <div class="col-lg-4 oculto nivel_deficiente">
                                                        <label for="observaciones"><b>Factor de exposición</b></label>
                                                        <input type="text" class="form-control gray_area" disabled name="factor_exposicion" id="factor_exposicion" value="Alta"/>
                                                    </div>
                                                    <div class="col-lg-4 oculto regular">
                                                        <label for="observaciones"><b>Factor de exposición</b></label>
                                                        <input type="text" class="form-control gray_area" disabled name="factor_exposicion" id="factor_exposicion" value="Media"/>
                                                    </div>
                                                    <div class="col-lg-4 oculto eficiente">
                                                        <label for="observaciones"><b>Factor de exposición</b></label>
                                                        <input type="text" class="form-control gray_area" disabled name="factor_exposicion" id="factor_exposicion" value="Baja"/>
                                                    </div>
                                                    <div class="col-lg-4 oculto optimo">
                                                        <label for="observaciones"><b>Factor de exposición</b></label>
                                                        <input type="text" class="form-control gray_area" disabled name="factor_exposicion" id="factor_exposicion" value="Muy Baja"/>
                                                    </div>
                                                @endif

                                                @if($ana_riesgo->hd_nivel_control_id == 2)
                                                    <div class="col-lg-4 oculto nivel_inoperante">
                                                        <label for="observaciones"><b>Factor de exposición</b></label>
                                                        <input type="text" class="form-control gray_area" disabled name="factor_exposicion" id="factor_exposicion" value="Muy Alta"/>
                                                    </div>

                                                    <div class="col-lg-4  nivel_sincontrol">
                                                        <label for="observaciones"><b>Factor de exposición</b></label>
                                                        <input type="text" class="form-control gray_area" disabled name="factor_exposicion" id="factor_exposicion" value="Muy Alta"/>
                                                    </div>

                                                    <div class="col-lg-4 oculto nivel_deficiente">
                                                        <label for="observaciones"><b>Factor de exposición</b></label>
                                                        <input type="text" class="form-control gray_area" disabled name="factor_exposicion" id="factor_exposicion" value="Alta"/>
                                                    </div>
                                                    <div class="col-lg-4 oculto regular">
                                                        <label for="observaciones"><b>Factor de exposición</b></label>
                                                        <input type="text" class="form-control gray_area" disabled name="factor_exposicion" id="factor_exposicion" value="Media"/>
                                                    </div>
                                                    <div class="col-lg-4 oculto eficiente">
                                                        <label for="observaciones"><b>Factor de exposición</b></label>
                                                        <input type="text" class="form-control gray_area" disabled name="factor_exposicion" id="factor_exposicion" value="Baja"/>
                                                    </div>
                                                    <div class="col-lg-4 oculto optimo">
                                                        <label for="observaciones"><b>Factor de exposición</b></label>
                                                        <input type="text" class="form-control gray_area" disabled name="factor_exposicion" id="factor_exposicion" value="Muy Baja"/>
                                                    </div>
                                                @endif

                                                @if($ana_riesgo->hd_nivel_control_id == 3)
                                                    <div class="col-lg-4 oculto nivel_inoperante">
                                                        <label for="observaciones"><b>Factor de exposición</b></label>
                                                        <input type="text" class="form-control gray_area" disabled name="factor_exposicion" id="factor_exposicion" value="Muy Alta"/>
                                                    </div>

                                                    <div class="col-lg-4 oculto nivel_sincontrol">
                                                        <label for="observaciones"><b>Factor de exposición</b></label>
                                                        <input type="text" class="form-control gray_area" disabled name="factor_exposicion" id="factor_exposicion" value="Muy Alta"/>
                                                    </div>

                                                    <div class="col-lg-4  nivel_deficiente">
                                                        <label for="observaciones"><b>Factor de exposición</b></label>
                                                        <input type="text" class="form-control gray_area" disabled name="factor_exposicion" id="factor_exposicion" value="Alta"/>
                                                    </div>
                                                    <div class="col-lg-4 oculto regular">
                                                        <label for="observaciones"><b>Factor de exposición</b></label>
                                                        <input type="text" class="form-control gray_area" disabled name="factor_exposicion" id="factor_exposicion" value="Media"/>
                                                    </div>
                                                    <div class="col-lg-4 oculto eficiente">
                                                        <label for="observaciones"><b>Factor de exposición</b></label>
                                                        <input type="text" class="form-control gray_area" disabled name="factor_exposicion" id="factor_exposicion" value="Baja"/>
                                                    </div>
                                                    <div class="col-lg-4 oculto optimo">
                                                        <label for="observaciones"><b>Factor de exposición</b></label>
                                                        <input type="text" class="form-control gray_area" disabled name="factor_exposicion" id="factor_exposicion" value="Muy Baja"/>
                                                    </div>
                                                @endif


                                                @if($ana_riesgo->hd_nivel_control_id == 4)
                                                    <div class="col-lg-4 oculto nivel_inoperante">
                                                        <label for="observaciones"><b>Factor de exposición</b></label>
                                                        <input type="text" class="form-control gray_area" disabled name="factor_exposicion" id="factor_exposicion" value="Muy Alta"/>
                                                    </div>

                                                    <div class="col-lg-4 oculto nivel_sincontrol">
                                                        <label for="observaciones"><b>Factor de exposición</b></label>
                                                        <input type="text" class="form-control gray_area" disabled name="factor_exposicion" id="factor_exposicion" value="Muy Alta"/>
                                                    </div>

                                                    <div class="col-lg-4 oculto nivel_deficiente">
                                                        <label for="observaciones"><b>Factor de exposición</b></label>
                                                        <input type="text" class="form-control gray_area" disabled name="factor_exposicion" id="factor_exposicion" value="Alta"/>
                                                    </div>
                                                    <div class="col-lg-4  regular">
                                                        <label for="observaciones"><b>Factor de exposición</b></label>
                                                        <input type="text" class="form-control gray_area" disabled name="factor_exposicion" id="factor_exposicion" value="Media"/>
                                                    </div>
                                                    <div class="col-lg-4 oculto eficiente">
                                                        <label for="observaciones"><b>Factor de exposición</b></label>
                                                        <input type="text" class="form-control gray_area" disabled name="factor_exposicion" id="factor_exposicion" value="Baja"/>
                                                    </div>
                                                    <div class="col-lg-4 oculto optimo">
                                                        <label for="observaciones"><b>Factor de exposición</b></label>
                                                        <input type="text" class="form-control gray_area" disabled name="factor_exposicion" id="factor_exposicion" value="Muy Baja"/>
                                                    </div>
                                                @endif


                                                @if($ana_riesgo->hd_nivel_control_id == 5)
                                                    <div class="col-lg-4 oculto nivel_inoperante">
                                                        <label for="observaciones"><b>Factor de exposición</b></label>
                                                        <input type="text" class="form-control gray_area" disabled name="factor_exposicion" id="factor_exposicion" value="Muy Alta"/>
                                                    </div>

                                                    <div class="col-lg-4 oculto nivel_sincontrol">
                                                        <label for="observaciones"><b>Factor de exposición</b></label>
                                                        <input type="text" class="form-control gray_area" disabled name="factor_exposicion" id="factor_exposicion" value="Muy Alta"/>
                                                    </div>

                                                    <div class="col-lg-4 oculto nivel_deficiente">
                                                        <label for="observaciones"><b>Factor de exposición</b></label>
                                                        <input type="text" class="form-control gray_area" disabled name="factor_exposicion" id="factor_exposicion" value="Alta"/>
                                                    </div>
                                                    <div class="col-lg-4 oculto regular">
                                                        <label for="observaciones"><b>Factor de exposición</b></label>
                                                        <input type="text" class="form-control gray_area" disabled name="factor_exposicion" id="factor_exposicion" value="Media"/>
                                                    </div>
                                                    <div class="col-lg-4  eficiente">
                                                        <label for="observaciones"><b>Factor de exposición</b></label>
                                                        <input type="text" class="form-control gray_area" disabled name="factor_exposicion" id="factor_exposicion" value="Baja"/>
                                                    </div>
                                                    <div class="col-lg-4 oculto optimo">
                                                        <label for="observaciones"><b>Factor de exposición</b></label>
                                                        <input type="text" class="form-control gray_area" disabled name="factor_exposicion" id="factor_exposicion" value="Muy Baja"/>
                                                    </div>
                                                @endif

                                                @if($ana_riesgo->hd_nivel_control_id == 6)
                                                    <div class="col-lg-4 oculto nivel_inoperante">
                                                        <label for="observaciones"><b>Factor de exposición</b></label>
                                                        <input type="text" class="form-control gray_area" disabled name="factor_exposicion" id="factor_exposicion" value="Muy Alta"/>
                                                    </div>

                                                    <div class="col-lg-4 oculto nivel_sincontrol">
                                                        <label for="observaciones"><b>Factor de exposición</b></label>
                                                        <input type="text" class="form-control gray_area" disabled name="factor_exposicion" id="factor_exposicion" value="Muy Alta"/>
                                                    </div>

                                                    <div class="col-lg-4 oculto nivel_deficiente">
                                                        <label for="observaciones"><b>Factor de exposición</b></label>
                                                        <input type="text" class="form-control gray_area" disabled name="factor_exposicion" id="factor_exposicion" value="Alta"/>
                                                    </div>
                                                    <div class="col-lg-4 oculto regular">
                                                        <label for="observaciones"><b>Factor de exposición</b></label>
                                                        <input type="text" class="form-control gray_area" disabled name="factor_exposicion" id="factor_exposicion" value="Media"/>
                                                    </div>
                                                    <div class="col-lg-4 oculto eficiente">
                                                        <label for="observaciones"><b>Factor de exposición</b></label>
                                                        <input type="text" class="form-control gray_area" disabled name="factor_exposicion" id="factor_exposicion" value="Baja"/>
                                                    </div>
                                                    <div class="col-lg-4  optimo">
                                                        <label for="observaciones"><b>Factor de exposición</b></label>
                                                        <input type="text" class="form-control gray_area" disabled name="factor_exposicion" id="factor_exposicion" value="Muy Baja"/>
                                                    </div>
                                                @endif


                                                <div class="col-lg-4">
                                                    <label><b>Factor de probabilidad</b></label>
                                                    <div class="input-group">
                                                        <select class="form-control gray_area" id="factor_probabilidad" name="factor_probabilidad"  required >
                                                            <option value="1" @selected($ana_riesgo->hd_probabilidad_id == 1)>Muy Alta</option>
                                                            <option value="2" @selected($ana_riesgo->hd_probabilidad_id == 2)>Alta</option>
                                                            <option value="3" @selected($ana_riesgo->hd_probabilidad_id == 3)>Media</option>
                                                            <option value="4" @selected($ana_riesgo->hd_probabilidad_id == 4)>Baja</option>
                                                            <option value="5" @selected($ana_riesgo->hd_probabilidad_id == 5)>Muy Baja</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                
                                                <div class="col-lg-4">
                                                    <label><b>Impacto/Severidad</b></label>
                                                    <div class="input-group">
                                                        <select class="form-control gray_area" id="impacto_severidad" name="impacto_severidad"  required >
                                                            <option value="1" @selected($ana_riesgo->hd_consecuencia_id == 1)>Insignificante</option>
                                                            <option value="2" @selected($ana_riesgo->hd_consecuencia_id == 2)>Leve</option>
                                                            <option value="3" @selected($ana_riesgo->hd_consecuencia_id == 3)>Marginal</option>
                                                            <option value="4" @selected($ana_riesgo->hd_consecuencia_id == 4)>Grave</option>
                                                            <option value="5" @selected($ana_riesgo->hd_consecuencia_id == 5)>Critíco</option>
                                                            <option value="6" @selected($ana_riesgo->hd_consecuencia_id == 6)>Desastroso</option>
                                                            <option value="7" @selected($ana_riesgo->hd_consecuencia_id == 7)>Catastrófico</option>
                                                        </select>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>

                                        <div class="col-lg-4 text-center">

                                            <div class="risk-level nivelmma">
                                                <span class="title">Nivel de Riesgo </span>
                                                <div class="risk-color" style="background-color: #8B0000;">Muy alto</div>
                                            </div>
                                            <div class="risk-level nivelma oculto" style="display: none;">
                                                <span class="title">Nivel de Riesgo </span>
                                                <div class="risk-color" style="background-color: #8B0000;">Muy alto</div>
                                            </div>
                                            <div class="risk-level oculto nivela" style="display: none;">
                                                <span class="title">Nivel de Riesgo </span>
                                                <div class="risk-color" style="background-color: #FF0000;">Alto</div>
                                            </div>
                                            <div class="risk-level oculto nivelm" style="display: none;">
                                                <span class="title">Nivel de Riesgo </span>
                                                <div class="risk-color" style="background-color: #f4c542;">Medio</div>
                                            </div>
                                            <div class="risk-level oculto nivelb" style="display: none;">
                                                <span class="title">Nivel de Riesgo </span>
                                                <div class="risk-color" style="background-color: #32CD32;">Bajo</div>
                                            </div>
                                            <div class="risk-level oculto nivelmb" style="display: none;">
                                                <span class="title">Nivel de Riesgo </span>
                                                <div class="risk-color" style="color:black; background-color: #F1EBEB;">Muy Bajo</div>
                                            </div> 
                                            <div class="risk-level oculto nivelmmb" style="display: none;">
                                                <span class="title">Nivel de Riesgo </span>
                                                <div class="risk-color" style="color:black; background-color: #F1EBEB;">Muy Bajo</div>
                                            </div>
                                            <div class="text-centerx">
                                                <label>Índice Potencial de daño: </label>
                                                <label style="font-weight: bolder; font-size: 15px;" id="nivel_riesgo2">0</label>
                                            </div>

                                            <div class="contimg text-center">
                                                <img class="nivelmma" src="{{ asset('img/pot90.png') }}" width="220">
                                                <img class="oculto nivelma" src="{{ asset('img/pot70.png') }}" width="220">
                                                <img class="oculto nivela" src="{{ asset('img/pot40.png') }}" width="220">
                                                <img class="oculto nivelm" src="{{ asset('img/pot20.png') }}" width="220">
                                                <img class="oculto nivelb" src="{{ asset('img/pot10.png') }}" width="220">
                                                <img class="oculto nivelmb" src="{{ asset('img/pot0.png') }}" width="220">
                                                <img class="oculto nivelmmb" src="{{ asset('img/pot0.png') }}" width="220">
                                            </div>

                                            <input type="hidden" name="nivel_riesgo" id="nivel_riesgo">
                                        </div>
                                    </div>


                                </div>
                            </div>




                    </div>
                    <div class="card-footer">
                        <div class="row text-right">

                                <div class="col-lg-12">
                                    {{-- <button type="button"  id="btnGuardar" class="btn btn-primary mr-2">Guardar</button> --}}
                                     <a href="{{ route('analisis.analisiscliente', $id_cliente) }}"  class="btn btn-secondary">Cancelar</a>
                                </div>

                        </div>
                    </div>
                {{-- </form> --}}
                <!--end::Form-->
            </div>
            <!--end::Card-->
        </div>
    </div>
    <!--end::Card-->



@endsection