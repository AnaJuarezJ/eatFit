<?php
include '../logica/conexion.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Verificar si se han recibido los datos necesarios
    if (isset($_POST['email_usuario'], $_POST['id_alimento'], $_POST['porcion'], $_POST['categoria'])) {
        $email = $_POST['email_usuario'];
        $id_alimento = $_POST['id_alimento'];
        $porcion = $_POST['porcion'];
        $tiempo = $_POST['categoria'];
        
         // para modificar y eliminar
        $_SESSION['email_usuario'] =  $email;
        
        // Verificar si el email existe en la tabla de usuarios
        $email_query = "SELECT * FROM usuario WHERE email = '$email'";
        $email_result = $conexion->query($email_query);

        // Verificar si el ID del alimento existe en la tabla de alimentos
        $alimento_query = "SELECT * FROM alimento WHERE id = '$id_alimento'";
        $alimento_result = $conexion->query($alimento_query);

        if ($email_result->num_rows > 0 && $alimento_result->num_rows > 0) {
            $sql = "INSERT INTO comidas (email, id_alimento, tiempo, porcion) VALUES ('$email', '$id_alimento', '$tiempo', '$porcion')";

            if ($conexion->query($sql) === TRUE) {
                $_SESSION['alert'] = 'success';
            } else {
                $_SESSION['alert'] = 'datos';
            }
        } else {
            $_SESSION['alert'] = 'no_existe';
        }

        $conexion->close();

        header("Location: http://localhost/eatFit/admi/comidas.php");
        exit();
    } else {
        $_SESSION['alert'] = 'datos';
        header("Location: http://localhost/eatFit/admi/comidas.php");
        exit();
    }
} else {
        header("Location: http://localhost/eatFit/admi/comidas.php");
        exit();
    }
?>