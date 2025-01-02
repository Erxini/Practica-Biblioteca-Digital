<?php
class UsuariosModel extends Conexion
{

    private $table;
    private $conexion;

    public function __construct()
    {
        $this->table = "usuarios";
        $this->conexion = $this->getConexion();
    }

    function comprobarusuclave($nombre, $clave)
    {
        $consulta = "SELECT * FROM usuarios WHERE nombre = ?";
        $conn = $this->getConexion();
        if ($conn == null) {
            return "<h2>ERROR. CONEXIÓN NO ESTABLECIDA.</h2>";
        }
        try {
            $sentencia = $conn->prepare($consulta);
            $sentencia->bindParam(1, $nombre);
            $sentencia->execute();
            if ($sentencia->rowCount() == 1) {
                $row = $sentencia->fetch();
                if (password_verify($clave, $row['clave'])) {
                    return new Usuarios($row['id'], $row['nombre'], $row['ape1'], $row['ape2'], $row['rol']);
                } else {
                    return "Usuario existe. Clave incorrecta.";
                }
            } else {
                return "Usuario " . $nombre . " no existe, regístrate primero";
            }
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }

    function actualizarusuario($id, $nombre, $ape1, $ape2, $rol)
    {
        $consulta = "UPDATE usuarios SET nombre = ?, ape1 = ?, ape2 = ?, rol = ? WHERE id = ?";
        $conn = $this->getConexion();
        if ($conn == null) {
            return "<h2>ERROR. CONEXIÓN NO ESTABLECIDA.</h2>";
        }
        try {
            $sentencia = $conn->prepare($consulta);
            $sentencia->bindParam(1, $nombre);
            $sentencia->bindParam(2, $ape1);
            $sentencia->bindParam(3, $ape2);
            $sentencia->bindParam(4, $rol);
            $sentencia->bindParam(5, $id);
            $sentencia->execute();
            return "OK";
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }

    function getUsuarioId($id)
    {
        $consulta = "SELECT * FROM usuarios WHERE id = ?";
        $conn = $this->getConexion();
        if ($conn == null) {
            return "<h2>ERROR. CONEXIÓN NO ESTABLECIDA.</h2>";
        }
        try {
            $sentencia = $conn->prepare($consulta);
            $sentencia->bindParam(1, $id);
            $sentencia->execute();
            $row = $sentencia->fetch();
            if ($row) {
                return new Usuarios($row['id'], $row['nombre'], $row['ape1'], $row['ape2'], $row['rol']);
            }
            return "USUARIO NO ENCONTRADO: " . $id;
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }
}
