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

use App\Models\User;
use App\Models\Rol;
use App\Models\RolPermiso;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class ClienteController extends Controller
{
    protected $money_format;
    public function __construct( Money $money_format)
    {
        $this->middleware('auth');
        $this->money_format = $money_format;
    }

    public function listadocliente()
    {
        $data = Cliente::where('status_delete', 1)->get();

        return view('cliente.listado-cliente', compact('data'));
    }

    public function clientelistadodatatable(Request $request)
    {
        $user = User::where('id', auth()->user()->id)->first();
        $permisos = RolPermiso::where('role_id', $user->role)->get();
        $permiso_array = array();
        foreach ($permisos as $key => $value) {
            $permiso_array[] = $value->permission_id;
        }

        $draw = $request->get('draw');
        $start = $request->get("start");
        $rowperpage = $request->get("length"); // Rows display per page

        $columnIndex_arr = $request->get('order');
        $columnName_arr = $request->get('columns');
        $search_arr = $request->get('search');
        $searchValue = $search_arr['value']; // Search value

        // Total records
        $totalRecords = Cliente::select('count(*) as allcount')->count();
        $totalRecordswithFilter = Cliente::select('count(*) as allcount')->where('id', 'like', '%' .$searchValue . '%')->count();

        /* Getting the first element of the array. */
        $order_arr = $columnIndex_arr[0];

        /* Getting the column index of the column that is being sorted. */
        $order_column_index = $order_arr['column'];

        /* Getting the direction of the sort. */
        $order_dir = $order_arr['dir'];

        /* Getting the column name from the array of columns. */
        $order_column_name = $columnName_arr[$order_column_index]['data'];
        $order_column_dir = $order_dir;

        $order_column_dir = $order_column_dir == 'asc' ? 'asc' : 'desc';


        // Fetch records

        $records = Cliente::select('cliente.id', 'cliente.organizacion', 'cliente.nombre_comercial', 'cliente.contacto_principal', 'cliente.telefono', 'cliente.mail')
            ->where('cliente.status_delete', 1)
            ->orderBy($order_column_name, $order_column_dir)
            ->skip($start)
            ->take($rowperpage)
            ->get();

        $valor = "No";   
        // Bandera para varlidar si no hay filtros   $valor = "No";
        foreach ($columnName_arr as $indice => $columna){
            if($columna['data']=='nombre_comercial'){
                if (!empty($columna['search']['value'])){
                    $valor = trim($columna['search']['value']);

                    $records = Cliente::select('cliente.id', 'cliente.organizacion', 'cliente.nombre_comercial', 'cliente.contacto_principal', 'cliente.telefono', 'cliente.mail')
                    ->where('cliente.status_delete', 1)
                    ->where("cliente.nombre_comercial", '=' , $valor)
                    ->orderBy($order_column_name, $order_column_dir)
                    ->skip($start)
                    ->take($rowperpage)
                    ->get();
                }
            }
        }

        if($valor == "No"){
            $records = Cliente::select('cliente.id', 'cliente.organizacion', 'cliente.nombre_comercial', 'cliente.contacto_principal', 'cliente.telefono', 'cliente.mail')
            ->where('cliente.status_delete', 1)
            ->orderBy($order_column_name, $order_column_dir)
            ->skip($start)
            ->take($rowperpage)
            ->get();
        }else{
            $totalRecords = count($records);
            $totalRecordswithFilter = count($records);          
        }

        $data_arr = array();
        $pro="";
        foreach($records as $record){

            $data_arr[] = array(
                "id" => $record->id,
                "organizacion" => $record->organizacion,
                "nombre_comercial" => $record->nombre_comercial,
                "contacto_principal" => $record->contacto_principal,
                "telefono" => $record->telefono,
                "mail" => $record->mail,
                "permisos" => $permiso_array,
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

    public function agregarcliente()
    {
        $data= 1;

        return view('cliente.agregar-cliente', compact('data'));
    }

    public function guardarcliente(Request $request)
    {
        $data = [
            'organizacion' => $request->organizacion,
            'nombre_comercial' => $request->nombre_comercial,
            'calle' => $request->calle,
            'no_exterior' => $request->no_exterior,
            'no_interior' => $request->no_interior,
            'delegacion' => $request->delegacion,
            'giro_comercial' => $request->giro_comercial,
            'sector' => $request->sector,
            'no_personal' => $request->no_personal,
            'contacto_principal' => $request->contacto_principal,
            'cargo' => $request->cargo,
            'telefono' => $request->telefono,
            'mail' => $request->mail,
            'persona_atiende' => $request->persona_atiende,
            'cargo_atiende' => $request->cargo_atiende,
            'telefono_atiende' => $request->telefono_atiende,
            'mail_atiende' => $request->mail_atiende,
            'status_delete' => 1,
            'created_at' =>date('Y-m-d H:i:s'),
            'updated_at' =>date('Y-m-d H:i:s'),
            'iduserCreated' =>auth()->user()->id,
            'iduserUpdated' =>auth()->user()->id,
        ];
        $id_cliente = Cliente::insertGetId($data);
        // dd($request);

        session()->flash('success', 'El cliente se añadió correctamente');
        return redirect()->route('cliente.listadocliente');  

    }

    public function editarcliente($cliente_id)
    {
        $data = Cliente::where('id', $cliente_id)->first();

        return view('cliente.editar-cliente', compact('data', 'cliente_id'));      
    }


    public function updatecliente(Request $request)
    {
        $data = [
            'organizacion' => $request->organizacion,
            'nombre_comercial' => $request->nombre_comercial,
            'calle' => $request->calle,
            'no_exterior' => $request->no_exterior,
            'no_interior' => $request->no_interior,
            'delegacion' => $request->delegacion,
            'giro_comercial' => $request->giro_comercial,
            'sector' => $request->sector,
            'no_personal' => $request->no_personal,
            'contacto_principal' => $request->contacto_principal,
            'cargo' => $request->cargo,
            'telefono' => $request->telefono,
            'mail' => $request->mail,
            'persona_atiende' => $request->persona_atiende,
            'cargo_atiende' => $request->cargo_atiende,
            'telefono_atiende' => $request->telefono_atiende,
            'mail_atiende' => $request->mail_atiende,
            'status_delete' => 1,
            'updated_at' =>date('Y-m-d H:i:s'),
            'iduserUpdated' =>auth()->user()->id,
        ];
        Cliente::where('id', $request->cliente_id)->update($data);
        // dd($request);


        session()->flash('success', 'El cliente se añadió correctamente');
        return redirect()->route('cliente.listadocliente'); 
    }

    public function desactivarcliente(Request $request)
    {
        $data = [
            'status_delete' => 2,
            'iduserUpdated' => auth()->user()->id,
            'updated_at' => date('Y-m-d H:i:s')
        ];

        Cliente::where('id', $request->id)->update($data);

        session()->flash('success', 'El registro se desactivo correctamente');
        return redirect()->route('cliente.listadocliente');  
    }

    public function listadoclienteinactivo()
    {
        $data = Cliente::where('status_delete', 2)->get();

        return view('cliente.listado-cliente-inactivo', compact('data'));       
    }

    public function activarcliente(Request $request)
    {
        $data = [
            'status_delete' => 1,
            'iduserUpdated' => auth()->user()->id,
            'updated_at' => date('Y-m-d H:i:s')
        ];

        Cliente::where('id', $request->id)->update($data);

        session()->flash('success', 'El registro se activo correctamente');
        return redirect()->route('cliente.listadoclienteinactivo'); 
    }

    public function vercliente($cliente_id)
    {
        $data = Cliente::where('id', $cliente_id)->first();
        
        return view('cliente.ver-cliente', compact('data', 'cliente_id'));         
    }

}