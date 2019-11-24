<?php

include("../../modeloforo/modeloperfil/ModeloPerfil.php");

class ControladorPerfil
{
    private $modelo;

    public function __construct()
    {
        $this->modelo = new ModeloPerfil();
    }

    public function getInformacion($id){
        return $this->modelo->getAll($id);
    }

}