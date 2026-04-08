<?php

namespace App\Http\Controllers\Cliente;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Config;
use App\Services\Money;
use App\Models\Cliente\Cliente;
use App\Models\AnalisisRiesgos\AnalisisRiesgoSocial;
use App\Models\AnalisisRiesgos\AnalisisRiesgoSocialImpacto;
use App\Models\AnalisisRiesgos\AnalisisRiesgoSocialDeficiencia;
use App\Models\LibroRiesgos\TipoRiesgo;
use App\Models\LibroRiesgos\BarrerasPerimetrales;
use App\Models\LibroRiesgos\RiesgosSociales;

use App\Models\LibroRiesgos\ConceptosTecnologicos;
use App\Models\LibroRiesgos\RiesgosTecnologicos;

use App\Models\LibroRiesgos\RiesgosNaturales;
use App\Models\LibroRiesgos\ConceptosNaturales;

use App\Models\LibroRiesgos\ConceptosOtros;
use App\Models\LibroRiesgos\RiesgosOtros;
use App\Models\Hd\Consecuencia;

use App\Models\Hd\Amenaza;

use App\Models\AnalisisRiesgos\AnalisisRiesgoTecnologico;
use App\Models\AnalisisRiesgos\AnalisisRiesgoTecnologicoDeficiencia;
use App\Models\AnalisisRiesgos\AnalisisRiesgoTecnologicoImpacto;

use App\Models\AnalisisRiesgos\AnalisisRiesgoNaturales;
use App\Models\AnalisisRiesgos\AnalisisRiesgoNaturalesImpacto;
use App\Models\AnalisisRiesgos\AnalisisRiesgoNaturalesDeficiencia;

use App\Models\AnalisisRiesgos\AnalisisRiesgoOtros;
use App\Models\AnalisisRiesgos\AnalisisRiesgoOtrosDeficiencia;
use App\Models\AnalisisRiesgos\AnalisisRiesgoOtrosImpacto;


use App\Models\Hd\NivelRiesgo;


use App\Models\Hd\NivelControl;
use App\Models\User;
use App\Models\Rol;
use App\Models\RolPermiso;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

use Illuminate\Support\Facades\Log;

class AnalisisRiesgosController extends Controller
{
    protected $money_format;
    public function __construct( Money $money_format)
    {
        $this->middleware('auth');
        $this->money_format = $money_format;
    }

    public function listadoanalisis()
    {
        $data = Cliente::where('status_delete', 1)->get();

        return view('analisisriesgos.listado-analisis', compact('data'));
    }

    public function analisiscliente($id_cliente)
    {
        $data = AnalisisRiesgoSocial::where('cliente_id', $id_cliente)->get();
        $cliente = Cliente::where('id', $id_cliente)->first();

        $nivelesAmenaza = Amenaza::select('id','nivel_amenaza','calculo_nivel_amenaza')
        ->orderBy('calculo_nivel_amenaza')
        ->get();

        return view('analisisriesgos.analisis-cliente', compact('data', 'id_cliente', 'cliente','nivelesAmenaza'));   
    }

    public function seleccionaanalisis($id_cliente)
    {
        $BarrerasPerimetrale = BarrerasPerimetrales::where('status_delete', 1)->get();
        $ConceptosTecnologicos = ConceptosTecnologicos::where('status_delete', 1)->get();
        $RiesgosNaturales = ConceptosNaturales::where('status_delete', 1)->get();
        $ConceptosOtros = ConceptosOtros::where('status_delete', 1)->get();

        $alcance_social = RiesgosSociales::where('status_delete', 1)->first();
        $alcance_tecnologico = RiesgosTecnologicos::where('status_delete', 1)->first();
        $alcance_natural = RiesgosNaturales::where('status_delete', 1)->first();
        $alcance_otros = RiesgosOtros::where('status_delete', 1)->first();


        return view('analisisriesgos.seleccionar-analisis-concepto', compact('BarrerasPerimetrale', 'ConceptosTecnologicos', 'RiesgosNaturales', 'ConceptosOtros', 'id_cliente', 'alcance_social', 'alcance_tecnologico', 'alcance_natural', 'alcance_otros'));
    }

    public function generaranalisis($cliente, $tipo, $id_alcance, $num)
    {
    	$data = Cliente::where('status_delete', 1)->get();
        $alcances = BarrerasPerimetrales::where('status_delete', 1)->get();

        $cliented = Cliente::where('id', $cliente)->first();

        if($id_alcance == 0)
        {
            $alcance_social = RiesgosSociales::where('status_delete', 1)->first();
            $count_alcance = 0;
        }else{
            $alcance_social = RiesgosSociales::where('status_delete', 1)->where('social_alcance_id', $id_alcance)->get();
            $count_alcance = count($alcance_social);

            $id = $num - 1;
            if($count_alcance == 0){
                $alcance_social = "Vacio"; 
            }else{
                $alcance_social = $alcance_social[$id]; 
            }
            
        }
        
        $nivel_control = NivelControl::where('status_delete', 1)->get();


    	return view('analisisriesgos.generar-analisis', compact('data', 'cliented','alcances', 'cliente', 'tipo', 'id_alcance', 'alcance_social', 'count_alcance', 'num', 'nivel_control', 'nivel_control'));
    }

    public function obteneralcances(Request $request)
    {
        $riesgos = RiesgosSociales::where('status_delete', 1)->where('social_alcance_id', $request->id)->get();
        $cadena_sociales = "";
        foreach ($riesgos as $mun) {
            $cadena_sociales .= '"' . $mun->id . '":"' . $mun->factores_riesgo . '",';
        }
        $cadena_sociales = '{' . rtrim($cadena_sociales, ',') . '}';
        return response()->json(['success' => $cadena_sociales]);
    }

    public function guardarriesgo(Request $request)
    {
        
         

        if ($request->nivel_control == 2 || $request->nivel_control == 1) {
            $fac_exp = 1;    
        } else if ($request->nivel_control == 3) {

            $fac_exp = 2;

        }else if ($request->nivel_control == 4) {

            $fac_exp = 3;

        }else if ($request->nivel_control == 5) {

            $fac_exp = 4;

        }else if ($request->nivel_control == 6) {

            $fac_exp = 5;

        }


        $data = [
            'cliente_id' => $request->cliente,
            'libror_barreras_perimetrales_id' => $request->punto_normativo,
            'libror_sociales_alcances_id' => $request->alcances,
            'punto_control' => $request->punto_control,
            'factores_riesgo' => $request->factor_riesgo,
            'eventos_riesgo' => $request->evento_riesgo,
            'recursos_expuestos' => $request->recursos_expuestos,
            'fuente_riesgo' => $request->fuente_riesgo,
            'ubicacion_riesgo' => $request->ubicacion_riesgo,
            'hd_nivel_control_id' => $request->nivel_control,
            'medidas_prevencion' => $request->medidas_prevencion,
            'contramedidas' => $request->contramedidas,
            'hd_consecuencia_id' => $request->impacto_severidad,
            'hd_probabilidad_id' => $request->factor_probabilidad,
            'factor_exposicion' => $fac_exp,
            'nivel_riesgo' => $request->nivel_riesgo,
            'descripcion' => $request->descripcion,
            'status_delete' => 1,
            'iduserCreated' =>auth()->user()->id,
            'iduserUpdated' =>auth()->user()->id,
            'created_at' =>date('Y-m-d H:i:s'),
            'updated_at' =>date('Y-m-d H:i:s')
        ];

        $reg_id =AnalisisRiesgoSocial::insertGetId($data);

        if($request->impactos_negocio != null){
            foreach ($request->impactos_negocio as $key ) {
                $data = [
                    'analisis_riesgo_social_id' => $reg_id,
                    'id_impacto' =>$key,
                    'iduserCreated' =>auth()->user()->id,
                    'iduserUpdated' =>auth()->user()->id,
                    'created_at' =>date('Y-m-d H:i:s'),
                    'updated_at' =>date('Y-m-d H:i:s')
                ];

                AnalisisRiesgoSocialImpacto::insert($data);
            }
        }

        if($request->deficiencia_medida_s != null){
            foreach ($request->deficiencia_medida_s as $key ) {
                $data = [
                    'analisis_riesgo_social_id' => $reg_id,
                    'id_deficiencia' =>$key,
                    'iduserCreated' =>auth()->user()->id,
                    'iduserUpdated' =>auth()->user()->id,
                    'created_at' =>date('Y-m-d H:i:s'),
                    'updated_at' =>date('Y-m-d H:i:s')
                ];

                AnalisisRiesgoSocialDeficiencia::insert($data);
            }
        }


        $alcance_social = RiesgosSociales::where('status_delete', 1)->where('social_alcance_id', $request->punto_normativo)->get();
        $count_alcance = count($alcance_social);
        
        if($request->alcances== $count_alcance){
            return redirect()->route('analisis.analisiscliente',$request->cliente);
            session()->flash('success', 'El registro de riesgo social se creo correctamente');
        }else{
            $redirect = $request->alcances + 1;
            return redirect()->route('analisis.generaranalisis',[$request->cliente, $request->tipo, $request->punto_normativo, $redirect]);
            session()->flash('success', 'El registro de riesgo social se creo correctamente');
        }
        
    }

