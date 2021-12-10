<?php

class Usuario{
    private $_id;
    private $_nombre;
    private $_apellido;
    private $_username;
    private $_summonername;
    private $_contrasena;
    private $_posicion;
    private $_equipo;
    private $_biografia;
    private $_foto;
    private $_tipoUsuario;

    public function __construct($id, $nombre, $apellido, $username, $summonername, $contrasena, $posicion, $equipo, $biografia, $foto, $tipoUsuario){
        $this->setID($id);
        $this->setNombre($nombre);
        $this->setApellido($apellido);
        $this->setUsername($username);
        $this->setSummonername($summonername);
        $this->setContrasena($contrasena);
        $this->setFoto($foto);
        $this->setBiografia($biografia);
        $this->setEquipo($equipo);
        $this->setPosicion($posicion);
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

    public function getApellido(){
        return $this->_apellido;
    }
    public function setApellido($apellido){
        $this->_apellido = $apellido;
    }

    public function getUsername(){
        return $this->_username;
    }
    public function setUsername($username){
        $this->_username = $username;
    }

    public function getSummonername(){
        return $this->_summonername;
    }
    public function setSummonername($summonername){
        $this->_summonername = $summonername;
    }

    public function getContrasena(){
        return $this->_contrasena;
    }
    public function setContrasena($contrasena){
        $this->_contrasena = $contrasena;
    }

    public function getPosicion(){
        return $this->_posicion;
    }
    public function setPosicion($posicion){
        $this->_posicion = $posicion;
    }

    public function getFoto(){
        return $this->_foto;
    }
    public function setFoto($foto){
        $this->_foto = base64_encode($foto);
    }

    public function getEquipo(){
        return $this->_equipo;
    }
    public function setEquipo($equipo){
        $this->_equipo = $equipo;
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
        $usuario = array();

        $usuario["id"] = $this->getID();
        $usuario["nombre"] = $this->getNombre();
        $usuario["apellido"] = $this->getApellido();
        $usuario["username"] = $this->getUsername();
        $usuario["summonername"] = $this->getSummonername();
        $usuario["posicion"] = $this->getPosicion();
        $usuario["biografia"] = $this->getBiografia();
        $usuario["equipo"] = $this->getEquipo();
        $usuario["foto"] = $this->getFoto();

        echo json_encode($usuario);
    }
}

?>