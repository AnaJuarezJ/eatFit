<?php
include '../logica/conexion.php';
session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email_seleccionado'];
    $dia = $_POST['dia'];
    $video_url = $_POST['video_url'];
    echo var_dump($_SESSION);
    // Verifica si el email seleccionado existe en la tabla usuario
    $sql_check_email = "SELECT * FROM usuario WHERE email='$email'";
    $result_check_email = $conexion->query($sql_check_email);

    if ($result_check_email->num_rows > 0) {
        // Si existe el email en la tabla usuario, realiza la operación en la tabla rutina
        // Verifica si ya existe un registro para ese email y día en la tabla rutina
        $sql = "SELECT * FROM rutina WHERE email='$email'";// AND dia='$dia'";
        $result = $conexion->query($sql);

        if ($result->num_rows > 0) {
            // Si existe un registro, actualiza los datos
            $sql = "UPDATE rutina SET url='$video_url' WHERE email='$email' AND dia='$dia'";
        } else {
            // Si no existe un registro, inserta los nuevos datos
            $sql = "INSERT INTO rutina (email, dia, url) VALUES ('$email', 'Lunes', '$video_url')";
        }

        if ($conexion->query($sql) === TRUE) {
            $_SESSION['alert'] = "success";
        } else {
            echo "Error: " . $sql . "<br>" . $conexion->error;
        }
    } else {
        $_SESSION['alert'] = "no_existe";
    }
} else {
    $_SESSION['alert'] = "datos";
}
$conexion->close();
header("Location: http://localhost/eatFit/admi/rutinas.php");
?>