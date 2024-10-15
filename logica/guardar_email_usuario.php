<?php
session_start();

// Recibir el valor del campo email_usuario
$data = json_decode(file_get_contents('php://input'), true);
$emailUsuario = $data['email_usuario'] ?? '';

// Guardar el valor en la sesión
$_SESSION['email_usuario'] = $emailUsuario;
?>