    public function graficassociales($id_cliente)
    {
        // $data = AnalisisRiesgoSocial::with(['BarrerasPerimetrales', 'hdNivelControl'])
        //     ->where('cliente_id', $id_cliente)
        //     ->get();

        $data = AnalisisRiesgoSocial::with([
            'BarrerasPerimetrales',
            'hdNivelControl',
            'analisisRiesgoSocialDeficiencias', // <-- IMPORTANTE

            // === para Pareto (IPD / Criticidad) ===
            'factorExp',
            'hdProbabilidadif',
            'hdConsecuencia',

            // NUEVO PERFIL
            'NivelPr2',
            'hdConsecuencia3',
        ])->where('cliente_id', $id_cliente)->get();

        // var_dump($data);

        $cliente = Cliente::where('id', $id_cliente)->first();

        $conteoIndice = [
            'muy_bajo' => 0,
            'bajo'     => 0,
            'medio'    => 0,
            'alto'     => 0,
            'muy_alto' => 0,
        ];

        foreach ($data as $item) {
            $riesgo = $item->nivel_riesgo ?? 0;

            if ($riesgo >= 36.10) {
                $conteoIndice['muy_alto']++;
            } elseif ($riesgo >= 16.10) {
                $conteoIndice['alto']++;
            } elseif ($riesgo >= 6.50) {
                $conteoIndice['medio']++;
            } elseif ($riesgo >= 1.50) {
                $conteoIndice['bajo']++;
            } else {
                $conteoIndice['muy_bajo']++;
            }
        }

        /*
        |--------------------------------------------------------------------------
        | Análisis de vulnerabilidad
        |--------------------------------------------------------------------------
        */
        $vulnerabilidadTmp = [];

        foreach ($data as $item) {
            $criterioId = $item->libror_barreras_perimetrales_id ?? 'sin_criterio';
            $criterioNombre = optional($item->BarrerasPerimetrales)->alcance ?? 'Sin criterio';
            $nivelControl = (float) (optional($item->hdNivelControl)->nc_calculo ?? 0);

            if (!isset($vulnerabilidadTmp[$criterioId])) {
                $vulnerabilidadTmp[$criterioId] = [
                    'label' => $criterioNombre,
                    'total_registros' => 0,
                    'suma_nc' => 0,
                ];
            }

            $vulnerabilidadTmp[$criterioId]['total_registros']++;
            $vulnerabilidadTmp[$criterioId]['suma_nc'] += $nivelControl;
        }

        $vulnerabilidadLabels = [];
        $vulnerabilidadPromedios = [];

        foreach ($vulnerabilidadTmp as $grupo) {
            $total = (int) $grupo['total_registros'];
            $promedio = $total > 0 ? round($grupo['suma_nc'] / $total, 2) : 0;

            $vulnerabilidadLabels[] = $grupo['label'];
            $vulnerabilidadPromedios[] = $promedio;
        }

        /*
        |--------------------------------------------------------------------------
        | Distribución de riesgos por criterio
        |--------------------------------------------------------------------------
        */
        $riesgosPorCriterioTmp = [];

        foreach ($data as $item) {
            $criterioId = $item->libror_barreras_perimetrales_id ?? 'sin_criterio';
            $criterioNombre = optional($item->BarrerasPerimetrales)->alcance ?? 'Sin criterio';
            $riesgo = $item->nivel_riesgo ?? 0;

            if (!isset($riesgosPorCriterioTmp[$criterioId])) {
                $riesgosPorCriterioTmp[$criterioId] = [
                    'label'     => $criterioNombre,
                    'muy_alto'  => 0,
                    'alto'      => 0,
                    'medio'     => 0,
                    'bajo'      => 0,
                    'muy_bajo'  => 0,
                ];
            }

            if ($riesgo >= 36.10) {
                $riesgosPorCriterioTmp[$criterioId]['muy_alto']++;
            } elseif ($riesgo >= 16.10) {
                $riesgosPorCriterioTmp[$criterioId]['alto']++;
            } elseif ($riesgo >= 6.50) {
                $riesgosPorCriterioTmp[$criterioId]['medio']++;
            } elseif ($riesgo >= 1.50) {
                $riesgosPorCriterioTmp[$criterioId]['bajo']++;
            } else {
                $riesgosPorCriterioTmp[$criterioId]['muy_bajo']++;
            }
        }

        $riesgosPorCriterioLabels = [];
        $riesgosPorCriterioMuyAlto = [];
        $riesgosPorCriterioAlto = [];
        $riesgosPorCriterioMedio = [];
        $riesgosPorCriterioBajo = [];
        $riesgosPorCriterioMuyBajo = [];

        foreach ($riesgosPorCriterioTmp as $grupo) {
            $riesgosPorCriterioLabels[]   = $grupo['label'];
            $riesgosPorCriterioMuyAlto[]  = $grupo['muy_alto'];
            $riesgosPorCriterioAlto[]     = $grupo['alto'];
            $riesgosPorCriterioMedio[]    = $grupo['medio'];
            $riesgosPorCriterioBajo[]     = $grupo['bajo'];
            $riesgosPorCriterioMuyBajo[]  = $grupo['muy_bajo'];
        }

        /*
        |--------------------------------------------------------------------------
        | Distribución % de escenarios (tabla)
        |--------------------------------------------------------------------------
        */
        $escenariosFilas = [];
        $totalesEscenarios = [
            'muy_bajo' => 0,
            'bajo'     => 0,
            'medio'    => 0,
            'alto'     => 0,
            'muy_alto' => 0,
            'total'    => 0,
        ];

        foreach ($data as $item) {
            $criterioId = $item->libror_barreras_perimetrales_id ?? 'sin_criterio';
            $criterioNombre = optional($item->BarrerasPerimetrales)->alcance ?? 'Sin criterio';
            $riesgo = $item->nivel_riesgo ?? 0;

            if (!isset($escenariosFilas[$criterioId])) {
                $escenariosFilas[$criterioId] = [
                    'label'     => $criterioNombre,
                    'muy_bajo'  => 0,
                    'bajo'      => 0,
                    'medio'     => 0,
                    'alto'      => 0,
                    'muy_alto'  => 0,
                    'total'     => 0,
                ];
            }

            if ($riesgo >= 36.10) {
                $escenariosFilas[$criterioId]['muy_alto']++;
                $totalesEscenarios['muy_alto']++;
            } elseif ($riesgo >= 16.10) {
                $escenariosFilas[$criterioId]['alto']++;
                $totalesEscenarios['alto']++;
            } elseif ($riesgo >= 6.50) {
                $escenariosFilas[$criterioId]['medio']++;
                $totalesEscenarios['medio']++;
            } elseif ($riesgo >= 1.50) {
                $escenariosFilas[$criterioId]['bajo']++;
                $totalesEscenarios['bajo']++;
            } else {
                $escenariosFilas[$criterioId]['muy_bajo']++;
                $totalesEscenarios['muy_bajo']++;
            }

            $escenariosFilas[$criterioId]['total']++;
            $totalesEscenarios['total']++;
        }

        $distribucionEscenarios = [
            'muy_bajo' => 0,
            'bajo'     => 0,
            'medio'    => 0,
            'alto'     => 0,
            'muy_alto' => 0,
            'total'    => 0,
        ];

        if ($totalesEscenarios['total'] > 0) {
            $distribucionEscenarios['muy_bajo'] = round(($totalesEscenarios['muy_bajo'] / $totalesEscenarios['total']) * 100, 2);
            $distribucionEscenarios['bajo']     = round(($totalesEscenarios['bajo'] / $totalesEscenarios['total']) * 100, 2);
            $distribucionEscenarios['medio']    = round(($totalesEscenarios['medio'] / $totalesEscenarios['total']) * 100, 2);
            $distribucionEscenarios['alto']     = round(($totalesEscenarios['alto'] / $totalesEscenarios['total']) * 100, 2);
            $distribucionEscenarios['muy_alto'] = round(($totalesEscenarios['muy_alto'] / $totalesEscenarios['total']) * 100, 2);
            $distribucionEscenarios['total']    = 100;
        }

        /*
        |--------------------------------------------------------------------------
        | PARETO (80–20): IPD ordenado + % Criticidad + % Acumulado
        |--------------------------------------------------------------------------
        | - Barra: IPD por escenario (E.<id>)
        | - Línea: Riesgo acumulado (suma de % criticidad)
        */
        $paretoTmp = [];
        $totalIPD = 0;

        foreach ($data as $unid) {
            // IPD (como tu cálculo de criticidad)
            $ipd = (round(($unid->factorExp?->factor_dato ?? 0) *
                  ($unid->hdProbabilidadif?->calculo_probabilidad ?? 0))) *
                  ($unid->hdConsecuencia?->calculo_consecuencia ?? 0);

            $ipd = (float) $ipd;

            $paretoTmp[] = [
                'id'  => (int) ($unid->id ?? 0),
                'ipd' => $ipd,
                'evento_riesgo'  => (string) ($unid->eventos_riesgo ?? ''),
            ];

            $totalIPD += $ipd;
        }

        // Ordenar de mayor a menor por IPD
        usort($paretoTmp, function($a, $b){
            return $b['ipd'] <=> $a['ipd'];
        });

        // Construir series
        $paretoLabels = [];
        $paretoIPD = [];
        $paretoCrit = [];
        $paretoAcum = [];
        $paretoEventos = [];

        $acum = 0;

        foreach ($paretoTmp as $row) {
            $label = 'E.' . ($row['id'] ?: '0');

            $crit = $totalIPD > 0 ? round(($row['ipd'] / $totalIPD) * 100, 2) : 0;
            $acum = round($acum + $crit, 2);
            if ($acum > 100) $acum = 100;

            $paretoLabels[] = $label;
            $paretoIPD[]    = round($row['ipd'], 2);
            $paretoCrit[]   = $crit;
            $paretoAcum[]   = $acum;
            $paretoEventos[]  = $row['evento_riesgo'] ?? '';
        }

        /*
        |--------------------------------------------------------------------------
        | Distribución de Medidas de Seguridad (Debilidades / Fortalezas)
        |--------------------------------------------------------------------------
        | Fuente: analisis_riesgo_social_deficiencias (checks seleccionados)
        | Clasificación por hd_nivel_control (tabla hd_nivel_control):
        | Debilidades: Regular / Deficiente / Sin control / Inoperante
        | Fortalezas:  Eficiente / Óptimo
        |--------------------------------------------------------------------------
        */
        $mapDef = [
            1 => 'pasivas',
            2 => 'activas',
            3 => 'humanas',
            4 => 'documentales',
        ];

        $labelsMed = [
            'pasivas'       => 'Pasivas',
            'activas'       => 'Activas',
            'humanas'       => 'Humanas',
            'documentales'  => 'Documentales',
        ];

        $medidas = [
            'debilidades' => [
                'totales' => ['pasivas'=>0,'activas'=>0,'humanas'=>0,'documentales'=>0],
                'detalle' => [
                    'pasivas'      => ['Regular'=>0,'Deficiente'=>0,'Sin control'=>0,'Inoperante'=>0],
                    'activas'      => ['Regular'=>0,'Deficiente'=>0,'Sin control'=>0,'Inoperante'=>0],
                    'humanas'      => ['Regular'=>0,'Deficiente'=>0,'Sin control'=>0,'Inoperante'=>0],
                    'documentales' => ['Regular'=>0,'Deficiente'=>0,'Sin control'=>0,'Inoperante'=>0],
                ],
            ],
            'fortalezas' => [
                'totales' => ['pasivas'=>0,'activas'=>0,'humanas'=>0,'documentales'=>0],
                'detalle' => [
                    'pasivas'      => ['Óptimo'=>0,'Eficiente'=>0],
                    'activas'      => ['Óptimo'=>0,'Eficiente'=>0],
                    'humanas'      => ['Óptimo'=>0,'Eficiente'=>0],
                    'documentales' => ['Óptimo'=>0,'Eficiente'=>0],
                ],
            ],
        ];

        $nivelFromHd = function($hdNivelControl) {
            // Leer el nombre REAL del nivel (por id / tabla hd_nivel_control)
            $raw = trim((string) optional($hdNivelControl)->nivel_control);

            // Normalizar (espacios + minúsculas)
            $rawLower = preg_replace('/\s+/', ' ', mb_strtolower($raw));

            if ($rawLower === 'optimo' || $rawLower === 'óptimo') return 'Óptimo';
            if ($rawLower === 'eficiente') return 'Eficiente';
            if ($rawLower === 'regular') return 'Regular';
            if ($rawLower === 'deficiente') return 'Deficiente';
            if ($rawLower === 'sin control') return 'Sin control';
            if ($rawLower === 'inoperante') return 'Inoperante';

            // Fallback por nc_calculo SOLO si viene vacío el nombre
            $nc = (float) (optional($hdNivelControl)->nc_calculo ?? 0);
            if ($nc >= 10) return 'Óptimo';
            if ($nc >= 8)  return 'Eficiente';
            if ($nc >= 6)  return 'Regular';
            if ($nc >= 4)  return 'Deficiente';
            if ($nc >= 2)  return 'Sin control';
            return 'Inoperante';
        };

        foreach ($data as $item) {

            $nivel = $nivelFromHd($item->hdNivelControl);

            $isFortaleza = in_array($nivel, ['Óptimo','Eficiente'], true);
            $bucket = $isFortaleza ? 'fortalezas' : 'debilidades';

            // checar checks (pueden ser varios)
            foreach (($item->analisisRiesgoSocialDeficiencias ?? []) as $defRow) {

                // en tu tabla SÍ existe id_deficiencia, aunque no esté en fillable
                $idDef = (int) ($defRow->id_deficiencia ?? 0);
                if (!isset($mapDef[$idDef])) continue;

                $key = $mapDef[$idDef];

                // total por categoría
                $medidas[$bucket]['totales'][$key]++;

                // desglose por nivel (ahora sí va a coincidir "Sin control")
                if (!isset($medidas[$bucket]['detalle'][$key][$nivel])) continue;
                $medidas[$bucket]['detalle'][$key][$nivel]++;
            }
        }

        /* Arrays listos para JS */
        $medDebLabels = array_values($labelsMed);
        $medDebData   = [
            $medidas['debilidades']['totales']['pasivas'],
            $medidas['debilidades']['totales']['activas'],
            $medidas['debilidades']['totales']['humanas'],
            $medidas['debilidades']['totales']['documentales'],
        ];

        $medForLabels = array_values($labelsMed);
        $medForData   = [
            $medidas['fortalezas']['totales']['pasivas'],
            $medidas['fortalezas']['totales']['activas'],
            $medidas['fortalezas']['totales']['humanas'],
            $medidas['fortalezas']['totales']['documentales'],
        ];

        $medDebDetalle = $medidas['debilidades']['detalle'];
        $medForDetalle = $medidas['fortalezas']['detalle'];

        /*
        |--------------------------------------------------------------------------
        | MATRIZ DE EVALUACIÓN DE RIESGOS (Heatmap + puntos + tabla)
        |--------------------------------------------------------------------------
        | - Punto original = (x=Fac2, y=Fac1)
        | - Punto nuevo    = (x=Fac3, y=Fac2)
        | - Tabla: escenario, IPD, Perfil, Nivel, Nuevo Perfil, Nivel nuevo
        */
        $matrixPoints = [];
        $matrixRows   = [];
        $matrixCriteriaMap = [];

        foreach ($data as $unid) {

            $id = (int) ($unid->id ?? 0);

            $criterioId = (int) ($unid->libror_barreras_perimetrales_id ?? 0);
            $criterioLabel = optional($unid->BarrerasPerimetrales)->alcance ?? 'Sin criterio';

            if (!isset($matrixCriteriaMap[$criterioId])) {
                $matrixCriteriaMap[$criterioId] = [
                    'id'    => $criterioId,
                    'label' => $criterioLabel,
                ];
            }

            // =========================
            // PERFIL ORIGINAL
            // =========================
            $fac1 = round(
                (float)($unid->factorExp?->factor_dato ?? 0) *
                (float)($unid->hdProbabilidadif?->calculo_probabilidad ?? 0),
                1
            );

            $facOriginalImpacto = (float) ($unid->hdConsecuencia?->calculo_consecuencia ?? 0);

            $ipdBase = ((int)(
                (((float)($unid->factorExp?->factor_dato ?? 0) * (float)($unid->hdProbabilidadif?->calculo_probabilidad ?? 0)) * 10)
            ) / 10) * ((float)($unid->hdConsecuencia?->calculo_consecuencia ?? 0));

            $ipdBase = round((float)$ipdBase, 2);

            $riesgo = (float)($unid->nivel_riesgo ?? 0);
            if ($riesgo >= 36.10) {
                $nivelTxt = 'Muy Alto';
            } elseif ($riesgo >= 16.10) {
                $nivelTxt = 'Alto';
            } elseif ($riesgo >= 6.50) {
                $nivelTxt = 'Medio';
            } elseif ($riesgo >= 1.50) {
                $nivelTxt = 'Bajo';
            } else {
                $nivelTxt = 'Muy Bajo';
            }

            $perfil = '(' . number_format($fac1, 1) . '-' . number_format($facOriginalImpacto, 1) . ')';

            // =========================
            // NUEVO PERFIL
            // =========================
            $fac2Num = is_numeric($unid->fac2) ? round((float)$unid->fac2, 1) : null;
            $fac3Num = null;

            if (!is_null(optional($unid->hdConsecuencia3)->calculo_consecuencia)) {
                $fac3Num = round((float) optional($unid->hdConsecuencia3)->calculo_consecuencia, 1);
            }

            $nuevoPerfil = '-';
            $nivelR2Txt = '-';
            $ipd2Val = null;

            if ($fac2Num !== null && $fac3Num !== null) {
                $nuevoPerfil = '(' . number_format($fac2Num, 1) . '-' . number_format($fac3Num, 1) . ')';
                $ipd2Val = round($fac2Num * $fac3Num, 2);

                $nr = NivelRiesgo::where('min', '<=', (float)$ipd2Val)
                    ->where('max', '>=', (float)$ipd2Val)
                    ->first();

                if ($nr) {
                    $nivelR2Txt = $nr->nivel_riesgo;
                }
            }

            $matrixPoints[] = [
                'id'            => $id,
                'label'         => 'E.' . $id,

                'criterio_id'   => $criterioId,
                'criterio'      => $criterioLabel,

                // original
                'x'             => $facOriginalImpacto,
                'y'             => $fac1,
                'ipd'           => $ipdBase,
                'perfil'        => $perfil,
                'nivel'         => $nivelTxt,

                // nuevo
                'x2'            => $fac3Num,
                'y2'            => $fac2Num,
                'ipd2'          => $ipd2Val,
                'nuevo_perfil'  => $nuevoPerfil,
                'nuevo_nivel'   => $nivelR2Txt,
            ];

            $matrixRows[] = [
                'id'            => $id,
                'label'         => 'E.' . $id,
                'criterio_id'   => $criterioId,
                'criterio'      => $criterioLabel,

                'ipd'           => $ipdBase,
                'perfil'        => $perfil,
                'nivel'         => $nivelTxt,

                'nuevo_perfil'  => $nuevoPerfil,
                'nuevo_nivel'   => $nivelR2Txt,
            ];
        }

        usort($matrixRows, function($a, $b){
            return ($a['id'] ?? 0) <=> ($b['id'] ?? 0);
        });

        $matrixCriteria = array_values($matrixCriteriaMap);
        usort($matrixCriteria, function($a, $b){
            return strcmp((string)$a['label'], (string)$b['label']);
        });

                /*
        |--------------------------------------------------------------------------
        | AVANCE DE CONSECUCIÓN
        |--------------------------------------------------------------------------
        | No aceptables: Muy Alto, Alto, Medio
        | Aceptables: Bajo, Muy Bajo
        |
        | estatus_riesgo:
        | null / 1 = Abierta
        | 2        = Proceso
        | 3        = Ejecutada
        |--------------------------------------------------------------------------
        */
        $avanceNoAceptables = [
            'abierta'   => 0,
            'proceso'   => 0,
            'ejecutada' => 0,
            'total'     => 0,
        ];

        $avanceDetalleNoAceptables = [
            'abierta' => [
                'muy_alto' => 0,
                'alto'     => 0,
                'medio'    => 0,
                'total'    => 0,
            ],
            'proceso' => [
                'muy_alto' => 0,
                'alto'     => 0,
                'medio'    => 0,
                'total'    => 0,
            ],
            'ejecutada' => [
                'muy_alto' => 0,
                'alto'     => 0,
                'medio'    => 0,
                'total'    => 0,
            ],
        ];

        $avanceAceptables = [
            'bajo'     => 0,
            'muy_bajo' => 0,
            'total'    => 0,
        ];

        foreach ($data as $unid) {
            $riesgo = (float) ($unid->nivel_riesgo ?? 0);

            if ($riesgo >= 36.10) {
                $nivelKey = 'muy_alto';
                $nivelTxt = 'Muy Alto';
            } elseif ($riesgo >= 16.10) {
                $nivelKey = 'alto';
                $nivelTxt = 'Alto';
            } elseif ($riesgo >= 6.50) {
                $nivelKey = 'medio';
                $nivelTxt = 'Medio';
            } elseif ($riesgo >= 1.50) {
                $nivelKey = 'bajo';
                $nivelTxt = 'Bajo';
            } else {
                $nivelKey = 'muy_bajo';
                $nivelTxt = 'Muy Bajo';
            }

            $estatus = $unid->estatus_riesgo;

            // ACEPTABLES
            if (in_array($nivelKey, ['bajo', 'muy_bajo'], true)) {
                $avanceAceptables[$nivelKey]++;
                $avanceAceptables['total']++;
                continue;
            }

            // NO ACEPTABLES
            $estadoKey = 'abierta';
            if ((int)$estatus === 2) {
                $estadoKey = 'proceso';
            } elseif ((int)$estatus === 3) {
                $estadoKey = 'ejecutada';
            }

            $avanceNoAceptables[$estadoKey]++;
            $avanceNoAceptables['total']++;

            $avanceDetalleNoAceptables[$estadoKey][$nivelKey]++;
            $avanceDetalleNoAceptables[$estadoKey]['total']++;
        }

        $avanceConsecucionPorcentaje = $avanceNoAceptables['total'] > 0
            ? round(($avanceNoAceptables['ejecutada'] / $avanceNoAceptables['total']) * 100, 2)
            : 0;

        return view('analisisriesgos.graficas-sociales-cliente', compact(
            'data',
            'id_cliente',
            'cliente',
            'conteoIndice',
            'vulnerabilidadLabels',
            'vulnerabilidadPromedios',
            'riesgosPorCriterioLabels',
            'riesgosPorCriterioMuyAlto',
            'riesgosPorCriterioAlto',
            'riesgosPorCriterioMedio',
            'riesgosPorCriterioBajo',
            'riesgosPorCriterioMuyBajo',
            'escenariosFilas',
            'totalesEscenarios',
            'distribucionEscenarios',

            // === Pareto ===
            'paretoLabels',
            'paretoIPD',
            'paretoCrit',
            'paretoAcum',
            'paretoEventos',

            'medDebLabels',
            'medDebData',
            'medForLabels',
            'medForData',
            'medDebDetalle',
            'medForDetalle',

            'matrixPoints',
            'matrixRows',
            'matrixCriteria',
            'avanceNoAceptables',
            'avanceDetalleNoAceptables',
            'avanceAceptables',
            'avanceConsecucionPorcentaje',
        ));
    }

