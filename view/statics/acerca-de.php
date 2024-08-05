<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Fatima Arce">
    <title>Fatima Arce - Acerca de</title>
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
      .tallerArte{
        cursor: pointer;
      }
      #resultado {
      margin-top: 20px;
      }
      #mostrarCuestionario{
        cursor: pointer;
      }
    </style>
    <!--Iconos-->
    <script src="https://kit.fontawesome.com/c5eafcdf48.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="<?php echo CSS_PATH; ?>">
</head>
<body>
  <?php require_once dirname(__FILE__) . '/../templates/header.php';?>
    <main>
      <figure class="Bloque-imagen">
        <img src="<?php echo IMAGE_PATH; ?>acercaDe.jpeg" alt="imagen del festival" class="imagen-bloque">
      </figure>
      <p class="image-text" 
      style="font-weight: bold; font-family: Georgia, 'Times New Roman', Times, serif;">
      Acerca de Nosotros</p>
      <div id="Bloque-quienesSomos" class="row-quienesSomos">
        <div class="col-quienesSomos">
          <div class="row-quienesSomos-title">
            <h2>QUIENES SOMOS?</h2>
          </div>
          <div class="row-quienesSomos-content">
            <p>
              Festival Fest es una celebración anual de música, arte y cultura, 
              organizada por un apasionado equipo de creativos y entusiastas de 
              la música. 
              Nuestro festival nació en 2010 con la visión de crear un espacio 
              donde personas de todas las edades y procedencias pudieran reunirse 
              para disfrutar de actuaciones en vivo, arte interactivo y una vibrante 
              comunidad.
            </p>
          </div>
        </div>
        <div class="col-imagenQuienesSomos">
          <img id="col-imagenQuienesSomos" src="<?php echo IMAGE_PATH; ?>=quienesSomos.jpg" alt="imagen de jovenes en el festival">
        </div>
      </div>
      <div id="Bloque-historia" class="row-historia">
        <div class="row-contentHistoria">
          <h2 class="row-titleHistoria">Nuestra Historia</h2>
          <p>
            Festival Fest comenzó en el verano de 2010 como un pequeño evento local 
            destinado a celebrar la música y el arte en nuestra comunidad. Fundado 
            por un grupo de amigos apasionados por la cultura y la creatividad, el 
            festival rápidamente ganó popularidad gracias a su ambiente inclusivo y 
            a la calidad de sus actuaciones. 
            
            En sus primeros años, el festival se celebraba en un parque local, atrayendo 
            a un público de cientos de personas.Con el tiempo, Festival Fest ha crecido 
            exponencialmente, transformándose en un evento de varios días que ahora atrae 
            a decenas de miles de asistentes de todo el país y del extranjero.
          </p>
        </div>
      </div>
      <div id="Bloque-expectaculos" class="row-espectaculos">
        <div class="col-expectaculos">
          <div class="row-titleMusica">
            <h2>Musica</h2>
          </div>
          <div class="row-pictureMusica">
            <img class="img-Col" src="<?php echo IMAGE_PATH; ?>musica.png" alt="artistas">
          </div>
          <div class="row-expectaculos-content">
           <p>
            Durante el festival, los asistentes pueden disfrutar de actuaciones en vivo en 
            múltiples escenarios, cada uno diseñado para ofrecer una experiencia única y envolvente. 
            Desde conciertos íntimos en acústico hasta espectáculos llenos de energía y luces 
            deslumbrantes, la música en Festival Fest es una experiencia que trasciende lo ordinario.

            Además, ofrecemos sesiones de DJ y espacios de baile donde los asistentes pueden sumergirse 
            en ritmos vibrantes y dejarse llevar por la música. Nuestros talleres interactivos 
            también permiten a los participantes aprender de músicos experimentados, explorar nuevos 
            instrumentos y descubrir su propia creatividad musical. En Festival Fest, creemos que la 
            música es una forma poderosa de conectar a las personas y crear recuerdos duraderos.
           </p>
          </div>
        </div>
        <div class="col-expectaculos">
          <div class="row-titleArte">
            <h2>Arte</h2>
          </div>
          <div class="row-pictureArte">
              <img class="img-Col" src="<?php echo IMAGE_PATH; ?>tallerArte.jpg" alt="Talleres de Arte">
            </div>
          <div class="row-expectaculos-content">            
            <p>
              El arte es una parte integral de Festival Fest, donde la creatividad 
              y la imaginación se manifiestan en todas sus formas. Nuestro festival 
              presenta una rica variedad de exposiciones artísticas, que incluyen 
              instalaciones de arte contemporáneo, esculturas, murales y performance 
              art. Trabajamos con artistas locales e internacionales para transformar 
              nuestro espacio en una galería al aire libre que inspira y asombra a 
              nuestros asistentes.

              Las exposiciones de arte en Festival Fest están diseñadas para ser 
              interactivas y participativas, invitando a los asistentes a involucrarse 
              activamente con las obras. Desde murales que cobran vida con la participación 
              del público hasta instalaciones inmersivas que desafían los sentidos, el 
              arte en nuestro festival es una experiencia dinámica y envolvente.
            </p>
          </div>
          <span id="spanTaller">
            <a href="index.php?action=login" class="tallerArte" style="text-align: center;">Inscribete a un taller de arte
              <i class="fa-solid fa-arrow-right"></i></a>
            </span>
        </div>
      </div>

      <div id="Ubicación">
        <div class="col-maps" style="width: 100%; height: 400px;">
          <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d210538.56099282712!2d-89.5940428!3d34.4606504!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x888075cf631b4a89%3A0xe8e3adc71afc8e76!2sSardis%20Lake!5e0!3m2!1sen!2sec!4v1718235321841!5m2!1sen!2sec" 
            width="700" 
            height="400" 
            style="border:0;" 
            allowfullscreen="" 
            loading="lazy" 
            referrerpolicy="no-referrer-when-downgrade">
          </iframe>
        </div>
        <div class="col-textoUbi">
          <h2>DONDE NOS ENCUENTRAS?</h2>
          <p>
            El festival se lleva a cabo en el hermoso Parque Central, 
            ofreciendo un entorno natural perfecto para disfrutar de 
            la música al aire libre.
          </p>
          <h4 id="mostrarCuestionario">Encuentra tu mejor ruta <i class="fa-solid fa-arrow-right"></i></h4>
          <form id="rutaForm">
            <div id="hidden">
              <h2>Mejor Ruta</h2>  
          
              <label for="transporte">¿Cómo te movilizas?</label>
              <select id="transporte" name="transporte">
                <option value="auto">Coche</option>
                <option value="bicicleta">Bicicleta</option>
                <option value="caminando">Caminando</option>
              </select>   
              <label for="ubicacion">¿Dónde te encuentras?</label>
              <input type="text" id="ubicacion" name="ubicacion">    
              <label for="horas">¿Cuántas horas estás dispuesto(a) a viajar?</label>
              <input type="number" id="horas" name="horas" min="1" max="24">            
              <button type="submit">Calcular</button>
              <p id="resultado"></p>
            </div>
          </form>
        </div>  
      </div>
    </main>
    <?php require_once dirname(__FILE__) . '/../templates/header.php';?>
     
    <script type="text/javascript">
      document.getElementById('mostrarCuestionario').addEventListener('click', function() {
          var hiddenDiv = document.getElementById('hidden');
          if (hiddenDiv.style.display === 'none') {
              hiddenDiv.style.display = 'block';
          } else {
              hiddenDiv.style.display = 'none';
          }
      });
  
      document.getElementById('rutaForm').addEventListener('submit', function(event) {
        event.preventDefault();
  
        var transporte = document.getElementById('transporte').value;
        var ubicacion = document.getElementById('ubicacion').value.trim();
        var horas = parseInt(document.getElementById('horas').value);  
        var resultado = document.getElementById('resultado');  
        var sugerencia = '';
  
        // Simulación de cálculo de horas al azar
        var horasRecorrido = Math.floor(Math.random() * horas) + 1;  
        sugerencia = `Para viajar en ${transporte}, 
        partiendo desde ${ubicacion}, 
        te sugerimos planificar un viaje de ${horasRecorrido} horas.`;  
        resultado.textContent = sugerencia;
      });
  </script>
</body>
</html>
