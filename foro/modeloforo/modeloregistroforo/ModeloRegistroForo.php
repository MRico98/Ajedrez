<?php

include("../../../utilidades/ConexionDatabase.php");

class ModeloRegistroForo extends ConexionDatabase {

    public function registroForo($idusuario,$tituloforo,$descripcionforo,$fecha){
        $peticion = 'INSERT INTO ajedrez.foro (nombreusuario,titulo,descripcion,fechapublicacion) VALUES ("'.$idusuario.'","'.$tituloforo.'","'.$descripcionforo.'","'.$fecha.'");';
        $this->hacerQuery($peticion);
    }

}