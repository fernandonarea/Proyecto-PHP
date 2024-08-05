<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ingresar Datos del Hotel</title>
    <script src="https://kit.fontawesome.com/c5eafcdf48.js" crossorigin="anonymous"></script>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .container {
            text-align: center;
        }

        #datosHotel {
            margin-bottom: 20px;
        }

        h1 {
            margin: 0;
            color: #333;
        }

        a#rowReturn {
            text-decoration: none;
            color: #007bff;
            font-size: 18px;
        }

        a#rowReturn i {
            margin-right: 8px;
        }

        form {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            max-width: 500px;
            margin: 0 auto;
        }

        .form-group {
            margin-bottom: 15px;
        }

        label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
            color: #333;
        }

        input[type="text"], select {
            width: 100%;
            padding: 8px;
            border: 1px solid #ddd;
            border-radius: 4px;
            box-sizing: border-box;
        }

        input[type="text"]:focus, select:focus {
            border-color: #007bff;
            outline: none;
            box-shadow: 0 0 5px rgba(0, 123, 255, 0.2);
        }

        button {
            background-color: #007bff;
            color: #fff;
            border: none;
            padding: 10px 15px;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
            width: 100%;
            box-sizing: border-box;
            transition: background-color 0.3s ease;
        }

        button:hover {
            background-color: #0056b3;
        }

        .form-group:last-child {
            margin-bottom: 0;
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

            // Limpiar las opciones actuales
            nombreHotelSelect.innerHTML = '';

            // Agregar nuevas opciones basadas en el tipo de hotel seleccionado
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
    <div class="container">
        <div id="datosHotel">
            <h1>Reserva de Hotel</h1>
            <a id="rowReturn" href="index.php?action=mostrarBol">
                <i class="fa-solid fa-arrow-left"></i> Regresar
            </a>
        </div>
        <form action="index.php?action=registerHot" method="post">
            <div class="form-group">
                <label for="total_habitaciones">Total de Habitaciones:</label>
                <input type="text" id="total_habitaciones" name="total_habitaciones" required>
            </div>
            <div class="form-group">
                <label for="tipo_hotel">Tipo de Hotel:</label>
                <select id="tipo_hotel" name="tipo_hotel" onchange="actualizarNombreHotel()" required>
                    <option value="">Seleccionar</option>
                    <option value="premium">Premium</option>
                    <option value="vip">VIP</option>
                    <option value="vip plus">VIP Plus</option>
                </select>
            </div>
            <div class="form-group">
                <label for="nombre_hotel">Nombre de Hotel:</label>
                <select id="nombre_hotel" name="nombre_hotel" required>
                    <!-- Las opciones se llenarán dinámicamente -->
                </select>
            </div>
            <div class="form-group">
                <label for="dias_hospedaje">Días de Hospedaje:</label>
                <input type="text" id="dias_hospedaje" name="dias_hospedaje" required>
            </div>
            <div class="form-group">
                <label for="total_personas">Total de Personas a Hospedarse:</label>
                <input type="text" id="total_personas" name="total_personas" required>
            </div>
            <div class="form-group">
                <label for="nombre_reserva">Nombre de Quien Hace la Reserva:</label>
                <input type="text" id="nombre_reserva" name="nombre_reserva" required>
            </div>
            <button type="submit">Guardar</button>
        </form>
    </div>
</body>
</html>
