<?php

class ModeloRegistro
{
    private $servidor = "69.46.5.165:83";
    private $nombreusuario = "Administrador";
    private $contrasenia = "Proyecto2019";
    private $conn;

    /**
     * ModeloRegistro constructor.
     * @throws Exception
     */
    public function __construct()
    {
        $this->conn = new mysqli($this->getServidor(), $this->getNombreusuario(), $this->getContrasenia());
        if($this->conn->connect_error){
            throw new Exception("Fallo+al+conectar+con+el+servidor.+Contacte+con+el+administrador");
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
     * @return mysqli
     */
    public function getConexion()
    {
        return $this->conexion;
    }

    /**
     * @param mysqli $conexion
     */
    public function setConexion($conexion)
    {
        $this->conexion = $conexion;
    }

}
