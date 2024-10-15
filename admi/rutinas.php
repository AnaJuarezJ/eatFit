<?php
session_start();
$alert = "";
if(isset($_SESSION['email'])&& isset($_SESSION['nombre']) && isset($_SESSION['activo']))
{
  $rol = $_SESSION['rol'];
  if ($rol !== "admi") {
    header("Location: http://localhost/eatFit/login.php");
  }
}else{
  header("Location: http://localhost/eatFit/login.php");
  return;
}
if (isset($_SESSION['activo'])) {
  $activo = $_SESSION['activo'];
    if($activo === 0)
    {
      $_SESSION['alert'] = 'inactivo';
      header("Location: http://localhost/eatFit/admi/home.php");
    }
}
include '../logica/alertas.php';
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Rutinas</title>
  
  <link rel="stylesheet" href="../css/nav.css">
  <link rel="stylesheet" href="../css/rutinas.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"> <!--Flecha abajo-->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Bebas+Neue">

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

  <div class="contenido">
  <div class ="video">
      <h1>Agregar video</h1>
      <form action="../logica/guardar_rutina.php" method="POST" id="formAgregarVideo">
      <label for="email_seleccionado">Email seleccionado:</label>
      <input type="text" name="email_seleccionado" id="email_seleccionado" readonly><br><br>

      <label for="dia">Día:</label>
        <select name="dia" id="dia">
          <option value="Lunes">Lunes</option>
          <option value="Martes">Martes</option>
          <option value="Miercoles">Miércoles</option>
          <option value="Jueves">Jueves</option>
          <option value="Viernes">Viernes</option>
          <option value="Sabado">Sabado</option>
          <option value="Domingo">Domingo</option>
        </select><br><br>
        <label for="video_url" >URL del video:</label>
        <input type="text" name="video_url" id="video_url" placeholder="URL del video" required>
        <input type="submit" value="Guardar">
      </form>

      <div id="video-preview">
      </div>
    </div>

    <br>
    <hr class="custom-line">
    <br>

    <h1>Usuarios</h1>
    <form action="../logica/mostrar_usuarios.php" method="POST" id="formFiltro">
      <label for="filtro_nombre">Filtrar por email:</label>
      <input type="text" name="filtro_nombre" id="filtro_nombre">
      <input type="submit" value="Filtrar">
    </form>
    
        <?php include '../logica/mostrar_usuarios.php'; ?>
  </div>
  
  <script src="../js/rutinas.js"></script>
</body>
</html>
