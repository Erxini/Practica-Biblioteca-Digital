<?php
require_once 'core/ControladorBase.php';
require_once 'modelo/Usuario.php';

/**
 * Controlador para la autenticación y gestión de usuarios.
 */
class UsuarioController extends ControladorBase
{

    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Muestra la vista de inicio de sesión.
     */
    public function login()
    {
        $this->view("usuarios/login", array());
    }

    /**
     * Autentica al usuario.
     */
    public function autenticar()
    {
        if (isset($_POST["nombre"]) && isset($_POST["clave"])) {
            $nombre = $_POST["nombre"];
            $clave = $_POST["clave"];

            $usuarioModel = new Usuario();
            $resultado = $usuarioModel->comprobarCredenciales($nombre, $clave);

            if ($resultado) {
                $_SESSION["usuario"] = $resultado;
                if ($resultado['rol'] == 'administrador') {
                    $this->redirect("Libro", "index");
                } else {
                    $this->redirect("Libro", "consultar");
                }
            } else {
                $mensaje = "Nombre de usuario o contraseña incorrectos";
                $this->view("usuarios/login", array("mensaje" => $mensaje));
            }
        } else {
            $this->view("usuarios/login", array());
        }
    }

    /**
     * Cierra la sesión del usuario.
     */
    public function logout()
    {
        session_destroy();
        $this->redirect("Usuario", "login");
    }
}