    public function detalleanalisissocial($id_cliente, $id_riesgo)
    {
        $alcances = BarrerasPerimetrales::where('status_delete', 1)->get();
        $ana_riesgo = AnalisisRiesgoSocial::where('id', $id_riesgo)->first();
        $ana_impacto = AnalisisRiesgoSocialImpacto::where('analisis_riesgo_social_id', $id_riesgo)->get();
        $ana_impacto_if = AnalisisRiesgoSocialImpacto::where('analisis_riesgo_social_id', $id_riesgo)->first();
        $ana_deficiencia = AnalisisRiesgoSocialDeficiencia::where('analisis_riesgo_social_id', $id_riesgo)->get();
        $ana_deficiencia_if = AnalisisRiesgoSocialDeficiencia::where('analisis_riesgo_social_id', $id_riesgo)->first();

        if($ana_impacto_if == null){
            $array_impacto = array();
        }else{
            foreach($ana_impacto as $value){
                $array_impacto [] = $value->id_impacto;
            }
        }

        if($ana_deficiencia_if == null){
            $array_deficiencia = array();
        }else{
            foreach($ana_deficiencia as $value){
                $array_deficiencia [] = $value->id_deficiencia;
            }
        }


        return view('analisisriesgos.detalle-sociales', compact('id_cliente', 'id_riesgo', 'ana_riesgo', 'ana_impacto', 'ana_deficiencia', 'alcances', 'array_impacto', 'array_deficiencia'));    
    }

