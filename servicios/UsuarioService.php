<?php

class UsuarioService{

    public function consultarTodos(){
        $usuarios =[];
        $pdo = ConexionBD::getPDO();
        $stm = $pdo->prepare("SELECT * FROM usuarios");        
        if($stm->execute()){
            while ($fila = $stm->fetch(PDO::FETCH_OBJ)) {
                array_push($usuarios, $this->toUsuario($fila));
            }
        }
        return $usuarios;
    }

    public function registrarUsu($usu){
        $pdo = ConexionBD::getPDO();        
        $stm = $pdo->prepare("INSERT INTO usuarios(nombre,apellidos,identificacion,correo,clave) 
        VALUES(:nom,:ape,:iden,:correo,MD5(:clave))"); 
        $stm->bindValue(":nom",$usu->getNombre(),PDO::PARAM_STR);
        $stm->bindValue(":ape",$usu->getApellido(),PDO::PARAM_STR);
        $stm->bindValue(":iden",$usu->getIdentificacion(),PDO::PARAM_STR);
        $stm->bindValue(":correo",$usu->getCorreo(),PDO::PARAM_STR);
        $stm->bindValue(":clave",$usu->getClave(),PDO::PARAM_STR);
        $stm->execute();
    }

    public function eliminarUsu($id){
        $pdo = ConexionBD::getPDO();
        $stm = $pdo->prepare("DELETE FROM usuarios WHERE id=:id");
        $stm->bindValue(":id",$id,PDO::PARAM_INT);
        $stm->execute();
    }

    public function buscarPorId($id){
        $usuario = new Usuario();
        $pdo = ConexionBD::getPDO();
        $stm = $pdo->prepare("SELECT * FROM usuarios WHERE id = :id");                
        $stm->bindValue(":id",$id,PDO::PARAM_INT);
        if($stm->execute()){
            if($fila = $stm->fetch(PDO::FETCH_OBJ)){
                $usuario = $this->toUsuario($fila);
            }
        } else{
            print_r($stm->errorInfo());
        }
        return $usuario;
    }

    public function actualizarUsu($usu){
        $pdo = ConexionBD::getPDO();
        $stm = $pdo->prepare("UPDATE usuarios 
            SET nombre =:nom,apellidos=:ape,identificacion=:ident,correo=:correo,clave=MD5(:cla) WHERE id = :idAct");
        $stm->bindValue(":idAct",$usu->getId(),PDO::PARAM_INT);
        $stm->bindValue(":nom",$usu->getNombre(),PDO::PARAM_STR);
        $stm->bindValue(":ape",$usu->getApellido(),PDO::PARAM_STR);
        $stm->bindValue(":ident",$usu->getIdentificacion(),PDO::PARAM_STR);
        $stm->bindValue(":correo",$usu->getCorreo(),PDO::PARAM_STR);
        $stm->bindValue(":cla",$usu->getClave(),PDO::PARAM_STR);
        $stm->execute();
    }

    public function toUsuario($datosUsu){
        $usu = new Usuario();
        $usu->setId($datosUsu->id);
        $usu->setNombre($datosUsu->nombre);
        $usu->setApellido($datosUsu->apellidos);
        $usu->setIdentificacion($datosUsu->identificacion);
        $usu->setCorreo($datosUsu->correo);
        $usu->setClave($datosUsu->clave);
        return $usu;
    }
}