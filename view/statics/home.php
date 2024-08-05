<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=0.1,initial-scale=0.9">
    <meta name="author" content="Grizzly Alcivar Zambrano">
    <title>Grizzly Alcivar - Home</title>
    <style>
      body,html{
        margin: 0;
        padding: 0;
      }
      #body-container, section, figure {
        margin: 0;
        padding: 0;
        width: 100%;
      }
      .imagen-bloque {
        width: 100%;
        height: auto;
        display: block;
      }    
      #barraBusqueda {
        display: none;
        justify-content: center;
        align-items: center;
        background-color: #f2f2f2;
        border-radius: 20px;
        padding: 10px 20px;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);

        margin-top: 30px;
        margin-left: 100px;
        margin-right: 100px;
        margin-bottom: 30px;
      }
      #barraBusqueda button {
        padding: 8px 16px;
        border: none;
        background-color: #4CAF50;
        color: white;
        border-radius: 20px;
        cursor: pointer;
        margin-left: 10px;
      }
      #barraBusqueda input[type="text"] {
        width: 80%;
        padding: 8px;
        border: none;
        border-radius: 20px;
        outline: none;
      }
      #icono{
        cursor: pointer;
      }        
    </style>
    <!-- libreria de iconos -->
    <script src="https://kit.fontawesome.com/c5eafcdf48.js" crossorigin="anonymous"></script>
    <!-- hoja de estilos externa -->
    <link rel="stylesheet" href="<?php echo CSS_PATH; ?>">
        
