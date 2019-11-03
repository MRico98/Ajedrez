<!DOCTYPE html>
<html lang = "en">

<head>
    <meta charset="UTF-8">
    <meta title="Description" content="Pagina para el registro de nuevos usuarios">
    <meta title="keywords" content="usuarios,ajedrez,registros">
    <title>Ingresar nuevo usuario</title>
    <link rel="shorcut icon" href="../indexcomplements/ima/icono.ico">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link href="estilosregistros.css" rel="stylesheet">
</head>

<body>

    <header class="container-fluid" id="cabeceraprincipal">
        <picture>
            <img class="rounded float-left" src="../indexcomplements/ima/icono.jpg" alt="imagen icono" width="100" height="100">
        </picture>
        <H1 class="font-weight-bolder" id="tituloprincipal">Registro de nuevo usuario</H1>
    </header>

    <section id="cuerpoprincipal">
        <form action="">

        <article class="form-group cuerporegistro">
            <label class="labelinputs" for="nombre">Nombre(s):</label>
            <input type="text" class="form-control" id="nombre">
            <label class="labelinputs" for="apellidos">Apellido(s):</label>
            <input type="text" class="form-control" id="apellidos">
            <label class="labelinputs" for="nacionalidad">Nacionalidad:</label>
            <input type="text" class="form-control" id="nacionalidad">
            <label class="labelinputs" for="sexo">Sexo:</label>
            <select class="form-control" id="sexo">
                <option>Hombre</option>
                <option>Mujer</option>
                <option>Otro</option>
            </select>
            <label class="labelinputs" for="email">Email:</label>
            <input type="email" class="form-control" id="email">
            <label class="labelinputs" for="celular">Celular:</label>
            <input type="number" class="form-control" id="celular">
        </article>

        <article class="form-group cuerporegistro">
            <picture>
                <img src="../indexcomplements/ima/iconoestandarlogin.jpg" width="96" sizes="100" alt="Imagen de usuario">
            </picture>
            <label class="labelinputs" for="imagenperfil">Seleccione una imagen de perfil</label>
            <input type="file" id="imagenperfil" accept="image/png,image/jpg">
            <label class="labelinputs" for="nombreusuario">Nombre de usuario:</label>
            <input type="text" class="form-control" id="nombreusuario">
            <label class="labelinputs" for="contrasenia">Contraseña:</label>
            <input type="password" class="form-control" id="contrasenia">
            <label class="labelinputs" for="repetircontrasenia">Repita al contraseña</label>
            <input type="password" class="form-control" id="repetircontrasenia">
        </article>

        </form>
    </section>

</body>

</html>