    public function analisisanalisissocial($id_cliente, $id_riesgo)
    {


        $alcances = BarrerasPerimetrales::where('status_delete', 1)->get();
        $ana_riesgo = AnalisisRiesgoSocial::where('id', $id_riesgo)->first();
        $ana_impacto = AnalisisRiesgoSocialImpacto::where('analisis_riesgo_social_id', $id_riesgo)->get();
        $ana_impacto_if = AnalisisRiesgoSocialImpacto::where('analisis_riesgo_social_id', $id_riesgo)->first();
        $ana_deficiencia = AnalisisRiesgoSocialDeficiencia::where('analisis_riesgo_social_id', $id_riesgo)->get();
        $ana_deficiencia_if = AnalisisRiesgoSocialDeficiencia::where('analisis_riesgo_social_id', $id_riesgo)->first();

        if($ana_impacto_if == null){
            $array_impacto = array();
        }else{
            foreach($ana_impacto as $value){
                $array_impacto [] = $value->id_impacto;
            }
        }

        if($ana_deficiencia_if == null){
            $array_deficiencia = array();
        }else{
            foreach($ana_deficiencia as $value){
                $array_deficiencia [] = $value->id_deficiencia;
            }
        }


        return view('analisisriesgos.editar-analisis-social', compact('id_cliente', 'id_riesgo', 'ana_riesgo', 'ana_impacto', 'ana_deficiencia', 'alcances', 'array_impacto', 'array_deficiencia')); 

    }


