<?php


namespace App\Services;


use App\Models\Licitacion\LicitacionFolio;
use App\Models\Unidad\UnidadFolio;
use App\Models\Proyecto\ProyectoFolio;
use App\Models\Requisicion\RequisicionFolio;

class Folio
{
    public function __construct()
    {

    }

    public function getFolioUnidad(){

        $folio = UnidadFolio::with('folio')->max('folio');
        $folio = $folio ? ++$folio : 1;
        $folioModel = new UnidadFolio();
        $folioModel->folio = $folio;
        $folioModel->anio = date('Y');
        $folioModel->save();

        return "E".str_pad($folio,5,"0", STR_PAD_LEFT);

    }

    public function getFolioLicitacion(){

        $folio = LicitacionFolio::with('folio')->max('folio');
        $folio = $folio ? ++$folio : 1;
        $folioModel = new LicitacionFolio();
        $folioModel->folio = $folio;
        $folioModel->anio = date('Y');
        $folioModel->save();

        return "L".str_pad($folio,5,"0", STR_PAD_LEFT);

    }

    public function getFolioProyecto(){

        $folio = ProyectoFolio::with('folio')->max('folio');
        $folio = $folio ? ++$folio : 1;
        $folioModel = new ProyectoFolio();
        $folioModel->folio = $folio;
        $folioModel->anio = date('Y');
        $folioModel->save();

        return "C".str_pad($folio,5,"0", STR_PAD_LEFT);

    }

    public function getFolioRequisicion(){

        $folio = RequisicionFolio::with('folio')->max('folio');
        $folio = $folio ? ++$folio : 1;
        $folioModel = new RequisicionFolio();
        $folioModel->folio = $folio;
        $folioModel->anio = date('Y');
        $folioModel->save();

        return "R".str_pad($folio,5,"0", STR_PAD_LEFT);

    }


}
