<!DOCTYPE html>
<html lang = "en">
<head>
    <meta charset="UTF-8">
    <meta title="Description" content="Pagina para el registro de nuevos usuarios">
    <meta title="keywords" content="usuarios,ajedrez,registros">
    <meta name="viewport" content="width=device-width, initial-scale 1">
    <title>Ingresar nuevo usuario</title>
    <link rel="shorcut icon" href="../../indexcomplements/ima/icono.ico">
    <link rel="stylesheet" href="../../node_modules/bootstrap/dist/css/bootstrap.min.css">
    <script src="../../node_modules/jquery/dist/jquery.js"></script>
    <script src="../../node_modules/popper.js/dist/popper.min.js"></script>
    <script src="../../node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
    <link href="estilosregistros/estilosregistros.css" rel="stylesheet">
    <link href="estilosregistros/EstilosAuxiliar.css" rel="stylesheet">
</head>
<body>
<form id="formregistro" action="../controladorregistro/ControladorRegistro.php" method="post" enctype="multipart/form-data">
    <header class="container-fluid" id="cabeceraprincipal">
            <picture>
                <img class="rounded float-left" src="../../indexcomplements/ima/icono.jpg" alt="imagen icono" width="100" height="100">
            </picture>
            <H1 class="font-weight-bolder" id="tituloprincipal">Registro de nuevo usuario</H1>
        <?php
        $tipousaurio = "usuario";
        if($_GET["e"] == "admin"){
            $tipousaurio = $_GET["e"];
            ?>
            <section id="formsusuario">
                    <article class="form-group detallesusuario">
                        <label class="labelinputs" for="nombreadministrador">Nombre del administrador:</label>
                        <input name="nombreadministrador" type="text" class="form-control" id="nombreadministrador" required>
                    </article>
                    <article class="form-group detallesusuario">
                        <label class="labelinputs" for="contraseniaadministrador">Contraseña del admininstrador:</label>
                        <input name="contraseniaadministrador" type="password" class="form-control" id="contraseniaadministrador" required>
                    </article>
            </section>
        <?php
        }
        ?>
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
        <article class="form-group cuerporegistro">
            <label class="labelinputs" for="nombre">Nombre(s):</label>
            <input name="nombre" type="text" class="form-control" id="nombre" required>
            <label class="labelinputs" for="apellidos">Apellido(s):</label>
            <input name="apellidos" type="text" class="form-control" id="apellidos" required>
            <label class="labelinputs" for="nacionalidad">Nacionalidad:</label>
            <input name="nacionalidad" type="text" class="form-control" id="nacionalidad" required>
            <label class="labelinputs" for="sexo">Sexo:</label>
            <select name="sexo" class="form-control" id="sexo">
                <option>Hombre</option>
                <option>Mujer</option>
                <option>Otro</option>
            </select>
            <label class="labelinputs" for="email">Email:</label>
            <input name="email" type="email" class="form-control" id="email" required>
            <label class="labelinputs" for="celular">Celular:</label>
            <input name="celular" type="number" class="form-control" id="celular">
        </article>
        <article class="form-group detallesusuario">
            <picture>
                <img src="../../indexcomplements/ima/iconoestandarlogin.jpg" width="96" sizes="100" alt="Imagen de usuario">
            </picture>
            <label class="labelinputs" for="imagenperfil">Seleccione una imagen de perfil</label>

            <input name="imagenperfil" type="file" id="imagenperfil">

            <label class="labelinputs" for="nombreusuario">Nombre de usuario:</label>
            <input name="nombreusuario" type="text" class="form-control" id="nombreusuario" required>
            <label class="labelinputs" for="contrasenia">Contraseña:</label>
            <input name="contrasenia" type="password" class="form-control" id="contrasenia" required>
            <label class="labelinputs" for="repetircontrasenia">Repita al contraseña</label>
            <input name="repetircontrasenia" type="password" class="form-control" id="repetircontrasenia">
            <label class="labelinputs" for="descripcionusuario">Descripción:</label>
            <br>
            <textarea name="descripcionusuario" id="descripcionusuario" rows="3" cols="60"></textarea>
            <input type="hidden" name="tipousuario" value="<?php echo $tipousaurio ?>">
        </article>
         <article class="botonessubmit">
             <input type="button" value="Registrar" class="btn btn-lg btn-primary" onclick="submitForms()">
             <br><br>
             <a href="../../index.html" type="button" class="btn btn-lg btn-danger">Cancelar</a><br><br>
         </article>
    </section>
    <script src="scriptregistros/scriptregistro.js"></script>
</form>
</body>
</html>