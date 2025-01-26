<?php

namespace App\Http\Controllers\Perfil;

use App\Http\Controllers\Controller;
use App\Services\Folio;
use App\Services\Money;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class PerfilController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }

    public function perfilUsuario(){
        $usuario = User::find(Auth::id());
        return view('perfil.informacion', compact('usuario'));
    }

    public function perfilActualizarInformacion(Request $request){

        $usuario = Auth::user();
        
        $id_usuario = $usuario->id;
        $user = User::find($id_usuario);

        if($request->hasFile('profile_avatar')){
            $archivo = $request->file('profile_avatar');
            $archivoNombre = $archivo->hashName();
            Storage::putFileAs('avatar/', $archivo, $archivoNombre);
            $user->avatar = $archivoNombre;
        }


        $data = [ 'name' => $request->name, 'email' => $request->email, 'telefono' => $request->telefono ];

        if($request->password1 != ''){
            $data['password'] = Hash::make($request->password1);
        }

        $user->update($data);

        Session::flash('success', 'Información actualizada correctamente');
        return redirect()->route('perfil.informacion');
        
    }
}