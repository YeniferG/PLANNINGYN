<?php

class LoginController{
    
    private static $loginService;
    private static $template;
    public function __construct(){
        self::$loginService = new LoginService();
        self::$template = new TemplateLogin();
    }
    
    public function ingresar(){
        $correo = filter_input(INPUT_POST, "correo");
        $clave = filter_input(INPUT_POST, "clave");
        $mensaje = null;
        if($correo && $clave){
            $usuario = self::$loginService->validarLogin($correo, $clave);
            if($usuario){
                $usuario->setClave(null);
                $_SESSION["user"] = serialize($usuario);
                header("Location: " . getUrlControllerMethod("Usuario","listar"));
                return;
            }
            $mensaje = "Verifique sus credenciales...";
        }

        self::$template->render(
            ["mensaje"=>$mensaje]
        );
    }

    public function cerrarSesion() {
        session_destroy();
        header("Location: " . getUrlControllerMethod("Login","ingresar"));
    }
}