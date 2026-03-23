<?php
  include 'configdb.php';
  
  function conectar(){
    $conexion = new mysqli(SERVIDOR, USUARIO, PASSWORD, BBDD);
    $conexion->set_charset("utf8"); 
    return $conexion;
  }

  function mostrar_jesuitas() {
    $conexion = conectar();

    $sql = 'SELECT nombreJesuita FROM alumnos';
    $resultado = $conexion->query($sql);

    // Mostrar nombreJesuita tantos option como filas hayan

    // fetch_array() devuelve el array unidimensional y TRUE/FALSE
    // Cuando es final de puntero y no hay más filas, devuelve false
    while ($fila = $resultado->fetch_array()) {
      // Primero el option value con el valor del nombreJesuita, después el texto con el mismo valor y por ultimo </option>
      echo '<option value="' . $fila["nombreJesuita"] . '">' . $fila["nombreJesuita"] . '</option>';
    }
    // Cuando no hay siguiente fila, devuelve false y acaba el bucle

    $conexion->close();
  }
?>