<?php
require_once 'core/ControladorBase.php';
require_once 'modelo/Reserva.php';

/**
 * Controlador para la gestión de reservas.
 */
class ReservaController extends ControladorBase
{

    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Muestra la vista para realizar una reserva.
     */
    public function reservar()
    {
        if (isset($_GET["ISBN"])) {
            $ISBN = $_GET["ISBN"];
            $this->view("reservas/reservar", array("ISBN" => $ISBN));
        } else {
            $this->redirect("Libro", "index");
        }
    }

    /**
     * Inserta una nueva reserva en la base de datos.
     */
    public function guardar()
    {
        if (isset($_POST["ISBN"]) && isset($_POST["id_usuario"]) && isset($_POST["fecha_desde"]) && isset($_POST["fecha_hasta"])) {
            $ISBN = $_POST["ISBN"];
            $id_usuario = $_POST["id_usuario"];
            $fecha_desde = $_POST["fecha_desde"];
            $fecha_hasta = $_POST["fecha_hasta"];

            $reservaModel = new Reserva();
            $reservaModel->insertarReserva($ISBN, $id_usuario, $fecha_desde, $fecha_hasta);
            $this->redirect("Libro", "index");
        } else {
            $this->redirect("Reserva", "reservar");
        }
    }
}
