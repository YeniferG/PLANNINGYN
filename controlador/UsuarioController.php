<?php

class UsuarioController{

    private static $usuarioService;
    private static $template;

    public function __construct(){
        self::$usuarioService = new UsuarioService();
        self::$template = new Template();
    }

    public function listar(){
        $usuarios = self::$usuarioService->consultarTodos();
        self::$template->render(
            DIR_VIEW . "usuario/listar.php",
            ["usuarios"=>$usuarios]
        );
    }

    public function registro(){
        self::$template->render(
            DIR_VIEW . "usuario/registrar.php"
        );
    }

    public function registrar(){
        $usuario = new Usuario();
        $usuario->setNombre(filter_input(INPUT_POST,"nombre"));
        $usuario->setApellido(filter_input(INPUT_POST,"apellidos"));
        $usuario->setIdentificacion(filter_input(INPUT_POST,"identificacion"));
        $usuario->setCorreo(filter_input(INPUT_POST,"correo"));
        $usuario->setClave(filter_input(INPUT_POST,"clave"));       
        self::$usuarioService->registrarUsu($usuario);
        $usuarios = self::$usuarioService->consultarTodos();
        self::$template->render(
            DIR_VIEW . "usuario/listar.php",
            ["usuarios"=>$usuarios]
        );
    }

    public function eliminar(){
        self::$usuarioService->eliminarUsu(filter_input(INPUT_POST,"id"));
        $usuarios = self::$usuarioService->consultarTodos();
        self::$template->render(
            DIR_VIEW . "usuario/listar.php",
            ["usuarios"=>$usuarios]
        );
    }

    public function editar(){
        $id = filter_input(INPUT_POST,"idActualizar");
        $usuario = self::$usuarioService->buscarPorId($id);
        self::$template->render(
            DIR_VIEW . "usuario/editar.php",
            ["usuario"=>$usuario]
        );
    }

    public function actualizar(){
        $usuario = new Usuario();
        $usuario->setId(filter_input(INPUT_POST,"idUsuarioActualizar"));
        $usuario->setNombre(filter_input(INPUT_POST,"nombre"));
        $usuario->setApellido(filter_input(INPUT_POST,"apellidos"));
        $usuario->setIdentificacion(filter_input(INPUT_POST,"identificacion"));
        $usuario->setCorreo(filter_input(INPUT_POST,"correo"));
        $usuario->setClave(filter_input(INPUT_POST,"clave"));
        self::$usuarioService->actualizarUsu($usuario);
        $usuarios = self::$usuarioService->consultarTodos();
        self::$template->render(
            DIR_VIEW . "usuario/listar.php",
            ["usuarios"=>$usuarios]
        );
    }
}