<?php

class ServicioAutenticacion
{

    public static function validarUsuarioContrasena($usuario, $contrasena)
    {

        return $usuario == "ifp" && $contrasena == "ifp";
    }
}

?>
