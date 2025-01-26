<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Documento extends Component
{
    public $documento;
    public $urlGestorDocumentos;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($documento, $urlGestorDocumentos)
    {
        $this->documento = $documento;
        $this->urlGestorDocumentos = $urlGestorDocumentos;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        return view('components.documento');
    }
}
