<?php
require_once 'config/database.php';

/**
 * Modelo para la gestión de reservas.
 */
class Reserva
{
    private $conexion;

    public function __construct()
    {
        $database = new Banco();
        $this->conexion = $database->conectar();
    }

    /**
     * Inserta una nueva reserva en la base de datos.
     *
     * @param string $ISBN El ISBN del libro.
     * @param int $id_usuario El ID del usuario.
     * @param string $fecha_desde La fecha de inicio de la reserva.
     * @param string $fecha_hasta La fecha de finalización de la reserva.
     * @return bool True si la inserción fue exitosa, false en caso contrario.
     */
    public function insertarReserva($ISBN, $id_usuario, $fecha_desde, $fecha_hasta)
    {
        try {
            $sql = "INSERT INTO reservas (ISBN, id_usuario, fecha_desde, fecha_hasta) VALUES (?, ?, ?, ?)";
            $sentencia = $this->conexion->prepare($sql);
            $sentencia->bindParam(1, $ISBN);
            $sentencia->bindParam(2, $id_usuario);
            $sentencia->bindParam(3, $fecha_desde);
            $sentencia->bindParam(4, $fecha_hasta);
            return $sentencia->execute();
        } catch (PDOException $e) {
            echo 'Error: ' . $e->getMessage();
            return false;
        }
    }

    // Otros métodos para la gestión de reservas...
}
