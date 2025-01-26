<?php

namespace App\Http\Controllers\Tablero;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
// use App\Models\Notificaciones\Notificaciones;
// use App\Models\Notificaciones\NotificacionesUsuario;

use App\Models\Cliente\Cliente;

use App\Models\Licitacion\LicitacionSegmento;
use App\Models\Licitacion\ProposicionEconomica;
use App\Models\Licitacion\Licitacion;

class TableroController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }

    public function show()
    {
    	// $not = Notificaciones::where('users_permiso', auth()->user()->id)->orderBy('id','ASC')->get();
        $not=1;
        return view('tablero.show', compact('not'));
    }

    public function vernotconcurso($licitacion)
    {

    	$info = Licitacion::findOrFail($licitacion);
    	$cliente = Cliente::where('id_cliente', $info->cliente)->first();
        $proposicioneconomica = LicitacionSegmento::where("licitacion_id", $licitacion)->get();
        
        $segmento =ProposicionEconomica::select('licitacion_proposicion_economica.id', 'licitacion_proposicion_economica.licitacion_id','licitacion_proposicion_economica.segmento_id',
            'licitacion_proposicion_economica.cantidad', 'licitacion_proposicion_economica.precio_unitario',
            'tv.tipo_vehiculo','sc.carroceria','sm.motor','st.transmision')
            ->leftjoin("segmentos as sg","sg.id","licitacion_proposicion_economica.segmento_id")
            ->leftjoin("segmento_tipo_vehiculo as tv","tv.id","sg.tipo_vehiculo_id")
            ->leftjoin("segmento_carroceria as sc","sc.id","sg.carroceria_id")
            ->leftjoin("segmento_motor as sm","sm.id","sg.motor_id")
            ->leftjoin("segmento_transmision as st","st.id","sg.transmision_id")
            ->where("licitacion_proposicion_economica.licitacion_id",$licitacion)
            ->get();

        return view('tablero.notificacion-concursos', compact('licitacion', 'info', 'proposicioneconomica', 'segmento', 'cliente'));

    }
}
