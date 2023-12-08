 <?php

    class servicioPublicaciones
    {
        public static function insertarPublicacion($publicacion)
        {
            $daoOfertas = FactoriaDao::getDaoPublicaciones();
            $daoOfertas->crear($publicacion);
        }

        public static function burcarPublicacion($id)
        {
            $daoOfertas = FactoriaDao::getDaoPublicaciones();
            return $daoOfertas->buscar($id);
        }

        public static function actualizarPublicacion($publicacion)
        {
            $daoOfertas = FactoriaDao::getDaoPublicaciones();
            $daoOfertas->actualizar($publicacion);
        }

        public static function eliminarPublicacion($id)
        {
            $daoOfertas = FactoriaDao::getDaoPublicaciones();
            $daoOfertas->eliminar($id);
        }

        public static function obtenerPublicacion()
        {
            $daoOfertas = FactoriaDao::getDaoPublicaciones();
            return $daoOfertas->listar();
        }
    }

    ?>