 // ----------------------------------------------------------------------------------------------------------------------------------------------------------- Analisis Riesgos Tecnologicos
    public function analisistecnologicoscli($id_cliente)
    {
        $data = AnalisisRiesgoTecnologico::where('cliente_id', $id_cliente)->get();
        $cliente = Cliente::where('id', $id_cliente)->first();

        return view('analisisriesgos.tecnologicos.analisis-tec-cliente', compact('data', 'id_cliente', 'cliente'));  
    }

    public function graficastecnologicas($id_cliente)
    {
        $data = AnalisisRiesgoTecnologico::where('cliente_id', $id_cliente)->get();
        $cliente = Cliente::where('id', $id_cliente)->first();

        return view('analisisriesgos.tecnologicos.graficas-tecnologicos-cliente', compact('data', 'id_cliente', 'cliente'));           
    }

    public function seleccionaanalisistec($id_cliente)
    {
        $BarrerasPerimetrale = BarrerasPerimetrales::where('status_delete', 1)->get();
        $ConceptosTecnologicos = ConceptosTecnologicos::where('status_delete', 1)->get();
        $RiesgosNaturales = ConceptosNaturales::where('status_delete', 1)->get();
        $ConceptosOtros = ConceptosOtros::where('status_delete', 1)->get();

        $alcance_social = RiesgosSociales::where('status_delete', 1)->first();
        $alcance_tecnologico = RiesgosTecnologicos::where('status_delete', 1)->first();
        $alcance_natural = RiesgosNaturales::where('status_delete', 1)->first();
        $alcance_otros = RiesgosOtros::where('status_delete', 1)->first();


        return view('analisisriesgos.tecnologicos.seleccionar-analisis-concepto-tec', compact('BarrerasPerimetrale', 'ConceptosTecnologicos', 'RiesgosNaturales', 'ConceptosOtros', 'id_cliente', 'alcance_social', 'alcance_tecnologico', 'alcance_natural', 'alcance_otros'));        
    }

    public function generaranalisistecno($cliente, $tipo, $id_alcance, $num)
    {
        $data = Cliente::where('status_delete', 1)->get();
        $alcances = ConceptosTecnologicos::where('status_delete', 1)->get();

        if($id_alcance == 0)
        {
            $alcance_social = RiesgosTecnologicos::where('status_delete', 1)->first();
            $count_alcance = 0;
        }else{
            $alcance_social = RiesgosTecnologicos::where('status_delete', 1)->where('social_alcance_id', $id_alcance)->get();
            $count_alcance = count($alcance_social);

            $id = $num - 1;
            if($count_alcance == 0){
                $alcance_social = "Vacio"; 
            }else{
                $alcance_social = $alcance_social[$id]; 
            }
            
        }
        
        $nivel_control = NivelControl::where('status_delete', 1)->get();


        return view('analisisriesgos.tecnologicos.generar-analisis-tecnologico', compact('data', 'alcances', 'cliente', 'tipo', 'id_alcance', 'alcance_social', 'count_alcance', 'num', 'nivel_control', 'nivel_control'));        
    }

    public function obteneralcancestecnologicos(Request $request)
    {
        $riesgos = RiesgosTecnologicos::where('status_delete', 1)->where('social_alcance_id', $request->id)->get();
        $cadena_sociales = "";
        foreach ($riesgos as $mun) {
            $cadena_sociales .= '"' . $mun->id . '":"' . $mun->factores_riesgo . '",';
        }
        $cadena_sociales = '{' . rtrim($cadena_sociales, ',') . '}';
        return response()->json(['success' => $cadena_sociales]);        
    }

