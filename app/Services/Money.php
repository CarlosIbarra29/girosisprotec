<?php

namespace App\Services;


class Money
{

    public function clearFormat($money=null): float
    {
        $prefijo = str_replace('$','',$money);
        $caracter = str_replace('_','',$prefijo);
        $coma = str_replace(',','',$caracter);
        $espacios = str_replace(' ','',$coma);
        return $espacios;
    }

    public function format($money = null){
        return number_format($money, 2, '.', ',');
    }
}