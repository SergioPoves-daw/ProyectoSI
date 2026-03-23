<?php
  //Necesitar hacer include o require del archivo que tiene la conexión

  include 'configdb.php';

  function conectar(){
    $conexion = new mysqli(SERVIDOR, USUARIO, PASSWORD, BBDD);
    $conexion->set_charset("utf8"); 
    return $conexion;
  }
  
  //Función para mostrar filas de una tabla
  function mostrar_alumnos() { 
    //Conecta con la base de datos y crea el objeto $conexión.
    $conexion=conectar();  
        
    //Ejecuta la consulta sql
    $sql= 'SELECT idAlumno, nombre FROM alumnos';
    $resultado=$conexion->query($sql);	
        
    //Extrae cada una fila del resultado de la consulta
    /*
        Recorre 3 filas (manual)
        $fila=$resultado->fetch_array();
        alumnos($fila);

        $fila=$resultado->fetch_array();
        alumnos($fila);

        $fila=$resultado->fetch_array();
        alumnos($fila);
    */

    // Recorre 3 filas (con for)
    for ($i = 0; $i < 3; $i++) {
        $fila=$resultado->fetch_array();
        alumnos($fila); // Visualiza el id y nombre (echo)
    }

    $conexion->close();
  }

  function alumnos($fila) {
    echo '<p>';
	   
    echo 'idAlumno: '. $fila["idAlumno"]; 
       
    echo '<br>';
       
    echo 'Nombre: ' . $fila["nombre"];
	   
    echo '</p>';
  }

  function mostrar_jesuitas() {
    $conexion = conectar();

    $sql = 'SELECT nombreJesuita FROM alumnos';
    $resultado = $conexion->query($sql);

    echo '<select name="destinatario">';

    // Mostrar nombreJesuita tantos option como filas hayan

    // fetch_array() devuelve el array unidimensional y TRUE/FALSE
    // Cuando es final de puntero y no hay más filas, devuelve false
    while ($fila = $resultado->fetch_array()) {
      // Primero el option value con el valor del nombreJesuita, después el texto con el mismo valor y por ultimo </option>
      echo '<option value="' . $fila["nombreJesuita"] . '">' . $fila["nombreJesuita"] . '</option>';
    }
    // Cuando no hay siguiente fila, devuelve false y acaba el bucle

    echo '</select>';

    $conexion->close();
  }

  // Hay que llamar a la función para que muestre el mensaje
  mostrar_alumnos();
  mostrar_jesuitas();
 ?>