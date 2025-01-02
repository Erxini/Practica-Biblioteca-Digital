<?php
class Usuarios
{
    private $id;
    private $nombre;
    private $ape1;
    private $ape2;
    private $rol;

    function __construct($id, $nombre, $ape1, $ape2, $rol)
    {
        $this->id = $id;
        $this->nombre = $nombre;
        $this->ape1 = $ape1;
        $this->ape2 = $ape2;
        $this->rol = $rol;
    }

    function getId()
    {
        return $this->id;
    }

    function getNombre()
    {
        return $this->nombre;
    }

    function getApe1()
    {
        return $this->ape1;
    }

    function getApe2()
    {
        return $this->ape2;
    }

    function getRol()
    {
        return $this->rol;
    }

    function setId($id): void
    {
        $this->id = $id;
    }

    function setNombre($nombre): void
    {
        $this->nombre = $nombre;
    }

    function setApe1($ape1): void
    {
        $this->ape1 = $ape1;
    }

    function setApe2($ape2): void
    {
        $this->ape2 = $ape2;
    }

    function setRol($rol): void
    {
        $this->rol = $rol;
    }
}
