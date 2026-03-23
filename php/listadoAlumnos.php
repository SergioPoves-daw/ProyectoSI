<?php
  //Necesitar hacer include o require del archivo que tiene la conexión

  include 'configdb.php';

  function conectar(){
    $conexion = new mysqli(SERVIDOR, USUARIO, PASSWORD, BBDD);
    $conexion->set_charset("utf8"); 
    return $conexion;
  }
  
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

  function alumnos($fila) {
    echo '<p>';
	   
    echo 'idAlumno: '. $fila["idAlumno"]; 
       
    echo '<br>';
       
    echo 'Nombre: ' . $fila["nombre"];
	   
    echo '</p>';
  }

  mostrar_alumnos();
?>