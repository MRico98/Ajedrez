<?php
include('../../controladorforo/controladorperfil/ControladorPerfil.php');
session_start();
$sesiondelusuario = $_SESSION["sesionusuario"];
$nombredelusuario = $_SESSION["idusuario"];
if($sesiondelusuario == '' && $sesiondelusuario == null){
    header('Location: ../../../index.html?error=nosession');
    die();
}
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
</head>
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
<body id="cuerpoperfil">
    <section id="cuerpoprincipal">
        <h4 class="display-5">¿Seguro que desea eliminar el perfil de <?php echo $_POST["nombre"] ?>?</h4>
        <form action="../../controladorforo/controladorperfil/EliminarPerfil.php" method="post">
            <input type="submit" class="btn btn-danger" value="Eliminar">
            <input name="id" type="hidden" value="<?php echo $_POST["usuario"] ?>">
        </form>
        <br>
        <a href="PerfilUsuario.php?idusuario=<?php echo $_POST["usuario"] ?>">
        <input type="submit" class="btn btn-dark" value="Cancelar">
        </a>
        </form>
    </section>
</body>
</html>