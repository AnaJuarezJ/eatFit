<?php
session_start();
include '../logica/conexion.php';
$rol = $_SESSION['rol'];

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['username'])) {
    $nuevoNombre = $_POST['username'];
    $email = $_SESSION['email'];

    $sql = "UPDATE usuario SET nombre = '$nuevoNombre' WHERE email = '$email'";

    if ($conexion->query($sql) === TRUE) {
        $_SESSION['nombre'] = $nuevoNombre;
        $_SESSION['alert'] = 'success'; //echo "";
    } else {
        $_SESSION['alert'] = 'error';// echo "Error al actualizar el nombre: " . $conexion->error;
    }
    $conexion->close();
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
}
else {
    $_SESSION['alert'] = 'error_datos';
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
}
?>
