<?php
class DaoPublicacionesSesion
{

    private static function inicializar()
    {
        if (!isset($_SESSION["publicaciones"])) {
            $_SESSION["publicaciones"] = array();
        }
    }

    public function crear($publicacion)
    {
        self::inicializar();
        array_push($_SESSION["publicaciones"], $publicacion);
    }

    public function buscar($id)
    {
    }

    public function actualizar($publicacion)
    {
    }

    public function eliminar($id)
    {
    }

    public function listar()
    {
        self::inicializar();
        return $_SESSION["publicaciones"];
    }
}
