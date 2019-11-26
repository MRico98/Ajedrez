<?php

include("../../modeloforo/modelodiscusion/ModeloDiscusion.php");

$modelo = new ModeloDiscusion();
$modelo->registrarComentario($_POST["autorcomentario"],$_POST["numcomentario"],$_POST["autorforo"],$_POST["numeroforo"],$_POST["comentario"],$_POST["fechacomentario"]);
header('Location: ../../vistaforo/paginaforo/Discusion.php?numforo='.$_POST["numeroforo"].'&nombreusuario='.$_POST["autorforo"]);