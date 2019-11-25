<?php

include("../../../utilidades/ConexionDatabase.php");

class ModeloEdicionUsuario extends ConexionDatabase
{
    private $nombreusuarioactual;
    private $descripcion;
    private $celular;
    private $nuevacontrasenia;
    private $fotoperfil;
    private $nombres;
    private $apellidos;
    private $nacionalidad;
    private $sexo;
    private $contraseniarepe;

    /**
     * ModeloEdicionUsuario constructor.
     * @param $nombreusuarioactual
     * @param $descripcion
     * @param $celular
     * @param $nuevacontrasenia
     * @param $fotoperfil
     * @param $nombres
     * @param $apellidos
     * @param $nacionalidad
     * @param $sexo
     * @throws Exception
     */
    public function __construct($nombreusuarioactual, $descripcion, $celular, $nuevacontrasenia,$contraseniarepe, $fotoperfil, $nombres, $apellidos, $nacionalidad, $sexo)
    {
        $this->nombreusuarioactual = $nombreusuarioactual;
        $this->descripcion = $descripcion;
        $this->celular = $celular;
        $this->nuevacontrasenia = $nuevacontrasenia;
        $this->fotoperfil = $fotoperfil;
        $this->nombres = $nombres;
        $this->apellidos = $apellidos;
        $this->nacionalidad = $nacionalidad;
        $this->sexo = $sexo;
        $this->contraseniarepe = $contraseniarepe;
        $this->comprobarContrasenias();
    }

    private function comprobarContrasenias(){
        if($this->nuevacontrasenia != $this->contraseniarepe){
            throw new Exception("Las+contrasenias+no+coinciden");
        }
    }

    public function edicionUsuario(){
        $operacion = 'UPDATE ajedrez.usuario SET descripcion = "'.$this->descripcion.'", celular = "'.$this->celular.'", contrasenia = "'.$this->nuevacontrasenia.'", fotoperfil = "ruta", nombres = "'.$this->nombres.'", apellidos = "'.$this->apellidos.'", nacionalidad = "'.$this->nacionalidad.'", sexo = "'.$this->sexo.'" WHERE (nombreusuario LIKE "'.$this->nombreusuarioactual.'");';
        echo $operacion;
        $this->hacerQuery($operacion);
    }
}