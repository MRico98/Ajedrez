<?php
include("../../modeloforo/modeloperfil/ModeloPerfil.php");
$modelo = new ModeloPerfil();
$modelo->eliminarUsuario($_POST["id"]);
header("Location: ../../vistaforo/inicioajedrez/Ajedrez.php");