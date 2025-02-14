<?php

namespace App\Http\Controllers\LibroRiesgos;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Config;
use App\Services\Money;

use App\Models\LibroRiesgos\TipoRiesgo;
use App\Models\LibroRiesgos\BarrerasPerimetrales;
use App\Models\LibroRiesgos\RiesgosSociales;

use App\Models\LibroRiesgos\ConceptosTecnologicos;
use App\Models\LibroRiesgos\RiesgosTecnologicos;

use App\Models\LibroRiesgos\RiesgosNaturales;
use App\Models\LibroRiesgos\ConceptosNaturales;

use App\Models\LibroRiesgos\ConceptosOtros;
use App\Models\LibroRiesgos\RiesgosOtros;
use App\Models\LibroRiesgos\NuevoRiesgoOtros;

use App\Models\User;
use App\Models\Rol;
use App\Models\RolPermiso;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class LibroRiesgosController extends Controller
{
    protected $money_format;
    public function __construct( Money $money_format)
    {
        $this->middleware('auth');
        $this->money_format = $money_format;
    }

    public function listadolibro()
    {

    }

    public function listadolibriesgos()
    {
        $data = user::where('id', 1)->get();
        $alcances = BarrerasPerimetrales::where('status_delete', 1)->orderby('id', 'ASC')->get();

    
        return view('libroriesgos.sociales.listado-riesgos', compact('data', 'alcances'));
    }

    public function riesgosocialid($alcance)
    {
        $riesgos = RiesgosSociales::where('social_alcance_id', $alcance)->where('status_delete', 1)->get();
        $alcance_id = BarrerasPerimetrales::where('id', $alcance)->first();
        
        return view('libroriesgos.sociales.alcances-riesgos', compact('alcance', 'riesgos', 'alcance_id'));
    }

    public function crearriesgosocial($id_alcance)
    {
        $data = user::where('id', 1)->get();
        $alcances = BarrerasPerimetrales::where('status_delete', 1)->orderby('id', 'ASC')->get();

    
        return view('libroriesgos.sociales.crear-riesgo-social', compact('data', 'alcances', 'id_alcance'));        
    }

    public function guardarriesgosocial(Request $request)
    {

        $data = [
            'social_alcance_id' => $request->id_libro,
            'criterio' =>$request->criterios,
            'factores_riesgo' =>$request->factores_riesgo,
            'eventos_riesgo' =>$request->eventos_riesgo,
            'contramedidas' =>$request->contramedidas,
            'status_delete' =>1,
            'iduserCreated' =>auth()->user()->id,
            'iduserUpdated' =>auth()->user()->id,
            'created_at' =>date('Y-m-d H:i:s'),
            'updated_at' =>date('Y-m-d H:i:s')
        ];

        RiesgosSociales::insert($data);

        session()->flash('success', 'El riesgo se creo correctamente');
        return redirect()->route('libro.riesgosocialid', $request->id_libro);
    }

    public function editarriesgosocial($alcance, $id_edit)
    {
       
        $alcance_id = RiesgosSociales::where('id', $id_edit)->first();

        return view('libroriesgos.sociales.editar-riesgo-social', compact('alcance_id', 'alcance', 'id_edit'));
    }

    public function updateriesgosocial(Request $request)
    {

        $data = [
            'criterio' =>$request->criterios,
            'factores_riesgo' =>$request->factores_riesgo,
            'eventos_riesgo' =>$request->eventos_riesgo,
            'contramedidas' =>$request->contramedidas,
            'iduserUpdated' =>auth()->user()->id,
            'updated_at' =>date('Y-m-d H:i:s')
        ];

        RiesgosSociales::where('id',$request->id_alcance_edit)->update($data);

        session()->flash('success', 'El riesgo se modifico correctamente');
        return redirect()->route('libro.riesgosocialid', $request->id_libro);
    }

    public function deleteriesgosocial(Request $request)
    {

        $data = [
            'status_delete' => 2,
            'iduserUpdated' =>auth()->user()->id,
            'updated_at' =>date('Y-m-d H:i:s')
        ];  
        RiesgosSociales::where('id', $request->id)->update($data);

        session()->flash('success', 'El riesgo se desactivo correctamente');
        return redirect()->route('libro.riesgosocialid', $request->id_libro);
    }

    public function riesgosocialidinactivos($alcance)
    {
        $riesgos = RiesgosSociales::where('social_alcance_id', $alcance)->where('status_delete', 2)->get();
        $alcance_id = BarrerasPerimetrales::where('id', $alcance)->first();
        
        return view('libroriesgos.sociales.alcances-riesgos-inactivos', compact('alcance', 'riesgos', 'alcance_id'));       
    }

    public function activarriesgosocial(Request $request)
    {
        $data = [
            'status_delete' => 1,
            'iduserUpdated' =>auth()->user()->id,
            'updated_at' =>date('Y-m-d H:i:s')
        ];  
        RiesgosSociales::where('id', $request->id)->update($data);

        session()->flash('success', 'El riesgo se activo correctamente');
        return redirect()->route('libro.riesgosocialidinactivos', $request->id_libro);        
    }

    public function adnameriesgo(Request $request)
    {
        $data = [
            'alcance' => $request->nombre_riesgo,
            'status_delete' =>1,
            'iduserCreated' =>auth()->user()->id,
            'iduserUpdated' =>auth()->user()->id,
            'created_at' =>date('Y-m-d H:i:s'),
            'updated_at' =>date('Y-m-d H:i:s')
        ];

        BarrerasPerimetrales::insert($data);

        session()->flash('success', 'El riesgo se creo correctamente');
        return redirect()->route('libro.listadolibroriesgos'); 
    }

    public function editnameriesgo(Request $request)
    {
        $data = [
            'alcance' => $request->nombre_riesgo_edit,
            'iduserUpdated' =>auth()->user()->id,
            'updated_at' =>date('Y-m-d H:i:s')
        ];  
        BarrerasPerimetrales::where('id', $request->id_riesgo_edit)->update($data);

        session()->flash('success', 'El riesgo se modifico correctamente');
        return redirect()->route('libro.listadolibroriesgos');          
    }

// ---------------------------------------------------------------------------------------------- END RIESGO SOCIAL
    public function listadolibriesgostecnologicos()
    {
        $data = user::where('id', 1)->get();
        $alcances = ConceptosTecnologicos::where('status_delete', 1)->orderby('id', 'ASC')->get();

        return view('libroriesgos.tecnologicos.listado-riesgos-tecnologicos', compact('data', 'alcances'));      
    }

    public function riesgotecnologicoid($alcance)
    {
        $riesgos = RiesgosTecnologicos::where('social_alcance_id', $alcance)->where('status_delete', 1)->get();
        $alcance_id = ConceptosTecnologicos::where('id', $alcance)->first();
        
        return view('libroriesgos.tecnologicos.alcances-riesgos-tecnologicos', compact('alcance', 'riesgos', 'alcance_id'));        
    }

    public function crearriesgotec($id_alcance)
    {

        $alcances = ConceptosTecnologicos::where('status_delete', 1)->orderby('id', 'ASC')->get();

        return view('libroriesgos.tecnologicos.crear-riesgo-tecnologico', compact('alcances', 'id_alcance'));   
    }

    public function guardarriesgotecnologico(Request $request)
    {
        $data = [
            'social_alcance_id' => $request->id_libro,
            'criterio' =>$request->criterios,
            'factores_riesgo' =>$request->factores_riesgo,
            'eventos_riesgo' =>$request->eventos_riesgo,
            'contramedidas' =>$request->contramedidas,
            'status_delete' =>1,
            'iduserCreated' =>auth()->user()->id,
            'iduserUpdated' =>auth()->user()->id,
            'created_at' =>date('Y-m-d H:i:s'),
            'updated_at' =>date('Y-m-d H:i:s')
        ];

        RiesgosTecnologicos::insert($data);

        session()->flash('success', 'El riesgo se creo correctamente');
        return redirect()->route('librotec.riesgotecnologicoid', $request->id_libro);       
    }

    public function editarriesgotecnologico($alcance, $id_edit)
    {
        $alcance_id = RiesgosTecnologicos::where('id', $id_edit)->first();

        return view('libroriesgos.tecnologicos.editar-riesgo-tecnologico', compact('alcance_id', 'alcance', 'id_edit'));        
    }

    public function updateriesgotecnologico(Request $request)
    {
        $data = [
            'criterio' =>$request->criterios,
            'factores_riesgo' =>$request->factores_riesgo,
            'eventos_riesgo' =>$request->eventos_riesgo,
            'contramedidas' =>$request->contramedidas,
            'iduserUpdated' =>auth()->user()->id,
            'updated_at' =>date('Y-m-d H:i:s')
        ];

        RiesgosTecnologicos::where('id',$request->id_alcance_edit)->update($data);

        session()->flash('success', 'El riesgo se modifico correctamente');
        return redirect()->route('librotec.riesgotecnologicoid', $request->id_libro);        
    }

    public function deleteriesgotecnologico(Request $request)
    {
        $data = [
            'status_delete' => 2,
            'iduserUpdated' =>auth()->user()->id,
            'updated_at' =>date('Y-m-d H:i:s')
        ];  
        RiesgosTecnologicos::where('id', $request->id)->update($data);

        session()->flash('success', 'El riesgo se desactivo correctamente');
        return redirect()->route('librotec.riesgotecnologicoid', $request->id_libro);    
    }

    public function riesgotecnologicoidinactivos($alcance)
    {
        $riesgos = RiesgosTecnologicos::where('social_alcance_id', $alcance)->where('status_delete', 2)->get();
        $alcance_id = ConceptosTecnologicos::where('id', $alcance)->first();
        
        return view('libroriesgos.tecnologicos.alcances-riesgos-tec-inactivos', compact('alcance', 'riesgos', 'alcance_id'));
    }

    public function activarriesgotecnologico(Request $request)
    {
        $data = [
            'status_delete' => 1,
            'iduserUpdated' =>auth()->user()->id,
            'updated_at' =>date('Y-m-d H:i:s')
        ];  
        RiesgosTecnologicos::where('id', $request->id)->update($data);

        session()->flash('success', 'El riesgo se activo correctamente');
        return redirect()->route('librotec.riesgotecnologicoidinactivos', $request->id_libro);           
    }

    public function adnameriesgotec(Request $request)
    {
        $data = [
            'alcance' => $request->nombre_riesgo,
            'status_delete' =>1,
            'iduserCreated' =>auth()->user()->id,
            'iduserUpdated' =>auth()->user()->id,
            'created_at' =>date('Y-m-d H:i:s'),
            'updated_at' =>date('Y-m-d H:i:s')
        ];

        ConceptosTecnologicos::insert($data);

        session()->flash('success', 'El riesgo se creo correctamente');
        return redirect()->route('librotec.listadolibroriesgostec');         
    }

    public function editnameriesgotec(Request $request)
    {
        $data = [
            'alcance' => $request->nombre_riesgo_edit,
            'iduserUpdated' =>auth()->user()->id,
            'updated_at' =>date('Y-m-d H:i:s')
        ];  
        ConceptosTecnologicos::where('id', $request->id_riesgo_edit)->update($data);

        session()->flash('success', 'El riesgo se modifico correctamente');
        return redirect()->route('librotec.listadolibroriesgostec');            
    }

// ---------------------------------------------------------------------------------------------- END RIESGO TECNOLOGICOS
    public function listadolibriesgosnaturales()
    {
        $data = user::where('id', 1)->get();
        $alcances = ConceptosNaturales::where('status_delete', 1)->orderby('id', 'ASC')->get();
 
        return view('libroriesgos.naturales.listado-riesgos-naturales', compact('data', 'alcances'));           
    }

    public function adnameriesgonat(Request $request)
    {
        $data = [
            'alcance' => $request->nombre_riesgo,
            'status_delete' =>1,
            'iduserCreated' =>auth()->user()->id,
            'iduserUpdated' =>auth()->user()->id,
            'created_at' =>date('Y-m-d H:i:s'),
            'updated_at' =>date('Y-m-d H:i:s')
        ];

        ConceptosNaturales::insert($data);

        session()->flash('success', 'El riesgo se creo correctamente');
        return redirect()->route('libronat.listadolibroriesgosnat');         
    }

    public function editnameriesgonat(Request $request)
    {
        $data = [
            'alcance' => $request->nombre_riesgo_edit,
            'iduserUpdated' =>auth()->user()->id,
            'updated_at' =>date('Y-m-d H:i:s')
        ];  
        ConceptosNaturales::where('id', $request->id_riesgo_edit)->update($data);

        session()->flash('success', 'El riesgo se modifico correctamente');
        return redirect()->route('libronat.listadolibroriesgosnat');         
    }

    public function riesgonaturalid($alcance)
    {
        $riesgos = RiesgosNaturales::where('social_alcance_id', $alcance)->where('status_delete', 1)->get();
        $alcance_id = ConceptosNaturales::where('id', $alcance)->first();
        
        return view('libroriesgos.naturales.alcances-riesgos-naturales', compact('alcance', 'riesgos', 'alcance_id'));          
    }

    public function crearriesgonat($id_alcance)
    {
        $alcances = ConceptosNaturales::where('status_delete', 1)->orderby('id', 'ASC')->get();

        return view('libroriesgos.naturales.crear-riesgo-natural', compact('alcances', 'id_alcance'));           
    }

    public function guardarriesgonatural(Request $request)
    {
        $data = [
            'social_alcance_id' => $request->id_libro,
            'criterio' =>$request->criterios,
            'factores_riesgo' =>$request->factores_riesgo,
            'eventos_riesgo' =>$request->eventos_riesgo,
            'contramedidas' =>$request->contramedidas,
            'status_delete' =>1,
            'iduserCreated' =>auth()->user()->id,
            'iduserUpdated' =>auth()->user()->id,
            'created_at' =>date('Y-m-d H:i:s'),
            'updated_at' =>date('Y-m-d H:i:s')
        ];

        RiesgosNaturales::insert($data);

        session()->flash('success', 'El riesgo se creo correctamente');
        return redirect()->route('libronat.riesgonaturalid', $request->id_libro);          
    }

    public function editarriesgonaturales($alcance, $id_edit)
    {
        $alcance_id = RiesgosNaturales::where('id', $id_edit)->first();

        return view('libroriesgos.naturales.editar-riesgo-naturales', compact('alcance_id', 'alcance', 'id_edit'));         
    }

    public function updateriesgonatural(Request $request)
    {
        $data = [
            'criterio' =>$request->criterios,
            'factores_riesgo' =>$request->factores_riesgo,
            'eventos_riesgo' =>$request->eventos_riesgo,
            'contramedidas' =>$request->contramedidas,
            'iduserUpdated' =>auth()->user()->id,
            'updated_at' =>date('Y-m-d H:i:s')
        ];

        RiesgosNaturales::where('id',$request->id_alcance_edit)->update($data);

        session()->flash('success', 'El riesgo se modifico correctamente');
        return redirect()->route('libronat.riesgonaturalid', $request->id_libro);  
    }

    public function deleteriesgonatural(Request $request)
    {
        $data = [
            'status_delete' => 2,
            'iduserUpdated' =>auth()->user()->id,
            'updated_at' =>date('Y-m-d H:i:s')
        ];  
        RiesgosNaturales::where('id', $request->id)->update($data);

        session()->flash('success', 'El riesgo se desactivo correctamente');
        return redirect()->route('libronat.riesgonaturalid', $request->id_libro);          
    }

    public function riesgonaturalidinactivos($alcance)
    {
        $riesgos = RiesgosNaturales::where('social_alcance_id', $alcance)->where('status_delete', 2)->get();
        $alcance_id = ConceptosNaturales::where('id', $alcance)->first();
        
        return view('libroriesgos.naturales.alcances-riesgos-nat-inactivos', compact('alcance', 'riesgos', 'alcance_id'));
    }

    public function activarriesgonatural(Request $request)
    {
        $data = [
            'status_delete' => 1,
            'iduserUpdated' =>auth()->user()->id,
            'updated_at' =>date('Y-m-d H:i:s')
        ];  
        RiesgosNaturales::where('id', $request->id)->update($data);

        session()->flash('success', 'El riesgo se activo correctamente');
        return redirect()->route('libronat.riesgonaturalidinactivos', $request->id_libro); 
    }

// ---------------------------------------------------------------------------------------------- END RIESGO NATURALES

    public function listadonuevosriesgos()
    {
        
        $data = user::where('id', 1)->get();
        $nuevo = NuevoRiesgoOtros::where('status_delete', 1)->orderby('id', 'ASC')->get();
 
        return view('libroriesgos.otros.listado-nuevos-riesgos', compact('data', 'nuevo'));   
    }

    public function guardarnuevoriesgo(Request $request)
    {
        $data = [
            'nombre_riesgo' => $request->nombre_riesgo,
            'status_delete' =>1,
            'iduserCreated' =>auth()->user()->id,
            'iduserUpdated' =>auth()->user()->id,
            'created_at' =>date('Y-m-d H:i:s'),
            'updated_at' =>date('Y-m-d H:i:s')
        ];

        NuevoRiesgoOtros::insert($data);

        session()->flash('success', 'El riesgo se creo correctamente');
        return redirect()->route('librootr.listadonuevosriesgos');         
    }

    public function updatenuevoriesgo(Request $request)
    {
        $data = [
            'nombre_riesgo' => $request->nombre_riesgo_edit,
            'iduserUpdated' =>auth()->user()->id,
            'updated_at' =>date('Y-m-d H:i:s')
        ];  
        NuevoRiesgoOtros::where('id', $request->id_riesgo_edit)->update($data);

        session()->flash('success', 'El riesgo se modifico correctamente');
        return redirect()->route('librootr.listadonuevosriesgos');  
    }

    public function listadolibriesgosotros($id_riesgo)
    {
        $data = user::where('id', 1)->get();

        $alcances = ConceptosOtros::where('status_delete', 1)->where('libror_otros_riesgos_id', $id_riesgo)->get();
        // dd($alcances);
        return view('libroriesgos.otros.listado-riesgos-otros', compact('data', 'alcances', 'id_riesgo'));             
    }

    public function adnameriesgootro(Request $request)
    {
        $data = [
            'alcance' => $request->nombre_riesgo,
            'libror_otros_riesgos_id' => $request->id_riesgo,
            'status_delete' =>1,
            'iduserCreated' =>auth()->user()->id,
            'iduserUpdated' =>auth()->user()->id,
            'created_at' =>date('Y-m-d H:i:s'),
            'updated_at' =>date('Y-m-d H:i:s')
        ];

        ConceptosOtros::insert($data);

        session()->flash('success', 'El riesgo se creo correctamente');
        return redirect()->route('librootr.listadolibroriesgosotros', $request->id_riesgo);             
    }

    public function editnameriesgootro(Request $request)
    {
        $data = [
            'alcance' => $request->nombre_riesgo_edit,
            'iduserUpdated' =>auth()->user()->id,
            'updated_at' =>date('Y-m-d H:i:s')
        ];  
        ConceptosOtros::where('id', $request->id_riesgo_edit)->update($data);

        session()->flash('success', 'El riesgo se modifico correctamente');
        return redirect()->route('librootr.listadolibroriesgosotros', $request->id_riesgo);         
    }

    public function riesgootroid($alcance)
    {

        $riesgos = RiesgosOtros::where('social_alcance_id', $alcance)->where('status_delete', 1)->get();

        $alcance_id = ConceptosOtros::where('id', $alcance)->first();

        return view('libroriesgos.otros.alcances-riesgos-otros', compact('alcance', 'riesgos', 'alcance_id'));  
    }

    public function crearriesgootro($id_alcance)
    {
        $alcances = ConceptosOtros::where('status_delete', 1)->orderby('id', 'ASC')->get();

        return view('libroriesgos.otros.crear-riesgo-otro', compact('alcances', 'id_alcance'));          
    }

    public function guardarriesgootro(Request $request)
    {
        $data = [
            'social_alcance_id' => $request->id_libro,
            'criterio' =>$request->criterios,
            'factores_riesgo' =>$request->factores_riesgo,
            'eventos_riesgo' =>$request->eventos_riesgo,
            'contramedidas' =>$request->contramedidas,
            'status_delete' =>1,
            'iduserCreated' =>auth()->user()->id,
            'iduserUpdated' =>auth()->user()->id,
            'created_at' =>date('Y-m-d H:i:s'),
            'updated_at' =>date('Y-m-d H:i:s')
        ];

        RiesgosOtros::insert($data);

        session()->flash('success', 'El riesgo se creo correctamente');
        return redirect()->route('librootr.riesgootroid', $request->id_libro);         
    }

    public function editarriesgootro($alcance, $id_edit)
    {
        $alcance_id = RiesgosOtros::where('id', $id_edit)->first();

        return view('libroriesgos.otros.editar-riesgo-otros', compact('alcance_id', 'alcance', 'id_edit'));           
    }

    public function updateriesgootro(Request $request)
    {
        $data = [
            'criterio' =>$request->criterios,
            'factores_riesgo' =>$request->factores_riesgo,
            'eventos_riesgo' =>$request->eventos_riesgo,
            'contramedidas' =>$request->contramedidas,
            'iduserUpdated' =>auth()->user()->id,
            'updated_at' =>date('Y-m-d H:i:s')
        ];

        RiesgosOtros::where('id',$request->id_alcance_edit)->update($data);

        session()->flash('success', 'El riesgo se modifico correctamente');
        return redirect()->route('librootr.riesgootroid', $request->id_libro);          
    }

    public function deleteriesgootro(Request $request)
    {
        $data = [
            'status_delete' => 2,
            'iduserUpdated' =>auth()->user()->id,
            'updated_at' =>date('Y-m-d H:i:s')
        ];  
        RiesgosOtros::where('id', $request->id)->update($data);

        session()->flash('success', 'El riesgo se desactivo correctamente');
        return redirect()->route('librootr.riesgootroid', $request->id_libro);         
    }

    public function riesgootrosidinactivos($alcance)
    {
        $riesgos = RiesgosOtros::where('social_alcance_id', $alcance)->where('status_delete', 2)->get();
        $alcance_id = ConceptosOtros::where('id', $alcance)->first();
        
        return view('libroriesgos.otros.alcances-riesgos-otros-inactivos', compact('alcance', 'riesgos', 'alcance_id'));        
    }

    public function activarriesgootros(Request $request)
    {
        $data = [
            'status_delete' => 1,
            'iduserUpdated' =>auth()->user()->id,
            'updated_at' =>date('Y-m-d H:i:s')
        ];  
        RiesgosOtros::where('id', $request->id)->update($data);

        session()->flash('success', 'El riesgo se activo correctamente');
        return redirect()->route('librootr.riesgootrosidinactivos', $request->id_libro);         
    }

}