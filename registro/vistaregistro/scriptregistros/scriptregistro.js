var camponombreadministrador = document.querySelector("#nombreadministrador");
var campocontraseniaadministrador = document.querySelector("#contraseniaadministrador");
var camponombre = document.querySelector("#nombre");
var campoapellidos = document.querySelector("#apellidos");
var camponacionalidad = document.querySelector("#nacionalidad");
var campoemail = document.querySelector("#email");
var campocelular = document.querySelector("#celular");
var camponombreusuario = document.querySelector("#nombreusuario");
var campocontrasenia = document.querySelector("#contrasenia");
var camporepetircontrasenia = document.querySelector("#repetircontrasenia");
var formadministrador = document.querySelector("#formadministrador");
var formregistro = document.querySelector("#formregistro");
function emptyNombreAdministrador(){
    camponombreadministrador.setCustomValidity("Se requiere el nombre del administrador");
}
function emptyContraseniaAdministrador(){
    campocontraseniaadministrador.setCustomValidity("Se requiere la contraseña del administrador");
}
function emptyNombre(){
    camponombre.setCustomValidity("Se requiere por lo menos un nombre");
}
function emptyApellido(){
    campoapellidos.setCustomValidity("Se requiere por lo menos un apellido");
}
function emptyNacionalidad(){
    camponacionalidad.setCustomValidity("Se requiere la nacionalidad del usuario");
}
function emptyEmail(){
    campoemail.setCustomValidity("Se requiere el email del usuario");
}
function emptyNumTelefono(){
    campocelular.setCustomValidity("Se requiere un numero de telefono valido");
}
function emptyContrasenia(){
    campocontrasenia.setCustomValidity("Se requiere una contraseña para el usuario");
}
function emptyRepetirContrasenia(){
    camporepetircontrasenia.setCustomValidity("Repita la contraseña");
}
function emptyNombreDeUsuario(){
    camponombreusuario.setCustomValidity("Se requiere un nombre de usuario");
}
function submitForms() {
    if(formadministrador != null){
        formadministrador.submit();
    }
    formregistro.submit();
}