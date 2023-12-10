<?php
class PublicacionDto
{
    public string $id;
    public string $nombre;
    public string $usuario;
    public string $texto;
    public string $fecha;


    function __construct($id, string $nombre, string $usuario, string $texto, string $fecha)
    {
        $this->id = $id;
        $this->nombre = $nombre;
        $this->usuario = $usuario;
        $this->texto = $texto;
        $this->fecha = $fecha;
    }

    public function toPublicacion()
    {
        $fecha = $this->fecha ? new DateTime($this->fecha) : new DateTime();
        return new Publicacion((int)$this->id, $this->nombre, $this->usuario, $this->texto, $fecha);
    }

    public static function fromPublicacion($publicacion)
    {
        return new PublicacionDto($publicacion->id, $publicacion->nombre, $publicacion->usuario, $publicacion->texto, $publicacion->fecha->format("c"));
    }

    public static function fromJson($json)
    {
        $objeto = json_decode($json);

        $id = isset($objeto->id) ? $objeto->id : "0";
        $nombre = isset($objeto->nombre) ? $objeto->nombre : "";
        $usuario = isset($objeto->usuario) ? $objeto->usuario : "";
        $texto = isset($objeto->texto) ? $objeto->texto : "";
        $fecha = isset($objeto->fecha) ? $objeto->fecha : "";

        return new PublicacionDto($id, $nombre, $usuario, $texto, $fecha);
    }
}
