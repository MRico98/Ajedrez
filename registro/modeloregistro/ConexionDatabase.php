<?php


class ConexionDatabase
{

    private $servidor = "69.46.5.165:85";
    private $nombreusuario = "root";
    private $contrasenia = "admin";
    private $basededatos = "ajedrez";
    private $conexion;

    public function __construct()
    {
        $this->conexion = new mysqli($this->getServidor(), $this->getNombreusuario(), $this->getContrasenia(),$this->getBasededatos());
        if($this->getConexion()->connect_error){
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
     * @return string
     */
    public function getNombreusuario()
    {
        return $this->nombreusuario;
    }

    /**
     * @return string
     */
    public function getContrasenia()
    {
        return $this->contrasenia;
    }

    /**
     * @return string
     */
    public function getBasededatos()
    {
        return $this->basededatos;
    }

    /**
     * @return mysqli
     */
    public function getConexion()
    {
        return $this->conexion;
    }

    public function hacerQuery($cadena){
        return $this->conexion->query($cadena);
    }
    
}