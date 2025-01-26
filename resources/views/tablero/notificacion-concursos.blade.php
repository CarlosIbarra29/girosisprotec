@extends('layouts.app')
@push('scripts')
@endpush
@section('title')
    Ver concurso
@endsection
@section('content')
<style type="text/css">
    .oculto{
        display: none;
    }
</style>
<!--begin::Card-->
<div class="row">
    <div class="col-lg-12">
        <!--begin::Card-->
        <div class="card card-custom gutter-b">
            <div class="card-header">
                <h3 class="card-title">Ver concurso</h3>
            </div>
            <!--begin::Form-->
            <form action="" method="post" >
                <input type="hidden" name="id" value="{{ $info->id }}">
                @csrf
                <div class="card-body">


                    <!--begin::tabs-->
                    <ul class="nav nav-tabs nav-tabs-line">
                        <li class="nav-item">
                            <a class="nav-link active" data-toggle="tab" href="#kt_tab_pane_4">Fecha técnica</a>
                        </li>

                    </ul>

                    <div class="tab-content mt-5" id="myTabContent">
                        <div class="tab-pane fade show active mt-10" id="kt_tab_pane_4" role="tabpanel" aria-labelledby="kt_tab_pane_4">
                            <div class="row">
                                <div class="col-lg-4 col-sm-6 form-group">
                                    <label>Folio del concurso</label>
                                    <p>{{ $info->folio }}</p>
                                </div>

                                <div class="col-lg-4 col-sm-6 form-group">
                                    <label>No. Concurso</label>
                                    <p>{{ $info->no_licitacion }}</p>
                                </div>


                                <div class="col-lg-4 col-sm-6 form-group">
                                    <label>Titulo del servicio</label>
                                    <p>{{ $info->titulo_servicio }}</p>
                                </div>

                                <div class="col-lg-4 col-sm-6 form-group">
                                    <label>Fecha y firma de formalización del contrato</label>
                                    @if($info->firma_entrega == null || $info->firma_entrega == "")
                                        <p>Sin información</p>
                                    @else
                                        <p>{{ date('d/m/Y', strtotime($info->firma_entrega))}}</p>
                                    @endif
                                </div>

                                <div class="col-lg-4 col-sm-6 form-group">
                                    <label>Cliente</label>
                                    <p>{{ $cliente->razon_social }}</p>
                                </div>

                                <div class="col-lg-4 col-sm-6 form-group">
                                    <label>Prioridad</label>
                                    <p>{{ $info->licitacionPrioridad->prioridad }}</p>
                                </div>
                            </div>
                            @php $precio_unitario = 0; $iva = 0; $total_monto=0; @endphp
                            @foreach($segmento as $unid)
                                @php 
                                    $total = $unid->cantidad * $unid->precio_unitario; 
                                    $precio_unitario = $precio_unitario + $total;
                                    $iva = $precio_unitario * 0.16;
                                    $total_monto = $precio_unitario + $iva;
                                @endphp
                            @endforeach
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="card card-custom gutter-b">
                                        <div class="card-header">
                                            <h3 class="card-title">Propuesta económica </h3>
                                            <div class="card-toolbar">
                                                <h4>${{ number_format($total_monto,2,'.',',') }}</h4>
                                            </div>
                                        </div>
                                         <div class="card-body">
                                            <table class="table table-hover table-checkable">
                                                <thead>
                                                    <tr>
                                                        <th>No.</th>
                                                        <th>Tipo de vehículo</th>
                                                        <th>Carrocería</th>
                                                        <th>Motor</th>
                                                        <th>Transmisión</th>
                                                        <th>Cantidad</th>
                                                        <th>Precio Unitario</th>
                                                        <th>Total</th>
                                                    </tr>
                                                </thead>

                                                <tbody>
                                                    @php $precio_unitario = 0; $iva = 0; $total_monto=0; @endphp
                                                    @foreach($segmento as $unid)
                                                        @php 
                                                            $total = $unid->cantidad * $unid->precio_unitario; 
                                                            $precio_unitario = $precio_unitario + $total;
                                                            $iva = $precio_unitario * 0.16;
                                                            $total_monto = $precio_unitario + $iva;
                                                        @endphp
                                                        <tr>
                                                            <td>{{ $unid->id }}</td>
                                                            <td>{{ $unid->tipo_vehiculo }}</td>
                                                            <td>{{ $unid->carroceria }}</td>
                                                            <td>{{ $unid->motor }}</td>
                                                            <td>{{ $unid->transmision }}</td>
                                                            <td class="text-center">
                                                                <p>{{ $unid->cantidad }}</p>
                                                            </td>
                                                            <td class="text-center">
                                                                <p>{{ number_format($unid->precio_unitario,2,'.',',') }}</p>
                                                            </td>
                     
                                                            <td>
                                                                <p>{{ number_format($total,2,'.',',') }}</p>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                        <div class="card-footer">
                                            <div class="row">
                                                <div class="col-lg-8"><span>Nota: IVA del 16%</span></div>
                                                <div class="col-lg-4">
                                                    <div class="row">
                                                        <div class="col-lg-6"><span>Subtotal: ${{ number_format($precio_unitario,2,'.',',') }}</span></div>
                                                        <div class="col-lg-6"><span>IVA: ${{ number_format($iva,2,'.',',') }}</span></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>


                        </div>

                    </div>
                    <!--end::tabs-->

                </div>
                <div class="card-footer">
                    <div class="row">
                        <div class="col-lg-12">
                            <a href="{{ route('tablero.show') }}"  class="btn btn-secondary">Regresar</a>
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
