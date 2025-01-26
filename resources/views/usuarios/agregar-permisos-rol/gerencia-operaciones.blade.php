<div class="card card-custom mt-3">
  <div class="card-header">
    <h3 class="card-title">Dirección de operaciones</h3>
    <div class="card-toolbar">
      <input type='checkbox' id='all_unidades_check'> Seleccionar Todos los permisos
    </div>
  </div>
  <div class="card-body">
    <div class="row">
      <div class="col-md-4">
        <ul class="nav nav-tabs nav-tabs-line">
          <li class="nav-item">
            <a class="nav-link unidad_tab" data-toggle="tab" href="#kt_tab_pane_3"><b>Parque Vehicular</b></a>
          </li>
        </ul>

        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade" id="kt_tab_pane_3" role="tabpanel">
              <div class="form-group">
                <input type="hidden" id="op_unidad" value="0">

                <div class="row">
                  <div class="col-md-4"></div>
                  <div class="col-md-8 oldcheck">
                    <input type='checkbox' id='all_unidad'> Seleccionar todos
                  </div>
                </div>

                @foreach($unidades as $value)
                  <div class="row mt-2">
                    <div class="col-md-8">
                      <label>{{ $value->guard_names }}</label>
                    </div>
                    <div class="col-md-4">
                      <div class="form-group">
                        <span class="switch switch-icon">
                        <label>
                        <input type="checkbox" name="permission[]" class='unidad_check all_unidades' value="{{ $value->id }}"> 
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
            <a class="nav-link marca_tab" data-toggle="tab" href="#kt_tab_pane_4">Marcas</a>
          </li>
        </ul>


        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade" id="kt_tab_pane_4" role="tabpanel">
              <div class="form-group">
                <input type="hidden" id="op_marca" value="0">

                <div class="row">
                  <div class="col-md-4"></div>
                  <div class="col-md-8 oldcheck">
                    <input type='checkbox' id='all_marca'> Seleccionar todos
                  </div>
                </div>

                @foreach($marcas as $value)
                  <div class="row mt-2">
                    <div class="col-md-8">
                      <label>{{ $value->guard_names }}</label>
                    </div>
                    <div class="col-md-4">
                      <div class="form-group">
                        <span class="switch switch-icon">
                        <label>
                        <input type="checkbox" name="permission[]" class='marca_check all_unidades' value="{{ $value->id }}"> 
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
            <a class="nav-link modelo_tab" data-toggle="tab" href="#kt_tab_pane_5">Modelo</a>
          </li>
        </ul>

        <div class="tab-content" id="myTabContent">
          <div class="tab-pane fade" id="kt_tab_pane_5" role="tabpanel">
            <div class="form-group">
              <input type="hidden" id="op_modelo" value="0">
              <div class="row">
                <div class="col-md-4"></div>
                <div class="col-md-8 oldcheck">
                  <input type='checkbox' id='all_modelo'> Seleccionar todos
                </div>
              </div>

              @foreach($modelos as $value)
                <div class="row mt-2">
                  <div class="col-md-8">
                    <label>{{ $value->guard_names }}</label>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                      <span class="switch switch-icon">
                      <label>
                      <input type="checkbox" name="permission[]" class='modelo_check all_unidades' value="{{ $value->id }}"> 
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
            <a class="nav-link tipovehiculo_tab" data-toggle="tab" href="#kt_tab_pane_12">Tipo de vehículo</a>
          </li>
        </ul>

        <div class="tab-content" id="myTabContent">
          <div class="tab-pane fade" id="kt_tab_pane_12" role="tabpanel">
            <div class="form-group">
              <input type="hidden" id="op_tipovehiculo" value="0">

              <div class="row">
                <div class="col-md-4"></div>
                <div class="col-md-8 oldcheck">
                  <input type='checkbox' id='all_tipovehiculo'> Seleccionar todos
                </div>
              </div>

              @foreach($tipovehiculo as $value)
                <div class="row mt-2">
                  <div class="col-md-8">
                    <label>{{ $value->guard_names }}</label>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                      <span class="switch switch-icon">
                      <label>
                      <input type="checkbox" name="permission[]" class='tipovehiculo_check all_unidades' value="{{ $value->id }}"> 
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
            <a class="nav-link estatus_tab" data-toggle="tab" href="#kt_tab_pane_7">Estatus</a>
          </li>
        </ul>

        <div class="tab-content" id="myTabContent">
          <div class="tab-pane fade" id="kt_tab_pane_7" role="tabpanel">
            <div class="form-group">
              <input type="hidden" id="op_estatus" value="0">

              <div class="row">
                <div class="col-md-4"></div>
                <div class="col-md-8 oldcheck">
                  <input type='checkbox' id='all_estatus'> Seleccionar todos
                </div>
              </div>

              @foreach($estatus as $value)
                <div class="row mt-2">
                  <div class="col-md-8">
                    <label>{{ $value->guard_names }}</label>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                      <span class="switch switch-icon">
                      <label>
                      <input type="checkbox" name="permission[]" class='estatus_check all_unidades' value="{{ $value->id }}"> 
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
            <a class="nav-link aseguradora_tab" data-toggle="tab" href="#kt_tab_pane_8">Aseguradoras</a>
          </li>
        </ul>

        <div class="tab-content" id="myTabContent">
          <div class="tab-pane fade" id="kt_tab_pane_8" role="tabpanel">
            <div class="form-group">
              <input type="hidden" id="op_aseguradora" value="0">

              <div class="row">
                <div class="col-md-4"></div>
                <div class="col-md-8 oldcheck">
                  <input type='checkbox' id='all_aseguradora'> Seleccionar todos
                </div>
              </div>

              @foreach($aseguradoras as $value)
                <div class="row mt-2">
                  <div class="col-md-8">
                    <label>{{ $value->guard_names }}</label>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                      <span class="switch switch-icon">
                      <label>
                      <input type="checkbox" name="permission[]" class='aseguradora_check all_unidades' value="{{ $value->id }}"> 
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
            <a class="nav-link agencia_tab" data-toggle="tab" href="#kt_tab_pane_13">Agencias de vehículos</a>
          </li>
        </ul>

        <div class="tab-content" id="myTabContent">
          <div class="tab-pane fade" id="kt_tab_pane_13" role="tabpanel">
            <div class="form-group">
              <input type="hidden" id="op_agencia" value="0">

              <div class="row">
                <div class="col-md-4"></div>
                <div class="col-md-8 oldcheck">
                  <input type='checkbox' id='all_agencia'> Seleccionar todos
                </div>
              </div>

              @foreach($agencia as $value)
                <div class="row mt-2">
                  <div class="col-md-8">
                    <label>{{ $value->guard_names }}</label>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                      <span class="switch switch-icon">
                      <label>
                      <input type="checkbox" name="permission[]" class='agencia_check all_unidades' value="{{ $value->id }}"> 
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
            <a class="nav-link documento_tab" data-toggle="tab" href="#kt_tab_pane_14">Tipo de documento</a>
          </li>
        </ul>

        <div class="tab-content" id="myTabContent">
          <div class="tab-pane fade" id="kt_tab_pane_14" role="tabpanel">
            <div class="form-group">
              <input type="hidden" id="op_documento" value="0">

              <div class="row">
                <div class="col-md-4"></div>
                <div class="col-md-8 oldcheck">
                  <input type='checkbox' id='all_documento'> Seleccionar todos
                </div>
              </div>

              @foreach($tipo_documento as $value)
                <div class="row mt-2">
                  <div class="col-md-8">
                    <label>{{ $value->guard_names }}</label>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                      <span class="switch switch-icon">
                      <label>
                      <input type="checkbox" name="permission[]" class='documento_check all_unidades' value="{{ $value->id }}"> 
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
            <a class="nav-link asignacion_tab" data-toggle="tab" href="#kt_tab_pane_15">Tipo de asignación</a>
          </li>
        </ul>

        <div class="tab-content" id="myTabContent">
          <div class="tab-pane fade" id="kt_tab_pane_15" role="tabpanel">
            <div class="form-group">
              <input type="hidden" id="op_asignacion" value="0">

              <div class="row">
                <div class="col-md-4"></div>
                <div class="col-md-8 oldcheck">
                  <input type='checkbox' id='all_asignacion'> Seleccionar todos
                </div>
              </div>

              @foreach($tipo_asignacion as $value)
                <div class="row mt-2">
                  <div class="col-md-8">
                    <label>{{ $value->guard_names }}</label>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                      <span class="switch switch-icon">
                      <label>
                      <input type="checkbox" name="permission[]" class='asignacion_check all_unidades' value="{{ $value->id }}"> 
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
            <a class="nav-link ubicacion_tab" data-toggle="tab" href="#kt_tab_pane_6"><b>Patios</b></a>
          </li>
        </ul>

        <div class="tab-content" id="myTabContent">
          <div class="tab-pane fade" id="kt_tab_pane_6" role="tabpanel">
            <div class="form-group">
              <input type="hidden" id="op_ubicacion" value="0">
              <div class="row">
                <div class="col-md-4"></div>
                <div class="col-md-8 oldcheck">
                  <input type='checkbox' id='all_ubicacion'> Seleccionar todos
                </div>
              </div>

              @foreach($ubicaciones as $value)
                <div class="row mt-2">
                  <div class="col-md-8">
                    <label>{{ $value->guard_names }}</label>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                      <span class="switch switch-icon">
                      <label>
                      <input type="checkbox" name="permission[]" class='ubicacion_check all_unidades' value="{{ $value->id }}"> 
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
            <a class="nav-link mantenimiento_tab" data-toggle="tab" href="#kt_tab_pane_mantenimiento"><b>Mantenimiento</b></a>
          </li>
        </ul>

        <div class="tab-content" id="myTabContent">
          <div class="tab-pane fade" id="kt_tab_pane_mantenimiento" role="tabpanel">
            <div class="form-group">
              <input type="hidden" id="op_mantenimiento" value="0">
              <div class="row">
                <div class="col-md-4"></div>
                <div class="col-md-8 oldcheck">
                  <input type='checkbox' id='all_mantenimiento'> Seleccionar todos
                </div>
              </div>

              @foreach($mantenimientos as $value)
                <div class="row mt-2">
                  <div class="col-md-8">
                    <label>{{ $value->guard_names }}</label>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                      <span class="switch switch-icon">
                      <label>
                      <input type="checkbox" name="permission[]" class='mantenimiento_check all_unidades' value="{{ $value->id }}"> 
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