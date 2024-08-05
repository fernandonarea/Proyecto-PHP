<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar Sesión</title>
    <link rel="stylesheet" href="<?php echo CSS_PATH; ?>">
</head>
<body>
    <div id="loginContainer">
        <h1>Iniciar Sesión</h1>
        <form action="index.php?action=login" method="post">
            <div class="form-group">
                <label for="email">Correo Electrónico:</label>
                <input type="email" id="email" name="email" required>
            </div>
            <div class="form-group">
                <label for="password">Contraseña:</label>
                <input type="password" id="password" name="password" required>
            </div>
            <button type="submit" class="btn btn-primary">Iniciar Sesión</button>
        </form>
        <p>¿No tienes una cuenta? <a href="index.php?action=registerUs">Regístrate aquí</a></p>
    </div>
</body>
</html>




