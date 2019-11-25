<?php

include("../../../utilidades/ConexionDatabase.php");

class ModeloRegistroForo extends ConexionDatabase {

    public function registroForo($idusuario,$numeroforo,$tituloforo,$descripcionforo,$fecha){
        $peticion = 'INSERT INTO ajedrez.foro (nombreusuario,numforo,titulo,descripcion,fechapublicacion) VALUES ("'.$idusuario.'",'.$numeroforo.'+1 ,"'.$tituloforo.'","'.$descripcionforo.'","'.$fecha.'");';
        $this->hacerQuery($peticion);
    }

}