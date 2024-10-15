<?php
include '../logica/conexion.php';
  
   // Consulta para obtener usuarios según el filtro
  $email = $_SESSION['email_usuario'] ?? ''; // Aquí estaba el error
  $filtro_categoria = $_POST['categoria'] ?? '';

   $sql = "SELECT c.*, a.nombre AS nombre FROM comidas c JOIN alimento a ON c.id_alimento = a.id WHERE c.email = '".$email."'";
   
   if (!empty($filtro_categoria)) {
        $sql .= " AND tiempo = '$filtro_categoria'";
   }
   //echo( $sql);
   $result = $conexion->query($sql);

   if ($result->num_rows > 0) {
    echo "<table id='tablaComidas'>";
    echo "<thead>";
    echo "<tr><th>ID</th><th>Tiempo</th><th>Nombre</th><th>Porcion</th><th>Seleccionar</th></tr>";
    echo "</thead>";
    echo "<tbody>";
       while ($row = $result->fetch_assoc()) {
           echo "<tr><td>" . $row["id_comida"] . "</td><td>" . $row["tiempo"] . "</td><td>" . $row["nombre"] . "</td><td>" . $row["porcion"] . " gr</td><th><input type='checkbox'></th></tr>";
        }
    echo "</tbody>";
    echo "</table>";
   } else {
       echo "<tr><td colspan='3'>No se encontraron alimentos</td></tr>";
   }
   
   $conexion->close();
   
  ?>