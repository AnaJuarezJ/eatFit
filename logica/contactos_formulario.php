<?php
include '../logica/conexion.php';

if (!isset($_POST['nombre']) || !isset($_POST['email']) || !isset($_POST['telefono']) || !isset($_POST['mensaje'])) {
    header("Location: http://localhost/eatFit/home.php");
    exit(); // Agrega exit después de redirigir para asegurarte de que se detenga la ejecución del script actual
}

// Recibe los datos del formulario
$nombre = $_POST['nombre'];
$email = $_POST['email'];
$telefono = $_POST['telefono'];
$mensaje = $_POST['mensaje'];

// Validar el número de teléfono (debe tener 10 dígitos)
if (strlen($telefono) !== 10 || !ctype_digit($telefono)) {
    $_SESSION['alert'] = "phone_error";
    header("Location: http://localhost/eatFit/home.php");
    exit();
}

// Validar el correo electrónico
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $_SESSION['alert'] = "email_error";
    header("Location: http://localhost/eatFit/home.php");
    exit();
}

// Insertar datos en la tabla contactos
$sql = "INSERT INTO contacto (email, nombre, telefono, mensaje) VALUES ('$email', '$nombre', '$telefono', '$mensaje')";

if ($conexion->query($sql) === TRUE) {
    $_SESSION['alert'] = "success_message";
} else {
    $_SESSION['alert'] = "error_message";
}

$conexion->close(); // Cierra la conexión a la base de datos

header("Location: http://localhost/eatFit/home.php");
exit();
?>