</head>
<body>
  <!-- empieza el encabezado-->
  <?php require_once dirname(__FILE__) . '/../templates/header.php';?>
  
    <!-- contenido de la pagina -->
    <main>
      <div id="body-contanier">
        <div id="barraBusqueda">
          <input type="text" placeholder="Buscar...">
          <button onclick="cerrarBusqueda()">Cerrar</button>
          <button>Buscar</button>
        </div>
        <figure class="image-container">
          <img src="<?php echo IMAGE_PATH; ?>Festival.jpg" alt="imagen de festival" class="imagen-bloque">
        </figure>
        <p class="image-text" 
        style="font-weight: bold; font-family: Georgia, 'Times New Roman', Times, serif;">
        MAYO 11-13 & 18-20, 2025</p>
        <p class="image-description">
            El Festival Armonía Creativa nació de la pasión por la música y las artes visuales, 
            con el propósito de crear un espacio donde las diferentes expresiones artísticas puedan 
            convivir en perfecta armonía. 
        </p>          
      </div>
      <section class="conoce-section">
        <div class="contenido-nuestra-mision">
          <div class="row-contenido">
            <div class="colTitu1">
              <h1>NUESTRA MISION CON USTEDES</h1>
            </div>
          </div>
          <div class="row-conoce-contenido">
            <div class="colCont">
              <p style="font-size: 1.5rem">
                Nuestra misión es celebrar la diversidad y el talento, proporcionando una plataforma para 
                artistas emergentes y consolidados. Queremos inspirar y ser inspirados, fomentando un ambiente 
                de creatividad, innovación y colaboración. Cada año, nos esforzamos por ofrecer una experiencia 
                única que fusiona música, arte visual, instalaciones interactivas y talleres creativos. Fundado 
                en 2015 por un grupo de amigos amantes del arte, nuestro festival se ha convertido en un punto 
                de encuentro anual para artistas y espectadores de todo el mundo.
              </p>
            </div>
          </div>
        </div>
      </section>
      <div class="bloque-conoce">
        <section class="conoce-mas-section">
          <div class="row-conoce-mas-titulo">
            <div class="colTitu2">
              <h1>CONOCE MAS SOBRE EL FESTIVAL FEST</h1>
            </div>
          </div>
          <div class="row-conoce-mas-contenido">
            <div class="col-camping">
              <div class="row-imagen">
                <img src="<?php echo IMAGE_PATH; ?>camping.jpg" alt="camping" class="imagen-camping">
              </div>
              <div class="row-descripcion">
                <p>
                  Para vivir la experiencia completa del 
                  Festival Armonía Creativa, te invitamos 
                  a quedarte en nuestra zona de camping, 
                  diseñada para brindarte comodidad y una 
                  conexión más cercana con la naturaleza 
                  y otros asistentes
                </p>
              </div>
              <div class="contenedor-boton">
                <button class="boton">
                  CAMPING
                </button>
              </div>
            </div>
  
            <div class="col-servicios">
              <div class="row-imagen">
                <img src="<?php echo IMAGE_PATH; ?>services.jpg" alt="servicios" class="imagen-servicio">
              </div>
              <div class="row-descripcion">
                <p>
                  En el Festival Armonía Creativa, nos esforzamos por proporcionar 
                  una experiencia cómoda y agradable para todos nuestros asistentes. 
                  Ofrecemos una amplia gama de servicios pensados para satisfacer 
                  su estancia en el festival
                </p>          
              </div>
              <div class="contenedor-boton">
                <button class="boton">
                  SERVICIOS
                </button>
              </div>
            </div>
            
            <div class="col-programacion">
              <div class="row-imagen">
                <img src="<?php echo IMAGE_PATH; ?>programacion.png" alt="programacion" class="imagen-programacion">
              </div>
              <div class="row-descripcion">
                <p>
                  La programación del Festival Fest 
                  está diseñada para ofrecer una experiencia 
                  artística y musical única e inolvidable para 
                  nuestros asistentes, llena de sorpresas 
                  comprartiendo con amigos o familiares.
                </p>
              </div>
              <div class="contenedor-boton">
                <button class="boton">
                  PROGRAMACION
                </button>
              </div>
            </div>
          </div>
        </section>
      </div>      
      <section class="bloque-testimonios">
        <h1>TESTIMONIOS</h1>     
        <div class="contenedor-principal">
          <div class="contenedor-testimonio">
            <p class="testimonio">
              "El Festival Armonía Creativa es una experiencia incomparable. La mezcla de música y arte es simplemente mágica. Me encanta cómo cada rincón del festival tiene algo especial para ofrecer."
            </p>
            <p class="autor">— María G., Asistente por 3 años</p>
          </div>
          <div class="contenedor-testimonio">
            <p class="testimonio">
              "Este festival es el lugar perfecto para descubrir nuevos talentos y disfrutar de actuaciones increíbles. La energía y la vibra del lugar son inigualables. ¡No puedo esperar para volver el próximo año!"
            </p>
            <p class="autor">— Juan L., Melómano y Artista Aficionado</p>
          </div>
          <div class="contenedor-testimonio">
            <p class="testimonio">
              "La organización y los servicios del Festival Armonía Creativa superaron todas mis expectativas. Desde las zonas de comida hasta las áreas de descanso, todo está pensado para una experiencia cómoda y divertida."
            </p>
            <p class="autor">— Laura M., Asistente por primera vez</p>
          </div>
        </div>
      </section>    
      <aside class="publicidad-film">
        <div class="row-acompañanos-film">
          <div class="texto-container-film">
            <h3>
              SE PARTE DE NUESTRO FILM
            </h3>
            <p>
              <span>
                ¡Únete a nosotros para dar vida a la magia del cine musical!
              </span>
              ¿Alguna vez has sentido la emoción palpable de la música mezclada 
              con las imágenes cautivadoras del cine? ¡Es hora de que tus talentos 
              y tu pasión encuentren su hogar en nuestro Festival de Cine Musical!
            </p>
          </div>
          <div class="video-container-film">
            <iframe width="800" height="450" src="https://www.youtube.com/embed/_9womMYx3yw" allowfullscreen></iframe>
          </div>  
        </div>
      </aside>     
      <div class="bloque-pago">
        <section class="seccion-pago">
          <div class="row-pago-titulo">
            <div class="col-pago-titulo">
              <h1>
                PLAN DE PAGO
              </h1> 
            </div>                      
          </div>
          <div class="row-compraTicket">
            <a class="comprarTicket" href="index.php?action=login">COMPRA TU TICKET YA ! <i class="fa-solid fa-arrow-right"></i></a>
          </div>
          <div class="row-pago-contenido">
            <div class="col-general">
              <div class="row-general-titulo">
                <h2>
                  ADMISION GENERAL
                </h2>
              </div>
              <div class="row-general-content">
                Sumérgete en la experiencia del Festival Armonía Creativa con nuestro plan de Admisión General. 
                Con este plan, tendrás acceso completo a todas las áreas del festival, incluyendo los escenarios 
                musicales, exposiciones de arte, talleres creativos y mucho más. Disfruta de la libertad de explorar 
                todo lo que el festival tiene para ofrecer y sumergirte en la diversidad y el talento de nuestros 
                artistas.
              </div>
              <div class="row-general-image">
                <figure>
                  <img src="<?php echo IMAGE_PATH; ?>general.jpg" alt="VIP PASS">
                  <figcaption>compra entradas generales</figcaption>
                </figure>
              </div>
            </div>
            <div class="col-vip">
              <div class="row-vip-titulo">
                <h2>
                  VIP PASS
                </h2>
              </div>
              <div class="row-vip-content">
                Experimenta el Festival Armonía Creativa en todo su esplendor con nuestro exclusivo VIP Pass. 
                Con este pase premium, recibirás un trato especial que te hará sentir como una verdadera 
                estrella del festival. Desde áreas VIP con vistas privilegiadas hasta servicios de lujo y 
                experiencias exclusivas, el VIP Pass está diseñado para aquellos que buscan una experiencia 
                única y memorable.
              </div>
              <div class="row-vip-image">
                <figure>
                  <img src="<?php echo IMAGE_PATH; ?>vip.jpg" alt="VIP PASS">
                  <figcaption>compra entradas vip</figcaption>
                </figure>
              </div>
            </div>
          </div>          
        </section>
      </div> 
      <div id="bloquePreguntas">
      <article class="faq-section colSection">
        <h2>Preguntas Frecuentes</h2>
        
        <details>
          <summary>¿Qué es el Festival Armonía Creativa?</summary>
          <p>El Festival Armonía Creativa es un evento anual que celebra la música y las artes visuales, ofreciendo un espacio donde las diversas expresiones artísticas pueden convivir en armonía.</p>
        </details>
        
        <details>
          <summary>¿Cuándo se llevará a cabo el festival?</summary>
          <p>El festival se celebrará los días 11-13 y 18-20 de mayo de 2025.</p>
        </details>
        
        <details>
          <summary>¿Dónde se puede comprar las entradas?</summary>
          <p>Las entradas están disponibles en nuestro sitio web oficial. También puedes adquirirlas en puntos de venta autorizados.</p>
        </details>        
        
        <details>
          <summary>¿Qué servicios están disponibles en el festival?</summary>
          <p>Ofrecemos una amplia gama de servicios para hacer tu estancia cómoda, incluyendo zonas de camping, áreas de comida, instalaciones de baños y servicios médicos.</p>
        </details>
        
        <details>
          <summary>¿Puedo llevar mi propia comida y bebida?</summary>
          <p>No se permite llevar comida y bebida al recinto del festival. Contamos con una variedad de puestos de comida y bebida dentro del festival para que disfrutes.</p>
        </details>        
      </article> 
      <img class="colSection imagenPreguntas" src="<?php echo IMAGE_PATH; ?>Preguntas.png" alt="Imagen de clientes">
    </div>               
    </main>
    <!-- Empieza el pie de pagina -->
    <?php require_once dirname(__FILE__) . '/../templates/footer.php';?>
    <!-- Javascript -->
    <script type="text/javascript">
      function abrirBusqueda() {
          var barra = document.getElementById('barraBusqueda');
          barra.style.display = 'block';
      }

      function cerrarBusqueda() {
          var barra = document.getElementById('barraBusqueda');
          barra.style.display = 'none';
      }
      //preguntas frecuentes 
      const detailsElements = document.querySelectorAll('details');
        // Iteración sobre cada elemento <details>
        detailsElements.forEach((detailsElement) => {
          // Agregar un evento de clic a cada elemento <summary>
          detailsElement.querySelector('summary').addEventListener('click', () => {
            detailsElement.classList.toggle('hidden');
          });
      });
  </script>
</body>
</html>
