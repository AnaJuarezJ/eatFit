document.addEventListener("DOMContentLoaded", function() {
    const tablaUsuarios = document.querySelector("table tbody");
    const inputEmailSeleccionado = document.getElementById("email_seleccionado");

    tablaUsuarios.addEventListener("click", function(event) {
      const fila = event.target.closest("tr");
      if (fila) {
        const email = fila.querySelector("td:nth-child(1)").textContent; // Obtener el email de la fila seleccionada
        inputEmailSeleccionado.value = email; // Asignar el email al campo de entrada del formulario de video
      }
    });
  });
    // Función para mostrar la vista previa del video
    document.querySelector("#video_url").addEventListener("input", function() {
      const videoUrl = this.value;
      const videoPreview = document.querySelector("#video-preview");
      
      if (videoUrl.includes("youtube.com") || videoUrl.includes("vimeo.com")) {
        if (videoUrl.includes("youtube.com")) {
          const videoId = videoUrl.split("?v=")[1];
          videoPreview.innerHTML = `<iframe width="560" height="315" src="https://www.youtube.com/embed/${videoId}" frameborder="0" allowfullscreen></iframe>`;
        } else if (videoUrl.includes("vimeo.com")) {
          const videoId = videoUrl.split("/").pop();
          videoPreview.innerHTML = `<iframe src="https://player.vimeo.com/video/${videoId}" width="560" height="315" frameborder="0" allow="autoplay; fullscreen" allowfullscreen></iframe>`;
        }
      } else {
        videoPreview.innerHTML = "<p>URL del video no válida</p>";
      }
    });

    document.addEventListener("DOMContentLoaded", function() {
      const formFiltro = document.getElementById("formFiltro");
      const tablaUsuarios = document.getElementById("tablaUsuarios");

      formFiltro.addEventListener("submit", function(event) {
        event.preventDefault(); // Evita que el formulario se envíe automáticamente

        const formData = new FormData(this);
        fetch("../logica/mostrar_usuarios.php", {
          method: "POST",
          body: formData
        })
        .then(response => response.text())
        .then(data => {
          tablaUsuarios.innerHTML = data; // Actualiza la tabla con los datos filtrados
        })
        .catch(error => {
          console.error('Error:', error);
        });
      });
    });
    