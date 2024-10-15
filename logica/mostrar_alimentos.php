<?php
include '../logica/conexion.php';

// Consulta para obtener alimentos según el filtro
$filtro_nombre = isset($_POST['filtro_nombre']) ? $_POST['filtro_nombre'] : '';
$filtro_categoria = $_POST['filtro_categoria'] ?? '';

$sql = "SELECT * FROM alimento WHERE 1 = 1";

if (!empty($filtro_nombre)) {
    $sql .= " AND nombre LIKE '%$filtro_nombre%'";
}

if (!empty($filtro_categoria) && $filtro_categoria !== 'Todos') {
    $sql .= " AND categoria = '$filtro_categoria'";
}

$result = $conexion->query($sql);

echo "<table id='tablaAlimentos'>";
echo "<thead>";
echo "<tr><th>ID</th><th>Nombre</th><th>Categoría</th><th>Selección</th></tr>";
echo "</thead>";
echo "<tbody>";

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "<tr><td>" . $row["id"] . "</td><td>" . $row["nombre"] . "</td><td>" . $row["categoria"] . "</td><th><input type='checkbox'></th></tr>";
    }
} else {
    echo "<tr><td colspan='4'>No se encontraron alimentos</td></tr>";
}

echo "</tbody>";
echo "</table>";

$conexion->close();
?>
