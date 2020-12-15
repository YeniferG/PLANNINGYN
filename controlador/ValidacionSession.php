<?php
class ValidacionSession {

    private function __construct(){}

    public static function validar($controlador, $metodo){
        if($controlador != "Login" || $metodo != "ingresar"){
            if(!self::sessionIniciada()){
                header("Location: " . getUrlControllerMethod("Login", "ingresar"));
                return false;
            }
        }
        return true;
    }

    public static function sessionIniciada(){
        return isset($_SESSION["user"]) && $_SESSION["user"];
    }

}