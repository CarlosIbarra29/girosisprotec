<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

/**
 * @property integer $id
 * @property integer $id_status_delete
 * @property string $name
 * @property string $email
 * @property string $email_verified_at
 * @property string $password
 * @property string $rfc
 * @property string $telefono
 * @property string $ubicacion
 * @property string $remember_token
 * @property integer $role
 * @property string $created_at
 * @property string $updated_at
 * @property AseguradoraUnidad[] $aseguradoraUnidads
 * @property AseguradoraUnidad[] $aseguradoraUnidads
 * @property Client[] $clients
 * @property Client[] $clients
 * @property ClienteDocumento[] $clienteDocumentos
 * @property ClienteDocumento[] $clienteDocumentos
 * @property ClienteTipoDocumento[] $clienteTipoDocumentos
 * @property ClienteTipoDocumento[] $clienteTipoDocumentos
 * @property ComplementoUnidad[] $complementoUnidads
 * @property ComplementoUnidad[] $complementoUnidads
 * @property DocumentosLicitacione[] $documentosLicitaciones
 * @property DocumentosLicitacione[] $documentosLicitaciones
 * @property Emisore[] $emisores
 * @property Emisore[] $emisores
 * @property Estado[] $estados
 * @property Estado[] $estados
 * @property FotoUnidad[] $fotoUnidads
 * @property FotoUnidad[] $fotoUnidads
 * @property FuenteProyecto[] $fuenteProyectos
 * @property FuenteProyecto[] $fuenteProyectos
 * @property LicitacionEstatus[] $licitacionEstatuses
 * @property LicitacionEstatus[] $licitacionEstatuses
 * @property LicitacionGestorDocumento[] $licitacionGestorDocumentos
 * @property LicitacionGestorDocumento[] $licitacionGestorDocumentos
 * @property LicitacionGestorTipoDocumento[] $licitacionGestorTipoDocumentos
 * @property LicitacionGestorTipoDocumento[] $licitacionGestorTipoDocumentos
 * @property LicitacionInformacionAdministrativa[] $licitacionInformacionAdministrativas
 * @property LicitacionInformacionAdministrativa[] $licitacionInformacionAdministrativas
 * @property LicitacionInformacionFinanciera[] $licitacionInformacionFinancieras
 * @property LicitacionInformacionFinanciera[] $licitacionInformacionFinancieras
 * @property LicitacionInformacionFiscal[] $licitacionInformacionFiscals
 * @property LicitacionInformacionFiscal[] $licitacionInformacionFiscals
 * @property LicitacionInformacionLegal[] $licitacionInformacionLegals
 * @property LicitacionInformacionLegal[] $licitacionInformacionLegals
 * @property LicitacionPrioridad[] $licitacionPrioridads
 * @property LicitacionPrioridad[] $licitacionPrioridads
 * @property LicitacionPrioridadEstatus[] $licitacionPrioridadEstatuses
 * @property LicitacionPrioridadEstatus[] $licitacionPrioridadEstatuses
 * @property LicitacionProposicionEconomica[] $licitacionProposicionEconomicas
 * @property LicitacionProposicionEconomica[] $licitacionProposicionEconomicas
 * @property LicitacionPropuestaTecnicaAdministrativa[] $licitacionPropuestaTecnicaAdministrativas
 * @property LicitacionPropuestaTecnicaAdministrativa[] $licitacionPropuestaTecnicaAdministrativas
 * @property LicitacionPropuestaTecnicaFinanciera[] $licitacionPropuestaTecnicaFinancieras
 * @property LicitacionPropuestaTecnicaFinanciera[] $licitacionPropuestaTecnicaFinancieras
 * @property LicitacionPropuestaTecnicaFiscal[] $licitacionPropuestaTecnicaFiscals
 * @property LicitacionPropuestaTecnicaFiscal[] $licitacionPropuestaTecnicaFiscals
 * @property LicitacionPropuestaTecnicaLegal[] $licitacionPropuestaTecnicaLegals
 * @property LicitacionPropuestaTecnicaLegal[] $licitacionPropuestaTecnicaLegals
 * @property LicitacionPropuestaTecnicaOtro[] $licitacionPropuestaTecnicaOtros
 * @property LicitacionPropuestaTecnicaOtro[] $licitacionPropuestaTecnicaOtros
 * @property LicitacionSegmento[] $licitacionSegmentos
 * @property LicitacionSegmento[] $licitacionSegmentos
 * @property Licitacione[] $licitaciones
 * @property Licitacione[] $licitaciones
 * @property MarcaUnidad[] $marcaUnidads
 * @property MarcaUnidad[] $marcaUnidads
 * @property ModeloUnidad[] $modeloUnidads
 * @property ModeloUnidad[] $modeloUnidads
 * @property Municipio[] $municipios
 * @property Municipio[] $municipios
 * @property PagoProyecto[] $pagoProyectos
 * @property PagoProyecto[] $pagoProyectos
 * @property Proveedore[] $proveedores
 * @property Proveedore[] $proveedores
 * @property ProyectoDeductivaPago[] $proyectoDeductivaPagos
 * @property ProyectoDeductivaPago[] $proyectoDeductivaPagos
 * @property ProyectoDocumento[] $proyectoDocumentos
 * @property ProyectoDocumento[] $proyectoDocumentos
 * @property ProyectoTipoDocumento[] $proyectoTipoDocumentos
 * @property ProyectoTipoDocumento[] $proyectoTipoDocumentos
 * @property Proyecto[] $proyectos
 * @property Proyecto[] $proyectos
 * @property SegmentoAccesorio[] $segmentoAccesorios
 * @property SegmentoAccesorio[] $segmentoAccesorios
 * @property SegmentoBlindaje[] $segmentoBlindajes
 * @property SegmentoBlindaje[] $segmentoBlindajes
 * @property SegmentoCapacidad[] $segmentoCapacidads
 * @property SegmentoCapacidad[] $segmentoCapacidads
 * @property SegmentoCarrocerium[] $segmentoCarrocerias
 * @property SegmentoCarrocerium[] $segmentoCarrocerias
 * @property SegmentoCilindro[] $segmentoCilindros
 * @property SegmentoCilindro[] $segmentoCilindros
 * @property SegmentoDireccion[] $segmentoDireccions
 * @property SegmentoDireccion[] $segmentoDireccions
 * @property SegmentoEnInventario[] $segmentoEnInventarios
 * @property SegmentoEnInventario[] $segmentoEnInventarios
 * @property SegmentoEspejosLaterale[] $segmentoEspejosLaterales
 * @property SegmentoEspejosLaterale[] $segmentoEspejosLaterales
 * @property SegmentoGp[] $segmentoGps
 * @property SegmentoGp[] $segmentoGps
 * @property SegmentoLlantaRefaccion[] $segmentoLlantaRefaccions
 * @property SegmentoLlantaRefaccion[] $segmentoLlantaRefaccions
 * @property SegmentoMotor[] $segmentoMotors
 * @property SegmentoMotor[] $segmentoMotors
 * @property SegmentoNoCilindro[] $segmentoNoCilindros
 * @property SegmentoNoCilindro[] $segmentoNoCilindros
 * @property SegmentoPasajero[] $segmentoPasajeros
 * @property SegmentoPasajero[] $segmentoPasajeros
 * @property SegmentoPotencium[] $segmentoPotencias
 * @property SegmentoPotencium[] $segmentoPotencias
 * @property SegmentoPuertum[] $segmentoPuertas
 * @property SegmentoPuertum[] $segmentoPuertas
 * @property SegmentoRadio[] $segmentoRadios
 * @property SegmentoRadio[] $segmentoRadios
 * @property SegmentoTipoVehiculo[] $segmentoTipoVehiculos
 * @property SegmentoTipoVehiculo[] $segmentoTipoVehiculos
 * @property SegmentoTransmision[] $segmentoTransmisions
 * @property SegmentoTransmision[] $segmentoTransmisions
 * @property Segmento[] $segmentos
 * @property Segmento[] $segmentos
 * @property SiafStatus[] $siafStatuses
 * @property SiafStatus[] $siafStatuses
 * @property StatusUnidad[] $statusUnidads
 * @property StatusUnidad[] $statusUnidads
 * @property TipoContratacion[] $tipoContratacions
 * @property TipoContratacion[] $tipoContratacions
 * @property TipoDocumentosLicitacione[] $tipoDocumentosLicitaciones
 * @property TipoDocumentosLicitacione[] $tipoDocumentosLicitaciones
 * @property UbicacionUnidad[] $ubicacionUnidads
 * @property UbicacionUnidad[] $ubicacionUnidads
 * @property Unidad[] $unidads
 * @property Unidad[] $unidads
 * @property UnidadDocumento[] $unidadDocumentos
 * @property UnidadDocumento[] $unidadDocumentos
 * @property UnidadFotografium[] $unidadFotografias
 * @property UnidadFotografium[] $unidadFotografias
 * @property UnidadTipoDocumento[] $unidadTipoDocumentos
 * @property UnidadTipoDocumento[] $unidadTipoDocumentos
 * @property UnidadTipoDocumentoEstatus[] $unidadTipoDocumentoEstatuses
 * @property UnidadTipoDocumentoEstatus[] $unidadTipoDocumentoEstatuses
 * @property SiafStatus $siafStatus
 */
