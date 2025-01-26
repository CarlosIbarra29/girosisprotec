<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Rol;
use App\Models\RolPermiso;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
// use App\Models\Notificaciones\Notificaciones;
// use App\Models\Notificaciones\NotificacionesUsuario;
use App\Models\Requisicion\AreaPersonal;
use App\Models\TipoUsuario;

class UsuarioController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }

    public function errorpermiso()
    {
        return view('usuarios.error-permiso'); 
    }

    public function catalogousuarios()
    {
		$usuario = User::where('id_status_delete', 1)->get();

		$rol = Role::where('status_delete', 0)->get();
        $user = User::where('id', auth()->user()->id)->first();

    	return view('usuarios.catalogo-usuarios', compact('usuario', 'rol'));
    }

    public function usuariosdatatable(Request $request)
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
        $totalRecords = User::select('count(*) as allcount')->count();
        $totalRecordswithFilter = User::select('count(*) as allcount')->where('id', 'like', '%' .$searchValue . '%')->count();

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

        $records = User::select('users.id', 'users.name', 'users.email', 'users.id_status_delete', 

            'rol.name as name_role', 'users.role', 'users.rfc', 'users.telefono', 'users.ubicacion')
            ->leftjoin("roles as rol","rol.id","users.role")
            ->where('users.id_status_delete', 1)
            ->orderBy($order_column_name, $order_column_dir)
            ->skip($start)
            ->take($rowperpage)
            ->get();

        $valor = "No";   
        // Bandera para varlidar si no hay filtros   $valor = "No";
        foreach ($columnName_arr as $indice => $columna){
            if($columna['data']=='name'){
                if (!empty($columna['search']['value'])){
                    $valor = trim($columna['search']['value']);

                    $records = User::select('users.id', 'users.name', 'users.email', 'users.id_status_delete', 
                    'rol.name as name_role', 'users.role', 'users.rfc', 'users.telefono', 'users.ubicacion')
                    ->leftjoin("roles as rol","rol.id","users.role")
                    ->where('users.id_status_delete', 1)
                    ->where("users.name", '=' , $valor)
                    ->orderBy($order_column_name, $order_column_dir)
                    ->skip($start)
                    ->take($rowperpage)
                    ->get();
                }
            }
            if($columna['data']=='email'){
                if (!empty($columna['search']['value'])){
                    $valor = trim($columna['search']['value']);

                    $records = User::select('users.id', 'users.name', 'users.email', 'users.id_status_delete', 
                    'rol.name as name_role', 'users.role', 'users.rfc', 'users.telefono', 'users.ubicacion')
                    ->leftjoin("roles as rol","rol.id","users.role")
                    ->where('users.id_status_delete', 1)
                    ->where("users.email", '=' , $valor)
                    ->orderBy($order_column_name, $order_column_dir)
                    ->skip($start)
                    ->take($rowperpage)
                    ->get();
                }
            }
            if($columna['data']=='rfc'){
                if (!empty($columna['search']['value'])){
                    $valor = trim($columna['search']['value']);

                    $records = User::select('users.id', 'users.name', 'users.email', 'users.id_status_delete', 
                    'rol.name as name_role', 'users.role', 'users.rfc', 'users.telefono', 'users.ubicacion')
                    ->leftjoin("roles as rol","rol.id","users.role")
                    ->where('users.id_status_delete', 1)
                    ->where("users.rfc", '=' , $valor)
                    ->orderBy($order_column_name, $order_column_dir)
                    ->skip($start)
                    ->take($rowperpage)
                    ->get();
                }
            }
            if($columna['data']=='role'){
                if (!empty($columna['search']['value'])){
                    $valor = trim($columna['search']['value']);

                    $records = User::select('users.id', 'users.name', 'users.email', 'users.id_status_delete', 
                    'rol.name as name_role', 'users.role', 'users.rfc', 'users.telefono', 'users.ubicacion')
                    ->leftjoin("roles as rol","rol.id","users.role")
                    ->where('users.id_status_delete', 1)
                    ->where("users.role", '=' , $valor)
                    ->orderBy($order_column_name, $order_column_dir)
                    ->skip($start)
                    ->take($rowperpage)
                    ->get();
                }
            }
        }

        if($valor == "No"){
            $records = User::select('users.id', 'users.name', 'users.email', 'users.id_status_delete', 
            'rol.name as name_role', 'users.role', 'users.rfc', 'users.telefono', 'users.ubicacion')
            ->leftjoin("roles as rol","rol.id","users.role")
            ->where('users.id_status_delete', 1)
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
                "name" => strtoupper($record->name),
                "rfc" => strtoupper($record->rfc),
                "telefono" => $record->telefono,
                "email" => strtoupper($record->email),
                "role" => $record->name_role,
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


    public function agregarusuario()
    {
        $rol = Role::orderBy('id', 'asc')->get();
        $areas = AreaPersonal::where('id_status_delete', 1)->get();

        $tipos_usuario = TipoUsuario::all();

        return view('usuarios.agregar-usuario', compact('rol', 'areas', 'tipos_usuario'));
    }

    public function guardarusuario(Request $request)
    {

        $data = [
            'name' => $request->name_user,
            'area_personal_id' => $request->area_personal,
            'email' => $request->email_user,
            'role' => $request->rol_user,
            'password' => Hash::make($request->password),
            'rfc' => $request->rfc,
            'telefono' => $request->telefono,
            'ubicacion' => $request->ubicacion,
            'id_status_delete' =>1,
            'estatus_asignacion' => 1,
            'tipo_usuario_id'=>4,
            'created_at' =>date('Y-m-d H:i:s'),
            'updated_at' =>date('Y-m-d H:i:s')
        ];

        User::insert($data);

        session()->flash('success', 'El usuario se creo correctamente');
        if (in_array("5", Session::get('permisos'))){
    	   return redirect()->route('user.catalogousuarios');
        }else{
            return redirect()->route('tablero.show');
        }
    }

    public function editarusuario($usuario)
    {
		$rol = Role::orderBy('id', 'asc')->get();
		$userinfo = User::where('id', $usuario)->get();
        $areas = AreaPersonal::where('id_status_delete', 1)->get();
        $tipos_usuario = TipoUsuario::all();

    	return view('usuarios.editar-usuario', compact('rol', 'usuario', 'userinfo', 'areas', 'tipos_usuario'));   	
    }

    public function modificarusuario(Request $request)
    {
        if (in_array("112", Session::get('permisos'))){
            // $this->notificacionusuario($request->id, 2, 1, 112);
        }
        $data = [
            'name' => $request->name_user,
            'email' => $request->email_user,
            'role' => $request->rol_user,
            'rfc' => $request->rfc,
            'telefono' => $request->telefono,
            'ubicacion' => $request->ubicacion,
            'area_personal_id' => $request->area_personal,
            'id_status_delete' => 1,
            'tipo_usuario_id'=>4,
            'created_at' =>date('Y-m-d H:i:s'),
            'updated_at' =>date('Y-m-d H:i:s')
        ];

        if($request->password != null){
        	$data['password'] = Hash::make($request->password);
        }

        User::where('id', $request->id)->update($data);

        session()->flash('success', 'El usuario se modifico correctamente');
    	if (in_array("7", Session::get('permisos'))){
            return redirect()->route('user.catalogousuarios');
        }else{
            return redirect()->route('tablero.show');
        }
    }

    // public function notificacionusuario($usuario_modificado, $tipo, $modulo, $permiso)
    // {
    //     $user_modificado = User::where('id', $usuario_modificado)->first();
    //     $role_modificado = Role::where('id', $user_modificado->role)->first();
    //     $data = [
    //         'nombre_ant' => $user_modificado->name,
    //         'email_ant' => $user_modificado->email,
    //         'rfc_ant' => $user_modificado->rfc,
    //         'telefono' => $user_modificado->telefono,
    //         'ubicacion_ant' => $user_modificado->ubicacion,
    //         'rol_ant' => $role_modificado->name,
    //     ];

    //     $not = NotificacionesUsuario::insertGetId($data);


    //     if($tipo == 1){
    //         $notificacion ="El usuario ".$user_modificado->name." fue creado";
    //     }
    //     if($tipo == 2){
    //         $notificacion ="El usuario ".$user_modificado->name." se modifico";    
    //     }

    //     $permiso = RolPermiso::where('permission_id', $permiso)->get();
    //     foreach ($permiso as $key => $value) {
    //        $users = User::where('role', $value->role_id)->get();
    //         foreach ($users as $user => $us) {
    //            $data = [
    //             'notificacion' => $notificacion,
    //             'fecha_notificacion' =>date('Y-m-d H:i:s'),
    //             'users_modifico' => $user_modificado->id,
    //             'modulo_id' => $modulo,
    //             'notificaciones_tipo_id' => $tipo,
    //             'notificacion_estatus' => 2,
    //             'users_permiso' => $us->id,
    //             'created_at' =>date('Y-m-d H:i:s'),
    //             'notificaciones_usuario_id'=> $not
    //             ];
    //            $id_not =  Notificaciones::insert($data);
    //         }
    //     } 
    // }


    public function desacticarusuario(Request $request)
    {
        $data = [
            'id_status_delete' => 2,
            'motivo_desactivar' => $request->motivo,
            'updated_at' =>date('Y-m-d H:i:s')
        ];  

    	User::where('id', $request->id)->update($data);

        session()->flash('success', 'La usuario se desactivo correctamente');
    	return redirect()->route('user.catalogousuarios');
    }

    public function catalogousuariosinactivos()
    {
		$usuario = User::select('users.id', 'users.name', 'users.email', 'users.id_status_delete', 
            'rol.name as name_role', 'users.role', 'users.motivo_desactivar', 'users.rfc', 'users.telefono')
            ->leftjoin("roles as rol","rol.id","users.role")
            ->where('users.id_status_delete', 2)
            ->get();

    	return view('usuarios.catalogo-usuarios-inactivos', compact('usuario')); 	
    }

    public function activarusuario(Request $request)
    {
        $data = [
            'id_status_delete' => 1,
            'updated_at' =>date('Y-m-d H:i:s')
        ];  

    	User::where('id', $request->id)->update($data);

        session()->flash('success', 'La usuario se activo correctamente');
    	return redirect()->route('user.usuariosinactivos'); 	
    }

    public function verUsuario($usuario)
    {
        $rol = Role::orderBy('id', 'asc')->get();
        $userinfo = User::where('id', $usuario)->get();

        return view('usuarios.ver-usuario', compact('rol', 'usuario', 'userinfo'));   
    }

// C R U D    R O L E S

    public function catalogoroles()
    {
		$rol = Role::orderBy('id','DESC')->get();
        $permission = Permission::get();

    	return view('usuarios.catalogo-roles', compact('rol', 'permission'));
    }

    public function rolesdatatable(Request $request)
    {
        $draw = $request->get('draw');
        $start = $request->get("start");
        $rowperpage = $request->get("length"); // Rows display per page

        $columnIndex_arr = $request->get('order');
        $columnName_arr = $request->get('columns');
        $search_arr = $request->get('search');
        $searchValue = $search_arr['value']; // Search value

        // Total records
        $totalRecords = Role::select('count(*) as allcount')->count();
        $totalRecordswithFilter = Role::select('count(*) as allcount')->where('id', 'like', '%' .$searchValue . '%')->count();
        // Fetch records
        $records = Role::select('roles.id', 'roles.name', 'roles.status_delete')
            ->where('roles.status_delete', 0)
            ->skip($start)
            ->take($rowperpage);

        $valor = "No";   
        // Bandera para varlidar si no hay filtros   $valor = "No";
        foreach ($columnName_arr as $indice => $columna){
            if($columna['data']=='nombre'){
                if (!empty($columna['search']['value'])){
                    $valor = trim($columna['search']['value']);
                    $records = $records->where("roles.name", '=' , $valor);
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
                "nombre" => $record->name,
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

    public function agregarrol()
    {
        // Permisos Generales
            $rol = Permission::where('modulo_permiso', 1)->get();
            $usuarios = Permission::where('modulo_permiso', 2)->get();
        // Permisos Unidades
            $unidades = Permission::where('modulo_permiso', 3)->get();
            $marcas = Permission::where('modulo_permiso', 4)->get();
            $modelos = Permission::where('modulo_permiso', 5)->get();
            $ubicaciones = Permission::where('modulo_permiso', 6)->get();
            $estatus = Permission::where('modulo_permiso', 7)->get();
            $aseguradoras = Permission::where('modulo_permiso', 8)->get();
            $tipovehiculo = Permission::where('modulo_permiso', 12)->get();
            $agencia = Permission::where('modulo_permiso', 13)->get();
            $tipo_documento = Permission::where('modulo_permiso', 14)->get();
            $tipo_asignacion = Permission::where('modulo_permiso', 15)->get();
            $mantenimientos = Permission::where('modulo_permiso', 33)->get();
        //Permisos Clientes
            $cliente = Permission::where('modulo_permiso', 9)->get();
            $estado = Permission::where('modulo_permiso', 10)->get();
            $municipio = Permission::where('modulo_permiso', 11)->get();
        //Permisos Administracion de segmentos
            $admin_segmento = Permission::where('modulo_permiso', 16)->get();
            $as_tipovehiculo = Permission::where('modulo_permiso', 17)->get();
            $as_puertas = Permission::where('modulo_permiso', 18)->get();
            $as_carroceria = Permission::where('modulo_permiso', 19)->get();
            $as_numcilindros = Permission::where('modulo_permiso', 20)->get();
            $as_pasajeros = Permission::where('modulo_permiso', 21)->get();
            $as_motor = Permission::where('modulo_permiso', 22)->get();
            $as_llantarefaccion = Permission::where('modulo_permiso', 23)->get();
            $as_espejoslaterales = Permission::where('modulo_permiso', 24)->get();
            $as_accesorios = Permission::where('modulo_permiso', 25)->get();
            $as_postencia = Permission::where('modulo_permiso', 26)->get();
            $as_transmision = Permission::where('modulo_permiso', 27)->get();
        // PERmisos de Tablero
            $tablero = Permission::where('modulo_permiso', 28)->get();
        // PErmisos de Concursos
            $concursos = Permission::where('modulo_permiso', 29)->get();
            $cli_unidades = Permission::where('modulo_permiso', 31)->get();
            $requisiciones = Permission::where('modulo_permiso', 30)->get();
            $gestor_doc = Permission::where('modulo_permiso', 32)->get();
        //Permisos Contratos
            $admin_contratos = Permission::where('modulo_permiso', 34)->get();
        //Permisos Finanzas
            $admin_finanzas = Permission::where('modulo_permiso', 35)->get();
            $orden_compra = Permission::where('modulo_permiso', 36)->get();

        return view('usuarios.agregar-rol', compact( 'rol', 'usuarios', 'unidades', 'marcas', 'modelos', 'ubicaciones', 'estatus','aseguradoras', 'cliente', 'estado', 'municipio', 'tipovehiculo','agencia', 'tipo_documento', 'tipo_asignacion', 'admin_segmento','as_tipovehiculo','as_puertas','as_carroceria','as_numcilindros','as_pasajeros','as_motor','as_llantarefaccion','as_espejoslaterales','as_accesorios','as_postencia','as_transmision','tablero','concursos','cli_unidades','requisiciones','gestor_doc','mantenimientos','admin_contratos','admin_finanzas','orden_compra'));        
    }

    public function guardarrol(Request $request)
    {
        $this->validate($request, [
            'name_rol' => 'required|unique:roles,name'
        ]);

        $role = Role::create(['name' => $request->input('name_rol')]);

        $role->syncPermissions($request->input('permission'));  

        session()->flash('success', 'El Rol se creo correctamente');
    	return redirect()->route('rol.catalogoroles');
    }


    public function modificarrol($rol)
    {

        $permisos_rol = RolPermiso::where('role_id',$rol)->get();
        $rol_info = Role::where('id', $rol)->get();
        // Permisos Generales
            $rol = Permission::where('modulo_permiso', 1)->get();
            $usuarios = Permission::where('modulo_permiso', 2)->get();
        // Permisos Unidades
            $unidades = Permission::where('modulo_permiso', 3)->get();
            $marcas = Permission::where('modulo_permiso', 4)->get();
            $modelos = Permission::where('modulo_permiso', 5)->get();
            $ubicaciones = Permission::where('modulo_permiso', 6)->get();
            $estatus = Permission::where('modulo_permiso', 7)->get();
            $aseguradoras = Permission::where('modulo_permiso', 8)->get();
            $tipovehiculo = Permission::where('modulo_permiso', 12)->get();
            $agencia = Permission::where('modulo_permiso', 13)->get();
            $tipo_documento = Permission::where('modulo_permiso', 14)->get();
            $tipo_asignacion = Permission::where('modulo_permiso', 15)->get();
            $mantenimientos = Permission::where('modulo_permiso', 33)->get();
        //Permisos Clientes
            $cliente = Permission::where('modulo_permiso', 9)->get();
            $estado = Permission::where('modulo_permiso', 10)->get();
            $municipio = Permission::where('modulo_permiso', 11)->get();

        //Permisos Administracion de segmentos
            $admin_segmento = Permission::where('modulo_permiso', 16)->get();
            $as_tipovehiculo = Permission::where('modulo_permiso', 17)->get();
            $as_puertas = Permission::where('modulo_permiso', 18)->get();
            $as_carroceria = Permission::where('modulo_permiso', 19)->get();
            $as_numcilindros = Permission::where('modulo_permiso', 20)->get();
            $as_pasajeros = Permission::where('modulo_permiso', 21)->get();
            $as_motor = Permission::where('modulo_permiso', 22)->get();
            $as_llantarefaccion = Permission::where('modulo_permiso', 23)->get();
            $as_espejoslaterales = Permission::where('modulo_permiso', 24)->get();
            $as_accesorios = Permission::where('modulo_permiso', 25)->get();
            $as_postencia = Permission::where('modulo_permiso', 26)->get();
            $as_transmision = Permission::where('modulo_permiso', 27)->get();
        // PERmisos de Tablero
            $tablero = Permission::where('modulo_permiso', 28)->get();
        // PErmisos de Concursos
            $concursos = Permission::where('modulo_permiso', 29)->get();
            $cli_unidades = Permission::where('modulo_permiso', 31)->get();
            $requisiciones = Permission::where('modulo_permiso', 30)->get();
            $gestor_doc = Permission::where('modulo_permiso', 32)->get();
        //Permisos Contratos
            $admin_contratos = Permission::where('modulo_permiso', 34)->get();
        //Permisos Finanzas
            $admin_finanzas = Permission::where('modulo_permiso', 35)->get();
            $orden_compra = Permission::where('modulo_permiso', 36)->get();

        return view('usuarios.modificar-rol', compact('permisos_rol', 'rol_info', 'rol', 'usuarios', 'unidades', 'marcas', 'modelos', 'ubicaciones', 'estatus','aseguradoras', 'cliente', 'estado', 'municipio', 'tipovehiculo', 'agencia', 'tipo_documento', 'tipo_asignacion', 'tablero','admin_segmento','as_tipovehiculo','as_puertas','as_carroceria','as_numcilindros','as_pasajeros','as_motor','as_llantarefaccion','as_espejoslaterales','as_accesorios','as_postencia','as_transmision','concursos','requisiciones','cli_unidades','gestor_doc','mantenimientos','admin_contratos','admin_finanzas', 'orden_compra'));   
    }

    public function editarrol(Request $request)
    {

        $data = [
            'name' => $request->name_rol,
            'color_menu' => $request->color_menu,
            'updated_at' =>date('Y-m-d H:i:s')
        ];  

        Role::where('id', $request->id)->update($data);
        RolPermiso::where('role_id', $request->id)->delete();

        foreach ($request->permission as $key => $value) {
            $data = [
                'permission_id' => $value,
                'role_id' => $request->id,
            ];
            RolPermiso::insert($data);
        }

        $user = User::where('id', auth()->user()->id)->first();

        if($user->role == $request->id){
            $request->session()->put('menu_color', $request->color_menu); // Variable para el color del menu

            $request->session()->forget('permisos');

            $permisos = RolPermiso::where('role_id', $request->id)->get();
            $permiso_array = array();
            foreach ($permisos as $key => $value) {
                $permiso_array[] = $value->permission_id;
            }
            
            $request->session()->put('permisos', $permiso_array); // Variable para los permisos

        }

        session()->flash('success', 'El Rol se modifico correctamente');
    	return redirect()->route('rol.catalogoroles');
    }

    public function desacticarrol(Request $request)
    {
        $data = [
            'status_delete' => 1,
        ];  
    	Role::where('id', $request->id)->update($data);

        session()->flash('success', 'El Rol se desactivo correctamente');
    	return redirect()->route('rol.catalogoroles');
    }

    public function catalogorolesinactivos()
    {
		$rol = Role::where('status_delete', 1)->get();

    	return view('usuarios.catalogo-roles-inactivos', compact('rol')); 	
    }

    public function activarrol(Request $request)
    {
        $data = [
            'status_delete' => 0
        ];  
    	Role::where('id', $request->id)->update($data);

        session()->flash('success', 'El Rol se activo correctamente');
    	return redirect()->route('rol.rolesinactivos');   	
    }

}