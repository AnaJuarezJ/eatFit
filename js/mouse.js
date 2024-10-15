document.addEventListener('DOMContentLoaded', function () {
    const menu = document.querySelector('.menu'); // Cambiar menuContainer por menu
    const toggleBtn = document.querySelector('.toggle-btn');
  
    // Cerrar el menú cuando se hace clic fuera del área del menú
    document.addEventListener('click', function (event) {
      if (!menu.contains(event.target) && !toggleBtn.checked) {
        // Si se hace clic fuera del menú y el menú está desplegado, ciérralo
        toggleBtn.checked = false;
      }
    });
});
