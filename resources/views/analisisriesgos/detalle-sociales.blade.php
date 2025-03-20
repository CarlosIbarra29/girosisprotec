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
                    <h3 class="card-title">Generar analisis de riesgos al cliente "SIS PROTEC"</h3>

                </div>
                <input type='hidden' id='url_alcances' value='{{ route('analisis.obteneralcances') }}'>
                <!--begin::Form-->
                    <div class="card-body">

                        <div class="card card-custom gutter-b">
                            <div class="card-body">
                                <div class="row form-group">
                                    <div class="col-lg-6">
                                        <label><b>Punto normativo</b></label>
                                        <div class="input-group">
                                            @foreach($alcances as $alcanec)
                                                @if($ana_riesgo->libror_barreras_perimetrales_id == $alcanec->id)
                                                    <p>{{ $alcanec->alcance }}</p>
                                                @endif
                                            @endforeach
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <label for="observaciones"><b>Punto de control</b></label>
                                        <p>{{ $ana_riesgo->punto_control }}</p>
                                    </div>

                                    <!-- <div class="col-lg-3 mt-2 text-center">
                                        <label><b>Estatus</b></label>
                                        <div class="input-group">
                                            <div class="legend">
                                                <span class="completed-box"></span> <span>Porcentaje Completado</span>
                                                <br>
                                                <span class="remaining-box"></span> <span>Porcentaje Faltante</span>
                                            </div>

                                            <div class="progress-bar2">
                                                <div class="completed" style="width: 44%;">44</div>
                                                <div class="remaining" style="width: 53%;">53</div>
                                            </div>
                                        </div>
                                    </div> -->
                                </div>
                {{-- ENvoiar Formulario  --}}
                <form action="{{ route('analisis.guardarriesgo') }}" method="post" id="submit_analisis_social">  
                                @csrf


                                    <div class="row form-group">
                                            <div class="col-lg-6">
                                                <label for="observaciones"><b>Factor de riesgo</b></label>
                                                <p>{{ $ana_riesgo->factores_riesgo }}</p>
                                                <input type="hidden" name="id_alcance_seleccionado" value="{{ $ana_riesgo->id }}">

                                            </div>
                                            <div class="col-lg-6">
                                                <label for="observaciones"><b>Evento de riesgo</b></label>
                                                <p>{{ $ana_riesgo->eventos_riesgo }}</p>
                                            </div>

                                    </div>

                                    <div class="row form-group">
                                        <div class="col-lg-4">
                                            <label for="observaciones"><b>Recursos Expuestos (Activos)</b></label>
                                            <p>{{ $ana_riesgo->recursos_expuestos }}</p>
                                        </div>
                                        <div class="col-lg-4">
                                            <label for="observaciones"><b>Fuente de Riesgo</b></label>
                                            <p>{{ $ana_riesgo->fuente_riesgo }}</p>
                                        </div>
                                        <div class="col-lg-4">
                                            <label for="observaciones"><b>Ubicación del riesgo</b></label>
                                            <p>{{ $ana_riesgo->ubicacion_riesgo }}</p>
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
                                                @if($ana_riesgo->hd_nivel_control_id == 1)
                                                    <p>Inoperante</p>
                                                @endif
                                                @if($ana_riesgo->hd_nivel_control_id == 2)
                                                    <p>Sin control</p>
                                                @endif
                                                @if($ana_riesgo->hd_nivel_control_id == 3)
                                                    <p>Deficiente</p>
                                                @endif
                                                @if($ana_riesgo->hd_nivel_control_id == 4)
                                                    <p>Regular</p>
                                                @endif
                                                @if($ana_riesgo->hd_nivel_control_id == 5)
                                                    <p>Eficiente</p>
                                                @endif
                                                @if($ana_riesgo->hd_nivel_control_id == 6)
                                                    <p>Optimo</p>
                                                @endif
                                            </div>
                                        </div>
                                        @if($ana_riesgo->hd_nivel_control_id == 1)
                                            <div class="col-lg-8 mt-2 nivel_inoperante">
                                                <label><b>Descripción</b></label>
                                                <p>Cuenta con los criterios de aplicación pero no funciona.</p>
                                            </div>
                                        @endif
                                        @if($ana_riesgo->hd_nivel_control_id == 2)
                                            <div class="col-lg-8 mt-2 nivel_sincontrol">
                                                <label><b>Descripción</b></label>
                                                <p>Adquirir la licencia de Windows más reciente con el fin de no vulnerar la información de la empresa.</p>
                                            </div>
                                        @endif
                                        @if($ana_riesgo->hd_nivel_control_id == 3)
                                            <div class="col-lg-8 mt-2 nivel_deficiente">
                                                <label><b>Descripción</b></label>
                                                <p>Cuenta con los criterios de aplicación pero no son los adecuados para la instalación.</p>
                                            </div>
                                        @endif
                                        @if($ana_riesgo->hd_nivel_control_id == 4)
                                            <div class="col-lg-8 mt-2 regular">
                                                <label><b>Descripción</b></label>
                                                <p>Cuenta con los criterios de aplicación pero existen posibilidades de mejora.</p>
                                            </div>
                                        @endif
                                        @if($ana_riesgo->hd_nivel_control_id == 5)
                                            <div class="col-lg-8 mt-2 eficiente">
                                                <label><b>Descripción</b></label>
                                                <p>Los criterios de aplicación son los adecuados a la instalación.</p>
                                            </div>
                                        @endif
                                        @if($ana_riesgo->hd_nivel_control_id == 6)
                                            <div class="col-lg-8 mt-2 optimo">
                                                <label><b>Descripción</b></label>
                                                <p>Excede los criterios de aplicación.</p>
                                            </div>
                                        @endif
                                    </div>

                                    <div class="row form-group">
                                        <div class="col-lg-12">
                                            <label for="observaciones"><b>Medidas de Prevención y Protección Actuales</b></label>
                                            <p>{{ $ana_riesgo->medidas_prevencion }}</p>
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
                                                            <input type="checkbox" value="1"  name="deficiencia_medida_s[]" {{(in_array(1 , $array_deficiencia)) ? 'checked' : ''}}/>
                                                            <span></span>
                                                            Activas
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                        <div class="checkbox-list">
                                                            <label class="checkbox">
                                                                <input type="checkbox" value="2" name="deficiencia_medida_s[]" {{(in_array(2 , $array_deficiencia)) ? 'checked' : ''}}/>
                                                                <span></span>
                                                                Humanas
                                                            </label>
                                                            <label class="checkbox">
                                                                <input type="checkbox" value="3" name="deficiencia_medida_s[]" {{(in_array(3 , $array_deficiencia)) ? 'checked' : ''}}/>
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
                                                                        <input type="checkbox" value="0" name="impactos_negocio[]" {{(in_array(0 , $array_impacto)) ? 'checked' : ''}} />
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
                                                                        <input type="checkbox" value="2" name="impactos_negocio[]" {{(in_array(2, $array_impacto)) ? 'checked' : ''}}/>
                                                                        <span></span>
                                                                        Comercial
                                                                    </label>
                                                                    <label class="checkbox">
                                                                        <input type="checkbox" value="3" name="impactos_negocio[]" {{(in_array(3, $array_impacto)) ? 'checked' : ''}}/>
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
                                                                        <input type="checkbox" value="6" name="impactos_negocio[]" {{(in_array(6 , $array_impacto)) ? 'checked' : ''}}/>
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

                                                <p>{{ $ana_riesgo->contramedidas }}</p>


                                            <div class="row mt-2">
                                                
                                                @if($ana_riesgo->hd_nivel_control_id == 1)
                                                    <div class="col-lg-4 nivel_inoperante">
                                                        <label for="observaciones"><b>Factor de exposición</b></label>
                                                        <p>Muy Alta</p>
                                                    </div>
                                                @endif

                                                @if($ana_riesgo->hd_nivel_control_id == 2)
                                                    <div class="col-lg-4 nivel_sincontrol">
                                                        <label for="observaciones"><b>Factor de exposición</b></label>
                                                        <p>Muy Alta</p>
                                                    </div>
                                                @endif

                                                @if($ana_riesgo->hd_nivel_control_id == 3)
                                                    <div class="col-lg-4 nivel_deficiente">
                                                        <label for="observaciones"><b>Factor de exposición</b></label>
                                                        <p>Alta</p>
                                                    </div>
                                                @endif

                                                @if($ana_riesgo->hd_nivel_control_id == 4)
                                                    <div class="col-lg-4 regular">
                                                        <label for="observaciones"><b>Factor de exposición</b></label>
                                                        <p>Media</p>
                                                    </div>
                                                @endif

                                                @if($ana_riesgo->hd_nivel_control_id == 5)
                                                    <div class="col-lg-4 eficiente">
                                                        <label for="observaciones"><b>Factor de exposición</b></label>
                                                        <p>Baja</p>
                                                    </div>
                                                @endif

                                                @if($ana_riesgo->hd_nivel_control_id == 6)
                                                    <div class="col-lg-4 optimo">
                                                        <label for="observaciones"><b>Factor de exposición</b></label>
                                                        <p>Muy Baja</p>
                                                    </div>
                                                @endif

                                                <div class="col-lg-4">
                                                    <label><b>Factor de probabilidad</b></label>
                                                    <div class="input-group">
                                                        @if($ana_riesgo->hd_probabilidad_id == 1)
                                                            <p>Muy Alta</p>
                                                        @endif
                                                        @if($ana_riesgo->hd_probabilidad_id == 2)
                                                            <p>Alta</p>
                                                        @endif
                                                        @if($ana_riesgo->hd_probabilidad_id == 3)
                                                            <p>Media</p>
                                                        @endif
                                                        @if($ana_riesgo->hd_probabilidad_id == 4)
                                                            <p>Baja</p>
                                                        @endif
                                                        @if($ana_riesgo->hd_probabilidad_id == 5)
                                                            <p>Muy Baja</p>
                                                        @endif
                                                    </div>
                                                </div>
                                                
                                                <div class="col-lg-4">
                                                    <label><b>Impacto/Severidad</b></label>
                                                    <div class="input-group">
                                                        @if($ana_riesgo->hd_consecuencia_id == 1)
                                                            <p>Insignificante</p>
                                                        @endif
                                                        @if($ana_riesgo->hd_consecuencia_id == 2)
                                                            <p>Leve</p>
                                                        @endif
                                                        @if($ana_riesgo->hd_consecuencia_id == 3)
                                                            <p>Marginal</p>
                                                        @endif
                                                        @if($ana_riesgo->hd_consecuencia_id == 4)
                                                            <p>Grave</p>
                                                        @endif
                                                        @if($ana_riesgo->hd_consecuencia_id == 5)
                                                            <p>Critíco</p>
                                                        @endif
                                                        @if($ana_riesgo->hd_consecuencia_id == 6)
                                                            <p>Desastroso</p>
                                                        @endif
                                                        @if($ana_riesgo->hd_consecuencia_id == 7)
                                                            <p>Catastrófico</p>
                                                        @endif
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
                                <a href="{{ route('analisis.analisiscliente', $id_cliente) }}"  class="btn btn-secondary">Cancelar</a>

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