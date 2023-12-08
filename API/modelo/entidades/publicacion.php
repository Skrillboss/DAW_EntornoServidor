<?php
class publicacion
{
    public string $nombre;
    public string $usuario;
    public string $texto;
    public DateTime $fecha;
    

    function __construct(string $nombre, string $usuario, string $texto, DateTime $fecha)
    {
        $this->nombre = $nombre;
        $this->usuario = $usuario;
        $this->texto = $texto;
        $this->fecha = $fecha;
    }

    public static function fromBody()
    {

        $fecha = new DateTime;

        if (isset($_POST["nombre"]) && isset($_POST["usuario"]) && isset($_POST["texto"])) {

            return new publicacion($_POST["nombre"], $_POST["usuario"], $_POST["texto"], $fecha);
        } else {


            return new publicacion("", "usuarioNormal", "", $fecha);
        }
    }
}
