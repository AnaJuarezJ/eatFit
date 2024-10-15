<?php
session_start();
//var_dump($_SESSION);
if(isset($_SESSION['email'])&& isset($_SESSION['nombre']) && isset($_SESSION['activo']))
{
  $user = $_SESSION['nombre'];
  $email = $_SESSION['email'];
  $activo = $_SESSION['activo'];
  $rol = $_SESSION['rol'];
  $alert = "";
  if ($rol !== "cliente") {
    header("Location: http://localhost/eatFit/login.php");
    return;
  }
}else{
  header("Location: http://localhost/eatFit/login.php");
  return;
}
?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Soporte</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"> <!-- Font Awesome -->
    <link rel="stylesheet" href="../css/nav.css">
    <link rel="stylesheet" href="../css/perfil.css">

</head>
<body> 
<?php if (!empty($alert)): ?>
    <script>alert('<?php echo $alert; ?>');</script>
<?php endif; ?>
  <!-- Navbar -->  <!-- Navbar -->
  <div class="menu">
    <a href="./perfil.php" class="logo"><i class="fas fa-user-circle"></i></a>
    <input type="checkbox" id="toggle" class="toggle-btn">
    <label for="toggle" class="toggle-icon">&#9776;</label>
    <ul>
      <li><a href="./perfil.php"><i class="fas fa-house-user"></i> Home</a></li>
      <li><a href="./alimentacion.php"><i class="fas fa-utensils"></i> Alimentación</a></li>
      <li><a href="./entrenamientos.php"><i class="fas fa-running"></i> Entrenamientos</a></li>
      <li><a href="./soporte.php"><i class="fas fa-headset"></i></a></li>
      <li><a href="./editar_perfil.php"><i class="fas fa-cog"></i></a></a></li>
      <li><a href="../logica/logout.php"><i class="fas fa-sign-out-alt"></i> </a></li>
    </ul>
  </div>

  <div class="profile-container">
        <img src="../assets/dwaynejohnson.jpg" alt="Imagen de Perfil" class="profile-picture">
        <div class="profile-details">
        <a href="./editar_perfil.php" class="edit-profile-btn"> <i class="fas fa-edit"></i></a> 
            <p><strong>Nombre:</strong> <?php echo isset($_SESSION['nombre']) ? $_SESSION['nombre'] : 'Ingrese su nombre'; ?></p>
            <p><strong>Correo:</strong> <?php echo isset($_SESSION['email']) ? $_SESSION['email'] : 'Ingrese su email'; ?></p>
            <?php
                if ($activo === 1) {
                  ?> <p><strong>Estado:</strong> <span class="active-status">Activo</span></p> <?php
                } else if ($activo === 0) { // Opción si el usuario está inactivo
                  ?> <p><strong>Estado:</strong> <span class="inactive-status">Inactivo</span></p> <?php
                } 
            ?>
        </div>
        <br>
        <div class="chart">
            <svg class="circle" viewBox="0 0 100 100">
                <circle cx="50" cy="50" r="40" fill="none" stroke="#ccc" stroke-width="10"></circle>
                <text x="50%" y="50%" class="circle-text" text-anchor="middle" alignment-baseline="middle">
                    <!-- Aquí mostrará el porcentaje -->
                </text>
            </svg>
        </div>
        <br>
        <form class="dias-list" id="checkboxes">
            <label><input type="checkbox" class="checkbox" value="20"> Desayuno</label>
            <label><input type="checkbox" class="checkbox" value="20"> Almuerzo</label>
            <label><input type="checkbox" class="checkbox" value="20"> Comida</label>
            <br>
            <label><input type="checkbox" class="checkbox" value="20"> Merienda</label>
            <label><input type="checkbox" class="checkbox" value="20"> Cena</label>
        </form>
    </div>

  <script>
    const checkboxes = document.querySelectorAll('.checkbox');
    const circle = document.querySelector('.circle');
    let totalChecked = 0;

    checkboxes.forEach(checkbox => {
      checkbox.addEventListener('change', function() {
        if (this.checked) {
          totalChecked++;
        } else {
          totalChecked--;
        }

        const percentage = (totalChecked / checkboxes.length) * 100;
        const dashArray = (percentage * 251.2) / 100; // Circunferencia del círculo = 2 * π * radio (en este caso, 40)
        
        circle.style.strokeDasharray = `${dashArray}, 1000`;
        // Actualizar el texto del porcentaje dentro del SVG
        const textElement = circle.querySelector('text');
        textElement.textContent = `${percentage.toFixed(0)}%`;
      });
    });
  </script>
</body>
</html>
