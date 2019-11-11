<?php
include('../modeloregistro/ModeloRegistro.php');

try{
    $conexion = new ModeloRegistro();
    if($_POST["tipousuario"] == "admin"){
        $conexion->validarLogin($_POST["nombreadministrador"],$_POST["contraseniaadministrador"]);
    }
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
    header('location: ../vistaregistro/registrousuario.php?registro=exito&e='.$_POST["tipousuario"].'');
}catch (Exception $e){
    $mensaje = $e->getMessage();
        header('location: ../vistaregistro/registrousuario.php?registro=fracaso&mensaje='.$mensaje.'&e='.$_POST["tipousuario"].'');
}