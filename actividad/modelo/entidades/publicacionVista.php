<?php
class publicacionVista
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

    public static function fromBody()
    {

        $fecha = new DateTime();

        if (isset($_POST["nombre"]) && isset($_POST["usuario"]) && isset($_POST["texto"])) {

            return new publicacionVista(0, $_POST["nombre"], $_POST["usuario"], $_POST["texto"], $fecha);
        } else {


            return new publicacionVista(0, "", "usuarioNormal", "", $fecha);
        }
    }
}
