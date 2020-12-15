<?php

class LoginService{

    private static $usuarioService;

    public function __construct(){
        self::$usuarioService = new UsuarioService();
    }

    public function validarLogin($correo,$clave){
        $usuario = null;
        $pdo = ConexionBD::getPDO();
        $stm = $pdo->prepare("SELECT * FROM usuarios WHERE correo = :correo AND clave = MD5(:clave)");
        $stm->bindValue(":correo",$correo);
        $stm->bindValue(":clave",$clave);
        if($stm->execute()){
            if($fila = $stm->fetch(PDO::FETCH_OBJ)){
                $usuario = self::$usuarioService->toUsuario($fila);
            }
        }else{
            print_r($stm->errorInfo());
        }

        return $usuario;
    }
}