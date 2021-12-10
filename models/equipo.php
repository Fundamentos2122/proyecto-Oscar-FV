<?php

class Equipo{
    private $_id;
    private $_nombre;
    private $_username;
    private $_contrasena;
    private $_biografia;
    private $_foto;
    private $_Top;
    private $_Jg;
    private $_Mid;
    private $_Adc;
    private $_Supp;

    public function __construct($id, $nombre, $username, $contrasena, $top, $jg, $mid, $adc, $supp, $biografia,  $foto, $tipoUsuario){
        $this->setID($id);
        $this->setNombre($nombre);
        $this->setUsername($username);
        $this->setConTrasena($contrasena);
        $this->setTop($top);
        $this->setJg($jg);
        $this->setMid($mid);
        $this->setAdc($adc);
        $this->setSupp($supp);
        $this->setBiografia($biografia);
        $this->setFoto($foto);
        $this->setTipoUsuario($tipoUsuario);
    }

    public function getID(){
        return $this->_id;
    }
    public function setID($id){
        $this->_id = $id;
    }

    public function getNombre(){
        return $this->_nombre;
    }
    public function setNombre($nombre){
        $this->_nombre = $nombre;
    }

    public function getUsername(){
        return $this->_username;
    }
    public function setUsername($username){
        $this->_username = $username;
    }

    public function getContrasena(){
        return $this->_contrasena;
    }
    public function setContrasena($contrasena){
        $this->_contrasena = $contrasena;
    }

    public function getFoto(){
        return $this->_foto;
    }
    public function setFoto($foto){
        $this->_foto = base64_encode($foto);
    }

    public function getTop(){
        return $this->_Top;
    }
    public function setTop($top){
        $this->_Top = $top;
    }

    public function getJg(){
        return $this->_Jg;
    }
    public function setJg($jg){
        $this->_Jg = $jg;
    }

    public function getMid(){
        return $this->_Mid;
    }
    public function setMid($mid){
        $this->_Mid = $mid;
    }
    
    public function getAdc(){
        return $this->_Adc;
    }
    public function setAdc($adc){
        $this->_Adc = $adc;
    }

    public function getSupp(){
        return $this->_Supp;
    }
    public function setSupp($supp){
        $this->_Supp = $supp;
    }

    public function getBiografia(){
        return $this->_biografia;
    }
    public function setBiografia($biografia){
        $this->_biografia = $biografia;
    }

    public function getTipoUsuario(){
        return $this->_tipoUsuario;
    }
    public function setTipoUsuario($tipoUsuario){
        $this->_tipoUsuario = $tipoUsuario;
    }

    public function returnJson(){
        $equipo = array();

        $equipo["id"] = $this->getID();
        $equipo["nombre"] = $this->getNombre();
        $equipo["username"] = $this->getUsername();
        $equipo["biografia"] = $this->getBiografia();
        $equipo["top"] = $this->getTop();
        $equipo["jg"] = $this->getJg();
        $equipo["mid"] = $this->getMid();
        $equipo["adc"] = $this->getAdc();
        $equipo["supp"] = $this->getSupp();
        $equipo["foto"] = $this->getFoto();

        echo json_encode($equipo);
    }
}

?>