var camponombre = document.querySelector("#nombre");
var campoapellidos = document.querySelector("#apellidos");
var camponacionalidad = document.querySelector("#nacionalidad");
var campocelular = document.querySelector("#celular");
var campocontrasenia = document.querySelector("#contrasenia");
var camporepetircontrasenia = document.querySelector("#repetircontrasenia");
var formregistro = document.querySelector("#formregistro");
var backgrounderror = "tomato";
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
function submitForms() {
    if(!camponombre.checkValidity()){
        emptyNombre();
        return
    }
    if(!campoapellidos.checkValidity()) {
        emptyApellido();
        return
    }
    if(!camponacionalidad.checkValidity()){
        emptyNacionalidad();
        return
    }
    if(!campocelular.checkValidity()){
        emptyNumTelefono();
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