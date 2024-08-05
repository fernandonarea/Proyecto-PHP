<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Datos del Hotel</title>
    <script src="https://kit.fontawesome.com/c5eafcdf48.js" crossorigin="anonymous"></script>
    <style>
        .hotel-form-container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color: #f4f4f4;
        }

        .hotel-form {
            background: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            max-width: 600px;
            width: 100%;
        }

        .hotel-form div {
            margin-bottom: 15px;
        }

        .hotel-form label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }

        .hotel-form input, .hotel-form select {
            width: 100%;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        .hotel-form button {
            background-color: #007bff;
            color: white;
            border: none;
            padding: 10px 15px;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
        }

        .hotel-form button:hover {
            background-color: #0056b3;
        }
    </style>
    <script>
        function actualizarNombreHotel() {
            var tipoHotel = document.getElementById('tipo_hotel').value;
            var nombreHotelSelect = document.getElementById('nombre_hotel');

            var opcionesPremium = [
                'Grand Royal Hotel',
                'Elysium Hotel',
                'The Luxe Inn',
                'Prestige Palace',
                'Elite Escape Hotel'
            ];

            var opcionesVip = [
                'Regal Heights Hotel',
                'Opulent Oasis',
                'Majestic Lodge',
                'Imperial Suites',
                'Elegant Haven Hotel'
            ];

            var opcionesVipPlus = [
                'Supreme Serenity Hotel',
                'Ultimate Prestige Resort',
                'Celestial View Hotel',
                'Luxuria Grand Resort',
                'Sovereign Retreat'
            ];

            nombreHotelSelect.innerHTML = '';

            var opciones;
            switch (tipoHotel) {
                case 'premium':
                    opciones = opcionesPremium;
                    break;
                case 'vip':
                    opciones = opcionesVip;
                    break;
                case 'vip plus':
                    opciones = opcionesVipPlus;
                    break;
                default:
                    opciones = [];
            }

            opciones.forEach(function(opcion) {
                var optionElement = document.createElement('option');
                optionElement.value = opcion;
                optionElement.text = opcion;
                nombreHotelSelect.appendChild(optionElement);
            });
        }
    </script>
</head>
<body>
    <div class="hotel-form-container">
        <form action="index.php?action=actualizarHot" method="post" class="hotel-form">
        <a id="rowReturn" href="index.php?action=mostrarBol">
            <i class="fa-solid fa-arrow-left"></i> Regresar
        </a>
            <input type="hidden" id="id" name="id" value="<?php echo htmlspecialchars($hotel->getId()); ?>">
            <div>
                <label for="total_habitaciones">Total de Habitaciones:</label>
                <input type="text" id="total_habitaciones" name="total_habitaciones" value="<?php echo htmlspecialchars($hotel->getTotalHabitaciones()); ?>" required>
            </div>
            <div>
                <label for="tipo_hotel">Tipo de Hotel:</label>
                <select id="tipo_hotel" name="tipo_hotel" onchange="actualizarNombreHotel()" required>
                    <option value="">Seleccionar</option>
                    <option value="premium" <?php echo $hotel->getTipoHotel() === 'premium' ? 'selected' : ''; ?>>Premium</option>
                    <option value="vip" <?php echo $hotel->getTipoHotel() === 'vip' ? 'selected' : ''; ?>>VIP</option>
                    <option value="vip plus" <?php echo $hotel->getTipoHotel() === 'vip plus' ? 'selected' : ''; ?>>VIP Plus</option>
                </select>
            </div>
            <div>
                <label for="nombre_hotel">Nombre de Hotel:</label>
                <select id="nombre_hotel" name="nombre_hotel" required>
                    <!-- Las opciones se llenarán dinámicamente con el script -->
                </select>
            </div>
            <div>
                <label for="dias_hospedaje">Días de Hospedaje:</label>
                <input type="text" id="dias_hospedaje" name="dias_hospedaje" value="<?php echo htmlspecialchars($hotel->getDiasHospedaje()); ?>" required>
            </div>
            <div>
                <label for="total_personas">Total de Personas a Hospedarse:</label>
                <input type="text" id="total_personas" name="total_personas" value="<?php echo htmlspecialchars($hotel->getTotalPersonas()); ?>" required>
            </div>
            <div>
                <label for="nombre_reserva">Nombre de Quien Hace la Reserva:</label>
                <input type="text" id="nombre_reserva" name="nombre_reserva" value="<?php echo htmlspecialchars($hotel->getNombreReserva()); ?>" required>
            </div>
            <button type="submit">Actualizar</button>
        </form>
    </div>
</body>
</html>
