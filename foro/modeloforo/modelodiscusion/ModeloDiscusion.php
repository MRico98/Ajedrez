<?php

include("../../../utilidades/ConexionDatabase.php");

class ModeloDiscusion extends ConexionDatabase
{

    public function getInfoForo($numforo,$idautor){
        $peticion = 'SELECT * FROM ajedrez.foro WHERE nombreusuario LIKE "'.$idautor.'" AND numforo = '.$numforo.';';
        return $this->hacerQuery($peticion);
    }

    public function getInfoUsuario($idusuario){
        $peticion = 'SELECT * FROM ajedrez.usuario WHERE nombreusuario LIKE "'.$idusuario.'";';
        return $this->hacerQuery($peticion);
    }

    public function registrarComentario($autor,$numerocomentario,$autorforo,$numeroforo,$comentario,$fecha){
        $peticion = 'INSERT INTO ajedrez.comentarios (autorcomentario, numcomentario, autorforo,numeroforo,comentario,fechacomentario) VALUES ("'.$autor.'",'.$numerocomentario.',"'.$autorforo.'",'.$numeroforo.',"'.$comentario.'","'.$fecha.'");';
        $this->hacerQuery($peticion);
    }

    public function getInfoComentarios($autorforo,$numeroforo){
        $peticion = 'SELECT * FROM ajedrez.comentarios WHERE autorforo LIKE "'.$autorforo.'" AND numeroforo = '.$numeroforo.' ORDER BY fechacomentario ASC; ';
        return $this->hacerQuery($peticion);
    }

}