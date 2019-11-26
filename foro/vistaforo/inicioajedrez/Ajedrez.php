<?php
include("../../controladorforo/controladorinicio/ControladorInicio.php");
session_start();
if($_SESSION["sesionusuario"] == '' || $_SESSION["sesionusuario"] == null){
    header('Location: ../../../index.html?error=nosession');
    die();
}
$controlador = new ControladorInicio();
$articuloporpagina = 5;
if(!isset($_GET["pagina"])){
    header('Location: Ajedrez.php?pagina=1');
}

$inicio =($_GET["pagina"]-1)*$articuloporpagina;
$arrayforos = $controlador->informacionForos($inicio,$articuloporpagina);
$inforforos = $arrayforos->fetch_all();
$paginas = ceil($controlador->numeroDeForos()/5);
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
    <link rel="stylesheet" href="estilosinicio/EstilosInicio.css">
    <link rel="stylesheet" href="estilosinicio/EstilosPaginacion.css">
</head>
<body>
<header class="container-fluid" id="cabeceraprincipal">
    <a href="">
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
            <H3 id="infoperfil"><?php echo $_SESSION["sesionusuario"] ?></H3></button>
    </form>
</header>
<section id="cuerpoprincipal">
    <div id="paginacionforos">
        <h2>Foros mas recientes</h2>
        <article id="paginacionforos2">
            <?php  foreach ($inforforos as $informacion){ ?>
                <a href="../paginaforo/Discusion.php?numforo=<?php echo $informacion[1] ?>&nombreusuario=<?php echo $informacion[0] ?>">
                    <div class="alert alert-dark" role="alert">
                        <?php echo $informacion[2] ?> <small id="emailHelp" class="form-text text-muted"><?php echo $informacion[0] ?> <small id="emailHelp" class="form-text text-muted"><?php echo $informacion[4] ?></small></small>
                    </div>
                </a>
            <?php } ?>
            <nav aria-label="Page navigation example" class="paginacion">
                <ul class="pagination">
                    <li class="page-item <?php echo $_GET["pagina"]<=1? 'disabled':'' ?>"><a class="page-link" href="Ajedrez.php?pagina=<?php echo $_GET["pagina"]-1 ?>"> Anterior</a></li>
                    <?php for($contador=0;$contador<$paginas;$contador++){ ?>
                        <li class="page-item <?php echo $_GET["pagina"]==$contador+1? 'active':'' ?>"><a class="page-link" href="Ajedrez.php?pagina=<?php echo $contador+1 ?>"><?php echo $contador+1 ?></a></li>
                    <?php }?>
                    <li class="page-item <?php echo $_GET["pagina"]>=$paginas? 'disabled':'' ?>"><a class="page-link" href="Ajedrez.php?pagina=<?php echo $_GET["pagina"]+1 ?>">Siguiente</a></li>
                </ul>
            </nav>
        </article>
    </div>
</section>
</body>
</html>