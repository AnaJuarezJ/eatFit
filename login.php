<?php
session_start();
$alert = "";
require './logica/alertas.php';

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/login.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Bebas+Neue">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Bebas+Neue">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"> <!--Flecha abajo-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Condensed:wght@100&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <link rel="stylesheet" href="./css/nav.css">
    <title>Iniciar Sesión</title>
</head>
<body>
<?php if (!empty($alert)): ?>
    <script>alert('<?php echo $alert; ?>');</script>
<?php endif; ?>
    <!-- Navbar -->
  <div class="menu">
    <a href="./home.php" class="logo">EATFIT</a>
    <input type="checkbox" id="toggle" class="toggle-btn">
    <label for="toggle" class="toggle-icon">&#9776;</label>
    <ul>
       <li><a href="./home.php"><i class="fas fa-house-user"></i> Inicio</a></li>
      <li><a href="./login.php"><i class="fas fa-user"></i> Iniciar sesión</a></li>
      <li><a href="./crearCuenta.php"><i class="fas fa-user-plus"></i> Crear cuenta</a></li>
      <li><a href="./home.php#about"><i class="fas fa-info-circle"></i> Acerca de nosotros</a></li>
      <li><a href="./home.php#testimonio"><i class="fas fa-comments"></i> Testimonios</a></li>
      <li><a href="./home.php#planes"><i class="fas fa-shopping-cart"></i> Planes</a></li>
      <li><a href="./home.php#contactUs"><i class="fas fa-envelope"></i> Contáctanos</a></li>
    </ul>
  </div>

    <div class="login-container">
        <form class="login-form" action="./logica/login.php" method="post">
            <h2>Iniciar Sesión</h2>
            <div class="input-container">
                <label for="email">Usuario</label>
                <input type="email" id="email" name="email" required placeholder="email@ejemplo.com">
            </div>

            <div class="input-container">
                <label for="password">Contraseña</label>
                <input type="password" id="password" name="password" required>
            </div>

            <button type="submit">Iniciar Sesión</button>
            <p class="signup-link">¿No tienes una cuenta? <br> <a href="crearCuenta.php"> Regístrate aquí</a></p>
        </form>
    </div>

</body>
</html>
