<?php

include("../../../utilidades/ConexionDatabase.php");

class ModeloDiscusion extends ConexionDatabase
{

    public function getInfoForo($numforo,$idautor){
        $peticion = 'SELECT * FROM ajedrez.foro WHERE nombreusuario LIKE "'.$idautor.'" AND numforo = '.$numforo.';';
        return $this->hacerQuery($peticion);
    }

    public function getInfoUsuario($idusuario){
        $peticion = 'SELECT * FROM ajedrez.usuario WHERE nombreusuario LIKE "'.$idusuario.'";';
        return $this->hacerQuery($peticion);
    }

}