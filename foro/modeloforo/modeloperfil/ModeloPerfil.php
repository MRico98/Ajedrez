<?php

include("../../../utilidades/ConexionDatabase.php");

class ModeloPerfil extends ConexionDatabase
{
    public function getAll($id){
        $peticion = 'SELECT nombres,apellidos,nombreusuario,descripcion,celular,email,sexo,tipousuario,nacionalidad FROM ajedrez.usuario WHERE nombreusuario LIKE "'.$id.'";';
        return $this->getConexion()->query($peticion);
    }

    public function getNumberForos($id){
        $peticion = 'SELECT numforo FROM ajedrez.foro WHERE nombreusuario LIKE "'.$id.'" ORDER BY numforo asc;';
        return $this->hacerQuery($peticion);
    }

}