    public function guardarriesgotecnologico(Request $request)
    {

        $data = [
            'cliente_id' => $request->cliente,
            'libror_conceptos_tecnologicos_id' => $request->punto_normativo,
            'libror_tecnologicos_alcances_id' => $request->alcances,
            'punto_control' => $request->punto_control,
            'factores_riesgo' => $request->factor_riesgo,
            'eventos_riesgo' => $request->evento_riesgo,
            'recursos_expuestos' => $request->recursos_expuestos,
            'fuente_riesgo' => $request->fuente_riesgo,
            'ubicacion_riesgo' => $request->ubicacion_riesgo,
            'hd_nivel_control_id' => $request->nivel_control,
            'medidas_prevencion' => $request->medidas_prevencion,
            'contramedidas' => $request->contramedidas,
            'hd_consecuencia_id' => $request->impacto_severidad,
            'hd_probabilidad_id' => $request->factor_probabilidad,
            'factor_exposicion' => $request->nivel_control,
            'nivel_riesgo' => $request->nivel_riesgo,
            'descripcion' => $request->descripcion,
            'status_delete' => 1,
            'iduserCreated' =>auth()->user()->id,
            'iduserUpdated' =>auth()->user()->id,
            'created_at' =>date('Y-m-d H:i:s'),
            'updated_at' =>date('Y-m-d H:i:s')
        ];

        $reg_id =AnalisisRiesgoTecnologico::insertGetId($data);


        foreach ($request->impactos_negocio as $key ) {
            $data = [
                'analisis_riesgo_tecnologico_id' => $reg_id,
                'id_impacto' =>$key,
                'iduserCreated' =>auth()->user()->id,
                'iduserUpdated' =>auth()->user()->id,
                'created_at' =>date('Y-m-d H:i:s'),
                'updated_at' =>date('Y-m-d H:i:s')
            ];

            AnalisisRiesgoTecnologicoImpacto::insert($data);
        }

        foreach ($request->deficiencia_medida_s as $key ) {
            $data = [
                'analisis_riesgo_tecnologico_id' => $reg_id,
                'id_deficiencia' =>$key,
                'iduserCreated' =>auth()->user()->id,
                'iduserUpdated' =>auth()->user()->id,
                'created_at' =>date('Y-m-d H:i:s'),
                'updated_at' =>date('Y-m-d H:i:s')
            ];

            AnalisisRiesgoTecnologicoDeficiencia::insert($data);
        }


        $alcance_tecnologico = RiesgosTecnologicos::where('status_delete', 1)->where('social_alcance_id', $request->punto_normativo)->get();
        $count_alcance = count($alcance_tecnologico);
        
        if($request->alcances== $count_alcance){
            return redirect()->route('analisis.analisistecnologicoscli',$request->cliente);
            session()->flash('success', 'El registro de riesgo tecnológico se creo correctamente');
        }else{
            $redirect = $request->alcances + 1;
            return redirect()->route('analisis.generaranalisistecno',[$request->cliente, $request->tipo, $request->punto_normativo, $redirect]);
            session()->flash('success', 'El registro de riesgo tecnológico se creo correctamente');
        }

        // session()->flash('success', 'El registro de riesgo tecnologico se creo correctamente');
        // return redirect()->route('analisis.analisistecnologicoscli',$request->cliente);        
    }
 // ----------------------------------------------------------------------------------------------------------------------------------------------------------- Analisis Riesgos Naturales

    public function analisisnaturalescli($id_cliente)
    {
        $data = AnalisisRiesgoNaturales::where('cliente_id', $id_cliente)->get();
        $cliente = Cliente::where('id', $id_cliente)->first();

        return view('analisisriesgos.naturales.analisis-nat-cliente', compact('data', 'id_cliente', 'cliente'));         
    }

    public function graficasnaturales($id_cliente)
    {
        $data = AnalisisRiesgoNaturales::where('cliente_id', $id_cliente)->get();
        $cliente = Cliente::where('id', $id_cliente)->first();

        return view('analisisriesgos.naturales.graficas-naturales-cliente', compact('data', 'id_cliente', 'cliente'));         
    }

    public function seleccionaanalisisnaturales($id_cliente)
    {
        $BarrerasPerimetrale = BarrerasPerimetrales::where('status_delete', 1)->get();
        $ConceptosTecnologicos = ConceptosTecnologicos::where('status_delete', 1)->get();
        $RiesgosNaturales = ConceptosNaturales::where('status_delete', 1)->get();
        $ConceptosOtros = ConceptosOtros::where('status_delete', 1)->get();

        $alcance_social = RiesgosSociales::where('status_delete', 1)->first();
        $alcance_tecnologico = RiesgosTecnologicos::where('status_delete', 1)->first();
        $alcance_natural = RiesgosNaturales::where('status_delete', 1)->first();
        $alcance_otros = RiesgosOtros::where('status_delete', 1)->first();


        return view('analisisriesgos.naturales.seleccionar-analisis-concepto-nat', compact('BarrerasPerimetrale', 'ConceptosTecnologicos', 'RiesgosNaturales', 'ConceptosOtros', 'id_cliente', 'alcance_social', 'alcance_tecnologico', 'alcance_natural', 'alcance_otros'));           
    }

    public function generaranalisisnaturales($cliente, $tipo, $id_alcance, $num)
    {
        $data = Cliente::where('status_delete', 1)->get();
        $alcances = ConceptosNaturales::where('status_delete', 1)->get();

        if($id_alcance == 0)
        {
            $alcance_social = RiesgosNaturales::where('status_delete', 1)->first();
            $count_alcance = 0;
        }else{
            $alcance_social = RiesgosNaturales::where('status_delete', 1)->where('social_alcance_id', $id_alcance)->get();
            $count_alcance = count($alcance_social);

            $id = $num - 1;
            if($count_alcance == 0){
                $alcance_social = "Vacio"; 
            }else{
                $alcance_social = $alcance_social[$id]; 
            }
            
        }
        
        $nivel_control = NivelControl::where('status_delete', 1)->get();


        return view('analisisriesgos.naturales.generar-analisis-naturales', compact('data', 'alcances', 'cliente', 'tipo', 'id_alcance', 'alcance_social', 'count_alcance', 'num', 'nivel_control', 'nivel_control'));         
    }

    public function obteneralcancesnaturales(Request $request)
    {
        $riesgos = RiesgosNaturales::where('status_delete', 1)->where('social_alcance_id', $request->id)->get();
        $cadena_sociales = "";
        foreach ($riesgos as $mun) {
            $cadena_sociales .= '"' . $mun->id . '":"' . $mun->factores_riesgo . '",';
        }
        $cadena_sociales = '{' . rtrim($cadena_sociales, ',') . '}';
        return response()->json(['success' => $cadena_sociales]);        
    }

    public function guardarriesgonaturales(Request $request)
    {

        $data = [
            'cliente_id' => $request->cliente,
            'libror_conceptos_naturales_id' => $request->punto_normativo,
            'libror_naturales_alcances_id' => $request->alcances,
            'punto_control' => $request->punto_control,
            'factores_riesgo' => $request->factor_riesgo,
            'eventos_riesgo' => $request->evento_riesgo,
            'recursos_expuestos' => $request->recursos_expuestos,
            'fuente_riesgo' => $request->fuente_riesgo,
            'ubicacion_riesgo' => $request->ubicacion_riesgo,
            'hd_nivel_control_id' => $request->nivel_control,
            'medidas_prevencion' => $request->medidas_prevencion,
            'contramedidas' => $request->contramedidas,
            'hd_consecuencia_id' => $request->impacto_severidad,
            'hd_probabilidad_id' => $request->factor_probabilidad,
            'factor_exposicion' => $request->nivel_control,
            'nivel_riesgo' => $request->nivel_riesgo,
            'descripcion' => $request->descripcion,
            'status_delete' => 1,
            'iduserCreated' =>auth()->user()->id,
            'iduserUpdated' =>auth()->user()->id,
            'created_at' =>date('Y-m-d H:i:s'),
            'updated_at' =>date('Y-m-d H:i:s')
        ];

        $reg_id =AnalisisRiesgoNaturales::insertGetId($data);


        foreach ($request->impactos_negocio as $key ) {
            $data = [
                'analisis_riesgo_naturales_id' => $reg_id,
                'id_impacto' =>$key,
                'iduserCreated' =>auth()->user()->id,
                'iduserUpdated' =>auth()->user()->id,
                'created_at' =>date('Y-m-d H:i:s'),
                'updated_at' =>date('Y-m-d H:i:s')
            ];

            AnalisisRiesgoNaturalesImpacto::insert($data);
        }

        foreach ($request->deficiencia_medida_s as $key ) {
            $data = [
                'analisis_riesgo_naturales_id' => $reg_id,
                'id_deficiencia' =>$key,
                'iduserCreated' =>auth()->user()->id,
                'iduserUpdated' =>auth()->user()->id,
                'created_at' =>date('Y-m-d H:i:s'),
                'updated_at' =>date('Y-m-d H:i:s')
            ];

            AnalisisRiesgoNaturalesDeficiencia::insert($data);
        }

        $alcance_natural = RiesgosNaturales::where('status_delete', 1)->where('social_alcance_id', $request->punto_normativo)->get();
        $count_alcance = count($alcance_natural);
        
        if($request->alcances== $count_alcance){
            return redirect()->route('analisis.analisisnaturalescli',$request->cliente);
            session()->flash('success', 'El registro de riesgo natural se creo correctamente');
        }else{
            $redirect = $request->alcances + 1;
            return redirect()->route('analisis.generaranalisisnaturales',[$request->cliente, $request->tipo, $request->punto_normativo, $redirect]);
            session()->flash('success', 'El registro de riesgo natural se creo correctamente');
        }

        
    }
 // ----------------------------------------------------------------------------------------------------------------------------------------------------------- Analisis Riesgos Otros

