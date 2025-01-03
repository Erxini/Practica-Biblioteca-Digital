<?php
require_once 'core/ControladorBase.php';
require_once 'modelo/Libro.php';

/**
 * Controlador para la gestión de libros.
 */
class LibroController extends ControladorBase
{

    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Muestra la lista de libros.
     */
    public function index()
    {
        $libroModel = new Libro();
        $libros = $libroModel->getLibros();
        $this->view("libros/index", array("libros" => $libros));
    }

    /**
     * Muestra la vista para registrar un libro.
     */
    public function registrar()
    {
        $this->view("libros/registrar", array());
    }

    /**
     * Inserta un nuevo libro en la base de datos.
     */
    public function guardar()
    {
        if (isset($_POST["ISBN"]) && isset($_POST["titulo"]) && isset($_POST["autor"])) {
            $ISBN = $_POST["ISBN"];
            $titulo = $_POST["titulo"];
            $autor = $_POST["autor"];

            $libroModel = new Libro();
            $libroModel->insertarLibro($ISBN, $titulo, $autor);
            $this->redirect("Libro", "index");
        } else {
            $this->redirect("Libro", "registrar");
        }
    }

    /**
     * Muestra la vista para modificar un libro.
     */
    public function modificar()
    {
        if (isset($_GET["ISBN"])) {
            $ISBN = $_GET["ISBN"];
            $libroModel = new Libro();
            $libro = $libroModel->getLibroByISBN($ISBN);
            $this->view("libros/modificar", array("libro" => $libro));
        } else {
            $this->redirect("Libro", "index");
        }
    }

    /**
     * Actualiza un libro en la base de datos.
     */
    public function actualizar()
    {
        if (isset($_POST["ISBN"]) && isset($_POST["titulo"]) && isset($_POST["autor"])) {
            $ISBN = $_POST["ISBN"];
            $titulo = $_POST["titulo"];
            $autor = $_POST["autor"];

            $libroModel = new Libro();
            $libroModel->actualizarLibro($ISBN, $titulo, $autor);
            $this->redirect("Libro", "index");
        } else {
            $this->redirect("Libro", "index");
        }
    }

    /**
     * Elimina un libro de la base de datos.
     */
    public function eliminar()
    {
        if (isset($_GET["ISBN"])) {
            $ISBN = $_GET["ISBN"];
            $libroModel = new Libro();
            $libroModel->borrarLibro($ISBN);
        }
        $this->redirect("Libro", "index");
    }
}
