<?php
class Libros
{
    private $ISBN;
    private $titulo;
    private $autor;

    function __construct($ISBN, $titulo, $autor)
    {
        $this->ISBN = $ISBN;
        $this->titulo = $titulo;
        $this->autor = $autor;
    }

    function getISBN()
    {
        return $this->ISBN;
    }

    function getTitulo()
    {
        return $this->titulo;
    }

    function getAutor()
    {
        return $this->autor;
    }

    function setISBN($ISBN): void
    {
        $this->ISBN = $ISBN;
    }

    function setTitulo($titulo): void
    {
        $this->titulo = $titulo;
    }

    function setAutor($autor): void
    {
        $this->autor = $autor;
    }
}
