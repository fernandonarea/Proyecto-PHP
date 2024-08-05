<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Leandro- Experience</title>
    <style>
        #body-contanier {
            padding: 0;
            margin: 0;
        }
        
        .camping-details {
            text-align: center;
            margin: 20px 0;
        }

        .contenedor {
            display: flex;
            justify-content: space-around;
            flex-wrap: wrap;
        }
        .item {
            background-color: #f9f9f9;
            border-radius: 50%;
            padding: 20px;
            margin: 10px;
            width: 250px;
            height: 300px;
            display: flex;
            flex-direction: column;
            align-items: center;
            text-align: center;
        }

        .item h2 {
            font-size: 1.5em;
            margin: 10px 0;
        }

        .item p {
            flex-grow: 1;
        }

        .imagen-detalle {
            width: 100px;
            height: 100px;
            border: 2px solid #007BFF;
            border-radius: 50%;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            cursor: pointer;
        }

        .imagen-detalle:hover {
            transform: scale(1.1);
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }

        .item a {
            text-decoration: none;
            color: #007BFF;
            font-weight: bold;
            margin-top: 10px;
            display: flex;
            align-items: center;
        }

        .item a i {
            margin-left: 5px;
        }

        .historia-del-festival, .metodos-de-pago {
            display: flex;
            flex-wrap: wrap;
            margin: 20px 0;
            padding: 20px;
            background-color: #f9f9f9;
            border-radius: 10px;
        }

        .historia-content, .metodos-content {
            display: flex;
            width: 100%;
            align-items: center;
            justify-content: space-between;
            flex-direction: row;
        }

        .historia-content .historia-text, .metodos-content .metodos-text {
            width: 50%;
            padding: 20px;
        }

        .historia-content .historia-image, .metodos-content .metodos-image {
            width: 50%;
            overflow: hidden; 
        }

        .historia-content .historia-image img, .metodos-content .metodos-image img {
            width: 100%;
            height: auto;
            border-radius: 10px;
            transition: transform 0.3s ease-in-out; 
        }

        .historia-content .historia-image img:hover, .metodos-content .metodos-image img:hover {
            transform: scale(1.1); 
        }
        button[type="submit"] {
            background-color: #1B7F79;
            color: white;
            border: none;
            padding: 10px 20px;
            font-size: 1em;
            cursor: pointer;
            border-radius: 5px;
            transition: background-color 0.3s ease;
            display: block;
            margin: 20px auto;
        }

        button[type="submit"]:hover {
            background-color: #1B7F79;
        }
    </style>
    <script src="https://kit.fontawesome.com/c5eafcdf48.js" crossorigin="anonymous"></script>
    <!-- hoja de estilos externa -->
    <link rel="stylesheet" href="<?php echo CSS_PATH; ?>">
