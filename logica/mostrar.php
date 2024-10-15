<?php
include '../logica/conexion.php';

// Lógica para filtrar usuarios
$filtro_nombre_usuario = isset($_POST['filtro_nombre_usuario']) ? $_POST['filtro_nombre_usuario'] : '';

$sqlUsuarios = "SELECT * FROM usuario WHERE activo = 1";

if (!empty($filtro_nombre_usuario)) {
    $sqlUsuarios .= " AND email LIKE '%$filtro_nombre_usuario%'";
}

$resultUsuarios = $conexion->query($sqlUsuarios);

// Lógica para filtrar alimentos
$filtro_nombre_alimento = isset($_POST['filtro_nombre_alimento']) ? $_POST['filtro_nombre_alimento'] : '';
$filtro_categoria = $_POST['filtro_categoria'] ?? '';

$sqlAlimentos = "SELECT * FROM alimento WHERE 1 = 1";

if (!empty($filtro_nombre_alimento)) {
    $sqlAlimentos .= " AND nombre LIKE '%$filtro_nombre_alimento%'";
}

if (!empty($filtro_categoria) && $filtro_categoria !== 'Todos') {
    $sqlAlimentos .= " AND categoria = '$filtro_categoria'";
}

$resultAlimentos = $conexion->query($sqlAlimentos);
?>