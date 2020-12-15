<?php

class TareaController{
    
    private static $tareaService;
    private static $template;
    public function __construct(){
        self::$tareaService = new TareaService();
        self::$template = new Template();
    }

    public function consultar(){
        $usuarioSesion =  unserialize($_SESSION["user"]) ;
        $tareas = self::$tareaService->consultarPorUsuario($usuarioSesion->getId());
        self::$template->render(
            DIR_VIEW . "tarea/listar.php",
            ["listaTareas"=>$tareas]
        );
    }


    public function registro(){
        self::$template->render(
            DIR_VIEW . "tarea/registro.php"
        );
    }

    public function registrar(){
        $tarea = new Tarea();
        $tarea->setFechaVencimiento(filter_input(INPUT_POST,"fecha_vencimiento"));
        $tarea->setDescripcion(filter_input(INPUT_POST,"descripcion"));
        $tarea->setEstado(filter_input(INPUT_POST,"estado"));
        $tarea->setPrioridad(filter_input(INPUT_POST,"prioridad"));
        self::$tareaService->registrarTarea($tarea);
        $usuarioSesion =  unserialize($_SESSION["user"]) ;
        $tareas = self::$tareaService->consultarPorUsuario($usuarioSesion->getId());
        self::$template->render(
            DIR_VIEW . "tarea/listar.php",
            ["listaTareas"=>$tareas]
        );
    }

    public function eliminar(){
        self::$tareaService->eliminarTarea(filter_input(INPUT_POST,"id"));
        $usuarioSesion =  unserialize($_SESSION["user"]) ;
        $tareas = self::$tareaService->consultarPorUsuario($usuarioSesion->getId());
        self::$template->render(
            DIR_VIEW . "tarea/listar.php",
            ["listaTareas"=>$tareas]
        );
    }


    public function editar(){
        $tarea = self::$tareaService->buscarPorId(filter_input(INPUT_POST,"idActualizar"));
        self::$template->render(
            DIR_VIEW . "tarea/editar.php",
            ["tarea"=>$tarea]
        );
    }

    public function actualizar(){
        $tarea = new Tarea();
        $tarea->setId(filter_input(INPUT_POST,"id"));
        $tarea->setFechaVencimiento(filter_input(INPUT_POST,"fecha_vencimiento"));
        $tarea->setDescripcion(filter_input(INPUT_POST,"descripcion"));
        $tarea->setEstado(filter_input(INPUT_POST,"estado"));
        $tarea->setPrioridad(filter_input(INPUT_POST,"prioridad"));
        self::$tareaService->actualizarTarea($tarea);
        $usuarioSesion =  unserialize($_SESSION["user"]) ;
        $tareas = self::$tareaService->consultarPorUsuario($usuarioSesion->getId());
        self::$template->render(
            DIR_VIEW . "tarea/listar.php",
            ["listaTareas"=>$tareas]
        );
    }

}