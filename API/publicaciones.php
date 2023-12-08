<?php
include_once "modelo/mySQL/mysqlbd.php";
include_once "modelo/dao/daoPublicacionesMySql.php";
include_once "modelo/entidades/publicacion.php";
include_once "modelo/servicios/servicioPublicaciones.php";
include_once "modelo/dao/daoPublicacionesMySql.php";
include_once "modelo/dao/daoPublicacionesSesion.php";
include_once "modelo/dao/factoriaDao.php";

$NotFoundCode = 404;

if (isset($_GET["id"])) {
    $id = $_GET["id"];
    $publicacion = ServicioPublicaciones::burcarPublicacion($id);

    if ($publicacion) {
        header("Content-Type: apllication/json");
        echo json_encode($publicacion);
        print_r($publicacion);
    } else {
        echo "Oferta con id no encontrada";
        http_response_code($NotFoundCode);
    }
} else {
    $publicaciones = ServicioPublicaciones::obtenerPublicacion();

    echo json_encode($publicaciones);
}
