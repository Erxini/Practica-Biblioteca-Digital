<?php
class Usuarios
{
    private $codusuario;
    private $perfil;
    private $nombre;
    private $clave;
    private $fechaalta;
    private $email;
    private $pobla;

    function __construct($codusuario, $perfil, $nombre, $clave, $fechaalta, $email, $pobla)
    {
        $this->codusuario = $codusuario;
        $this->perfil = $perfil;
        $this->nombre = $nombre;
        $this->clave = $clave;
        $this->fechaalta = $fechaalta;
        $this->email = $email;
        $this->pobla = $pobla;
    }

    function getCodusuario()
    {
        return $this->codusuario;
    }

    function getPerfil()
    {
        return $this->perfil;
    }

    function getNombre()
    {
        return $this->nombre;
    }

    function getClave()
    {
        return $this->clave;
    }

    function getFechaalta()
    {
        return $this->fechaalta;
    }

    function getEmail()
    {
        return $this->email;
    }

    function getPobla()
    {
        return $this->pobla;
    }

    function setCodusuario($codusuario): void
    {
        $this->codusuario = $codusuario;
    }

    function setPerfil($perfil): void
    {
        $this->perfil = $perfil;
    }

    function setNombre($nombre): void
    {
        $this->nombre = $nombre;
    }

    function setClave($clave): void
    {
        $this->clave = $clave;
    }

    function setFechaalta($fechaalta): void
    {
        $this->fechaalta = $fechaalta;
    }

    function setEmail($email): void
    {
        $this->email = $email;
    }

    function setPobla($pobla): void
    {
        $this->pobla = $pobla;
    }
}
