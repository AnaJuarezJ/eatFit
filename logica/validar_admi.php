<?php
include '../logica/conexion.php';
session_start();
if(isset($_SESSION['email'])&& isset($_SESSION['nombre']) && isset($_SESSION['activo']))
{
  $user = $_SESSION['nombre'];
  $email = $_SESSION['email'];
  $activo = $_SESSION['activo'];
  $rol = $_SESSION['rol'];
  $alert = "";
  if ($rol !== "admi") {
    header("Location: http://localhost/eatFit/login.php");
    return;
  }
}else{
  header("Location: http://localhost/eatFit/login.php");
  return;
}
?>