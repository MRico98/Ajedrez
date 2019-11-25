<?php

include("../../../utilidades/ConexionDatabase.php");

class ModeloEdicionUsuarioInfo extends ConexionDatabase
{

    public function getInfo($nombreusuario){
        $operacion = 'SELECT nombreusuario,descripcion,celular,nombres,apellidos,nacionalidad,email FROM ajedrez.usuario WHERE nombreusuario LIKE "'.$nombreusuario.'";';
        return $this->getConexion()->query($operacion);
    }


}