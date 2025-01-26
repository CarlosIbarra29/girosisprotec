<?php

namespace App\Imports;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Carbon;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use App\Models\Licitacion\LicitacionPropuestaCargaPreliminar;
use Maatwebsite\Excel\Concerns\{Importable, ToCollection, WithHeadingRow, WithValidation, SkipsFailures};

class PropuestaeconomicaImport implements ToCollection, WithHeadingRow
{
    use Importable, SkipsFailures;

    protected $licitacion;

    public function  __construct($licitacion)
    {
        $this->licitacion = $licitacion;
    }


    public function collection(Collection $rows)
    {

        foreach ($rows as $row){
            
            $data = [
                'num' => $row['num'],
                'nombre_requerimiento' => utf8_decode($row['nombre_del_requerimiento']),
                'descripcion' => utf8_decode($row['descripcion']),
                'obligatorio' => $row['obligatorio'],
                'respuesta' => $row['respuesta'],
                'acciones' => $row['acciones'],
                'licitaciones_id' => $this->licitacion
            ];

             LicitacionPropuestaCargaPreliminar::insert($data);

        }

        session()->flash('success', 'La información se cargo correctamente');
        return redirect()->route('propuestatecnica.propuestatecnicadoc',$this->licitacion);
    }

}