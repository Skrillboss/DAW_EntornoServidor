 <?php

    class servicioPublicaciones
    {

        private static function inicializacion()
        {

            if (!isset($_SESSION["publicaciones"])) {
                $_SESSION["publicaciones"] = array();
            }
        }

        public static function obtenerPublicacion()
        {

            self::inicializacion();
            return $_SESSION["publicaciones"];
        }

        public static function insertarPublicacion($publicacion)
        {
            self::inicializacion();

            return array_push($_SESSION["publicaciones"], $publicacion);
        }
    }

    ?>