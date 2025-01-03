<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
require_once './config/global.php';
require_once './core/controladorBase.php';
require_once './core/controladorFrontal.php';

if (isset($_GET["controller"])) {
    $controllerObj = cargarControlador($_GET["controller"]);
    lanzarAccion($controllerObj);
} else {
    $controllerObj = cargarControlador(CONTROLADOR_DEFECTO);
    lanzarAccion($controllerObj);
}
