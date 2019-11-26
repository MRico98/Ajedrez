<?php

include("../../modeloforo/modeloinicio/ModeloInicio.php");

class ControladorInicio
{
    private $modelo;

    /**
     * ControladorInicio constructor.
     */
    public function __construct()
    {
        $this->modelo = new ModeloInicio();
    }

    public function informacionForos($inicio,$fin){
        return $this->modelo->getPaginacionElements($inicio,$fin);
    }

    public function numeroDeForos(){
        return $this->modelo->numForos();
    }

}