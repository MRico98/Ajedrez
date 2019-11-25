<?php
include ('../modellogin/ModelLogIn.php');

$modelo = new ModelLogIn();
$query = $modelo->checkLogin($_POST["nombreusuario"],$_POST["contraseniausuario"]);
if($query->num_rows>0){
    $fila = $query->fetch_assoc();
    session_start();
    $_SESSION["sesionusuario"] = $fila["nombres"].' '.$fila["apellidos"];
    $_SESSION["idusuario"] = $fila["nombreusuario"];
    $_SESSION["tipousuario"] = $fila["tipousuario"];
    header('Location: ../../foro/vistaforo/inicioajedrez/Ajedrez.php');
    die();
}

header('Location: ../../index.html?error=adfe3');