<?php
class DaoPublicacionesMySql
{
    public function crear($publicacion)
    {
        $usuario = $publicacion->usuario == "usuarioPago" ? 1 : 0;
        $fecha = $publicacion->fecha->format("c");
        $consulta = "INSERT INTO mensajes (nombre, depago, texto, fecha)
            VALUES (?, ?, ?, ?)";

        MySqlBd::consultaEscritura($consulta, $publicacion->nombre, $usuario, $publicacion->texto, $fecha);
    }
    public function buscar($id)
    {
        $resultado = MySqlBd::consultaLectura("SELECT * FROM mensajes WHERE id = ?", $id);
        if (count($resultado) < 1) {
            return null;
        } else {
            return $this->PublicacionFromValueArray($resultado[0]);
        }
    }
    public function actualizar($publicacion)
    {
        $usuario = $publicacion->usuario == "usuarioPago" ? 1 : 0;
        $fecha = $publicacion->fecha->format("c");
        $consulta = "UPDATE mensajes SET nombre = ?, depago = ?, texto = ?, fecha = ? WHERE id = ?";

        MySqlBd::consultaEscritura($consulta, $publicacion->nombre, $usuario, $publicacion->texto, $fecha, $publicacion->id);
    }
    public function eliminar($id)
    {
        $consulta = "DELETE FROM mensajes WHERE id = ?";
        MySqlBd::consultaEscritura($consulta, $id);
    }
    public function listar()
    {
        $resultado = MySqlBd::consultaLectura("SELECT * FROM mensajes");

        $retorno = array();

        foreach ($resultado as $publicacion) {
            $publicacion = $this->publicacionFromValueArray($publicacion);
            array_push($retorno, $publicacion);
        }
        return $retorno;
    }

    private function publicacionFromValueArray($publicacion)
    {
        $dePago = $publicacion["depago"] ? "usuarioPago" : "usuarioNormal";
        $fecha = new DateTime($publicacion["fecha"]);

        return new publicacion($publicacion["id"], $publicacion["nombre"], $dePago, $publicacion["texto"], $fecha);
    }
}
