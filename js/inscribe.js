const option1 = document.getElementById('option1');

    // Añadir un evento de cambio al input
    option1.addEventListener('change', function() {
        if (this.checked) {
            window.location.href = './login.php?value=1'; // Redirigir a la página de login con el valor 1 como parámetro
        }
    });


    const option2 = document.getElementById('option2');

    // Añadir un evento de cambio al input
    option2.addEventListener('change', function() {
        if (this.checked) {
            window.location.href = './login.php?value=2'; // Redirigir a la página de login con el valor 1 como parámetro
        }
    });

    const option3 = document.getElementById('option3');

    // Añadir un evento de cambio al input
    option3.addEventListener('change', function() {
        if (this.checked) {
            window.location.href = './login.php?value=3'; // Redirigir a la página de login con el valor 1 como parámetro
        }
    });