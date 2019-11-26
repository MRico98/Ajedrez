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

    $image = $_POST["imagenperfil"];

    //Stores the filename as it was on the client computer.
    $imagename = $_FILES["imagenperfil"]["name"];
    //Stores the filetype e.g image/jpeg
    $imagetype = $_FILES["imagenperfil"]["type"];
    //Stores any error codes from the upload.
    $imageerror = $_FILES["imagenperfil"]["error"];
    //Stores the tempname as it is given by the host when uploaded.
    $imagetemp = $_FILES["imagenperfil"]["tmp_name"];

    $imagePath = "../../foro/imagenes/";

    if(move_uploaded_file($imagetemp, $imagePath . $imagename)) {
        echo "Sussecfully uploaded your image.";
    }
    else {
        echo "Failed to move your image.";
    }

    $conexion->setImagenUsuario($imagename);
    $conexion->setNickname($_POST["nombreusuario"]);
    $conexion->setContraseniaUsuario($_POST["contrasenia"],$_POST["repetircontrasenia"]);
    $conexion->setDescripcionUsuario($_POST["descripcionusuario"]);
    $conexion->setTipoUsuario($_POST["tipousuario"]);
    $conexion->ejecutarInsert();
    header('location: ../vistaregistro/registrousuario.php?registro=exito&e='.$_POST["tipousuario"].'');
}catch (Exception $e){
    $mensaje = $e->getMessage();
        header('location: ../vistaregistro/EdicionInformacionUsuario.php?registro=fracaso&mensaje='.$mensaje.'&e='.$_POST["tipousuario"].'');
}