<?php
define('DB_HOST', 'localhost:3315');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_NAME', 'gestor_tareas');

    function getDBConnection() {
        $conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

        if ($conn->connect_error) {
            die("Error de conexión: " . $conn->connect_error);
        }

        $conn->set_charset("utf8");
        return $conn;
    }

?>
