<?php

include("../../modeloforo/modeloedicionusuario/ModeloEdicionUsuarioInfo.php");

class ControladorEdicionUsuarioInfo
{
    private $modelo;

    public function __construct()
    {
        $this->modelo = new ModeloEdicionUsuarioInfo();
    }

    public function getInfo($idusuario){
        return $this->modelo->getInfo($idusuario);
    }

}