<?php

include ("Usuario.php");

class ModeloRegistro
{
    private $servidor = "69.46.5.165:85";
    private $nombreusuario = "Administrador";
    private $contrasenia = "Proyecto2019";
    private $basededatos = "ajedrez";
    private $conn;
    private $usuarioaregistrar;

    /**
     * ModeloRegistro constructor.
     * @throws Exception
     */
    public function __construct()
    {
        $this->usuarioaregistrar = new Usuario();
        $this->conn = new mysqli($this->getServidor(), $this->getNombreusuario(), $this->getContrasenia(),$this->getBasededatos());
        if($this->conn->connect_error){
            throw new Exception("Fallo+al+conectar+con+el+servidor.+Contacte+con+el+administrador");
        }
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

    public function setEmailUsuario($email){
        $consulta = "SELECT ajedrez.email FROM usuario WHERE email LIKE $email";
        if($consulta>0){
            throw new Exception("Esta cuenta de Email ya esta registrada");
        }
        $this->usuarioaregistrar->setEmail($email);
    }

    public function setCelularUsuario($celular){

        if($celular == null){
            $this->usuarioaregistrar->setCelular(0);
            return;
        }

        $consulta = "SELECT ajedrez.celular FROM usuario WHERE celulcar LIKE $celular";
        if($consulta>0){
            throw new Exception("Esta numero de telefono ya existe");
        }
        $this->usuarioaregistrar->setCelular($celular);
    }

    public function setNickname($nickname){
        $consulta = "SELECT ajedrez.nombreusuario FROM usuario WHERE nombreusuario LIKE $nickname";
        if($consulta>0){
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

        $sql = "INSERT INTO ajedrez.usuario (nombreusuario,descripcion,celular,contrasenia,fotoperfil,nombres,apellidos,nacionalidad,email,sexo,tipousuario) VALUES ($nombredelusuario,$descripcion,$celular,$contraseniausuario,$fotoperfil,$nombres,$apellidos,$nacionalidad,$email,$sexo,$tipousuario)";

        if (!$this->conn->query($sql)){
            throw new Exception("Fallo al hacer la query");
        }
    }

    /**
     * @return string
     */
    public function getServidor()
    {
        return $this->servidor;
    }

    /**
     * @param string $servidor
     */
    public function setServidor($servidor)
    {
        $this->servidor = $servidor;
    }

    /**
     * @return string
     */
    public function getNombreusuario()
    {
        return $this->nombreusuario;
    }

    /**
     * @param string $nombreusuario
     */
    public function setNombreusuario($nombreusuario)
    {
        $this->nombreusuario = $nombreusuario;
    }

    /**
     * @return string
     */
    public function getContrasenia()
    {
        return $this->contrasenia;
    }

    /**
     * @param string $contrasenia
     */
    public function setContrasenia($contrasenia)
    {
        $this->contrasenia = $contrasenia;
    }

    /**
     * @return mixed
     */
    public function getUsuarioaregistrar()
    {
        return $this->usuarioaregistrar;
    }

    /**
     * @param mixed $usuarioaregistrar
     */
    public function setUsuarioaregistrar($usuarioaregistrar)
    {
        $this->usuarioaregistrar = $usuarioaregistrar;
    }

    /**
     * @return string
     */
    public function getBasededatos()
    {
        return $this->basededatos;
    }

    /**
     * @param string $basededatos
     */
    public function setBasededatos($basededatos)
    {
        $this->basededatos = $basededatos;
    }



}