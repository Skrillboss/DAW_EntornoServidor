<?php

class ServicioAutenticacion
{

    public static function validarUsuarioContrasena($usuario, $contrasena)
    {

        $url = ApiHelper::getApiUrl();
        $url .= "autenticacion.php";

        $loginDto = new LoginDto($usuario, $contrasena);

        $respuesta = ApiHelper::solicitar($url, "POST", $loginDto);

        return $respuesta->codigoRespuesta == 200;
    }
}
