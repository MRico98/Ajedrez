<?php

include("../../modeloforo/modeloregistroforo/ModeloRegistroForo.php");

$modelo = new ModeloRegistroForo();
echo $_GET["numeroforo"];
$modelo->registroForo($_GET["idusuario"],$_GET["numeroforo"],$_GET["titulo"],$_GET["descripcion"],$_GET["fechapublicacion"]);

header('Location: ../../vistaforo/perfilusuario/PerfilUsuario.php?idusuario='.$_GET["idusuario"]);