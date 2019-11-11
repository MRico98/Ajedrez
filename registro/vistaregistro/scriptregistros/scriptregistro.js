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
var backgrounderror = "tomato";
function emptyNombreAdministrador(){
    camponombreadministrador.setCustomValidity("Se requiere el nombre del administrador");
    camponombreadministrador.value = "Se requiere el nombre del administrador";
    camponombreadministrador.style.background = backgrounderror;
    camponombreusuario.focus();
}
function emptyContraseniaAdministrador(){
    campocontraseniaadministrador.setCustomValidity("Se requiere la contraseña del administrador");
    campocontraseniaadministrador.style.background = backgrounderror;
    campocontraseniaadministrador.focus();
}
function emptyNombre(){
    camponombre.setCustomValidity("Se requiere por lo menos un nombre");
    camponombre.value = "Se requiere un nombre de usuario";
    camponombre.style.background = backgrounderror;
    camponombre.focus();
}
function emptyApellido(){
    campoapellidos.setCustomValidity("Se requiere por lo menos un apellido");
    campoapellidos.value = "Se requiere por lo menos un apellido";
    campoapellidos.style.background = backgrounderror;
    campoapellidos.focus();
}
function emptyNacionalidad(){
    camponacionalidad.setCustomValidity("Se requiere la nacionalidad del usuario");
    camponacionalidad.value = "Se requiere la nacionalidad del usuario";
    camponacionalidad.style.background = backgrounderror;
    camponacionalidad.focus();
}
function emptyEmail(){
    campoemail.setCustomValidity("Se requiere el email del usuario");
    campoemail.value = "Se requiere el email del usuario";
    campoemail.style.background = backgrounderror;
    campoemail.focus();
}
function emptyNumTelefono(){
    campocelular.setCustomValidity("Se requiere un numero de telefono valido");
    campocelular.style.background = backgrounderror;
    campocelular.focus();
}
function emptyContrasenia(){
    campocontrasenia.setCustomValidity("Se requiere una contraseña para el usuario");
    campocontrasenia.style.background = backgrounderror;
    campocontrasenia.focus();
}
function emptyRepetirContrasenia(){
    camporepetircontrasenia.setCustomValidity("Repita la contraseña");
    camporepetircontrasenia.style.background = backgrounderror;
    camporepetircontrasenia.focus();
}
function emptyNombreDeUsuario(){
    camponombreusuario.setCustomValidity("Se requiere un nombre de usuario");
    camponombreusuario.value = "Se requiere un nombre de usuario";
    camponombreusuario.style.background = backgrounderror;
    camponombreusuario.focus();
}
function submitForms() {
    if(formadministrador != null){
        if(!camponombreadministrador.checkValidity()){
            emptyNombreAdministrador();
            return;
        }
        if(!campocontraseniaadministrador.checkValidity()) {
            emptyContraseniaAdministrador();
            return;
        }
    }
    if(!camponombre.checkValidity()){
        emptyNombre();
        return
    }
    if(!campoapellidos.checkValidity()){
        emptyApellido();
        return
    }
    if(!camponacionalidad.checkValidity()){
        emptyNacionalidad();
        return
    }
    if(!campoemail.checkValidity()){
        emptyEmail();
        return
    }
    if(!campocelular.checkValidity()){
        emptyNumTelefono();
        return
    }
    if(!camponombreusuario.checkValidity()){
        emptyNombreDeUsuario();
        return
    }
    if(!campocontrasenia.checkValidity()){
        emptyContrasenia();
        return
    }
    if(!camporepetircontrasenia.checkValidity()){
        emptyRepetirContrasenia();
        return
    }
    formregistro.submit();
}