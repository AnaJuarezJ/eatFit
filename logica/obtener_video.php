<?php
include 'conexion.php';
session_start();
$_SESSION['video_url'] ="";

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['accion'])) {
    $accion = $_POST['accion'];
    $email = $_SESSION['email'];
    $dia = '';

    switch ($accion) {
        case 'Lunes':
            $dia = 'Lunes';
            break;
        case 'Martes':
            $dia = 'Martes';
            break;
        case 'Miercoles':
            $dia = 'Miercoles'; 
            break;
        case 'Jueves':
            $dia = 'Jueves'; 
            break;
        case 'Viernes':
            $dia = 'Viernes'; 
            break;
        case 'Sabado':
            $dia = 'Sabado'; 
            break;
        case 'Domingo':
            $dia = 'Domingo'; 
            break;
        // ... Los otros casos para los días restantes

        default:
            header("Location: http://localhost/eatFit/usuario/entrenamientos.php?error=Día no válido");
            exit();
    }

    $sql = "SELECT url FROM rutina WHERE email = ? AND dia = ?";
    $statement = $conexion->prepare($sql);
    $statement->bind_param("ss", $email, $dia);
    $statement->execute();
    $result = $statement->get_result();

    if ($result && $result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $videoURL = $row['url'];
        $_SESSION['video_url'] = $videoURL; // Almacena la URL
        
         // Redirigir de vuelta a entrenamientos.php
         header("Location: http://localhost/eatFit/usuario/entrenamientos.php");
         exit();
    } else {
        $_SESSION['error_message'] = "No se encontró ningún video para este día y usuario.";
        header("Location: http://localhost/eatFit/usuario/entrenamientos.php");
        exit();
    }

    $statement->close();
    $conexion->close();
} else {
    $_SESSION['error_message'] = "No se proporcionó un día válido.";
    header("Location: http://localhost/eatFit/usuario/entrenamientos.php");
    exit();
}
?>
