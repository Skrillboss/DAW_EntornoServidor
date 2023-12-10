<?php

include_once "modelo/servicios/servicioAutenticacion.php";
include_once "modelo/mySQL/mysqlbd.php";
include_once "dto/loginDto.php";
include_once "comun/autorizacion.php";

$BadRequestCode = 400;
$MethodNotAllowedCode = 405;

$metodo = $_SERVER["REQUEST_METHOD"];

switch ($metodo) {
    case "POST":

        $cuerpo = file_get_contents("php://input");
        if ($cuerpo) {
            $loginDto = LoginDto::fromJson($cuerpo);

            if (!ServicioAutenticacion::validarUsuarioContrasena($loginDto->usuario, $loginDto->contrasena)) {
                echo "Usuario y/o contraseña incorrectos";
                http_response_code($BadRequestCode);
            } else {
            }
        } else {
            echo "La solicitud no puede estar vacia";
            http_response_code($BadRequestCode);
        }

        break;

    default:
        http_response_code($MethodNotAllowedCode);
        break;
}
