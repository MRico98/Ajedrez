<?php

include("../../modeloforo/modeloregistroforo/ModeloRegistroForo.php");

$modelo = new ModeloRegistroForo();

$modelo->registroForo($_GET["idusuario"],$_GET["titulo"],$_GET["descripcion"],$_GET["fechapublicacion"]);

header("Location: ../../vistaforo/perfilusuario/PerfilUsuario.php");