<?php

class Torneo{
    private $_id;
    private $_idAdmin;
    private $_descripcion;
    private $_foto;
    private $_premio1;
    private $_premio2;
    private $_premio3;

    public function __construct($id, $idAdmin, $descripcion, $foto, $premio1, $premio2, $premio3){
        $this->setID($id);
        $this->setDescripcion($descripcion);
        $this->setFoto($foto);
        $this->setIDAdmin($idAdmin);
        $this->setPremio1($premio1);
        $this->setPremio2($premio2);
        $this->setPremio3($premio3);
    }

    public function getID(){
        return $this->_id;
    }
    public function setID($id){
        $this->_id = $id;
    }

    public function getIDAdmin(){
        return $this->_idAdmin;
    }
    public function setIDAdmin($idAdmin){
        $this->_idAdmin = $idAdmin;
    }

    public function getDescripcion(){
        return $this->_descripcion;
    }
    public function setDescripcion($descripcion){
        $this->_descripcion = $descripcion;
    }

    public function getfoto(){
        return $this->_foto;
    }
    public function setfoto($foto){
        $this->_foto = $foto;
    }

    public function getPremio1(){
        return $this->_premio1;
    }
    public function setPremio1($premio1){
        $this->_premio1 = $premio1;
    }

    public function getPremio2(){
        return $this->_premio2;
    }
    public function setPremio2($premio2){
        $this->_premio2 = $premio2;
    }

    public function getPremio3(){
        return $this->_premio3;
    }
    public function setPremio3($premio3){
        $this->_premio3 = $premio3;
    }

    public function returnJson(){
        $convocatoria = array();

        $convocatoria["id"] = $this->getID();
        $convocatoria["id_admin"] = $this->getIDAdmin();
        $convocatoria["descripcion"] = $this->getDescripcion();
        $convocatoria["premio1"] = $this->getPremio1();
        $convocatoria["premio2"] = $this->getPremio2();
        $convocatoria["premio3"] = $this->getPremio3();
        $convocatoria["foto"] =	$this->getFoto();
    
        echo json_encode($convocatoria);
    }
}

?>