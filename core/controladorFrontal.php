<?php

/**
 * Carga el controlador solicitado.
 *
 * @param string $controller El nombre del controlador.
 * @return object El objeto del controlador.
 */
function cargarControlador($controller)
{
    $controlador = ucwords($controller) . 'Controller';
    $strFileController = 'controller/' . $controlador . '.php';

    if (!is_file($strFileController)) {
        $strFileController = 'controller/' . CONTROLADOR_DEFECTO . 'Controller.php';
        $controlador = CONTROLADOR_DEFECTO . 'Controller';
    }

    require_once $strFileController;
    $controllerObj = new $controlador();
    return $controllerObj;
}

/**
 * Carga la acción solicitada del controlador.
 *
 * @param object $controllerObj El objeto del controlador.
 * @param string $action La acción a ejecutar.
 */
function cargarAccion($controllerObj, $action)
{
    $accion = $action;
    $controllerObj->$accion();
}

/**
 * Lanza la acción del controlador.
 *
 * @param object $controllerObj El objeto del controlador.
 */
function lanzarAccion($controllerObj)
{
    if (isset($_GET["action"]) && method_exists($controllerObj, $_GET["action"])) {
        cargarAccion($controllerObj, $_GET["action"]);
    } else {
        cargarAccion($controllerObj, ACCION_DEFECTO);
    }
}
