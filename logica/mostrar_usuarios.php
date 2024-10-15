<?php
include '../logica/conexion.php';

// Consulta para obtener usuarios según el filtro
$filtro_nombre = isset($_POST['filtro_nombre']) ? $_POST['filtro_nombre'] : '';

// Construir consulta SQL
$sql = "SELECT * FROM usuario WHERE activo = 1";

if (!empty($filtro_nombre)) {
    $sql .= " AND email LIKE '%$filtro_nombre%'";
}

$result = $conexion->query($sql);

echo "<table id='tablaUsuarios'>";
echo "<thead>";
echo "<tr><th>Email</th><th>Nombre</th><th>Estado</th><th>Selección</th></tr>";
echo "</thead>";
echo "<tbody>";

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "<tr><td>".$row["email"]."</td><td>".$row["nombre"]."</td><td>".$row["activo"]."</td><th><input type='checkbox'></th></tr>";
    }
} else {
    echo "<tr><td colspan='4'>No se encontraron usuarios</td></tr>";
}

echo "</tbody>";
echo "</table>";

$conexion->close();
?>