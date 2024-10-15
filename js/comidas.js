document.addEventListener("DOMContentLoaded", function() {
  const tablaUsuarios = document.getElementById("tablaUsuarios");
  const inputEmailSeleccionado = document.getElementById("email_usuario");

  if (tablaUsuarios) {
    tablaUsuarios.addEventListener("click", function(event) {
      const fila = event.target.closest("tr");
      if (fila) {
        const email = fila.querySelector("td:nth-child(1)").textContent; // Obtener el email de la fila seleccionada
        inputEmailSeleccionado.value = email; // Asignar el email al campo de entrada
        $_SESSION['email_usuario'] = email;
      }
    });
  }
});

document.addEventListener("DOMContentLoaded", function() {
  const tablaAlimentos = document.getElementById("tablaAlimentos");
  const inputIdSeleccionado = document.getElementById("id_alimento");
  const inputNomAlimento = document.getElementById("nombre_alimento");

  if (tablaAlimentos) {
    tablaAlimentos.addEventListener("click", function(event) {
      const fila = event.target.closest("tr");
      if (fila) {
        const id = fila.querySelector("td:nth-child(1)").textContent; // Obtener el id de la fila seleccionada
        const nom = fila.querySelector("td:nth-child(2)").textContent; // Obtener el nombre de la fila seleccionada
        
        inputIdSeleccionado.value = id;
        inputNomAlimento.value = nom;
      }
    });
  }
});

document.addEventListener("DOMContentLoaded", function() {
  const tablaComidas = document.getElementById("tablaComidas");
  const inputIdSeleccionado = document.getElementById("id_comida");
  const inputPorcion = document.getElementById("porcion");

  if (tablaComidas) {
    tablaComidas.addEventListener("click", function(event) {
      const fila = event.target.closest("tr");
      if (fila) {
        const id = fila.querySelector("td:nth-child(1)").textContent; // Obtener el id de la fila seleccionada
        const porcion = fila.querySelector("td:nth-child(4)").textContent; // Obtener el nombre de la fila seleccionada
        
        inputIdSeleccionado.value = id;
        inputPorcion.value = porcion;
      }
    });
  }
});

document.querySelector('.edit-profile-btn').addEventListener('click', function(event) {
  event.preventDefault(); // Prevenir el comportamiento por defecto del enlace

  // Obtener el valor del campo email_usuario
  var emailUsuarioValue = document.getElementById('email_usuario').value;

  // Asignar el valor a la sesión utilizando fetch o una solicitud AJAX
  fetch('../logica/guardar_email_usuario.php', {
    method: 'POST',
    headers: {
      'Content-Type': 'application/json',
    },
    body: JSON.stringify({ email_usuario: emailUsuarioValue }),
  }).then(function(response) {
    // Redireccionar a editar_comida.php después de guardar el valor en la sesión
    window.location.href = './editar_comida.php';
  }).catch(function(error) {
    console.error('Error al guardar el email de usuario:', error);
  });
});