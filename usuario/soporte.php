<?php
session_start();
if(isset($_SESSION['email'])&& isset($_SESSION['nombre']) && isset($_SESSION['activo']))
{
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
if (isset($_SESSION['alert'])) {
    $alertType = $_SESSION['alert'];

    switch ($alertType) {
        case 'success_message':
            $alert = "Mensaje enviado. Le atenderemos lo más pronto posible";
            break;
        case 'error_message':
            $alert = "Error al enviar el mensaje. Por favor intentelo de nuevo";
            break;
        case 'prueba':
            $alert = "anene";
            break;
    }
    unset($_SESSION['alert']); // Limpiar el mensaje de alerta después de mostrarlo
}
?>
<!DOCTYPE html>
<html lang="en">
<head> 
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Soporte</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"> <!-- Font Awesome -->
    <link rel="stylesheet" href="../css/nav.css">
    <link rel="stylesheet" href="../css/soporte.css">    
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

  <!-- Contenido de la página de soporte -->
  <div class="content">
    <h1><i class="fas fa-headset"></i> Soporte</h1>
      <section class="contact-form">
        <h2>Formulario de Contacto</h2>
        <form action="../logica/soporte.php" method="POST" >
          <div class="form-group">
            <label for="nombre">Nombre:</label>
            <input type="text" id="nombre" name="nombre" readonly  required value="<?php echo isset($_SESSION['nombre']) ? $_SESSION['nombre'] : 'Ingrese su nombre'; ?>">
          </div>
          <div class="form-group">
            <label for="email">Correo electrónico:</label>
            <input type="email" id="email" name="email" readonly  required value="<?php echo isset($_SESSION['email']) ? $_SESSION['email'] : 'Ingrese su email'; ?>">
          </div>
          <div class="form-group">
            <label for="mensaje">Mensaje:</label>
            <textarea id="mensaje" name="mensaje" required></textarea>
          </div>
          <button type="submit">Enviar</button>
        </form>
      </section>

    <section class="faqs expandable">
      <h2>Preguntas Frecuentes</h2>
      <div class="faq-item">
        <h3>¿Cómo puedo cambiar mi contraseña?</h3>
        <p>Para cambiar tu contraseña, ve a la sección de "Configuración" en tu perfil y selecciona la opción "Cambiar Contraseña".</p>
      </div>

      <div class="faq-item">
        <h3>¿Qué hago si olvidé mi nombre de usuario?</h3>
        <p>Puedes recuperar tu nombre de usuario ingresando tu dirección de correo electrónico en la página de recuperación de cuenta.</p>
      </div>
    </section>

    <section class="additional-info expandable">
        <h2>Información Adicional de Soporte</h2>
        <p>Si tienes alguna pregunta, no dudes en contactarnos:</p>
        <ul>
          <li>Teléfono: 123-456-789</li>
          <li>Correo electrónico: support@example.com</li>
        </ul>
      </section>
  </div>
<script src="../js/soporte.js"></script>

</body>
</html>
