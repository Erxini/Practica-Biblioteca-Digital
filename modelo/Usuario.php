<?php
require_once 'config/dataBase.php';

/**
 * Modelo para la gestión de usuarios.
 */
class Usuario
{
    private $conexion;

    public function __construct()
    {
        $database = new BancoLibros();
        $this->conexion = $database->getConexion();
    }

    /**
     * Comprueba las credenciales del usuario.
     *
     * @param string $nombre El nombre del usuario.
     * @param string $clave La clave del usuario.
     * @return array|null Los datos del usuario si las credenciales son correctas, null en caso contrario.
     */
    public function comprobarCredenciales($nombre, $clave)
    {
        try {
            $sql = "SELECT * FROM usuarios WHERE nombre = ? AND clave = ?";
            $sentencia = $this->conexion->prepare($sql);
            $sentencia->bindParam(1, $nombre);
            $sentencia->bindParam(2, $clave);
            $sentencia->execute();
            $usuario = $sentencia->fetch(PDO::FETCH_ASSOC);
            return $usuario ? $usuario : null;
        } catch (PDOException $e) {
            echo 'Error: ' . $e->getMessage();
            return null;
        }
    }

    // Otros métodos para la gestión de usuarios...
}
