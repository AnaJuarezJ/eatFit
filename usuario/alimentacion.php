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
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alimentación</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"> <!-- Font Awesome -->
    <link rel="stylesheet" href="../css/nav.css">
    <link rel="stylesheet" href="../css/alimentos.css">

</head>
<body>
    
  <!-- Navbar -->  <!-- Navbar -->
  <div class="menu">
    <a href="./perfil.php" class="logo"><i class="fas fa-user-circle"></i></a>
    <input type="checkbox" id="toggle" class="toggle-btn">
    <label for="toggle" class="toggle-icon">&#9776;</label>
    <ul>
      <li><a href="./perfil.php"><i class="fas fa-house-user"></i> Home</a></li>
      <li><a href="./alimentacion.php"><i class="fas fa-utensils"></i> Alimentación</a></li>
      <li><a href="./entrenamientos.php"><i class="fas fa-running"></i> Entrenamientos</a></li>
      <li><a href="./soporte.php"><i class="fas fa-headset"></i> </a></li>
      <li><a href="./editar_perfil.php"><i class="fas fa-cog"></i></a></a></li>
      <li><a href="../logica/logout.php"><i class="fas fa-sign-out-alt"></i> </a></li>
    </ul>
  </div>

  <div class="meal-section">
        <br><br><br>
      <h2>Mis Comidas</h2>
      <div class="meal-container">
          <div class="meal meal-breakfast">
              <i class="fas fa-coffee"></i>
              <span>Desayuno</span>
          </div>
          <div class="meal meal-snack">
              <i class="fas fa-apple-alt"></i>
              <span>Almuerzo</span>
          </div>
          <div class="meal meal-dinner">
              <i class="fas fa-drumstick-bite"></i>
              <span>Comida</span>
          </div>
          <div class="meal meal-snack">
              <i class="fas fa-carrot"></i>
              <span>Merienda</span>
          </div>
          <div class="meal meal-lunch">
              <i class="fas fa-utensils"></i>
              <span>Cena</span>
          </div>
      </div>
  </div>

  <div class="recipe-modal" id="recipeModal">
    <!-- Contenido del modal -->
    <button class="close-btn" onclick="closeRecipeModal()"><i class="fas fa-times-circle"></i> Cerrar</button>
  </div>


  <script>   
    function closeRecipeModal() {
        const recipeModal = document.getElementById('recipeModal');
        recipeModal.classList.remove('active');
    }
  document.addEventListener('DOMContentLoaded', function() {
    const mealDivs = document.querySelectorAll('.meal');

    mealDivs.forEach(function(mealDiv) {
      mealDiv.addEventListener('click', function() {
        const mealValue = this.querySelector('span').textContent;
        
        fetch('../logica/obtener_alimentos.php', {
          method: 'POST',
          headers: {
            'Content-Type': 'application/x-www-form-urlencoded'
          },
          body: 'meal=' + mealValue
        })
        .then(response => response.text())
        .then(data => {
          // Mostrar los resultados en el modal
          const recipeModal = document.getElementById('recipeModal');
          recipeModal.innerHTML = data; // Insertar los resultados en el modal
          recipeModal.classList.add('active'); // Mostrar el modal
        })
        .catch(error => {
          console.error('Error:', error);
        });
      });
    });
  });
</script>


</body>
</html>
