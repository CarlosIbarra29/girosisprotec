<?php

namespace App\Http\Controllers\Licitacion;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Config;
use App\Models\Licitacion\AreaPersonal;

class AreaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function listadoarea()
    {
        $data = AreaPersonal::where('id_status_delete', 1)->get();

        return view('catalogos.areapersonal.catalogo-area-personal', compact('data'));
    }

    public function areadatatable(Request $request)
    {
        $draw = $request->get('draw');
        $start = $request->get("start");
        $rowperpage = $request->get("length"); // Rows display per page

        $columnIndex_arr = $request->get('order');
        $columnName_arr = $request->get('columns');
        $search_arr = $request->get('search');
        $searchValue = $search_arr['value']; // Search value

        // Total records
        $totalRecords = AreaPersonal::select('count(*) as allcount')->where('id_status_delete', 1)->count();
        $totalRecordswithFilter = AreaPersonal::select('count(*) as allcount')->where('id_status_delete', 1)->where('id', 'like', '%' . $searchValue . '%')->count();
        // Fetch records
        $records = AreaPersonal::select('*')
            ->where('id_status_delete', 1)
            ->skip($start)
            ->take($rowperpage);

        $valor = "No";
        // Bandera para varlidar si no hay filtros   $valor = "No";
        foreach ($columnName_arr as $indice => $columna) {
            if ($columna['data'] == 'nombre_area') {
                if (!empty($columna['search']['value'])) {
                    $valor = trim($columna['search']['value']);
                    $records = $records->where("nombre_area", 'like', '%' . $valor . '%');
                }
            }
        }

        if ($valor == "No") {
            $records = $records->get();
        } else {
            $records = $records->get();
            $totalRecords = count($records);
            $totalRecordswithFilter = count($records);
        }

        $data_arr = array();
        $pro = "";
        foreach ($records as $record) {

            $data_arr[] = array(
                "id" => $record->id,
                "nombre_area" => $record->nombre_area,
                'acciones' => null,
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

    public function guardararea(Request $request)
    {

        if (empty($request->tipo_documento)) {
            session()->flash('error', 'El registro no puede estar vacio');
            return redirect()->route('area.listadoarea');
        }

        $data = [
            'nombre_area' => $request->tipo_documento,
            'id_status_delete' => 1,
            'iduserCreated' => auth()->user()->id,
            'iduserUpdated' => auth()->user()->id,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ];

        AreaPersonal::insert($data);

        session()->flash('success', 'El registro se creo correctamente');
        return redirect()->route('area.listadoarea');
    }

    public function editararea(Request $request)
    {

        $data = [
            'nombre_area' => $request->tipo_documento,
            'iduserUpdated' => auth()->user()->id,
            'updated_at' => date('Y-m-d H:i:s')
        ];

        AreaPersonal::where('id', $request->id_tipo_documento)->update($data);

        session()->flash('success', 'El registro modifico correctamente');
        return redirect()->route('area.listadoarea');
    }

    public function desactivararea(Request $request)
    {
        $data = [
            'id_status_delete' => 2,
            'iduserUpdated' => auth()->user()->id,
            'updated_at' => date('Y-m-d H:i:s')
        ];

        AreaPersonal::where('id', $request->id)->update($data);

        session()->flash('success', 'El registro se desactivo correctamente');
        return redirect()->route('area.listadoarea');
    }

    public function catalogoareainactivas()
    {
        $data = AreaPersonal::where('id_status_delete', 2)->get();

        return view('catalogos.areapersonal..catalogo-area-personal-inactivos', compact('data'));
    }

    public function activararea(Request $request)
    {
        $data = [
            'id_status_delete' => 1,
            'iduserUpdated' => auth()->user()->id,
            'updated_at' => date('Y-m-d H:i:s')
        ];

        AreaPersonal::where('id', $request->id)->update($data);

        session()->flash('success', 'El registro se activo correctamente');
        return redirect()->route('area.catalogoareainactivas');
    }
}
