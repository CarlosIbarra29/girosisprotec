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


use App\Models\AnalisisRiesgos\AnalisisRiesgoTecnologico;
use App\Models\AnalisisRiesgos\AnalisisRiesgoTecnologicoDeficiencia;
use App\Models\AnalisisRiesgos\AnalisisRiesgoTecnologicoImpacto;

use App\Models\AnalisisRiesgos\AnalisisRiesgoNaturales;
use App\Models\AnalisisRiesgos\AnalisisRiesgoNaturalesImpacto;
use App\Models\AnalisisRiesgos\AnalisisRiesgoNaturalesDeficiencia;

use App\Models\AnalisisRiesgos\AnalisisRiesgoOtros;
use App\Models\AnalisisRiesgos\AnalisisRiesgoOtrosDeficiencia;
use App\Models\AnalisisRiesgos\AnalisisRiesgoOtrosImpacto;

use App\Models\Hd\NivelControl;
use App\Models\User;
use App\Models\Rol;
use App\Models\RolPermiso;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

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

        return view('analisisriesgos.analisis-cliente', compact('data', 'id_cliente', 'cliente'));   
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


    	return view('analisisriesgos.generar-analisis', compact('data', 'alcances', 'cliente', 'tipo', 'id_alcance', 'alcance_social', 'count_alcance', 'num', 'nivel_control', 'nivel_control'));
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

        // dd($request);
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
            'factor_exposicion' => $request->nivel_control,
            'nivel_riesgo' => $request->nivel_riesgo,
            'status_delete' => 1,
            'iduserCreated' =>auth()->user()->id,
            'iduserUpdated' =>auth()->user()->id,
            'created_at' =>date('Y-m-d H:i:s'),
            'updated_at' =>date('Y-m-d H:i:s')
        ];

        $reg_id =AnalisisRiesgoSocial::insertGetId($data);


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



        session()->flash('success', 'El registro de riesgo social se creo correctamente');
        return redirect()->route('analisis.analisiscliente',$request->cliente);


    }

    public function graficassociales($id_cliente)
    {
        $data = AnalisisRiesgoSocial::where('cliente_id', $id_cliente)->get();
        $cliente = Cliente::where('id', $id_cliente)->first();

        return view('analisisriesgos.graficas-sociales-cliente', compact('data', 'id_cliente', 'cliente'));         
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



        session()->flash('success', 'El registro de riesgo tecnologico se creo correctamente');
        return redirect()->route('analisis.analisistecnologicoscli',$request->cliente);        
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



        session()->flash('success', 'El registro de riesgo natural se creo correctamente');
        return redirect()->route('analisis.analisisnaturalescli',$request->cliente);         
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

}