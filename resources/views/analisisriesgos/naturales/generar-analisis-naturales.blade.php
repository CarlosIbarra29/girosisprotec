@extends('layouts.app')
@push('scripts')
	<script src="{{ asset('js/cliente/AnalisisRiesgo.js') }}"></script>
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
                <input type='hidden' id='url_alcances' value='{{ route('analisis.obteneralcancesnaturales') }}'>
                <!--begin::Form-->
                    <div class="card-body">

                        <div class="card card-custom gutter-b">
                            <div class="card-body">
                                <div class="row form-group">
                                    <div class="col-lg-8">
                                        <label><b>Punto normativo</b></label>
                                        <div class="input-group">
                                        <select class="form-control" id="punto_normativo_naturales" name="punto_normativo"  required >
                                            <option value="">Selecciona una opción</option>
                                            @foreach($alcances as $alcanec)
                                                <option value="{{ $alcanec->id }}"  @selected($alcanec->id == $id_alcance)>{{ $alcanec->alcance }}</option>
                                            @endforeach
                                        </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 mt-2 text-center">
                                        <label><b>Opciones</b></label>
                                        <input type="hidden" name="contador_paginador" id="paginador_num" value="{{ $num }}">
                                        @if($alcance_social== "Vacio" || $id_alcance == 0)

                                        @else
                                            <p>{{ $num }} de {{ $count_alcance }}</p> 
                                            @if($num == 1)
                                                <button  class="btn btn-clean btn-icon btn-outline-success mt-1 disabled" id="alcance_menos_nat" data-toggle="tooltip" data-theme="dark" title="" >
                                                    <i class="la la-arrow-left"></i>
                                                </button>
                                            @else
                                                <button  class="btn btn-clean btn-icon btn-outline-success mt-1" id="alcance_menos_nat" data-toggle="tooltip" data-theme="dark" title="" >
                                                    <i class="la la-arrow-circle-left"></i>
                                                </button>
                                            @endif

                                            @if($num == 9)
                                                <button  class="btn btn-clean btn-icon btn-outline-success mt-1 disabled" id="alcance_mas_nat" data-toggle="tooltip" data-theme="dark" title="" >
                                                    <i class="la la-arrow-right"></i>
                                                </button>
                                            @else
                                                <button  class="btn btn-clean btn-icon btn-outline-success mt-1" id="alcance_mas_nat" data-toggle="tooltip" data-theme="dark" title="" >
                                                    <i class="la la-arrow-circle-right"></i>
                                                </button>
                                            @endif


                                        @endif
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
                <form action="{{ route('analisis.guardarriesgonaturales') }}" method="post" id="submit_analisis_social">  
                                @csrf
                                <input type="hidden" name="cliente" id="id_cliente" value="{{ $cliente }}">
                                <input type="hidden" name="tipo" id="id_tipo" value="{{ $tipo }}">
                                <input type="hidden" name="punto_normativo" id="id_alcance" value="{{ $id_alcance }}">
                                <input type="hidden" name="alcances" id="num" value="{{ $num }}">
                                @if($alcance_social== "Vacio" || $id_alcance == 0)
                                    
                                    @if($alcance_social== "Vacio")
                                        <div class="row">
                                            <div class="col-lg-6 text-center">
                                                <img  src="{{ asset('img/sin-informacion.webp') }}" width="300" />
                                            </div>
                                            <div class="col-lg-6 text-center mt-4">
                                                <h1>¡Lo sentimos!</h1>
                                                <h4>El punto normativo seleccionado no contiene información</h4>

                                                <div class="row mt-4">
                                                    <h5>Para continar dirigete a la sección de libros de riesgos sociales o <a href="{{ route('libro.listadolibroriesgos') }}">DA CLIC AQUI</a> .</h5>
                                                </div>
                                            </div>
                                        </div>
                                    @endif


                                @else

                                    <div class="row form-group">
                                        @if($id_alcance != 0)
                                            <div class="col-lg-6">
                                                <label for="observaciones"><b>Punto de control</b></label>
                                                <textarea class="form-control gray_area" name="punto_control" placeholder="" id="punto_control" rows="2"></textarea>
                                            </div>
                                
                                        @else
                                            <div class="col-lg-6">
                                                <label for="observaciones"><b>Punto de control</b></label>
                                                <textarea class="form-control gray_area" name="punto_control" placeholder="" id="punto_control" rows="2"></textarea>
                                            </div>
                                        @endif
                                    </div>

                                    <div class="row form-group">
                                        @if($id_alcance != 0)
                                            <!-- <div class="col-lg-4">
                                                <label for="observaciones"><b>Punto de control</b></label>
                                                <textarea class="form-control gray_area" name="punto_control" placeholder="" id="punto_control" rows="2"></textarea>
                                            </div> -->
                                            <div class="col-lg-6">
                                                <label for="observaciones"><b>Factor de riesgo</b></label>
                                                <textarea class="form-control gray_area" name="factor_riesgo" placeholder="" id="factor_riesgo" rows="2">{{ $alcance_social->factores_riesgo }}</textarea>
                                                <input type="hidden" name="id_alcance_seleccionado" value="{{ $alcance_social->id }}">

                                            </div>
                                            <div class="col-lg-6">
                                                <label for="observaciones"><b>Evento de riesgo</b></label>
                                                <textarea class="form-control gray_area" name="evento_riesgo" placeholder="" id="evento_riesgo" rows="2">{{ $alcance_social->eventos_riesgo }}</textarea>
                                            </div>
                                        @else
                                            <!-- <div class="col-lg-4">
                                                <label for="observaciones"><b>Punto de control</b></label>
                                                <textarea class="form-control gray_area" name="punto_control" placeholder="" id="punto_control" rows="2"></textarea>
                                            </div> -->
                                            <div class="col-lg-6">
                                                <label for="observaciones"><b>Factor de riesgo</b></label>
                                                <textarea class="form-control gray_area" name="factor_riesgo" placeholder="" id="factor_riesgo" rows="2"></textarea>

                                            </div>
                                            <div class="col-lg-6">
                                                <label for="observaciones"><b>Evento de riesgo</b></label>
                                                <textarea class="form-control gray_area" name="evento_riesgo" placeholder="" id="evento_riesgo" rows="2"></textarea>
                                            </div>
                                        @endif
                                    </div>

                                    <div class="row form-group">
                                        <div class="col-lg-4">
                                            <label for="observaciones"><b>Recursos Expuestos (Activos)</b></label>
                                            <input type="text" class="form-control gray_area" name="recursos_expuestos" id="recursos_expuestos"/>
                                        </div>
                                        <div class="col-lg-4">
                                            <label for="observaciones"><b>Fuente de Riesgo</b></label>
                                            <input type="text" class="form-control gray_area" name="fuente_riesgo" id="fuente_riesgo"/>
                                        </div>
                                        <div class="col-lg-4">
                                            <label for="observaciones"><b>Ubicación del riesgo</b></label>
                                            <input type="text" class="form-control gray_area" name="ubicacion_riesgo" id="ubicacion_riesgo"/>
                                        </div>
                                    </div>

                                @endif
                            </div>
                        </div>

                        @if($alcance_social== "Vacio" || $id_alcance == 0)
                        @else

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
                                                    <option value="1" selected>Inoperante</option>
                                                    <option value="2" >Sin control</option>
                                                    <option value="3" >Deficiente</option>
                                                    <option value="4" >Regular</option>
                                                    <option value="5" >Eficiente</option>
                                                    <option value="6" >Optimo</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-lg-8 mt-2 nivel_inoperante">
                                            <label><b>Descripción</b></label>
                                            <p>Cuenta con los criterios de aplicación pero no funciona</p>
                                        </div>
                                        <div class="col-lg-8 mt-2 oculto nivel_sincontrol">
                                            <label><b>Descripción</b></label>
                                            <p>Adquirir la licencia de Windows más reciente con el fin de no vulnerar la información de la empresa.</p>
                                        </div>
                                        <div class="col-lg-8 mt-2 oculto nivel_deficiente">
                                            <label><b>Descripción</b></label>
                                            <p>Cuenta con los criterios de aplicación pero no son los adecuados para la instalación.</p>
                                        </div>
                                        <div class="col-lg-8 mt-2 oculto regular">
                                            <label><b>Descripción</b></label>
                                            <p>Cuenta con los criterios de aplicación pero existen posibilidades de mejora.</p>
                                        </div>
                                        <div class="col-lg-8 mt-2 oculto eficiente">
                                            <label><b>Descripción</b></label>
                                            <p>Los criterios de aplicación son los adecuados a la instalación.</p>
                                        </div>
                                        <div class="col-lg-8 mt-2 oculto optimo">
                                            <label><b>Descripción</b></label>
                                            <p>Excede los criterios de aplicación.</p>
                                        </div>
                                    </div>

                                    <div class="row form-group">
                                        <div class="col-lg-12">
                                            <label for="observaciones"><b>Medidas de Prevención y Protección Actuales</b></label>
                                            <textarea class="form-control gray_area" name="medidas_prevencion" placeholder="" id="generales_unidad" rows="5"></textarea>
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
                                            <label for="observaciones"><b style="font-size: 17px;">Deficiencia en la medidas S.</b></label><br>
                                            <div class="row">
                                                <div class="col-lg-6">
                                                    <div class="checkbox-list">
                                                        <label class="checkbox">
                                                            <input type="checkbox" value="0" name="deficiencia_medida_s[]"/>
                                                            <span></span>
                                                            Pasivas
                                                        </label>
                                                        <label class="checkbox">
                                                            <input type="checkbox" value="1"  name="deficiencia_medida_s[]"/>
                                                            <span></span>
                                                            Activas
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                        <div class="checkbox-list">
                                                            <label class="checkbox">
                                                                <input type="checkbox" value="2" name="deficiencia_medida_s[]"/>
                                                                <span></span>
                                                                Humanas
                                                            </label>
                                                            <label class="checkbox">
                                                                <input type="checkbox" value="3" name="deficiencia_medida_s[]"/>
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
                                                                        <input type="checkbox" value="0" name="impactos_negocio[]"/>
                                                                        <span></span>
                                                                        Patrimonial
                                                                    </label>
                                                                    <label class="checkbox">
                                                                        <input type="checkbox" value="1"  name="impactos_negocio[]"/>
                                                                        <span></span>
                                                                        Operacional
                                                                    </label>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-3">
                                                                <div class="checkbox-list">

                                                                    <label class="checkbox">
                                                                        <input type="checkbox" value="2" name="impactos_negocio[]"/>
                                                                        <span></span>
                                                                        Comercial
                                                                    </label>
                                                                    <label class="checkbox">
                                                                        <input type="checkbox" value="3" name="impactos_negocio[]"/>
                                                                        <span></span>
                                                                        Reputacional
                                                                    </label>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-3">
                                                                <div class="checkbox-list">
                                                                    <label class="checkbox">
                                                                        <input type="checkbox" value="4" name="impactos_negocio[]"/>
                                                                        <span></span>
                                                                        Humano
                                                                    </label>
                                                                    <label class="checkbox">
                                                                        <input type="checkbox" value="5" name="impactos_negocio[]"/>
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
                                            <label for="contramedidas"><b>Contramedidas</b></label>
                                            @if($id_alcance != 0)
                                                <textarea class="form-control gray_area" name="contramedidas" placeholder="" id="contramedidas" rows="5">{{ $alcance_social->contramedidas }}</textarea>
                                            @else
                                                <textarea class="form-control gray_area" name="contramedidas" placeholder="" id="contramedidas" rows="5"></textarea>
                                            @endif

                                            <div class="row mt-2">
                                                <div class="col-lg-4 nivel_inoperante">
                                                    <label for="observaciones"><b>Factor de expocisión</b></label>
                                                    <input type="text" class="form-control gray_area" disabled name="factor_exposicion" id="factor_exposicion" value="Muy Alta"/>
                                                </div>
                                                <div class="col-lg-4 nivel_inoperante">
                                                    <label for="observaciones"><b>Factor de probabilidad</b></label>
                                                    <input type="text" class="form-control gray_area" disabled name="factor_exposicion" id="factor_exposicion" value="Alta"/>
                                                </div>
                                                <div class="col-lg-4 nivel_inoperante">
                                                    <label for="observaciones"><b>Impacto/Severidad</b></label>
                                                    <input type="text" class="form-control gray_area" disabled name="impacto/severidad" id="impacto/severidad" value="Critico"/>
                                                </div>

                                                <div class="col-lg-4 oculto nivel_sincontrol">
                                                    <label for="observaciones"><b>Factor de expocisión</b></label>
                                                    <input type="text" class="form-control gray_area" disabled name="factor_exposicion" id="factor_exposicion" value="Muy Alta"/>
                                                </div>
                                                <div class="col-lg-4 oculto nivel_sincontrol">
                                                    <label for="observaciones"><b>Factor de probabilidad</b></label>
                                                    <input type="text" class="form-control gray_area" disabled name="factor_exposicion" id="factor_exposicion" value="Alta"/>
                                                </div>
                                                <div class="col-lg-4 oculto nivel_sincontrol">
                                                    <label for="observaciones"><b>Impacto/Severidad</b></label>
                                                    <input type="text" class="form-control gray_area" disabled name="impacto/severidad" id="impacto/severidad" value="Critico"/>
                                                </div>

                                                <div class="col-lg-4 oculto nivel_deficiente">
                                                    <label for="observaciones"><b>Factor de expocisión</b></label>
                                                    <input type="text" class="form-control gray_area" disabled name="factor_exposicion" id="factor_exposicion" value="Alta"/>
                                                </div>
                                                <div class="col-lg-4 oculto nivel_deficiente">
                                                    <label for="observaciones"><b>Factor de probabilidad</b></label>
                                                    <input type="text" class="form-control gray_area" disabled name="factor_exposicion" id="factor_exposicion" value="Alta"/>
                                                </div>
                                                <div class="col-lg-4 oculto nivel_deficiente">
                                                    <label for="observaciones"><b>Impacto/Severidad</b></label>
                                                    <input type="text" class="form-control gray_area" disabled name="impacto/severidad" id="impacto/severidad" value="Critico"/>
                                                </div>
                                                <div class="col-lg-4 oculto regular">
                                                    <label for="observaciones"><b>Factor de expocisión</b></label>
                                                    <input type="text" class="form-control gray_area" disabled name="factor_exposicion" id="factor_exposicion" value="Media"/>
                                                </div>
                                                <div class="col-lg-4 oculto regular">
                                                    <label for="observaciones"><b>Factor de probabilidad</b></label>
                                                    <input type="text" class="form-control gray_area" disabled name="factor_exposicion" id="factor_exposicion" value="Alta"/>
                                                </div>
                                                <div class="col-lg-4 oculto regular">
                                                    <label for="observaciones"><b>Impacto/Severidad</b></label>
                                                    <input type="text" class="form-control gray_area" disabled name="impacto/severidad" id="impacto/severidad" value="Critico"/>
                                                </div>

                                                <div class="col-lg-4 oculto eficiente">
                                                    <label for="observaciones"><b>Factor de expocisión</b></label>
                                                    <input type="text" class="form-control gray_area" disabled name="factor_exposicion" id="factor_exposicion" value="Baja"/>
                                                </div>
                                                <div class="col-lg-4 oculto eficiente">
                                                    <label for="observaciones"><b>Factor de probabilidad</b></label>
                                                    <input type="text" class="form-control gray_area" disabled name="factor_exposicion" id="factor_exposicion" value="Alta"/>
                                                </div>
                                                <div class="col-lg-4 oculto eficiente">
                                                    <label for="observaciones"><b>Impacto/Severidad</b></label>
                                                    <input type="text" class="form-control gray_area" disabled name="impacto/severidad" id="impacto/severidad" value="Critico"/>
                                                </div>

                                                <div class="col-lg-4 oculto optimo">
                                                    <label for="observaciones"><b>Factor de expocisión</b></label>
                                                    <input type="text" class="form-control gray_area" disabled name="factor_exposicion" id="factor_exposicion" value="Muy Baja"/>
                                                </div>
                                                <div class="col-lg-4 oculto optimo">
                                                    <label for="observaciones"><b>Factor de probabilidad</b></label>
                                                    <input type="text" class="form-control gray_area" disabled name="factor_exposicion" id="factor_exposicion" value="Alta"/>
                                                </div>
                                                <div class="col-lg-4 oculto optimo">
                                                    <label for="observaciones"><b>Impacto/Severidad</b></label>
                                                    <input type="text" class="form-control gray_area" disabled name="impacto/severidad" id="impacto/severidad" value="Critico"/>
                                                </div>

                                            </div>


                                        </div>
                                        <div class="col-lg-4 text-center">
                                            <div class="risk-level nivel_inoperante">
                                                <span class="title">Nivel de Riesgo</span>
                                                <div class="risk-color" style="background-color: #8B0000;">Muy alto</div>
                                            </div>
                                            <div class="risk-level oculto nivel_sincontrol" style="display: none;">
                                                <span class="title">Nivel de Riesgo</span>
                                                <div class="risk-color" style="background-color: #8B0000;">Muy alto</div>
                                            </div>
                                            <div class="risk-level oculto nivel_deficiente" style="display: none;">
                                                <span class="title">Nivel de Riesgo</span>
                                                <div class="risk-color" style="background-color: #8B0000;">Muy alto</div>
                                            </div>
                                            <div class="risk-level oculto regular" style="display: none;">
                                                <span class="title">Nivel de Riesgo</span>
                                                <div class="risk-color" style="background-color: #FF0000;">Alto</div>
                                            </div>
                                            <div class="risk-level oculto eficiente" style="display: none;">
                                                <span class="title">Nivel de Riesgo</span>
                                                <div class="risk-color" style="background-color: #f4c542;;">Medio</div>
                                            </div>
                                            <div class="risk-level oculto optimo" style="display: none;">
                                                <span class="title">Nivel de Riesgo</span>
                                                <div class="risk-color" style="background-color: #32CD32;">Bueno</div>
                                            </div>
                                            <div class="text-centerx">
                                                <label>Índice Potencial de daño</label>
                                            </div>
                                            <div class="contimg text-center">
                                                <img class="nivel_inoperante" src="{{ asset('img/daño100.png') }}" width="200">
                                                <img class="oculto nivel_sincontrol" src="{{ asset('img/daño80.png') }}" width="200">
                                                <img class="oculto nivel_deficiente" src="{{ asset('img/daño70.png') }}" width="200">
                                                <img class="oculto regular" src="{{ asset('img/daño50.png') }}" width="200">
                                                <img class="oculto eficiente" src="{{ asset('img/daño30.png') }}" width="200">
                                                <img class="oculto optimo" src="{{ asset('img/daño10.png') }}" width="200">
                                            </div>
                                        </div>
                                    </div>


                                </div>
                            </div>
                        @endif



                    </div>
                    <div class="card-footer">
                        <div class="row text-right">
                            @if($alcance_social== "Vacio" || $id_alcance == 0)
                                <a href="{{ route('analisis.listadoanalisis') }}"  class="btn btn-secondary">Cancelar</a>
                            @else
                                <div class="col-lg-12">
                                    <button type="button"  id="btnGuardar" class="btn btn-primary mr-2">Guardar</button>
                                    <a href="{{ route('analisis.listadoanalisis') }}"  class="btn btn-secondary">Cancelar</a>
                                </div>

                            @endif
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