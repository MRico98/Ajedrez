<?php
include('../../controladorforo/controladorperfil/ControladorPerfil.php');
session_start();
$perfilactual = false;
$sesiondelusuario = $_SESSION["sesionusuario"];
$nombredelusuario = $_SESSION["idusuario"];
if($sesiondelusuario == '' && $sesiondelusuario == null){
    header('Location: ../../../index.html?error=nosession');
    die();
}
$controladorperfil = new ControladorPerfil();
$informacionusuario = $controladorperfil->getInformacion($_GET["idusuario"])->fetch_assoc();
if($informacionusuario["nombreusuario"] === $nombredelusuario){
    $perfilactual=true;
}
$numerodeforos = $controladorperfil->numForos($_GET["idusuario"]);
$numeroforos = $numerodeforos->fetch_array()[0];
if($numeroforos==null){
    $numeroforos=0;
}
$articuloporpagina = 3;
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
<?php

if(!isset($_GET["pagina"])){
    header('Location:PerfilUsuario.php?idusuario='.$_GET["idusuario"].'&pagina=1');
}

$inicio =($_GET["pagina"]-1)*$articuloporpagina;
$arrayforos = $controladorperfil->inforForosPaginacion($_GET["idusuario"],$inicio,$articuloporpagina);
$inforforos = $arrayforos->fetch_all();
$paginas = ceil($numerodeforos->num_rows/3);
?>
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
<div id="cuerpoperfil">
    <aside id="bloquefotoperfil">
        <figure id="imagendeperfil" >
            <img class="rounded float-left" src="../../imagenes/<?php echo $informacionusuario["fotoperfil"] ?>" alt="imagen icono" width="200" height="200">
            <figcaption id="nombreusuariofoto">
                <h2 id="infoperfilusuario"><?php echo $informacionusuario["nombres"] ?> <?php echo $informacionusuario["apellidos"] ?></h2>
            </figcaption>
        </figure>
    </aside>
    <?php if($perfilactual){ ?>
        <article id="articuloprueba">
            <p>
                <a data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
                    <button type="button" class="btn btn-dark">Opciones del perfil</button>
                </a>
            </p>
            <div class="collapse" id="collapseExample">
                <div class="card card-body">
                    <a href="../edicionusuario/EdicionInformacionUsuario.php">
                        <button type="button" class="btn btn-secondary btn-block" style="margin-bottom: 10px">Editar perfil</button>
                    </a>
                    <br><br>
                    <a href="../../controladorforo/controladorperfil/CierreSesion.php">
                        <button type="button" class="btn btn-secondary btn-block">Cerrar sesión</button>
                    </a>
                </div>
            </div>
        </article>
    <?php }
        else if($_SESSION["tipousuario"] == "admin"){ ?>
            <article id="articuloprueba">
                <form action="EliminarCuenta.php" method="post">
                    <input type="submit" class="btn btn-danger" value="Eliminar perfil">
                    <input name="nombre" type="hidden" value="<?php echo $informacionusuario["nombres"] ?> <?php echo $informacionusuario["apellidos"] ?>">
                    <input name="usuario" type="hidden" value="<?php echo $informacionusuario["nombreusuario"] ?>">
                </form>
            </article>
    <?php
        }
    ?>
    <section id="cuerpoprincipal">
        <article id="descripcionusuario">
               <?php echo $informacionusuario["descripcion"]; ?>
        </article>
        <?php if($perfilactual){ ?>
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
                        <input type="hidden" name="numeroforo" value="<?php echo $numeroforos ?>">
                        <input type="submit" class="btn" value="Enviar">
                    </div>
                </form>
            </div>
        </article>
        <?php } ?>
        <br><br>
        <h2>Foros creados</h2>
        <article id="paginacionforos">
            <?php  foreach ($inforforos as $informacion){ ?>
                <a href="../paginaforo/Discusion.php?numforo=<?php echo $informacion[1] ?>&nombreusuario=<?php echo $informacion[0] ?>">
                    <div class="alert alert-dark" role="alert">
                        <?php echo $informacion[2] ?><br>
                        <small id="emailHelp" class="form-text text-muted"><?php echo $informacion[4] ?></small>
                    </div>
                </a>
            <?php } ?>
            <nav aria-label="Page navigation example" class="paginacion">
                <ul class="pagination">
                    <li class="page-item <?php echo $_GET["pagina"]<=1? 'disabled':'' ?>"><a class="page-link" href="PerfilUsuario.php?idusuario=<?php echo $_GET["idusuario"] ?>&pagina=<?php echo $_GET["pagina"]-1 ?>"> Anterior</a></li>
                    <?php for($contador=0;$contador<$paginas;$contador++){ ?>
                    <li class="page-item <?php echo $_GET["pagina"]==$contador+1? 'active':'' ?>"><a class="page-link" href="PerfilUsuario.php?idusuario=<?php echo $_GET["idusuario"] ?>&pagina=<?php echo $contador+1 ?>"><?php echo $contador+1 ?></a></li>
                    <?php }?>
                    <li class="page-item <?php echo $_GET["pagina"]>=$paginas? 'disabled':'' ?>"><a class="page-link" href="PerfilUsuario.php?idusuario=<?php echo $_GET["idusuario"] ?>&pagina=<?php echo $_GET["pagina"]+1 ?>">Siguiente</a></li>
                </ul>
            </nav>
        </article>
        <br><br><br>
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