    public function analisisotroscli($id_cliente)
    {
        $data = AnalisisRiesgoOtros::where('cliente_id', $id_cliente)->get();
        $cliente = Cliente::where('id', $id_cliente)->first();

        return view('analisisriesgos.otros.analisis-otro-cliente', compact('data', 'id_cliente', 'cliente'));        
    }

    public function graficasotros($id_cliente)
    {
        $data = AnalisisRiesgoOtros::where('cliente_id', $id_cliente)->get();
        $cliente = Cliente::where('id', $id_cliente)->first();

        return view('analisisriesgos.otros.graficas-otros-cliente', compact('data', 'id_cliente', 'cliente'));          
    }

    public function seleccionaanalisisotros($id_cliente)
    {
        $BarrerasPerimetrale = BarrerasPerimetrales::where('status_delete', 1)->get();
        $ConceptosTecnologicos = ConceptosTecnologicos::where('status_delete', 1)->get();
        $RiesgosNaturales = ConceptosNaturales::where('status_delete', 1)->get();
        $ConceptosOtros = ConceptosOtros::where('status_delete', 1)->get();

        $alcance_social = RiesgosSociales::where('status_delete', 1)->first();
        $alcance_tecnologico = RiesgosTecnologicos::where('status_delete', 1)->first();
        $alcance_natural = RiesgosNaturales::where('status_delete', 1)->first();
        $alcance_otros = RiesgosOtros::where('status_delete', 1)->first();


        return view('analisisriesgos.otros.seleccionar-analisis-concepto-otros', compact('BarrerasPerimetrale', 'ConceptosTecnologicos', 'RiesgosNaturales', 'ConceptosOtros', 'id_cliente', 'alcance_social', 'alcance_tecnologico', 'alcance_natural', 'alcance_otros'));         
    }

    public function generaranalisisotros($cliente, $tipo, $id_alcance, $num)
    {
        $data = Cliente::where('status_delete', 1)->get();
        $alcances = ConceptosOtros::where('status_delete', 1)->get();

        if($id_alcance == 0)
        {
            $alcance_social = RiesgosOtros::where('status_delete', 1)->first();
            $count_alcance = 0;
        }else{
            $alcance_social = RiesgosOtros::where('status_delete', 1)->where('social_alcance_id', $id_alcance)->get();
            $count_alcance = count($alcance_social);

            $id = $num - 1;
            if($count_alcance == 0){
                $alcance_social = "Vacio"; 
            }else{
                $alcance_social = $alcance_social[$id]; 
            }
            
        }
        
        $nivel_control = NivelControl::where('status_delete', 1)->get();


        return view('analisisriesgos.otros.generar-analisis-otros', compact('data', 'alcances', 'cliente', 'tipo', 'id_alcance', 'alcance_social', 'count_alcance', 'num', 'nivel_control', 'nivel_control'));         
    }

    public function obteneralcancesotros(Request $request)
    {
        $riesgos = RiesgosOtros::where('status_delete', 1)->where('social_alcance_id', $request->id)->get();
        $cadena_sociales = "";
        foreach ($riesgos as $mun) {
            $cadena_sociales .= '"' . $mun->id . '":"' . $mun->factores_riesgo . '",';
        }
        $cadena_sociales = '{' . rtrim($cadena_sociales, ',') . '}';
        return response()->json(['success' => $cadena_sociales]);           
    }

    public function guardarriesgootros(Request $request)
    {

        $data = [
            'cliente_id' => $request->cliente,
            'libror_conceptos_otros_id' => $request->punto_normativo,
            'libror_otros_alcances_id' => $request->alcances,
            'punto_control' => $request->punto_control,
            'factores_riesgo' => $request->factor_riesgo,
            'eventos_riesgo' => $request->evento_riesgo,
            'recursos_expuestos' => $request->recursos_expuestos,
            'fuente_riesgo' => $request->fuente_riesgo,
            'ubicacion_riesgo' => $request->ubicacion_riesgo,
            'hd_nivel_control_id' => $request->nivel_control,
            'medidas_prevencion' => $request->medidas_prevencion,
            'contramedidas' => $request->contramedidas,
            'status_delete' => 1,
            'iduserCreated' =>auth()->user()->id,
            'iduserUpdated' =>auth()->user()->id,
            'created_at' =>date('Y-m-d H:i:s'),
            'updated_at' =>date('Y-m-d H:i:s')
        ];

        $reg_id =AnalisisRiesgoOtros::insertGetId($data);


        foreach ($request->impactos_negocio as $key ) {
            $data = [
                'analisis_riesgo_otros_id' => $reg_id,
                'id_impacto' =>$key,
                'iduserCreated' =>auth()->user()->id,
                'iduserUpdated' =>auth()->user()->id,
                'created_at' =>date('Y-m-d H:i:s'),
                'updated_at' =>date('Y-m-d H:i:s')
            ];

            AnalisisRiesgoOtrosImpacto::insert($data);
        }

        foreach ($request->deficiencia_medida_s as $key ) {
            $data = [
                'analisis_riesgo_otros_id' => $reg_id,
                'id_deficiencia' =>$key,
                'iduserCreated' =>auth()->user()->id,
                'iduserUpdated' =>auth()->user()->id,
                'created_at' =>date('Y-m-d H:i:s'),
                'updated_at' =>date('Y-m-d H:i:s')
            ];

            AnalisisRiesgoOtrosDeficiencia::insert($data);
        }



        session()->flash('success', 'El registro de otro riesgo se creo correctamente');
        return redirect()->route('analisis.analisisotroscli',$request->cliente);   
    }

    /////////////////////// Matriz de aceptabilidad

    public function matriz()
    {
        $data= 1; 

        return view('analisisriesgos.matriz-aceptabilidad', compact('data'));
    }

    public function metodos()
    {
        $data= 1; 

        return view('analisisriesgos.metodos', compact('data'));
    }

        public function riesgoperfil()
    {
       $datos = collect([
        (object)['escenario' => 'E.1', 'ipd' => 14.4, 'perfil' => '(3-4)'],
        (object)['escenario' => 'E.2', 'ipd' => 19.2, 'perfil' => '(4-4)'],
        (object)['escenario' => 'E.3', 'ipd' => 14.4, 'perfil' => '(3-5)'],
        (object)['escenario' => 'E.4', 'ipd' => 19.2, 'perfil' => '(4-4)'],
        (object)['escenario' => 'E.5', 'ipd' => 9.6,  'perfil' => '(2-5)'],
        (object)['escenario' => 'E.6', 'ipd' => 21.6, 'perfil' => '(3-5)'],
    ]);


        return view('analisisriesgos.riesgoperfil', compact('datos'));
    }

    public function kpis()
    {
        $data= 1; 

        return view('analisisriesgos.kpis', compact('data'));
    }

        public function diegofut()
    {
        $data= 1; 

        return view('analisisriesgos.diegofut', compact('data'));
    }

            public function diegores()
    {
        $data= 1; 

        return view('analisisriesgos.diegores', compact('data'));
    }



