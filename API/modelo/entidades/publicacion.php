<?php
class publicacion
{
    public int $id;
    public string $nombre;
    public string $usuario;
    public string $texto;
    public DateTime $fecha;


    function __construct(int $id, string $nombre, string $usuario, string $texto, DateTime $fecha)
    {
        $this->id = $id;
        $this->nombre = $nombre;
        $this->usuario = $usuario;
        $this->texto = $texto;
        $this->fecha = $fecha;
    }
}
