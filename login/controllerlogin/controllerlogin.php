<?php
include ('../modellogin/ModelLogIn.php');

$modelo = new ModelLogIn();
$query = $modelo->checkLogin($_POST["nombreusuario"],$_POST["contraseniausuario"]);
if($query->num_rows>0){
    header('Location: ../../foro/vistaforo/perfilusuario.php');
    die();
}
header('Location: ../../index.html?error=adfe3');