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
    <script src="../../../node_modules/bootstrap/dist/js/bootstrap.js"></script>
    <script src="scriptperfilusuario/ScriptPerfilUsuario.js"></script>
    <link rel="stylesheet" href="../../../registro/vistaregistro/estilosregistros/estilosregistros.css">
    <link rel="stylesheet" href="estilosperfilusuario/EstilosPerfilUsuario.css">
    <link rel="stylesheet" type="text/css" href="http://yui.yahooapis.com/3.18.1/build/cssreset-context/cssreset-context-min.css">
</head>
<body>
<header class="container-fluid" id="cabeceraprincipal">
    <a href="../inicioajedrez/Ajedrez.php">
        <picture>
            <img class="rounded float-left" src="../../../indexcomplements/ima/icono.jpg" alt="imagen icono" width="50" height="50">
        </picture>
        <H3 class="font-weight-bolder" id="tituloprincipal">Ajedrez</H3>
    </a>
</header>
<div id="cuerpoperfil">
    <aside id="bloquefotoperfil">
        <figure id="imagendeperfil" >
            <img class="rounded float-left" src="../../../imagenesperfil/iconoestandarlogin.jpg" alt="imagen icono" width="200" height="200">
            <figcaption>
                <h2 id="infoperfil">Nombre</h2>
            </figcaption>
        </figure>
    </aside>
    <section id="cuerpoprincipal">
        <article id="descripcionusuario">
               Descripcion de usuario
        </article>
        <article>
            <div class="container">
                <h2>Basic Modal Example</h2>
                <!-- Trigger the modal with a button -->
                <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Open Modal</button>

                <!-- Modal -->
                <div class="modal fade" id="myModal" role="dialog">
                    <div class="modal-dialog">

                        <!-- Modal content-->
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h4 class="modal-title">Modal Header</h4>
                            </div>
                            <div class="modal-body">
                                <p>Some text in the modal.</p>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            </div>
                        </div>

                    </div>
                </div>

            </div>
        </article>
    </section>
    <aside id = "bloqueinformacion">
        <table class="table table-striped">
            <tbody>
            <tr>
                <th scope="row">Nombre de usuario</th>
            </tr>
            <tr>
                <td>Nombre de usuario</td>
            </tr>
            <tr>
                <th scope="row">Numero de celular</th>
            </tr>
            <tr>
                <td>Numero de celular</td>
            </tr>
            <tr>
                <th scope="row">Email</th>
            </tr>
            <tr>
                <td>Email</td>
            </tr>
            <tr>
                <th scope="row">Sexo</th>
            </tr>
            <tr>
                <td>Sexo</td>
            </tr>
            <tr>
                <th scope="row">Nacionalidad</th>
            </tr>
            <tr>
                <td>Nacionalidad</td>
            </tr>
            <tr>
                <th scope="row">Tipo de usuario</th>
            </tr>
            <tr>
                <td>Tipo de usuario</td>
            </tr>
            </tbody>
        </table>
    </aside>
</div>
</body>
</html>