    public function updateCell(Request $request)
    {
        $request->validate([
            'id'    => 'required|integer|exists:analisis_riesgo_social,id',
            'field' => 'required|string',
            'value' => 'nullable',
        ]);

        $field = $request->input('field');

        $fillable = [
            'medidas_prevencion',
            'contramedidas',
            'observaciones',
            'plan',
            'responsable',
            'fecha_inicio',
            'fecha_fin',
            'estatus_riesgo',
            'seg_control',
            'nivel_control2',
            'probabilidad_id2',
            'sev2',
            'estrategias',
            'costo_sol',
        ];

        if (!in_array($field, $fillable, true)) {
            return response()->json(['ok' => false, 'message' => 'Campo no permitido'], 422);
        }

        try {
            /** @var \App\Models\AnalisisRiesgos\AnalisisRiesgoSocial $row */
            $row = \App\Models\AnalisisRiesgos\AnalisisRiesgoSocial::findOrFail((int)$request->input('id'));

            // --- Escritura del campo recibido ---
            if ($field === 'nivel_control2') {
                $v = $request->input('value');
                $row->$field = ($v === null || $v === '') ? null : (int)$v;
                if ($row->$field !== null && ($row->$field < 1 || $row->$field > 6)) {
                    return response()->json(['ok' => false, 'message' => 'Valor inválido (1-6)'], 422);
                }
            } elseif ($field === 'estatus_riesgo') {
                $v = $request->input('value');
                $row->$field = ($v === null || $v === '') ? null : (int)$v;
                if ($row->$field !== null && ($row->$field < 1 || $row->$field > 3)) {
                    return response()->json(['ok' => false, 'message' => 'Valor inválido (1-3)'], 422);
                }
            } elseif ($field === 'seg_control') {
                $v = $request->input('value');
                $row->$field = ($v === null || $v === '') ? null : (int)$v;
                if ($row->$field !== null && ($row->$field < 1 || $row->$field > 2)) {
                    return response()->json(['ok' => false, 'message' => 'Valor inválido (1-2)'], 422);
                }
            } elseif ($field === 'probabilidad_id2') {
                $v = $request->input('value');
                $row->$field = ($v === null || $v === '') ? null : (int)$v;
                if ($row->$field !== null && ($row->$field < 1 || $row->$field > 5)) {
                    return response()->json(['ok' => false, 'message' => 'Valor inválido (1-5)'], 422);
                }
            } elseif ($field === 'sev2') {
                $v = $request->input('value');
                $row->$field = ($v === null || $v === '') ? null : (int)$v;
                if ($row->$field !== null && ($row->$field < 1 || $row->$field > 7)) {
                    return response()->json(['ok' => false, 'message' => 'Valor inválido (1-7)'], 422);
                }
            } else {
                $val = trim((string)($request->input('value') ?? ''));
                $row->$field = ($val === '') ? null : $val;
            }

            // --- Dependencias / calculados ---
            $fac2     = $row->fac2;   // puede venir previamente calculado
            $fac3     = null;
            $ipd2     = null;
            $amzLabel = null;

            // Recalcular FAC2 si cambian NC2 o Prob2
            if (in_array($field, ['nivel_control2', 'probabilidad_id2'], true)) {
                $pesoNC   = [1=>3.162, 2=>3.162, 3=>2.530, 4=>1.897, 5=>1.265, 6=>0.632];
                $pesoProb = [1=>3.162, 2=>2.530, 3=>1.897, 4=>1.265, 5=>0.632];

                $nc2 = (int)($row->nivel_control2 ?? 0);
                $p2  = (int)($row->probabilidad_id2 ?? 0);

                if (isset($pesoNC[$nc2]) && isset($pesoProb[$p2])) {
                    $fac2 = (float)$pesoNC[$nc2] * (float)$pesoProb[$p2];
                    $row->fac2 = $fac2;
                } else {
                    $row->fac2 = $fac2 = null;
                }

                // Etiqueta Amenaza más cercana a fac2
                if ($fac2 !== null) {
                    $amenazas = [
                        0.4  => 'Improbable',
                        1.2  => 'Remoto',
                        2.0  => 'Esporádico',
                        4.0  => 'Ocasional',
                        6.0  => 'Frecuente',
                        9.0  => 'Habitual',
                        10.0 => 'Constante',
                    ];
                    $closestVal = null; $closestDiff = null;
                    foreach (array_keys($amenazas) as $val) {
                        $diff = abs($fac2 - (float)$val);
                        if ($closestDiff === null || $diff < $closestDiff) {
                            $closestDiff = $diff;
                            $closestVal  = (float)$val;
                        }
                    }
                    if ($closestVal !== null) $amzLabel = $amenazas[$closestVal];
                }
            }

            // FAC3 desde sev2
            if ($row->sev2) {
                if ($c = \App\Models\Hd\Consecuencia::find($row->sev2)) {
                    $fac3 = (float)$c->calculo_consecuencia;
                }
            }

            // IPD2 si hay fac2 y fac3
            if (in_array($field, ['sev2', 'nivel_control2', 'probabilidad_id2'], true)) {
                if ($fac2 === null) $fac2 = $row->fac2;
                if ($fac3 === null && $row->sev2) {
                    if ($c = \App\Models\Hd\Consecuencia::find($row->sev2)) $fac3 = (float)$c->calculo_consecuencia;
                }
                if ($fac2 !== null && $fac3 !== null) {
                    $ipd2 = $fac2 * $fac3;
                }
            }

            // #3 y Exp.3
            $nc3  = null;
            $exp3 = null;
            if ($row->nivel_control2) {
                if ($nc = \App\Models\Hd\NivelControl::find($row->nivel_control2)) {
                    $nc3  = $nc->nc_calculo;
                    $exp3 = $nc->exposicion;
                }
            }

            // Riesgo Marginal 2
            $rm2 = null;
            if ($ipd2 !== null) {
                $diff = $ipd2 - 6.4;
                $rm2  = ($diff < 6.4) ? 0.0 : $diff;
            }

            // IPD base (IPD1)
            $ipd1 = (round(($row->factorExp?->factor_dato ?? 0) * ($row->hdProbabilidadif?->calculo_probabilidad ?? 0)))
                    * ($row->hdConsecuencia?->calculo_consecuencia ?? 0);

            // Índice Reducción (IR) = IPD1 - IPD2
            $indiceReduccion = null;
            if ($ipd2 !== null) {
                $indiceReduccion = round($ipd1 - $ipd2, 1);
            }
            $row->indice_reduccion = $indiceReduccion;

            // % Índice Reducción = (1 - (IPD2 / IPD1)) * 100
            $indiceReduccionPct = null;
            if ($ipd2 !== null && $ipd1 > 0) {
                $indiceReduccionPct = round((1 - ($ipd2 / $ipd1)) * 100, 1);
            }

            // ===== Nivel Riesgo2, Aceptabilidad y Solución Eficaz =====
            $nivelRiesgo2  = null;
            $aceptabilidad = null;
            $solEficaz     = null;

            if ($ipd2 !== null) {
                $nivel = \App\Models\Hd\NivelRiesgo::where('min', '<=', $ipd2)
                            ->where('max', '>=', $ipd2)
                            ->first();
                if ($nivel) {
                    $nivelRiesgo2  = $nivel->nivel_riesgo;   // "Medio", "Alto", etc.
                    $aceptabilidad = $nivel->aceptabilidad;  // "Aceptables" / "No aceptables"

                    // Persistimos aceptabilidad
                    $row->aceptabilidad = $aceptabilidad;

                    // Solución Eficaz (SI/NO)
                    $accLower = mb_strtolower($aceptabilidad, 'UTF-8');
                    if ($accLower === 'aceptables') {
                        $solEficaz = 'SI';
                    } elseif ($accLower === 'no aceptables') {
                        $solEficaz = 'NO';
                    }
                    $row->sol_eficaz = $solEficaz;
                } else {
                    $row->aceptabilidad = null;
                    $row->sol_eficaz   = null;
                }
            } else {
                $row->aceptabilidad = null;
                $row->sol_eficaz   = null;
            }

            $row->save();

            return response()->json([
                'ok'             => true,
                'saved'          => [$field => $row->$field],
                'fac2'           => $row->fac2,
                'amz2_label'     => $amzLabel,
                'fac3'           => $fac3,
                'ipd2'           => $ipd2,
                'rm2'            => $rm2,
                'nc3'            => $nc3,
                'exp3'           => $exp3,
                'ipd1'           => $ipd1,
                'ir'             => $indiceReduccion,
                'irp_pct'        => $indiceReduccionPct,
                'nivel_riesgo2'  => $nivelRiesgo2,
                'aceptabilidad'  => $aceptabilidad,
                'sol_eficaz'     => $solEficaz, // <-- para pintar en el front
            ]);

        } catch (\Throwable $e) {
            \Log::error('updateCell error', ['e' => $e->getMessage()]);
            return response()->json(['ok' => false, 'message' => 'Error interno al guardar'], 500);
        }
    }


}