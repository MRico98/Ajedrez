<?php
session_start();
include("../../modeloforo/modeloedicionusuario/ModeloEdicionUsuario.php");
try {
    $modelo = new ModeloEdicionUsuario($_SESSION["idusuario"],$_POST["descripcionusuario"],$_POST["celular"],$_POST["contrasenia"],$_POST["repetircontrasenia"],$_POST["nombre"],$_POST["apellidos"],$_POST["nacionalidad"],$_POST["sexo"]);
    $modelo->edicionUsuario($_SESSION["idusuario"],$_POST["descripcionusuario"],$_POST["celular"],$_POST["contrasenia"],$_POST["repetircontrasenia"],$_POST["nombre"],$_POST["apellidos"],$_POST["nacionalidad"],$_POST["sexo"]);
    header('Location: ../../vistaforo/edicionusuario/EdicionInformacionUsuario.php?registro=exito&mensaje=El+usuario+se+edito+correctamente');
}catch(Exception $exception){
    header('Location: ../../vistaforo/edicionusuario/EdicionInformacionUsuario.php?registro=fracaso&mensaje='.$exception->getMessage());
}
