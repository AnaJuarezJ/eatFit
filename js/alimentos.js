document.addEventListener("DOMContentLoaded", function() {
    const formFiltro = document.getElementById("formFiltro");
    const tablaAlimentos = document.getElementById("tablaAlimentos");

    formFiltro.addEventListener("submit", function(event) {
      event.preventDefault(); // Evita que el formulario se envíe automáticamente

      const formData = new FormData(this);
      fetch("../logica/mostrar_alimentos.php", {
        method: "POST",
        body: formData
      })
      .then(response => response.text())
      .then(data => {
        tablaAlimentos.innerHTML = data; // Actualiza la tabla con los datos filtrados
      })
      .catch(error => {
        console.error('Error:', error);
      });
    });
  });

  //SEleccion
  document.addEventListener("DOMContentLoaded", function() {
    const tablaAlimentos = document.querySelector("table tbody");
    const inputIdSeleccionado = document.getElementById("id_seleccionado");
    const inputNomAlimento = document.getElementById("alimento");


    tablaAlimentos.addEventListener("click", function(event) {
      const fila = event.target.closest("tr");
      if (fila) {
        const id = fila.querySelector("td:nth-child(1)").textContent; // Obtener el id de la fila seleccionada
        const nom = fila.querySelector("td:nth-child(2)").textContent; // Obtener el nombre de la fila seleccionad
        
        inputIdSeleccionado.value = id; 
        inputNomAlimento.value = nom;
      }
    });
  });