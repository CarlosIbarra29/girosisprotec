<div class="card card-custom mt-4">
  <div class="card-header">
    <h3 class="card-title">Dirección de administración y finanzas</h3>
    <div class="card-toolbar">
      <input type='checkbox' id='all_finanzas_check'> Seleccionar Todos los permisos
    </div>
  </div>
  <div class="card-body">
    <div class="row">
      <div class="col-md-4">  
        <ul class="nav nav-tabs nav-tabs-line">
          <li class="nav-item">
            <a class="nav-link finanzas_tab" data-toggle="tab" href="#kt_tab_pane_finanzas"><b>Administración de operaciones</b></a>
          </li>
        </ul>

        <div class="tab-content" id="myTabContent">
          <div class="tab-pane fade" id="kt_tab_pane_finanzas" role="tabpanel">
            <input type="hidden" id="op_finanzas" value="0">
            <div class="row">
              <div class="col-md-4"></div>
              <div class="col-md-8 oldcheck">
                <input type='checkbox' id='all_finanzas'> Seleccionar todos
              </div>
            </div>
            @foreach($admin_finanzas as $value)
              <div class="row mt-2">
                <div class="col-md-8">
                  <label>{{ $value->guard_names }}</label>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <span class="switch switch-icon">
                    <label>
                    <input type="checkbox" name="permission[]" class='finanzas_check all_finanzas' value="{{ $value->id }}" />
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
            <a class="nav-link ordencompra_tab" data-toggle="tab" href="#kt_tab_pane_ordencompra"><b>Orden de compra</b></a>
          </li>
        </ul>

        <div class="tab-content" id="myTabContent">
          <div class="tab-pane fade" id="kt_tab_pane_ordencompra" role="tabpanel">
            <input type="hidden" id="op_ordencompra" value="0">
            <div class="row">
              <div class="col-md-4"></div>
              <div class="col-md-8 oldcheck">
                <input type='checkbox' id='all_ordencompra'> Seleccionar todos
              </div>
            </div>
            @foreach($orden_compra as $value)
              <div class="row mt-2">
                <div class="col-md-8">
                  <label>{{ $value->guard_names }}</label>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <span class="switch switch-icon">
                    <label>
                    <input type="checkbox" name="permission[]" class='ordencompra_check all_ordencompra' value="{{ $value->id }}" />
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