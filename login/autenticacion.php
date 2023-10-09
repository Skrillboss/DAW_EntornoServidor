<?php include_once "../modelo/servicios/servicioAutenticacion.php" ?>

<?php

class Autenticacion
{

    public static function obtenerNombreUsuario()
    {

        if (isset($_SESSION["usuario"])) {

            return $_SESSION["usuario"];
        } else {

            return "";
        }
    }

    public static function autenticar($usuario, $contrasena)
    {
        if (ServicioAutenticacion::validarUsuarioContrasena($usuario, $contrasena)) {

            $_SESSION["usuario"] = $usuario;
            return true;
        } else {

            return false;
        }
    }
}

?>