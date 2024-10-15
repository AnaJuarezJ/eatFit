<?php
include '../logica/conexion.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $accion = $_POST['accion'];
    switch ($accion) {
        case 'Insertar':
             // Insertar registro
                $nombre = $_POST['alimento'];
                $categoria = $_POST['categoria'];

                if (!empty($nombre)) {
                    $query = "INSERT INTO alimento (nombre, categoria) VALUES ('$nombre', '$categoria')";
                    $resultado = mysqli_query($conexion, $query);

                    if ($resultado) {
                        $_SESSION['alert'] = "success";
                    } else {
                        $_SESSION['alert'] = "errorInsert";
                    }
                } else {
                    $_SESSION['alert'] = "nombre";
                }
            break;
        case 'Modificar':
            // Modificar registro
                $id_seleccionado = $_POST['id_seleccionado'];
                $nombre = $_POST['alimento'];
                $categoria = $_POST['categoria'];

                if (!empty($id_seleccionado) && !empty($nombre)) {
                    $query = "UPDATE alimento SET nombre='$nombre', categoria='$categoria' WHERE id='$id_seleccionado'";
                    $resultado = mysqli_query($conexion, $query);

                    if ($resultado) {
                        $_SESSION['alert'] = "success";
                    } else {
                        $_SESSION['alert'] = "errorModificar";
                    }
                } else {
                    $_SESSION['alert'] = "nombre";
                }
            break;
        case 'Eliminar':
            // Eliminar registro
                $id_seleccionado = $_POST['id_seleccionado'];

                if (!empty($id_seleccionado)) {
                    $query = "DELETE FROM alimento WHERE id='$id_seleccionado'";
                    $resultado = mysqli_query($conexion, $query);

                    if ($resultado) {
                        $_SESSION['alert'] = "success";
                    } else {
                        $_SESSION['alert'] = "errorEliminar";
                    }
                } else {
                    $_SESSION['alert'] = "nombre";
                }
            break;
    }
}

mysqli_close($conexion); // Cierra la conexión a la base de datos

header("Location: http://localhost/eatFit/admi/alimentos.php");
exit(); // Asegura que el script se detenga después de la redirección
?>
