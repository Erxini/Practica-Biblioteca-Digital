<?php
class PrestamosModel extends Conexion
{

    private $table;
    private $conexion;

    public function __construct()
    {
        $this->table = "prestamos";
        $this->conexion = $this->getConexion();
    }

    public function getPrestamos()
    {
        $objetos = array();
        try {
            $sql = "SELECT * FROM $this->table";
            $statement = $this->conexion->query($sql);
            $registros = $statement->fetchAll();
            $statement = null;
            // Retorna array de objetos
            foreach ($registros as $row) {
                array_push($objetos, new Prestamos(
                    $row['id'],
                    $row['ISBN'],
                    $row['id_usuario'],
                    $row['fecha_desde'],
                    $row['fecha_hasta']
                ));
            }
            return $objetos;
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }

    public function getPrestamoById($id)
    {
        try {
            $sql = "SELECT * FROM $this->table WHERE id = ?";
            $sentencia = $this->conexion->prepare($sql);
            $sentencia->bindParam(1, $id);
            $sentencia->execute();
            $row = $sentencia->fetch();
            if ($row) {
                return new Prestamos(
                    $row['id'],
                    $row['ISBN'],
                    $row['id_usuario'],
                    $row['fecha_desde'],
                    $row['fecha_hasta']
                );
            }
            return null;
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }

    public function insertarPrestamo($ISBN, $id_usuario, $fecha_desde, $fecha_hasta)
    {
        $consulta = "INSERT INTO prestamos (ISBN, id_usuario, fecha_desde, fecha_hasta) VALUES (?, ?, ?, ?)";
        $conn = $this->getConexion();
        if ($conn == null) {
            return "<h2>ERROR. CONEXIÓN NO ESTABLECIDA.</h2>";
        }
        try {
            $sentencia = $conn->prepare($consulta);
            $sentencia->bindParam(1, $ISBN);
            $sentencia->bindParam(2, $id_usuario);
            $sentencia->bindParam(3, $fecha_desde);
            $sentencia->bindParam(4, $fecha_hasta);
            $num = $sentencia->execute();
            return $conn->lastInsertId();
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }

    public function actualizarPrestamo($id, $ISBN, $id_usuario, $fecha_desde, $fecha_hasta)
    {
        $consulta = "UPDATE prestamos SET ISBN = ?, id_usuario = ?, fecha_desde = ?, fecha_hasta = ? WHERE id = ?";
        $conn = $this->getConexion();
        if ($conn == null) {
            return "<h2>ERROR. CONEXIÓN NO ESTABLECIDA.</h2>";
        }
        try {
            $sentencia = $conn->prepare($consulta);
            $sentencia->bindParam(1, $ISBN);
            $sentencia->bindParam(2, $id_usuario);
            $sentencia->bindParam(3, $fecha_desde);
            $sentencia->bindParam(4, $fecha_hasta);
            $sentencia->bindParam(5, $id);
            $num = $sentencia->execute();
            return "Préstamo con ID " . $id . " actualizado.";
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }

    public function borrarPrestamo($id)
    {
        $consulta = "DELETE FROM prestamos WHERE id = ?";
        $conn = $this->getConexion();
        if ($conn == null) {
            return "<h2>ERROR. CONEXIÓN NO ESTABLECIDA.</h2>";
        }
        try {
            $sentencia = $conn->prepare($consulta);
            $sentencia->bindParam(1, $id);
            $num = $sentencia->execute();
            return "Préstamo con ID " . $id . " borrado.";
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }
}
