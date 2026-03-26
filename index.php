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

    // Recoger idAlumno si al comprobar la informacion, esta es correcta en la BD
    $sql = 'SELECT equipo FROM alumnos WHERE
        usuario="' . $nombre . '" AND password="' . $password . '";';

    // Comprobar la consulta SQL que se ha hecho
    echo $sql;
    echo '<br/>';
    echo '<br/>';

    // Guardar la fila en una variable
    $resultado = $conexion->query($sql);

    // num_rows devuelve 1 si los datos son iguales/existentes, 0 si son diferentes/inexistentes
    // Si el SELECT con WHERE ha encontrado una fila, sería 1
    // Si el SELECT con WHERE no coincide en alguno de los datos y no encuentra ninguna fila, sería 0
    if ($resultado->num_rows > 0) {
        // Si los datos introducidos son iguales al SELECT de la fila, entonces es exitoso
        echo 'Inicio de sesión exitoso';
        
        // Guarda idAlumno en SESSION para identificar al usuario en las demás páginas
        $fila = $resultado->fetch_array();
        $_SESSION['id'] = $fila['equipo'];

        echo '<p>Hola Alumno ' . $_SESSION['id'] . '</p>';

        // Redirige a agredecer.php
        header("Location: agradecer.php");
    }
    
    // Si no, entonces los datos son incorrectos.
    else {
        echo 'Inicio de sesión incorrecto';
    }

    $conexion->close();

    // Guardar info del usuario en sesiones: $_SESSION['id'] = $fila["idAlumno"];
?>