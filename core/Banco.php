<?php

class Banco
{
    const HOST = 'localhost:3306';
    const BANCO = 'biblioteca_digital';
    const USUARIO = 'root';
    const CLAVE = '';
    private $conexion;

    public function conectar()
    {
        try {
            $this->conexion = new PDO(
                "mysql:host=" . self::HOST . ";dbname=" . self::BANCO . ";charset=utf8",
                self::USUARIO,
                self::CLAVE
            );
            $this->conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $this->conexion;
        } catch (PDOException $e) {
            echo 'Error en la conexión: ' . $e->getMessage();
        }
    }

    public function desconectar()
    {
        $this->conexion = null;
    }

    public function getMensajeError()
    {
        return $this->conexion->getMessage();
    }

    public function getAllRegistros($tabla)
    {
        try {
            $sql = "SELECT * FROM $tabla";
            $statement = $this->conexion->query($sql);
            $registros = $statement->fetchAll();
            $statement = null;
            return $registros;
        } catch (PDOException $e) {
            echo 'Error al buscar registros: ' . $e->getMessage();
        }
    }
}
