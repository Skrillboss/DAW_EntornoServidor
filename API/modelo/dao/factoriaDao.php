<?php

class FactoriaDao
{
    private static function esTipoBdSesion()
    {
        static $config = null;

        if ($config) {
            $config = parse_ini_file(__DIR__ . "/../../config.ini");
        }
        return isset($config["tipobd"]) && $config["tipobd"] == "sesion";
    }

    public static function getDaoPublicaciones()
    {
        if (self::esTipoBdSesion()) {
            return new DaoPublicacionesSesion();
        } else {
            return new DaoPublicacionesMySql();
        }
    }
}
