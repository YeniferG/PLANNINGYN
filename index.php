<?php
require("config/init.php");

$nombreDelControlador = $_GET["controller"];
$nombreDelMetodo = $_GET["method"];

if($nombreDelControlador){
    if(ValidacionSession::validar($nombreDelControlador, $nombreDelMetodo)){
        $nombreDelControlador .= "Controller";
        $controller = new $nombreDelControlador();
        $controller->$nombreDelMetodo();
    }
}