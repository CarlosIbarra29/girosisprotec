<?php

namespace App\Http\Controllers\Hd;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Config;
use App\Services\Money;
use App\Models\Hd\NivelControl;

use App\Models\User;
use App\Models\Rol;
use App\Models\RolPermiso;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class NivelControlController extends Controller
{
    protected $money_format;
    public function __construct( Money $money_format)
    {
        $this->middleware('auth');
        $this->money_format = $money_format;
    }


    public function catalogonivelcontrol()
    {
        $nivel_control = NivelControl::where('status_delete', 1)->get();

        return view('hd.nivelcontrol.catalogo-nivel-control', compact('nivel_control'));
    }

    public function nivelcontroldatatable(Request $request)
    {
        $draw = $request->get('draw');
        $start = $request->get("start");
        $rowperpage = $request->get("length"); // Rows display per page

        $columnIndex_arr = $request->get('order');
        $columnName_arr = $request->get('columns');
        $search_arr = $request->get('search');
        $searchValue = $search_arr['value']; // Search value

        // Total records
        $totalRecords = NivelControl::select('count(*) as allcount')->count();
        $totalRecordswithFilter = NivelControl::select('count(*) as allcount')->where('id', 'like', '%' .$searchValue . '%')->count();
        // Fetch records
        $records = NivelControl::select('hd_nivel_control.id', 'hd_nivel_control.nivel_control', 'hd_nivel_control.status_delete', 'hd_nivel_control.exposicion', 'hd_nivel_control.detalle', 'hd_nivel_control.nc_calculo')
            ->where('hd_nivel_control.status_delete', 1)
            ->skip($start)
            ->take($rowperpage);

        $valor = "No";
        // Bandera para varlidar si no hay filtros   $valor = "No";
        foreach ($columnName_arr as $indice => $columna){
            if($columna['data']=='nivel_control'){
                if (!empty($columna['search']['value'])){
                    $valor = trim($columna['search']['value']);
                    $records = $records->where("hd_nivel_control.nivel_control", '=' , $valor);
                }
            }
        }

        if($valor == "No"){
            $records= $records->get();
        }else{
            $records = $records->get();
            $totalRecords = count($records);
            $totalRecordswithFilter = count($records);
        }

        $data_arr = array();
        $pro="";
        foreach($records as $record){

            $data_arr[] = array(
                "id" => $record->id,
                "nivelcontrol" => $record->nivel_control,
                "exposicion" => $record->exposicion,
                "detalle" => $record->detalle,
                "nc_calculo" => $record->nc_calculo,
                'acciones'=>null,
            );
        }

        $response = array(
           "draw" => intval($draw),
           "iTotalRecords" => $totalRecords,
           "iTotalDisplayRecords" => $totalRecordswithFilter,
           "aaData" => $data_arr
        );

        return response()->json($response);
    }

    public function guardarNivelcontrol(Request $request)
    {
        $data = [
            'nivel_control' => $request->nivelcontrol,
            'exposicion' => $request->exposicion,
            'detalle' => $request->detalle,
            'nc_calculo' => $request->nc_calculo,
            'status_delete' => 1,
            'created_at' =>date('Y-m-d H:i:s'),
            'updated_at' =>date('Y-m-d H:i:s'),
            'iduserCreated' =>auth()->user()->id,
            'iduserUpdated' =>auth()->user()->id,
        ];
        $id_cliente = NivelControl::insertGetId($data);

        session()->flash('success', 'El nivel de control se añadió correctamente');
        return redirect()->route('hd.catalogonivelcontrol');  
    }

    public function editarNicelcontrol(Request $request)
    {
        $data = [
            'nivel_control' => $request->nivelcontrol,
            'exposicion' => $request->exposicion,
            'detalle' => $request->detalle,
            'nc_calculo' => $request->nc_calculo,
            'status_delete' => 1,
            'updated_at' =>date('Y-m-d H:i:s'),
            'iduserUpdated' =>auth()->user()->id,
        ];
        NivelControl::where('id', $request->id)->update($data);


        session()->flash('success', 'El nivel de control se modifico correctamente');
        return redirect()->route('hd.catalogonivelcontrol'); 
    }

    public function eliminarNivelcontrol(Request $request)
    {
        $data = [
            'status_delete' => 2,
            'iduserUpdated' => auth()->user()->id,
            'updated_at' => date('Y-m-d H:i:s')
        ];

        NivelControl::where('id', $request->id)->update($data);

        session()->flash('success', 'El registro se desactivo correctamente');
        return redirect()->route('hd.catalogonivelcontrol');  
    }

    public function catalogonivelcontrolinactivos()
    {
        $nivel_control = NivelControl::where('status_delete', 2)->get();

        return view('hd.nivelcontrol.catalogo-nivel-control-inactivos', compact('nivel_control'));    	
    }

    public function activarnivelcontrol(Request $request)
    {
        $data = [
            'status_delete' => 1,
            'iduserUpdated' => auth()->user()->id,
            'updated_at' => date('Y-m-d H:i:s')
        ];

        NivelControl::where('id', $request->id)->update($data);

        session()->flash('success', 'El registro se activo correctamente');
        return redirect()->route('hd.nivelcontrolinactivos');     	
    }

}