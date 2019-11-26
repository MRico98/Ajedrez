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

    public function numForos($id){
        return $this->modelo->getNumberForos($id);
    }

    public function infoForos($id){
        return $this->modelo->getInfoForos($id);
    }

    public function inforForosPaginacion($id,$inicio,$fin){
        return $this->modelo->getPaginacionElements($id,$inicio,$fin);
    }

}