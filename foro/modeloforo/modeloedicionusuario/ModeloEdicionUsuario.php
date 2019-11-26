<?php

include("../../../utilidades/ConexionDatabase.php");

class ModeloEdicionUsuario extends ConexionDatabase
{
    private $nombreusuarioactual;
    private $descripcion;
    private $celular;
    private $nuevacontrasenia;
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
     * @param $nombres
     * @param $apellidos
     * @param $nacionalidad
     * @param $sexo
     * @throws Exception
     */
    public function __construct($nombreusuarioactual, $descripcion, $celular, $nuevacontrasenia,$contraseniarepe, $nombres, $apellidos, $nacionalidad, $sexo)
    {
        parent::__construct();
        $this->nombreusuarioactual = $nombreusuarioactual;
        $this->descripcion = $descripcion;
        $this->celular = $celular;
        $this->nuevacontrasenia = $nuevacontrasenia;
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

    public function edicionUsuario($nombreusuarioactual, $descripcion, $celular, $nuevacontrasenia,$contraseniarepe, $nombres, $apellidos, $nacionalidad, $sexo){
        $operacion = 'UPDATE ajedrez.usuario SET descripcion = "'.$descripcion.'", celular = "'.$celular.'", contrasenia = "'.$nuevacontrasenia.'", nombres = "'.$nombres.'", apellidos = "'.$apellidos.'", nacionalidad = "'.$nacionalidad.'", sexo = "'.$sexo.'" WHERE (nombreusuario LIKE "'.$nombreusuarioactual.'");';
        $this->hacerQuery($operacion);
    }
}