<?php
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
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"> <!--Flecha abajo-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Bebas+Neue">
    <link rel="stylesheet" href="../css/nav.css">
    <link rel="stylesheet" href="../css/perfil.css"> 
    
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
      <li><a href="./home.php"><i class="fas fa-house-user"></i> Home</a></li>
      <li><a href="./comidas.php"><i class="fas fa-utensils"></i> Comidas</a></li>
      <li><a href="./alimentos.php"><i class="fas fa-drumstick-bite"></i> Alimentos</a></li>
      <li><a href="./rutinas.php"><i class="fas fa-running"></i> Rutinas</a></li>
      <li><a href="./soporte.php"><i class="fas fa-tools"></i></a></li>
      <li><a href="../logica/logout.php"><i class="fas fa-sign-out-alt"></i> </a></li>
    </ul>
  </div>
  
  <div class="profile-container">
  <h1>BIENVENIDO</h1>
<br><br><br><br>
        <img src="../assets/dwaynejohnson.jpg" alt="Imagen de Perfil" class="profile-picture">
        <div class="profile-details">
        <a href="./editar_perfil.php" class="edit-profile-btn"> <i class="fas fa-edit"></i></a> 
            <p><strong>Nombre:</strong> <?php echo isset($user) ? $user : 'Ingrese su nombre'; ?></p>
            <p><strong>Correo:</strong> <?php echo isset($email) ? $email : 'Ingrese su email'; ?></p>
            <?php
                if ($activo === 1) {
                  ?> <p><strong>Estado:</strong> <span class="active-status">Activo</span></p> <?php
                } else if ($activo === 0) { // Opción si el usuario está inactivo
                  ?> <p><strong>Estado:</strong> <span class="inactive-status">Inactivo</span></p> <?php
                } 
            ?>
            
            <br><br><br>
            <br><br><br><br><br><br>
        </div>
    </div>
    </div>
</body>
</html>
