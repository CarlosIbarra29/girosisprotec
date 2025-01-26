<div class="card card-custom mt-4">
  <div class="card-header">
    <h3 class="card-title">Administración del sistema</h3>
    <div class="card-toolbar">
      <input type='checkbox' id='all_generales_check'> Seleccionar Todos los permisos
    </div>
  </div>
  <div class="card-body">
    <div class="row">   
      <div class="col-md-4">  
        <ul class="nav nav-tabs nav-tabs-line">
          <li class="nav-item">
            <a class="nav-link tablero_tab" data-toggle="tab" href="#kt_tab_pane_tablero"><b>Tablero</b></a>
          </li>
        </ul>

        <div class="tab-content" id="myTabContent">
          <div class="tab-pane fade" id="kt_tab_pane_tablero" role="tabpanel">
            <input type="hidden" id="op_tablero" value="0">
            <div class="row">
              <div class="col-md-4"></div>
              <div class="col-md-8 oldcheck">
                <input type='checkbox' id='CheckTablero'> Seleccionar todos
              </div>
            </div>
            @foreach($tablero as $value)
              <div class="row mt-2">
                <div class="col-md-8">
                  <label>{{ $value->guard_names }}</label>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <span class="switch switch-icon">
                    <label>
                    <input type="checkbox" {{(in_array($value->id , $permiso_roles_id)) ? 'checked' : ''}} name="permission[]" class='tablero_check all_generales' value="{{ $value->id }}" />
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

      <div class="col-md-4">  
        <ul class="nav nav-tabs nav-tabs-line">
          <li class="nav-item">
            <a class="nav-link rol_tab" data-toggle="tab" href="#kt_tab_pane_2"><b>Listado de Roles</b></a>
          </li>
        </ul>

        <div class="tab-content" id="myTabContent">
          <div class="tab-pane fade" id="kt_tab_pane_2" role="tabpanel">
            <input type="hidden" id="op_rol" value="0">
            <div class="row">
              <div class="col-md-4"></div>
              <div class="col-md-8 oldcheck">
                <input type='checkbox' id='CheckAll'> Seleccionar todos
              </div>
            </div>
            @foreach($rol as $value)
              <div class="row mt-2">
                <div class="col-md-8">
                  <label>{{ $value->guard_names }}</label>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <span class="switch switch-icon">
                      <label>
                        <input type="checkbox" {{(in_array($value->id , $permiso_roles_id)) ? 'checked' : ''}} name="permission[]" class='roles_check all_generales' value="{{ $value->id }}" />
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

      <div class="col-md-4">
        <ul class="nav nav-tabs nav-tabs-line">
          <li class="nav-item">
            <a class="nav-link user_tab" data-toggle="tab" href="#kt_tab_pane_1"><b>Listado de Usuarios</b></a>
          </li>
        </ul>

        <div class="tab-content" id="myTabContent">
          <div class="tab-pane fade " id="kt_tab_pane_1" role="tabpanel">
            <div class="form-group">
              <input type="hidden" id="op_user" value="0">
              <div class="row">
                <div class="col-md-4"></div>
                <div class="col-md-8 oldcheck">
                  <input type='checkbox' id='all_user'> Seleccionar todos
                </div>
              </div>
              @foreach($usuarios as $value)
                <div class="row mt-2">
                  <div class="col-md-8">
                    <label>{{ $value->guard_names }}</label>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                      <span class="switch switch-icon">
                        <label>
                          <input type="checkbox" {{(in_array($value->id , $permiso_roles_id)) ? 'checked' : ''}} name="permission[]" class='user_check all_generales' value="{{ $value->id }}" />
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