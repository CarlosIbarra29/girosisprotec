<div class="card card-custom mt-3">
  <div class="card-header">
    <h3 class="card-title">Dirección comercial</h3>
    <div class="card-toolbar">
      <input type='checkbox' id='all_clientes_check'> Seleccionar Todos los permisos
    </div>
  </div>
  <div class="card-body">
    <div class="row">
      <div class="col-md-4">
        <ul class="nav nav-tabs nav-tabs-line">
          <li class="nav-item">
            <a class="nav-link clientes_tab" data-toggle="tab" href="#kt_tab_pane_9"><b>Catálogo de clientes</b></a>
          </li>
        </ul>

        <div class="tab-content" id="myTabContent">
          <div class="tab-pane fade show" id="kt_tab_pane_9" role="tabpanel">
            <div class="form-group">
              <input type="hidden" id="op_cliente" value="0">

              <div class="row">
                <div class="col-md-4"></div>
                <div class="col-md-8 oldcheck">
                  <input type='checkbox' id='all_cliente'> Seleccionar todos
                </div>
              </div>

              @foreach($cliente as $value)
                <div class="row mt-2">
                  <div class="col-md-8">
                    <label>{{ $value->guard_names }}</label>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                      <span class="switch switch-icon">
                        <label>
                          <input type="checkbox" name="permission[]" {{(in_array($value->id , $permiso_roles_id)) ? 'checked' : ''}} class='clientes_check all_clientes'  value="{{ $value->id }}" />
                          <span></span>
                        </label>
                      </span>
                    </div>
                  </div>
                </div>
              @endforeach
            </div>
          </div>
        </div>
      </div>

      <div class="col-md-4">
        <ul class="nav nav-tabs nav-tabs-line">
          <li class="nav-item">
            <a class="nav-link estados_tab" data-toggle="tab" href="#kt_tab_pane_10">Estados</a>
          </li>
        </ul>

        <div class="tab-content" id="myTabContent">
          <div class="tab-pane fade show" id="kt_tab_pane_10" role="tabpanel">
            <div class="form-group">
              <input type="hidden" id="op_estado" value="0">

              <div class="row">
                <div class="col-md-4"></div>
                <div class="col-md-8 oldcheck">
                  <input type='checkbox' id='all_estados'> Seleccionar todos
                </div>
              </div>

              @foreach($estado as $value)
                <div class="row mt-2">
                  <div class="col-md-8">
                    <label>{{ $value->guard_names }}</label>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                      <span class="switch switch-icon">
                        <label>
                          <input type="checkbox" name="permission[]" {{(in_array($value->id , $permiso_roles_id)) ? 'checked' : ''}} class='estados_check all_clientes'  value="{{ $value->id }}"/>
                          <span></span>
                        </label>
                      </span>
                    </div>
                  </div>
                </div>
              @endforeach
            </div>
          </div>
        </div>
      </div>

      <div class="col-md-4">
        <ul class="nav nav-tabs nav-tabs-line">
          <li class="nav-item">
            <a class="nav-link municipios_tab" data-toggle="tab" href="#kt_tab_pane_11">Municipios</a>
          </li>
        </ul>

        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show" id="kt_tab_pane_11" role="tabpanel">
              <div class="form-group">
                <input type="hidden" id="op_municipios" value="0">

                <div class="row">
                  <div class="col-md-4"></div>
                  <div class="col-md-8 oldcheck">
                    <input type='checkbox' id='all_municipios'> Seleccionar todos
                  </div>
                </div>

                @foreach($municipio as $value)
                  <div class="row mt-2">
                    <div class="col-md-8">
                      <label>{{ $value->guard_names }}</label>
                    </div>
                    <div class="col-md-4">
                      <div class="form-group">
                        <span class="switch switch-icon">
                          <label>
                            <input type="checkbox" name="permission[]" {{(in_array($value->id , $permiso_roles_id)) ? 'checked' : ''}} class='municipios_check all_clientes'  value="{{ $value->id }}"/>
                            <span></span>
                          </label>
                        </span>
                      </div>  
                    </div>
                  </div>
                @endforeach
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="row">
      <div class="col-md-4">
        <ul class="nav nav-tabs nav-tabs-line">
          <li class="nav-item">
            <a class="nav-link asegmento_tab" data-toggle="tab" href="#kt_tab_pane_16"><b>Administración de segmentos</b></a>
          </li>
        </ul>

        <div class="tab-content" id="myTabContent">
          <div class="tab-pane fade show" id="kt_tab_pane_16" role="tabpanel">
            <div class="form-group">
              <input type="hidden" id="op_asegmento" value="0">

              <div class="row">
                <div class="col-md-4"></div>
                <div class="col-md-8 oldcheck">
                  <input type='checkbox' id='all_asegmento'> Seleccionar todos
                </div>
              </div>

              @foreach($admin_segmento as $value)
                <div class="row mt-2">
                  <div class="col-md-8">
                    <label>{{ $value->guard_names }}</label>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                      <span class="switch switch-icon">
                        <label>
                          <input type="checkbox" name="permission[]" {{(in_array($value->id , $permiso_roles_id)) ? 'checked' : ''}} class='asegmento_check all_clientes' value="{{ $value->id }}"> 
                          <span></span>
                        </label>
                      </span>
                     </div>

                  </div>
                </div>                        
              @endforeach

            </div>
          </div>
        </div>
      </div> 
      <div class="col-md-4">
        <ul class="nav nav-tabs nav-tabs-line">
          <li class="nav-item">
            <a class="nav-link astipovehiculo_tab" data-toggle="tab" href="#kt_tab_pane_17">Tipos de vehículos</a>
          </li>
        </ul>

        <div class="tab-content" id="myTabContent">
          <div class="tab-pane fade show" id="kt_tab_pane_17" role="tabpanel">
            <div class="form-group">
              <input type="hidden" id="op_astipovehiculo" value="0">

              <div class="row">
                <div class="col-md-4"></div>
                <div class="col-md-8 oldcheck">
                  <input type='checkbox' id='all_astipovehiculo'> Seleccionar todos
                </div>
              </div>

              @foreach($as_tipovehiculo as $value)
                <div class="row mt-2">
                  <div class="col-md-8">
                    <label>{{ $value->guard_names }}</label>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                      <span class="switch switch-icon">
                        <label>
                          <input type="checkbox" name="permission[]" {{(in_array($value->id , $permiso_roles_id)) ? 'checked' : ''}} class='astipovehiculo_check all_clientes' value="{{ $value->id }}"> 
                          <span></span>
                        </label>
                      </span>
                     </div>

                  </div>
                </div>                        
              @endforeach

            </div>
          </div>
        </div>
      </div>
      <div class="col-md-4">
        <ul class="nav nav-tabs nav-tabs-line">
          <li class="nav-item">
            <a class="nav-link aspuerta_tab" data-toggle="tab" href="#kt_tab_pane_18">Puertas</a>
          </li>
        </ul>

        <div class="tab-content" id="myTabContent">
          <div class="tab-pane fade show" id="kt_tab_pane_18" role="tabpanel">
            <div class="form-group">
              <input type="hidden" id="op_aspuerta" value="0">

              <div class="row">
                <div class="col-md-4"></div>
                <div class="col-md-8 oldcheck">
                  <input type='checkbox' id='all_aspuerta'> Seleccionar todos
                </div>
              </div>

              @foreach($as_puertas as $value)
                <div class="row mt-2">
                  <div class="col-md-8">
                    <label>{{ $value->guard_names }}</label>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                      <span class="switch switch-icon">
                        <label>
                          <input type="checkbox" name="permission[]" {{(in_array($value->id , $permiso_roles_id)) ? 'checked' : ''}} class='aspuerta_check all_clientes' value="{{ $value->id }}"> 
                          <span></span>
                        </label>
                      </span>
                     </div>

                  </div>
                </div>                        
              @endforeach

            </div>
          </div>
        </div>
      </div>      
    </div>

    <div class="row">
      <div class="col-md-4">
        <ul class="nav nav-tabs nav-tabs-line">
          <li class="nav-item">
            <a class="nav-link ascarroceria_tab" data-toggle="tab" href="#kt_tab_pane_19">Carrocería</a>
          </li>
        </ul>

        <div class="tab-content" id="myTabContent">
          <div class="tab-pane fade show" id="kt_tab_pane_19" role="tabpanel">
            <div class="form-group">
              <input type="hidden" id="op_ascarroceria" value="0">

              <div class="row">
                <div class="col-md-4"></div>
                <div class="col-md-8 oldcheck">
                  <input type='checkbox' id='all_ascarroceria'> Seleccionar todos
                </div>
              </div>

              @foreach($as_carroceria as $value)
                <div class="row mt-2">
                  <div class="col-md-8">
                    <label>{{ $value->guard_names }}</label>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                      <span class="switch switch-icon">
                        <label>
                          <input type="checkbox" name="permission[]" {{(in_array($value->id , $permiso_roles_id)) ? 'checked' : ''}} class='ascarroceria_check all_clientes' value="{{ $value->id }}"> 
                          <span></span>
                        </label>
                      </span>
                     </div>

                  </div>
                </div>                        
              @endforeach

            </div>
          </div>
        </div>
      </div>
      <div class="col-md-4">
        <ul class="nav nav-tabs nav-tabs-line">
          <li class="nav-item">
            <a class="nav-link asnumcilindros_tab" data-toggle="tab" href="#kt_tab_pane_20">Número de cilindros</a>
          </li>
        </ul>

        <div class="tab-content" id="myTabContent">
          <div class="tab-pane fade show" id="kt_tab_pane_20" role="tabpanel">
            <div class="form-group">
              <input type="hidden" id="op_asnumcilindros" value="0">

              <div class="row">
                <div class="col-md-4"></div>
                <div class="col-md-8 oldcheck">
                  <input type='checkbox' id='all_asnumcilindros'> Seleccionar todos
                </div>
              </div>

              @foreach($as_numcilindros as $value)
                <div class="row mt-2">
                  <div class="col-md-8">
                    <label>{{ $value->guard_names }}</label>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                      <span class="switch switch-icon">
                        <label>
                          <input type="checkbox" name="permission[]" {{(in_array($value->id , $permiso_roles_id)) ? 'checked' : ''}} class='asnumcilindros_check all_clientes' value="{{ $value->id }}"> 
                          <span></span>
                        </label>
                      </span>
                     </div>

                  </div>
                </div>                        
              @endforeach

            </div>
          </div>
        </div>
      </div>
      <div class="col-md-4">
        <ul class="nav nav-tabs nav-tabs-line">
          <li class="nav-item">
            <a class="nav-link aspasajeros_tab" data-toggle="tab" href="#kt_tab_pane_21">Pasajeros</a>
          </li>
        </ul>

        <div class="tab-content" id="myTabContent">
          <div class="tab-pane fade show" id="kt_tab_pane_21" role="tabpanel">
            <div class="form-group">
              <input type="hidden" id="op_aspasajeros" value="0">

              <div class="row">
                <div class="col-md-4"></div>
                <div class="col-md-8 oldcheck">
                  <input type='checkbox' id='all_aspasajeros'> Seleccionar todos
                </div>
              </div>

              @foreach($as_pasajeros as $value)
                <div class="row mt-2">
                  <div class="col-md-8">
                    <label>{{ $value->guard_names }}</label>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                      <span class="switch switch-icon">
                        <label>
                          <input type="checkbox" name="permission[]" {{(in_array($value->id , $permiso_roles_id)) ? 'checked' : ''}} class='aspasajeros_check all_clientes' value="{{ $value->id }}"> 
                          <span></span>
                        </label>
                      </span>
                     </div>

                  </div>
                </div>                        
              @endforeach

            </div>
          </div>
        </div>
      </div>  
    </div>

    <div class="row">
      <div class="col-md-4">
        <ul class="nav nav-tabs nav-tabs-line">
          <li class="nav-item">
            <a class="nav-link motor_tab" data-toggle="tab" href="#kt_tab_pane_22">Motor</a>
          </li>
        </ul>

        <div class="tab-content" id="myTabContent">
          <div class="tab-pane fade show" id="kt_tab_pane_22" role="tabpanel">
            <div class="form-group">
              <input type="hidden" id="op_motor" value="0">

              <div class="row">
                <div class="col-md-4"></div>
                <div class="col-md-8 oldcheck">
                  <input type='checkbox' id='all_motor'> Seleccionar todos
                </div>
              </div>

              @foreach($as_motor as $value)
                <div class="row mt-2">
                  <div class="col-md-8">
                    <label>{{ $value->guard_names }}</label>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                      <span class="switch switch-icon">
                        <label>
                          <input type="checkbox" name="permission[]" {{(in_array($value->id , $permiso_roles_id)) ? 'checked' : ''}} class='motor_check all_clientes' value="{{ $value->id }}"> 
                          <span></span>
                        </label>
                      </span>
                     </div>

                  </div>
                </div>                        
              @endforeach

            </div>
          </div>
        </div>
      </div> 
      <div class="col-md-4">
        <ul class="nav nav-tabs nav-tabs-line">
          <li class="nav-item">
            <a class="nav-link asllantarefaccion_tab" data-toggle="tab" href="#kt_tab_pane_23">Llanta de refacción</a>
          </li>
        </ul>

        <div class="tab-content" id="myTabContent">
          <div class="tab-pane fade show" id="kt_tab_pane_23" role="tabpanel">
            <div class="form-group">
              <input type="hidden" id="op_asllantarefaccion" value="0">

              <div class="row">
                <div class="col-md-4"></div>
                <div class="col-md-8 oldcheck">
                  <input type='checkbox' id='all_asllantarefaccion'> Seleccionar todos
                </div>
              </div>

              @foreach($as_llantarefaccion as $value)
                <div class="row mt-2">
                  <div class="col-md-8">
                    <label>{{ $value->guard_names }}</label>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                      <span class="switch switch-icon">
                        <label>
                          <input type="checkbox" name="permission[]" {{(in_array($value->id , $permiso_roles_id)) ? 'checked' : ''}} class='asllantarefaccion_check all_clientes' value="{{ $value->id }}"> 
                          <span></span>
                        </label>
                      </span>
                     </div>

                  </div>
                </div>                        
              @endforeach

            </div>
          </div>
        </div>
      </div> 
      <div class="col-md-4">
        <ul class="nav nav-tabs nav-tabs-line">
          <li class="nav-item">
            <a class="nav-link asespejoslaterales_tab" data-toggle="tab" href="#kt_tab_pane_24">Espejos laterales</a>
          </li>
        </ul>

        <div class="tab-content" id="myTabContent">
          <div class="tab-pane fade show" id="kt_tab_pane_24" role="tabpanel">
            <div class="form-group">
              <input type="hidden" id="op_asespejoslaterales" value="0">

              <div class="row">
                <div class="col-md-4"></div>
                <div class="col-md-8 oldcheck">
                  <input type='checkbox' id='all_asespejoslaterales'> Seleccionar todos
                </div>
              </div>

              @foreach($as_espejoslaterales as $value)
                <div class="row mt-2">
                  <div class="col-md-8">
                    <label>{{ $value->guard_names }}</label>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                      <span class="switch switch-icon">
                        <label>
                          <input type="checkbox" name="permission[]" {{(in_array($value->id , $permiso_roles_id)) ? 'checked' : ''}} class='asespejoslaterales_check all_clientes' value="{{ $value->id }}"> 
                          <span></span>
                        </label>
                      </span>
                     </div>

                  </div>
                </div>                        
              @endforeach

            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="row">
      <div class="col-md-4">
        <ul class="nav nav-tabs nav-tabs-line">
          <li class="nav-item">
            <a class="nav-link asaccesorios_tab" data-toggle="tab" href="#kt_tab_pane_25">Accesorios</a>
          </li>
        </ul>

        <div class="tab-content" id="myTabContent">
          <div class="tab-pane fade show" id="kt_tab_pane_25" role="tabpanel">
            <div class="form-group">
              <input type="hidden" id="op_asaccesorios" value="0">

              <div class="row">
                <div class="col-md-4"></div>
                <div class="col-md-8 oldcheck">
                  <input type='checkbox' id='all_asaccesorios'> Seleccionar todos
                </div>
              </div>

              @foreach($as_accesorios as $value)
                <div class="row mt-2">
                  <div class="col-md-8">
                    <label>{{ $value->guard_names }}</label>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                      <span class="switch switch-icon">
                        <label>
                          <input type="checkbox" name="permission[]" {{(in_array($value->id , $permiso_roles_id)) ? 'checked' : ''}} class='asaccesorios_check all_clientes' value="{{ $value->id }}"> 
                          <span></span>
                        </label>
                      </span>
                     </div>

                  </div>
                </div>                        
              @endforeach

            </div>
          </div>
        </div>
      </div>
      <div class="col-md-4">
        <ul class="nav nav-tabs nav-tabs-line">
          <li class="nav-item">
            <a class="nav-link asapotencia_tab" data-toggle="tab" href="#kt_tab_pane_26">Potencia</a>
          </li>
        </ul>

        <div class="tab-content" id="myTabContent">
          <div class="tab-pane fade show" id="kt_tab_pane_26" role="tabpanel">
            <div class="form-group">
              <input type="hidden" id="op_asapotencia" value="0">

              <div class="row">
                <div class="col-md-4"></div>
                <div class="col-md-8 oldcheck">
                  <input type='checkbox' id='all_asapotencia'> Seleccionar todos
                </div>
              </div>

              @foreach($as_postencia as $value)
                <div class="row mt-2">
                  <div class="col-md-8">
                    <label>{{ $value->guard_names }}</label>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                      <span class="switch switch-icon">
                        <label>
                          <input type="checkbox" name="permission[]" {{(in_array($value->id , $permiso_roles_id)) ? 'checked' : ''}} class='asapotencia_check all_clientes' value="{{ $value->id }}"> 
                          <span></span>
                        </label>
                      </span>
                     </div>

                  </div>
                </div>                        
              @endforeach

            </div>
          </div>
        </div>
      </div>
      <div class="col-md-4">
        <ul class="nav nav-tabs nav-tabs-line">
          <li class="nav-item">
            <a class="nav-link astransmision_tab" data-toggle="tab" href="#kt_tab_pane_27">Transmisión</a>
          </li>
        </ul>

        <div class="tab-content" id="myTabContent">
          <div class="tab-pane fade show" id="kt_tab_pane_27" role="tabpanel">
            <div class="form-group">
              <input type="hidden" id="op_astransmision" value="0">

              <div class="row">
                <div class="col-md-4"></div>
                <div class="col-md-8 oldcheck">
                  <input type='checkbox' id='all_astransmision'> Seleccionar todos
                </div>
              </div>

              @foreach($as_transmision as $value)
                <div class="row mt-2">
                  <div class="col-md-8">
                    <label>{{ $value->guard_names }}</label>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                      <span class="switch switch-icon">
                        <label>
                          <input type="checkbox" name="permission[]" {{(in_array($value->id , $permiso_roles_id)) ? 'checked' : ''}} class='astransmision_check all_clientes' value="{{ $value->id }}"> 
                          <span></span>
                        </label>
                      </span>
                     </div>

                  </div>
                </div>                        
              @endforeach

            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="row">
      <div class="col-md-4">
        <ul class="nav nav-tabs nav-tabs-line">
          <li class="nav-item">
            <a class="nav-link cliunidades_tab" data-toggle="tab" href="#kt_tab_pane_cliunidades"><b>Parque Vehícular</b></a>
          </li>
        </ul>

        <div class="tab-content" id="myTabContent">
          <div class="tab-pane fade show" id="kt_tab_pane_cliunidades" role="tabpanel">
            <div class="form-group">
              <input type="hidden" id="op_cliunidades" value="0">

              <div class="row">
                <div class="col-md-4"></div>
                <div class="col-md-8 oldcheck">
                  <input type='checkbox' id='all_cliunidades'> Seleccionar todos
                </div>
              </div>

              @foreach($cli_unidades as $value)
                <div class="row mt-2">
                  <div class="col-md-8">
                    <label>{{ $value->guard_names }}</label>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                      <span class="switch switch-icon">
                        <label>
                          <input type="checkbox" name="permission[]" {{(in_array($value->id , $permiso_roles_id)) ? 'checked' : ''}} class='cliunidades_check all_clientes' value="{{ $value->id }}"> 
                          <span></span>
                        </label>
                      </span>
                     </div>

                  </div>
                </div>                        
              @endforeach

            </div>
          </div>
        </div>
      </div>
      <div class="col-md-4">
        <ul class="nav nav-tabs nav-tabs-line">
          <li class="nav-item">
            <a class="nav-link concursos_tab" data-toggle="tab" href="#kt_tab_pane_concursos"><b>Concursos</b></a>
          </li>
        </ul>

        <div class="tab-content" id="myTabContent">
          <div class="tab-pane fade show" id="kt_tab_pane_concursos" role="tabpanel">
            <div class="form-group">
              <input type="hidden" id="op_concursos" value="0">

              <div class="row">
                <div class="col-md-4"></div>
                <div class="col-md-8 oldcheck">
                  <input type='checkbox' id='all_concursos'> Seleccionar todos
                </div>
              </div>

              @foreach($concursos as $value)
                <div class="row mt-2">
                  <div class="col-md-8">
                    <label>{{ $value->guard_names }}</label>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                      <span class="switch switch-icon">
                        <label>
                          <input type="checkbox" name="permission[]" {{(in_array($value->id , $permiso_roles_id)) ? 'checked' : ''}} class='concursos_check all_clientes' value="{{ $value->id }}"> 
                          <span></span>
                        </label>
                      </span>
                     </div>

                  </div>
                </div>                        
              @endforeach

            </div>
          </div>
        </div>
      </div>

      <div class="col-md-4">
        <ul class="nav nav-tabs nav-tabs-line">
          <li class="nav-item">
            <a class="nav-link requisiciones_tab" data-toggle="tab" href="#kt_tab_pane_requisiciones"><b>Requisiciones</b></a>
          </li>
        </ul>

        <div class="tab-content" id="myTabContent">
          <div class="tab-pane fade show" id="kt_tab_pane_requisiciones" role="tabpanel">
            <div class="form-group">
              <input type="hidden" id="op_requisiciones" value="0">

              <div class="row">
                <div class="col-md-4"></div>
                <div class="col-md-8 oldcheck">
                  <input type='checkbox' id='all_requisiciones'> Seleccionar todos
                </div>
              </div>

              @foreach($requisiciones as $value)
                <div class="row mt-2">
                  <div class="col-md-8">
                    <label>{{ $value->guard_names }}</label>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                      <span class="switch switch-icon">
                        <label>
                          <input type="checkbox" name="permission[]" {{(in_array($value->id , $permiso_roles_id)) ? 'checked' : ''}} class='requisiciones_check all_clientes' value="{{ $value->id }}"> 
                          <span></span>
                        </label>
                      </span>
                     </div>

                  </div>
                </div>                        
              @endforeach

            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="row">
      <div class="col-md-4">
        <ul class="nav nav-tabs nav-tabs-line">
          <li class="nav-item">
            <a class="nav-link gestordoc_tab" data-toggle="tab" href="#kt_tab_pane_gestordoc"><b>Gestor Documentos</b></a>
          </li>
        </ul>

        <div class="tab-content" id="myTabContent">
          <div class="tab-pane fade show" id="kt_tab_pane_gestordoc" role="tabpanel">
            <div class="form-group">
              <input type="hidden" id="op_gestordoc" value="0">

              <div class="row">
                <div class="col-md-4"></div>
                <div class="col-md-8 oldcheck">
                  <input type='checkbox' id='all_gestordoc'> Seleccionar todos
                </div>
              </div>

              @foreach($gestor_doc as $value)
                <div class="row mt-2">
                  <div class="col-md-8">
                    <label>{{ $value->guard_names }}</label>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                      <span class="switch switch-icon">
                        <label>
                          <input type="checkbox" name="permission[]" {{(in_array($value->id , $permiso_roles_id)) ? 'checked' : ''}} class='gestordoc_check all_clientes' value="{{ $value->id }}"> 
                          <span></span>
                        </label>
                      </span>
                     </div>

                  </div>
                </div>                        
              @endforeach

            </div>
          </div>
        </div>
      </div>
    </div>


  </div>
</div>