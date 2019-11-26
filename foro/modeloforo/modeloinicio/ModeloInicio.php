<?php

include("../../../utilidades/ConexionDatabase.php");

class ModeloInicio extends ConexionDatabase
{
    public function getPaginacionElements($inicio,$fin){
        $peticion = 'SELECT * FROM ajedrez.foro ORDER BY fechapublicacion DESC LIMIT '.$inicio.','.$fin;
        return $this->hacerQuery($peticion);
    }

    public function numForos(){
        $peticion = 'SELECT * FROM ajedrez.foro';
        return $this->hacerQuery($peticion)->num_rows;
    }
}