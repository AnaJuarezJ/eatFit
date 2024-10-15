<?php
include '../logica/conexion.php';
session_start(); 
if (!isset($_POST['mensaje'])) {
    header("Location: http://localhost/eatFit/usuario/soporte.php");
    exit(); 
}

// Recibe los datos del formulario
$mensaje = $_POST['mensaje'];
$fechaActual = date("Y-m-d H:i:s");
$sql = "INSERT INTO soporte (email, mensaje, fecha) VALUES (?, ?, ?)";
$stmt = $conexion->prepare($sql);

if ($stmt) {
    $stmt->bind_param("sss", $_SESSION['email'], $mensaje, $fechaActual);
    if ($stmt->execute()) {
        $_SESSION['alert'] = "success_message";
        header("Location: http://localhost/eatFit/usuario/soporte.php");
        exit();
    } else {
        echo "Error al ejecutar la consulta: " . $stmt->error;
    }
    $stmt->close();
} else {
    echo "Error en la preparación de la consulta: " . $conexion->error;
}

$conexion->close(); // Cierra la conexión a la base de datos

header("Location: http://localhost/eatFit/usuario/soporte.php");
exit();
?>