<?php
  include '../logica/conexion.php';
        $nombre = $_POST['nombre'];
        $email = $_POST['email'];
        $activo = $_POST['activo'];

        $sql = "SELECT * FROM usuario WHERE 
            nombre LIKE '%$nombre%' AND 
            email LIKE '%$email%'";

        $result = $conexion->query($sql);

        if ($result->num_rows > 0) {
            // Mostrar los resultados en una tabla
            echo "<table border='1'>
            <tr>
            <th>Nombre</th>
            <th>Email</th>
            <th>Activo</th>
            </tr>";
    
            while($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row['nombre'] . "</td>";
                echo "<td>" . $row['email'] . "</td>";
                echo "<td>" . $row['activo'] . "</td>";
                echo "</tr>";
            }
            echo "</table>";
        } else {
            echo "No se encontraron resultados";
        }
    // Cerrar la conexión a la base de datos
    $conexion->close();
    ?>