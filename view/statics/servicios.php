<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Fernando Narea">
    <title>Fernando Narea - Servicios</title>
    <style>
        html, body{
            height: 100%;
            margin: 0;
            padding: 0;
            width: 100%;
            height: 100%;
            font-family: Arial, Helvetica, sans-serif;
        }
    </style>
    <!--Iconos-->
    <script src="https://kit.fontawesome.com/c5eafcdf48.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="<?php echo CSS_PATH; ?>">
  </head>
<body>
<?php require_once dirname(__FILE__) . '/../templates/header.php';?>  
    <main>
      <section class="banner">
        <div class="banner-info">
          <h1 class="titulo-banner">Servicios</h1>
          <p class="parrafo-banner">Hecha un vistazo a los servicios que ofrecemos para tus eventos</p>
        </div>
      </section>
      <section class="conciertos">
        <div class="container-concierto">
          <div>
            <figure>
              <img src="<?php echo IMAGE_PATH; ?>concierto.jpg" alt="comida-referenciaL">
            </figure>
          </div>
          <div>
            <h2>Conciertos</h2>
            <p style="color:#6a6a6a;">
              Con más de 20 artistas nacionales e internacionales en el escenario, espectáculos de luces 
              impresionantes y una gran variedad de food trucks, nuestro festival tiene algo para todos. 
              No te pierdas la oportunidad de ver en vivo a tus bandas favoritas, descubrir nuevos talentos y 
              crear recuerdos inolvidables con tus amigos y familia. <strong>¡Compra tus boletos hoy y sé parte de esta 
              celebración única de música y cultura!</strong>
            </p>
          </div>
        </div>
      </section>
      <section class="festival-servicios">
        <div class="zonabar-title">
          <h1 style="font-size: 35px; color: #fff;">Servicios del Festival</h1>
        </div>
        <div class="container-cards">
          <div class="card">
            <h2>Seguridad</h2>
            <img class = "img-servicios" src="<?php echo IMAGE_PATH; ?>seguridad.jpg" alt="seguridad-img">
            <p class="mas-info">La seguridad es nuestra prioridad. Contamos con personal capacitado y 
              sistemas de vigilancia para garantizar tu bienestar durante todo el evento.</p>
          </div>

          <div class="card">
            <h2>Comida</h2>
            <img class = "img-servicios" src="<?php echo IMAGE_PATH; ?>catering.jpg" alt="comida-img">
            <p class="mas-info">Disfruta de una variedad de platillos deliciosos preparados por los mejores chefs. 
              Tenemos opciones para todos los gustos y necesidades dietéticas.</p>
          </div>

          <div class="card">
            <h2>Festival Kids</h2>
            <img class = "img-servicios" src="<?php echo IMAGE_PATH; ?>fesitvalkids.png" alt="festivalkids-img">
            <p class="mas-info">El Festival Kids ofrece actividades divertidas y educativas para los más pequeños. 
              Juegos, talleres y espectáculos especialmente diseñados para niños.</p>
          </div>

          <div class="card">
            <h2 class="tipo-servicio">Movilización</h2>
            <img class = "img-servicios" src="<?php echo IMAGE_PATH; ?>movilizacion.jpg" alt="movilizacion-img">
            <p class="mas-info">Ofrecemos transporte seguro y eficiente para todos los asistentes. 
              Buses y puntos de encuentro claramente señalizados para tu comodidad.</p>
          </div>
        </div>

        <div class="btnSContainer">
          <a class="btnServicios" href="index.php?action=login" style="color: white; font-weight: bold; text-decoration: none;">Para más informacion sobre los servicios click aqui</a>
        </div>   
    </section>  
  </main>
  
    <script type="text/javascript">
      //CARDS
      // Obtener elementos a manipular
      let cards = document.querySelectorAll(".card");

      cards.forEach(card => {
        //obtener elementos a manipular
          const img = card.querySelector('.img-servicios');
          const info = card.querySelector('.mas-info');

        //añadir eventlistener cuando el mouse pase por encima de las imagenes
          img.addEventListener('mouseover', () => {
              info.style.display = 'block';
          });

          img.addEventListener('mouseout', () => {
              info.style.display = 'none';
          }); 
      });
    </script>
    <?php require_once dirname(__FILE__) . '/../templates/footer.php';?>
  </body>
</html>