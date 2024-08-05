<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Registro de Taller</title>
    <script src="https://kit.fontawesome.com/c5eafcdf48.js" crossorigin="anonymous"></script>
    <style>
        body {
            font-family: Arial, sans-serif; 
            margin: 0;
            padding: 0;
            background-color: #f4f4f4; 
            display: flex;
            justify-content: center; 
            align-items: center; 
            height: 100vh; 
        }
        .container {
            width: 100%;
            max-width: 600px; 
            padding: 20px;
            background-color: #fff; 
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); 
            box-sizing: border-box; 
        }
        h1 {
            text-align: center; 
            color: #333; 
            margin-bottom: 20px; 
        }
        label {
            display: block; 
            margin: 10px 0 5px; 
            color: #555; 
        }
        input[type="text"],
        input[type="number"],
        select {
            width: 100%; 
            padding: 10px; 
            margin-bottom: 15px; 
            border: 1px solid #ccc; 
            border-radius: 4px; 
            box-sizing: border-box; 
        }
        button {
            width: 100%; 
            padding: 10px; 
            background-color: #007BFF; 
            color: #fff; 
            border: none;
            border-radius: 4px; 
            font-size: 16px; 
            cursor: pointer; 
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); 
        }
        button:hover {
            background-color: #0056b3; 
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Registrar Taller</h1>
        <a id="rowReturn" href="index.php?action=mostrarBol">
            <i class="fa-solid fa-arrow-left"></i> Regresar
        </a>
        <form action="index.php?action=registerTal" method="post">
            <label for="nombre">Nombre:</label>
            <input type="text" id="nombre" name="nombre" required>

            <label for="tipoTaller">Tipo de Taller:</label>
            <select id="tipoTaller" name="tipoTaller" required>
                <option value="arte y pintura">Arte y Pintura</option>
                <option value="manualidades">Manualidades</option>
            </select>

            <label for="experiencia">Experiencia:</label>
            <select id="experiencia" name="experiencia" required>
                <option value="poca">Poca</option>
                <option value="mediana">Mediana</option>
                <option value="profesional">Profesional</option>
            </select>

            <label for="edad">Edad:</label>
            <input type="number" id="edad" name="edad" required>

            <label for="genero">Género:</label>
            <select id="genero" name="genero" required>
                <option value="masculino">Masculino</option>
                <option value="femenino">Femenino</option>
            </select>

            <label for="horarios">Horarios:</label>
            <select id="horarios" name="horarios" required>
                <option value="mañana">Mañana</option>
                <option value="tarde">Tarde</option>
                <option value="noche">Noche</option>
            </select>

            <button type="submit">Registrar Taller</button>
        </form>
    </div>
</body>
</html>
