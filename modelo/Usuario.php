<?php

class Usuario{
    private $id;
    private $nombre;
    private $apellidos;
    private $identificacion;
    private $correo;
    private $clave;

    public function getId(){
        return $this->id;
    }

    public function setId($id){
        $this->id = $id;
    }

    public function getNombre(){
        return $this->nombre;
    }

    public function setNombre($nombre){
        $this->nombre = $nombre;
    }

    public function getApellido(){
        return $this->apellido;
    }

    public function setApellido($apellido){
        $this->apellido = $apellido;
    }

    public function getIdentificacion(){
        return $this->identificacion;
    }

    public function setIdentificacion($identificacion){
        $this->identificacion = $identificacion;
    }

    public function getCorreo(){
        return $this->correo;
    }

    public function setCorreo($correo){
        $this->correo = $correo;
    }

    public function getClave(){
        return $this->clave;
    }

    public function setClave($clave){
        $this->clave = $clave;
    }
}