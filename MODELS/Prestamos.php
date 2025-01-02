<?php
class Prestamos
{
    private $id;
    private $ISBN;
    private $id_usuario;
    private $fecha_desde;
    private $fecha_hasta;

    function __construct($id, $ISBN, $id_usuario, $fecha_desde, $fecha_hasta)
    {
        $this->id = $id;
        $this->ISBN = $ISBN;
        $this->id_usuario = $id_usuario;
        $this->fecha_desde = $fecha_desde;
        $this->fecha_hasta = $fecha_hasta;
    }

    function getId()
    {
        return $this->id;
    }

    function getISBN()
    {
        return $this->ISBN;
    }

    function getIdUsuario()
    {
        return $this->id_usuario;
    }

    function getFechaDesde()
    {
        return $this->fecha_desde;
    }

    function getFechaHasta()
    {
        return $this->fecha_hasta;
    }

    function setId($id): void
    {
        $this->id = $id;
    }

    function setISBN($ISBN): void
    {
        $this->ISBN = $ISBN;
    }

    function setIdUsuario($id_usuario): void
    {
        $this->id_usuario = $id_usuario;
    }

    function setFechaDesde($fecha_desde): void
    {
        $this->fecha_desde = $fecha_desde;
    }

    function setFechaHasta($fecha_hasta): void
    {
        $this->fecha_hasta = $fecha_hasta;
    }
}
