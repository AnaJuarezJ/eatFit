<?php
session_start();
include '../logica/conexion.php';
$rol = $_SESSION['rol'];

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['currentPassword'], $_POST['newPassword'], $_POST['confirmPassword'])) {
    $currentPassword = $_POST['currentPassword'];
    $newPassword = $_POST['newPassword'];
    $confirmPassword = $_POST['confirmPassword'];

    $email = $_SESSION['email'];

    $sql = "SELECT password FROM usuario WHERE email = '$email'";
    $result = $conexion->query($sql);

    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        $hashedPassword = $row['password'];

        // Verificar si la contraseña actual coincide con la contraseña almacenada en la base de datos
        if (password_verify($currentPassword, $hashedPassword) && $newPassword === $confirmPassword) {
            // Generar el hash de la nueva contraseña
            $hashedNewPassword = password_hash($newPassword, PASSWORD_DEFAULT);

            // Actualizar la contraseña en la base de datos
            $updateQuery = "UPDATE usuario SET password = '$hashedNewPassword' WHERE email = '$email'";
            if ($conexion->query($updateQuery) === TRUE) {
                $_SESSION['alert'] = 'success_pass';
            } else {
                $_SESSION['alert'] = 'error_pas';
            }
        } else {
            $_SESSION['alert'] = 'error_datos_pass';
        }
    } 

    $conexion->close();
}
if($rol === 'cliente')
    {
        header("Location: http://localhost/eatFit/usuario/editar_perfil.php");
        exit();
    }else{
        if($rol === 'admi')
        {
            header("Location: http://localhost/eatFit/admi/editar_perfil.php");
            exit();
        }
    }
?>
