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

if (isset($_SESSION['alert'])) {
    $alertType = $_SESSION['alert'];
    switch ($alertType) {
        case 'success':
          $alert = "Operación Exitosa.";
          break;
        case 'errorInsert':
          $alert = "Error al insertar.";
          break;
        case 'errorModificar':
          $alert = "Error al modificar el registro.";
          break;
        case 'errorEliminar':
          $alert = "Error al eliminar el registro.";
          break;
        case 'nombre':
          $alert = "El campo 'nombre' no puede estar vacío.";
          break;
        case 'no_existe':
          $alert = "Seleccione un usuario";
          break;
    }
    unset($_SESSION['alert']); 
}
?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio</title>
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
  <br>
    <h2>Agregar alimento</h2>
  <form action="../logica/alimentos.php" method="POST" id="formAlimento">
    <label for="id_seleccionado">Identificador único:</label>
    <input type="text" name="id_seleccionado" id="id_seleccionado" readonly placeholder=""><br><br>
    <label for="alimento">Nombre del alimento:</label>
    <input type="text" name="alimento" id="alimento" placeholder="Inserta el nombre del alimento"><br><br>

    <label for="categoria">Categoría:</label>
      <select name="categoria" id="categoria">
        <option value="Proteina">Proteina</option>
        <option value="Carboidratos">Carboidratos</option>
        <option value="Grasas">Grasas</option>
        <option value="Carboidratos y Grasas">Carboidratos y Grasas</option>
        <option value="Proteinas y Grasas">Proteinas y Grasas</option>
      </select><br><br>

      <input name="accion" type="submit" value="Insertar"> 
      <input name="accion" type="submit" value="Modificar">      
      <input name="accion" type="submit" value="Eliminar">
    </form>
    <br><br> 
    <hr class="custom-line">
    <br><br> 

    <form action="../logica/mostrar_alimentos.php" method="POST" id="formFiltro">
      <label for="filtro_nombre">Filtrar por nombre:</label>
      <input type="text" name="filtro_nombre" id="filtro_nombre">
      <label for="filtro_categoria">Seleccionar Categoría:</label>
      <select name="filtro_categoria" id="filtro_categoria">
        <option value="Todos">Todos</option>
        <option value="Proteina">Proteina</option>
        <option value="Carboidratos">Carboidratos</option>
        <option value="Grasas">Grasas</option>
        <option value="Carboidratos y Grasas">Carboidratos y Grasas</option>
        <option value="Proteinas y Grasas">Proteinas y Grasas</option>
      </select>
      <input type="submit" value="Filtrar">
    </form>
    
        <?php include '../logica/mostrar_alimentos.php'; ?>
  </div>
  
    

  
  <script src="../js/alimentos.js"></script>
</body>
</html>
