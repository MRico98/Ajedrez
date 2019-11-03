<?php

include('../modeloregistro/ModeloRegistro.php');

try{
    $conexion = new ModeloRegistro();
}catch (Exception $e){
    $mensaje = $e->getMessage();
    header("location: ../vistaregistro/registrousuario.php?registro=fracaso&mensaje=$mensaje");
}

