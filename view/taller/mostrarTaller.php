<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Mostrar Talleres</title>
    <script src="https://kit.fontawesome.com/c5eafcdf48.js" crossorigin="anonymous"></script>
    <style>
        body {
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            background-color: #f4f4f4; 
        }
        .container {
            width: 100%;
            max-width: 800px; 
            padding: 20px;
            background-image: url('<?php echo IMAGE_PATH; ?>background.png'); 
            background-size: cover; 
            background-position: center;
            background-repeat: no-repeat; 
            border-radius: 8px; 
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .taller {
            border: 1px solid #ccc;
            margin-bottom: 20px;
            padding: 20px; /* Ajusta el padding del div padre para mayor espacio interno */
            display: flex;
            align-items: center; /* Alinea verticalmente el contenido */
            max-width: 100%; /* Asegura que el div no exceda el ancho del contenedor */
            gap: 20px; /* Añade espacio entre la imagen y los detalles */
            background-color: #fff; /* Fondo blanco para cada taller para mejor legibilidad */
            border-radius: 8px; /* Bordes redondeados opcionales */
        }
        .taller img {
            width: 150px; /* Ajusta el tamaño de la imagen */
            height: auto; /* Mantiene la proporción de la imagen */
        }
        .taller .imagen {
            flex: 1;
            display: flex;
            justify-content: center; /* Centra la imagen horizontalmente */
        }
        .taller .detalles {
            flex: 3;
        }
        .taller .detalles p {
            margin: 5px 0;
        }
        .taller .botones {
            margin-top: 10px;
        }
        .taller .botones a {
            text-decoration: none;
            color: #007BFF; /* Color del enlace */
            margin-right: 10px;
        }
        .taller .botones a:hover {
            text-decoration: underline; /* Subrayado en hover */
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Lista de Talleres</h1>
        <a id="rowReturn" href="index.php?action=mostrarBol">
            <i class="fa-solid fa-arrow-left"></i> Regresar
        </a> 
        <?php foreach ($talleres as $taller): ?>
            <div class="taller">
                <div class="imagen">
                    <?php if ($taller->getTipoTaller() == 'arte y pintura'): ?>
                        <img src="<?php echo IMAGE_PATH; ?>arte_pintura.jpg" alt="Arte y Pintura">
                    <?php elseif ($taller->getTipoTaller() == 'manualidades'): ?>
                        <img src="<?php echo IMAGE_PATH; ?>manualidades.jpg" alt="Manualidades">
                    <?php endif; ?>
                </div>
                <div class="detalles">
                    <p><strong>Nombre:</strong> <?php echo $taller->getNombre(); ?></p>
                    <p><strong>Tipo de Taller:</strong> <?php echo $taller->getTipoTaller(); ?></p>
                    <p><strong>Experiencia:</strong> <?php echo $taller->getExperiencia(); ?></p>
                    <p><strong>Edad:</strong> <?php echo $taller->getEdad(); ?></p>
                    <p><strong>Género:</strong> <?php echo $taller->getGenero(); ?></p>
                    <p><strong>Horarios:</strong> <?php echo $taller->getHorarios(); ?></p>
                    <div class="botones">
                        <a href="index.php?action=editarTal&id=<?php echo $taller->getId(); ?>">Editar Taller</a> |
                        <a href="index.php?action=cancelarTal&id=<?php echo $taller->getId(); ?>">Cancelar Taller</a>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</body>
</html>
