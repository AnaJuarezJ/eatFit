<?php
session_start();

?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Soporte</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"> <!-- Font Awesome -->
    <link rel="stylesheet" href="../css/nav.css">
    <link rel="stylesheet" href="../css/soporte.css">  
    <link rel="stylesheet" href="../css/entrenamientos.css">  

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
      <li><a href="./soporte.php"><i class="fas fa-headset"></i></a></li>
      <li><a href="./editar_perfil.php"><i class="fas fa-cog"></i></a></a></li>
      <li><a href="../logica/logout.php"><i class="fas fa-sign-out-alt"></i> </a></li>
    </ul> 
  </div>

  <div class="container">
    <br>
        <h1>Entrenamientos</h1>
        <form action="../logica/obtener_video.php" method="POST" id="videoForm">
            <ul class="dias-list">
                <li><button type="submit" name="accion" value="Lunes">Lunes</button></li>
                <li><button type="submit" name="accion" value="Martes">Martes</button></li>
                <li><button type="submit" name="accion" value="Miercoles">Miercoles</button></li>
                <li><button type="submit" name="accion" value="Jueves">Jueves</button></li>
                <li><button type="submit" name="accion" value="Viernes">Viernes</button></li>
                <li><button type="submit" name="accion" value="Sabado">Sabado</button></li>
                <li><button type="submit" name="accion" value="Domingo">Domingo</button></li>
            </ul>
        </form>
    </div>
<div id= "video-preview"></div>

<script>
    const videoUrl = "<?php echo isset($_SESSION['video_url']) ? $_SESSION['video_url'] : '' ?>";
    const videoPreview = document.querySelector("#video-preview");

    if (videoUrl !== "") {
        if (videoUrl.includes("youtube.com")) {
            const videoId = videoUrl.split("?v=")[1];
            videoPreview.innerHTML = `<iframe width="1000" height="563" src="https://www.youtube.com/embed/${videoId}" frameborder="0" allowfullscreen></iframe>`;
        } else if (videoUrl.includes("vimeo.com")) {
            const videoId = videoUrl.split("/").pop();
            videoPreview.innerHTML = `<iframe src="https://player.vimeo.com/video/${videoId}" width="560" height="315" frameborder="0" allow="autoplay; fullscreen" allowfullscreen></iframe>`;
        } else {
            // Si la URL no es de YouTube ni Vimeo, mostrar un video por defecto
            const defaultVideoId = "Q_XYkLgTUxY";
            videoPreview.innerHTML = `<iframe width="1000" height="563" src="https://www.youtube.com/embed/${defaultVideoId}" frameborder="0" allowfullscreen></iframe>`;
        }
    } else {    
        //  Si la variable de sesión videoUrl está vacía, mostrar un video por defecto
        const defaultVideoId = "Q_XYkLgTUxY";
        videoPreview.innerHTML = `<iframe width="1000" height="563" src="https://www.youtube.com/embed/${defaultVideoId}" frameborder="0" allowfullscreen></iframe>`;   
        }
</script>


</body>
</html>