<?php

namespace App\Models\Unidad;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property integer $id_marca
 * @property integer $id_modelo
 * @property integer $id_vehiculo_tipo
 * @property integer $id_aseguradora
 * @property integer $unidad_asignacion_id
 * @property integer $licitaciones_id
 * @property integer $proyectos_id
 * @property integer $id_ubicacion
 * @property integer $licitacion_propuesta_economica_id
 * @property integer $cliente_id
 * @property integer $id_tipo_asignacion
 * @property integer $id_status
 * @property integer $id_status_delete
 * @property integer $unidad_requisicion_estatus_id
 * @property integer $requisicion_partida_id
 * @property integer $requisicion_id
 * @property integer $orden_compra_id
 * @property integer $requisicion_id_ordencompra
 * @property integer $requisicion_orden_proveedor_id
 * @property string $folio
 * @property string $fecha
 * @property integer $unidad_year
 * @property string $no_serie
 * @property string $factura_compra
 * @property string $fecha_factura
 * @property string $clave_vehicular
 * @property float $importe_iva
 * @property string $placa
 * @property string $transmision
 * @property string $no_tarjeta_circulacion
 * @property string $no_poliza_seguro
 * @property string $fecha_vencimiento_poliza
 * @property string $numero_inventario
 * @property string $color
 * @property string $fecha_asignacion
 * @property string $numero_economico
 * @property string $motivo_desactivar
 * @property integer $estatus_pagado
 * @property integer $forma_compra
 * @property integer $iduserCreated
 * @property integer $iduserUpdated
 * @property string $created_at
 * @property string $updated_at
 * @property ComplementoUnidad[] $complementoUnidads
 * @property FotoUnidad[] $fotoUnidads
 * @property TallerSolicitud[] $tallerSolicituds
 * @property Requisicion $requisicion
 * @property AseguradoraUnidad $aseguradoraUnidad
 * @property UnidadTipoAsignacion $unidadTipoAsignacion
 * @property RequisicionOrdenProveedor $requisicionOrdenProveedor
 * @property Licitacione $licitacione
 * @property User $user
 * @property SiafStatus $siafStatus
 * @property ModeloUnidad $modeloUnidad
 * @property User $user
 * @property UbicacionUnidad $ubicacionUnidad
 * @property Requisicion $requisicion
 * @property UnidadRequisicionEstatus $unidadRequisicionEstatus
 * @property RequisicionOrdenCompra $requisicionOrdenCompra
 * @property LicitacionProposicionEconomica $licitacionProposicionEconomica
 * @property UnidadVehiculoTipo $unidadVehiculoTipo
 * @property RequisicionPartida $requisicionPartida
 * @property MarcaUnidad $marcaUnidad
 * @property User $user
 * @property StatusUnidad $statusUnidad
 * @property Proyecto $proyecto
 * @property UnidadAsignacion $unidadAsignacion
 * @property UnidadDocumento[] $unidadDocumentos
 * @property UnidadFotografium[] $unidadFotografias
 * @property UnidadInfoGp[] $unidadInfoGps
 * @property UnidadInfoSeguro[] $unidadInfoSeguros
 * @property UnidadMovimiento[] $unidadMovimientos
 */
