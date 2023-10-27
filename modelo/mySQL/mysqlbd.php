<?php 


    class MySqlBd{

        public static function consultaLectura($consulta){

            $config = parse_ini_file(__DIR__ . "/../../config.ini");

            $conexion = new mysqli($config["host"], $config["user"], $config["pass"], $config["bd"], $config["port"]);

            $retorno = array();

            $resultado = $conexion->query($consulta);

            while($fila = $resultado->fetch_assoc()){

                array_push($retorno, $fila);
            }
            return $retorno;
        }
    }
?>