class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles;
    /**
     * The "type" of the auto-incrementing ID.
     * 
     * @var string
     */

    /**
     * @var array
     */
    protected $fillable = ['tipo_usuario_id', 'area_personal_id','id_status_delete', 'name', 'email', 'email_verified_at', 'password', 'rfc', 'telefono', 'ubicacion', 'avatar', 'motivo_desactivar' ,'remember_token', 'role', 'created_at', 'updated_at', 'estatus_asignacion'];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function aseguradoraUnidadcreate()
    {
        return $this->hasMany('App\Models\Unidad\AseguradoraUnidad', 'iduserUpdated');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function aseguradoraUnidadupdate()
    {
        return $this->hasMany('App\Models\Unidad\AseguradoraUnidad', 'iduserCreated');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function clientecreate()
    {
        return $this->hasMany('App\Models\Cliente\Cliente', 'iduserCreated');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function clienteupdate()
    {
        return $this->hasMany('App\Models\Cliente\Cliente', 'iduserUpdated');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function clienteDocumentoscreate()
    {
        return $this->hasMany('App\Models\ClienteDocumento', 'iduserUpdated');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function clienteDocumentosupdate()
    {
        return $this->hasMany('App\Models\ClienteDocumento', 'iduserCreated');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function clienteTipoDocumentoscreate()
    {
        return $this->hasMany('App\Models\Cliente\ClienteTipoDocumento', 'iduserUpdated');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function clienteTipoDocumentosupdate()
    {
        return $this->hasMany('App\Models\Cliente\ClienteTipoDocumento', 'iduserCreated');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function complementoUnidadcreate()
    {
        return $this->hasMany('App\Models\Unidad\ComplementoUnidad', 'iduserUpdated');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function complementoUnidadupdate()
    {
        return $this->hasMany('App\Models\Unidad\ComplementoUnidad', 'iduserCreated');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function documentosLicitacionescreate()
    {
        return $this->hasMany('App\Models\Licitacion\DocumentoLicitacion', 'iduserUpdated');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function documentosLicitacionesupdate()
    {
        return $this->hasMany('App\Models\Licitacion\DocumentoLicitacion', 'iduserCreated');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function emisorescreate()
    {
        return $this->hasMany('App\Models\Proyecto\Emisor', 'iduserUpdated');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function emisoresupdate()
    {
        return $this->hasMany('App\Models\Proyecto\Emisor', 'iduserCreated');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function estadoscreate()
    {
        return $this->hasMany('App\Models\Cliente\Estado', 'iduserUpdated');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function estadosupdate()
    {
        return $this->hasMany('App\Models\Cliente\Estado', 'iduserCreated');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function fotoUnidadcreate()
    {
        return $this->hasMany('App\Models\Unidad\FotoUnidad', 'iduserUpdated');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function fotoUnidadupdate()
    {
        return $this->hasMany('App\Models\Unidad\FotoUnidad', 'iduserCreated');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function fuenteProyectoscreate()
    {
        return $this->hasMany('App\Models\Proyecto\FuenteProyecto', 'iduserUpdated');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function fuenteProyectosupdate()
    {
        return $this->hasMany('App\Models\Proyecto\FuenteProyecto', 'iduserCreated');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function licitacionEstatuscreate()
    {
        return $this->hasMany('App\Models\Licitacion\LicitacionEstatus', 'iduserCreated');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function licitacionEstatusupdate()
    {
        return $this->hasMany('App\Models\Licitacion\LicitacionEstatus', 'iduserUpdated');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function licitacionGestorDocumentoscreate()
    {
        return $this->hasMany('App\Models\Licitacion\LicitacionGestorDocumentos', 'iduserUpdated');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function licitacionGestorDocumentosupdate()
    {
        return $this->hasMany('App\Models\Licitacion\LicitacionGestorDocumentos', 'iduserCreated');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function licitacionGestorTipoDocumentoscreate()
    {
        return $this->hasMany('App\Models\Licitacion\LicitacionGestorTipoDocumento', 'iduserCreated');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function licitacionGestorTipoDocumentosupdate()
    {
        return $this->hasMany('App\Models\Licitacion\LicitacionGestorTipoDocumento', 'iduserUpdated');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function licitacionInformacionAdministrativascreate()
    {
        return $this->hasMany('App\Models\Licitacion\LicitacionInformacionAdministrativa', 'iduserCreated');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function licitacionInformacionAdministrativasupdate()
    {
        return $this->hasMany('App\Models\Licitacion\LicitacionInformacionAdministrativa', 'iduserUpdated');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function licitacionInformacionFinancierascreate()
    {
        return $this->hasMany('App\Models\Licitacion\LicitacionInformacionFinanciera', 'iduserCreated');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function licitacionInformacionFinancierasupdate()
    {
        return $this->hasMany('App\Models\Licitacion\LicitacionInformacionFinanciera', 'iduserUpdated');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function licitacionInformacionFiscalscreate()
    {
        return $this->hasMany('App\Models\Licitacion\LicitacionInformacionFiscal', 'iduserCreated');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function licitacionInformacionFiscalsupdate()
    {
        return $this->hasMany('App\Models\Licitacion\LicitacionInformacionFiscal', 'iduserUpdated');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function licitacionInformacionLegalscreate()
    {
        return $this->hasMany('App\Models\Licitacion\LicitacionInformacionLegal', 'iduserCreated');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function licitacionInformacionLegalsupdate()
    {
        return $this->hasMany('App\Models\Licitacion\LicitacionInformacionLegal', 'iduserUpdated');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function licitacionPrioridadscreate()
    {
        return $this->hasMany('App\Models\Licitacion\LicitacionPrioridad', 'iduserUpdated');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function licitacionPrioridadsupdate()
    {
        return $this->hasMany('App\Models\Licitacion\LicitacionPrioridad', 'iduserCreated');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function licitacionPrioridadEstatusescreate()
    {
        return $this->hasMany('App\Models\Licitacion\LicitacionPrioridadEstatus', 'iduserCreated');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function licitacionPrioridadEstatusesupdate()
    {
        return $this->hasMany('App\Models\Licitacion\LicitacionPrioridadEstatus', 'iduserUpdated');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function licitacionProposicionEconomicascreate()
    {
        return $this->hasMany('App\Models\Licitacion\LicitacionProposicionEconomica', 'iduserUpdated');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function licitacionProposicionEconomicasupdate()
    {
        return $this->hasMany('App\Models\Licitacion\LicitacionProposicionEconomica', 'iduserCreated');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function licitacionPropuestaTecnicaAdministrativascreate()
    {
        return $this->hasMany('App\Models\Licitacion\LicitacionPropuestaTecnicaAdministrativa', 'iduserUpdated');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function licitacionPropuestaTecnicaAdministrativasupdate()
    {
        return $this->hasMany('App\Models\Licitacion\LicitacionPropuestaTecnicaAdministrativa', 'iduserCreated');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function licitacionPropuestaTecnicaFinancierascreate()
    {
        return $this->hasMany('App\Models\Licitacion\LicitacionPropuestaTecnicaFinanciera', 'iduserUpdated');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function licitacionPropuestaTecnicaFinancierasupdate()
    {
        return $this->hasMany('App\Models\Licitacion\LicitacionPropuestaTecnicaFinanciera', 'iduserCreated');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function licitacionPropuestaTecnicaFiscalscreate()
    {
        return $this->hasMany('App\Models\Licitacion\LicitacionPropuestaTecnicaFiscal', 'iduserUpdated');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function licitacionPropuestaTecnicaFiscalsupdate()
    {
        return $this->hasMany('App\Models\Licitacion\LicitacionPropuestaTecnicaFiscal', 'iduserCreated');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function licitacionPropuestaTecnicaLegalscreate()
    {
        return $this->hasMany('App\Models\Licitacion\LicitacionPropuestaTecnicaLegal', 'iduserUpdated');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function licitacionPropuestaTecnicaLegalsupdate()
    {
        return $this->hasMany('App\Models\Licitacion\LicitacionPropuestaTecnicaLegal', 'iduserCreated');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function licitacionPropuestaTecnicaOtroscreate()
    {
        return $this->hasMany('App\Models\Licitacion\LicitacionPropuestaTecnicaOtro', 'iduserCreated');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function licitacionPropuestaTecnicaOtrosupdate()
    {
        return $this->hasMany('App\Models\Licitacion\LicitacionPropuestaTecnicaOtro', 'iduserUpdated');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function licitacionSegmentoscreate()  
    {
        return $this->hasMany('App\Models\LicitacionSegmento', 'iduserUpdated');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function licitacionSegmentos()
    {
        return $this->hasMany('App\Models\LicitacionSegmento', 'iduserCreated');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function licitacionescreate()
    {
        return $this->hasMany('App\Models\Licitacione', 'iduserUpdated');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function licitaciones()
    {
        return $this->hasMany('App\Models\Licitacione', 'iduserCreated');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function marcaUnidadscreate()
    {
        return $this->hasMany('App\Models\MarcaUnidad', 'iduserUpdated');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function marcaUnidads()
    {
        return $this->hasMany('App\Models\MarcaUnidad', 'iduserCreated');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function modeloUnidadscreate()
    {
        return $this->hasMany('App\Models\ModeloUnidad', 'iduserUpdated');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function modeloUnidads()
    {
        return $this->hasMany('App\Models\ModeloUnidad', 'iduserCreated');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function municipioscreate()
    {
        return $this->hasMany('App\Models\Municipio', 'iduserUpdated');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function municipios()
    {
        return $this->hasMany('App\Models\Municipio', 'iduserCreated');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function pagoProyectoscreate()
    {
        return $this->hasMany('App\Models\PagoProyecto', 'iduserUpdated');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function pagoProyectos()
    {
        return $this->hasMany('App\Models\PagoProyecto', 'iduserCreated');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function proveedorescreate()
    {
        return $this->hasMany('App\Models\Proveedore', 'iduserUpdated');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function proveedores()
    {
        return $this->hasMany('App\Models\Proveedore', 'iduserCreated');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function proyectoDeductivaPagoscreate()
    {
        return $this->hasMany('App\Models\ProyectoDeductivaPago', 'iduserCreated');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function proyectoDeductivaPagos()
    {
        return $this->hasMany('App\Models\ProyectoDeductivaPago', 'iduserUpdated');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function proyectoDocumentoscreate()
    {
        return $this->hasMany('App\Models\ProyectoDocumento', 'iduserCreated');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function proyectoDocumentos()
    {
        return $this->hasMany('App\Models\ProyectoDocumento', 'iduserUpdated');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function proyectoTipoDocumentoscreate()
    {
        return $this->hasMany('App\Models\ProyectoTipoDocumento', 'iduserCreated');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function proyectoTipoDocumentos()
    {
        return $this->hasMany('App\Models\ProyectoTipoDocumento', 'iduserUpdated');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function proyectoscreate()
    {
        return $this->hasMany('App\Models\Proyecto', 'iduserCreated');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function proyectos()
    {
        return $this->hasMany('App\Models\Proyecto', 'iduserUpdated');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function segmentoAccesorioscreate()
    {
        return $this->hasMany('App\Models\SegmentoAccesorio', 'iduserUpdated');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function segmentoAccesorios()
    {
        return $this->hasMany('App\Models\SegmentoAccesorio', 'iduserCreated');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function segmentoBlindajescreate()
    {
        return $this->hasMany('App\Models\SegmentoBlindaje', 'iduserUpdated');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function segmentoBlindajes()
    {
        return $this->hasMany('App\Models\SegmentoBlindaje', 'iduserCreated');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function segmentoCapacidadscreate()
    {
        return $this->hasMany('App\Models\SegmentoCapacidad', 'iduserUpdated');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function segmentoCapacidads()
    {
        return $this->hasMany('App\Models\SegmentoCapacidad', 'iduserCreated');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function segmentoCarroceriascreate()
    {
        return $this->hasMany('App\Models\SegmentoCarrocerium', 'iduserUpdated');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function segmentoCarrocerias()
    {
        return $this->hasMany('App\Models\SegmentoCarrocerium', 'iduserCreated');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function segmentoCilindroscreate()
    {
        return $this->hasMany('App\Models\SegmentoCilindro', 'iduserUpdated');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function segmentoCilindros()
    {
        return $this->hasMany('App\Models\SegmentoCilindro', 'iduserCreated');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function segmentoDireccionscreate()
    {
        return $this->hasMany('App\Models\SegmentoDireccion', 'iduserUpdated');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function segmentoDireccions()
    {
        return $this->hasMany('App\Models\SegmentoDireccion', 'iduserCreated');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function segmentoEnInventarioscreate()
    {
        return $this->hasMany('App\Models\SegmentoEnInventario', 'iduserUpdated');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function segmentoEnInventarios()
    {
        return $this->hasMany('App\Models\SegmentoEnInventario', 'iduserCreated');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function segmentoEspejosLateralescreate()
    {
        return $this->hasMany('App\Models\SegmentoEspejosLaterale', 'iduserUpdated');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function segmentoEspejosLaterales()
    {
        return $this->hasMany('App\Models\SegmentoEspejosLaterale', 'iduserCreated');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function segmentoGpscreate()
    {
        return $this->hasMany('App\Models\SegmentoGp', 'iduserUpdated');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function segmentoGps()
    {
        return $this->hasMany('App\Models\SegmentoGp', 'iduserCreated');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function segmentoLlantaRefaccionscreate()
    {
        return $this->hasMany('App\Models\SegmentoLlantaRefaccion', 'iduserUpdated');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function segmentoLlantaRefaccions()
    {
        return $this->hasMany('App\Models\SegmentoLlantaRefaccion', 'iduserCreated');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function segmentoMotorscreate()
    {
        return $this->hasMany('App\Models\SegmentoMotor', 'iduserUpdated');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function segmentoMotors()
    {
        return $this->hasMany('App\Models\SegmentoMotor', 'iduserCreated');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function segmentoNoCilindroscreate()
    {
        return $this->hasMany('App\Models\SegmentoNoCilindro', 'iduserUpdated');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function segmentoNoCilindros()
    {
        return $this->hasMany('App\Models\SegmentoNoCilindro', 'iduserCreated');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function segmentoPasajeroscreate()
    {
        return $this->hasMany('App\Models\SegmentoPasajero', 'iduserUpdated');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function segmentoPasajeros()
    {
        return $this->hasMany('App\Models\SegmentoPasajero', 'iduserCreated');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function segmentoPotenciascreate()
    {
        return $this->hasMany('App\Models\SegmentoPotencium', 'iduserUpdated');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function segmentoPotencias()
    {
        return $this->hasMany('App\Models\SegmentoPotencium', 'iduserCreated');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function segmentoPuertascreate()
    {
        return $this->hasMany('App\Models\SegmentoPuertum', 'iduserUpdated');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function segmentoPuertas()
    {
        return $this->hasMany('App\Models\SegmentoPuertum', 'iduserCreated');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function segmentoRadioscreate()
    {
        return $this->hasMany('App\Models\SegmentoRadio', 'iduserUpdated');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function segmentoRadios()
    {
        return $this->hasMany('App\Models\SegmentoRadio', 'iduserCreated');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function segmentoTipoVehiculoscreate()
    {
        return $this->hasMany('App\Models\SegmentoTipoVehiculo', 'iduserUpdated');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function segmentoTipoVehiculos()
    {
        return $this->hasMany('App\Models\SegmentoTipoVehiculo', 'iduserCreated');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function segmentoTransmisionscreate()
    {
        return $this->hasMany('App\Models\SegmentoTransmision', 'iduserUpdated');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function segmentoTransmisions()
    {
        return $this->hasMany('App\Models\SegmentoTransmision', 'iduserCreated');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function segmentoscreate()
    {
        return $this->hasMany('App\Models\Segmento', 'iduserCreated');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function segmentos()
    {
        return $this->hasMany('App\Models\Segmento', 'iduserUpdated');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function siafStatusescreate()
    {
        return $this->hasMany('App\Models\SiafStatus', 'iduserCreated');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function siafStatuses()
    {
        return $this->hasMany('App\Models\SiafStatus', 'iduserUpdated');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function statusUnidadscreate()
    {
        return $this->hasMany('App\Models\StatusUnidad', 'iduserUpdated');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function statusUnidads()
    {
        return $this->hasMany('App\Models\StatusUnidad', 'iduserCreated');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function tipoContratacionscreate()
    {
        return $this->hasMany('App\Models\TipoContratacion', 'iduserUpdated');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function tipoContratacions()
    {
        return $this->hasMany('App\Models\TipoContratacion', 'iduserCreated');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function tipoDocumentosLicitacionescreate()
    {
        return $this->hasMany('App\Models\TipoDocumentosLicitacione', 'iduserUpdated');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function tipoDocumentosLicitaciones()
    {
        return $this->hasMany('App\Models\TipoDocumentosLicitacione', 'iduserCreated');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function ubicacionUnidadscreate()
    {
        return $this->hasMany('App\Models\UbicacionUnidad', 'iduserUpdated');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function ubicacionUnidads()
    {
        return $this->hasMany('App\Models\UbicacionUnidad', 'iduserCreated');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function unidadscreate()
    {
        return $this->hasMany('App\Models\Unidad', 'iduserUpdated');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function unidads()
    {
        return $this->hasMany('App\Models\Unidad', 'iduserCreated');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function unidadDocumentoscreate()
    {
        return $this->hasMany('App\Models\UnidadDocumento', 'iduserUpdated');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function unidadDocumentos()
    {
        return $this->hasMany('App\Models\UnidadDocumento', 'iduserCreated');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function unidadFotografiascreate()
    {
        return $this->hasMany('App\Models\UnidadFotografium', 'iduserUpdated');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function unidadFotografias()
    {
        return $this->hasMany('App\Models\UnidadFotografium', 'iduserCreated');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function unidadTipoDocumentoscreate()
    {
        return $this->hasMany('App\Models\UnidadTipoDocumento', 'iduserUpdated');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function unidadTipoDocumentos()
    {
        return $this->hasMany('App\Models\UnidadTipoDocumento', 'iduserCreated');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function unidadTipoDocumentoEstatusescreate()
    {
        return $this->hasMany('App\Models\UnidadTipoDocumentoEstatus', 'iduserCreated');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function unidadTipoDocumentoEstatuses()
    {
        return $this->hasMany('App\Models\UnidadTipoDocumentoEstatus', 'iduserUpdated');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function siafStatus()
    {
        return $this->belongsTo('App\Models\SiafStatus', 'id_status_delete');
    }

    public function areaPersonal()
    {
        return $this->belongsTo('App\Models\Requisicion\AreaPersonal', 'area_personal_id');
    }

    public function ejecutivoContrato()
    {
        return $this->hasMany('App\Models\EjecutivoContrato', 'users_id');
    }

    public function tipoUsuario()
    {
        return $this->belongsTo('App\Models\TipoUsuario', 'tipo_usuario_id');
    }
}
