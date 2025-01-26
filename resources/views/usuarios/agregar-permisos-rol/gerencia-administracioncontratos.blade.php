<div class="card card-custom mt-4">
  <div class="card-header">
    <h3 class="card-title">Dirección de administración de contratos</h3>
    <div class="card-toolbar">
      <input type='checkbox' id='all_contratos_check'> Seleccionar Todos los permisos
    </div>
  </div>
  <div class="card-body">
    <div class="row">
      <div class="col-md-4">  
        <ul class="nav nav-tabs nav-tabs-line">
          <li class="nav-item">
            <a class="nav-link contratos_tab" data-toggle="tab" href="#kt_tab_pane_contratos"><b>Administración de contratos</b></a>
          </li>
        </ul>

        <div class="tab-content" id="myTabContent">
          <div class="tab-pane fade" id="kt_tab_pane_contratos" role="tabpanel">
            <input type="hidden" id="op_contratos" value="0">
            <div class="row">
              <div class="col-md-4"></div>
              <div class="col-md-8 oldcheck">
                <input type='checkbox' id='all_contratos'> Seleccionar todos
              </div>
            </div>
            @foreach($admin_contratos as $value)
              <div class="row mt-2">
                <div class="col-md-8">
                  <label>{{ $value->guard_names }}</label>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <span class="switch switch-icon">
                    <label>
                    <input type="checkbox" name="permission[]" class='contratos_check all_contratos' value="{{ $value->id }}" />
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