<?php

include_once "modelo/mySQL/mysqlbd.php";
include_once "modelo/dao/daoPublicacionesMySql.php";
include_once "modelo/entidades/publicacion.php";
include_once "modelo/servicios/servicioPublicaciones.php";
include_once "modelo/dao/daoPublicacionesMySql.php";
include_once "modelo/dao/daoPublicacionesSesion.php";
include_once "modelo/dao/factoriaDao.php";
include_once "dto/publicacionDto.php";

$BadRequestCode = 400;
$NotFoundCode = 404;
$MethodNotAllowedCode = 405;

$metodo = $_SERVER["REQUEST_METHOD"];

switch ($metodo) {
    case "POST":

        $cuerpo = file_get_contents("php://input");
        if ($cuerpo) {
            $publicacionDto = PublicacionDto::fromJson($cuerpo);

            $publicacion = $publicacionDto->toPublicacion();
            ServicioPublicaciones::insertarPublicacion($publicacion);
        } else {
            echo "La solicitud no puede estar vacia";
            http_response_code($BadRequestCode);
        }
        break;
    case "GET":
        if (isset($_GET["id"]) && $_GET["id"] != "") {
            $id = $_GET["id"];
            $publicacion = ServicioPublicaciones::burcarPublicacion($id);

            if ($publicacion) {
                header("Content-Type: application/json");
                echo json_encode(PublicacionDto::fromPublicacion($publicacion));
            } else {
                echo "Oferta con id $id no encontrada";
                http_response_code($NotFoundCode);
            }
        } else {
            $publicaciones = ServicioPublicaciones::obtenerPublicaciones();

            $listaPublicacionesDto = array();
            foreach ($publicaciones as $publicacion) {
                array_push($listaPublicacionesDto, PublicacionDto::fromPublicacion($publicacion));
            }
            echo json_encode($listaPublicacionesDto);
        }

        break;
    case "PUT":

        $cuerpo = file_get_contents("php://input");
        if ($cuerpo) {
            $publicacionDto = PublicacionDto::fromJson($cuerpo);

            $publicacion = $publicacionDto->toPublicacion();
            ServicioPublicaciones::actualizarPublicacion($publicacion);
        } else {
            echo "La solicitud no puede estar vacia";
            http_response_code($BadRequestCode);
        }

        break;
    case "DELETE":
        if (isset($_GET["id"]) && $_GET["id"] != "") {
            $id = $_GET["id"];
            ServicioPublicaciones::eliminarPublicacion($id);
        } else {
            echo "El ID es obligatorio";
            http_response_code($BadRequestCode);
        }
        break;

    default:
        http_response_code($MethodNotAllowedCode);
        break;
}
