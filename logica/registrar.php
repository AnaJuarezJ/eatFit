<?php
include '../logica/conexion.php';

if (!isset($_POST['nombre']) || !isset($_POST['email']) || !isset($_POST['new-password']) || !isset($_POST['confirm-password'])) {
    header("Location: http://localhost/eatFit/crearCuenta.php");
    exit();
}

// Verificar si se envió el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['registro'])) {
    // Obtener los datos del formulario
    $nombre = $_POST['nombre'];
    $email = $_POST['email'];
    $password = $_POST['new-password'];
    $confirmPassword = $_POST['confirm-password'];

    // Verificar si las contraseñas coinciden
    if ($password !== $confirmPassword) {
        session_start();
        $_SESSION['alert'] = "contrasenas_no_coinciden";
        header("Location: http://localhost/eatFit/crearCuenta.php");
        exit();
    } else {
        // Verificar si el correo electrónico ya existe en la base de datos
        $stmt = $conexion->prepare("SELECT email FROM usuario WHERE email = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $stmt->store_result();

        if ($stmt->num_rows > 0) {
            // El correo electrónico ya existe en la base de datos
            session_start();
            $_SESSION['alert'] = "email_existente";
            header("Location: http://localhost/eatFit/crearCuenta.php");
            exit();
        } else {
            // Hash de la contraseña
            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

            // Preparar la consulta SQL con consultas preparadas
            $fechaActual = date("Y-m-d H:i:s");
            $sql = "INSERT INTO usuario (nombre, email, password, fecha_registro) VALUES (?, ?, ?, ?)";
            $stmt = $conexion->prepare($sql);

            if ($stmt) {
                // Enlazar parámetros y ejecutar la consulta
                $stmt->bind_param("ssss", $nombre, $email, $hashedPassword, $fechaActual);
                if ($stmt->execute()) {
                    echo "Registro exitoso. ¡Cuenta creada!";
                    header("Location: http://localhost/eatFit/admi/cuenta.php");
                    exit();
                } else {
                    echo "Error al ejecutar la consulta: " . $stmt->error;
                }
                $stmt->close();
            } else {
                echo "Error en la preparación de la consulta: " . $conexion->error;
            }
        }
    }
}

// Cerrar la conexión
$conexion->close();
?>