 <?php

    class ServicioPublicaciones
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

        public static function obtenerPublicaciones()
        {
            $daoOfertas = FactoriaDao::getDaoPublicaciones();
            return $daoOfertas->listar();
        }
    }

    ?>