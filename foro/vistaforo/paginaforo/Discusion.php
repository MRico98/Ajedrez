<?php
include("../../controladorforo/controladordiscusion/ControladorDiscusion.php");
session_start();
$sesiondelusuario = $_SESSION["sesionusuario"];
$nombredelusuario = $_SESSION["idusuario"];
if($sesiondelusuario == '' && $sesiondelusuario == null){
    header('Location: ../../../index.html?error=nosession');
    die();
}
$controlador = new ControladorDiscusion();
$informacionforo = $controlador->getInfoForo($_GET["numforo"],$_GET["nombreusuario"])->fetch_assoc();
$informacionautor = $controlador->getInfoUsuario($_GET["nombreusuario"])->fetch_assoc();
$informacioncomentarios = $controlador->getInforComentarios($_GET['nombreusuario'],$_GET["numforo"]);
$numerocomentarios = $informacioncomentarios->num_rows;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <meta charset="UTF-8">
    <meta title="Description" content="Perfil del usuario registrado en el foro ajedrez">
    <meta title="keywords" content="ajedrez,foro,discucion">
    <meta name="viewport" content="width=device-width, initial-scale 1">
    <title>Ajedrez</title>
    <link rel="shorcut icon" href="../../../indexcomplements/ima/icono.ico">
    <link rel="stylesheet" href="../../../node_modules/bootstrap/dist/css/bootstrap.min.css">
    <script src="../../../node_modules/jquery/dist/jquery.js"></script>
    <script src="../../../node_modules/popper.js/dist/popper.min.js"></script>
    <script src="../../../node_modules/bootstrap/dist/js/bootstrap.js"></script>
    <link rel="stylesheet" href="../../../registro/vistaregistro/estilosregistros/estilosregistros.css">
    <link rel="stylesheet" type="text/css" href="../inicioajedrez/estilosinicio/EstilosInicio.css">
    <link rel="stylesheet" type="text/css" href="estilospaginaforo/EstilosPaginaForo.css">
</head>
<body>
<header class="container-fluid" id="cabeceraprincipal">
    <a href="../inicioajedrez/Ajedrez.php">
        <picture>
            <img class="rounded float-left" src="../../../indexcomplements/ima/icono.jpg" alt="imagen icono" width="50" height="50">
        </picture>
        <H3 class="font-weight-bolder" id="tituloprincipal">Ajedrez</H3>
    </a>
    <form id="formbusqueda">
        <img  src="../../imagenes/busquedalupa.png" width="40" height="40">
        <input type="text" class="form-control">
    </form>
    <form action="../perfilusuario/PerfilUsuario.php" method="get" id="formsusuario">
        <button name="idusuario" id="botonperfil" type="submit" value="<?php echo $_SESSION["idusuario"] ?>">
            <H3 id="infoperfil"><?php echo $_SESSION["sesionusuario"] ?></H3>
    </form>
</header>
<div id="contenidocentral">
    <div id="contenidocentralforo">
        <div id="fotoperfil">
            <figure id="imagendeperfil" >
                <img class="rounded float-left" src="../../imagenes/<?php echo $informacionautor["fotoperfil"] ?>" alt="imagen icono" width="200" height="200">
                <figcaption id="nombreusuariofoto">
                    <a href="../perfilusuario/PerfilUsuario.php?idusuario=<?php echo $informacionautor["nombreusuario"] ?>"><h2 id="infoperfilusuario"><?php echo $informacionautor["nombres"] ?> <?php echo $informacionautor["apellidos"] ?></h2></a>
                </figcaption>
            </figure>
        </div>
        <div id="informacionespecificaforo">
            <h1><?php echo $informacionforo["titulo"] ?></h1>
        </div>
        <div id="titulodiscusion">
            <h4><?php echo $informacionforo["descripcion"] ?></h4>
        </div>
    </div>
</div>
<div id="seccioncomentarios">
    <?php if($numerocomentarios != 0){ ?>
        <table class="table table-striped table-light" id="tablacomentarios">
            <?php while($fila = $informacioncomentarios->fetch_assoc()){ ?>
            <tbody>
                <tr>
                    <th scope="row" ><?php echo $fila["numcomentario"] ?></th>
                    <td><?php echo $fila["autorcomentario"] ?></td>
                    <td><?php echo $fila["comentario"] ?></td>
                </tr>
            </tbody>
        <?php } ?>
        </table>
    <?php } ?>
    <form action="../../controladorforo/controladordiscusion/ControladorDiscusionRegistro.php" method="post">
        <div class="form-group" id="areatextocomentarios">
            <label for="exampleFormControlTextarea1"><strong class="display-4">Escriba un comentario de este foro</strong></label>
            <br>
            <textarea name="comentario" class="form-control" id="areacomentario" rows="3"></textarea>
            <input name="autorcomentario" type="hidden" value="<?php echo $nombredelusuario ?>">
            <input name="numcomentario" type="hidden" value="<?php echo $numerocomentarios+1 ?>">
            <input name="autorforo" type="hidden" value="<?php echo $_GET["nombreusuario"] ?>">
            <input name="numeroforo" type="hidden" value="<?php echo $_GET["numforo"] ?>">
            <input name="fechacomentario" type="hidden" value="<?php echo date("Y-m-d") ?>">
            <br>
            <br>
            <button type="submit" class="btn-lg btn-dark">Comentar</button>
        </div>
    </form>
</div>
</body>
</html>