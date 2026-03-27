<?php
    include 'php/configdb.php';

    session_start();

    function conectar() {
        $conexion = new mysqli(SERVIDOR, USUARIO, PASSWORD, BBDD);
        $conexion->set_charset("utf8"); 

        $controlador = new mysqli_driver();
        $controlador->report_mode = MYSQLI_REPORT_OFF; 

        return $conexion;
    }

    $conexion = conectar();

    session_destroy();
    header("Location: index.html");
?>