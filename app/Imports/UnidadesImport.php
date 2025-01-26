<?php

namespace App\Imports;

use App\Models\Unidad\Unidad;
use App\Models\Unidad\MarcaUnidad;
use App\Models\Unidad\ModeloUnidad;
use App\Models\Unidad\UnidadTipoVehiculo;
use App\Models\Proyecto\Proyecto;
use App\Models\Unidad\UbicacionUnidad;
use App\Models\Unidad\UnidadFolio;

use App\Services\Folio;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Carbon;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Maatwebsite\Excel\Concerns\{Importable, ToCollection, WithHeadingRow, WithValidation, SkipsFailures};

class UnidadesImport implements ToCollection, WithHeadingRow
{
    use Importable, SkipsFailures;

    public function collection(Collection $rows)
    {
        foreach ($rows as $row){
        	$marca = $this->obtenermarca($row['marca']);
        	$modelo = $this->obtenermodelo($row['submarca']);
        	$tipovehiculo = $this->obtenertipovehiculo($row['vehiculotipo']);
        	$unidad = $this->insertunidad($row,$marca,$modelo,$tipovehiculo);
        }

        session()->flash('success', 'Las unidades se crearon correctamente');
        return redirect()->route('unidad.catalogounidad');
    }


    public function obtenermarca($marca)
    {
    	$data_marca = MarcaUnidad::where('nombre_marca', $marca)->first();
    	if($data_marca == null)
    	{
	        $data = [
	            'nombre_marca' => $marca,
	            'id_status_delete' => 1,
	            'iduserCreated' =>auth()->user()->id,
	            'iduserUpdated' =>auth()->user()->id,
	            'created_at' =>date('Y-m-d H:i:s'),
	            'updated_at' =>date('Y-m-d H:i:s')
	        ];

    		$data_id = MarcaUnidad::insertGetId($data);

    	}else{
    		$data_id = $data_marca->id;
    	}

    	return $data_id;
    }

    public function obtenermodelo($modelo)
    {
    	$data_modelo = ModeloUnidad::where('nombre_modelo', $modelo)->first();
    	if($data_modelo == null)
    	{
	        $data = [
	            'nombre_modelo' => $modelo,
	            'id_status_delete' => 1,
	            'iduserCreated' =>auth()->user()->id,
	            'iduserUpdated' =>auth()->user()->id,
	            'created_at' =>date('Y-m-d H:i:s'),
	            'updated_at' =>date('Y-m-d H:i:s')
	        ];

    		$data_id = ModeloUnidad::insertGetId($data);

    	}else{
    		$data_id = $data_modelo->id;
    	}

    	return $data_id;
    }

    public function obtenertipovehiculo($tipovehiculo)
    {
    	$data_vehiculo = UnidadTipoVehiculo::where('vehiculo_tipo', $tipovehiculo)->first();
    	if($data_vehiculo == null)
    	{
	        $data = [
	            'vehiculo_tipo' => $tipovehiculo,
	            'id_status_delete' => 1,
	            'iduserCreated' =>auth()->user()->id,
	            'iduserUpdated' =>auth()->user()->id,
	            'created_at' =>date('Y-m-d H:i:s'),
	            'updated_at' =>date('Y-m-d H:i:s')
	        ];

    		$data_id = UnidadTipoVehiculo::insertGetId($data);

    	}else{
    		$data_id = $data_vehiculo->id;
    	}

    	return $data_id;    	
    }

    public function insertunidad($row,$marca,$modelo,$tipovehiculo)
    {
        // dd($row );
        $folio = UnidadFolio::with('folio')->max('folio');
        $folio = $folio ? ++$folio : 1;
        $folioModel = new UnidadFolio();
        $folioModel->folio = $folio;
        $folioModel->anio = date('Y');
        $folioModel->save();
        $folio = "E".str_pad($folio,5,"0", STR_PAD_LEFT);

       $status = 2; 

	    $data = [
	        'folio' => $folio,
            'id_marca' => $marca,
            'id_modelo' => $modelo,
            'id_vehiculo_tipo' => $tipovehiculo,
            'unidad_year' => $row['modeloao'],
            'no_serie' => $row['serie'],
            'color' => $row['color'],
            'factura_compra' => $row['folio_factura'],
            'fecha_factura' => $row['fecha_factura'] ? Carbon::createFromFormat('d/m/Y', $row['fecha_factura'])->format('Y-m-d') : null,
            'importe_iva' => $row['importeivaincluido'],
            'clave_vehicular' =>$row['clavevehicular'],
            'unidad_asignacion_id' => 2,
            // 'proyectos_id' => $row['idcontrato'],
            'id_ubicacion' => $row['idpatio'],
            'fecha_asignacion' => $row['fechaasignacion'] ? Carbon::createFromFormat('d/m/Y', $row['fechaasignacion'])->format('Y-m-d') : null,
            'id_tipo_asignacion' => $row['idtipoasignacion'],
            'id_status' => $status, 
            'estatus_pagado' => $row['estatus_pago'],
            'forma_compra' => $row['forma_compra'],
	        'id_status_delete' => 1,
            'unidad_requisicion_estatus_id' => 1,
            'requisicion_id_ordencompra' =>$row['requisicion_id'],
            'orden_compra_id' =>$row['ordencompra_id'],
            'requisicion_orden_proveedor_id' =>$row['proveedor_id'],
            'op_equipamiento' => 0,
	        'iduserCreated' =>auth()->user()->id,
	        'iduserUpdated' =>auth()->user()->id,
	        'created_at' =>date('Y-m-d H:i:s'),
	        'updated_at' =>date('Y-m-d H:i:s')
	    ];

	    return Unidad::insert($data);
    }

}