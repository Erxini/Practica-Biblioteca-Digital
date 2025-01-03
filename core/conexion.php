<?php

abstract class Conexion
{

    private $conexion;
    private $mensajeerror = "";

    public function getConexion()
    {
        try {
            $this->conexion = new PDO(
                "mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . ";charset=utf8",
                DB_USER,
                DB_PASS
            );
            $this->conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $this->conexion;
        } catch (PDOException $e) {
            $this->mensajeerror = $e->getMessage();
        }
    }

    public function closeConexion()
    {
        $this->conexion = null;
    }

    public function getMensajeError()
    {
        return $this->mensajeerror;
    }

    public function getAllreg($tabla)
    {
        try {
            $sql = "SELECT * FROM $tabla";
            $statement = $this->conexion->query($sql);
            $registros = $statement->fetchAll();
            $statement = null;
            return $this->registros;
        } catch (PDOException $e) {
            $this->mensajeerror = $e->getMessage();
        }
    }
}
