<?php

Class Tarea {
    private $id;
    private $fechaVencimiento;
    private $descripcion;
    private $estado;
    private $prioridad;
    private $usuario; 

    public function getId(){
        return $this->id;
    }

    public function setId($id){
        $this->id = $id;
    }

    public function getFechaVencimiento(){
        return $this->fechaVencimiento;
    }

    public function setFechaVencimiento($fechaVencimiento){
        $this->fechaVencimiento = $fechaVencimiento;
    }

    public function getDescripcion(){
        return $this->descripcion;
    }

    public function setDescripcion($descripcion){
        $this->descripcion = $descripcion;
    }

    public function getEstado(){
        return $this->estado;
    }

    public function setEstado($estado){
        $this->estado = $estado;
    }

    public function getPrioridad(){
        return $this->prioridad;
    }

    public function setPrioridad($prioridad){
        $this->prioridad = $prioridad;
    }

    public function getUsuario(){
        return $this->usuario;
    }

    public function setUsuario($usuario){
        $this->usuario = $usuario;
    }
}