<?php
require_once 'config/database.php';

/**
 * Modelo para la gestión de libros.
 */
class Libro
{
    private $conexion;

    public function __construct()
    {
        $database = new Banco();
        $this->conexion = $database->conectar();
    }

    /**
     * Obtiene todos los libros de la base de datos.
     *
     * @return array Los libros encontrados.
     */
    public function getLibros()
    {
        try {
            $sql = "SELECT * FROM libros";
            $statement = $this->conexion->query($sql);
            $libros = $statement->fetchAll(PDO::FETCH_ASSOC);
            return $libros;
        } catch (PDOException $e) {
            echo 'Error: ' . $e->getMessage();
            return array();
        }
    }

    /**
     * Obtiene un libro por su ISBN.
     *
     * @param string $ISBN El ISBN del libro.
     * @return array|null El libro encontrado o null si no se encuentra.
     */
    public function getLibroByISBN($ISBN)
    {
        try {
            $sql = "SELECT * FROM libros WHERE ISBN = ?";
            $sentencia = $this->conexion->prepare($sql);
            $sentencia->bindParam(1, $ISBN);
            $sentencia->execute();
            $libro = $sentencia->fetch(PDO::FETCH_ASSOC);
            return $libro ? $libro : null;
        } catch (PDOException $e) {
            echo 'Error: ' . $e->getMessage();
            return null;
        }
    }

    /**
     * Inserta un nuevo libro en la base de datos.
     *
     * @param string $ISBN El ISBN del libro.
     * @param string $titulo El título del libro.
     * @param string $autor El autor del libro.
     * @return bool True si la inserción fue exitosa, false en caso contrario.
     */
    public function insertarLibro($ISBN, $titulo, $autor)
    {
        try {
            $sql = "INSERT INTO libros (ISBN, titulo, autor) VALUES (?, ?, ?)";
            $sentencia = $this->conexion->prepare($sql);
            $sentencia->bindParam(1, $ISBN);
            $sentencia->bindParam(2, $titulo);
            $sentencia->bindParam(3, $autor);
            return $sentencia->execute();
        } catch (PDOException $e) {
            echo 'Error: ' . $e->getMessage();
            return false;
        }
    }

    /**
     * Actualiza un libro en la base de datos.
     *
     * @param string $ISBN El ISBN del libro.
     * @param string $titulo El título del libro.
     * @param string $autor El autor del libro.
     * @return bool True si la actualización fue exitosa, false en caso contrario.
     */
    public function actualizarLibro($ISBN, $titulo, $autor)
    {
        try {
            $sql = "UPDATE libros SET titulo = ?, autor = ? WHERE ISBN = ?";
            $sentencia = $this->conexion->prepare($sql);
            $sentencia->bindParam(1, $titulo);
            $sentencia->bindParam(2, $autor);
            $sentencia->bindParam(3, $ISBN);
            return $sentencia->execute();
        } catch (PDOException $e) {
            echo 'Error: ' . $e->getMessage();
            return false;
        }
    }

    /**
     * Elimina un libro de la base de datos.
     *
     * @param string $ISBN El ISBN del libro.
     * @return bool True si la eliminación fue exitosa, false en caso contrario.
     */
    public function borrarLibro($ISBN)
    {
        try {
            $sql = "DELETE FROM libros WHERE ISBN = ?";
            $sentencia = $this->conexion->prepare($sql);
            $sentencia->bindParam(1, $ISBN);
            return $sentencia->execute();
        } catch (PDOException $e) {
            echo 'Error: ' . $e->getMessage();
            return false;
        }
    }
}
