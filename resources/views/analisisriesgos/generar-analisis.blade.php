@extends('layouts.app')

@push('scripts')
    <script src="{{ asset('js/cliente/AnalisisRiesgo.js?v=1.2.1') }}"></script>
    <link href="{{ asset('/css/version2/gnranalisis.css') }}" rel="stylesheet" type="text/css" />
@endpush

@section('title')
   Generar analisis de riesgos al cliente ({{ $cliented->nombre_comercial }})
@endsection

@section('content')


    <!--begin::Card-->
    <div class="row">
        <div class="col-lg-12">
            <!--begin::Card-->
            <div class="card card-custom gutter-b">
                <div class="card-header" {{-- style="background-color: #afafae !important; color: white!important;" --}}>
                    <h3 class="card-title">Generar analisis de riesgos al cliente ({{ $cliented->nombre_comercial }})</h3>

                    <div style="margin-top: 16px;">
                        <a class="btn btn-success btn-xs disabled"  href="#"><i class="la la-exclamation-triangle"></i> Perfil de riesgos</a>
                        <a href="{{ route('analisis.graficassociales', $cliente) }}" class="btn btn-success btn-xs "  href="#"><i class="la la-tachometer"></i>KPI's</a>
                        <a class="btn btn-success btn-xs"  href="{{ route('analisis.analisiscliente', $cliente ) }}"><i class="la la-project-diagram"></i></i> Analisis de Escenarios</a>
                    </div>

                </div>
                <input type='hidden' id='url_alcances' value='{{ route('analisis.obteneralcances') }}'>
                <!--begin::Form-->
                    <div class="card-body">

                        <div class="card card-custom gutter-b">
                            <div class="card-body">
                                <div class="row form-group">
                                    <div class="col-lg-8 fl">
                                        <label><b>Punto normativo</b></label>
                                        <select class="form-control" id="punto_normativo" name="punto_normativo"  required >
                                            <option value="" disabled selected>Selecciona una opción</option>
                                            @foreach($alcances as $alcanec)
                                                <option value="{{ $alcanec->id }}"  @selected($alcanec->id == $id_alcance)>{{ $alcanec->alcance }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-lg-4 mt-2 text-center">
                                        <label><b>Opciones</b></label>
                                        <input type="hidden" name="contador_paginador" id="paginador_num" value="{{ $num }}">
                                        @if($alcance_social== "Vacio" || $id_alcance == 0)

                                        @else
                                            <p>{{ $num }} de {{ $count_alcance }}</p> 
                                            @if($num == 1)
                                                <button  class="btn btn-clean btn-icon btn-outline-success mt-1 disabled" id="alcance_menos" data-toggle="tooltip" data-theme="dark" title="" >
                                                    <i class="la la-arrow-left"></i>
                                                </button>
                                            @else
                                                <button  class="btn btn-clean btn-icon btn-outline-success mt-1" id="alcance_menos" data-toggle="tooltip" data-theme="dark" title="" >
                                                    <i class="la la-arrow-circle-left"></i>
                                                </button>
                                            @endif

                                            @if($num == 9)
                                                <button  class="btn btn-clean btn-icon btn-outline-success mt-1 disabled" id="alcance_mas" data-toggle="tooltip" data-theme="dark" title="" >
                                                    <i class="la la-arrow-right"></i>
                                                </button>
                                            @else
                                                <button  class="btn btn-clean btn-icon btn-outline-success mt-1" id="alcance_mas" data-toggle="tooltip" data-theme="dark" title="" >
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
                {{-- Enviar Formulario  --}}
                <form action="{{ route('analisis.guardarriesgo') }}" method="post" id="submit_analisis_social">  
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
                                            <div class="col-lg-6 fl">
                                                <label for="observaciones"><b>Punto de control</b></label>
                                                <textarea class="form-control gray_area" name="punto_control" placeholder="" id="punto_control" rows="2">{{ $alcance_social->criterio }}</textarea>
                                            </div>
                                
                                        @else
                                            <div class="col-lg-6 fl">
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
                                            <div class="col-lg-6 fl">
                                                <label for="observaciones"><b>Factor de riesgo</b></label>
                                                <textarea class="form-control gray_area" name="factor_riesgo" placeholder="" id="factor_riesgo" rows="2">{{ $alcance_social->factores_riesgo }}</textarea>
                                                <input type="hidden" name="id_alcance_seleccionado" value="{{ $alcance_social->id }}">

                                            </div>
                                            <div class="col-lg-6 fl">
                                                <label for="observaciones"><b>Evento de riesgo</b></label>
                                                <textarea class="form-control gray_area" name="evento_riesgo" placeholder="" id="evento_riesgo" rows="2">{{ $alcance_social->eventos_riesgo }}</textarea>
                                            </div>
                                        @else
                                            <!-- <div class="col-lg-4">
                                                <label for="observaciones"><b>Punto de control</b></label>
                                                <textarea class="form-control gray_area" name="punto_control" placeholder="" id="punto_control" rows="2"></textarea>
                                            </div> -->
                                            <div class="col-lg-6 fl">
                                                <label for="observaciones"><b>Factor de riesgo</b></label>
                                                <textarea class="form-control gray_area" name="factor_riesgo" placeholder="" id="factor_riesgo" rows="2"></textarea>

                                            </div>
                                            <div class="col-lg-6 fl">
                                                <label for="observaciones"><b>Evento de riesgo</b></label>
                                                <textarea class="form-control gray_area" name="evento_riesgo" placeholder="" id="evento_riesgo" rows="2"></textarea>
                                            </div>
                                        @endif
                                    </div>

                                    <div class="row form-group">
                                        <div class="col-lg-4 fl">
                                            <label for="observaciones"><b>Recursos Expuestos (Activos)</b></label>
                                            <input type="text" class="form-control gray_area" name="recursos_expuestos" id="recursos_expuestos"/>
                                        </div>
                                        <div class="col-lg-4 fl">
                                            <label for="observaciones"><b>Fuente de Riesgo</b></label>
                                            <input type="text" class="form-control gray_area" name="fuente_riesgo" id="fuente_riesgo"/>
                                        </div>
                                        <div class="col-lg-4 fl">
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
                                        <div class="col-lg-4 fl">
                                            <label><b>Nivel de control</b></label>
                                            <select class="form-control gray_area" id="nivel_control" name="nivel_control"  required >
                                                <option value="" disabled selected>Selecciona una opción</option>
                                                <option value="1">Inoperante</option>
                                                <option value="2" >Sin control</option>
                                                <option value="3" >Deficiente</option>
                                                <option value="4" >Regular</option>
                                                <option value="5" >Eficiente</option>
                                                <option value="6" >Optimo</option>
                                            </select>
                                        </div>
                                        <div class="col-lg-8 mt-2 nivel_inoperante fl">
                                            <label><b>Descripción</b></label>
                                            <textarea class="form-control gray_area" name="descripción" placeholder="" id="descripcion" rows="2">Cuenta con los criterios de aplicación pero no funciona</textarea>
                                        </div>
                                        <div class="col-lg-8 mt-2 oculto nivel_sincontrol fl">
                                            <label><b>Descripción</b></label>
                                            <textarea class="form-control gray_area" name="descripción" placeholder="" id="descripcion" rows="2">No se cuenta con las medidas de control.</textarea>
                                        </div>
                                        <div class="col-lg-8 mt-2 oculto nivel_deficiente fl">
                                            <label><b>Descripción</b></label>
                                            <textarea class="form-control gray_area" name="descripción" placeholder="" id="descripcion" rows="2">Cuenta con los criterios de aplicación pero no son los adecuados para la instalación.</textarea>
                                        </div>
                                        <div class="col-lg-8 mt-2 oculto regular fl">
                                            <label><b>Descripción</b></label>
                                            <textarea class="form-control gray_area" name="descripción" placeholder="" id="descripcion" rows="2">Cuenta con los criterios de aplicación pero existen posibilidades de mejora.</textarea>
                                        </div>
                                        <div class="col-lg-8 mt-2 oculto eficiente fl">
                                            <label><b>Descripción</b></label>
                                            <textarea class="form-control gray_area" name="descripción" placeholder="" id="descripcion" rows="2">Los criterios de aplicación son los adecuados a la instalación.</textarea>
                                        </div>
                                        <div class="col-lg-8 mt-2 oculto optimo fl">
                                            <label><b>Descripción</b></label>
                                            <textarea class="form-control gray_area" name="descripción" placeholder="" id="descripcion" rows="2">Excede los criterios de aplicación.</textarea>
                                        </div>
                                    </div>

                                    <div class="row form-group">
                                        <div class="col-lg-12 fl">
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
                                            <label for="observaciones"><b style="font-size: 15px;">Deficiencia medidas de seguridad</b></label><br>
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
                                                            Documentales
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
                                                                        <input type="checkbox" value="1" name="impactos_negocio[]"/>
                                                                        <span></span>
                                                                        Patrimonial
                                                                    </label>
                                                                    <label class="checkbox">
                                                                        <input type="checkbox" value="2"  name="impactos_negocio[]"/>
                                                                        <span></span>
                                                                        Operacional
                                                                    </label>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-3">
                                                                <div class="checkbox-list">

                                                                    <label class="checkbox">
                                                                        <input type="checkbox" value="3" name="impactos_negocio[]"/>
                                                                        <span></span>
                                                                        Comercial
                                                                    </label>
                                                                    <label class="checkbox">
                                                                        <input type="checkbox" value="4" name="impactos_negocio[]"/>
                                                                        <span></span>
                                                                        Reputacional
                                                                    </label>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-3">
                                                                <div class="checkbox-list">
                                                                    <label class="checkbox">
                                                                        <input type="checkbox" value="5" name="impactos_negocio[]"/>
                                                                        <span></span>
                                                                        Humano
                                                                    </label>
                                                                    <label class="checkbox">
                                                                        <input type="checkbox" value="6" name="impactos_negocio[]"/>
                                                                        <span></span>
                                                                        Ambiental
                                                                    </label>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-3">
                                                                <div class="checkbox-list">
                                                                    <label class="checkbox">
                                                                        <input type="checkbox" value="7" name="impactos_negocio[]"/>
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
                                        <div class="col-lg-8 fl">
                                            <label for="contramedidas"><b>Medidas de Mitigacón</b></label>
                                            @if($id_alcance != 0)
                                                <textarea class="form-control gray_area" name="contramedidas" placeholder="" id="contramedidas" rows="5">{{ $alcance_social->contramedidas }}</textarea>
                                            @else
                                                <textarea class="form-control gray_area" name="contramedidas" placeholder="" id="contramedidas" rows="5"></textarea>
                                            @endif

                                            <!-- <div class="row mt-2"> … (comentarios intactos) … </div> -->

                                            <div class="row mt-2">
                                                <div class="col-lg-4 nivel_inoperante fl">
                                                    <label for="observaciones"><b>Factor de exposición</b></label>
                                                    <input type="text" class="form-control gray_area" disabled name="factor_exposicion" id="factor_exposicion" value="Muy Alta"/>
                                                </div>

                                                <div class="col-lg-4 oculto nivel_sincontrol fl">
                                                    <label for="observaciones"><b>Factor de exposición</b></label>
                                                    <input type="text" class="form-control gray_area" disabled name="factor_exposicion" id="factor_exposicion" value="Muy Alta"/>
                                                </div>

                                                <div class="col-lg-4 oculto nivel_deficiente fl">
                                                    <label for="observaciones"><b>Factor de exposición</b></label>
                                                    <input type="text" class="form-control gray_area" disabled name="factor_exposicion" id="factor_exposicion" value="Alta"/>
                                                </div>
                                                <div class="col-lg-4 oculto regular fl">
                                                    <label for="observaciones"><b>Factor de exposición</b></label>
                                                    <input type="text" class="form-control gray_area" disabled name="factor_exposicion" id="factor_exposicion" value="Media"/>
                                                </div>
                                                <div class="col-lg-4 oculto eficiente fl">
                                                    <label for="observaciones"><b>Factor de exposición</b></label>
                                                    <input type="text" class="form-control gray_area" disabled name="factor_exposicion" id="factor_exposicion" value="Baja"/>
                                                </div>
                                                <div class="col-lg-4 oculto optimo fl">
                                                    <label for="observaciones"><b>Factor de exposición</b></label>
                                                    <input type="text" class="form-control gray_area" disabled name="factor_exposicion" id="factor_exposicion" value="Muy Baja"/>
                                                </div>

                                                <div class="col-lg-4 fl">
                                                    <label><b>Factor de probabilidad</b></label>
                                                    <select class="form-control gray_area" id="factor_probabilidad" name="factor_probabilidad"  required >
                                                        <option value="" disabled selected>Selecciona una opción</option>
                                                        <option value="1">Muy Alta</option>
                                                        <option value="2" >Alta</option>
                                                        <option value="3" >Media</option>
                                                        <option value="4" >Baja</option>
                                                        <option value="5" >Muy Baja</option>
                                                    </select>
                                                </div>
                                                
                                                <div class="col-lg-4 fl">
                                                    <label><b>Impacto/Severidad</b></label>
                                                    <select class="form-control gray_area" id="impacto_severidad" name="impacto_severidad"  required >
                                                        <option value="" disabled selected>Selecciona una opción</option>
                                                        <option value="1">Insignificante</option>
                                                        <option value="2" >Leve</option>
                                                        <option value="3" >Marginal</option>
                                                        <option value="4" >Grave</option>
                                                        <option value="5" >Critíco</option>
                                                        <option value="6" >Desastroso</option>
                                                        <option value="7" >Catastrófico</option>
                                                    </select>
                                                </div>

                                            </div>
                                        </div>

                                        <div class="col-lg-4 text-center">

                                            <div class="risk-level nivelmma">
                                                <span class="title">Nivel de Riesgo </span>
                                                <span style="display:block;height:0.5lh" aria-hidden="true"></span>
                                                <div class="risk-color" style="background-color: #8B0000;">Muy alto</div>
                                            </div>
                                            <div class="risk-level nivelma oculto" style="display: none;">
                                                <span class="title">Nivel de Riesgo </span>
                                                <span style="display:block;height:0.5lh" aria-hidden="true"></span>
                                                <div class="risk-color" style="background-color: #8B0000;">Muy alto</div>
                                            </div>
                                            <div class="risk-level oculto nivela" style="display: none;">
                                                <span class="title">Nivel de Riesgo </span>
                                                <span style="display:block;height:0.5lh" aria-hidden="true"></span>
                                                <div class="risk-color" style="background-color: #FF0000;">Alto</div>
                                            </div>
                                            <div class="risk-level oculto nivelm" style="display: none;">
                                                <span class="title">Nivel de Riesgo </span>
                                                <span style="display:block;height:0.5lh" aria-hidden="true"></span>
                                                <div class="risk-color" style="background-color: #f4c542;">Medio</div>
                                            </div>
                                            <div class="risk-level oculto nivelb" style="display: none;">
                                                <span class="title">Nivel de Riesgo </span>
                                                <span style="display:block;height:0.5lh" aria-hidden="true"></span>
                                                <div class="risk-color" style="background-color: #32CD32;">Bajo</div>
                                            </div>
                                            <div class="risk-level oculto nivelmb" style="display: none;">
                                                <span class="title">Nivel de Riesgo </span>
                                                <span style="display:block;height:0.5lh" aria-hidden="true"></span>
                                                <div class="risk-color" style="color:black; background-color: #F1EBEB;">Muy Bajo</div>
                                            </div> 
                                            <div class="risk-level oculto nivelmmb" style="display: none;">
                                                <span class="title">Nivel de Riesgo </span>
                                                <span style="display:block;height:0.5lh" aria-hidden="true"></span>
                                                <div class="risk-color" style="color:black; background-color: #F1EBEB;">Muy Bajo</div>
                                            </div>
                                            <div class="text-centerx">
                                                <label>Índice Potencial de daño: </label>
                                                <label style="font-weight: bolder; font-size: 15px;" id="nivel_riesgo2">0</label>
                                            </div>

                                            <!-- ===== GAUGE SVG (Degradado continuo + Aguja) ===== -->
                                            <div class="gauge2" id="svgGaugeWrap">
                                              <svg id="riskGauge" viewBox="0 0 300 190" aria-label="Indicador de riesgo">
                                                <defs>
                                                  <!-- Un ÚNICO degradado que recorre TODO el arco.
                                                       Stops densos alrededor de 10%, 19% y 39% para que el cambio sea suave -->
                                                  <linearGradient id="gBandGrad" gradientUnits="userSpaceOnUse">
                                                    <!-- 0% → 10%  (VERDE) -->
                                                    <stop offset="0%"   stop-color="#67C46A"/>
                                                    <stop offset="6%"   stop-color="#6DCA6B"/>
                                                    <stop offset="9%"   stop-color="#75CE67"/>
                                                    <stop offset="10%"  stop-color="#85D05F"/>

                                                    <!-- 10% → 19% (fundido a AMARILLO) -->
                                                    <stop offset="12%"  stop-color="#BFD35C"/>
                                                    <stop offset="15%"  stop-color="#E2CF53"/>
                                                    <stop offset="17%"  stop-color="#F0CB4D"/>
                                                    <stop offset="19%"  stop-color="#F4C94A"/>

                                                    <!-- 19% → 39% (fundido a ROJO) -->
                                                    <stop offset="25%"  stop-color="#F28C3D"/>
                                                    <stop offset="30%"  stop-color="#EE5D3A"/>
                                                    <stop offset="35%"  stop-color="#E84237"/>
                                                    <stop offset="39%"  stop-color="#E03834"/>

                                                    <!-- 39% → 100% (fundido a ROJO OSCURO) -->
                                                    <stop offset="50%"  stop-color="#C42525"/>
                                                    <stop offset="65%"  stop-color="#A81C1C"/>
                                                    <stop offset="80%"  stop-color="#911515"/>
                                                    <stop offset="100%" stop-color="#7A0E0E"/>
                                                  </linearGradient>
                                                </defs>

                                                <!-- Pista clara -->
                                                <path id="gTrack" class="track" d=""/>

                                                <!-- Banda de color con degradado REAL -->
                                                <path id="gBand" class="band" stroke="url(#gBandGrad)" d=""/>

                                                <!-- Ticks -->
                                                <g id="gTicks"></g>

                                                <text id="gCaption" class="cap"   x="150" y="108" text-anchor="middle">Índice Potencial</text>
                                                <text id="gValue"   class="value" x="150" y="128" text-anchor="middle">0.00</text>

                                                <!-- Aguja -->
                                                <g id="gNeedle" class="needle" transform="rotate(-180 150 160)">
                                                  <line x1="150" y1="160" x2="260" y2="160"></line>
                                                  <polygon points="260,160 242,154 242,166"></polygon>
                                                </g>
                                                <circle cx="150" cy="160" r="10" class="hub"></circle>
                                              </svg>
                                            </div>
                                            <!-- ===== /GAUGE SVG ===== -->

                                            <!-- Fallback imágenes (se mantienen) -->
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

@push('scripts')
<script>
/* ===== Presentacional: marca campos con valor y foco ===== */
document.addEventListener('DOMContentLoaded', function(){
  function mark(el){
    var v = (el && el.value || '').trim();
    if(!el) return;
    if(v.length){ el.classList.add('ui-validated'); }
    else{ el.classList.remove('ui-validated'); }
  }
  var fields = document.querySelectorAll('.form-control.gray_area, .form-control:not([type=hidden]), select.form-control');
  fields.forEach(function(el){ mark(el); el.addEventListener('input', function(){ mark(el); }); el.addEventListener('change', function(){ mark(el); }); });

  document.querySelectorAll('.fl .form-control, .fl select.form-control, .fl textarea.form-control').forEach(function(el){
    el.addEventListener('focus', function(){ var w = el.closest('.fl'); if(w) w.classList.add('is-focus'); });
    el.addEventListener('blur', function(){ var w = el.closest('.fl'); if(w) w.classList.remove('is-focus'); });
  });
});


/* ==== Banda única con degradado continuo (0=izq, 100=der) ==== */
(function(){
  const svg = document.getElementById('riskGauge');
  if(!svg) return;

  const R  = 120;
  const CX = 150, CY = 160;
  const deg2rad = d => (Math.PI/180)*d;
  const polar = (deg)=>({ x: CX + R*Math.cos(deg2rad(deg)), y: CY - R*Math.sin(deg2rad(deg)) });

  const LEFT=180, RIGHT=0, TOP=90;

  // Arco superior para pista y banda
  const arcPath = `M ${polar(LEFT).x} ${polar(LEFT).y} A ${R} ${R} 0 0 1 ${polar(TOP).x} ${polar(TOP).y} A ${R} ${R} 0 0 1 ${polar(RIGHT).x} ${polar(RIGHT).y}`;
  document.getElementById('gTrack').setAttribute('d', arcPath);
  document.getElementById('gBand').setAttribute('d',  arcPath);

  // Orientamos el degradado exactamente de IZQ → DER del arco
  (function orientGradient(){
    const g = document.getElementById('gBandGrad');
    const pS = polar(LEFT), pE = polar(RIGHT);
    g.setAttribute('x1', pS.x); g.setAttribute('y1', pS.y);
    g.setAttribute('x2', pE.x); g.setAttribute('y2', pE.y);
  })();

  // Ticks cada 10
  const ticks = document.getElementById('gTicks'); ticks.innerHTML='';
  for(let v=10; v<100; v+=10){
    const a  = 180 - v*1.8;
    const p1 = { x: CX + (R+1 )*Math.cos(deg2rad(a)), y: CY - (R+1 )*Math.sin(deg2rad(a)) };
    const p2 = { x: CX + (R+11)*Math.cos(deg2rad(a)), y: CY - (R+11)*Math.sin(deg2rad(a)) };
    const el = document.createElementNS('http://www.w3.org/2000/svg','line');
    el.setAttribute('x1',p1.x); el.setAttribute('y1',p1.y);
    el.setAttribute('x2',p2.x); el.setAttribute('y2',p2.y);
    el.setAttribute('class','tick');
    ticks.appendChild(el);
  }

  // Valor → ángulo
  const clamp    = v => Math.max(0,Math.min(100,v));
  const mapAngle = v => (clamp(v)*1.8 - 180); // 0 izq, 50 arriba, 100 der

  // Lectura (respeta tu lógica existente)
  function readRisk(){
    const h = document.getElementById('nivel_riesgo');
    let v = parseFloat(h && h.value);
    if(!isNaN(v)) return clamp(v);

    const nc  = (document.getElementById('nivel_control')||{}).value || '1';
    const fp  = (document.getElementById('factor_probabilidad')||{}).value || '1';
    const isv = (document.getElementById('impacto_severidad')||{}).value || '1';

    const mapNC = {1:3.162,2:3.162,3:2.530,4:1.897,5:1.265,6:0.632};
    const mapFP = {1:3.162,2:2.530,3:1.897,4:1.265,5:0.632};
    const mapIS = {1:0.4,2:1.2,3:2.0,4:4.0,5:6.0,6:8.0,7:10.0};

    v = (mapNC[nc]*mapFP[fp])*mapIS[isv];
    return clamp(v);
  }

  const needle = document.getElementById('gNeedle');
  const txt    = document.getElementById('gValue');

  function update(){
    const v = readRisk();
    needle.setAttribute('transform', `rotate(${mapAngle(v)} ${CX} ${CY})`);
    const t = document.getElementById('nivel_riesgo2');
    txt.textContent = (t && t.innerText && t.innerText.trim()) ? t.innerText.trim() : v.toFixed(2);
  }

  update();
  document.addEventListener('change', e=>{
    const id = e.target && e.target.id;
    if(id==='nivel_control' || id==='factor_probabilidad' || id==='impacto_severidad'){ update(); }
  });
  const target = document.getElementById('nivel_riesgo2');
  if(window.MutationObserver && target){
    new MutationObserver(update).observe(target,{childList:true,characterData:true,subtree:true});
  }
})();
</script>

<script>
/* ===== Persistencia por Punto Normativo + Reset al salir =====
   - Mantiene: #recursos_expuestos, #fuente_riesgo, #ubicacion_riesgo entre opciones 1..9 del MISMO PN.
   - Al cambiar de PN, limpia.
   - Si sales de la vista y regresas más tarde, se reinicia (no se arrastran valores).
   - Solo conserva al ir a Siguiente/Anterior o Guardar dentro del mismo PN.
*/
(function persistTresCamposPorAlcance(){
  const $idCli = document.getElementById('id_cliente');
  const $idTip = document.getElementById('id_tipo');
  const $idAlc = document.getElementById('id_alcance'); // hidden con el alcance actual
  if(!$idCli || !$idTip || !$idAlc) return;

  const idCliente = $idCli.value, idTipo = $idTip.value, idAlcance = $idAlc.value;

  // Claves de sessionStorage
  const KEY      = `resfields:${idCliente}:${idTipo}:${idAlcance}`;       // valores de los 3 campos
  const KEEP_KEY = `resfields:keep:${idCliente}:${idTipo}:${idAlcance}`;  // bandera de navegación interna (1..9/guardar)

  const $re = document.getElementById('recursos_expuestos');
  const $fr = document.getElementById('fuente_riesgo');
  const $ur = document.getElementById('ubicacion_riesgo');
  if(!$re || !$fr || !$ur) return; // en pantallas “Vacío” no existen

  // 1) Restaurar si hay guardado para ESTE PN (opciones 1..9)
  try{
    const raw = sessionStorage.getItem(KEY);
    if(raw){
      const data = JSON.parse(raw);
      if(typeof data.re === 'string') $re.value = data.re;
      if(typeof data.fr === 'string') $fr.value = data.fr;
      if(typeof data.ur === 'string') $ur.value = data.ur;
    }
  }catch(_){}

  // 2) Guardar en cada cambio/tecleo
  const save = () => {
    const data = {
      re: ($re.value || '').trim(),
      fr: ($fr.value || '').trim(),
      ur: ($ur.value || '').trim(),
    };
    sessionStorage.setItem(KEY, JSON.stringify(data));
  };
  [$re,$fr,$ur].forEach(el=>{
    el.addEventListener('input', save);
    el.addEventListener('change', save);
  });

  // 3) Navegación interna (Siguiente/Anterior/Guardar) => marcar "KEEP" para NO limpiar al salir
  const markKeep = () => sessionStorage.setItem(KEEP_KEY, '1');
  document.getElementById('alcance_mas')?.addEventListener('click',  () => { save(); markKeep(); });
  document.getElementById('alcance_menos')?.addEventListener('click',() => { save(); markKeep(); });
  document.getElementById('btnGuardar')?.addEventListener('click',   () => { save(); markKeep(); });

  // 4) Al cambiar de Punto normativo: limpiar lo guardado y los inputs
  const selPN = document.getElementById('punto_normativo');
  if(selPN){
    selPN.addEventListener('change', function(){
      try { sessionStorage.removeItem(KEY); } catch(_){}
      $re.value = ''; $fr.value = ''; $ur.value = '';
    });
  }

  // 5) Al SALIR de esta vista: si NO fue navegación interna, borrar lo guardado
  window.addEventListener('pagehide', function(){
    if (!sessionStorage.getItem(KEEP_KEY)) {
      try { sessionStorage.removeItem(KEY); } catch(_){}
    }
  });

  // 6) Limpiar la bandera KEEP al iniciar la vista (para futuros abandonos)
  try { sessionStorage.removeItem(KEEP_KEY); } catch(_){}
})();
</script>


@endpush
