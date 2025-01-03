<?php

/**
 * Clase base para los controladores.
 */
class ControladorBase
{

    public function __construct()
    {
        require_once "core/Banco.php";
        foreach (glob("modelo/*.php") as $file) {
            require_once $file;
        }
    }

    /**
     * Genera la URL para un controlador y acción específicos.
     *
     * @param string $controlador El nombre del controlador.
     * @param string $accion La acción a ejecutar.
     * @param string $num Parámetro adicional opcional.
     * @return string La URL generada.
     */
    public function url($controlador = CONTROLADOR_DEFECTO, $accion = ACCION_DEFECTO, $num = "")
    {
        $urlString = "index.php?controller=" . $controlador . "&action=" . $accion;
        if ($num) {
            $urlString .= "&num=" . $num;
        }
        return $urlString;
    }

    /**
     * Carga la vista correspondiente con los datos proporcionados.
     *
     * @param string $vista La vista a cargar.
     * @param array $data Los datos a pasar a la vista.
     */
    public function view($vista, $data)
    {
        foreach ($data as $id_assoc => $value) {
            $$id_assoc = $value;
        }
        require_once 'vista/comun/cabecera.php';
        require_once 'vista/' . $vista . 'View.php';
        require_once 'vista/comun/pie.php';
    }

    /**
     * Redirige a un controlador y acción específicos.
     *
     * @param string $controlador El nombre del controlador.
     * @param string $accion La acción a ejecutar.
     */
    public function redirect($controlador = CONTROLADOR_DEFECTO, $accion = ACCION_DEFECTO)
    {
        header("Location:index.php?controller=" . $controlador . "&action=" . $accion);
    }
}
