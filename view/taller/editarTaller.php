<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Editar Taller</title>
    <script src="https://kit.fontawesome.com/c5eafcdf48.js" crossorigin="anonymous"></script>
    <style>
        body {
            font-family: Arial, sans-serif; /* Fuente general para el texto */
            margin: 0;
            padding: 0;
            background-color: #f4f4f4; /* Color de fondo general */
            display: flex;
            justify-content: center; /* Centra el contenedor horizontalmente */
            align-items: center; /* Centra el contenedor verticalmente */
            height: 100vh; /* Altura completa de la ventana del navegador */
        }
        .container {
            width: 100%;
            max-width: 600px; /* Ancho máximo del formulario */
            padding: 20px;
            background-color: #fff; /* Fondo blanco para el formulario */
            border-radius: 8px; /* Bordes redondeados */
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); /* Sombra opcional */
            box-sizing: border-box; /* Incluye el padding y border en el tamaño total del elemento */
        }
        h1 {
            text-align: center; /* Centra el título */
            color: #333; /* Color del texto del título */
        }
        label {
            display: block; /* Hace que cada etiqueta ocupe toda la línea */
            margin: 10px 0 5px; /* Espaciado alrededor de las etiquetas */
            color: #555; /* Color del texto de las etiquetas */
        }
        input[type="text"],
        input[type="number"],
        select {
            width: 100%; /* Hace que los campos ocupen el ancho completo del contenedor */
            padding: 10px; /* Espaciado interno de los campos */
            margin-bottom: 15px; /* Espaciado debajo de cada campo */
            border: 1px solid #ccc; /* Borde gris claro para los campos */
            border-radius: 4px; /* Bordes redondeados en los campos */
            box-sizing: border-box; /* Incluye el padding y border en el tamaño total del elemento */
        }
        button {
            width: 100%; /* Ancho completo del botón */
            padding: 10px; /* Espaciado interno del botón */
            background-color: #007BFF; /* Color de fondo azul para el botón */
            color: #fff; /* Color del texto del botón */
            border: none; /* Sin borde para el botón */
            border-radius: 4px; /* Bordes redondeados en el botón */
            font-size: 16px; /* Tamaño de fuente del botón */
            cursor: pointer; /* Cambia el cursor al pasar sobre el botón */
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); /* Sombra opcional para el botón */
        }
        button:hover {
            background-color: #0056b3; /* Color de fondo más oscuro en hover */
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Editar Taller</h1>
        <a id="rowReturn" href="index.php?action=mostrarBol">
            <i class="fa-solid fa-arrow-left"></i> Regresar
        </a>
        <form action="index.php?action=actualizarTal" method="post">
            <input type="hidden" name="id" value="<?php echo $taller->getId(); ?>">
            <label for="nombre">Nombre:</label>
            <input type="text" id="nombre" name="nombre" value="<?php echo $taller->getNombre(); ?>" required>

            <label for="tipo_taller">Tipo de Taller:</label>
            <select id="tipo_taller" name="tipo_taller" required>
                <option value="arte y pintura" <?php echo $taller->getTipoTaller() == 'arte y pintura' ? 'selected' : ''; ?>>Arte y Pintura</option>
                <option value="manualidades" <?php echo $taller->getTipoTaller() == 'manualidades' ? 'selected' : ''; ?>>Manualidades</option>
            </select>

            <label for="experiencia">Experiencia:</label>
            <select id="experiencia" name="experiencia" required>
                <option value="poca" <?php echo $taller->getExperiencia() == 'poca' ? 'selected' : ''; ?>>Poca</option>
                <option value="mediana" <?php echo $taller->getExperiencia() == 'mediana' ? 'selected' : ''; ?>>Mediana</option>
                <option value="profesional" <?php echo $taller->getExperiencia() == 'profesional' ? 'selected' : ''; ?>>Profesional</option>
            </select>

            <label for="edad">Edad:</label>
            <input type="number" id="edad" name="edad" value="<?php echo $taller->getEdad(); ?>" required>

            <label for="genero">Género:</label>
            <select id="genero" name="genero" required>
                <option value="masculino" <?php echo $taller->getGenero() == 'masculino' ? 'selected' : ''; ?>>Masculino</option>
                <option value="femenino" <?php echo $taller->getGenero() == 'femenino' ? 'selected' : ''; ?>>Femenino</option>
            </select>

            <label for="horarios">Horarios:</label>
            <select id="horarios" name="horarios" required>
                <option value="mañana" <?php echo $taller->getHorarios() == 'mañana' ? 'selected' : ''; ?>>Mañana</option>
                <option value="tarde" <?php echo $taller->getHorarios() == 'tarde' ? 'selected' : ''; ?>>Tarde</option>
                <option value="noche" <?php echo $taller->getHorarios() == 'noche' ? 'selected' : ''; ?>>Noche</option>
            </select>

            <button type="submit">Actualizar Taller</button>
        </form>
    </div>
</body>
</html>
