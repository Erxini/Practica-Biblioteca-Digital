<?php
class LibrosModel extends Conexion
{

    private $table;
    private $conexion;

    public function __construct()
    {
        $this->table = "libros";
        $this->conexion = $this->getConexion();
    }

    public function getLibros()
    {
        $libros = array();
        try {
            $sql = "SELECT * FROM $this->table";
            $statement = $this->conexion->query($sql);
            $registros = $statement->fetchAll();
            $statement = null;
            foreach ($registros as $row) {
                array_push($libros, new Libros($row['ISBN'], $row['titulo'], $row['autor']));
            }
            return $libros;
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }

    public function insertarLibro($ISBN, $titulo, $autor)
    {
        $consulta = "INSERT INTO libros (ISBN, titulo, autor) VALUES (?, ?, ?)";
        $conn = $this->getConexion();
        if ($conn == null) {
            return "<h2>ERROR. CONEXIÓN NO ESTABLECIDA.</h2>";
        }
        try {
            $sentencia = $conn->prepare($consulta);
            $sentencia->bindParam(1, $ISBN);
            $sentencia->bindParam(2, $titulo);
            $sentencia->bindParam(3, $autor);
            $num = $sentencia->execute();
            return $num;
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }

    public function actualizarLibro($ISBN, $titulo, $autor)
    {
        $consulta = "UPDATE libros SET titulo = ?, autor = ? WHERE ISBN = ?";
        $conn = $this->getConexion();
        if ($conn == null) {
            return "<h2>ERROR. CONEXIÓN NO ESTABLECIDA.</h2>";
        }
        try {
            $sentencia = $conn->prepare($consulta);
            $sentencia->bindParam(1, $titulo);
            $sentencia->bindParam(2, $autor);
            $sentencia->bindParam(3, $ISBN);
            $num = $sentencia->execute();
            return $num;
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }

    public function borrarLibro($ISBN)
    {
        $consulta = "DELETE FROM libros WHERE ISBN = ?";
        $conn = $this->getConexion();
        if ($conn == null) {
            return "<h2>ERROR. CONEXIÓN NO ESTABLECIDA.</h2>";
        }
        try {
            $sentencia = $conn->prepare($consulta);
            $sentencia->bindParam(1, $ISBN);
            $num = $sentencia->execute();
            return "Libro con ISBN " . $ISBN . ", borrado.";
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }

    public function getLibroISBN($ISBN)
    {
        $consulta = "SELECT * FROM libros WHERE ISBN = ?";
        $conn = $this->getConexion();
        if ($conn == null) {
            return "<h2>ERROR. CONEXIÓN NO ESTABLECIDA.</h2>";
        }
        try {
            $sentencia = $conn->prepare($consulta);
            $sentencia->bindParam(1, $ISBN);
            $sentencia->execute();
            $row = $sentencia->fetch();
            if ($row) {
                return new Libros($row['ISBN'], $row['titulo'], $row['autor']);
            }
            return "LIBRO NO ENCONTRADO: " . $ISBN;
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }
}
