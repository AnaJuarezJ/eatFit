<?php
session_start();
$alert = "";
include './logica/alertas.php';

?>
<!DOCTYPE html>
<html lang="en">
 
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>eatFit</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Bebas+Neue">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"> <!--Flecha abajo-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Condensed:wght@100&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <link rel="stylesheet" href="./css/nav.css">
    <link rel="stylesheet" href="./css/styles.css">
    <link rel="stylesheet" href="./css/about.css">
</head>

<body>

  <?php if (!empty($alert)): ?>
      <script>alert('<?php echo $alert; ?>');</script>
  <?php endif; ?>

  <!-- Navbar -->
  <div class="menu">
    <a href="./home.php" class="logo">EATFIT</a>
    <input type="checkbox" id="toggle" class="toggle-btn">
    <label for="toggle" class="toggle-icon">&#9776;</label>
    <ul>
      <li><a href="./home.php"><i class="fas fa-house-user"></i> Inicio</a></li>
      <li><a href="./login.php"><i class="fas fa-user"></i> Iniciar sesión</a></li>
      <li><a href="./crearCuenta.php"><i class="fas fa-user-plus"></i> Crear cuenta</a></li>
      <li><a href="./home.php#about"><i class="fas fa-info-circle"></i> Acerca de nosotros</a></li>
      <li><a href="./home.php#testimonio"><i class="fas fa-comments"></i> Testimonios</a></li>
      <li><a href="./home.php#planes"><i class="fas fa-shopping-cart"></i> Planes</a></li>
      <li><a href="./home.php#contactUs"><i class="fas fa-envelope"></i> Contáctanos</a></li>
    </ul>
  </div>

    <!-- Header-->
    <header class = "header">
        <div class="layer">
            <p>Descubre el camino hacia una vida <br> más saludable y activa con</p>
            <h1 style="background-image: url(assets/sano.jpg)" class="slide-up" >EATFIT</h1>
            <p>¿Estás listo para transformar <br> tu cuerpo y tu vida?</p>
            <a href="./home.php#about"><i class="fas fa-chevron-down big-icon"></i></a>
        </div>
    </header>
    
    <section class="expertos" id="about">
        <script src="https://codepen.io/shshaw/pen/QmZYMG.js"></script>
        <input type="radio" name="scene" id="scene-1" value="1" checked />
        <input type="radio" name="scene" id="scene-2" value="2" />
        <input type="radio" name="scene" id="scene-3" value="3" />
        <input type="radio" name="scene" id="scene-4" value="4" />
          <main id="site">
            <header class="top-nav">
              @eatFit
            </header>
            <div style="background-image: url(assets/gym.jpeg)" class="ab">
              <div style="background-image: url(assets/comida.jpeg)" class="ab-text">eatFit</div>
            </div>
            <div class="left-side">    
              <div class="page-numbers" data-total="04">
                <div class="page-number -tens">0</div>
                <div class="page-number -ones">
                  1<br/>2<br/>3<br/>4
                </div>
              </div>
            </div>
            <div class="hero">
              <div class="layer" data-scene="1">      
                <h1 class="heading">
                  Bienvenido<br />
                  ¿QUIENES<br />
                  SOMOS?
                </h1>
                <button class="button" href="./contactUs.php">
                  <a href="./contactUs.php">Contactanos</a>
                </button>
              </div>
              <div class="layer" data-scene="2">      
                <h1 class="heading">
                  ¿Que  <br />
                  nos hace<br />
                  direferentes?
                </h1>
                <button class="button" href="./contactUs.php">
                  <a href="./contactUs.php">Contactanos</a>
                </button>
              </div>
              <div class="layer" data-scene="3">      
                <h1 class="heading">
                  ENTRENAMIENTOS<br />
                  FUNCIONALES <br />
                  O EN GYM
                </h1>
                <button class="button" href="./contactUs.php">
                  <a href="./contactUs.php">Contactanos</a>
                </button>
              </div>
              <div class="layer" data-scene="4">      
                <h1 class="heading">
                  ¡UNETE<br />
                  A NUESTRA<br />
                  FAMILIA!
                </h1>
                <button class="button"href="./contactUs.php">
                  <a href="./contactUs.php">Contactanos</a>
                </button>
              </div>
            </div>
    
            <div class="left-content">
              <div class="layer" data-scene="1">      
                <div class="fact subtitle">EATFIT</div>
                <div class="fact number">+ 900 000 usuarios</div>
                <div class="fact description">Tu destino para un estilo de vida saludable, diseñado específicamente para aquellos que buscan la combinación perfecta entre nutrición, deporte y conveniencia.
                    Nos apasiona brindarte más: ofrecemos un ecosistema completo para ayudarte a alcanzar tus objetivos de fitness, mejorar tu rendimiento deportivo y adoptar hábitos alimenticios que nutran tu bienestar.                </p>

                </div>
              </div>
              <div class="layer" data-scene="2">      
                <div class="fact subtitle">Calidad y plan personalizado</div>
                <div class="fact number">+ 500 recetas</div>
                <div class="fact description">Una vez que apruebes tu plan nutricional personalizado, nuestro equipo de chefs altamente capacitados preparará tus comidas con precisión y las entregará en la hora y ubicación que tú elijas.</div>
              </div>
              <div class="layer" data-scene="3">      
                <div class="fact subtitle">Entrenamientos efectivos </div>
                <div class="fact number">vamos de la mano</div>
                <div class="fact description">Entrenamientos adaptables a los horarios y necesidades que tengas, aptos rtanto para gym, casa o el exterior, y diseñados para proteger tu masa muscular y minimizar el riesgo de lesiones</div>
              </div>
              <div class="layer" data-scene="4">      
                <div class="fact subtitle">CON </div>
                <div class="fact number">EATFIT</div>
                <div class="fact description">Obtienes una membresía que va más allá de una simple suscripción. Incluye el respaldo de nutricionistas experimentados, planes de alimentación personalizados y un servicio de entrega puntual para garantizar tu comodidad.</div>
              </div>
            </div>
            <div class="right-content">
    
              <nav class="slide-nav">
                <div class="nav-button -prev">
                  &lt;
                
                  <label class="nav-toggle" for="scene-1">1</label>
                  <label class="nav-toggle" for="scene-2">2</label>
                  <label class="nav-toggle" for="scene-3">3</label>
                  <label class="nav-toggle" for="scene-4">4</label>
                
                </div>
                <div class="nav-button -next">
                  Next &gt;
                
                  <label class="nav-toggle" for="scene-1">1</label>
                  <label class="nav-toggle" for="scene-2">2</label>
                  <label class="nav-toggle" for="scene-3">3</label>
                  <label class="nav-toggle" for="scene-4">4</label>
                </div>
                <a style="color:white" href="./home.php#expertos"><i class="fas fa-chevron-down big-iconW"></i></a>
              </nav>
    
              <div class="layer" data-scene="1">      
                <h2 class="heading">
                 No solo es un sitio web.
                </h2>
                <p class="paragraph">
                    Nuestra plataforma está diseñada para simplificar tu viaje hacia la salud y el bienestar. ¿Tienes poco tiempo para cocinar o enfrentas dificultades para seguir un plan nutricional? ¡Estamos aquí para ayudarte! Con solo introducir tus datos personales, nuestro equipo de expertos elaborará un plan nutricional adaptado a tus necesidades y objetivos. Desde artículos informativos hasta recetas deliciosas, pasando por planes de entrenamiento y asesoramiento nutricional personalizado, te acompañamos en cada paso de tu camino hacia una vida más saludable.              </div>
    
              <div class="layer" data-scene="2">      
                <h2 class="heading">
                  ¿Un imprevisto?
                </h2>
                <p class="paragraph">
                    No te preocupes, estamos preparados para asegurarnos de que cada comida se entregue sin complicaciones. En caso de algún contratiempo, donamos las comidas a quienes más lo necesitan, evitando el desperdicio alimentario.                </p>
              </div>
              
              <div class="layer" data-scene="3">      
                <h2 class="heading">
                  Soporte y comunicación
                </h2>
                <p class="paragraph">
                  EatFit cuenta con entrenadores expertos y una comunidad de apoyo, lo que brinda un ambiente positivo, colaborativo y de motivación para ti.
                Nos enfocamos no solo en la transformación fisica, sino tambien en tu salud mental y emocional, lo que permite una transformación sostenible y duradera a largo plazo.       </p>
              </div>
              
              <div class="layer" data-scene="4">      
                <h2 class="heading">
                  ¡Tu libertad es primordial!
                </h2>
                <p class="paragraph">
                  Puedes renovar o cancelar tu suscripción en cualquier momento, sin complicaciones ni preguntas. Nuestro objetivo es ser tu socio confiable en tu viaje hacia un estilo de vida más saludable y activo.
                  Únete a nosotros hoy mismo y descubre cómo podemos hacer que tus objetivos de salud y bienestar se conviertan en una realidad sin complicaciones.                </p>
              </div>
            </div>
          </main>
          
    </section>
    <div id="expertos" class="titulo expertos">
      <h1><br>NUESTROS EXPERTOS</h1>

    </div>
    <section  class="expertos">
      
      <div class="experto">
        <a href="https://www.instagram.com/therock/?utm_source=ig_web_button_share_sheet&igshid=OGQ5ZDc2ODk2ZA==" target="_blank">
          <img src="./assets/dwaynejohnson.jpg" alt="Foto Experto 1">
        </a>
        <h3>Dwayne Johnson</h3>
        <p>Reconocido por su imponente físico y su dedicación al fitness. Su rutina de entrenamiento es variada e intensa, combinando ejercicios de levantamiento de pesas, pesas rusas y ​​entrenamiento funcional.</p>
      </div>
  
      <div class="experto">
        <a href="https://www.instagram.com/thorbjornsson/?utm_source=ig_web_button_share_sheet&igshid=OGQ5ZDc2ODk2ZA==" target="_blank">
          <img src="./assets/HafþorBjörnsson.jpg" alt="Foto Experto 2">
        </a>
        <h3>Hafþór Björnsson</h3>
        <p>Atleta islandés, ex campeón de levantamiento de peso fuerte (strongman). Su entrenamiento se enfoca en ejercicios intensos de fuerza, levantamiento de peso, y movimientos funcionales. </p>
      </div>
      <div class="experto">
        <a href="https://www.instagram.com/stevecook/?utm_source=ig_web_button_share_sheet&igshid=OGQ5ZDc2ODk2ZA==" target="_blank">
          <img src="./assets/SteveCook.jpg" alt="Foto Experto 2">
        </a>
        <h3>Steve Cook</h3>
        <p>Fisicoculturista, modelo fitness y entrenador. Se centra en una combinación de ejercicios de levantamiento de pesas, desarrollo muscular equilibrado y trabajo de acondicionamiento físico.</p>
      </div>  
      <!-- Agrega más divs con la clase "experto" para más expertos -->
    </section>

    <div class="titulo expertos">
      <h1><br>EXPERTOS EN NUTRICIÓN</h1>

    </div>
    <section class="expertos">
      
      <div class="experto">
        <a href="https://www.topdoctors.mx/doctor/izchel-yocelin-esparza-garin/" target="_blank">
          <img src="./assets/Izchel.png" alt="Foto Experto 1">
        </a>
        <h3>Nut. Izchel Yocelin Esparza Garín</h3>
        <p>Especialista en Nutrición en la Ciudad de México y egresada de la Universidad Autónoma Metropolitana (UAM). Cuenta con amplia experiencia como directora de los consultorios nutricionales Nutrest y como nutrióloga clínica en consulta privada para particulares y empresas.</p>
      </div>
  
      <div class="experto">
        <a href="https://www.topdoctors.mx/doctor/jacobo-francisco-ceniceros-rios/" target="_blank">
          <img src="./assets/Jacobo.png" alt="Foto Experto 2">
        </a>
        <h3>Nut. Jacobo Francisco Ceniceros Ríos</h3>
        <p>AEl Nut. Jacobo Francisco Ceniceros Ríos es egresado en Nutrición de la Universidad De Navojoa (UNAV). Experto en: Nutrición Clínica, Enfermedades Crónico Degenerativas, Nutrición Bariátrica, Nutrición Digestiva, Fit3D. Cuenta con más de 16 años de experiencia</p>
      </div>
      <div class="experto">
        <a href="https://www.topdoctors.mx/doctor/vanessa-fuchs-tarlovsky/" target="_blank">
          <img src="./assets/Vanessa.png" alt="Foto Experto 2">
        </a>
        <h3>Nut. Vanessa Fuchs Tarlovsky</h3>
        <p>licenciada en Nutrición y Ciencia de los Alimentos por la Universidad Iberoamericana. Médico Cirujano y Partero por la Escuela Superior de Medicina del IPN. Realizó una especialidad en Nutrición Clínica en la Universidad Anahuac y una maestría en Investigación Clínica en la Universidad de Harvard. </p>
      </div>  
      <!-- Agrega más divs con la clase "experto" para más expertos -->
    </section>

    <section id="testimonio">
      <div class="testimonios titulo expertos">
        <h2 style="text-align: center;">TESTIMONIOS DE NUESTROS CLIENTES</h2>
        <div class="testimonio">
          <p>"Excelente servicio, los planes de alimentación son muy variados y se ajustan a mis necesidades. ¡Lo recomiendo ampliamente!"</p>
          <p><span>- María Sánchez</span></p>
        </div>
        <div class="testimonio">
          <p>"Gracias a EatFit logré mejorar mi rendimiento deportivo y he notado cambios positivos en mi salud. ¡Muy contento con los resultados!"</p>
          <p><span>- Juan Pérez</span></p>
        </div>
        <div class="testimonio">
          <p>"Increíble experiencia. Los planes nutricionales son flexibles y deliciosos. ¡Estoy encantado con los resultados!"</p>
          <p><span>- Jeter Medina</span></p>
        </div>
        <div class="testimonio">
          <p>"Una solución perfecta para mi estilo de vida ocupado. Los menús personalizados son fáciles de seguir y deliciosos"</p>
          <p><span>- Alejandro Suarez</span></p>
        </div>
        <a href="#planes" class="boton-verPlanes">Conocer los planes</a>
      </div>
    </section>

    <section id="planes">
      <div class="headerabout">
        <h2 class="headerabout__title">PLANES Y PRECIOS FLEXIBLES</h2>
        <p class="headerabout__text">PUEDES CANCELAR EN CUALQUIER MOMENTO</p>
      </div>

      <div class="subscription-container">
        <input type="radio" name="radio" id="option1" >
        <label for="option1" class="subscription__button">
            <h3 class="subscription__title subscription__title--personal"> 
              Basico
              <i class="subscription__icon fas fa-seedling"></i> 
            </h3>
            <span class="subscription__price">$999 <span class="subscription__price-month"> MX</span> </span>
            <ul class="subscription__list">
              <li class="subscription__item">
                <i class="icon-subscription fas fa-check-circle"></i>
                <span>
                  Some words: <span class="subscription__item-text">Lorem ipsum dolor sit amet</span>           
                </span>

              </li>
              <li class="subscription__item">
                <i class="icon-subscription fas fa-check-circle"></i>
                <span>
                More text: <span class="subscription__item-text">Explicabo nemo corporis nesciunt aspernatur</span>            
                </span>

              </li> 
              <li class="subscription__item">
                <i class="icon-subscription fas fa-check-circle"></i>
                Free Event passes
              </li>
            </ul>
        </label>

        <input type="radio" name="radio" id="option2">
        <label for="option2" class="subscription__button">
            <h3 class="subscription__title subscription__title--business">
              Completo
                <i class="subscription__icon fas fa-carrot"></i>   
            </h3>
            <span class="subscription__price">$1600 <span class="subscription__price-month">MX</span> </span>
            <ul class="subscription__list">
              <li class="subscription__item">
                <i class="icon-subscription fas fa-check-circle"></i>
                <span>
                Random text: <span class="subscription__item-text">Cultivated who resolution connection motionless</span>            
                </span>

              </li>
              <li class="subscription__item">
                <i class="icon-subscription fas fa-check-circle"></i>
                <span>
                  No ideas: <span class="subscription__item-text">Barton did feebly change afford square</span> 
                </span>
              </li>
              <li class="subscription__item">
                <i class="icon-subscription fas fa-check-circle"></i>
                Unlimited Storage
              </li>
            </ul>
        </label>
        
        <input type="radio" name="radio" id="option3">
        <label for="option3" class="subscription__button">
            <h3 class="subscription__title subscription__title--enterprise">
                Plus
                <i class="subscription__icon fas fa-pepper-hot"></i> 
            </h3>
          <span class="subscription__price">$2100 <span class="subscription__price-month">MX</span> </span>
          <ul class="subscription__list">
            <li class="subscription__item">
                <i class="icon-subscription fas fa-check-circle"></i>
              <spa>
                Frequently: <span class="subscription__item-text">Cultivated resolution connection motionless</span>          
              </spa>
            </li>
            <li class="subscription__item">
                <i class="icon-subscription fas fa-check-circle"></i>
              <span>
                No ideas: <span class="subscription__item-text">Barton did neebly ehange afford square</span>   
              </span>

            </li>
            <li class="subscription__item">
                <i class="icon-subscription fas fa-check-circle"></i>
                Lifetime access to all content
            </li>
            </ul>
        </label>
      </div>

      <script src="./js/inscribe.js"></script>
    </section>



    <section id="contactUs" class="contacto">
      <div class="contacto">
        <h2 style="text-align: center;">CONTACTANOS</h2>
        <form id="formularioContacto" action="./logica/contactos_formulario.php" method="post">
          <input type="text" id="nombre" name="nombre" placeholder="Nombre" required>
          <input type="email" id="email" name="email" placeholder="Correo Electrónico" required>
          <input type="number" id="telefono" name="telefono" placeholder="Teléfono">
          <textarea id="mensaje" name="mensaje" placeholder="Mensaje" rows="4" required></textarea>
          <input type="submit" value="Enviar" id="enviarBtn">
        </form>
      </div>    
    </section>


    <script src="./js/mouse.js"></script>

</body>

</html>