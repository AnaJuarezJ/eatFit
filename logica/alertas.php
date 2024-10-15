<?php
  if (isset($_SESSION['alert'])) {
    $alertType = $_SESSION['alert'];

    switch ($alertType) {
        case 'success':
            $alert = "Operación Exitosa.";
            break;
        case 'datos':
          $alert = "No se recibieron todos los datos necesarios, complete el formulario.";
          break;
        case 'success_message':
            $alert = "Mensaje enviado. Le atenderemos lo más pronto posible";
            break;
        case 'error_message':
            $alert = "Error al enviar el mensaje. Por favor intentelo de nuevo";
            break;
        case 'success_edit':
            $alert = "Editado correctamente";
            break;
        case 'nom':
            $alert = "Seleccione un alimento";
            break;
        case 'no_existe':
            $alert = "Seleccione un elemento";
            break;
        case 'success_elim':
            $alert = "Alimento eliminado";
            break;
        case 'inactivo':
            $alert = "Estado: Inactivo. No puede hacer modificaciones.";
            break;
        case 'contrasenas_no_coinciden':
            $alert = "Las contraseñas no coinciden. Inténtalo de nuevo.";
            break;
        case 'email_existente':
            $alert = "Ya existe una cuenta con este correo electronico.";
            break;
        case 'phone_error':
            $alert = "El número de teléfono debe tener 10 dígitos. Inserte un numero valido";
            break;
        case 'email_error':
            $alert = "El correo electrónico no es válido.";
            break;
        case 'incorrect_password':
            $alert = "Contraseña incorrecta. Inténtalo de nuevo.";
            break;
        case 'user_not_found':
            $alert = "Usuario no encontrado.";
            break;
        case 'prepare_error':
            $alert = "Error en la preparación de la consulta.";
            break;
    }
    unset($_SESSION['alert']); // Limpiar el mensaje de alerta después de mostrarlo
}
?>