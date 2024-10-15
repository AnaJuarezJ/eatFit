<?php
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
?>