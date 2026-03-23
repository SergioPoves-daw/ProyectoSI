<?php
    include 'php/configdb.php';
    
    function conectar(){
        $conexion = new mysqli(SERVIDOR, USUARIO, PASSWORD, BBDD);
        $conexion->set_charset("utf8"); 
        return $conexion;
    }

    // Para mantener la sesion iniciada ($_SESSION):
    session_start();

    // Primero conectar
    $conexion = conectar();

    $nombre = $_POST["nombre"];
    $password = $_POST["password"];

    // Comprobar que la informacion sea correcta en la BD
    $sql = 'SELECT idAlumno FROM alumnos WHERE
        nombre="' . $nombre . '" AND pwd="' . $password . '";';

    // Comprobar la consulta SQL que se ha hecho
    echo $sql;
    echo '<br/>';
    echo '<br/>';

    // Guardar la fila en una variable
    $resultado = $conexion->query($sql);

    // num_rows devuelve 1 si los datos son iguales/existentes, 0 si son diferentes/inexistentes
    if ($resultado->num_rows > 0) {
        // Si los datos introducidos son iguales al SELECT de la fila, entonces es exitoso
        echo 'Inicio de sesión exitoso';
        
        // $fila = $resultado->fetch_assoc();
        // $_SESSION['idAlumno'] = $fila["idAlumno"];
    }
    
    // Si no, entonces los datos son incorrectos.
    else {
        echo 'Inicio de sesión incorrecto';
    }

    // Guardar info del usuario en sesiones: $_SESSION['id'] = $fila["idAlumno"];
?>