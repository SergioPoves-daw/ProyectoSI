<?php
    include 'php/configdb.php';

    session_start();

    function conectar(){
        $conexion = new mysqli(SERVIDOR, USUARIO, PASSWORD, BBDD);
        $conexion->set_charset("utf8"); 

        $controlador = new mysqli_driver();
        $controlador->report_mode = MYSQLI_REPORT_OFF; 

        return $conexion;
    }

    $conexion = conectar();

    $emisor = $_SESSION['id'];
    $receptor = $_POST['destinatario'];
    $mensaje = $_POST['mensaje'];

    $sql = "INSERT INTO agradecimientos (idEmisor, idReceptor, mensaje) VALUES ('" . $emisor . "','" . $receptor . "','" . $mensaje . "'" . ");";

    echo $sql;
    echo '<br/>';
    echo 'Tu usuario: idAlumno ' . $_SESSION['id'];

    $resultado = $conexion->query($sql);
?>