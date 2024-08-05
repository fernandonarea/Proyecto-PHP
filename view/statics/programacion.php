<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Lindao Borbor Hamilton ">
    <title>Lindao - Programacion</title>
    <style>
        #body-contanier {
        padding: 0;
        margin: 0;
        }
    </style>
    <script src="https://kit.fontawesome.com/c5eafcdf48.js" crossorigin="anonymous"></script>
    <!-- hoja de estilos externa -->
    <link rel="stylesheet" href="<?php echo CSS_PATH; ?>">
</head>
<body>
    <!-- empieza el encabezado-->
    <?php require_once dirname(__FILE__) . '/../templates/header.php';?>
    <!-- contenido de la pagina -->
    <main>
        <div id="body-container">
            <section class="image-section-programacion">
                <div class="colTitu2">
                    <h1>PROGRAMACIÓN DE ARTISTAS INVITADOS</h1>
                </div>
            <figure class="image-container">
                <img src="<?php echo IMAGE_PATH; ?>portada-programacion.jpg" alt="portada programacion" class="imagen-bloque">
                    <figcaption class="image-text" style="font-weight: bold; font-family: Georgia, 'Times New Roman', Times, serif; text-align: center; line-height: 1.5;">
                        ¡Estos son los artitas que tenemos para ti..!
                        <br>
                    </figcaption>
                </figure>
            </section>
        </div>
         <!-- Sección: Horario de programación -->
        <section class="CRONOGRAMA">
            <div class="row-artistas-titulo">
                <div class="colTitu2">
                    <h1>CRONOGRAMA</h1>
                </div>
            </div>
            <table>
                <thead>
                    <tr>
                        <th>Horarios</th>
                        <th>Artistas</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>12:00 P.M. - 12:20 P.M.</td>
                        <td>Ariana Grande</td>
                    </tr>
                    <tr>
                        <td>12:40 P.M. - 1:00 P.M.</td>
                        <td>Taylor Swift</td>
                    </tr>
                    <tr>
                        <td>1:20 P.M. - 1:40 P.M.</td>
                        <td>Shakira</td>
                    </tr>
                    <tr>
                        <td>2:00 P.M. - 2:20 P.M.</td>
                        <td>Beyonce</td>
                    </tr>
                    <tr>
                        <td>2:50 P.M. - 3:20 P.M.</td>
                        <td>Justin Bieber</td>
                    </tr>
                    <tr>
                        <td>3:50 P.M. - 4:20 P.M.</td>
                        <td>Selena Gomez</td>
                    </tr>
                    <tr>
                        <td>5:05 P.M. - 5:50 P.M.</td>
                        <td>Jennifer Lopez</td>
                    </tr>
                    <tr>
                        <td>6:35 P.M. - 7:20 P.M.</td>
                        <td>Rihanna</td>
                    </tr>
                    <tr>
                        <td>8:05 P.M. - 8:50 P.M.</td>
                        <td>Drake</td>
                    </tr>
                    <tr>
                        <td>9:35 P.M. - 10:20 P.M.</td>
                        <td>Adele</td>
                    </tr>
                    <tr>
                        <td>11:20 P.M. - 12:20 A.M.</td>
                        <td>Marc Antony</td>
                    </tr>
                    <tr>
                        <td>1:20 A.M. - 2:20 A.M.</td>
                        <td>Chayanne</td>
                    </tr>
                </tbody>
            </table>
        </section>

        <div class="bloque-artistas">
            <section class="artistas-section">
                <div class="row-artistas-titulo">
                    <div class="colTitu2">
                        <h1>ARTISTAS INVITADOS</h1>
                    </div>
                </div>
                <div class="row-artistas-contenido">
                    <div class="col-SelenaGomez">
                        <div class="row-imagen-art">
                            <img src="<?php echo IMAGE_PATH; ?>Selena-Gomez.jpg" alt="Selena Gomez" class="imagen-selena">
                        </div>
                        <div class="row-descripcion-art">
                            <p>
                                Selena Marie Gomez (Grand Prairie, Texas, Estados Unidos; 
                                22 de julio de 1992) es una actriz y cantante estadounidense 
                                mejor conocida por interpretar el papel de Alex Russo en la 
                                serie original de Disney Channel ganadora del Emmy, Wizards 
                                of Waverly Place.
                            </p>
                        </div>
                        <div class="contenedor-boton-art">
                            <button class="boton">
                                Selena Gomez
                            </button>
                        </div>
                    </div>
                            
                    <div class="col-MarcAntony">
                        <div class="row-imagen-art">
                            <img src="<?php echo IMAGE_PATH; ?>Marc-Antony.jpg" alt="MarcAntony" class="imagen-marcantony">
                        </div>
                        <div class="row-descripcion-art">
                            <p>
                                Marco Antonio Muñiz Rivera (Nueva York, 16 de septiembre de 1968), 
                                más conocido como Marc Anthony, es un cantautor y actor 
                                estadounidense, cuyas canciones van desde la salsa, pasando por
                                el bolero, la balada y el pop latino. Es el artista de música 
                                tropical más exitoso de todos los tiempos.Ha ganado cuatro 
                                Premios Grammy, cinco Premios Grammy Latinos y veintinueve 
                                Premios Lo Nuestro (cantante masculino más galardonado).
                            </p>          
                        </div>
                        <div class="contenedor-boton-art">
                            <button class="boton">
                                Marc Antony
                            </button>
                        </div>
                    </div>
                  
                    <div class="col-Chayanne">
                        <div class="row-imagen-art">
                            <img src="<?php echo IMAGE_PATH; ?>Chayanne.jpg" alt="Chayanne" class="imagen-chayanne">
                        </div>
                        <div class="row-descripcion-art">
                            <p>
                                Cantante y actor puertorriqueño, figura principal del panorama
                                musical hispanoamericano. Al igual que compatriotas suyos 
                                como Ricky Martin, Luis Fonsi y Marc Anthony, Chayanne es un 
                                representativo exponente del fenómeno del artista latino que 
                                triunfa en todo el mundo aupado por un gran número de seguidores.
                            </p>
                        </div>
                        <div class="contenedor-boton-art">
                            <button class="boton">
                                Chayanne
                            </button>
                        </div>
                    </div>
                </div>
                <div class="contenedor-boton-art">
                    <a class="boton" href="index.php?action=login" style="color: white; font-weight: bold; text-decoration: none;">ANUNCIA TU EVENTO, AQUI!!!</a>
                  </div>
            </section>
        </div>           
            
        <div>
            <section class="area-de-descanzo">
                <div class="area-content">
                    <div class="area-text">
                        <h1>AREA DE DESCANZO Y ZONAS DE RELAJACIÓN</h1>
                        <p>Las zonas lounge de grandes dimensiones 
                            con vistas a la naturaleza ofrecen la 
                            posibilidad de descansar y relajarse. 
                            Los muebles acogedores, como los sofás, 
                            ofrecen confort y una sensación de 
                            bienestar alejada de lo que se espera 
                            del espacio de trabajo clásico.
        
                            Espacios más exclusivos y temáticos: 
                            En lugar de las grandes discotecas genéricas, 
                            han surgido locales más pequeños y exclusivos 
                            que se enfocan en temáticas específicas. Estos 
                            lugares ofrecen una experiencia única, ya sea 
                            a través de su decoración, música o estilo de 
                            entretenimiento.
        
                            Enfoque en la experiencia del cliente: Las 
                            nuevas tendencias también se centran en proporcionar 
                            una experiencia inolvidable para los asistentes. 
                            Esto implica ofrecer una atención personalizada, 
                            cócteles creativos, áreas de descanso cómodas, 
                            servicios VIP y actividades interactivas durante 
                            la noche.
                        </p>
                    </div>
                    <div class="area-image">
                        <img src="<?php echo IMAGE_PATH; ?>Area-descanzo.jpg" alt="Area de Descanzo">
                    </div>
                </div>
            </section>
        </div>
    </main>
    <?php require_once dirname(__FILE__) . '/../templates/footer.php';?>
    <!-- Libreria de iconos -->
    <script src="https://kit.fontawesome.com/c5eafcdf48.js" crossorigin="anonymous"></script>
</body>
</html>