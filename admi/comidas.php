<?php 
include '../logica/mostrar.php';
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
      case 'datos':
        $alert = "No se recibieron todos los datos necesarios, complete el formulario.";
        break;
      case 'no_existe':
        $alert = "Seleccione un usuario";
        break;
  }
  unset($_SESSION['alert']); 
}

unset($_SESSION['email_usuario']);
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Comidas</title>
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
    <form action="../logica/comidas.php" method="POST" id="formSeleccionUsuario">
     <br><br>
    <h2>Agregar un alimento a una comida</h2>         
      <input type="text" name="email_usuario" id="email_usuario" placeholder="Seleccionar Usuario de la lista" value="" require readonly>
      <input type="text" name="nombre_alimento" id="nombre_alimento" placeholder="Seleccionar Alimento de la lista" require readonly>
      <input type="hidden" name="id_alimento" id="id_alimento" require readonly>
      <select name="categoria" id="categoria">
        <option value="Desayuno">Desayuno</option>
        <option value="Almuerzo">Almuerzo</option>
        <option value="Comida">Comida</option>
        <option value="Merienda">Merienda</option>
        <option value="Cena">Cena</option>
      </select><br><br>
      <input type="text" name="porcion" id="porcion" placeholder="Ingrese la porción en gr">
      <input type="submit" value="Agregar">    

      <a href="./editar_comida.php" class="edit-profile-btn"> <i class="fas fa-edit"></i></a> 
    </form>

    <br>
    <hr class="custom-line">
    <br>

<!-- Formulario para filtrar usuarios -->
<form action="comidas.php" method="POST">
        <label for="filtro_nombre_usuario">Filtrar por email de usuario:</label>
        <input type="text" name="filtro_nombre_usuario" id="filtro_nombre_usuario" value="<?php echo $filtro_nombre_usuario; ?>">
        <input type="submit" value="Filtrar">
    </form>

    <!-- Formulario para filtrar alimentos -->
    <form action="comidas.php" method="POST">
        <label for="filtro_nombre_alimento">Filtrar por nombre de alimento:</label>
        <input type="text" name="filtro_nombre_alimento" id="filtro_nombre_alimento" value="<?php echo $filtro_nombre_alimento; ?>">
        <label for="filtro_categoria">Filtrar por categoría de alimento:</label>
        <select name="filtro_categoria" id="filtro_categoria">
            <option value="Todos">Todos</option>
            <option value="Proteina">Proteína</option>
            <option value="Carboidratos">Carbohidratos</option>
            <option value="Grasas">Grasas</option>
            <option value="Carboidratos y Grasas">Carbohidratos y Grasas</option>
            <option value="Proteinas y Grasas">Proteínas y Grasas</option>
        </select>
        <input type="submit" value="Filtrar">
    </form>

    <!-- Mostrar resultados de usuarios -->
    <div>
        <?php
        echo "<table id='tablaUsuarios'>";
        echo "<thead>";
        echo "<tr><th>Email</th><th>Nombre</th><th>Estado</th><th>Selección</th></tr>";
        echo "</thead>";
        echo "<tbody>";

        if ($resultUsuarios->num_rows > 0) {
            while ($row = $resultUsuarios->fetch_assoc()) {
                echo "<tr><td>".$row["email"]."</td><td>".$row["nombre"]."</td><td>".$row["activo"]."</td><th><input type='checkbox'></th></tr>";
            }
        } else {
            echo "<tr><td colspan='4'>No se encontraron usuarios</td></tr>";
        }

        echo "</tbody>";
        echo "</table>";
        ?>
    </div>

    <!-- Mostrar resultados de alimentos -->
    <div>
        <?php
        echo "<table id='tablaAlimentos'>";
        echo "<thead>";
        echo "<tr><th>ID</th><th>Nombre</th><th>Categoría</th><th>Selección</th></tr>";
        echo "</thead>";
        echo "<tbody>";

        if ($resultAlimentos->num_rows > 0) {
            while ($row = $resultAlimentos->fetch_assoc()) {
                echo "<tr><td>" . $row["id"] . "</td><td>" . $row["nombre"] . "</td><td>" . $row["categoria"] . "</td><th><input type='checkbox'></th></tr>";
            }
        } else {
            echo "<tr><td colspan='4'>No se encontraron alimentos</td></tr>";
        }

        echo "</tbody>";
        echo "</table>";
        ?>
    </div>
    
    <?php
    $conexion->close();
    ?>
  <script src="../js/comidas.js"></script>

</body>
</html>