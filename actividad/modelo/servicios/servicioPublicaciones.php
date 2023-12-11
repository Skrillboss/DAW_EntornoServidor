 <?php

    class servicioPublicaciones
    {

        private static function getApiUrl()
        {
            $url = ApiHelper::getApiUrl();
            $url .= "publicaciones.php";

            return $url;
        }

        public static function insertarPublicacion($publicacion)
        {
            $url = self::getApiUrl();
            $publicacionDto = PublicacionDto::fromPublicacionVista($publicacion);

            $respuesta = ApiHelper::solicitar($url, "POST", $publicacionDto);

            if ($respuesta->codigoRespuesta != 200) {

                // aqui se deben colocar los errores que deseas controlar
            }
        }

        public static function burcarPublicacion($id)
        {
            $url = self::getApiUrl($id);
            $url .= "?id=" . $id;

            $respuesta = ApiHelper::solicitar($url, "GET");

            $publicacionDto = PublicacionDto::fromJson(json_decode($respuesta->cuerpo, true));

            return $publicacionDto->toPublicacionVista();
        }

        public static function actualizarPublicacion($publicacion)
        {
            $url = self::getApiUrl();
            $publicacionDto = PublicacionDto::fromPublicacionVista($publicacion);

            $respuesta = ApiHelper::solicitar($url, "PUT", $publicacionDto);

            if ($respuesta->codigoRespuesta != 200) {

                // aqui se deben colocar los errores que deseas controlar
            }
        }

        public static function eliminarPublicacion($id)
        {
            $url = self::getApiUrl($id);
            $url .= "?id=" . $id;

            $respuesta = ApiHelper::solicitar($url, "DELETE");

            if ($respuesta->codigoRespuesta != 200) {

                // aqui se deben colocar los errores que deseas controlar
            }
        }

        public static function obtenerPublicacion()
        {
            $url = self::getApiUrl();

            $respuesta = ApiHelper::solicitar($url, "GET");

            $listado = json_decode($respuesta->cuerpo, true);

            $retorno = array();
            foreach ($listado as $publicacionJson) {
                $publicacionDto = PublicacionDto::fromJson($publicacionJson);
                array_push($retorno, $publicacionDto->toPublicacionVista());
            }

            return $retorno;
        }
    }

    ?>