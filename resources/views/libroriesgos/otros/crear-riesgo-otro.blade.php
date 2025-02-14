@extends('layouts.app')
@push('scripts')
	<script src="{{ asset('js/libroriesgos/RiesgoTecnologico/AgregarRiesgoTecnologico.js') }}"></script>
@endpush
@section('title')
    Agregar riesgo
@endsection
@section('content')

    <!--begin::Card-->
    <div class="row">
        <div class="col-lg-12">
            <!--begin::Card-->
            <div class="card card-custom gutter-b">
                <div class="card-header">
                    <h3 class="card-title">Agregar riesgo</h3>
                </div>
                <!--begin::Form-->
                <form action="{{ route('librootr.guardarriesgootro') }}" method="post" id="submit_social">
                    @csrf
                    <div class="card-body">
                        <input type="hidden" name="id_libro" value="{{ $id_alcance }}">

                        <div class="form-group row">
                            <div class="col-lg-6">
                                <label for="criterios">Punto de control</label>
                                <textarea class="form-control" name="criterios" id="criterios" rows="3"></textarea>
                            </div>
                            <div class="col-lg-6">
                                <label for="factores_riesgo">Factores de riesgo</label>
                                <textarea class="form-control" name="factores_riesgo" id="factores_riesgo" rows="3"></textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-lg-6">
                                <label for="eventos_riesgo">Eventos de riesgo</label>
                                <textarea class="form-control" name="eventos_riesgo" id="eventos_riesgo" rows="3"></textarea>
                            </div>
                            <div class="col-lg-6">
                                <label for="contramedidas">Medidas de Mitigacón</label>
                                <textarea class="form-control" name="contramedidas" id="contramedidas" rows="3"></textarea>
                            </div>
                        </div>

                    </div>
                    <div class="card-footer">
                        <div class="row">
                            <div class="col-lg-6">
                                <button type="button"  id="btnGuardar" class="btn btn-primary mr-2">Guardar</button>
                                <a href="{{ route('librootr.riesgootroid',$id_alcance ) }}"  class="btn btn-secondary">Cancelar</a>
                            </div>
                        </div>
                    </div>
                </form>
                <!--end::Form-->
            </div>
            <!--end::Card-->
        </div>
    </div>
    <!--end::Card-->



@endsection