<?php
    include 'php/configdb.php';

    function conectar(){
        $conexion = new mysqli(SERVIDOR, USUARIO, PASSWORD, BBDD);
        $conexion->set_charset("utf8"); 
        return $conexion;
    }

    function mostrar_jesuitas() {
        $conexion = conectar();

        $sql = 'SELECT equipo, nombreJesuita FROM alumnos';
        $resultado = $conexion->query($sql);

        // Mostrar nombreJesuita tantos option como filas hayan

        // fetch_array() devuelve el array unidimensional y TRUE/FALSE
        // Cuando es final de puntero y no hay más filas, devuelve false
        while ($fila = $resultado->fetch_array()) {
            // Primero el option value con el valor del nombreJesuita, después el texto con el mismo valor y por ultimo </option>
            echo '<option value="' . $fila["equipo"] . '">' . $fila["nombreJesuita"] . '</option>';
        }
        // Cuando no hay siguiente fila, devuelve false y acaba el bucle

        $conexion->close();
    }
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style.css">
    <title>Agradecer</title>
</head>
<body>
    <header>
        <img id="logo" src="./img/logoJesuitas.png">
        <h1>AGRADECE EN COMPAÑÍA</h1>
    </header>
    <nav>
        <a href="./agradecer.php" style="background-color: rgb(255, 250, 191);">Agradecer</a>
        <a href="./recibirAgradecimiento.html">Recibir</a>
        <a href="./cerrarSesion.php">Cerrar Sesión</a>
    </nav>
    <main>
        <br>
        <!-- Enviar muestra el listado de alumnos -->
        <form method="POST" action="mensaje.php" id="formAgradecer">
            <p>Para</p>
            <select name="destinatario">
                <?php mostrar_jesuitas(); ?>
            </select>

            <p>Quiero agradecerte</p>
            <textarea placeholder="Escribe aquí tu mensaje de agradecimiento" name="mensaje"></textarea>
            
            <br><br>
            <input type="submit" value="Enviar" class="info">
        </form>
    </main>
    <footer>
        <img src="./img/iconoJesuitas.png" id="iconoJesuita">
    </footer>
</body>
</html>