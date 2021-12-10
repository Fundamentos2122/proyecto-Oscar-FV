<?php

class Convocatoria{
    private $_id;
    private $_idEquipo;
    private $_descripcion;

    public function __construct($id, $idEquipo, $descripcion, $status){
        $this->setID($id);
        $this->setDescripcion($descripcion);
        $this->setIDEquipo($idEquipo);
    }

    public function getID(){
        return $this->_id;
    }
    public function setID($id){
        $this->_id = $id;
    }

    public function getIDEquipo(){
        return $this->_idAdmin;
    }
    public function setIDEquipo($idAdmin){
        $this->_idAdmin = $idAdmin;
    }

    public function getDescripcion(){
        return $this->_descripcion;
    }
    public function setDescripcion($descripcion){
        $this->_descripcion = $descripcion;
    }

    public function getStatus(){
        return $this->_status;
    }
    public function setStatus($status){
        $this->_status = $status;
    }

    public function returnJson(){
        $convocatoria = array();

        $convocatoria["id"] = $this->getID();
        $convocatoria["id_equipo"] = $this->getIDEquipo();
        $convocatoria["descripcion"] = $this->getDescripcion();
        $convocatoria["status"] = $this->getStatus();
    
        echo json_encode($convocatoria);
    }
}

?>