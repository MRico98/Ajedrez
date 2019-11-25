<?php
session_start();
if($_SESSION["sesionusuario"] == '' || $_SESSION["sesionusuario"] == null){
    header('Location: ../../../index.html?error=nosession');
    die();
}
include("../../controladorforo/controladoredicionusuario/ControladorEdicionUsuarioInfo.php");
$controlador = new ControladorEdicionUsuarioInfo();
$informacionusuario = $controlador->getInfo($_SESSION["idusuario"])->fetch_assoc();
?>
<!DOCTYPE html>
<html lang = "en">
<head>
    <meta charset="UTF-8">
    <meta title="Description" content="Pagina para el registro de nuevos usuarios">
    <meta title="keywords" content="usuarios,ajedrez,registros">
    <meta name="viewport" content="width=device-width, initial-scale 1">
    <title>Editar usuario</title>
    <link rel="shorcut icon" href="../../../indexcomplements/ima/icono.ico">
    <link rel="stylesheet" href="../../../node_modules/bootstrap/dist/css/bootstrap.min.css">
    <script src="../../../node_modules/jquery/dist/jquery.js"></script>
    <script src="../../../node_modules/popper.js/dist/popper.min.js"></script>
    <script src="../../../node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
    <link href="../../../registro/vistaregistro/estilosregistros/estilosregistros.css" rel="stylesheet">
    <link rel="stylesheet" href="estilosedicionusuario/EstilosEdicionUsuario.css">
</head>
<body>
    <header class="container-fluid" id="cabeceraprincipal">
        <picture>
            <img class="rounded float-left" src="../../../indexcomplements/ima/icono.jpg" alt="imagen icono" width="100" height="100">
        </picture>
        <H1 class="font-weight-bolder" id="tituloprincipal">Edicion de usuario</H1>
    </header>
    <?php if($_GET["registro"] == "exito"){ ?>
        <div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            <strong>Se ha registrado un nuevo usuario</strong>
        </div>
    <?php }else if($_GET["registro"] == "fracaso"){ ?>
        <div class="alert alert-warning alert-dismissible">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            <strong>Error. <?php echo $_GET["mensaje"] ?> </strong>
        </div>
    <?php }?>
    <section id="cuerpoprincipal">
        <form id="formregistro" action="../../controladorforo/controladoredicionusuario/ControladorActualizacionUsuario.php" method="post">
        <article class="form-group cuerporegistro">
            <label class="labelinputs" for="nombre">Nombre(s):</label>
            <input name="nombre" type="text" class="form-control" id="nombre" value="<?php echo $informacionusuario["nombres"] ?>" required>
            <label class="labelinputs" for="apellidos">Apellido(s):</label>
            <input name="apellidos" type="text" class="form-control" id="apellidos" value="<?php echo $informacionusuario["apellidos"] ?>" required>
            <label class="labelinputs" for="nacionalidad">Nacionalidad:</label>
            <input name="nacionalidad" type="text" class="form-control" id="nacionalidad" value="<?php echo $informacionusuario["nacionalidad"] ?>" required>
            <label class="labelinputs" for="sexo">Sexo:</label>
            <select name="sexo" class="form-control" id="sexo">
                <option>Hombre</option>
                <option>Mujer</option>
                <option>Otro</option>
            </select>
            <label class="labelinputs" for="celular">Celular:</label>
            <input name="celular" type="number" class="form-control" id="celular" value="<?php echo $informacionusuario["celular"]?>">
        </article>
        <article class="form-group detallesusuario">
            <picture>
                <img src="../../../indexcomplements/ima/iconoestandarlogin.jpg" width="96" sizes="100" alt="Imagen de usuario">
            </picture>
            <label class="labelinputs" for="imagenperfil">Seleccione una imagen de perfil</label>
            <input name="imagenperfil" type="file" id="imagenperfil" accept="image/png,image/jpg">
            <label class="labelinputs" for="contrasenia">Contraseña:</label>
            <input name="contrasenia" type="password" class="form-control" id="contrasenia" required>
            <label class="labelinputs" for="repetircontrasenia">Repita al contraseña</label>
            <input name="repetircontrasenia" type="password" class="form-control" id="repetircontrasenia">
            <label class="labelinputs" for="descripcionusuario">Descripción:</label>
            <br>
            <textarea name="descripcionusuario" id="descripcionusuario" rows="3" cols="60"><?php echo $informacionusuario["descripcion"] ?></textarea>
        </article>
         <article class="botonessubmit">
             <input type="button" value="Registrar" class="btn btn-lg btn-primary" onclick="submitForms()">
             <br><br>
             <a href="../../vistaforo/inicioajedrez/Ajedrez.php" type="button" class="btn btn-lg btn-danger">Cancelar</a><br><br>
         </article>
        </form>
    </section>
    <script src="scriptedicionusuario/ScriptEdicionUsuario.js"></script>
</body>
</html>