class Unidad extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'unidad';

    /**
     * @var array
     */
    protected $fillable = ['id_marca', 'id_modelo', 'id_vehiculo_tipo', 'id_aseguradora', 'unidad_asignacion_id', 'licitaciones_id', 'proyectos_id', 'id_ubicacion', 'licitacion_propuesta_economica_id', 'cliente_id', 'id_tipo_asignacion', 'id_status', 'id_status_delete', 'unidad_requisicion_estatus_id', 'requisicion_partida_id', 'requisicion_id', 'orden_compra_id', 'requisicion_id_ordencompra', 'requisicion_orden_proveedor_id', 'folio', 'fecha', 'unidad_year', 'no_serie', 'factura_compra', 'fecha_factura', 'clave_vehicular', 'importe_iva', 'placa', 'transmision', 'no_tarjeta_circulacion', 'no_poliza_seguro', 'fecha_vencimiento_poliza', 'numero_inventario', 'color', 'fecha_asignacion', 'numero_economico', 'motivo_desactivar', 'estatus_pagado', 'forma_compra', 'iduserCreated', 'iduserUpdated', 'created_at', 'updated_at'];

    public function cliente()
    {
        return $this->belongsTo('App\Models\User', 'cliente_id');
    }

    public function licitacionProposicionEconomica()
    {
        return $this->belongsTo('App\Models\Licitacion\ProposicionEconomica', 'licitacion_propuesta_economica_id');
    }

    public function requisicionOrdenCompra()
    {
        return $this->belongsTo('App\Models\Requisicion\RequisicionOrdenCompra', 'orden_compra_id');
    }

    public function requisicionorden()
    {
        return $this->belongsTo('App\Models\Requisicion\Requisicion', 'requisicion_id_ordencompra');
    }


    public function requisicionproveedor()
    {
        return $this->belongsTo('App\Models\Requisicion\RequisicionOrdenProveedor', 'requisicion_orden_proveedor_id');
    }


    public function requisicionPartida()
    {
        return $this->belongsTo('App\Models\Requisicion\RequisicionPartida');
    }


    public function requisicion()
    {
        return $this->belongsTo('App\Models\Requisicion\Requisicion');
    }


    public function unidadRequisicionEstatus()
    {
        return $this->belongsTo('App\Models\UnidadRequisicionEstatus\UnidadRequisicionEstatus');
    }

    public function complementoUnidad()
    {
        return $this->hasMany('App\Models\Unidad\ComplementoUnidad', 'id_unidad');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function fotoUnidad()
    {
        return $this->hasMany('App\Models\Unidad\FotoUnidad', 'id_unidad');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function tallerSolicitud()
    {
        return $this->hasMany('App\Models\Taller\TallerSolicitud');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function modeloUnidad()
    {
        return $this->belongsTo('App\Models\Unidad\ModeloUnidad', 'id_modelo');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function unidadVehiculoTipo()
    {
        return $this->belongsTo('App\Models\Unidad\UnidadTipoVehiculo', 'id_vehiculo_tipo');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function siafStatus()
    {
        return $this->belongsTo('App\Models\SiafStatus', 'id_status_delete');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function aseguradoraUnidad()
    {
        return $this->belongsTo('App\Models\Unidad\AseguradoraUnidad', 'id_aseguradora');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function ubicacionUnidad()
    {
        return $this->belongsTo('App\Models\Unidad\UbicacionUnidad', 'id_ubicacion');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function marcaUnidad()
    {
        return $this->belongsTo('App\Models\Unidad\MarcaUnidad', 'id_marca');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function unidadTipoAsignacion()
    {
        return $this->belongsTo('App\Models\Unidad\TipoAsignacion', 'id_tipo_asignacion');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function proyecto()
    {
        return $this->belongsTo('App\Models\Proyecto\Proyecto', 'proyectos_id');
    }
    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function statusUnidad()
    {
        return $this->belongsTo('App\Models\Unidad\StatusUnidad', 'id_status');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function licitacion()
    {
        return $this->belongsTo('App\Models\Licitacion\Licitacion', 'licitaciones_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function unidadAsignacion()
    {
        return $this->belongsTo('App\Models\Unidad\UnidadAsignacion');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function unidadDocumentos()
    {
        return $this->hasMany('App\Models\Unidad\UnidadDocumento', 'id_unidad');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function unidadFotografias()
    {
        return $this->hasMany('App\Models\Unidad\UnidadFotografia');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function unidadMovimientos()
    {
        return $this->hasMany('App\Models\Unidad\UnidadMovimientos');
    }
    
    public function userCreated()
    {
        return $this->belongsTo('App\Models\User', 'iduserCreated');
    }
    
    public function userUpdated()
    {
        return $this->belongsTo('App\Models\User', 'iduserUpdated');
    }
 
}
