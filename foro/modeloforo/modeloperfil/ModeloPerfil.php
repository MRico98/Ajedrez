<?php

include("../../../utilidades/ConexionDatabase.php");

class ModeloPerfil extends ConexionDatabase
{
    public function getAll($id){
        $peticion = 'SELECT nombres,apellidos,nombreusuario,descripcion,celular,email,sexo,tipousuario,nacionalidad,fotoperfil FROM ajedrez.usuario WHERE nombreusuario LIKE "'.$id.'";';
        return $this->getConexion()->query($peticion);
    }

    public function getNumberForos($id){
        $peticion = 'SELECT numforo FROM ajedrez.foro WHERE nombreusuario LIKE "'.$id.'" ORDER BY numforo DESC;';
        return $this->hacerQuery($peticion);
    }

    public function getInfoForos($id){
        $peticion = 'SELECT * FROM ajedrez.foro WHERE nombreusuario LIKE "'.$id.'" ORDER BY numforo ASC;';
        return $this->hacerQuery($peticion);
    }

    public function getPaginacionElements($id,$inicio,$fin){
        $peticion = 'SELECT * FROM ajedrez.foro WHERE nombreusuario LIKE "'.$id.'" ORDER BY numforo DESC LIMIT '.$inicio.','.$fin;
        return $this->hacerQuery($peticion);
    }

    public function eliminarUsuario($id){
        $peticion = 'DELETE FROM ajedrez.usuario WHERE nombreusuario LIKE "'.$id.'";';
        return $this->hacerQuery($peticion);
    }

}