<?php

include ("Usuario.php");
include("ConexionDatabase.php");

class ModeloRegistro
{
    private $usuarioaregistrar;
    private $ConexionBaseDeDatos;

    /**
     * ModeloRegistro constructor.
     * @throws Exception
     */
    public function __construct()
    {
        $this->usuarioaregistrar = new Usuario();
        $this->ConexionBaseDeDatos = new ConexionDatabase();
    }

    public function setEmailUsuario($email){
        $consulta = 'SELECT email FROM ajedrez.usuario WHERE email LIKE "'.$email.'"';
        $resultado = $this->getConexionBaseDeDatos()->hacerQuery($consulta);
        if($resultado->num_rows>0){
            throw new Exception("Esta cuenta de Email ya esta registrada");
        }
        $this->usuarioaregistrar->setEmail($email);
    }

    public function setCelularUsuario($celular){
        if($celular == null){
            $this->usuarioaregistrar->setCelular(0);
            return;
        }
        $consulta = 'SELECT celular FROM ajedrez.usuario WHERE celular LIKE "'.$celular.'"';
        $resultado = $this->getConexionBaseDeDatos()->hacerQuery($consulta);
        if($resultado->num_rows>0){
            throw new Exception("Esta numero de telefono ya existe");
        }
        $this->usuarioaregistrar->setCelular($celular);
    }

    public function setNickname($nickname){
        $consulta = 'SELECT nombreusuario FROM ajedrez.usuario WHERE nombreusuario LIKE "'.$nickname.'"';
        $resultado = $this->getConexionBaseDeDatos()->hacerQuery($consulta);
        if($resultado->num_rows>0){
            throw new Exception("Este nickname ya existe");
        }
        $this->usuarioaregistrar->setNombreusuario($nickname);
    }

    public function setContraseniaUsuario($contrasenia,$repeticioncontrasenia)
    {
        if($contrasenia == $repeticioncontrasenia) {
            $this->usuarioaregistrar->setContrasenia($contrasenia);
        }
        else{
            throw Exception("Las contraseñas no coinciden");
        }
    }

    public function setDescripcionUsuario($descripcion){
        $this->usuarioaregistrar->setDescripcion($descripcion);
    }

    public function setImagenUsuario($imagen){
        $this->usuarioaregistrar->setImagen($imagen);
    }

    public function setTipoUsuario($tipousuario){
        $this->usuarioaregistrar->setTipousuario($tipousuario);
    }

    public function getConexionBaseDeDatos()
    {
        return $this->ConexionBaseDeDatos;
    }

    public function setNombresUsuario($nombres){
        $this->usuarioaregistrar->setNombres($nombres);
    }

    public function setApellidosUsuario($apellidos){
        $this->usuarioaregistrar->setApellidos($apellidos);
    }

    public function setNacionalidad($nacionalidad){
        $this->usuarioaregistrar->setNacionalidad($nacionalidad);
    }

    public function setSexoUsario($sexo){
        $this->usuarioaregistrar->setSexo($sexo);
    }

    public function validarLogin($usuario,$contrasenia){
        $consulta = 'SELECT * FROM ajedrez.usuario WHERE nombreusuario LIKE "'.$usuario.'" AND contrasenia LIKE "'.$contrasenia.'" AND tipousuario LIKE "admin";';
        $resultado = $this->getConexionBaseDeDatos()->hacerQuery($consulta);
        if($resultado->num_rows==0){
            throw new Exception("El nombre del administrador no concuerda con la contraseña");
        }
    }

    public function ejecutarInsert(){
        $nombredelusuario = $this->usuarioaregistrar->getNombreusuario();
        $descripcion = $this->usuarioaregistrar->getDescripcion();
        $celular = intval($this->usuarioaregistrar->getCelular());
        $contraseniausuario = $this->usuarioaregistrar->getContrasenia();
        $fotoperfil = $this->usuarioaregistrar->getImagen();
        $nombres = $this->usuarioaregistrar->getNombres();
        $apellidos = $this->usuarioaregistrar->getApellidos();
        $nacionalidad = $this->usuarioaregistrar->getNacionalidad();
        $email = $this->usuarioaregistrar->getEmail();
        $sexo = $this->usuarioaregistrar->getSexo();
        $tipousuario = $this->usuarioaregistrar->getTipousuario();
        $sql = 'INSERT INTO ajedrez.usuario (nombreusuario, descripcion, celular,contrasenia,fotoperfil,nombres,apellidos,nacionalidad,email,sexo,tipousuario) VALUES ("'.$nombredelusuario.'","'.$descripcion.'",'.$celular.',"'.$contraseniausuario.'","'.$fotoperfil.'","'.$nombres.'","'.$apellidos.'","'.$nacionalidad.'","'.$email.'","'.$sexo.'","'.$tipousuario.'");';
        if (!$this->getConexionBaseDeDatos()->hacerQuery($sql)){
            throw new Exception("Fallo al hacer la query");
        }
    }

}