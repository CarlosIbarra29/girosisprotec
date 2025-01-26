@extends('layouts.app')
@push('scripts')
  {{-- <script src="{{ asset('js/Usuarios.js') }}"></script> --}}
  <script src="{{ asset('js/roles/PermisosRol.js') }}"></script>
@endpush
@section('title')
    Editar rol
@endsection
@section('content')

<style type="text/css">
  .oldcheck{
    text-align: right;
  }
</style>

  @php  
    $permiso_roles_id = array();
    foreach($permisos_rol as $username) {
      $permiso_roles_id[] = $username->permission_id;
    }
  @endphp


<div class="card card-custom">
    <div class="card-header">
        <h3 class="card-title">Editar rol</h3>
    </div>

    <div class="card-body">
      <form action="{{ route('rol.editarrol') }}" method="post" id="submit_rol_edit">
      @csrf
        <div class="row">
          <div class="col-lg-8 mt-2">
            @foreach($rol_info as $value)
            <input type="hidden" name="id" value="{{ $value->id }}">
            <label>Nombre del rol</label>
              <input type="text" class="form-control" name="name_rol" value="{{ $value->name }}" id="name_rol"/>
            @endforeach
          </div>
          <div class="col-lg-4 mt-2">
            <label>Color del menú</label>
            <input type="color" class="form-control" name="color_menu" value="{{ $value->color_menu }}" id="color_menu" required/>
          </div>
        </div>

          @include('usuarios.modificar-permiso-rol.edit-administracion-sistema')
{{--           @include('usuarios.modificar-permiso-rol.edit-gerencia-comercial')
          @include('usuarios.modificar-permiso-rol.edit-gerencia-contratos')
          @include('usuarios.modificar-permiso-rol.edit-gerencia-operaciones')
          @include('usuarios.modificar-permiso-rol.edit-gerencia-finanzas') --}}
          

      </form>

      <div class="row">
        <div class="col-lg-6">
          <button type="button" id="send_rol" class="btn btn-primary mr-2">Guardar</button>
          <a href="{{ route('rol.catalogoroles') }}"  class="btn btn-secondary">Cancelar</a>
        </div>
      </div>


    </div>

</div>

@endsection