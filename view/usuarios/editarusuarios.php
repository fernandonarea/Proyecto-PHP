<!--autor: Lindao Borbor Hamilton-->
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Modificar</title>
    <link rel="stylesheet" href="<?php echo CSS_PATH; ?>">
</head>
<body>
    <div id="registroContainer">
        <h2>Modificar Usuario</h2>
        <form action="index.php?action=EditUs" method="post">

            <div class="form-group">
                <label for="nombre_completo">Nombre Completo:</label>
                <input type="text" id="nombre_completo" name="nombre_completo" required>
            </div>
            
            <div class="form-group">
                <label for="correo_electronico">Correo Electrónico:</label>
                <input type="text" id="correo_electronico" name="correo_electronico" required>
            </div>
            
            <div class="form-group">
                <label for="contrasena">Contraseña:</label>
                <input type="password" id="contrasena" name="contrasena" required>
            </div>
            
            <div class="form-group">
                <label for="rol">Rol:</label>
                <select id="rol" name="rol" required>
                    <option value="patrocinador">Patrocinador</option>
                    <option value="gerente">Gerente</option>
                    <option value="comprador">Comprador</option>
                </select>
            </div>
            
            <div class="form-group">
                <label for="telefono">Teléfono:</label>
                <input type="text" id="telefono" name="telefono" required>
            </div>
            
            <button type="submit" class="btn btn-primary">Modificar</button>
        </form>
    </div>
</body>
</html>
