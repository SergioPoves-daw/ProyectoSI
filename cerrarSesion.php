<?php
    include 'php/configdb.php';

    session_start();

    function conectar() {
        $conexion = new mysqli(SERVIDOR, USUARIO, PASSWORD, BBDD);
        $conexion->set_charset("utf8"); 
        return $conexion;
    }

    $conexion = conectar();

    session_destroy();
    header("Location: index.html");
?>