</head>
<body>
<?php require_once dirname(__FILE__) . '/../templates/header.php';?>
    <audio id="reproductor">
        <source src="<?php echo AUDIO_PATH; ?>electro-summer.mp3" type="audio/mpeg">
    </audio>
    <button onclick="reproducirAudio()">Reproducir</button>
    <button onclick="pausarAudio()">Pausar</button>
    <input type="range" min="0" max="1" step="0.01" value="1" onchange="ajustarVolumen(this.value)">
    <main>
        <div id="body-container">
            <figure class="image-container">
                <img src="<?php echo IMAGE_PATH; ?>portada-exp.jpg" alt="portada experiencia" class="imagen-bloque">
            </figure>
            <p class="image-description" style="font-size: 3rem;">
                ¡Bienvenido al Festival de Experiencia!
            </p>  
        </div>
        <!-- Sección: Historia -->
        <section class="historia-del-festival">
            <div class="historia-content">
                <div class="historia-text">
                    <h1>Historia del Festival</h1>
                    <p>Desde sus inicios, nuestro festival ha crecido de manera exponencial. Conocido por su diversidad y calidad, se ha convertido en un evento de referencia en la escena musical.</p>
                </div>
                <div class="historia-image">
                    <img src="<?php echo IMAGE_PATH; ?>historia.jpg" alt="Historia del Festival">
                </div>
            </div>
        </section>
        <!-- Sección: Métodos de Pago -->
        <section class="metodos-de-pago">
            <div class="metodos-content">
                <div class="metodos-image">
                    <img src="<?php echo IMAGE_PATH; ?>pago-festival.jpg" alt="Métodos de Pago">
                </div>
                <div class="metodos-text">
                    <h1>Métodos de Pago</h1>
                    <p>Ofrecemos diversas opciones de pago para tu comodidad, incluyendo tarjetas de crédito, débito y pagos en línea. Asegúrate de conocer todas las facilidades disponibles.</p>
                </div>
            </div>
        </section>
        <section class="camping-details">
            <h1>DETALLES DEL CAMPING</h1>
            <div class="contenedor">
                <div class="item">
                    <figure>
                        <img src="<?php echo IMAGE_PATH; ?>cochecamping.png" alt="Coche Camping" class="imagen-detalle">
                    </figure>
                    <h2>Coche Camping Info</h2>
                    <p>Información relevante sobre el coche camping.</p>
                    <a href="#">Saber más <i class="consultar mas"></i></a>
                </div>
                <div class="item">
                    <figure>
                        <img src="<?php echo IMAGE_PATH; ?>calendario.png" alt="Horas de Camping" class="imagen-detalle">
                    </figure>
                    <h2>Horas de Camping</h2>
                    <p>Horarios permitidos para el camping.</p>
                    <a href="#">Saber más <i class="consultar mas"></i></a>
                </div>
                <div class="item">
                    <figure>
                        <img src="<?php echo IMAGE_PATH; ?>normas.png" alt="Reglas de Camping" class="imagen-detalle">
                    </figure>
                    <h2>Reglas e Información del Camping</h2>
                    <p>Conoce todas las reglas e información necesaria para tu estadía en el camping.</p>
                    <a href="#">Saber más <i class="consultar mas"></i></a>
                </div>
                <div class="item">
                    <figure>
                        <img src="<?php echo IMAGE_PATH; ?>camping.png" alt="Hotelería" class="imagen-detalle">
                    </figure>
                    <h2>Hotelería</h2>
                    <p>Después de la diversión, hemos seleccionado las mejores opciones de alojamiento para ti.</p>
                    <a href="#">Saber más <i class="consultar mas"></i></a>
                </div>
            </div>
        <div class="row-compraTicket">
            <a class="comprarTicket" href="index.php?action=login">RESERVA TU HOSPEDAJE! <i class="fa-solid fa-arrow-right"></i></a>
        </div>
        </section>
        <section class="formulario-voluntarios" id="formularioV">
            <h1>Formulario de Inscripción de Voluntarios</h1>
            <div class="info-voluntarios">
                <p>Los voluntarios del festival ayudarán en diversas funciones, como la organización de actividades, atención al público, logística, y más. Ser voluntario es una oportunidad única para involucrarse en la comunidad del festival y contribuir a crear una experiencia memorable para todos los participantes.</p>
            </div>
            <form id="formularioVoluntarios" style="display: inline;">
                <div class="campo">
                    <label for="nombre">Nombre Completo:</label>
                    <input type="text" id="nombre" name="nombre" required>
                </div>
                <div class="campo">
                    <label for="email">Correo Electrónico:</label>
                    <input type="email" id="email" name="email" required>
                </div>
                <div class="campo">
                    <label for="telefono">Teléfono de Contacto:</label>
                    <input type="tel" id="telefono" name="telefono" pattern="[0-9]{9,10}" required>
                    <small>Formato: 9 a 10 dígitos numéricos</small>
                </div>
                <div class="campo">
                    <label for="edad">Edad:</label>
                    <input type="number" id="edad" name="edad" min="18" max="99" required>
                </div>
                <div class="campo">
                    <label for="experiencia">Experiencia Previa:</label>
                    <textarea id="experiencia" name="experiencia" rows="4" required></textarea>
                </div>
                <div class="campo">
                    <label for="disponibilidad">Disponibilidad:</label>
                    <select id="disponibilidad" name="disponibilidad" required>
                        <option value="">Selecciona...</option>
                        <option value="mañana">Mañana</option>
                        <option value="tarde">Tarde</option>
                        <option value="noche">Noche</option>
                        <option value="todo el día">Todo el día</option>
                    </select>
                </div>
                <div class="campo">
                    <input type="checkbox" id="confirmacion" name="confirmacion" required>
                    <label for="confirmacion">Acepto los términos y condiciones</label>
                </div>
                <button type="submit">Enviar Inscripción</button>
            </form>
        </section>        
    </main>
    <?php require_once dirname(__FILE__) . '/../templates/footer.php';?>
    <!-- Libreria de iconos -->
    <script src="https://kit.fontawesome.com/c5eafcdf48.js" crossorigin="anonymous"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const imagesMap = {
                'cochecamping.png': ['imagenes/cochecamping3.png', 'imagenes/cochecamping2.png'],
                'calendario.png': ['imagenes/calendario2.png', 'imagenes/calendario3.png'],
                'normas.png': ['imagenes/normas2.png', 'imagenes/normas3.png'],
                'camping.png': ['imagenes/hoteleria2.png', 'imagenes/hoteleria.png']
            };
    
            const campingImages = document.querySelectorAll('.imagen-detalle');
    
            campingImages.forEach(img => {
                img.addEventListener('click', () => {
                    const originalSrc = Object.keys(imagesMap).find(key => img.src.includes(key));
                    if (originalSrc) {
                        const currentIndex = imagesMap[originalSrc].indexOf(img.src);
                        const nextIndex = (currentIndex + 1) % imagesMap[originalSrc].length;
                        img.src = imagesMap[originalSrc][nextIndex];
                    } else {
                        const firstImage = imagesMap[Object.keys(imagesMap).find(key => img.src.includes(key))][0];
                        img.src = firstImage;
                    }
                });
            });
        });
    </script>
    <script>
        const reproductor = document.getElementById('reproductor');
    
        function reproducirAudio() {
            reproductor.play();
        }
    
        function pausarAudio() {
            reproductor.pause();
        }
    
        function ajustarVolumen(valor) {
            reproductor.volume = valor;
        }
    </script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const formulario = document.getElementById('formularioVoluntarios');
    
            formulario.addEventListener('submit', function(event) {
                event.preventDefault(); 
                if (validarNombre() && validarEmail() && validarTelefono() && validarEdad() && validarExperiencia() && validarDisponibilidad() && validarConfirmacion()) {
                    alert('Formulario enviado correctamente');
                    formulario.reset(); 
                }
            });
    
            function validarNombre() {
                const nombre = document.getElementById('nombre').value.trim();
                if (nombre === '') {
                    alert('Por favor, ingresa tu nombre completo.');
                    return false;
                }
                return true;
            }
    
            function validarEmail() {
                const email = document.getElementById('email').value.trim();
                const regexEmail = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
                if (!regexEmail.test(email)) {
                    alert('Por favor, ingresa un correo electrónico válido.');
                    return false;
                }
                return true;
            }
    
            function validarTelefono() {
                const telefono = document.getElementById('telefono').value.trim();
                const regexTelefono = /^[0-9]{9,10}$/;
                if (!regexTelefono.test(telefono)) {
                    alert('Por favor, ingresa un teléfono válido (9 a 10 dígitos numéricos).');
                    return false;
                }
                return true;
            }
    
            function validarEdad() {
                const edad = document.getElementById('edad').value.trim();
                if (isNaN(edad) || edad < 18 || edad > 99) {
                    alert('Por favor, ingresa una edad válida (mayor de 18 años).');
                    return false;
                }
                return true;
            }
    
            function validarExperiencia() {
                const experiencia = document.getElementById('experiencia').value.trim();
                if (experiencia === '') {
                    alert('Por favor, describe tu experiencia previa.');
                    return false;
                }
                return true;
            }
    
            function validarDisponibilidad() {
                const disponibilidad = document.getElementById('disponibilidad').value.trim();
                if (disponibilidad === '') {
                    alert('Por favor, selecciona tu disponibilidad.');
                    return false;
                }
                return true;
            }
    
            function validarConfirmacion() {
                const confirmacion = document.getElementById('confirmacion').checked;
                if (!confirmacion) {
                    alert('Debes aceptar los términos y condiciones para continuar.');
                    return false;
                }
                return true;
            }
        });
    </script>
</body>
</html>

