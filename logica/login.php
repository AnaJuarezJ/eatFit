<?php
session_start();
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$user = "root";
$pass = "";
$host = "localhost";
$bd = "eatfit";

$conexion = mysqli_connect($host, $user, $pass, $bd);

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['email']) && isset($_POST['password'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Consulta para obtener la información del usuario por email
    $sql = "SELECT nombre, email, password, rol, activo FROM usuario WHERE email = ?";
    $stmt = $conexion->prepare($sql);

    if ($stmt) {
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows === 1) {
            $row = $result->fetch_assoc();
            $storedPassword = $row['password'];
            $userRole = $row['rol']; // Obtener el rol del usuario desde la base de datos

            // Verificar si la contraseña proporcionada coincide con la almacenada
            if (password_verify($password, $storedPassword)) {
                $_SESSION['nombre'] = $row['nombre'];
                $_SESSION['email'] = $row['email'];
                $_SESSION['rol'] = $row['rol'];
                $_SESSION['activo'] = $row['activo'];
                $_SESSION['video_url'] = 'https://www.youtube.com/watch?v=Q_XYkLgTUxY';
                // Redirigir según el rol del usuario
                if ($userRole === 'admi') {
                    header("Location: http://localhost/eatFit/admi/home.php");
                } else if ($userRole === 'cliente') {
                    header("Location: http://localhost/eatFit/usuario/perfil.php");
                } else {
                    header("Location: http://localhost/eatFit/error.php");
                }
                exit();
            } else {
                $_SESSION['alert'] = "incorrect_password"; // Establecer alerta para mostrar en login.php
            }
        } else {
            $_SESSION['alert'] = "user_not_found"; // Establecer alerta para mostrar en login.php
        }

        $stmt->close();
    } else {
        $_SESSION['alert'] = "prepare_error"; // Establecer alerta para mostrar en login.php
    }

    header("Location: http://localhost/eatFit/login.php");
    exit();
}

$conexion->close();
?>
