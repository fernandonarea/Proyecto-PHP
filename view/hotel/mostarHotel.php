<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/c5eafcdf48.js" crossorigin="anonymous"></script>
    <title>Mostrar Hoteles</title>
    <style>
        /* Estilo para centrar el contenedor principal */
        body{
            background-image: url('<?php echo IMAGE_PATH; ?>background.png'); 
        }
        .main-container {
            display: flex;
            flex-direction: column;
            align-items: center;
            padding: 20px;
        }

        /* Estilo para el contenedor de tarjetas */
        .cards-container {
            display: flex;
            flex-wrap: wrap; /* Permite que las tarjetas se envuelvan a la siguiente línea */
            gap: 20px; /* Espacio entre las tarjetas */
            justify-content: center; /* Centra las tarjetas en el contenedor */
            max-width: 1000px; /* Ajusta el ancho máximo según tus necesidades */
        }

        .hotel-container {
            border: 1px solid #ddd;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            padding: 20px;
            background-color: #fff;
            text-align: left;
            width: 300px; /* Ancho fijo para las tarjetas */
            box-sizing: border-box; /* Asegura que el padding y el borde se incluyan en el ancho total */
        }

        .hotel-container p {
            margin: 10px 0;
        }

        .button-container {
            margin-top: 20px;
        }

        .button {
            display: block;
            padding: 10px 20px;
            font-size: 1em;
            color: #fff;
            background-color: #007bff;
            text-decoration: none;
            border-radius: 5px;
            margin: 0 10px;
            transition: background-color 0.3s ease;
            margin: 5px;
            text-align: center;
        }

        .button:hover {
            background-color: #0056b3;
        }

        .cancel-button {
            background-color: #dc3545;
        }

        .cancel-button:hover {
            background-color: #c82333;
        }
    </style>
</head>
<body>
    <h1>Listado de Hoteles que haz Reservado</h1>
    <a id="rowReturn" href="index.php?action=mostrarBol">
        <i class="fa-solid fa-arrow-left"></i> Regresar
    </a>
    <?php if (!empty($hoteles)): ?>
            <div class="cards-container">
                <?php foreach ($hoteles as $hotel): ?>
                    <div class="hotel-container">
                        <p><strong>ID:</strong> <?php echo htmlspecialchars($hotel->getId()); ?></p>
                        <p><strong>Total de Habitaciones:</strong> <?php echo htmlspecialchars($hotel->getTotalHabitaciones()); ?></p>
                        <p><strong>Tipo de Hotel:</strong> <?php echo htmlspecialchars($hotel->getTipoHotel()); ?></p>
                        <p><strong>Nombre de Hotel:</strong> <?php echo htmlspecialchars($hotel->getNombreHotel()); ?></p>
                        <p><strong>Días de Hospedaje:</strong> <?php echo htmlspecialchars($hotel->getDiasHospedaje()); ?></p>
                        <p><strong>Total de Personas:</strong> <?php echo htmlspecialchars($hotel->getTotalPersonas()); ?></p>
                        <p><strong>Nombre de quien Reserva:</strong> <?php echo htmlspecialchars($hotel->getNombreReserva()); ?></p>
                        <div class="button-container">
                            <a href="index.php?action=editarHot&id=<?php echo htmlspecialchars($hotel->getId()); ?>" class="button">Editar</a>
                            <a href="index.php?action=cancelarHot&id=<?php echo htmlspecialchars($hotel->getId()); ?>" class="button cancel-button">Cancelar Reserva</a>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php else: ?>
            <p>No se encontraron hoteles.</p>
        <?php endif; ?>
</body>
</html>
