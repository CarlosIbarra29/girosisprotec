<?php

namespace App\Imports;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Carbon;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use App\Models\Unidad\UnidadEquipamiento;
use Maatwebsite\Excel\Concerns\{Importable, ToCollection, WithHeadingRow, WithValidation, SkipsFailures};

class EquipamientounidadImport implements ToCollection, WithHeadingRow
{
    use Importable, SkipsFailures;

    protected $unidad;

    public function  __construct($unidad)
    {
        $this->unidad = $unidad;
    }


    public function collection(Collection $rows)
    {

        foreach ($rows as $row){
            
            $data = [
                'equipamiento' => $row['equipamiento'],
                'unidad_id' => $this->unidad,
                'equipamiento_pendiente' => 0,
                'iduserCreated' =>auth()->user()->id,
                'iduserUpdated' =>auth()->user()->id,
                'created_at' =>date('Y-m-d H:i:s'),
                'updated_at' =>date('Y-m-d H:i:s')
            ];

            UnidadEquipamiento::insert($data);
        }

        // $dato ="Existe";
        $data_unidad = [
            'op_equipamiento' => 1,
            'iduserUpdated' => auth()->user()->id,
            'updated_at' => date('Y-m-d H:i:s')

        ];

        Unidad::where('id', $this->unidad)->update($data_unidad);

        session()->flash('success', 'La información se cargo correctamente');
        return redirect()->route('unidad.equipamientounidad',$this->unidad);
    }

}