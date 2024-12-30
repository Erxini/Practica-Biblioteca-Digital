<?php

class UsuariosModel extends Conexion { 

    private $table;
    private $conexion;

    public function __construct() {
        $this->table = "usuarios";
        $this->conexion = $this->getConexion();
    }

     function comprobarusuclave($nombre, $clave) {
        $consulta = "select * from usuarios where nombre= ?";
        $conn = $this->getConexion();
        if ($conn == null) {
            return "<h2>ERROR. CONEXIÓN NO ESTABLECIDA.</h2>";
        }
        try {
            $sentencia = $conn->prepare($consulta);
            $sentencia->bindParam(1, $nombre);
            $sentencia->execute();
            if ($sentencia->rowCount() == 1) { //existe usu
                $row = $sentencia->fetch();
                if (password_verify($clave, $row['clave'])) {
                    // "Validado. Clave correcta.";
                    return new Usuarios($row['codusuario'],
                            $row['perfil'],
                            $row['nombre'],$row['clave'],
                            $row['fechaalta'],$row['email'],$row['pobla']); 
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
    
    function actualizarusuario($codusuario, $nombre, $clave, $email, $pobla) {
        $consulta = "update usuarios set nombre = ?, clave = ? ,"
                . " email = ? , pobla = ? where  codusuario = ? ";
        $conn = $this->getConexion();
        if ($conn == null) {
            return "<h2>ERROR. CONEXIÓN NO ESTABLECIDA.</h2>";
        }
        try {
            $password = password_hash($clave, PASSWORD_DEFAULT);
            $sentencia = $conn->prepare($consulta);
            $sentencia->bindParam(5, $codusuario);
            $sentencia->bindParam(1, $nombre);
            $sentencia->bindParam(2, $password);
            $sentencia->bindParam(3, $email);
            $sentencia->bindParam(4, $pobla);
            $num = $sentencia->execute();
            return "OK";
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }

    function getUsuarioCod($codusuario) {
        $consulta = "select * from usuarios where codusuario = ? ";
        $conn = $this->getConexion();
        if ($conn == null) {
            return "<h2>ERROR. CONEXIÓN NO ESTABLECIDA.</h2>";
        }
        try {
            $sentencia = $conn->prepare($consulta);
            $sentencia->bindParam(1, $codusuario);
            $sentencia->execute();
            $row = $sentencia->fetch();
            if ($row) {
            return new Usuarios($row['codusuario'],
                            $row['perfil'],
                            $row['nombre'],$row['clave'],
                            $row['fechaalta'],$row['email'],$row['pobla']); 
            }
            return "USUARIO NO ENCONTRADO: ". $codusuario;
            
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }

}
