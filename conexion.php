<?php

class Cconexion {

    public static function ConexionBD() {

        $serverName = "localhost"; 
        $connectionInfo = array(
            "Database" => "RestauranteDB",
            "UID" => "Admin",
            "PWD" => "root",
            "CharacterSet" => "UTF-8"
        );

        $conn = sqlsrv_connect($serverName, $connectionInfo);

        if (!$conn) {
            echo "<h3>Error en la conexión:</h3>";
            die(print_r(sqlsrv_errors(), true));
        }

        return $conn;
    }
}

?>
