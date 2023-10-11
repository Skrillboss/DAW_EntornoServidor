

<?php

class Autenticacion
{

    const usuario = "usuario";
    const cookieUsuario = "usuario";

    public static function estaAutenticado(){

        return isset($_SESSION["usuario"]);

    }

    public static function obtenerNombreUsuario()
    {

        if (self::estaAutenticado()) {

            return $_SESSION["usuario"];
        } else {

            return "";
        }
    }

    public static function autenticar($usuario, $contrasena)
    {
        if (ServicioAutenticacion::validarUsuarioContrasena($usuario, $contrasena)) {

            $_SESSION["usuario"] = $usuario;

            setcookie("usuario", $usuario);
            return true;
        } else {

            return false;
        }
    }

    public static function obtenerCookieUsuario(){

        if(isset($_COOKIE[self::cookieUsuario])){

            return $_COOKIE[self::cookieUsuario];


        }

    }
}

?>