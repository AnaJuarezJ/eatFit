<?php
session_start();
if(isset($_SESSION['email'])&& isset($_SESSION['nombre']) && isset($_SESSION['activo']))
{
  $nom = $_SESSION['nombre'];
  $email = $_SESSION['email'];
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

if (isset($_SESSION['alert'])) {
  $alertType = $_SESSION['alert'];
  switch ($alertType) {
      case 'success':
        $alert = "Nombre actualizado correctamente";
        break;
      case 'error':
        $alert = "Error al actualizar el nombre: " . $conexion->error;
        break;
      case 'error_datos':
        $alert = "Error en los datos";
        break;
      case 'success_pass':
        $alert = "Contraseña actualizada correctamente.";
        break;
      case 'error_datos_pass':
        $alert = "Verifique las contraseñas";
        break;
  }
  unset($_SESSION['alert']); 
}

?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Perfil</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"> <!-- Font Awesome -->
    <link rel="stylesheet" href="../css/nav.css">
    <link rel="stylesheet" href="../css/editar_perfil.css">

  </head>
<body>
<?php if (!empty($alert)): ?>
    <script>alert('<?php echo $alert; ?>');</script>
<?php endif; ?>
    <!-- Navbar -->  <!-- Navbar -->
  <div class="menu">
    <a href="./home.php" class="logo"><i class="fas fa-user-circle"></i></a>
    <input type="checkbox" id="toggle" class="toggle-btn">
    <label for="toggle" class="toggle-icon">&#9776;</label>
    <ul>
    <li><a href="./home.php"><i class="fas fa-sign-out-alt"></i> Regresar</a></li>
    </ul>
  </div>

<br><br><br><br>
 
<h1>Editar perfil</h1>

    <div class="section">
        <form id="updateUsernameForm" action="../logica/actualizar_nom.php" method="post">
            <div class="input-group">
                <label for="username">Nuevo nombre de usuario</label>
                <input type="text" id="username" name="username" value="<?php echo $nom ?>" required>
            </div>
            <button type="submit" class="btn">Actualizar Nombre</button>
        </form>
    </div>
<br><br><br>
    <div class="section">
        <form id="updatePasswordForm" action="../logica/actualizar_pass.php" method="post">
            <div class="input-group">
                <label for="currentPassword">Contraseña actual</label>
                <input type="password" id="currentPassword" name="currentPassword" required>
            </div>
            <div class="input-group">
                <label for="newPassword">Nueva contraseña</label>
                <input type="password" id="newPassword" name="newPassword" required>
            </div>
            <div class="input-group">
                <label for="confirmPassword">Confirmar nueva contraseña</label>
                <input type="password" id="confirmPassword" name="confirmPassword" required>
            </div>
            <button type="submit" class="btn">Actualizar Contraseña</button>
        </form>
    </div>
</body>
</html>