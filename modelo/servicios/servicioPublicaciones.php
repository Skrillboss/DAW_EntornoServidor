 <?php

    class servicioPublicaciones
    {
    
        public static function obtenerPublicacion()
        {
            $resultado = MySqlBd::consultaLectura("SELECT * FROM mensaje");

            $retorno = array();

            foreach ($resultado as $publicacion) {
                $dePago = $publicacion["depago"] ? "usuarioPago" : "usuarioNormal";
                $fecha = new DateTime($publicacion["fecha"]);

                $publicaciones = new publicacion($publicacion["nombre"], $dePago, $publicacion["texto"], $fecha);

                array_push($retorno, $publicaciones);
            }
            return $retorno;
        }

        public static function insertarPublicacion($publicacion)
        {
            $usuario = $publicacion->usuario == "depago" ? 1 : 0;
            $fecha = $publicacion->fecha->format("c");
            $consulta = "INSERT INTO mensaje (nombre, depago, texto, fecha)
            VALUES (?, ?, ?, ?)";

            MySqlBd::consultaEscritura($consulta, $publicacion->nombre, $usuario, $publicacion->texto, $fecha);
        }
    }

    ?>