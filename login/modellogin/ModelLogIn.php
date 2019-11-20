<?php

include('../../utilidades/ConexionDatabase.php');

class ModelLogIn extends ConexionDatabase
{

    public function checkLogin($nombreusuario,$contraseniausuario){
        $consulta = 'SELECT * FROM ajedrez.usuario WHERE nombreusuario LIKE "'.$nombreusuario.'" AND contrasenia LIKE "'.$contraseniausuario.'";';
        return $this->getConexion()->query($consulta);
    }

}