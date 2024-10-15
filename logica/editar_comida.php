<?php
include '../logica/conexion.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $accion = $_POST['accion'];
    switch($accion)
    {
        case 'Modificar':
            $id_seleccionado = $_POST['id_comida'];
            $porcion = $_POST['porcion'];
            if(!empty($id_seleccionado)  && !empty($porcion)){
                $query = "UPDATE comidas SET porcion='$porcion' WHERE id_comida='$id_seleccionado'";
                $resultado = mysqli_query($conexion, $query);

                if ($resultado) {
                    $_SESSION['alert'] = "success";
                } else {
                    $_SESSION['alert'] = "error";
                }
            } else {
                $_SESSION['alert'] = "nombre";
            }
            break;
        case 'Eliminar':
            $id_seleccionado = $_POST['id_comida'];
            if(!empty($id_seleccionado)){
                $query = "DELETE FROM comidas WHERE  id_comida='$id_seleccionado'";
                $resultado = mysqli_query($conexion, $query);

                if ($resultado) {
                    $_SESSION['alert'] = "success";
                } else {
                    $_SESSION['alert'] = "error";
                }
            } else {
                $_SESSION['alert'] = "nombre";
            }
            break;  
    }
}
mysqli_close($conexion); 
header("Location: http://localhost/eatFit/admi/editar_comida.php");
exit();
?>