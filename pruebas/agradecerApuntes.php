<?php
/*<!DOCTYPE html>
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
        <a href="./agradecer.html" style="background-color: rgb(255, 250, 191);">Agradecer</a>
        <a href="./recibirAgradecimiento.html">Recibir</a>
        <a href="./index.html">Cerrar Sesión</a>
    </nav>
    <main>
        <br>
    */
        <form method="GET" action="" id="formAgradecer">
            <p>Para</p>
            <select name="destinatario"> 
            // Se haría un while para mostrar tantos options como alumnos hayan en la BD (Dinámico)

            /* 
                Name se llama destinatario porque es la variable de php que va
                a usar el value recibido, y es un nombre descriptivo.
            */

                // name: select recoge el value de option
                // Tantas filas (option) como alumnos hayan
                // 1 solo option porque es dinamico, el resto se generan segun las filas de la BD
                // Valor de value (option) == id del alumno
                
            </select>
            /*
            <p>Quiero agradecerte</p>
            <textarea placeholder="Escribe aquí tu mensaje de agradecimiento"></textarea>
            
            <br><br>
            <input type="submit" value="Enviar" class="info">
        </form>
    </main>
    <footer>
        <img src="./img/iconoJesuitas.png" id="iconoJesuita">
    </footer>
</body>
</html>
*/ ?>