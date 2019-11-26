<?php

include("../../modeloforo/modelodiscusion/ModeloDiscusion.php");

class ControladorDiscusion {

    private $modelo;

    /**
     * ControladorDiscusion constructor.
     */
    public function __construct()
    {
        $this->modelo = new  ModeloDiscusion();
    }

    public function getInfoForo($numforo,$idautor){
        return $this->modelo->getInfoForo($numforo,$idautor);
    }

    public function getInfoUsuario($idusuario){
        return $this->modelo->getInfoUsuario($idusuario);
    }

    public function getInforComentarios($autorcomentario,$numeroforo){
        return $this->modelo->getInfoComentarios($autorcomentario,$numeroforo);
    }

}