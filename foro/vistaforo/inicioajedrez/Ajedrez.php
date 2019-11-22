<?php
session_start();
if($_SESSION["sesionusuario"] == '' && $_SESSION["sesionusuario"] == null){
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
    <script src="../../../node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="../../../registro/vistaregistro/estilosregistros/estilosregistros.css">
    <link rel="stylesheet" href="estilosinicio/EstilosInicio.css"
</head>
<body>
<header class="container-fluid" id="cabeceraprincipal">
    <picture>
        <img class="rounded float-left" src="../../../indexcomplements/ima/icono.jpg" alt="imagen icono" width="50" height="50">
    </picture>
    <H3 class="font-weight-bolder" id="tituloprincipal">Ajedrez</H3>
    <a href="../perfilusuario/PerfilUsuario.php"><H3 id="infoperfil"><?php echo $_SESSION["sesionusuario"] ?></H3>
    </a>
</header>
<section id="cuerpoprincipal">

</section>
</body>
</html>