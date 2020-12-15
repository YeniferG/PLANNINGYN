<?php

class TareaService{

    public function consultarPorUsuario($id){
        $tareas = [];
        $pdo = ConexionBD::getPDO();
        $stm = $pdo->prepare("SELECT * FROM tareas WHERE usuarios_id = :id");
        $stm->bindValue(":id",$id,PDO::PARAM_INT);
        if($stm->execute()){
            while($fila = $stm->fetch(PDO::FETCH_OBJ)){
                array_push($tareas, $this->toTarea($fila));
            }
        }
        return $tareas;
    }

    public function registrarTarea($tarea){
        $pdo = ConexionBD::getPDO();
        $stm = $pdo->prepare("INSERT INTO tareas (fecha_vencimiento,descripcion,estado,prioridad,usuarios_id)
                            VALUES(:fecha_vencimiento,:descripcion,:estado,:prioridad,:usuarios_id) ");
        $stm->bindValue(":fecha_vencimiento",$tarea->getFechaVencimiento(),PDO::PARAM_STR);
        $stm->bindValue(":descripcion",$tarea->getDescripcion(),PDO::PARAM_STR);
        $stm->bindValue(":estado",$tarea->getEstado(),PDO::PARAM_STR);
        $stm->bindValue(":prioridad",$tarea->getPrioridad(),PDO::PARAM_STR);
        $stm->bindValue(":usuarios_id",unserialize($_SESSION["user"])->getId(),PDO::PARAM_INT);
        $stm->execute();
    }

    public function eliminarTarea($id){
        $pdo = ConexionBD::getPDO();
        $stm = $pdo->prepare("DELETE FROM tareas WHERE id =:id");
        $stm->bindValue(":id",$id,PDO::PARAM_INT);
        $stm->execute();
    }

    public function buscarPorId($id){
        $tarea = new Tarea();
        $pdo = ConexionBD::getPDO();
        $stm = $pdo->prepare("SELECT * FROM tareas WHERE id = :id");
        $stm->bindValue(":id",$id,PDO::PARAM_INT);
        if($stm->execute()){
            if($fila = $stm->fetch(PDO::FETCH_OBJ)){
                $tarea = $this->toTarea($fila); 
            }
        }
        return $tarea;
    }

    public function actualizarTarea($tarea){
        $pdo = ConexionBD::getPDO();
        $stm = $pdo->prepare("UPDATE tareas SET fecha_vencimiento = :fv,descripcion=:d,estado=:e,prioridad=:p WHERE id=:id");
        $stm->bindValue(":id",$tarea->getId(),PDO::PARAM_INT);
        $stm->bindValue(":fv",$tarea->getFechaVencimiento(),PDO::PARAM_STR);
        $stm->bindValue(":d",$tarea->getDescripcion(),PDO::PARAM_STR);
        $stm->bindValue(":e",$tarea->getEstado(),PDO::PARAM_STR);
        $stm->bindValue(":p",$tarea->getPrioridad(),PDO::PARAM_STR);
        $stm->execute();
    }


    private function toTarea($tareaUsuario){
        $tarea = new Tarea();
        $tarea->setId($tareaUsuario->id);
        $tarea->setFechaVencimiento($tareaUsuario->fecha_vencimiento);
        $tarea->setDescripcion($tareaUsuario->descripcion);
        $tarea->setEstado($tareaUsuario->estado);
        $tarea->setPrioridad($tareaUsuario->prioridad);
        return $tarea;
    }

}