<?php

namespace App\Http\Controllers\Archivo;

use App\Http\Controllers\Controller;
use App\Models\Custodio\CustodioDocumento;
use App\Models\Custodio\Custodio;
use App\Models\Custodio\FotografiaVehiculoCustodio;
use App\Models\Custodio\VehiculoDocCustodio;
use App\Models\Custodio\ArmaDocCustodio;
use App\Models\Custodio\FotografiaArmaCustodio;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ArchivoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function documentoAvatar(Request $request)
    {
        $user = auth()->user();
        $existeArchivo = Storage::exists('avatar/'.$request->documento);
        if($user && $existeArchivo) {
            //we return the image to show in the view
            return Storage::download('avatar/'.$request->documento, $request->documento, ['Content-Disposition'=>'inline; filename="'.$request->documento.'"']);
        }else{
            return abort('403');
        }
    }

    public function fotografiacustodio(Request $request)
    {
        $user = auth()->user();
        $id = $request->id;
        $documento = Custodio::findOrFail($id);
        $existeArchivo = Storage::exists('custodio/'.$documento->id.'/'.$documento->fotografia_custodio);
        if($user && $documento && $existeArchivo) {
            return Storage::download('custodio/'.$documento->id.'/'.$documento->fotografia_custodio, $documento->fotografia_custodio, ['Content-Disposition'=>'inline; filename="'.$documento->fotografia_custodio.'"']);
        }else{
            return abort('403');
        }      
    }


    public function documentocustodio(Request $request) {

        $user = auth()->user();
        $id = $request->id;
        $documento = CustodioDocumento::findOrFail($id);
        $existeArchivo = Storage::exists('custodio/'.$documento->custodio_id.'/'.$documento->documento);
        if($user && $documento && $existeArchivo) {
            return Storage::download('custodio/'.$documento->custodio_id.'/'.$documento->documento, $documento->documento, ['Content-Disposition'=>'inline; filename="'.$documento->documento.'"']);
        }else{
            return abort('403');
        }
    }

    public function fotografiavehiculo(Request $request){
        $user = auth()->user();
        $id = $request->id;
        $documento = FotografiaVehiculoCustodio::findOrFail($id);
        $existeArchivo = Storage::exists('custodio/'.$documento->custodio_id.'/'.$documento->fotografia);
        if($user && $documento && $existeArchivo) {
            return Storage::download('custodio/'.$documento->custodio_id.'/'.$documento->fotografia, $documento->fotografia, ['Content-Disposition'=>'inline; filename="'.$documento->fotografia.'"']);
        }else{
            return abort('403');
        }        
    }

    public function documentovehiculo(Request $request)
    {
        $user = auth()->user();
        $id = $request->id;
        $documento = VehiculoDocCustodio::findOrFail($id);
        $existeArchivo = Storage::exists('custodio/'.$documento->custodio_id.'/'.$documento->documento);
        if($user && $documento && $existeArchivo) {
            return Storage::download('custodio/'.$documento->custodio_id.'/'.$documento->documento, $documento->documento, ['Content-Disposition'=>'inline; filename="'.$documento->documento.'"']);
        }else{
            return abort('403');
        }         
    }

    public function documentoarma(Request $request)
    {
        $user = auth()->user();
        $id = $request->id;
        $documento = ArmaDocCustodio::findOrFail($id);
        $existeArchivo = Storage::exists('custodio/'.$documento->custodio_id.'/'.$documento->documento);
        if($user && $documento && $existeArchivo) {
            return Storage::download('custodio/'.$documento->custodio_id.'/'.$documento->documento, $documento->documento, ['Content-Disposition'=>'inline; filename="'.$documento->documento.'"']);
        }else{
            return abort('403');
        }         
    }

    public function fotografiaarma(Request $request){
        $user = auth()->user();
        $id = $request->id;
        $documento = FotografiaArmaCustodio::findOrFail($id);
        $existeArchivo = Storage::exists('custodio/'.$documento->custodio_id.'/'.$documento->fotografia);
        if($user && $documento && $existeArchivo) {
            return Storage::download('custodio/'.$documento->custodio_id.'/'.$documento->fotografia, $documento->fotografia, ['Content-Disposition'=>'inline; filename="'.$documento->fotografia.'"']);
        }else{
            return abort('403');
        }        
    }

}
