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
if (isset($_SESSION['activo'])) {
  $activo = $_SESSION['activo'];
    if($activo === 0)
    {
      $_SESSION['alert'] = 'inactivo';
      if ($rol === "admi") {
          header("Location: http://localhost/eatFit/admi/home.php");
          return;
      }else{
          if($rol === "cliente"){
              header("Location: http://localhost/eatFit/usuario/perfil.php");
              return;
          }else{
              header("Location: http://localhost/eatFit/error.php");
              return;
          }
      }
    }
} 

if (isset($_SESSION['alert'])) {
  $alertType = $_SESSION['alert'];
  switch ($alertType) {
      case 'success':
          $alert = "Operación Exitosa.";
          break;
      case 'error':
        $alert = "Error al modificar el registro";
        break;
      case 'nombre':
        $alert = "Seleccione elemento";
        break;
  }
  unset($_SESSION['alert']); 
}

if (!empty($_SESSION['email_usuario'])){
  $email = $_SESSION['email_usuario'] ?? ''; // Obtener el valor del correo electrónico de la URL
}else{
  $_SESSION['alert'] = 'no_existe';
  header("Location: http://localhost/eatFit/admi/comidas.php");
  exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/nav.css">
  <link rel="stylesheet" href="../css/rutinas.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"> <!--Flecha abajo-->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Bebas+Neue">
    <title>Editar comida</title>
</head>
<body>
<?php if (!empty($alert)): ?>
    <script>alert('<?php echo $alert; ?>');</script>
<?php endif; ?>
   <!-- Navbar -->  <!-- Navbar -->
   <div class="menu">
    <a href="./comidas.php" class="logo"><i></i></a>
    <input type="checkbox" id="toggle" class="toggle-btn">
    <label for="toggle" class="toggle-icon">&#9776;</label>
    <ul>
      <li><a href="./comidas.php"><i class="fas fa-sign-out-alt"></i> Regresar</a></li>
    </ul>
  </div>
<!--  ../logica/mostrar_comidas.php -->
  <div class="contenido">
  <form action="" method="POST">
     <br>
    <h2> Editar comida </h2>         
        <input type="text" name="email" id="email" placeholder="Email del usuario" value="<?php echo htmlspecialchars($email); ?>" required readonly>
        <select name="categoria" id="categoria">
          <option value="Desayuno">Desayuno</option>
          <option value="Almuerzo">Almuerzo</option>
          <option value="Comida">Comida</option>
          <option value="Merienda">Merienda</option>
          <option value="Cena">Cena</option>
      </select> 
      <input type="submit" value="Buscar" name="buscar"><br>
    </form>

    <form action="../logica/editar_comida.php" method="POST" id="crud">       
        <input type="text" name="id_comida" id="id_comida" placeholder="Id comida" value="" hidden required readonly><br>
        <input type="text" name="porcion" id="porcion" placeholder="Selecciona una comida" value="" required >
        
        <input name="accion" type="submit" value="Modificar" >
        <input name="accion" type="submit" value="Eliminar"><br><br>
    </form>

    <?php include '../logica/mostrar_comida.php'; ?>
  </div>
  <script src="../js/comidas.js"></script>

</body>
</html>