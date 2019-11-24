<?php
include('../../controladorforo/controladorperfil/ControladorPerfil.php');
session_start();
if($_SESSION["sesionusuario"] == '' && $_SESSION["sesionusuario"] == null){
    header('Location: ../../../index.html?error=nosession');
    die();
}
$controladorperfil = new ControladorPerfil();
$informacionusuario = $controladorperfil->getInformacion($_GET["idusuario"])->fetch_assoc();
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
    <link rel="stylesheet" href="estilosperfilusuario/EstilosPerfilUsuario.css">
    <link rel="stylesheet" type="text/css" href="http://yui.yahooapis.com/3.18.1/build/cssreset-context/cssreset-context-min.css">
    <link rel="stylesheet" type="text/css" href="../inicioajedrez/estilosinicio/EstilosInicio.css">
</head>
<body id="cuerpoperfil">
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
    <form action="../perfilusuario/PerfilUsuario.php" method="post" id="formsusuario">
        <button name="idusuario" id="botonperfil" type="submit" value="<?php echo $_SESSION["idusuario"] ?>">
            <H3 id="infoperfil"><?php echo $_SESSION["sesionusuario"] ?></H3>
    </form>
</header>
<div id="cuerpoperfil">
    <aside id="bloquefotoperfil">
        <figure id="imagendeperfil" >
            <img class="rounded float-left" src="../../../imagenesperfil/iconoestandarlogin.jpg" alt="imagen icono" width="200" height="200">
            <figcaption id="nombreusuariofoto">
                <h2 id="infoperfilusuario"><?php echo $informacionusuario["nombres"] ?> <?php echo $informacionusuario["apellidos"] ?></h2>
            </figcaption>
        </figure>
    </aside>
    <section id="cuerpoprincipal">
        <article id="descripcionusuario">
               <?php echo $informacionusuario["descripcion"]; ?>
        </article>
        <button type="button" class="btn btn-secondary btn-lg btn-block" id="botoncrearforo">Crear foro</button>
        <article class="modal">
            <div class="contenidomodal">
                <span class="close">&times;</span>
                <form action="../../controladorforo/controladorregistroforo/ControladorRegistroForo.php" method="get">
                    <div class="form-group">
                        <label for="formGroupExampleInput">Titulo</label>
                        <input name="titulo" type="text" class="form-control" id="formGroupExampleInput">
                    </div>
                    <div class="form-group">
                        <label for="descripcionforo">Descripcion del foro</label>
                        <br>
                        <textarea name="descripcion" class="form-control" id="descripcionforo" rows="3"></textarea>
                        <input type="hidden" name="idusuario" value="<?php echo $_SESSION["idusuario"] ?>">
                        <input type="hidden" name="fechapublicacion" value="<?php echo date("Y-m-d") ?>">
                        <input type="submit" class="btn" value="suss">
                    </div>
                </form>
            </div>
        </article>
        <article id="paginacionforos"></article>
        <article id="paginacioncomentarios"></article>
    </section>
    <aside id = "bloqueinformacion">
        <table class="table table-striped">
            <tbody>
            <tr>
                <th scope="row">Nombre de usuario</th>
            </tr>
            <tr>
                <td><?php echo $informacionusuario["nombreusuario"] ?></td>
            </tr>
            <tr>
                <th scope="row">Numero de celular</th>
            </tr>
            <tr>
                <td><?php echo $informacionusuario["celular"] ?></td>
            </tr>
            <tr>
                <th scope="row">Email</th>
            </tr>
            <tr>
                <td><?php echo $informacionusuario["email"] ?></td>
            </tr>
            <tr>
                <th scope="row">Sexo</th>
            </tr>
            <tr>
                <td><?php echo $informacionusuario["sexo"] ?></td>
            </tr>
            <tr>
                <th scope="row">Nacionalidad</th>
            </tr>
            <tr>
                <td><?php echo $informacionusuario["nacionalidad"] ?></td>
            </tr>
            <tr>
                <th scope="row">Tipo de usuario</th>
            </tr>
            <tr>
                <td><?php echo $informacionusuario["tipousuario"] ?></td>
            </tr>
            </tbody>
        </table>
    </aside>
</div>
<script src="scriptperfilusuario/ScriptPerfilUsuario.js"></script>
</body>
</html>