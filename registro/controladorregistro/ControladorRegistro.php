<?php

include('../modeloregistro/ModeloRegistro.php');

try{

    echo $_POST["nombreadministrador"];
    echo $_POST["nombre"];


    $conexion = new ModeloRegistro();
    /**
    $conexion->setNombresUsuario($_POST["nombre"]);
    $conexion->setApellidosUsuario($_POST["apellidos"]);
    $conexion->setNacionalidad($_POST["nacionalidad"]);
    $conexion->setSexoUsario($_POST["sexo"]);
    $conexion->setEmailUsuario($_POST["email"]);
    $conexion->setCelularUsuario($_POST["celular"]);
    $conexion->setImagenUsuario("ruta");
    $conexion->setNickname($_POST["nombreusuario"]);
    $conexion->setContraseniaUsuario($_POST["contrasenia"],$_POST["repetircontrasenia"]);
    $conexion->setDescripcionUsuario($_POST["descripcionusuario"]);
    $conexion->setTipoUsuario($_POST["tipousuario"]);
    $conexion->ejecutarInsert();
    header("location: ../vistaregistro/registrousuario.php?registro=exito");
    **/
}catch (Exception $e){
    $mensaje = $e->getMessage();
    header("location: ../vistaregistro/registrousuario.php?registro=fracaso&mensaje=$mensaje");
}